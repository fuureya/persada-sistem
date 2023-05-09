@extends('partials.main')
@include('partials.navbar')

@section('content')
    <div class="container">
        <div class="row">
            <div class="col-12 text-center mt-5">
                <img src="https://persadaict.sch.id/wp-content/uploads/2021/11/sdsdsssssssss-1-150x150.png" class="img-fluid" alt="">
            </div>
            {{-- bagian form pendaftar --}}       
            @if (session()->has("success"))
            <div class="alert alert-primary" role="alert">
              {{ session("success") }}
            </div>
            @endif
            <div class="col-12 m-5">
                
                <form method="post" action="/daftarsmp">
                    @csrf
                    @method('POST')
                    <div class="form-group">
                      <label for="nama">Nama Lengkap</label>
                      <input type="text" class="form-control @error("nama_pendaftar") is-invalid @endError" id="nama" name="nama_pendaftar">
                      {{-- error --}}
                      @error('nama_pendaftar')
                        <div class="invalid-feedback">
                            {{ $message }}
                        </div>
                      @enderror
                    </div>
                    <div class="form-group">
                        <label for="asal_sekolah">Asal Sekolah</label>
                        <input type="text" class="form-control @error("asal_sekolah") is-invalid @endError" id="asal_sekolah" name="asal_sekolah">
                        {{-- error --}}
                        @error('asal_sekolah')
                        <div class="invalid-feedback">
                            {{ $message }}
                        </div>
                      @enderror
                      </div>
                    <div class="form-group">
                      <label for="tanggal_lahir">Tanggal Lahir</label>
                      <input type="date" class="form-control @error("tanggal_lahir") is-invalid @endError " id="tanggal_lahir" name="tanggal_lahir">
                      @error('tanggal_lahir')
                        <div class="invalid-feedback">
                            {{ $message }}
                        </div>
                      @enderror
                    </div>
                    <div class="form-group">
                      <label for="nomor_wa">Nomor Whatsapp</label>
                      <input type="number" class="form-control @error("nomor_wa") is-invalid @endError" id="nomor_wa" name="nomor_wa">
                      @error('nomor_Wa')
                        <div class="invalid-feedback">
                            {{ $message }}
                        </div>
                      @enderror
                    </div>
                    <div class="form-group">
                      <label for="nama_wali">Nama Wali</label>
                      <input type="text" class="form-control @error("nama_wali") is-invalid @endError" id="nama_wali" name="nama_wali">
                      @error('nama_wali')
                        <div class="invalid-feedback">
                            {{ $message }}
                        </div>
                      @enderror
                    </div>
                    <div class="form-group">
                      <label for="nomor_wa_wali">Nomor Whatsapp Wali</label>
                      <input type="number" class="form-control @error("nomor_wa_wali") is-invalid @endError" id="nomor_wa_wali" name="nomor_wa_wali">
                      @error('nomor_wa_wali')
                        <div class="invalid-feedback">
                            {{ $message }}
                        </div>
                      @enderror
                    </div>
                    <button type="submit" class="btn btn-success">Daftar</button>
                  </form>
            </div>     
        </div>
    </div>
@endsection