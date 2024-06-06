@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-8">
            <div class="card">
                <div class="card-header bg-primary text-white">Profil Pengguna</div>

                <div class="card-body">
                    <div class="row">
                        <div class="col-md-3 text-center">
                            <img src="https://via.placeholder.com/150" alt="Profile Picture" class="img-thumbnail mb-2">
                            <div>
                                <a href="#" class="btn btn-sm btn-outline-primary">Ubah Foto Profil</a>
                            </div>
                        </div>
                        <div class="col-md-9">
                            <h3 class="mb-4">{{ $user->name }}</h3>
                            <p class="text-muted"><strong>Email:</strong> {{ $user->email }}</p>
                            <hr>
                            <h4 class="mb-3">Informasi Tambahan</h4>
                            <ul class="list-group">
                                <li class="list-group-item"><strong>Role:</strong> {{ $user->role }}</li>
                                <li class="list-group-item"><strong>Terdaftar Sejak:</strong>
                                    {{ $user->created_at->format('d M Y') }}</li>
                                <!-- Tambahkan info profil lainnya sesuai kebutuhan -->
                            </ul>
                            <div class="mt-4">
                                <a href="#" class="btn btn-primary">Edit Profil</a>
                                <a href="#" class="btn btn-danger" data-toggle="modal"
                                    data-target="#deleteProfileModal">Hapus Profil</a>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>

<!-- Modal -->
<div class="modal fade" id="deleteProfileModal" tabindex="-1" role="dialog" aria-labelledby="deleteProfileModalLabel"
    aria-hidden="true">
    <div class="modal-dialog" role="document">
        <div class="modal-content">
            <div class="modal-header bg-danger text-white">
                <h5 class="modal-title" id="deleteProfileModalLabel">Hapus Profil</h5>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
            <div class="modal-body">
                Apakah Anda yakin ingin menghapus profil Anda? Tindakan ini tidak dapat dibatalkan.
            </div>
            <div class="modal-footer">
                <button type="button" class="btn btn-secondary" data-dismiss="modal">Batal</button>
                <button type="button" class="btn btn-danger">Hapus Profil</button>
            </div>
        </div>
    </div>
</div>
@endsection