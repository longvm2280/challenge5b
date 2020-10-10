<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Homework;
use Illuminate\Support\Facades\Auth;

class HomeworkController extends Controller
{
    //
    public function index()
    {
    	$allhomework = Homework::select('*')
    	->where('questionid', '=', '0')->get();
    	if (is_null($allhomework))
    	{
    		return view('homework');
    	}
    	return view('homework', ['allhomework'=>$allhomework]);
    }
	public function upload(Request $request)
	{
		$filename = $request->file->getClientOriginalName();
		$filepath = $request->file('file')->storeAs('uploads', $filename, 'public');
		if (Auth::user()->usertype == 1) {
			$newhomework = new Homework;
			$newhomework->filename = $filename;
			$newhomework->filepath = $filepath;
			$newhomework->uploaderid = Auth::user()->id;
			$newhomework->questionid = 0;
			$newhomework->save();
		} else {
			$newhomework = new Homework;
			$newhomework->filename = $filename;
			$newhomework->filepath = $filepath;
			$newhomework->uploaderid = Auth::user()->id;
			$newhomework->questionid = $request->input('questionid');
			$newhomework->save();
		}
		
		return $this->index();
	}

	public function download ($filename)
	{
		$filepath = storage_path('app/public/uploads/' .$filename);
		return response()->download($filepath);
	}
}
