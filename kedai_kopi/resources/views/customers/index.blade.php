@extends('layouts.app')

@section('content')

<div
x-data="{

search:'',

filter:'all',

customers:[

{
id:1,
name:'Prasetyo',
email:'prasetyo@email.com',
phone:'08123456789',
points:1250,
status:'VIP',
avatar:'P'
},

{
id:2,
name:'Andi',
email:'andi@email.com',
phone:'08222222222',
points:640,
status:'Member',
avatar:'A'
},

{
id:3,
name:'Budi',
email:'budi@email.com',
phone:'08333333333',
points:420,
status:'Regular',
avatar:'B'
},

{
id:4,
name:'Rina',
email:'rina@email.com',
phone:'08444444444',
points:980,
status:'VIP',
avatar:'R'
}

],

selectedCustomer:null,
newCustomer:{
    name:'',
    email:'',
    phone:'',
    status:'Member',
    points:0,
    avatar:'N'
},

}"

>

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

<button

    @click="customerModal=true"

    class="bg-gradient-to-r from-[#6F4E37] to-[#A67B5B] text-white px-6 py-4 rounded-2xl shadow-xl hover:scale-105 transition-all">

    + Tambah Pelanggan

</button>


</div>

<!-- KPI -->

<div class="grid grid-cols-1 md:grid-cols-2 xl:grid-cols-4 gap-6 mb-8">

    <!-- Total Customer -->

    <div class="bg-white rounded-[32px] p-6 shadow-xl border border-[#E8D8C4]">

        <div class="flex justify-between items-center">

            <div>

                <p class="text-sm text-stone-500">
                    Total Pelanggan
                </p>

                <h2 class="text-5xl font-bold text-[#2B2118] mt-3">
                    1.248
                </h2>

                <p class="mt-3 text-green-600 text-sm font-semibold">
                    +12% bulan ini
                </p>

            </div>

            <div
            class="w-16 h-16 rounded-2xl bg-[#FAF3E0] flex items-center justify-center">

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

    <!-- Member Aktif -->

    <div class="bg-white rounded-[32px] p-6 shadow-xl border border-[#E8D8C4]">

        <div class="flex justify-between items-center">

            <div>

                <p class="text-sm text-stone-500">
                    Member Aktif
                </p>

                <h2 class="text-5xl font-bold text-[#2B2118] mt-3">
                    842
                </h2>

                <p class="mt-3 text-green-600 text-sm font-semibold">
                    +8% bulan ini
                </p>

            </div>

            <div
            class="w-16 h-16 rounded-2xl bg-[#FAF3E0] flex items-center justify-center">

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

    <!-- VIP -->

    <div class="bg-white rounded-[32px] p-6 shadow-xl border border-[#E8D8C4]">

        <div class="flex justify-between items-center">

            <div>

                <p class="text-sm text-stone-500">
                    VIP Customer
                </p>

                <h2 class="text-5xl font-bold text-[#2B2118] mt-3">
                    342
                </h2>

                <p class="mt-3 text-yellow-600 text-sm font-semibold">
                    Top Tier
                </p>

            </div>

            <div
            class="w-16 h-16 rounded-2xl bg-[#FAF3E0] flex items-center justify-center">

                <svg xmlns="http://www.w3.org/2000/svg"
                     class="w-8 h-8 text-[#6F4E37]"
                     fill="none"
                     viewBox="0 0 24 24"
                     stroke="currentColor">

                    <path stroke-linecap="round"
                          stroke-linejoin="round"
                          stroke-width="2"
                          d="M5 16L3 5h18l-2 11H5z"/>

                </svg>

            </div>

        </div>

    </div>

    <!-- Lifetime Value -->

    <div class="bg-white rounded-[32px] p-6 shadow-xl border border-[#E8D8C4]">

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

            <div
            class="w-16 h-16 rounded-2xl bg-[#FAF3E0] flex items-center justify-center">

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

</div>

<!-- SEARCH -->

<div class="bg-white rounded-3xl shadow-xl p-6 mb-8">


