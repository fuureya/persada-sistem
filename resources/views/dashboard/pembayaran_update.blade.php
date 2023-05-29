@extends('dashboard.partials.inti')

@section('content')
    <h1 class="text-center">Update Pembayaran Panel</h1>

    <div class="row">
        <div class="col-12">
            <div class="card shadow mb-4">
                <div class="card-body">
                    <div class="container">
                        <div class="row">
                          <div class="col-12">
                            <form method="post" action="/dashboard/pembayaran/{{ $data->id }}">
                              @method("PATCH")
                              @csrf
                              <input type="hidden" value="{{$data->id}}">
                              <div class="form-group">
                                <label for="nama-siswa">Nama Siswa</label>
                                <input type="text" class="form-control @error('nama_siswa') is-invalid @enderror" id="nama-siswa" name="update_nama_siswa" value="{{$data->nama_siswa}}">
                                @error('nama_siswa')
                                  <div class="alert alert-danger">{{ $message }}</div>
                                @enderror
                              </div>
                              <div class="form-group">
                                <label for="tanggal_bayar">Tanggal Bayar</label>
                                <input type="datetime-local" class="form-control @error('tanggal_bayar') is-invalid @enderror" id="tanggal_bayar" name="update_tanggal_bayar" value="{{ $data->tanggal_bayar }}">
                                @error('tanggal_bayar')
                                  <div class="alert alert-danger">{{ $message }}</div>
                                @enderror
                              </div>
                              <div class="form-group">
                                <label for="nis">Masukkan NIS</label>
                                <input type="number" class="form-control @error('nis') is-invalid @enderror" id="nis" name="update_nis" value="{{ $data->nis }}">
                                @error('nis')
                                  <div class="alert alert-danger">{{ $message }}</div>
                                @enderror
                              </div>
                              <div class="form-group">
                                <label for="kelas">Masukkan Kelas</label>
                                <input type="text" class="form-control @error('kelas') is-invalid @enderror" id="kelas" name="update_kelas" value="{{ $data->kelas }}">
                                @error('kelas')
                                  <div class="alert alert-danger">{{ $message }}</div>
                                @enderror
                              </div>
                              <div class="form-group">
                                <label for="uang_pembangunan">Masukkan Uang Pembangunan</label>
                                <input type="number" class="form-control @error('uang_pembangunan') is-invalid @enderror" id="uang_pembangunan" name="update_uang_pembangunan" value="{{ $data->uang_pembangunan }}">
                                @error('uang_pembangunan')
                                  <div class="alert alert-danger">{{ $message }}</div>
                                @enderror
                              </div>
                              <div class="form-group">
                                <label for="uang_spp">Masukkan Uang SPP</label>
                                <input type="number" class="form-control @error('uang_pembangunan') is-invalid @enderror" id="uang_spp" name="update_uang_spp" value="{{ $data->uang_spp }}">
                                @error('uang_spp')
                                  <div class="alert alert-danger">{{ $message }}</div>
                                @enderror
                              </div>
                              <div class="form-group">
                                <label for="uang_lab">Masukkan Uang lab</label>
                                <input type="number" class="form-control @error('uang_lab') is-invalid @enderror" id="uang_lab" name="update_uang_lab" value="{{ $data->uang_lab }}">
                                @error('uang_lab')
                                  <div class="alert alert-danger">{{ $message }}</div>
                                @enderror
                              </div>
                              <div class="form-group">
                                <label for="semester_ganjil">Masukkan Uang Semester Ganjil</label>
                                <input type="number" class="form-control @error('semester_ganjil') is-invalid @enderror" id="semester_ganjil" name="update_semester_ganjil" value="{{ $data->semester_ganjil }}">
                                @error('semester_ganjil')
                                  <div class="alert alert-danger">{{ $message }}</div>
                                @enderror
                              </div>
                              <div class="form-group">
                                <label for="semester_genap">Masukkan Uang Semester Genap</label>
                                <input type="number" class="form-control @error('semester_genap') is-invalid @enderror" id="semester_genap" name="update_semester_genap" value="{{ $data->semester_genap }}">
                                @error('semester_genap')
                                  <div class="alert alert-danger">{{ $message }}</div>
                                @enderror
                              </div>
                              <div class="form-group">
                                <label for="uang_psg">Masukkan Uang PSG</label>
                                <input type="number" class="form-control @error('uang_psg') is-invalid @enderror" id="uang_psg" name="update_uang_psg" value="{{ $data->uang_psg }}">
                                @error('uang_psg')
                                  <div class="alert alert-danger">{{ $message }}</div>
                                @enderror
                              </div>
                              <div class="form-group">
                                <label for="uang_uas">Masukkan Uang UAS</label>
                                <input type="number" class="form-control @error('uang_uas') is-invalid @enderror" id="uang_uas" name="update_uang_uas" value="{{ $data->uang_uas }}">
                                @error('uang_uas')
                                  <div class="alert alert-danger">{{ $message }}</div>
                                @enderror
                              </div>
                              <div class="form-group">
                                <label for="tunggakan">Masukkan Uang Tunggakan</label>
                                <input type="number" class="form-control @error('tunggakan') is-invalid @enderror" id="tunggakan" name="update_tunggakan" value="{{ $data->tunggakan }}">
                                @error('tunggakan')
                                  <div class="alert alert-danger">{{ $message }}</div>
                                @enderror
                              </div>
                              <div class="form-group">
                                <label for="keterangan">Masukkan Keterangan</label>
                                <input type="text" class="form-control @error('keterangan') is-invalid @enderror" id="keterangan" name="update_keterangan" value="{{ $data->keterangan }}">
                                @error('keterangan')
                                  <div class="alert alert-danger">{{ $message }}</div>
                                @enderror
                              </div>
                                  <button type="button" class="btn btn-secondary"
                                      data-dismiss="modal">Close</button>
                                  <button type="submit" class="btn btn-primary">Update</button>
                              
                            </form>
                          </div>
 
                    </div>

                    
                </div>
            </div>
        </div>
    </div>
    </div>

    {{-- alert jika sukses menambah data --}}
    @if (session('success'))
        <script>
            alert('Sukses Mengubah Data');
        </script>
    @endif 

@endsection

