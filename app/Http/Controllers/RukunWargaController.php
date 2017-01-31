<?php

namespace kelurahan\Http\Controllers;

use Illuminate\Database\QueryException;
use Illuminate\Http\Request;
use kelurahan\RukunWarga;
use Yajra\Datatables\Facades\Datatables;

class RukunWargaController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
//        $datas = RukunWarga::paginate(10);
//        return view('rukunwarga.index', compact('datas'));
        return view('rukunwarga.index');
    }

    public function indexdata(){
        return Datatables::of(RukunWarga::take(30000)->get())
            ->addColumn('action', function($data){
                return '<a href="/rukunwarga/edit/'.$data->id .'" class="btn btn-primary">
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
        //
        return view('rukunwarga.create');
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

            $data = new RukunWarga();
            $data['name'] = $request->get('name');
            $data->save();
            \Session::flash('flash_message','Data Created');
        }catch (QueryException $e){
            if($e->getCode() == 23000){
                \Session::flash('flash_message','Data not saved, duplicate entry');
            }
        }
        return redirect('/rukunwarga');
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
        //

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
        //
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
