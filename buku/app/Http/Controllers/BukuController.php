<?php

namespace App\Http\Controllers;

use App\Http\Requests\StoreBukuRequest;
use App\Http\Requests\UpdateBukuRequest;
use App\Models\Buku;
use App\Models\Kategori;
use App\Models\Penulis;

class BukuController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $buku = Buku::with('penulis', 'KategoriBuku.kategori')->get();
        return view('buku.index', [
            'buku' => $buku
        ]);
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        $kategori = Kategori::all();
        return view('buku.create', [
            'kategori' => $kategori,
            'penulis' => Penulis::all(),
        ]);
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(StoreBukuRequest $request)
    {
        $data = $request->validated();

        if ($request->hasFile('cover_buku')) {
            $data['cover_buku'] = $request->file('cover_buku')->store('covers', 'public');
        }

        $kategoriIds = $data['kategori_ids'] ?? [];
        unset($data['kategori_ids']);

        $buku = Buku::create($data);

        if (!empty($kategoriIds)) {
            foreach ($kategoriIds as $kategoriId) {
                $buku->KategoriBuku()->create([
                    'kategori_id' => $kategoriId,
                ]);
            }
        }

        return redirect()
            ->route('buku.index')
            ->with('success', 'Buku berhasil ditambahkan.');
    }

    /**
     * Display the specified resource.
     */
    public function show(Buku $buku)
    {
        $buku = Buku::with('penulis', 'KategoriBuku.kategori')->findOrFail($buku->id);
        return view('buku.show', [
            'buku' => $buku
        ]);
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Buku $buku)
    {
        $buku->load('penulis', 'KategoriBuku.kategori');

        $kategori = Kategori::all();
        $penulis = Penulis::all();
        $selectedKategoriIds = $buku->KategoriBuku->pluck('kategori_id')->all();

        return view('buku.edit', [
            'buku' => $buku,
            'kategori' => $kategori,
            'penulis' => $penulis,
            'selectedKategoriIds' => $selectedKategoriIds,
        ]);
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(UpdateBukuRequest $request, Buku $buku)
    {
        $data = $request->validated();

        if ($request->hasFile('cover_buku')) {
            $data['cover_buku'] = $request->file('cover_buku')->store('covers', 'public');
        } else {
            unset($data['cover_buku']);
        }

        $kategoriIds = $data['kategori_ids'] ?? [];
        unset($data['kategori_ids']);

        $buku->update($data);

        // Sync kategori via KategoriBuku model
        $buku->KategoriBuku()->delete();
        foreach ($kategoriIds as $kategoriId) {
            $buku->KategoriBuku()->create([
                'kategori_id' => $kategoriId,
            ]);
        }

        return redirect()
            ->route('buku.index')
            ->with('success', 'Buku berhasil diperbarui.');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Buku $buku)
    {
        $buku->delete();

        return redirect()
            ->route('buku.index')
            ->with('success', 'Buku berhasil dihapus.');
    }
}
