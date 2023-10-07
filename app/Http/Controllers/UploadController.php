<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\UploadImage;

class UploadController extends Controller
{
    public function upload(Request $request){
        // echo "<pre>";
        // print_r($request->all());
        $fileName = time()."img.".$request->file('image')->getClientOriginalExtension();
        $request->file('image')->storeAs('uploads',$fileName);

        $data = new UploadImage();
        $data->url=$fileName;
        $data->save();

        return redirect('/');

    }
}
