@extends('layouts.app')

@section('content')
    <div x-data="customerJs()">

        <!-- HEADER -->
        <div class="flex flex-col lg:flex-row lg:items-center lg:justify-between gap-6 mb-8">
            <div>
                <span
                    class="inline-flex items-center px-4 py-2 rounded-full bg-[#FAF3E0] text-[#6F4E37] text-sm font-semibold">
                    Customer Relationship Management
                </span>

                <h1 class="text-5xl font-bold text-[#2B2118] mt-4">
                    Customer Intelligence
                </h1>

                <p class="text-[#8B6E54] mt-3 text-lg">
                    Analisis loyalitas, aktivitas, dan segmentasi pelanggan KOPIN.
                </p>
            </div>

            <button @click="createCust()"
                class="bg-linear-to-r from-[#6F4E37] to-[#A67B5B] text-white px-6 py-4 rounded-2xl shadow-xl hover:scale-105 transition-all cursor-pointer">
                + Tambah Pelanggan
            </button>
        </div>

        <!-- KPI -->
        <div class="grid grid-cols-1 md:grid-cols-2 xl:grid-cols-3 gap-6 mb-8">

            <!-- Total Customer -->
            <div class="bg-white rounded-4xl p-6 shadow-xl border border-[#E8D8C4]">
                <div class="flex justify-between items-center">
                    <div>
                        <p class="text-sm text-stone-500">
                            Total Pelanggan
                        </p>

                        <h2 class="text-5xl font-bold text-[#2B2118] mt-3">
                            {{ $customer->count() }}
                        </h2>

                        <p class="mt-3 text-green-600 text-sm font-semibold">
                            +12% bulan ini
                        </p>
                    </div>

                    <div class="w-16 h-16 rounded-2xl bg-[#FAF3E0] flex items-center justify-center">
                        <x-heroicon-o-users class="h-7 w-7" />
                    </div>
                </div>
            </div>

            <!-- Member Aktif -->
            <div class="bg-white rounded-4xl p-6 shadow-xl border border-[#E8D8C4]">
                <div class="flex justify-between items-center">
                    <div>
                        <p class="text-sm text-stone-500">
                            Member Aktif
                        </p>

                        <h2 class="text-5xl font-bold text-[#2B2118] mt-3">
                            {{ $customer->where('status', 'member')->count() }}
                        </h2>

                        <p class="mt-3 text-green-600 text-sm font-semibold">
                            +8% bulan ini
                        </p>
                    </div>

                    <div class="w-16 h-16 rounded-2xl bg-[#FAF3E0] flex items-center justify-center">
                        <x-heroicon-o-check-circle class="w-7 h-7" />
                    </div>
                </div>
            </div>

            <!-- VIP -->
            <div class="bg-white rounded-4xl p-6 shadow-xl border border-[#E8D8C4]">
                <div class="flex justify-between items-center">
                    <div>
                        <p class="text-sm text-stone-500">
                            VIP Customer
                        </p>

                        <h2 class="text-5xl font-bold text-[#2B2118] mt-3">
                            {{ $customer->where('status', 'vip')->count() }}
                        </h2>

                        <p class="mt-3 text-yellow-600 text-sm font-semibold">
                            Top Tier
                        </p>
                    </div>

                    <div class="w-16 h-16 rounded-2xl bg-[#FAF3E0] flex items-center justify-center">
                        <x-heroicon-o-sparkles class="h-7 w-7" />
                    </div>
                </div>
            </div>
        </div>

        <!-- SEARCH -->
        <div class="bg-white rounded-3xl shadow-xl p-6 mb-8">
            <form method="GET" class="grid grid-cols-1 lg:grid-cols-12 gap-4">

                <!-- Search -->
                <input type="text" name="search" value="{{ request('search') }}" placeholder="Cari nama pelanggan..."
                    class="lg:col-span-5 border border-[#E6D7C8] rounded-2xl px-5 py-4 focus:outline-none focus:ring-2 focus:ring-[#A67B5B]">

                <!-- Filter -->
                <select name="filter" class="lg:col-span-2 border border-[#E6D7C8] rounded-2xl px-5 py-4">
                    <option value="all" {{ request('filter') == 'all' ? 'selected' : '' }}>
                        Semua Status
                    </option>

                    <option value="vip" {{ request('filter') == 'vip' ? 'selected' : '' }}>
                        VIP
                    </option>

                    <option value="member" {{ request('filter') == 'member' ? 'selected' : '' }}>
                        Member
                    </option>

                    <option value="regular" {{ request('filter') == 'regular' ? 'selected' : '' }}>
                        Regular
                    </option>
                </select>

                <!-- Button -->
                <button type="submit"
                    class="lg:col-span-2 rounded-2xl bg-[#8B5E3C] text-white font-semibold py-4 hover:bg-[#6F4E37] transition">
                    Cari
                </button>

                <!-- Total -->
                <div class="lg:col-span-3 bg-[#F5EFE8] rounded-2xl py-4 px-5 text-center font-semibold text-[#6F4E37]">
                    Total Pelanggan: {{ $customer->count() }}
                </div>
            </form>
        </div>

        <!-- TABLE -->
        <div class="bg-white rounded-3xl shadow-xl overflow-hidden">
            <div class="p-6 border-b border-stone-100">
                <h2 class="text-2xl font-bold text-[#2B2118]">
                    Daftar Pelanggan
                </h2>
            </div>

            <div class="overflow-x-auto">
                <table class="w-full">
                    <thead>
                        <tr class="bg-[#FAF3E0]">
                            <th class="p-5 text-left">Pelanggan</th>
                            <th class="p-5 text-left">Telepon</th>
                            <th class="p-5 text-left">Poin</th>
                            <th class="p-5 text-left">Status</th>
                            <th class="p-5 text-left">Aksi</th>
                        </tr>
                    </thead>

                    <tbody>
                        @forelse ($cust as $item)
                            <tr class="border-b hover:bg-[#FAF3E0]/40 transition">
                                <td class="p-5">
                                    <div class="flex items-center gap-4">
                                        <div
                                            class="w-12 h-12 rounded-full bg-[#6F4E37] text-white flex items-center justify-center font-bold">
                                            {{ $item->initials }}
                                        </div>

                                        <div>
                                            <h4 class="font-semibold">{{ $item->name }}</h4>
                                            <p class="text-sm text-stone-500">{{ $item->email }}</p>
                                        </div>
                                    </div>
                                </td>

                                <td class="p-5">{{ $item->phone }}</td>

                                <td class="p-5 font-bold text-[#6F4E37]">{{ $item->points }}</td>

                                <td class="p-5">
                                    <span
                                        class="inline-flex items-center rounded-md bg-blue-50 px-2 py-1 text-xs font-medium text-blue-700 ring-1 ring-inset ring-blue-700/10">
                                        {{ $item->status }}
                                    </span>
                                </td>

                                <td class="p-5">
                                    <div class="flex gap-2">
                                        <button @click="editCust(@js($item))"
                                            class="px-3 py-2 bg-[#E8F0F7] text-[#2B5A7D] rounded-lg text-xs font-semibold hover:bg-[#D0E4F2] transition cursor-pointer"
                                            title="Edit">
                                            <x-heroicon-o-pencil class="w-4 h-4" />
                                        </button>

                                        <button @click="deleteCust(@js($item))"
                                            class="px-3 py-2 bg-[#FFE8E8] text-red-600 rounded-lg text-xs font-semibold hover:bg-[#FFD0D0] transition cursor-pointer"
                                            title="Hapus">
                                            <x-heroicon-o-trash class="w-4 h-4" />
                                        </button>
                                    </div>
                                </td>
                            </tr>
                        @empty
                            data pelanggan masih kosong
                        @endforelse
                    </tbody>
                </table>
                {{-- {{ dd($cust) }} --}}
                {{ $cust->links('vendor.pagination.custom') }}
            </div>
        </div>

        <!-- MODAL -->
        <div x-show="showModal" x-transition class="fixed inset-0 z-9999 flex items-center justify-center p-4">
            <div @click="showModal=false" class="absolute inset-0 bg-black/50"></div>

            <div class="relative bg-white w-full max-w-lg rounded-3xl shadow-2xl overflow-hidden">
                <!-- Header -->
                <div class="bg-linear-to-r from-[#6F4E37] to-[#A67B5B] px-6 py-5 flex justify-between items-center">
                    <div>
                        <h2 x-show="mode === 'create'" class="text-2xl font-bold text-white">Tambah Pelanggan</h2>
                        <h2 x-show="mode === 'edit'" class="text-2xl font-bold text-white">Edit Pelanggan</h2>
                        <p x-show="mode === 'create'" class="text-amber-100 text-xs">Tambah data pelanggan</p>
                        <p x-show="mode === 'edit'" class="text-amber-100 text-xs">Perbarui data pelanggan</p>
                    </div>
                    <button @click="showModal=false" class="text-white text-2xl hover:opacity-75 cursor-pointer">×</button>
                </div>

                <!-- Form -->
                <form @submit.prevent="submit()">
                    <div class="p-6 space-y-3">
                        <!-- Nama & Email -->
                        <div class="grid grid-cols-2 gap-3">
                            <div>
                                <label class="text-xs font-bold text-[#2B2118] block mb-1">Nama</label>
                                <input x-model="customer.name" type="text" placeholder="Nama lengkap" name="name"
                                    class="w-full border border-[#E6D7C8] rounded-xl px-3 py-2.5 text-sm focus:outline-none focus:ring-2 focus:ring-[#A67B5B] transition">
                            </div>
                            <div>
                                <label class="text-xs font-bold text-[#2B2118] block mb-1">Email</label>
                                <input x-model="customer.email" type="email" placeholder="email@domain.com"
                                    name="email"
                                    class="w-full border border-[#E6D7C8] rounded-xl px-3 py-2.5 text-sm focus:outline-none focus:ring-2 focus:ring-[#A67B5B] transition">
                            </div>
                        </div>

                        <!-- Telepon & Poin -->
                        <div class="grid grid-cols-2 gap-3">
                            <div>
                                <label class="text-xs font-bold text-[#2B2118] block mb-1">Telepon</label>
                                <input x-model="customer.phone" type="text" placeholder="08xxxxxxxxxx" name="phone"
                                    class="w-full border border-[#E6D7C8] rounded-xl px-3 py-2.5 text-sm focus:outline-none focus:ring-2 focus:ring-[#A67B5B] transition">
                            </div>
                            <div>
                                <label class="text-xs font-bold text-[#2B2118] block mb-1">Poin</label>
                                <input x-model="customer.points" type="number" placeholder="0" name="points"
                                    class="w-full border border-[#E6D7C8] rounded-xl px-3 py-2.5 text-sm focus:outline-none focus:ring-2 focus:ring-[#A67B5B] transition">
                            </div>
                        </div>

                        <!-- Status -->
                        <div>
                            <label class="text-xs font-bold text-[#2B2118] block mb-1">Status</label>
                            <select x-model="customer.status" name="status"
                                class="w-full border border-[#E6D7C8] rounded-xl px-3 py-2.5 text-sm focus:outline-none focus:ring-2 focus:ring-[#A67B5B] transition bg-white">
                                <option value="vip" @selected('customer.status' == 'vip')> VIP</option>
                                <option value="member" @selected('customer.status' == 'member')> Member</option>
                                <option value="regular" @selected('customer.status' == 'regular')> Regular</option>
                            </select>
                        </div>
                    </div>

                    <!-- Footer -->
                    <div class="flex gap-3 px-6 py-4 bg-stone-50 border-t border-stone-100">
                        <button @click="showModal=false"
                            class="flex-1 px-4 py-2.5 rounded-xl bg-white text-[#2B2118] font-semibold text-sm border border-[#E6D7C8] hover:bg-stone-100 transition cursor-pointer">
                            Batal
                        </button>
                        <button type="submit"
                            class="flex-1 px-4 py-2.5 rounded-xl bg-linear-to-r from-[#6F4E37] to-[#A67B5B] text-white font-semibold text-sm hover:shadow-lg transition cursor-pointer">
                            Simpan
                        </button>
                    </div>
                </form>
            </div>
        </div>

        <!-- MODAL DELETE -->
        <div x-show="showDelete" x-transition class="fixed inset-0 z-9999 flex items-center justify-center p-4">
            <div @click="showDelete=false" class="absolute inset-0 bg-black/50"></div>

            <div class="relative bg-white w-full max-w-lg rounded-4xl shadow-2xl p-8 text-center">
                <div
                    class="w-20 h-20 p-3 mx-auto rounded-3xl bg-red-50 text-red-600 flex items-center justify-center mb-6">
                    <x-heroicon-o-trash />
                </div>

                <h2 class="text-3xl font-bold">
                    Hapus Pelanggan?
                </h2>

                <p class="text-stone-500 mt-3">
                    Data
                    <span class="font-semibold" x-text="customer.name"></span>
                    akan dihapus.
                </p>

                <div class="flex gap-3 mt-8">
                    <button @click="showDelete=false"
                        class="flex-1 p-4 rounded-2xl bg-stone-100 hover:bg-stone-200 cursor-pointer">
                        Batal
                    </button>

                    <form :action="`{{ url('/customers') }}/${customer.id}`" method="POST">
                        @csrf
                        @method('DELETE')
                        <button type="submit"
                            class="flex-1 p-4 rounded-2xl bg-red-500 hover:bg-red-600 text-white cursor-pointer">
                            Hapus
                        </button>
                    </form>
                </div>
            </div>
        </div>
    @endsection
