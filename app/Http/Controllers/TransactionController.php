<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Transaction;
use App\Models\TransactionItem;
use App\Models\Product;

class TransactionController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $transactions = Transaction::all();
        return view('transactions.index', compact('transactions'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        $products = Product::all(); // Untuk menampilkan produk yang bisa dipilih
        return view('transactions.create', compact('products'));
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $request->validate([
            'products' => 'required|array',
            'quantities' => 'required|array',
            'payment_amount' => 'required|numeric|min:0',
        ]);

        // Buat transaksi baru
        $transaction = Transaction::create([
            'total_amount' => 0, // Akan di-update setelah item dimasukkan
            'payment_amount' => $request->input('payment_amount'),
            'change_amount' => 0, // Akan dihitung setelah total_amount
            'id_cashiers' => auth()->user()->id, // Mengambil id kasir dari user login
        ]);

        $totalAmount = 0;

        foreach ($request->input('products') as $index => $productId) {
            $product = Product::findOrFail($productId);
            $quantity = $request->input('quantities')[$index];
            $priceAt = $product->price;
            $priceTotal = $priceAt * $quantity;

            // Buat item transaksi
            TransactionItem::create([
                'id_transaction' => $transaction->id_transaction,
                'id_product' => $productId,
                'quantity' => $quantity,
                'price_at' => $priceAt,
                'price_total' => $priceTotal,
            ]);

            // Update total amount
            $totalAmount += $priceTotal;

            // Kurangi stok produk
            $product->stock -= $quantity;
            $product->save();
        }

        // Update total amount dan change amount
        $transaction->total_amount = $totalAmount;
        $transaction->change_amount = $request->input('payment_amount') - $totalAmount;
        $transaction->save();

        return redirect()->route('transactions.index')->with('success', 'Transaction completed successfully!');
    }

    /**
     * Display the specified resource.
     */
    public function show(string $id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(string $id)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        //
    }
}
