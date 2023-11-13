<?php

namespace App\Livewire\Chart;

use App\Models\KeranjangTiket;
use App\Models\Tiket;
use App\Models\Transaksi;
use App\Models\TransaksiDetail;
use App\Models\TransaksiPembayaran;
use App\Models\User;
use Carbon\Carbon;
use Illuminate\Support\Facades\DB;
use Livewire\Component;
use Illuminate\Support\Str;
use function Livewire\Volt\uses;

class ChartList extends Component
{
    public $tiketId = [];
    public $data = [];
    public $tanggal;


    public function render()
    {
        return view('livewire.chart.chart-list');
    }

    public function mount()
    {
        $query = KeranjangTiket::where('user_id', auth()->user()->id)->get();
        $data = [];
        foreach ($query as  $value) {
            $tiket = Tiket::find($value->tiket_21136_id);
            $data[] = [
                'tiket_id' => $value->tiket_21136_id,
                'user_id' => $value->user_id,
                'tiket' => $tiket->title,
                'jumlah' => $value->jumlah,
                'harga' => $tiket->harga,
                'total' => $tiket->harga * $value->jumlah
            ];
        }
        $this->data = $data;
    }


    public function tambah($key)
    {
        $tambah = DB::table('keranjang_tiket_21136')
            ->where('tiket_21136_id', $key['0'])
            ->where('user_id', $key[1])
            ->update([
                'jumlah' => $key[2] + 1
            ]);
        $this->mount();
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
        $this->mount();
    }

    public function proses()
    {
        DB::beginTransaction();
        try {
            $action = [];
            $subtotal = 0;
            foreach ($this->tiketId as $value) {
                $query = collect($this->data);
                $result = $query->where('tiket_id', $value)->first();
                $user = User::find($result['user_id']);
                // dd($user);
                $action[] = [
                    'id' => $result['tiket_id'],
                    'user_id' => $result['user_id'],
                    'tiket' => $result['tiket'],
                    'harga' => $result['harga'],
                    'jumlah' => $result['jumlah'],
                    'total' => $result['harga'] * $result['jumlah']
                ];
                $subtotal += $result['harga'] * $result['jumlah'];
            }

            $transaksi = Transaksi::create([
                'nomor_transaksi' => Str::random(6),
                'tanggal_transaksi' => Carbon::now(),
                'nama_pelanggan' => $user->name,
                'jumlah_bayar' => $subtotal,
                'user_id' => auth()->user()->id,
                'tanggal_exp' => Carbon::parse($this->tanggal)
            ]);
            foreach ($action as  $value) {
                $detail = TransaksiDetail::create([
                    'transaksi_21136' => $transaksi->id,
                    'tiket_21136_id' => $value['id'],
                    'harga_tiket' => $value['harga'],
                    'jumlah_tiket' => $value['jumlah']
                ]);
                $hapusKeranjang = KeranjangTiket::where('tiket_21136_id', $value['id'])->delete();
            }

            $pembayaran = TransaksiPembayaran::create([
                'transaksi_21136_id' => $transaksi->id,
                'kode_pembayaran' => '',
                // 'tanggal_bayar' => '',
                'jatuh_tempo' => Carbon::parse($this->tanggal),
                'jumlah_bayar' => '',
                'status_bayar' => 0,
                'validasi_status' => 0,
                'file_bukti_bayar' => '',
                'kode_transfer_pembayaran' => ''
            ]);

            DB::commit();
            return redirect()->to('/tiket/bayar');
        } catch (\Throwable $th) {
            DB::rollBack();
            dd($th->getMessage());
        }
    }
}
