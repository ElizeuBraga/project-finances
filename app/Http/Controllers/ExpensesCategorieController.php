<?php

namespace App\Http\Controllers;

use App\ExpensesCategorie;
use Auth;
use Illuminate\Http\Request;

class ExpensesCategorieController extends Controller
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
        try {
            if($request->user_id != Auth::user()->id){
                return  redirect()->back()->with('error', 'Erro!');
            }
            ExpensesCategorie::create($request->all());
            return redirect()->back()->with('success', 'Salvo com sucesso!');
        } catch (\Throwable $th) {
            // return  redirect()->back()->with('error', 'Erro!');
            return  $th;
        }
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\ExpensesCategorie  $expensesCategorie
     * @return \Illuminate\Http\Response
     */
    public function show(ExpensesCategorie $expensesCategorie)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\ExpensesCategorie  $expensesCategorie
     * @return \Illuminate\Http\Response
     */
    public function edit(ExpensesCategorie $expensesCategorie)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\ExpensesCategorie  $expensesCategorie
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, ExpensesCategorie $expensesCategorie)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\ExpensesCategorie  $expensesCategorie
     * @return \Illuminate\Http\Response
     */
    public function destroy(ExpensesCategorie $expensesCategorie)
    {
        //
    }
}
