<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Challenge;
use Illuminate\Support\Facades\File;

class AnswerController extends Controller
{
    //
    public function index(Request $request)
    {
    	$challengeid = $request->input('challengeid');
    	$challenge = Challenge::select('*')
    	->where('id', '=', $challengeid)->get();
    	return view('answer', ['challenge'=>$challenge[0]]);
    }

    public function answer(Request $request)
    {
    	$filename = $request['answer'] . '.txt';
    	$challengeid = $request->input('challengeid');
    	$challenge = Challenge::select('*')
    	->where('id', '=', $challengeid)->get();
    	$folder = $challenge[0]['challenge'];
    	if (File::exists('storage/app/public/uploads'.$folder.$filename)){
    		$filecontent = File::get(storage_path('app/public/uploads/'.$folder.'/'.$filename));
    	}
    	if (!isset($filecontent) || is_null($filecontent)){
    		return $this->index($request);
    	} else {
    		return view('answer', ['challenge'=>$challenge[0]], ['filecontent'=>$filecontent]);
    	}
    }
}
