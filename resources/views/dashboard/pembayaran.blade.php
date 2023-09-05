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
                            <div class="col-8 d-flex">
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
                                {{-- modal add --}}
                                <button type="button" class="btn btn-primary" data-toggle="modal"
                                    data-target="#insertData">
                                    <i class="fa-solid fa-plus"></i>
                                </button>
                                <a href="/pembayaran/export/{{ $no_rekap }}"
                                    class="btn btn-success ml-3 @if ($no_rekap == '') d-none @endif"> Export
                                    excel</a>
                                <a href="#"
                                    class="btn btn-danger ml-3 @if ($no_rekap == '') d-none @endif"> Export
                                    pdf</a>
                                <!-- Modal -->
                                <div class="modal fade" id="insertData" tabindex="-1" aria-labelledby="exampleModalLabel"
                                    aria-hidden="true">
                                    <div class="modal-dialog">
                                        <div class="modal-content">
                                            <div class="modal-header">
                                                <h5 class="modal-title" id="exampleModalLabel">Tambah Data</h5>
                                                <button type="button" class="close" data-dismiss="modal"
                                                    aria-label="Close">
                                                    <span aria-hidden="true">&times;</span>
                                                </button>
                                            </div>
                                            <div class="modal-body">
                                                <form method="post" action="/dashboard/pembayaran">
                                                    @method('POST')
                                                    @csrf
                                                    <div class="form-group">
                                                        <label for="nama-siswa">Nama Siswa</label>
                                                        <input type="text"
                                                            class="form-control @error('nama_siswa') is-invalid @enderror"
                                                            id="nama-siswa" name="nama_siswa">
                                                        @error('nama_siswa')
                                                            <div class="alert alert-danger">{{ $message }}</div>
                                                        @enderror
                                                    </div>
                                                    <div class="form-group">
                                                        <label for="tanggal_bayar">Tanggal Bayar</label>
                                                        <input type="date"
                                                            class="form-control @error('tanggal_bayar') is-invalid @enderror"
                                                            id="tanggal_bayar" name="tanggal_bayar">
                                                        @error('tanggal_bayar')
                                                            <div class="alert alert-danger">{{ $message }}</div>
                                                        @enderror
                                                    </div>
                                                    <div class="form-group">
                                                        <label for="nis">Masukkan NIS</label>
                                                        <input type="number"
                                                            class="form-control @error('nis') is-invalid @enderror"
                                                            id="nis" name="nis">
                                                        @error('nis')
                                                            <div class="alert alert-danger">{{ $message }}</div>
                                                        @enderror
                                                    </div>
                                                    <div class="form-group">
                                                        <label for="kelas">Masukkan Kelas</label>
                                                        <input type="text"
                                                            class="form-control @error('kelas') is-invalid @enderror"
                                                            id="kelas" name="kelas">
                                                        @error('kelas')
                                                            <div class="alert alert-danger">{{ $message }}</div>
                                                        @enderror
                                                    </div>
                                                    <div class="form-group">
                                                        <label for="uang_pembangunan">Masukkan Uang Pembangunan</label>
                                                        <input type="number"
                                                            class="form-control @error('uang_pembangunan') is-invalid @enderror"
                                                            id="uang_pembangunan" name="uang_pembangunan">
                                                        @error('uang_pembangunan')
                                                            <div class="alert alert-danger">{{ $message }}</div>
                                                        @enderror
                                                    </div>
                                                    <div class="form-group">
                                                        <label for="uang_spp">Masukkan Uang SPP</label>
                                                        <input type="number"
                                                            class="form-control @error('uang_pembangunan') is-invalid @enderror"
                                                            id="uang_spp" name="uang_spp">
                                                        @error('uang_spp')
                                                            <div class="alert alert-danger">{{ $message }}</div>
                                                        @enderror
                                                    </div>
                                                    <div class="form-group">
                                                        <label for="uang_lab">Masukkan Uang lab</label>
                                                        <input type="number"
                                                            class="form-control @error('uang_lab') is-invalid @enderror"
                                                            id="uang_lab" name="uang_lab">
                                                        @error('uang_lab')
                                                            <div class="alert alert-danger">{{ $message }}</div>
                                                        @enderror
                                                    </div>
                                                    <div class="form-group">
                                                        <label for="semester_ganjil">Masukkan Uang Semester Ganjil</label>
                                                        <input type="number"
                                                            class="form-control @error('semester_ganjil') is-invalid @enderror"
                                                            id="semester_ganjil" name="semester_ganjil">
                                                        @error('semester_ganjil')
                                                            <div class="alert alert-danger">{{ $message }}</div>
                                                        @enderror
                                                    </div>
                                                    <div class="form-group">
                                                        <label for="semester_genap">Masukkan Uang Semester Genap</label>
                                                        <input type="number"
                                                            class="form-control @error('semester_genap') is-invalid @enderror"
                                                            id="semester_genap" name="semester_genap">
                                                        @error('semester_genap')
                                                            <div class="alert alert-danger">{{ $message }}</div>
                                                        @enderror
                                                    </div>
                                                    <div class="form-group">
                                                        <label for="uang_psg">Masukkan Uang PSG</label>
                                                        <input type="number"
                                                            class="form-control @error('uang_psg') is-invalid @enderror"
                                                            id="uang_psg" name="uang_psg">
                                                        @error('uang_psg')
                                                            <div class="alert alert-danger">{{ $message }}</div>
                                                        @enderror
                                                    </div>
                                                    <div class="form-group">
                                                        <label for="uang_uas">Masukkan Uang UAS</label>
                                                        <input type="number"
                                                            class="form-control @error('uang_uas') is-invalid @enderror"
                                                            id="uang_uas" name="uang_uas">
                                                        @error('uang_uas')
                                                            <div class="alert alert-danger">{{ $message }}</div>
                                                        @enderror
                                                    </div>
                                                    <div class="form-group">
                                                        <label for="tunggakan">Masukkan Uang Tunggakan</label>
                                                        <input type="number"
                                                            class="form-control @error('tunggakan') is-invalid @enderror"
                                                            id="tunggakan" name="tunggakan">
                                                        @error('tunggakan')
                                                            <div class="alert alert-danger">{{ $message }}</div>
                                                        @enderror
                                                    </div>
                                                    <div class="form-group">
                                                        <label for="keterangan">Masukkan Keterangan</label>
                                                        <input type="text"
                                                            class="form-control @error('keterangan') is-invalid @enderror"
                                                            id="keterangan" name="keterangan">
                                                        @error('keterangan')
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


                            <div class="col-4">
                                <div class="cari ">
                                    <form action="/dashboard/pembayaran" action="GET"
                                        class="d-flex justify-content-end form-inline mr-auto ml-md-3 my-2 my-md-0 mw-100 navbar-search">
                                        <div class="input-group">
                                            <input type="search" class="form-control bg-light border-0 small"
                                                placeholder="Cari berdasarkan NIS" aria-label="Search"
                                                aria-describedby="basic-addon2" name="nis"
                                                value="{{ old('nis') }}">
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
                                                <td class="text-center">
                                                    <form action="/dashboard/pembayaran/{{ $siswaSmk->id }}"
                                                        method="POST">
                                                        @csrf
                                                        @method('DELETE')
                                                        <button type="submit"
                                                            onclick="return confirm('Yakin mau menghapus?')"
                                                            class="btn btn-danger badge">Hapus</button>
                                                    </form>
                                                    <a href="/dashboard/pembayaran/{{ $siswaSmk->id }}"
                                                        class="btn btn-warning badge tombol">
                                                        Update</a>
                                                </td>
                                            </tr>
                                        @endforeach
                                    </tbody>
                                    <tfoot>
                                        <td colspan="4" class="text-center "><strong>Total</strong></td>
                                        <td></td>
                                        <td>Total Pembangunan : Rp. {{ $uang_pembangunan }}</td>
                                        <td>Total Spp : Rp. {{ $uang_spp }}</td>
                                        <td>Total Lab : Rp. {{ $uang_lab }}</td>
                                        <td>Total Semester Ganjil : Rp. {{ $semester_ganjil }}</td>
                                        <td>Total Semester Genap : Rp. {{ $semester_genap }}</td>
                                        <td>Total Uang PSG : Rp. {{ $uang_psg }}</td>
                                        <td>Total Uang UAS : Rp. {{ $uang_uas }}</td>
                                        <td>Total Tunggakan : Rp. {{ $uang_tunggakan }}</td>
                                        <td colspan="2"></td>
                                    </tfoot>
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

        {{-- alert jika sukses menambah data --}}
        @if (session('success'))
            <script>
                alert('sukses menambah data')
            </script>
        @endif
    @endsection
