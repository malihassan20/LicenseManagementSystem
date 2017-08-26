@extends('layout')

@section('title')
Manage Project Technologies
@endsection

@section('css')
<link rel="stylesheet" href="{{ URL::asset('plugins/datatables/dataTables.bootstrap.css') }}">
@endsection

@section('content')
<div class="box-header">
    <h3 class="box-title">Manage Project Technologies</h3>
</div>
<div class="box-body">
    @if(count($technologies))
        <table id="data" class="table table-bordered table-striped">
            <thead>
                <tr>
                    <th>Sr.#</th>
                    <th>Name</th>
                </tr>
            </thead>
            <tbody>
                <?php $count=1; ?>
                @foreach($technologies as $tech)
                    <tr>
                        <td>{{ $count }}</td>
                        <td><a href="{{ URL::to('technology') }}/{{ $tech->id }}">{{ $tech->technology_name }}</a></td>
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
        <h2 style="text-align:center;"> CURRENTLY NO PROJECT TECHNOLOGY EXISTS </h2>
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