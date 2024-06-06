@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-12">
            <div class="card">
                <div class="card-header">{{ __('Angsuran') }}</div>

                <div class="card-body">
                    <div class="btn-group" role="group" aria-label="Basic example">
                        <button type="button" class="btn btn-success" data-bs-toggle="modal"
                            data-bs-target="#modalTambahData">
                            <i class="fa fa-plus"></i> Tambah
                        </button>
                    </div>

                    <div class="btn-group" role="group" aria-label="Basic example">
                        <a href="{{ route('pdf.generate') }}" class="btn btn-primary">
                            <i class="fas fa-file-pdf"></i>PDF
                        </a>
                    </div>
                    <div class="btn-group" role="group" aria-label="Basic example">
                        <a href="{{ route('users.export') }}" class="btn btn-success">
                            <i class="fas fa-file-excel"></i> Export
                        </a>
                    </div>

                    <div class="table-responsive" style="margin-top: 10px">
                        <table class="table table-responsive table-bordered table-stripped table-hover">
                            <thead>
                                <tr>
                                    <th rowspan="2">No</th>
                                    <th rowspan="2">NIS</th>
                                    <th rowspan="2">NAMA</th>
                                    <th rowspan="2">KELAS</th>
                                    <th colspan="6" class="text-center">Bulan</th>
                                    <th rowspan="2">TOTAL</th>
                                    <th rowspan="2">Aksi</th>
                                </tr>
                                <tr>
                                    <th>JAN</th>
                                    <th>FEB</th>
                                    <th>MAR</th>
                                    <th>APR</th>
                                    <th>MEI</th>
                                    <th>JUN</th>
                                </tr>
                            </thead>

                            <tbody>
                                <?php $no=1; ?>
                                @foreach($data as $row)
                                <tr>
                                    <td>{{ $no++ }}</td>
                                    <td>{{ $row->nis }}</td>
                                    <td>{{ $row->nama }}</td>
                                    <td>{{ $row->kelas }}</td>
                                    <td>{{ $row->jan }}</td>
                                    <td>{{ $row->feb }}</td>
                                    <td>{{ $row->mar }}</td>
                                    <td>{{ $row->apr }}</td>
                                    <td>{{ $row->mei }}</td>
                                    <td>{{ $row->juni }}</td>
                                    <td>{{ $row->total }}</td>
                                    <td>


                    </div>
                </div>
            </div>
            <form action="{{ route('angsuran.destroy', $row->no) }}" method="POST" style="display: inline;">
                @csrf
                @method('DELETE')
                <button type="submit" class="btn btn-danger" onclick="return confirm('Are you sure?')">Delete</button>
            </form>

            </td>
            <?php $no++; ?>
            @endforeach

            </tbody>
            <tfoot>
                <tr>
                    <td colspan="4" class="text-center">Total Bulan</td>
                </tr>
            </tfoot>
            </table>
            <form action="{{ route('users.import') }}" method="POST" enctype="multipart/form-data">
                @csrf
                <div class="input-group mb-3">
                    <input type="file" class="form-control" id="file" name="file" accept=".xlsx, .xls">
                    <label class="input-group-text" for="file">Pilih file</label>
                </div>
                <button type="submit" class="btn btn-primary">Impor</button>
            </form>

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
                <form action="{{ url('angsur_simpan')}}" method="post">
                    @csrf
                    <div class="mb-3">
                        <label for="nis" class="form-label">Nis </label>
                        <input type="text" class="form-control" id="nis" name="nis" placeholder="Masukkan Nis">
                    </div>
                    <div class="mb-3">
                        <label for="nama" class="form-label">Nama </label>
                        <input type="text" class="form-control" id="nama" name="nama" placeholder="Masukkan Nama ">
                    </div>
                    <div class="mb-3">
                        <label for="kelas" class="form-label">Kelas </label>
                        <input type="text" class="form-control" id="kelas" name="kelas" placeholder="Masukkan Kelas">
                    </div>
                    <div class="mb-3">
                        <label for="jan" class="form-label">JAN</label>
                        <input type="text" class="form-control" id="jan" name="jan" placeholder="Masukan jan">
                    </div>
                    <div class="mb-3">
                        <label for="feb" class="form-label">FEB</label>
                        <input type="text" class="form-control" id="feb" name="feb" placeholder="Masukan feb">
                    </div>
                    <div class="mb-3">
                        <label for="mar" class="form-label">MAR</label>
                        <input type="text" class="form-control" id="mar" name="mar" placeholder="Masukan mar">
                    </div>
                    <div class="mb-3">
                        <label for="apr" class="form-label">APR</label>
                        <input type="text" class="form-control" id="apr" name="apr" placeholder="Masukan apr">
                    </div>
                    <div class="mb-3">
                        <label for="mei" class="form-label">MEI</label>
                        <input type="text" class="form-control" id="mei" name="mei" placeholder="Masukan mei">
                    </div>
                    <div class="mb-3">
                        <label for="juni" class="form-label">JUN</label>
                        <input type="text" class="form-control" id="juni" name="juni" placeholder="Masukan jun">
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

<!-- Modal Edit Data -->
<!-- Modal Edit Data -->


@endsection