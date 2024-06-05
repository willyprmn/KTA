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
                        <form action="{{ url('/register') }}" method="post"> 
                              @csrf 
                              <h4 class="mb-xlg">Akun</h4>
                              <div class="form-group mb-lg @error('name') has-error @enderror">
                                    <label>Nama</label>
                                    <input name="name" id="name" type="text" class="form-control" value="{{ old('name') }}" autofocus required/> @error('name') <label id="name-error" class="error" for="name">{{ $message }}</label> @enderror
                              </div>
                              <div class="form-group mb-lg @error('email') has-error @enderror">
                                    <label>E-mail</label>
                                    <input name="email" id="email" type="email" class="form-control" value="{{ old('email') }}" required/> @error('email') <label id="email-error" class="error" for="email">{{ $message }}</label> @enderror
                              </div>
                              <div class="form-group mb-lg @error('username') has-error @enderror">
                                    <label>Username</label>
                                    <input name="username" id="username" type="text" class="form-control" value="{{ old('username') }}" required/> @error('username') <label id="username-error" class="error" for="username">{{ $message }}</label> @enderror
                              </div>
                              <div class="form-group mb-none">
                                    <div class="row">
                                          <div class="col-sm-12 mb-lg  @error('password') has-error @enderror">
                                                <label>Password</label>
                                                <input name="password" id="password" type="password" class="form-control" required/> @error('password') <label id="password-error" class="error" for="password">{{ $message }}</label> @enderror
                                                <div class="checkbox-custom checkbox-default">
                                                      <input type="checkbox" onclick="showPassword()"/>
                                                      <label id="showCheck">Lihat Password</label>
                                                </div>
                                          </div>
                                    </div>
                              </div>
                              <hr class="dotted tall">
					<h4 class="mb-xlg">Data diri</h4>
                              <div class="form-group mb-lg @error('ktp') has-error @enderror">
                                    <label>Nomor KTP</label>
                                    <input name="ktp" id="ktp" type="text" class="form-control number" value="{{ old('ktp') }}" pattern="[0-9]{16}" maxlength="16" required/> 
                                    @error('ktp') 
                                    <label id="ktp-error" class="error" for="ktp">{{ $message }}</label> 
                                    @enderror
                              </div>
                              <div class="form-group mb-lg @error('npwp') has-error @enderror">
                                    <label>NPWP</label>
                                    <input name="npwp" id="npwp" type="text" class="form-control number" value="{{ old('npwp') }}" data-toggle="tooltip" data-placement="top" title="" data-original-title="Masukan hanya angka 15 digit NPWP anda" pattern="[0-9]{15}" maxlength="15" required/> 
                                    @error('npwp') 
                                    <label id="npwp-error" class="error" for="npwp">{{ $message }}</label> 
                                    @enderror
                              </div>
                              <div class="form-group mb-lg @error('jenis_kelamin') has-error @enderror">
                                    <label>Jenis Kelamin</label>
                                    <select name="jenis_kelamin" id="jenis_kelamin" class="form-control" required>
                                          <option selected disabled></option>
                                          <option value="Laki-Laki" {{ old('jenis_kelamin') == 'Laki-Laki' ? 'selected' : '' }}>Laki-Laki</option>
                                          <option value="Perempuan" {{ old('jenis_kelamin') == 'Perempuan' ? 'selected' : '' }}>Perempuan</option>
                                    </select> @error('jenis_kelamin') <label id="jenis_kelamin-error" class="error" for="jenis_kelamin">{{ $message }}</label> @enderror
                              </div>
                              <div class="form-group mb-lg @error('status') has-error @enderror">
                                    <label>Status</label>
                                    <select name="status" id="status" class="form-control" required>
                                          <option selected disabled></option>
                                          <option value="Belum Menikah" {{ old('status') == 'Belum Menikah' ? 'selected' : '' }}>Belum Menikah</option>
                                          <option value="Menikah" {{ old('status') == 'Menikah' ? 'selected' : '' }}>Menikah</option>
                                          <option value="Cerai" {{ old('status') == 'Cerai' ? 'selected' : '' }}>Cerai</option>
                                    </select> @error('status') <label id="status-error" class="error" for="status">{{ $message }}</label> @enderror
                              </div>
                              <div class="form-group mb-lg @error('alamat') has-error @enderror">
                                    <label>Alamat Lengkap</label>
                                    <input name="alamat" id="alamat" type="text" class="form-control" value="{{ old('alamat') }}" required/> @error('alamat') <label id="alamat-error" class="error" for="alamat">{{ $message }}</label> @enderror
                              </div>
                              <div class="form-group mb-lg @error('no_hp') has-error @enderror">
                                    <label>Nomor HP</label>
                                    <input name="no_hp" id="no_hp" type="text" class="form-control number" value="{{ old('no_hp') }}" data-toggle="tooltip" data-placement="top" title="" data-original-title="Nomor HP dimulai dari 0" maxlength="13" required/> 
                                    @error('no_hp') 
                                    <label id="no_hp-error" class="error" for="no_hp">{{ $message }}</label> 
                                    @enderror
                              </div>
                              <div class="form-group mb-lg @error('rekening') has-error @enderror">
                                    <label>Rekening Bank</label>
                                    <select name="rekening" id="rekening" class="form-control" data-plugin-selectTwo required>
                                          <option selected disabled></option>
                                          @foreach ($bank as $b)
                                          <option value="{{ $b->code }}" {{ old('rekening') == $b->code ? 'selected' : '' }}>{{ $b->name }}</option>
                                          @endforeach
                                    </select>
                                    @error('rekening') <label id="rekening-error" class="error" for="rekening">{{ $message }}</label> @enderror
                              </div>
                              <div class="form-group mb-lg @error('no_cc') has-error @enderror">
                                    <label>Nomor Kartu Kredit</label>
                                    <input name="no_cc" id="no_cc" type="text" class="form-control number" value="{{ old('no_cc') }}" data-toggle="tooltip" data-placement="top" title="" data-original-title="Masukan hanya angka 16 digit kartu kredit anda" pattern="[0-9]{16}" maxlength="16" required/> 
                                    @error('no_cc') 
                                    <label id="no_cc-error" class="error" for="no_cc">{{ $message }}</label> 
                                    @enderror
                              </div>
                              <div class="form-group mb-lg @error('limit_cc') has-error @enderror">
                                    <label>Limit Kartu Kredit</label>
                                    <input name="limit_cc" id="limit_cc" type="text" class="form-control" value="{{ old('limit_cc') }}" required/> @error('limit_cc') <label id="limit_cc-error" class="error" for="limit_cc">{{ $message }}</label> @enderror
                              </div>
                              <div class="row">
                                    <div class="col-sm-8">
                                          <div class="checkbox-custom checkbox-default">
                                                <input id="AgreeTerms" name="agreeterms" type="checkbox" />
                                                <label for="AgreeTerms">Saya setuju syarat penggunaan</label>
                                          </div>
                                    </div>
                                    <div class="col-sm-4 text-right">
                                          <button type="submit" id="sign-in" class="btn btn-primary hidden-xs">Sign Up</button>
                                          <button type="submit" class="btn btn-primary btn-block btn-lg visible-xs mt-lg">Sign Up</button>
                                    </div>
                              </div>
                              <span class="mt-lg mb-lg line-thru text-center text-uppercase">
                                    <span>Atau</span>
                              </span>
                              <p class="text-center">Sudah punya akun? Silahkan <a href="/" style="text-decoration: none;">Sign In!</a>
                              </p>
                        </form>
                  </div>
            </div>
            <p class="text-center text-muted mt-md mb-md">&copy; Copyright 2024. All Rights Reserved.</p>
      </div>
</section>
<script>
      $(document).ready(function(){
            $('#sign-in').prop('disabled', true)
      })

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

      $('#AgreeTerms').on('click', function() {
		$('#sign-in').prop('disabled', false)
            $('#AgreeTerms').prop('disabled', true)
	})
</script>
@endsection