<?php

namespace App\Http\Controllers;
use \App\Revenue;
use DB;
use Auth;
use \App\RevenueAmount;
use Illuminate\Http\Request;

class RevenuesController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $user = Auth::user();
        $revenues = Revenue::where('user_id', '=', $user->id)->get();
        $revenueAmounts = DB::table('revenue_amounts')
        ->join('revenues', 'revenues.id', '=', 'revenue_amounts.revenue_id')
        ->select('revenue_id',DB::raw('sum(value) as total'))
        ->groupBy(DB::raw('revenue_id'))
        ->where('revenues.user_id', '=', $user->id)
        ->get();

        return view('revenues', compact('revenues', 'revenueAmounts'));
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
            Revenue::create($request->all());
            return redirect()->back()->with('success', 'Salvo com sucesso!');
        } catch (\Throwable $th) {
            return  redirect()->back()->with('error', 'Erro!');
        }
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
