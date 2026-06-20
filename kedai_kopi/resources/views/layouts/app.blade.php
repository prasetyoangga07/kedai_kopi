<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Kopin</title>
    <link rel="icon" type="image/png" href="{{ asset('img/kopin2.png') }}">

    @vite(['resources/css/app.css','resources/js/app.js'])
</head>
<script src="https://unpkg.com/aos@2.3.4/dist/aos.js"></script>

<script>
    AOS.init({
        duration: 1000,
        once: true,
        offset: 100
    });
</script>
<body class="bg-linear-to-b from-[#FFFDF8] via-[#FAF3E0] to-[#F3E5D3] text-[#2B2118] overflow-x-hidden">

    <!-- BACKGROUND GLOW -->

    <div class="fixed inset-0 -z-10 overflow-hidden">
        <div class="absolute top-0 left-0 w-125 h-125 bg-[#A67B5B]/10 rounded-full blur-[180px]"></div>
        <div class="absolute right-0 bottom-0 w-150 h-150 bg-[#DDB892]/15 rounded-full blur-[220px]"></div>
    </div>

    @include('layouts.navbar')
    
    <main>
        @yield('content')
    </main>

</body>
</html>