<?php

namespace App\Http\Controllers;

use App\Mail\MailTest;
use App\Models\Admin;
use Carbon\Carbon;
use App\Models\PasswordReset;
use App\Notifications\ResetPasswordRequest;
use Illuminate\Support\Facades\Mail;
use Illuminate\Support\Facades\Redirect;
use Illuminate\Support\Facades\Session;
use Illuminate\Http\Request;
use Illuminate\Support\Str;
session_start();
class ResetPasswordController extends Controller
{
    public function forgot_password(){
        return view('admin.forgot_pass.reset_password');
    }

    public function send_mail(Request $request){
        $data = $request->all();
        $admin = Admin::where('admin_email',$data['email'])->first();
        $now = Carbon::now('Asia/Ho_Chi_Minh')->format('d-m-Y');
        $title_mail = "Reset password".' '.$now;
        if($admin){
            $token = Str::random(20);
            $admin = Admin::find($admin->id);
            $admin->token = $token;
            $admin->save();

            //send mail
            $to_mail = $data['email'];
            $link_reset_pass = url('/update-new-pass?email='.$to_mail.'&token='.$token);
            $data = array('name'=>$title_mail,'body'=>$link_reset_pass,'email'=>$data['email']);
            Mail::send('mail.mail_test',['data'=>$data],function ($message) use ($title_mail,$data){
                $message->to($data['email'])->subject($title_mail);
                $message->from($data['email'],$title_mail);
            });
            return redirect()->back()->with('message','Gửi mail thành công');
        }
        return redirect()->back()->with('message','Email chưa được đăng ký để khôi phục mật khẩu');
    }
    public function update_new_pass(Request $request){
        $url = $request->url();
        return view('admin.forgot_pass.new_pass')->with('url',$url);
    }

    public function reset_new_pass(Request $request){
        $data = $request->all();
        $token = Str::random(20);
        $admin = Admin::where('admin_email',$data['email'])->where('token',$data['token'])->first();
        $count = $admin->count();
        if($count>0){
            $admin = Admin::find($admin->id);
                $admin->password = md5($data['password']);
                $admin->token = $token;
                $admin->update();
                return Redirect('admin-login')->with('message','Reset password success');
        }else{
            return Redirect('/forget-password')->with('message','The link is out of date');
        }
    }
}
