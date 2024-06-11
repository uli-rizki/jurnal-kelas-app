@extends('layout.admin')

@section('content')
    <div class="card mb-4">
        <h5 class="card-header">Daftar Mahasiswa</h5>
        <div class="card-body">
            <a href="/mahasiswa/tambah" class="btn btn-primary mb-3">Tambah</a>
            <div class="table-responsive text-nowrap">
                <table class="table" id="mahasiswaTable">
                    <thead>
                        <tr>
                            <th>NIM</th>
                            <th>Nama</th>
                            <th>Jenis Kelamin</th>
                            <th>Prodi</th>
                            <th>Status</th>
                            <th class="action-colum">Aksi</th>
                        </tr>
                    </thead>
                    <tbody class="table-border-bottom-0">
                    @foreach($mahasiswa as $val)
                    <tr>
                        <td>{{ $val->nim }}</td>
                        <td>{{ $val->nama_lengkap }}</td>
                        <td>{{ $val->jenis_kelamin }}</td>
                        <td>{{ $val->prodi->nama_prodi }}</td>
                        <td>{{ $val->aktif }}</td>
                        <td>
                            <a href="/mahasiswa/edit/{{ $val->mahasiswa_id }}">Edit</a>
                            <a href="#hapus">Hapus</a>
                        </td>
                    </tr>
                    @endforeach
                    </tbody>
                </table>
            </div>
        </div>
    </div>
@stop