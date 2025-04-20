<?php

namespace App\Http\Controllers;

use App\Models\mahasiswa;
use Illuminate\Http\Request;

class MahasiswaController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index(Request $request)
    {
        $posts = Mahasiswa::paginate(10);
        // $mahasiswa = Mahasiswa::all();
        $query = $request->input('search');

        // Fetch data based on the search query
        $mahasiswa = Mahasiswa::when($query, function ($queryBuilder) use ($query) {
            return $queryBuilder->where('nim', 'like', "%{$query}%")
                ->orWhere('nama', 'like', "%{$query}%")
                ->orWhere('jenis_kelamin', 'like', "%{$query}%")
                ->orWhere('tempat_lahir', 'like', "%{$query}%")
                ->orWhere('tanggal_lahir', 'like', "%{$query}%")
                ->orWhere('alamat', 'like', "%{$query}%")
                ->orWhere('jurusan', 'like', "%{$query}%");
        })->get();
        return view('admin.mahasiswa.index', compact('mahasiswa', 'posts', 'query'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        return view('admin.mahasiswa.create');
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $request->validate([
            'nim' => 'required|unique:mahasiswa,nim|max:20',
            'nama' => 'required|string|max:100',
            'jenis_kelamin' => 'required|in:L,P',
            'tempat_lahir' => 'required|string|max:100',
            'tanggal_lahir' => 'required|date',
            'alamat' => 'required|string',
            'jurusan' => 'required|string|max:100',
        ]);

        Mahasiswa::create($request->all());

        return redirect()->route('mahasiswa.index')->with('success', 'Data mahasiswa berhasil ditambahkan.');
    }

    /**
     * Display the specified resource.
     */
    public function show(Mahasiswa $mahasiswa)
    {
        return view('admin.mahasiswa.show', compact('mahasiswa'));
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit($id)
    {
        $mahasiswa = Mahasiswa::findOrFail($id);
        return view('admin.mahasiswa.edit', compact('mahasiswa'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, $mahasiswa, $id)
    {
        $mahasiswa = Mahasiswa::findOrFail($id);
        $request->validate([
            'nim' => 'required|max:20|unique:mahasiswa,nim,' . $mahasiswa->id,
            'nama' => 'required|string|max:100',
            'jenis_kelamin' => 'required|in:L,P',
            'tempat_lahir' => 'required|string|max:100',
            'tanggal_lahir' => 'required|date',
            'alamat' => 'required|string',
            'jurusan' => 'required|string|max:100',
        ]);

        $mahasiswa->update($request->all());

        return redirect()->route('mahasiswa.index')->with('success', 'Data mahasiswa berhasil diupdate.');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Mahasiswa $mahasiswa)
    {
        $mahasiswa->delete();
        return redirect()->route('mahasiswa.index')->with('success', 'Data mahasiswa berhasil dihapus.');
    }
}
