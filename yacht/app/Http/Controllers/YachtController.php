<?php

namespace App\Http\Controllers;

use App\Http\Requests\YachtRequest;
use App\Models\Customers;
use App\Models\HistoryMooring;
use App\Models\ImageGalleries;
use App\Models\Marinas;
use App\Models\Service;
use App\Models\Styles;
use App\Models\Tour;
use App\Models\Yachts;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Session;
use Illuminate\Support\Facades\Redirect;


session_start();

class YachtController extends Controller
{
    public function add_yachts()
    {
        $style = Styles::get();
        $marina = Marinas::get();
        $all_yachts = Yachts::get();
        return view('admin.yachts.add_yachts')->with(['all_yachts' => $all_yachts, 'style' => $style, 'marina' => $marina]);
    }

    public function all_yachts()
    {
        $all_yacht = Yachts::paginate(5);
        $all_style = Styles::get();
        $manager_yachts = view('admin.yachts.all_yachts')->with(['all_yacht'=> $all_yacht,'all_style'=>$all_style]);
        return view('admin_layout')->with('admin.yachts.all_yachts', $manager_yachts);
    }

    public function save_yachts(YachtRequest $request)
    {
        $all_yachts = Yachts::orderby('id','desc')->get();
        $data = array();
        $data['yacht_name'] = $request->yacht_name;
        $data['style_id'] = $request->style_id;
        $data['yacht_number_plate'] = $request->yacht_number_plate;
        $data['yacht_price'] = $request->yacht_price;
        $data['yacht_status'] = $request->yacht_status;
        Yachts::insert($data);
        $yacht=Yachts::orderby('id','desc')->first();
        $array =array([
            'yacht_id'=> $yacht->id,
            'marina_id'=> $request->marina_id,
        ]);
        HistoryMooring::insert($array);
        Session::put('message', 'Yachts added successfully');
        return Redirect::to('add-yachts')->with('yacht', $all_yachts);
    }

    public function update_yachts(YachtRequest $request, $id)
    {
        $data = array();
        $data['yacht_name'] = $request->yacht_name;
        $data['style_id'] = $request->style_id;
        $data['yacht_number_plate'] = $request->yacht_number_plate;
        $data['yacht_price'] = $request->yacht_price;
        $data['yacht_status'] = $request->yacht_status;
        Yachts::where('id', $id)->update($data);
        Session::put('message', 'Yachts update successfully');
        return Redirect::to('all-yachts');
    }

    public function edit_yachts($id)
    {
        $styles = Styles::get();
        $marinas = Marinas::get();
        $edit_yachts = Yachts::where('id', $id)->get();
        return view('admin.yachts.edit_yachts')->with(['edit_yachts' => $edit_yachts, 'styles' => $styles, 'marinas' => $marinas]);
    }

    public function delete_yachts($id)
    {
        Yachts::where('id', $id)->delete();
        HistoryMooring::where('yacht_id',$id)->delete();
        Session::put('message', 'Yachts delete successful');
        return Redirect::to('all-yachts');
    }

    //end function page admin

    public function yacht_detail($id)
    {
        $yacht = Yachts::where('id', $id)->get();
        $images =ImageGalleries::where('yacht_id',$id)->get();
        $style = Styles::get();
        $marina = Marinas::get();
        return view('pages.layout.yacht.yacht_detail')->with(['yacht' => $yacht, 'style' => $style,'marina'=>$marina,'images'=>$images]);
    }

    public function book_yacht($id){
        $yacht = Yachts::where('id',$id)->first();
        $marina = Marinas::get();
        $tour = Tour::where('from',$yacht->histories->marina_id)->get();
        $service = Service::get();
        $style = Styles::get();
        return view('pages.layout.yacht.book_yacht')->with(['yacht' => $yacht, 'style' => $style,'service'=>$service,'tour'=>$tour,'marina'=>$marina]);
    }

}
