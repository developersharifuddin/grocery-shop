<?php

namespace App\Http\Controllers\Admin;

use App\Models\Supplier;
use Illuminate\Support\Str;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use App\Http\Controllers\Controller;
use App\Http\Requests\StoreSupplierRequest;
use App\Http\Requests\UpdateSupplierRequest;

class SupplierController extends Controller
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
            $query = supplier::query()->select(
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
        return view('admin.suppliers.index', with(['suppliers' => $query,]));
    }


    public function create()
    {
        return view('admin.suppliers.create');
    }

    /**
     * Store a newly created resource in storage.
     */

    public function store(StoreSupplierRequest $request)
    {
        // Generate slug from the supplier's name
        $slug = Str::slug($request->input('name'));

        // Add the slug to the request data
        $requestData = $request->all();
        $requestData['slug'] = $slug;

        // Create the supplier record
        Supplier::create($requestData);

        // Flash success message and redirect
        session()->flash('success', 'supplier added successfully.');
        return redirect()->route('admin.suppliers.index')->with('success', 'Inserted successfully.');
    }



    /**
     * Display the specified resource.
     */
    public function show(Supplier $supplier)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Supplier $supplier)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(UpdateSupplierRequest $request, Supplier $supplier)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Supplier $supplier)
    {
        $supplier->delete();
        return redirect()->route('admin.suppliers.index')->with('success', 'Product deleted successfully.');
    }
}
