<?php

namespace App\Http\Controllers;

use App\Models\Mahasiswa;
use Illuminate\Http\Request;

class MahasiswaController extends Controller
{
    // TAMPILKAN DATA MAHASISWA DENGAN PAGINATION & LIVE SEARCH
    public function index(Request $request)
    {
        $query = Mahasiswa::query();

        if ($request->has('search')) {
            $query->where('nama', 'like', '%' . $request->search . '%');
        }

        $mahasiswas = $query->paginate(5);

        // Jika request lewat AJAX (fetch dari JS)
        if ($request->ajax()) {
            return view('mahasiswa.list', compact('mahasiswas'))->render();
        }

        // Request biasa (load awal)
        return view('mahasiswa.index', compact('mahasiswas'));
    }

    // SIMPAN MAHASISWA BARU
    public function store(Request $request)
    {
        $request->validate([
            'nama' => 'required|string|max:255',
            'nim' => 'required|string|max:20|unique:mahasiswas,nim',
            'jurusan' => 'required|in:Informatika,Sistem Informasi,Teknik Komputer',
        ]);

        Mahasiswa::create($request->all());

        return redirect()->back()->with('success', 'Mahasiswa berhasil ditambahkan.');
    }

    // UPDATE MAHASISWA
    public function update(Request $request, Mahasiswa $mahasiswa)
    {
        $request->validate([
            'nama' => 'required|string|max:255',
            'nim' => 'required|string|max:20|unique:mahasiswas,nim,' . $mahasiswa->id,
            'jurusan' => 'required|in:Informatika,Sistem Informasi,Teknik Komputer',
        ]);

        $mahasiswa->update($request->all());

        return redirect()->back()->with('success', 'Data mahasiswa diperbarui.');
    }

    // HAPUS MAHASISWA
    public function destroy(Mahasiswa $mahasiswa)
    {
        $mahasiswa->delete();

        return redirect()->back()->with('success', 'Mahasiswa berhasil dihapus.');
    }
}
