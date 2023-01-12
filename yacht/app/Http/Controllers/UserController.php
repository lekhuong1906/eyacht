<?php

namespace App\Http\Controllers;

use App\Http\Requests\UserRequest;
use Session;
use App\Models\Users;
use Illuminate\Support\Facades\Redirect;
session_start();

class UserController extends Controller
{
    public function add_user(){
        return view('admin.users.add_user');
    }
    public function all_user(){
        $all_user = Users::paginate(5);
        $manager_user = view('admin.users.all_user')->with('all_user', $all_user);
        return view('admin_layout')->with('admin.users.all_user',$manager_user);
    }
    public function save_user(UserRequest $request){
        $data =array();
        $data['user_name']=$request->user_name;
        $data['user_card']=$request->user_card;
        $data['user_phone']=$request->user_phone;
        $data['email']=$request->email;
        $data['password']=md5($request->password);
        Users::insert($data);

        Session::put('message','User added successfully');
        return Redirect::to('add-user');
    }
    public function update_user(UserRequest $request,$id){
        $data=array();
        $data['user_name']=$request->user_name;
        $data['user_card']=$request->user_card;
        $data['user_phone']=$request->user_phone;
        $data['email']=$request->email;
        $data['password']=md5($request->password);
        Users::where('id',$id)->update($data);
        Session::put('message','User updated successfully');
        return Redirect::to('all-user');
    }
    public function edit_user($id){
        $edit_user = Users::where('id',$id)->get();
        $manager_user = view('admin.users.edit_user')->with('edit_user',$edit_user);
        return view('admin_layout')->with('admin.users.edit_user',$manager_user);
    }
    public function delete_user($id){
        Users::where('id',$id)->delete();
        Session::put('message','customers delete successful');
        return Redirect::to('all-customers');
    }
}
