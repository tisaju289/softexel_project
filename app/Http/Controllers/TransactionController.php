<?php

namespace App\Http\Controllers;

use App\Models\Product;
use App\Models\Transaction;
use Illuminate\Http\Request;

class TransactionController extends Controller
{


    public function TransactionListPage(){
       
      
        $transactions = Transaction::all();
        return view('dashboard.component.transaction.transaction-list', compact('transactions'));

    }

    public function TransactionCreatePage()
    {
        $products = Product::all();
        return view('dashboard.component.transaction.transaction-create', compact('products'));
    }

    public function TransactionUpdatePage($id)
    {
        $transaction = Transaction::findOrFail($id);
        $products = Product::all();
        return view('dashboard.component.transaction.transaction-update', compact('transaction', 'products'));
    }







    public function TransactionCreate(Request $request)
    {
        $request->validate([
            'product_id' => 'required|exists:products,id',
            'quantity' => 'required|integer|min:1',
        ]);

        Transaction::create([
            'user_id' => auth()->id(),
            'product_id' => $request->product_id,
            'quantity' => $request->quantity,
            'total_price' => Product::find($request->product_id)->price * $request->quantity,
        ]);

        return redirect()->route('transaction.page')
            ->with('success', 'Transaction created successfully.');
       
    }

     


    public function TransactionUpdate(Request $request, $id)
    {
        $request->validate([
            'product_id' => 'required|exists:products,id',
            'quantity' => 'required|integer|min:1',
        ]);

        $transaction = Transaction::findOrFail($id);
        $transaction->product_id = $request->product_id;
        $transaction->quantity = $request->quantity;
        $transaction->total_price = Product::find($request->product_id)->price * $request->quantity;
        $transaction->save();

        return redirect()->route('transaction.page')
            ->with('success', 'Transaction updated successfully.');
    }



    public function TransactionDestroy($id)
    {
        $transaction = Transaction::findOrFail($id);
        $transaction->delete();

        return redirect()->route('transaction.page')
            ->with('success', 'Transaction deleted successfully.');

    }
    





    public function TransactionById($id)
    {
        $transaction = Transaction::with('product', 'user')->findOrFail($id);
        return view('dashboard.component.transaction.transaction-show', compact('transaction'));
    }

  
}
