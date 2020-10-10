<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Challenge;

class ChallengeController extends Controller
{
    //
    public function index()
    {
    	$challenges = Challenge::all();
    	if (is_null($challenges))
    	{
    		return view('challenge');
    	}
    	return view('challenge', ['challenges'=>$challenges]);
    }
    public function upload_challenge(Request $request)
    {
    	$challenges = Challenge::all();
		$count = count($challenges) + 1;
    	$filename = $request->file->getClientOriginalName();
		$filepath = $request->file('file')->storeAs('uploads/challenge' .$count, $filename, 'public');
		$newchallenge = new Challenge;
		$newchallenge->challenge = 'challenge'.$count;
		$newchallenge->suggestion = $request['suggestion'];
		$newchallenge->save();
		return $this->index();
    }
}
