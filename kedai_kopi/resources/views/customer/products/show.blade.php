@extends('customer.layouts.app')

@section('content')
<div class="max-w-5xl mx-auto">
    <div class="mt-10 mb-8">
        <a href="{{ route('customer.products') }}" class="inline-flex items-center gap-2 text-[#6F4E37] font-semibold hover:underline">
            <x-heroicon-o-arrow-left class="w-5 h-5" /> Kembali
        </a>
    </div>

    <div class="bg-white rounded-[40px] border border-[#EFE3D5] shadow-sm overflow-hidden">
        <div class="relative h-[360px]">
            <img src="https://images.unsplash.com/photo-1495474472287-4d71bcdd2085?auto=format&fit=crop&w=1200&q=80" class="absolute inset-0 w-full h-full object-cover">
            <div class="absolute inset-0 bg-black/55"></div>
            <div class="absolute inset-0 p-8 flex flex-col justify-end text-white">
                <span class="inline-flex items-center gap-3 px-5 py-3 rounded-full bg-white/10 backdrop-blur border border-white/20 text-xs font-bold">
                    <x-heroicon-o-cube class="w-4 h-4" /> {{ $product->category }}
                </span>
                <h1 class="text-5xl font-black mt-5">{{ $product->name }}</h1>
                <p class="text-stone-200 text-lg mt-3">{{ $product->description }}</p>
            </div>
        </div>

        <div class="p-8">
            <h2 class="text-2xl font-black text-[#2B2118]">Varian</h2>
            <div class="flex flex-wrap gap-3 mt-5">
                @foreach($product->variant as $variant)
                <div class="px-5 py-3 rounded-2xl bg-[#FAF3E0] border border-[#E6D7C8]">
                    <p class="font-bold text-[#2B2118]">{{ $variant->variant_name }}</p>
                    <p class="text-stone-600">Rp {{ number_format($variant->price * 10000, 0, ',', '.') }}</p>
                </div>
                @endforeach
            </div>

            <div class="mt-8 bg-[#FAF3E0] border border-[#E6D7C8] rounded-[28px] p-6">
                <p class="text-stone-700 font-semibold">Tambahkan varian ke keranjang</p>
                <p class="text-stone-600 mt-2">Klik tombol Add to Cart pada varian yang kamu pilih, lalu checkout di halaman Cart.</p>

                <div class="mt-5 space-y-3">
                    @foreach($product->variant as $variant)
                    <div class="flex items-center justify-between gap-4 p-3 rounded-2xl bg-white border border-[#E6D7C8]">
                        <div>
                            <p class="font-bold text-[#2B2118]">{{ $variant->variant_name }}</p>
                            <p class="text-stone-600">Rp {{ number_format($variant->price * 10000, 0, ',', '.') }}</p>
                        </div>

                        <form action="{{ route('customer.cart.add') }}" method="POST" class="flex items-center gap-2">
                            @csrf
                            <input type="hidden" name="variant_id" value="{{ $variant->id }}">
                            <input type="hidden" name="qty" value="1">
                            <button type="submit" class="px-4 py-2 rounded-2xl bg-[#8B5E3C] text-white font-semibold hover:bg-[#6F4E37] transition shadow-sm">
                                <x-heroicon-o-plus class="w-5 h-5 inline-block mr-1" /> Add to Cart
                            </button>
                        </form>
                    </div>
                    @endforeach
                </div>
            </div>
        </div>
    </div>
</div>
@endsection