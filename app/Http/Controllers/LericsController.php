<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Mail;

class LericsController extends Controller
{
    public function sendWordsToMail(Request $request){
            //code...
            $email = \Auth::user()->email;
            
            Mail::send('mails.sendDonKnowWords', ['data' => $request], function($message) use($email){
                $message->to($email)->subject('Palavras desconhecidas');
                $message->from('elizeubraga712@gmail.com');
            });

            // return response()->json(['response'=>'Email enviado']);
            return response()->json($email);
    }

    public function process_leric($leric){
        $l = str_word_count($leric, 1);
        $leric_processed = [];

        for ($i=0; $i < count($l) ; $i++) {
            $element = null;
            if(in_array($l[$i], $leric_processed)){

            }else{
                $element = $l[$i];
                array_push($leric_processed, $element);
            }
        }

        return $leric_processed;
    }
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        return view('lerics');
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
        $leric_processed = $this->process_leric($request->leric);

        return response()->json($leric_processed, 200);
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
