@extends('dashboard.partials.inti')

@section('content')
    <h1 class="text-center">Pembayaran Panel</h1>
    
    <div class="row">
        <div class="col-12">
            <div class="card shadow mb-4">
                <div class="card-body">
                    <div class="cari ">
                        <form class="d-flex justify-content-end form-inline mr-auto ml-md-3 my-2 my-md-0 mw-100 navbar-search">
                            <div class="input-group">
                                <input type="text" class="form-control bg-light border-0 small" placeholder="Cari berdasarkan NIS" aria-label="Search" aria-describedby="basic-addon2">
                                    <div class="input-group-append">
                                    <button class="btn btn-primary" type="button">
                                        <i class="fas fa-search fa-sm"></i>
                                    </button>
                                </div>
                            </div>
                        </form>
                    </div>

                    <div class="table-responsive">
                        <div class="table-wrapper">
                            <table id="dtHorizontalExample" class="table table-striped table-bordered table-sm" cellspacing="0"
                            width="100%">
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
                                    <td>{{ $siswaSmk->tanggal_bayar}}</td>
                                    <td>{{ $siswaSmk->nama_siswa }}</td>
                                    <td>{{ $siswaSmk->nis }}</td>
                                    <td>{{ $siswaSmk->kelas}}</td>
                                    <td>Rp. {{ $siswaSmk->uang_pembangunan }}</td>
                                    <td>Rp. {{ $siswaSmk->uang_spp }}</td>
                                    <td>Rp. {{ $siswaSmk->uang_lab }}</td>
                                    <td>Rp. {{ $siswaSmk->semester_ganjil }}</td>
                                    <td>Rp. {{ $siswaSmk->semester_genap }}</td>
                                    <td>Rp. {{ $siswaSmk->uang_psg }}</td>
                                    <td>Rp. {{ $siswaSmk->uang_uas }}</td>
                                    <td>Rp. {{ $siswaSmk->tunggakan }}</td>
                                    <td>{{ $siswaSmk->keterangan }}</td>
                                    <td class="text-center"><a href="dashboard/delete-smk"><i class="fa-solid fa-trash text-danger"></i></a>  <a href="/dashboard/update-smk"><i class="fa-solid fa-pencil text-primary"></i></a></td>
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