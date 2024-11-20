@extends('layouts.base')

@section('container')
<section class="panel">
      <header class="panel-heading">
            <div class="panel-actions">
                  <a href="#" class="panel-action panel-action-toggle" data-panel-toggle></a>
                  <a href="#" class="panel-action panel-action-dismiss" data-panel-dismiss></a>
            </div>
            <h2 class="panel-title">List Bank</h2>
      </header>
      <div class="panel-body">
            <div class="row">
                  <div class="col-sm-6">
                        <div class="mb-md">
                              <a class="modal-with-form btn btn btn-primary" href="#modalForm">Tambah Data <i class="fa fa-plus"></i></a>
                        </div>
                  </div>
            </div>
            <table class="table table-bordered table-striped mb-none" id="datatable-default">
                  
                  <thead>
                        <tr>
                              <th>#</th>
                              <th>Nama Bank</th>
                              <th>Tenor Maksimal</th>
                              <th>Aksi</th>
                        </tr>
                  </thead>
                  <tbody>
                        @foreach ($bank as $b)
                        <tr>
                              <td>{{ $loop->iteration }}</td>
                              <td>{{ $b->nama }}</td>
                              <td>{{ $b->tenor_bank }} Bulan</td>
                              <td>
                                    <a href="#modalForm2" class="modal-with-form" onclick="EditBank('{{ $b->id }}')" data-toggle="tooltip" data-placement="top" title="" data-original-title="Edit">
                                          <i class="fa fa-pencil"></i>
                                    </a>
                                    <a class="mb-xs mt-xs mr-xs modal-basic" href="#modalCenter" onclick="DestroyBank('{{ $b->id }}')" data-toggle="tooltip" data-placement="top" title="" data-original-title="Hapus" style="color: red;">
                                          <i class="fa fa-trash-o"></i>
                                    </a>
                              </td>
                        </tr>
                        @endforeach
                  </tbody>
            </table>
      </div>

      <div class="panel-body">
            <!-- Modal Form -->
            <div id="modalForm" class="modal-block modal-block-primary mfp-hide">
                  @csrf
                  <section class="panel">
                        <header class="panel-heading">
                                    <h2 class="panel-title">Form Tambah Data Bank</h2>
                        </header>
                        <div class="panel-body">
                              <div class="form-group mt-lg">
                                    <label class="col-sm-3 control-label">Bank</label>
                                    <div class="col-sm-9">
                                          <select name="nama" id="nama" class="form-control" width="100" data-plugin-selectTwo required>
                                                <option selected disabled></option>
                                                @foreach ($list as $l)
                                                <option value="{{ $l->name }}">{{ $l->name }}</option>
                                                @endforeach
                                          </select>
                                    </div>
                              </div>
                              <div class="form-group mt-lg">
                                    <label class="col-sm-3 control-label">Tenor Maksimal</label>
                                    <div class="col-sm-9">
                                          <select name="tenor_bank" id="tenor_bank" class="form-control" required>
                                                <option selected disabled>Tenor Maksimal</option>
                                                <option value="12">12 Bulan</option>
                                                <option value="24">24 Bulan</option>
                                                <option value="36">36 Bulan</option>
                                                <option value="48">48 Bulan</option>
                                                <option value="60">60 Bulan</option>
                                          </select>
                                    </div>
                              </div>
                        </div>
                        <footer class="panel-footer">
                              <div class="row">
                                    <div class="col-md-12 text-right">
                                          <button type="submit" class="btn btn-success modal-dismiss" id="store-bank">Simpan</button>
                                          <button class="btn btn-warning modal-dismiss" id="cancel-bank">Batal</button>
                                    </div>
                              </div>
                        </footer>
                  </section>
            </div>

            <div id="modalForm2" class="modal-block modal-block-primary mfp-hide">
                  @csrf
                  <section class="panel">
                        <header class="panel-heading">
                              <h2 class="panel-title">Form Edit Data Bank</h2>
                        </header>
                        <div class="panel-body">
                              <div class="form-group mt-lg">
                                    <label class="col-sm-3 control-label">Bank</label>
                                    <div class="col-sm-9">
                                          <input type="hidden" name="id" id="id" class="form-control">
                                          <select name="nama" id="nama" class="form-control" data-plugin-selectTwo required>
                                                <option selected disabled></option>
                                                @foreach ($list as $l)
                                                <option value="{{ $l->name }}">{{ $l->name }}</option>
                                                @endforeach
                                          </select>
                                    </div>
                              </div>
                              <div class="form-group mt-lg">
                                    <label class="col-sm-3 control-label">Tenor Maksimal</label>
                                    <div class="col-sm-9">
                                          <select name="tenor_bank" id="tenor_bank" class="form-control" required>
                                                <option selected disabled>Tenor Maksimal</option>
                                                <option value="12">12 Bulan</option>
                                                <option value="24">24 Bulan</option>
                                                <option value="36">36 Bulan</option>
                                                <option value="48">48 Bulan</option>
                                                <option value="60">60 Bulan</option>
                                          </select>
                                    </div>
                              </div>
                        </div>
                        <footer class="panel-footer">
                              <div class="row">
                                    <div class="col-md-12 text-right">
                                          <button type="submit" class="btn btn-success modal-dismiss" id="update-bank">Simpan</button>
                                          <button class="btn btn-warning modal-dismiss" id="cancel-bank">Batal</button>
                                    </div>
                              </div>
                        </footer>
                  </section>
            </div>

            <!-- Modal Delete -->
            <div id="modalCenter" class="modal-block mfp-hide">
                  <section class="panel">
                        <div class="panel-body">
                              <div class="modal-wrapper">
                                    <div class="modal-text text-center">
                                          <p>Apakah yakin akan menghapus data ini?</p>
                                          <button class="btn btn-danger modal-dismiss" id="delete-bank">Hapus</button>
                                          <button class="btn btn-warning modal-dismiss">Batal</button>
                                    </div>
                              </div>
                        </div>
                  </section>
            </div>
      </div>
