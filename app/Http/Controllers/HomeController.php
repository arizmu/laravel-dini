<?php

namespace App\Http\Controllers;

use App\Models\Wisata;
use Illuminate\Http\Request;

class HomeController extends Controller
{
    public function index() {
        return view('index');
    }

    public function wisata($key) {
        $query = Wisata::find($key);
        // return $query;
        return view('wisata-detail', ['wisata' => $query]);
    }
}
