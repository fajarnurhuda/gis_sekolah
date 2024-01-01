<?php

namespace App\Http\Controllers;

use App\Models\Sekolah;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Blade;
use Yajra\DataTables\Facades\DataTables;

class DataSekolahController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index(Request $request)
    {
        $sekolah = Sekolah::all();
        // $pelamar = Pelamar::all();
        if ($request->ajax()) {
            return DataTables::of($sekolah)->addIndexColumn()
                ->addColumn('gambar', function ($row) {
                    return '<a href="' . asset('storage/' . $row->foto) . '" target="_blank"><img src="' . asset('storage/' . $row->foto) . '" class="avatar avatar-sm me-1" alt="avatar image"></a>';
                })->addColumn('aksi', function ($pelamar) {
                    return Blade::render('
                <a href="#" class="badge bg-gradient-primary mt-3 btn-view" data-detail="' . htmlspecialchars($pelamar) . '" data-id=' . $pelamar->id . '><i class="fa fa-eye"></i></a>
                <a href="#" class="badge bg-gradient-warning btn-edit" data-detail="' . htmlspecialchars($pelamar) . '"  data-id= ' . $pelamar->id . ' ><i class="fa fa-pencil"></i></a>
                <button class="badge bg-gradient-danger mt-3 btn-hapus border-0" data-detail="' . htmlspecialchars($pelamar) . '" data-id=' . $pelamar->id . '><i class="fa fa-trash"></i></button>', ['pelamar' => $pelamar]);
                })->rawColumns(['gambar', 'aksi'])->make(true);
        }

        return view('beranda.sekolah', [
            'sekolah' => $sekolah,
            'title' => 'Data Sekolah',
            'subtitle' => 'List Sekolah'
        ]);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        //
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        //
    }
}
