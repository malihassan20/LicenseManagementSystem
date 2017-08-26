@extends('layout')

@section('title')
View Technology
@endsection

@section('content')
<div class="box-header with-border">
    <h3 class="box-title">Project Technology Detail</h3>
</div>
<div class="box-body">
        <div class="box-body">
            <br/>
            <div class="form-group">
                <label class="col-sm-2 control-label">Technology Name : </label> {{ $technology->technology_name }}
            </div>
            <br/>
        </div>
        <br/>
        <div class="box-footer">
            <a href="{{ URL::to('technology') }}/{{ $technology->id }}/edit" class="btn btn-primary">Edit</a>
        </div>
</div>
@endsection
