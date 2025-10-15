<?php

namespace App\Livewire;

use App\Models\Queue;
use Livewire\Component;
use Carbon\Carbon;

class QueueManager extends Component
{
    public $antrianList;
    public $antrianDilayani;

    // Untuk mendengarkan event jika ada antrian baru dari komponen lain
    protected $listeners = ['queueUpdated' => 'loadAntrian'];

    public function mount()
    {
        $this->loadAntrian();
    }

    public function loadAntrian()
    {
        $today = Carbon::today();
        $this->antrianDilayani = Queue::with('customer')
            ->where('queue_date', $today)
            ->where('status', 'serving')
            ->first();

        $this->antrianList = Queue::with('customer')
            ->where('queue_date', $today)
            ->where('status', 'waiting')
            ->orderBy('queue_number', 'asc')
            ->get();
    }

    public function panggilBerikutnya()
    {
        $today = Carbon::today();

        // Selesaikan yang sedang dilayani (jika ada)
        if ($this->antrianDilayani) {
            $this->antrianDilayani->update(['status' => 'finished']);
        }

        // Ambil antrian berikutnya dari daftar 'waiting'
        $nextAntrian = Queue::where('queue_date', $today)
            ->where('status', 'waiting')
            ->orderBy('queue_number', 'asc')
            ->first();

        if ($nextAntrian) {
            $nextAntrian->update(['status' => 'serving']);
        }

        // Muat ulang data setelah aksi
        $this->loadAntrian();
    }

    // Aksi untuk menandai selesai tanpa harus memanggil berikutnya
    public function tandaiSelesai($queueId)
    {
        $queue = Queue::find($queueId);
        if ($queue) {
            $queue->update(['status' => 'finished']);
            $this->loadAntrian();
        }
    }

    // Aksi untuk membatalkan antrian (misal: customer tidak datang)
    public function batalkanAntrian($queueId)
    {
        $queue = Queue::find($queueId);
        if ($queue) {
            $queue->update(['status' => 'cancelled']);
            $this->loadAntrian();
        }
    }

    public function render()
    {
        return view('livewire.queue-manager');
    }
}
