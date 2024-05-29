<?php

namespace App\Http\Controllers;

use App\Models\Person;
use App\Models\Video;
use Carbon\Carbon;
use Illuminate\Http\Request;

class KontenController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    protected $video;

    public function __construct(Video $video)
    {
        $this->video = $video;
    }

    public function index(Person $person)
    {
        $person = $person->getPersonFirst(auth()->user()->id_person);


        return view('pages.konten', [
            'title' => 'Konten',
            'konten' => $this->video->getKonten(),
            'person' => $person
        ]);
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {

        try {
            $request->validate([
                'title' => 'required',
                'video' => 'required|mimes:mp4,ogx,oga,ogv,ogg,webm',
            ]);

            // simpan video ke database
            $this->video->saveVideo([
                'id_user' => auth()->user()->id,
                'title' => $request->title,
                'description' => $request->description,
                'url' => hash('crc32', $request->title.'-'.Carbon::now('Asia/Jakarta')->format('Y-m-d')),
                'video' => $request->video->getClientOriginalName(),
                'tanggal' => Carbon::now('Asia/Jakarta')->format('Y-m-d'),
                'komentar' => 0,
                'suka' => 0,
                'tidak_suka' => 0,

            ]);

            // simpan video ke storage
            $this->video->saveVideoToStorage($request->video, $request->video->getClientOriginalName());

            return back()->with('success', 'Video uploaded successfully');
        } catch (\Throwable $th) {
            dd($th->getMessage());
        }
    }

    /**
     * Display the specified resource.
     */
    public function show(string $id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(string $id)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        try {
            $this->video->deleteVideo($id);

            return back()->with('success', 'Video deleted successfully');

        } catch (\Throwable $th) {
            return back();
        }
    }
}
