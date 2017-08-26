<?php

namespace App\Http\Controllers\Admin;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Type;
use DB;
use Carbon\Carbon;
use Session;
use App\Http\Requests\SaveTypeRequest;
use App\ActivityLog;

class TypeController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $types=Type::orderBy('type_name')->get();;
        return view('Type.index')->with('types',$types);
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(SaveTypeRequest $request)
    {
        $type=Type::create($request->all());

        $data=array(
            'session_id' => Session::get('session_id'),
            'updated_table_name' => 'types',
            'updated_field_name' => 'New Type Created',
            'updated_field_old_value' => 'Not Available',
            'updated_table_pk' => $type->id
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
        $type = Type::find($id);
        return view('Type.show')->with('type',$type);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(SaveTypeRequest $request, $id)
    {
        Type::findOrFail($id)->update($request->all());

        if(Session::get('type_name')!=$request->type_name)
        {
            $data=array(
                'session_id' => Session::get('session_id'),
                'updated_table_name' => 'types',
                'updated_field_name' => 'type_name',
                'updated_field_old_value' => Session::get('type_name'),
                'updated_table_pk' => $id
            );
            ActivityLog::create($data);
        }
        
        Session::forget('type_name');

        return $this->show($id);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return Response
     */
    public function create()
    {
        return view('Type.create');
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return Response
     */
    public function edit($id)
    {
        $type = Type::find($id);
        Session::put('type_name',$type->type_name);
        return view('Type.edit', ['type' => $type]);
    }

}
