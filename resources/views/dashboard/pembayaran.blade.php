@extends('dashboard.partials.inti')

@section('content')
    <h1 class="text-center">Pembayaran Panel</h1>
    <div class="row">
        <div class="col-12">
            <div class="card shadow mb-4">
                
                <div class="card-body">
                    <div class="table-responsive">
                        <table class="table table-bordered" id="dataTable" width="100%" cellspacing="0">
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
                                </tr>
                            </thead>
                            <tbody>
                                {{-- @foreach ($data as $siswaSmk)
                                <tr>
                                    <td>{{ $loop->iteration }}</td>
                                    <td>{{ $siswaSmk->nama_pendaftar }}</td>
                                    <td>{{ $siswaSmk->asal_sekolah }}</td>
                                    <td>{{ $siswaSmk->tanggal_lahir }}</td>
                                    <td>{{ $siswaSmk->jurusan->nama_jurusan }}</td>
                                    <td>{{ $siswaSmk->nomor_wa }}</td>
                                    <td>{{ $siswaSmk->nama_wali }}</td>
                                    <td>{{ $siswaSmk->nomor_wa_wali }}</td>
                                    <td>{{ $siswaSmk->status }}</td>
                                    <td>{{ $siswaSmk->tanggal_daftar }}</td>
                                    <td>{{ $siswaSmk->tanggal_update }}</td>
                                </tr>
                                @endforeach --}}
                            </tbody>
                        </table>
                        {{-- <div class="btn-links d-flex justify-content-center">
                            {{ $data->links() }}
                        </div> --}}
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection