<?php

namespace App\Http\Controllers;

use App\Models\Product;
use App\Models\Transaction;
use Illuminate\Http\Request;

class DashboardController extends Controller
{
    public function index(){
        $transactions = Transaction::with('produk')->latest()->take(5)->get();
        $totalTransactions = Transaction::count();
        $totalProducts = Product::count();
        return view('dashboard', compact('transactions','totalProducts','totalTransactions'));
    }
}
