<?php

namespace App\Http\Controllers;

use App\Http\Requests\ProfileRequest;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class ProfileController extends Controller
{
    public function userProfile(){

        $user=Auth::user()->id;
        $data['info']=User::where('id',$user)->first();
        //dd($data);
        return view('profile.profile',$data);
    }

    public function update(ProfileRequest $request){

       auth::user()->update($request->only('first_name','last_name','email','phone'));
        
       return redirect()->route('dashboard');
    
    }
}
