<?php

namespace App\Livewire\Chart;

use App\Models\KeranjangTiket;
use App\Models\Tiket;
use Illuminate\Support\Facades\DB;
use Livewire\Component;

class ChartList extends Component
{
    public $tiketId = [];
    public $subtotal = 0 ;


    public function render()
    {
        $query = KeranjangTiket::get();
        $data = [];
        foreach ($query as  $value) {
            $tiket = Tiket::find($value->tiket_21136_id);
            $data[] = [
                'key' => [
                    'tiket_id' => $value->tiket_21136_id,
                    'user_id' => $value->user_id
                ],
                'tiket' => $tiket->title,
                'jumlah' => $value->jumlah,
                'harga' => $tiket->harga,
                'total' => $tiket->harga * $value->jumlah
            ];
        }
        return view('livewire.chart.chart-list', [
            'tiket' => $data
        ]);
    }


    public function tambah($key)
    {
        // dd($key);
        $tambah = DB::table('keranjang_tiket_21136')
            ->where('tiket_21136_id', $key['0'])
            ->where('user_id', $key[1])
            ->update([
                'jumlah' => $key[2] + 1
            ]);
    }

    public function kurang($key)
    {
        if ($key[2] <= 1) {
            DB::table('keranjang_tiket_21136')
                ->where('tiket_21136_id', $key['0'])
                ->where('user_id', $key[1])->delete();
        }

        $tambah = DB::table('keranjang_tiket_21136')
            ->where('tiket_21136_id', $key['0'])
            ->where('user_id', $key[1])
            ->update([
                'jumlah' => $key[2] - 1
            ]);
    }

    public function counting() {
        $this->subtotal = array_sum($this->tiketId);
    }

    public function proses() {

    }
}
