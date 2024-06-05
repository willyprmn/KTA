@extends('layouts.base')

@section('container')
<div class="col-md-12 col-lg-8">
      <div class="tabs">
            <ul class="nav nav-tabs tabs-primary">
                  <li class="active">
                        <a href="#akun" data-toggle="tab">Akun</a>
                  </li>
                  <li>
                        <a href="#personal" data-toggle="tab">Data diri</a>
                  </li>
            </ul>
            <form action="{{ url('/profil') }}" method="post"> 
            @csrf
            <div class="tab-content">
                  @if(session()->has('success'))
                  <div class="alert alert-success">
                        <button type="button" class="close" data-dismiss="alert" aria-hidden="true">×</button>
                        <strong>Berhasil - </strong> {{ session('success') }}
                  </div>
                  @endif
                  <div id="akun" class="tab-pane active">
                        <h4 class="mb-md">Informasi Akun</h4>
                        <fieldset>
                              <div class="form-group mb-lg @error('name') has-error @enderror">
                                    <label class="col-md-3 control-label" for="name">Nama</label>
                                    <div class="col-md-8">
                                          <input name="name" id="name" type="text" class="form-control" value="{{ old('name', $profil->name) }}" autofocus /> 
                                          @error('name') 
                                          <label id="name-error" class="error" for="name">{{ $message }}</label> 
                                          @enderror
                                    </div>
                              </div>
                              <div class="form-group mb-lg @error('email') has-error @enderror">
                                    <label class="col-md-3 control-label" for="email">E-mail</label>
                                    <div class="col-md-8">
                                          <input name="email" id="email" type="email" class="form-control" value="{{ old('email', $profil->email) }}" /> 
                                          @error('email') 
                                          <label id="email-error" class="error" for="email">{{ $message }}</label> 
                                          @enderror
                                    </div>
                              </div>
                              <div class="form-group mb-lg @error('username') has-error @enderror">
                                    <label class="col-md-3 control-label" for="username">Username</label>
                                    <div class="col-md-8">
                                          <input name="username" id="username" type="text" class="form-control" value="{{ old('username', $profil->username) }}" /> 
                                          @error('username') 
                                          <label id="username-error" class="error" for="username">{{ $message }}</label> 
                                          @enderror
                                    </div>
                              </div>
                              <div class="form-group mb-lg @error('password') has-error @enderror">
                                    <label class="col-md-3 control-label" for="password">password</label>
                                    <div class="col-md-8">
                                          <input name="password" id="password" type="password" class="form-control"/> 
                                          @error('password') 
                                          <label id="password-error" class="error" for="password">{{ $message }}</label> 
                                          @enderror
                                          <div class="checkbox-custom checkbox-default">
                                                <input type="checkbox" onclick="showPassword()"/>
                                                <label id="showCheck">Lihat Password</label>
                                          </div>
                                    </div>
                              </div>
                        </fieldset>
                  </div>
                  <div id="personal" class="tab-pane">
                        <!-- <form class="form-horizontal" method="get"> -->
                        <h4 class="mb-xlg">Data diri nasabah</h4>
                        <fieldset>
                              <div class="form-group mb-lg @error('ktp') has-error @enderror">
                                    <label class="col-md-3 control-label" for="ktp">KTP</label>
                                    <div class="col-md-8">
                                          <input name="ktp" id="ktp" type="text" class="form-control number" value="{{ old('ktp', $profil->ktp) }}" pattern="[0-9]{16}" maxlength="16">
                                          @error('ktp') 
                                          <label id="ktp-error" class="error" for="ktp">{{ $message }}</label> 
                                          @enderror
                                    </div>
                              </div>
                              <div class="form-group mb-lg @error('npwp') has-error @enderror">
                                    <label class="col-md-3 control-label" for="npwp">NPWP</label>
                                    <div class="col-md-8">
                                          <input name="npwp" id="npwp" type="text" class="form-control number" value="{{ old('npwp', $profil->npwp) }}" pattern="[0-9]{15}" maxlength="15">
                                          @error('npwp') 
                                          <label id="npwp-error" class="error" for="npwp">{{ $message }}</label> 
                                          @enderror
                                    </div>
                              </div>
                              <div class="form-group mb-lg @error('jenis_kelamin') has-error @enderror">
                                    <label class="col-md-3 control-label" for="jenis_kelamin">Jenis Kelamin</label>
                                    <div class="col-md-8">
                                          <select name="jenis_kelamin" id="jenis_kelamin" class="form-control">
                                                <option selected disabled></option>
                                                <option value="Laki-Laki" {{ old('jenis_kelamin') || $profil->jenis_kelamin == 'Laki-Laki' ? 'selected' : '' }}>Laki-Laki</option>
                                                <option value="Perempuan" {{ old('jenis_kelamin') || $profil->jenis_kelamin == 'Perempuan' ? 'selected' : '' }}>Perempuan</option>
                                          </select>
                                          @error('jenis_kelamin') 
                                          <label id="jenis_kelamin-error" class="error" for="jenis_kelamin">{{ $message }}</label> 
                                          @enderror
                                    </div>
                              </div>
                              <div class="form-group mb-lg @error('status') has-error @enderror">
                                    <label class="col-md-3 control-label" for="status">Status</label>
                                    <div class="col-md-8">
                                          <select name="status" id="status" class="form-control">
                                                <option selected disabled></option>
                                                <option value="Belum Menikah" {{ old('status') || $profil->status == 'Belum Menikah' ? 'selected' : '' }}>Belum Menikah</option>
                                                <option value="Menikah" {{ old('status') || $profil->status == 'Menikah' ? 'selected' : '' }}>Menikah</option>
                                                <option value="Cerai" {{ old('status') || $profil->status == 'Cerai' ? 'selected' : '' }}>Cerai</option>
                                          </select> @error('status') <label id="status-error" class="error" for="status">{{ $message }}</label> @enderror
                                    </div>
                              </div>
                              <div class="form-group mb-lg @error('alamat') has-error @enderror">
                                    <label class="col-md-3 control-label" for="alamat">Alamat Lengkap</label>
                                    <div class="col-md-8">
                                          <input name="alamat" id="alamat" type="text" class="form-control" value="{{ old('alamat', $profil->alamat) }}" /> @error('alamat') <label id="alamat-error" class="error" for="alamat">{{ $message }}</label> @enderror
                              
                                    </div>
                              </div>
                              <div class="form-group mb-lg @error('no_hp') has-error @enderror">
                                    <label class="col-md-3 control-label" for="no_hp">Nomor HP</label>
                                    <div class="col-md-8">
                                          <input name="no_hp" id="no_hp" type="text" class="form-control" value="{{ old('no_hp', $profil->no_hp) }}" maxlength="13"/> 
                                          @error('no_hp') 
                                          <label id="no_hp-error" class="error" for="no_hp">{{ $message }}</label> 
                                          @enderror
                                    </div>
                              </div>
                              <div class="form-group mb-lg @error('no_cc') has-error @enderror">
                                    <label class="col-md-3 control-label" for="no_cc">Nomor Kartu Kredit</label>
                                    <div class="col-md-8">
                                          <input name="no_cc" id="no_cc" type="text" class="form-control number" value="{{ old('no_cc', $profil->no_cc) }}" pattern="[0-9]{16}" maxlength="16"/> 
                                          @error('no_cc') 
                                          <label id="no_cc-error" class="error" for="no_cc">{{ $message }}</label> 
                                          @enderror
                                    </div>
                              </div>
                              <div class="form-group mb-lg @error('limit_cc') has-error @enderror">
                                    <label class="col-md-3 control-label" for="limit_cc">Limit Kartu Kredit</label>
                                    <div class="col-md-8">
                                          <input name="limit_cc" id="limit_cc" type="text" class="form-control" value="{{ old('limit_cc', number_format($profil->limit_cc, 0, '.', ',')) }}"/> @error('limit_cc') <label id="limit_cc-error" class="error" for="limit_cc">{{ $message }}</label> @enderror
                                    </div>
                              </div>
                        </fieldset>
                              <!-- <div class="panel-footer">
                                    <div class="row">
                                          <div class="col-md-9 col-md-offset-3">
                                                <button type="submit" class="btn btn-primary">Submit</button>
                                                <button type="reset" class="btn btn-default">Reset</button>
                                          </div>
                                    </div>
                              </div> -->
                        <!-- </form> -->
                  </div>
            </div>
            <div class="panel-footer">
                  <div class="row">
                        <div class="col-md-9 col-md-offset-3">
                              <button type="submit" class="btn btn-success">Ubah</button>
                        </div>
                  </div>
            </div>
            </form>
      </div>
</div>
<script>
      function showPassword() {
            var x = document.getElementById("password")
            if (x.type === "password") {
                  x.type = "text"
                  document.getElementById("showCheck").innerText = 'Tutup Password'
            } else {
                  x.type = "password"
                  document.getElementById("showCheck").innerText = 'Lihat Password'
            }
      }

      $('.number').keyup(function(e){
            if (/\D/g.test(this.value))
            {
                  this.value = this.value.replace(/\D/g, '')
            }
      })

	$('#limit_cc').on('keyup', function() {
		var val = $('#limit_cc').val()
		val = val.replace(/[^0-9\.]/g,'')

		if(val != "") {
			valArr = val.split('.');
			valArr[0] = (parseInt(valArr[0],10)).toLocaleString()
			val = valArr.join('.')
		}

		$('#limit_cc').val(val)
	})
</script>
@endsection