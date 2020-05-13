<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Member;
use App\Team;
use App\Qr;

class 4ziController extends Controller
{
	public function login(Request $request){
		//$valid = Member::where('password', '=', $request->password)->count();
        //return($valid);
		//return($request->password);
    	return view('welcome');
	}
}
