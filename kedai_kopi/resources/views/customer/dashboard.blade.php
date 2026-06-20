@extends('customer.layouts.app')

@section('content')
<div>
    <h2 class="text-4xl font-black">Halo, {{ auth()->user()->name }}</h2>
    <p class="text-stone-500 mt-2">Pilih menu untuk melakukan purchase dan melihat riwayat transaksi.</p>

    {{-- MENU & PRODUK LANGSUNG (Full Customer) --}}

    <div class="flex flex-col gap-4 mt-8">
        <div class="flex items-center justify-between gap-4">
            <div class="flex items-center gap-3">
                <div class="w-12 h-12 rounded-2xl bg-[#FAF3E0] border border-[#E6D7C8] flex items-center justify-center">
                    <x-heroicon-o-shopping-bag class="w-6 h-6 text-[#6F4E37]" />
                </div>
                <div>
                    <h3 class="text-2xl font-bold text-[#2B2118]">Menu untukmu</h3>
                    <p class="text-stone-500 mt-1">Cari & saring produk sebelum purchase.</p>
                </div>
            </div>
        </div>

        <!-- SEARCH BAR PREMIUM -->

        <div
            class="bg-white rounded-[36px]
    border border-[#EFE3D5]
    shadow-[0_15px_40px_rgba(0,0,0,.06)]
    p-6 mt-8">

            <form
                method="GET"
                action="{{ route('customer.dashboard') }}">

                <div class="flex flex-col xl:flex-row gap-5">

                    <!-- SEARCH -->

                    <div class="flex-1">

                        <label
                            class="text-xs font-bold tracking-wider uppercase text-stone-400">

                            Cari Menu

                        </label>

                        <div class="mt-2 relative">

                            <x-heroicon-o-magnifying-glass
                                class="w-5 h-5 absolute left-5 top-1/2 -translate-y-1/2 text-stone-400" />

                            <input
                                type="text"
                                name="q"
                                value="{{ request('q') }}"
                                placeholder="Cari Cappuccino, Latte, Dessert..."
                                oninput="
                        clearTimeout(window.customerSearchTimer);
                        window.customerSearchTimer = setTimeout(() => {
                            this.form.submit();
                        }, 500);
                    "
                                class="w-full pl-14 pr-5 py-4 rounded-2xl border border-[#E6D7C8] bg-[#FAF8F5] focus:outline-none focus:ring-2 focus:ring-[#8B5E3C]/30">

                        </div>

                    </div>

                    <!-- CATEGORY -->

                    <div class="xl:w-72">

                        <label
                            class="text-xs font-bold tracking-wider uppercase text-stone-400">

                            Kategori

                        </label>

                        <select
                            name="category"
                            onchange="this.form.submit()"
                            class="w-full mt-2 px-5 py-4 rounded-2xl border border-[#E6D7C8] bg-[#FAF8F5] focus:outline-none focus:ring-2 focus:ring-[#8B5E3C]/30">

                            <option value="">Semua Kategori</option>

                            @foreach(['Hot Drinks','Cold Drinks','Snacks'] as $cat)

                            <option
                                value="{{ $cat }}"
                                {{ request('category') == $cat ? 'selected' : '' }}>

                                {{ $cat }}

                            </option>

                            @endforeach

                        </select>

                    </div>

                    <!-- RESET -->

                    <div class="flex items-end">

                        <a
                            href="{{ route('customer.dashboard') }}"
                            class="px-8 py-4 rounded-2xl border border-[#E6D7C8] text-[#6F4E37] font-bold hover:bg-[#FAF3E0] transition">

                            Reset

                        </a>

                    </div>

                </div>

            </form>

            <!-- QUICK FILTER -->

            <div class="flex flex-wrap gap-3 mt-6">

                <a
                    href="{{ route('customer.dashboard') }}"
                    class="px-5 py-2 rounded-full bg-[#8B5E3C] text-white text-sm font-semibold hover:scale-105 transition">

                    Semua

                </a>

                <a
                    href="{{ route('customer.dashboard',['category'=>'Hot Drinks']) }}"
                    class="px-5 py-2 rounded-full bg-white border border-[#E6D7C8] text-sm font-semibold hover:bg-[#FAF3E0] transition">

                    Hot Drinks

                </a>

                <a
                    href="{{ route('customer.dashboard',['category'=>'Cold Drinks']) }}"
                    class="px-5 py-2 rounded-full bg-white border border-[#E6D7C8] text-sm font-semibold hover:bg-[#FAF3E0] transition">

                    Cold Drinks

                </a>

                <a
                    href="{{ route('customer.dashboard',['category'=>'Snacks']) }}"
                    class="px-5 py-2 rounded-full bg-white border border-[#E6D7C8] text-sm font-semibold hover:bg-[#FAF3E0] transition">

                    Snacks

                </a>

            </div>

        </div>

    </div>

    {{-- Langsung tampilkan katalog produk seperti halaman products --}}
    <section class="py-12">
        <div class="max-w-7xl mx-auto">

            <div class="grid md:grid-cols-2 xl:grid-cols-3 gap-10">
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

                @foreach($products as $index => $product)
                @php
                $variants = $product->variant;
                $minPrice = $variants->min('price');
                @endphp

                <a href="{{ route('customer.products.show', $product->id) }}"
                    class="group relative h-[520px] overflow-hidden rounded-[40px] shadow-[0_25px_80px_rgba(0,0,0,.12)] border border-[#EFE3D5] bg-white hover:-translate-y-2 transition-all duration-500">
                    <img src="{{ $productImages[$index % count($productImages)] }}?auto=format&fit=crop&w=1200&q=80"
                        class="absolute inset-0 w-full h-full object-cover group-hover:scale-110 transition duration-700">
                    <div class="absolute inset-0 bg-gradient-to-t from-black via-black/35 to-transparent"></div>

                    <div class="absolute top-6 left-6 z-10">
                        <span class="px-4 py-2 rounded-full bg-[#8B5E3C] text-white text-xs font-bold">{{ $product->category }}</span>
                    </div>

                    <div class="absolute bottom-0 left-0 right-0 p-8 text-white z-10">
                        <h3 class="text-4xl font-black leading-tight">{{ $product->name }}</h3>
                        <p class="mt-3 text-stone-200 line-clamp-2">{{ $product->description }}</p>

                        <div class="mt-6 flex flex-wrap gap-2">
                            @foreach($variants as $variant)
                            <span class="px-4 py-2 rounded-full bg-white/10 text-xs font-semibold">{{ $variant->variant_name }}</span>
                            @endforeach
                        </div>

                        <div class="mt-8 flex justify-between items-center">
                            <div>
                                <p class="text-stone-300 text-sm">Mulai dari</p>
                                <h4 class="text-3xl font-black">Rp {{ number_format($minPrice * 10000, 0, ',', '.') }}</h4>
                            </div>

                            <div class="w-14 h-14 rounded-full bg-[#8B5E3C] flex items-center justify-center">
                                <x-heroicon-o-arrow-right class="w-7 h-7 text-white" />
                            </div>
                        </div>
                    </div>
                </a>
                @endforeach
            </div>
        </div>
    </section>
</div>
@endsection