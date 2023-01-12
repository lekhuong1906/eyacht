<?php

namespace App\Http\Controllers;
use App\Mail\SendMailCustomer;
use App\Models\Customers;
use App\Models\RentRegistrations;
use App\Models\Service;
use App\Models\Tour;
use App\Models\Users;
use App\Models\Yachts;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Session;
use App\Http\Requests\RentRegistrationRequest;
use Illuminate\Support\Facades\Redirect;
use Illuminate\Support\Facades\Mail;
session_start();

class RentRegistrationController extends Controller
{
    public function add_rent_registration(){
        $user = Users::get();
        $tour = Tour::get();
        $service = Service::get();
        $customer = Customers::get();
        $yacht = Yachts::get();
        $all_rent_registration = RentRegistrations::get();
        return view('admin.rent_regis.add_rent_registration')->with(['all_rent_registration',$all_rent_registration,'service'=>$service,'tour'=>$tour,'customer'=>$customer, 'yacht'=>$yacht,'user'=>$user]);
    }
    public function all_rent_registration(Request $request){
        $all_rent_registration = RentRegistrations::query()->search()->yacht()->service()->date()->orderby('id','desc')->paginate(5);
        $all_yacht = Yachts::get();
        $all_service = Service::get();
        return view('admin.rent_regis.all_rent_registration')->with(['all_rent_registration'=>$all_rent_registration,'all_yacht'=>$all_yacht,'all_service'=>$all_service]);;
    }
    public function save_rent_registration(RentRegistrationRequest $request){
        $data=array();
        $data['rent_regis_name']=$request->rent_registration_name;
        $data['user_id']=$request->user_id;
        $data['tour_id']=$request->tour_id;
        $data['yacht_id']=$request->yacht_id;
        $data['customer_id']=$request->customer_id;
        $data['service_id']=$request->service_id;
        $data['rental_date']=$request->rental_date;
        $data['rental_hours']=$request->rental_hours;
        RentRegistrations::insert($data);
        Session::put('message','Rent_registration added successfully');
        return Redirect::to('add-rent-registration');
    }
    public function update_rent_registration(RentRegistrationRequest $request,$id){
        $data=array();
        $data['rent_registration_name']=$request->rent_registration_name;
        $data['user_id']=$request->user_id;
        $data['yacht_id']=$request->yacht_id;
        $data['tour_id']=$request->tour_id;
        $data['customer_id']=$request->customer_id;
        $data['service_id']=$request->service_id;
        $data['rental_date']=$request->rental_date;
        $data['rental_hours']=$request->rental_hours;
        RentRegistrations::where('id',$id)->update($data);
        Session::put('message','Rent_registration update successfully');
        return Redirect::to('all-rent-registration');
    }
    public function edit_rent_registration($id){
        $users = Users::get();
        $service = Service::get();
        $customer = Customers::get();
        $yacht = Yachts::get();
        $edit_rent = RentRegistrations::where('id',$id)->get();
        return view('admin.rent_regis.edit_rent_registration')->with(['edit_rent'=>$edit_rent,'service'=>$service,'customer'=>$customer, 'yacht'=>$yacht,'users'=>$users]);
    }
    public function add_leases(Request $request, $id){
        $all_rents = RentRegistrations::where('id',$id)->get();
        return view('admin.leases.add_leases')->with('all_rents',$all_rents);
    }
    public function delete_rent_registration($id)
    {
        RentRegistrations::where('id', $id)->delete();
        Session::put('message', 'Rent registration delete successful');
        return Redirect::to('all-rent-registration');
    }
}
