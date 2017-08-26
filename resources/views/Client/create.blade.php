@extends('layout')

@section('title')
Create Client
@endsection

@section('content')

<div class="box-header with-border">
    <h3 class="box-title">Create New Client</h3>
</div>
<div class="box-body">
    {!! Form::open(['url' => 'client', 'method' => 'post', 'class' => 'form-horizontal']) !!}
        <div class="box-body">
            @foreach ($errors->all() as $error)
                <p class="text-red">{{ $error }}</p>
            @endforeach
            <div class="form-group">
                <label class="col-sm-1 control-label">Full Name</label>
                <div class="col-sm-3">
                    {!! Form::text('client_name',null, array('class' => 'form-control')) !!}
                </div>
                <label class="col-sm-1 control-label">Email</label>
                <div class="col-sm-3">
                    {!! Form::email('email',null, array('class' => 'form-control')) !!}
                </div>
            </div>
            <div class="form-group">
                <label class="col-sm-1 control-label">Address</label>
                <div class="col-sm-7">
                    {!! Form::text('address',null,array('class' => 'form-control')) !!}
                </div>
            </div>
            <div class="form-group">
                <label class="col-sm-1 control-label">Phone</label>
                <div class="col-sm-3">
                    {!! Form::text('phone',null, array('class' => 'form-control')) !!}
                </div>
                <label class="col-sm-1 control-label">City</label>
                <div class="col-sm-3">
                    {!! Form::text('city',null,array('class' => 'form-control')) !!}
                </div>
            </div>
            <div class="form-group">
                <label class="col-sm-1 control-label">State</label>
                <div class="col-sm-3">
                    {!! Form::text('state',null,array('class' => 'form-control')) !!}
                </div>
                <label class="col-sm-1 control-label">Country</label>
                <div class="col-sm-3">
                    {!! Form::text('country',null,array('class' => 'form-control')) !!}
                </div>
            </div>
            <div class="form-group">
                <label class="col-sm-1 control-label">Zip Code</label>
                <div class="col-sm-3">
                    {!! Form::text('zip_code',null,array('class' => 'form-control')) !!}
                </div>
                <label class="col-sm-1 control-label">Industry</label>
                <div class="col-sm-3">
                    {!! Form::text('industry',null,array('class' => 'form-control')) !!}
                </div>
            </div>
            <div class="form-group">
                <label class="col-sm-1 control-label">Description</label>
                <div class="col-sm-7">
                    {!! Form::textarea('description',null,array('class' => 'form-control')) !!}
                </div>
            </div>
        </div>
        <div class="box-footer">
            {!! Form::submit( 'Save', array('class' => 'btn btn-primary')) !!}
        </div>
    {!! Form::close() !!}
</div>

@endsection