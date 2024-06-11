@extends('layout.admin')

@section('content')
    <div class="card mb-4">
        <h5 class="card-header">Daftar Mahasiswa</h5>
        <div class="card-body">
            <form action="/mahasiswa/simpan" method="POST">
                @csrf
                <table>
                    <tbody>
                        <tr>
                            <td>
                                <label>NIM</label>
                            </td>
                            <td>
                                <input type="text" name="nim" required>
                            </td>
                        </tr>
                        <tr>
                            <td>
                                <label>Nama Mahasiswa</label>
                            </td>
                            <td>
                                <input type="text" name="nama_lengkap" required>
                            </td>
                        </tr>
                        <tr>
                            <td>
                                <label>Jenis Kelamin</label>
                            </td>
                            <td>
                                <select name="jenis_kelamin" requried>
                                    <option value="">--Pilih--</option>
                                    <option value="laki-laki">Laki-laki</option>
                                    <option value="perempuan">Perempuan</option>
                                </select>
                            </td>
                        </tr>
                        <tr>
                            <td>
                                <label>Program Studi</label>
                            </td>
                            <td>
                                <select name="prodi_id" requried>
                                    <option value="">--Pilih--</option>
                                    @foreach($prodi as $val)
                                    <option value="{{$val->prodi_id}}">{{ $val->nama_prodi }}</option>
                                    @endforeach
                                </select>
                            </td>
                        </tr>
                        <tr>
                            <td cospan="2">
                                <button type="submit">Simpan</button>
                            </td>
                        </tr>
                    </tbody>
                </table>
            </form>
        </div>
    </div>
@stop