<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Homework;

class BailamController extends Controller
{
    //
    public function index(Request $request)
    {
    	$questionid = $request->input('questionid');
    	$bailams = Homework::select('*')
    	->where('questionid', '=', $questionid)->get();
    	return view('bailam', ['bailams'=>$bailams ]);
    }

    public function download_bailam($filename)
    {
    	$filepath = storage_path('app/public/uploads/' .$filename);
		return response()->download($filepath);
    }
}
