@extends('layouts.main')

@section('main')
    <div class="content-header">
        <div class="container-fluid">
            <div class="row mb-2">
                <div class="col">
                    <h1 class="m-0">
                        <button type="button" class="btn btn-secondary rounded-pill"
                            style="background-color: #323232eb;color: white">Semua</button>
                        <button type="button" class="btn btn-secondary rounded-pill"
                            style="background-color: #323232eb;color: white">Musik</button>
                        <button type="button" class="btn btn-secondary rounded-pill"
                            style="background-color: #323232eb;color: white">Game</button>
                        <button type="button" class="btn btn-secondary rounded-pill"
                            style="background-color: #323232eb;color: white">Mix</button>
                        <button type="button" class="btn btn-secondary rounded-pill"
                            style="background-color: #323232eb;color: white">Live</button>
                        <button type="button" class="btn btn-secondary rounded-pill"
                            style="background-color: #323232eb;color: white">Game petualangan aksi</button>
                        <button type="button" class="btn btn-secondary rounded-pill"
                            style="background-color: #323232eb;color: white">Kartun</button>
                        <button type="button" class="btn btn-secondary rounded-pill"
                            style="background-color: #323232eb;color: white">Alam</button>
                        <button type="button" class="btn btn-secondary rounded-pill"
                            style="background-color: #323232eb;color: white">Baru diupload</button>
                        <button type="button" class="btn btn-secondary rounded-pill"
                            style="background-color: #323232eb;color: white">Ditonton</button>
                        <button type="button" class="btn btn-secondary rounded-pill"
                            style="background-color: #323232eb;color: white">Baru untuk Anda</button>

                    </h1>
                </div><!-- /.col -->

            </div><!-- /.row -->
        </div><!-- /.container-fluid -->
    </div>
    <!-- /.content-header -->

    <!-- Main content -->
    <section class="content" style="background-color: black">
        <div class="row row-cols-1 row-cols-md-4 g-4">
            @foreach ($videos as $v)
                <div class="col">
                    <div class="card" style="background-color: black">




                        <a href="{{ url('/watch/' . $v->url. '') }}">

                            <video src="{{ asset('storage/video/' . $v->video . '') }}" alt="{{ $v->title }}"
                                class="card-img-top"></video>
                        </a>

                        <div class="card-body">
                            <h5 class="card-title d-flex" style="color: white">
                                <img src="https://yt3.ggpht.com/5nhjkTZFabmAX5cwoWn3npQ7zO5HYmT0WufN7D0ndtcyDDqT9pWBBEW2n1JdfAUmqIymATNe=s68-c-k-c0x00ffffff-no-rj"
                                    class="img-circle elevation-2 mr-2" alt="User Image" width="30" height="30">

                                <a class="text-decoration-none text-white" href="{{ url('/watch/' . $v->url) }}">

                                    <p>{{ $v->title }}</p>
                                </a>

                            </h5>
                            <div class="p-1">
                                <p class="card-text text-muted">{{ $v->fullName }}</p>

                                <?php
                                $tanggalParse = \Carbon\Carbon::parse($v->tanggal);
                                $tanggal = $tanggalParse->format('d F Y');
                                ?>
                                <p class="card-text  text-muted">{{ $tanggal }}</p>
                            </div>

                        </div>
                    </div>
                </div>
            @endforeach


        </div>
    </section>
@endsection
