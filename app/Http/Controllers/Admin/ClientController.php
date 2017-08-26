<?php

namespace App\Http\Controllers\Admin;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Client;
use DB;
use Carbon\Carbon;
use Session;
use App\Http\Requests\SaveClientRequest;
use App\ActivityLog;

class ClientController extends Controller
{   
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $clients=Client::all();
        return view('Client.index')->with('clients',$clients);
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(SaveClientRequest $request)
    {
        $client=Client::create($request->all());

        $data=array(
            'session_id' => Session::get('session_id'),
            'updated_table_name' => 'clients',
            'updated_field_name' => 'New Client Created',
            'updated_field_old_value' => 'Not Available',
            'updated_table_pk' => $client->id
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
        $client = Client::find($id);
        return view('Client.show')->with('client',$client);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(SaveClientRequest $request, $id)
    {
        Client::findOrFail($id)->update($request->all());

        if(Session::get('client_name')!=$request->client_name)
        {
            $data=array(
                'session_id' => Session::get('session_id'),
                'updated_table_name' => 'clients',
                'updated_field_name' => 'client_name',
                'updated_field_old_value' => Session::get('client_name'),
                'updated_table_pk' => $id
            );
            ActivityLog::create($data);
        }
        if(Session::get('email')!=$request->email)
        {
            $data=array(
                'session_id' => Session::get('session_id'),
                'updated_table_name' => 'clients',
                'updated_field_name' => 'email',
                'updated_field_old_value' => Session::get('email'),
                'updated_table_pk' => $id
            );
            ActivityLog::create($data);
        }
        if(Session::get('phone')!=$request->phone)
        {
            $data=array(
                'session_id' => Session::get('session_id'),
                'updated_table_name' => 'clients',
                'updated_field_name' => 'phone',
                'updated_field_old_value' => Session::get('phone'),
                'updated_table_pk' => $id
            );
            ActivityLog::create($data);
        }
        if(Session::get('address')!=$request->address)
        {
            $data=array(
                'session_id' => Session::get('session_id'),
                'updated_table_name' => 'clients',
                'updated_field_name' => 'address',
                'updated_field_old_value' => Session::get('address'),
                'updated_table_pk' => $id
            );
            ActivityLog::create($data);
        }
        if(Session::get('city')!=$request->city)
        {
            $data=array(
                'session_id' => Session::get('session_id'),
                'updated_table_name' => 'clients',
                'updated_field_name' => 'city',
                'updated_field_old_value' => Session::get('city'),
                'updated_table_pk' => $id
            );
            ActivityLog::create($data);
        }
        if(Session::get('state')!=$request->state)
        {
            $data=array(
                'session_id' => Session::get('session_id'),
                'updated_table_name' => 'clients',
                'updated_field_name' => 'state',
                'updated_field_old_value' => Session::get('state'),
                'updated_table_pk' => $id
            );
            ActivityLog::create($data);
        }
        if(Session::get('country')!=$request->country)
        {
            $data=array(
                'session_id' => Session::get('session_id'),
                'updated_table_name' => 'clients',
                'updated_field_name' => 'country',
                'updated_field_old_value' => Session::get('country'),
                'updated_table_pk' => $id
            );
            ActivityLog::create($data);
        }
        if(Session::get('zip_code')!=$request->zip_code)
        {
            $data=array(
                'session_id' => Session::get('session_id'),
                'updated_table_name' => 'clients',
                'updated_field_name' => 'zip_code',
                'updated_field_old_value' => Session::get('zip_code'),
                'updated_table_pk' => $id
            );
            ActivityLog::create($data);
        }
        if(Session::get('industry')!=$request->industry)
        {
            $data=array(
                'session_id' => Session::get('session_id'),
                'updated_table_name' => 'clients',
                'updated_field_name' => 'industry',
                'updated_field_old_value' => Session::get('industry'),
                'updated_table_pk' => $id
            );
            ActivityLog::create($data);
        }
        if(Session::get('description')!=$request->description)
        {
            $data=array(
                'session_id' => Session::get('session_id'),
                'updated_table_name' => 'clients',
                'updated_field_name' => 'description',
                'updated_field_old_value' => Session::get('description'),
                'updated_table_pk' => $id
            );
            ActivityLog::create($data);
        }
        Session::forget('client_name');
        Session::forget('email');
        Session::forget('phone');
        Session::forget('address');
        Session::forget('city');
        Session::forget('state');
        Session::forget('country');
        Session::forget('zip_code');
        Session::forget('industry');
        Session::forget('description');

        return $this->show($id);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return Response
     */
    public function create()
    {
        return view('Client.create');
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return Response
     */
    public function edit($id)
    {
        $client = Client::find($id);

        Session::put('client_name',$client->client_name);
        Session::put('email',$client->email);
        Session::put('phone',$client->phone);
        Session::put('address',$client->address);
        Session::put('city',$client->city);
        Session::put('state',$client->state);
        Session::put('country',$client->country);
        Session::put('zip_code',$client->zip_code);
        Session::put('industry',$client->industry);
        Session::put('description',$client->description);

        return view('Client.edit')->with('client',$client);
    }
    
}
