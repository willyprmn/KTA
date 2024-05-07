@extends('auth.base')

@section('container')
<section class="body-sign">
      <div class="center-sign">
            <a href="/" class="logo pull-left">
                  <img src="{{ asset('porto-admin') }}/assets/images/logo.png" height="54" alt="Porto Admin" />
            </a>
            <div class="panel panel-sign">
                  <div class="panel-title-sign mt-xl text-right">
                        <h2 class="title text-uppercase text-weight-bold m-none">
                              <i class="fa fa-user mr-xs"></i> Sign Up
                        </h2>
                  </div>
                  <div class="panel-body">
                        <form action="{{ url('/profil') }}" method="post"> 
                              @csrf 
                              <div class="form-group mb-lg @error('name') has-error @enderror">
                                    <label>Nama</label>
                                    <input name="name" id="name" type="text" class="form-control" value="{{ old('name') }}" autofocus /> @error('name') <label id="name-error" class="error" for="name">{{ $message }}</label> @enderror
                              </div>
                              <div class="form-group mb-lg @error('email') has-error @enderror">
                                    <label>E-mail</label>
                                    <input name="email" id="email" type="email" class="form-control" value="{{ old('email') }}" /> @error('email') <label id="email-error" class="error" for="email">{{ $message }}</label> @enderror
                              </div>
                              <div class="form-group mb-lg @error('username') has-error @enderror">
                                    <label>Username</label>
                                    <input name="username" id="username" type="text" class="form-control" value="{{ old('username') }}" /> @error('username') <label id="username-error" class="error" for="username">{{ $message }}</label> @enderror
                              </div>
                              <div class="form-group mb-none">
                                    <div class="row">
                                          <div class="col-sm-6 mb-lg  @error('password') has-error @enderror">
                                                <label>Password</label>
                                                <input name="password" id="password" type="password" class="form-control" /> @error('password') <label id="password-error" class="error" for="password">{{ $message }}</label> @enderror
                                          </div>
                                          <div class="col-sm-6 mb-lg">
                                                <label>Konfirmasi Password</label>
                                                <input name="password_confirm" id="password_confirm" type="password" class="form-control" />
                                          </div>
                                    </div>
                              </div>
                              <div class="form-group mb-lg @error('ktp') has-error @enderror">
                                    <label>Nomor KTP</label>
                                    <input name="ktp" id="ktp" type="number" class="form-control" value="{{ old('ktp') }}" /> @error('ktp') <label id="ktp-error" class="error" for="ktp">{{ $message }}</label> @enderror
                              </div>
                              <div class="form-group mb-lg @error('npwp') has-error @enderror">
                                    <label>NPWP</label>
                                    <input name="npwp" id="npwp" type="number" class="form-control" value="{{ old('npwp') }}" /> @error('npwp') <label id="npwp-error" class="error" for="npwp">{{ $message }}</label> @enderror
                              </div>
                              <div class="form-group mb-lg @error('jenis_kelamin') has-error @enderror">
                                    <label>Jenis Kelamin</label>
                                    <select name="jenis_kelamin" id="jenis_kelamin" class="form-control">
                                          <option selected disabled></option>
                                          <option value="Laki-Laki" {{ old('jenis_kelamin') == 'Laki-Laki' ? 'selected' : '' }}>Laki-Laki</option>
                                          <option value="Perempuan" {{ old('jenis_kelamin') == 'Perempuan' ? 'selected' : '' }}>Perempuan</option>
                                    </select> @error('jenis_kelamin') <label id="jenis_kelamin-error" class="error" for="jenis_kelamin">{{ $message }}</label> @enderror
                              </div>
                              <div class="form-group mb-lg @error('status') has-error @enderror">
                                    <label>Status</label>
                                    <select name="status" id="status" class="form-control">
                                          <option selected disabled></option>
                                          <option value="Belum Menikah" {{ old('status') == 'Belum Menikah' ? 'selected' : '' }}>Belum Menikah</option>
                                          <option value="Menikah" {{ old('status') == 'Menikah' ? 'selected' : '' }}>Menikah</option>
                                          <option value="Cerai" {{ old('status') == 'Cerai' ? 'selected' : '' }}>Cerai</option>
                                    </select> @error('status') <label id="status-error" class="error" for="status">{{ $message }}</label> @enderror
                              </div>
                              <div class="form-group mb-lg @error('alamat') has-error @enderror">
                                    <label>Alamat Lengkap</label>
                                    <input name="alamat" id="alamat" type="text" class="form-control" value="{{ old('alamat') }}" /> @error('alamat') <label id="alamat-error" class="error" for="alamat">{{ $message }}</label> @enderror
                              </div>
                              <div class="form-group mb-lg @error('no_hp') has-error @enderror">
                                    <label>Nomor HP</label>
                                    <input name="no_hp" id="no_hp" type="number" class="form-control" value="{{ old('no_hp') }}" /> @error('no_hp') <label id="no_hp-error" class="error" for="no_hp">{{ $message }}</label> @enderror
                              </div>
                              <div class="form-group mb-lg @error('rekening') has-error @enderror">
                                    <label>Rekening Bank</label>
                                    <select name="rekening" id="rekening" class="form-control" data-plugin-selectTwo>
                                          <option selected disabled></option>
                                          @foreach ($bank as $b)
                                          <option value="{{ $b->code }}" {{ old('rekening') == $b->code ? 'selected' : '' }}>{{ $b->name }}</option>
                                          @endforeach
                                    </select>
                                    @error('rekening') <label id="rekening-error" class="error" for="rekening">{{ $message }}</label> @enderror
                              </div>
                              <div class="form-group mb-lg @error('no_cc') has-error @enderror">
                                    <label>Nomor Kartu Kredit</label>
                                    <input name="no_cc" id="no_cc" type="number" class="form-control" value="{{ old('no_cc') }}" /> @error('no_cc') <label id="no_cc-error" class="error" for="no_cc">{{ $message }}</label> @enderror
                              </div>
                              <div class="form-group mb-lg @error('limit_cc') has-error @enderror">
                                    <label>Limit Kartu Kredit</label>
                                    <input name="limit_cc" id="limit_cc" type="text" class="form-control" value="{{ old('limit_cc') }}" /> @error('limit_cc') <label id="limit_cc-error" class="error" for="limit_cc">{{ $message }}</label> @enderror
                              </div>
                              <div class="row">
                                    <div class="col-sm-8">
                                          <div class="checkbox-custom checkbox-default">
                                                <input id="AgreeTerms" name="agreeterms" type="checkbox" />
                                                <label for="AgreeTerms">Saya setuju syarat penggunaan</label>
                                          </div>
                                    </div>
                                    <div class="col-sm-4 text-right">
                                          <button type="submit" class="btn btn-primary hidden-xs">Sign Up</button>
                                          <button type="submit" class="btn btn-primary btn-block btn-lg visible-xs mt-lg">Sign Up</button>
                                    </div>
                              </div>
                              <span class="mt-lg mb-lg line-thru text-center text-uppercase">
                                    <span>or</span>
                              </span>
                              <p class="text-center">Sudah punya akun? Silahkan <a href="/" style="text-decoration: none;">Sign In!</a>
                              </p>
                        </form>
                  </div>
            </div>
            <p class="text-center text-muted mt-md mb-md">&copy; Copyright 2016. All Rights Reserved.</p>
      </div>
</section>
<script>
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