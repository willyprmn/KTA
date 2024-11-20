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
            'bank' => Bank::where('deleted_at', NULL)->orderBy('id', 'desc')->get(),
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
        $data = Bank::create([
            'nama' => $request->nama,
            'tenor_bank' => $request->tenor_bank
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
        $data = Bank::where([
            ['id', $id],
            ['deleted_at', NULL]
        ])->get();
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
        $bank = Bank::find($id);
        $bank->delete();

        return response()->json([
            'success' => true,
            'message' => 'Data Berhasil Dihapus!'
        ]);
    }
}
