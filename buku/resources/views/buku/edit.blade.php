<x-layouts.app :title="__('Edit Buku')">
    <div class="max-w-3xl space-y-6">
        <div class="flex items-center justify-between">
            <div>
                <h1 class="text-xl font-semibold text-zinc-900 dark:text-zinc-100">Edit Buku</h1>
                <p class="mt-1 text-sm text-zinc-500 dark:text-zinc-400">Perbarui informasi buku yang sudah tersimpan.
                </p>
            </div>

            <a href="{{ route('buku.index') }}"
                class="inline-flex items-center gap-2 rounded-lg border border-zinc-300 px-3 py-2 text-sm font-medium text-zinc-700 hover:bg-zinc-50 dark:border-zinc-700 dark:text-zinc-200 dark:hover:bg-zinc-800">
                Kembali
            </a>
        </div>

        <div class="rounded-xl border border-zinc-200 bg-white p-6 shadow-sm dark:border-zinc-700 dark:bg-zinc-900">
            <form action="{{ route('buku.update', $buku) }}" method="POST" enctype="multipart/form-data"
                class="space-y-5">
                @csrf
                @method('PUT')

                <div class="grid gap-5 md:grid-cols-2">
                    <div class="space-y-1.5 md:col-span-2">
                        <label class="text-sm font-medium text-zinc-800 dark:text-zinc-100">Nama Buku</label>
                        <input type="text" name="nama_buku" value="{{ old('nama_buku', $buku->nama_buku) }}"
                            class="w-full rounded-lg border border-zinc-300 bg-transparent px-3 py-2 text-sm text-zinc-900 shadow-sm outline-none focus:border-zinc-900 focus:ring-0 dark:border-zinc-700 dark:text-zinc-100 dark:focus:border-zinc-300">
                        @error('nama_buku')
                            <p class="text-xs text-red-500">{{ $message }}</p>
                        @enderror
                    </div>

                    <div class="space-y-1.5">
                        <label class="text-sm font-medium text-zinc-800 dark:text-zinc-100">Penulis</label>
                        <select name="penulis_id"
                            class="w-full rounded-lg border border-zinc-300 bg-transparent px-3 py-2 text-sm text-zinc-900 shadow-sm outline-none focus:border-zinc-900 focus:ring-0 dark:border-zinc-700 dark:bg-zinc-900 dark:text-zinc-100 dark:focus:border-zinc-300">
                            <option value="">Pilih Penulis</option>
                            @foreach ($penulis as $item)
                                <option value="{{ $item->id }}" @selected(old('penulis_id', $buku->penulis_id) == $item->id)>
                                    {{ $item->nama_penulis }}
                                </option>
                            @endforeach
                        </select>
                        @error('penulis_id')
                            <p class="text-xs text-red-500">{{ $message }}</p>
                        @enderror
                    </div>

                    <div class="space-y-1.5 md:col-span-2">
                        <label class="text-sm font-medium text-zinc-800 dark:text-zinc-100">Kategori Buku</label>
                        <div class="grid gap-2 md:grid-cols-2">
                            @foreach ($kategori as $item)
                                @php
                                    $oldKategori = is_array(old('kategori_ids')) ? old('kategori_ids') : $selectedKategoriIds;
                                @endphp
                                <label class="flex items-center gap-2 text-sm text-zinc-800 dark:text-zinc-100">
                                    <input type="checkbox" name="kategori_ids[]" value="{{ $item->id }}"
                                        class="h-4 w-4 rounded border-zinc-300 text-zinc-900 focus:ring-zinc-900 dark:border-zinc-600 dark:bg-zinc-900 dark:text-zinc-100"
                                        @checked(in_array($item->id, $oldKategori))>
                                    <span>{{ $item->nama_kategori }}</span>
                                </label>
                            @endforeach
                        </div>
                        @error('kategori_ids')
                            <p class="text-xs text-red-500">{{ $message }}</p>
                        @enderror
                    </div>

                    <div class="space-y-1.5">
                        <label class="text-sm font-medium text-zinc-800 dark:text-zinc-100">Tahun Terbit</label>
                        <input type="number" name="tahun_terbit" value="{{ old('tahun_terbit', $buku->tahun_terbit) }}"
                            class="w-full rounded-lg border border-zinc-300 bg-transparent px-3 py-2 text-sm text-zinc-900 shadow-sm outline-none focus:border-zinc-900 focus:ring-0 dark:border-zinc-700 dark:text-zinc-100 dark:focus:border-zinc-300">
                        @error('tahun_terbit')
                            <p class="text-xs text-red-500">{{ $message }}</p>
                        @enderror
                    </div>

                    <div class="space-y-1.5">
                        <label class="text-sm font-medium text-zinc-800 dark:text-zinc-100">Kota Terbit</label>
                        <input type="text" name="kota_terbit" value="{{ old('kota_terbit', $buku->kota_terbit) }}"
                            class="w-full rounded-lg border border-zinc-300 bg-transparent px-3 py-2 text-sm text-zinc-900 shadow-sm outline-none focus:border-zinc-900 focus:ring-0 dark:border-zinc-700 dark:text-zinc-100 dark:focus:border-zinc-300">
                        @error('kota_terbit')
                            <p class="text-xs text-red-500">{{ $message }}</p>
                        @enderror
                    </div>
                </div>

                <div class="space-y-1.5">
                    <label class="text-sm font-medium text-zinc-800 dark:text-zinc-100">Sinopsis</label>
                    <textarea name="sinopsis" rows="5"
                        class="w-full rounded-lg border border-zinc-300 bg-transparent px-3 py-2 text-sm text-zinc-900 shadow-sm outline-none focus:border-zinc-900 focus:ring-0 dark:border-zinc-700 dark:text-zinc-100 dark:focus:border-zinc-300">{{ old('sinopsis', $buku->sinopsis) }}</textarea>
                    @error('sinopsis')
                        <p class="text-xs text-red-500">{{ $message }}</p>
                    @enderror
                </div>

                <div class="space-y-1.5">
                    <label class="text-sm font-medium text-zinc-800 dark:text-zinc-100">Cover Buku (Opsional)</label>
                    @if ($buku->cover_buku)
                        <div class="mb-2 flex items-center gap-3">
                            <img src="{{ asset('storage/' . $buku->cover_buku) }}" alt="Cover {{ $buku->nama_buku }}"
                                class="h-16 w-12 rounded object-cover">
                            <span class="text-xs text-zinc-500 dark:text-zinc-400">Biarkan kosong jika tidak ingin mengganti
                                cover.</span>
                        </div>
                    @endif
                    <input type="file" name="cover_buku"
                        class="block w-full text-sm text-zinc-900 file:me-3 file:rounded-md file:border-0 file:bg-zinc-900 file:px-3 file:py-1.5 file:text-sm file:font-medium file:text-white hover:file:bg-zinc-800 dark:text-zinc-100 dark:file:bg-zinc-100 dark:file:text-zinc-900 dark:hover:file:bg-white">
                    @error('cover_buku')
                        <p class="text-xs text-red-500">{{ $message }}</p>
                    @enderror
                </div>

                <div class="flex items-center justify-end gap-3 pt-3">
                    <button type="submit"
                        class="inline-flex items-center gap-2 rounded-lg bg-zinc-900 px-4 py-2 text-sm font-medium text-white shadow-sm hover:bg-zinc-800 dark:bg-zinc-100 dark:text-zinc-900 dark:hover:bg-white">
                        Simpan Perubahan
                    </button>
                </div>
            </form>
        </div>
    </div>
</x-layouts.app>