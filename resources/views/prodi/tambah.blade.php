<html>
    <head>
        <title>Jurnal Kelas</title>
    </head>
    <body>
        <h1>Aplikasi Jurnal Kelas</h1>
        <h3>Tambah Data Program Studi</h3>
        <div class="add-button">
            <a href="/prodi">
                <button>Kembali</button>
            </a>
        </div>

        <form action="/prodi/simpan" method="POST">
            <table>
                <tbody>
                    <tr>
                        <td>
                            <label>Nama Prodi</label>
                        </td>
                        <td>
                            <input type="text" name="nama_prodi" required>
                        </td>
                    </tr>
                    <tr>
                        <td>
                            <label>Nama Pendek</label>
                        </td>
                        <td>
                            <input type="text" name="nama_pendek" required>
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

    </body>
</html>