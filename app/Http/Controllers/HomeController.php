<?php

namespace App\Http\Controllers;
use Sentinel;
use App\UserInfo;
use Illuminate\Http\Request;

class HomeController extends Controller
{
    public function home($value='')
    {
        if (Sentinel::check() ){
        $userInfo=UserInfo::where('user_id',Sentinel::getUser()->id)->get();
        }
    	return view('welcome',compact('userInfo'));
    }
    public function YourhomePage($value='')
    {
    	return view('home');
    }
    public function dashboard($value='')
    {
    	return view('backEnd.dashboard');
    }
}
