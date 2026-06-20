<?php

namespace App\Http\Controllers;

use App\Models\Transaction;
use Illuminate\Http\Request;

class CustomerPurchaseController extends Controller
{
    public function index()
    {
        return view('customer.purchase');
    }

    public function transactions()
    {
        $transactions = Transaction::latest()->paginate(10);
        return view('customer.transactions', compact('transactions'));
    }
}
