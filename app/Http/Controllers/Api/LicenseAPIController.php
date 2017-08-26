<?php

namespace App\Http\Controllers\Api;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\License;
use DB;
use Carbon\Carbon;

class LicenseAPIController extends Controller
{
    public function checkLicense(Request $request)
    {
        $dt_month=Carbon::today();
        $dt_15days=Carbon::today();
        $dt_7days=Carbon::today();
        $dt=Carbon::today();

        $license=DB::table('licenses')
                    ->where('license_key','=',$request->key)
                    ->select('licenses.*')
                    ->first();
        
        if(!$license)
        {
            $_response = array("status" => 2, "result" => "License Key expired.");
            return response()->json($_response);
        }
        else
        {
            if($license->license_status=="Deactive")
            {
                $_response = array("status" => 2, "result" => "You License has been suspended.Contact the support team.");
                return response()->json($_response);
            }
            else if(strcmp($dt_month->addMonth()->toDateString(),$license->expiry_date)==0)
            {
                $_response = array("status" => 3, "result" => "You Product License is going to expire after one month.Contact the support team to renew your license.");
                return response()->json($_response);
            }
            else if(strcmp($dt_15days->addDays(15)->toDateString(),$license->expiry_date)==0)
            {
                $_response = array("status" => 3, "result" => "You Product License is going to expire after 15 days.Contact the support team to renew your license.");
                return response()->json($_response);
            }
            else if(strcmp($dt_7days->addDays(7)->toDateString(),$license->expiry_date)==0)
            {
                $_response = array("status" => 3, "result" => "You Product License is going to expire after 7 days.Contact the support team to renew your license.");
                return response()->json($_response);
            }
            else if(strcmp($dt->toDateString(),$license->expiry_date)==0)
            {
                $_response = array("status" => 2, "result" => "License Key expired.");
                return response()->json($_response);
            }
            else{
                $_response = array("status" => 1, "result" => "Success");
                return response()->json($_response);
            }
        }
    }
}
