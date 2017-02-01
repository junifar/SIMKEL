@extends('layouts/kelurahan')
@section('header')
    <link rel="stylesheet" href="//code.jquery.com/ui/1.11.4/themes/smoothness/jquery-ui.css"/>
    <link rel="stylesheet" href="https://cdn.datatables.net/1.10.13/css/dataTables.jqueryui.min.css"/>
    <link rel="stylesheet" href="https://cdn.datatables.net/buttons/1.2.4/css/buttons.jqueryui.min.css"/>
    <link rel="stylesheet" href="https://cdn.datatables.net/select/1.2.1/css/select.jqueryui.min.css"/>
    <link rel="stylesheet" href="https://editor.datatables.net/extensions/Editor/css/editor.jqueryui.min.css"/>

    <!-- DataTables -->
    <script src="https://cdn.datatables.net/1.10.13/js/jquery.dataTables.min.js"></script>
    <script src="https://cdn.datatables.net/1.10.13/js/dataTables.jqueryui.min.js"></script>
    <script src="https://cdn.datatables.net/buttons/1.2.4/js/dataTables.buttons.min.js"></script>
    <script src="https://cdn.datatables.net/buttons/1.2.4/js/buttons.jqueryui.min.js"></script>
    <script src="https://cdn.datatables.net/select/1.2.1/js/dataTables.select.min.js"></script>
    <script src="https://editor.datatables.net/extensions/Editor/js/dataTables.editor.min.js"></script>
    <script src="https://editor.datatables.net/extensions/Editor/js/editor.jqueryui.min.js"></script>

@endsection

@section('content')
    <section class="content">
        <div clas="row">
            <div class="col-md-12">
                <div class="box box-primary">
                    <div class="box-header with-border">
                        <h3 class="box-title">Informasi Kelurahan</h3>
                    </div>
                    <div class="box-body">
                        {!! Form::open(['url' => array('/', $data->id), 'id' => 'editForm', 'class' => 'form-horizontal']) !!}
                        <div class="col-md-6">
                            <div class="form-group {{$errors->has('name')?'has-error':''}}">
                                {!! Form::label('name','Kelurahan :', ['class' => 'col-sm-4 control-label']) !!}
                                <div class="col-sm-8">
                                    {!! Form::text('name',$data->name, ['class' => 'form-control',
                                    'placeholder' => '',
                                    'readonly' => 'true']) !!}
                                    {!! $errors->first('name','<span class="help-block">:message</span>') !!}
                                </div>
                            </div>
                            <div class="form-group {{$errors->has('phone')?'has-error':''}}">
                                {!! Form::label('phone','Telephone :', ['class' => 'col-sm-4 control-label']) !!}
                                <div class="col-sm-8">
                                    {!! Form::text('phone',$data->phone, ['class' => 'form-control',
                                    'placeholder' => '',
                                    'readonly' => 'true']) !!}
                                    {!! $errors->first('phone','<span class="help-block">:message</span>') !!}
                                </div>
                            </div>

                        </div>
                        <div class="col-md-6">
                            <div class="form-group {{$errors->has('lurah')?'has-error':''}}">
                                {!! Form::label('lurah','Lurah :', ['class' => 'col-sm-4 control-label']) !!}
                                <div class="col-sm-8">
                                    {!! Form::text('lurah',$data->lurah, ['class' => 'form-control',
                                    'placeholder' => '',
                                    'readonly' => 'true']) !!}
                                    {!! $errors->first('lurah','<span class="help-block">:message</span>') !!}
                                </div>
                            </div>
                            <div class="form-group {{$errors->has('address')?'has-error':''}}">
                                {!! Form::label('address','Alamat :',['class' => 'col-sm-4 control-label']) !!}
                                <div class="col-sm-8">
                                    {!! Form::textarea('address',$data->address, ['class' => 'form-control',
                                    'placeholder' => '',
                                    'rows' => '3',
                                    'readonly' => 'true']) !!}
                                    {!! $errors->first('address','<span class="help-block">:message</span>') !!}
                                </div>
                            </div>
                        </div>
                        {!! Form::close() !!}
                    </div>
                </div>
                <div class="box">
                    <div class="box-header with-border">
                        <h3 class="box-title">Detail Information</h3>
                    </div>
                    <div class="box-body">
                        <section class="content-header">
                            <h1>
                                Rukun Warga / RW
                                <small>List data</small>
                                <a href="/rukunwarga/add" class="btn btn-primary pull-right">New Data</a>
                            </h1>
                        </section>
                        <section class="content">
                            <div class="row">
                                <div class="col-md-12">
                                    <table class="display compact row-border stripe" cellspacing="0" width="100%" id="rukun-warga-table">
                                        <thead>
                                        <tr>
                                            <th>RW</th>
                                            <th>Nama RW</th>
                                            <th>Telp</th>
                                            <th>Action</th>
                                        </tr>
                                        </thead>
                                    </table>

                                </div>
                            </div>
                        </section>
                    </div>
                </div>
            </div>
        </div>
    </section>
@endsection

@push('scripts')
<script>
    $.fn.dataTable.ext.buttons.alert = {
        className: 'buttons-alert',

        action: function ( e, dt, node, config ) {
            alert( this.text() );
        }
    };
    $(document).ready(function(){
        var table = $('#rukun-warga-table').DataTable({
            processing: true,
            "language":{
                "processing": '<img src="{{ url('/images/ajax-loader.gif') }}"/><br/>Load Data...',
            },
            serverSide: true,
            ajax: '{{ url('/kelurahan/detail/'.$data->id.'/data/') }}',
            stateSave: true,
            columns: [
                { data: 'name', name: 'name' },
                { data: 'name', name: 'name' },
                { data: 'name', name: 'name' },
                { data: 'action', name: 'action', orderable: false, searchable: false}
            ],
            select: true,
            lengthChange: false,
        });

        // Display the buttons
        new $.fn.dataTable.Buttons( table, [
            {
                text: 'Insert',
                action: function ( e, dt, node, config ) {
                    dt.ajax.reload();
                }
            },
            {
                text: 'Edit',
                action: function ( e, dt, node, config ) {
                    dt.ajax.reload();
                }
            }
        ] );

        table.buttons().container()
            .prependTo( $('div.fg-toolbar:eq(0)', table.table().container() ) );
    });
</script>
@endpush