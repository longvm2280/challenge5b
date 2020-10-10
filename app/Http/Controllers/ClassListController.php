<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use App\Models\User;

class ClassListController extends Controller
{
    //
    public function classlist()
    {
    	$data = User::all();
        return view('classlist', ['data'=>$data]);
    }
}
