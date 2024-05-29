@extends('layouts.main')
@section('main')
    <div class="container">
        <div class="row">
            <div class="col-10 ">

                <div class="embed-responsive embed-responsive-16by9">

                    <video id="myVideo" width="820" height="660" controls>
                        <source src="{{ asset('storage/video/' . $video->video . '') }}" type="video/mp4">
                        <source src="movie.ogg" type="video/ogg">
                        Your browser does not support the video tag.
                    </video>

                </div>


                <div>
                    <h3 class="text-white font-weight-bold">{{ $video->title }}</h3>
                    <nav class="navbar bg-body-tertiary">
                        <div class="container-fluid">
                            <a class="navbar-brand text-white" href="#">
                                <img src="https://yt3.ggpht.com/5nhjkTZFabmAX5cwoWn3npQ7zO5HYmT0WufN7D0ndtcyDDqT9pWBBEW2n1JdfAUmqIymATNe=s68-c-k-c0x00ffffff-no-rj"
                                    alt="Logo" width="35"
                                    class="d-inline-block align-text-top img-circle elevation-1">
                                {{ $video->fullName }}
                            </a>
                            <div class="d-grid gap-2 d-md-block">
                                @if ($isLogin == true)
                                    <a href="{{ '/watch/like/' . $video->url }}" class="btn btn-primary" type="button">
                                        <svg xmlns="http://www.w3.org/2000/svg" height="24px" viewBox="0 -960 960 960"
                                            width="24px" fill="#e8eaed">
                                            <path
                                                d="M720-120H280v-520l280-280 50 50q7 7 11.5 19t4.5 23v14l-44 174h258q32 0 56 24t24 56v80q0 7-2 15t-4 15L794-168q-9 20-30 34t-44 14Zm-360-80h360l120-280v-80H480l54-220-174 174v406Zm0-406v406-406Zm-80-34v80H160v360h120v80H80v-520h200Z" />
                                        </svg>
                                        {{ $video->suka }}</a>

                                    <a href="{{ '/watch/dislike/' . $video->url }}" class="btn btn-primary" type="button">
                                        <svg xmlns="http://www.w3.org/2000/svg" height="24px" viewBox="0 -960 960 960"
                                            width="24px" fill="#e8eaed">
                                            <path
                                                d="M240-840h440v520L400-40l-50-50q-7-7-11.5-19t-4.5-23v-14l44-174H120q-32 0-56-24t-24-56v-80q0-7 2-15t4-15l120-282q9-20 30-34t44-14Zm360 80H240L120-480v80h360l-54 220 174-174v-406Zm0 406v-406 406Zm80 34v-80h120v-360H680v-80h200v520H680Z" />
                                        </svg> {{ $video->tidak_suka }}</a>
                                @elseif($isLogin == false)
                                    <a href="{{ '/login' }}" class="btn btn-primary" type="button">
                                        <svg xmlns="http://www.w3.org/2000/svg" height="24px" viewBox="0 -960 960 960"
                                            width="24px" fill="#e8eaed">
                                            <path
                                                d="M720-120H280v-520l280-280 50 50q7 7 11.5 19t4.5 23v14l-44 174h258q32 0 56 24t24 56v80q0 7-2 15t-4 15L794-168q-9 20-30 34t-44 14Zm-360-80h360l120-280v-80H480l54-220-174 174v406Zm0-406v406-406Zm-80-34v80H160v360h120v80H80v-520h200Z" />
                                        </svg>
                                    </a>
                                    <a href="{{ '/login' }}" class="btn btn-primary" type="button">
                                        <svg xmlns="http://www.w3.org/2000/svg" height="24px" viewBox="0 -960 960 960"
                                            width="24px" fill="#e8eaed">
                                            <path
                                                d="M240-840h440v520L400-40l-50-50q-7-7-11.5-19t-4.5-23v-14l44-174H120q-32 0-56-24t-24-56v-80q0-7 2-15t4-15l120-282q9-20 30-34t44-14Zm360 80H240L120-480v80h360l-54 220 174-174v-406Zm0 406v-406 406Zm80 34v-80h120v-360H680v-80h200v520H680Z" />
                                        </svg>
                                    </a>
                                @endif
                                <button class="btn btn-primary" type="button" onclick="bagikan()">Bagikan</button>
                                <button class="btn btn-primary" type="button" onclick="download()">Download</button>

                            </div>
                        </div>
                    </nav>

                    <div class="text-white" style="background-color: #ffffff1A">

                        <?php
                        $tanggalParse = \Carbon\Carbon::parse($video->tanggal);
                        $tanggal = $tanggalParse->format('d F Y');
                        ?>

                        <h5 class="card-header">
                            {{ $tanggal }}</h5>
                        <div class="card-body">
                            <p class="card-text">
                                {{ $video->description }}
                            </p>


                        </div>
                    </div>

                    <div class="mb-3 mt-4 ">
                        <div class="row g-0">
                            <div class="col-md-1">
                                @if ($isLogin == true)
                                    <img src="https://yt3.ggpht.com/5nhjkTZFabmAX5cwoWn3npQ7zO5HYmT0WufN7D0ndtcyDDqT9pWBBEW2n1JdfAUmqIymATNe=s68-c-k-c0x00ffffff-no-rj"
                                        class="img-fluid rounded-start img-circle elevation-1" alt="...">
                                @elseif($isLogin == false)
                                    <svg class="img-fluid rounded-start img-circle elevation-1"
                                        xmlns="http://www.w3.org/2000/svg" viewBox="0 -960 960 960" fill="#e8eaed">
                                        <path
                                            d="M234-276q51-39 114-61.5T480-360q69 0 132 22.5T726-276q35-41 54.5-93T800-480q0-133-93.5-226.5T480-800q-133 0-226.5 93.5T160-480q0 59 19.5 111t54.5 93Zm246-164q-59 0-99.5-40.5T340-580q0-59 40.5-99.5T480-720q59 0 99.5 40.5T620-580q0 59-40.5 99.5T480-440Zm0 360q-83 0-156-31.5T197-197q-54-54-85.5-127T80-480q0-83 31.5-156T197-763q54-54 127-85.5T480-880q83 0 156 31.5T763-763q54 54 85.5 127T880-480q0 83-31.5 156T763-197q-54 54-127 85.5T480-80Zm0-80q53 0 100-15.5t86-44.5q-39-29-86-44.5T480-280q-53 0-100 15.5T294-220q39 29 86 44.5T480-160Zm0-360q26 0 43-17t17-43q0-26-17-43t-43-17q-26 0-43 17t-17 43q0 26 17 43t43 17Zm0-60Zm0 360Z" />
                                    </svg>
                                @endif
                            </div>
                            <div class="col-md-11">
                                <div class="card-body">

                                    @if ($isLogin == true)
                                        <form action="{{ url('/komentar/' . $video->url) }}" method="POST">
                                            <input class="form-control bg-dark" type="text"
                                                placeholder="Tambahkan Komentar" aria-label="default input example">
                                            <button type="submit"
                                                class="btn btn-primary rounded-pill mt-2">Komentar</button>
                                        </form>
                                    @elseif($isLogin == false)
                                        <a href="{{ url('/login') }}">
                                            <form>
                                                <input class="form-control bg-dark" type="text"
                                                    placeholder="Tambahkan Komentar" aria-label="default input example">
                                                <button type="button"
                                                    class="btn btn-primary rounded-pill mt-2">Komentar</button>
                                            </form>
                                        </a>
                                    @endif





                                </div>
                            </div>
                        </div>
                    </div>

                    <div class="mb-3 mt-4 ">
                        <div class="row g-0">
                            <div class="col-md-1">
                                <img src="https://yt3.ggpht.com/2nXtMgikaLSUsjosxLjLuEUDYdVaatW9sT4XcVt43kyFv06SPEbrQ_eUtMNXddgUQdG-qNMj=s88-c-k-c0x00ffffff-no-rj"
                                    class="img-fluid rounded-start img-circle elevation-1" alt="...">
                            </div>
                            <div class="col-md-11">
                                <div class="card-body">
                                    <h5 class="card-title text-white">
                                        <a class="text-white" href="@MusicDecomposer">@MusicDecomposer</a> <small
                                            class="text-body-secondary"> 3 tahun yang lalu</small>
                                    </h5>
                                    <p class="card-text text-white">Please make another tutorial for how to set ice on
                                        fire.
                                    </p>

                                </div>
                            </div>
                        </div>
                    </div>


                </div>



            </div>
            <div class="col-2 mt-1">

                @foreach ($videoMore as $vm)
                    <div class="card mb-3 " style="background-color: black" style="max-width: 540px;">
                        <div class="row g-0 ">
                            <div class="col">
                                <a href="{{ url('/watch/' . $vm->url . '') }}">

                                    <video src="{{ asset('storage/video/' . $vm->video . '') }}"
                                        alt="{{ $vm->title }}" width="250px"></video>
                                </a>

                            </div>
                            <div class="col">
                                <div class="">
                                    <a href="{{ url('/watch/' . $vm->url . '') }}">
                                        <h5 class="card-title" style="color: white">{{ $vm->title }}</h5>

                                    </a>

                                    <?php
                                    $tanggalParse = \Carbon\Carbon::parse($vm->tanggal);
                                    $tanggal = $tanggalParse->format('d F Y');
                                    ?>

                                    <p class="card-text text-muted"><small class="text-body-secondary">

                                            {{ $vm->fullName }} <br>
                                            {{ $tanggal }}
                                        </small></p>
                                </div>
                            </div>
                        </div>
                    </div>
                @endforeach






            </div>

        </div>
    </div>

    <script>
        function bagikan() {
            navigator.clipboard.writeText('{{ url('/watch/' . $video->url . '') }}')
                .then(() => {
                    alert('URL Berhasil Disalin');
                })
                .catch(err => {
                    console.error('Tidak dapat menyalin URL:', err);
                });

        }

        function download() {
            const video = document.getElementById('myVideo');
            const downloadUrl = video.src;
            const link = document.createElement('a');
            link.href = '{{ asset('storage/video/' . $video->video . '') }}';
            link.download = '{{ $video->title }}.mp4';
            link.click();
        }
    </script>
@endsection
