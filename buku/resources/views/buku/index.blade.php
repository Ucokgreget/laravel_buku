<x-layouts.app :title="__('Daftar Buku')">
    @php
        $viewMode = request('view', 'table');
    @endphp

    <div class="flex flex-col gap-6">
        <div class="flex items-center justify-between">
            <div>
                <h1 class="text-xl font-semibold text-zinc-900 dark:text-zinc-100">Daftar Buku</h1>
                <p class="mt-1 text-sm text-zinc-500 dark:text-zinc-400">
                    Kelola koleksi buku yang tersimpan di perpustakaan.
                </p>
            </div>

            <div class="flex items-center gap-3">
                <div class="inline-flex rounded-lg border border-zinc-300 bg-zinc-50 p-0.5 text-xs font-medium dark:border-zinc-700 dark:bg-zinc-800">
                    <a href="{{ route('buku.index', ['view' => 'table']) }}"
                       class="px-3 py-1 rounded-md {{ $viewMode === 'table' ? 'bg-zinc-900 text-white dark:bg-zinc-100 dark:text-zinc-900' : 'text-zinc-700 dark:text-zinc-200' }}">
                        Tabel
                    </a>
                    <a href="{{ route('buku.index', ['view' => 'card']) }}"
                       class="px-3 py-1 rounded-md {{ $viewMode === 'card' ? 'bg-zinc-900 text-white dark:bg-zinc-100 dark:text-zinc-900' : 'text-zinc-700 dark:text-zinc-200' }}">
                        Card
                    </a>
                </div>

                <a href="{{ route('buku.create') }}"
                   class="inline-flex items-center gap-2 rounded-lg bg-zinc-900 px-4 py-2 text-sm font-medium text-white shadow-sm hover:bg-zinc-800 dark:bg-zinc-100 dark:text-zinc-900 dark:hover:bg-white">
                    <span>Tambah Buku</span>
                </a>
            </div>
        </div>

        @if ($viewMode === 'table')
            <div class="overflow-hidden rounded-xl border border-zinc-200 bg-white shadow-sm dark:border-zinc-700 dark:bg-zinc-900">
                <table class="min-w-full divide-y divide-zinc-200 dark:divide-zinc-700">
                    <thead class="bg-zinc-50 dark:bg-zinc-800/60">
                        <tr>
                            <th class="px-4 py-3 text-left text-xs font-semibold uppercase tracking-wide text-zinc-500 dark:text-zinc-400">Opsi</th>
                            <th class="px-4 py-3 text-left text-xs font-semibold uppercase tracking-wide text-zinc-500 dark:text-zinc-400">Nama Buku</th>
                            <th class="px-4 py-3 text-left text-xs font-semibold uppercase tracking-wide text-zinc-500 dark:text-zinc-400">Penulis</th>
                            <th class="px-4 py-3 text-left text-xs font-semibold uppercase tracking-wide text-zinc-500 dark:text-zinc-400">Tahun</th>
                            <th class="px-4 py-3 text-left text-xs font-semibold uppercase tracking-wide text-zinc-500 dark:text-zinc-400">Kota Terbit</th>
                            <th class="px-4 py-3 text-left text-xs font-semibold uppercase tracking-wide text-zinc-500 dark:text-zinc-400">Kategori</th>
                            <th class="px-4 py-3 text-left text-xs font-semibold uppercase tracking-wide text-zinc-500 dark:text-zinc-400">Aksi</th>
                        </tr>
                    </thead>

                    <tbody class="divide-y divide-zinc-100 bg-white dark:divide-zinc-800 dark:bg-zinc-900">
                        @forelse ($buku as $item)
                            @php
                                $kategoriList = $item->KategoriBuku
                                    ->pluck('kategori.nama_kategori')
                                    ->filter()
                                    ->implode(', ');
                            @endphp

                            <tr class="hover:bg-zinc-50/80 dark:hover:bg-zinc-800/60">
                                <td class="px-4 py-3 text-sm">
                                    <div class="flex items-center gap-2">
                                        <a href="{{ route('buku.edit', $item) }}"
                                           class="inline-flex items-center rounded-md px-2 py-1 text-xs font-medium text-zinc-700 hover:bg-zinc-100 dark:text-zinc-200 dark:hover:bg-zinc-800">
                                            Edit
                                        </a>

                                        <form action="{{ route('buku.destroy', $item) }}" method="POST"
                                              onsubmit="return confirm('Yakin ingin menghapus buku ini?');">
                                            @csrf
                                            @method('DELETE')
                                            <button type="submit"
                                                class="inline-flex items-center rounded-md px-2 py-1 text-xs font-medium text-red-600 hover:bg-red-50 dark:text-red-400 dark:hover:bg-red-900/20">
                                                Hapus
                                            </button>
                                        </form>
                                    </div>
                                </td>

                                <td class="px-4 py-3 text-sm font-medium text-zinc-900 dark:text-zinc-100">
                                    {{ $item->nama_buku }}
                                </td>

                                <td class="px-4 py-3 text-sm text-zinc-600 dark:text-zinc-300">
                                    {{ $item->penulis->nama_penulis ?? '—' }}
                                </td>

                                <td class="px-4 py-3 text-sm text-zinc-600 dark:text-zinc-300">
                                    {{ $item->tahun_terbit }}
                                </td>

                                <td class="px-4 py-3 text-sm text-zinc-600 dark:text-zinc-300">
                                    {{ $item->kota_terbit }}
                                </td>

                                <td class="px-4 py-3 text-sm text-zinc-600 dark:text-zinc-300">
                                    {{ $kategoriList ?: '—' }}
                                </td>

                                <td class="px-4 py-3 text-sm">
                                    <a href="{{ route('buku.show', $item) }}"
                                       class="inline-flex items-center rounded-md px-3 py-1 text-xs font-medium text-zinc-700 hover:bg-zinc-100 dark:text-zinc-200 dark:hover:bg-zinc-800">
                                        Detail
                                    </a>
                                </td>
                            </tr>
                        @empty
                            <tr>
                                <td colspan="7" class="px-4 py-10 text-center text-sm text-zinc-500 dark:text-zinc-400">
                                    Belum ada data buku.
                                </td>
                            </tr>
                        @endforelse
                    </tbody>
                </table>
            </div>
        @else
            <div class="grid gap-4 sm:grid-cols-2 xl:grid-cols-3">
                @forelse ($buku as $item)
                    @php
                        $kategoriList = $item->KategoriBuku
                            ->pluck('kategori.nama_kategori')
                            ->filter()
                            ->implode(', ');
                    @endphp

                    <div class="group flex cursor-pointer flex-col overflow-hidden rounded-xl border border-zinc-200 bg-white shadow-sm transition hover:border-zinc-300 hover:shadow-md dark:border-zinc-700 dark:bg-zinc-900 dark:hover:border-zinc-500"
                         onclick="window.location='{{ route('buku.show', $item) }}'">

                        @if ($item->cover_buku)
                            <img src="{{ asset('storage/' . $item->cover_buku) }}"
                                 alt="Cover {{ $item->nama_buku }}"
                                 class="h-48 w-full object-cover">
                        @else
                            <div class="flex h-48 w-full items-center justify-center bg-zinc-100 text-xs text-zinc-500 dark:bg-zinc-800 dark:text-zinc-400">
                                Tidak ada cover
                            </div>
                        @endif

                        <div class="flex flex-1 flex-col gap-2 p-4">
                            <div>
                                <h2 class="text-sm font-semibold text-zinc-900 group-hover:text-zinc-950 dark:text-zinc-50">
                                    {{ $item->nama_buku }}
                                </h2>
                                <p class="mt-0.5 text-xs text-zinc-500 dark:text-zinc-400">
                                    {{ $item->penulis->nama_penulis ?? '—' }}
                                </p>
                            </div>

                            <div class="mt-1 space-y-1 text-xs text-zinc-600 dark:text-zinc-300">
                                <p><span class="font-medium">Tahun:</span> {{ $item->tahun_terbit }}</p>
                                <p><span class="font-medium">Kota:</span> {{ $item->kota_terbit }}</p>
                                <p><span class="font-medium">Kategori:</span> {{ $kategoriList ?: '—' }}</p>
                            </div>

                            <div class="mt-3 flex items-center justify-between text-xs">
                                <div class="flex items-center gap-2">
                                    <a href="{{ route('buku.edit', $item) }}"
                                       onclick="event.stopPropagation();"
                                       class="inline-flex items-center rounded-md px-2 py-1 font-medium text-zinc-700 hover:bg-zinc-100 dark:text-zinc-200 dark:hover:bg-zinc-800">
                                        Edit
                                    </a>

                                    <form action="{{ route('buku.destroy', $item) }}" method="POST"
                                          onclick="event.stopPropagation();"
                                          onsubmit="return confirm('Yakin ingin menghapus buku ini?');">
                                        @csrf
                                        @method('DELETE')
                                        <button type="submit"
                                            class="inline-flex items-center rounded-md px-2 py-1 font-medium text-red-600 hover:bg-red-50 dark:text-red-400 dark:hover:bg-red-900/20">
                                            Hapus
                                        </button>
                                    </form>
                                </div>

                                <span class="text-[11px] text-zinc-400 dark:text-zinc-500">Klik kartu untuk detail</span>
                            </div>
                        </div>
                    </div>
                @empty
                    <div class="col-span-full rounded-xl border border-dashed border-zinc-300 p-8 text-center text-sm text-zinc-500 dark:border-zinc-700 dark:text-zinc-400">
                        Belum ada data buku.
                    </div>
                @endforelse
            </div>
        @endif
    </div>
</x-layouts.app>
