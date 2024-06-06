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
        <div class="col-md-12">
            <div class="card">
                <div class="card-header bg-primary text-white">{{ __('Pengelolaan Ruang') }}</div>

                <div class="card-body">
                    <div class="btn-group" role="group" aria-label="Basic example">
                        <button style="margin-right: 5px; type=" button" class="btn btn-success" data-bs-toggle="modal"
                            data-bs-target="#modalTambahData">
                            <i class="fas fa-plus"></i> Tambah
                        </button>
                        <a href="{{ route('pdf.generate1') }}" class="btn btn-primary">
                            <i class="fas fa-file-pdf"></i> PDF
                        </a>
                    </div>

                    <div class="table-responsive" style="margin-top: 10px">
                        <table class="table table-bordered table-striped table-hover mt-3">
                            <thead>
                                <tr>
                                    <th>No</th>
                                    <th>Foto</th>
                                    <th>Ruangan</th>
                                    <th>Deskripsi</th>
                                    <th>Kapasitas</th>
                                    <th>Aksi</th>
                                </tr>
                            </thead>

                            <tbody>
                                @foreach($data as $row)
                                <tr>
                                    <td><img style="width: 100px"
                                            src="{{ asset('storage/foto_ruangan/' . $row->foto_ruangan) }}"
                                            alt="Foto Ruangan">
                                    </td>
                                    <td>{{ $loop->iteration }}</td>
                                    <td>{{ $row->ruangan }}</td>
                                    <td>{{ $row->descripsi }}</td>
                                    <td>{{ $row->kapasitas }}</td>
                                    <td>
                                        <form action="{{ route('pengolahan.destroy', $row->no) }}" method="POST"
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

                                </tr>
                                @endforeach
                            </tbody>
                        </table>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>

<!-- Modal Tambah Data -->
<div class="modal fade" id="modalTambahData" tabindex="-1" aria-labelledby="exampleModalToggleLabel1"
    aria-hidden="true">
    <div class="modal-dialog modal-dialog-centered modal-lg">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="exampleModalToggleLabel1">Tambah Data</h5>
                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
            </div>
            <div class="modal-body">
                <form action="{{ url('pengolahan_simpan')}}" method="post" enctype="multipart/form-data">
                    @csrf
                    <div class="mb-3">
                        <label for="foto_ruangan" class="form-label">Foto Ruangan:</label>
                        <input type="file" class="form-control" id="foto_ruangan" name="foto_ruangan" accept="image/*"
                            required>
                    </div>
                    <div class="mb-3">
                        <label for="ruangan" class="form-label">Ruangan:</label>
                        <input type="text" class="form-control" id="ruangan" name="ruangan">
                    </div>
                    <div class="mb-3">
                        <label for="descripsi" class="form-label">Deskripsi:</label>
                        <input type="text" class="form-control" id="descripsi" name="descripsi"
                            placeholder="Masukkan deskripsi" required>
                    </div>
                    <div class="mb-3">
                        <label for="kapasitas" class="form-label">Kapasitas:</label>
                        <input type="number" class="form-control" id="kapasitas" name="kapasitas"
                            placeholder="Masukkan kapasitas" min="1" required>
                    </div>
                    <div class="modal-footer">
                        <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Batal</button>
                        <button type="submit" class="btn btn-success">Simpan</button>
                    </div>
                </form>


            </div>
        </div>
    </div>
    @endsection