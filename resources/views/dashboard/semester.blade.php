@extends('dashboard.partials.inti')

@section('content')
    <h1 class="text-center">Semester Panel</h1>
    <div class="row">
        <div class="col-12">
            <div class="card shadow mb-4">
                <div class="card-body">

                    <div class="row">
                        {{-- modal section --}}
                        <div class="col-6">
                            <div class="d-flex">
                                {{-- button rekap --}}
                                <form action="/dashboard/pembayaran" method="GET" class="pr-3 pl-3">
                                    <select class="form-select" name="rekap">
                                        <option selected>Rekap By Bulan</option>
                                        <option value="1">Januari</option>
                                        <option value="2">Februari</option>
                                        <option value="3">Maret</option>
                                        <option value="4">April</option>
                                        <option value="5">Mei</option>
                                        <option value="6">Juni</option>
                                        <option value="7">Juli</option>
                                        <option value="8">Agustus</option>
                                        <option value="9">September</option>
                                        <option value="10">Oktober</option>
                                        <option value="11">November</option>
                                        <option value="12">Desember</option>
                                    </select>
                                    <button type="submit" class="btn btn-success">Rekap</button>
                                </form>
                                {{-- end button rekap --}}

                                <!-- Button trigger modal -->
                                <button type="button" class="btn btn-primary" data-toggle="modal"
                                    data-target="#insertData">
                                    <i class="fa-solid fa-plus"></i>
                                </button>
                            </div>

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
                                            <form method="post" action="/dashboard/semester">
                                                @method('POST')
                                                @csrf

                                                <div class="form-group">
                                                    <label for="tanggal_bayar">Tanggal</label>
                                                    <input type="date"
                                                        class="form-control @error('tanggal')is-invalid @enderror"
                                                        id="tanggal" name="tanggal">
                                                    @error('tanggal')
                                                        <div class="alert alert-danger">{{ $message }}</div>
                                                    @enderror
                                                </div>
                                                <div class="form-group">
                                                    <label for="kode">Masukkan Kode</label>
                                                    <input type="text"
                                                        class="form-control @error('kode')is-invalid @enderror"
                                                        id="kode" name="kode">
                                                    @error('kode')
                                                        <div class="alert alert-danger">{{ $message }}</div>
                                                    @enderror
                                                </div>
                                                <div class="form-group">
                                                    <label for="uraian">Masukkan Uraian</label>
                                                    <input type="text" class="form-control @error('uraian')is-invalid @enderror " id="uraian"
                                                        name="uraian">
                                                        @error('uraian')
                                                        <div class="alert alert-danger">{{ $message }}</div>
                                                    @enderror
                                                </div>
                                                <div class="form-group">
                                                    <label for="penerimaan">Masukkan Penerimaan</label>
                                                    <input type="number" class="form-control @error('penerimaan')is-invalid @enderror " id="penerimaan"
                                                        name="penerimaan">
                                                        @error('penerimaan')
                                                        <div class="alert alert-danger">{{ $message }}</div>
                                                    @enderror
                                                </div>
                                                <div class="form-group">
                                                    <label for="pengeluaran">Masukkan Pengeluaran</label>
                                                    <input type="number" class="form-control @error('pengeluaran')is-invalid @enderror" id="pengeluaran"
                                                        name="pengeluaran">
                                                        @error('pengeluaran')
                                                        <div class="alert alert-danger">{{ $message }}</div>
                                                    @enderror
                                                </div>
                                                <div class="form-group">
                                                    <label for="saldo">Masukkan Saldo</label>
                                                    <input type="number" class="form-control @error('saldo')is-invalid @enderror " id="saldo"
                                                        name="saldo">
                                                        @error('saldo')
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

                        <div class="col-6">
                            <div class="cari ">
                                <form action="/dashboard/pembayaran" action="GET"
                                    class="d-flex justify-content-end form-inline mr-auto ml-md-3 my-2 my-md-0 mw-100 navbar-search">
                                    <div class="input-group">
                                        <input type="search" class="form-control bg-light border-0 small"
                                            placeholder="Cari berdasarkan NIS" aria-label="Search"
                                            aria-describedby="basic-addon2" name="nis" value="{{ old('nis') }}">
                                        <div class="input-group-append">
                                            <button class="btn btn-primary" type="submit">
                                                <i class="fas fa-search fa-sm"></i>
                                            </button>
                                        </div>
                                    </div>
                                </form>
                            </div>
                        </div>
                    </div>

                    <div class="table-responsive mt-5">
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
                                @foreach ($data as $semester)
                                    <tr>
                                        <td>{{ $loop->iteration }}</td>
                                        <td>{{ $semester->tanggal }}</td>
                                        <td>{{ $semester->kode }}</td>
                                        <td>{{ $semester->uraian }}</td>
                                        <td>{{ $semester->penerimaan }}</td>
                                        <td>{{ $semester->pengeluaran }}</td>
                                        <td>{{ $semester->saldo }}</td>
                                        <td class="text-center">
                                            <form action="/dashboard/semester/{{ $semester->id }}" method="POST">
                                                @csrf
                                                @method('DELETE')
                                                <button type="submit" onclick="return confirm('Yakin mau menghapus?')"
                                                    class="btn btn-danger badge">Hapus</button>
                                            </form>
                                            <a href="/dashboard/semester/{{ $semester->id }}"
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
