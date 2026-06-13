@extends('layouts.app')

@section('content')
    <div x-data="{
        showEdit: {{ session('show_edit_modal') ? 'true' : 'false' }},
        showDelete: false,
        product: {},
    
        editProduct(product) {
            this.product = product;
            this.showEdit = true;
        },

        deleteProduct(product) {
            this.product = product;
            this.showDelete = true;
        },
    
        addVariant() {
            if (!this.product.variant) {
                this.product.variant = [];
            }
            this.product.variant.push({
                variant_name: '',
                price: '',
                is_active: false,
            });
        },
    
        generateSku(variant) {
            const category = (this.product.category || '')
                .toUpperCase()
                .replace(/[AIUEO\s]/g, '')
                .substring(0, 3);
    
            const product = (this.product.name || '')
                .replace(/\s+/g, '-')
                .toUpperCase()
                .substring(0, 3);;
    
            const size =
                variant.variant_name === 'Regular' ? '' :
                (variant.variant_name || '')
                .substring(0, 1)
                .toUpperCase();
    
            return [category, product, size]
                .filter(Boolean)
                .join('-');
        },
    }">

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

            <button @click="productModal=true"
                class="bg-linear-to-r from-[#6F4E37] to-[#A67B5B] text-white px-6 py-4 rounded-2xl shadow-xl">

                + Tambah Produk

            </button>


        </div>

        <!-- KPI -->

        <div class="grid md:grid-cols-2 xl:grid-cols-4 gap-6 mb-8">

            <!-- Total Produk -->

            <div class="bg-white rounded-[30px] p-6 shadow-xl border border-[#EFE3D5]">

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

                    <div class="w-14 h-14 rounded-2xl bg-[#FAF3E0] flex items-center justify-center">

                        <svg xmlns="http://www.w3.org/2000/svg" class="w-7 h-7 text-[#6F4E37]" fill="none"
                            viewBox="0 0 24 24" stroke="currentColor">

                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                d="M20 13V7a2 2 0 00-1-1.73l-6-3.46a2 2 0 00-2 0L5 5.27A2 2 0 004 7v6a2 2 0 001 1.73l6 3.46a2 2 0 002 0l6-3.46A2 2 0 0020 13z" />

                        </svg>

                    </div>

                </div>

            </div>

            <!-- Produk Aktif -->

            <div class="bg-white rounded-[30px] p-6 shadow-xl border border-[#EFE3D5]">

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

                    <div class="w-14 h-14 rounded-2xl bg-[#FAF3E0] flex items-center justify-center">

                        <svg xmlns="http://www.w3.org/2000/svg" class="w-7 h-7 text-[#6F4E37]" fill="none"
                            viewBox="0 0 24 24" stroke="currentColor">

                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M5 13l4 4L19 7" />

                        </svg>

                    </div>

                </div>

            </div>

            <!-- Best Seller -->

            <div class="bg-white rounded-[30px] p-6 shadow-xl border border-[#EFE3D5]">

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

                    <div class="w-14 h-14 rounded-2xl bg-[#FAF3E0] flex items-center justify-center">

                        <svg xmlns="http://www.w3.org/2000/svg" class="w-7 h-7 text-[#6F4E37]" fill="none"
                            viewBox="0 0 24 24" stroke="currentColor">

                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                d="M11.049 2.927c.3-.921 1.603-.921 1.902 0l1.286 3.966a1 1 0 00.95.69h4.17c.969 0 1.371 1.24.588 1.81l-3.375 2.453a1 1 0 00-.364 1.118l1.287 3.966c.299.921-.755 1.688-1.538 1.118l-3.375-2.453a1 1 0 00-1.176 0l-3.375 2.453c-.783.57-1.837-.197-1.538-1.118l1.287-3.966a1 1 0 00-.364-1.118L2.98 9.393c-.783-.57-.38-1.81.588-1.81h4.17a1 1 0 00.95-.69l1.361-3.966z" />

                        </svg>

                    </div>

                </div>

            </div>

            <!-- Kategori -->

            <div class="bg-white rounded-[30px] p-6 shadow-xl border border-[#EFE3D5]">

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

                    <div class="w-14 h-14 rounded-2xl bg-[#FAF3E0] flex items-center justify-center">
                        <x-heroicon-o-tag class="h-7 w-7 text-[#6F4E37]" />
                    </div>

                </div>

            </div>

        </div>

        <!-- SEARCH -->

        <div class="bg-white rounded-3xl shadow-xl p-6 mb-8">


            <input x-model="search" type="text" placeholder="Cari produk..."
                class="w-full border border-[#E6D7C8] rounded-2xl p-4">


        </div>

        <!-- PRODUCTS TABLE -->

        <div class="bg-white rounded-3xl shadow-xl overflow-hidden border border-[#EFE3D5]">

            <table class="w-full">
                <thead>
                    <tr class="border-b border-[#EFE3D5] bg-[#FAF3E0]">
                        <th class="px-6 py-4 text-left text-sm font-semibold text-[#2B2118]">Nama Produk</th>
                        <th class="px-6 py-4 text-left text-sm font-semibold text-[#2B2118]">Kategori</th>
                        <th class="px-6 py-4 text-center text-sm font-semibold text-[#2B2118]">Aksi</th>
                    </tr>
                </thead>
                <tbody>
                    @forelse ($products as $product)
                        <tr class="border-b border-[#EFE3D5] hover:bg-[#FAF3E0] transition-colors">
                            <td class="px-6 py-4">
                                <p class="text-sm font-semibold text-[#2B2118]">{{ $product->name }}</p>
                            </td>
                            <td class="px-6 py-4">
                                <span
                                    class="inline-block bg-[#F2E6D9] text-[#6F4E37] px-3 py-1 rounded-full text-xs font-medium">
                                    {{ $product->category }}
                                </span>
                            </td>
                            <td class="px-6 py-4">
                                <div class="flex justify-center gap-2">
                                    <button @click="editProduct(@js($product))"
                                        class="px-3 py-2 bg-[#E8F0F7] text-[#2B5A7D] rounded-lg text-xs font-semibold hover:bg-[#D0E4F2] transition cursor-pointer"
                                        title="Edit">
                                        <x-heroicon-o-pencil class="w-4 h-4" />
                                    </button>
                                    <button
                                        @click="deleteProduct(@js($product))"
                                        class="px-3 py-2 bg-[#FFE8E8] text-red-600 rounded-lg text-xs font-semibold hover:bg-[#FFD0D0] transition cursor-pointer"
                                        title="Hapus">
                                        <x-heroicon-o-trash class="w-4 h-4" />
                                    </button>
                                </div>
                            </td>
                        </tr>
                    @empty
                        <tr>
                            <td colspan="5" class="px-6 py-8 text-center text-stone-500">
                                Belum ada produk. Klik "Tambah Produk" untuk menambahkan.
                            </td>
                        </tr>
                    @endforelse
                </tbody>
            </table>

        </div>

        <!-- EDIT PRODUCT MODAL -->

        <div x-show="showEdit" x-transition.opacity style="display:none"
            class="fixed inset-0 z-50 bg-black/50 flex items-center justify-center p-4">

            <div @click.away="showEdit=false"
                class="bg-white w-full max-w-2xl rounded-xl shadow-2xl overflow-hidden max-h-[90vh] overflow-y-auto">

                <!-- HEADER -->
                <div
                    class="sticky top-0 bg-linear-to-r from-[#6F4E37] to-[#8B6F47] text-white p-4 flex justify-between items-center">
                    <div>
                        <p class="text-white/70 text-xs font-medium">Informasi Produk</p>
                        <h2 class="text-xl font-bold">Edit Produk</h2>
                    </div>
                    <button @click="showEdit=false" class="text-white hover:bg-white/20 rounded-lg p-1 transition">
                        <svg class="w-5 h-5" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M6 18L18 6M6 6l12 12">
                            </path>
                        </svg>
                    </button>
                </div>

                <!-- FORM -->
                <form :action="`{{ url('/products') }}/${product.id}`" method="POST">
                    @csrf
                    @method('PUT')

                    <div class="p-6 space-y-4">
                        <!-- Nama Produk & Kategori -->
                        <div class="grid grid-cols-2 gap-3">
                            <div>
                                <label class="text-xs uppercase tracking-wide text-stone-600 font-semibold block mb-1">
                                    Nama Produk
                                </label>
                                <input x-model="product.name" name="name"
                                    class="w-full px-3 py-2 border border-[#E6D7C8] rounded-lg focus:outline-none focus:border-[#6F4E37] focus:ring-1 focus:ring-[#6F4E37]/20 transition text-sm">
                            </div>
                            <div>
                                <label class="text-xs uppercase tracking-wide text-stone-600 font-semibold block mb-1">
                                    Kategori
                                </label>
                                <select x-model="product.category" name="category"
                                    class="w-full px-3 py-2 border border-[#E6D7C8] rounded-lg focus:outline-none focus:border-[#6F4E37] focus:ring-1 focus:ring-[#6F4E37]/20 transition text-sm">
                                    <option value="">Pilih</option>
                                    <option value="Hot Drinks" @selected('product.category' == 'Hot Drinks')>Hot Drinks</option>
                                    <option value="Cold Drinks" @selected('product.category' == 'Cold Drinks')>Cold Drink</option>
                                    <option value="Snacks" @selected('product.category' == 'Snacks')>Snack</option>
                                </select>
                            </div>
                        </div>

                        <!-- Deskripsi -->
                        <div>
                            <label class="text-xs uppercase tracking-wide text-stone-600 font-semibold block mb-1">
                                Deskripsi
                            </label>
                            <textarea x-model="product.description" placeholder="Deskripsi produk" rows="2" name="description"
                                class="w-full px-3 py-2 border border-[#E6D7C8] rounded-lg focus:outline-none focus:border-[#6F4E37] focus:ring-1 focus:ring-[#6F4E37]/20 transition resize-none text-sm"></textarea>
                        </div>

                        <!-- Divider -->
                        <div class="border-t border-[#EFE3D5] my-2"></div>

                        <!-- Product Variant Section -->
                        <div>
                            <h3 class="text-sm font-semibold text-[#2B2118] mb-2 flex items-center">
                                <svg class="w-4 h-4 mr-2" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                        d="M7 21a4 4 0 01-4-4V5a2 2 0 012-2h4a2 2 0 012 2v12a4 4 0 01-4 4zm0 0h12a2 2 0 002-2v-4a2 2 0 00-2-2h-2.343M11 7.343l1.657-1.657a2 2 0 012.828 0l2.829 2.829a2 2 0 010 2.828l-8.486 8.485M7 17h.01">
                                    </path>
                                </svg>
                                Varian Produk
                            </h3>

                            <!-- Variants List -->
                            <div class="bg-[#FAF3E0] rounded-lg border border-[#E6D7C8] overflow-hidden">
                                <template x-for="(variant, index) in product.variant" :key="index">
                                    <div class="p-3 border-b border-[#E6D7C8] last:border-b-0">
                                        <!-- SKU Label -->
                                        <input x-model="variant.id" :name="`variant[${index}][id]`" type="hidden">
                                        <p class="text-xs text-stone-400 font-medium mb-2">SKU:
                                            <input x-model="generateSku(variant)" :name="`variant[${index}][sku]`"
                                                class="text-stone-500">
                                            </input>
                                        </p>
                                        <!-- Fields Row -->
                                        <div class="grid grid-cols-12 gap-2 items-center">
                                            <input x-model="variant.variant_name" :name="`variant[${index}][variant_name]`"
                                                type="text" placeholder="Ukuran Produk"
                                                class="col-span-5 px-2 py-2 text-sm border border-[#E6D7C8] rounded-lg focus:outline-none focus:ring-1 focus:ring-[#6F4E37] bg-white">
                                            <input x-model="variant.price" :name="`variant[${index}][price]`"
                                                placeholder="Harga"
                                                class="col-span-5 px-2 py-2 text-sm border border-[#E6D7C8] rounded-lg focus:outline-none focus:ring-1 focus:ring-[#6F4E37] bg-white">
                                            <div class="col-span-2 flex justify-center gap-5">
                                                <label class="flex items-center justify-center">
                                                    <input type="hidden" :name="`variant[${index}][is_active]`" value="0">
                                                    <input x-model="variant.is_active"
                                                        :name="`variant[${index}][is_active]`" type="checkbox" value="1"
                                                        class="w-4 h-4 rounded cursor-pointer">
                                                </label>
                                                <button x-show="!variant.id" type="button"
                                                    @click="product.variant.splice(index, 1)"
                                                    class="text-center text-red-500 hover:text-red-600 transition cursor-pointer font-semibold text-sm"
                                                    title="Hapus varian">
                                                    <x-heroicon-o-trash class="w-5 h-5" />
                                                </button>
                                            </div>
                                        </div>
                                    </div>
                                </template>

                                <!-- Add Variant Button -->
                                <div class="px-3 py-2 text-center">
                                    <button type="button" @click="addVariant()"
                                        class="text-xs font-semibold text-[#6F4E37] hover:text-[#8B6F47] transition cursor-pointer">
                                        + Tambah Varian
                                    </button>
                                </div>
                            </div>
                        </div>

                    </div>

                    <!-- FOOTER -->
                    <div class="sticky bottom-0 bg-[#FAF3E0] border-t border-[#E6D7C8] p-4 flex justify-end gap-2">
                        <button @click="showEdit=false"
                            class="px-4 py-2 rounded-lg text-sm font-semibold border border-[#DDB892] text-[#6F4E37] hover:bg-white transition cursor-pointer">
                            Batal
                        </button>

                        <button type="submit"
                            class="px-4 py-2 rounded-lg text-sm font-semibold bg-linear-to-r from-[#6F4E37] to-[#A67B5B] text-white hover:shadow-lg transition cursor-pointer">
                            Simpan
                        </button>
                    </div>

                </form>

            </div>

        </div>


        <!-- DELETE PRODUCT MODAL -->

        <div x-show="showDelete" x-transition.opacity style="display:none"
            class="fixed inset-0 z-9999 bg-black/60 flex items-center justify-center p-6">

            <div @click.away="showDelete=false"
                class="bg-white w-full max-w-lg rounded-[36px] shadow-[0_30px_80px_rgba(0,0,0,0.18)] overflow-hidden">

                <!-- HEADER -->

                <div class="bg-linear-to-r from-red-500 to-red-600 p-8 text-white text-center">

                    <div class="w-24 h-24 p-5 mx-auto rounded-full bg-white/20 flex items-center justify-center">
                        <x-heroicon-o-trash/>
                    </div>
                    <h2 class="text-3xl font-black mt-5">
                        Hapus Produk
                    </h2>

                </div>

                <!-- BODY -->

                <div class="p-8 text-center">

                    <h3 class="text-2xl font-bold text-[#2B2118] mt-6" x-text="selectedProduct?.name">
                    </h3>
                    <p class="text-stone-500 mt-4 leading-relaxed">
                        Produk yang dihapus tidak dapat dikembalikan.
                        Pastikan keputusan ini sudah benar.
                    </p>

                </div>

                <!-- FOOTER -->

                <div class="border-t border-[#EFE3D5] p-6 flex gap-4">

                    <button @click="showDelete=false"
                        class="flex-1 py-4 rounded-2xl border border-[#DDB892] hover:bg-[#FAF3E0] transition cursor-pointer">
                        Batal
                    </button>
                    <form :action="`{{ url('/products') }}/${product.id}`" method="POST">
                        @csrf
                        @method('DELETE')
                        <button type="submit"
                            class="flex-1 py-4 rounded-2xl bg-linear-to-r from-red-500 to-red-600 text-white font-semibold shadow-lg hover:shadow-xl transition cursor-pointer">
                            Ya, Hapus
                        </button>
                    </form>

                </div>

            </div>

        </div>
    </div>
@endsection
