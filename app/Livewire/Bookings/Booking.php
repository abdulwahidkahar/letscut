<?php

namespace App\Livewire\Bookings;

use App\Models\Customer;
use App\Models\Queue;
use Livewire\Component;
use Illuminate\Support\Facades\DB;
use Carbon\Carbon;

class Booking extends Component
{
    public $name;
    public $phone;
    public $nomorAntrianAnda;

    public $totalAntrian;
    public $nomorDilayani;

    protected $rules = [
        'name'  => 'required|min:3',
        'phone' => 'required|numeric|min:10',
    ];

    public function mount()
    {
        // Pengecekan awal saat halaman pertama kali dimuat
        $this->cekStatusAntrianSession();
    }

    public function submit()
    {
        $this->validate();
        try {
            DB::transaction(function () {
                $customer = Customer::firstOrCreate(
                    ['phone_number' => $this->phone],
                    ['name' => $this->name]
                );

                $today = Carbon::today();
                $lastQueueNumber = Queue::where('queue_date', $today)->max('queue_number');
                $newQueueNumber = $lastQueueNumber ? $lastQueueNumber + 1 : 1;

                $queue = Queue::create([
                    'customer_id'  => $customer->id,
                    'queue_date'   => $today,
                    'queue_number' => $newQueueNumber,
                ]);

                $this->nomorAntrianAnda = $queue->queue_number;
                session(['nomor_antrian_terakhir' => $this->nomorAntrianAnda]);
            });
            $this->reset('name', 'phone');
        } catch (\Exception $e) {
            session()->flash('error', 'Gagal mengambil nomor antrian. Silakan coba lagi.');
        }
    }

    private function cekStatusAntrianSession()
    {
        // Cek jika user punya nomor di session
        if (session()->has('nomor_antrian_terakhir')) {
            $nomor = session('nomor_antrian_terakhir');

            // Cek status nomor tersebut di database untuk hari ini
            $antrian = Queue::where('queue_date', Carbon::today())
                ->where('queue_number', $nomor)
                ->first();

            // Jika antrian ditemukan dan statusnya sudah selesai/dibatalkan
            if ($antrian && in_array($antrian->status, ['finished', 'cancelled'])) {
                // Hapus session dan reset tampilan
                session()->forget('nomor_antrian_terakhir');
                $this->nomorAntrianAnda = null;
            } else {
                // Jika masih menunggu atau dilayani, tetap tampilkan nomornya
                $this->nomorAntrianAnda = $nomor;
            }
        }
    }

    public function render()
    {
        // ===============================================================
        // == LOGIKA BARU DITAMBAHKAN DI SINI AGAR DICEK SETIAP REFRESH ==
        // ===============================================================
        $this->cekStatusAntrianSession();

        $today = Carbon::today();
        $this->totalAntrian = Queue::where('queue_date', $today)->count();
        $dilayani = Queue::where('queue_date', $today)->where('status', 'serving')->first();
        $this->nomorDilayani = $dilayani ? $dilayani->queue_number : '-';

        return view('livewire.bookings.booking')
            ->layout('components.layouts.guest');
    }
}
