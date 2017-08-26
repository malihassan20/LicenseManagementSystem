@extends('layout')

@section('title')
Create License
@endsection

@section('css')
<link rel="stylesheet" href="{{ URL::asset('plugins/datepicker/datepicker3.css') }}">
<link rel="stylesheet" href="{{ URL::asset('plugins/select2/select2.min.css') }}">
<link rel="stylesheet" href="{{ URL::asset('plugins/iCheck/all.css') }}">
@endsection

@section('content')
<div class="box-header with-border">
    <h3 class="box-title">Create New License</h3>
</div>
<div class="box-body">

    @if(count($projects))
        {!! Form::open(['url' => 'license', 'method' => 'post', 'class' => 'form-horizontal']) !!}
            <div class="box-body">
                @foreach ($errors->all() as $error)
                    <p class="text-red">{{ $error }}</p>
                @endforeach
                <div class="form-group">
                    <label class="col-sm-2 control-label">Project Name</label>
                    <div class="col-sm-3">
                        <select name="proj_id" class="form-control select2">
                            @foreach ($projects as $project)
                                <option value="{{ $project->id }}">{{ $project->proj_name }} (Client: {{ $project->client_name }})</option>
                            @endforeach
                        </select>
                    </div>
                    <label class="col-sm-2 control-label">License Status</label>
                    <div class="col-sm-3">
                        <label class="control-label">
                            {!! Form::radio('license_status', 'Active',true, array('class' => 'minimal')) !!}<span style="padding-left:5px;">Active</sapn>
                        </label>
                        <label style="padding-left:30px;" class="control-label">
                            {!! Form::radio('license_status', 'Deactive',false, array('class' => 'minimal')) !!}<span style="padding-left:5px;">Deactive</sapn>
                        </label>
                    </div>
                </div>
                <div class="form-group">
                    <label class="col-sm-2 control-label">Start Date</label>
                    <div class="col-sm-3">
                        <div class="input-group date">
                            <div class="input-group-addon">
                                <i class="fa fa-calendar"></i>
                            </div>
                            {!! Form::text('start_date',null,array('class' => 'form-control pull-right', 'id' => 'datepicker')) !!}
                        </div>
                    </div>
                    <label class="col-sm-2 control-label">Expiry Date</label>
                    <div class="col-sm-3">
                        <div class="input-group date">
                            <div class="input-group-addon">
                                <i class="fa fa-calendar"></i>
                            </div>
                            {!! Form::text('expiry_date',null,array('class' => 'form-control pull-right', 'id' => 'datepicker1')) !!}
                        </div>
                    </div>
                </div>
                <div class="form-group">
                    <label class="col-sm-2 control-label">License Key</label>
                    <div class="col-sm-5">
                        {!! Form::text('license_key',null,array('class' => 'form-control', 'id' => 'license_key')) !!}
                    </div>
                    <div class="col-sm-1">
                        {!! Form::button( 'Generate', array('class' => 'btn btn-primary', 'onclick' => 'generateSerialKey()')) !!}
                    </div>
                </div>
                <div class="form-group">
                    <label class="col-sm-2 control-label">Remarks</label>
                    <div class="col-sm-8">
                        {!! Form::textarea('remarks',null,array('class' => 'form-control')) !!}
                    </div>
                </div>
            </div>
            <div class="box-footer">
                {!! Form::submit( 'Save', array('class' => 'btn btn-primary')) !!}
            </div>
        {!! Form::close() !!}
    @else
        <br/><br/>
        <h2 style="text-align:center;"> To create new license you have to create new project first. </h2>
        <br/><br/><br/><br/>
    @endif
</div>
@endsection

@section('js')
<script src="{{ URL::asset('plugins/datepicker/bootstrap-datepicker.js') }}"></script>
<script src="{{ URL::asset('plugins/select2/select2.full.min.js') }}"></script>
<script src="{{ URL::asset('plugins/iCheck/icheck.min.js') }}"></script>

<script> 
    $('#datepicker').datepicker({
        autoclose: true,
        format: 'yyyy-mm-dd'
    });
    $('#datepicker1').datepicker({
        autoclose: true,
        format: 'yyyy-mm-dd'
    });

    $('input[type="radio"].minimal').iCheck({
      radioClass: 'iradio_minimal-blue'
    });

    function generateSerialKey()
    {
        var key = "";
        var possible = "ABCDEFGHIJKLMNOPQRSTUVWXYZ0123456789";
        for( var i=0; i < 25; i++ )
        {
            if(i%5==0 && i!=0)
                key += '-';
            key += possible.charAt(Math.floor(Math.random() * possible.length));
        }
        $('#license_key').val(key);
    }
</script>
@endsection