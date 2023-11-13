<?php

namespace App\Livewire\Chart;

use App\Models\Transaksi;
use App\Models\TransaksiDetail;
use App\Models\TransaksiPembayaran;
use Livewire\Component;

class ChartPembayaran extends Component
{
    public $data = [];

    public function render()
    {
        return view('livewire.chart.chart-pembayaran');
    }

    public function mount()
    {
        $tansaksi = Transaksi::with('detail')->join('transaksi_pembayaran_21136s', 'transaksi_21136.id', 'transaksi_pembayaran_21136s.transaksi_21136_id')
        ->where('validasi_status', '0')
        ->where('user_id', auth()->user()->id)
        ->get();
        $this->data = $tansaksi;
    }


}
