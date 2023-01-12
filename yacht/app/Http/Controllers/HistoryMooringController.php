<?php

namespace App\Http\Controllers;

use App\Models\HistoryMooring;
use App\Models\Marinas;
use App\Models\Yachts;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Redirect;
use Illuminate\Support\Facades\Session;
session_start();

class HistoryMooringController extends Controller
{
    public function update_history_mooring($id){
        $histories =HistoryMooring::where('yacht_id',$id)->first();
        $marina = Marinas::get();
        return view('admin.history_moorings.update_history_mooring')->with(['marina'=>$marina,'histories'=>$histories]);
    }

    public function all_history_mooring(){
        $histories = HistoryMooring::get();
        $dataMap = array();
            foreach($histories as $key) {
                $data = array();
                $data['lng'] = $key->marinas->lng;
                $data['lat'] = $key->marinas->lat;
                $data['yacht'] = $key->yachts->yacht_name;
                array_push($dataMap,$data);
            }
        return view('admin.history_moorings.all_history_mooring')->with(['histories'=>$histories,'dataMap'=>$dataMap]);
    }

    public function save_history_mooring($id, Request $request){
        $data=array();
        $data['marina_id']=$request->marina_id;
        $data['yacht_id']=$request->yacht_id;
        HistoryMooring::where('yacht_id',$id)->update($data);
        Session::put('message','History update successfully');
        return Redirect::to('/all-yachts');
    }

}
