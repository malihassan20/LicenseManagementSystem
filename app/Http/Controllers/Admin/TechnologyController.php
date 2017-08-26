<?php

namespace App\Http\Controllers\Admin;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Technology;
use DB;
use Carbon\Carbon;
use Session;
use App\Http\Requests\SaveTechnologyRequest;
use App\ActivityLog;

class TechnologyController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $technologies=Technology::orderBy('technology_name')->get();;
        return view('Technology.index')->with('technologies',$technologies);
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(SaveTechnologyRequest $request)
    {
        $technology=Technology::create($request->all());

        $data=array(
            'session_id' => Session::get('session_id'),
            'updated_table_name' => 'technologies',
            'updated_field_name' => 'New Technology Created',
            'updated_field_old_value' => 'Not Available',
            'updated_table_pk' => $technology->id
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
        $technology = Technology::find($id);
        return view('Technology.show')->with('technology',$technology);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(SaveTechnologyRequest $request, $id)
    {
        Technology::findOrFail($id)->update($request->all());

        if(Session::get('technology_name')!=$request->technology_name)
        {
            $data=array(
                'session_id' => Session::get('session_id'),
                'updated_table_name' => 'technologies',
                'updated_field_name' => 'technology_name',
                'updated_field_old_value' => Session::get('technology_name'),
                'updated_table_pk' => $id
            );
            ActivityLog::create($data);
        }
        
        Session::forget('technology_name');

        return $this->show($id);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return Response
     */
    public function create()
    {
        return view('Technology.create');
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return Response
     */
    public function edit($id)
    {
        $technology = Technology::find($id);
        Session::put('technology_name',$technology->technology_name);
        return view('Technology.edit', ['technology' => $technology]);
    }
}
