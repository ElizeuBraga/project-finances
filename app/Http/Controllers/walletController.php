<?php

namespace App\Http\Controllers;

use Illuminate\Support\Facades\Input;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use App\wallet;
use DB;

class walletController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        // $dataAt = now();
        $userName = Auth::user()->name;
        $userId = Auth::user()->id;
        setlocale(LC_TIME, 'pt_BR', 'pt_BR.utf-8', 'pt_BR.utf-8', 'portuguese');
        // date_default_timezone_set('America/Sao_Paulo');
        $day =  strftime('%A, %d de %B de %Y', strtotime('today'));

        $incomes = DB::table('incomes')
        ->select('id','name')
        ->where('user_id', '=', $userId)
        ->get();

        $reports = DB::table('wallets')
        ->select('id', 'money', 'created_at')
        ->get();

        return view('wallet', ['userName'=>$userName, 'day' => $day], compact('incomes', 'reports'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('wallet');
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
        $input = Input::all();
        $wallet = new wallet();
        $wallet -> fill($input);
        $wallet->save();
        return redirect('/carteira');
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
        $wallet = Wallet::find($id);
        $wallet->delete();
        return redirect('/carteira');
    }
}
