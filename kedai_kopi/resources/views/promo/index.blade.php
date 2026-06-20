@extends('layouts.app')

@section('content')

    <!-- HERO -->
    <section class="relative min-h-[80vh] overflow-hidden flex items-center">
        <div class="absolute inset-0">
            <img
                src="https://images.unsplash.com/photo-1495474472287-4d71bcdd2085?auto=format&fit=crop&w=2000&q=80"
                class="w-full h-full object-cover">

            <div
                class="absolute inset-0 bg-black/75">
            </div>
        </div>

        <div class="relative z-10 max-w-7xl mx-auto px-8">
            <div class="max-w-3xl">
                <span
                    class="inline-flex items-center gap-2 px-5 py-3 rounded-full bg-white/10 backdrop-blur-xl border border-white/10 text-white">

                    <x-heroicon-o-megaphone class="w-5 h-5" />

                    Promo & Campaign

                </span>

                <h1
                    class="text-7xl font-black text-white mt-8 leading-tight">

                    Promo Terbaik
                    Untuk Pecinta
                    Kopi

                </h1>

                <p
                    class="text-xl text-stone-300 mt-8">

                    Temukan promo terbaru,
                    campaign spesial,
                    dan berbagai penawaran menarik
                    dari KOPIN.

                </p>

            </div>

        </div>

    </section>

    <!-- CAMPAIN  -->

    <!-- ===================================== -->

    <!-- CAMPAIGN GRID -->

    <!-- ===================================== -->

    <section
        class="py-32 bg-[#F8F3EA]">


        <div
            class="max-w-7xl mx-auto px-8">

            <!-- HEADER -->

            <div
                class="text-center mb-20"
                data-aos="fade-up">

                <span
                    class="inline-flex items-center gap-2 px-5 py-3 rounded-full bg-white shadow-lg">

                    <x-heroicon-o-sparkles class="w-5 h-5" />

                    Campaign Aktif

                </span>

                <h2
                    class="text-6xl font-black mt-8 text-[#2B2118]">

                    Promo & Penawaran Terbaru

                </h2>

                <p
                    class="mt-5 text-xl text-stone-500">

                    Nikmati berbagai promo spesial yang sedang berlangsung.

                </p>

            </div>

            <!-- GRID -->

            <div
                class="grid lg:grid-cols-3 gap-10">

                @php
                $coffeeImages = [
                'https://images.unsplash.com/photo-1495474472287-4d71bcdd2085',
                'https://images.unsplash.com/photo-1509042239860-f550ce710b93',
                'https://images.unsplash.com/photo-1511920170033-f8396924c348',
                'https://images.unsplash.com/photo-1447933601403-0c6688de566e',
                'https://images.unsplash.com/photo-1459755486867-b55449bb39ff',
                'https://images.unsplash.com/photo-1461023058943-07fcbe16d735',
                ];
                @endphp

                @forelse($campaigns as $campaign)

                <div
                    data-aos="zoom-in"
                    class="group overflow-hidden rounded-[40px] bg-white shadow-[0_20px_50px_rgba(0,0,0,.15)] hover:-translate-y-3 transition duration-500">

                    <!-- IMAGE -->

                    <div
                        class="relative overflow-hidden">

                        <img
                            src="
                            @if($campaign->campaign_type == 'discount')
                                https://images.unsplash.com/photo-1511920170033-f8396924c348?auto=format&fit=crop&w=1200&q=80
                            @elseif($campaign->campaign_type == 'bundle')
                                https://images.unsplash.com/photo-1495474472287-4d71bcdd2085?auto=format&fit=crop&w=1200&q=80
                            @elseif($campaign->campaign_type == 'buy1get1')
                                https://images.unsplash.com/photo-1509042239860-f550ce710b93?auto=format&fit=crop&w=1200&q=80
                            @else
                                https://images.unsplash.com/photo-1447933601403-0c6688de566e?auto=format&fit=crop&w=1200&q=80
                            @endif
                            "
                            class="h-75 w-full object-cover group-hover:scale-110 transition duration-700">

                        <div
                            class="absolute inset-0 bg-linear-to-t from-black via-black/20 to-transparent">
                        </div>

                        <div
                            class="absolute top-5 left-5">

                            <span
                                class="px-4 py-2 rounded-full bg-[#8B5E3C] text-white text-sm font-semibold">

                                {{ $campaign->campaign_type }}

                            </span>

                        </div>

                        @if($campaign->discount_percentage)

                        <div
                            class="absolute top-5 right-5">

                            <span
                                class="px-4 py-2 rounded-full bg-red-500 text-white font-bold">

                                {{ $campaign->discount_percentage }}%

                            </span>

                        </div>

                        @endif

                    </div>

                    <!-- CONTENT -->

                    <div
                        class="p-8">

                        <h3
                            class="text-3xl font-black text-[#2B2118]">

                            {{ $campaign->name }}

                        </h3>

                        <p
                            class="text-stone-500 mt-4 leading-relaxed">

                            {{ Str::limit($campaign->description, 120) }}

                        </p>

                        <div
                            class="mt-6 flex items-center gap-2 text-[#8B5E3C]">

                            <x-heroicon-o-calendar-days class="w-5 h-5" />

                            <span>

                                {{ \Carbon\Carbon::parse($campaign->start_date)->format('d M Y') }}

                                -

                                {{ \Carbon\Carbon::parse($campaign->end_date)->format('d M Y') }}

                            </span>

                        </div>

                        <div
                            class="mt-8">

                            <a
                                href="{{ route('promo.show',$campaign->id) }}"
                                class="block text-center w-full py-4 rounded-2xl bg-[#8B5E3C] text-white font-bold hover:bg-[#6F4E37] transition">

                                Lihat Promo

                            </a>

                        </div>

                    </div>

                </div>

                @empty

                <div
                    class="col-span-3">

                    <div
                        class="bg-white rounded-[40px] p-20 text-center shadow-xl">

                        <x-heroicon-o-megaphone
                            class="w-20 h-20 mx-auto text-stone-300" />

                        <h3
                            class="text-3xl font-bold mt-8">

                            Belum Ada Campaign

                        </h3>

                        <p
                            class="text-stone-500 mt-4">

                            Saat ini belum ada promo yang tersedia.

                        </p>

                    </div>

                </div>

                @endforelse

            </div>

        </div>


    </section>
    
@endsection
