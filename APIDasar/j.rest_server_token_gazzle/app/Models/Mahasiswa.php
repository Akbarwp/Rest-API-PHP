<?php

namespace App\Models;

use GuzzleHttp\Client;
use Illuminate\Support\Facades\DB;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Support\Facades\Http;

class Mahasiswa extends Model
{
    use HasFactory;

    protected $guarded = [];

    private $token = '3|HHJoNvMxNd1xuhZ1R1H9nRg3B3nPbpMWlf1oEom9';
    private $uri = 'http://localhost:8080/REST_API/APIDasar/h.rest_server_token/api/mahasiswa/';

    public function getMahasiswaByID($id) 
    {
        $response = Http::withToken($this->token)->get($this->uri . $id)->json();

        return $response;
    }

    public function getMahasiswa() 
    {
        $response = Http::withToken($this->token)->get($this->uri)->json();

        return $response;
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
        // return DB::table('mahasiswa')->where('id', $id)->delete();

        $response = Http::withToken($this->token)->delete($this->uri, $id);

        return $response;
    }
}
