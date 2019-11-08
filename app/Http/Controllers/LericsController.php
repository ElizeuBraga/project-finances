<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Mail;
use App\Leric;

class LericsController extends Controller
{
    public function wordCount(){
        $wordCount = Leric::count();

        return response()->json($wordCount);
    }

    public function meningInWiki($word){
        $response = \Unirest\Request::get("https://linguee-api.herokuapp.com/api?q='$word'&src=en&dst=pt");
        $responseJson = json_decode($response->raw_body, true);
        // dd($responseJson);
        $translate = [];
        if(array_key_exists('exact_matches', $responseJson)){
            $translate = [
                $responseJson['exact_matches'][0]['translations'][0]['text'],
                $responseJson['exact_matches'][0]['translations'][0]['examples'][0]['source'],
                $responseJson['exact_matches'][0]['translations'][0]['examples'][0]['target'],
            ];
        }
        dd($responseJson);
        return $translate;
    }

    public function sendWordsToMail(Request $request){
            try {
                $data = $request->unknowWords;
                $email = \Auth::user()->email;
                Mail::send('mails.sendDonKnowWords', ['data' => $data], function($message) use($email){
                $message->to($email)->subject('Palavras desconhecidas');
                $message->from('idrinktcc@gmail.com');
                });
    
                return response()->json($data);
            } catch (\Throwable $th) {
                //throw $th;
                return response()->json($th);
            }
        }
        
    public function storeWord(Request $request){
        $translate = $this->meningInWiki($request->word);
        if (Leric::where('word', '=', $request->word)->count() > 0) {
            $word = Leric::where('word', '=', $request->word)->first();
            try {
                //code...
                $word->translate = $translate[0];
            } catch (\Throwable $th) {
                //throw $th;
            }
            try {
                $word->english = $translate[1]; 
            } catch (\Throwable $th) {
                //throw $th;
            }

            try {
                //code...
                $word->portuguese = $translate[2]; 
            } catch (\Throwable $th) {
                //throw $th;
            }
            $dots = $word->dots;
            if($request->status == '1'){
                $dots +=1;
            }
            if($request->status == '0'){
                $dots -=1;   
            }
            if($dots <= 3){
                $word->update(['dots' => $dots]);
            }
        }else{
            $word = new Leric;
            $word->word = $request->word; 
            try {
                //code...
                $word->translate = $translate[0];
            } catch (\Throwable $th) {
                //throw $th;
            }
            try {
                $word->english = $translate[1]; 
            } catch (\Throwable $th) {
                //throw $th;
            }

            try {
                //code...
                $word->portuguese = $translate[2]; 
            } catch (\Throwable $th) {
                //throw $th;
            }

            $word->save();
        }

        $wordCount = Leric::count();
        return response()->json($wordCount);
    }

    public function process_leric($word){
        $le = str_word_count($word, 1);
        $l = array_map('strtolower', $le);
        $leric_processed = [];

        for ($i=0; $i < count($l) ; $i++) {
            $element = null;
            $dots = 0;
            if(in_array($l[$i], $leric_processed)){
                
            }else{
                if(Leric::where('word', '=', $l[$i])->count() > 0){
                    $word = Leric::where('word', '=', $l[$i])->first();
                    $dots = $word->dots;
                    if($dots >= 3){
                    }else{
                        $element = $l[$i];
                        array_push($leric_processed, $element);
                    }
                }else{
                        $element = $l[$i];
                        array_push($leric_processed, $element);
                }
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
        $wordCount = Leric::count();
        return view('lerics', compact('wordCount'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $all = Leric::where('dots', '=', 0)->get();

        // dd($all);
        return $all[0]->word;
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
