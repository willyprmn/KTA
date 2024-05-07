@extends('layouts.base')

@section('container')
<section class="panel">
      <header class="panel-heading">
            <div class="panel-actions">
                  <a href="#" class="panel-action panel-action-toggle" data-panel-toggle></a>
                  <a href="#" class="panel-action panel-action-dismiss" data-panel-dismiss></a>
            </div>
            <h2 class="panel-title">List Pengajuan Yang Perlu Diverifikasi</h2>
      </header>
      <div class="panel-body">
            @if(session()->has('success'))
		<div class="alert alert-success">
			<button type="button" class="close" data-dismiss="alert" aria-hidden="true">×</button>
			<strong>Berhasil - </strong> {{ session('success') }}
		</div>
		@endif
            <table class="table table-bordered table-striped mb-none" id="datatable-default">
                  <thead>
                        <tr>
                              <th>#</th>
                              <th>Nasabah</th>
                              <th>Tanggal Pengajuan</th>
                              <th>Pinjaman</th>
                              <th>Tenor</th>
                              <th>Aksi</th>
                        </tr>
                  </thead>
                  <tbody>
                        @foreach ($pengajuan as $p)
                        <tr>
                              <td>{{ $loop->iteration }}</td>
                              <td>{{ $p->nasabah->name }}</td>
                              <td>{{ \Carbon\Carbon::parse($p->tanggal_pengajuan)->format('d M Y')}}</td>
                              <td>Rp {{ number_format($p->besar_pinjaman, 0) }}</td>
                              <td>{{ $p->tenor }} Bulan</td>
                              <td>
                                    @if($p->status == 'Diproses Admin')
                                    <a href="{{ url('/proses/' . $p->id) }}" data-toggle="tooltip" data-placement="top" data-original-title="Proses" style="text-decoration: none;">
                                          <i class="fa fa-external-link"></i>
                                    </a>
                                    @elseif($p->status == 'Disetujui Admin')
                                    <a href="#" data-toggle="tooltip" data-placement="top" title="" data-original-title="Disetujui" style="text-decoration: none; color: green;">
                                          <i class="fa fa-check" aria-hidden="true"></i>
                                    </a>
                                    @elseif($p->status == 'Dibatalkan Nasabah')
                                    <a href="#" data-toggle="tooltip" data-placement="top" title="" data-original-title="Dibatalkan Nasabah" style="text-decoration: none; color: red;">
                                          <i class="fa fa-ban" aria-hidden="true"></i>
                                    </a>
                                    @elseif($p->status == 'Disetujui Nasabah')
                                    <a href="{{ url('/cetak/' . $p->id) }}" data-toggle="tooltip" data-placement="top" title="" data-original-title="Cetak Data" style="text-decoration: none; color: black;">
                                          <i class="fa fa-file-pdf-o" aria-hidden="true"></i>
                                    </a>
                                    @else
                                    <a href="#" data-toggle="tooltip" data-placement="top" title="" data-original-title="Ditolak" style="text-decoration: none; color: red;">
                                          <i class="fa fa-close" aria-hidden="true"></i>
                                    </a>
                                    @endif
                              </td>
                        </tr>
                        @endforeach
                  </tbody>
            </table>
      </div>
</section>
@endsection