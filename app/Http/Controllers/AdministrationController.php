<?php

namespace kelurahan\Http\Controllers;

use Illuminate\Http\Request;
use kelurahan\Kelurahan;
use kelurahan\RukunWarga;
use Yajra\Datatables\Facades\Datatables;

class AdministrationController extends Controller
{
    public function kelurahan(){
        return view('administration.kelurahan');
    }

    public function kelurahandata(){
        return Datatables::of(Kelurahan::take(10000)->get())
            ->addColumn('action', function($data){
                return '<a href="/administration/kelurahan/view/'.$data->id .'" class="btn btn-primary">
                <i class="glyphicon glyphicon-list-alt"> View</a>';
            })
            ->make(true);
    }

    public function rukunwargadata($id){
        return Datatables::of(Kelurahan::take(10000)->get())
            ->addColumn('action', function($data){
                return '<a href="/administration/kelurahan/view/'.$data->id .'" class="btn btn-primary">
                <i class="glyphicon glyphicon-list-alt"> View</a>';
            })
            ->make(true);
    }

    public function kelurahanview($id){
        $data = Kelurahan::find($id);
        return view('administration.viewkelurahan', compact('data'));
    }
}
