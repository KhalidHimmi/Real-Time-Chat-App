<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class SettingController extends Controller
{
    public function index()
    {
        return view('setting');
    }

    public function showChangePhotoGet() {
        return view('image');
    }

    public function upload(Request $request)
    {
        if($request->hasFile('image')){
            $filename = $request->image->getClientOriginalName();
            $request->image->storeAs('images',$filename,'public');
            // $url = Storage::url('/storage');
            Auth()->user()->update(['image'=>$filename]);
        }
        return redirect()->back()->with('message','Profile picture updated successfully');
    }
}
