<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Video extends Model
{
    use HasFactory;


    protected $table = 'video';
    protected $primaryKey = 'id';

    protected $fillable = [
        'id_user',
        'title',
        'description',
        'url',
        'thumbnail',
        'video'
    ];

    public function saveVideo($data){
        return Video::create($data);
    }
    
}
