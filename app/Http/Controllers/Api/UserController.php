<?php

namespace App\Http\Controllers\Api;

use Illuminate\Http\Request;
use Auth;
use Str;
use App\User;
use App\Http\Controllers\Controller;

class UserController extends Controller
{
    public function login(Request $request){

        // return response()->json($request);
        $credentials = request(['email', 'password']);

        if (! Auth::attempt($credentials)) {
            return response()->json('Acesso negado', 401);
        }

        $user = $request->user();

        if($user->api_token == null){
            $token = Str::random(60);

            $user->api_token = $token;

            $user->save();
        }

        return response()->json($user, 200);
    }

    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $user = Auth::user();

        return response()->json($user);
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $request->merge(['api_token' => Str::random(60), 'password' => bcrypt($request->password)]);
        // return response()->json($request);
        $user = User::create($request->all());
        return response()->json($user, 200);
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
