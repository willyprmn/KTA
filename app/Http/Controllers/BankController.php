<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Bank;
use App\Models\ListBank;

class BankController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        return view('master.bank', [
            'title' => 'Master Data | Bank',
            'bank' => Bank::orderBy('id', 'desc')->get(),
            'list' => ListBank::all()
        ]);
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $validatedData = $request->validate([
            'nama' => ['required', 'unique:banks', 'max:255'],
            'tenor_bank' => ['required']
        ], [
            'nama.required' => 'Nama Bank wajib di isi',
            'nama.unique' => 'Nama Bank sudah ada',
            'nama.max' => 'Nama Bank terlalu panjang',
            'tenor_bank.required' => 'Tenor Bank wajib di pilih'
        ]);

        $data = Bank::create([
            'nama' => $validatedData['nama'],
            'tenor_bank' => $validatedData['tenor_bank']
        ]);

        return response()->json([
            'success' => true,
            'message' => 'Data Berhasil Disimpan!',
            'data'    => $data
        ]);
    }

    /**
     * Display the specified resource.
     */
    public function show(string $id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(string $id)
    {
        $data = Bank::where('id', $id)->get();
        return response()->json([
            'success' => true,
            'message' => 'Detail Data',
            'data'    => $data 
        ]);
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id)
    {
        $validatedData['nama'] = $request->nama;
        $validatedData['tenor_bank'] = $request->tenor_bank;
        $data = Bank::where('id', $id)->update($validatedData);

        return response()->json([
            'success' => true,
            'message' => 'Data Berhasil Diedit!',
            'data'    => $data 
        ]);
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        $validatedData['n_status'] = 0;
        $data = JenisArtikel::where('id_jenis_artikel', $id)->update($validatedData);

        return response()->json([
            'success' => true,
            'message' => 'Data Berhasil Dihapus!',
            'data'    => $data 
        ]);
    }
}
