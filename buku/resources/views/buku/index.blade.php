<x-layouts.app :title="__('Daftar Buku')">
    <div class="flex flex-col gap-6">
        <div class="flex items-center justify-between">
            <div>
                <h1 class="text-xl font-semibold text-zinc-900 dark:text-zinc-100">Daftar Buku</h1>
                <p class="mt-1 text-sm text-zinc-500 dark:text-zinc-400">Kelola koleksi buku yang tersimpan di
                    perpustakaan.</p>
            </div>

            <a href="{{ route('buku.create') }}"
                class="inline-flex items-center gap-2 rounded-lg bg-zinc-900 px-4 py-2 text-sm font-medium text-white shadow-sm hover:bg-zinc-800 dark:bg-zinc-100 dark:text-zinc-900 dark:hover:bg-white">
                <span>Tambah Buku</span>
            </a>
        </div>

        <div
            class="overflow-hidden rounded-xl border border-zinc-200 bg-white shadow-sm dark:border-zinc-700 dark:bg-zinc-900">
            <table class="min-w-full divide-y divide-zinc-200 dark:divide-zinc-700">
                <thead class="bg-zinc-50 dark:bg-zinc-800/60">
                    <tr>
                        <th
                            class="px-4 py-3 text-left text-xs font-semibold uppercase tracking-wide text-zinc-500 dark:text-zinc-400">
                            Nama Buku</th>
                        <th
                            class="px-4 py-3 text-left text-xs font-semibold uppercase tracking-wide text-zinc-500 dark:text-zinc-400">
                            Penulis</th>
                        <th
                            class="px-4 py-3 text-left text-xs font-semibold uppercase tracking-wide text-zinc-500 dark:text-zinc-400">
                            Tahun</th>
                        <th
                            class="px-4 py-3 text-left text-xs font-semibold uppercase tracking-wide text-zinc-500 dark:text-zinc-400">
                            Kota Terbit</th>
                        <th
                            class="px-4 py-3 text-left text-xs font-semibold uppercase tracking-wide text-zinc-500 dark:text-zinc-400">
                            Aksi</th>
                    </tr>
                </thead>
                <tbody class="divide-y divide-zinc-100 bg-white dark:divide-zinc-800 dark:bg-zinc-900">
                    @forelse ($buku as $item)
                        <tr class="hover:bg-zinc-50/80 dark:hover:bg-zinc-800/60">
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
                            <td class="px-4 py-3 text-sm">
                                <div class="flex items-center gap-2">
                                    <a href="{{ route('buku.show', $item) }}"
                                        class="inline-flex items-center rounded-md px-3 py-1 text-xs font-medium text-zinc-700 hover:bg-zinc-100 dark:text-zinc-200 dark:hover:bg-zinc-800">
                                        Detail
                                    </a>
                                </div>
                            </td>
                        </tr>
                    @empty
                        <tr>
                            <td colspan="5" class="px-4 py-10 text-center text-sm text-zinc-500 dark:text-zinc-400">
                                Belum ada data buku.
                            </td>
                        </tr>
                    @endforelse
                </tbody>
            </table>
        </div>
    </div>
</x-layouts.app>