<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Sekolah;

class SekolahController extends Controller
{


    public function index()
    {
        return view('home');
    }

    public function sekolah()
    {
        $result = Sekolah::all();
        return json_encode($result);
    }

    public function detail($id = '')
    {
        $result = Sekolah::where('id_sekolah', $id)->get();
        return json_encode($result);
    }
}
