<?php

namespace App\Http\Controllers;
use Image;
use Sentinel;
use App\UserInfo;
use Illuminate\Http\Request;
use Auth;
class UserInfoConntroller extends Controller
{
    public function store(Request $request)
    {
        $this->validate($request, [
            'hajNumber' => 'required|min:3|max:50',
            'boardNumber' => 'required|min:3|max:50',
            'address' => 'required|min:3|max:50',
            'hamlaName' => 'required|min:3|max:50',
            'hamlaNumber' => 'required|min:3|max:50',
            'hamlaContact' => 'required|min:3|max:50',
            'healty' => 'min:3|max:50',
            'avatar' => 'required',
            'lat'=>'required',
            'long'=>'required',
        ]);
        $userInfo=new UserInfo();
            $userInfo->user_id = Sentinel::getUser()->id;
        $userInfo->hajNumber=$request->input('hajNumber');
        $userInfo->boardNumber=$request->input('boardNumber');
        $userInfo->address=$request->input('address');
        $userInfo->hamlaName=$request->input('hamlaName');
        $userInfo->hamlaNumber=$request->input('hamlaNumber');
        $userInfo->hamlaContact=$request->input('hamlaContact');
        $userInfo->healty=$request->input('healty');
        $userInfo->lat=$request->input('lat');
        $userInfo->long=$request->input('long');
        if ($request->file('avatar')) {
            $file = $request->file('avatar');
            $destinationPath = 'public/images';
            $filename=$file->getClientOriginalName();
            // dd($filename);
            $file->move($destinationPath, $filename);
        }
        $userInfo->avatar=$filename;
        $userInfo->save();
return redirect()->route('index');
    }
    public function GetUserInfo()
    {
        return view('auth.GetUserInfo');
    }
}
