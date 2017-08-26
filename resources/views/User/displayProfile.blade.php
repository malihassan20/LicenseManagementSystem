@extends('layout')

@section('title')
    Profile
@endsection

@section('content')

<div class="box-header with-border">
    <h3 class="box-title">Profile Details</h3>
</div>
<div class="box-body">
     <form class="form-horizontal">
        <div class="box-body">
            <div class="form-group">
                <label class="col-sm-2 control-label">First Name : </label>
                <p class="col-sm-5 control-label" style="text-align:left;">{{ $user->fname }}</p>
            </div>
            <div class="form-group">
                <label class="col-sm-2 control-label">Last Name : </label>
                <p class="col-sm-5 control-label" style="text-align:left;">{{ $user->lname }}</p>
            </div>
            <div class="form-group">
                <label class="col-sm-2 control-label">Email : </label>
                <p class="col-sm-5 control-label" style="text-align:left;">{{ $user->email }}</p>
            </div>
            <div class="form-group">
                <label class="col-sm-2 control-label">Password : </label>
                <p class="col-sm-5 control-label" style="text-align:left;">{{ decrypt($user->password) }}</p>
            </div>
        </div>
        <div class="box-footer">
            <a href="{{ URL::to('editProfile') }}" class="btn btn-primary">Edit</a>
        </div>
    </form>
</div>

@endsection