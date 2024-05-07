@extends('layouts.base')

@section('container')
<section class="panel">
      <header class="panel-heading">
            <div class="panel-actions">
                  <a href="#" class="panel-action panel-action-toggle" data-panel-toggle></a>
                  <a href="#" class="panel-action panel-action-dismiss" data-panel-dismiss></a>
            </div>
            <h2 class="panel-title">List Pengajuan</h2>
      </header>
      <div class="panel-body">
            <div class="row">
                  <div class="col-sm-6">
                        <div class="mb-md">
                              <a class="btn btn btn-primary" href="{{ route('pengajuan.create') }}">Buat Data Pengajuan <i class="fa fa-plus"></i></a>
                        </div>
                  </div>
            </div>
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
                              <th>Tanggal Pengajuan</th>
                              <th>Pinjaman</th>
                              <th>Tenor</th>
                              <th>Status</th>
                              <th>Aksi</th>
                        </tr>
                  </thead>
                  <tbody>
                        @foreach ($pengajuan as $p)
                        <tr>
                              <td>{{ $loop->iteration }}</td>
                              <td>{{ \Carbon\Carbon::parse($p->tanggal_pengajuan)->format('d M Y')}}</td>
                              <td>Rp {{ number_format($p->besar_pinjaman, 0) }}</td>
                              <td>{{ $p->tenor }} Bulan</td>
                              <td>{{ $p->status }}</td>
                              <td>
                                    @if($p->status == 'Diproses Admin')
                                    <a href="{{ route('pengajuan.edit', $p->id) }}" data-toggle="tooltip" data-placement="top" data-original-title="Edit" style="text-decoration: none;">
                                          <i class="fa fa-pencil"></i>
                                    </a>
                                    @elseif($p->status == 'Disetujui Admin')
                                    <a href="#modalForm" class="modal-with-form" onclick="showBank('{{ $p->id }}')" data-toggle="tooltip" data-placement="top" data-original-title="Lihat Bank" style="text-decoration: none;">
                                          <i class="fa fa-eye"></i>
                                    </a>
                                    <a class="mb-xs mt-xs mr-xs modal-basic" href="#deletePengajuan" data-toggle="tooltip" data-placement="top" title="" data-original-title="Batalkan" style="text-decoration: none; color: red;"><i class="fa fa-ban"></i></a>
                                    <div id="deletePengajuan" class="modal-block mfp-hide">
                                          <section class="panel">
                                                <div class="panel-body">
                                                      <div class="modal-wrapper">
                                                            <div class="modal-text text-center">
                                                                  <p>Apakah anda yakin akan membatalkan pengajuan?</p>
                                                                  <form action="{{ route('pengajuan.destroy', $p->id) }}" method="POST">
                                                                        @method('delete')
                                                                        @csrf
                                                                        <button type="submit" class="btn btn-danger">Batalkan</button>
                                                                        <button class="btn btn-warning modal-dismiss">Tutup</button> 
                                                                  </form>
                                                            </div>
                                                      </div>
                                                </div>
                                          </section>
                                    </div>
                                    @elseif($p->status == 'Dibatalkan Nasabah')
                                    <a href="#" data-toggle="tooltip" data-placement="top" title="" data-original-title="Dibatalkan" style="text-decoration: none; color: red;">
                                          <i class="fa fa-ban" aria-hidden="true"></i>
                                    </a>
                                    @elseif($p->status == 'Ditolak Admin')
                                    <a href="#" data-toggle="tooltip" data-placement="top" title="" data-original-title="Ditolak" style="text-decoration: none; color: red;">
                                          <i class="fa fa-close" aria-hidden="true"></i>
                                    </a>
                                    @else
                                    <a href="#" data-toggle="tooltip" data-placement="top" title="" data-original-title="Selesai" style="text-decoration: none; color: green;">
                                          <i class="fa fa-check" aria-hidden="true"></i>
                                    </a>
                                    @endif
                              </td>
                        </tr>
                        @endforeach
                  </tbody>
            </table>
      </div>

      <div class="panel-body">
            <div id="modalForm" class="modal-block modal-block-primary mfp-hide">
                  <section class="panel">
                        <header class="panel-heading">
                              <h2 class="panel-title">Daftar Bank Sesuai Kriteria Pengajuan Anda</h2>
                        </header>
                        <div class="panel-body">
                              <table class="table table-bordered table-striped mb-none">
                                    <thead>
                                          <tr>
                                                <th>#</th>
                                                <th>Bank</th>
                                                <th>Bunga</th>
                                                <th>Angsuran</th>
                                                <th>Pilih Kriteria</th>
                                          </tr>
                                    </thead>
                                    <tbody  id="kriteriaPengajuan"></tbody>
                              </table>
                        </div>
                        <footer class="panel-footer">
                              <div class="row">
                                    <div class="col-md-12 text-right">
                                          <button class="btn btn-warning modal-dismiss">Tutup</button>
                                    </div>
                              </div>
                        </footer>
                  </section>
            </div>
      </div>
</section>
<script>
      function showBank(e){
            $('#pilih-kriteria').prop('disabled', true)
            const link = window.location.href
            $("#kriteriaPengajuan").html("")

            $.ajax({
                  url: link + '/' + e,
                  type: "GET",
                  dataType: "JSON",
                  success: function(response){
                        console.log(response)
                        var detail = response.data.details.length
                        var getData = response.data.details
                        var tenor = parseFloat(response.tenor)
                        var pinjaman = parseFloat(response.pinjaman)
                        var pengajuanId = response.pengajuan_id

                        var html = ''
                        var j = 1
                        for(i = 0; i < detail; i++){
                              var bunga = parseFloat(getData[i].bunga)
                              var getBunga = (pinjaman * bunga / 100) / tenor
                              var angsuran = pinjaman /tenor + getBunga
                              var result = `Rp ${angsuran.toFixed(2).replace(/\d(?=(\d{3})+\.)/g, '$&,')}`

                              html += '<tr>'
                              html += '<td>'+j+'</td>'
                              html += '<td>'+getData[i].nama+'</td>'
                              html += '<td>'+getData[i].bunga+' %</td>'
                              html += '<td>'+result+' / Bulan</td>'
                              html += '<td>'
                              +'<input class="btn btn-success" type="button" onclick="pilih('+getData[i].id+')" id="pilih_'+getData[i].j+'" name="pilih_'+getData[i]+'" value="Pilih">'
                              +'<input type="hidden" id="pengajuan_id" value="'+pengajuanId+'">'
                              +'</td>'
                              html += '</tr>'
                              j++
                        }
                        $('#kriteriaPengajuan').append(html)
                  },
                  error: function () {
                        alert("Gagal Menarik Data")
                  }
            })
      }

      function pilih(e){
            let token   = $("meta[name='csrf-token']").attr("content")
            var idKriteria = e
            var idPengajuan = $('#pengajuan_id').val()

            $.ajax({
                  url: '/pilih',
                  type: 'POST',
                  cache: false,
                  data: {
                        "_token": token,
                        "id": idKriteria,
                        "pengajuan": idPengajuan
                  },
                  success:function(response){
                        location.reload()
                  },
                  error:function(error){
                        alert("Error")
                  }
            })
      }
</script>
@endsection