<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Auth;
use App\Models\User;
use App\Models\Message;


class OtherInfoController extends Controller
{
    //
    public function otherinfo(Request $request)
    {
    	$otherid = $request->input('id');
    	$otherdata = User::find($otherid);

    	if ($otherid == Auth::user()->id) {
    		return view('home');
    	} else {
    		$conversation = Message::select('*')
            ->where([['fromid', '=', Auth::user()->id], ['toid', '=', $otherid]])
            ->orWhere([['fromid', '=', $otherid], ['toid', '=', Auth::user()->id]])->get();
            if (is_null($conversation)){
                return view('otherinfo', ['otherdata'=>$otherdata]);
            }
    		return view('otherinfo', ['otherdata'=>$otherdata], ['conversation'=>$conversation]);
    	}
    }
    public function editmess(Request $request)
    {
        if ($request->submit == 'change') {
            $mess = Message::find($request->input('messid'));
            $mess->mess = $request['mess'];
            $mess->save();

            return $this->otherinfo($request);
        } else if ($request->submit == 'send') {
            $newmess = new Message;
            $newmess->fromid = Auth::user()->id;
            $newmess->toid = $request->input('id');
            $newmess->mess = $request['newmess'];
            $newmess->save();
            return $this->otherinfo($request);
        } else {
            Message::find($request->input('messid'))->delete();
            return $this->otherinfo($request);
        }
    }
}
