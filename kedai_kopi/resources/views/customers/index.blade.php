@extends('layouts.app')

@section('content')
    <div x-data="customerJs">

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

            <button @click="customerModal=true"
                class="bg-linear-to-r from-[#6F4E37] to-[#A67B5B] text-white px-6 py-4 rounded-2xl shadow-xl hover:scale-105 transition-all">
                + Tambah Pelanggan
            </button>
        </div>

        <!-- KPI -->
        <div class="grid grid-cols-1 md:grid-cols-2 xl:grid-cols-4 gap-6 mb-8">

            <!-- Total Customer -->
            <div class="bg-white rounded-4xl p-6 shadow-xl border border-[#E8D8C4]">
                <div class="flex justify-between items-center">
                    <div>
                        <p class="text-sm text-stone-500">
                            Total Pelanggan
                        </p>

                        <h2 class="text-5xl font-bold text-[#2B2118] mt-3">
                            {{ $cust->count() }}
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
                            {{ $cust->where('status', 'member')->count() }}
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
                            {{ $cust->where('status', 'vip')->count() }}
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

            <!-- Lifetime Value -->
            <div class="bg-white rounded-4xl p-6 shadow-xl border border-[#E8D8C4]">
                <div class="flex justify-between items-center">
                    <div>
                        <p class="text-sm text-stone-500">
                            Lifetime Value
                        </p>

                        <h2 class="text-4xl font-bold text-[#2B2118] mt-3">
                            Rp 124 JT
                        </h2>

                        <p class="mt-3 text-green-600 text-sm font-semibold">
                            +15% bulan ini
                        </p>
                    </div>

                    <div class="w-16 h-16 rounded-2xl bg-[#FAF3E0] flex items-center justify-center">

                        <svg xmlns="http://www.w3.org/2000/svg" class="w-8 h-8 text-[#6F4E37]" fill="none"
                            viewBox="0 0 24 24" stroke="currentColor">

                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                d="M12 8c-1.5 0-3 1-3 2.5S10.5 13 12 13s3 1 3 2.5S13.5 18 12 18m0-10V6m0 12v-2" />

                        </svg>
                    </div>
                </div>
            </div>
        </div>

        <!-- SEARCH -->
        <div class="bg-white rounded-3xl shadow-xl p-6 mb-8">
            <div class="grid lg:grid-cols-3 gap-4">
                <input x-model="search" type="text" placeholder="Cari nama pelanggan..."
                    class="border border-[#E6D7C8] rounded-2xl px-5 py-4 focus:outline-none focus:ring-2 focus:ring-[#A67B5B]">
                <select x-model="filter" class="border border-[#E6D7C8] rounded-2xl px-5 py-4">

                    <option value="all">
                        Semua Status
                    </option>

                    <option value="VIP">
                        VIP
                    </option>

                    <option value="Member">
                        Member
                    </option>

                    <option value="Regular">
                        Regular
                    </option>

                </select>

                <div class="bg-[#FAF3E0] rounded-2xl flex items-center justify-center font-semibold text-[#6F4E37]">

                    Total Pelanggan:
                    <span class="ml-2 text-xl">
                        <span x-text="customers.length"></span>
                    </span>

                </div>

            </div>


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
                        @forelse ($cust as $cust)
                            <tr class="border-b hover:bg-[#FAF3E0]/40 transition">
                                <td class="p-5">
                                    <div class="flex items-center gap-4">
                                        <div
                                            class="w-12 h-12 rounded-2xl bg-linear-to-r from-[#6F4E37] to-[#A67B5B] text-white flex items-center justify-center font-bold">
                                            <span x-text="customer.avatar"></span>
                                        </div>

                                        <div>
                                            <h4 class="font-semibold">{{ $cust->name }}</h4>
                                            <p class="text-sm text-stone-500">{{ $cust->email }}</p>
                                        </div>
                                    </div>
                                </td>

                                <td class="p-5">{{ $cust->phone }}</td>

                                <td class="p-5 font-bold text-[#6F4E37]">{{ $cust->points }}</td>

                                <td class="p-5">
                                    <span class="inline-flex items-center rounded-md bg-blue-50 px-2 py-1 text-xs font-medium text-blue-700 ring-1 ring-inset ring-blue-700/10">
                                        {{ $cust->status }}
                                    </span>
                                </td>

                                <td class="p-5">
                                    <div class="flex gap-2">
                                        <button @click="editCust(@js($cust))"
                                            class="px-3 py-2 bg-[#E8F0F7] text-[#2B5A7D] rounded-lg text-xs font-semibold hover:bg-[#D0E4F2] transition cursor-pointer"
                                            title="Edit">
                                            <x-heroicon-o-pencil class="w-4 h-4" />
                                        </button>

                                        <button @click="deleteCust(@js($cust))"
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
            </div>
        </div>

        <!-- MODAL TAMBAH CUSTOMER -->
        <div x-show="customerModal" x-transition class="fixed inset-0 z-[9999] flex items-center justify-center p-4">
            <div @click="customerModal=false" class="absolute inset-0 bg-black/50"></div>

            <div class="relative bg-white w-full max-w-2xl rounded-[32px] shadow-2xl p-8">
                <div class="flex justify-between items-center mb-8">
                    <div>
                        <h2 class="text-3xl font-bold text-[#2B2118]">
                            Tambah Pelanggan
                        </h2>

                        <p class="text-stone-500">
                            Tambahkan pelanggan baru
                        </p>
                    </div>

                    <button @click="customerModal=false" class="text-3xl">
                        ×
                    </button>
                </div>

                <div class="grid md:grid-cols-2 gap-5">

                    <input x-model="newCustomer.name" class="border rounded-2xl p-4" placeholder="Nama Lengkap">

                    <input x-model="newCustomer.email" class="border rounded-2xl p-4" placeholder="Email">

                    <input x-model="newCustomer.phone" class="border rounded-2xl p-4" placeholder="Telepon">

                    <select x-model="newCustomer.status" class="border rounded-2xl p-4">

                        <option>VIP</option>
                        <option>Member</option>
                        <option>Regular</option>

                    </select>

                    <input type="number" x-model="newCustomer.points" class="border rounded-2xl p-4"
                        placeholder="Poin">

                </div>

                <div class="flex gap-3 mt-8">
                    <button @click="customerModal=false" class="flex-1 p-4 rounded-2xl bg-stone-100">
                        Batal
                    </button>
                    
                    <button
                        @click="

