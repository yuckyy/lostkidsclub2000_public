<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="{{asset('css/bootstrap/bootstrap.css')}}">
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.7.1/jquery.min.js"></script>
    <link rel="stylesheet" href="{{asset('css/admin.css')}}">
    <title>ADMIN</title>
</head>
<body id="contentBody">

<nav class="navbar navbar-expand-lg navbar-dark bg-dark">
    <div class="container-fluid">
        <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarNav" aria-controls="navbarNav" aria-expanded="false" aria-label="Toggle navigation">
            <span class="navbar-toggler-icon"></span>
        </button>
        <div class="collapse navbar-collapse" id="navbarNav">
            <ul class="navbar-nav">
                <li class="nav-item">
{{--                    <a class="nav-link" href="{{route('/')}}">Home</a>--}}
                </li>
                <li class="nav-item">
                    <a class="nav-link" href="{{route('admin.product')}}">Products</a>
                </li>
                <li class="nav-item">
                    <a class="nav-link" href="#">Categories</a>
                </li>
                <li class="nav-item">
                    <a class="nav-link" href="#">Orders</a>
                </li>
            </ul>
        </div>
        <ul class="navbar-nav">
            <!-- ... Ваши другие пункты меню ... -->
            <li class="nav-item">
                <a class="nav-link" href="{{ route('admin.dashboard', ['logout' => 1]) }}">Logout</a>
            </li>
        </ul>
    </div>
</nav>



