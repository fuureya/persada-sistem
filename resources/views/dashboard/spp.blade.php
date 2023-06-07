@extends('dashboard.partials.inti')

@section('content')
    <h1 class="text-center">SPP Panel</h1>
    <div class="row">
        <div class="col-12">
            <div class="card shadow mb-4">
                <div class="card-body">
                    <div class="row">
                        {{-- modal section --}}
                        <div class="col-6">
                            <!-- Button trigger modal -->
                            <button type="button" class="btn btn-primary mb-3" data-toggle="modal" data-target="#insertData">
                                <i class="fa-solid fa-plus"></i>
                            </button>

                            <!-- Modal -->
                            <div class="modal fade" id="insertData" tabindex="-1" aria-labelledby="exampleModalLabel"
                                aria-hidden="true">
                                <div class="modal-dialog">
                                    <div class="modal-content">
                                        <div class="modal-header">
                                            <h5 class="modal-title" id="exampleModalLabel">Tambah Data</h5>
                                            <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                                <span aria-hidden="true">&times;</span>
                                            </button>
                                        </div>
                                        <div class="modal-body">
                                            <form method="post" action="/dashboard/spp">
                                                @method("POST")
                                                @csrf
                                                
                                                <div class="form-group">
                                                  <label for="tanggal_bayar">Tanggal</label>
                                                  <input type="date" class="form-control  @error('tanggal')is-invalid @enderror" id="tanggal" name="tanggal">

                                                  @error('tanggal')
                                                        <div class="alert alert-danger">{{ $message }}</div>
                                                    @enderror
                                                </div>
                                                <div class="form-group">
                                                  <label for="kode">Masukkan Kode</label>
                                                  <input type="text" class="form-control @error('kode')is-invalid @enderror" id="kode" name="kode">
                                                  @error('kode')
                                                        <div class="alert alert-danger">{{ $message }}</div>
                                                    @enderror
                                                </div>
                                                <div class="form-group">
                                                  <label for="uraian">Masukkan Uraian</label>
                                                  <input type="text" class="form-control @error('uraian')is-invalid @enderror" id="uraian" name="uraian">
                                                  @error('uraian')
                                                        <div class="alert alert-danger">{{ $message }}</div>
                                                    @enderror
                                                </div>
                                                <div class="form-group">
                                                  <label for="penerimaan">Masukkan Penerimaan</label>
                                                  <input type="number" class="form-control @error('penerimaan')is-invalid @enderror" id="penerimaan" name="penerimaan">
                                                  @error('penerimaan')
                                                        <div class="alert alert-danger">{{ $message }}</div>
                                                    @enderror
                                                </div>
                                                <div class="form-group">
                                                  <label for="pengeluaran">Masukkan Pengeluaran</label>
                                                  <input type="number" class="form-control @error('pengeluaran')is-invalid @enderror" id="pengeluaran" name="pengeluaran">
                                                  @error('pengeluaran')
                                                        <div class="alert alert-danger">{{ $message }}</div>
                                                    @enderror
                                                </div>
                                                
                                                
                                                    <button type="button" class="btn btn-secondary"
                                                        data-dismiss="modal">Close</button>
                                                    <button type="submit" class="btn btn-primary">Tambah</button>
                                                
                                              </form>
                                              
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                        {{-- end modal --}}
                    </div>
                    <div class="table-responsive">
                        <table class="table table-bordered" id="dataTable" width="100%" cellspacing="0">
                            <thead>
                                <tr>
                                    <th>No</th>
                                    <th>Tanggal</th>
                                    <th>Kode</th>
                                    <th>Uraian</th>
                                    <th>Penerimaan</th>
                                    <th>Pengeluaran</th>
                                    <th>Saldo</th>
                                    <th>Action</th>
                                </tr>
                            </thead>
                            <tbody>
                                @foreach ($data as $spp)
                                <tr>
                                    <td>{{ $loop->iteration }}</td>
                                    <td>{{ $spp->tanggal }}</td>
                                    <td>{{ $spp->kode }}</td>
                                    <td>{{ $spp->uraian }}</td>
                                    <td>{{ $spp->penerimaan}}</td>
                                    <td>{{ $spp->pengeluaran }}</td>
                                    <td>{{ $spp->saldo }}</td>
                                    <td class="text-center">
                                        <form action="/dashboard/spp/{{ $spp->id }}" method="POST">
                                            @csrf
                                            @method('DELETE')
                                            <button type="submit" onclick="return confirm('Yakin mau menghapus?')"
                                                class="btn btn-danger badge">Hapus</button>
                                        </form>
                                        <a href="/dashboard/spp/{{ $spp->id }}"
                                            class="btn btn-warning badge tombol">
                                            Update</a>
                                    </td>
                                </tr>
                                @endforeach
                            </tbody>
                        </table>
                        <div class="btn-links d-flex justify-content-center">
                            {{ $data->links() }}
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>

    @if (session("success"))
    <script>
        alert("Berhasil Menambah Data")
    </script>
@endif




@if ($errors->any())
<script>
    alert("Gagal Menambah Data, Cek di panel tambah")
</script>
@endif
@endsection