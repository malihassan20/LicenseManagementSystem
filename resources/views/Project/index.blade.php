@extends('layout')

@section('title')
Manage Projects
@endsection

@section('css')
<link rel="stylesheet" href="{{ URL::asset('plugins/datatables/dataTables.bootstrap.css') }}">
@endsection

@section('content')
<div class="box-header">
    <h3 class="box-title">Manage Projects</h3>
</div>
<div class="box-body">
    @if(count($projects))
        <table id="data" class="table table-bordered table-striped">
            <thead>
                <tr>
                    <th>Sr.#</th>
                    <th>Name</th>
                    <th>Start Date</th>
                    <th>End Date</th>
                </tr>
            </thead>
            <tbody>
                <?php $count=1; ?>
                @foreach($projects as $project)
                    <tr>
                        <td>{{ $count }}</td>
                        <td><a href="{{ URL::to('project') }}/{{ $project->id }}">{{ $project->proj_name }}</a></td>
                        <td>{{ $project->start_date }}</td>
                        <td>{{ $project->end_date }}</td>
                    </tr>
                    <?php $count++; ?>
                @endforeach
            </tbody>
            <tfoot>
                <tr>
                    <th>Sr.#</th>
                    <th>Name</th>
                    <th>Start Date</th>
                    <th>End Date</th>
                </tr>
            </tfoot>
        </table>
    @else
        <br/><br/>
        <h2 style="text-align:center;"> CURRENTLY NO PROJECT EXISTS </h2>
        <br/><br/><br/><br/>
    @endif
</div>
@endsection

@section('js')
<script src="{{ URL::asset('plugins/datatables/jquery.dataTables.min.js') }}"></script>
<script src="{{ URL::asset('plugins/datatables/dataTables.bootstrap.min.js') }}"></script>
<script>
  $(function () {
    $("#data").DataTable();
  });
</script>
@endsection