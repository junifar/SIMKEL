<?php

namespace kelurahan\Http\Controllers;

use Illuminate\Database\QueryException;
use Illuminate\Http\Request;
use kelurahan\RukunTetangga;
use Yajra\Datatables\Facades\Datatables;

class RukunTetanggaController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        return view('rukuntetangga.index');
    }

    public function indexdata(){
        return Datatables::of(RukunTetangga::take(30000)->get())
            ->addColumn('action', function($data){
                return '<a href="/rukuntetangga/edit/'.$data->id .'" class="btn btn-primary">
                <i class="glyphicon glyphicon-edit"> Edit</a>';
            })
            ->make(true);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('rukuntetangga.create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        try{
            $data = new RukunTetangga();
            $data['name'] = $request->get('name');
            $data->save();
            \Session::flash('flash_message','Data Created');
        }catch (QueryException $e){
            if($e->getCode() == 23000){
                \Session::flash('flash_message','Data not saved, duplicate entry');
            }
        }
        return redirect('/rukuntetangga');
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $data = RukunTetangga::find($id);
        return view('rukuntetangga.edit',compact('data'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        try{
            $data = RukunTetangga::find($id);
            $data['name'] = $request->get('name');
            $data->save();

            \Session::flash('flash_message','Data Update Succesfull');

        }catch (QueryException $e){
            if($e->getCode() == 23000){
                \Session::flash('flash_message','Data not saved, duplicate entry');
            }
        }
        $urlx = 'rukuntetangga';
        return redirect($urlx);
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        //
    }
}
