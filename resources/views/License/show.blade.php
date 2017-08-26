@extends('layout')

@section('title')
License Detail
@endsection

@section('css')
<style>
b{
    padding-right:10px;
}
</style>
@endsection

@section('content')
<div class="box-header with-border">
    <h3 class="box-title">License Detail</h3>
</div>
<div class="box-body">
    <div class="box-body">
        <div class="col-sm-10">
            <div class="col-sm-5">
                <b>Project Name : </b>{{ $license->proj_name }}
            </div>
            <div class="col-sm-5">
                <b>License Status : </b>{{ $license->license_status }}
            </div>
            
        </div>
        <br/><br/>
        <div class="form-group">
            <div class="col-sm-10" style="margin-left:15px;">
                <b>License Key : </b>{{ $license->license_key }}
            </div>
        </div>
        <br/>
        <div class="col-sm-10">
            <div class="col-sm-5">
                <b>Start Date : </b> {{ $license->start_date }}
            </div>
            <div class="col-sm-5">
                <b>Expiry Date : </b> {{ $license->expiry_date }}
            </div>
        </div>
        <br/><br/>
        <div class="form-group">
            <div class="col-sm-10" style="margin-left:15px;">
                <b>Remarks : </b> {{ $license->remarks }}
            </div>
        </div>
        <br/><br/>
    </div>
    <div class="box-footer">
        <a href="{{ URL::to('license') }}/{{ $license->id }}/edit" class="btn btn-primary">Edit</a>
    </div>
</div>
@endsection