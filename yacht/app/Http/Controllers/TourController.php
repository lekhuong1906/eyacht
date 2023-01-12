<?php

namespace App\Http\Controllers;

use App\Http\Requests\TourRequest;
use App\Models\HistoryMooring;
use App\Models\Service;
use App\Models\Styles;
use App\Models\Tour;
use App\Models\Marinas;
use App\Models\Yachts;
use Illuminate\Support\Facades\Session;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Redirect;
session_start();

class TourController extends Controller
{
    public function add_tour(){
        $marina = Marinas::get();
        return view('admin.tours.add_tour')->with(['marina'=>$marina]);
    }
    public function all_tour(){
        $tours = Tour::paginate(5);
        return view('admin.tours.all_tour')->with(['tours'=>$tours]);
    }
    public function save_tour(TourRequest $request){
        $data=array();
        $data['tour_name']=$request->tour_name;
        $data['tour_describe']=$request->tour_describe;
        $data['from']=$request->from;
        $data['to']=$request->to;
        $data['tour_price']=$request->tour_price;
        $data['tour_status']=$request->tour_status;
        $image=$request->tour_image;
        if ($image){
            $tour_image = $image->getClientOriginalName();
            $image->move('public/uploads/tours',$tour_image);
            $data['tour_image']=$tour_image;
        }
        Tour::insert($data);
        Session::put('message','Add tour successfully');
        return Redirect::to('/add-tour');
    }
    public function edit_tour($id){
        $tour = Tour::where('id',$id)->first();
        $marinas = Marinas::get();
        return view('admin.tours.edit_tour')->with(['tour'=>$tour,'marinas'=>$marinas]);

    }
    public function update_tour(TourRequest $request,$id){
        $data=array();
        $data['tour_name']=$request->tour_name;
        $data['tour_describe']=$request->tour_describe;
        $data['from']=$request->from;
        $data['to']=$request->to;
        $data['tour_status']=$request->tour_status;
        $data['tour_price']=$request->tour_price;
        $image=$request->tour_image;
        if ($image){
            $tour_image = $image->getClientOriginalName();
            $image->move('public/uploads/tours',$tour_image);
            $data['tour_image']=$tour_image;
        }
        Tour::where('id',$id)->update($data);
        return Redirect::to('/all-tour');
    }
    public function delete_tour($id){
        return redirect()->back();
    }

    //end admin page

    public function tour_detail($id){
        $style = Styles::get();
        $marina = Marinas::get();
        $tours = Tour::where('id',$id)->get();
        return view('pages.layout.tour.tour_detail')->with(['tours'=>$tours,'style'=>$style,'marina'=>$marina]);
    }

    public function book_tour($id){
        $tour = Tour::where('id',$id)->first();
        $histories = HistoryMooring::where('marina_id',$tour->from)->get();
        $service = Service::get();
        $style = Styles::get();
        $marina = Marinas::get();
        return view('pages.layout.tour.book_tour')->with(['histories'=>$histories,'tour'=>$tour,'service'=>$service,'style'=>$style,'marina'=>$marina]);
    }

}
