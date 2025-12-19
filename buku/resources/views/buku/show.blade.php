<x-layouts.app :title="__('Detail Buku')">
    <div class="max-w-4xl space-y-6">
        <div class="flex items-center justify-between">
            <div>
                <h1 class="text-xl font-semibold text-zinc-900 dark:text-zinc-100">Detail Buku</h1>
                <p class="mt-1 text-sm text-zinc-500 dark:text-zinc-400">Lihat informasi lengkap dari buku yang dipilih.
                </p>
            </div>

            <a href="{{ route('buku.index') }}"
                class="inline-flex items-center gap-2 rounded-lg border border-zinc-300 px-3 py-2 text-sm font-medium text-zinc-700 hover:bg-zinc-50 dark:border-zinc-700 dark:text-zinc-200 dark:hover:bg-zinc-800">
                Kembali ke daftar
            </a>
        </div>

        <div class="grid gap-6 md:grid-cols-[minmax(0,2fr)_minmax(0,1fr)]">
            <div
                class="space-y-4 rounded-xl border border-zinc-200 bg-white p-6 shadow-sm dark:border-zinc-700 dark:bg-zinc-900">
                <div>
                    <h2 class="text-lg font-semibold text-zinc-900 dark:text-zinc-100">{{ $buku->nama_buku }}</h2>
                    <p class="mt-1 text-sm text-zinc-500 dark:text-zinc-400">
                        {{ $buku->penulis->nama_penulis ?? 'Penulis tidak diketahui' }}
                    </p>
                </div>

                <dl class="grid gap-4 text-sm md:grid-cols-2">
                    <div>
                        <dt class="text-zinc-500 dark:text-zinc-400">Tahun Terbit</dt>
                        <dd class="font-medium text-zinc-900 dark:text-zinc-100">{{ $buku->tahun_terbit }}</dd>
                    </div>
                    <div>
                        <dt class="text-zinc-500 dark:text-zinc-400">Kota Terbit</dt>
                        <dd class="font-medium text-zinc-900 dark:text-zinc-100">{{ $buku->kota_terbit }}</dd>
                    </div>
                </dl>

                <div class="space-y-1.5">
                    <h3 class="text-sm font-semibold text-zinc-900 dark:text-zinc-100">Sinopsis</h3>
                    <p class="text-sm leading-relaxed text-zinc-700 dark:text-zinc-300 whitespace-pre-line">
                        {{ $buku->sinopsis }}
                    </p>
                </div>
            </div>

            <div class="space-y-4">
                <div
                    class="rounded-xl border border-zinc-200 bg-white p-4 text-sm shadow-sm dark:border-zinc-700 dark:bg-zinc-900">
                    <h3 class="mb-2 text-sm font-semibold text-zinc-900 dark:text-zinc-100">Cover Buku</h3>
                    @if ($buku->cover_buku)
                        <img src="{{ asset('storage/' . $buku->cover_buku) }}" alt="Cover {{ $buku->nama_buku }}"
                            class="aspect-[3/4] w-full rounded-lg object-cover">
                    @else
                        <div
                            class="flex aspect-[3/4] w-full items-center justify-center rounded-lg border border-dashed border-zinc-300 text-xs text-zinc-500 dark:border-zinc-700 dark:text-zinc-400">
                            Tidak ada cover
                        </div>
                    @endif
                </div>
            </div>
        </div>
    </div>
</x-layouts.app>