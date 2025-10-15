<div wire:poll.10s="loadAntrian" class="flex flex-col h-full">
    {{-- Panel Atas: Kontrol Utama & Info --}}
    <div class="flex-none p-4 border-b border-neutral-200 dark:border-neutral-700">
        <div class="flex items-center justify-between">
            <div>
                <h2 class="text-lg font-semibold">Manajemen Antrian Hari Ini</h2>
                <p class="text-sm text-gray-500">Data akan ter-refresh otomatis.</p>
            </div>
            <button wire:click="panggilBerikutnya" class="px-4 py-2 font-bold text-white bg-blue-600 rounded-lg hover:bg-blue-700">
                Panggil Berikutnya &raquo;
            </button>
        </div>
        <div class="mt-4 p-4 rounded-lg bg-gray-100 dark:bg-neutral-800">
            <h3 class="font-medium">Sedang Dilayani:</h3>
            @if($antrianDilayani)
                <p class="text-2xl font-bold text-green-600">
                    {{ $antrianDilayani->queue_number }} - {{ $antrianDilayani->customer->name }}
                </p>
            @else
                <p class="text-xl font-semibold text-gray-500">Tidak ada</p>
            @endif
        </div>
    </div>

    {{-- Panel Bawah: Daftar Tunggu --}}
    <div class="flex-1 overflow-y-auto p-4">
        <h3 class="font-medium mb-2">Daftar Tunggu</h3>
        <table class="w-full text-left">
            <thead>
            <tr class="border-b border-neutral-200 dark:border-neutral-700">
                <th class="p-2">No.</th>
                <th class="p-2">Nama Customer</th>
                <th class="p-2">Waktu Ambil</th>
                <th class="p-2">Aksi</th>
            </tr>
            </thead>
            <tbody>
            @forelse($antrianList as $antrian)
                <tr class="border-b border-neutral-200 dark:border-neutral-700">
                    <td class="p-2 font-bold">{{ $antrian->queue_number }}</td>
                    <td class="p-2">{{ $antrian->customer->name }}</td>
                    <td class="p-2 text-sm text-gray-500">{{ $antrian->created_at->format('H:i') }}</td>
                    <td class="p-2">
                        <button wire:click="tandaiSelesai({{ $antrian->id }})" class="text-xs text-green-600 hover:underline">Selesai</button>
                        <button wire:click="batalkanAntrian({{ $antrian->id }})" class="ml-2 text-xs text-red-600 hover:underline">Batal</button>
                    </td>
                </tr>
            @empty
                <tr>
                    <td colspan="4" class="p-4 text-center text-gray-500">Tidak ada antrian.</td>
                </tr>
            @endforelse
            </tbody>
        </table>
    </div>
</div>
