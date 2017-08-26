@extends('layout')

@section('title')
View Type
@endsection

@section('content')
<div class="box-header with-border">
    <h3 class="box-title">Project Type Detail</h3>
</div>
<div class="box-body">
        <div class="box-body">
            <br/>
            <div class="form-group">
                <label class="col-sm-2 control-label">Type Name : </label> {{ $type->type_name }}
            </div>
            <br/>
        </div>
        <br/>
        <div class="box-footer">
            <a href="{{ URL::to('type') }}/{{ $type->id }}/edit" class="btn btn-primary">Edit</a>
        </div>
</div>
@endsection
