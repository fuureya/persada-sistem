@extends('dashboard.partials.inti')

@section('content')
    <h1 class="text-center">Pembangunan Panel</h1>
    <div class="row">
        <div class="col-12">
            <div class="card shadow mb-4">
                <div class="card-body">
                    <div class="table-responsive">
                        <table class="table table-bordered" id="dataTable" width="100%" cellspacing="0">
                            <thead>
                                <tr>
                                    <th>No</th>
                                    <th>Tanggal</th>
                                    <th>Kode</th>
                                    <th>Keterangan</th>
                                    <th>Penerimaan</th>
                                    <th>Pengeluaran</th>
                                    <th>Saldo</th>
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