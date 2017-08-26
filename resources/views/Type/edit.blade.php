@extends('layout')

@section('title')
Edit Type
@endsection

@section('content')
<div class="box-header with-border">
    <h3 class="box-title">Edit Project Type</h3>
</div>
<div class="box-body">

    {!! Form::open(['action' => ['Admin\TypeController@update', $type->id], 'method' => 'put', 'class' => 'form-horizontal']) !!}
        <div class="box-body">
            @foreach ($errors->all() as $error)
                <p class="text-red">{{ $error }}</p>
            @endforeach
            {!! Form::hidden('id', $type->id) !!}
            <div class="form-group">
                <label class="col-sm-2 control-label">Type Name</label>
                <div class="col-sm-3">
                    {!! Form::text('type_name',$type->type_name, array('class' => 'form-control')) !!}
                </div>
            </div>
        </div>
        <div class="box-footer">
            {!! Form::submit( 'Update', array('class' => 'btn btn-primary')) !!}
        </div>
    {!! Form::close() !!}

</div>
@endsection
