<?php

namespace App\Http\Controllers\Admin;

use App\Models\Uom;
use App\Models\Size;
use App\Models\Brand;
use App\Models\Color;
use App\Models\Uomset;
use App\Models\Category;
use App\Models\ItemInfo;
use Illuminate\Support\Str;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use App\Http\Controllers\Controller;
use Brian2694\Toastr\Facades\Toastr;
use App\Http\Requests\StoreItemInfoRequest;
use App\Http\Requests\UpdateItemInfoRequest;

class ItemInfoController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index(Request $request)
    {
        try {
            DB::beginTransaction();

            $perPage = $request->input('per_page', 10); // Default to 10 records per page, adjust as needed
            $search = $request->input('search');
            $status = $request->input('status'); // 'active', 'inactive', or null
            // $brands =  Brand::select('name_english', 'name_bangla')->whereIn('status', [0, 1])->latest('id')->paginate(10);
            $query = ItemInfo::with(['category', 'sales_uom'])
                ->select(
                    'id',
                    'name',
                    'name_bangla',
                    'category_id',
                    'code',
                    'min_qty',
                    'trans_uom',
                    'stock_uom',
                    'sales_uom',
                    'brand',
                    'weight',
                    'published_price',
                    'sell_price',
                    'purchase_price',
                    'discount',
                    'discount_type',
                    'current_stock',
                    'images',
                    'thumbnail',
                    'attachment',
                    'published',
                    'stock_status',
                    'request_status',
                    'approved',
                    'status'
                )
                ->whereIn('status', [0, 1])->latest('id');

            // Apply status filter
            if ($status) {
                $query->where('status' === $status);
            }
            // Apply search filter
            if ($search) {
                $query->where(function ($query) use ($search) {
                    $query->where('name', 'like', '%' . $search . '%')
                        ->orWhere('name_bangla', 'like', '%' . $search . '%');
                    // Add other fields as needed for searching
                });
            }

            $query = $query->paginate($perPage);

            DB::commit();
        } catch (\Exception $error) {
            DB::rollBack();
            return response()->json([
                'success' => false,
                'error' => 'An error occurred.',
                'message' => $error->getMessage(),
            ], 500);
            // Handle the exception, log it, and return an appropriate error response
        }
        return view('admin.item.index', with(['products' => $query,]));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        $categories = Category::all();
        $brands = Brand::all();
        $uomsets = Uomset::all();
        $uoms = Uom::all();
        $colors = Color::all();
        $sizes = Size::all();
        return view('admin.item.create', with(['brands' => $brands, 'categories' => $categories, 'uomsets' => $uomsets, 'uoms' => $uoms, 'colors' => $colors, 'sizes' => $sizes]));
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(StoreItemInfoRequest $request)
    {

        // dd($request->all());
        DB::beginTransaction();
        try {
            $validatedData = $request->validated();

            // Create or update the item info
            $itemInfo = ItemInfo::create($validatedData);
            // Generate and save a unique slug based on item name
            $slug = Str::slug($itemInfo->name);
            $uniqueSlug = $this->makeUniqueSlug($slug);
            $itemInfo->slug = $uniqueSlug; // Generate and save a unique slug based on item name

            $itemInfo->min_qty = isset($itemInfo->min_qty) ? $itemInfo->min_qty : 1;
            $itemInfo->current_stock = 0;
            $itemInfo->stock_status = 0;
            $itemInfo->meta_name = $itemInfo->name;
            // Generate 'code' based on item ID and a random 5-digit number
            $code = isset($itemInfo->id) ? $itemInfo->id : 'unknown_id';
            $itemInfo->code = "ITM" . $code . str_pad(mt_rand(1, 99999), 5, '0', STR_PAD_LEFT);
            $itemInfo->save();

            DB::commit();

            //return response()->json(['message' => 'ItemInfo created successfully', 'data' => $itemInfo], 201);
            // Toastr::success('Data Added Success!', 'success', ["positionClass" => "toast-top-right"]);

            // Toastr::success('This is a success message', 'Success');
            return redirect()->route('admin.products.index');
        } catch (\Exception $e) {
            // Handle exceptions, rollback the transaction, and return an error response
            DB::rollBack();

            return response()->json(['message' => 'Error creating ItemInfo', 'error' => $e->getMessage()], 500);
        }


        // // $size_name = $request->size_name;
        // // $color_name = $request->color_name;

        // // // for ($i = 0; $i < count($size_name); $i++) {}
        // // $product->color_id = $request->color_name;
        // // $product->size_id =  $request->size_name;

        // $itemInfo_id = $itemInfo->id;


        // $product_slug  = $itemInfo->slug;
        // $item_img = $request->file('images');


        // if ($request->hasFile('images')) {
        //     $files = $request->file('images');
        //     foreach ($files as $file) {
        //         $filename = $file->getClientOriginalName();
        //         $extension = $file->getClientOriginalExtension();
        //         $item_img_name = $filename . "-" . date('his') . "-" . str_random(3) . "." . $extension;
        //         $destinationPath = 'uploads/images' . '/';
        //         $file->move($destinationPath, $item_img_name);
        //     }
        // }


        // $item_img = new ProductImage();
        // $item_img->product_id = $product_id;
        // $item_img->item_img = $item_img_name;
        // $item_img->save();


        // $size_name = $request->size_name;
        // for ($i = 0; $i < count($size_name); $i++) {
        //     $module_permission2 = [
        //         'product_id' => $product_id,
        //         'size_name' =>  $size_name[$i],
        //     ];
        //     DB::table('sizes')->insert($module_permission2);
        // }




        // for ($i = 0; $i < count($color_name); $i++) {
        //     $module_permission3 = [
        //         'product_id' => $product_id,
        //         'color_name' =>  $color_name[$i],
        //     ];
        //     DB::table('colors')->insert($module_permission3);
        // }

        // if (!$response->ok()) {
        //     Toastr::error($response->object()->message);
        // } else {
        //     Toastr::success($response->object()->message);
        // }


    }
    private function makeUniqueSlug($originalSlug)
    {
        $count = 1;
        $slug = $originalSlug;

        // Keep incrementing the count until a unique slug is found
        while (ItemInfo::where('slug', $slug)->exists()) {
            $slug = $originalSlug . '-' . $count;
            $count++;
        }

        return $slug;
    }
    /**
     * Display the specified resource.
     */
    public function show(ItemInfo $itemInfo)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(ItemInfo $itemInfo)
    {
        $product = ItemInfo::findOrFail($itemInfo);
        return view('admin.item.index', with(['products' => $product,]));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(UpdateItemInfoRequest $request, ItemInfo $itemInfo)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(ItemInfo $itemInfo)
    {
        //
    }

    public function loadProduct()
    {
        $items = ItemInfo::latest()->paginate(10);

        // if ($request->expectsJson()) {
        return response()->json([
            'message' => 'success',
            'items' => $items,
        ]);
    }
}
