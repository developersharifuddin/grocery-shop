<?php

namespace App\Http\Controllers\Admin;

use Illuminate\Http\Request;
use App\Models\DailyExpenses;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Log;
use App\Http\Controllers\Controller;
use App\Http\Requests\StoreDailyExpensesRequest;
use App\Http\Requests\UpdateDailyExpensesRequest;

class DailyExpensesController extends Controller
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
            $query = DailyExpenses::select(
                'id',
                'expense_name',
                'expense_group',
                'company',
                'store',
                'expense_date',
                'approved_status',
                'amount'
            )
                ->latest('id');

            // Apply status filter
            if ($status !== null) {
                $query->where('approved_status', $status);
            }
            // Apply search filter
            if ($search) {
                $query->where(function ($query) use ($search) {
                    $query->where('expense_name', 'like', '%' . $search . '%')
                        ->orWhere('store', 'like', '%' . $search . '%');
                    // Add other fields as needed for searching
                });
            }

            $expenses = $query->paginate($perPage);
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
        return view('admin.daily-expenses.index', compact('expenses'));
    }


    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        return view('admin.daily-expenses.create');
    }
    /**
     * Store a newly created resource in storage.
     */
    public function store(StoreDailyExpensesRequest $request)
    {
        $request->validate([
            // Add your validation rules here
        ]);

        DailyExpenses::create($request->all());

        return redirect()->route('admin.daily-expenses.index')
            ->with('success', 'Expense created successfully.');
    }

    /**
     * Display the specified resource.
     */
    public function show(DailyExpenses $dailyExpenses)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(DailyExpenses $dailyExpenses)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(UpdateDailyExpensesRequest $request, DailyExpenses $dailyExpenses)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(DailyExpenses $dailyExpenses)
    {
        // try {
        //     DB::beginTransaction();

        // Log the ID before deletion
        Log::info("Deleting expense ID: {$dailyExpenses->id}");

        $dailyExpenses->delete();

        //     DB::commit();

        return redirect()->route('admin.daily-expenses.index')->with('success', 'Expense deleted successfully.');
        // } catch (\Exception $error) {
        //     DB::rollBack();

        //     // Log the error
        //     Log::error("Error deleting expense ID: {$request->id}. Error message: {$error->getMessage()}");

        //     return redirect()->route('admin.daily-expenses.index')->with('error', 'An error occurred while deleting the expense.');
        // }
    }
}
