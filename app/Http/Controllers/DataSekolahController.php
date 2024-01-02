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
                    return '<a href="' . asset('storage/' . $row->gambar) . '" target="_blank"><img src="' . asset('storage/' . $row->gambar) . '" class="avatar avatar-sm me-1" alt="avatar image"></a>';
                })->addColumn('aksi', function ($sekolah) {
                    return Blade::render('
                <a href="#" class="badge bg-gradient-warning btn-edit" data-detail="' . htmlspecialchars($sekolah) . '"  data-id= ' . $sekolah->id_sekolah . ' ><i class="fa fa-pencil"></i></a>
                <button class="badge bg-gradient-danger mt-3 btn-hapus border-0" data-detail="' . htmlspecialchars($sekolah) . '" data-id=' . $sekolah->id_sekolah . '><i class="fa fa-trash"></i></button>', ['sekolah' => $sekolah]);
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
        $validateData = $request->validate([
            'nama'   => 'required',
            'alamat'        => 'required',
            'latitude'          => 'required',
            'longitude'    => 'required',
            'gambar'            => 'mimes:jpg,jpeg,png|image|max:2048|required',
        ]);

        if ($request->file('gambar')) {
            $validateData['gambar'] = $request->file('gambar')->store('gambar');
        }

        $tambah = Sekolah::create($validateData);

        if ($tambah) {
            $success = 'success';
            $message = "Data berhasil ditambah";
            $validateData['updated_at'] = date('Y-m-d H:i:s');
        } else {
            $success = 'error';
            $message = "Data gagal ditambah";
        }
        //  return response
        return response()->json([
            'status' => $success,
            'message' =>  $message,
        ]);
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
        $validateData = $request->validate([
            'nama'   => 'required',
            'alamat'        => 'required',
            'latitude'          => 'required',
            'longitude'    => 'required',
            'gambar'            => 'mimes:jpg,jpeg,png|image|max:2048',
        ]);

        if ($request->file('gambar')) {
            $validateData['gambar'] = $request->file('gambar')->store('gambar');
        }

        $edit = Sekolah::where('id_sekolah', $id)->update($validateData);

        if ($edit) {
            $success = 'success';
            $message = "Data berhasil dirubah";
        } else {
            $success = 'error';
            $message = "Data gagal dirubah";
        }

        //  return response
        return response()->json([
            'status' => $success,
            'message' => $message,
        ]);
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $hapus = Sekolah::destroy($id);

        if ($hapus) {
            $success = 'success';
            $message = "Data berhasil dihapus";
        } else {
            $success = 'error';
            $message = "Data gagal di hapus";
        }

        //  return response
        return response()->json([
            'status' => $success,
            'message' => $message,
        ]);
    }
}
