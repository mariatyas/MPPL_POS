<?php

namespace App\Http\Controllers;

use App\Models\Product;
use App\Models\Category;
use Illuminate\Http\Request;

class ProductController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        return view('product.dashboard');
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        $categories = Category::all(); // Ambil semua kategori
        return view('product.create', compact('categories'));
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $validatedData = $request->validate([
            'product_name' => 'required|string|max:255',
            'price' => 'required|numeric',
            'stock' => 'required|integer',
            'id_category' => 'required|exists:categories,id_category',
            'description' => 'nullable|string',
        ]);
    
    
        // Simpan data ke dalam database
        $product = Product::create($validatedData);
    
        // Cek apakah produk berhasil dibuat
        if ($product) {
            return redirect()->route('product')->with('success', 'Product added successfully.');
        } else {
            return redirect()->back()->with('error', 'Failed to add product.');
        }
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
        $product = Product::findOrFail($id); // Ambil data produk berdasarkan ID
        $categories = Category::all(); // Ambil semua kategori
        return view('product.edit', compact('product', 'categories'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id)
    {
        $request->validate([
            'product_name' => 'required|string|max:255',
            'price' => 'required|numeric|min:0',
            'stock' => 'required|integer|min:0',
            'id_category' => 'required|exists:categories,id_category', // Pastikan kategori ada
            'description' => 'nullable|string',
        ]);

        $product = Product::findOrFail($id); // Ambil produk berdasarkan ID

        // Update data produk
        $product->update([
            'product_name' => $request->input('product_name'),
            'price' => $request->input('price'),
            'stock' => $request->input('stock'),
            'id_category' => $request->input('id_category'),
            'description' => $request->input('description'),
        ]);

        // dd($request->all());  // Untuk memastikan kategori diterima

        return redirect()->route('product')->with('success', 'Product updated successfully!');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        $product = Product::findOrFail($id); // Ambil produk berdasarkan ID
        $product->delete();

        return redirect()->route('product')->with('success', 'Product deleted successfully!');
    }

    // Menampilkan form stok produk
    public function restockForm($id)
    {
    $product = Product::findOrFail($id); // Ambil produk berdasarkan ID
    return view('stock.restock', compact('product'));
    }

    // Menambah stok produk
    public function restock(Request $request, $id)
    {
    // Validasi input stok
    $request->validate([
        'stock_add' => 'required|integer|min:1',
    ]);

    // Ambil produk berdasarkan ID
    $product = Product::findOrFail($id);

    // Tambahkan stok yang baru
    $product->stock += $request->input('stock_add');  // Menambahkan stok baru
    $product->save();  // Simpan perubahan

    // Redirect dengan pesan sukses
    return redirect()->route('product')->with('success', 'Product restocked successfully!');
    }
}
