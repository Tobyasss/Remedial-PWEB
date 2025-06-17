<!DOCTYPE html>
<html>
<head>
    <title>CRUD Mahasiswa</title>
</head>
<body style="font-family: sans-serif; padding: 20px;">
    <h2 style="text-align: center;">Data Mahasiswa</h2>

    <form action="/mahasiswa/store" method="POST" style="margin-bottom: 20px;">
        @csrf
        <input type="text" name="nama" placeholder="Nama" required style="padding:5px;">
        <input type="text" name="nim" placeholder="NIM" required style="padding:5px;">

        <select name="jurusan" required style="padding:5px;">
            <option value="">-- Pilih Jurusan --</option>
            <option value="Informatika">Informatika</option>
            <option value="Sistem Informasi">Sistem Informasi</option>
            <option value="Teknik Komputer">Teknik Komputer</option>
        </select>

        <button type="submit" style="padding: 5px;">Tambah</button>
    </form>

    <input type="text" id="search" placeholder="Cari Nama..." style="padding:5px; margin-bottom:10px;">

    <div id="mahasiswa-table">
        @include('mahasiswa.list')
    </div>

<script>
document.getElementById('search').addEventListener('keyup', function() {
    let query = this.value;

    fetch(`/?search=${query}`, {
        headers: {
            'X-Requested-With': 'XMLHttpRequest'
        }
    })
    .then(res => res.text())
    .then(html => {
        document.getElementById('mahasiswa-table').innerHTML = html;
    });
});
</script>
</body>
</html>
