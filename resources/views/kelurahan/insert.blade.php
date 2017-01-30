@extends('layouts/kelurahan')
@section('content')
    <section class="content">
        <div clas="row">
            <div class="col-md-6">
                <div class="box box-primary">
                    <div class="box-header">
                        <h3 class="box-title">Input Kelurahan</h3>
                    </div>
                    {!! Form::open(['url' => 'kelurahan/save', 'class' => 'form-horizontal']) !!}
                    <div class="box-body">
                        <div class="form-group {{$errors->has('name')?'has-error':''}}">
                            {!! Form::label('name','Nama Kelurahan :', ['class' => 'col-sm-4 control-label']) !!}
                            <div class="col-sm-8">
                            {!! Form::text('name',null, ['class' => 'form-control', 'placeholder' => '']) !!}
                            {!! $errors->first('name','<span class="help-block">:message</span>') !!}
                            </div>
                        </div>
                        <div class="form-group {{$errors->has('lurah')?'has-error':''}}">
                            {!! Form::label('lurah','Nama lurah :', ['class' => 'col-sm-4 control-label']) !!}
                            <div class="col-sm-8">
                                {!! Form::text('lurah',null, ['class' => 'form-control', 'placeholder' => '']) !!}
                                {!! $errors->first('lurah','<span class="help-block">:message</span>') !!}
                            </div>
                        </div>
                        <div class="form-group {{$errors->has('phone')?'has-error':''}}">
                            {!! Form::label('phone','Telephone :', ['class' => 'col-sm-4 control-label']) !!}
                            <div class="col-sm-8">
                                {!! Form::text('phone',null, ['class' => 'form-control', 'placeholder' => '']) !!}
                                {!! $errors->first('phone','<span class="help-block">:message</span>') !!}
                            </div>
                        </div>
                        <div class="form-group {{$errors->has('address')?'has-error':''}}">
                            {!! Form::label('address','Alamat :',['class' => 'col-sm-4 control-label']) !!}
                            <div class="col-sm-8">
                            {!! Form::textarea('address',null, ['class' => 'form-control', 'placeholder' => '', 'rows' => '3']) !!}
                            {!! $errors->first('address','<span class="help-block">:message</span>') !!}
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