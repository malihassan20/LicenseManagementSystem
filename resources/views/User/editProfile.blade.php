@extends('layout')

@section('title')
    Update Profile
@endsection

@section('content')

<div class="box-header with-border">
    <h3 class="box-title">Edit Profile</h3>
</div>
<div class="box-body">
    @foreach ($errors->all() as $error)
        <p class="text-red">{{ $error }}</p>
    @endforeach
    {!! Form::open(['url' => 'profile', 'method' => 'post', 'class' => 'form-horizontal']) !!}
        <div class="box-body">
            <div class="form-group">
                <label class="col-sm-2 control-label">First Name :</label>
                <div class="col-sm-3">
                    {!! Form::text('fname', $user->fname, ['class' => 'form-control']) !!}
                </div>
            </div>
            <div class="form-group">
                <label class="col-sm-2 control-label">Last Name :</label>
                <div class="col-sm-3">
                    {!! Form::text('lname', $user->lname, ['class' => 'form-control']) !!}
                </div>
            </div>
            <div class="form-group">
                <label class="col-sm-2 control-label">Email</label>
                <div class="col-sm-3">
                    {!! Form::email('email', $user->email, array('class' => 'form-control')) !!}
                </div>
            </div>
            <div class="form-group">
                <label class="col-sm-2 control-label">Password</label>
                <div class="col-sm-3">
                    {!! Form::text('password',decrypt($user->password), array('class' => 'form-control')) !!}
                </div>
            </div>
        </div>
        <div class="box-footer">
            {!! Form::submit( 'Update', array('class' => 'btn btn-primary')) !!}
        </div>
    {!! Form::close() !!}
</div>

@endsection