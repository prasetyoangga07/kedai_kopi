@extends('layouts.app')

@section('content')

<!-- HEADER -->

<div class="flex justify-between items-center mb-8">


<div>

    <h1 class="text-4xl font-bold text-[#2B2118]">
        Analisis Apriori
    </h1>

    <p class="text-[#8B6E54] mt-2">
        Temukan pola pembelian pelanggan untuk meningkatkan strategi penjualan.
    </p>

</div>

<a href="{{ route('apriori.run') }}">
    <button class="bg-linear-to-r from-[#6F4E37] to-[#A67B5B] text-white px-6 py-4 rounded-2xl shadow-xl">
        Jalankan Analisis
    </button>
</a>


</div>

<!-- KPI -->

<div class="grid md:grid-cols-3 gap-6 mb-8">


<div class="bg-white rounded-[30px] p-6 shadow-xl border border-[#EFE3D5]">

    <div class="flex justify-between items-start">

        <div>

            <p class="text-stone-500">
                Total Rules
            </p>

            <h2 class="text-5xl font-black text-[#2B2118] mt-3">
                12
            </h2>

            <p class="text-green-600 text-sm mt-3 font-semibold">
                +3 Rule Baru
            </p>

        </div>

        <div class="w-14 h-14 rounded-2xl bg-[#FAF3E0] flex items-center justify-center">

            <svg xmlns="http://www.w3.org/2000/svg"
                class="w-7 h-7 text-[#6F4E37]"
                fill="none"
                viewBox="0 0 24 24"
                stroke="currentColor">

                <path stroke-linecap="round"
                    stroke-linejoin="round"
                    stroke-width="2"
                    d="M13 10V3L4 14h7v7l9-11h-7z"/>

            </svg>

        </div>

    </div>

</div>

<div class="bg-white rounded-[30px] p-6 shadow-xl border border-[#EFE3D5]">

    <div class="flex justify-between items-start">

        <div>

            <p class="text-stone-500">
                Confidence Tertinggi
            </p>

            <h2 class="text-5xl font-black text-[#2B2118] mt-3">
                74%
            </h2>

            <p class="text-green-600 text-sm mt-3 font-semibold">
                Sangat Kuat
            </p>

        </div>

        <div class="w-14 h-14 rounded-2xl bg-[#FAF3E0] flex items-center justify-center">

            <svg xmlns="http://www.w3.org/2000/svg"
                class="w-7 h-7 text-[#6F4E37]"
                fill="none"
                viewBox="0 0 24 24"
                stroke="currentColor">

                <path stroke-linecap="round"
                    stroke-linejoin="round"
                    stroke-width="2"
                    d="M5 13l4 4L19 7"/>

            </svg>

        </div>

    </div>

</div>

<div class="bg-white rounded-[30px] p-6 shadow-xl border border-[#EFE3D5]">

    <div class="flex justify-between items-start">

        <div>

            <p class="text-stone-500">
                Produk Terasosiasi
            </p>

            <h2 class="text-5xl font-black text-[#2B2118] mt-3">
                8
            </h2>

            <p class="text-[#A67B5B] text-sm mt-3 font-semibold">
                Coffee & Pastry
            </p>

        </div>

        <div class="w-14 h-14 rounded-2xl bg-[#FAF3E0] flex items-center justify-center">

            <svg xmlns="http://www.w3.org/2000/svg"
                class="w-7 h-7 text-[#6F4E37]"
                fill="none"
                viewBox="0 0 24 24"
                stroke="currentColor">

                <path stroke-linecap="round"
                    stroke-linejoin="round"
                    stroke-width="2"
                    d="M9 17v-6m4 6V7m4 10v-3"/>

            </svg>

        </div>

    </div>

</div>


</div>

<!-- RULE TERBAIK -->

<div class="relative overflow-hidden bg-gradient-to-r from-[#6F4E37] to-[#A67B5B] rounded-[36px] text-white p-10 mb-8 shadow-2xl">


<div class="absolute right-0 top-0 w-72 h-72 bg-white/10 rounded-full blur-3xl"></div>

