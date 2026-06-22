@extends('customer.layouts.app')

{{-- {{ dd($data) }} --}}

@section('content')
<div>
    <h2 class="text-4xl font-black">Halo, {{ auth()->user()->name }}</h2>
    <p class="text-stone-500 mt-2">Pilih menu untuk melakukan purchase dan melihat riwayat transaksi.</p>

    <div class="mt-8 grid xl:grid-cols-3 gap-6">

        {{-- ── LOYALTY CARD UTAMA ── --}}
        <div class="xl:col-span-2 relative flex flex-col justify-between overflow-hidden rounded-[36px] 
            p-8 shadow-[0_25px_80px_rgba(43,33,24,.30)]"
            style="background-color: {{ $data['colorPr'] }}; color: {{ $data['colorTx'] }}">

            {{-- ornamen lingkaran dekoratif --}}
            <div class="pointer-events-none absolute -top-16 -right-16 w-72 h-72 rounded-full bg-[#A67B5B]/20"></div>
            <div class="pointer-events-none absolute -bottom-10 -left-10 w-48 h-48 rounded-full bg-[#DDB892]/10"></div>

            {{-- baris atas: level badge + poin --}}
            <div class="flex items-start justify-between">
                <div>
                    <span class="inline-flex items-center gap-1.5 px-3 py-1 rounded-full bg-[#A67B5B]/30 border border-[{{ $data['colorTx'] }}]/40 text-[{{ $data['colorTx'] }}] }} text-xs font-bold tracking-wider uppercase">
                        <x-heroicon-s-star class="w-3.5 h-3.5" />
                        {{ $data['member'] }} Member
                    </span>
                    <h3 class="mt-4 text-5xl font-black tracking-tight">{{ $data['points'] }} 
                        <span class="text-2xl font-semibold" style="color: {{ $data['colorSc'] }}">
                            pts
                        </span></h3>
                    <p class="text-sm mt-1" style="color: {{ $data['colorSc'] }}">Poin loyalty kamu saat ini</p>
                </div>

                <div class="text-right">
                    <p class="text-[{{ $data['colorSc'] }}] text-xs uppercase tracking-wider">Total Spend</p>
                    <p class="text-2xl font-black mt-1">Rp{{ $data['totalSpend'] }}</p>
                    <p class="text-[{{ $data['colorSc'] }}] text-xs mt-1">Sejak bergabung</p>
                </div>
            </div>

            {{-- baris bawah: progres & info kartu --}}
            <div>
                {{-- progress ke level berikutnya --}}
                <div class="relative mt-8">
                    <div class="flex justify-between text-xs mb-2">
                        <span class="text-stone-400 font-semibold">{{ $data['member'] }}</span>
                        <span style="color: {{ $data['colorSc'] }}" class="font-bold">{{ $data['nextName'] }} — kurang {{ $data['nextLess'] }} poin</span>
                    </div>
                    <div class="w-full h-2.5 rounded-full bg-white/10">
                        <div class="h-2.5 rounded-full" style="width: {{ $data['nextPercent'] }}%; background-color: {{ $data['colorSc'] }}"></div>
                    </div>
                    <div class="flex justify-between text-xs mt-1.5" style="color: {{ $data['colorSc'] }}">
                        <span>{{ $data['points'] }} pts</span>
                        <span>{{ $data['nextPoint'] }} pts</span>
                    </div>
                </div>
    
                {{-- nama & info kartu --}}
                <div class="relative mt-8 flex items-end justify-between">
                    <div>
                        <p class="text-stone-400 text-xs uppercase tracking-wider">Member</p>
                        <p class="font-bold text-lg mt-0.5">{{ auth()->user()->name }}</p>
                    </div>
                    <p class="text-xs" style="color: {{ $data['colorSc'] }}">Member sejak Jan 2024</p>
                </div>
            </div>
        </div>

        {{-- ── PROMO EKSKLUSIF ── --}}
        <div class="flex flex-col gap-4">
            <div class="bg-white rounded-[28px] border border-[#EFE3D5] shadow-xl p-6 flex-1">
                <div class="flex items-center gap-3 mb-5">
                    <div class="w-10 h-10 rounded-2xl bg-[#FAF3E0] border border-[#E6D7C8] flex items-center justify-center">
                        <x-heroicon-o-gift class="w-5 h-5 text-[#6F4E37]" />
                    </div>
                    <div>
                        <p class="text-xs text-stone-400 uppercase tracking-wider font-semibold">Khusus Gold</p>
                        <h4 class="font-bold text-[#2B2118]">Promo Untukmu</h4>
                    </div>
                </div>

                <div class="space-y-3">
                    {{-- promo 1 --}}
                    <div class="flex items-start gap-3 p-3 rounded-2xl bg-[#FAF3E0] border border-[#EFE3D5]">
                        <span class="mt-0.5 w-8 h-8 rounded-xl bg-[#8B5E3C] flex items-center justify-center shrink-0">
                            <x-heroicon-o-percent-badge class="w-4 h-4 text-white" />
                        </span>
                        <div>
                            <p class="text-sm font-bold text-[#2B2118]">Diskon 15%</p>
                            <p class="text-xs text-stone-500 mt-0.5">Semua Cold Drinks setiap Senin</p>
                        </div>
                    </div>

                    {{-- promo 2 --}}
                    <div class="flex items-start gap-3 p-3 rounded-2xl bg-[#FAF3E0] border border-[#EFE3D5]">
                        <span class="mt-0.5 w-8 h-8 rounded-xl bg-[#8B5E3C] flex items-center justify-center shrink-0">
                            <x-heroicon-o-cake class="w-4 h-4 text-white" />
                        </span>
                        <div>
                            <p class="text-sm font-bold text-[#2B2118]">Free Snack</p>
                            <p class="text-xs text-stone-500 mt-0.5">Setiap pembelian min. Rp 50.000</p>
                        </div>
                    </div>

                    {{-- promo 3 --}}
                    <div class="flex items-start gap-3 p-3 rounded-2xl bg-[#FAF3E0] border border-[#EFE3D5]">
                        <span class="mt-0.5 w-8 h-8 rounded-xl bg-[#A67B5B] flex items-center justify-center shrink-0">
                            <x-heroicon-o-bolt class="w-4 h-4 text-white" />
                        </span>
                        <div>
                            <p class="text-sm font-bold text-[#2B2118]">2x Poin</p>
                            <p class="text-xs text-stone-500 mt-0.5">Weekend, untuk semua transaksi</p>
                        </div>
                    </div>
                </div>
            </div>

            {{-- mini info level berikutnya --}}
            <div class="bg-[#2B2118] text-white rounded-[28px] p-5 flex items-center gap-4">
                <div class="w-12 h-12 rounded-2xl bg-[#A67B5B]/30 border border-[#DDB892]/30 flex items-center justify-center shrink-0">
                    <x-heroicon-o-trophy class="w-6 h-6 text-[#DDB892]" />
                </div>
                <div>
                    <p class="text-stone-400 text-xs">Level berikutnya</p>
                    <p class="font-bold text-[#DDB892]">{{ $data['nextName'] }} Member</p>
                    <p class="text-xs text-stone-300 mt-0.5">Tambah <span class="font-semibold text-white">{{ $data['nextLess'] }} poin</span> lagi untuk naik level</p>
                </div>
            </div>
        </div>
    </div>

    <!-- MENU & PRODUK LANGSUNG (Full Customer) -->
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
        <div class="bg-white rounded-[36px]
            border border-[#EFE3D5]
            shadow-[0_15px_40px_rgba(0,0,0,.06)]
            p-6 mt-8">

            <form method="GET" action="{{ route('customer.dashboard') }}">
                <div class="flex flex-col xl:flex-row gap-5">

                    <!-- SEARCH -->
                    <div class="flex-1">
                        <label class="text-xs font-bold tracking-wider uppercase text-stone-400">
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
                    {{-- <div class="xl:w-72">
                        <label class="text-xs font-bold tracking-wider uppercase text-stone-400">
                            Kategori
                        </label>

                        <select name="category" onchange="this.form.submit()"
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
                    </div> --}}

                    <!-- RESET -->
                    <div class="flex items-end">
                        <a href="{{ route('customer.dashboard') }}"
                            class="px-8 py-4 rounded-2xl border border-[#E6D7C8] text-[#6F4E37] font-bold hover:bg-[#FAF3E0] transition">
                            Reset
                        </a>
                    </div>
                </div>
            </form>

            <!-- QUICK FILTER -->
            <div class="flex flex-wrap gap-3 mt-6">
                <a href="{{ route('customer.dashboard') }}"
                    class="px-5 py-2 rounded-full
                    {{ request('category') == null ? 'bg-[#8B5E3C] text-white' : 'bg-white border border-[#E6D7C8]'}} 
                    text-sm font-semibold hover:scale-105 transition">
                    Semua
                </a>

                <a href="{{ route('customer.dashboard',['category'=>'Hot Drinks']) }}"
                    class="px-5 py-2 rounded-full
                    {{ request('category') == 'Hot Drinks' ? 'bg-[#8B5E3C] text-white' : 'bg-white border border-[#E6D7C8]' }}  
                    text-sm font-semibold hover:bg-[#FAF3E0] transition">
                    Hot Drinks
                </a>

                <a href="{{ route('customer.dashboard',['category'=>'Cold Drinks']) }}"
                    class="px-5 py-2 rounded-full 
                    {{ request('category') == 'Cold Drinks' ? 'bg-[#8B5E3C] text-white' : 'bg-white border border-[#E6D7C8]' }}
                    text-sm font-semibold hover:bg-[#FAF3E0] transition">
                    Cold Drinks
                </a>

                <a href="{{ route('customer.dashboard',['category'=>'Snacks']) }}"
                    class="px-5 py-2 rounded-full 
                    {{ request('category') == 'Snacks' ? 'bg-[#8B5E3C] text-white' : 'bg-white border border-[#E6D7C8]' }}
                    text-sm font-semibold hover:bg-[#FAF3E0] transition">
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
                    class="group relative h-130 overflow-hidden rounded-[40px] shadow-[0_25px_80px_rgba(0,0,0,.12)] border border-[#EFE3D5] bg-white hover:-translate-y-2 transition-all duration-500">
                    <img src="{{ $productImages[$index % count($productImages)] }}?auto=format&fit=crop&w=1200&q=80"
                        class="absolute inset-0 w-full h-full object-cover group-hover:scale-110 transition duration-700">
                    <div class="absolute inset-0 bg-linear-to-t from-black via-black/35 to-transparent"></div>

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