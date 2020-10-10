<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
//use Illuminate\Support\Facades\Hash;
use App\Models\User;

class ChangeInfoController extends Controller
{
    //
    public function changeinfo()
    {
        if (Auth::user()) {
            $user = User::find(Auth::user()->id);

            return view('changeinfo')->withUser($user);
        }
    }

    public function update(Request $request)
    {
        $user = User::find(Auth::user()->id);

        if ($request['name'] != ''){
            $user->name = $request['name'];
        }
        $user->email = $request['email'];
        if ($request['password'] != ''){
            $user->password = bcrypt($request['password']);
        }
        $user->nameofuser = $request['nameofuser'];
        $user->phone = $request['phone'];

        $user->save();

        return redirect('home');
    }
}
