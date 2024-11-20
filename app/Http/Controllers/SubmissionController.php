<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Submission;
use App\Models\Criteria;

class SubmissionController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        return view('submission.index', [
            'title' => 'Pengajuan KTA',
            'pengajuan' => Submission::where('user_id', auth()->user()->id)->orderBy('id', 'desc')->get()
        ]);
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        return view('submission.create', [
            'title' => 'Buat Pengajuan KTA'
        ]);
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $validatedData = $request->validate([
            'jenis_pekerjaan' => ['required'],
            'penghasilan' => ['required'],
            'besar_pinjaman' => ['required'],
            'tenor' => ['required']
        ], [
            'jenis_pekerjaan.required' => 'Pekerjaan saat ini wajib di pilih',
            'penghasilan.required' => 'Penghasilan wajib di isi',
            'besar_pinjaman.required' => 'Pengajuan pinjaman wajib di pilih',
            'tenor.required' => 'Tenor wajib di pilih'
        ]);

        $penghasilan = str_replace(",", "", $validatedData['penghasilan']);
        $dataPengajuan = [
            'tanggal_pengajuan' => date('Y-m-d'),     
            'jenis_pekerjaan' => $validatedData['jenis_pekerjaan'],
            'penghasilan' => (float)$penghasilan,
            'besar_pinjaman' => (float)$validatedData['besar_pinjaman'],
            'tenor' => $validatedData['tenor'],
            'status' => 'Diproses Admin',
            'user_id' => auth()->user()->id
        ];
        // dd($dataPengajuan);
        Submission::create($dataPengajuan);

        return redirect('/pengajuan')->with('success', 'Pengajuan berhasil dan sedang diproses oleh Admin!');
    }

    /**
     * Display the specified resource.
     */
    public function show(string $id)
    {
        $pengajuan = Submission::where('id', $id)->first();
        $data = [
            'details' => Criteria::join('banks', 'criterias.bank_id', '=', 'banks.id')
            ->select('criterias.id', 'banks.id as bank_id','banks.nama', 'criterias.bunga')
            ->where('criterias.submission_id', $id)
            ->get()
        ];

        return response()->json([
            "status" => 200,
            "message" => "Successfull Request",
            "data" => $data,
            "pengajuan_id" => $pengajuan['id'],
            "pinjaman" => $pengajuan['besar_pinjaman'],
            "tenor" => $pengajuan['tenor']
        ]);
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(string $id)
    {
        return view('submission.edit', [
            'title' => 'Ubah Pengajuan KTA',
            'pengajuan' => Submission::where('id', $id)->get()
        ]);
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id)
    {
        $validatedData = $request->validate([
            'jenis_pekerjaan' => ['required'],
            'penghasilan' => ['required'],
            'besar_pinjaman' => ['required'],
            'tenor' => ['required']
        ], [
            'jenis_pekerjaan.required' => 'Pekerjaan saat ini wajib di pilih',
            'penghasilan.required' => 'Penghasilan wajib di isi',
            'besar_pinjaman.required' => 'Pengajuan pinjaman wajib di pilih',
            'tenor.required' => 'Tenor wajib di pilih'
        ]);

        $penghasilan = str_replace(",", "", $validatedData['penghasilan']);
        $dataPengajuan = [    
            'jenis_pekerjaan' => $validatedData['jenis_pekerjaan'],
            'penghasilan' => (float)$penghasilan,
            'besar_pinjaman' => (float)$validatedData['besar_pinjaman'],
            'tenor' => $validatedData['tenor']
        ];
        Submission::where('id', $id)->update($dataPengajuan);

        return redirect('/pengajuan')->with('success', 'Pengajuan diubah dan sedang diproses oleh Admin!');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        $validatedData['status'] = 'Dibatalkan Nasabah';
        $data = Submission::where('id', $id)->update($validatedData);
        return redirect()->route('pengajuan.index')->with('success', 'Pengajuan berhasil dibatalkan!');
    }
}