customers.push({

id: Date.now(),

name:newCustomer.name,

email:newCustomer.email,

phone:newCustomer.phone,

status:newCustomer.status,

points:newCustomer.points,

avatar:newCustomer.name
    ? newCustomer.name.charAt(0).toUpperCase()
    : 'N'

});

customerModal=false;

newCustomer={
name:'',
email:'',
phone:'',
status:'Member',
points:0,
avatar:'N'
};

"
                        class="flex-1 p-4 rounded-2xl bg-linear-to-r from-[#6F4E37] to-[#A67B5B] text-white font-bold">
                        Simpan
                    </button>
                </div>
            </div>
        </div>

        <!-- MODAL EDIT -->
        <div x-show="showEdit" x-transition class="fixed inset-0 z-9999 flex items-center justify-center p-4">
            <div @click="showEdit=false" class="absolute inset-0 bg-black/50"></div>

            <div class="relative bg-white w-full max-w-lg rounded-3xl shadow-2xl overflow-hidden">
                <!-- Header -->
                <div class="bg-linear-to-r from-[#6F4E37] to-[#A67B5B] px-6 py-5 flex justify-between items-center">
                    <div>
                        <h2 class="text-2xl font-bold text-white">Edit Pelanggan</h2>
                        <p class="text-amber-100 text-xs">Perbarui data pelanggan</p>
                    </div>
                    <button @click="showEdit=false" class="text-white text-2xl hover:opacity-75 cursor-pointer">×</button>
                </div>

                <!-- Form -->
                <form @submit.prevent="submitEdit()">
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
                                <input x-model="customer.email" type="email" placeholder="email@domain.com" name="email"
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
                        <button @click="showEdit=false" class="flex-1 px-4 py-2.5 rounded-xl bg-white text-[#2B2118] font-semibold text-sm border border-[#E6D7C8] hover:bg-stone-100 transition cursor-pointer">
                            Batal
                        </button>
                        <button type="submit" class="flex-1 px-4 py-2.5 rounded-xl bg-linear-to-r from-[#6F4E37] to-[#A67B5B] text-white font-semibold text-sm hover:shadow-lg transition cursor-pointer">
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
                <div class="w-20 h-20 p-3 mx-auto rounded-3xl bg-red-50 text-red-600 flex items-center justify-center mb-6">
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
                    <button @click="showDelete=false" class="flex-1 p-4 rounded-2xl bg-stone-100 hover:bg-stone-200 cursor-pointer">
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
    </div>
@endsection
