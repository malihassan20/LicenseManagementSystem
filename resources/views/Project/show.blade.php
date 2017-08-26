@extends('layout')

@section('title')
Project Detail
@endsection

@section('css')
<link rel="stylesheet" href="{{ URL::asset('plugins/select2/select2.min.css') }}">
<style>
b{
    padding-right:10px;
}
</style>
@endsection

@section('content')
<div class="box-header with-border">
    <h3 class="box-title">Project Detail</h3>
</div>
<div class="box-body">
    <div class="box-body">
        <div class="col-sm-10">
            <div class="col-sm-5">
                <b>Name : </b>{{ $project->proj_name }}
            </div>
            <div class="col-sm-5">
                <b>URL : </b>{{ $project->proj_url }}
            </div>
        </div>
        <br/><br/>
        <div class="col-sm-10">
            <div class="col-sm-2"><b>Project Types : </b></div>
            <div class="col-sm-8">
                <select name="typesSelected[]" disabled  class="col-sm-8 select2" multiple="multiple">
                    @foreach ($project_types as $tp)
                        <option value="{{ $tp->id }}" selected>{{ $tp->type_name }}</option>
                    @endforeach
                </select>
            </div>
        </div>
        <br/><br/><br/>
        <div class="col-sm-10">
            <div class="col-sm-2"><b>Technologies Used : </b></div>
            <div class="col-sm-8">
                <select name="technologiesSelected[]" disabled class="col-sm-8 select2" multiple="multiple">
                    @foreach ($project_technologies as $tech)
                        <option value="{{ $tech->id }}" selected>{{ $tech->technology_name }}</option>
                    @endforeach
                </select>
            </div>
        </div>
        <br/><br/><br/>
        <div class="col-sm-10">
            <div class="col-sm-5">
                <b>Start Date : </b> {{ $project->start_date }}
            </div>
            <div class="col-sm-5">
                <b>End Date : </b> {{ $project->end_date }}
            </div>
        </div>
        <br/><br/>
        <div class="col-sm-10">
            <div class="col-sm-5">
                <b>Client : </b> <a href="{{ URL::to('client') }}/{{ $project->client_id }}"> {{ $project->client_name }} </a>
            </div>
        </div>
        <br/><br/>
        <div class="form-group">
            <div class="col-sm-10" style="margin-left:15px;">
                <b>Description : </b> {{ $project->description }}
            </div>
        </div>
        <br/><br/>
    </div>
    <div class="box-footer">
        <a href="{{ URL::to('project') }}/{{ $project->id }}/edit" class="btn btn-primary">Edit</a>
    </div>
</div>
@endsection

@section('js')
<script src="{{ URL::asset('plugins/select2/select2.full.min.js') }}"></script>

<script> 
    $(".select2").select2();
</script>
@endsection