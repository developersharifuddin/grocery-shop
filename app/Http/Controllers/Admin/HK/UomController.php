<?php

namespace App\Http\Controllers\Admin\HK;

use App\Models\Uom;
use Illuminate\Support\Carbon;
use App\Http\Controllers\Controller;
use App\Http\Requests\StoreUomRequest;
use App\Http\Requests\UpdateUomRequest;
use App\Models\Uomset;
use Illuminate\Support\Facades\Session;

class UomController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $uoms = Uom::latest()->paginate(10); // Paginate the results

        // return response()->json(['uoms' => $uoms], 200);

        return view('admin.uom.index', [
            'uoms' => Uom::latest()->paginate(10),
        ]);
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        $uomsets  = Uomset::all();
        return view('admin.uom.create', with(['uomsets' => $uomsets]));
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(StoreUomRequest $request)
    {
        $validatedData = $request->validated();

        // Create a new Uom instance with the validated data
        $uom = Uom::create($validatedData);

        // Set local_desc attribute with the data from uom_desc
        $uom->local_desc = $request->uom_desc;

        // Save the changes
        $uom->save();

        // Flash success message
        Session::flash('success', 'Successfully created uom!');

        // Redirect to the index route with a success message
        return redirect()->route('admin.uoms.index')->with(['success' => 'Successfully created']);
    }


    /**
     * Display the specified resource.
     */
    public function show(Uom $uom)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Uom $uom)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(UpdateUomRequest $request, Uom $uom)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Uom $uom)
    {
        //
    }
}
