<?php

namespace App\Http\Controllers\Api;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\User;
use DB;
use Carbon\Carbon;

class UserAPIController extends Controller
{
    public function store(Request $request)
    {
        try{
            $user = new User;
            $user->fname=$request->fname;
            $user->lname=$request->lname;
            $user->email=$request->email;
            $user->password=encrypt($request->password);
            $user->image="none";
            if($user->save()) {
                $_response = array("status" => 1, "result" => "User Created Successfully.");
                return response()->json($_response);
            } 
            else {
                $_response = array("status" => 1, "result" => "Unable to create new User account.");
                return response()->json($_response);
            }
        }
        catch (\Exception $e) {
            $_response = array("status" => 0, "result" => "Some error occurred.Please try again.");
            return response()->json($_response);
        }
    }

}
