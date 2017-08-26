<?php

namespace App\Http\Controllers\Admin;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Project;
use DB;
use Carbon\Carbon;
use Session;
use App\Http\Requests\SaveProjectRequest;
use App\Client;
use App\Type;
use App\Technology;
use App\ProjectType;
use App\ProjectTechnology;
use App\ActivityLog;

class ProjectController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $projects=Project::all();
        return view('Project.index')->with('projects',$projects);
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(SaveProjectRequest $request)
    {
        if(trim($request->proj_url)=='')
            $request->offsetSet('proj_url',"Not Available");
        
        $project=Project::create($request->all());
        foreach($request->typesSelected as $type)
        {
            ProjectType::create(['proj_id' => $project->id, 'type_id' => $type]);
        }

        foreach($request->technologiesSelected as $tech)
        {
            ProjectTechnology::create(['proj_id' => $project->id, 'tech_id' => $tech]);
        }

        $data=array(
            'session_id' => Session::get('session_id'),
            'updated_table_name' => 'projects',
            'updated_field_name' => 'New Project Created',
            'updated_field_old_value' => 'Not Available',
            'updated_table_pk' => $project->id
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
        $project = DB::table('projects')
                    ->where('projects.id',$id)
                    ->join('clients', 'projects.client_id', '=', 'clients.id')
                    ->select('projects.*', 'clients.client_name as client_name')
                    ->first();
        
        $project_types=DB::table('project_types')
                        ->where('project_types.proj_id',$id)
                        ->join('types', 'project_types.type_id', '=', 'types.id')
                        ->select('project_types.*', 'types.type_name')
                        ->get();

        $project_technologies=DB::table('project_technologies')
                        ->where('project_technologies.proj_id',$id)
                        ->join('technologies', 'project_technologies.tech_id', '=', 'technologies.id')
                        ->select('project_technologies.*', 'technologies.technology_name')
                        ->get();

        return view('Project.show')->with(['project' => $project, 'project_types' => $project_types, 'project_technologies' => $project_technologies]);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(SaveProjectRequest $request, $id)
    {
        if(trim($request->proj_url)=='')
            $request->offsetSet('proj_url',"Not Available");

        Project::findOrFail($id)->update($request->all());

        $que=DB::table('project_types')->where('proj_id', '=', $id)->delete();
        foreach($_POST['typesSelected'] as $type)
        {
            ProjectType::create(['proj_id' => $id, 'type_id' => $type]);
        }

        $que1=DB::table('project_technologies')->where('proj_id', '=', $id)->delete();
        foreach($request->technologiesSelected as $tech)
        {
            ProjectTechnology::create(['proj_id' => $id, 'tech_id' => $tech]);
        }

        if(Session::get('proj_name')!=$request->proj_name)
        {
            $data=array(
                'session_id' => Session::get('session_id'),
                'updated_table_name' => 'projects',
                'updated_field_name' => 'proj_name',
                'updated_field_old_value' => Session::get('proj_name'),
                'updated_table_pk' => $id
            );
            ActivityLog::create($data);
        }
        if(Session::get('proj_url')!=$request->proj_url)
        {
            $data=array(
                'session_id' => Session::get('session_id'),
                'updated_table_name' => 'projects',
                'updated_field_name' => 'proj_url',
                'updated_field_old_value' => Session::get('proj_url'),
                'updated_table_pk' => $id
            );
            ActivityLog::create($data);
        }
        if(Session::get('description')!=$request->description)
        {
            $data=array(
                'session_id' => Session::get('session_id'),
                'updated_table_name' => 'projects',
                'updated_field_name' => 'description',
                'updated_field_old_value' => Session::get('description'),
                'updated_table_pk' => $id
            );
            ActivityLog::create($data);
        }
        if(Session::get('start_date')!=$request->start_date)
        {
            $data=array(
                'session_id' => Session::get('session_id'),
                'updated_table_name' => 'projects',
                'updated_field_name' => 'start_date',
                'updated_field_old_value' => Session::get('start_date'),
                'updated_table_pk' => $id
            );
            ActivityLog::create($data);
        }
        if(Session::get('end_date')!=$request->end_date)
        {
            $data=array(
                'session_id' => Session::get('session_id'),
                'updated_table_name' => 'projects',
                'updated_field_name' => 'end_date',
                'updated_field_old_value' => Session::get('end_date'),
                'updated_table_pk' => $id
            );
            ActivityLog::create($data);
        }
        if(Session::get('client_id')!=$request->client_id)
        {
            $data=array(
                'session_id' => Session::get('session_id'),
                'updated_table_name' => 'projects',
                'updated_field_name' => 'client_id',
                'updated_field_old_value' => Session::get('client_id'),
                'updated_table_pk' => $id
            );
            ActivityLog::create($data);
        }
        
        Session::forget('proj_name');
        Session::forget('proj_url');
        Session::forget('description');
        Session::forget('start_date');
        Session::forget('end_date');
        Session::forget('client_id');

        return $this->show($id);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return Response
     */
    public function create()
    {
        return view('Project.create')->with(['clients' => Client::orderBy('client_name')->get(), 'project_types' => Type::orderBy('type_name')->get(), 'project_technologies' => Technology::orderBy('technology_name')->get() ]);
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return Response
     */
    public function edit($id)
    {
        $project = DB::table('projects')
                    ->where('projects.id','=',$id)
                    ->join('clients', 'projects.client_id', '=', 'clients.id')
                    ->select('projects.*', 'clients.client_name as client_name')
                    ->first();

        $project_types=DB::table('project_types')
                        ->where('project_types.proj_id',$id)
                        ->join('types', 'project_types.type_id', '=', 'types.id')
                        ->select('project_types.*', 'types.type_name')
                        ->get();
        $project_types_arr=array();
        foreach($project_types as $proj)
            $project_types_arr[]=$proj->type_id;
                
        $project_technologies=DB::table('project_technologies')
                        ->where('project_technologies.proj_id',$id)
                        ->join('technologies', 'project_technologies.tech_id', '=', 'technologies.id')
                        ->select('project_technologies.*', 'technologies.technology_name')
                        ->get();
        
        $project_technologies_arr=array();
        foreach($project_technologies as $tec)
            $project_technologies_arr[]=$tec->tech_id;

        Session::put('proj_name',$project->proj_name);
        Session::put('proj_url',$project->proj_url);
        Session::put('description',$project->description);
        Session::put('start_date',$project->start_date);
        Session::put('end_date',$project->end_date);
        Session::put('client_id',$project->client_id);

        return view('Project.edit')->with(['project' => $project, 'clients' => Client::orderBy('client_name')->get(), 'project_types' => $project_types, 'project_types_arr' => $project_types_arr, 'types' => Type::orderBy('type_name')->get(), 'project_technologies' => $project_technologies, 'project_technologies_arr' => $project_technologies_arr, 'technologies' => Technology::orderBy('technology_name')->get()]);
    }
    
}
