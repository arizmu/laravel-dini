<?php

namespace App\Http\Controllers;

use App\Models\Pelanggan;
use App\Models\Pembayaran;
use App\Models\Pemesanan;
use App\Models\Wisata;
use Carbon\Carbon;
use Illuminate\Http\Request;

class TransaksiController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $data = Pemesanan::with('wisata', 'pelanggan')->get();
        // return $data;
        return view('transaksi.index', [
            'data' => $data
        ]);
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        $data = Pelanggan::get();
        $wisata = Wisata::get();
        return view('transaksi.create', [
            'data' => $data,
            'wisata' => $wisata
        ]);
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        try {
            $store = Pemesanan::create([
                'wisata_id' => $request->wisata,
                'pelanggan_id' => $request->pelanggan,
                'jumlah_tiket' => $request->jumlah,
                'tanggal_pemesanana' => Carbon::now(),
                'harga_tiket' => $request->harga,
                'total_harga' => $request->total
            ]);
            return to_route('transaksi.index');
        } catch (\Throwable $th) {
            return $th->getMessage();
        }
    }

    /**
     * Display the specified resource.
     */
    public function show(string $id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(string $id)
    {
        $data = Pelanggan::get();
        $wisata = Wisata::get();
        $transaksi = Pemesanan::find($id);
        return view('transaksi.edit', [
            'data' => $data,
            'wisata' => $wisata,
            'transaksi' => $transaksi
        ]);
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id)
    {
        $data = Pemesanan::find($id);
        $data->update([
            'wisata_id' => $request->wisata,
            'pelanggan_id' => $request->pelanggan,
            'jumlah_tiket' => $request->jumlah,
            'tanggal_pemesanana' => Carbon::now(),
            'harga_tiket' => $request->harga,
            'total_harga' => $request->total
        ]);

        return to_route('transaksi.index');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        //
    }

    public function getHarga($id)
    {
        return response()->json([
            'status' => 'ok',
            'response' => 5000
        ]);
    }

    public function pembayaran() {
        $data = Pemesanan::where('status', 0)->get();
        return view('transaksi.pembayaran-data', ['data' => $data]);
    }

    public function pembayaran_proses(Request $request) {
        try {
            $pembayaran = Pembayaran::create([
                'pemesanan_id' => $request->transaksi_id,
                'jumlah_bayar' => $request->jumlah_bayar,
                'status_bayar' => 1,
                'tanggal_bayar' => Carbon::now()
            ]);
            if ($pembayaran) {
                $update = Pemesanan::find($request->transaksi_id);
                $update->update([
                    'status' => 1
                ]);
            }

            return to_route('transaksi.index');
        } catch (\Throwable $th) {
            throw $th;
        }
    }
}
