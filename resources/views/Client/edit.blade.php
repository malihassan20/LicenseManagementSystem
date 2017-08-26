@extends('layout')

@section('title')
Edit Client
@endsection

@section('content')

<div class="box-header with-border">
    <h3 class="box-title">Update Client Detail</h3>
</div>
<div class="box-body">
    {!! Form::open(['action' => ['Admin\ClientController@update', $client->id], 'method' => 'put', 'class' => 'form-horizontal']) !!}
        <div class="box-body">
            @foreach ($errors->all() as $error)
                <p class="text-red">{{ $error }}</p>
            @endforeach
            {!! Form::hidden('id', $client->id) !!}
            <div class="form-group">
                <label class="col-sm-1 control-label">Full Name</label>
                <div class="col-sm-3">
                    {!! Form::text('client_name',$client->client_name, array('class' => 'form-control')) !!}
                </div>
                <label class="col-sm-1 control-label">Email</label>
                <div class="col-sm-3">
                    {!! Form::email('email',$client->email, array('class' => 'form-control')) !!}
                </div>
            </div>
            <div class="form-group">
                <label class="col-sm-1 control-label">Address</label>
                <div class="col-sm-7">
                    {!! Form::text('address',$client->address,array('class' => 'form-control')) !!}
                </div>
            </div>
            <div class="form-group">
                <label class="col-sm-1 control-label">Phone</label>
                <div class="col-sm-3">
                    {!! Form::text('phone',$client->phone, array('class' => 'form-control')) !!}
                </div>
                <label class="col-sm-1 control-label">City</label>
                <div class="col-sm-3">
                    {!! Form::text('city',$client->city,array('class' => 'form-control')) !!}
                </div>
            </div>
            <div class="form-group">
                <label class="col-sm-1 control-label">State</label>
                <div class="col-sm-3">
                    {!! Form::text('state',$client->state,array('class' => 'form-control')) !!}
                </div>
                <label class="col-sm-1 control-label">Country</label>
                <div class="col-sm-3">
                    {!! Form::text('country',$client->country,array('class' => 'form-control')) !!}
                </div>
            </div>
            <div class="form-group">
                <label class="col-sm-1 control-label">Zip Code</label>
                <div class="col-sm-3">
                    {!! Form::text('zip_code',$client->zip_code,array('class' => 'form-control')) !!}
                </div>
                <label class="col-sm-1 control-label">Industry</label>
                <div class="col-sm-3">
                    {!! Form::text('industry',$client->industry,array('class' => 'form-control')) !!}
                </div>
            </div>
            <div class="form-group">
                <label class="col-sm-1 control-label">Description</label>
                <div class="col-sm-7">
                    {!! Form::textarea('description',$client->description,array('class' => 'form-control')) !!}
                </div>
            </div>
        </div>
        <div class="box-footer">
            {!! Form::submit( 'Update', array('class' => 'btn btn-primary')) !!}
        </div>
    {!! Form::close() !!}
</div>

@endsection