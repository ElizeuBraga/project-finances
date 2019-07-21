<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Freelance;
use Illuminate\Support\Facades\Auth;
use DB;
use Carbon\Carbon;
class FreelanceController extends Controller
{
    public function index()
    {
        // return view('freelances');
    }

    public function create()
    {
        $date = Carbon::now();

        $today = $date->day;
        $rates = DB::table('rates')->get();

        $regions = DB::table('regions')
        ->orderBy('name', 'asc')
        ->where('user_id', '=', Auth::user()->id)
        ->get();

        $dadosEntregas = DB::table('freelances')
        ->select('freelances.obs', 'regions.name as regionName', 'rates.price as priceRegion', 'freelances.created_at')
        ->join('users', 'users.id', '=', 'freelances.user_id')
        ->join('regions', 'regions.id', '=', 'freelances.region_id')
        ->join('rates', 'rates.id', '=', 'regions.rate_id')
        ->where('users.id', '=', Auth::user()->id)
        ->orderBy('freelances.created_at')
        ->get();

        // dd([Auth::user()->name => $dadosEntregas]);

        $total_price = $dadosEntregas->sum('priceRegion');

        return view('freelances', compact('rates', 'regions', 'dadosEntregas', 'total_price'));        
    }

    public function store(Request $request)
    {
        $freelance = new Freelance();
        $freelance->region_id = $request['region_id'];
        $freelance->obs = $request['obs'];
        $freelance->user_id = Auth::user()->id;
        $freelance->save();
        return redirect()->back()->with('success', 'Salvo com sucesso');
    }
     
    public function show($id)
    {
        //
    }

    public function edit($id)
    {
        //
    }

    public function update(Request $request, $id)
    {
        //
    }

    
    public function destroy($id)
    {
        //
    }
}
