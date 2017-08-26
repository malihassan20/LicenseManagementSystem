@extends('layout')

@section('title')
Update License
@endsection

@section('css')
<link rel="stylesheet" href="{{ URL::asset('plugins/datepicker/datepicker3.css') }}">
<link rel="stylesheet" href="{{ URL::asset('plugins/select2/select2.min.css') }}">
<link rel="stylesheet" href="{{ URL::asset('plugins/iCheck/all.css') }}">
@endsection

@section('content')
<div class="box-header with-border">
    <h3 class="box-title">Update License Detail</h3>
</div>
<div class="box-body">
    {!! Form::open(['action' => ['Admin\LicenseController@update', $license->id], 'method' => 'put', 'class' => 'form-horizontal']) !!}
        <div class="box-body">
            @foreach ($errors->all() as $error)
                <p class="text-red">{{ $error }}</p>
            @endforeach
            {!! Form::hidden('id', $license->id) !!}
            <div class="form-group">
                <label class="col-sm-2 control-label">Project Name</label>
                <div class="col-sm-3">
                    <select name="proj_id" class="form-control select2">
                        <option value="{{ $license->proj_id }}">{{ $license->proj_name }} (Client: {{ $license->client_name }})</option>
                        @foreach ($projects as $project)
                            @if($license->proj_id!=$project->id)
                                <option value="{{ $project->id }}">{{ $project->proj_name }} (Client: {{ $project->client_name }})</option>
                            @endif
                        @endforeach
                    </select>
                </div>
                <label class="col-sm-2 control-label">License Status</label>
                <div class="col-sm-3">
                    <label class="control-label">
                        @if($license->license_status=='Active')
                            {!! Form::radio('license_status', 'Active',true, array('class' => 'minimal')) !!}
                        @else
                            {!! Form::radio('license_status', 'Active',false, array('class' => 'minimal')) !!}
                        @endif
                        <span style="padding-left:5px;">Active</sapn>
                    </label>
                    <label style="padding-left:30px;" class="control-label">
                        @if($license->license_status=='Deactive')
                            {!! Form::radio('license_status', 'Deactive',true, array('class' => 'minimal')) !!}
                        @else
                            {!! Form::radio('license_status', 'Deactive',false, array('class' => 'minimal')) !!}
                        @endif
                        <span style="padding-left:5px;">Deactive</sapn>
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
                        {!! Form::text('start_date',$license->start_date,array('class' => 'form-control pull-right', 'id' => 'datepicker')) !!}
                    </div>
                </div>
                <label class="col-sm-2 control-label">Expiry Date</label>
                <div class="col-sm-3">
                    <div class="input-group date">
                        <div class="input-group-addon">
                            <i class="fa fa-calendar"></i>
                        </div>
                        {!! Form::text('expiry_date',$license->expiry_date,array('class' => 'form-control pull-right', 'id' => 'datepicker1')) !!}
                    </div>
                </div>
            </div>
            <div class="form-group">
                <label class="col-sm-2 control-label">License Key</label>
                <div class="col-sm-5">
                    {!! Form::text('license_key',$license->license_key,array('class' => 'form-control', 'id' => 'license_key')) !!}
                </div>
                <div class="col-sm-1">
                    {!! Form::button( 'Generate', array('class' => 'btn btn-primary', 'onclick' => 'generateSerialKey()')) !!}
                </div>
            </div>
            <div class="form-group">
                <label class="col-sm-2 control-label">Remarks</label>
                <div class="col-sm-8">
                    {!! Form::textarea('remarks',$license->remarks,array('class' => 'form-control')) !!}
                </div>
            </div>
        </div>
        <div class="box-footer">
            {!! Form::submit( 'Update', array('class' => 'btn btn-primary')) !!}
        </div>
    {!! Form::close() !!}
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