<?php

namespace App\Http\Controllers;

use App\Models\Komentar;
use App\Models\Person;
use App\Models\Video;
use Illuminate\Http\Request;


class WatchController extends Controller
{
    protected $video;

    protected $person;
    protected $komentar;

    public function __construct(Video $video, Person $person,Komentar $komentar)
    {
        $this->video = $video;
        $this->person = $person;
        $this->komentar= $komentar;
    }

    public function Watch($url)
    {
        $isLogin = auth()->check();

        if ($isLogin) {
            $person = $this->person->getPersonFirst(auth()->user()->id_person);
        } else {
            $person = null;
        }

        $videos = $this->video->findVideoWhereUrl($url);


        $videoMore = $this->video->findVideoMore($url);
        $komentar = $this->komentar->getKomentar($videos->id);


        return view('pages.watch', [
            'isLogin' => $isLogin,
            'title' => $videos->title,
            'video' => $videos,
            'videoMore' => $videoMore,
            'person' => $person,
            'komentar'=>$komentar
        ]);
    }

    public function like($url)
    {

        try {

            $returnVideo = $this->video->jumlahLike($url);
            $like = intval($returnVideo->suka + 1);

            $this->video->likeVideo($url, $like);

            return back();
        } catch (\Throwable $th) {
            return back();
        }

    }

    public function dislike($url)
    {
        try {

            $returnVideo = $this->video->jumlahDislike($url);
            $dislike = intval($returnVideo->tidak_suka + 1);

            $this->video->dislikeVideo($url, $dislike);

            return back();
        } catch (\Throwable $th) {
            return back();
        }
    }
    public function komentar(Request $request,$id_video){

        try {
            $request->validate([
                'komentar' => 'required',
            ]);


            $this->komentar->saveKomentar([
                'id_person' => auth()->user()->id_person,
                'id_video' => $id_video,
                'komentar' => $request->komentar,
            ]);

            // tambah komentar yang di video

            $jumlahKomentar = $this->komentar->jumlahKomentarBerdasarkanIDvideo($id_video);

            $this->video->tambahKomentar($id_video,$jumlahKomentar);

            return back();

        } catch (\Throwable $th) {
           return back();
        }
    }
}
