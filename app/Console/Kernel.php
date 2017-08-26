<?php

namespace App\Console;

use DB;
use Carbon\Carbon;
use App\Project;
use App\User;
use App\License;
use Mail;
use App\ActivityLog;

use Illuminate\Console\Scheduling\Schedule;
use Illuminate\Foundation\Console\Kernel as ConsoleKernel;

class Kernel extends ConsoleKernel
{

    /**
     * The Artisan commands provided by your application.
     *
     * @var array
     */
    protected $commands = [
    ];

    /**
     * Register the Closure based commands for the application.
     *
     * @return void
     */
    protected function commands()
    {
        require base_path('routes/console.php');
    }

    /**
     * Define the application's command schedule.
     *
     * @param  \Illuminate\Console\Scheduling\Schedule  $schedule
     * @return void
     */
    protected function schedule(Schedule $schedule)
    {
          //check if any project license is going to expire after month, 15 days, 7 days and today
        $schedule->call(function () {
            $dt_month=Carbon::today();
            $dt_15days=Carbon::today();
            $dt_7days=Carbon::today();
            $dt_today=Carbon::today();

            $user=User::find(1);
            $projects=Project::all();

            $email_body_month="Dear Admin,\n\nThe following projects license is going to expire after one month(on ".$dt_month->addMonth()->toDateString().") :\n\n";
            $counter_month=1;

            $email_body_15days="Dear Admin,\n\nThe following projects license is going to expire after 15 Days(on ".$dt_15days->addDays(15)->toDateString().") :\n\n";
            $counter_15days=1;

            $email_body_7days="Dear Admin,\n\nThe following projects license is going to expire after 7 Days(on ".$dt_7days->addDays(7)->toDateString().") :\n\n";
            $counter_7days=1;

            $email_body_today="Dear Admin,\n\nThe following projects license is expired today(on ".$dt_today->toDateString().") and has been renewed by the system:\n\n";
            $counter_today=1;

            if(count($projects)>0)
            {
                foreach($projects as $prj)
                {
                    $license=DB::table('licenses')->where('proj_id',$prj->id)->first();

                    //check if license is going to expire after one month
                    if($license && strcmp($dt_month->toDateString(),$license->expiry_date)==0)
                    {
                        $email_body_month=$email_body_month.$counter_month.". ".$prj->proj_name."\n";
                        $counter_month++;
                    }

                    //check if license is going to expire after 15 days
                    if($license && strcmp($dt_15days->toDateString(),$license->expiry_date)==0)
                    {
                        $email_body_15days=$email_body_15days.$counter_15days.". ".$prj->proj_name."\n";
                        $counter_15days++;
                    }

                    //check if license is going to expire after 7 days
                    if($license && strcmp($dt_7days->toDateString(),$license->expiry_date)==0)
                    {
                        $email_body_7days=$email_body_7days.$counter_7days.". ".$prj->proj_name."\n";
                        $counter_7days++;
                    }

                    //if the following project license is expired today
                    if($license && strcmp($dt_today->toDateString(),$license->expiry_date)==0)
                    {
                        $email_body_today=$email_body_today.$counter_today.". ".$prj->proj_name."\n";
                        $counter_today++;

                        //save changes we do in the activity log
                        $data=array(
                            'session_id' => NULL,
                            'updated_table_name' => 'licenses',
                            'updated_field_name' => 'license_key',
                            'updated_field_old_value' => $license->license_key,
                            'updated_table_pk' => $license->id
                        );
                        ActivityLog::create($data);

                        $data1=array(
                            'session_id' => NULL,
                            'updated_table_name' => 'licenses',
                            'updated_field_name' => 'start_date',
                            'updated_field_old_value' => $license->start_date,
                            'updated_table_pk' => $license->id
                        );
                        ActivityLog::create($data1);

                        $data2=array(
                            'session_id' => NULL,
                            'updated_table_name' => 'licenses',
                            'updated_field_name' => 'expiry_date',
                            'updated_field_old_value' => $license->expiry_date,
                            'updated_table_pk' => $license->id
                        );
                        ActivityLog::create($data2);

                        //auto update license key, start_date and expiry_date
                        $res=DB::table('licenses')->where('id',$license->id)
                                ->update(['license_key' => $this->generateSerial(), 'start_date' => $dt_today->toDateString(), 'expiry_date' => $dt_today->addYear()->toDateString()]);
                    }
                }

                //if we found some project whose license is going to expire after one month
                if($counter_month>1)
                {
                    $email_body_month .= "\n\nNote: This is system auto generated email.Please do not reply to it.\n";
                    Mail::raw($email_body_month,function ($message) use ($email_body_month,$user){
                        $message->subject("Projects License Expiry Update");
                        $message->from('grabbitlms@gmail.com', 'Grabbit LMS');
                        $message->to($user->email);
                    });
                }

                //if we found some project whose license is going to expire after 15 days
                if($counter_15days>1)
                {
                    $email_body_15days .= "\n\nNote: This is system auto generated email.Please do not reply to it.\n";
                    Mail::raw($email_body_15days,function ($message) use ($email_body_15days,$user){
                        $message->subject("Projects License Expiry Update");
                        $message->from('grabbitlms@gmail.com', 'Grabbit LMS');
                        $message->to($user->email);
                    });
                }

                //if we found some project whose license is going to expire after 7 days
                if($counter_7days>1)
                {
                    $email_body_7days .= "\n\nNote: This is system auto generated email.Please do not reply to it.\n";
                    Mail::raw($email_body_7days,function ($message) use ($email_body_7days,$user){
                        $message->subject("Projects License Expiry Update");
                        $message->from('grabbitlms@gmail.com', 'Grabbit LMS');
                        $message->to($user->email);
                    });
                }

                //if we found some project whose license is expired today
                if($counter_today>1)
                {
                    $email_body_today .= "\n\nNote: This is system auto generated email.Please do not reply to it.\n";
                    Mail::raw($email_body_today,function ($message) use ($email_body_today,$user){
                        $message->subject("Projects License Expiry Update");
                        $message->from('grabbitlms@gmail.com', 'Grabbit LMS');
                        $message->to($user->email);
                    });
                }
            }

        })->hourly();
        // $schedule->command('inspire')
        //          ->hourly();
    }

    //generate serial key having format XXXXX-XXXXX-XXXXX-XXXXX-XXXXX
    public function generateSerial()
    {
        $chars = array(0,1,2,3,4,5,6,7,8,9,'A','B','C','D','E','F','G','H','I','J','K','L','M','N','O','P','Q','R','S','T','U','V','W','X','Y','Z');
        $serial = '';
        $max = count($chars)-1;
        for($i=0;$i<25;$i++){
            $serial .= (!($i % 5) && $i ? '-' : '').$chars[rand(0, $max)];
        }

        $checkIfKeyExists=DB::table('licenses')->where('license_key',$serial)->get();
        if(count($checkIfKeyExists)>0)
            return $this->generateSerial();

        return $serial;
    }

}
