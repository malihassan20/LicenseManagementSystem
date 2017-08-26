@extends('layout')

@section('title')
    Dashboard
@endsection

@section('content')

<div class="box-header with-border">
    <h3 class="box-title">Dashboard</h3>
</div>
<div class="box-body">

    <div class="row">
        <div class="col-lg-3 col-xs-6">
          <div class="small-box bg-yellow">
            <div class="inner">
              <h3>{{ $clients }}</h3>

              <p>Total Clients</p>
            </div>
            <div class="icon">
              <i class="ion ion-person-add"></i>
            </div>
            <a href="{{ URL::to('client') }}" class="small-box-footer">
              More info <i class="fa fa-arrow-circle-right"></i>
            </a>
          </div>
        </div>
        <div class="col-lg-3 col-xs-6">
          <div class="small-box bg-aqua">
            <div class="inner">
              <h3>{{ $projects }}</h3>

              <p>Total Projects</p>
            </div>
            <div class="icon">
              <i class="fa fa-briefcase"></i>
            </div>
            <a href="{{ URL::to('project') }}" class="small-box-footer">
              More info <i class="fa fa-arrow-circle-right"></i>
            </a>
          </div>
        </div>
        <div class="col-lg-3 col-xs-6">
          <div class="small-box bg-green">
            <div class="inner">
              <h3>{{ $active_licenses }}</h3>

              <p>Active Licenses</p>
            </div>
            <div class="icon">
              <i class="fa fa-key"></i>
            </div>
            <a href="{{ URL::to('license') }}" class="small-box-footer">
              More info <i class="fa fa-arrow-circle-right"></i>
            </a>
          </div>
        </div>
        <div class="col-lg-3 col-xs-6">
          <div class="small-box bg-red">
            <div class="inner">
              <h3>{{ $expired_licenses }}</h3>

              <p>Expired Licenses</p>
            </div>
            <div class="icon">
              <i class="fa fa-key"></i>
            </div>
            <a href="{{ URL::to('license') }}" class="small-box-footer">
              More info <i class="fa fa-arrow-circle-right"></i>
            </a>
          </div>
        </div>
      </div>

      <br/>
    
    <div class="row">
        <div class="col-md-3">
          <div class="box box-default">
            <div class="box-header with-border">
              <h3 class="box-title">Manage Clients</h3>
              <div class="box-tools pull-right">
                <button type="button" class="btn btn-box-tool" data-widget="collapse"><i class="fa fa-minus"></i>
                </button>
              </div>
            </div>
            <div class="box-body">
              <br/>
              <a href="{{ URL::to('client') }}/create">Create Client</a>
              <br/><br/>
              <a href="{{ URL::to('client') }}">Manage Clients</a>
              <br/><br/>
            </div>
          </div>
        </div>    
        <div class="col-md-3">
          <div class="box box-default">
            <div class="box-header with-border">
              <h3 class="box-title">Manage Projects</h3>
              <div class="box-tools pull-right">
                <button type="button" class="btn btn-box-tool" data-widget="collapse"><i class="fa fa-minus"></i>
                </button>
              </div>
            </div>
            <div class="box-body">
              <br/>
              <a href="{{ URL::to('project') }}/create">Create Project</a>
              <br/><br/>
              <a href="{{ URL::to('project') }}">Manage Projects</a>
              <br/><br/>
            </div>
          </div>
        </div>    
        <div class="col-md-3">
          <div class="box box-default">
            <div class="box-header with-border">
              <h3 class="box-title">Manage Licenses</h3>
              <div class="box-tools pull-right">
                <button type="button" class="btn btn-box-tool" data-widget="collapse"><i class="fa fa-minus"></i>
                </button>
              </div>
            </div>
            <div class="box-body">
              <br/>
              <a href="{{ URL::to('license') }}/create">Create License</a>
              <br/><br/>
              <a href="{{ URL::to('license') }}">Manage Licenses</a>
              <br/><br/>
            </div>
          </div>
        </div>
        <div class="col-md-3">
          <div class="box box-default">
            <div class="box-header with-border">
              <h3 class="box-title">Manage Project Types</h3>
              <div class="box-tools pull-right">
                <button type="button" class="btn btn-box-tool" data-widget="collapse"><i class="fa fa-minus"></i>
                </button>
              </div>
            </div>
            <div class="box-body">
              <br/>
              <a href="{{ URL::to('type') }}/create">Create Type</a>
              <br/><br/>
              <a href="{{ URL::to('type') }}">Manage Types</a>
              <br/><br/>
            </div>
          </div>
        </div>       
    </div>

    <div class="row">
        <div class="col-md-3">
          <div class="box box-default">
            <div class="box-header with-border">
              <h3 class="box-title">Manage Project Technologies</h3>
              <div class="box-tools pull-right">
                <button type="button" class="btn btn-box-tool" data-widget="collapse"><i class="fa fa-minus"></i>
                </button>
              </div>
            </div>
            <div class="box-body">
              <br/>
              <a href="{{ URL::to('technology') }}/create">Create Technology</a>
              <br/><br/>
              <a href="{{ URL::to('technology') }}">Manage Technologies</a>
              <br/><br/>
            </div>
          </div>
        </div>       
    </div>

</div>

@endsection