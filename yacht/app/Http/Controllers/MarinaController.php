<?php

namespace App\Http\Controllers;
use App\Models\HistoryMooring;
use App\Models\Styles;
use App\Models\Tour;
use App\Models\Yachts;
use Illuminate\Http\Request;
use App\Models\Marinas;

use Session;
use App\Http\Requests\MarinaRequest;
use Illuminate\Support\Facades\Redirect;
session_start();

class MarinaController extends Controller
{
    public function add_marina(){
        return view('admin.marinas.add_marina');
    }
    public function all_marina(){
        $all_marina = Marinas::paginate(5);
        $manager_marina = view('admin.marinas.all_marina')->with('all_marina',$all_marina);
        return view('admin_layout')->with('admin.marinas.all_marina',$manager_marina);
    }
    public function save_marina(MarinaRequest $request){
        $data=array();
        $data['marina_name']=$request->marina_name;
        $data['marina_address']=$request->marina_address;
        $data['lng']=$request->lng;
        $data['lng']=$request->lat;

        Marinas::insert($data);
        Session::put('message','Marina added successfully');
        return Redirect::to('add-marina');
    }
    public function update_marina(MarinaRequest $request,$id){
        $data=array();
        $data['marina_name']=$request->marina_name;
        $data['marina_address']=$request->marina_address;
        $data['lng']=$request->lng;
        $data['lat']=$request->lat;;
        Marinas::where('id',$id)->update($data);
        Session::put('message','Marina update successfully');
        return Redirect::to('all-marina');
    }
    public function edit_marina($id){
        $edit_marina = Marinas::where('id',$id)->get();
        $manager_marina = view('admin.marinas.edit_marina')->with('edit_marina',$edit_marina);
        return view('admin_layout')->with('admin.marinas.edit_marina',$manager_marina);
    }
    public function delete_marina($id)
    {
        Marinas::where('id', $id)->delete();
        Session::put('message', 'Marina delete successful');
        return Redirect::to('all-marina');
    }
    //end public admin page

    public function show_marina($id){
        $histories = HistoryMooring::where('marina_id',$id)->orderby('id')->get();
        $tours = Tour::where('from',$id)->get();
        $marina = Marinas::get();
        $style = Styles::get();
        return view('pages.layout.marina.show_marina')->with(['marina'=>$marina,'histories'=>$histories,'style'=>$style,'tours'=>$tours]);
    }
}
