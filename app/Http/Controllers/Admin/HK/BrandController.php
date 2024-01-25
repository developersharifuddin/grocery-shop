<?php

namespace App\Http\Controllers\Admin\HK;

use Carbon\Carbon;
use App\Models\Brand;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Session;
use App\Http\Requests\StoreBrandRequest;
use App\Http\Requests\UpdateBrandRequest;

class BrandController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $brands = Brand::latest()->paginate(10); // Paginate the results

        // return response()->json(['brands' => $brands], 200);

        return view('admin.brand.index', [
            'brands' => Brand::latest()->paginate(10),
        ]);
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        return view('admin.brand.create');
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(StoreBrandRequest $request)
    {
        $validatedData = $request->validated();

        // Create or update the item info
        $brand = Brand::create($validatedData);


        $logo = $request->file('logo');
        $slug = $request->sub_title;

        if ($request->hasfile('logo')) {
            $currentDate = Carbon::now()->toDateString();
            $logo_name = $slug . '-' . $currentDate . '-' . '.' . $logo->getClientOriginalExtension();
            if (!file_exists('frontend/uploads/brand/')) {
                mkdir('frontend/uploads/brand/', 077, true);
            }
            $logo->move('frontend/uploads/brand/', $logo_name);
        } else {
            $logo_name = 'default.png';
        }
        $brand->save();
        Session::flash('message', 'Successfully created Brand!');
        return redirect()->route('admin.brands.index')->with('Successfully created');
    }

    /**
     * Display the specified resource.
     */
    public function show(Brand $brand)
    {
        //dd($Brand->id);
        // return view('admin.brand.brand_edit', [
        //     'Brand' => Brand::find($Brand->id),
        // ]);
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Brand $brand)
    {
        //  dd(Brand::find($id));
        return view('admin.brand.index', [
            'Brand' => Brand::find($id),
        ]);
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(UpdateBrandRequest $request, Brand $brand, $id)
    {
        // dd($Brand->id);
        $Brand = Brand::find($id);

        $logo = $request->file('logo');
        $slug = $request->sub_title;
        if ($request->hasfile('logo')) {
            $currentDate = Carbon::now()->toDateString();
            $logo_name = $slug . '-' . $currentDate . '-' . '.' . $logo->getClientOriginalExtension();
            $logo->move('frontend/image/Brand/', $logo_name);
        } else {
            if (isset($Brand->logo)) {
                $logo_name = $Brand->logo;
            } else {
                $logo_name = 'default.png';
            }
        }


        $before_image = $request->file('before_image');
        if ($request->hasfile('before_image')) {
            $currentDate = Carbon::now()->toDateString();
            $before_image_name = $slug . '--' . $currentDate . '-' . '.' . $before_image->getClientOriginalExtension();
            $before_image->move('frontend/image/Brand/', $before_image_name);
        } else {
            if (isset($Brand->before_image)) {
                $before_image_name = $Brand->before_image;
            } else {
                $before_image_name = 'default.png';
            }
        }


        $Brand->title = $request->title;
        $Brand->sub_title = $request->sub_title;
        $Brand->description = $request->description;
        $Brand->description2 = $request->description2;
        $Brand->logo = $logo_name;
        $Brand->before_image = $before_image_name;
        $Brand->save();
        Session::flash('message', 'Successfully created shark!');
        return view('admin.brand.brand', [
            'brands' => Brand::latest()->paginate(10),
        ]);
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Brand $brand, $id)
    {
        Brand::find($id)->delete();
        return redirect()->back();
    }
}
