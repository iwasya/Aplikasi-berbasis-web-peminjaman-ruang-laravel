@extends('layouts.app')

@section('content')
@if (session('success'))
<div class="alert alert-success alert-dismissible fade show" role="alert" style="font-size: 14px;">
    <i class="fas fa-check-circle me-1" style="font-size: 14px;"></i> <!-- Ubah ukuran ikon -->
    <span style="font-size: 14px;">{{ session('success') }}</span> <!-- Ubah ukuran teks pesan -->
    <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
</div>
@endif


<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-19">
            <div class="card">
                <div class="card-header bg-primary text-white">{{ __('Pinjam Ruang') }}</div>

                <div class="card-body">
                    <div class="d-flex justify-content-between align-items-center mb-3">
                        <div class="btn-group" role="group" aria-label="Basic example">
                            <button type="button" class="btn btn-success" data-bs-toggle="modal"
                                data-bs-target="#modalTambahData" style="margin-right: 5px;">
                                <i class="fa fa-plus"></i> Tambah
                            </button>
                            <a href="{{ route('pdf.generate') }}" class="btn btn-primary" style="margin-right: 5px;">
                                <i class="fas fa-file-pdf"></i> PDF
                            </a>
                        </div>
                    </div>

                    <div class="table-responsive">
                        <table class="table table-bordered table-stripped table-hover">
                            <thead>
                                <tr>

                                    <th>No</th>
                                    <th>Nama</th>
                                    <th>Tanggal Pinjam</th>
                                    <th>Waktu Pinjam</th>
                                    <th>Waktu Kembali</th>
                                    <th>Ruang</th>
                                    <th>Alasan</th>
                                    <th>Status</th>
                                    <th>Aksi</th>
                                </tr>
                            </thead>
                            <tbody>
                                <?php $no=1; ?>
                                @foreach($data as $row)
                                <tr>
                                    <td>{{ $no }}</td>
                                    <td>{{ $row->nama_peminjam }}</td>
                                    <td>{{ $row->tanggal_pinjam }}</td>
                                    <td>{{ $row->waktu_pinjam }}</td>
                                    <td>{{ $row->waktu_kembali }}</td>
                                    <td>{{ $row->ruang }}</td>
                                    <td>{{ $row->alasan }}</td>
                                    <td>{{ $row->status }}</td>
                                    <td>
                                        <form action="{{ route('persetujuan', $row->no) }}" method="POST">
                                            @csrf
                                            @method('POST') <select name="status">
                                                <option value="Disetujui">Disetujui</option>
                                                <option value="Ditolak">Ditolak</option>
                                            </select>
                                            <button type="submit">Kirim</button>
                                        </form>
                                        <!-- <a href="{{ route('pinjamruang.edit', $row->no) }}"
                                            class="btn btn-primary">Edit</a> -->
                                        <button type="button" class="btn btn-warning btn-md m-1" data-bs-toggle="modal"
                                            data-bs-target="#modalEditData{{ $no }}" style="display: inline;">
                                            Edit <i class="fa fa-edit"></i>
                                        </button>
                                        <div class="modal fade" id="modalEditData{{ $no }}" aria-hidden="true"
                                            aria-labelledby="exampleModalToggleLabel2" tabindex="-1">
                                            <div class="modal-dialog modal-dialog-centered modal-lg">
                                                <div class="modal-content">
                                                    <div class="modal-header">
                                                        <h5 class="modal-title" id="exampleModalToggleLabel2">Edit
                                                            Data
                                                        </h5>
                                                        <button type="button" class="btn-close" data-bs-dismiss="modal"
                                                            aria-label="Close"></button>
                                                    </div>
                                                    <div class="modal-body">
                                                        <!-- Form untuk mengedit data -->
                                                        <form action="{{ url('pinjamruang') }}/{{ $row->no }}"
                                                            method="POST">
                                                            @csrf
                                                            @method('PUT')
                                                            <div class="mb-3">
                                                                <label for="nama_peminjam" class="form-label">Nama
                                                                    Peminjam</label>
                                                                <input type="text" class="form-control"
                                                                    id="nama_peminjam" name="nama_peminjam"
                                                                    placeholder="Masukkan Nama Peminjam"
                                                                    value="{{ $row->nama_peminjam }}">
                                                            </div>
                                                            <div class="mb-3">
                                                                <label for="tanggal_pinjam" class="form-label">Tanggal
                                                                    Pinjam</label>
                                                                <input type="date" class="form-control"
                                                                    id="tanggal_pinjam" name="tanggal_pinjam"
                                                                    value="{{ $row->tanggal_pinjam }}">
                                                            </div>
                                                            <div class="mb-3">
                                                                <label for="waktu_pinjam" class="form-label">Waktu
                                                                    Pinjam</label>
                                                                <input type="time" class="form-control"
                                                                    id="waktu_pinjam" name="waktu_pinjam"
                                                                    value="{{ $row->waktu_pinjam }}">
                                                            </div>
                                                            <div class="mb-3">
                                                                <label for="waktu_kembali" class="form-label">Waktu
                                                                    Kembali</label>
                                                                <input type="time" class="form-control"
                                                                    id="waktu_kembali" name="waktu_kembali"
                                                                    value="{{ $row->waktu_kembali }}">
                                                            </div>
                                                            <div class="mb-3">
                                                                <label for="ruang" class="form-label">Ruang</label>
                                                                <select class="form-select" name="ruang" id="ruang">
                                                                    <option value="Lab-Jaringan"
                                                                        {{ $row->ruang == 'Lab-Jaringan' ? 'selected' : '' }}>
                                                                        Lab-Jaringan</option>
                                                                    <option value="Lab-Program-lanjut"
                                                                        {{ $row->ruang == 'Lab-Program-lanjut' ? 'selected' : '' }}>
                                                                        Lab Program Lanjut</option>
                                                                    <option value="Lab-Lanjut"
                                                                        {{ $row->ruang == 'Lab-Lanjut' ? 'selected' : '' }}>
                                                                        Lab-Lanjut
                                                                    </option>
                                                                </select>
                                                            </div>
                                                            <div class="mb-3">
                                                                <label for="alasan" class="form-label">Alasan</label>
                                                                <textarea class="form-control" id="alasan" name="alasan"
                                                                    cols="30" rows="5"
                                                                    placeholder="Masukkan Alasan Anda">{{ $row->alasan }}</textarea>
                                                            </div>
                                                            <div class="mb-3">
                                                                <label for="status" class="form-label">Waktu
                                                                    Kembali</label>
                                                                <input type="text" class="form-control" id="status"
                                                                    name="status" value="{{ $row->status }}" readonly>
                                                            </div>


                                                    </div>
                                                    <div class="modal-footer">
                                                        <button type="button" class="btn btn-secondary"
                                                            data-bs-dismiss="modal">Batal</button>
                                                        <button type="submit" class="btn btn-primary">Simpan
                                                            Perubahan</button>
                                                    </div>
                                                    </form>
                                                </div>
                                            </div>
                                        </div>
                                        <form action="{{ route('pinjamruang.destroy', $row->no) }}" method="POST"
                                            style="display: inline;">
                                            @csrf
                                            @method('DELETE')
                                            <button type="button" class="btn btn-danger" data-bs-toggle="modal"
                                                data-bs-target="#confirmDelete{{ $row->no }}">
                                                <i class="fas fa-trash"></i> Delete
                                            </button>

                                            <!-- Modal Konfirmasi Delete -->
                                            <div class="modal fade" id="confirmDelete{{ $row->no }}" tabindex="-1"
                                                aria-labelledby="confirmDeleteLabel{{ $row->no }}" aria-hidden="true">
                                                <div class="modal-dialog">
                                                    <div class="modal-content">
                                                        <div class="modal-header">
                                                            <h5 class="modal-title"
                                                                id="confirmDeleteLabel{{ $row->no }}">Konfirmasi Hapus
                                                            </h5>
                                                            <button type="button" class="btn-close"
                                                                data-bs-dismiss="modal" aria-label="Close"></button>
                                                        </div>
                                                        <div class="modal-body">
                                                            Apakah Anda yakin ingin menghapus data ini?
                                                        </div>
                                                        <div class="modal-footer">
                                                            <button type="button" class="btn btn-secondary"
                                                                data-bs-dismiss="modal">Batal</button>
                                                            <button type="submit" class="btn btn-danger">Hapus</button>
                                                        </div>
                                                    </div>
                                                </div>
                                            </div>
                                        </form>


                                    </td>
                                    <?php $no++; ?>
                                    @endforeach

                            </tbody>
                        </table>

                    </div>
                </div>
            </div>

        </div>
    </div>
