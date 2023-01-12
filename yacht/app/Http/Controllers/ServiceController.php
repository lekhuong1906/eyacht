<?php

namespace App\Http\Controllers;
use Illuminate\Http\Request;
use App\Http\Requests\ServiceRequest;
use App\Models\Service;
use Session;
use App\Http\Requests;
use Illuminate\Support\Facades\Redirect;
session_start();

class ServiceController extends Controller
{
    public function add_services(){
        return view('admin.services.add_services');
    }
    public function all_services(){
        $all_services = Service::paginate(5);
        $manager_services = view('admin.services.all_services')->with('all_services',$all_services);
        return view('admin_layout')->with('admin.services.all_services',$manager_services);
    }
    public function save_services(ServiceRequest $request){
        $data =array();
        $data['service_name']=$request->service_name;
        $data['service_price']=$request->service_price;
        $data['service_status']=$request->service_status;
        Service::insert($data);

        Session::put('message','Service added successfully');
        return Redirect::to('add-services');
    }
    public function update_services(ServiceRequest $request,$id){
        $data=array();
        $data['service_name']=$request->service_name;
        $data['service_price']=$request->service_price;
        $data['service_status']=$request->service_status;
        Service::where('id',$id)->update($data);
        Session::put('message','Service update successfully');
        return Redirect::to('all-services');
    }
    public function edit_services($id){
        $edit_services = Service::where('id',$id)->get();
        $manager_services = view('admin.services.edit_services')->with('edit_services',$edit_services);
        return view('admin_layout')->with('admin.edit_services',$manager_services);
    }
    public function delete_services($id){
        Service::where('id',$id)->delete();
        Session::put('message','Service delete successful');
        return Redirect::to('all-services');
    }
}
