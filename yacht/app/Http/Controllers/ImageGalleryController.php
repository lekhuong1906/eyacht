<?php

namespace App\Http\Controllers;

use App\Models\Yachts;
use App\Models\ImageGalleries;
use Session;
use App\Http\Requests\ImageGalleryRequest;
use Illuminate\Support\Facades\Redirect;
session_start();


class ImageGalleryController extends Controller
{
    public function add_image_gallery(){
        $yacht = Yachts::get();
        return view('admin.image_galeries.add_image_gallery')->with('yacht',$yacht);
    }
    public function all_image_gallery(){
        $all_image_galleries = ImageGalleries::paginate(5);
        return view('admin.image_galeries.all_image_gallery')->with(['all_image_galleries'=>$all_image_galleries]);
    }
    public function save_image_gallery(ImageGalleryRequest $request){
        $data =array();
        $data['image_name']=$request->image_name;
        $data['yacht_id']=$request->yacht_id;
        $get_image = $request->file('image');
        if($get_image){
            $new_image = $get_image->getClientOriginalName();
            $get_image->move('public/uploads',$new_image);
            $data['image'] = $new_image;
        }
        ImageGalleries::insert($data);
        Session::put('message','Image gallery added successfully');
        return Redirect::to('add-image-gallery');
    }
    public function update_image_gallery(ImageGalleryRequest $request,$id){
        $data=array();
        $data['image_gallery_name']=$request->image_gallery_name;
        $data['yacht_id']=$request->yacht_id;
        $get_image = $request->file('image_gallery');
        if($get_image){
            $new_image = $get_image->getClientOriginalName(); //set name
            $get_image->move('public/uploads/yachts',$new_image); //set address save
            $data['image_gallery'] = $new_image;        //insert data
        }
        ImageGalleries::where('id',$id)->update($data);
        Session::put('message','Image gallery updated successfully');
        return Redirect::to('all-image-gallery');
    }
    public function edit_image_gallery($id){
        $yachts = Yachts::get();
        $edit_images = ImageGalleries::where('id',$id)->get();
        return view('admin.image_galeries.edit_image_gallery')->with(['yachts'=>$yachts,'edit_images'=>$edit_images]);
    }
    public function delete_image_gallery($id){
        ImageGalleries::where('id',$id)->delete();
        Session::put('message','Image gallery delete successful');
        return Redirect::to('all-image-gallery');
    }
}