<div class="grid lg:grid-cols-3 gap-4">

    <input

        x-model="search"

        type="text"

        placeholder="Cari nama pelanggan..."

        class="border border-[#E6D7C8] rounded-2xl px-5 py-4 focus:outline-none focus:ring-2 focus:ring-[#A67B5B]">

    <select

        x-model="filter"

        class="border border-[#E6D7C8] rounded-2xl px-5 py-4">

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

    <div
        class="bg-[#FAF3E0]
        rounded-2xl
        flex items-center justify-center
        font-semibold text-[#6F4E37]">

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

                <th class="p-5 text-left">
                    Pelanggan
                </th>

                <th class="p-5 text-left">
                    Telepon
                </th>

                <th class="p-5 text-left">
                    Poin
                </th>

                <th class="p-5 text-left">
                    Status
                </th>

                <th class="p-5 text-left">
                    Aksi
                </th>

            </tr>

        </thead>

        <tbody>

            <template
                x-for="customer in customers.filter(c => {

                    let cocokNama =
                        c.name.toLowerCase()
                        .includes(search.toLowerCase());

                    let cocokStatus =
                        filter === 'all'
                        || c.status === filter;

                    return cocokNama && cocokStatus;

                })"
                :key="customer.id"
            >

                <tr class="border-b hover:bg-[#FAF3E0]/40 transition">

                    <td class="p-5">

                        <div class="flex items-center gap-4">

                            <div
                            class="w-12 h-12 rounded-2xl bg-gradient-to-r from-[#6F4E37] to-[#A67B5B] text-white flex items-center justify-center font-bold">

                                <span x-text="customer.avatar"></span>

                            </div>

                            <div>

                                <h4
                                class="font-semibold"
                                x-text="customer.name"></h4>

                                <p
                                class="text-sm text-stone-500"
                                x-text="customer.email"></p>

                            </div>

                        </div>

                    </td>

                    <td
                    class="p-5"
                    x-text="customer.phone"></td>

                    <td
                    class="p-5 font-bold text-[#6F4E37]"
                    x-text="customer.points"></td>

                    <td class="p-5">

                        <span

                        x-text="customer.status"

                        class="px-3 py-1 rounded-full text-sm bg-[#FAF3E0] text-[#6F4E37]">

                        </span>

                    </td>

                    <td class="p-5">

                        <div class="flex gap-2">

                            <button
                            @click="
                            selectedCustomer=customer;
                            customerDetail=true;
                            "
                            class="px-4 py-2 rounded-xl border border-[#DDB892] text-[#6F4E37] hover:bg-[#FAF3E0]">

                                Detail

                            </button>

                            <button
                            @click="
                            selectedCustomer=customer;
                            customerEdit=true;
                            "
                            class="px-4 py-2 rounded-xl bg-[#6F4E37] text-white">

                                Edit

                            </button>

                            <button
                            @click="
                            selectedCustomer=customer;
                            customerDelete=true;
                            "
                            class="px-4 py-2 rounded-xl bg-red-50 text-red-600">

                                Hapus

                            </button>

                        </div>

                    </td>

                </tr>

            </template>

        </tbody>

    </table>

</div>


</div>
<!-- MODAL TAMBAH CUSTOMER -->

<div
x-show="customerModal"
x-transition
class="fixed inset-0 z-[9999] flex items-center justify-center p-4">


<div
@click="customerModal=false"
class="absolute inset-0 bg-black/50">
</div>

<div
class="relative bg-white w-full max-w-2xl rounded-[32px] shadow-2xl p-8">

    <div class="flex justify-between items-center mb-8">

        <div>

            <h2 class="text-3xl font-bold text-[#2B2118]">
                Tambah Pelanggan
            </h2>

            <p class="text-stone-500">
                Tambahkan pelanggan baru
            </p>

        </div>

        <button
        @click="customerModal=false"
        class="text-3xl">

            ×

        </button>

    </div>

    <div class="grid md:grid-cols-2 gap-5">

        <input
        x-model="newCustomer.name"
        class="border rounded-2xl p-4"
        placeholder="Nama Lengkap">

        <input
        x-model="newCustomer.email"
        class="border rounded-2xl p-4"
        placeholder="Email">

        <input
        x-model="newCustomer.phone"
        class="border rounded-2xl p-4"
        placeholder="Telepon">

        <select
        x-model="newCustomer.status"
        class="border rounded-2xl p-4">

        <option>VIP</option>
        <option>Member</option>
        <option>Regular</option>

        </select>

        <input

        type="number"

        x-model="newCustomer.points"

        class="border rounded-2xl p-4"

        placeholder="Poin">


    </div>

    <div class="flex gap-3 mt-8">

        <button
        @click="customerModal=false"
        class="flex-1 p-4 rounded-2xl bg-stone-100">

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

class="flex-1 p-4 rounded-2xl bg-gradient-to-r from-[#6F4E37] to-[#A67B5B] text-white font-bold">

Simpan

</button>

    </div>

