<div wire:poll.10s> {{-- Tambahkan wire:poll di div utama untuk refresh otomatis --}}

    {{-- ======================================================== --}}
    {{-- ============ BAGIAN BARU UNTUK INFO ANTRIAN ============ --}}
    {{-- ======================================================== --}}
    <div style="display: flex; justify-content: space-around; text-align: center; margin-bottom: 30px; padding: 20px; border: 1px solid #ddd; border-radius: 10px;">
        <div>
            <h2 style="font-size: 1em; color: #555;">TOTAL ANTRIAN</h2>
            <p style="font-size: 2.5em; font-weight: bold;">{{ $totalAntrian }}</p>
        </div>
        <div>
            <h2 style="font-size: 1em; color: #555;">SEDANG DILAYANI</h2>
            <p style="font-size: 2.5em; font-weight: bold; color: green;">{{ $nomorDilayani }}</p>
        </div>
    </div>
    {{-- ======================================================== --}}
    {{-- ======================= AKHIR BAGIAN BARU ======================= --}}
    {{-- ======================================================== --}}


    {{-- Tampilkan ini jika user SUDAH mengambil nomor --}}
    @if ($nomorAntrianAnda)
        <div style="text-align: center; background-color: #e0ffe0; padding: 20px; border-radius: 10px;">
            <h2>Nomor Antrian Anda:</h2>
            <h1 style="font-size: 4em; margin: 0;">{{ $nomorAntrianAnda }}</h1>
            <p>Terima kasih telah melakukan booking. Silakan tunggu giliran Anda.</p>
        </div>

        {{-- Tampilkan ini jika user BELUM mengambil nomor --}}
    @else
        <h1>INI ADALAH HALAMAN BOOKING</h1>

        {{-- Bungkus semua field dengan tag <form> --}}
        <form wire:submit.prevent="submit">
            <flux:field>
                <flux:label badge="Required">Nama</flux:label>

                {{-- Tambahkan wire:model="name" untuk menghubungkan ke properti $name --}}
                <flux:input type="name" required wire:model="name" />

                {{-- Livewire akan otomatis menampilkan error di sini jika nama 'name' cocok --}}
                @error('name') <span style="color: red; font-size: 0.9em;">{{ $message }}</span> @enderror
            </flux:field>

            <flux:field>
                <flux:label badge="Required">Whatsapp</flux:label>

                {{-- Tambahkan wire:model="phone" untuk menghubungkan ke properti $phone --}}
                <flux:input type="phone" placeholder="081214284283" wire:model="phone" />

                @error('phone') <span style="color: red; font-size: 0.9em;">{{ $message }}</span> @enderror
            </flux:field>

            {{-- Tambahkan tombol untuk mengirim form --}}
            <button type="submit" style="margin-top: 20px; padding: 10px 15px;">
                Ambil Nomor Antrian
            </button>

            {{-- Untuk menampilkan pesan error umum --}}
            @if (session()->has('error'))
                <div style="color: red; margin-top: 10px;">{{ session('error') }}</div>
            @endif
        </form>
    @endif
</div>
