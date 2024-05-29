<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Komentar extends Model
{
    use HasFactory;
    protected $table = 'komentar';

    protected $primaryKey = 'id';

    protected $fillable = [
        'id_person',
        'id_video',
        'komentar',
    ];

    public function saveKomentar($data){

        return Komentar::create($data);
    }
    public function jumlahKomentarBerdasarkanIDvideo($id_video){

        return Komentar::where('id_video',$id_video)->count();
    }

    public function getKomentar($id_video){
        return Komentar::where('id_video',$id_video)->join('person','komentar.id_person','person.id')->orderByDesc('komentar.created_at')->get();
    }

}
