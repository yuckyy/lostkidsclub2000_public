<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8"/>
    <meta http-equiv="X-UA-Compatible" content="IE=edge"/>
    <meta name="viewport" content="width=device-width, initial-scale=1.0"/>
    <title>@if(isset($pageTitle)){{$pageTitle}}@else LOSTKIDSCLUB2000 @endif</title>
    <link rel="stylesheet" href="../css/main.css"/>

    <link rel="icon" type="image/x-icon" href="../img/favicons/favicon-16x16.png"/>
    <link rel="apple-touch-icon" sizes="180x180" href="../img/favicons/apple-touch-icon.png"/>
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com/" crossorigin>
{{--    <link href="https://fonts.googleapis.com/css2?family=Arimo:ital,wght@0,400..700;1,400..700&family=Inter:wght@100..900&display=swap" rel="stylesheet">--}}
</head>


<body @if(Route::current()->uri() == '/') @else class="page-main-padding"@endif>

@include('partials.includes.header')

@yield('content')

@include('partials.includes.footer')
</body>
</html>
