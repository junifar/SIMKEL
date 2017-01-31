@extends('layouts/kelurahan')

@section('header')
    <link rel="stylesheet" href="https://cdn.datatables.net/1.10.13/css/dataTables.jqueryui.min.css"/>
    <link rel="stylesheet" href="//code.jquery.com/ui/1.11.4/themes/smoothness/jquery-ui.css"/>

    <!-- DataTables -->
    <script src="https://cdn.datatables.net/1.10.13/js/jquery.dataTables.min.js"></script>
    <script src="https://cdn.datatables.net/1.10.13/js/dataTables.jqueryui.min.js"></script>
    <script src="https://cdn.datatables.net/responsive/2.1.1/js/dataTables.responsive.min.js"></script>
@endsection

@section('content')
    <section class="content-header">
        <h1>
            Rukun Tetangga / RT
            <small>List data</small>
            <a href="/rukuntetangga/add" class="btn btn-primary pull-right">New Data</a>
        </h1>
    </section>
    <section class="content">
        <div class="row">
            <div class="col-md-12">
                <table class="display compact row-border stripe" cellspacing="0" width="100%" id="rukun-tetangga-table">
                    <thead>
                    <tr>
                        <th>Nomor RT</th>
                        <th>Action</th>
                    </tr>
                    </thead>
                </table>

            </div>
        </div>
    </section>
@endsection

@push('scripts')
<script>
    $(document).ready(function(){
        $('#rukun-tetangga-table').DataTable({
            processing: true,
            "language":{
                "processing": '<img src="{{ url('/images/ajax-loader.gif') }}"/><br/>Load Data...',
            },
            serverSide: true,
            ajax: '{{ url('/rukuntetangga/data') }}',
            stateSave: true,
            columns: [
                { data: 'name', name: 'name' },
                { data: 'action', name: 'action', orderable: false, searchable: false}
            ]
        });
    });
</script>
@endpush