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

        <form action="{{ route('apriori.run') }}" method="POST">
            @csrf
            <button type="submit"
                class="bg-linear-to-r from-[#6F4E37] to-[#A67B5B] transition-all duration-300 ease-in-out hover:scale-105 text-white px-6 py-4 rounded-2xl shadow-xl cursor-pointer">
                Jalankan Analisis
            </button>
        </form>
    </div>
    
    @if ($rules->isNotEmpty())
        <!-- KPI -->
        <div class="grid md:grid-cols-3 gap-6 mb-8">

            <div class="bg-white rounded-[30px] p-6 shadow-xl border border-[#EFE3D5]">
                <div class="flex justify-between items-start">
                    <div>
                        <p class="text-stone-500">
                            Total Rules
                        </p>

                        <h2 class="text-5xl font-black text-[#2B2118] mt-3">
                            {{ $totalRules }}
                        </h2>

                        <p class="text-green-600 text-sm mt-3 font-semibold">
                            +3 Rule Baru
                        </p>

                    </div>

                    <div class="w-14 h-14 rounded-2xl bg-[#FAF3E0] flex items-center justify-center">
                        <x-heroicon-o-bolt class="h-7 w-7 text-[#6F4E37]" />
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
                            {{ $topConfidence }}%
                        </h2>

                        <p class="text-green-600 text-sm mt-3 font-semibold">
                            Sangat Kuat
                        </p>
                    </div>

                    <div class="w-14 h-14 rounded-2xl bg-[#FAF3E0] flex items-center justify-center">
                        <x-heroicon-o-light-bulb class="h-7 w-7 text-[#6F4E37]" />
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
                            {{ $totalProducts }}
                        </h2>

                        <p class="text-[#A67B5B] text-sm mt-3 font-semibold">
                            Coffee & Pastry
                        </p>
                    </div>

                    <div class="w-14 h-14 rounded-2xl bg-[#FAF3E0] flex items-center justify-center">
                        <x-heroicon-o-paper-clip class="h-7 w-7 text-[#6F4E37]" />
                    </div>
                </div>
            </div>

        </div>

        <!-- RULE TERBAIK -->
        <div
            class="relative overflow-hidden bg-linear-to-r from-[#6F4E37] to-[#A67B5B] rounded-[36px] text-white p-10 mb-8 shadow-2xl">
            <div class="absolute right-0 top-0 w-72 h-72 bg-white/10 rounded-full blur-3xl"></div>

            <div class="relative z-10">
                <span class="bg-white/15 px-5 py-3 rounded-full text-sm font-semibold">
                    RECOMMENDATION ENGINE
                </span>

                <h2 class="text-5xl font-black mt-6">
                    @foreach ($topRules->antecedents as $item)
                        {{ $item }}
                    @endforeach
                    ➜
                    @foreach ($topRules->consequents as $item)
                        {{ $item }}
                    @endforeach
                </h2>

                <p class="mt-4 text-xl text-white/90">
                    Pelanggan yang membeli
                    @foreach ($topRules->antecedents as $item)
                        {{ $item }}
                    @endforeach
                    cenderung membeli
                    @foreach ($topRules->consequents as $item)
                        {{ $item }}
                    @endforeach.
                </p>

                <div class="flex gap-4 mt-8">
                    <div class="bg-white/10 backdrop-blur-md rounded-2xl px-5 py-4">
                        <p class="text-xs text-white/70">
                            Confidence
                        </p>

                        <h3 class="text-2xl font-bold">
                            {{ $topConfidence }}%
                        </h3>
                    </div>

                    <div class="bg-white/10 backdrop-blur-md rounded-2xl px-5 py-4">
                        <p class="text-xs text-white/70">
                            Lift
                        </p>

                        <h3 class="text-2xl font-bold">
                            {{ number_format($topRules->lift, 2) }}
                        </h3>
                    </div>
                </div>
            </div>
        </div>

        <!-- RULE CARDS -->
        <div class="grid lg:grid-cols-2 gap-6 mb-8">

            @foreach ($rules as $item)
                <div class="bg-white rounded-[30px] shadow-xl p-6">
                    <div class="flex justify-between items-center">
                        <h3 class="font-bold text-xl text-[#2B2118]">
                            @foreach ($item->antecedents as $ante)
                                {{ $ante }}
                            @endforeach
                            ➜
                            @foreach ($item->consequents as $cons)
                                {{ $cons }}
                            @endforeach
                        </h3>

                        <span
                            class="{{ $item->rules_label == 'Sangat Lemah'
                                ? 'bg-red-100 text-red-700'
                                : ($item->rules_label == 'Lemah'
                                    ? 'bg-orange-100 text-orange-700'
                                    : ($item->rules_label == 'Lemah'
                                        ? 'bg-yellow-100 text-yellow-700'
                                        : 'bg-green-100 text-green-700')) }} px-3 py-1 rounded-full text-sm">
                            {{ $item->rules_label }}
                        </span>
                    </div>

                    <div class="mt-6">
                        <div class="flex justify-between mb-2">
                            <span>Support</span>
                            <span>{{ number_format($item->support * 100, 2) }}%</span>
                        </div>

                        <div class="w-full bg-stone-200 rounded-full h-3">
                            <div class="bg-[#A67B5B] h-3 rounded-full"
                                style="width: {{ number_format($item->support * 100, 2) }}%"></div>
                        </div>
                    </div>

                    <div class="mt-5">
                        <div class="flex justify-between mb-2">
                            <span>Confidence</span>
                            <span>{{ number_format($item->confidence * 100, 2) }}%</span>
                        </div>

                        <div class="w-full bg-stone-200 rounded-full h-3">
                            <div class="bg-[#6F4E37] h-3 rounded-full"
                                style="width: {{ number_format($item->confidence * 100, 2) }}%"></div>
                        </div>
                    </div>
                </div>
            @endforeach

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
                            <th class="p-4 text-left">Kemunculan</th>
                            <th class="p-4 text-left">Kepastian</th>
                            <th class="p-4 text-left">Validitas</th>
                            <th class="p-4 text-left">Kualitas</th>
                        </tr>
                    </thead>

                    <tbody>
                        @foreach ($rules as $item)
                            <tr class="hover:bg-[#FAF3E0]/50 transition">
                                <td class="p-4">
                                    @foreach ($item->antecedents as $anct)
                                        {{ $anct }}
                                    @endforeach
                                </td>
                                <td class="p-4">
                                    @foreach ($item->consequents as $cnsq)
                                        {{ $cnsq }}
                                    @endforeach
                                </td>
                                <td class="p-4">{{ number_format($item->support * 100, 2) }}%</td>
                                <td class="p-4">{{ number_format($item->confidence * 100, 2) }}%</td>
                                <td class="p-4">{{ number_format($item->lift, 2) }}</td>

                                <td class="p-4">
                                    <span
                                        class="{{ $item->rules_label == 'Sangat Lemah'
                                            ? 'bg-red-100 text-red-700'
                                            : ($item->rules_label == 'Lemah'
                                                ? 'bg-orange-100 text-orange-700'
                                                : ($item->rules_label == 'Lemah'
                                                    ? 'bg-yellow-100 text-yellow-700'
                                                    : 'bg-green-100 text-green-700')) }} px-3 py-1 rounded-full">
                                        {{ $item->rules_label }}
                                    </span>
                                </td>
                            </tr>
                        @endforeach
                    </tbody>
                </table>
            </div>
        </div>
    @else
        jalankan analisis untuk melihat hubungan antar produk
    @endif
@endsection
