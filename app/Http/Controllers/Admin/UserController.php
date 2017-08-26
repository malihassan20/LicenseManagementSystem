<?php

namespace App\Http\Controllers\Admin;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\User;
use DB;
use Carbon\Carbon;
use App\Http\Requests\UserLoginRequest;
use Session;
use App\UserSession;
use App\ActivityLog;
use Mail;
use App\Http\Requests\ForgetPasswordRequest;
use App\Project;
use App\Client;
use App\License;

class UserController extends Controller
{
    public function dashboard()
    {
        $dt=Carbon::now();

        $clients=count(Client::all());
        $projects=count(Project::all());
        $active_licenses=count(DB::table('licenses')->where('expiry_date','>',$dt->toDateString())->where('license_status','=','Active')->get());
        $expired_licenses=count(DB::table('licenses')->where('expiry_date','<=',$dt->toDateString())->get());

        return view('dashboard')->with([ 'clients' => $clients, 'projects' =>$projects, 'active_licenses' => $active_licenses, 'expired_licenses' => $expired_licenses ]);
    }

    public function login(UserLoginRequest $request)
    {
        if(Session::has('session_id'))
        {
            return $this->dashboard();
        }
        $user = DB::table('users')->where('email', $request->email)->first();
        if (!$user) {
            Session::put('loginError', "Please enter correct email address!");
            return view('User.login');
        }
        else if(strcmp(decrypt($user->password),$request->password)!=0)
        {
            Session::put('loginError', "Please enter correct password!");
            return view('User.login');
        }
        else
        {
            $data=array(
                'user_id' => $user->id,
                'end_time' => ''
            );
            $user_session = UserSession::create($data);
            Session::put('session_id', $user_session->id);
            Session::put('full_name',$user->fname.' '.$user->lname);
            return $this->dashboard();
        }
    }

    public function logout()
    {
        $dt = Carbon::now();
        $item = UserSession::findOrFail(Session::get('session_id'));
        $item->update(['end_time' => $dt->toTimeString()]);
        Session::forget('session_id');
        Session::forget('full_name');
        return redirect()->to('/');
    }

    public function displayProfile()
    {
        $user = DB::table('users')->first();
        return view('User.displayProfile', ['user' => $user]);
    }

    public function editProfile()
    {
        $user = DB::table('users')->first();

        Session::put('fname',$user->fname);
        Session::put('lname',$user->lname);
        Session::put('email',$user->email);
        Session::put('password',decrypt($user->password));

        return view('User.editProfile', ['user' => $user]);
    }

    public function updateProfile(Request $request)
    {
        $item = DB::table('users')->where('id', 1)
                    ->update(['fname' => $request->fname, 'lname' => $request->lname, 'email' => $request->email, 'password' => encrypt($request->password)]);

        if(Session::get('fname')!=$request->fname)
        {
            $data=array(
                'session_id' => Session::get('session_id'),
                'updated_table_name' => 'users',
                'updated_field_name' => 'fname',
                'updated_field_old_value' => Session::get('fname'),
                'updated_table_pk' => 1
            );
            ActivityLog::create($data);
        }
        if(Session::get('lname')!=$request->lname)
        {
            $data=array(
                'session_id' => Session::get('session_id'),
                'updated_table_name' => 'users',
                'updated_field_name' => 'lname',
                'updated_field_old_value' => Session::get('lname'),
                'updated_table_pk' => 1
            );
            ActivityLog::create($data);
        }
        if(Session::get('email')!=$request->email)
        {
            $data=array(
                'session_id' => Session::get('session_id'),
                'updated_table_name' => 'users',
                'updated_field_name' => 'email',
                'updated_field_old_value' => Session::get('email'),
                'updated_table_pk' => 1
            );
            ActivityLog::create($data);
        }
        if(Session::get('password')!=$request->password)
        {
            $data=array(
                'session_id' => Session::get('session_id'),
                'updated_table_name' => 'users',
                'updated_field_name' => 'password',
                'updated_field_old_value' => Session::get('password'),
                'updated_table_pk' => 1
            );
            ActivityLog::create($data);
        }
        Session::forget('fname');
        Session::forget('lname');
        Session::forget('email');
        Session::forget('password');

        $user = DB::table('users')->first();
        return view('User.displayProfile', ['user' => $user]);
    }

    public function sendForgetMail(ForgetPasswordRequest $request)
    {
        $user = DB::table('users')->where('email', $request->email)->first();
        if(!$user)
        {
            Session::put('forgetError', "This email address does not exists!");
            return view('User.forgetPassword');
        }

        $email_body="Your Account Current Password is\n\n\n".decrypt($user->password);

        Mail::raw($email_body,function ($message) use ($email_body,$user){
            $message->subject("Grabbit LMS Account Password");
            $message->from('grabbitlms@gmail.com', 'Grabbit LMS');
            $message->to($user->email);
        });

        Session::put('forgetError', "An email has been successfully send to your account with instructions!");
        return view('User.forgetPassword');
    }

    public function checkLogin()
    {
      if(Session::has('session_id'))
      {
          return $this->dashboard();
      }
      return view('User.login');
    }
}
