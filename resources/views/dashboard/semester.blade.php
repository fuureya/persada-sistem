@extends('dashboard.partials.inti')

@section('content')
    <h1 class="text-center">Semester Panel</h1>
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
                                    <th>Uraian</th>
                                    <th>Penerimaan</th>
                                    <th>Pengeluaran</th>
                                    <th>Saldo</th>
                                </tr>
                            </thead>
                            <tbody>
                                @foreach ($data as $semester)
                                <tr>
                                    <td>{{ $loop->iteration }}</td>
                                    <td>{{ $semester->tanggal }}</td>
                                    <td>{{ $semester->kode }}</td>
                                    <td>{{ $semester->uraian }}</td>
                                    <td>{{ $semester->penerimaan}}</td>
                                    <td>{{ $semester->pengeluaran }}</td>
                                    <td>{{ $semester->saldo }}</td>
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