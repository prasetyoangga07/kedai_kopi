<!DOCTYPE html>

<html lang="en">

<head>

    <meta charset="UTF-8">

    <meta name="viewport"
        content="width=device-width, initial-scale=1.0">

    <title>

        {{ $product->name }}

    </title>

    @vite([
    'resources/css/app.css',
    'resources/js/app.js'
    ])

</head>

<body class="bg-[#F8F3EA]">

    <nav
        class="fixed top-0 left-0 right-0 z-50 bg-black/50 backdrop-blur-xl">

        <div
            class="max-w-7xl mx-auto px-8">

            <div
                class="h-20 flex justify-between items-center">

                <a
                    href="/menu"
                    class="text-white font-bold">

                    Kembali

                </a>

                <a
                    href="/"
                    class="text-white font-black text-3xl">

                    KOPIN

                </a>

            </div>

        </div>

    </nav>

    <section
        class="relative h-[90vh] overflow-hidden flex items-center">

        <img
            src="https://images.unsplash.com/photo-1495474472287-4d71bcdd2085?auto=format&fit=crop&w=2000&q=80"
            class="absolute inset-0 w-full h-full object-cover">

        <div
            class="absolute inset-0 bg-black/70">
        </div>

        <div
            class="relative z-10 max-w-7xl mx-auto px-8">

            <span
                class="px-5 py-3 rounded-full bg-white/10 backdrop-blur text-white">

                {{ $product->category }}

            </span>

            <h1
                class="text-8xl font-black text-white mt-8">

                {{ $product->name }}

            </h1>

            <p
                class="text-xl text-stone-300 mt-8 max-w-2xl">

                {{ $product->description }}

            </p>

        </div>

    </section>

    <section
        class="py-24">

        <div
            class="max-w-7xl mx-auto px-8">

            <h2
                class="text-5xl font-black text-center mb-16">

                Pilih Ukuran

            </h2>

            <div
                class="grid md:grid-cols-3 gap-8">

                @foreach($product->variant as $variant)

                <div
                    class="bg-white rounded-[40px] p-10 shadow-xl">

                    <h3
                        class="text-3xl font-black">

                        {{ $variant->variant_name }}

                    </h3>

                    <p
                        class="text-stone-500 mt-3">

                        SKU:
                        {{ $variant->sku }}

                    </p>

                    <h4
                        class="text-5xl font-black mt-8 text-[#8B5E3C]">

                        Rp {{ number_format($variant->price * 10000,0,',','.') }}

                    </h4>

                </div>

                @endforeach

            </div>

        </div>

    </section>

    <section class="py-24">


        <div class="max-w-7xl mx-auto px-8">

            <div class="grid lg:grid-cols-2 gap-20 items-center">

                <div>

                    <img
                        src="https://images.unsplash.com/photo-1511920170033-f8396924c348?auto=format&fit=crop&w=1200&q=80"
                        class="rounded-[40px] h-[550px] w-full object-cover shadow-2xl">

                </div>

                <div>

                    <span
                        class="inline-flex px-5 py-3 rounded-full bg-[#8B5E3C] text-white">

                        Signature Coffee

                    </span>

                    <h2
                        class="text-6xl font-black mt-8">

                        Tentang Produk

                    </h2>

                    <p
                        class="mt-8 text-xl text-stone-600 leading-relaxed">

                        {{ $product->description }}

                    </p>

                    <div
                        class="grid grid-cols-2 gap-6 mt-10">

                        <div class="bg-white rounded-3xl p-6 shadow">

                            <h3 class="text-4xl font-black">

                                Premium

                            </h3>

                            <p class="text-stone-500">

                                Coffee Bean

                            </p>

                        </div>

                        <div class="bg-white rounded-3xl p-6 shadow">

                            <h3 class="text-4xl font-black">

                                Fresh

                            </h3>

                            <p class="text-stone-500">

                                Daily Brew

                            </p>

                        </div>

                    </div>

                </div>

            </div>

        </div>


    </section>

    <section class="py-24 bg-white">


        <div class="max-w-7xl mx-auto px-8">

            <div class="text-center mb-20">

                <h2
                    class="text-6xl font-black">

                    Kenapa Kamu Akan Suka

                </h2>

            </div>

            <div
                class="grid md:grid-cols-3 gap-8">

                <div
                    class="bg-[#F8F3EA] rounded-[40px] p-10">

                    <x-heroicon-o-fire
                        class="w-14 h-14 text-[#8B5E3C]" />

                    <h3
                        class="text-3xl font-black mt-6">

                        Fresh Roasted

                    </h3>

                    <p
                        class="mt-4 text-stone-500">

                        Menggunakan biji kopi pilihan dengan kualitas terbaik.

                    </p>

                </div>

                <div
                    class="bg-[#F8F3EA] rounded-[40px] p-10">

                    <x-heroicon-o-star
                        class="w-14 h-14 text-[#8B5E3C]" />

                    <h3
                        class="text-3xl font-black mt-6">

                        Favorite Choice

                    </h3>

                    <p
                        class="mt-4 text-stone-500">

                        Salah satu produk favorit pelanggan KOPIN.

                    </p>

                </div>

                <div
                    class="bg-[#F8F3EA] rounded-[40px] p-10">

                    <x-heroicon-o-heart
                        class="w-14 h-14 text-[#8B5E3C]" />

                    <h3
                        class="text-3xl font-black mt-6">

                        Premium Taste

                    </h3>

                    <p
                        class="mt-4 text-stone-500">

                        Perpaduan rasa yang seimbang dan nikmat.

                    </p>

                </div>

            </div>

        </div>


    </section>