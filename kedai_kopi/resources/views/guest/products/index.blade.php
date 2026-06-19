<!DOCTYPE html>
<html lang="en">

<head>

    <meta charset="UTF-8">

    <meta name="viewport"
        content="width=device-width, initial-scale=1.0">

    <title>Menu Produk - KOPIN</title>

    @vite(['resources/css/app.css','resources/js/app.js'])

</head>

<body class="bg-[#F8F3EA]">

    <!-- ISI HALAMAN DISINI -->

    <div class="min-h-screen bg-[#F8F3EA]">

        <!-- NAVBAR -->

        <nav class="fixed top-0 left-0 right-0 z-50 backdrop-blur-xl bg-black/30 border-b border-white/10">

            <div class="max-w-7xl mx-auto px-8 py-5 flex justify-between items-center">

                <a href="/" class="flex items-center gap-4">

                    <img
                        src="{{ asset('img/kopin2.png') }}"
                        class="h-12">

                    <div>

                        <h1 class="text-white text-3xl font-black">
                            KOPIN
                        </h1>

                        <p class="text-stone-300 text-sm">
                            Coffee For Life
                        </p>

                    </div>

                </a>

                <div class="flex items-center gap-4">

                    <a
                        href="/"
                        class="px-5 py-3 rounded-xl border border-white/20 text-white hover:bg-white/10 transition">

                        Kembali

                    </a>

                </div>

            </div>

        </nav>

        <!-- HERO -->

        <section
            class="relative h-[70vh] flex items-center overflow-hidden">

            <!-- BG -->

            <img
                src="https://images.unsplash.com/photo-1509042239860-f550ce710b93?auto=format&fit=crop&w=2000&q=80"
                class="absolute inset-0 w-full h-full object-cover">

            <div
                class="absolute inset-0 bg-black/70">
            </div>

            <div
                class="absolute inset-0 bg-gradient-to-r from-black via-black/40 to-transparent">
            </div>

            <!-- CONTENT -->

            <div
                class="relative z-10 max-w-7xl mx-auto px-8 w-full">

                <span
                    class="inline-flex items-center gap-3 px-6 py-3 rounded-full border border-white/30 text-white backdrop-blur-md">

                    <x-heroicon-o-cube class="w-5 h-5" />

                    Coffee Menu Collection

                </span>

                <h1
                    class="mt-8 text-7xl font-black text-white max-w-4xl leading-tight">

                    Temukan Menu
                    Favoritmu

                </h1>

                <p
                    class="mt-6 text-xl text-stone-300 max-w-2xl leading-relaxed">

                    Nikmati berbagai pilihan kopi, non-coffee,
                    dan snack terbaik yang dibuat dari bahan berkualitas.

                </p>

                <!-- STATS -->

                <div
                    class="flex flex-wrap gap-8 mt-12">

                    <div>

                        <h2 class="text-5xl font-black text-white">
                            {{ $products->count() }}+
                        </h2>

                        <p class="text-stone-300">
                            Produk
                        </p>

                    </div>

                    <div>

                        <h2 class="text-5xl font-black text-white">
                            15+
                        </h2>

                        <p class="text-stone-300">
                            Variasi Menu
                        </p>

                    </div>

                    <div>

                        <h2 class="text-5xl font-black text-white">
                            100%
                        </h2>

                        <p class="text-stone-300">
                            Premium Coffee
                        </p>

                    </div>

                </div>

            </div>

        </section>

        <!-- SEARCH -->

        <section class="py-16">

            <div class="max-w-7xl mx-auto px-8">

                <div
                    class="bg-white rounded-[35px]
                shadow-[0_20px_60px_rgba(0,0,0,.08)]
                p-8">

                    <div
                        class="flex flex-col lg:flex-row gap-4">

                        <div class="flex-1 relative">

                            <x-heroicon-o-magnifying-glass
                                class="w-5 h-5 absolute left-5 top-1/2 -translate-y-1/2 text-stone-400" />

                            <input
                                type="text"
                                placeholder="Cari menu favorit..."
                                class="w-full pl-14 pr-5 py-4 rounded-2xl border border-stone-200 focus:outline-none">

                        </div>

                        <select
                            class="px-6 py-4 rounded-2xl border border-stone-200">

                            <option>Semua Kategori</option>
                            <option>Hot Drinks</option>
                            <option>Cold Drinks</option>
                            <option>Snacks</option>

                        </select>

                    </div>

                </div>

            </div>

        </section>

        <!-- PRODUCT GRID -->

        <section class="pb-24">

            <div class="max-w-7xl mx-auto px-8">

                @php
                $productImages = [
                'https://images.unsplash.com/photo-1511920170033-f8396924c348',
                'https://images.unsplash.com/photo-1509042239860-f550ce710b93',
                'https://images.unsplash.com/photo-1495474472287-4d71bcdd2085',
                'https://images.unsplash.com/photo-1447933601403-0c6688de566e',
                'https://images.unsplash.com/photo-1517701604599-bb29b565090c',
                'https://images.unsplash.com/photo-1514432324607-a09d9b4aefdd',
                ];
                @endphp

                <!-- HEADER -->

                <div class="text-center mb-20">

                    <span
                        class="inline-flex items-center gap-3 px-6 py-3 rounded-full bg-white shadow-lg">

                        <x-heroicon-o-cube class="w-5 h-5" />

                        Signature Coffee Collection

                    </span>

                    <h2
                        class="text-6xl font-black text-[#2B2118] mt-8">

                        Semua Produk KOPIN

                    </h2>

                    <p
                        class="text-xl text-stone-500 mt-5 max-w-2xl mx-auto">

                        Pilihan kopi premium, minuman segar, dan makanan favorit pelanggan.

                    </p>

                </div>

                <!-- GRID -->

                <div class="grid md:grid-cols-2 xl:grid-cols-3 gap-10">

                    @foreach($products as $index => $product)

                    @php

                    $price = $product->variant->min('price');

                    $variants = $product->variant;

                    @endphp

                    <div
                        data-aos="zoom-in"
                        class="group relative h-[560px]
                overflow-hidden
                rounded-[40px]
                shadow-[0_25px_80px_rgba(0,0,0,.15)]
                hover:-translate-y-3
                transition-all duration-500">

                        <!-- IMAGE -->

                        <img
                            src="{{ $productImages[$index % count($productImages)] }}?auto=format&fit=crop&w=1200&q=80"
                            class="absolute inset-0 w-full h-full object-cover group-hover:scale-110 transition duration-700">

                        <!-- OVERLAY -->

                        <div
                            class="absolute inset-0 bg-gradient-to-t from-black via-black/40 to-transparent">
                        </div>

                        <!-- BADGE -->

                        <div
                            class="absolute top-6 left-6 right-6 flex justify-between z-20">

                            <span
                                class="px-4 py-2 rounded-full bg-[#8B5E3C] text-white text-sm font-semibold">

                                {{ $product->category }}

                            </span>

                            

                        </div>

                        <!-- CONTENT -->

                        <div
                            class="absolute bottom-0 left-0 right-0 p-8 text-white z-20">

                            <h3
                                class="text-5xl font-black leading-tight">

                                {{ $product->name }}

                            </h3>

                            <p
                                class="mt-4 text-stone-200 line-clamp-2 text-lg">

                                {{ $product->description }}

                            </p>

                            <!-- VARIANTS -->

                            <div
                                class="flex flex-wrap gap-2 mt-6">

                                @foreach($variants as $variant)

                                <span
                                    class="px-4 py-2 rounded-full bg-white/10 backdrop-blur-md text-sm">

                                    {{ $variant->variant_name }}

                                </span>

                                @endforeach

                            </div>

                            <!-- PRICE -->

                            <div
                                class="mt-8 flex justify-between items-center">

                                <div>

                                    <p
                                        class="text-stone-300 text-sm">

                                        Mulai dari

                                    </p>

                                    <h4
                                        class="text-4xl font-black">

                                        Rp {{ number_format($price * 10000,0,',','.') }}

                                    </h4>

                                </div>

                                <a
                                    href="{{ route('products.show',$product->id) }}"
                                    class="w-16 h-16 rounded-full bg-[#8B5E3C]
    flex items-center justify-center
    hover:scale-110 transition">

                                    <x-heroicon-o-arrow-right
                                        class="w-7 h-7 text-white" />

                                </a>

                            </div>

                        </div>

                    </div>

                    @endforeach

                </div>

            </div>

        </section>

</body>

</html>