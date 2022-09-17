<?php

namespace App\Http\Controllers\api;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Customer;
use Carbon\Carbon;

use Auth;
use DataTables;
use URL;
use Helper;

class CustomerController extends Controller
{
    public function index(Request $request) {
        $customer = Customer::all();

       return $customer;
    }

    public function store(Request $request) {
        $rules = [
            'nama' => 'required',
            'tgl_lahir' => 'required',
            'alamat' => 'required',
            'keterangan' => 'required'
        ];

        $messages = [
            '*.required' => 'Field tidak boleh kosong !',
            '*.min' => 'Nama tidak boleh kurang dari 2 karakter !',
            '*.mimes' => 'File harus berbentuk PDF !'
        ];

        $this->validate($request, $rules, $messages);
        // dd($request->all());

        $post = Customer::create([
            'nama' => $request->nama,
            'tgl_lahir' => $request->tgl_lahir,
            'alamat' => $request->alamat,
            'keterangan' => $request->keterangan,
        ]);

        try{
            $result;
            }catch(exception $e){
            return response()->json([
            'status' => false,
            'message' => $e->getMessage(),
            'data' => $post
            ]);
            }
            return response()->json([
            'status' => true,
            'message' => 'berhasil',
            'data' => $post
            ]);
    }
}
