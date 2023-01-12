<?php

namespace App\Http\Controllers;

use App\Models\Admin;
use App\Models\Customers;
use App\Http\Requests\CustomerRequest;
use Session;

use Illuminate\Support\Facades\Redirect;
session_start();

class CustomerController extends Controller
{
    public function add_customers(){
        return view('admin.customers.add_customers');
    }
    public function all_customers(){
        $all_customers = Customers::paginate(5);
        $manager_customers = view('admin.customers.all_customers')->with(compact('all_customers'), $all_customers);
        return view('admin_layout')->with('admin.customers.all_customers',$manager_customers);
    }
    public function save_customers(CustomerRequest $request){
        $data =array();
        $data['customer_name']=$request->customer_name;
        $data['customer_card']=$request->customer_card;
        $data['customer_phone']=$request->customer_phone;
        $data['customer_email']=$request->customer_email;
        $data['customer_password']=$request->customer_password;

        Customers::insert($data);

        Session::put('message','Customers added successfully');
        return Redirect::to('add-customers');
    }
    public function update_customers(CustomerRequest $request,$id){
        $data=array();
        $data['customer_name']=$request->customer_name;
        $data['customer_card']=$request->customer_card;
        $data['customer_phone']=$request->customer_phone;
        $data['customer_email']=$request->customer_email;
        $data['customer_password']=$request->customer_password;
        Customers::where('id',$id)->update($data);
        Session::put('message','Customers updated successfully');
        return Redirect::to('all-customers');
    }
    public function edit_customers($id){
        $edit_customers = Customers::where('id',$id)->get();
        $manager_customers = view('admin.customers.edit_customers')->with('edit_customers',$edit_customers);
        return view('admin_layout')->with('admin.customers.edit_customers',$manager_customers);
    }
    public function delete_customers($id){
        Customers::where('id',$id)->delete();
        Session::put('message','customers delete successful');
        return Redirect::to('all-customers');
    }
}
