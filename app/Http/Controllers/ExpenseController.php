<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Expense;
use Auth;
use DB;

class ExpenseController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        return view('expenses');
    }



    // public function products(){
    //     return $this->belongsTo('App\Products');
    // }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        // $products = \App\Product::all();
        $products = DB::table('products')
        ->join('users', 'products.user_id', '=', 'users.id')
        ->select('products.id', 'products.name')
        ->where('products.user_id', '=', Auth::user()->id)
        ->get();

        // return var_dump($products);
        // $expenses = \App\Expense::all();
        $expenses = DB::table('expenses')
        ->join('products', 'expenses.product_id', '=', 'products.id')
        ->join('users', 'expenses.user_id', '=', 'users.id')
        // ->join('categories', 'products.category_id', '=', 'categories.id')
        ->select('products.name', 'expenses.price')
        ->where('users.id', '=', Auth::user()->id)
        // ->orderBy('category_name')
        ->get();

        // return var_dump($expenses);

        $total_price = $expenses->sum('price');

        return view('expenses', compact('products', 'total_price', 'expenses'));        
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $exoense = new Expense();
        $request['price'] = str_replace(',', '.', $request['price']);
        $exoense->price = $request['price'];
        $exoense->product_id = $request['product_id'];
        $exoense->user_id = Auth::user()->id;
        $exoense->save();

        return redirect()->back()->with('success', 'Salvo com sucesso');
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
