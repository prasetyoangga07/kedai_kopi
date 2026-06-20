@extends('layouts.app')

@section('content')
    <div class="bg-[#F8F3EA]">

        <section
            class="relative min-h-[90vh] flex items-center overflow-hidden">

            <div
                class="absolute inset-0">

                <img
                    src="https://images.unsplash.com/photo-1509042239860-f550ce710b93?auto=format&fit=crop&w=2000&q=80"
                    class="w-full h-full object-cover">

                <div
                    class="absolute inset-0 bg-black/75">
                </div>

            </div>

            <div
                class="relative z-10 max-w-7xl mx-auto px-8">

                <div
                    class="max-w-4xl">

                    <span
                        class="px-5 py-3 rounded-full bg-white/10 text-white">

                        {{ $campaign->campaign_type }}

                    </span>

                    <h1
                        class="text-7xl font-black text-white mt-8">

                        {{ $campaign->name }}

                    </h1>

                    <p
                        class="text-xl text-stone-300 mt-8 leading-relaxed">

                        {{ $campaign->description }}

                    </p>

                </div>

            </div>

        </section>

        <!-- !!! -->

        <section
            class="py-24">

            <div
                class="max-w-7xl mx-auto px-8">

                <div
                    class="grid lg:grid-cols-3 gap-8">

                    <div
                        class="bg-white rounded-[40px] p-10 shadow-xl">

                        <x-heroicon-o-percent-badge
                            class="w-12 h-12 text-[#8B5E3C]" />

                        <h3
                            class="text-2xl font-bold mt-6">

                            Diskon

                        </h3>

                        <p
                            class="text-5xl font-black mt-4">

                            {{ $campaign->discount_percentage ?? 0 }}%

                        </p>

                    </div>

                    <div
                        class="bg-white rounded-[40px] p-10 shadow-xl">

                        <x-heroicon-o-calendar-days
                            class="w-12 h-12 text-[#8B5E3C]" />

                        <h3
                            class="text-2xl font-bold mt-6">

                            Mulai

                        </h3>

                        <p
                            class="text-xl mt-4">

                            {{ $campaign->start_date }}

                        </p>

                    </div>

                    <div
                        class="bg-white rounded-[40px] p-10 shadow-xl">

                        <x-heroicon-o-clock
                            class="w-12 h-12 text-[#8B5E3C]" />

                        <h3
                            class="text-2xl font-bold mt-6">

                            Berakhir

                        </h3>

                        <p
                            class="text-xl mt-4">

                            {{ $campaign->end_date }}

                        </p>

                    </div>

                </div>

            </div>

        </section>

        <!-- DIATAS DISKON  -->

        <!-- DESKRIPSI  -->
        <section class="py-24">

            <div class="max-w-7xl mx-auto px-8">

                <div class="text-center mb-16">

                    <h2 class="text-5xl font-black text-[#2B2118]">

                        Kenapa Promo Ini Menarik?

                    </h2>

                    <p class="text-stone-500 mt-4">

                        Dapatkan keuntungan lebih banyak dengan campaign ini.

                    </p>

                </div>

                <div class="grid md:grid-cols-3 gap-8">

                    <div class="bg-white rounded-4xl p-8 shadow-xl">

                        <x-heroicon-o-gift
                            class="w-14 h-14 text-[#8B5E3C]" />

                        <h3 class="text-2xl font-bold mt-6">
                            Bonus Benefit
                        </h3>

                        <p class="mt-4 text-stone-500">
                            Promo memberikan keuntungan tambahan
                            untuk pelanggan setia.
                        </p>

                    </div>

                    <div class="bg-white rounded-4xl p-8 shadow-xl">

                        <x-heroicon-o-star
                            class="w-14 h-14 text-[#8B5E3C]" />

                        <h3 class="text-2xl font-bold mt-6">
                            Produk Favorit
                        </h3>

                        <p class="mt-4 text-stone-500">
                            Berlaku untuk berbagai menu favorit
                            pelanggan KOPIN.
                        </p>

                    </div>

                    <div class="bg-white rounded-4xl p-8 shadow-xl">

                        <x-heroicon-o-bolt
                            class="w-14 h-14 text-[#8B5E3C]" />

                        <h3 class="text-2xl font-bold mt-6">
                            Terbatas
                        </h3>

                        <p class="mt-4 text-stone-500">
                            Promo hanya tersedia dalam periode tertentu.
                        </p>

                    </div>

                </div>

            </div>

        </section>

        <!-- GALERI  -->

        <section class="pb-24">

            <div class="max-w-7xl mx-auto px-8">

                <h2 class="text-5xl font-black text-center mb-16">

                    Menu Pilihan

                </h2>

                <div class="grid md:grid-cols-3 gap-8">

                    <img
                        src="https://images.unsplash.com/photo-1511920170033-f8396924c348?auto=format&fit=crop&w=900&q=80"
                        class="rounded-4xl h-87.5 w-full object-cover">

                    <img
                        src="https://images.unsplash.com/photo-1509042239860-f550ce710b93?auto=format&fit=crop&w=900&q=80"
                        class="rounded-4xl h-87.5 w-full object-cover">

                    <img
                        src="https://images.unsplash.com/photo-1495474472287-4d71bcdd2085?auto=format&fit=crop&w=900&q=80"
                        class="rounded-4xl h-87.5 w-full object-cover">

                </div>

            </div>

        </section>

        
        <!-- CTA  -->
        <section
            class="py-32 bg-[#120C07] text-center">

            <div
                class="max-w-4xl mx-auto px-8">

                <h2
                    class="text-6xl font-black text-white">

                    Jangan Sampai Ketinggalan

                </h2>

                <p
                    class="text-xl text-stone-300 mt-8">

                    Promo berlaku dalam periode terbatas.

                </p>

                <a
                    href="/promo"
                    class="inline-block mt-10 px-10 py-5 rounded-2xl bg-[#8B5E3C] text-white font-bold">

                    Lihat Promo Lainnya

                </a>

            </div>

        </section>

    </div>
@endsection

