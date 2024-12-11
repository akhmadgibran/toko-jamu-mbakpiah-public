<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">

    {{-- font --}}
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Commissioner:wght@100..900&display=swap" rel="stylesheet">
    <script type="module" src="https://unpkg.com/ionicons@7.1.0/dist/ionicons/ionicons.esm.js"></script>
    <script nomodule src="https://unpkg.com/ionicons@7.1.0/dist/ionicons/ionicons.js"></script>
    @vite('resources/css/app.css')
    <title>Jamu Mbak Piah</title>
</head>
<body class="font-['Commissioner']  min-h-screen bg-cover bg-no-repeat " style="background-image: url('/images/backgrounds/stacked-waves-haikei.png'); mt-[80px] " >
    @include('layouts.navigations.navigationV2')
    @include('layouts.flash-message')

    @yield('content')
    @include('layouts.footer-shopper')
</body>
</html>