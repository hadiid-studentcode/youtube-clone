<?php

namespace App\Http\Controllers;

use App\Models\Person;
use App\Models\Video;

class WatchController extends Controller
{
    protected $video, $person;

    public function __construct(Video $video, Person $person)
    {
        $this->video = $video;
        $this->person = $person;
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


        return view('pages.watch', [
            'isLogin' => $isLogin,
            'title' => $videos->title,
            'video' => $videos,
            'videoMore' => $videoMore,
            'person' => $person
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
}
