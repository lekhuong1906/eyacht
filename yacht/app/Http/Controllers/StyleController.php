<?php

namespace App\Http\Controllers;

use App\Models\Marinas;
use App\Models\Styles;
use App\Models\Yachts;
use Session;
use App\Http\Requests\StyleRequest;
use Illuminate\Support\Facades\Redirect;
session_start();

class StyleController extends Controller
{
    public function add_style(){
        return view('admin.styles.add_style');
    }
    public function all_style(){
        $all_style = Styles::paginate(5);
        $manager_style = view('admin.styles.all_style')->with('all_style',$all_style);
        return view('admin_layout')->with('admin.styles.all_style',$manager_style);
    }
    public function save_style(StyleRequest $request){
        $data=array();
        $data['style_yacht']=$request->style_yacht;
        $data['engine']=$request->engine;
        $data['area']=$request->area;
        Styles::insert($data);
        Session::put('message','Rent_registration added successfully');
        return Redirect::to('add-style');
    }
    public function update_style(StyleRequest $request,$id){
        $data=array();
        $data['style_yacht']=$request->style_yacht;
        $data['engine']=$request->engine;
        $data['area']=$request->area;
        Styles::where('id',$id)->update($data);
        Session::put('message','Rent_registration update successfully');
        return Redirect::to('all-style');
    }
    public function edit_style($id){
        $edit_style = Styles::where('id',$id)->get();
        $manager_style = view('admin.styles.edit_style')->with('edit_style',$edit_style);
        return view('admin_layout')->with('admin.styles.edit_style',$manager_style);
    }
    public function delete_style($id)
    {
        Styles::where('id', $id)->delete();
        Session::put('message', 'Rent registration delete successful');
        return Redirect::to('all-style');
    }
    //end function admin page

    public function style_yachts($id){
        $yachts = Yachts::where('style_id',$id)->orderby('id')->get();
        $marina = Marinas::get();
        $style = Styles::get();
        return view('pages.layout.style.show_style')->with(['yachts'=>$yachts,'style'=>$style,'marina'=>$marina]);
    }
}
