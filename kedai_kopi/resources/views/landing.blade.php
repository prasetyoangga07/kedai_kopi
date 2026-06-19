<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport"
        content="width=device-width, initial-scale=1.0">

    <title>KOPIN</title>

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

<body class="bg-gradient-to-b from-[#FFFDF8] via-[#FAF3E0] to-[#F3E5D3] text-[#2B2118] overflow-x-hidden">

    <!-- BACKGROUND GLOW -->

    <div class="fixed inset-0 -z-10 overflow-hidden">

        <div class="absolute top-0 left-0 w-[500px] h-[500px] bg-[#A67B5B]/10 rounded-full blur-[180px]"></div>

        <div class="absolute right-0 bottom-0 w-[600px] h-[600px] bg-[#DDB892]/15 rounded-full blur-[220px]"></div>

    </div>

    <!-- NAVBAR -->

    <nav
        x-data="{ scrolled:false }"
        @scroll.window="scrolled = window.pageYOffset > 50"
        :class="scrolled
        ? 'bg-[#120C07]/95 backdrop-blur-xl shadow-2xl'
        : 'bg-transparent'"
        class="fixed top-0 left-0 right-0 z-50 transition-all duration-500">

        <div class="max-w-7xl mx-auto px-8">

            <div class="h-24 flex justify-between items-center">

                <div class="flex items-center gap-4">

                    <img
                        src="{{ asset('img/kopin2.png') }}"
                        class="h-14">

                    <div>

                        <h1 class="text-3xl font-black text-white">
                            KOPIN
                        </h1>

                        <p class="text-sm text-stone-500 tetx-white">
                            Coffee for life
                        </p>

                    </div>

                </div>

                <div class="hidden lg:flex items-center gap-10 font-semibold">

                    <a href="#home" class="text-white hover:text-[#8B5E3C] transition">
                        Home
                    </a>

                    <a href="#produk" class="text-white hover:text-[#8B5E3C] transition">
                        Produk
                    </a>

                    <a href="#benefit" class="text-white hover:text-[#8B5E3C] transition">
                        Benefit
                    </a>

                    <a href="#outlet" class="text-white hover:text-[#8B5E3C] transition">
                        Outlet
                    </a>

                </div>

            </div>

        </div>

    </nav>

    <!-- HERO -->

    <section
        class="relative min-h-screen overflow-hidden flex items-center pt-24">

        <!-- BACKGROUND -->

        <div class="absolute inset-0">

            <img
                src="https://images.unsplash.com/photo-1509042239860-f550ce710b93?auto=format&fit=crop&w=2000&q=80"
                class="w-full h-full object-cover">

            <div class="absolute inset-0 bg-black/60"></div>

            <div class="absolute inset-0 bg-gradient-to-r from-black/80 via-black/50 to-transparent"></div>

        </div>

        <!-- CONTENT -->

        <div class="relative z-10 max-w-7xl mx-auto px-8 w-full" id="home">

            <div class="grid lg:grid-cols-2 gap-16 items-center">

                <!-- LEFT -->

                <div>

                    <div
                        class="inline-flex items-center gap-3 px-5 py-3 rounded-full bg-white/10 backdrop-blur-xl border border-white/20 text-white">

                        <x-heroicon-o-sparkles class="w-5 h-5" />

                        <span class="font-semibold">
                            Smart Coffee Make Happy!
                        </span>

                    </div>

                    <h1
                        class="mt-8 text-6xl lg:text-8xl font-black leading-none text-white">

                        Ngopi
                        Lebih
                        Pintar

                    </h1>

                    <p
                        class="mt-8 text-xl text-stone-200 max-w-2xl leading-relaxed">

                        Temukan promo terbaik,
                        kumpulkan poin reward,
                        nikmati loyalty program,
                        dan dapatkan pengalaman kopi yang lebih personal.

                    </p>

                    <div class="flex flex-wrap gap-4 mt-10">

                        <a
                            href="#produk"
                            class="px-8 py-4 rounded-2xl bg-[#8B5E3C] text-white font-bold flex items-center gap-3 hover:scale-105 transition">

                            <x-heroicon-o-cube class="w-5 h-5" />

                            Jelajahi Produk

                        </a>

                        <a
                            href="{{ route('promo.index') }}"
                            class="px-8 py-4 rounded-2xl bg-white text-[#2B2118] font-bold flex items-center gap-3 hover:scale-105 transition">

                            <x-heroicon-o-megaphone class="w-5 h-5" />

                            Lihat Promo

                        </a>

                    </div>

                    <!-- STATS -->

                    <div class="grid grid-cols-3 gap-6 mt-16">

                        <div>

                            <h2 class="text-4xl font-black text-white">
                                1.2K+
                            </h2>

                            <p class="text-stone-300">
                                Pelanggan
                            </p>

                        </div>

                        <div>

                            <h2 class="text-4xl font-black text-white">
                                120+
                            </h2>

                            <p class="text-stone-300">
                                Produk
                            </p>

                        </div>

                        <div>

                            <h2 class="text-4xl font-black text-white">
                                3
                            </h2>

                            <p class="text-stone-300">
                                outlet
                            </p>

                        </div>

                    </div>

                </div>

            </div>

        </div>

    </section>

    <!-- PRODUK  -->

    <section id="produk"
        class="relative py-1 overflow-hidden">

        <!-- ===================================== -->

        <!-- SECTION PRODUK -->

        <!-- ===================================== -->

        <section id="produk" class="py-10 bg-[#F8F3EA]">

            <div class="max-w-7xl mx-auto px-8">

                <!-- HEADER -->

                <div
                    class="text-center mb-20"
                    data-aos="fade-up">

                    <span
                        class="inline-flex items-center gap-2 px-5 py-3 rounded-full bg-white shadow-lg">

                        <x-heroicon-o-cube class="w-5 h-5" />

                        Signature Menu

                    </span>

                    <h2
                        class="text-6xl font-black mt-8 text-[#2B2118]">

                        Produk Favorit Pelanggan

                    </h2>

                    <p
                        class="mt-5 text-xl text-stone-500">

                        Dibuat dari biji kopi pilihan dengan kualitas terbaik.

                    </p>

                    <div class="mt-8 flex justify-center">

                        <a
                            href="{{ route('products.menu') }}"
                            class="group inline-flex items-center gap-3
        px-8 py-4
        rounded-2xl
        bg-[#8B5E3C]
        text-white
        font-bold
        shadow-lg
        hover:shadow-2xl
        hover:scale-105
        transition duration-300">

                            <x-heroicon-o-squares-2x2
                                class="w-5 h-5" />

                            Lihat Semua Produk

                            <x-heroicon-o-arrow-right
                                class="w-5 h-5
            group-hover:translate-x-1
            transition" />

                        </a>

                    </div>


                </div>

                <!-- GRID -->

                <div class="grid lg:grid-cols-3 gap-10">

                    @php
                    $productImages = [
                    'https://images.unsplash.com/photo-1495474472287-4d71bcdd2085',
                    'https://images.unsplash.com/photo-1511920170033-f8396924c348',
                    'https://images.unsplash.com/photo-1509042239860-f550ce710b93',
                    'https://images.unsplash.com/photo-1447933601403-0c6688de566e',
                    'https://images.unsplash.com/photo-1459755486867-b55449bb39ff',
                    'https://images.unsplash.com/photo-1461023058943-07fcbe16d735',
                    ];
                    @endphp

                    @foreach($products as $index => $product)

                    <div
                        data-aos="zoom-in"
                        class="group overflow-hidden rounded-[40px]
                        bg-white/80
                        backdrop-blur-xl
                        border border-white/30
                        shadow-[0_25px_60px_rgba(0,0,0,.18)]
                        hover:-translate-y-4
                        hover:shadow-[0_35px_80px_rgba(0,0,0,.25)]
                        transition-all duration-500">

                        <div class="relative overflow-hidden">
                            <div
                                class="absolute top-5 left-5 z-20">

                                <span
                                    class="px-4 py-2 rounded-full bg-[#8B5E3C]
        text-white text-xs font-bold shadow-lg">

                                    <x-heroicon-s-fire
                                        class="w-4 h-4 inline-block mr-1" />

                                    Best Seller

                                </span>

                            </div>

                            <img
                                src="https://images.unsplash.com/photo-1495474472287-4d71bcdd2085?auto=format&fit=crop&w=1200&q=80"
                                class="h-[420px] w-full object-cover group-hover:scale-110 transition duration-700">

                            <div
                                class="absolute inset-0 bg-gradient-to-t from-black via-black/10 to-transparent">
                            </div>

                            <div
                                class="absolute bottom-0 left-0 p-8 text-white">

                                <span
                                    class="px-4 py-2 rounded-full bg-[#8B5E3C] text-sm">

                                    {{ $product->category }}

                                </span>

                                <h3
                                    class="text-3xl font-bold mt-4">

                                    {{ $product->name }}

                                </h3>

                                <p class="mt-2 text-stone-200">

                                    {{ Str::limit($product->description, 80) }}

                                </p>

                            </div>

                        </div>

                    </div>

                    @endforeach

                </div>

            </div>

        </section>

        <!-- OUTLET  -->
        <!-- ===================================== -->

        <!-- SECTION OUTLET -->

        <!-- ===================================== -->

        <section
            id="outlet"
            class="relative py-32 overflow-hidden">


            <!-- BACKGROUND -->

            <div class="absolute inset-0">

                <img
                    src="https://images.unsplash.com/photo-1554118811-1e0d58224f24?auto=format&fit=crop&w=2000&q=80"
                    class="w-full h-full object-cover">

                <div
                    class="absolute inset-0 bg-[#1A120B]/85">
                </div>

            </div>

            <div
                class="relative z-10 max-w-7xl mx-auto px-8">

                <!-- HEADER -->

                <div
                    class="text-center mb-20"
                    data-aos="fade-up">

                    <span
                        class="inline-flex items-center gap-2 px-5 py-3 rounded-full bg-white/10 backdrop-blur-xl border border-white/10 text-white">

                        <x-heroicon-o-map-pin class="w-5 h-5" />

                        Outlet Kami

                    </span>

                    <h2
                        class="text-6xl font-black text-white mt-8">

                        Hadir di Berbagai Kota

                    </h2>

                    <p
                        class="mt-5 text-xl text-stone-300">

                        Temukan outlet KOPIN terdekat dan nikmati pengalaman ngopi terbaik.

                    </p>

                </div>

                <!-- GRID -->

                <div
                    class="grid lg:grid-cols-3 gap-8">

                    <!-- PURWOKERTO -->

                    <div
                        data-aos="fade-up"
                        class="group bg-white/10 backdrop-blur-xl rounded-[40px] overflow-hidden border border-white/10 hover:-translate-y-3 transition duration-500">

                        <img
                            src="https://images.unsplash.com/photo-1554118811-1e0d58224f24?auto=format&fit=crop&w=1200&q=80"
                            class="h-72 w-full object-cover group-hover:scale-110 transition duration-700">

                        <div class="p-8">

                            <div class="flex items-center gap-2 text-[#DDB892]">

                                <x-heroicon-o-map-pin class="w-5 h-5" />

                                Purwokerto

                            </div>

                            <h3
                                class="text-3xl font-bold text-white mt-4">

                                KOPIN Purwokerto

                            </h3>

                            <p
                                class="text-stone-300 mt-4">

                                Jl. HR Bunyamin No.99, Purwokerto Utara

                            </p>

                        </div>

                    </div>

                    <!-- YOGYAKARTA -->

                    <div
                        data-aos="fade-up"
                        data-aos-delay="150"
                        class="group bg-white/10 backdrop-blur-xl rounded-[40px] overflow-hidden border border-white/10 hover:-translate-y-3 transition duration-500">

                        <img
                            src="https://images.unsplash.com/photo-1501339847302-ac426a4a7cbb?auto=format&fit=crop&w=1200&q=80"
                            class="h-72 w-full object-cover group-hover:scale-110 transition duration-700">

                        <div class="p-8">

                            <div class="flex items-center gap-2 text-[#DDB892]">

                                <x-heroicon-o-map-pin class="w-5 h-5" />

                                Yogyakarta

                            </div>

                            <h3
                                class="text-3xl font-bold text-white mt-4">

                                KOPIN Yogyakarta

                            </h3>

                            <p
                                class="text-stone-300 mt-4">

                                Jl. Kaliurang KM 5, Sleman

                            </p>

                        </div>

                    </div>

                    <!-- JAKARTA -->

                    <div
                        data-aos="fade-up"
                        data-aos-delay="300"
                        class="group bg-white/10 backdrop-blur-xl rounded-[40px] overflow-hidden border border-white/10 hover:-translate-y-3 transition duration-500">

                        <img
                            src="https://images.unsplash.com/photo-1445116572660-236099ec97a0?auto=format&fit=crop&w=1200&q=80"
                            class="h-72 w-full object-cover group-hover:scale-110 transition duration-700">

                        <div class="p-8">

                            <div class="flex items-center gap-2 text-[#DDB892]">

                                <x-heroicon-o-map-pin class="w-5 h-5" />

                                Jakarta

                            </div>

                            <h3
                                class="text-3xl font-bold text-white mt-4">

                                KOPIN SCBD

                            </h3>

                            <p
                                class="text-stone-300 mt-4">

                                District 8 SCBD, Jakarta Selatan

                            </p>

                        </div>

                    </div>

                </div>

            </div>


        </section>

        <!-- OUTLET  -->



        <!-- BENEFIT  -->

        <!-- ===================================== -->

        <!-- BENEFIT MEMBER -->

        <!-- ===================================== -->

        <section
            id="benefit"
            class="py-32 bg-[#120C07]">


            <div
                class="max-w-7xl mx-auto px-8">

                <!-- HEADER -->

                <div
                    class="text-center mb-24"
                    data-aos="fade-up">

                    <span
                        class="inline-flex items-center gap-2 px-5 py-3 rounded-full bg-white/10 border border-white/10 text-white">

                        <x-heroicon-o-star class="w-5 h-5" />

                        Member Benefits

                    </span>

                    <h2
                        class="text-6xl font-black text-white mt-8">

                        Semakin Sering Ngopi
                        <br>
                        Semakin Banyak Keuntungan

                    </h2>

                    <p
                        class="mt-6 text-xl text-stone-400">

                        Dapatkan berbagai keuntungan eksklusif hanya untuk member KOPIN.

                    </p>

                </div>

                <!-- GRID -->

                <div
                    class="grid lg:grid-cols-3 gap-10">

                    <!-- CARD 1 -->

                    <div
                        data-aos="fade-up"
                        class="bg-[#1A120B] rounded-[40px] p-10 border border-white/10 hover:-translate-y-3 transition duration-500">

                        <div
                            class="w-20 h-20 rounded-3xl bg-[#8B5E3C] flex items-center justify-center">

                            <x-heroicon-o-gift class="w-10 h-10 text-white" />

                        </div>

                        <h3
                            class="text-3xl font-bold text-white mt-8">

                            Promo Eksklusif

                        </h3>

                        <p
                            class="text-stone-400 mt-5 leading-relaxed">

                            Nikmati berbagai promo khusus member yang tidak tersedia untuk pelanggan biasa.

                        </p>

                    </div>

                    <!-- CARD 2 -->

                    <div
                        data-aos="fade-up"
                        data-aos-delay="150"
                        class="bg-[#1A120B] rounded-[40px] p-10 border border-white/10 hover:-translate-y-3 transition duration-500">

                        <div
                            class="w-20 h-20 rounded-3xl bg-[#8B5E3C] flex items-center justify-center">

                            <x-heroicon-o-trophy class="w-10 h-10 text-white" />

                        </div>

                        <h3
                            class="text-3xl font-bold text-white mt-8">

                            Loyalty Point

                        </h3>

                        <p
                            class="text-stone-400 mt-5 leading-relaxed">

                            Setiap transaksi akan menghasilkan poin yang dapat ditukarkan dengan reward menarik.

                        </p>

                    </div>

                    <!-- CARD 3 -->

                    <div
                        data-aos="fade-up"
                        data-aos-delay="300"
                        class="bg-[#1A120B] rounded-[40px] p-10 border border-white/10 hover:-translate-y-3 transition duration-500">

                        <div
                            class="w-20 h-20 rounded-3xl bg-[#8B5E3C] flex items-center justify-center">

                            <x-heroicon-o-bell-alert class="w-10 h-10 text-white" />

                        </div>

                        <h3
                            class="text-3xl font-bold text-white mt-8">

                            Promo Notification

                        </h3>

                        <p
                            class="text-stone-400 mt-5 leading-relaxed">

                            Dapatkan informasi campaign dan promo terbaru lebih cepat.

                        </p>

                    </div>

                </div>

            </div>


        </section>

        <!-- ===================================== -->

        <!-- CTA -->

        <!-- ===================================== -->

        <section
            class="relative overflow-hidden py-32 bg-[#2B2118]">


            <div
                class="absolute inset-0">

                <img
                    src="https://images.unsplash.com/photo-1495474472287-4d71bcdd2085?auto=format&fit=crop&w=2000&q=80"
                    class="w-full h-full object-cover">

                <div
                    class="absolute inset-0 bg-[#2B2118]/85">
                </div>

            </div>

            <div
                class="relative z-10 max-w-5xl mx-auto px-8 text-center">

                <div
                    data-aos="zoom-in">

                    <span
                        class="inline-flex items-center gap-2 px-5 py-3 rounded-full bg-white/10 backdrop-blur-xl border border-white/10 text-white">

                        <x-heroicon-o-fire class="w-5 h-5" />

                        Join Membership

                    </span>

                    <h2
                        class="text-6xl font-black text-white mt-8 leading-tight">

                        Jadilah Bagian Dari
                        <br>
                        Komunitas Pecinta Kopi

                    </h2>

                    <p
                        class="text-xl text-stone-300 mt-8">

                        Kumpulkan poin, nikmati promo eksklusif, dan dapatkan pengalaman ngopi yang lebih personal.

                    </p>

                    <div
                        class="flex justify-center gap-5 mt-12">

                        <a href="{{ route('register') }}"
                            class="px-10 py-5 rounded-2xl bg-[#8B5E3C] text-white font-bold hover:scale-105 transition">

                            Daftar Sekarang

                        </a>

                        <button
                            class="px-10 py-5 rounded-2xl border border-white/20 text-white font-bold hover:bg-white/10 transition">

                            Pelajari Lebih Lanjut

                        </button>

                    </div>

                </div>

            </div>


        </section>

        <!-- ===================================== -->

        <!-- TESTIMONI -->

        <!-- ===================================== -->

        <section
            class="py-32 bg-[#F8F3EA]">


            <div
                class="max-w-7xl mx-auto px-8">

                <div
                    class="text-center mb-20"
                    data-aos="fade-up">

                    <span
                        class="inline-flex items-center gap-2 px-5 py-3 rounded-full bg-white shadow-lg">

                        <x-heroicon-o-chat-bubble-left-right class="w-5 h-5" />

                        Testimoni

                    </span>

                    <h2
                        class="text-6xl font-black mt-8 text-[#2B2118]">

                        Apa Kata Pelanggan Kami

                    </h2>

                </div>

                <div
                    class="grid lg:grid-cols-3 gap-8">

                    <div
                        data-aos="fade-up"
                        class="bg-white rounded-[40px] p-10 shadow-xl">

                        <div class="flex mb-5">

                            ★★★★★

                        </div>

                        <p class="text-stone-600 leading-relaxed">

                            Kopinya konsisten enak dan promonya sering banget.
                            Jadi langganan setiap minggu.

                        </p>

                        <h4 class="font-bold mt-8">
                            Budi Santoso
                        </h4>

                    </div>

                    <div
                        data-aos="fade-up"
                        data-aos-delay="150"
                        class="bg-white rounded-[40px] p-10 shadow-xl">

                        <div class="flex mb-5">

                            ★★★★★

                        </div>

                        <p class="text-stone-600 leading-relaxed">

                            Loyalty point-nya membantu banget.
                            Setiap transaksi selalu dapat benefit.

                        </p>

                        <h4 class="font-bold mt-8">
                            Sinta Putri
                        </h4>

                    </div>

                    <div
                        data-aos="fade-up"
                        data-aos-delay="300"
                        class="bg-white rounded-[40px] p-10 shadow-xl">

                        <div class="flex mb-5">

                            ★★★★★

                        </div>

                        <p class="text-stone-600 leading-relaxed">

                            Tempat nyaman, kopi berkualitas,
                            dan aplikasi membernya memudahkan.

                        </p>

                        <h4 class="font-bold mt-8">
                            Rizky Pratama
                        </h4>

                    </div>

                </div>

            </div>


        </section>

        <!-- ===================================== -->

        <!-- FOOTER -->

        <!-- ===================================== -->

        <footer
            class="bg-[#120C07] text-white">


            <div
                class="max-w-7xl mx-auto px-8 py-24">

                <div
                    class="grid lg:grid-cols-4 gap-16">

                    <!-- BRAND -->

                    <div>

                        <h2
                            class="text-5xl font-black">

                            KOPIN

                        </h2>

                        <p
                            class="text-stone-400 mt-6 leading-relaxed">

                            Coffee CRM Platform untuk membantu pelanggan
                            mendapatkan pengalaman ngopi yang lebih personal.

                        </p>

                    </div>

                    <!-- MENU -->

                    <div>

                        <h3
                            class="font-bold text-xl mb-6">

                            Menu

                        </h3>

                        <ul
                            class="space-y-4 text-stone-400">

                            <li>
                                Promo
                            </li>

                            <li>
                                Produk
                            </li>

                            <li>
                                Outlet
                            </li>

                            <li>
                                Benefit
                            </li>

                        </ul>

                    </div>

                    <!-- SUPPORT -->

                    <div>

                        <h3
                            class="font-bold text-xl mb-6">

                            Bantuan

                        </h3>

                        <ul
                            class="space-y-4 text-stone-400">

                            <li>
                                FAQ
                            </li>

                            <li>
                                Kontak
                            </li>

                            <li>
                                Kebijakan Privasi
                            </li>

                        </ul>

                    </div>

                    <!-- CONTACT -->

                    <div>

                        <h3
                            class="font-bold text-xl mb-6">

                            Hubungi Kami

                        </h3>

                        <div class="space-y-4 text-stone-400">

                            <div class="flex items-center gap-3">

                                <x-heroicon-o-envelope class="w-5 h-5" />

                                hello@kopin.id

                            </div>

                            <div class="flex items-center gap-3">

                                <x-heroicon-o-phone class="w-5 h-5" />

                                +62 812 3456 7890

                            </div>

                            <div class="flex items-center gap-3">

                                <x-heroicon-o-map-pin class="w-5 h-5" />

                                Purwokerto, Indonesia

                            </div>

                        </div>

                    </div>

                </div>

                <div
                    class="border-t border-white/10 mt-16 pt-8 text-center text-stone-500">

                    © 2026 KOPIN CRM. All Rights Reserved.

                </div>

            </div>


        </footer>



</body>

</html>