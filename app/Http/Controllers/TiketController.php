<?php

namespace App\Http\Controllers;

use App\Models\Tiket;
use App\Models\TiketDetail;
use App\Models\Transaksi;
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
        DB::beginTransaction();
        try {
            $transaksi = Tiket::create([
                'title' => $request->title,
                'desc' => $request->desc,
                'harga' => $request->harga,
                'kouta_tiket' => $request->kouta_tiket,
                'masa_berlaku' => Carbon::parse($request->masa_berlaku),
            ]);

            // $item = [];
            foreach ($request->item as $value => $key) {
                if ($key[0]) {
                    // $item[] = [
                    //     'kode' => $key[0],
                    //     'wisata' => $value,
                    //     'jumlah' => $key[1]
                    // ];
                    $detail = TiketDetail::create([
                        'tiket_21136' => $transaksi->id,
                        'wisata_21136' => $key[0],
                        'jumlah_tiket' => $key[1]
                    ]);
                }
            }
            DB::commit();
            return redirect()->route('tiketing.index')->with('success', 'Tiket baru berhasil dibuat!');
        } catch (\Throwable $th) {
            DB::rollBack();
            return $th->getMessage();
        }
        // return $item;
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
        //
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id)
    {
        //
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
}
