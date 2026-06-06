@extends('layouts.app')

@section('content')

<!-- HEADER -->

<div class="flex justify-between items-center mb-8">


<div>

    <h1 class="text-4xl font-bold text-[#2B2118]">
        Laporan CRM
    </h1>

    <p class="text-[#8B6E54] mt-2">
        Ringkasan performa bisnis dan insight pelanggan.
    </p>

</div>

<button
class="bg-gradient-to-r from-[#6F4E37] to-[#A67B5B]
text-white px-6 py-4 rounded-2xl shadow-xl">

    Export PDF

</button>


</div>

<!-- KPI -->

<div class="grid md:grid-cols-2 xl:grid-cols-4 gap-6 mb-8">


<div class="bg-white rounded-[30px] p-6 shadow-xl border border-[#EFE3D5]">

    <div class="flex justify-between items-start">

        <div>

            <p class="text-stone-500">
                Total Revenue
            </p>

            <h2 class="text-5xl font-black text-[#2B2118] mt-3">
                Rp 28 JT
            </h2>

            <p class="text-green-600 text-sm mt-3 font-semibold">
                +18% bulan ini
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
                    d="M12 8c-1.657 0-3 1.343-3 3s1.343 3 3 3 3 1.343 3 3-1.343 3-3 3m0-16v2m0 12v2"/>

            </svg>

        </div>

    </div>

</div>

<div class="bg-white rounded-[30px] p-6 shadow-xl border border-[#EFE3D5]">

    <div class="flex justify-between items-start">

        <div>

            <p class="text-stone-500">
                Total Customer
            </p>

            <h2 class="text-5xl font-black text-[#2B2118] mt-3">
                1.248
            </h2>

            <p class="text-green-600 text-sm mt-3 font-semibold">
                +64 customer baru
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
                    d="M17 20h5V18a4 4 0 00-4-4h-1m-4 6H4v-2a4 4 0 014-4h5a4 4 0 014 4v2z"/>

            </svg>

        </div>

    </div>

</div>

<div class="bg-white rounded-[30px] p-6 shadow-xl border border-[#EFE3D5]">

    <div class="flex justify-between items-start">

        <div>

            <p class="text-stone-500">
                Total Transaksi
            </p>

            <h2 class="text-5xl font-black text-[#2B2118] mt-3">
                864
            </h2>

            <p class="text-[#A67B5B] text-sm mt-3 font-semibold">
                Stabil bulan ini
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

<div class="bg-white rounded-[30px] p-6 shadow-xl border border-[#EFE3D5]">

    <div class="flex justify-between items-start">

        <div>

            <p class="text-stone-500">
                Loyal Customer
            </p>

            <h2 class="text-5xl font-black text-[#2B2118] mt-3">
                342
            </h2>

            <p class="text-green-600 text-sm mt-3 font-semibold">
                +6% meningkat
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
                    d="M5.121 17.804A8.969 8.969 0 0112 15c2.042 0 3.923.682 5.421 1.804"/>

            </svg>

        </div>

    </div>

</div>


</div>

<!-- HERO REPORT -->

<div class="relative overflow-hidden bg-gradient-to-r from-[#6F4E37] to-[#A67B5B] rounded-[36px] text-white p-10 mb-8 shadow-2xl">

<div class="absolute right-0 top-0 w-80 h-80 bg-white/10 rounded-full blur-3xl"></div>

<div class="relative z-10">

    <span class="bg-white/15 px-5 py-3 rounded-full text-sm font-semibold">

        BUSINESS INSIGHT

    </span>

    <h2 class="text-5xl font-black mt-6">
        Revenue Naik 18%
    </h2>

    <p class="mt-4 text-xl text-white/90">
        Performa bisnis menunjukkan pertumbuhan yang konsisten selama 6 bulan terakhir.
    </p>

    <div class="flex gap-4 mt-8">

        <div class="bg-white/10 backdrop-blur-md rounded-2xl px-5 py-4">

            <p class="text-xs text-white/70">
                Revenue
            </p>

            <h3 class="text-2xl font-bold">
                Rp 28 JT
            </h3>

        </div>

        <div class="bg-white/10 backdrop-blur-md rounded-2xl px-5 py-4">

            <p class="text-xs text-white/70">
                Growth
            </p>

            <h3 class="text-2xl font-bold">
                +18%
            </h3>

        </div>

    </div>

</div>


</div>

<!-- REVENUE ANALYTICS -->

