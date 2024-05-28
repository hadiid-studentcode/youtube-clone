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
        'video',
        'tanggal',
        'komentar',
        'suka',
        'tidak_suka',
    ];

    public function saveVideo($data)
    {

        return Video::create($data);
    }

    public function saveVideoToStorage($data, $name)
    {
        return $data->storeAs('public/video', $name);
    }

    public function getKonten()
    {
        return Video::all();
    }

    public function deleteVideo($id)
    {
        return Video::find($id)->delete();
    }

    public function findVideoWhereUrl($url)
    {
        return Video::where('url', $url)->join('users', 'users.id', '=', 'video.id_user')->join('person', 'person.id', '=', 'users.id_person')->first();
    }

    public function findVideoMore($url)
    {
        return Video::whereNot('url', $url)->join('users', 'users.id', '=', 'video.id_user')->join('person', 'person.id', '=', 'users.id_person')->get();
    }

    public function getVideos()
    {
        return Video::join('users', 'users.id', '=', 'video.id_user')->join('person', 'person.id', '=', 'users.id_person')->get();
    }
}
