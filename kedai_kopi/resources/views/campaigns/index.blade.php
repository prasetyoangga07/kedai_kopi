@extends('layouts.app')

@section('content')

<div
x-data="{
campaignModal:false,
campaignDetail:false,
campaignEdit:false,
campaignDelete:false,

selectedCampaign:null,

campaigns:[

{
id:1,
name:'Buy 1 Get 1 Cappuccino',
status:'Aktif',
target:5000000,
revenue:3900000,
image:'https://images.unsplash.com/photo-1495474472287-4d71bcdd2085?auto=format&fit=crop&w=1200&q=80'
},

{
id:2,
name:'Weekend Coffee Deal',
status:'Upcoming',
target:3000000,
revenue:1200000,
image:'https://images.unsplash.com/photo-1509042239860-f550ce710b93?auto=format&fit=crop&w=1200&q=80'
},

{
id:3,
name:'Pastry Combo Package',
status:'Selesai',
target:4000000,
revenue:4500000,
image:'https://images.unsplash.com/photo-1555507036-ab1f4038808a?auto=format&fit=crop&w=1200&q=80'
}

]

}"
>

<!-- HEADER -->

<div class="flex justify-between items-center mb-8">


<div>

    <span
    class="inline-flex items-center gap-2
    px-4 py-2 rounded-full
    bg-[#FAF3E0]
    text-[#6F4E37]
    text-sm font-semibold">

        <svg xmlns="http://www.w3.org/2000/svg"
             class="w-4 h-4"
             fill="none"
             viewBox="0 0 24 24"
             stroke="currentColor">

            <path stroke-linecap="round"
                  stroke-linejoin="round"
                  stroke-width="2"
                  d="M3 11l18-5v12l-18-5v-2z"/>

        </svg>

        Marketing Automation

    </span>

    <h1 class="text-5xl font-bold text-[#2B2118] mt-4">
        Campaign Intelligence
    </h1>

    <p class="text-[#8B6E54] mt-3 text-lg">
        Kelola performa promo, reach pelanggan, dan konversi campaign.
    </p>

</div>

<button
        @click="campaignModal=true"
        class="group
        bg-gradient-to-r
        from-[#6F4E37]
        to-[#A67B5B]
        text-white
        px-7 py-4
        rounded-2xl
        shadow-xl
        hover:shadow-2xl
        hover:-translate-y-1
        transition-all">

            + Buat Campaign

</button>


</div>

<!-- KPI -->

<div class="grid grid-cols-1 md:grid-cols-2 xl:grid-cols-4 gap-6 mb-8">

    <div class="bg-white rounded-[32px] p-6 shadow-xl border border-[#E8D8C4]">

        <div class="flex justify-between items-center">

            <div>

                <p class="text-stone-500">
                    Campaign Aktif
                </p>

                <h2 class="text-5xl font-bold text-[#2B2118] mt-3">
                    5
                </h2>

                <p class="text-green-600 mt-2 text-sm">
                    +2 bulan ini
                </p>

            </div>

            <div class="w-16 h-16 rounded-2xl bg-[#FAF3E0] flex items-center justify-center">

                <svg xmlns="http://www.w3.org/2000/svg"
                    class="w-8 h-8 text-[#6F4E37]"
                    fill="none"
                    viewBox="0 0 24 24"
                    stroke="currentColor">

                    <path stroke-linecap="round"
                        stroke-linejoin="round"
                        stroke-width="2"
                        d="M3 11l18-5v12l-18-5v-2z"/>

                </svg>

            </div>

        </div>

    </div>

    <div class="bg-white rounded-[32px] p-6 shadow-xl border border-[#E8D8C4]">

        <div class="flex justify-between items-center">

            <div>

                <p class="text-stone-500">
                    Revenue Promo
                </p>

                <h2 class="text-4xl font-bold text-[#2B2118] mt-3">
                    Rp 12 JT
                </h2>

                <p class="text-green-600 mt-2 text-sm">
                    +18%
                </p>

            </div>

            <div class="w-16 h-16 rounded-2xl bg-[#FAF3E0] flex items-center justify-center">

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

        <div class="flex justify-between items-center">

            <div>

                <p class="text-stone-500">
                    Customer Reach
                </p>

                <h2 class="text-5xl font-bold text-[#2B2118] mt-3">
                    842
                </h2>

                <p class="text-green-600 mt-2 text-sm">
                    +11%
                </p>

            </div>

            <div class="w-16 h-16 rounded-2xl bg-[#FAF3E0] flex items-center justify-center">

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

        <div class="flex justify-between items-center">

            <div>

                <p class="text-stone-500">
                    Conversion
                </p>

                <h2 class="text-5xl font-bold text-[#2B2118] mt-3">
                    74%
                </h2>

                <p class="text-green-600 mt-2 text-sm">
                    Excellent
                </p>

            </div>

            <div class="w-16 h-16 rounded-2xl bg-[#FAF3E0] flex items-center justify-center">

                <svg xmlns="http://www.w3.org/2000/svg"
                    class="w-8 h-8 text-[#6F4E37]"
                    fill="none"
                    viewBox="0 0 24 24"
                    stroke="currentColor">

                    <circle cx="12" cy="12" r="8"/>

                    <circle cx="12" cy="12" r="3"/>

                </svg>

            </div>

        </div>

    </div>

</div>

<!-- FEATURED CAMPAIGN -->

<div
class="relative overflow-hidden
rounded-[36px]
h-[420px]
mb-8
shadow-2xl">

    <!-- FOTO -->

    <img
        src="https://images.unsplash.com/photo-1495474472287-4d71bcdd2085?auto=format&fit=crop&w=1800&q=80"
        class="absolute inset-0 w-full h-full object-cover">

    <!-- OVERLAY -->

    <div
        class="absolute inset-0
        bg-gradient-to-r
        from-[#6F4E37]
        via-[#6F4E37]/80
        via-40%
        to-transparent">
    </div>

    <!-- DECORATION -->

    <div
        class="absolute -left-32 top-0
        w-[500px]
        h-[500px]
        rounded-full
        bg-[#A67B5B]/20
        blur-3xl">
    </div>

    <!-- CONTENT -->

    <div
        class="relative z-20
        h-full
        flex
        flex-col
        justify-center
        px-12">

        <span
            class="w-fit
            bg-white/15
            backdrop-blur-md
            border border-white/10
            px-5 py-3
            rounded-full
            text-sm
            font-semibold
            text-white">

            REVENUE DRIVER

        </span>

        <h2 class="text-7xl text-white font-bold mt-6">
            Buy 1 Get 1
        </h2>

        <p class="mt-4 text-2xl text-white/90">
            Cappuccino Special Weekend
        </p>

        <div class="flex gap-4 mt-8">

            <button
                class="bg-white
                text-[#6F4E37]
                px-8 py-4
                rounded-2xl
                font-bold">

                Lihat Detail

            </button>

            <div
                class="bg-white/10
                backdrop-blur-md
                border border-white/10
                rounded-2xl
                px-6 py-4">

                <p class="text-xs text-white/70">
                    Conversion
                </p>

                <h4 class="font-bold text-xl text-white">
                    78%
                </h4>

            </div>

        </div>

    </div>

</div>

<!-- CAMPAIGN LIST -->

<div class="grid md:grid-cols-2 xl:grid-cols-3 gap-6">

<template
x-for="campaign in campaigns"
:key="campaign.id">

<div class="bg-white rounded-[30px] shadow-xl overflow-hidden flex flex-col h-full px-3">


<div class="h-48 overflow-hidden">

    <img
        :src="campaign.image"
        :alt="campaign.name"
        class="w-full h-full object-cover">

</div>

<div class="p-6">

    <!-- HEADER -->

    <div class="flex justify-between items-center">

        <h3
            class="font-bold text-xl text-[#2B2118]"
            x-text="campaign.name">
        </h3>

        <span

            :class="

            campaign.status == 'Aktif'
            ? 'bg-green-100 text-green-700'

            : campaign.status == 'Upcoming'
            ? 'bg-yellow-100 text-yellow-700'

            : 'bg-red-100 text-red-700'

            "

            class="px-4 py-2 rounded-full text-xs font-bold">

            <span x-text="campaign.status"></span>

        </span>

    </div>

    <!-- PROGRESS -->

    <div class="mt-6">

        <div class="flex justify-between mb-3">

            <span class="font-medium text-stone-600">
                Progress
            </span>

            <span class="font-bold text-[#6F4E37]">

                <span
                    x-text="Math.min(
                        Math.round((campaign.revenue/campaign.target)*100),
                        100
                    )">
                </span>

                %

            </span>

        </div>

        <!-- OVER TARGET -->

        <div class="h-8 mb-3">

    <div
        x-show="campaign.revenue >= campaign.target"
        class="inline-flex px-3 py-1 rounded-full bg-green-100 text-green-700 text-xs font-bold">

        OVER TARGET

    </div>

</div>

        <!-- MINI KPI -->

        <div class="grid grid-cols-2 gap-3 mb-4">

            <div
                class="bg-[#FAF3E0] rounded-2xl p-3">

                <p class="text-xs text-stone-500">
                    Revenue
                </p>

                <p class="font-bold text-[#6F4E37]">
                    Rp 3.9 JT
                </p>

            </div>

            <div
                class="bg-[#FAF3E0] rounded-2xl p-3">

                <p class="text-xs text-stone-500">
                    Conversion
                </p>

                <p class="font-bold text-[#6F4E37]">
                    74%
                </p>

            </div>

        </div>

        <!-- PROGRESS BAR -->

        <div class="w-full bg-stone-200 rounded-full h-3 overflow-hidden">

            <div

                class="bg-[#6F4E37] h-3 rounded-full transition-all duration-700"

                :style="`width:${Math.min((campaign.revenue/campaign.target)*100,100)}%`">

            </div>

        </div>

    </div>

    <!-- TARGET -->

    <div class="mt-6">

        <p class="text-sm text-stone-500">
            Target Revenue
        </p>

        <h4 class="font-bold text-2xl text-[#2B2118]">

            Rp

            <span
                x-text="campaign.target.toLocaleString()">
            </span>

        </h4>

    </div>

</div>

    <div class="mt-8 p-4">

    <button

        @click="
        selectedCampaign = campaign;
        campaignDetail = true
        "

        class="w-full
        border border-[#DDB892]
        text-[#6F4E37]
        py-3.5
        rounded-2xl
        font-semibold
        hover:bg-[#FAF3E0]
        transition">

        Lihat Detail Campaign

    </button>

        <div class="grid grid-cols-2 gap-3 mt-3">

            <button

                @click="
                selectedCampaign = campaign;
                campaignEdit = true
                "

                class="bg-[#6F4E37]
                text-white
                py-3.5
                rounded-2xl
                font-semibold">

                Edit

            </button>

            <button

                @click="
                selectedCampaign = campaign;
                campaignDelete = true
                "

                class="bg-red-50
                border border-red-200
                text-red-500
                py-3.5
                rounded-2xl
                font-semibold">

                Hapus

            </button>

        </div>

    </div>

</div>


</div>

</template>

</div>

<!-- CREATE CAMPAIGN MODAL -->

<div
    x-show="campaignModal"
    x-transition.opacity
    style="display:none"
    class="fixed inset-0 z-[9999] bg-black/60 backdrop-blur-sm flex items-center justify-center p-6">

    <div
        @click.away="campaignModal=false"
        class="bg-white w-full max-w-4xl rounded-[36px] overflow-hidden shadow-[0_30px_80px_rgba(0,0,0,0.18)]">

        <!-- HEADER -->

        <div
            class="bg-gradient-to-r from-[#6F4E37] to-[#A67B5B] p-8 text-white">

            <span
                class="inline-flex items-center px-4 py-2 rounded-full bg-white/15 text-sm font-medium">

                Marketing Automation
            </span>

            <h2 class="text-4xl font-bold mt-5">
                Buat Campaign Baru
            </h2>

            <p class="text-white/80 mt-2">
                Kelola promo dan strategi marketing untuk meningkatkan revenue.
            </p>

        </div>

        <!-- BODY -->

        <div class="px-10 py-10 lg:px-12 lg:py-12 max-h-[70vh] overflow-y-auto">

            <div class="grid lg:grid-cols-2 gap-10">

                <!-- LEFT -->

                <div class="space-y-5">

                    <div>

                        <label class="font-semibold text-[#2B2118]">
                            Nama Campaign
                        </label>

                        <input
                            type="text"
                            placeholder="Contoh : Buy 1 Get 1 Cappuccino"
                            class="w-full mt-2 border border-[#E8D8C4] rounded-2xl p-4 focus:outline-none focus:ring-2 focus:ring-[#A67B5B]">

                    </div>

                    <div>

                        <label class="font-semibold text-[#2B2118]">
                            Deskripsi Campaign
                        </label>

                        <textarea
                            rows="5"
                            placeholder="Jelaskan tujuan campaign..."
                            class="w-full mt-2 border border-[#E8D8C4] rounded-2xl p-4 focus:outline-none focus:ring-2 focus:ring-[#A67B5B]"></textarea>

                    </div>

                    <div>

                        <label class="font-semibold text-[#2B2118]">
                            Upload Banner
                        </label>

                        <input
                            type="file"
                            class="w-full mt-2 border border-dashed border-[#DDB892] rounded-2xl p-4">

                    </div>

                </div>

                <!-- RIGHT -->

                <div class="space-y-5">

                    <div class="grid grid-cols-2 gap-4">

                        <div>

                            <label class="font-semibold text-[#2B2118]">
                                Status
                            </label>

                            <select
                                class="w-full mt-2 border border-[#E8D8C4] rounded-2xl p-4">

                                <option>Aktif</option>
                                <option>Upcoming</option>
                                <option>Selesai</option>

                            </select>

                        </div>

                        <div>

                            <label class="font-semibold text-[#2B2118]">
                                Target Revenue
                            </label>

                            <input
                                type="number"
                                placeholder="5000000"
                                class="w-full mt-2 border border-[#E8D8C4] rounded-2xl p-4">

                        </div>

                    </div>

                    <div class="grid grid-cols-2 gap-4">

                        <div>

                            <label class="font-semibold text-[#2B2118]">
                                Tanggal Mulai
                            </label>

                            <input
                                type="date"
                                class="w-full mt-2 border border-[#E8D8C4] rounded-2xl p-4">

                        </div>

                        <div>

                            <label class="font-semibold text-[#2B2118]">
                                Tanggal Selesai
                            </label>

                            <input
                                type="date"
                                class="w-full mt-2 border border-[#E8D8C4] rounded-2xl p-4">

                        </div>

                    </div>

                    <!-- PREVIEW -->

                    <div
                        class="bg-gradient-to-r
                        from-[#FAF3E0]
                        to-[#F8F3ED]
                        border border-[#EFE3D5]
                        rounded-[28px]
                        p-6">

                        <h3
                            class="font-bold text-xl text-[#6F4E37]">

                            Preview Campaign

                        </h3>

                        <p class="text-stone-500 mt-2">
                            Campaign akan muncul pada dashboard marketing
                            dan masuk ke laporan performa bisnis.
                        </p>

                        <div
                            class="grid grid-cols-3 gap-3 mt-5">

                            <div
                                class="bg-white rounded-2xl p-4">

                                <p class="text-xs text-stone-500">
                                    Reach
                                </p>

                                <h4 class="font-bold text-lg">
                                    0
                                </h4>

                            </div>

                            <div
                                class="bg-white rounded-2xl p-4">

                                <p class="text-xs text-stone-500">
                                    Revenue
                                </p>

                                <h4 class="font-bold text-lg">
                                    Rp 0
                                </h4>

                            </div>

                            <div
                                class="bg-white rounded-2xl p-4">

                                <p class="text-xs text-stone-500">
                                    Conversion
                                </p>

                                <h4 class="font-bold text-lg">
                                    0%
                                </h4>

                            </div>

                        </div>

                    </div>

                </div>

            </div>

        </div>

        <!-- FOOTER -->

        <div
            class="border-t border-[#EFE3D5] p-6 flex justify-end gap-4">

            <button
                @click="campaignModal=false"
                class="px-6 py-3 rounded-2xl border border-[#DDB892] hover:bg-[#FAF3E0]">

                Batal

            </button>

            <button
                class="px-6 py-3 rounded-2xl bg-gradient-to-r from-[#6F4E37] to-[#A67B5B] text-white font-semibold shadow-lg">

                Simpan Campaign

            </button>

        </div>

    </div>

</div>

<!-- DETAIL CAMPAIGN -->

<div
    x-show="campaignDetail"
    x-transition.opacity
    style="display:none"
    class="fixed inset-0 z-[9999] bg-black/60 backdrop-blur-sm flex items-center justify-center p-6">

    <div
        @click.away="campaignDetail=false"
        class="bg-white w-full max-w-3xl rounded-[36px] overflow-hidden shadow-2xl">

        <div
            class="bg-gradient-to-r from-[#6F4E37] to-[#A67B5B] p-8 text-white">

            <h2 class="text-3xl font-bold">
                Detail Campaign
            </h2>

            <p class="text-white/80 mt-2">
                Informasi lengkap campaign.
            </p>

        </div>

        <div class="p-8 space-y-6">

            <div class="grid md:grid-cols-2 gap-5">

                <div class="bg-[#FAF3E0] rounded-3xl p-5">

                    <p class="text-stone-500 text-sm">
                        Nama Campaign
                    </p>

                    <h3 class="font-bold text-xl">
                        Buy 1 Get 1 Cappuccino
                    </h3>

                </div>

                <div class="bg-[#FAF3E0] rounded-3xl p-5">

                    <p class="text-stone-500 text-sm">
                        Status
                    </p>

                    <h3 class="font-bold text-xl text-green-600">
                        Aktif
                    </h3>

                </div>

            </div>

            <div class="bg-[#FAF3E0] rounded-3xl p-6">

                <p class="text-stone-500 text-sm">
                    Deskripsi
                </p>

                <p class="mt-2">
                    Promo pembelian Cappuccino mendapatkan
                    1 Cappuccino gratis.
                </p>

            </div>

        </div>

        <div class="border-t p-6 flex justify-end">

            <button
                @click="campaignDetail=false"
                class="px-6 py-3 rounded-2xl bg-[#6F4E37] text-white">

                Tutup

            </button>

        </div>

    </div>

</div>


<!-- EDIT CAMPAIGN -->

<div
    x-show="campaignEdit"
    x-transition.opacity
    style="display:none"
    class="fixed inset-0 z-[9999] bg-black/60 backdrop-blur-sm flex items-center justify-center p-6">

    <div
        @click.away="campaignEdit=false"
        class="bg-white w-full max-w-4xl rounded-[36px] overflow-hidden shadow-2xl">

        <div
            class="bg-gradient-to-r from-[#6F4E37] to-[#A67B5B] p-8 text-white">

            <h2 class="text-3xl font-bold">
                Edit Campaign
            </h2>

        </div>

        <div class="p-8 space-y-5">

            <input
                value="Buy 1 Get 1 Cappuccino"
                class="w-full border border-[#E8D8C4] rounded-2xl p-4">

            <textarea
                rows="5"
                class="w-full border border-[#E8D8C4] rounded-2xl p-4">Promo Cappuccino terbaik bulan ini.</textarea>

        </div>

        <div class="border-t p-6 flex justify-end gap-3">

            <button
                @click="campaignEdit=false"
                class="px-6 py-3 rounded-2xl border">

                Batal

            </button>

            <button
                class="px-6 py-3 rounded-2xl bg-[#6F4E37] text-white">

                Simpan Perubahan

            </button>

        </div>

    </div>

</div>


<!-- DELETE CAMPAIGN -->

<div
    x-show="campaignDelete"
    x-transition.opacity
    style="display:none"
    class="fixed inset-0 z-[9999] bg-black/60 backdrop-blur-sm flex items-center justify-center p-6">

    <div
                @click.away="campaignDelete=false"
                class="bg-white w-full max-w-md rounded-[36px] p-8 text-center shadow-2xl">

            <div
            class="w-20 h-20 rounded-[24px]
            bg-gradient-to-br
            from-red-50
            to-red-100
            mx-auto
            flex items-center justify-center
            border border-red-200">

            <svg xmlns="http://www.w3.org/2000/svg"
                class="w-10 h-10 text-red-500"
                fill="none"
                viewBox="0 0 24 24"
                stroke="currentColor">

                <path stroke-linecap="round"
                    stroke-linejoin="round"
                    stroke-width="2"
                    d="M12 9v2m0 4h.01M5.07 19h13.86c1.54 0 2.5-1.67 1.73-3L13.73 4c-.77-1.33-2.69-1.33-3.46 0L3.34 16c-.77 1.33.19 3 1.73 3z"/>

            </svg>

    </div>

        <h2 class="text-2xl font-bold mt-5">
            Hapus Campaign?
        </h2>

        <p class="text-stone-500 mt-2">
            Data campaign yang dihapus tidak dapat dikembalikan.
        </p>

        <div class="flex gap-3 mt-8">

            <button
                @click="campaignDelete=false"
                class="flex-1 py-3 rounded-2xl border">

                Batal

            </button>

            <button
                class="flex-1 py-3 rounded-2xl bg-red-500 text-white">

                Hapus

            </button>

        </div>

    </div>

</div>

@endsection
