<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Carbon\Carbon;
use App\Models\Customer;

use DB;
use DataTables;
use URL;

class CustomerController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index(Request $request)
    {
        $customer = Customer::all();
        
        if (request()->ajax()) {
            $data = Customer::get();

            return Datatables::of($data)
                ->addIndexColumn()
                ->addColumn('jlh_karakter', function($row){
                    return strlen($row->nama);
                })
                ->addColumn('usia', function($row){
                    $tgl_lahir = $row->tgl_lahir;
                    $umur = Carbon::parse($tgl_lahir)->age;

                    return $umur;
                })
                ->editColumn('tgl_lahir', function ($row) {
                    return Carbon::parse($row->tgl_lahir)->translatedFormat('d M Y');
                })
                ->removeColumn('id')
                ->removeColumn('uuid')
                ->rawColumns(['usia', 'jlh_karakter'])
                ->make(true);
        }

        return view('customer.index');
    }

    public function prima(){
        for($i=1;$i<=99;$i++){
            $a    =0;
            for($j=1;$j<=$i;$j++){
                if($i % $j == 0){
                    $a++;
                }
            }
            if($a == 2){
             echo $i.' ';
            }
        }
        echo $i;
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        //
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
