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
                            <form method="post" action="/dashboard/semester/{{ $data->id }}">
                              @method("PATCH")
                              @csrf
                              <input type="hidden" value="{{$data->id}}">
                              
                              <div class="form-group">
                                <label for="tanggal_bayar">Tanggal</label>
                                <input type="datetime-local" class="form-control @error('tanggal_bayar') is-invalid @enderror" id="tanggal_bayar" name="update_tanggal" value="{{ $data->tanggal }}">
                                @error('tanggal_bayar')
                                  <div class="alert alert-danger">{{ $message }}</div>
                                @enderror
                              </div>
                              <div class="form-group">
                                <label for="kode">Masukkan Kode</label>
                                <input type="text" class="form-control @error('kode') is-invalid @enderror" id="kode" name="update_kode" value="{{ $data->kode }}">
                                @error('kode')
                                  <div class="alert alert-danger">{{ $message }}</div>
                                @enderror
                              </div>
                              <div class="form-group">
                                <label for="uraian">Masukkan Uraian</label>
                                <input type="text" class="form-control @error('uraian') is-invalid @enderror" id="uraian" name="update_uraian" value="{{ $data->uraian }}">
                                @error('uraian')
                                  <div class="alert alert-danger">{{ $message }}</div>
                                @enderror
                              </div>
                              <div class="form-group">
                                <label for="penerimaan">Masukkan Penerimaan</label>
                                <input type="number" class="form-control @error('penerimaan') is-invalid @enderror" id="penerimaan" name="update_penerimaan" value="{{ $data->penerimaan }}">
                                @error('penerimaan')
                                  <div class="alert alert-danger">{{ $message }}</div>
                                @enderror
                              </div>
                              <div class="form-group">
                                <label for="pengeluaran">Masukkan Penegeluaran</label>
                                <input type="number" class="form-control @error('uang_pembangunan') is-invalid @enderror" id="pengeluaran" name="update_pengeluaran" value="{{ $data->pengeluaran }}">
                                @error('pengeluaran')
                                  <div class="alert alert-danger">{{ $message }}</div>
                                @enderror
                              </div>
                              <div class="form-group">
                                <label for="saldo">Masukkan Saldo</label>
                                <input type="number" class="form-control @error('saldo') is-invalid @enderror" id="saldo" name="update_saldo" value="{{ $data->saldo }}">
                                @error('saldo')
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

