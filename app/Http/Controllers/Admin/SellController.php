<?php

namespace App\Http\Controllers\Admin;

use App\Models\Sell;
use App\Models\User;
use App\Models\Payment;
use App\Models\Category;
use App\Models\Customer;
use App\Models\ItemInfo;
use App\Models\SellsItem;
use Illuminate\Http\Request;
use App\Services\PrintService;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Log;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Http;
use App\Http\Requests\StoreSellRequest;
use App\Http\Requests\UpdateSellRequest;

class SellController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index(Request $request)
    {
        try {
            // dd($request->all());
            $perPage = $request->input('per_page', 10);
            // $parent_id = $request->input('parent_id');
            $search = $request->input('search');

            $filters = $request->only(['search', 'per_page']);

            $customers = Customer::get();
            $users = User::latest();

            $query = Sell::with(['sellsItems', 'payments'])
                //->leftjoin('sells_items', 'sells.id', 'sells_items.sell_id')
                ->latest('id')
                ->filter($filters);

            // if ($type) {
            //     $query->where('type', $type);
            // }

            $data = $query->paginate($perPage);

            return view('admin.pos.index', [
                'customers' => $customers, 'users' => $users, 'sells' => $data,
            ]);
        } catch (\Exception $e) {
            dd($e->getMessage()); // Output the error message for debugging
        }
    }


    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        $items = ItemInfo::latest()->paginate(10);
        $customers = Customer::all();
        $users = User::all();
        $categories = Category::all();
        return view('admin.pos.create', [
            'customers' => $customers, 'users' => $users, 'categories' => $categories,
            'items' => $items,
        ]);
    }

    public function newsale(Request $request)
    {
        $customers = Customer::all();
        $users = User::all();
        $categories = Category::all();
        return view('admin.pos.new-sales', [
            'customers' => $customers, 'users' => $users, 'categories' => $categories,
        ]);
    }


    public function getItem(Request $request)
    {
        if ($request->has('barcode')) {
            $barcode = $request->input('barcode');

            $query = ItemInfo::where('code', $barcode)->first();

            if ($query) {
                return response()->json(['data' => $query, 'message' => 'Item found.'], 200);
            } else {
                return response()->json(['data' => null, 'message' => 'Item not found.'],);
            }
        } else {
            return response()->json(['message' => 'Barcode not provided.'], 400);
        }
    }


    /**
     * Store a newly created resource in storage.
     */
    public function store(StoreSellRequest $request)
    {
        set_time_limit(120); // Set the limit to 120 seconds

        // dd($request->all());
        $attribute = $request->validated();

        try {
            DB::beginTransaction();

            $customer_id =  $attribute['customer_id'];
            $product_id =  $attribute['product_id'];
            $customer = Customer::where('id',  $customer_id)->first();
            $product = ItemInfo::where('id',  $product_id)->first();

            $customer = Customer::find($attribute['customer_id']);
            $product = ItemInfo::find($attribute['product_id'][0]);

            $total_due_amount = $attribute['total_payable_amount'] - $request->paid_amount;

            $sell = Sell::create([
                'customer_id' => $attribute['customer_id'],
                'shipping_address' => $customer->address,
                'phone' => $customer->phone,
                'sells_status' => $attribute['sell_status'],
                'ref_no' => $attribute['reference_no'],
                'payment_type' => $attribute['payment_type'],
                'payment_note' => $attribute['payment_note'],
                'payment_details' => $attribute['sales_note'],
                'payable' => $attribute['total_payable_amount'],
                'payment_status' => 1,
                'sent_sms' => request()->input('sent_sms', '0'),
                'created_by' => Auth::user()->id,
            ]);

            $sell->update([
                'sale_code' => 'SC-' . ($sell->id + 1),
            ]);

            $productIds = $attribute['product_id'];

            foreach ($productIds as $index => $productId) {
                $product = ItemInfo::find($productId);

                $quantity = $attribute['product_qty'][$index];

                $sellitem = SellsItem::create([
                    'store_id' => '1',
                    'sell_id' => $sell->id,
                    'product_id' => $product->id,
                    'published_price' => $product->published_price,
                    'bar_code' => $product->bar_code,
                    'quantity' => $quantity,
                    'sell_price' => $product->sell_price,
                    'discount_amount' => $product->discount_amount,
                    'published_price' => $product->published_price,
                ]);
            }


            $payment = Payment::create([
                'sell_id' => $sell->id,
                'customer_id' => $attribute['customer_id'],
                'payment_type' => $attribute['payment_type'],
                'payment_note' => $attribute['payment_type'],
                'total_payable_amount' => $attribute['total_payable_amount'],
                'total_paid_amount' =>  $request->paid_amount,
                'total_due_amount' => $total_due_amount,
                'payment_details' => $attribute['sales_note'],
                'txn_code' => 'TX-' . $sell->id . substr(str_shuffle('ABCDEFGHIJKLMNOPQRSTUVWXYZ0123456789'), 0, 8),
            ]);




            //   // Generate invoice content (customize this based on your needs)
            //   $invoiceContent = "Invoice Content: \n";
            //   $invoiceContent .= "Customer: " . $customer->name . "\n";
            //   // ... (include other invoice details)


            // $invoiceContent = View::make('invoice', [
            //     'customerName' => $request->input('customer_name'),
            //     'mobile' => $request->input('mobile'),
            //     'seller' => $request->input('seller'),
            //     // ... (other data)
            // ])->render();

            // // Print the invoice
            // $printSuccess = $printService->printInvoice($invoiceContent);

            // if ($printSuccess) {
            //     // The invoice was printed successfully
            //     return redirect()->route('admin.sales.index');
            // } else {
            //     // There was an issue with printing, handle accordingly
            //     return response()->json([
            //         'success' => false,
            //         'message' => 'Error printing the invoice.',
            //     ], 500);
            // }


            // Generate and print the invoice with additional payment and sell data
            // $invoiceData = [
            //     'customerName' => $customer->name,
            //     'mobile' => $customer->phone,
            //     'seller' => Auth::user()->name,
            //     'sellData' => [
            //         'invoiceNumber' => $sell->sale_code,
            //         'date' => $sell->created_at->format('d-m-Y H:i:s'),
            //         // Add more sell-related data as needed
            //     ],
            //     'paymentData' => [
            //         'totalPayableAmount' => $payment->total_payable_amount,
            //         'totalPaidAmount' => $payment->total_paid_amount,
            //         'totalDueAmount' => $payment->total_due_amount,
            //         // Add more payment-related data as needed
            //     ],
            // ];

            // $invoiceContent = view('invoice', $invoiceData)->render();

            // $printService = new PrintService();
            // $printSuccess = $printService->printInvoice($invoiceContent);

            // if (!$printSuccess) {
            //     // Handle printing error
            //     return back()->with('error', 'Error printing the invoice.');
            // }






            // $invoiceContent = view('admin.pos.invoice', $invoiceData)->render();

            // // Attempt to print the invoice with retry mechanism
            // $retryAttempts = 3;
            // $retryDelayInSeconds = 2;

            // for ($attempt = 1; $attempt <= $retryAttempts; $attempt++) {
            //     $printService = new PrintService();
            //     $printingSuccessful = $printService->printInvoice($invoiceContent);

            //     if ($printingSuccessful) {
            //         // Invoice printed successfully
            //         break; // Exit the loop if printing was successful
            //     } else {
            //         // Print attempt failed, wait before retrying
            //         sleep($retryDelayInSeconds);
            //     }
            // }

            // if ($printingSuccessful) {
            //     return redirect()->route('admin.sales.index')->with('success', 'Sell created successfully.');
            // } else {
            //     // All retry attempts failed, handle accordingly
            //     return back()->with('error', 'Error printing the invoice after multiple attempts.');
            // }

            // // All retry attempts failed, handle accordingly
            // return back()->with('error', 'Error printing the invoice after multiple attempts.');



            DB::commit();


            return redirect()->route('admin.sales.index');
        } catch (\Exception $error) {
            DB::rollBack();
            Log::error($error);
            return response()->json([
                'success' => false,
                'message' => $error->getMessage(),
            ], 500);
        }
    }

    /**
     * Display the specified resource.
     */
    public function show(Sell $sell)
    {
        // Fetch only the necessary data
        $customers = Customer::all();  // Update this to fetch relevant customers
        $users = User::all();          // Update this to fetch relevant users
        $categories = Category::all(); // Update this to fetch relevant categories

        // Fetch the specific sell along with its sells_items and payments
        $sell = Sell::with(['sells_items', 'payments'])->find($sell->id);

        return view('admin.pos.sales_details', [
            'customers' => $customers,
            'sell' => $sell, // Pass the specific sell instead of all sells
            'users' => $users,
            'categories' => $categories,
        ]);
    }

    public function salesInvoice(Sell $sell)
    {
        // Fetch the specific sell along with its sells_items and payments
        // $sell = Sell::with(['sells_items', 'payments'])->find($sell->id);
        return view('admin.pos.pdf_print');
    }
    public function printPosInvoice(Sell $sell)
    {
        // Fetch the specific sell along with its sells_items and payments
        // $sell = Sell::with(['sells_items', 'payments'])->find($sell->id);
        return view('admin.pos.invoice');
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Sell $sell)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(UpdateSellRequest $request, Sell $sell)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Sell $sell)
    {
        //
    }






    //composer require laravel/cashier

    // Sign Up for bKash Account:

    //     Before integrating bKash, make sure you have a bKash account and have access to their developer portal.
    //     Obtain API Credentials:

    //     Log in to the bKash developer portal and obtain the API credentials (merchant ID, username, password, API key, etc.) necessary for integration.


    // routes/web.php or routes/api.php

    //Route::post('/bkash/callback', 'BkashController@handleCallback');


    // use Illuminate\Support\Facades\Log;

    public function handleCallback(Request $request)
    {
        try {
            // Validate the bKash callback data
            $this->validateBkashCallback($request);

            // Extract relevant data from the callback
            $sellId = $request->input('sell_id');
            $bKashTransactionId = $request->input('bKash_transaction_id');
            $bKashStatus = $request->input('bKash_status');

            // Update the database based on the callback data
            $sell = Sell::find($sellId);

            if ($sell) {
                $sell->update([
                    'bkash_transaction_id' => $bKashTransactionId,
                    'bkash_status' => $bKashStatus,
                    // Add other relevant fields as needed
                ]);

                // Perform additional business logic based on the bKash status
                if ($bKashStatus === 'Completed') {
                    // Payment was successful
                    // Perform any actions needed for a successful payment
                } else {
                    // Payment was not successful
                    // Handle accordingly (e.g., cancel the order, update status, etc.)
                }

                // Respond to bKash with a success message
                return response()->json(['status' => 'success']);
            } else {
                // Sell not found in the database
                throw new \Exception('Sell not found for ID: ' . $sellId);
            }
        } catch (\Exception $exception) {
            // Log the error
            Log::error('Error handling bKash callback: ' . $exception->getMessage());

            // Respond to bKash with an error message
            return response()->json(['status' => 'error', 'message' => 'Internal Server Error']);
        }
    }

    private function validateBkashCallback(Request $request)
    {
        // Perform validation on the incoming bKash callback data
        // Example: Check if required fields are present, validate signatures, etc.

        // Example validation:
        $request->validate([
            'sell_id' => 'required|numeric',
            'bKash_transaction_id' => 'required|string',
            'bKash_status' => 'required|in:Completed,Failed',
            // Add other required fields and validation rules
        ]);
    }
}
