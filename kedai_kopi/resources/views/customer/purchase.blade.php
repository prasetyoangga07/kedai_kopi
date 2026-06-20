@extends('customer.layouts.app')

@section('content')
<div class="max-w-5xl">
    <div class="mb-6">
        <h1 class="text-3xl font-black text-[#2B2118]">Purchase</h1>
        <p class="text-stone-500 mt-2">Pilih produk, masuk ke keranjang, lalu checkout pembayaran.</p>
    </div>

    <div class="bg-white rounded-[28px] border border-[#EFE3D5] shadow-sm p-6">
        <div class="space-y-4">
            <div class="flex gap-3 flex-wrap">
                <a href="{{ route('customer.products') }}"
                    class="bg-[#8B5E3C] hover:bg-[#6F4E37] text-white font-semibold px-5 py-2.5 rounded-2xl transition shadow-sm">
                    Pilih Produk
                </a>

                <a href="{{ route('customer.cart') }}"
                    class="bg-[#FAF3E0] hover:bg-[#F0E1C6] text-[#6F4E37] font-semibold px-5 py-2.5 rounded-2xl transition shadow-sm border border-[#E6D7C8]">
                    Lihat Keranjang
                </a>

                <a href="{{ route('customer.transactions') }}"
                    class="bg-white hover:bg-[#FAF3E0] text-[#6F4E37] font-semibold px-5 py-2.5 rounded-2xl transition shadow-sm border border-[#E6D7C8]">
                    Lihat Riwayat Transaksi
                </a>
            </div>

            <div class="bg-[#FAF3E0] border border-[#E6D7C8] rounded-2xl p-4">
                <h2 class="font-bold text-[#2B2118]">Keranjang → Checkout → Pembayaran</h2>
                <p class="text-stone-600 mt-2">
                    Setelah kamu menambahkan produk ke keranjang, kamu bisa melakukan checkout di halaman Cart.
                    Sistem akan menyimpan transaksi ke database dan meng-set status pembayaran <span class="font-semibold">pending</span>.
                </p>
            </div>

            <div class="pt-2">
                <a href="{{ route('customer.cart') }}" class="inline-flex items-center gap-2 text-[#6F4E37] font-semibold hover:underline">
                    Lanjut ke halaman Cart
                    <x-heroicon-o-arrow-right class="w-5 h-5" />
                </a>
            </div>
        </div>
    </div>
</div>
@endsection