</div>


</div>

<!-- MODAL DETAIL -->

<div
x-show="customerDetail"
x-transition
class="fixed inset-0 z-[9999] flex items-center justify-center p-4">


<div
@click="customerDetail=false"
class="absolute inset-0 bg-black/50">
</div>

<div
class="relative bg-white w-full max-w-xl rounded-[32px] shadow-2xl p-8">

    <div class="text-center">

        <div
        class="w-24 h-24 mx-auto rounded-3xl bg-gradient-to-r from-[#6F4E37] to-[#A67B5B] text-white flex items-center justify-center text-3xl font-bold">

            <span x-text="selectedCustomer?.avatar"></span>

        </div>

        <h2
        class="text-3xl font-bold mt-5"
        x-text="selectedCustomer?.name"></h2>

        <p
        class="text-stone-500"
        x-text="selectedCustomer?.email"></p>

    </div>

    <div class="grid grid-cols-2 gap-4 mt-8">

        <div class="bg-[#FAF3E0] rounded-2xl p-4">

            <p class="text-sm text-stone-500">
                Telepon
            </p>

            <h4
            class="font-bold mt-2"
            x-text="selectedCustomer?.phone"></h4>

        </div>

        <div class="bg-[#FAF3E0] rounded-2xl p-4">

            <p class="text-sm text-stone-500">
                Poin
            </p>

            <h4
            class="font-bold mt-2"
            x-text="selectedCustomer?.points"></h4>

        </div>

    </div>

    <button
    @click="customerDetail=false"
    class="w-full mt-8 p-4 rounded-2xl bg-[#6F4E37] text-white">

        Tutup

    </button>

</div>


</div>

<!-- MODAL EDIT -->

<div
x-show="customerEdit"
x-transition
class="fixed inset-0 z-[9999] flex items-center justify-center p-4">


<div
@click="customerEdit=false"
class="absolute inset-0 bg-black/50">
</div>

<div
class="relative bg-white w-full max-w-2xl rounded-[32px] shadow-2xl p-8">

    <h2 class="text-3xl font-bold mb-8">
        Edit Pelanggan
    </h2>

    <div class="grid md:grid-cols-2 gap-5">

        <input
        :value="selectedCustomer?.name"
        class="border rounded-2xl p-4">

        <input
        :value="selectedCustomer?.email"
        class="border rounded-2xl p-4">

        <input
        :value="selectedCustomer?.phone"
        class="border rounded-2xl p-4">

        <input
        :value="selectedCustomer?.points"
        class="border rounded-2xl p-4">

    </div>

    <div class="flex gap-3 mt-8">

        <button
        @click="customerEdit=false"
        class="flex-1 p-4 rounded-2xl bg-stone-100">

            Batal

        </button>

        <button
        class="flex-1 p-4 rounded-2xl bg-green-500 text-white">

            Update

        </button>

    </div>

</div>


</div>

<!-- MODAL DELETE -->

<div
x-show="customerDelete"
x-transition
class="fixed inset-0 z-[9999] flex items-center justify-center p-4">


<div
@click="customerDelete=false"
class="absolute inset-0 bg-black/50">
</div>

<div
class="relative bg-white w-full max-w-lg rounded-[32px] shadow-2xl p-8 text-center">

    <div
        class="w-20 h-20 mx-auto rounded-3xl
        bg-red-50
        flex items-center justify-center mb-6">

            <svg xmlns="http://www.w3.org/2000/svg"
                class="w-10 h-10 text-red-500"
                fill="none"
                viewBox="0 0 24 24"
                stroke="currentColor">

                <path stroke-linecap="round"
                    stroke-linejoin="round"
                    stroke-width="2"
                    d="M19 7l-.867 12.142A2 2 0 0116.138 21H7.862a2 2 0 01-1.995-1.858L5 7m5-3h4m-7 3h10"/>

            </svg>

    </div>

    <h2 class="text-3xl font-bold">
        Hapus Pelanggan?
    </h2>

    <p class="text-stone-500 mt-3">

        Data

        <span
        class="font-semibold"
        x-text="selectedCustomer?.name"></span>

        akan dihapus.

    </p>

    <div class="flex gap-3 mt-8">

        <button
        @click="customerDelete=false"
        class="flex-1 p-4 rounded-2xl bg-stone-100">

            Batal

        </button>

        <button
        class="flex-1 p-4 rounded-2xl bg-red-500 text-white">

            Hapus

        </button>

    </div>

</div>


</div>

</div>

@endsection
