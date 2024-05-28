<?php

namespace App\Http\Controllers;

use App\Models\Video;

class WatchController extends Controller
{
    protected $video;

    public function __construct(Video $video)
    {
        $this->video = $video;
    }

    public function Watch($url)
    {

        $videos = $this->video->findVideoWhereUrl($url);
        $videoMore = $this->video->findVideoMore($url);

        $isLogin = auth()->check();

        return view('pages.watch', [
            'isLogin' => $isLogin,
            'title' => $videos->title,
            'video' => $videos,
            'videoMore' => $videoMore,
        ]);
    }
}
