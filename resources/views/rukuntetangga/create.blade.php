@extends('layouts/kelurahan')
@section('content')
    <section class="content">
        <div clas="row">
            <div class="col-md-6">
                <div class="box box-primary">
                    <div class="box-header">
                        <h3 class="box-title">Input Rukun Tetangga / RT</h3>
                    </div>
                    {!! Form::open(['url' => 'rukuntetangga/save', 'class' => 'form-horizontal']) !!}
                    <div class="box-body">
                        <div class="form-group {{$errors->has('name')?'has-error':''}}">
                            {!! Form::label('name','Nomor Rukun Tetangga / RT :', ['class' => 'col-sm-6 control-label']) !!}
                            <div class="col-sm-6">
                                {!! Form::text('name',null, ['class' => 'form-control', 'placeholder' => '']) !!}
                                {!! $errors->first('name','<span class="help-block">:message</span>') !!}
                            </div>
                        </div>
                    </div>
                    <div class="box-footer">
                        {!! Form::submit('Simpan',['class' => 'btn btn-primary pull-right']) !!}
                    </div>
                    {!! Form::close() !!}
                </div>
            </div>
        </div>
    </section>
@endsection