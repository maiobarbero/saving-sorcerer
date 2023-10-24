<?php

namespace App\Http\Controllers;

use App\Models\Category;
use App\Models\Transaction;
use Illuminate\Support\Facades\Auth;
use Inertia\Inertia;
use Illuminate\Http\Request;

class TransactionController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index(Request $request)
    {
        $filters = $request->only(['search', 'category', 'dateFrom', 'dateFrom', 'dateTo', 'bank']);

        return Inertia::render('Auth/Transactions', [
            'transactions' => Auth::user()
                ->transactions()
                ->with('category')
                ->with('bank_account')
                ->filter($filters)
                ->orderByDesc('date')
                ->paginate(15)
                ->withQueryString(),
            'categories' => Category::all(['id', 'name', 'icon']),
            'bankAccounts' => Auth::user()->bank_accounts()->get(),
            'filters' => $filters,
            'totalBalance' => Auth::user()->total_balance,
            'monthTrend' => Auth::user()->last_month_trend
        ]);
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        return Inertia::render('Auth/TransactionForm',[
            'categories' => Category::all(['id','name']),
            'bankAccounts' =>Auth::user()->bank_accounts()->get()
        ]);
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $request->validate([
            'amount' => 'required',
            'description' => 'required|string',
            'date' => 'required',
            'bank_account_id' => 'required',
            'category_id' => 'required'

        ]);
        try {

            Transaction::create([
                'user_id' => Auth::id(),
                'category_id' => $request->input('category_id'),
                'amount' => (float) $request->input('amount'),
                'description' => $request->input('description'),
                'date' => $request->input('date'),
                'bank_account_id' => $request->input('bank_account_id')
            ]);
            session()->flash('success', "Transaction created!");

        } catch (\Exception $e) {
            session()->flash('error', $e->getMessage());
            return redirect()->route('transactions.create');
        }
        return redirect()->route('transactions.index');
    }

    /**
     * Display the specified resource.
     */
    public function show(string $id)
    {
        $transaction = Auth::user()
            ->transactions()
            ->with('category')
            ->with('bank_account')
            ->find($id);

        if (!$transaction) {
            session()->flash('error', "Transaction not found");
            return to_route('transactions.index');
        }

        return Inertia::render('Auth/Transaction', [
            'transaction' => $transaction
        ]);
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(string $id)
    {
        $transaction = Auth::user()
            ->transactions()
            ->find($id);

        return Inertia::render('Auth/TransactionForm',[
            'categories' => Category::all(['id','name']),
            'bankAccounts' =>Auth::user()->bank_accounts()->get(),
            'transaction' => $transaction
        ]);
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id)
    {
        $transaction = Transaction::find($id);

        $request->validate([
            'amount' => 'required',
            'description' => 'required|string',
            'date' => 'required',
            'bank_account_id' => 'required',
            'category_id' => 'required'

        ]);
        try {
            $transaction->update([
                'user_id' => Auth::id(),
                'category_id' => $request->input('category_id'),
                'amount' => (float) $request->input('amount'),
                'description' => $request->input('description'),
                'date' => $request->input('date'),
                'bank_account_id' => $request->input('bank_account_id')
            ]);
            session()->flash('success', "Transaction Updated!");

        } catch (\Exception $e) {
            session()->flash('error', $e->getMessage());
            return redirect()->route('transactions.create');
        }
        return redirect()->route('transactions.index');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        try {
            $transaction = Auth::user()->transactions()->find($id);
            $transaction->delete();
            session()->flash('success', "Transaction $id deleted");


        } catch (\Exception $e) {
            session()->flash('error', "Transaction not found");
        }

        return redirect()->route('transactions.index', 'status:303');

    }
}