@extends('layouts.app')

@section('content')

<div class="flex flex-col lg:flex-row lg:items-center lg:justify-between mb-8">


<div>

    <h1 class="text-4xl font-bold text-stone-800">
        Dashboard Owner
    </h1>

    <p class="text-stone-500 mt-2">
        Pantau performa pelanggan, transaksi, campaign, dan rekomendasi Apriori.
    </p>

</div>

<div class="mt-4 lg:mt-0">

    <button
        @click="reportModal=true"
        class="group
        flex items-center gap-3
        bg-gradient-to-r
        from-[#6F4E37]
        to-[#A67B5B]
        hover:from-[#5A3D2A]
        hover:to-[#8B6E54]
        text-white
        px-6 py-3
        rounded-2xl
        shadow-lg
        hover:shadow-xl
        transition-all duration-300">

        <svg xmlns="http://www.w3.org/2000/svg"
             class="w-5 h-5"
             fill="none"
             viewBox="0 0 24 24"
             stroke="currentColor">

            <path stroke-linecap="round"
                  stroke-linejoin="round"
                  stroke-width="2"
                  d="M12 4v16m8-8H4"/>

        </svg>

        <span class="font-semibold">
            Generate Laporan
        </span>

    </button>

</div>


</div>


<!-- KPI -->

<div class="grid grid-cols-1 md:grid-cols-2 xl:grid-cols-4 gap-6">


<div class="bg-white rounded-[32px] p-6 shadow-xl border border-[#E8D8C4]">


<div class="flex items-center justify-between">

    <div>

        <p class="text-sm text-stone-500">
            Total Pelanggan
        </p>

        <h2 class="text-5xl font-bold text-[#2B2118] mt-3">
            1.248
        </h2>

        <p class="mt-3 text-sm text-green-600 font-medium">
            +12% bulan ini
        </p>

    </div>

    <div
    class="w-16 h-16 rounded-2xl bg-[#F8F3ED] flex items-center justify-center">

        <svg xmlns="http://www.w3.org/2000/svg"
             class="w-8 h-8 text-[#6F4E37]"
             fill="none"
             viewBox="0 0 24 24"
             stroke="currentColor">

            <path stroke-linecap="round"
                  stroke-linejoin="round"
                  stroke-width="2"
                  d="M17 20h5V18a4 4 0 00-4-4h-1m-4 6H4v-2a4 4 0 014-4h5a4 4 0 014 4v2z"/>

            <circle cx="9" cy="7" r="4"/>

        </svg>

    </div>

</div>


</div>

<div class="bg-white rounded-[32px] p-6 shadow-xl border border-[#E8D8C4]">


<div class="flex items-center justify-between">

    <div>

        <p class="text-sm text-stone-500">
            Total Transaksi
        </p>

        <h2 class="text-5xl font-bold text-[#2B2118] mt-3">
            864
        </h2>

        <p class="mt-3 text-sm text-green-600 font-medium">
            +8% bulan ini
        </p>

    </div>

    <div
    class="w-16 h-16 rounded-2xl bg-[#F8F3ED] flex items-center justify-center">

        <svg xmlns="http://www.w3.org/2000/svg"
             class="w-8 h-8 text-[#6F4E37]"
             fill="none"
             viewBox="0 0 24 24"
             stroke="currentColor">

            <path stroke-linecap="round"
                  stroke-linejoin="round"
                  stroke-width="2"
                  d="M9 12h6m-6 4h6m2 5H7a2 2 0 01-2-2V5a2 2 0 012-2h5l5 5v11a2 2 0 01-2 2z"/>

        </svg>

    </div>

</div>


</div>

<div class="bg-white rounded-[32px] p-6 shadow-xl border border-[#E8D8C4]">


<div class="flex items-center justify-between">

    <div>

        <p class="text-sm text-stone-500">
            Pendapatan
        </p>

        <h2 class="text-5xl font-bold text-[#2B2118] mt-3">
            Rp 28 JT
        </h2>

        <p class="mt-3 text-sm text-green-600 font-medium">
            +18% bulan ini
        </p>

    </div>

    <div
    class="w-16 h-16 rounded-2xl bg-[#F8F3ED] flex items-center justify-center">

        <svg xmlns="http://www.w3.org/2000/svg"
             class="w-8 h-8 text-[#6F4E37]"
             fill="none"
             viewBox="0 0 24 24"
             stroke="currentColor">

            <path stroke-linecap="round"
                  stroke-linejoin="round"
                  stroke-width="2"
                  d="M12 8c-1.5 0-3 1-3 2.5S10.5 13 12 13s3 1 3 2.5S13.5 18 12 18m0-10V6m0 12v-2"/>

        </svg>

    </div>

</div>


</div>

<div class="bg-white rounded-[32px] p-6 shadow-xl border border-[#E8D8C4]">


<div class="flex items-center justify-between">

    <div>

        <p class="text-sm text-stone-500">
            Loyal Customer
        </p>

        <h2 class="text-5xl font-bold text-[#2B2118] mt-3">
            342
        </h2>

        <p class="mt-3 text-sm text-green-600 font-medium">
            +6% bulan ini
        </p>

    </div>

    <div
    class="w-16 h-16 rounded-2xl bg-[#F8F3ED] flex items-center justify-center">

        <svg xmlns="http://www.w3.org/2000/svg"
             class="w-8 h-8 text-[#6F4E37]"
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



</div>

<!-- Insight -->

<div class="grid grid-cols-1 lg:grid-cols-3 gap-6 mt-8">


<div class="bg-white rounded-3xl p-6 shadow-lg">
    <div class="w-14 h-14 rounded-2xl bg-[#F8F3ED] flex items-center justify-center">

        <svg xmlns="http://www.w3.org/2000/svg"
            class="w-7 h-7 text-[#6F4E37]"
            fill="none"
            viewBox="0 0 24 24"
            stroke="currentColor">

            <path stroke-linecap="round"
                stroke-linejoin="round"
                stroke-width="2"
                d="M12 2l2.5 7.5H22l-6 4.5L18.5 22 12 17.5 5.5 22 8 14 2 9.5h7.5z"/>

        </svg>

    </div>

    <h3 class="font-bold text-xl mt-4">
        Customer Insight
    </h3>
    <p class="mt-3 text-stone-500">
        68% pelanggan membeli kopi dan pastry secara bersamaan.
    </p>
</div>

<div class="bg-white rounded-3xl p-6 shadow-lg">
    <div class="w-14 h-14 rounded-2xl bg-[#F8F3ED] flex items-center justify-center">

        <svg xmlns="http://www.w3.org/2000/svg"
            class="w-7 h-7 text-[#6F4E37]"
            fill="none"
            viewBox="0 0 24 24"
            stroke="currentColor">

            <path stroke-linecap="round"
                stroke-linejoin="round"
                stroke-width="2"
                d="M3 11l18-5v12l-18-5v-2z"/>

        </svg>

    </div>
    <h3 class="font-bold text-xl mt-4">
        Campaign Aktif
    </h3>
    <p class="mt-3 text-stone-500">
        Promo Buy 1 Get 1 meningkatkan transaksi sebesar 15%.
    </p>
</div>

<div class="bg-white rounded-3xl p-6 shadow-lg">
    <div class="w-14 h-14 rounded-2xl bg-[#F8F3ED] flex items-center justify-center">

        <svg xmlns="http://www.w3.org/2000/svg"
            class="w-7 h-7 text-[#6F4E37]"
            fill="none"
            viewBox="0 0 24 24"
            stroke="currentColor">

            <circle cx="6" cy="12" r="2"/>
            <circle cx="18" cy="6" r="2"/>
            <circle cx="18" cy="18" r="2"/>

            <path stroke-width="2"
                stroke-linecap="round"
                d="M8 12h8M16 8l2 2M16 16l2-2"/>

        </svg>

    </div>
    <h3 class="font-bold text-xl mt-4">
        Apriori Recommendation
    </h3>
    <p class="mt-3 text-stone-500">
        Cappuccino ➜ Croissant (Confidence 74%)
    </p>
</div>


</div>

<!-- Chart -->

<!-- SALES ANALYTICS -->

<div class="bg-white rounded-[30px] shadow-xl p-8 mt-8 border border-[#EFE3D5]">

    <div class="flex flex-col lg:flex-row lg:items-center lg:justify-between mb-8">

        <div>

            <h2 class="text-2xl font-bold text-[#2B2118]">
                Sales Analytics
            </h2>

            <p class="text-[#8B6E54] mt-1">
                Performa penjualan 6 bulan terakhir
            </p>

        </div>

        <div class="flex gap-3 mt-4 lg:mt-0">

            <div
            class="bg-[#FAF3E0]
            px-5 py-3
            rounded-2xl">

                <p class="text-xs text-stone-500">
                    Revenue
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

        </div>

    </div>

    <div class="bg-[#FCFAF8] rounded-[24px] p-6 border border-[#EFE3D5]">

        <div class="h-96">

            <canvas id="salesChart"></canvas>

        </div>

    </div>

</div>

<!-- BOTTOM SECTION -->

<div class="grid xl:grid-cols-2 gap-8 mt-8">

    <!-- PRODUK TERLARIS -->

    <div class="bg-white rounded-[30px] shadow-xl p-8 border border-[#EFE3D5]">

        <div class="flex items-center gap-3 mb-8">

            <div class="w-12 h-12 rounded-2xl bg-[#FAF3E0] flex items-center justify-center">

                <svg xmlns="http://www.w3.org/2000/svg"
                    class="w-6 h-6 text-[#6F4E37]"
                    fill="none"
                    viewBox="0 0 24 24"
                    stroke="currentColor">

                    <path stroke-linecap="round"
                        stroke-linejoin="round"
                        stroke-width="2"
                        d="M18 8h1a3 3 0 010 6h-1M4 8h14v5a5 5 0 01-5 5H9a5 5 0 01-5-5V8z"/>

                </svg>

            </div>

            <h2 class="text-2xl font-bold text-[#2B2118]">
                Produk Terlaris
            </h2>

        </div>

        <div class="space-y-6">

            <div>

                <div class="flex justify-between mb-2">

                    <span>Cappuccino</span>

                    <span class="font-bold text-[#6F4E37]">
                        82%
                    </span>

                </div>

                <div class="w-full bg-[#EFE3D5] rounded-full h-3">

                    <div class="bg-[#6F4E37] h-3 rounded-full"
                        style="width:82%">
                    </div>

                </div>

            </div>

            <div>

                <div class="flex justify-between mb-2">

                    <span>Americano</span>

                    <span class="font-bold text-[#8B6E54]">
                        71%
                    </span>

                </div>

                <div class="w-full bg-[#EFE3D5] rounded-full h-3">

                    <div class="bg-[#8B6E54] h-3 rounded-full"
                        style="width:71%">
                    </div>

                </div>

            </div>

            <div>

                <div class="flex justify-between mb-2">

                    <span>Croissant</span>

                    <span class="font-bold text-[#A67B5B]">
                        64%
                    </span>

                </div>

                <div class="w-full bg-[#EFE3D5] rounded-full h-3">

                    <div class="bg-[#A67B5B] h-3 rounded-full"
                        style="width:64%">
                    </div>

                </div>

            </div>

        </div>

    </div>

    <!-- TARGET BULANAN -->

    <div class="bg-white rounded-[30px] shadow-xl p-8 border border-[#EFE3D5]">

        <div class="flex items-center gap-3 mb-8">

            <div class="w-12 h-12 rounded-2xl bg-[#FAF3E0] flex items-center justify-center">

                <svg xmlns="http://www.w3.org/2000/svg"
                    class="w-6 h-6 text-[#6F4E37]"
                    fill="none"
                    viewBox="0 0 24 24"
                    stroke="currentColor">

                    <path stroke-linecap="round"
                        stroke-linejoin="round"
                        stroke-width="2"
                        d="M11 17a1 1 0 100-2 1 1 0 000 2zm0 0V9m9 3a9 9 0 11-18 0 9 9 0 0118 0z"/>

                </svg>

            </div>

            <h2 class="text-2xl font-bold text-[#2B2118]">
                Target Bulanan
            </h2>

        </div>

        <div class="flex justify-between mb-3">

            <span>Pencapaian Target</span>

            <span class="font-bold text-[#6F4E37]">
                78%
            </span>

        </div>

        <div class="w-full bg-[#EFE3D5] rounded-full h-4">

            <div
                class="bg-gradient-to-r from-[#6F4E37] to-[#A67B5B] h-4 rounded-full"
                style="width:78%">
            </div>

        </div>

        <div class="space-y-4 mt-8">

            <div class="bg-[#FAF3E0] rounded-2xl p-4 flex justify-between">

                <span>Target Revenue</span>

                <span class="font-bold text-[#6F4E37]">
                    Rp 35 JT
                </span>

            </div>

            <div class="bg-[#FAF3E0] rounded-2xl p-4 flex justify-between">

                <span>Customer Baru</span>

                <span class="font-bold text-[#6F4E37]">
                    150
                </span>

            </div>

            <div class="bg-[#FAF3E0] rounded-2xl p-4 flex justify-between">

                <span>Campaign Aktif</span>

                <span class="font-bold text-[#6F4E37]">
                    5
                </span>

            </div>

        </div>

    </div>

</div>

<!-- AKTIVITAS + TOP CUSTOMER -->

<div class="grid xl:grid-cols-2 gap-8 mt-8">

    <!-- AKTIVITAS TERBARU -->

    <div class="bg-white rounded-[30px] shadow-xl p-8 border border-[#EFE3D5]">

        <div class="flex items-center gap-3 mb-6">

            <div class="w-12 h-12 rounded-2xl bg-[#FAF3E0] flex items-center justify-center">

                <svg xmlns="http://www.w3.org/2000/svg"
                    class="w-6 h-6 text-[#6F4E37]"
                    fill="none"
                    viewBox="0 0 24 24"
                    stroke="currentColor">

                    <path stroke-linecap="round"
                        stroke-linejoin="round"
                        stroke-width="2"
                        d="M9 17v-6m3 6V7m3 10v-3m3 7H6a2 2 0 01-2-2V5a2 2 0 012-2h12a2 2 0 012 2v14a2 2 0 01-2 2z"/>

                </svg>

            </div>

            <h2 class="text-2xl font-bold text-[#2B2118]">
                Aktivitas Terbaru
            </h2>

        </div>

        <div class="space-y-4">

            <div class="bg-[#FAF3E0] rounded-2xl p-4 flex items-center gap-4">

                <div class="w-10 h-10 rounded-xl bg-white flex items-center justify-center">

                    <svg xmlns="http://www.w3.org/2000/svg"
                        class="w-5 h-5 text-[#6F4E37]"
                        fill="none"
                        viewBox="0 0 24 24"
                        stroke="currentColor">

                        <path stroke-linecap="round"
                            stroke-linejoin="round"
                            stroke-width="2"
                            d="M17 20h5V18a4 4 0 00-4-4h-1m-4 6H4v-2a4 4 0 014-4h5a4 4 0 014 4v2z"/>

                    </svg>

                </div>

                <span>
                    Pelanggan baru mendaftar sebagai member.
                </span>

            </div>

            <div class="bg-[#FAF3E0] rounded-2xl p-4 flex items-center gap-4">

                <div class="w-10 h-10 rounded-xl bg-white flex items-center justify-center">

                    <svg xmlns="http://www.w3.org/2000/svg"
                        class="w-5 h-5 text-[#6F4E37]"
                        fill="none"
                        viewBox="0 0 24 24"
                        stroke="currentColor">

                        <path stroke-linecap="round"
                            stroke-linejoin="round"
                            stroke-width="2"
                            d="M13 10V3L4 14h7v7l9-11h-7z"/>

                    </svg>

                </div>

                <span>
                    Campaign Buy 1 Get 1 berhasil dijalankan.
                </span>

            </div>

            <div class="bg-[#FAF3E0] rounded-2xl p-4 flex items-center gap-4">

                <div class="w-10 h-10 rounded-xl bg-white flex items-center justify-center">

                    <svg xmlns="http://www.w3.org/2000/svg"
                        class="w-5 h-5 text-[#6F4E37]"
                        fill="none"
                        viewBox="0 0 24 24"
                        stroke="currentColor">

                        <path stroke-linecap="round"
                            stroke-linejoin="round"
                            stroke-width="2"
                            d="M9.75 17L15 12l-5.25-5"/>

                    </svg>

                </div>

                <span>
                    Analisis Apriori berhasil diproses.
                </span>

            </div>

            <div class="bg-[#FAF3E0] rounded-2xl p-4 flex items-center gap-4">

                <div class="w-10 h-10 rounded-xl bg-white flex items-center justify-center">

                    <svg xmlns="http://www.w3.org/2000/svg"
                        class="w-5 h-5 text-[#6F4E37]"
                        fill="none"
                        viewBox="0 0 24 24"
                        stroke="currentColor">

                        <path stroke-linecap="round"
                            stroke-linejoin="round"
                            stroke-width="2"
                            d="M7 17l9.2-9.2M17 17H7V7"/>

                    </svg>

                </div>

                <span>
                    Revenue meningkat 18% dibanding bulan lalu.
                </span>

            </div>

        </div>

    </div>

    <!-- TOP CUSTOMER -->

    <div class="bg-white rounded-[30px] shadow-xl p-8 border border-[#EFE3D5]">

        <div class="flex items-center gap-3 mb-6">

            <div class="w-12 h-12 rounded-2xl bg-[#FAF3E0] flex items-center justify-center">

                <svg xmlns="http://www.w3.org/2000/svg"
                    class="w-6 h-6 text-[#6F4E37]"
                    fill="none"
                    viewBox="0 0 24 24"
                    stroke="currentColor">

                    <path stroke-linecap="round"
                        stroke-linejoin="round"
                        stroke-width="2"
                        d="M5.121 17.804A11.953 11.953 0 0112 15c2.5 0 4.824.763 6.879 2.065M15 11a3 3 0 11-6 0 3 3 0 016 0z"/>

                </svg>

            </div>

            <h2 class="text-2xl font-bold text-[#2B2118]">
                Top Customer
            </h2>

        </div>

        <div class="space-y-4">

            <div class="bg-[#FAF3E0] rounded-2xl p-4 flex items-center justify-between">

                <div class="flex items-center gap-4">

                    <div class="w-12 h-12 rounded-full bg-[#6F4E37] text-white flex items-center justify-center font-bold">
                        P
                    </div>

                    <div>

                        <h4 class="font-semibold">
                            Prasetyo
                        </h4>

                        <p class="text-sm text-stone-500">
                            Platinum Member
                        </p>

                    </div>

                </div>

                <span class="font-bold text-[#6F4E37]">
                    1250 Poin
                </span>

            </div>

            <div class="bg-[#FAF3E0] rounded-2xl p-4 flex items-center justify-between">

                <div class="flex items-center gap-4">

                    <div class="w-12 h-12 rounded-full bg-[#8B6E54] text-white flex items-center justify-center font-bold">
                        A
                    </div>

                    <div>

                        <h4 class="font-semibold">
                            Andi
                        </h4>

                        <p class="text-sm text-stone-500">
                            Gold Member
                        </p>

                    </div>

                </div>

                <span class="font-bold text-[#6F4E37]">
                    640 Poin
                </span>

            </div>

            <div class="bg-[#FAF3E0] rounded-2xl p-4 flex items-center justify-between">

                <div class="flex items-center gap-4">

                    <div class="w-12 h-12 rounded-full bg-[#A67B5B] text-white flex items-center justify-center font-bold">
                        B
                    </div>

                    <div>

                        <h4 class="font-semibold">
                            Budi
                        </h4>

                        <p class="text-sm text-stone-500">
                            Silver Member
                        </p>

                    </div>

                </div>

                <span class="font-bold text-[#6F4E37]">
                    520 Poin
                </span>

            </div>

            <div class="bg-[#FAF3E0] rounded-2xl p-4 flex items-center justify-between">

                <div class="flex items-center gap-4">

                    <div class="w-12 h-12 rounded-full bg-[#C49A6C] text-white flex items-center justify-center font-bold">
                        R
                    </div>

                    <div>

                        <h4 class="font-semibold">
                            Rina
                        </h4>

                        <p class="text-sm text-stone-500">
                            Regular Member
                        </p>

                    </div>

                </div>

                <span class="font-bold text-[#6F4E37]">
                    480 Poin
                </span>

            </div>

        </div>

    </div>

</div>  



<script>

const ctx = document.getElementById('salesChart');

new Chart(ctx, {

    type: 'line',

    data: {

        labels: ['Jan','Feb','Mar','Apr','Mei','Jun'],

        datasets: [{

            label: 'Revenue',

            data: [12,19,8,15,22,18],

            borderColor: '#6F4E37',

            backgroundColor: 'rgba(111,78,55,0.12)',

            borderWidth: 4,

            pointRadius: 6,

            pointHoverRadius: 9,

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

                padding: 12,

                titleColor: '#ffffff',

                bodyColor: '#ffffff',

                displayColors: false

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


<!-- REPORT MODAL -->

<div
    x-show="reportModal"
    x-transition.opacity
    style="display:none"
    class="fixed inset-0 z-[9999] overflow-y-auto bg-black/60">

    <div
    @click.away="reportModal=false"
    class="bg-white w-full max-w-6xl rounded-[36px] shadow-2xl overflow-hidden my-10 mx-auto">

        <!-- HEADER -->

        <div
            class="bg-gradient-to-r from-[#6F4E37] to-[#A67B5B] p-8 text-white">

            <div class="flex justify-between items-start">

                <div>

                    <span class="bg-white/20 px-4 py-2 rounded-full text-sm">
                        Monthly Report
                    </span>

                    <h2 class="text-4xl font-bold mt-4">
                        Laporan CRM Juni 2026
                    </h2>

                    <p class="text-white/80 mt-2">
                        Coffee Business Intelligence Dashboard
                    </p>

                </div>

                <button
                    @click="reportModal=false"
                    class="text-4xl hover:rotate-90 transition">

                    &times;

                </button>

            </div>

        </div>

        <!-- CONTENT -->

        <div class="p-8 space-y-8">

            <!-- KPI -->

            <div class="grid md:grid-cols-4 gap-5">

                <div class="bg-[#FAF3E0] rounded-[24px] p-5">

                    <p class="text-sm text-stone-500">
                        Revenue
                    </p>

                    <h3 class="text-3xl font-bold text-[#6F4E37] mt-2">
                        Rp 28 JT
                    </h3>

                    <span class="text-green-600 text-sm font-medium">
                        +18%
                    </span>

                </div>

                <div class="bg-[#FAF3E0] rounded-[24px] p-5">

                    <p class="text-sm text-stone-500">
                        Pelanggan
                    </p>

                    <h3 class="text-3xl font-bold text-[#6F4E37] mt-2">
                        1.248
                    </h3>

                    <span class="text-green-600 text-sm font-medium">
                        +12%
                    </span>

                </div>

                <div class="bg-[#FAF3E0] rounded-[24px] p-5">

                    <p class="text-sm text-stone-500">
                        Transaksi
                    </p>

                    <h3 class="text-3xl font-bold text-[#6F4E37] mt-2">
                        864
                    </h3>

                    <span class="text-green-600 text-sm font-medium">
                        +8%
                    </span>

                </div>

                <div class="bg-[#FAF3E0] rounded-[24px] p-5">

                    <p class="text-sm text-stone-500">
                        Loyal Customer
                    </p>

                    <h3 class="text-3xl font-bold text-[#6F4E37] mt-2">
                        342
                    </h3>

                    <span class="text-green-600 text-sm font-medium">
                        +6%
                    </span>

                </div>

            </div>

            <!-- HIGHLIGHT -->

            <div>

                <h3 class="text-2xl font-bold text-[#2B2118] mb-5">
                    Business Highlights
                </h3>

                <div class="grid md:grid-cols-3 gap-4">

                    <div class="bg-green-50 border border-green-100 rounded-3xl p-5">

                        <div class="text-green-600 font-bold mb-2">
                            Revenue Growth
                        </div>

                        <p>
                            Revenue meningkat 18% dibanding bulan sebelumnya.
                        </p>

                    </div>

                    <div class="bg-blue-50 border border-blue-100 rounded-3xl p-5">

                        <div class="text-blue-600 font-bold mb-2">
                            Customer Growth
                        </div>

                        <p>
                            64 pelanggan baru berhasil didapatkan bulan ini.
                        </p>

                    </div>

                    <div class="bg-orange-50 border border-orange-100 rounded-3xl p-5">

                        <div class="text-orange-600 font-bold mb-2">
                            Best Campaign
                        </div>

                        <p>
                            Buy 1 Get 1 menjadi campaign terbaik bulan ini.
                        </p>

                    </div>

                </div>

            </div>

            <!-- TOP PRODUCT -->

            <div>

                <h3 class="text-2xl font-bold text-[#2B2118] mb-5">
                    Produk Terlaris
                </h3>

                <div class="space-y-5">

                    <div>

                        <div class="flex justify-between mb-2">

                            <span class="font-medium">
                                Cappuccino
                            </span>

                            <span class="font-bold text-[#6F4E37]">
                                82%
                            </span>

                        </div>

                        <div class="w-full bg-[#EFE3D5] rounded-full h-3">

                            <div
                                class="bg-[#6F4E37] h-3 rounded-full"
                                style="width:82%">
                            </div>

                        </div>

                    </div>

                    <div>

                        <div class="flex justify-between mb-2">

                            <span class="font-medium">
                                Americano
                            </span>

                            <span class="font-bold text-[#8B6E54]">
                                71%
                            </span>

                        </div>

                        <div class="w-full bg-[#EFE3D5] rounded-full h-3">

                            <div
                                class="bg-[#8B6E54] h-3 rounded-full"
                                style="width:71%">
                            </div>

                        </div>

                    </div>

                    <div>

                        <div class="flex justify-between mb-2">

                            <span class="font-medium">
                                Croissant
                            </span>

                            <span class="font-bold text-[#A67B5B]">
                                64%
                            </span>

                        </div>

                        <div class="w-full bg-[#EFE3D5] rounded-full h-3">

                            <div
                                class="bg-[#A67B5B] h-3 rounded-full"
                                style="width:64%">
                            </div>

                        </div>

                    </div>

                </div>

            </div>

            <!-- INSIGHT -->

            <div
                class="bg-gradient-to-r from-[#6F4E37] to-[#A67B5B] rounded-[30px] p-6 text-white">

                <h3 class="text-2xl font-bold mb-3">
                    Insight Apriori
                </h3>

                <p class="text-lg">
                    Pelanggan yang membeli
                    <strong>Cappuccino</strong>
                    memiliki kemungkinan
                    <strong>74%</strong>
                    membeli
                    <strong>Croissant</strong>.
                </p>

            </div>

        </div>

        <!-- FOOTER -->

        <div
            class="border-t border-[#EFE3D5] p-6 flex justify-end gap-4">

            <button
                @click="reportModal=false"
                class="px-6 py-3 rounded-2xl border border-[#DDB892]">

                Tutup

            </button>

            <button
                class="px-6 py-3 rounded-2xl bg-gradient-to-r from-[#6F4E37] to-[#A67B5B] text-white font-semibold">

                Download PDF

            </button>

        </div>

    </div>

</div>

@endsection

