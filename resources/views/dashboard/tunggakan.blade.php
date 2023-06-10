@extends('dashboard.partials.inti')

@section('content')
    <h1 class="text-center">Tunggakan Panel</h1>
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
                                            <form method="post" action="/dashboard/pembayaran">
                                                @method("POST")
                                                @csrf
                                                
                                                <div class="form-group">
                                                  <label for="tanggal_bayar">Tanggal</label>
                                                  <input type="date" class="form-control" id="tanggal">
                                                </div>
                                                <div class="form-group">
                                                  <label for="kode">Masukkan Kode</label>
                                                  <input type="text" class="form-control" id="kode" name="kode">
                                                </div>
                                                <div class="form-group">
                                                  <label for="uraian">Masukkan Uraian</label>
                                                  <input type="number" class="form-control" id="uraian" name="uraian">
                                                </div>
                                                <div class="form-group">
                                                  <label for="penerimaan">Masukkan Penerimaan</label>
                                                  <input type="number" class="form-control" id="penerimaan" name="penerimaan">
                                                </div>
                                                <div class="form-group">
                                                  <label for="pengeluaran">Masukkan Pengeluaran</label>
                                                  <input type="number" class="form-control" id="pengeluaran" name="pengeluaran">
                                                </div>
                                                <div class="form-group">
                                                  <label for="uang_lab">Masukkan Saldo</label>
                                                  <input type="number" class="form-control" id="uang_lab" name="uang_lab">
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
@endsection