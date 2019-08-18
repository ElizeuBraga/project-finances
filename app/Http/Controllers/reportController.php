<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use DB;
use Auth;
use Carbon\Carbon;


class ReportController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $date = Carbon::now();
        // dd($date->month);


        $exReports = DB::table('expenses')
        ->select('categories.name', DB::raw('SUM(expenses.price) as total_category'))
        ->join('products', 'products.id', '=', 'expenses.product_id')
        ->join('users', 'users.id', '=', 'expenses.user_id')
        ->join('categories', 'categories.id', '=', 'products.category_id')
        ->where('users.id', '=', Auth::user()->id)
        ->whereMonth('expenses.created_at', '=', $date->month)
        ->groupBy(DB::raw('categories.name','products.category_id'))
        ->orderBy('total_category', 'desc')
        ->get();

        // $total_price = $exReports->sum('price');
        // dd([Auth::user()->name => $exReports]);

        return view('report', compact('exReports'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        //
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        //
    }
}
