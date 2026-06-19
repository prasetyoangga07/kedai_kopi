@extends('customer.layouts.app')

@section('content')
<div class="min-h-screen">
    {{-- HERO / HEADER --}}
    <section class="relative mt-8">
        <div class="absolute inset-0 bg-gradient-to-r from-black/70 via-black/50 to-transparent"></div>
        <div class="relative rounded-[40px] overflow-hidden">
            <img src="https://images.unsplash.com/photo-1509042239860-f550ce710b93?auto=format&fit=crop&w=2000&q=80" class="w-full h-[340px] object-cover">
            <div class="absolute inset-0 bg-black/60"></div>
            <div class="absolute inset-0 p-8 flex flex-col justify-center">
                <span class="inline-flex items-center gap-3 px-6 py-3 rounded-full border border-white/30 text-white bg-white/10 backdrop-blur-md">
                    <x-heroicon-o-cube class="w-5 h-5" />
                    Coffee Menu
                </span>
                <h1 class="mt-6 text-5xl font-black text-white leading-tight">Semua Menu untukmu</h1>
                <p class="mt-4 text-stone-200 text-lg max-w-2xl">Pilih menu kopi & non-coffee, lalu lanjutkan purchase.</p>
            </div>
        </div>
    </section>

    {{-- GRID PRODUK --}}
    <section class="py-12">
        <div class="max-w-7xl mx-auto">
            <div class="flex items-center justify-between gap-4 mb-10">
                <div>
                    <h2 class="text-3xl font-black text-[#2B2118]">Katalog Produk</h2>
                    <p class="text-stone-500 mt-2">Tampilkan produk dari database.</p>
                </div>
                <div class="hidden sm:flex gap-2">
                    <span class="px-4 py-2 rounded-full bg-[#FAF3E0] border border-[#E6D7C8] text-[#6F4E37] text-sm font-semibold">{{ $products->count() }} Item</span>
                </div>
            </div>

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

                <a href="{{ route('customer.products.show', $product->id) }}" class="group relative h-[520px] overflow-hidden rounded-[40px] shadow-[0_25px_80px_rgba(0,0,0,.12)] border border-[#EFE3D5] bg-white hover:-translate-y-2 transition-all duration-500">
                    <img src="{{ $productImages[$index % count($productImages)] }}?auto=format&fit=crop&w=1200&q=80" class="absolute inset-0 w-full h-full object-cover group-hover:scale-110 transition duration-700">
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