<?php

namespace App\Http\Controllers;

use App\ExpensesAmount;
use Illuminate\Http\Request;

class ExpensesAmountController extends Controller
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
            ExpensesAmount::create($request->all());
            return redirect()->back()->with('success', 'Salvo com sucesso!');
        } catch (\Throwable $th) {
            // throw $th;
            return redirect()->back()->with('error', 'Erro!');

        }
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\ExpensesAmount  $expensesAmount
     * @return \Illuminate\Http\Response
     */
    public function show(ExpensesAmount $expensesAmount)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\ExpensesAmount  $expensesAmount
     * @return \Illuminate\Http\Response
     */
    public function edit(ExpensesAmount $expensesAmount)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\ExpensesAmount  $expensesAmount
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, ExpensesAmount $expensesAmount)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\ExpensesAmount  $expensesAmount
     * @return \Illuminate\Http\Response
     */
    public function destroy(ExpensesAmount $expensesAmount)
    {
        //
    }
}
