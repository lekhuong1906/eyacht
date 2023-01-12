<?php

namespace App\Http\Controllers;
use App\Models\Customers;
use App\Models\HistoryPayment;
use App\Models\Leases;
use App\Models\RentRegistrations;
use App\Models\Service;
use App\Models\Tour;
use App\Models\User;
use App\Models\Users;
use App\Models\Yachts;
use Carbon\Carbon;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Session;
use App\Http\Requests;
use Illuminate\Support\Facades\Redirect;
session_start();

class AdminController extends Controller
{
    public function admin_login(){

        return view('admin_login');
    }
    public function show_dashboard(){
        $leases = Leases::get();
        $counts =[
            'leases'=>Leases::count(),
            'rent_regis'=>RentRegistrations::count(),
            'customer'=>Customers::count(),
            'revenue'=>HistoryPayment::where('payment_status','1')->sum('payment_total'),
            'sales'=>Leases::sum('leases_price'),
            'yacht'=>Yachts::count(),
            'tour'=>Tour::count(),
            'service'=>Service::count(),
        ];

        $user = Users::first();
        $notifications = $user->notifications->all();
        Session::put('notifications', $notifications);

        $payments = HistoryPayment::get();
        $data=array();
        $array['value']=0;
        for ($i=1;$i<=12;$i++){
            $array['month']=$i;
            foreach ($payments as $payment){
                if (Carbon::parse($payment->create_at)->format('m')==$i){
                    $array['value']+=$payment->payment_total;
                }
            }
            array_push($data,$array);
            $array['value']=0;
        }

        $yachts = Yachts::get();
        $array_yacht = array();
        foreach ($yachts as $value){
            $amount = RentRegistrations::where('yacht_id',$value->id)->count();
            $yacht['percent'] = number_format((($amount/$counts['rent_regis'])*100),2);
            $yacht['name']=$value->yacht_name;
            if($yacht['percent']<20)
                $yacht['color']='red';
            elseif ($yacht['percent']>40)
                $yacht['color']='green';
            else
                $yacht['color']='yellow';
            array_push($array_yacht,$yacht);
        }

        $tours = Tour::get();
        $array_tour=array();
        foreach ($tours as $value){
            $amount = RentRegistrations::where('tour_id',$value->id)->count();
            $tour['percent']= number_format((($amount/$counts['rent_regis'])*100),2);
            $tour['name']=$value->tour_name;
            if($tour['percent']<20)
                $tour['color']='red';
            elseif ($tour['percent']>40)
                $tour['color']='green';
            else
                $tour['color']='yellow';

            array_push($array_tour,$tour);
        }

        $services = Service::get();
        $array_service=array();
        foreach ($services as $value){
            $amount = RentRegistrations::where('service_id',$value->id)->count();
            $service['percent']= number_format((($amount/$counts['rent_regis'])*100),2);
            $service['name']=$value->service_name;
            if($service['percent']<20)
                $service['color']='red';
            elseif ($service['percent']>40)
                $service['color']='green';
            else
                $service['color']='yellow';
            array_push($array_service,$service);
        }


        return view('admin.dashboard.dashboard')->with(['leases'=>$leases,'counts'=>$counts,'data'=>$data,'array_yacht'=>$array_yacht,'array_tour'=>$array_tour,'array_service'=>$array_service]);
    }
    public function dashboard(Request $request){

        /*$credentials = [
            'email' => $request->email,
            'password' => $request->password
        ];
        if(Auth::attempt($credentials)) {
            return Redirect::to('/show-dashboard');
        }*/

        $user = Users::where('email', $request->email)->where('password',md5($request->password))->first();
        if ($user !== null) {
            Auth::login($user);
            return Redirect::to('/show-dashboard');
        }
        session::put('message','Wrong Email or Password. Please, re-enter');
        return Redirect::to('/admin-login');
    }
    public function logout(){

        Auth::logout();
        return Redirect::to('/admin-login');
    }
    public function chart(Request $request){
        $leases = Leases::get();
        $counts =[
            'leases'=>Leases::count(),
            'rent_regis'=>RentRegistrations::count(),
            'customer'=>Customers::count(),
            'payment'=>HistoryPayment::where('payment_status','1')->sum('payment_total'),

        ];
        $from = Carbon::parse($request->from)->format('m');
        $to = Carbon::parse($request->to)->format('m');
        $payments = HistoryPayment::get();
        $data=array();
        $array['value']=0;
        for ($i=1;$i<=12;$i++){
            $array['month']=$i;
            if ($i==$from && $i<=$to) {
                foreach ($payments as $payment) {
                    if (Carbon::parse($payment->create_at)->format('m') == $from) {
                        $array['value'] += $payment->payment_total;
                    }
                }
                $from++;
            }
            array_push($data,$array);
            $array['value']=0;
        }

        return view('admin.dashboard.dashboard')->with(['data'=>$data,'leases'=>$leases,'counts'=>$counts]);
    }
}
