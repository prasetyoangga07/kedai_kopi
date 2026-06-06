@extends('layouts.app')

@section('content')

<div
x-data="{

search:'',

showDetail:false,
showEdit:false,
showDelete:false,

selectedProduct:null,

products:[

{
id:1,
name:'Cappuccino',
category:'Coffee',
price:28000,
stock:120,
image:'https://images.unsplash.com/photo-1517701604599-bb29b565090c'
},

{
id:2,
name:'Latte',
category:'Coffee',
price:30000,
stock:90,
image:'https://images.unsplash.com/photo-1572442388796-11668a67e53d'
},

{
id:3,
name:'Croissant',
category:'Pastry',
price:18000,
stock:35,
image:'https://images.unsplash.com/photo-1555507036-ab1f4038808a'
},

{
id:4,
name:'Cheesecake',
category:'Dessert',
price:25000,
stock:12,
image:'https://images.unsplash.com/photo-1533134242443-d4fd215305ad'
}

]

}"

>

<!-- HEADER -->

<div class="flex justify-between items-center mb-8">


<div>

    <h1 class="text-4xl font-bold text-[#2B2118]">
        Manajemen Produk
    </h1>

    <p class="text-[#8B6E54] mt-2">
        Kelola menu kopi dan produk kedai.
    </p>

</div>

<button
@click="productModal=true"
class="bg-gradient-to-r from-[#6F4E37] to-[#A67B5B] text-white px-6 py-4 rounded-2xl shadow-xl">

    + Tambah Produk

</button>


</div>

<!-- KPI -->

<div class="grid md:grid-cols-2 xl:grid-cols-4 gap-6 mb-8">

    <!-- Total Produk -->

    <div
    class="bg-white rounded-[30px] p-6 shadow-xl border border-[#EFE3D5]">

        <div class="flex justify-between items-start">

            <div>

                <p class="text-stone-500">
                    Total Produk
                </p>

                <h2 class="text-5xl font-black text-[#2B2118] mt-3">
                    24
                </h2>

                <p class="text-green-600 text-sm mt-3 font-semibold">
                    +4 produk bulan ini
                </p>

            </div>

            <div
            class="w-14 h-14 rounded-2xl bg-[#FAF3E0] flex items-center justify-center">

                <svg xmlns="http://www.w3.org/2000/svg"
                    class="w-7 h-7 text-[#6F4E37]"
                    fill="none"
                    viewBox="0 0 24 24"
                    stroke="currentColor">

                    <path stroke-linecap="round"
                        stroke-linejoin="round"
                        stroke-width="2"
                        d="M20 13V7a2 2 0 00-1-1.73l-6-3.46a2 2 0 00-2 0L5 5.27A2 2 0 004 7v6a2 2 0 001 1.73l6 3.46a2 2 0 002 0l6-3.46A2 2 0 0020 13z"/>

                </svg>

            </div>

        </div>

    </div>

    <!-- Produk Aktif -->

    <div
    class="bg-white rounded-[30px] p-6 shadow-xl border border-[#EFE3D5]">

        <div class="flex justify-between items-start">

            <div>

                <p class="text-stone-500">
                    Produk Aktif
                </p>

                <h2 class="text-5xl font-black text-[#2B2118] mt-3">
                    21
                </h2>

                <p class="text-green-600 text-sm mt-3 font-semibold">
                    87% tersedia
                </p>

            </div>

            <div
            class="w-14 h-14 rounded-2xl bg-[#FAF3E0] flex items-center justify-center">

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

    <!-- Best Seller -->

    <div
    class="bg-white rounded-[30px] p-6 shadow-xl border border-[#EFE3D5]">

        <div class="flex justify-between items-start">

            <div>

                <p class="text-stone-500">
                    Best Seller
                </p>

                <h2 class="text-5xl font-black text-[#2B2118] mt-3">
                    8
                </h2>

                <p class="text-[#A67B5B] text-sm mt-3 font-semibold">
                    Top Performance
                </p>

            </div>

            <div
            class="w-14 h-14 rounded-2xl bg-[#FAF3E0] flex items-center justify-center">

                <svg xmlns="http://www.w3.org/2000/svg"
                    class="w-7 h-7 text-[#6F4E37]"
                    fill="none"
                    viewBox="0 0 24 24"
                    stroke="currentColor">

                    <path stroke-linecap="round"
                        stroke-linejoin="round"
                        stroke-width="2"
                        d="M11.049 2.927c.3-.921 1.603-.921 1.902 0l1.286 3.966a1 1 0 00.95.69h4.17c.969 0 1.371 1.24.588 1.81l-3.375 2.453a1 1 0 00-.364 1.118l1.287 3.966c.299.921-.755 1.688-1.538 1.118l-3.375-2.453a1 1 0 00-1.176 0l-3.375 2.453c-.783.57-1.837-.197-1.538-1.118l1.287-3.966a1 1 0 00-.364-1.118L2.98 9.393c-.783-.57-.38-1.81.588-1.81h4.17a1 1 0 00.95-.69l1.361-3.966z"/>

                </svg>

            </div>

        </div>

    </div>

    <!-- Kategori -->

    <div
    class="bg-white rounded-[30px] p-6 shadow-xl border border-[#EFE3D5]">

        <div class="flex justify-between items-start">

            <div>

                <p class="text-stone-500">
                    Kategori
                </p>

                <h2 class="text-5xl font-black text-[#2B2118] mt-3">
                    6
                </h2>

                <p class="text-[#A67B5B] text-sm mt-3 font-semibold">
                    Coffee & Dessert
                </p>

            </div>

            <div
            class="w-14 h-14 rounded-2xl bg-[#FAF3E0] flex items-center justify-center">

                <svg xmlns="http://www.w3.org/2000/svg"
                    class="w-7 h-7 text-[#6F4E37]"
                    fill="none"
                    viewBox="0 0 24 24"
                    stroke="currentColor">

                    <path stroke-linecap="round"
                        stroke-linejoin="round"
                        stroke-width="2"
                        d="M7 7h10M7 12h10M7 17h6"/>

                </svg>

            </div>

        </div>

    </div>

