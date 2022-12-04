<?php

namespace App\Http\Controllers;

use App\Models\Mahasiswa;
use Illuminate\Http\Request;

class MahasiswaController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $mahasiswa_model = new Mahasiswa();
        $mahasiswa = $mahasiswa_model->getMahasiswa();

        return view('mahasiswa', [
            'mahasiswa' => $mahasiswa
        ]);
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $data = [
            'nim' => $request->nim,
            'nama' => $request->nama,
            'email' => $request->email,
            'jurusan' => $request->jurusan,
        ];

        $mahasiswa_model = new Mahasiswa();
        
        if ($mahasiswa_model->createMahasiswa($data) > 0) {
            return response([
                'status' => true,
                'message' => 'Data telah ditambahkan',
                'data' => [
                    'nim' => $data['nim'],
                    'nama' => $data['nama'],
                    'email' => $data['email'],
                    'jurusan' => $data['jurusan'],
                ]
            ], 201);

        } else {
            return response([
                'status' => false,
                'message' => 'Masukkan Data'
            ], 400);
        }
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\Mahasiswa  $mahasiswa
     * @return \Illuminate\Http\Response
     */
    public function show(Request $request)
    {
        $mahasiswa_model = new Mahasiswa();
        $id = $request->id;
        $mahasiswa = $mahasiswa_model->getMahasiswaByID($id);

        return view('mahasiswaById', [
            'mahasiswa' => $mahasiswa
        ]);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\Mahasiswa  $mahasiswa
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request)
    {
        $data['id'] = $request->id;
        $id = $request->id;
        $data = [
            'nim' => $request->nim,
            'nama' => $request->nama,
            'email' => $request->email,
            'jurusan' => $request->jurusan,
        ];

        $mahasiswa_model = new Mahasiswa();
        
        if ($mahasiswa_model->updateMahasiswa($data, $id) > 0) {
            return response([
                'status' => true,
                'message' => 'Data telah diperbarui',
                'data' => [
                    'nim' => $data['nim'],
                    'nama' => $data['nama'],
                    'email' => $data['email'],
                    'jurusan' => $data['jurusan'],
                ]
            ], 200);

        } else {
            return response([
                'status' => false,
                'message' => 'Masukkan Data'
            ], 400);
        }
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Mahasiswa  $mahasiswa
     * @return \Illuminate\Http\Response
     */
    public function destroy(Request $request)
    {
        $mahasiswa_model = new Mahasiswa();
        $id = $request->id;
        $mahasiswa = $mahasiswa_model->deleteMahasiswa($id);

        // if ($id == null) {
        //     return response([
        //         'status' => false,
        //         'message' => 'Masukkan ID'
        //     ], 400);

        // } else {
        //     if ($mahasiswa_model->deleteMahasiswa($id) > 0) {
        //         return response([
        //             'status' => true,
        //             'message' => 'Data telah dihapus',
        //             'data' => $mahasiswa
        //         ], 410);

        //     } else {
        //         return response([
        //             'status' => false,
        //             'message' => 'ID tidak ditemukan'
        //         ], 404);
        //     }
            
        // }

        return $mahasiswa;
    }
}
