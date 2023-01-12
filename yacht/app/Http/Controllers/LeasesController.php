<?php

namespace App\Http\Controllers;

use App\Mail\SendMailCustomer;
use App\Models\Customers;
use App\Models\Marinas;
use App\Models\RentRegistrations;
use App\Models\Leases;
use App\Models\ReportSummary;
use App\Models\Service;
use App\Models\Tour;
use App\Models\Yachts;
use Carbon\Carbon;
use Illuminate\Support\Facades\Mail;
use Illuminate\Support\Facades\Session;
use App\Http\Requests\LeasesRequest;
use Illuminate\Support\Facades\Redirect;
session_start();

class LeasesController extends Controller
{
    public function all_leases(){
        $all_leases = Leases::orderby('id','desc')->paginate(5);
        $all_yacht = Yachts::get();
        $all_service = Service::get();
        $marinas = Marinas::get();
        $customers = Customers::get();
        $tours = Tour::get();

        $manager_leases = view('admin.leases.all_leases')->with(['all_leases'=>$all_leases,'all_yacht'=>$all_yacht,'all_service'=>$all_service,'marinas'=>$marinas,'customers'=>$customers,'tours'=>$tours]);
        return view('admin_layout')->with('admin.all_leases',$manager_leases);
    }
    public function save_leases(LeasesRequest $request){
        $data=array();
        $data['leases_code']=$request->leases_code;
        $data['rent_regis_id']=$request->rent_regis_id;
        $data['leases_price']=$request->leases_price;
        $data['created_at']=Carbon::now()->format('Y-m-d');
        Leases::insert($data);
        Session::put('message','Leases added successfully');

        //report
        $rent = Leases::orderby('id','desc')->first();
        $report=ReportSummary::where('created_at',$rent->rent_registrations->created_at)->first();

        if($report){
            $report->total_revenue+=$rent->leases_price;
        }
        else{
            $data = array(
                'total_revenue'=>$rent->leases_price,
            );
        }
        dd($report->total_revenue);

        //send mail
        $leases = Leases::orderby('id','desc')->first();
        $data=array(
            'id'=>$leases->id,
            'leases_code'=>$leases->leases_code,
            'customer_email'=>$leases->rent_registrations->customers->customer_email,
        );

        Mail::to($data['customer_email'])->send(new SendMailCustomer($data));
        return Redirect::to('all-rent-registration');
    }
    public function update_leases(LeasesRequest $request,$id){
        $data=array();
        $data['leases_code']=$request->leases_code;
        $data['rent_regis_id']=$request->rent_registration_id;
        $data['leases_price']=$request->leases_price;
        Leases::where('id',$id)->update($data);
        Session::put('message','Leases update successfully');
        return Redirect::to('all-leases');
    }
    public function edit_leases($id){
        $rent_regis = RentRegistrations::get();
        $edit_leases = Leases::where('id',$id)->get();
        $manager_leases = view('admin.leases.edit_leases')->with(['edit_leases'=>$edit_leases,'rent_regis'=>$rent_regis]);
        return view('admin_layout')->with('admin.leases.edit_leases',$manager_leases);
    }
    public function leases_detail($id){
        $leases=Leases::where('id',$id)->first();
        return view('admin.leases.leases_detail')->with(['leases'=>$leases]);
    }
    public function delete_leases($id)
    {
        Leases::where('id', $id)->delete();
        Session::put('message', 'Leases delete successful');
        return Redirect::to('all-leases');
    }
}
