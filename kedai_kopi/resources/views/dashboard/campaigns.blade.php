@extends('dashboard.layouts.app')

@if(session('success'))

<div
    x-data="{ show: true }"
    x-init="setTimeout(() => show = false, 3000)"
    x-show="show"
    x-transition:enter="transition ease-out duration-300"
    x-transition:enter-start="opacity-0 translate-y-2"
    x-transition:enter-end="opacity-100 translate-y-0"
    x-transition:leave="transition ease-in duration-300"
    x-transition:leave-start="opacity-100"
    x-transition:leave-end="opacity-0"
    class="fixed top-5 right-5 z-99999">

    <div
        class="bg-green-500 text-white px-6 py-4 rounded-2xl shadow-xl flex items-center gap-3">

        <svg xmlns="http://www.w3.org/2000/svg"
            class="w-5 h-5"
            fill="none"
            viewBox="0 0 24 24"
            stroke="currentColor">

            <path
                stroke-linecap="round"
                stroke-linejoin="round"
                stroke-width="2"
                d="M5 13l4 4L19 7" />

        </svg>

        <span>{{ session('success') }}</span>

    </div>

</div>

@endif

@section('content')


<div
    x-data="{
    campaignModal:false,
    campaignDetail:false,
    campaignEdit:false,
    campaignDelete:false,

    selectedCampaign:null,

    search:'',
    statusFilter:'',

    form: {
    name: '',
    status: 'active',
    campaign_type: 'discount',
    target_revenue: 0,
    discount_percentage: 0,
    start_date: '',
    end_date: ''

    },

    campaigns: @js(
        $campaigns->map(function($c){
            return [
                'id' => $c->id,
                'name' => $c->name,
                'description' => $c->description,

                'status' => $c->status,
                'campaign_type' => $c->campaign_type,
                'discount_percentage' => $c->discount_percentage,

                'target_revenue' => (int)$c->target_revenue,

                'revenue' => (float)($c->statistics->revenue ?? 0),
                'conversion' => (float)($c->statistics->conversion_rate ?? 0),
                'reach' => (int)($c->statistics->reach_count ?? 0),

                'start_date' => $c->start_date,
                'end_date' => $c->end_date,

                'creator' => $c->creator?->name ?? '-',

                'products' => $c->products->pluck('name')->toArray(),

                'image' => 'https://loremflickr.com/800/600/coffee,cafe?lock='.$c->id
            ];
        })
    )
}">

    <!-- HEADER -->

    <div class="flex justify-between items-center mb-8">


        <div>

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
        bg-linear-to-r
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

        <div class="bg-white rounded-4xl p-6 shadow-xl border border-[#E8D8C4]">

            <div class="flex justify-between items-center">

                <div>

                    <p class="text-stone-500 text-sm font-medium">
                        Campaign Aktif
                    </p>

                    <h2 class="text-5xl font-black text-[#2B2118] mt-3">
                        {{ $activeCampaigns }}
                    </h2>

                    <p class="text-green-500 font-semibold mt-2">
                        Active Campaign
                    </p>

                </div>

                <div class="w-16 h-16 rounded-2xl bg-linear-to-br from-[#FAF3E0] to-[#F2E6D3] flex items-center justify-center shadow-inner">

                    <x-heroicon-o-megaphone
                        class="w-8 h-8 text-[#6F4E37]" />

                </div>

            </div>

        </div>

        <div class="bg-white rounded-4xl p-6 shadow-xl border border-[#E8D8C4]">

            <div class="flex justify-between items-center">

                <div>

                    <p class="text-stone-500 text-sm font-medium">
                        Revenue Promo
                    </p>

                    <h2 class="text-4xl font-black text-[#2B2118] mt-3">
                        Rp {{ number_format($totalRevenue,0,',','.') }}
                    </h2>

                    <p class="text-green-500 font-semibold mt-2">
                        Total Revenue
                    </p>

                </div>

                <div class="w-16 h-16 rounded-2xl bg-linear-to-br from-[#FAF3E0] to-[#F2E6D3] flex items-center justify-center shadow-inner">

                    <x-heroicon-o-banknotes
                        class="w-8 h-8 text-[#6F4E37]" />

                </div>

            </div>

        </div>

        <div class="bg-white rounded-4xl p-6 shadow-xl border border-[#E8D8C4]">

            <div class="flex justify-between items-center">

                <div>

                    <p class="text-stone-500 text-sm font-medium">
                        Produk Promo
                    </p>

                    <h2 class="text-5xl font-black text-[#2B2118] mt-3">
                        {{ $totalProductsPromo }}
                    </h2>

                    <p class="text-green-500 font-semibold mt-2">
                        Produk Terhubung
                    </p>

                </div>

                <div class="w-16 h-16 rounded-2xl bg-linear-to-br from-[#FAF3E0] to-[#F2E6D3] flex items-center justify-center shadow-inner">

                    <x-heroicon-o-cube
                        class="w-8 h-8 text-[#6F4E37]" />

                </div>

            </div>

        </div>

        <div class="bg-white rounded-4xl p-6 shadow-xl border border-[#E8D8C4]">

            <div class="flex justify-between items-center">

                <div>

                    <p class="text-stone-500 text-sm font-medium">
                        Avg Conversion
                    </p>

                    <h2 class="text-5xl font-black text-[#2B2118] mt-3">
                        {{ $avgConversion }}%
                    </h2>

                    <p class="text-green-500 font-semibold mt-2">
                        Rata-rata Campaign
                    </p>

                </div>

                <div class="w-16 h-16 rounded-2xl bg-linear-to-br from-[#FAF3E0] to-[#F2E6D3] flex items-center justify-center shadow-inner">

                    <x-heroicon-o-chart-bar
                        class="w-8 h-8 text-[#6F4E37]" />

                </div>

            </div>

        </div>

    </div>

    <!-- FEATURED CAMPAIGN -->

    <div class="bg-white border border-[#E8D8C4] rounded-[28px] p-4 shadow-lg mb-8">

        <div class="flex items-center gap-4">

            <!-- SEARCH -->

            <div
                class="
    flex
    items-center
    flex-1
    h-12
    px-4
    bg-[#FAF9F6]
    border border-[#E8D8C4]
    rounded-2xl">

                <svg
                    xmlns="http://www.w3.org/2000/svg"
                    fill="none"
                    viewBox="0 0 24 24"
                    stroke-width="1.5"
                    stroke="currentColor"
                    class="w-5 h-5 text-stone-400 shrink-0">

                    <path
                        stroke-linecap="round"
                        stroke-linejoin="round"
                        d="m21 21-4.35-4.35m0 0A7.5 7.5 0 1 0 6.5 6.5a7.5 7.5 0 0 0 10.15 10.15Z" />

                </svg>

                <input
                    type="text"
                    x-model="search"
                    placeholder="Cari campaign..."
                    class="
        flex-1
        ml-3
        bg-transparent
        border-0
        outline-none
        focus:ring-0">

            </div>

            <!-- FILTER -->

            <div class="flex items-center bg-[#F5F6F8] p-1.5 rounded-2xl shadow-inner gap-1">

                <button
                    @click="statusFilter=''"
                    :class="statusFilter=='' 
            ? 'bg-[#6F4E37] text-white shadow-md'
            : 'text-stone-600 hover:bg-white'"
                    class="px-5 py-2.5 rounded-xl text-sm font-semibold transition-all duration-200">
                    All
                </button>

                <button
                    @click="statusFilter='active'"
                    :class="statusFilter=='active'
            ? 'bg-green-100 text-green-700 shadow-md'
            : 'text-stone-600 hover:bg-white'"
                    class="px-5 py-2.5 rounded-xl text-sm font-semibold transition-all duration-200">
                    Active
                </button>

                <button
                    @click="statusFilter='completed'"
                    :class="statusFilter=='completed'
            ? 'bg-blue-100 text-blue-700 shadow-md'
            : 'text-stone-600 hover:bg-white'"
                    class="px-5 py-2.5 rounded-xl text-sm font-semibold transition-all duration-200">
                    Completed
                </button>

                <button
                    @click="statusFilter='draft'"
                    :class="statusFilter=='draft'
            ? 'bg-orange-100 text-orange-700 shadow-md'
            : 'text-stone-600 hover:bg-white'"
                    class="px-5 py-2.5 rounded-xl text-sm font-semibold transition-all duration-200">
                    Draft
                </button>

            </div>

        </div>

    </div>

    <!-- CAMPAIGN LIST -->

    <div class="grid md:grid-cols-2 xl:grid-cols-3 gap-6">

        <template
            x-for="campaign in campaigns.filter(c => {

        const searchMatch =
            !search ||
            c.name.toLowerCase().includes(search.toLowerCase()) ||
            c.campaign_type.toLowerCase().includes(search.toLowerCase())

        const campaignStatus =
            String(c.status || '')
            .trim()
            .toLowerCase()

        const filterStatus =
            String(statusFilter || '')
            .trim()
            .toLowerCase()

        const statusMatch =
            !filterStatus ||
            campaignStatus === filterStatus

        return searchMatch && statusMatch

    })"
            :key="campaign.id">

            <div class="bg-white rounded-[30px] shadow-xl overflow-hidden flex flex-col h-full px-3">


                <div class="p-6">

                    <div class="flex justify-between items-start">

                        <div>

                            <h3
                                class="font-black text-2xl text-[#2B2118]"
                                x-text="campaign.name">
                            </h3>

                            <p
                                class="text-sm text-stone-500 mt-1"
                                x-text="campaign.campaign_type">
                            </p>

                        </div>

                        <span

                            :class="
            campaign.status === 'active'
            ? 'bg-green-100 text-green-700 border border-green-200'

            : campaign.status === 'completed'
            ? 'bg-blue-100 text-blue-700 border border-blue-200'

            : 'bg-yellow-100 text-yellow-700 border border-yellow-200'
            "

                            class="px-4 py-2 rounded-full text-xs font-bold">

                            <span x-text="campaign.status"></span>

                        </span>

                    </div>

                    <div class="mt-4 flex items-center gap-2 flex-wrap">

                        <span
                            class="
    inline-flex items-center gap-2
    px-3 py-1 rounded-xl
    bg-[#FAF3E0]
    text-[#6F4E37]
    text-xs font-semibold">

                            <x-heroicon-o-bolt class="w-4 h-4" />

                            Revenue Driver

                        </span>

                        <span
                            class="
    inline-flex items-center gap-2
    px-3 py-1 rounded-xl
    bg-stone-100
    text-stone-600
    text-xs">

                            <x-heroicon-o-calendar-days class="w-4 h-4" />

                            <span x-text="campaign.start_date"></span>

                            -

                            <span x-text="campaign.end_date"></span>

                        </span>

                    </div>

                    <!-- PROGRESS -->
                    <div class="mt-2">

                        <!-- PROGRESS -->

                        <div>

                            <div class="flex justify-between mb-3">

                                <span class="font-medium text-stone-600">
                                    Progress
                                </span>

                                <span class="font-bold text-[#6F4E37]">

                                    <span
                                        x-text="Math.round((campaign.revenue / campaign.target_revenue) * 100)">
                                    </span>

                                    %

                                </span>

                            </div>

                            <!-- OVER TARGET -->

                            <div
                                x-show="campaign.revenue >= campaign.target_revenue"
                                class="mb-3">

                                <div
                                    x-show="campaign.revenue >= campaign.target_revenue"
                                    class="
    inline-flex items-center gap-2
    px-3 py-1 rounded-full
    bg-green-100
    text-green-700
    text-xs font-bold">

                                    <x-heroicon-o-arrow-trending-up class="w-4 h-4" />

                                    OVER TARGET

                                </div>

                            </div>

                            <!-- MINI KPI -->

                            <div class="grid grid-cols-2 gap-3 mb-4">

                                <div
                                    class="bg-[#FAF3E0] rounded-2xl p-3">

                                    <p class="text-sm text-stone-500">
                                        Revenue
                                    </p>

                                    <p class="font-black text-xl text-[#6F4E37]">
                                        Rp <span x-text="campaign.revenue.toLocaleString('id-ID')"></span>
                                    </p>

                                </div>

                                <div
                                    class="bg-[#FAF3E0] rounded-2xl p-3">

                                    <p class="text-sm text-stone-500">
                                        Conversion
                                    </p>

                                    <p class="font-black text-xl text-[#6F4E37]">
                                        <span x-text="campaign.conversion"> </span> %
                                    </p>

                                </div>

                            </div>

                            <!-- PROGRESS BAR -->

                            <div class="w-full bg-stone-200 rounded-full h-3 overflow-hidden">

                                <div
                                    class="bg-[#6F4E37] h-3 rounded-full transition-all duration-700"
                                    :style="'width:'+Math.min((campaign.revenue/campaign.target_revenue)*100,100)+'%'">
                                </div>

                            </div>

                        </div>

                        <!-- TARGET -->

                        <div class=" mt-3">

                            <p class="text-sm text-stone-500">
                                Target Revenue
                            </p>

                            <h4 class="font-bold text-2xl text-[#2B2118]">

                                Rp

                                <span
                                    x-text="campaign.target_revenue.toLocaleString('id-ID')">
                                </span>

                            </h4>

                        </div>

                        <div
                            class="mt-5
    rounded-2xl
    border
    border-[#EFE3D5]
    bg-linear-to-r
    from-[#FAF3E0]
    to-white
    px-4 py-3">

                            <div class="flex justify-between items-center">

                                <div>

                                    <p class="text-sm text-stone-500">
                                        Campaign Ends
                                    </p>

                                    <h4
                                        class="font-bold text-[#6F4E37]"
                                        x-text="
                Math.max(
                0,
                Math.ceil(
                (new Date(campaign.end_date)-new Date())
                /(1000*60*60*24)
                )
                ) + ' Hari Lagi'
                ">
                                    </h4>

                                </div>

                                <div
                                    class="w-10 h-10
    rounded-xl
    bg-[#6F4E37]
    text-white
    flex items-center justify-center">

                                    <x-heroicon-o-clock class="w-6 h-6" />

                                </div>

                            </div>

                        </div>

                        <!-- ACTION BUTTONS -->

                        <div class="mt-4 px-4 pb-4">

                            <div class="grid grid-cols-3 gap-2">

                                <!-- DETAIL -->

                                <button
                                    @click="
            selectedCampaign = campaign;
            campaignDetail = true
            "
                                    class="
            flex items-center justify-center gap-2
            py-4
            rounded-xl
            border border-[#DDB892]
            text-[#6F4E37]
            text-sm font-medium
            hover:bg-[#FAF3E0]
            transition-all">

                                    <x-heroicon-o-eye class="w-4 h-4" />

                                    Detail

                                </button>

                                <!-- EDIT -->

                                <button
                                    @click="
            selectedCampaign = campaign;
            campaignEdit = true
            "
                                    class="
            flex items-center justify-center gap-2
            py-4
            rounded-xl
            bg-[#6F4E37]
            text-white
            text-sm font-medium
            hover:bg-[#5B3E2C]
            transition-all">

                                    <x-heroicon-o-pencil-square class="w-4 h-4" />

                                    Edit

                                </button>

                                <!-- DELETE -->

                                <button
                                    @click="
            selectedCampaign = campaign;
            campaignDelete = true
            "
                                    class="
            flex items-center justify-center gap-2
            py-4
            rounded-xl
            bg-red-50
            border border-red-200
            text-red-500
            text-sm font-medium
            hover:bg-red-100
            transition-all">

                                    <x-heroicon-o-trash class="w-4 h-4" />

                                    Hapus

                                </button>

                            </div>

                        </div>

                    </div>

                </div>

        </template>

    </div>

    <!-- CREATE CAMPAIGN MODAL -->

    <!-- CREATE CAMPAIGN MODAL -->

    <div
        x-show="campaignModal"
        x-transition.opacity
        style="display:none"
        class="fixed inset-0 z-9999 bg-black/60 backdrop-blur-sm flex items-center justify-center p-6">


        <div
            @click.away="campaignModal=false"
            class="bg-white w-full max-w-4xl rounded-[36px] overflow-hidden shadow-[0_30px_80px_rgba(0,0,0,0.18)]">

            <form
                action="{{ route('campaigns.store') }}"
                method="POST"
                enctype="multipart/form-data">

                @csrf

                <!-- HEADER -->

                <div
                    class="bg-linear-to-r from-[#6F4E37] to-[#A67B5B] p-8 text-white">

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
                                    name="name"
                                    x-model="form.name"
                                    required
                                    placeholder="Contoh : Buy 1 Get 1 Cappuccino"
                                    class="w-full mt-2 border border-[#E8D8C4] rounded-2xl p-4 focus:outline-none focus:ring-2 focus:ring-[#A67B5B]">

                            </div>

                            <div>

                                <label class="font-semibold text-[#2B2118]">
                                    Deskripsi Campaign
                                </label>

                                <textarea
                                    name="description"
                                    rows="5"
                                    placeholder="Jelaskan tujuan campaign..."
                                    class="w-full mt-2 border border-[#E8D8C4] rounded-2xl p-4 focus:outline-none focus:ring-2 focus:ring-[#A67B5B]"></textarea>

                            </div>

                            <div>

                                <label class="font-semibold text-[#2B2118]">
                                    Status
                                </label>

                                <select
                                    name="status"
                                    x-model="form.status"
                                    class="w-full mt-2 border border-[#E8D8C4] rounded-2xl p-4">

                                    <option value="active">Aktif</option>
                                    <option value="draft">Upcoming</option>
                                    <option value="completed">Selesai</option>

                                </select>

                            </div>

                            <div>

                                <label class="font-semibold text-[#2B2118]">
                                    Tipe Campaign
                                </label>

                                <select
                                    name="campaign_type"
                                    x-model="form.campaign_type"
                                    class="w-full mt-2 border border-[#E8D8C4] rounded-2xl p-4">

                                    <option value="discount">Discount</option>
                                    <option value="bundle">Bundle</option>
                                    <option value="buy1get1">Buy 1 Get 1</option>

                                </select>

                            </div>

                            <div class="grid grid-cols-2 gap-4">

                                <div>

                                    <label class="font-semibold text-[#2B2118]">
                                        Target Revenue
                                    </label>

                                    <input
                                        type="number"
                                        name="target_revenue"
                                        x-model="form.target_revenue"
                                        placeholder="5000000"
                                        class="w-full mt-2 border border-[#E8D8C4] rounded-2xl p-4">

                                </div>

                                <div>

                                    <label class="font-semibold text-[#2B2118]">
                                        Diskon (%)
                                    </label>

                                    <input
                                        type="number"
                                        name="discount_percentage"
                                        x-model="form.discount_percentage"
                                        value="0"
                                        class="w-full mt-2 border border-[#E8D8C4] rounded-2xl p-4">

                                </div>

                            </div>

                        </div>

                        <!-- RIGHT -->

                        <div class="space-y-5">

                            <div class="grid grid-cols-2 gap-4">

                            </div>



                            <div class="grid grid-cols-2 gap-4">

                                <div>

                                    <label class="font-semibold text-[#2B2118]">
                                        Tanggal Mulai
                                    </label>

                                    <input
                                        type="date"
                                        name="start_date"
                                        x-model="form.start_date"
                                        class="w-full mt-2 border border-[#E8D8C4] rounded-2xl p-4">

                                </div>

                                <div>

                                    <label class="font-semibold text-[#2B2118]">
                                        Tanggal Selesai
                                    </label>

                                    <input
                                        type="date"
                                        name="end_date"
                                        x-model="form.end_date"
                                        class="w-full mt-2 border border-[#E8D8C4] rounded-2xl p-4">

                                </div>

                            </div>

                            <!-- PREVIEW -->

                            <div
                                class="bg-linear-to-r
                            from-[#FAF3E0]
                            to-[#F8F3ED]
                            border border-[#EFE3D5]
                            rounded-[28px]
                            p-6
                            mb-8">

                                <h3 class="font-bold text-xl text-[#6F4E37]">
                                    Preview Campaign
                                </h3>

                                <div class="space-y-3 mt-5">

                                    <div>
                                        <p class="text-sm text-stone-500">
                                            Nama Campaign
                                        </p>

                                        <h4
                                            class="font-bold text-lg"
                                            x-text="form.name || 'Belum diisi'">
                                        </h4>
                                    </div>

                                    <div>
                                        <p class="text-sm text-stone-500">
                                            Status
                                        </p>

                                        <h4
                                            class="font-semibold"
                                            x-text="form.status">
                                        </h4>
                                    </div>

                                    <div>
                                        <p class="text-sm text-stone-500">
                                            Tipe Campaign
                                        </p>

                                        <h4
                                            class="font-semibold"
                                            x-text="form.campaign_type">
                                        </h4>
                                    </div>

                                    <div>
                                        <p class="text-sm text-stone-500">
                                            Target Revenue
                                        </p>

                                        <h4 class="font-bold text-[#6F4E37]">
                                            Rp
                                            <span
                                                x-text="Number(form.target_revenue || 0).toLocaleString('id-ID')">
                                            </span>
                                        </h4>
                                    </div>

                                    <div>
                                        <p class="text-sm text-stone-500">
                                            Diskon
                                        </p>

                                        <h4>
                                            <span x-text="form.discount_percentage"></span>%
                                        </h4>
                                    </div>

                                    <div>
                                        <p class="text-sm text-stone-500">
                                            Periode
                                        </p>

                                        <h4>
                                            <span x-text="form.start_date || '-'"></span>
                                            -
                                            <span x-text="form.end_date || '-'"></span>
                                        </h4>
                                    </div>

                                </div>

                            </div>

                            <!-- FOOTER -->

                            <div
                                class=" mt-10 pt-6 px-10
                            flex justify-end gap-3
                            sticky bottom-0">

                                <button
                                    type="button"
                                    @click="campaignModal=false"
                                    class="px-6 py-3 rounded-2xl border
                                border-[#DDB892]
                                text-[#6F4E37]
                                font-medium
                                hover:bg-[#FAF3E0]
                                hover:border-[#C89F7A]
                                transition-all duration-300">

                                    Batal

                                </button>

                                <button
                                    type="submit"
                                    class="px-6 py-3 rounded-2xl
                                bg-[#6F4E37]
                                text-white
                                font-medium
                                shadow-lg
                                hover:bg-[#5A3F2D]
                                hover:shadow-xl
                                hover:-translate-y-0.5
                                transition-all duration-300">

                                    Simpan Campaign

                                </button>

                            </div>
                        </div>
                    </div>
                </div>

            </form>

        </div>

    </div>


    <!-- DETAIL CAMPAIGN -->

    <div
        x-show="campaignDetail"
        x-transition.opacity
        style="display:none"
        class="fixed inset-0 z-9999 bg-black/60 backdrop-blur-sm flex items-center justify-center p-6">

        <div
            @click.away="campaignDetail=false"
            class="bg-white w-full max-w-3xl rounded-[36px] overflow-hidden shadow-2xl">

            <div
                class="bg-linear-to-r from-[#6F4E37] via-[#8B5E3C] to-[#A67B5B] p-8 text-white">

                <div class="flex justify-between items-start">

                    <div>

                        <h2
                            class="text-3xl font-bold"
                            x-text="selectedCampaign?.name">
                        </h2>

                        <div class="flex items-center gap-3 mt-3">

                            <span
                                class="inline-flex items-center gap-2 text-white/80">

                                <x-heroicon-o-calendar-days class="w-5 h-5" />

                                <span
                                    x-text="selectedCampaign?.start_date">
                                </span>

                                -

                                <span
                                    x-text="selectedCampaign?.end_date">
                                </span>

                            </span>

                        </div>

                    </div>

                    <span
                        class="px-4 py-2 rounded-full bg-white/20 backdrop-blur text-sm font-semibold">

                        <span x-text="selectedCampaign?.status"></span>

                    </span>

                </div>

            </div>

            <div class="p-8 space-y-6">

                <div class="grid md:grid-cols-2 gap-5">

                    <div class="bg-[#FAF3E0] rounded-3xl p-5">

                        <p class="text-stone-500 text-sm">
                            Nama Campaign
                        </p>

                        <h3 class="font-bold text-xl" x-text="selectedCampaign?.name"> </h3>

                    </div>

                    <div class="bg-[#FAF3E0] rounded-3xl p-5">

                        <p class="text-stone-500 text-sm">
                            Status
                        </p>

                        <h3 class="font-bold text-xl text-green-600" x-text="selectedCampaign?.status"> </h3>

                    </div>

                </div>

                <div class="bg-[#FAF3E0] rounded-3xl p-6">

                    <p class="text-stone-500 text-sm">
                        Deskripsi
                    </p>

                    <p class="mt-2" x-text="selectedCampaign?.description"> </p>

                </div>

                <div class="grid grid-cols-3 gap-4">

                    <template
                        x-for="product in selectedCampaign?.products">

                        <div
                            class="
        inline-flex items-center gap-2
        px-4 py-2
        rounded-xl
        bg-white
        border border-[#DDB892]">

                            <x-heroicon-o-cube class="w-4 h-4 text-[#6F4E37]" />

                            <span x-text="product"></span>

                        </div>

                    </template>

                    <div class="bg-[#FAF3E0] rounded-3xl p-5">

                        <div class="flex items-center gap-2 mb-2">

                            <x-heroicon-o-banknotes class="w-5 h-5 text-[#6F4E37]" />

                            <span class="text-sm text-stone-500">
                                Revenue
                            </span>

                        </div>

                        <h3 class="font-bold text-2xl text-[#6F4E37]">

                            Rp

                            <span
                                x-text="selectedCampaign?.revenue?.toLocaleString('id-ID')">
                            </span>

                        </h3>

                    </div>

                    <div class="bg-[#FAF3E0] rounded-3xl p-5">

                        <div class="flex items-center gap-2 mb-2">

                            <x-heroicon-o-chart-bar class="w-5 h-5 text-[#6F4E37]" />

                            <span class="text-sm text-stone-500">
                                Conversion
                            </span>

                        </div>

                        <h3 class="font-bold text-2xl text-[#6F4E37]">

                            <span x-text="selectedCampaign?.conversion"></span>%

                        </h3>

                    </div>

                </div>

                <!-- PERFORMANCE -->

                <div class="bg-[#FAF3E0] rounded-3xl p-6">

                    <div class="flex justify-between mb-3">

                        <h3 class="font-semibold flex items-center gap-2">

                            <x-heroicon-o-arrow-trending-up class="w-5 h-5" />

                            Campaign Performance

                        </h3>

                        <span
                            class="font-bold text-[#6F4E37]"
                            x-text="
            Math.round(
            (selectedCampaign.revenue /
            selectedCampaign.target_revenue)*100
            ) + '%'
        ">
                        </span>

                    </div>

                    <div class="w-full h-4 bg-stone-200 rounded-full">

                        <div
                            class="h-4 bg-[#6F4E37] rounded-full"

                            :style="
            'width:'+
            Math.min(
            (selectedCampaign.revenue /
            selectedCampaign.target_revenue)*100,
            100
            )+'%'
        ">
                        </div>

                    </div>

                </div>

                <!-- TARGET REVENUE -->
                <div class="grid grid-cols-3 gap-4">

                    <div class="bg-[#FAF3E0] rounded-3xl p-5">

                        <p class="text-sm text-stone-500">
                            Target Revenue
                        </p>

                        <h3 class="font-bold text-xl">

                            Rp

                            <span
                                x-text="selectedCampaign?.target_revenue?.toLocaleString('id-ID')">
                            </span>

                        </h3>

                    </div>

                    <div class="bg-[#FAF3E0] rounded-3xl p-5">

                        <p class="text-sm text-stone-500">
                            Discount
                        </p>

                        <h3 class="font-bold text-xl">

                            <span
                                x-text="selectedCampaign?.discount_percentage">
                            </span>%

                        </h3>

                    </div>

                    <div class="bg-[#FAF3E0] rounded-3xl p-5">

                        <p class="text-sm text-stone-500">
                            Ends In
                        </p>

                        <h3
                            class="font-bold text-xl text-red-500"
                            x-text="
            Math.max(
            0,
            Math.ceil(
            (new Date(selectedCampaign.end_date)-new Date())
            /(1000*60*60*24)
            )
            ) + ' Hari Lagi'
        ">
                        </h3>

                    </div>

                </div>
            </div>

            <!-- target revenue -->



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
    <template x-if="selectedCampaign">
        <form
            x-bind:action="selectedCampaign ? '{{ url('/campaigns') }}/' + selectedCampaign.id : '#'"
            method="POST"
            enctype="multipart/form-data">

            @csrf
            @method('PUT')

            <div
                x-show="campaignEdit && selectedCampaign"
                x-transition.opacity
                style="display:none"
                class="fixed inset-0 z-9999 bg-black/60 backdrop-blur-sm flex items-center justify-center p-6">

                <div
                    @click.away="campaignEdit=false"
                    class="bg-white w-full max-w-4xl rounded-[36px] overflow-hidden shadow-2xl">

                    <div
                        class="bg-linear-to-r from-[#6F4E37] to-[#A67B5B] p-8 text-white">

                        <h2 class="text-3xl font-bold">
                            Edit Campaign
                        </h2>

                    </div>

                    <div class="p-8">

                        <div class="grid lg:grid-cols-2 gap-6">

                            <div class="space-y-5">

                                <div>
                                    <label class="font-semibold">Nama Campaign</label>

                                    <input
                                        type="text"
                                        name="name"
                                        x-model="selectedCampaign.name"
                                        class="w-full mt-2 border border-[#E8D8C4] rounded-2xl p-4">
                                </div>

                                <div>
                                    <label class="font-semibold">Deskripsi</label>

                                    <textarea
                                        rows="5"
                                        name="description"
                                        x-model="selectedCampaign.description"
                                        class="w-full mt-2 border border-[#E8D8C4] rounded-2xl p-4">
                                    </textarea>
                                </div>

                            </div>

                            <div class="space-y-5">

                                <div class="grid grid-cols-2 gap-4">

                                    <div>
                                        <label class="font-semibold">Status</label>

                                        <select
                                            name="status"
                                            x-model="selectedCampaign.status"
                                            class="w-full mt-2 border border-[#E8D8C4] rounded-2xl p-4">

                                            <option value="active">Aktif</option>
                                            <option value="inactive">Inactive</option>
                                            <option value="completed">Completed</option>

                                        </select>
                                    </div>

                                    <div>
                                        <label class="font-semibold">Tipe Campaign</label>

                                        <select
                                            name="campaign_type"
                                            x-model="selectedCampaign.campaign_type"
                                            class="w-full mt-2 border border-[#E8D8C4] rounded-2xl p-4">

                                            <option value="discount">Discount</option>
                                            <option value="bundle">Bundle</option>
                                            <option value="buy1get1">Buy 1 Get 1</option>

                                        </select>
                                    </div>

                                </div>

                                <div class="grid grid-cols-2 gap-4">

                                    <div>
                                        <label class="font-semibold">Target Revenue</label>

                                        <input
                                            type="number"
                                            name="target_revenue"
                                            x-model="selectedCampaign.target_revenue"
                                            class="w-full mt-2 border border-[#E8D8C4] rounded-2xl p-4">
                                    </div>

                                    <div>
                                        <label class="font-semibold">Diskon (%)</label>

                                        <input
                                            type="number"
                                            name="discount_percentage"
                                            x-model="selectedCampaign.discount_percentage"
                                            class="w-full mt-2 border border-[#E8D8C4] rounded-2xl p-4">
                                    </div>

                                </div>

                                <div class="grid grid-cols-2 gap-4">

                                    <div>
                                        <label class="font-semibold">Tanggal Mulai</label>

                                        <input
                                            type="date"
                                            name="start_date"
                                            x-model="selectedCampaign.start_date"
                                            class="w-full mt-2 border border-[#E8D8C4] rounded-2xl p-4">
                                    </div>

                                    <div>
                                        <label class="font-semibold">Tanggal Selesai</label>

                                        <input
                                            type="date"
                                            name="end_date"
                                            x-model="selectedCampaign.end_date"
                                            class="w-full mt-2 border border-[#E8D8C4] rounded-2xl p-4">
                                    </div>

                                </div>

                            </div>

                        </div>

                    </div>

                    <div class="border-t p-6 flex justify-end gap-3">

                        <button
                            type="button"
                            @click="campaignEdit=false"
                            class="px-6 py-3 rounded-2xl border">

                            Batal

                        </button>

                        <button type="submit" class="px-6 py-3 rounded-2xl bg-[#6F4E37] text-white"> Simpan Perubahan </button>

                    </div>
                </div>

            </div>
        </form>

    </template>
    <!-- DELETE CAMPAIGN -->

    <div
        x-show="campaignDelete"
        x-transition.opacity
        style="display:none"
        class="fixed inset-0 z-9999 bg-black/60 backdrop-blur-sm flex items-center justify-center p-6">

        <div
            @click.away="campaignDelete=false"
            class="bg-white w-full max-w-md rounded-[36px] p-8 text-center shadow-2xl">

            <div
                class="w-20 h-20 rounded-3xl
            bg-linear-to-br
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
                        d="M12 9v2m0 4h.01M5.07 19h13.86c1.54 0 2.5-1.67 1.73-3L13.73 4c-.77-1.33-2.69-1.33-3.46 0L3.34 16c-.77 1.33.19 3 1.73 3z" />

                </svg>

            </div>

            <h2 class="text-2xl font-bold mt-5">
                Hapus Campaign?
            </h2>

            <p class="text-stone-500 mt-2">
                Yakin ingin menghapus campaign
                <span
                    class="font-semibold text-red-500"
                    x-text="selectedCampaign?.name">
                </span> ?
            </p>

            <form
                x-bind:action="selectedCampaign ? '{{ url('/campaigns') }}/' + selectedCampaign.id : '#'"
                method="POST"
                class="flex gap-3 mt-8">

                @csrf
                @method('DELETE')

                <button
                    type="button"
                    @click="campaignDelete=false"
                    class="flex-1 py-3 rounded-2xl border">

                    Batal

                </button>

                <button
                    type="submit"
                    class="flex-1 py-3 rounded-2xl bg-red-500 text-white">

                    Hapus

                </button>

            </form>

        </div>

    </div>

    @endsection