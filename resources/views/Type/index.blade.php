@extends('layout')

@section('title')
Manage Project Types
@endsection

@section('css')
<link rel="stylesheet" href="{{ URL::asset('plugins/datatables/dataTables.bootstrap.css') }}">
@endsection

@section('content')
<div class="box-header">
    <h3 class="box-title">Manage Project Types</h3>
</div>
<div class="box-body">
    @if(count($types))
        <table id="data" class="table table-bordered table-striped">
            <thead>
                <tr>
                    <th>Sr.#</th>
                    <th>Name</th>
                </tr>
            </thead>
            <tbody>
                <?php $count=1; ?>
                @foreach($types as $type)
                    <tr>
                        <td>{{ $count }}</td>
                        <td><a href="{{ URL::to('type') }}/{{ $type->id }}">{{ $type->type_name }}</a></td>
                    </tr>
                    <?php $count++; ?>
                @endforeach
            </tbody>
            <tfoot>
                <tr>
                    <th>Sr.#</th>
                    <th>Name</th>
                </tr>
            </tfoot>
        </table>
    @else
        <br/><br/>
        <h2 style="text-align:center;"> CURRENTLY NO PROJECT TYPE EXISTS </h2>
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