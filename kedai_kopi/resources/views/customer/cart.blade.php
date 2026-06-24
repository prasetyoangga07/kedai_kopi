@extends('customer.layouts.app')

@section('content')
<div class="max-w-5xl mx-auto">
    <div class="mb-6 flex flex-col sm:flex-row sm:items-end sm:justify-between gap-4">
        <div>
            <h1 class="text-3xl font-black text-[#2B2118]">Cart</h1>
            <p class="text-stone-500 mt-2">Tambah produk ke keranjang, lalu lakukan checkout.</p>
        </div>

        <a href="{{ route('customer.products') }}" class="inline-flex items-center gap-2 px-5 py-2.5 rounded-2xl bg-[#8B5E3C] text-white font-semibold hover:bg-[#6F4E37] transition shadow-sm">
            <x-heroicon-o-plus class="w-5 h-5" /> Tambah Produk
        </a>
    </div>

    <div class="grid lg:grid-cols-3 gap-6 items-start">
        <div class="lg:col-span-2 bg-white rounded-[28px] border border-[#EFE3D5] shadow-sm p-6 self-start">
            @if(empty($items))
            <div class="text-center py-10">
                <p class="text-stone-600 font-semibold">Keranjang masih kosong.</p>
                <p class="text-stone-500 mt-2">Kamu bisa pilih produk dan tambahkan variannya ke keranjang.</p>
            </div>
            @else
            <div class="space-y-4">
                @foreach($items as $item)
                @php($variant = $item['variant'])
                <div class="flex items-center justify-between gap-4 p-4 rounded-2xl bg-[#FAF3E0] border border-[#E6D7C8]">
                    <div class="min-w-0">
                        <p class="font-bold text-[#2B2118] truncate">{{ $variant->product->name ?? 'Produk' }} </p>
                        <p class="text-stone-600">Varian: {{ $variant->variant_name }}</p>
                        <p class="text-stone-600">Harga: Rp {{ number_format($item['unit_price'],0,',','.') }}</p>
                    </div>

                    <div class="flex items-center gap-3">
                        <form
                            action="{{ route('customer.cart.update') }}"
                            method="POST"
                            class="flex items-center">

                            @csrf

                            <input
                                type="hidden"
                                name="variant_id"
                                value="{{ $variant->id }}">

                            <div
                                class="flex items-center rounded-2xl overflow-hidden border border-[#E6D7C8]">

                                <button
                                    type="submit"
                                    name="qty"
                                    value="{{ max($item['qty'] - 1, 0) }}"
                                    class="w-10 h-10 bg-white hover:bg-[#FAF3E0] font-bold">

                                    -

                                </button>

                                <div
                                    class="w-12 text-center font-bold">

                                    {{ $item['qty'] }}

                                </div>

                                <button
                                    type="submit"
                                    name="qty"
                                    value="{{ $item['qty'] + 1 }}"
                                    class="w-10 h-10 bg-white hover:bg-[#FAF3E0] font-bold">

                                    +

                                </button>

                            </div>

                        </form>

                        <form action="{{ route('customer.cart.remove') }}" method="POST">
                            @csrf
                            <input type="hidden" name="variant_id" value="{{ $variant->id }}">
                            <button type="submit" class="px-3 py-2 rounded-xl bg-[#FFE8E8] text-red-600 font-semibold hover:bg-[#FFD0D0] transition">
                                Hapus
                            </button>
                        </form>
                    </div>
                </div>
                @endforeach
            </div>
            @endif
        </div>

        <div class="bg-white rounded-[28px] border border-[#EFE3D5] shadow-sm p-6 h-fit sticky top-6">
            <h2 class="text-2xl font-black text-[#2B2118]">Ringkasan</h2>
            <div class="mt-4 space-y-3">
                <div class="flex justify-between">
                    <span class="text-stone-600">Subtotal</span>
                    <span class="font-semibold text-[#2B2118]">
                        Rp {{ number_format($totals['subtotal'],0,',','.') }}
                    </span>
                </div>

                <div class="flex justify-between">
                    <span class="text-stone-600">Discount</span>
                    <span class="font-semibold text-[#2B2118]">
                        Rp {{ number_format($totals['discount'],0,',','.') }}
                    </span>
                </div>

                <div class="flex justify-between">
                    <span class="text-stone-600">Tax</span>
                    <span class="font-semibold text-[#2B2118]">
                        Rp {{ number_format($totals['tax'],0,',','.') }}
                    </span>
                </div>

                <div class="border-t border-[#EFE3D5] pt-3 flex justify-between">
                    <span class="font-bold text-[#2B2118]">Grand Total</span>
                    <span class="font-bold text-[#6F4E37]">
                        Rp {{ number_format($totals['grand_total'],0,',','.') }}
                    </span>
                </div>
            </div>

            <div class="mt-6">

                <form
                    action="{{ route('customer.checkout') }}"
                    method="POST">

                    @csrf

                    <div
                        x-data="{
        payment:'qris',
        paymentMethod:'qris'
    }">

                        <h3
                            class="text-xs font-black tracking-[.2em] uppercase text-stone-400 mb-5">

                            Metode Pembayaran

                        </h3>

                        <!-- PAYMENT TAB -->

                        <div
                            class="grid grid-cols-2 lg:grid-cols-3 gap-3">

                            <button
                                type="button"
                                @click="payment='cash';paymentMethod='cash'"
                                :class="payment==='cash'
            ? 'bg-[#8B5E3C] text-white border-[#8B5E3C]'
            : 'bg-white text-[#2B2118]'"
                                class="h-28 border rounded-3xl transition-all duration-300 hover:scale-105 flex flex-col items-center justify-center">

                                <x-heroicon-o-banknotes class="w-8 h-8 mb-2" />

                                <span class="font-bold">
                                    Cash
                                </span>

                            </button>

                            <button
                                type="button"
                                @click="payment='qris';paymentMethod='qris'"
                                :class="payment==='qris'
            ? 'bg-[#8B5E3C] text-white border-[#8B5E3C]'
            : 'bg-white text-[#2B2118]'"
                                class="h-28 border rounded-3xl transition-all duration-300 hover:scale-105 flex flex-col items-center justify-center">

                                <x-heroicon-o-qr-code class="w-8 h-8 mb-2" />

                                <span class="font-bold">
                                    QRIS
                                </span>

                            </button>

                            <button
                                type="button"
                                @click="payment='ewallet'"
                                :class="payment==='ewallet'
            ? 'bg-[#8B5E3C] text-white border-[#8B5E3C]'
            : 'bg-white text-[#2B2118]'"
                                class="h-28 border rounded-3xl transition-all duration-300 hover:scale-105 flex flex-col items-center justify-center">

                                <x-heroicon-o-device-phone-mobile class="w-8 h-8 mb-2" />

                                <span class="font-bold">
                                    E-Wallet
                                </span>

                            </button>

                            <button
                                type="button"
                                @click="payment='bank'"
                                :class="payment==='bank'
            ? 'bg-[#8B5E3C] text-white border-[#8B5E3C]'
            : 'bg-white text-[#2B2118]'"
                                class="h-28 border rounded-3xl transition-all duration-300 hover:scale-105 flex flex-col items-center justify-center">

                                <x-heroicon-o-building-library class="w-8 h-8 mb-2" />

                                <span class="font-bold">
                                    Transfer
                                </span>

                            </button>

                            <button
                                type="button"
                                @click="payment='card'"
                                :class="payment==='card'
            ? 'bg-[#8B5E3C] text-white border-[#8B5E3C]'
            : 'bg-white text-[#2B2118]'"
                                class="h-28 border rounded-3xl transition-all duration-300 hover:scale-105 flex flex-col items-center justify-center">

                                <x-heroicon-o-credit-card class="w-8 h-8 mb-2" />

                                <span class="font-bold">
                                    Debit / Kredit
                                </span>

                            </button>

                        </div>

                        <input
                            type="hidden"
                            name="payment_group"
                            :value="payment">

                        <input
                            type="hidden"
                            name="payment_method"
                            :value="paymentMethod">

                        <!-- DETAIL PAYMENT -->

                        <div class="mt-6">

                            <!-- QRIS -->

                            <div
                                x-show="payment==='qris'"
                                x-transition
                                class="rounded-3xl border border-[#E6D7C8] bg-[#FAF3E0] p-5">

                                <div class="flex items-center gap-4">

                                    <div
                                        class="w-16 h-16 rounded-2xl bg-white flex items-center justify-center">

                                        <x-heroicon-o-qr-code class="w-8 h-8 text-[#8B5E3C]" />

                                    </div>

                                    <div>

                                        <h4 class="font-black text-lg">
                                            QRIS Payment
                                        </h4>

                                        <p class="text-stone-500">
                                            Scan menggunakan GoPay, OVO, DANA, Mobile Banking, dll.
                                        </p>

                                    </div>

                                </div>

                            </div>

                            <!-- CASH -->

                            <!-- EWALLET -->

                            <div
                                x-show="payment==='ewallet'"
                                x-transition
                                class="grid grid-cols-2 gap-3">

                                <label
                                    @click="paymentMethod='gopay'"
                                    :class="paymentMethod==='gopay'
        ? 'bg-[#8B5E3C] text-white border-[#8B5E3C] shadow-lg'
        : 'bg-white text-[#2B2118] border-[#E6D7C8]'"
                                    class="cursor-pointer rounded-2xl border p-4 text-center font-bold transition-all duration-300 hover:scale-105">

                                    GoPay

                                </label>

                                <label
                                    @click="paymentMethod='ovo'"
                                    :class="paymentMethod==='ovo'
        ? 'bg-[#8B5E3C] text-white border-[#8B5E3C] shadow-lg'
        : 'bg-white text-[#2B2118] border-[#E6D7C8]'"
                                    class="cursor-pointer rounded-2xl border p-4 text-center font-bold transition-all duration-300 hover:scale-105">

                                    OVO

                                </label>

                                <label
                                    @click="paymentMethod='dana'"
                                    :class="paymentMethod==='dana'
        ? 'bg-[#8B5E3C] text-white border-[#8B5E3C] shadow-lg'
        : 'bg-white text-[#2B2118] border-[#E6D7C8]'"
                                    class="cursor-pointer rounded-2xl border p-4 text-center font-bold transition-all duration-300 hover:scale-105">

                                    DANA

                                </label>

                                <label
                                    @click="paymentMethod='shopeepay'"
                                    :class="paymentMethod==='shopeepay'
        ? 'bg-[#8B5E3C] text-white border-[#8B5E3C] shadow-lg'
        : 'bg-white text-[#2B2118] border-[#E6D7C8]'"
                                    class="cursor-pointer rounded-2xl border p-4 text-center font-bold transition-all duration-300 hover:scale-105">

                                    ShopeePay

                                </label>

                                <div
                                    class="col-span-2 mt-2 rounded-3xl bg-[#FAF3E0] border border-[#E6D7C8] p-4">

                                    <p class="text-sm text-stone-500">

                                        Pilih e-wallet favoritmu untuk pembayaran yang lebih cepat.

                                    </p>

                                </div>

                            </div>

                            <!-- TRANSFER BANK -->

                            <!-- BANK -->

                            <div
                                x-show="payment==='bank'"
                                x-transition
                                class="space-y-3">

                                <label
                                    @click="paymentMethod='bca'"
                                    :class="paymentMethod==='bca'
        ? 'bg-[#8B5E3C] text-white border-[#8B5E3C]'
        : 'bg-white text-[#2B2118] border-[#E6D7C8]'"
                                    class="block cursor-pointer rounded-2xl border p-4 font-semibold transition">

                                    Bank BCA

                                </label>

                                <label
                                    @click="paymentMethod='mandiri'"
                                    :class="paymentMethod==='mandiri'
        ? 'bg-[#8B5E3C] text-white border-[#8B5E3C]'
        : 'bg-white text-[#2B2118] border-[#E6D7C8]'"
                                    class="block cursor-pointer rounded-2xl border p-4 font-semibold transition">

                                    Bank Mandiri

                                </label>

                                <label
                                    @click="paymentMethod='bri'"
                                    :class="paymentMethod==='bri'
        ? 'bg-[#8B5E3C] text-white border-[#8B5E3C]'
        : 'bg-white text-[#2B2118] border-[#E6D7C8]'"
                                    class="block cursor-pointer rounded-2xl border p-4 font-semibold transition">

                                    Bank BRI

                                </label>

                                <label
                                    @click="paymentMethod='bni'"
                                    :class="paymentMethod==='bni'
        ? 'bg-[#8B5E3C] text-white border-[#8B5E3C]'
        : 'bg-white text-[#2B2118] border-[#E6D7C8]'"
                                    class="block cursor-pointer rounded-2xl border p-4 font-semibold transition">

                                    Bank BNI

                                </label>

                            </div>
                            <!-- DEBIT KREDIT -->

                            <!-- CARD -->

                            <div
                                x-show="payment==='card'"
                                x-transition
                                class="grid grid-cols-2 gap-3">

                                <div
                                    @click="paymentMethod='visa'"
                                    :class="paymentMethod==='visa'
        ? 'ring-4 ring-[#C9A27A]'
        : ''"
                                    class="cursor-pointer rounded-3xl p-5 bg-gradient-to-r from-[#6F4E37] to-[#A67B5B] text-white transition">

                                    <p class="text-xs opacity-80">
                                        Supported
                                    </p>

                                    <h4 class="font-black text-2xl mt-2">
                                        VISA
                                    </h4>

                                </div>

                                <div
                                    @click="paymentMethod='mastercard'"
                                    :class="paymentMethod==='mastercard'
        ? 'ring-4 ring-[#C9A27A]'
        : ''"
                                    class="cursor-pointer rounded-3xl p-5 bg-gradient-to-r from-[#2B2118] to-[#6F4E37] text-white transition">

                                    <p class="text-xs opacity-80">
                                        Supported
                                    </p>

                                    <h4 class="font-black text-2xl mt-2">
                                        Mastercard
                                    </h4>

                                </div>

                            </div>

                        </div>
                    </div>

                    <button
                        type="submit"
                        @disabled(empty($items))
                        class="mt-6 w-full px-5 py-4 rounded-2xl bg-gradient-to-r from-[#6F4E37] to-[#A67B5B] text-white font-bold hover:shadow-xl hover:scale-[1.02] transition disabled:opacity-50">

                        Checkout & Bayar

                    </button>

                </form>

            </div>


            <div class="mt-4 text-sm text-stone-500">
                Checkout akan membuat record ke tabel <span class="font-semibold">transactions</span> dan <span class="font-semibold">transaction_details</span>.
                Status pembayaran diset <span class="font-semibold">pending</span>.
            </div>
        </div>
    </div>
</div>
@endsection