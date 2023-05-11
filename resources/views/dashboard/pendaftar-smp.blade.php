@extends('dashboard.partials.inti')

@section('content')
    <h1 class="text-center">Pendaftar SMP Panel</h1>

    <div class="row">
        <div class="col-12">
            
            <div class="card shadow mb-4">
                
                <div class="card-body">
                    <div class="table-responsive">
                        <table class="table table-bordered" id="dataTable" width="100%" cellspacing="0">
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
                                @foreach ($data as $siswaSmp)
                                <tr>
                                    <td>{{ $loop->iteration }}</td>
                                    <td>{{ $siswaSmp->nama_pendaftar }}</td>
                                    <td>{{ $siswaSmp->asal_sekolah }}</td>
                                    <td>{{ $siswaSmp->tanggal_lahir }}</td>
                                    <td>{{ $siswaSmp->nomor_wa }}</td>
                                    <td>{{ $siswaSmp->nama_wali }}</td>
                                    <td>{{ $siswaSmp->nomor_wa_wali }}</td>
                                    <td>{{ $siswaSmp->status }}</td>
                                    <td>{{ $siswaSmp->tanggal_daftar }}</td>
                                    <td>{{ $siswaSmp->tanggal_update }}</td>
                                    <td class="text-center"><a href="dashboard/delete-smp"><i class="fa-solid fa-trash text-danger"></i></a>  <a href="/dashboard/update-smp"><i class="fa-solid fa-pencil text-primary"></i></a></td>
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