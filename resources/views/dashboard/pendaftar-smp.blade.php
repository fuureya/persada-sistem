@extends('dashboard.partials.inti')

@section('content')
    <h1 class="text-center">Pendaftar SMP Panel</h1>

    <div class="row">
        <div class="col-12">
            
            <div class="card shadow mb-4">
                
                <div class="card-body">
                    <div class="table-responsive">
                        <div class="table-wrapper">
                            <table id="dtHorizontalExample" class="table table-striped table-bordered table-sm" cellspacing="0"
                            width="100%">
                            <thead>
                                <tr>
                                    <th>No</th>
                                    <th>Nama Pendaftar</th>
                                    <th>Asal Sekolah</th>
                                    <th>Tanggal Lahir</th>
                                    <th>No Whatsapp</th>
                                    <th>Nama Wali</th>
                                    <th>Nomor Wa Wali</th>
                                    <th>Status</th>
                                    <th>Tanggal Daftar</th>
                                    <th>Tanggal Update</th>
                                    <th>Action</th>
                                </tr>
                            </thead>
                            <tbody>
                                @foreach ($data as $siswaSmk)
                                <tr>
                                    <td>{{ $loop->iteration }}</td>
                                    <td>{{ $siswaSmk->nama_pendaftar }}</td>
                                    <td>{{ $siswaSmk->asal_sekolah }}</td>
                                    <td>{{ $siswaSmk->tanggal_lahir }}</td>
                                    <td>{{ $siswaSmk->nomor_wa }}</td>
                                    <td>{{ $siswaSmk->nama_wali }}</td>
                                    <td>{{ $siswaSmk->nomor_wa_wali }}</td>
                                    <td>{{ $siswaSmk->status }}</td>
                                    <td>{{ $siswaSmk->tanggal_daftar }}</td>
                                    <td>{{ $siswaSmk->tanggal_update }}</td>
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