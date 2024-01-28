<?php

namespace App\Http\Controllers\Admin;

use App\Models\Product;
use App\Models\ItemInfo;
use App\Models\Supplier;
use Illuminate\Http\Request;
use App\Models\DailyExpenses;
use App\Models\PurchaseOrders;
use App\Models\PaymentToSupplier;
use Illuminate\Support\Facades\DB;
use App\Models\PurchaseOrdersChild;
use App\Http\Controllers\Controller;
use App\Http\Requests\StorePurchaseOrdersRequest;
use App\Http\Requests\UpdatePurchaseOrdersRequest;

class PurchaseOrdersController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index(Request $request)
    {

        // try {
        //     DB::beginTransaction();

        $perPage = $request->input('per_page', 10);
        $search = $request->input('search');
        $status = $request->input('status');

        // Define the fields you want to select
        $fields = [
            'purchase_orders.id',
            'suppliers.name AS supplier_name', // Assuming a relationship between PurchaseOrder and Supplier
            'purchase_orders.total_purchase_qty',
            'purchase_orders.total_received_qty',
            'purchase_orders.total_purchase_amount',
            // Add more fields as needed
        ];

        $query = PurchaseOrders::query()
            ->leftJoin('suppliers', 'purchase_orders.supplier_id', '=', 'suppliers.id')
            ->select($fields);

        // Apply filters
        if ($search) {
            $query->where('suppliers.name', 'like', '%' . $search . '%');
            // Add more search conditions as needed
        }

        // Add more filters based on your requirements

        // Execute the query
        $purchaseOrders = $query->paginate($perPage);

        // DB::commit();
        // dd($purchaseOrders);
        return view('admin.purchase_orders.index', compact('purchaseOrders'));
        // } catch (\Exception $error) {
        //     DB::rollBack();

        //     return redirect()->route('admin.purchase-orders.index')->with('error', 'An error occurred while fetching purchase orders.');
        // }
    }





    public function create()
    {
        // Fetch data needed for dropdowns, e.g., suppliers and products
        $suppliers = Supplier::all(); // Replace with your actual Supplier model
        $products = ItemInfo::all(); // Replace with your actual Product model

        return view('admin.purchase_orders.create', compact('suppliers', 'products'));
    }


    /**
     * Store a newly created resource in storage.
     */
    // public function store(StorePurchaseOrdersRequest $request)
    // {
    //     // Validate and store the main PurchaseOrders model
    //     $purchaseOrder = PurchaseOrders::create($request->validated());

    //     // Attach child records to the main PurchaseOrders model
    //     $purchaseOrder->children()->createMany($request->input('items'));

    //     // Flash success message and redirect
    //     session()->flash('success', 'Purchase order added successfully.');
    //     return redirect()->route('admin.purchase-orders.index');
    // }





    public function store(StorePurchaseOrdersRequest $request)
    {
        try {
            DB::beginTransaction();
            $itemInfo = ItemInfo::where('id',  $request->input('product_id'))->first();

            // Create the main purchase order
            $purchaseOrder = PurchaseOrders::create([
                'supplier_id' => $request->input('supplier_id'),
                'total_purchase_qty' => $request->input('total_purchase_qty'),
                'total_received_qty' => $request->input('total_purchase_qty'),
                'total_purchase_amount' => $itemInfo->purchase_price . $request->input('total_purchase_qty'),
                'product_id' => $request->input('product_id'),
                'is_purchased' => $request->has('is_purchased'),
                'is_received' => $request->has('is_received'),
                'is_closed' => $request->has('is_closed'),
                'purchased_by' => $request->input('purchased_by'),
            ]);


            // Create the child purchase orders
            if ($request->has('children') && is_array($request->input('children'))) {
                foreach ($request->input('children') as $childData) {
                    PurchaseOrdersChild::create([
                        'po_id' => $purchaseOrder->id,
                        'product_id' => $childData['product_id'],
                        'purchase_qty' => $childData['purchase_qty'],
                        'amount' => $childData['amount'],
                        'total_amount' => $childData['total_amount'],
                        'is_received' => $childData['is_received'],
                    ]);
                }
            }


            foreach ($request->input('product_id') as $productId) {
                $itemInfo = ItemInfo::where('id', $productId)->first();

                if ($itemInfo) {
                    $currentstock =  $itemInfo->update([
                        'current_stock' => $itemInfo->current_stock + $request->input('total_purchase_qty'),
                    ]);
                }
            }

            // DailyExpenses::create([
            //     'expense_name' => "Purchase Order & Payment to supplier. SPO Id=" . $purchaseOrder->id,
            //     'expense_group' => "Purchase Order",
            //     'company' => 'Rabbi Grocery Shop',
            //     'store' => 'Main Store',
            //     'expense_date' => now(),
            //     'approved_status' => 'Approved',
            //     'amount' => $request->input('total_purchase_qty'),
            // ]);


            PaymentToSupplier::create([
                'supplier_id' => $purchaseOrder->supplier_id,
                'spo_id' => $purchaseOrder->id,
                'payable_amount' => $purchaseOrder->total_purchase_amount,
                'due_amount' => 0,
                'paid_amount' =>  $purchaseOrder->total_purchase_amount,
                'is_closed' =>  $purchaseOrder->is_closed,
                '$itemInfo' =>  $$itemInfo,
            ]);

            DB::commit();
            return redirect()
                ->route('admin.purchase-orders.index')
                ->with('success', "Purchase order added and Received successfully. 
            Stock Quantity added. Your Current Stock Is: $itemInfo->current_stock . Product Id: $itemInfo->id .Product Name: $itemInfo->name . ");
        } catch (\Exception $error) {
            DB::rollBack();

            return redirect()->route('admin.purchase-orders.index')->with('error', 'An error occurred while adding the purchase order.');
        }
    }





    /**
     * Display the specified resource.
     */
    public function show(PurchaseOrders $purchaseOrders)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(PurchaseOrders $purchaseOrders)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(UpdatePurchaseOrdersRequest $request, PurchaseOrders $purchaseOrders)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(PurchaseOrders $purchaseOrder)
    {
        $purchaseOrder->delete();

        // Flash success message and redirect
        session()->flash('success', 'Purchase order deleted successfully.');
        return redirect()->route('admin.purchase-orders.index');
    }
}
