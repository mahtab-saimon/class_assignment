<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Product;
use Image;


class ProductController extends Controller
{
    public function show()
    {
        $posts = Product::with('category')->get();

        return response()->json([
            'posts'=>$posts,
        ],200);
    }
    public function store(Request $request)

    {

        $image=$request->image;

        $product = new Product();
        $product->product_name=$request->product_name;
        $product->cat_id=$request->cat_id;
        $product->productDescription=$request->productDescription;
        $product->buyingPrice=$request->buyingPrice;
        $product->sellingPrice=$request->sellingPrice;
        $product->productCode=$request->productCode;
        $image=$request->image;
        if ($image) {
            $strpos = strpos($image,';');
            $sub = substr($image,0,$strpos);
            $ex = explode('/',$sub)[1];
            $name = time().".".$ex;
            $img = Image::make($image)->resize(200, 200);
            $upload_path = public_path()."/backend/image/";
            $img->save($upload_path.$name);
            $product->image = $name;
            $product->save();
        } else{
            $product->save();
        }
        // $product->size=$request->size;
       // $image=$product->image=$request->file('image');

    /*    if ($originalImages){
            foreach($originalImages as $originalImage){
                $thumbnailImage = Image::make($originalImage);

                $thumbnailPath = public_path().'/thumbnail/';
                $originalPath = public_path().'/images/';

                $temp = $originalImage->getClientOriginalName();

                $temp_ext = explode(".",$temp);
                $ext = end($temp_ext);

                $filename = time().".".$ext;
                $images=$filename;

                $thumbnailImage->save($originalPath.$filename);
                $thumbnailImage->resize(150,150);
                $thumbnailImage->save($thumbnailPath.$filename);
                $product->filename=$filename;
                $product->save();

            }
           // return redirect()->back()->with('msg','Succesfully Uploaded');
        }*/


       /* if ($image){

                $thumbnailImage = Image::make($image);

                $thumbnailPath = public_path().'/thumbnail/';
                $originalPath = public_path().'/images/';

                $temp = $image->getClientOriginalName();

                $temp_ext = explode(".",$temp);
                $ext = end($temp_ext);

                $filename = time().".".$ext;
                $thumbnailImage->save($originalPath.$filename);
                $thumbnailImage->resize(150,150);
                $thumbnailImage->save($thumbnailPath.$filename);
                $product->filename=$filename;
                $product->save();

           // return redirect()->back()->with('msg','Succesfully Uploaded');
        }else{
                $product->save();
            }*/

       /* $image=$product->image=$request->file('image');
        if ($image) {
            $image_name=hexdec(uniqid());
            $ext=strtolower($image->getClientOriginalExtension());
            $image_full_name=$image_name.'.'.$ext;
            $upload_path='public/backend/image/';
            $image_url=$upload_path.$image_full_name;
            $success=$image->move($upload_path,$image_full_name);
            $product['image']=$image_url;
            $product->save();
        }else{
            $product->save();
        }*/


       /* $image=$product->image=$request->file('image');
        if ($image) {
            $image_name=hexdec(uniqid());
            $ext=strtolower($image->getClientOriginalExtension());
            $image_full_name=$image_name.'.'.$ext;
            $upload_path='public/backend/image/';
            $image_url=$upload_path.$image_full_name;
            $success=$image->move($upload_path,$image_full_name);
            $product['image']=$image_url;
            $product->save();
        } else{
            $product->save();
        }*/
    }


    public function edit($id)
    {
        $post = Product::find($id);
        return response()->json([
            'post'=>$post
        ],200);

    }


    public function update(Request $request, $id)
    {
        $validatedData = $request->validate([

        ]);
        $product = new Product();


        $product = Product::find($id);
        $product->product_name=$request->product_name;
        $product->cat_id=$request->cat_id;
        $product->productDescription=$request->productDescription;
        $product->buyingPrice=$request->buyingPrice;
        $product->sellingPrice=$request->sellingPrice;
        $product->productCode=$request->productCode;




        if($request->image!=$product->image){
            $strpos = strpos($request->image,';');
            $sub = substr($request->image,0,$strpos);
            $ex = explode('/',$sub)[1];
            $name = time().".".$ex;
            $img = Image::make($request->image)->resize(200, 200);
            $upload_path = public_path()."/backend/image/";
            $image = $upload_path. $product->image;
            $img->save($upload_path.$name);

            if(file_exists($image)){
                @unlink($image);
            }
        }else{
            $name = $product->image;
        }



        $product->image = $name;
        $product->save();


        /*$image=$request->image;
        if ($request->image!=$product->image) {
            $strpos = strpos($image,';');
            $sub = substr($image,0,$strpos);
            $ex = explode('/',$sub)[1];
            $name = time().".".$ex;
            $img = Image::make($image)->resize(200, 200);
            $upload_path = public_path()."/backend/image/";
            $imag = $upload_path. $product->image;
            $img->save($upload_path.$name);
            if(file_exists($imag)){
                @unlink($imag);
            }else{
                $name = $product->image;
            }
            $product->photo = $name;
            $product->photo = image;
            $product->save();

        } else{
            $product['image']=$request->old_image;
            $product->save();
        }*/



       /* $image=$product->image=$request->file('image');
        if ($image) {
            $image_name=hexdec(uniqid());
            $ext=strtolower($image->getClientOriginalExtension());
            $image_full_name=$image_name.'.'.$ext;
            $upload_path='public/backend/image';
            $image_url=$upload_path.$image_full_name;
            $success=$image->move($upload_path,$image_full_name);
            $product['image']=$image_url;
            unlink($request->old_image);
            $product->update();


        } else{
            $product['image']=$request->old_image;
            $product->update();

        }*/


    }


    public function destroy($id)
    {
        $post = Product::find($id);
        $post->delete();
    }


}
