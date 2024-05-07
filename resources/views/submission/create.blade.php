@extends('layouts.base')

@section('container')
<section role="main">
      <div class="row">
            <div class="col-lg-12">
                  <section class="panel">
                        <form class="form-horizontal form-bordered" method="post" action="{{ route('pengajuan.store') }}" enctype="multipart/form-data">
                              @csrf
                              <header class="panel-heading">
                                    <div class="panel-actions">
                                          <a href="#" class="panel-action panel-action-toggle" data-panel-toggle></a>
                                          <a href="#" class="panel-action panel-action-dismiss" data-panel-dismiss></a>
                                    </div>
                                    <h2 class="panel-title">Pengajuan Pinjaman</h2>
                              </header>
                              <div class="panel-body">
                                    <div class="form-group @error('jenis_pekerjaan') has-error @enderror">
                                          <label for="inputDefault" class="col-md-4 control-label">Pekerjaan Saat Ini</label>
                                          <div class="col-md-6">
                                                <select name="jenis_pekerjaan" id="jenis_pekerjaan" class="form-control">
                                                      <option selected disabled></option>
                                                      <option value="Driver Online" {{ old('jenis_pekerjaan') == 'Driver Online' ? 'selected' : '' }}>Driver Online</option>
                                                      <option value="Freelance" {{ old('jenis_pekerjaan') == 'Freelance' ? 'selected' : '' }}>Freelance</option>
                                                      <option value="Pegawai Negeri Sipil" {{ old('jenis_pekerjaan') == 'Pegawai Negeri Sipil' ? 'selected' : '' }}>Pegawai Negeri Sipil</option>
                                                      <option value="Pegawai BUMN" {{ old('jenis_pekerjaan') == 'Pegawai BUMN' ? 'selected' : '' }}>Pegawai BUMN</option>
                                                      <option value="Pegawai Swasta" {{ old('jenis_pekerjaan') == 'Pegawai Swasta' ? 'selected' : '' }}>Pegawai Swasta</option>
                                                      <option value="Profesional" {{ old('jenis_pekerjaan') == 'Profesional' ? 'selected' : '' }}>Profesional</option>
                                                      <option value="TNI/Polri" {{ old('jenis_pekerjaan') == 'TNI/Polri' ? 'selected' : '' }}>TNI/Polri</option>
                                                      <option value="Wiraswasta" {{ old('jenis_pekerjaan') == 'Wiraswasta' ? 'selected' : '' }}>Wiraswasta</option>
                                                </select>
                                                @error('jenis_pekerjaan')
								<label id="jenis_pekerjaan-error" class="error" for="jenis_pekerjaan">{{ $message }}</label>
								@enderror
                                          </div>
                                    </div>

                                    <div class="form-group @error('penghasilan') has-error @enderror">
                                          <label for="inputDefault" class="col-md-4 control-label">Penghasilan</label>
                                          <div class="col-md-6">
                                                <input type="text" name="penghasilan" id="penghasilan" class="form-control" value="{{ old('penghasilan') }}">
                                                @error('penghasilan')
                                                <label id="penghasilan-error" class="error" for="penghasilan">{{ $message }}</label>
                                                @enderror
                                          </div>
                                    </div>

                                    <div class="form-group @error('besar_pinjaman') has-error @enderror">
                                          <label for="inputDefault" class="col-md-4 control-label">Pengajuan Pinjaman</label>
                                          <div class="col-md-6">
                                                <select name="besar_pinjaman" id="besar_pinjaman" class="form-control">
                                                      <option selected disabled></option>
                                                      <option value="5000000" {{ old('besar_pinjaman') == '5000000' ? 'selected' : '' }}>Rp 5,000,000</option>
                                                      <option value="10000000" {{ old('besar_pinjaman') == '10000000' ? 'selected' : '' }}>Rp 10,000,000</option>
                                                      <option value="15000000" {{ old('besar_pinjaman') == '15000000' ? 'selected' : '' }}>Rp 15,000,000</option>
                                                      <option value="20000000" {{ old('besar_pinjaman') == '20000000' ? 'selected' : '' }}>Rp 20,000,000</option>
                                                      <option value="25000000" {{ old('besar_pinjaman') == '25000000' ? 'selected' : '' }}>Rp 25,000,000</option>
                                                      <option value="30000000" {{ old('besar_pinjaman') == '30000000' ? 'selected' : '' }}>Rp 30,000,000</option>
                                                      <option value="35000000" {{ old('besar_pinjaman') == '35000000' ? 'selected' : '' }}>Rp 35,000,000</option>
                                                      <option value="40000000" {{ old('besar_pinjaman') == '40000000' ? 'selected' : '' }}>Rp 40,000,000</option>
                                                      <option value="45000000" {{ old('besar_pinjaman') == '45000000' ? 'selected' : '' }}>Rp 45,000,000</option>
                                                      <option value="50000000" {{ old('besar_pinjaman') == '50000000' ? 'selected' : '' }}>Rp 50,000,000</option>
                                                      <option value="55000000" {{ old('besar_pinjaman') == '55000000' ? 'selected' : '' }}>Rp 55,000,000</option>
                                                      <option value="60000000" {{ old('besar_pinjaman') == '60000000' ? 'selected' : '' }}>Rp 60,000,000</option>
                                                      <option value="65000000" {{ old('besar_pinjaman') == '65000000' ? 'selected' : '' }}>Rp 65,000,000</option>
                                                      <option value="70000000" {{ old('besar_pinjaman') == '70000000' ? 'selected' : '' }}>Rp 70,000,000</option>
                                                      <option value="75000000" {{ old('besar_pinjaman') == '75000000' ? 'selected' : '' }}>Rp 75,000,000</option>
                                                      <option value="80000000" {{ old('besar_pinjaman') == '80000000' ? 'selected' : '' }}>Rp 80,000,000</option>
                                                      <option value="85000000" {{ old('besar_pinjaman') == '85000000' ? 'selected' : '' }}>Rp 85,000,000</option>
                                                      <option value="90000000" {{ old('besar_pinjaman') == '90000000' ? 'selected' : '' }}>Rp 90,000,000</option>
                                                      <option value="95000000" {{ old('besar_pinjaman') == '95000000' ? 'selected' : '' }}>Rp 95,000,000</option>
                                                      <option value="100000000" {{ old('besar_pinjaman') == '100000000' ? 'selected' : '' }}>Rp 100,000,000</option>
                                                      <option value="105000000" {{ old('besar_pinjaman') == '105000000' ? 'selected' : '' }}>Rp 105,000,000</option>
                                                      <option value="110000000" {{ old('besar_pinjaman') == '110000000' ? 'selected' : '' }}>Rp 110,000,000</option>
                                                      <option value="115000000" {{ old('besar_pinjaman') == '115000000' ? 'selected' : '' }}>Rp 115,000,000</option>
                                                      <option value="120000000" {{ old('besar_pinjaman') == '120000000' ? 'selected' : '' }}>Rp 120,000,000</option>
                                                      <option value="125000000" {{ old('besar_pinjaman') == '125000000' ? 'selected' : '' }}>Rp 125,000,000</option>
                                                      <option value="130000000" {{ old('besar_pinjaman') == '130000000' ? 'selected' : '' }}>Rp 130,000,000</option>
                                                      <option value="135000000" {{ old('besar_pinjaman') == '135000000' ? 'selected' : '' }}>Rp 135,000,000</option>
                                                      <option value="140000000" {{ old('besar_pinjaman') == '140000000' ? 'selected' : '' }}>Rp 140,000,000</option>
                                                      <option value="145000000" {{ old('besar_pinjaman') == '145000000' ? 'selected' : '' }}>Rp 145,000,000</option>
                                                      <option value="150000000" {{ old('besar_pinjaman') == '150000000' ? 'selected' : '' }}>Rp 150,000,000</option>
                                                </select>
                                                @error('besar_pinjaman')
                                                <label id="besar_pinjaman-error" class="error" for="besar_pinjaman">{{ $message }}</label>
                                                @enderror
                                          </div>
                                    </div>

                                    <div class="form-group @error('tenor') has-error @enderror">
                                          <label for="inputDefault" class="col-md-4 control-label">Tenor</label>
                                          <div class="col-md-6">
                                                <select name="tenor" id="tenor" class="form-control">
                                                      <option selected disabled></option>
                                                      <option value="12" {{ old('tenor') == '12' ? 'selected' : '' }}>12 Bulan</option>
                                                      <option value="24" {{ old('tenor') == '24' ? 'selected' : '' }}>24 Bulan</option>
                                                      <option value="36" {{ old('tenor') == '36' ? 'selected' : '' }}>36 Bulan</option>
                                                      <option value="48" {{ old('tenor') == '48' ? 'selected' : '' }}>48 Bulan</option>
                                                </select>
                                                @error('tenor')
                                                <label id="tenor-error" class="error" for="tenor">{{ $message }}</label>
                                                @enderror
                                          </div>
                                    </div>
                              </div>
                              <footer class="panel-footer">
					      <div class="row">
					            <div class="col-sm-9 col-sm-offset-3">
							      <button class="btn btn-success">Ajukan</button>
                                                <input type="reset"  class="btn btn-warning" value="Batal">
						      </div>
					      </div>
				      </footer>
                        </form>
                  </section>
            </div>
      </div>
</section>
<script>
      $('#penghasilan').on('keyup', function() {
		var val = $('#penghasilan').val()
		val = val.replace(/[^0-9\.]/g,'')

		if(val != "") {
			valArr = val.split('.');
			valArr[0] = (parseInt(valArr[0],10)).toLocaleString()
			val = valArr.join('.')
		}

		$('#penghasilan').val(val)
	})
</script>
@endsection