<?php

namespace App\Http\Controllers;

use App\Models\Setting;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\File;


class SettingController extends Controller
{
    public function index()
    {
        return view('backend.settings.apparance');
    }
    public function edit($id)
    {
        $setting = Setting::find($id);
        return view('backend.settings.apparance',compact('setting'));
    }
    public function apperanceUpdate(Request $request,$id)
    {
        
        $settings = Setting::find($id);
        $settings->app_name = $request->input('app_name');
        if($request->hasFile('logo_image'))
        {
            $destination = 'uploads/setting/'.$settings->logo_image;
            if(File::exists($destination))
            {
                File::delete($destination);
            }
            $file = $request->file('logo_image');
            $extension = $file->getClientOriginalExtension();
            $filename = time(). '.' .$extension;
            $file->move('uploads/setting/',$filename);
            $settings->logo_image = $filename;
        }
        if($request->hasFile('fav_image'))
        {
            $destination = 'uploads/setting/'.$settings->fav_image;
            if(File::exists($destination))
            {
                File::delete($destination);
            }
            $file = $request->file('fav_image');
            $extension = $file->getClientOriginalExtension();
            $filename = time(). '.' .$extension;
            $file->move('uploads/setting/',$filename);
            $settings->fav_image = $filename;
        }
        $settings->update();
        return back();
        // return redirect()->route('product.index');
    }

   
}
