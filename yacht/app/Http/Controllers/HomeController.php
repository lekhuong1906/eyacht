<?php

namespace App\Http\Controllers;

use App\Http\Requests\CustomerRequest;
use App\Http\Requests\RentRegistrationRequest;
use App\Models\Customers;
use App\Models\ImageGalleries;
use App\Models\Marinas;
use App\Models\RentRegistrations;
use App\Models\ReportSummary;
use App\Models\Service;
use App\Models\Styles;
use App\Models\Tour;
use App\Models\Users;
use App\Models\Yachts;
use Carbon\Carbon;
use Pusher\Pusher;
use App\Notifications\SendMessage;
use DB;
use Illuminate\Support\Facades\Auth;
use Session;
use Illuminate\Support\Facades\Redirect;

session_start();

use Illuminate\Http\Request;

class HomeController extends Controller
{
    public function home()
    {
        $service = Service::get();
        $marina = Marinas::get();
        $style = Styles::get();
        $yacht = Yachts::with('images')->get();
        $tour = Tour::get();
        $user = Auth::id(); //tra ve id cua user
        return view('pages.home')->with(['service' => $service, 'yacht' => $yacht, 'style' => $style,'marina'=>$marina,'user'=>$user,'tour'=>$tour]);
    }



    public function save_customer(CustomerRequest $request)
    {
        $data = array();
        $data['customer_name'] = $request->customer_name;
        $data['customer_card'] = $request->customer_card;
        $data['customer_phone'] = $request->customer_phone;
        $data['customer_email'] = $request->customer_email;
        $data['password'] = md5($request->customer_password);

        Customers::insert($data);

        return Redirect::to('login');
    }

    public function save_rent(Request $request){
        $data = array();
        $data['rent_regis_name']=$request->rent_regis_name;
        $data['yacht_id']=$request->yacht_id;
        $data['tour_id']=$request->tour_id;
        $data['service_id']=$request->service_id;
        $data['rental_date']=$request->rental_date;
        $data['rental_hours']=$request->rental_hours;
        $data['user_id']=$request->user_id;
        $data['customer_id'] = Auth::id();
        $data['created_at']=Carbon::now()->format('Y-m-d');
        RentRegistrations::insert($data);



        // create message
        $array = array(
            'id' => RentRegistrations::orderby('id','desc')->first()->id,
            'title'=>$data['rent_regis_name'],
            'content'=> Customers::where('id',$data['customer_id'])->first()->customer_name,
        );
        $user = Users::find(1);
//        dd($user);
        $user->notify(new SendMessage($array));

        return Redirect::to('/home');
    }
    public function profile(){
        $style = Styles::get();
        $marina = Marinas::get();
        return view('pages.account.profile')->with(['marina'=>$marina,'style'=>$style]);
    }

}
