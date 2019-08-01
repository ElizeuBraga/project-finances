<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use App\User;
use Auth;

class UserController extends Controller
{
    public function profile(){
    	return view('profile.profile');
    }

    public function edit(User $user){
    	$user = Auth::user();

    	return view('profile.profile_update', compact('user'));
    }

    public function update(User $user){

    	$this->validate(request(), [
            'name' => 'required',
            'email' => 'required|email',
            'password' => 'confirmed',
            'phone' => 'required'
        ]);

    	$user->name = request('name');
    	$user->email = request('email');
    	$user->phone = request('phone');
    	$user->password = bcrypt(request('password'));

    	$user->save();

    	return back();
    }
}
