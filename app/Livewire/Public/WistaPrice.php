<?php

namespace App\Livewire\Public;

use App\Models\Tiket;
use App\Models\Wisata;
use Livewire\Component;
use Livewire\WithPagination;

class WistaPrice extends Component
{
    use WithPagination;
    public $number = 1;
    public $query = "";

    public function search()
    {
        $this->resetPage();
    }

    public function render()
    {
        $query = Tiket::with('detail')->when($this->query, function($result) {
            $result->where('title', 'like', '%'.$this->query.'%');
        });

        return view('livewire.public.wista-price', [
            'data' => $query->paginate(9)
        ]);
    }

    public function addChart($key) {
        $this->number ++;
    }
}