</section>

<script>
      $("#cancel-bank").click(function(){
            $('#nama').val('')
            $('#tenor_bank').val('')
      })

      $('#store-bank').click(function(e) {
            e.preventDefault()

            //define variable
            let nama   = $('#nama').val()
            let tenor_bank   = $('#tenor_bank').val()
            let token   = $("meta[name='csrf-token']").attr("content")
        
            //ajax
            $.ajax({
                  url: '/bank',
                  type: 'POST',
                  cache: false,
                  data: {
                        "_token": token,
                        "nama": nama,
                        "tenor_bank": tenor_bank
                  },
                  success:function(response){
                        //clear form
                        $('#nama').val('')
                        $('#tenor_bank').val('')
                        location.reload()
                  },
                  error:function(error){
                        alert("Error")
                  }
            })
      })

      function DestroyBank(e){
            let token   = $("meta[name='csrf-token']").attr("content")

            $("#delete-bank").click(function(){
                  $.ajax({
                        url: '/bank/' + e,
                        type: 'DELETE',
                        cache: false,
                        data: {
                              "_token": token
                        },
                        success:function(response){
                              location.reload()
                        },
                        error:function(error){
                              alert("Error")
                        }
                  })
            })
      }

      function EditBank(e){
            let token   = $("meta[name='csrf-token']").attr("content")
            $('#nama').val('')
            $('#tenor_bank').val('')
            $.ajax({
                  url: '/bank/' + e + '/edit',
                  type: 'GET',
                  cache: false,
                  data: {
                        "_token": token
                  },
                  success:function(response){
                        $('#nama').val(response.data[0].nama)
                        $('#tenor_bank').val(response.data[0].tenor_bank)
                        $('#id').val(response.data[0].id)
                  },
                  error:function(error){
                        alert("Error")
                  }
            })
      }

      $("#update-bank").click(function(){
            let token   = $("meta[name='csrf-token']").attr("content")
            let e = $('#id').val()
            let nama   = $('#nama').val()
            let tenor_bank   = $('#tenor_bank').val()
            $.ajax({
                  url: '/bank/' + e,
                  type: 'PUT',
                  cache: false,
                  data: {
                        "_token": token,
                        "nama": nama,
                        "tenor_bank": tenor_bank
                  },
                  success:function(response){
                        location.reload()
                  },
                  error:function(error){
                        alert("Error")
                  }
            })
      })
</script>
@endsection