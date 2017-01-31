<?php

namespace kelurahan\Http\Controllers;

use Illuminate\Contracts\Session\Session;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Input;
use kelurahan\Kelurahan;
use Yajra\Datatables\Facades\Datatables;

class KelurahanController extends Controller
{
    //
    public function index(){
        return view("kelurahan.index");
    }

    public function insert(){
        return view("kelurahan.insert");
    }

    public function save(){
        $data = new Kelurahan();
        $data['name'] = Input::get('name');
        $data['address'] = Input::get('address');
        $data['lurah'] = Input::get('lurah');
        $data['phone'] = Input::get('phone');
        $data->save();
        \Session::flash('flash_message','Data Created');
        return redirect('/kelurahan/view');
    }

    public function view(){
        return view('kelurahan.view');
    }

    public function getKelurahan(Request $request){
        return Datatables::of(Kelurahan::take(30000)->get())
            ->addColumn('action', function($data){
                return '<a href="/kelurahan/edit/'.$data->id .'" class="btn btn-primary">
                <i class="glyphicon glyphicon-edit"> Edit</a>';
            })
            ->make(true);
    }

    public function edit($id){
        $data = Kelurahan::find($id);
        return view('kelurahan.edit',compact('data'));
    }

    public function update($id){
        $data = Kelurahan::find($id);
        $data['name'] = Input::get('name');
        $data['address'] = Input::get('address');
        $data['lurah'] = Input::get('lurah');
        $data['phone'] = Input::get('phone');
        $data->save();

        \Session::flash('flash_message','Data Update Succesfull');
        $urlx = 'kelurahan/view';
        return redirect($urlx);
    }
}
