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
            Kelurahan
            <small>List data</small>
            <a href="/kelurahan/add" class="btn btn-primary pull-right">New Data</a>
        </h1>
    </section>
    <section class="content">
        <div class="row">
            <div class="col-md-12">
                <table class="display compact row-border stripe" cellspacing="0" width="100%" id="kelurahan-table">
                    <thead>
                    <tr>
                        <th>Kelurahan</th>
                        <th>Lurah</th>
                        <th>Telephone</th>
                        <th>Alamat</th>
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
        $('#kelurahan-table').DataTable({
            processing: true,
            "language":{
                "processing": '<img src="{{ url('/images/ajax-loader.gif') }}"/><br/>Load Data...',
            },
            serverSide: true,
            ajax: '{{ url('/administration/kelurahan/data') }}',
            stateSave: true,
            columns: [
                { data: 'name', name: 'name' },
                { data: 'lurah', name: 'lurah' },
                { data: 'phone', name: 'phone' },
                { data: 'address', name: 'address' },
                { data: 'action', name: 'action', orderable: false, searchable: false}
            ]
        });
    });
</script>
@endpush