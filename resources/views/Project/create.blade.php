@extends('layout')

@section('title')
Create Project
@endsection

@section('css')
<link rel="stylesheet" href="{{ URL::asset('plugins/datepicker/datepicker3.css') }}">
<link rel="stylesheet" href="{{ URL::asset('plugins/select2/select2.min.css') }}">
@endsection

@section('content')
<div class="box-header with-border">
    <h3 class="box-title">Create New Project</h3>
</div>
<div class="box-body">

    @if(count($clients)>0 && count($project_types)>0 && count($project_technologies)>0)
        {!! Form::open(['url' => 'project', 'method' => 'post', 'class' => 'form-horizontal']) !!}
            <div class="box-body">
                @foreach ($errors->all() as $error)
                    <p class="text-red">{{ $error }}</p>
                @endforeach
                <div class="form-group">
                    <label class="col-sm-2 control-label">Project Name</label>
                    <div class="col-sm-3">
                        {!! Form::text('proj_name',null, array('class' => 'form-control')) !!}
                    </div>
                    <label class="col-sm-2 control-label">Project URL</label>
                    <div class="col-sm-3">
                        {!! Form::text('proj_url',null, array('class' => 'form-control')) !!}
                    </div>
                </div>
                <div class="form-group">
                    <label class="col-sm-2 control-label">Project Types</label>
                    <div class="col-sm-8">
                        <select name="typesSelected[]" class="form-control select2" multiple="multiple" data-placeholder="Select Project Types">
                            @foreach ($project_types as $tp)
                                <option value="{{ $tp->id }}">{{ $tp->type_name }}</option>
                            @endforeach
                        </select>
                    </div>
                </div>
                <div class="form-group">
                    <label class="col-sm-2 control-label">Technologies Used</label>
                    <div class="col-sm-8">
                        <select name="technologiesSelected[]" class="form-control select2" multiple="multiple" data-placeholder="Select Technologies Used">
                            @foreach ($project_technologies as $tech)
                                <option value="{{ $tech->id }}">{{ $tech->technology_name }}</option>
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
                            {!! Form::text('start_date',null,array('class' => 'form-control pull-right', 'id' => 'datepicker')) !!}
                        </div>
                    </div>
                    <label class="col-sm-2 control-label">End Date</label>
                    <div class="col-sm-3">
                        <div class="input-group date">
                            <div class="input-group-addon">
                                <i class="fa fa-calendar"></i>
                            </div>
                            {!! Form::text('end_date',null,array('class' => 'form-control pull-right', 'id' => 'datepicker1')) !!}
                        </div>
                    </div>
                </div>
                <div class="form-group">
                    <label class="col-sm-2 control-label">Client</label>
                    <div class="col-sm-3">
                        <select name="client_id" class="form-control select2">
                            @foreach ($clients as $client)
                                <option value="{{ $client->id }}">{{ $client->client_name }}</option>
                            @endforeach
                        </select>
                    </div>
                </div>
                <div class="form-group">
                    <label class="col-sm-2 control-label">Description</label>
                    <div class="col-sm-8">
                        {!! Form::textarea('description',null,array('class' => 'form-control')) !!}
                    </div>
                </div>
            </div>
            <div class="box-footer">
                {!! Form::submit( 'Save', array('class' => 'btn btn-primary')) !!}
            </div>
        {!! Form::close() !!}
    @else
        <br/><br/>
        @if(count($clients)==0)
            <h2 style="text-align:center;"> To create new project you have to create new client first. </h2>
        @elseif(count($project_types)==0)
            <h2 style="text-align:center;"> To create new project you have to create new project type first. </h2>
        @else
            <h2 style="text-align:center;"> To create new project you have to create new project technology first. </h2>
        @endif
        <br/><br/><br/><br/>
    @endif
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