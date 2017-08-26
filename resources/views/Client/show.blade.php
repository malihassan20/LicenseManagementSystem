@extends('layout')

@section('title')
Client Detail
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
    <h3 class="box-title">Client Detail</h3>
</div>
<div class="box-body">
    <div class="box-body">
        <div class="col-sm-10">
            <div class="col-sm-5">
                <b>Full Name : </b>{{ $client->client_name }}
            </div>
            <div class="col-sm-5">
                <b>Email : </b>{{ $client->email }}
            </div>
            
        </div>
        <br/><br/>
        <div class="form-group">
            <div class="col-sm-10" style="margin-left:15px;">
                <b>Address : </b>{{ $client->address }}
            </div>
        </div>
        <br/>
        <div class="col-sm-10">
            <div class="col-sm-5">
                <b>Phone : </b> {{ $client->phone }}
            </div>
            <div class="col-sm-5">
                <b>City : </b> {{ $client->city }}
            </div>
        </div>
        <br/><br/>
        <div class="col-sm-10">
            <div class="col-sm-5">
                <b>State : </b> {{ $client->state }}
            </div>
            <div class="col-sm-5">
                <b>Country : </b> {{ $client->country }}
            </div>
        </div>
        <br/><br/>
        <div class="col-sm-10">
            <div class="col-sm-5">
                <b>Zip Code : </b> {{ $client->zip_code }}
            </div>
            <div class="col-sm-5">
                <b>Industry : </b> {{ $client->industry }}
            </div>
        </div>
        <br/><br/>
        <div class="form-group">
            <div class="col-sm-10" style="margin-left:15px;">
                <b>Description : </b> {{ $client->description }}
            </div>
        </div>
        <br/><br/>
    </div>
    <div class="box-footer">
        <a href="{{ URL::to('client') }}/{{ $client->id }}/edit" class="btn btn-primary">Edit</a>
    </div>
</div>
@endsection