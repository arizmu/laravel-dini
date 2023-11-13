<?php

namespace App\Livewire\Chart;

use Illuminate\Support\Facades\DB;
use Livewire\Component;

class ChartTiketAktif extends Component
{
    public $data;
    public function render()
    {

        return view('livewire.chart.chart-tiket-aktif');
    }

    public function mount() {
        $data = DB::table('transaksi_21136')
        ->join('transaksi_pembayaran_21136s', 'transaksi_21136.id', 'transaksi_pembayaran_21136s.transaksi_21136_id')
        ->where('transaksi_pembayaran_21136s.validasi_status', 1)
        ->where('user_id', auth()->user()->id)
        ->get();

        $this->data = $data;
    }
}
