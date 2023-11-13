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
        return view('livewire.wisata-populer', [
            'data' => $data
        ]);
    }
}
