<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\RevenueAmount;
use App\ExpensesAmount;
use Auth;

class HomeController extends Controller
{
    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {
        $this->middleware('auth');
    }

    /**
     * Show the application dashboard.
     *
     * @return \Illuminate\Contracts\Support\Renderable
     */
    public function index()
    {
        $revenueAmounts = \App\RevenueAmount::where('user_id', Auth::user()->id)->get();
        $expensesAmounts = \App\ExpensesAmount::where('user_id', Auth::user()->id)->get();
        $totalRevenue = 0;
        $totalExpense = 0;
        foreach ($revenueAmounts as $rA) {
            $totalRevenue += $rA->value;
        }
        foreach ($expensesAmounts as $eA) {
            $totalExpense += $eA->value;
        }
        return view('home', compact('revenueAmounts', 'totalRevenue', 'totalExpense'));
    }
}
