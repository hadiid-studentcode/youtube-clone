@extends('layouts.studio.main')
@section('main')
    <div class="bg-dark">
        <h5 class="card-header">Konten channel</h5>
        <div class="card-body">
            <table class="table">
                <thead>
                    <tr>
                        <th scope="col">Video</th>
                        <th scope="col">Tanggal</th>
                        <th scope="col">Komentar</th>
                        <th scope="col">Suka - tidak suka</th>
                        <th scope="col">Action</th>
                    </tr>
                </thead>
                <tbody>
                    @foreach ($konten as $k)
                        <tr>
                            <th scope="row">
                                <div class="bg-dark mb-3" style="max-width: 540px;">
                                    <div class="row g-0">
                                        <div class="col-md-4">
                                          <a href="{{ url('/watch/' . $k->url . '') }}">

                                            <video src="{{ asset('storage/video/' . $k->video . '') }}"
                                                class="img-fluid rounded-start" alt="..."></video>
                                          </a>


                                        </div>
                                        <div class="col-md-8">
                                            <div class="card-body">
                                             <a class="text-decoration-none text-white" href="{{ url('/watch/' . $k->url . '') }}">
                                                <h5 class="card-title">{{ $k->title }}</h5>

                                             </a>
                                                <p class="card-text">
                                                    <?php $parts = str_split($k->description, 30); ?>
                                                    {{ $parts[0] }}....
                                                </p>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </th>
                            <?php
                            $tanggalParse = \Carbon\Carbon::parse($k->tanggal);
                            $tanggal = $tanggalParse->format('d F Y');
                            ?>
                            <td>{{ $tanggal }} </td>
                            <td>{{ $k->komentar }}</td>
                            <td>{{ $k->suka }} - {{ $k->tidak_suka }}</td>
                            <td>

                                <div class="btn-group" role="group" aria-label="Basic mixed styles example">

                                    <form action="{{ url('/konten/' . $k->id) }}" method="POST">
                                        @csrf
                                        @method('DELETE')
                                        <button type="submit" class="btn btn-danger btn-sm" type="button">Hapus</button>


                                    </form>
                                </div>

                            </td>
                        </tr>
                    @endforeach

                </tbody>
            </table>
        </div>
    </div>
@endsection
