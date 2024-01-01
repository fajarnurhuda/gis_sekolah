<?php

namespace App\Http\Controllers;

use App\Models\Sekolah;
use Illuminate\Http\Request;

class BerandaController extends Controller
{
    public function index()
    {
        $sekolah = Sekolah::all()->count();
        $data_sekolah = Sekolah::all();
        $data = [
            'title' => 'Beranda',
            'subtitle' => 'Beranda',
            'sekolah' => $sekolah,
            'data_sekolah' => $data_sekolah
        ];
        return view('beranda.index', $data);
    }
}