<div class="bg-white rounded-[30px] shadow-xl p-8 mb-8 border border-[#EFE3D5]">

    <div class="flex flex-col lg:flex-row lg:items-center lg:justify-between mb-8">

        <div>

            <h2 class="text-2xl font-bold text-[#2B2118]">
                Revenue Analytics
            </h2>

            <p class="text-[#8B6E54] mt-1">
                Tren pendapatan bisnis selama 6 bulan terakhir
            </p>

        </div>

        <div class="flex gap-3 mt-4 lg:mt-0">

            <div
            class="bg-[#FAF3E0]
            px-5 py-3
            rounded-2xl">

                <p class="text-xs text-stone-500">
                    Total Revenue
                </p>

                <h4 class="font-bold text-[#6F4E37]">
                    Rp 28 JT
                </h4>

            </div>

            <div
            class="bg-[#FAF3E0]
            px-5 py-3
            rounded-2xl">

                <p class="text-xs text-stone-500">
                    Growth
                </p>

                <h4 class="font-bold text-green-600">
                    +18%
                </h4>

            </div>

            <div
            class="bg-[#FAF3E0]
            px-5 py-3
            rounded-2xl">

                <p class="text-xs text-stone-500">
                    Avg / Month
                </p>

                <h4 class="font-bold text-[#6F4E37]">
                    Rp 4.6 JT
                </h4>

            </div>

        </div>

    </div>

    <div
    class="bg-gradient-to-br
    from-[#FCFAF8]
    to-[#F7F1EA]
    rounded-[24px]
    p-6
    border border-[#EFE3D5]">

        <div class="h-96">

            <canvas id="revenueChart"></canvas>

        </div>

    </div>

</div>

<!-- SUMMARY -->

<div class="grid lg:grid-cols-2 gap-8">

<div class="bg-white rounded-[30px] shadow-xl p-8">

    <h2 class="text-2xl font-bold text-[#2B2118] mb-6">
        Business Highlights
    </h2>

    <div class="space-y-4">

        <div class="bg-[#FAF3E0] rounded-2xl p-5">
            Revenue meningkat 18% dibanding bulan lalu.
        </div>

        <div class="bg-[#FAF3E0] rounded-2xl p-5">
            Customer baru bertambah 64 orang.
        </div>

        <div class="bg-[#FAF3E0] rounded-2xl p-5">
            Campaign Buy 1 Get 1 menjadi campaign terbaik.
        </div>

        <div class="bg-[#FAF3E0] rounded-2xl p-5">
            Loyal customer meningkat sebesar 6%.
        </div>

    </div>

</div>

<div class="bg-white rounded-[30px] shadow-xl p-8">

    <h2 class="text-2xl font-bold text-[#2B2118] mb-6">
        Top Products
    </h2>

    <div class="space-y-6">

        <div>

            <div class="flex justify-between mb-2">

                <span>Cappuccino</span>

                <span>82%</span>

            </div>

            <div class="w-full bg-stone-200 rounded-full h-4">

                <div class="bg-[#6F4E37] h-4 rounded-full w-[82%]"></div>

            </div>

        </div>

        <div>

            <div class="flex justify-between mb-2">

                <span>Americano</span>

                <span>71%</span>

            </div>

            <div class="w-full bg-stone-200 rounded-full h-4">

                <div class="bg-[#8B6E54] h-4 rounded-full w-[71%]"></div>

            </div>

        </div>

        <div>

            <div class="flex justify-between mb-2">

                <span>Croissant</span>

                <span>64%</span>

            </div>

            <div class="w-full bg-stone-200 rounded-full h-4">

                <div class="bg-[#A67B5B] h-4 rounded-full w-[64%]"></div>

            </div>

        </div>

    </div>

</div>


</div>

<script>

const revenueCtx = document.getElementById('revenueChart');

new Chart(revenueCtx, {

    type: 'line',

    data: {

        labels: ['Jan','Feb','Mar','Apr','Mei','Jun'],

        datasets: [{

            label: 'Revenue',

            data: [12,19,15,25,22,28],

            borderColor: '#6F4E37',

            backgroundColor: 'rgba(111,78,55,0.12)',

            borderWidth: 4,

            pointRadius: 6,

            pointHoverRadius: 10,

            pointBackgroundColor: '#6F4E37',

            pointBorderColor: '#ffffff',

            pointBorderWidth: 3,

            fill: true,

            tension: 0.45

        }]

    },

    options: {

        responsive: true,

        maintainAspectRatio: false,

        interaction: {

            intersect: false,

            mode: 'index'

        },

        plugins: {

            legend: {

                display: false

            },

            tooltip: {

                backgroundColor: '#2B2118',

                titleColor: '#ffffff',

                bodyColor: '#ffffff',

                padding: 14,

                displayColors: false,

                cornerRadius: 12

            }

        },

        scales: {

            y: {

                beginAtZero: true,

                border: {

                    display: false

                },

                grid: {

                    color: '#EFE3D5'

                },

                ticks: {

                    color: '#8B6E54',

                    font: {

                        size: 12

                    }

                }

            },

            x: {

                border: {

                    display: false

                },

                grid: {

                    display: false

                },

                ticks: {

                    color: '#8B6E54',

                    font: {

                        size: 12

                    }

                }

            }

        }

    }

});

</script>

@endsection
