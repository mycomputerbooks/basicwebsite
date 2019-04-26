<?php

namespace App\Http\Controllers\courses\foundations;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Storage;
use File;
use Auth;
use Image;

class UploadController extends Controller
{
    public function getUpload()
    {
        return view('courses.foundations.upload');
    }

    public function postUpload(Request $request)
    {
        $user = Auth::user();
        $file = $request->file('picture');
        $filename = uniqid($user->id."_").".".$file->getClientOriginalExtension();
        Storage::disk('do_spaces')->put($filename, File::get($file), 'public');
        $url = Storage::disk('do_spaces')->url($filename);
        $user->profile_pic = $url;
        $user->save();
        // process, resize, and crop our image into a thumbnail
        $thumb = Image::make($file);
        $thumb->fit(200);
        $jpg = (string) $thumb->encode('jpg');
        // 3) rename the file so we know its a thumbnail
        $thumbName = pathinfo($filename, PATHINFO_FILENAME).'-thumb.jpg';
        // 4) save into our storage
        Storage::disk('do_spaces')->put($thumbName, $jpg, 'public');


        return view('courses/foundations/upload-complete')->with('filename', $filename)->with('url', $url);
    }


    public function futureUploads(){
        dd("IT WORKS");
        //echo 'the future';
        // $url = "https://mycomputerbooks.com/fileuploadsLRH/uploads/cdv_photo_011.jpg";
        // $contents = file_get_contents($url);
        // $name = substr($url, strrpos($url, '/') + 1);
        // Storage::disk('do_spaces')->put($name, $contents, 'public');
        // $path ="/Users/mark_prouty/Dropbox/MacBookPro/sites/hosts/basicwebsite/public/storage/uploads/cdv_photo_005.jpg";
        // if (unlink($path)) {
        //     echo 'File Sucessfully Removed';
        // }
        // else {
        //     echo 'Something Wrong';
        // }
    }

    // https://laracasts.com/discuss/channels/laravel/storing-image-file-retrieved-from-external-url?page=1

    // public function postUpload(Request $request)
    // {
    //     $user = Auth::user();
    //     $file = $request->file('picture');
    //     $filename = uniqid($user->id."_").".".$file->getClientOriginalExtension();
    //     $url = Storage::url($filename);
    //     // Storage::disk('public')->put($filename, File::get($file));
    //     Storage::disk('do_spaces')->put($filename, File::get($file), 'public');
    //     Storage::disk('do_spaces')->url($filename);


    //     // $user->profile_pic=$filename;

    //     $user->profile_pic=$url;
    //     $user->save();
    //     return view('courses/foundations/upload-complete')->with('filename', $filename)->with('url', $url);


    // }



}
