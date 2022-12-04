<?php

namespace App\Models;

use Illuminate\Support\Facades\DB;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class Mahasiswa extends Model
{
    use HasFactory;

    protected $guarded = [];

    public function getID() {
        return DB::table('mahasiswa')->get('id')->toArray();
    }

    public function getMahasiswa($id = null) 
    {
        if ($id == null) {
            return DB::table('mahasiswa')->orderBy('nim')->get()->toArray();

        } else {
            return DB::table('mahasiswa')->where('id', $id)->get()->toArray();
        }
    }

    public function createMahasiswa($data)
    {
        return DB::table('mahasiswa')->insert([
            'nim' => $data['nim'],
            'nama' => $data['nama'],
            'email' => $data['email'],
            'jurusan' => $data['jurusan'],
        ]);
    }

    public function updateMahasiswa($data, $id)
    {
        return DB::table('mahasiswa')->where('id', $id)->update([
            'nim' => $data['nim'],
            'nama' => $data['nama'],
            'email' => $data['email'],
            'jurusan' => $data['jurusan'],
        ]);
    }

    public function deleteMahasiswa($id)
    {
        return DB::table('mahasiswa')->where('id', $id)->delete();
    }
}