</div>

<!-- SEARCH -->

<div class="bg-white rounded-3xl shadow-xl p-6 mb-8">


<input

x-model="search"

type="text"

placeholder="Cari produk..."

class="w-full border border-[#E6D7C8] rounded-2xl p-4">


</div>

<!-- PRODUCTS -->

<div class="grid md:grid-cols-2 xl:grid-cols-4 gap-6">

<template
x-for="product in products.filter(p =>
p.name.toLowerCase().includes(search.toLowerCase())
)"
:key="product.id">

<div
class="bg-white rounded-[30px]
overflow-hidden
shadow-xl
hover:-translate-y-2
hover:shadow-2xl
transition-all
duration-300">

    <!-- IMAGE -->

    <div class="relative h-52 overflow-hidden">

        <img
            :src="product.image"
            :alt="product.name"
            class="w-full h-full object-cover hover:scale-110 transition duration-700">

        <div
            class="absolute inset-0
            bg-gradient-to-t
            from-black/40
            via-transparent
            to-transparent">
        </div>

        <div
            x-show="product.stock > 50"
            class="absolute top-4 left-4 bg-green-500 text-white text-xs font-bold px-3 py-1 rounded-full">

            BEST SELLER

        </div>

        <div
            x-show="product.stock <= 20"
            class="absolute top-4 left-4 bg-red-500 text-white text-xs font-bold px-3 py-1 rounded-full">

            LOW STOCK

        </div>

    </div>

    <!-- BODY -->

    <div class="p-6">

        <div class="flex justify-between items-center">

            <h3
                class="font-bold text-xl text-[#2B2118]"
                x-text="product.name">
            </h3>

            <span
                class="bg-[#FAF3E0]
                text-[#6F4E37]
                px-3 py-1
                rounded-full
                text-xs">

                <span x-text="product.category"></span>

            </span>

        </div>

        <div class="mt-5">

            <p class="text-sm text-stone-500">
                Harga
            </p>

            <h2
                class="text-3xl font-black text-[#6F4E37]">

                Rp

                <span
                    x-text="product.price.toLocaleString()">
                </span>

            </h2>

        </div>

        <div
            class="mt-5
            bg-[#FAF3E0]
            rounded-2xl
            p-4">

            <p class="text-xs text-stone-500">
                Stok Tersedia
            </p>

            <h3
                class="text-2xl font-bold text-[#2B2118]">

                <span x-text="product.stock"></span>

            </h3>

        </div>

        <div class="mt-6 space-y-3">

            <button
                @click="
                    selectedProduct = product;
                    showDetail = true
                "
                class="w-full
                py-3.5
                rounded-2xl
                border border-[#DDB892]
                bg-[#FAF3E0]
                hover:bg-[#F2E6D9]
                text-[#6F4E37]
                font-semibold
                transition">

                Lihat Detail Produk

            </button>

         <div class="grid grid-cols-2 gap-3">

                <button
                    @click="
                        selectedProduct = product;
                        showEdit = true
                    "
                    class="py-3.5
                    rounded-2xl
                    bg-gradient-to-r
                    from-[#6F4E37]
                    to-[#A67B5B]
                    text-white
                    font-semibold
                    shadow-lg
                    hover:shadow-xl
                    transition">

                    Edit

                </button>

                <button
                    @click="
                        selectedProduct = product;
                        showDelete = true
                    "
                    class="py-3.5
                    rounded-2xl
                    bg-[#FFF1F1]
                    text-red-500
                    border border-red-200
                    font-semibold
                    hover:bg-red-50
                    transition">

                    Hapus

                </button>

         </div>


    </div>

</div>

</template>

</div>

<!-- PRODUCT MODAL -->

<div
    x-show="productModal"
    x-transition.opacity
    style="display:none"
    class="fixed inset-0 z-[9999] overflow-y-auto bg-black/60">

    <div
        class="min-h-screen flex items-start justify-center p-8">

        <div
            @click.away="productModal=false"
            class="bg-white w-full max-w-5xl rounded-[36px] shadow-[0_30px_80px_rgba(0,0,0,0.18)] overflow-hidden my-10 border border-[#EFE3D5]">

            <!-- HEADER -->

            <div
                class="bg-gradient-to-r from-[#6F4E37] to-[#A67B5B] p-8 text-white">

                <div class="flex justify-between items-start">

                    <div>

                        <span
                            class="bg-white/20 px-4 py-2 rounded-full text-sm">

                            Product Management

                        </span>

                        <h2
                            class="text-4xl font-black mt-4">

                            Tambah Produk Baru

                        </h2>

                        <p
                            class="text-white/80 mt-2">

                            Tambahkan menu baru ke katalog KOPIN.

                        </p>

                    </div>

                    <button
                        @click="productModal=false"
                        class="text-4xl hover:rotate-90 transition">

                        &times;

                    </button>

                </div>

            </div>

            <!-- CONTENT -->

            <div class="p-8 space-y-8">

                <!-- PREVIEW -->

                <div
                    class="bg-gradient-to-r from-[#FAF3E0] to-[#F8F3ED]
                    rounded-[30px]
                    p-6
                    border border-[#EFE3D5]">

                    <div
                        class="flex flex-col lg:flex-row gap-6 items-center">

                        <div
                            class="w-44 h-44 rounded-[28px]
                            overflow-hidden
                            bg-white
                            shadow-lg">

                            <img
                                src="https://images.unsplash.com/photo-1517701604599-bb29b565090c"
                                class="w-full h-full object-cover">

                        </div>

                        <div>

                            <span
                                class="bg-[#EEDCC8]
                                text-[#6F4E37]
                                px-4 py-2
                                rounded-full
                                text-sm">

                                Preview Produk

                            </span>

                            <h3
                                class="text-3xl font-black text-[#2B2118] mt-4">

                                Cappuccino Signature

                            </h3>

                            <p
                                class="text-stone-500 mt-2">

                                Menu kopi premium dengan cita rasa khas KOPIN.

                            </p>

                        </div>

                    </div>

                </div>

                <!-- FORM -->

                <div class="grid lg:grid-cols-2 gap-6">

                    <!-- NAMA -->

                    <div>

                        <label
                            class="font-semibold text-[#2B2118]">

                            Nama Produk

                        </label>

                        <input
                            type="text"
                            placeholder="Contoh : Cappuccino"

                            class="w-full mt-2
                            border border-[#E6D7C8]
                            rounded-2xl
                            px-5 py-4
                            focus:ring-2
                            focus:ring-[#A67B5B]
                            outline-none">

                    </div>

                    <!-- KATEGORI -->

                    <div>

                        <label
                            class="font-semibold text-[#2B2118]">

                            Kategori

                        </label>

                        <select
                            class="w-full mt-2
                            border border-[#E6D7C8]
                            rounded-2xl
                            px-5 py-4
                            focus:ring-2
                            focus:ring-[#A67B5B]
                            outline-none">

                            <option>Coffee</option>
                            <option>Pastry</option>
                            <option>Dessert</option>
                            <option>Non Coffee</option>

                        </select>

                    </div>

                    <!-- HARGA -->

                    <div>

                        <label
                            class="font-semibold text-[#2B2118]">

                            Harga

                        </label>

                        <input
                            type="number"
                            placeholder="28000"

                            class="w-full mt-2
                            border border-[#E6D7C8]
                            rounded-2xl
                            px-5 py-4">

                    </div>

                    <!-- STOK -->

                    <div>

                        <label
                            class="font-semibold text-[#2B2118]">

                            Stok

                        </label>

                        <input
                            type="number"
                            placeholder="120"

                            class="w-full mt-2
                            border border-[#E6D7C8]
                            rounded-2xl
                            px-5 py-4">

                    </div>

                </div>

                <!-- DESKRIPSI -->

                <div>

                    <label
                        class="font-semibold text-[#2B2118]">

                        Deskripsi Produk

                    </label>

                    <textarea
                        rows="4"
                        placeholder="Deskripsi singkat produk..."

                        class="w-full mt-2
                        border border-[#E6D7C8]
                        rounded-2xl
                        px-5 py-4"></textarea>

                </div>

                <!-- FOTO -->

                <div>

                    <label
                        class="font-semibold text-[#2B2118]">

                        Upload Foto Produk

                    </label>

                    <div
                        class="mt-3
                        border-2 border-dashed border-[#DDB892]
                        rounded-[28px]
                        p-10
                        text-center
                        bg-[#FAF3E0]">

                        <svg xmlns="http://www.w3.org/2000/svg"
                            class="w-14 h-14 mx-auto text-[#A67B5B]"
                            fill="none"
                            viewBox="0 0 24 24"
                            stroke="currentColor">

                            <path stroke-linecap="round"
                                stroke-linejoin="round"
                                stroke-width="2"
                                d="M7 16a4 4 0 01-.88-7.903A5 5 0 1115.9 6L16 6a5 5 0 011 9.9M15 13l-3-3m0 0l-3 3m3-3v12"/>

                        </svg>

                        <p
                            class="mt-4 text-[#6F4E37] font-semibold">

                            Klik atau Drag & Drop Foto

                        </p>

                        <p
                            class="text-sm text-stone-500 mt-1">

                            JPG, PNG maksimal 2 MB

                        </p>

                    </div>

                </div>

                <!-- STATUS PRODUK -->

<div>

    <label
        class="font-semibold text-[#2B2118]">

        Status Produk

    </label>

    <div class="grid md:grid-cols-3 gap-4 mt-3">

        <label
            class="cursor-pointer">

            <input
                type="radio"
                name="status"
                value="aktif"
                class="hidden peer"
                checked>

            <div
                class="bg-green-50
                border border-green-100
                rounded-3xl
                p-5
                peer-checked:border-green-500
                peer-checked:ring-2
                peer-checked:ring-green-200
                transition">

                <h3
                    class="font-bold text-green-700">

                    Produk Aktif

                </h3>

                <p
                    class="text-sm mt-2 text-stone-600">

                    Langsung tampil di katalog dan bisa dijual.

                </p>

            </div>

        </label>

        <label
            class="cursor-pointer">

            <input
                type="radio"
                name="status"
                value="draft"
                class="hidden peer">

            <div
                class="bg-blue-50
                border border-blue-100
                rounded-3xl
                p-5
                peer-checked:border-blue-500
                peer-checked:ring-2
                peer-checked:ring-blue-200
                transition">

                <h3
                    class="font-bold text-blue-700">

                    Draft

                </h3>

                <p
                    class="text-sm mt-2 text-stone-600">

                    Disimpan terlebih dahulu tanpa ditampilkan.

                </p>

            </div>

        </label>

        <label
            class="cursor-pointer">

            <input
                type="radio"
                name="status"
                value="featured"
                class="hidden peer">

            <div
                class="bg-orange-50
                border border-orange-100
                rounded-3xl
                p-5
                peer-checked:border-orange-500
                peer-checked:ring-2
                peer-checked:ring-orange-200
                transition">

                <h3
                    class="font-bold text-orange-700">

                    Featured

                </h3>

                <p
                    class="text-sm mt-2 text-stone-600">

                    Ditampilkan sebagai produk unggulan.

                </p>

            </div>

        </label>

    </div>

</div>

            </div>

            <!-- FOOTER -->

            <div
                class="border-t border-[#EFE3D5]
                p-6
                flex justify-end gap-4">

                <button
                    @click="productModal=false"

                    class="px-6 py-3
                    rounded-2xl
                    border border-[#DDB892]">

                    Batal

                </button>

                <button
                    class="px-8 py-3
                    rounded-2xl
                    bg-gradient-to-r
                    from-[#6F4E37]
                    to-[#A67B5B]
                    text-white
                    font-semibold
                    shadow-lg">

                    Simpan Produk

                </button>

            </div>

        </div>

    </div>

</div>

<!-- DETAIL PRODUCT MODAL -->

<div
    x-show="showDetail"
    x-transition.opacity
    style="display:none"
    class="fixed inset-0 z-[9999] bg-black/60 flex items-center justify-center p-6">

    <div
        @click.away="showDetail=false"
        class="bg-white w-full max-w-4xl rounded-[36px] overflow-hidden shadow-2xl">

        <!-- HEADER -->

        <div
            class="bg-gradient-to-r from-[#6F4E37] to-[#A67B5B] p-8 text-white">

            <div class="flex justify-between items-center">

                <div>

                    <p class="text-white/70 text-sm">
                        Product Detail
                    </p>

                    <h2
                        class="text-4xl font-bold"
                        x-text="selectedProduct?.name">
                    </h2>

                </div>

                <button
                    @click="showDetail=false"
                    class="text-4xl">

                    &times;

                </button>

            </div>

        </div>

        <!-- CONTENT -->

        <div class="p-8">

            <div class="grid lg:grid-cols-2 gap-8">

                <div>

                    <img
                        :src="selectedProduct?.image"
                        class="w-full h-[350px] object-cover rounded-[30px]">

                </div>

                <div>

                    <span
                        class="bg-[#FAF3E0]
                        text-[#6F4E37]
                        px-4 py-2
                        rounded-full">

                        <span x-text="selectedProduct?.category"></span>

                    </span>

                    <h3
                        class="text-5xl font-black text-[#2B2118] mt-6">

                        Rp
                        <span
                            x-text="selectedProduct?.price?.toLocaleString()">
                        </span>

                    </h3>

                    <div
                        class="bg-[#FAF3E0]
                        rounded-[28px]
                        p-6
                        mt-6">

                        <p class="text-stone-500">
                            Stok Saat Ini
                        </p>

                        <h3
                            class="text-4xl font-black text-[#6F4E37] mt-2">

                            <span x-text="selectedProduct?.stock"></span>

                        </h3>

                    </div>

                    <div
                        class="mt-6
                        bg-gradient-to-r
                        from-[#FAF3E0]
                        to-[#F8F3ED]
                        rounded-[28px]
                        p-6">

                        <h4 class="font-bold text-lg">
                            Product Insight
                        </h4>

                        <p class="mt-2 text-stone-600">
                            Produk ini memiliki performa penjualan yang stabil
                            dan menjadi salah satu menu favorit pelanggan.
                        </p>

                    </div>

                </div>

            </div>

        </div>

    </div>

</div>


<!-- EDIT PRODUCT MODAL -->

<div
    x-show="showEdit"
    x-transition.opacity
    style="display:none"
    class="fixed inset-0 z-[9999] bg-black/60 flex items-center justify-center p-6">

    <div
        @click.away="showEdit=false"
        class="bg-white w-full max-w-3xl rounded-[36px] shadow-2xl overflow-hidden">

        <!-- HEADER -->

        <div
            class="bg-gradient-to-r from-[#6F4E37] to-[#A67B5B] p-8 text-white">

            <div class="flex justify-between items-center">

                <div>

                    <p class="text-white/70 text-sm">
                        Product Management
                    </p>

                    <h2 class="text-3xl font-bold">
                        Edit Produk
                    </h2>

                </div>

                <button
                    @click="showEdit=false"
                    class="text-4xl">

                    &times;

                </button>

            </div>

        </div>

        <!-- FORM -->

        <div class="p-8 space-y-6">

            <div>

                <label class="font-semibold">
                    Nama Produk
                </label>

                <input
                    x-model="selectedProduct.name"
                    class="w-full mt-2 border border-[#E6D7C8] rounded-2xl p-4">

            </div>

            <div class="grid md:grid-cols-2 gap-5">

                <div>

                    <label class="font-semibold">
                        Harga
                    </label>

                    <input
                        x-model="selectedProduct.price"
                        type="number"
                        class="w-full mt-2 border border-[#E6D7C8] rounded-2xl p-4">

                </div>

                <div>

                    <label class="font-semibold">
                        Stok
                    </label>

                    <input
                        x-model="selectedProduct.stock"
                        type="number"
                        class="w-full mt-2 border border-[#E6D7C8] rounded-2xl p-4">

                </div>

            </div>

            <div>

                <label class="font-semibold">
                    Kategori
                </label>

                <select
                    x-model="selectedProduct.category"
                    class="w-full mt-2 border border-[#E6D7C8] rounded-2xl p-4">

                    <option>Coffee</option>
                    <option>Pastry</option>
                    <option>Dessert</option>

                </select>

            </div>

            <div
                class="bg-[#FAF3E0]
                rounded-[24px]
                p-5">

                <h3
                    class="font-bold text-[#6F4E37]">

                    Preview Produk

                </h3>

                <p class="mt-2">

                    <span x-text="selectedProduct?.name"></span>
                    -
                    Rp
                    <span x-text="selectedProduct?.price?.toLocaleString()"></span>

                </p>

            </div>

        </div>

        <!-- FOOTER -->

        <div
            class="border-t
            p-6
            flex justify-end gap-3">

            <button
                @click="showEdit=false"
                class="px-6 py-3 rounded-2xl border border-[#DDB892]">

                Batal

            </button>

            <button
                class="px-6 py-3 rounded-2xl bg-gradient-to-r from-[#6F4E37] to-[#A67B5B] text-white">

                Simpan Perubahan

            </button>

        </div>

    </div>

</div>


<!-- DELETE PRODUCT MODAL -->

<div
    x-show="showDelete"
    x-transition.opacity
    style="display:none"
    class="fixed inset-0 z-[9999] bg-black/60 flex items-center justify-center p-6">

    <div
        @click.away="showDelete=false"
        class="bg-white w-full max-w-lg rounded-[36px] shadow-[0_30px_80px_rgba(0,0,0,0.18)] overflow-hidden">

        <!-- HEADER -->

        <div
            class="bg-gradient-to-r from-red-500 to-red-600 p-8 text-white text-center">

            <div
                class="w-24 h-24 mx-auto rounded-full bg-white/20 flex items-center justify-center">

                <svg xmlns="http://www.w3.org/2000/svg"
                    class="w-12 h-12"
                    fill="none"
                    viewBox="0 0 24 24"
                    stroke="currentColor">

                    <path stroke-linecap="round"
                        stroke-linejoin="round"
                        stroke-width="2"
                        d="M19 7l-.867 12.142A2 2 0 0116.138 21H7.862a2 2 0 01-1.995-1.858L5 7m5 4v6m4-6v6M9 7V4a1 1 0 011-1h4a1 1 0 011 1v3m-7 0h8"/>

                </svg>

            </div>

            <h2 class="text-3xl font-black mt-5">
                Hapus Produk
            </h2>

        </div>

        <!-- BODY -->

        <div class="p-8 text-center">

            <img
                :src="selectedProduct?.image"
                class="w-32 h-32 rounded-[24px] object-cover mx-auto shadow-lg">

            <h3
                class="text-2xl font-bold text-[#2B2118] mt-6"
                x-text="selectedProduct?.name">
            </h3>

            <p
                class="text-stone-500 mt-4 leading-relaxed">

                Produk yang dihapus tidak dapat dikembalikan.

                Pastikan keputusan ini sudah benar.

            </p>

            <div
                class="bg-[#FAF3E0]
                rounded-[24px]
                p-5
                mt-6">

                <p class="text-sm text-stone-500">
                    Kategori
                </p>

                <p
                    class="font-bold text-[#6F4E37]"
                    x-text="selectedProduct?.category">
                </p>

            </div>

        </div>

        <!-- FOOTER -->

        <div
            class="border-t border-[#EFE3D5]
            p-6
            flex gap-4">

            <button
                @click="showDelete=false"
                class="flex-1
                py-4
                rounded-2xl
                border border-[#DDB892]
                hover:bg-[#FAF3E0]
                transition">

                Batal

            </button>

            <button
                class="flex-1
                py-4
                rounded-2xl
                bg-gradient-to-r
                from-red-500
                to-red-600
                text-white
                font-semibold
                shadow-lg
                hover:shadow-xl
                transition">

                Ya, Hapus

            </button>

        </div>

    </div>

</div>

@endsection
