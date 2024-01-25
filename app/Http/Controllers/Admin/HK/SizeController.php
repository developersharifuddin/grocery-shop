<?php

namespace App\Http\Controllers\Admin\HK;

use App\Models\Size;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Http\Requests\StoreSizeRequest;
use Illuminate\Support\Facades\Session;
use App\Http\Requests\UpdateSizeRequest;

class SizeController extends Controller
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

            $query = Size::latest('id')
                //->leftjoin('sells_items', 'sells.id', 'sells_items.sell_id')
                ->filter($filters);

            // if ($type) {
            //     $query->where('type', $type);
            // }

            $data = $query->paginate($perPage);

            return view('admin.size.index', ['sizes' => $data]);
        } catch (\Exception $e) {
            dd($e->getMessage()); // Output the error message for debugging
        }
    }


    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        return view('admin.size.create');
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(StoreSizeRequest $request)
    {
        $validatedData = $request->validated();

        $Size = Size::create($validatedData);
        // Save the changes
        $Size->save();

        // Flash success message
        Session::flash('success', 'Successfully created Size!');
        // Redirect to the index route with a success message
        return redirect()->route('admin.size.index')->with(['success' => 'Successfully created']);
    }

    /**
     * Display the specified resource.
     */
    public function show(Size $size)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Size $size)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(UpdateSizeRequest $request, Size $size)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Size $size)
    {
        //
    }
}
