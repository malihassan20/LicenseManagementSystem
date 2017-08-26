@extends('layout')

@section('title')
Manage Clients
@endsection

@section('css')
<link rel="stylesheet" href="{{ URL::asset('plugins/datatables/dataTables.bootstrap.css') }}">
@endsection

@section('content')
<div class="box-header">
    <h3 class="box-title">Manage Clients</h3>
</div>
<div class="box-body">
    @if(count($clients))
        <table id="data" class="table table-bordered table-striped">
            <thead>
                <tr>
                    <th>Sr.#</th>
                    <th>Name</th>
                    <th>Email</th>
                    <th>Phone</th>
                    <th>Industry</th>
                </tr>
            </thead>
            <tbody>
                <?php $count=1; ?>
                @foreach($clients as $client)
                    <tr>
                        <td>{{ $count }}</td>
                        <td><a href="{{ URL::to('client') }}/{{ $client->id }}">{{ $client->client_name }}</a></td>
                        <td>{{ $client->email }}</td>
                        <td>{{ $client->phone }}</td>
                        <td>{{ $client->industry }}</td>
                    </tr>
                    <?php $count++; ?>
                @endforeach
            </tbody>
            <tfoot>
                <tr>
                    <th>Sr.#</th>
                    <th>Name</th>
                    <th>Email</th>
                    <th>Phone</th>
                    <th>Industry</th>
                </tr>
            </tfoot>
        </table>
    @else
        <br/><br/>
        <h2 style="text-align:center;"> CURRENTLY NO CLIENT EXISTS </h2>
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