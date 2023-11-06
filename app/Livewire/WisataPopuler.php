<?php

namespace App\Livewire;

use App\Models\Wisata;
use Illuminate\Support\Facades\DB;
use Livewire\Component;
use Livewire\WithPagination;

class WisataPopuler extends Component
{
    use WithPagination;

    public $query = '';

    public function search()
    {
        $this->resetPage();
    }

    public function render()
    {
        $data = Wisata::where('wisata', 'like', '%' . $this->query . '%')->paginate(9);
        // $array = [];
        // foreach ($data as $value) {
        //     $media = DB::table('media')->where('model_type', 'App\Models\Wisata')->where('model_id', $value->id)->get();
        //     $collect = collect($media);
        //     $result = $collect[0] ?? "";
        //     $array[] = [
        //         'title' => $value->wisata,
        //         'media' => $result ? env('APP_URL')."/storage/".$result->id."/".$result->file_name: "",
        //         'desc' => $value->desc,
        //         // 'slug' => $value->slug
        //     ];
        // }

        return view('livewire.wisata-populer', [
            'data' => $data
        ]);
    }
}
