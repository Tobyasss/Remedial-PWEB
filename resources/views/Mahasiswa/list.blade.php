<table border="1" cellpadding="5" cellspacing="0" width="100%" style="text-align: center;">
    <tr style="background-color: #f2f2f2;">
        <th>Nama</th>
        <th>NIM</th>
        <th>Jurusan</th>
        <th>Aksi</th>
    </tr>
    @foreach ($mahasiswas as $mhs)
    <tr>
        <td>{{ $mhs->nama }}</td>
        <td>{{ $mhs->nim }}</td>
        <td>{{ $mhs->jurusan }}</td>
        <td>
            <form action="/mahasiswa/delete/{{ $mhs->id }}" method="POST" style="display:inline;">
                @csrf
                @method('DELETE')
                <button type="submit" style="padding:3px 5px;">Hapus</button>
            </form>
        </td>
    </tr>
    @endforeach
</table>

<div style="margin-top:10px;">
    {{ $mahasiswas->links() }}
</div>
