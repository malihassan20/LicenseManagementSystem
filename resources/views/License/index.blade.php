@extends('layout')

@section('title')
Manage Licenses
@endsection

@section('css')
<link rel="stylesheet" href="{{ URL::asset('plugins/datatables/dataTables.bootstrap.css') }}">
@endsection

@section('content')
<div class="box-header">
    <h3 class="box-title">Manage Licenses</h3>
</div>
<div class="box-body">
    @if(count($licenses))
        <table id="data" class="table table-bordered table-striped">
            <thead>
                <tr>
                    <th>Sr.#</th>
                    <th>Project Name</th>
                    <th>Start Date</th>
                    <th>Expiry Date</th>
                </tr>
            </thead>
            <tbody>
                <?php $count=1; ?>
                @foreach($licenses as $license)
                    <tr>
                        <td>{{ $count }}</td>
                        <td><a href="{{ URL::to('license') }}/{{ $license->id }}">{{ $license->proj_name }}</a></td>
                        <td>{{ $license->start_date }}</td>
                        <td>{{ $license->expiry_date }}</td>
                    </tr>
                    <?php $count++; ?>
                @endforeach
            </tbody>
            <tfoot>
                <tr>
                    <th>Sr.#</th>
                    <th>Project Name</th>
                    <th>Start Date</th>
                    <th>Expiry Date</th>
                </tr>
            </tfoot>
        </table>
    @else
        <br/><br/>
        <h2 style="text-align:center;"> CURRENTLY NO LICENSE EXISTS </h2>
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