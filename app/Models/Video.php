<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Facades\Storage;


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

    public function getKonten($id_user)
    {
        return Video::where('id_user', $id_user)->get();
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

    public function likeVideo($url, $like)
    {

        return Video::where('url', $url)
            ->update(['suka' => $like]);
    }

    public function jumlahLike($url)
    {
        return Video::select('suka')->where('url', $url)->first();
    }

    public function jumlahDislike($url)
    {
        return Video::select('tidak_suka')->where('url', $url)->first();
    }

    public function dislikeVideo($url, $dislike)
    {

        return Video::where('url', $url)
            ->update(['tidak_suka' => $dislike]);
    }

    public function tambahKomentar($id_video, $jumlahKomentar)
    {
        return Video::where('id', $id_video)
            ->update(['komentar' => $jumlahKomentar]);
    }

    // public function uploadChunk($video,$name)
    // {
    //     $file = $video;
    //     $chunkIndex = 'chunk';
    //     $totalChunks ='total';
    //     $filename = $name;

    //     $filePath = 'uploads/' . $filename;
    //     $chunkPath = $filePath . '/' . $chunkIndex;

    //     Storage::put($chunkPath, file_get_contents($file->getRealPath()));

    //     if ($chunkIndex + 1 == $totalChunks) {
    //         $this->mergeChunks($filePath, $filename);
    //     }

    //     return response()->json(['status' => 'success']);
    // }

    // public function mergeChunks($filePath, $filename)
    // {
    //     $storagePath = storage_path('app/public/video/' . $filePath);
    //     $finalPath = storage_path('app/public/video/' . $filename);

    //     $file = fopen($finalPath, 'a');

    //     for ($i = 0; $i < count(scandir($storagePath)) - 2; $i++) {
    //         $chunk = file_get_contents($storagePath . '/' . $i);
    //         fwrite($file, $chunk);
    //         unlink($storagePath . '/' . $i);
    //     }

    //     fclose($file);
    //     rmdir($storagePath);
    // }
}
