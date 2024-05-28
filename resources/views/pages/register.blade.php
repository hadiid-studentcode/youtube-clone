<!doctype html>
<html lang="en">

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>{{ env('APP_NAME') }}</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet"
        integrity="sha384-QWTKZyjpPEjISv5WaRU9OFeRpok6YctnYmDr5pNlyT2bRjXh0JMhjY6hW+ALEwIH" crossorigin="anonymous">

    <style>
        body {
            margin: 0;
            padding: 0;
        }

        .login {
            width: 100%;
            justify-content: center;
            align-items: center;
            height: 100vh;
            display: flex;
        }

        .wreapper {
            display: flex;
            justify-content: center;
            align-items: center;
            width: 300vh;

        }
    </style>
</head>

<body style="background-color: rgb(240, 248, 253)">

    <main class=" ">
        <div class="container login">



            <div class="row wreapper  p-5 mx-auto border rounded shadow" style="background-color: white">
                <div class="row align-items-center">
                    <div class="col fs-1 fw-bold">
                        <h1 class="m-0 p-5 text-center fw-bold"
                            style="font-size: 34px;font-family: 'Gill Sans', 'Gill Sans MT', Calibri, 'Trebuchet MS', sans-serif">
                            Halaman Register</h1>
                    </div>
                    <div class="col">
                        <form action="{{ url('/register') }}" method="POST" class="row g-3">
                            @csrf
                            <div class="col-md-6">
                                <label for="fullname" class="form-label">FullName</label>
                                <input type="text" class="form-control" id="fullname" name="fullname" required>
                            </div>
                            <div class="col-md-6">
                                <label for="email" class="form-label">Email</label>
                                <input type="email" class="form-control" id="email" name="email" required>
                            </div>
                            <div class="col-12">
                                <label for="username" class="form-label">Username</label>
                                <input type="text" class="form-control" id="username" name="username" required>
                            </div>
                            <div class="col-12">
                                <label for="password" class="form-label">Password</label>
                                <input type="password" class="form-control" id="password" name="password" required>
                            </div>
                            <div class="col-md-6">
                                <label for="alamat" class="form-label">Alamat</label>
                                <input type="text" class="form-control" id="alamat" name="alamat" required>
                            </div>
                            <div class="col-md-6">
                                <label for="tanggalLahir" class="form-label">Tanggal Lahir</label>
                                <input type="date" class="form-control" id="tanggalLahir" name="tanggalLahir" required>
                            </div>
                            <div class="col-md-4">
                                <label for="jk" class="form-label">Jenis Kelamin</label>
                                <select id="jk" name="jk" class="form-select" required>
                                    <option selected>Pilih...</option>
                                    <option value="laki-laki">Laki-laki</option>
                                    <option value="perempuan">Perempuan</option>
                                </select>
                            </div>

                            <div class="input-group mb-3">
                                <input type="file" class="form-control" id="foto" name="foto">
                                <label class="input-group-text" for="inputGroupFile02">Upload</label>
                            </div>
                          
                            <div class="col-12">
                                <button type="submit" class="btn btn-primary">Register</button>
                            </div>
                        </form>

                        <ul class="list-group mt-4 mb-4">
                            <li class="list-group-item">Sudah ada akun? <a class="text-decoration-none"
                                    href="{{ url('/login') }}">Login</a> Sekarang</li>

                        </ul>
                    </div>

                </div>
            </div>

        </div>
    </main>


    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js"
        integrity="sha384-YvpcrYf0tY3lHB60NNkmXc5s9fDVZLESaAA55NDzOxhy9GkcIdslK1eN7N6jIeHz" crossorigin="anonymous">
    </script>
</body>

</html>
