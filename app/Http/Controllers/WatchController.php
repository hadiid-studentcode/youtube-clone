<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class WatchController extends Controller
{
    public function Watch($id){
        return view('pages.watch')
        ->with('title', '2時間のジブリ癒しリラックス 🌎 夏のジブリBGM ⛅ ジブリのスタジオミュージック')
        ;
    }
}
