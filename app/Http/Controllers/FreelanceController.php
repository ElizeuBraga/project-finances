<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Freelance;
use Illuminate\Support\Facades\Auth;
use DB;
class FreelanceController extends Controller
{
    public function index()
    {
        return view('freelances');
    }

    public function create()
    {
        $rates = DB::table('rates')->get();
        // return view('freelances', compact('rates'));

        $regions = DB::table('regions')->get();

        $dadosEntregas = DB::table('regions')
        ->join('rates', 'rates.id', '=', 'regions.rate_id')
        ->join('users', 'users.id', '=', 'regions.user_id')
        ->join('freelances', 'freelances.region_id', '=', 'regions.id')
        ->select('regions.name as regionName', 'rates.price as priceRegion', 'freelances.obs')
        ->where('users.id', '=', Auth::user()->id)->get();

        $date = now();
        $processdate = explode("-", $date);
        $month = $processdate[2];
        // dd($month);

        $total_price = $dadosEntregas->sum('priceRegion');

        return view('freelances', compact('rates', 'regions', 'dadosEntregas', 'total_price'));        
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $freelance = new Freelance();
        $freelance->region_id = $request['region_id'];
        $freelance->obs = $request['obs'];
        $freelance->user_id = Auth::user()->id;
        $freelance->save();
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
