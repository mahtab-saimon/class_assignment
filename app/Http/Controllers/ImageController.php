<?php

namespace App\Http\Controllers;
use App\Models\MultipleImage;
use Image;
use Illuminate\Support\Str;
use Illuminate\Http\Request;

class ImageController extends Controller
{
    public function upload(){
        $images = MultipleImage::all();
        return view('admin_layouts.multipleImage',compact('images'));
    }

    public function uploadImage(Request $req){

        $title = $req->title;


        $images=array();
        $originalImages= $req->file('filename');

        if ($originalImages){
            foreach($originalImages as $originalImage){
                $thumbnailImage = Image::make($originalImage);

                $thumbnailPath = public_path().'/thumbnail/';
                $originalPath = public_path().'/images/';

                $temp = $originalImage->getClientOriginalName();

                $temp_ext = explode(".",$temp);
                $ext = end($temp_ext);

                $filename = time().".".$ext;
                $images[]=$filename;

                $thumbnailImage->save($originalPath.$filename);
                $thumbnailImage->resize(150,150);
                $thumbnailImage->save($thumbnailPath.$filename);

                $imagemodel= new MultipleImage();
                $imagemodel->filename=$filename;
                $imagemodel->save();

            }
            return redirect()->back()->with('msg','Succesfully Uploaded');
        }
    }


}