<div class="relative z-10">

    <span class="bg-white/15 px-5 py-3 rounded-full text-sm font-semibold">

        RECOMMENDATION ENGINE

    </span>

    <h2 class="text-5xl font-black mt-6">
        Cappuccino ➜ Croissant
    </h2>

    <p class="mt-4 text-xl text-white/90">
        Pelanggan yang membeli Cappuccino cenderung membeli Croissant.
    </p>

    <div class="flex gap-4 mt-8">

        <div class="bg-white/10 backdrop-blur-md rounded-2xl px-5 py-4">

            <p class="text-xs text-white/70">
                Confidence
            </p>

            <h3 class="text-2xl font-bold">
                74%
            </h3>

        </div>

        <div class="bg-white/10 backdrop-blur-md rounded-2xl px-5 py-4">

            <p class="text-xs text-white/70">
                Lift
            </p>

            <h3 class="text-2xl font-bold">
                1.58
            </h3>

        </div>

    </div>

</div>


</div>

<!-- RULE CARDS -->

<div class="grid lg:grid-cols-2 gap-6 mb-8">


<div class="bg-white rounded-[30px] shadow-xl p-6">

    <div class="flex justify-between items-center">

        <h3 class="font-bold text-xl text-[#2B2118]">
            Cappuccino ➜ Croissant
        </h3>

        <span class="bg-green-100 text-green-700 px-3 py-1 rounded-full text-sm">
            Sangat Kuat
        </span>

    </div>

    <div class="mt-6">

        <div class="flex justify-between mb-2">

            <span>Support</span>

            <span>32%</span>

        </div>

        <div class="w-full bg-stone-200 rounded-full h-3">

            <div class="bg-[#A67B5B] h-3 rounded-full w-[32%]"></div>

        </div>

    </div>

    <div class="mt-5">

        <div class="flex justify-between mb-2">

            <span>Confidence</span>

            <span>74%</span>

        </div>

        <div class="w-full bg-stone-200 rounded-full h-3">

            <div class="bg-[#6F4E37] h-3 rounded-full w-[74%]"></div>

        </div>

    </div>

</div>

<div class="bg-white rounded-[30px] shadow-xl p-6">

    <div class="flex justify-between items-center">

        <h3 class="font-bold text-xl text-[#2B2118]">
            Cheesecake ➜ Americano
        </h3>

        <span class="bg-blue-100 text-blue-700 px-3 py-1 rounded-full text-sm">
            Kuat
        </span>

    </div>

    <div class="mt-6">

        <div class="flex justify-between mb-2">

            <span>Support</span>

            <span>28%</span>

        </div>

        <div class="w-full bg-stone-200 rounded-full h-3">

            <div class="bg-[#A67B5B] h-3 rounded-full w-[28%]"></div>

        </div>

    </div>

    <div class="mt-5">

        <div class="flex justify-between mb-2">

            <span>Confidence</span>

            <span>68%</span>

        </div>

        <div class="w-full bg-stone-200 rounded-full h-3">

            <div class="bg-[#6F4E37] h-3 rounded-full w-[68%]"></div>

        </div>

    </div>

</div>


</div>

<!-- TABLE -->

<div class="bg-white rounded-[30px] shadow-xl p-6">


<h2 class="text-2xl font-bold text-[#2B2118] mb-6">
    Association Rules
</h2>

<div class="overflow-x-auto">

    <table class="w-full">

        <thead>

            <tr class="border-b">

                <th class="p-4 text-left">Jika Beli</th>
                <th class="p-4 text-left">Maka Beli</th>
                <th class="p-4 text-left">Support</th>
                <th class="p-4 text-left">Confidence</th>
                <th class="p-4 text-left">Lift</th>
                <th class="p-4 text-left">Kualitas</th>

            </tr>

        </thead>

        <tbody>

            <tr class="hover:bg-[#FAF3E0]/50 transition">

                <td class="p-4">Cappuccino</td>
                <td class="p-4">Croissant</td>
                <td class="p-4">32%</td>
                <td class="p-4">74%</td>
                <td class="p-4">1.58</td>

                <td class="p-4">

                    <span class="bg-green-100 text-green-700 px-3 py-1 rounded-full">

                        Sangat Kuat

                    </span>

                </td>

            </tr>

            <tr class="hover:bg-[#FAF3E0]/50 transition">

                <td class="p-4">Cheesecake</td>
                <td class="p-4">Americano</td>
                <td class="p-4">28%</td>
                <td class="p-4">68%</td>
                <td class="p-4">1.41</td>

                <td class="p-4">

                    <span class="bg-blue-100 text-blue-700 px-3 py-1 rounded-full">

                        Kuat

                    </span>

                </td>

            </tr>

        </tbody>

    </table>

</div>


</div>


@endsection