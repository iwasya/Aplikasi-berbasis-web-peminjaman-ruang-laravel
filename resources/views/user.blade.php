@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-12">
            <div class="card">
                <div class="card-header bg-primary text-white">{{ __('Pinjam Ruang') }}</div>

                <div class="card-body">
                    <div class="d-flex justify-content-between align-items-center mb-3">
                        <div class="btn-group" role="group" aria-label="Basic example">
                            <button type="button" class="btn btn-success" data-bs-toggle="modal"
                                data-bs-target="#modalTambahData" style="margin-right: 5px;">
                                <i class="fa fa-plus"></i> Tambah
                            </button>
                            <a href="{{ route('pdf.generate2') }}" class="btn btn-primary" style="margin-right: 5px;">
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
                                    <th>Email</th>
                                    <th>password</th>
                                    <th>Role</th>
                                    <th>Aksi</th>
                                </tr>
                            </thead>
                            <tbody>
                                <?php $no=1; ?>
                                @foreach($data as $row)
                                <tr>
                                    <td>{{ $no}}</td>
                                    <td>{{ $row->name }}</td>
                                    <td>{{ $row->email  }}</td>
                                    <td>{{ $row->password }}</td>
                                    <td>{{ $row->role }}</td>
                                    <td>
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
                                                        <form action="{{ url('user') }}/{{ $row->id }}" method="POST">
                                                            @csrf
                                                            @method('PUT')
                                                            <div class="mb-3">
                                                                <label for="name" class="form-label">Nama
                                                                    Peminjam</label>
                                                                <input type="text" class="form-control" id="name"
                                                                    name="name" placeholder="Masukkan Nama Peminjam"
                                                                    value="{{ $row->name }}">
                                                            </div>
                                                            <div class="mb-3">
                                                                <label for="email" class="form-label">Email</label>
                                                                <input type="email" class="form-control" id="email"
                                                                    name="email" value="{{ $row->email }}">
                                                            </div>
                                                            <div class="mb-3">
                                                                <label for="password"
                                                                    class="form-label">Password</label>
                                                                <input type="text" class="form-control" id="password"
                                                                    name="password">
                                                            </div>

                                                            <div class="mb-3">
                                                                <label for="role" class="form-label">role</label>
                                                                <input type="text" class="form-control" id="role"
                                                                    name="role" value="{{ $row->role }}">
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
                                        <form action="{{ route('user.destroy', $row->id) }}" method="POST"
                                            style="display: inline;">
                                            @csrf
                                            @method('DELETE')
                                            <button type="button" class="btn btn-danger" data-bs-toggle="modal"
                                                data-bs-target="#confirmDelete{{ $row->id }}">
                                                <i class="fas fa-trash"></i> Delete
                                            </button>

                                            <!-- Modal Konfirmasi Delete -->
                                            <div class="modal fade" id="confirmDelete{{ $row->id }}" tabindex="-1"
                                                aria-labelledby="confirmDeleteLabel{{ $row->id }}" aria-hidden="true">
                                                <div class="modal-dialog">
                                                    <div class="modal-content">
                                                        <div class="modal-header">
                                                            <h5 class="modal-title"
                                                                id="confirmDeleteLabel{{ $row->id }}">Konfirmasi Hapus
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
                <form action="{{ url('user_simpan')}}" method="post">
                    @csrf
                    <div class="mb-3">
                        <label for="name" class="form-label">Nama</label>
                        <input type="text" class="form-control" id="name" name="name" placeholder="Masukkan Nama ">
                    </div>
                    <div class="mb-3">
                        <label for="email" class="form-label">email</label>
                        <input type="email" class="form-control" id="email " name="email" placeholder="Masukkan email">
                    </div>
                    <div class="mb-3">
                        <label for="password" class="form-label">password</label>
                        <input type="password" class="form-control" id="password" name="password"
                            placeholder="Masukkan password">
                    </div>
                    <div class="mb-3">
                        <label for="role" class="form-label">role</label>
                        <input type="text" class="form-control" id="role" name="role" placeholder="Masukan Prodi anda">
                    </div>
            </div>
            <div class="modal-footer">
                <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Batal</button>
                <button type="submit" class="btn btn-success" data-bs-dismiss="modal" aria-label="Close">Simpan</button>
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