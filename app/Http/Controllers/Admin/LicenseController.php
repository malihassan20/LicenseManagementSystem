<?php

namespace App\Http\Controllers\Admin;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\License;
use DB;
use Carbon\Carbon;
use Session;
use App\Http\Requests\SaveLicenseRequest;
use App\Project;
use App\ActivityLog;

class LicenseController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $licenses=DB::table('licenses')
                    ->join('projects', 'licenses.proj_id', '=', 'projects.id')
                    ->select('licenses.*', 'projects.proj_name as proj_name')
                    ->get();
        return view('License.index')->with('licenses',$licenses);
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(SaveLicenseRequest $request)
    {
        $license=License::create($request->all());
        
        $data=array(
            'session_id' => Session::get('session_id'),
            'updated_table_name' => 'licenses',
            'updated_field_name' => 'New License Created',
            'updated_field_old_value' => 'Not Available',
            'updated_table_pk' => $license->id
        );
        ActivityLog::create($data);
        
        return $this->index();
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        $license = DB::table('licenses')
                    ->join('projects', 'licenses.proj_id', '=', 'projects.id')
                    ->select('licenses.*', 'projects.proj_name as proj_name')
                    ->first();
        return view('License.show')->with('license',$license);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(SaveLicenseRequest $request, $id)
    {
        License::findOrFail($id)->update($request->all());

        if(Session::get('proj_id')!=$request->proj_id)
        {
            $data=array(
                'session_id' => Session::get('session_id'),
                'updated_table_name' => 'licenses',
                'updated_field_name' => 'proj_id',
                'updated_field_old_value' => Session::get('proj_id'),
                'updated_table_pk' => $id
            );
            ActivityLog::create($data);
        }
        if(Session::get('license_key')!=$request->license_key)
        {
            $data=array(
                'session_id' => Session::get('session_id'),
                'updated_table_name' => 'licenses',
                'updated_field_name' => 'license_key',
                'updated_field_old_value' => Session::get('license_key'),
                'updated_table_pk' => $id
            );
            ActivityLog::create($data);
        }
        if(Session::get('license_status')!=$request->license_status)
        {
            $data=array(
                'session_id' => Session::get('session_id'),
                'updated_table_name' => 'licenses',
                'updated_field_name' => 'license_status',
                'updated_field_old_value' => Session::get('license_status'),
                'updated_table_pk' => $id
            );
            ActivityLog::create($data);
        }
        if(Session::get('start_date')!=$request->start_date)
        {
            $data=array(
                'session_id' => Session::get('session_id'),
                'updated_table_name' => 'licenses',
                'updated_field_name' => 'start_date',
                'updated_field_old_value' => Session::get('start_date'),
                'updated_table_pk' => $id
            );
            ActivityLog::create($data);
        }
        if(Session::get('expiry_date')!=$request->expiry_date)
        {
            $data=array(
                'session_id' => Session::get('session_id'),
                'updated_table_name' => 'licenses',
                'updated_field_name' => 'expiry_date',
                'updated_field_old_value' => Session::get('expiry_date'),
                'updated_table_pk' => $id
            );
            ActivityLog::create($data);
        }
        if(Session::get('remarks')!=$request->remarks)
        {
            $data=array(
                'session_id' => Session::get('session_id'),
                'updated_table_name' => 'licenses',
                'updated_field_name' => 'remarks',
                'updated_field_old_value' => Session::get('remarks'),
                'updated_table_pk' => $id
            );
            ActivityLog::create($data);
        }
        Session::forget('proj_id');
        Session::forget('license_key');
        Session::forget('license_status');
        Session::forget('start_date');
        Session::forget('expiry_date');
        Session::forget('remarks');

        return $this->show($id);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return Response
     */
    public function create()
    {
        $projects=DB::table('projects')
                    ->join('clients', 'projects.client_id', '=', 'clients.id')
                    ->select('projects.*','clients.client_name')
                    ->get();
        return view('License.create')->with('projects',$projects);
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return Response
     */
    public function edit($id)
    {
        $license = DB::table('licenses')
                    ->where('licenses.id','=',$id)
                    ->join('projects', 'licenses.proj_id', '=', 'projects.id')
                    ->join('clients', 'projects.client_id', '=', 'clients.id')
                    ->select('licenses.*', 'projects.proj_name as proj_name','clients.client_name')
                    ->first();
        $projects=DB::table('projects')
                    ->join('clients', 'projects.client_id', '=', 'clients.id')
                    ->select('projects.*','clients.client_name')
                    ->get();

        Session::put('proj_id',$license->proj_id);
        Session::put('license_key',$license->license_key);
        Session::put('license_status',$license->license_status);
        Session::put('start_date',$license->start_date);
        Session::put('expiry_date',$license->expiry_date);
        Session::put('remarks',$license->remarks);

        return view('License.edit', ['license' => $license, 'projects' => $projects]);
    }
    
}
