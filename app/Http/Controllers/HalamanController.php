<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\View\View;
use App\Models\Product;
use App\Models\Category;
use App\Models\Transaction;
use App\Models\TransactionItem;
class HalamanController extends Controller
{

 /**
     * index
     *
     * @return void
     */
    public function product() : View
    {
         // Ambil data produk dengan pagination, 10 produk per halaman
         $products = Product::with('category')->get();

         // Kirim data produk ke view dashboard
         return view('product.index', compact('products'));
    }

     /**
     * index
     *
     * @return void
     */
    public function stocks() : View
    {
        //render view with products
        return view('stock.stocks');
    }

    /**
     * index
     *
     * @return void
     */
    public function report() : View
    {
        //render view with products
        return view('reporting.index');
    }


    /**
     * index
     *
     * @return void
     */
    public function transactions() : View
    {
        //render view with products
        $transactions = Transaction::all();
        return view('transactions.index', compact('transactions'));
    }
    
}
