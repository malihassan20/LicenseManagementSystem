@extends('layout')

@section('title')
Edit Project
@endsection

@section('css')
<link rel="stylesheet" href="{{ URL::asset('plugins/datepicker/datepicker3.css') }}">
<link rel="stylesheet" href="{{ URL::asset('plugins/select2/select2.min.css') }}">
@endsection

@section('content')
<div class="box-header with-border">
    <h3 class="box-title">Update Project Detail</h3>
</div>
<div class="box-body">
    {!! Form::open(['action' => ['Admin\ProjectController@update', $project->id], 'method' => 'put', 'class' => 'form-horizontal']) !!}
        <div class="box-body">
            @foreach ($errors->all() as $error)
                <p class="text-red">{{ $error }}</p>
            @endforeach
            {!! Form::hidden('id', $project->id) !!}
            <div class="form-group">
                <label class="col-sm-2 control-label">Project Name</label>
                <div class="col-sm-3">
                    {!! Form::text('proj_name',$project->proj_name, array('class' => 'form-control')) !!}
                </div>
                <label class="col-sm-2 control-label">Project URL</label>
                <div class="col-sm-3">
                    @if($project->proj_url=="Not Available")
                        {!! Form::text('proj_url',null, array('class' => 'form-control')) !!}
                    @else
                        {!! Form::text('proj_url',$project->proj_url, array('class' => 'form-control')) !!}
                    @endif
                </div>
            </div>
            <div class="form-group">
                <label class="col-sm-2 control-label">Project Types</label>
                <div class="col-sm-8">
                    <select name="typesSelected[]" class="form-control select2" multiple="multiple" data-placeholder="Select Project Types">
                        @foreach ($project_types as $tp1)
                            <option value="{{ $tp1->type_id }}" selected>{{ $tp1->type_name }}</option>
                        @endforeach
                        @foreach ($types as $tp)
                            @if(!in_array($tp->id,$project_types_arr))
                                <option value="{{ $tp->id }}">{{ $tp->type_name }}</option>
                            @endif
                        @endforeach
                    </select>
                </div>
            </div>
            <div class="form-group">
                <label class="col-sm-2 control-label">Technologies Used</label>
                <div class="col-sm-8">
                    <select name="technologiesSelected[]" class="form-control select2" multiple="multiple" data-placeholder="Select Technologies Used">
                        @foreach ($project_technologies as $tech1)
                            <option value="{{ $tech1->tech_id }}" selected>{{ $tech1->technology_name }}</option>
                        @endforeach
                        @foreach ($technologies as $tech)
                            @if(!in_array($tech->id,$project_technologies_arr))
                                <option value="{{ $tech->id }}">{{ $tech->technology_name }}</option>
                            @endif
                        @endforeach
                    </select>
                </div>
            </div>
            <div class="form-group">
                <label class="col-sm-2 control-label">Start Date</label>
                <div class="col-sm-3">
                    <div class="input-group date">
                        <div class="input-group-addon">
                            <i class="fa fa-calendar"></i>
                        </div>
                        {!! Form::text('start_date',$project->start_date,array('class' => 'form-control pull-right', 'id' => 'datepicker')) !!}
                    </div>
                </div>
                <label class="col-sm-2 control-label">End Date</label>
                <div class="col-sm-3">
                    <div class="input-group date">
                        <div class="input-group-addon">
                            <i class="fa fa-calendar"></i>
                        </div>
                        {!! Form::text('end_date',$project->end_date,array('class' => 'form-control pull-right', 'id' => 'datepicker1')) !!}
                    </div>
                </div>
            </div>
            <div class="form-group">
                <label class="col-sm-2 control-label">Client</label>
                <div class="col-sm-3">
                    <select name="client_id" class="form-control select2">
                        <option value="{{ $project->client_id }}">{{ $project->client_name }}</option>
                        @foreach ($clients as $client)
                            @if($project->client_id!=$client->id)
                                <option value="{{ $client->id }}">{{ $client->client_name }}</option>
                            @endif
                        @endforeach
                    </select>
                </div>
            </div>
            <div class="form-group">
                <label class="col-sm-2 control-label">Description</label>
                <div class="col-sm-8">
                    {!! Form::textarea('description',$project->description,array('class' => 'form-control')) !!}
                </div>
            </div>
        </div>
        <div class="box-footer">
            {!! Form::submit( 'Update', array('class' => 'btn btn-primary')) !!}
        </div>
    {!! Form::close() !!}
</div>
@endsection

@section('js')
<script src="{{ URL::asset('plugins/datepicker/bootstrap-datepicker.js') }}"></script>
<script src="{{ URL::asset('plugins/select2/select2.full.min.js') }}"></script>

<script> 
    $(".select2").select2();

    $('#datepicker').datepicker({
        autoclose: true,
        format: 'yyyy-mm-dd'
    });
    $('#datepicker1').datepicker({
        autoclose: true,
        format: 'yyyy-mm-dd'
    });
</script>
@endsection