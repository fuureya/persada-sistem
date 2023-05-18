@extends('dashboard.partials.inti')

@section('content')
    <h1 class="text-center">Pembayaran Panel</h1>

    <div class="row">
        <div class="col-12">
            <div class="card shadow mb-4">
                <div class="card-body">
                    <div class="container">
                        <div class="row">

                            {{-- modal section --}}
                            <div class="col-6">
                                <!-- Button trigger modal -->
                                <button type="button" class="btn btn-primary" data-toggle="modal" data-target="#insertData">
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
                                                <form method="POST" action="/dashboard/pembayaran/insert">
                                                    @csrf
                                                    @method("POST")
                                                    <div class="form-group">
                                                      <label for="nama-siswa">Nama Siswa</label>
                                                      <input type="text" class="form-control" id="nama-siswa" name="nama_siswa">
                                                    </div>
                                                    <div class="form-group">
                                                      <label for="tanggal_bayar">Tanggal Bayar</label>
                                                      <input type="date" class="form-control" id="tanggal_bayar">
                                                    </div>
                                                    <div class="form-group">
                                                      <label for="nis">Masukkan NIS</label>
                                                      <input type="number" class="form-control" id="nis" name="nis">
                                                    </div>
                                                    <div class="form-group">
                                                      <label for="nis">Masukkan Kelas</label>
                                                      <input type="number" class="form-control" id="nis" name="nis">
                                                    </div>
                                                    <div class="form-group">
                                                      <label for="uang_pembangunan">Masukkan Uang Pembangunan</label>
                                                      <input type="number" class="form-control" id="uang_pembangunan" name="uang_pembangunan">
                                                    </div>
                                                    <div class="form-group">
                                                      <label for="uang_spp">Masukkan Uang SPP</label>
                                                      <input type="number" class="form-control" id="uang_spp" name="uang_spp">
                                                    </div>
                                                    <div class="form-group">
                                                      <label for="uang_lab">Masukkan Uang lab</label>
                                                      <input type="number" class="form-control" id="uang_lab" name="uang_lab">
                                                    </div>
                                                    <div class="form-group">
                                                      <label for="semester_ganjil">Masukkan Uang Semester Ganjil</label>
                                                      <input type="number" class="form-control" id="semester_ganjil" name="semester_ganjil">
                                                    </div>
                                                    <div class="form-group">
                                                      <label for="semester_genap">Masukkan Uang Semester Genap</label>
                                                      <input type="number" class="form-control" id="semester_genap" name="semester_genap">
                                                    </div>
                                                    <div class="form-group">
                                                      <label for="uang_psg">Masukkan Uang PSG</label>
                                                      <input type="number" class="form-control" id="uang_psg" name="uang_psg">
                                                    </div>
                                                    
                                                  </form>
                                                  <div class="modal-footer">
                                                      <button type="button" class="btn btn-secondary"
                                                          data-dismiss="modal">Close</button>
                                                      <button type="button" class="btn btn-primary">Tambah</button>
                                                  </div>
                                                  
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                            {{-- end modal --}}
    
    
                            <div class="col-6">
                                <div class="cari ">
                                    <form
                                        class="d-flex justify-content-end form-inline mr-auto ml-md-3 my-2 my-md-0 mw-100 navbar-search">
                                        <div class="input-group">
                                            <input type="text" class="form-control bg-light border-0 small"
                                                placeholder="Cari berdasarkan NIS" aria-label="Search"
                                                aria-describedby="basic-addon2">
                                            <div class="input-group-append">
                                                <button class="btn btn-primary" type="button">
                                                    <i class="fas fa-search fa-sm"></i>
                                                </button>
                                            </div>
                                        </div>
                                    </form>
                                </div>
                            </div>
                        </div>
                    </div>

                    <div class="table-responsive">
                        <div class="table-wrapper">
                            <table id="dtHorizontalExample" class="table table-striped table-bordered table-sm"
                                cellspacing="0" width="100%">
                                <thead>
                                    <tr>
                                        <th>No</th>
                                        <th>Tanggal Bayar</th>
                                        <th>Nama Siswa</th>
                                        <th>Nis</th>
                                        <th>Kelas</th>
                                        <th>Uang Pembangunan</th>
                                        <th>Uang Spp</th>
                                        <th>Uang Lab</th>
                                        <th>Semester Ganjil</th>
                                        <th>Semester Genap</th>
                                        <th>Uang PSG</th>
                                        <th>Uang UAS</th>
                                        <th>Tunggakan</th>
                                        <th>Keterangan</th>
                                        <th>Action</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    @foreach ($data as $siswaSmk)
                                        <tr>
                                            <td>{{ $loop->iteration }}</td>
                                            <td>{{ $siswaSmk->tanggal_bayar }}</td>
                                            <td>{{ $siswaSmk->nama_siswa }}</td>
                                            <td>{{ $siswaSmk->nis }}</td>
                                            <td>{{ $siswaSmk->kelas }}</td>
                                            <td>Rp. {{ $siswaSmk->uang_pembangunan }}</td>
                                            <td>Rp. {{ $siswaSmk->uang_spp }}</td>
                                            <td>Rp. {{ $siswaSmk->uang_lab }}</td>
                                            <td>Rp. {{ $siswaSmk->semester_ganjil }}</td>
                                            <td>Rp. {{ $siswaSmk->semester_genap }}</td>
                                            <td>Rp. {{ $siswaSmk->uang_psg }}</td>
                                            <td>Rp. {{ $siswaSmk->uang_uas }}</td>
                                            <td>Rp. {{ $siswaSmk->tunggakan }}</td>
                                            <td>{{ $siswaSmk->keterangan }}</td>
                                            <td class="text-center"><a href="dashboard/delete-smk"><i
                                                        class="fa-solid fa-trash text-danger"></i></a> <a
                                                    href="/dashboard/update-smk"><i
                                                        class="fa-solid fa-pencil text-primary"></i></a></td>
                                        </tr>
                                    @endforeach
                                </tbody>
                            </table>
                        </div>
                        <div class="btn-links d-flex justify-content-center">
                            {{ $data->links() }}
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection
