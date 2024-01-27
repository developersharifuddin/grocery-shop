<?php

namespace App\Http\Controllers\Report;

use App\Models\Customer;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Log;
use App\Http\Controllers\Controller;

class CustomerTrasactionDetails extends Controller
{
    public function index(Request $request)
    {
        try {
            DB::beginTransaction();

            $perPage = $request->input('per_page', 10); // Default to 10 records per page, adjust as needed
            $search = $request->input('search');
            $status = $request->input('status'); // 'active', 'inactive', or null
            $query = Customer::query()->select(
                'id',
                'slug',
                'name',
                'email',
                'phone',
                'email_verified_at',
                'password',
                'password_confirmation',
                'gst_number',
                'tax_number',
                'country',
                'state',
                'city',
                'postcode',
                'address',
                'previous_due'
            )
                // ->whereIn('status', [0, 1])
                ->latest('id');

            // Apply status filter
            if ($status) {
                $query->where('status' === $status);
            }
            // Apply search filter
            if ($search) {
                $query->where(function ($query) use ($search) {
                    $query->where('name', 'like', '%' . $search . '%')
                        ->orWhere('phone', 'like', '%' . $search . '%');
                    // Add other fields as needed for searching
                });
            }

            $query = $query->paginate($perPage);
            // return ($query);
            DB::commit();
        } catch (\Exception $error) {
            DB::rollBack();
            return response()->json([
                'success' => false,
                'error' => 'An error occurred.',
                'message' => $error->getMessage(),
            ], 500);
        }
        return view('admin.customer.index', with(['customers' => $query,]));
    }


    public function BarcodePdf(Request $request)
    {

        try {
            $id = $request->product_id;
            $quantity = $request->quantity;
            $qty = (int)$quantity; // Ensure quantity is an integer 

            if (!$request->has('product_id') || !$request->has('quantity')) {
                abort(400, 'Invalid request parameters');
            }

            $data = ItemInfo::findOrFail($id);

            if (!$data) {
                abort(404, 'Product not found');
            }
            ini_set('memory_limit', '256M'); // Set to an appropriate value 
            ini_set("pcre.backtrack_limit", "5000000000000000000");
            ini_set("memory_limit", "4096M");
            ini_set('max_execution_time', 600);


            $batchSize = 500;
            $barcodes = [];

            for ($start = 0; $start < $qty; $start += $batchSize) {
                $end = min($start + $batchSize, $qty);

                for ($i = $start; $i < $end; $i++) {
                    $barcodeValue = $data->code;

                    try {
                        // $barcodeHTML = DNS1D::getBarcodeHTML($barcodeValue, 'C39', 1.3, 55, 'green', true);
                        // $barcodeHTML = DNS1D::getBarcodeHTML($barcodeValue, 'C39+', 1, 50, 'black', true);

                        $barcodeHTML = $data->code;
                        $barcodes[] = $barcodeHTML;
                    } catch (\Exception $e) {
                        Log::error('Exception during barcode generation: ' . $e->getMessage());
                        continue;
                    }
                }
            }
            // dd($barcodes);

            //$filename = $data[0]->name.'.pdf';
            $filename = $data->name . '.pdf';
            $pdf = PDF::loadView('admin.bar_code.barcodePdf', ['data' => $data, 'barcodes' => $barcodes], [], [
                'mode' => '',
                'format' => 'A4-P',
                'default_font_size' => '12',
                'default_font' => 'SutonnyMJRegular',
                'margin_left' => 10,
                'margin_right' => 10,
                'margin_top' => 10,
                'margin_bottom' => 10,
                'margin_header' => 2,
                'margin_footer' => 10,
                'orientation' => 'L',
                'title' => 'Laravel mPDF',
                'author' => '',
                'watermark' => '',
                'show_watermark' => true,
                'watermark_font' => 'SutonnyMJRegular',
                'display_mode' => 'fullpage',
                'watermark_text_alpha' => 0.2,
                'custom_font_dir' => '',
                'custom_font_data' => [],
                'auto_language_detection' => false,
                'temp_dir' => rtrim(sys_get_temp_dir(), DIRECTORY_SEPARATOR),
                'pdfa' => false,
                'pdfaauto' => false,
            ]);

            return $pdf->stream($filename . '.pdf');
        } catch (\Exception $e) {
            // Handle general exceptions here
            dd($e->getMessage());
            Log::error('Exception in barcode generation process: ' . $e->getMessage());
            abort(500, 'Internal Server Error');
        }
    }
}
