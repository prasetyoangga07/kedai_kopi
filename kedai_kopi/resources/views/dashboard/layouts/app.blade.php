<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta name="csrf-token" content="{{ csrf_token() }}">
    <title>KOPIN</title>
    <link rel="icon" type="image/png" href="{{ asset('img/kopin2.png') }}">

    @vite(['resources/css/app.css', 'resources/js/app.js'])

    <script src="https://cdn.jsdelivr.net/npm/chart.js"></script>

    <script defer src="https://cdn.jsdelivr.net/npm/alpinejs@3.x.x/dist/cdn.min.js"></script>
</head>

<body x-data="dashboardJs(@js(Route::currentRouteName()))" class="bg-[#F8F3ED] overflow-x-hidden">

    @include('dashboard.layouts.sidebar')

    <div :class="sidebarOpen ? 'ml-64' : 'ml-20'" class="min-h-screen transition-all duration-300">

        <!-- HEADER -->
        <header class="sticky top-0 z-40 bg-white/90 backdrop-blur-xl border-b border-[#E6D7C8] shadow-sm">
            <div class="flex justify-between items-center px-8 py-4">
                <div class="flex items-center gap-4">
                    <button @click="sidebarOpen = !sidebarOpen"
                        class="w-12 h-12 p-3 rounded-2xl bg-[#FAF3E0] text-[#8B6E54] hover:bg-[#EEDCC8] transition flex items-center justify-center cursor-pointer">
                        <x-heroicon-o-bars-3 />
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

                        <div class="w-9 h-9 p-1 rounded-xl bg-[#F8F3ED] text-[#8B6E54] flex items-center justify-center">
                            <x-heroicon-o-calendar-days />
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
                        class="w-12 h-12 p-2 rounded-2xl
                            bg-white text-[#8B6E54]
                            border border-[#E8D8C4]
                            hover:bg-[#F8F3ED]
                            transition
                            flex items-center justify-center
                            shadow-sm
                            cursor-pointer">

                        <x-heroicon-o-bell />

                    </button>

                    <div
                        class="w-12 h-12 rounded-2xl bg-linear-to-r from-[#6F4E37] to-[#A67B5B] text-white flex items-center justify-center font-bold">

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

    @yield('modals')

    <!-- NOTIFIKASI PESAN TOAST -->
    <div x-data="toast" class="fixed top-20 right-20 z-50">
        <div x-show="show" x-transition class="px-4 py-3 rounded-lg shadow-lg text-white"
            :class="type === 'success'
                ?
                'bg-green-600' :
                'bg-red-600'">
            <span x-text="message"></span>
        </div>
    </div>

    @if (session('success'))
        <script>
            window.addEventListener('load', () => {
                window.dispatchEvent(
                    new CustomEvent('toast', {
                        detail: {
                            type: 'success',
                            message: '{{ session('success') }}'
                        }
                    })
                );
            });
        </script>
    @endif

    @if (session('error'))
        <script>
            window.addEventListener('load', () => {
                window.dispatchEvent(
                    new CustomEvent('toast', {
                        detail: {
                            type: 'error',
                            message: '{{ session('error') }}'
                        }
                    })
                );
            });
        </script>
    @endif

</body>

</html>