</div>
<!-- modal tambah data -->
<div class="modal fade" id="modalTambahData" aria-hidden="true" aria-labelledby="exampleModalToggleLabel1"
    tabindex="-1">
    <div class="modal-dialog modal-dialog-centered modal-lg">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="exampleModalToggleLabel1">Tambah Data</h5>
                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
            </div>
            <div class="modal-body">
                <form action="{{ url('pinjam_ruang_simpan')}}" method="post">
                    @csrf
                    <div class="mb-3">
                        <label for="nama_peminjam" class="form-label">Nama Peminjam </label>
                        <input type="text" class="form-control" id="nama_peminjam" name="nama_peminjam"
                            placeholder="Masukkan Nama Mahasiswa">
                    </div>
                    <div class="mb-3">
                        <label for="tanggal_pinjam" class="form-label">Tanggal Pinjam </label>
                        <input type="date" class="form-control" id="tanggal_pinjam" name="tanggal_pinjam"
                            placeholder="Masukkan Nama Mahasiswa">
                    </div>
                    <div class="mb-3">
                        <label for="waktu_pinjam" class="form-label">Waktu Pinjam </label>
                        <input type="time" class="form-control" id="waktu_pinjam" name="waktu_pinjam"
                            placeholder="Masukkan Angkatan">
                    </div>
                    <div class="mb-3">
                        <label for="waktu_kembali" class="form-label">Waktu Kembali </label>
                        <input type="time" class="form-control" id="waktu_kembali" name="waktu_kembali"
                            placeholder="Masukan Prodi anda">
                    </div>
                    <div class="mb-3">
                        <label for="ruang" class="form-label">ruang </label>
                        <select class="form-select" name="ruang" id="ruang">
                            <option value="Lab-Jaringan">Lab-Jaringan</option>
                            <option value="Lab-Program-lanjut">Lab Program Lanjut</option>
                            <option value="Lab-Lanjut">Lab-Lanjut</option>
                        </select>
                    </div>
                    <div class="mb-3">
                        <label for="alasan" class="form-label">Alasan </label>
                        <input type="text" class="form-control" id="alasan" name="alasan" placeholder="Masukan alasan">
                    </div>
            </div>
            <div class="modal-footer">
                <button type="button" class="btn btn-danger" data-bs-dismiss="modal">Batal</button>
                <button type="submit" class="btn btn-primary" data-bs-dismiss="modal" aria-label="Close">Simpan</button>
            </div>
            </form>
        </div>
    </div>
</div>

<script>
$(document).ready(function() {
    $("#searchInput").on("keyup", function() {
        var value = $(this).val().toLowerCase();
        $("table tbody tr").filter(function() {
            $(this).toggle($(this).text().toLowerCase().indexOf(value) > -1)
        });
    });
});
</script>



@endsection