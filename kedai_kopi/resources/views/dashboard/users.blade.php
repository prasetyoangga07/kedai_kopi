@extends('layouts.app')

@section('content')
    <div x-data='usersJs({
        roles: @json($roles)    
    })'>

        <!-- HEADER -->
        <div class="flex justify-between items-center mb-8">
            <div>
                <h1 class="text-4xl font-bold text-[#2B2118]">
                    Manajemen Pengguna
                </h1>
                <p class="text-[#8B6E54] mt-2">
                    Kelola data pengguna, hak akses, dan akun staf kedai.
                </p>
            </div>

            <button @click="createUser()"
                class="bg-linear-to-r from-[#6F4E37] to-[#A67B5B] text-white px-6 py-4 rounded-2xl shadow-xl cursor-pointer">
                + Tambah Pengguna
            </button>
        </div>

        <!-- KPI -->
        <div class="grid md:grid-cols-2 xl:grid-cols-4 gap-6 mb-8">

            <div class="bg-white rounded-[30px] p-6 shadow-xl border border-[#EFE3D5]">
                <div class="flex justify-between items-start">
                    <div>
                        <p class="text-stone-500">Total Pengguna</p>
                        <h2 class="text-5xl font-black text-[#2B2118] mt-3">
                            {{ $users->total() }}
                        </h2>
                        <p class="text-green-600 text-sm mt-3 font-semibold">
                            Semua akun terdaftar
                        </p>
                    </div>
                    <div class="w-14 h-14 rounded-2xl bg-[#FAF3E0] flex items-center justify-center">
                        <x-heroicon-o-users class="h-7 w-7 text-[#6F4E37]" />
                    </div>
                </div>
            </div>

            <div class="bg-white rounded-[30px] p-6 shadow-xl border border-[#EFE3D5]">
                <div class="flex justify-between items-start">
                    <div>
                        <p class="text-stone-500">Admin & Manager</p>
                        <h2 class="text-5xl font-black text-[#2B2118] mt-3">
                            {{ $totalAdmin }}
                        </h2>
                        <p class="text-[#A67B5B] text-sm mt-3 font-semibold">
                            Pengelola sistem
                        </p>
                    </div>
                    <div class="w-14 h-14 rounded-2xl bg-[#FAF3E0] flex items-center justify-center">
                        <x-heroicon-o-shield-check class="h-7 w-7 text-[#6F4E37]" />
                    </div>
                </div>
            </div>

            <div class="bg-white rounded-[30px] p-6 shadow-xl border border-[#EFE3D5]">
                <div class="flex justify-between items-start">
                    <div>
                        <p class="text-stone-500">Barista / Kasir</p>
                        <h2 class="text-5xl font-black text-[#2B2118] mt-3">
                            0
                        </h2>
                        <p class="text-[#A67B5B] text-sm mt-3 font-semibold">
                            Staf operasional
                        </p>
                    </div>
                    <div class="w-14 h-14 rounded-2xl bg-[#FAF3E0] flex items-center justify-center">
                        <x-heroicon-o-identification class="h-7 w-7 text-[#6F4E37]" />
                    </div>
                </div>
            </div>

            <div class="bg-white rounded-[30px] p-6 shadow-xl border border-[#EFE3D5]">
                <div class="flex justify-between items-start">
                    <div>
                        <p class="text-stone-500">Akun Aktif</p>
                        <h2 class="text-5xl font-black text-[#2B2118] mt-3">
                            {{ $users->total() }}
                        </h2>
                        <p class="text-green-600 text-sm mt-3 font-semibold">
                            Siap bertugas
                        </p>
                    </div>
                    <div class="w-14 h-14 rounded-2xl bg-[#FAF3E0] flex items-center justify-center">
                        <x-heroicon-o-check-circle class="h-7 w-7 text-[#6F4E37]" />
                    </div>
                </div>
            </div>
        </div>

        <!-- SEARCH -->
        <div class="bg-white rounded-3xl shadow-xl p-6 mb-8">
            <input x-model="search" type="text" placeholder="Cari nama atau email pengguna..."
                class="w-full border border-[#E6D7C8] rounded-2xl p-4">
        </div>

        <!-- TABLE -->
        <div class="bg-white rounded-3xl shadow-xl overflow-hidden border border-[#EFE3D5]">
            <table class="w-full">
                <thead>
                    <tr class="border-b border-[#EFE3D5] bg-[#FAF3E0]">
                        <th class="px-6 py-4 text-left text-sm font-semibold text-[#2B2118]">Nama Pengguna</th>
                        <th class="px-6 py-4 text-left text-sm font-semibold text-[#2B2118]">Email</th>
                        <th class="px-6 py-4 text-left text-sm font-semibold text-[#2B2118]">Role</th>
                        <th class="px-6 py-4 text-center text-sm font-semibold text-[#2B2118]">Status</th>
                        <th class="px-6 py-4 text-center text-sm font-semibold text-[#2B2118]">Aksi</th>
                    </tr>
                </thead>
                <tbody>
                    @forelse ($users as $user)
                        <tr class="border-b border-[#EFE3D5] hover:bg-[#FAF3E0] transition-colors">
                            <td class="px-6 py-4">
                                <p class="text-sm font-semibold text-[#2B2118]">{{ $user->name }}</p>
                            </td>
                            <td class="px-6 py-4">
                                <p class="text-sm text-stone-600">{{ $user->email }}</p>
                            </td>
                            <td class="px-6 py-4">
                                @foreach ($user->roles as $role)
                                    <span class="inline-block bg-[#F2E6D9] text-[#6F4E37] px-3 py-1 rounded-full text-xs font-medium">
                                        {{ ucfirst($role->name) }}
                                    </span>
                                @endforeach
                            </td>
                            <td class="px-6 py-4 text-center">
                                @if($user->is_active)
                                    <span class="inline-block bg-green-100 text-green-700 px-2.5 py-0.5 rounded-full text-xs font-semibold">
                                        Aktif
                                    </span>
                                @else
                                    <span class="inline-block bg-stone-100 text-stone-500 px-2.5 py-0.5 rounded-full text-xs font-semibold">
                                        Nonaktif
                                    </span>
                                @endif
                            </td>
                            <td class="px-6 py-4">
                                <div class="flex justify-center gap-2">
                                    <button @click="editUser(@js($user))"
                                        class="px-3 py-2 bg-[#E8F0F7] text-[#2B5A7D] rounded-lg text-xs font-semibold hover:bg-[#D0E4F2] transition cursor-pointer"
                                        title="Edit">
                                        <x-heroicon-o-pencil class="w-4 h-4" />
                                    </button>
                                    <button @click="deleteUser(@js($user))"
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
                                Belum ada pengguna. Klik "Tambah Pengguna" untuk menambahkan.
                            </td>
                        </tr>
                    @endempty
                </tbody>
            </table>
            {{ $users->links('layouts.pagination') }}
        </div>

        <!-- USER MODAL -->
        <div x-show="showModal" x-transition.opacity style="display:none"
            class="fixed inset-0 z-50 bg-black/50 flex items-center justify-center p-4">

            <div @click.away="showModal=false"
                class="bg-white w-full max-w-2xl rounded-xl shadow-2xl overflow-hidden max-h-[90vh] overflow-y-auto">

                <div class="sticky top-0 bg-linear-to-r from-[#6F4E37] to-[#8B6F47] text-white p-4 flex justify-between items-center">
                    <div>
                        <p class="text-white/70 text-xs font-medium">Informasi Akun</p>
                        <h2 class="text-xl font-bold" x-text="mode == 'edit' ? 'Edit Pengguna' : 'Tambah Pengguna'"></h2>
                    </div>
                    <button @click="showModal=false" class="text-white hover:bg-white/20 rounded-lg p-1 transition">
                        <svg class="w-5 h-5" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M6 18L18 6M6 6l12 12"></path>
                        </svg>
                    </button>
                </div>

                <form @submit.prevent="submit()">
                    <div class="p-6 space-y-4">
                        
                        <div class="grid grid-cols-2 gap-3">
                            <div>
                                <label class="text-xs uppercase tracking-wide text-stone-600 font-semibold block mb-1">Nama Lengkap</label>
                                <input x-model="user.name" type="text" name="name" required
                                    class="w-full px-3 py-2 border border-[#E6D7C8] rounded-lg focus:outline-none focus:border-[#6F4E37] focus:ring-1 focus:ring-[#6F4E37]/20 transition text-sm">
                            </div>
                            <div>
                                <label class="text-xs uppercase tracking-wide text-stone-600 font-semibold block mb-1">Email</label>
                                <input x-model="user.email" type="email" name="email" required
                                    class="w-full px-3 py-2 border border-[#E6D7C8] rounded-lg focus:outline-none focus:border-[#6F4E37] focus:ring-1 focus:ring-[#6F4E37]/20 transition text-sm">
                            </div>
                        </div>

                        <div class="grid grid-cols-2 gap-3">
                            <div>
                                <label class="text-xs uppercase tracking-wide text-stone-600 font-semibold block mb-1">Role Jabatan</label>
                                <select x-model="user.role" name="role" required
                                    class="w-full px-3 py-2 border border-[#E6D7C8] rounded-lg focus:outline-none focus:border-[#6F4E37] focus:ring-1 focus:ring-[#6F4E37]/20 transition text-sm">
                                    <option value="">Pilih Role</option>
                                    <template x-for="role in roles" :key="role.id">
                                        <option :value="role.name" x-text="role.name"></option>
                                    </template>
                                </select>
                            </div>
                            <div>
                                <label class="text-xs uppercase tracking-wide text-stone-600 font-semibold block mb-1">Status Akun</label>
                                <div class="flex items-center h-10 mt-1">
                                    <label class="relative inline-flex items-center cursor-pointer">
                                        <input type="checkbox" x-model="user.is_active" class="sr-only peer">
                                        <div class="w-11 h-6 bg-gray-200 peer-focus:outline-none rounded-full peer peer-checked:after:translate-x-full peer-checked:after:border-white after:content-[''] after:absolute after:top-0.5 after:left-0.5 after:bg-white after:border-gray-300 after:border after:rounded-full after:h-5 after:w-5 after:transition-all peer-checked:bg-[#6F4E37]"></div>
                                        <span class="ml-3 text-sm font-medium text-stone-600" x-text="user.is_active ? 'Aktif bertugas' : 'Dinonaktifkan'"></span>
                                    </label>
                                </div>
                            </div>
                        </div>

                        <div class="border-t border-[#EFE3D5] my-2"></div>

                        <div>
                            <h3 class="text-sm font-semibold text-[#2B2118] mb-1">Kredensial Password</h3>
                            <p class="text-xs text-stone-500 mb-3" x-show="mode == 'edit'">Kosongkan jika tidak ingin mengubah password.</p>
                            
                            <div class="grid grid-cols-2 gap-3">
                                <div>
                                    <label class="text-xs uppercase tracking-wide text-stone-600 font-semibold block mb-1">Password</label>
                                    <input x-model="user.password" type="password" :required="mode == 'create'"
                                        class="w-full px-3 py-2 border border-[#E6D7C8] rounded-lg focus:outline-none focus:border-[#6F4E37] focus:ring-1 focus:ring-[#6F4E37]/20 transition text-sm">
                                </div>
                                <div>
                                    <label class="text-xs uppercase tracking-wide text-stone-600 font-semibold block mb-1">Konfirmasi Password</label>
                                    <input x-model="user.password_confirmation" type="password" :required="mode == 'create'"
                                        class="w-full px-3 py-2 border border-[#E6D7C8] rounded-lg focus:outline-none focus:border-[#6F4E37] focus:ring-1 focus:ring-[#6F4E37]/20 transition text-sm">
                                </div>
                            </div>
                        </div>

                    </div>

                    <div class="sticky bottom-0 bg-[#FAF3E0] border-t border-[#E6D7C8] p-4 flex justify-end gap-2">
                        <button type="button" @click="showModal=false"
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

        <!-- DELETE MODAL -->
        <div x-show="showDelete" x-transition.opacity style="display:none"
            class="fixed inset-0 z-9999 bg-black/60 flex items-center justify-center p-6">

            <div @click.away="showDelete=false"
                class="bg-white w-full max-w-lg rounded-[36px] shadow-[0_30px_80px_rgba(0,0,0,0.18)] overflow-hidden">

                <div class="bg-linear-to-r from-red-500 to-red-600 p-8 text-white text-center">
                    <div class="w-24 h-24 p-5 mx-auto rounded-full bg-white/20 flex items-center justify-center">
                        <x-heroicon-o-trash class="w-12 h-12" />
                    </div>
                    <h2 class="text-3xl font-black mt-5">Hapus Pengguna</h2>
                </div>

                <div class="p-8 text-center">
                    <h3 class="text-2xl font-bold text-[#2B2118] mt-6" x-text="user.name"></h3>
                    <p class="text-stone-500 mt-4 leading-relaxed">
                        Akun ini akan dihapus secara permanen dari sistem CRM. Staf yang bersangkutan tidak akan bisa login kembali.
                    </p>
                </div>

                <div class="border-t border-[#EFE3D5] p-6 flex gap-4">
                    <button @click="showDelete=false"
                        class="flex-1 py-4 rounded-2xl border border-[#DDB892] hover:bg-[#FAF3E0] transition cursor-pointer">
                        Batal
                    </button>
                    <form :action="`{{ url('/users') }}/${user.id}`" method="POST" class="flex-1">
                        @csrf
                        @method('DELETE')
                        <button type="submit"
                            class="w-full py-4 rounded-2xl bg-linear-to-r from-red-500 to-red-600 text-white font-semibold shadow-lg hover:shadow-xl transition cursor-pointer">
                            Ya, Hapus
                        </button>
                    </form>
                </div>
            </div>
        </div>

    </div>
@endsection