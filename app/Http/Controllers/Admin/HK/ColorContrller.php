<?php

namespace App\Http\Controllers\Admin\HK;

use App\Models\Color;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Session;
use App\Http\Requests\StoreColorRequest;
use App\Http\Requests\UpdateColorRequest;

class ColorContrller extends Controller
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

            $query = Color::with(['sellsItems', 'payments'])
                //->leftjoin('sells_items', 'sells.id', 'sells_items.sell_id')
                ->latest('id')
                ->filter($filters);

            // if ($type) {
            //     $query->where('type', $type);
            // }

            $data = $query->paginate($perPage);

            return view('admin.color.index', ['colors' => $data]);
        } catch (\Exception $e) {
            dd($e->getMessage()); // Output the error message for debugging
        }
    }


    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        return view('admin.color.create');
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(StoreColorRequest $request)
    {
        $validatedData = $request->validated();

        $color = Color::create($validatedData);
        // Save the changes
        $color->save();

        // Flash success message
        Session::flash('success', 'Successfully created color!');
        // Redirect to the index route with a success message
        return redirect()->route('admin.color.index')->with(['success' => 'Successfully created']);
    }

    /**
     * Display the specified resource.
     */
    public function show(Color $color)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Color $color)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(UpdateColorRequest $request, Color $color)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Color $color)
    {
        //
    }
}
