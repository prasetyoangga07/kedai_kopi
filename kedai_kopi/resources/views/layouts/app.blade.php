<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>KOPIN</title>
    <link rel="icon" type="image/png" href="{{ asset('img/kopin2.png') }}">

    @vite(['resources/css/app.css','resources/js/app.js'])

    <script src="https://cdn.jsdelivr.net/npm/chart.js"></script>

    <script defer src="https://cdn.jsdelivr.net/npm/alpinejs@3.x.x/dist/cdn.min.js"></script>
</head>

<body
x-data="{

    sidebarOpen:true,

    customerModal:false,
    customerDetail:false,
    customerEdit:false,
    customerDelete:false,

    productModal:false,
    campaignModal:false,
    reportModal:false,
    aprioriModal:false

}"
class="bg-[#F8F3ED] overflow-x-hidden">

@include('layouts.sidebar')

<div
    :class="sidebarOpen ? 'ml-64' : 'ml-20'"
    class="min-h-screen transition-all duration-300">

    <!-- HEADER -->

    <header
        class="sticky top-0 z-40 bg-white/90 backdrop-blur-xl border-b border-[#E6D7C8] shadow-sm">

        <div class="flex justify-between items-center px-8 py-4">

            <div class="flex items-center gap-4">

                <button
                    @click="sidebarOpen = !sidebarOpen"
                    class="w-12 h-12 rounded-2xl bg-[#FAF3E0] hover:bg-[#EEDCC8] transition flex items-center justify-center">

                    ☰

                </button>

                <div>

                    <h1 class="text-2xl font-bold text-[#2B2118]">
                        KOPIN CRM
                    </h1>

                    <p class="text-sm text-[#8B6E54]">
                        Coffee Business Intelligence
                    </p>

                </div>

            </div>

            <div class="flex items-center gap-4">

<div
        class="hidden md:flex items-center gap-3
        bg-white
        border border-[#E8D8C4]
        px-4 py-2
        rounded-2xl
        shadow-sm">

        <div
            class="w-9 h-9 rounded-xl
            bg-[#F8F3ED]
            flex items-center justify-center">

            <svg xmlns="http://www.w3.org/2000/svg"
                 class="w-5 h-5 text-[#6F4E37]"
                 fill="none"
                 viewBox="0 0 24 24"
                 stroke="currentColor">

                <path stroke-linecap="round"
                      stroke-linejoin="round"
                      stroke-width="2"
                      d="M8 7V3m8 4V3m-9 8h10m-11 9h12a2 2 0 002-2V7a2 2 0 00-2-2H6a2 2 0 00-2 2v11a2 2 0 002 2z"/>

            </svg>

        </div>

        <div>

            <p class="text-[10px] text-stone-400">
                Hari Ini
            </p>

            <p class="font-semibold text-[#6F4E37] text-sm">
                {{ now()->translatedFormat('d F Y') }}
            </p>

        </div>

    </div>

    <button
        class="w-12 h-12 rounded-2xl
        bg-white
        border border-[#E8D8C4]
        hover:bg-[#F8F3ED]
        transition
        flex items-center justify-center
        shadow-sm">

        <svg xmlns="http://www.w3.org/2000/svg"
             class="w-5 h-5 text-[#6F4E37]"
             fill="none"
             viewBox="0 0 24 24"
             stroke="currentColor">

            <path stroke-linecap="round"
                  stroke-linejoin="round"
                  stroke-width="2"
                  d="M15 17h5l-1.4-1.4A2 2 0 0118 14.2V11a6 6 0 10-12 0v3.2a2 2 0 01-.6 1.4L4 17h5m6 0v1a3 3 0 11-6 0v-1m6 0H9"/>

        </svg>

    </button>

                <div
                    class="w-12 h-12 rounded-2xl bg-gradient-to-r from-[#6F4E37] to-[#A67B5B] text-white flex items-center justify-center font-bold">

                    A

                </div>

            </div>

        </div>

    </header>

    <!-- CONTENT -->

    <main class="p-8">

        @yield('content')

    </main>

</div>

<!-- MODAL BACKDROP -->
<div
    x-show="customerModal || customerDetail || customerEdit || customerDelete || productModal || campaignModal || reportModal || aprioriModal"
    x-transition.opacity
    class="fixed inset-0 z-[9998] bg-[#2B2118]/25">
</div>

@yield('modals')

</body>
</html>