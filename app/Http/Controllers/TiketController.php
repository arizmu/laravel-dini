<?php

namespace App\Http\Controllers;

use App\Models\KeranjangTiket;
use App\Models\Tiket;
use App\Models\TiketDetail;
use App\Models\Transaksi;
use App\Models\TransaksiDetail;
use App\Models\TransaksiPembayaran;
use App\Models\User;
use App\Models\Wisata;
use Carbon\Carbon;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Str;

class TiketController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $data = Tiket::with(['detail', 'detail.wisata'])->get();
        return view('tiket.index', [
            'tiket' => $data
        ]);
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        $wisata = Wisata::get();
        return view('tiket.create', [
            'wisata' => $wisata
        ]);
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $request->validate([
            // 'item' => 'required',
            // 'item.*.kode' => 'required|array',
            // 'item.*.jumlah' => 'required|array',
            "title" => 'required',
            'harga' => 'required',
            'kouta_tiket' => 'required',
            // 'desc' => 'required'
            'gambar' => 'required'
        ]);

        DB::beginTransaction();
        try {
            if ($request->hasFile('gambar')) {
                $file = $request->file('gambar');
                $name = $file->hashName();
                $ext = $file->extension();
                $fileStore = $file->storeAs('tiket', $name, 'public');
            }
            $transaksi = Tiket::create([
                'title' => $request->title,
                'desc' => $request->desc,
                'harga' => $request->harga,
                'kouta_tiket' => $request->kouta_tiket,
                'masa_berlaku' => Carbon::parse($request->masa_berlaku),
                'gambar' => $fileStore ?? ""
            ]);

            $kode = [];
            foreach ($request->item as $key => $value) {
                $kode  = $value['kode'] ?? "";
                if ($kode) {
                    $detail = TiketDetail::create([
                        'tiket_21136' => $transaksi->id,
                        'wisata_21136' => $kode,
                        'jumlah_tiket' => $value['jumlah'],
                        'tiket_name' => $key
                    ]);
                }
            }

            DB::commit();
            return redirect()->route('tiketing.index')->with('success', 'Tiket baru berhasil dibuat!');
        } catch (\Throwable $th) {
            DB::rollBack();
            return $th;
        }
    }

    /**
     * Display the specified resource.
     */
    public function show(string $id)
    {
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(string $id)
    {
        $wisata = Wisata::get();
        $query = Tiket::with('detail')->find($id);
        return view('tiket.edit', [
            'wisata' => $wisata,
            'data' => $query
        ]);
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id)
    {
        $transaksi = Tiket::find($id);
        $transaksi->update([
            'title' => $request->title,
            'desc' => $request->desc,
            'harga' => $request->harga,
            'kouta_tiket' => $request->kouta_tiket,
            'masa_berlaku' => Carbon::parse($request->masa_berlaku),
            'gambar' => $fileStore ?? ""
        ]);

        $detail = TiketDetail::where('tiket_21136', $transaksi->id)->delete();

        $kode = [];
        foreach ($request->item as $key => $value) {
            $kode  = $value['kode'] ?? "";
            if ($kode) {
                $detail = TiketDetail::create([
                    'tiket_21136' => $transaksi->id,
                    'wisata_21136' => $kode,
                    'jumlah_tiket' => $value['jumlah'],
                    'tiket_name' => $key
                ]);
            }
        }

        return to_route('tiketing.index')->with('status', 'update success!');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        DB::beginTransaction();
        try {
            $tiket = Tiket::find($id);
            $detail = TiketDetail::where('tiket_21136', $tiket->id)->delete();
            $tiket->delete();
            DB::commit();
            return redirect()->back()->with('success', 'Tiket berhasil dihapus!');
        } catch (\Throwable $th) {
            DB::rollBack();
            return redirect()->back()->with('error', $th->getMessage());
        }
    }


    public function detailTiket($key)
    {

        $data = Tiket::with('detail')->find($key);
        $tiket = [];
        foreach ($data->detail as $value) {
            $wisata = Wisata::find($value->wisata_21136);
            $tiket[] = [
                'wisata' => $wisata->wisata,
                'jumlah_tiket' => $value->jumlah_tiket
            ];
        }
        return view('tiket-detail', [
            'data' => $data,
            'tiket' => $tiket
        ]);
    }

    public function addChart($key)
    {
        $query = KeranjangTiket::where('tiket_21136_id', $key)->where('user_id', auth()->user()->id)->first();
        if ($query) {
            DB::table('keranjang_tiket_21136')
                ->where('tiket_21136_id', $key)
                ->where('user_id', auth()->user()->id)
                ->update([
                    'jumlah' => $query->jumlah + 1
                ]);
        } else {
            KeranjangTiket::insert([
                'tiket_21136_id' => $key,
                'jumlah' => 1,
                'user_id' => auth()->user()->id
            ]);
        }
        return response()->json(['message' => 'success']);
    }

    public function bayar(Request $request)
    {
        $transaksi = Transaksi::where('nomor_transaksi', $request->kode)->first();
        $pembayaran = TransaksiPembayaran::where('transaksi_21136_id', $transaksi->id)->first();
        // return $pembayaran;

        if ($pembayaran->status_bayar == 0) {
            if ($request->hasFile('gambar')) {
                $file =  $request->file('gambar');
                $name = time() . '_' . Str::random('10');
                $fileName = $name . "." . $file->getClientOriginalExtension();
                $filePath = $request->file('gambar')->storeAs('uploads', $fileName, 'public');
            }

            DB::table('transaksi_pembayaran_21136s')
                ->where('transaksi_21136_id', $transaksi->id)->update([
                    'jumlah_bayar' => $request->bayar,
                    'tanggal_bayar' => Carbon::now(),
                    'status_bayar' => 1,
                    'file_bukti_bayar' => $filePath,
                    'kode_transfer_pembayaran' => $request->transferId
                ]);
        }
        return redirect('/tiket/bayar');
    }

    public function validasi()
    {
        $data = Transaksi::with('detail')
            ->join('transaksi_pembayaran_21136s', 'transaksi_21136.id', 'transaksi_pembayaran_21136s.transaksi_21136_id')
            ->where('status_bayar', '1')
            ->where('validasi_status', '0')
            ->get();

        return view('validasi', ['data' => $data]);
    }

    public function validasiProses($key)
    {
        $pembayaran = DB::table('transaksi_pembayaran_21136s')->where('transaksi_21136_id', $key)->update([
            'kode_pembayaran' => Str::random('10'),
            'status_bayar' => '2',
            'validasi_status' => '1'
        ]);
        return redirect()->back();
    }

    public function cetak($key)
    {
        $query = Transaksi::find($key);
        return $query;
    }

    public function tiketTransaksiDetail($key)
    {
        $detail = TransaksiDetail::where('transaksi_21136', $key)->get();
        $tiket = [];
        foreach ($detail as $value) {
            $tiket = Tiket::find($value->tiket_21136_id);
            $tiket[] = ['key' => $tiket];
        }
        // return $tiket;
        return response()->json([
            'message' => 'success',
            'data' => $detail,
            'tiket' => $tiket
        ]);
    }

    public function lihatTiket($key)
    {
        $tiket = Transaksi::with('detail')->find($key);
        $detail = [];
        foreach ($tiket->detail as $key => $value) {
            $tiketList = Tiket::find($value->tiket_21136_id);
            $detail[] = [
                'nama' =>  $tiketList->title,
                'wisata' => $this->getTiket($tiketList->id, $value->jumlah_tiket)
            ];
        }
        $user = User::find($tiket->user_id);
        return view('lihat-cetak', [
            'pelanggan' => $user,
            'tiket' => $tiket,
            'detail' => $detail
        ]);
    }

    public function getTiket($id, $jumlah)
    {
        $query = TiketDetail::where('tiket_21136', $id)
            ->join('wisata_21136', 'tiket_detail_21136.wisata_21136', 'wisata_21136.id')
            ->get();
        $data = [];
        foreach ($query as $key => $value) {
            $data[] = [
                'nama_wisata' => $value->tiket_name,
                'jumlah_tiket' => $value->jumlah_tiket * $jumlah . " Tiket"
            ];
        }
        return  $data;
    }
}
