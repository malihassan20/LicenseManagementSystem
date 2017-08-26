@extends('layout')

@section('title')
Create Technology
@endsection

@section('content')
<div class="box-header with-border">
    <h3 class="box-title">Create New Technology</h3>
</div>
<div class="box-body">

    {!! Form::open(['url' => 'technology', 'method' => 'post', 'class' => 'form-horizontal']) !!}
        <div class="box-body">
            @foreach ($errors->all() as $error)
                <p class="text-red">{{ $error }}</p>
            @endforeach
            <div class="form-group">
                <label class="col-sm-2 control-label">Technology Name</label>
                <div class="col-sm-3">
                    {!! Form::text('technology_name',null, array('class' => 'form-control')) !!}
                </div>
            </div>
        </div>
        <div class="box-footer">
            {!! Form::submit( 'Save', array('class' => 'btn btn-primary')) !!}
        </div>
    {!! Form::close() !!}

</div>
@endsection
