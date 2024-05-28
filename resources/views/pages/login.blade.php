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
            width: 100vh;

        }
    </style>
</head>

<body style="background-color: rgb(240, 248, 253)">

    <main class=" ">
        <div class="container login">
            <div class="row wreapper  p-5 mx-auto border rounded shadow" style="background-color: white">
                <div class="col fs-1 fw-bold">
                    <h1 class="m-0 p-5 text-center fw-bold"
                        style="font-size: 40px;font-family: 'Gill Sans', 'Gill Sans MT', Calibri, 'Trebuchet MS', sans-serif">
                        Halaman Login</h1>
                </div>
                <div class="col">
                    <form action="{{ url('/login') }}" method="POST">
                        @csrf
                        <div class="mb-3">
                            <label for="username" class="form-label">Username</label>
                            <input type="text" class="form-control" id="username" name="username" aria-describedby="username">
                        </div>
                        <div class="mb-3">
                            <label for="password" class="form-label">Password</label>
                            <input type="password" class="form-control" id="password" name="password">
                        </div>
                        <button type="submit" class="btn btn-primary">Submit</button>
                    </form>

                    <ul class="list-group mt-4 mb-4">
                        <li class="list-group-item">Belum ada akun? <a class="text-decoration-none"
                                href="{{ url('/register') }}">Daftar</a> Sekarang</li>

                    </ul>
                </div>


            </div>
        </div>
    </main>


    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js"
        integrity="sha384-YvpcrYf0tY3lHB60NNkmXc5s9fDVZLESaAA55NDzOxhy9GkcIdslK1eN7N6jIeHz" crossorigin="anonymous">
    </script>
</body>

</html>
