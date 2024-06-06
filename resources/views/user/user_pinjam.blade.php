@extends('layouts.app_user')

@section('content')
<div class="container">
    <div class="welcome-container">
        <div class="welcome-text">Selamat Datang!</div>
        <div class="welcome-description">Silakan pilih ruangan yang ingin Anda lihat:</div>
    </div>
    <br>
    <div class="room-gallery-container">
        @foreach($data as $row)
        <div class="room-item" data-ruangan="{{ $row->ruangan }}" data-kapasitas="{{ $row->kapasitas }}"
            data-deskripsi="{{ $row->descripsi }}">
            <img style="margin-right: 10px" class="room-photo"
                src="{{ asset('storage/foto_ruangan/' . $row->foto_ruangan) }}" alt="Foto {{ $row->ruangan }}">
            <div class="room-info">
                <h3>{{ $row->ruangan }}</h3>
                <p>Kapasitas: {{ $row->kapasitas }}</p>
                <p>Deskripsi: {{ $row->descripsi }}</p>
            </div>
        </div>
        @endforeach
    </div>
</div>
<br>
<!-- Modal content -->
<div class="modal-overlay" id="modal-overlay">
    <div class="modal-content">
        <span class="close-modal" onclick="closeModal()">&times;</span>
        <img id="room-image" src="" alt="">
        <h2 id="room-name"></h2>
        <p>Kapasitas: <span id="room-capacity"></span></p>
        <p>Deskripsi: <span id="room-description"></span></p>
    </div>
</div>

<div class="form-container">
    <h2>Form Peminjaman Ruang</h2>

    @if (session('success'))
    <div class="alert alert-success alert-dismissible fade show" role="alert" style="font-size: 14px;">
        <i class="fas fa-check-circle me-1" style="font-size: 14px;"></i> <!-- Ubah ukuran ikon -->
        <span style="font-size: 14px;">{{ session('success') }}</span> <!-- Ubah ukuran teks pesan -->
        <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
    </div>


    @endif

    <form action="{{ url('ajukan-peminjaman')}}" method="post">
        @csrf
        <div class="form-group" style="display: none;">
            <label for="nama_peminjam" class="form-label">Nama Peminjam</label>
            <input type="text" class="form-control" id="nama_peminjam" name="nama_peminjam"
                placeholder="Masukkan Nama Mahasiswa" required value="{{ Auth::user()->name }}">
        </div>


        <div class="form-group">
            <label for="tanggal_pinjam" class="form-label">Tanggal Pinjam</label>
            <input type="date" class="form-control" id="tanggal_pinjam" name="tanggal_pinjam" required>
        </div>
        <div class="form-group">
            <label for="waktu_pinjam" class="form-label">Waktu Pinjam</label>
            <input type="time" class="form-control" id="waktu_pinjam" name="waktu_pinjam" required>
        </div>
        <div class="form-group">
            <label for="waktu_kembali" class="form-label">Waktu Kembali</label>
            <input type="time" class="form-control" id="waktu_kembali" name="waktu_kembali" required>
        </div>
        <div class="form-group">
            <label for="ruang" class="form-label">Ruang</label>
            <select class="form-control" id="ruang" name="ruang" placeholder="Masukkan Alasan Anda" required>
                @foreach($data as $r)
                <option value="{{ $r->ruangan }}">{{ $r->ruangan }}</option>
                @endforeach
            </select>
        </div>

        <div class="form-group">
            <label for="alasan" class="form-label">Alasan</label>
            <textarea type="text" class="form-control" id="alasan" name="alasan" cols="30" rows="5"
                placeholder="Masukkan Alasan Anda"></textarea>
        </div>
        <div class="form-group">
            <button type="submit" class="btn btn-success">Ajukan Peminjaman</button>
        </div>
    </form>
</div>
@endsection

@section('scripts')
<script>
document.getElementById('room-filter').addEventListener('change', function() {
    const selectedRoom = this.value; // Mendapatkan nilai ruangan yang dipilih

    // Menampilkan atau menyembunyikan ruangan berdasarkan filter
    document.querySelectorAll('.room-item').forEach(function(room) {
        const roomType = room.getAttribute('data-ruangan');
        if (selectedRoom === 'all' || roomType === selectedRoom) {
            room.style.display = 'block'; // Menampilkan ruangan jika sesuai dengan filter
        } else {
            room.style.display = 'none'; // Menyembunyikan ruangan jika tidak sesuai dengan filter
        }
    });
});
</script>
<script>
const roomItems = document.querySelectorAll('.room-item');
const modalOverlay = document.getElementById('modal-overlay');
const roomNameElem = document.getElementById('room-name');
const roomCapacityElem = document.getElementById('room-capacity');
const roomDescriptionElem = document.getElementById('room-description');
const roomImageElem = document.getElementById('room-image');

roomItems.forEach(item => {
    item.addEventListener('click', () => {
        const roomName = item.getAttribute('data-ruangan');
        const roomCapacity = item.getAttribute('data-kapasitas');
        const roomDescription = item.getAttribute('data-deskripsi');
        const roomImageSrc = item.querySelector('.room-photo').src;

        roomNameElem.textContent = roomName;
        roomCapacityElem.textContent = roomCapacity;
        roomDescriptionElem.textContent = roomDescription;
        roomImageElem.src = roomImageSrc;

        modalOverlay.style.display = 'flex';
    });
});

function closeModal() {
    modalOverlay.style.display = 'none';
}
</script>
@endsection