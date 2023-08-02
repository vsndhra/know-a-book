<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-EVSTQN3/azprG1Anm3QDgpJLIm9Nao0Yz1ztcQTwFspd3yD65VohhpuuCOmLASjC" crossorigin="anonymous">
    <link rel="stylesheet" href="{{ asset('css/style.css') }}">
    <title>Know a book!</title>
</head>
<body style="background-image: url({{asset('images/background-image-one.png')}});">
    <div class="d-flex flex-column align-items-center justify-content-center p-5" id="wrapper">
        <h5 class="text-white pb-2">Hii, Welcome to <strong>Know a book!</strong></h5>
        <form action="{{ route('search') }}" method="POST" class="d-flex flex-column align-items-center justify-content-center w-100">
            @csrf
            <div class="input-group mb-3 w-50">
                <input type="text" class="form-control" name="book-name" for="book-name" placeholder="Type in a book's name...">
                <div class="input-group-append">
                    <button class="btn border border-white text-white">Search</button>
                </div>
            </div>
        </form>
        <div id="contents" class="w-75">
            @yield('contents')
        </div>
    </div>
</body>
<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/js/bootstrap.bundle.min.js" integrity="sha384-MrcW6ZMFYlzcLA8Nl+NtUVF0sA7MsXsP1UyJoMp4YLEuNSfAP+JcXn/tWtIaxVXM" crossorigin="anonymous"></script>
</html>