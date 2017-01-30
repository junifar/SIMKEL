@extends('layouts/kelurahan')
@section('content')
    <section class="content">
        <div clas="row">
            <div class="col-md-12">
                <div class="box">
                    <div class="box-header">
                        <h3 class="box-title">List Kelurahan</h3>

                        <div class="box-tools">
                            <div class="input-group input-group-sm" style="width: 300px;">
                                <input type="text" name="table_search" class="form-control pull-right" placeholder="Search">

                                <div class="input-group-btn">
                                    <button type="submit" class="btn btn-default"><i class="fa fa-search"></i></button>
                                </div>
                                <a href="/kelurahan/add" class="btn btn-primary pull-right">Add New</a>
                            </div>
                        </div>
                    </div>
                    <div class="box-body table-responsive no-padding">
                        <table id="dataview" class="table table-bordered table-hover table-striped">
                            <thead>
                            <tr>
                                <th>Kelurahan</th>
                                <th>Lurah</th>
                                <th>Telephone</th>
                                <th>Alamatphp</th>
                                <th>Action</th>
                            </tr>
                            </thead>
                            <tbody>
                            @foreach($datas as $data)
                                <tr>
                                    <td> {{ $data->name }} </td>
                                    <td> {{ $data->lurah }} </td>
                                    <td> {{ $data->phone }} </td>
                                    <td> {{ $data->address }} </td>
                                    <td> <a href="{{url('kelurahan/edit',$data->id)}}">Detail</a></td>
                                </tr>
                            @endforeach
                            </tbody>
                        </table>
                        {{ $datas->links() }}
                    </div>
                </div>

            </div>
        </div>
    </section>
@endsection