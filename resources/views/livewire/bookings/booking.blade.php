<div wire:poll.10s class="min-h-screen bg-black text-neutral-800 font-[Anton] py-10 px-4 md:px-8 tracking-wide">

    {{-- ======================================================== --}}
    {{-- ============ INFO ANTRIAN (TOTAL & SEDANG DILAYANI) ==== --}}
    {{-- ======================================================== --}}
    <div class="max-w-3xl mx-auto mb-10 bg-white border border-gray-200 shadow-md p-6 flex flex-col sm:flex-row items-center justify-around text-center">
        <div>
            <h2 class="text-sm text-gray-500 mb-2">TOTAL ANTRIAN</h2>
            <p class="text-5xl text-black">{{ $totalAntrian }}</p>
        </div>
        <div>
            <h2 class="text-sm text-gray-500 mb-2">SEDANG DILAYANI</h2>
            <p class="text-5xl text-green-600">{{ $nomorDilayani }}</p>
        </div>
    </div>

    {{-- ======================================================== --}}
    {{-- ================= NOMOR ANTRIAN USER ================== --}}
    {{-- ======================================================== --}}
    @if ($nomorAntrianAnda)
        <div class="max-w-2xl mx-auto bg-yellow-500 border border-yellow-300 text-center p-6 shadow-sm">
            <h2 class="text-xl mb-4 text-black">Nomor Antrian Anda</h2>
            <h1 class="text-7xl text-black">{{ $nomorAntrianAnda }}</h1>
            <p class="mt-4 text-black text-sm">Terima kasih telah melakukan booking. <br>Silakan tunggu giliran Anda.</p>
        </div>

        {{-- ======================================================== --}}
        {{-- ============ FORM AMBIL NOMOR ANTRIAN ================== --}}
        {{-- ======================================================== --}}
    @else
        <div class="max-w-xl mx-auto bg-white border border-gray-200  shadow-md p-8 text-center">
            <h1 class="text-3xl text-black mb-8">Ambil Nomor Antrian</h1>

            <form wire:submit.prevent="submit" class="space-y-6 text-left">
                <flux:field>
                    <flux:label>Nama</flux:label>

                    {{-- Tambahkan wire:model="name" untuk menghubungkan ke properti $name --}}
                    <flux:input type="name" required wire:model="name" />

                    {{-- Livewire akan otomatis menampilkan error di sini jika nama 'name' cocok --}}
                    @error('name') <span style="color: red; font-size: 0.9em;">{{ $message }}</span> @enderror
                </flux:field>

                <flux:field>
                    <flux:label>Whatsapp</flux:label>

                    {{-- Tambahkan wire:model="phone" untuk menghubungkan ke properti $phone --}}
                    <flux:input type="phone" placeholder="081214284283" wire:model="phone" />

                    @error('phone') <span style="color: red; font-size: 0.9em;">{{ $message }}</span> @enderror
                </flux:field>

                {{-- Tombol Submit --}}
                <div class="pt-4 text-center">
                    <button type="submit"
                            class="bg-yellow-500 hover:bg-yellow-600 text-black px-8 py-3 rounded-lg text-lg tracking-wide transition-all shadow-md">
                        Ambil Nomor Antrian
                    </button>
                </div>

                {{-- Pesan Error --}}
                @if (session()->has('error'))
                    <div class="text-red-500 text-sm mt-4 text-center">{{ session('error') }}</div>
                @endif
            </form>
        </div>
    @endif

    <footer class="bg-black text-neutral-400 text-center py-8">
        <p class="text-sm">© {{ date('Y') }} LETSCUT Barber. 2025 <strong>Takalar</strong>.</p>
    </footer>
</div>

