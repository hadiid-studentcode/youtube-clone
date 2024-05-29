<nav class=" main-header navbar navbar-expand navbar-dark" style="background-color: black">
    <!-- Left navbar links -->
    <ul class="navbar-nav">
        <li class="nav-item">
            <a class="nav-link" data-widget="pushmenu" href="#" role="button"><i class="fas fa-bars"></i></a>
        </li>

    </ul>

    <!-- Right navbar links -->
    <ul class="navbar-nav ml-auto">
        <!-- Navbar Search -->



        @if ($title !== 'Studio')
            <li class="nav-item dropdown ">
                <a class="btn btn-outline-light rounded-pill " data-toggle="dropdown" href="#">
                    <i class="fa fa-plus" aria-hidden="true"></i> Buat
                </a>

                <div class="dropdown-menu dropdown-menu-right ">

                    <a href="{{ url('/studio') }}" class="dropdown-item" data-toggle="modal" data-target="#upload">
                        Upload Video
                    </a>



                </div>

            </li>
        @endif



        <li class="nav-item">
            <a class="nav-link" data-toggle="dropdown" href="#">


                <img src="{{ asset('storage/person/'.$person->foto) }}"
                    class="img-circle elevation-1" alt="User Image" width="20">


            </a>
            <div class="dropdown-menu dropdown-menu-lg dropdown-menu-right ">
                <span class="dropdown-item dropdown-header">{{ $person->fullName }}</span>
                <div class="dropdown-divider"></div>

                <a href="{{ url('/studio') }}" class="dropdown-item">
                    <img src="{{ asset('storage/person/'.$person->foto) }}"
                        class="img-circle elevation-1 mr-2" alt="User Image" width="20"> Lihat Channel Anda
                </a>


                <a href="{{ url('/logout') }}" class="dropdown-item dropdown-footer">Logout</a>
            </div>
        </li>

    </ul>
</nav>


<div class="modal fade" id="upload" aria-modal="true" role="dialog">
    <div class="modal-dialog">
        <div class="modal-content bg-dark">
            <form action="{{ url('/konten') }} " method="POST" enctype="multipart/form-data">
                @csrf
                <div class="modal-header">
                    <h4 class="modal-title">Upload video</h4>
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">×</span>
                    </button>
                </div>
                <div class="modal-body">

                    <div class="mb-3">
                        <label for="judul" class="form-label">Judul (Wajib Diisi)</label>
                        <input type="text" class="form-control" id="judul" aria-describedby="judul"
                            name="title" required>
                    </div>
                    <div class="mb-3">
                        <label for="deskripsi" class="form-label">Deskripsi</label>
                        <textarea class="form-control" name="description" id="" cols="10"></textarea>
                    </div>


                  
                    <div class="form-group">
                        <label for="video">Video</label>
                        <div class="input-group">
                            <div class="custom-file">
                                <input type="file" class="custom-file-input" id="video" name="video" required>
                                <label class="custom-file-label" for="exampleInputFile"></label>
                            </div>
                            <div class="input-group-append">
                                <span class="input-group-text">Upload</span>
                            </div>
                        </div>
                    </div>

                </div>
                <div class="modal-footer justify-content-between">
                    <button type="button" class="btn btn-outline-light" data-dismiss="modal">Close</button>
                    <button type="submit" class="btn btn-outline-light">Save changes</button>
                </div>
            </form>
        </div>
        <!-- /.modal-content -->
    </div>
    <!-- /.modal-dialog -->
</div>
