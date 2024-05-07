@extends('layouts.base')

@section('container')
<section role="main">
      <div class="row">
            <div class="col-lg-12">
                  <section class="panel">
                        <form class="form-horizontal form-bordered" method="post" action="{{ url('/terima') }}" enctype="multipart/form-data">
                              @csrf
                              <header class="panel-heading">
                                    <div class="panel-actions">
                                          <a href="#" class="panel-action panel-action-toggle" data-panel-toggle></a>
                                          <a href="#" class="panel-action panel-action-dismiss" data-panel-dismiss></a>
                                    </div>
                                    <h2 class="panel-title">Data Pengajuan a/n {{ $pengajuan[0]->nasabah->name }}</h2>
                                    <input type="hidden" name="pengajuan_id" id="pengajuan_id" value="{{ $pengajuan[0]->id }}">
                              </header>
                              <div class="panel-body">
                                    <div class="form-group">
                                          <label for="inputDefault" class="col-md-4 control-label">Tanggal Pengajuan</label>
                                          <div class="col-md-6">
                                                <input type="text" class="form-control" value="{{ \Carbon\Carbon::parse($pengajuan[0]->tanggal_pengajuan)->format('d M Y') }}" readonly>
                                          </div>
                                    </div>
                                    <div class="form-group">
                                          <label for="inputDefault" class="col-md-4 control-label">Pekerjaan Saat Ini</label>
                                          <div class="col-md-6">
                                                <input type="text" class="form-control" value="{{ $pengajuan[0]->jenis_pekerjaan }}" readonly>
                                          </div>
                                    </div>
                                    <div class="form-group">
                                          <label for="inputDefault" class="col-md-4 control-label">Penghasilan</label>
                                          <div class="col-md-6">
                                                <input type="text" class="form-control" value="{{ number_format($pengajuan[0]->penghasilan, 0, '.', ',') }}" readonly>
                                          </div>
                                    </div>
                                    <div class="form-group">
                                          <p>*Pinjaman yang diajukan sebesar Rp. {{ number_format($pengajuan[0]->besar_pinjaman, 0, '.', ',') }} dengan tenor yang diambil selama {{ $pengajuan[0]->tenor }} Bulan</p>
                                    </div>
                                    <br>
                                    <table class="table table-bordered table-striped mb-none" id="datatable-default">
                                          <thead>
                                                <tr>
                                                      <th>#</th>
                                                      <th>Bank Yang Tersedia</th>
                                                      <th>Input Bunga %</th>
                                                </tr>
                                          </thead>
                                          <tbody>
                                                @foreach ($bank as $b)
                                                <tr>
                                                      <td>{{ $loop->iteration }}</td>
                                                      <td>{{ $b->nama }}</td>
                                                      <td>
                                                            <input type="text" name="detail[bunga_{{ $loop->iteration }}]" id="bunga_{{$loop->iteration}}" onkeyup="bunga('{{$loop->iteration}}')" class="form-control bunga" required>
                                                            <input type="hidden" name="code[bank_{{ $loop->iteration }}]" id="bank_id" value="{{ $b->id }}">
                                                      </td>
                                                </tr>
                                                @endforeach
                                          </tbody>
                                    </table>
                              </div>
                              <footer class="panel-footer">
					      <div class="row">
					            <div class="col-sm-9 col-sm-offset-3">
							      <button class="btn btn-success">Terima</button>
                                                <!-- <input type="reset"  class="btn btn-danger" value="Tolak"> -->
                                                <a class="btn btn-danger modal-basic" href="#tolakPengajuan">Tolak</a>
						      </div>
					      </div>
				      </footer>
                        </form>
                        <!-- Modal Delete -->
                        <div id="tolakPengajuan" class="modal-block mfp-hide">
                              <section class="panel">
                                    <div class="panel-body">
                                          <div class="modal-wrapper">
                                                <div class="modal-text text-center">
                                                      <p>Apakah anda yakin akan menolak pengajuan nasabah?</p>
                                                      <form action="{{ url('/tolak/') }}" method="post">
                                                            @csrf
                                                            <input type="hidden" name="pengajuan_tolak" id="pengajuan_tolak" value="{{ $pengajuan[0]->id }}">
                                                            <button type="submit" class="btn btn-danger">Tolak</button>
                                                            <button class="btn btn-warning modal-dismiss">Batal</button> 
                                                      </form>
                                                </div>
                                          </div>
                                    </div>
                              </section>
                        </div>
                  </section>
            </div>
      </div>
</section>
<script>
      function bunga(e){
            var val = $('#bunga_'+e).val()
		val = val.replace(/[^0-9\.]/g,'')

		if(val != "") {
			valArr = val.split('.');
			valArr[0] = (parseInt(valArr[0],10)).toLocaleString()
			val = valArr.join('.')
		}

		$('#bunga_'+e).val(val)
      }
</script>
@endsection