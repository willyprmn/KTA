<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Submission;
use App\Models\Bank;
use App\Models\Criteria;
use App\Models\Customer;
use PDF;

class CriteriaController extends Controller
{
    public function index()
    {
        return view('criteria.index', [
            'title' => 'Pengajuan Verifikasi',
            'pengajuan' => Submission::orderBy('id', 'desc')->get()
        ]);
    }

    public function proses($id)
    {
        $nasabah = Submission::where('id', $id)->first();
        $tenor = $nasabah['tenor'];

        return view('criteria.create',[
            'title' => 'Pengajuan Kriteria',
            'pengajuan' => Submission::where('id', $id)->get(),
            'bank' => $bank = Bank::where('tenor_bank', '>=', $tenor)->orderBy('id', 'desc')->get()
        ]);
    }

    public function terima(Request $request)
    {
        $ulang = count($request->detail);
        for($i = 1; $i<=$ulang; $i++){
            $bunga = $request->detail['bunga_' . $i];
            $bank = $request->code['bank_' . $i];
            $dataKriteria = [
                'bunga' => (float)$bunga,     
                'persetujuan' => 0,
                'submission_id' => $request->pengajuan_id,
                'bank_id' => $bank
            ];
            Criteria::create($dataKriteria);
        }

        $user = $request->pengajuan_id;
        $dataPengajuan['status'] = 'Disetujui Admin';
        Submission::where('id', $user)->update($dataPengajuan);

        return redirect('/kriteria')->with('success', 'Data pengajuan diterima dan kriteria bank sudah dibuat!');
    }

    public function tolak(Request $request)
    {
        $data['status'] = 'Ditolak Admin';
        Submission::where('id', $request->pengajuan_tolak)->update($data);
        return redirect('/kriteria')->with('success', 'Data pengajuan ditolak!');
    }

    public function pilih(Request $request)
    {
        $dataPengajuan['status'] = 'Disetujui Nasabah';
        Submission::where('id', $request->pengajuan)->update($dataPengajuan);

        $dataKriteria['persetujuan'] = 1;
        Criteria::where('id', $request->id)->update($dataKriteria);
        
        return response()->json([
            'success' => true,
            'message' => 'Kriteria pengajuan telah dipilih!'
        ]);
    }

    public function generatePdf($id)
    {
        $pengajuan = Submission::where([
            ['id', $id]
        ])->first();
        $kriteria = Criteria::join('banks', 'criterias.bank_id', 'banks.id')
        ->select('criterias.*', 'banks.nama as bank')
        ->where([
            ['submission_id', $id],
            ['persetujuan', 1]
        ])->first();
        $nasabah = Customer::join('list_banks', 'customers.rekening', 'list_banks.code')
            ->select('customers.*', 'list_banks.name as bank')
            ->where([['user_id', $pengajuan->user_id]
        ])->first();

        $getBunga = ((float)$pengajuan->besar_pinjaman * (float)$kriteria->bunga / 100) / $pengajuan->tenor;
        $angsuran = (float)$pengajuan->besar_pinjaman / $pengajuan->tenor +$getBunga;

        $namaKTA = $pengajuan->nasabah->name;
        
        $data = [
            'title' => 'Data Nasabah KTA',
            'nasabah' => $nasabah,
            'kriteria' => $kriteria,
            'pengajuan' => $pengajuan,
            'angsuran' => $angsuran
        ];

        // Load a view and pass the data
        $pdf = PDF::loadView('criteria.pdf', $data)->setPaper('a4', 'landscape');;

        // Return the PDF as a download
        
        return $pdf->stream($namaKTA . '_KTA.pdf');
    }
}
