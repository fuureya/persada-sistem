@extends('dashboard.inti')

@section('content')
    <h1 class="text-center">Pendaftar SMP Panel</h1>

    <div class="row">
        <div class="col-12">
            
            <div class="card shadow mb-4">
                <div class="card-header py-3">
                    <h6 class="m-0 font-weight-bold text-primary">DataTables Example</h6>
                </div>
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
                                    
                                </tr>
                            </thead>
                            <tbody>
                                @foreach ($data as $siswaSmp)
                                <tr>
                                    <td></td>
                                    <td>{{ $siswaSmp->nama_pendaftar }}</td>
                                    <td>{{ $siswaSmp->asal_sekolah }}</td>
                                    <td>{{ $siswaSmp->tanggal_lahir }}</td>
                                    <td>{{ $siswaSmp->nomor_wa }}</td>
                                    <td>{{ $siswaSmp->nama_wali }}</td>
                                    <td>{{ $siswaSmp->nomor_wa_wali }}</td>
                                    <td>{{ $siswaSmp->status }}</td>
                                    <td>{{ $siswaSmp->tanggal_daftar }}</td>
                                    <td>{{ $siswaSmp->tanggal_update }}</td>
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