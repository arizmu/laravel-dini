<?php

namespace App\Http\Controllers;

use App\Models\Wisata;
use Illuminate\Http\Request;
use PhpParser\Node\Stmt\Return_;

class WisataController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $data = Wisata::paginate(10);
        // $data->getMedia('wisata');

        // return $data;
        return view('wisata.index', ['data' => $data]);
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        return view('wisata.create');
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $query = Wisata::create([
            'wisata' => $request->wisata,
            'desc' => $request->desc,
            'lokasi' => $request->lokasi
        ]);

        if ($request->hasFile('image')) {
            $query->addMedia($request->file('image'))->toMediaCollection('wisata');
        }

        return to_route('wisata.index');
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
        $data = Wisata::find($id);
        return view('wisata.edit', ['wisata' => $data]);
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id)
    {
        $data = Wisata::find($id);
        $data->update([
            'wisata' => $request->wisata,
            'lokasi' => $request->lokasi,
            'desc' => $request->desc,
        ]);
        return to_route('wisata.index');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        $data = Wisata::destroy($id);
        // $data->destroy();
        return to_route('wisata.index');
    }
}
