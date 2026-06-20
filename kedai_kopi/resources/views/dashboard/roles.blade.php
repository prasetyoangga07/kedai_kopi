@extends('layouts.app')

@section('content')
    <div x-data="rolesJs">

        <!-- HEADER -->
        <div class="flex justify-between items-center mb-8">
            <div>
                <h1 class="text-4xl font-bold text-[#2B2118]">
                    Manajemen Roles
                </h1>
                <p class="text-[#8B6E54] mt-2">
                    Kelola hak akses dan peran pengguna sistem.
                </p>
            </div>

            <button @click="createRole()"
                class="bg-linear-to-r from-[#6F4E37] to-[#A67B5B] text-white px-6 py-4 rounded-2xl shadow-xl cursor-pointer">
                + Tambah Role
            </button>
        </div>

        <!-- KPI -->
        <div class="grid md:grid-cols-2 xl:grid-cols-4 gap-6 mb-8">

            <!-- Total Roles -->
            <div class="bg-white rounded-[30px] p-6 shadow-xl border border-[#EFE3D5]">
                <div class="flex justify-between items-start">
                    <div>
                        <p class="text-stone-500">Total Roles</p>
                        <h2 class="text-5xl font-black text-[#2B2118] mt-3">{{ $totalRoles }}</h2>
                        <p class="text-green-600 text-sm mt-3 font-semibold">Terdaftar di sistem</p>
                    </div>
                    <div class="w-14 h-14 rounded-2xl bg-[#FAF3E0] flex items-center justify-center">
                        <x-heroicon-o-shield-check class="h-7 w-7 text-[#6F4E37]" />
                    </div>
                </div>
            </div>

            <!-- Role Aktif -->
            <div class="bg-white rounded-[30px] p-6 shadow-xl border border-[#EFE3D5]">
                <div class="flex justify-between items-start">
                    <div>
                        <p class="text-stone-500">Role Aktif</p>
                        <h2 class="text-5xl font-black text-[#2B2118] mt-3">{{ $activeRoles }}</h2>
                        <p class="text-green-600 text-sm mt-3 font-semibold">Sedang digunakan</p>
                    </div>
                    <div class="w-14 h-14 rounded-2xl bg-[#FAF3E0] flex items-center justify-center">
                        <x-heroicon-o-check-circle class="h-7 w-7 text-[#6F4E37]" />
                    </div>
                </div>
            </div>

            <!-- Total Permissions -->
            <div class="bg-white rounded-[30px] p-6 shadow-xl border border-[#EFE3D5]">
                <div class="flex justify-between items-start">
                    <div>
                        <p class="text-stone-500">Total Permissions</p>
                        <h2 class="text-5xl font-black text-[#2B2118] mt-3">{{ $totalPermissions }}</h2>
                        <p class="text-[#A67B5B] text-sm mt-3 font-semibold">Hak akses tersedia</p>
                    </div>
                    <div class="w-14 h-14 rounded-2xl bg-[#FAF3E0] flex items-center justify-center">
                        <x-heroicon-o-key class="h-7 w-7 text-[#6F4E37]" />
                    </div>
                </div>
            </div>

            <!-- Total User per Role -->
            <div class="bg-white rounded-[30px] p-6 shadow-xl border border-[#EFE3D5]">
                <div class="flex justify-between items-start">
                    <div>
                        <p class="text-stone-500">Total Pengguna</p>
                        <h2 class="text-5xl font-black text-[#2B2118] mt-3">{{ $totalUsers }}</h2>
                        <p class="text-[#A67B5B] text-sm mt-3 font-semibold">Memiliki role aktif</p>
                    </div>
                    <div class="w-14 h-14 rounded-2xl bg-[#FAF3E0] flex items-center justify-center">
                        <x-heroicon-o-users class="h-7 w-7 text-[#6F4E37]" />
                    </div>
                </div>
            </div>

        </div>

        <!-- SEARCH -->
        <div class="bg-white rounded-3xl shadow-xl p-6 mb-8">
            <input x-model="search" type="text" placeholder="Cari role..."
                class="w-full border border-[#E6D7C8] rounded-2xl p-4">
        </div>

        <!-- ROLES TABLE -->
        <div class="bg-white rounded-3xl shadow-xl overflow-hidden border border-[#EFE3D5]">
            <table class="w-full">
                <thead>
                    <tr class="border-b border-[#EFE3D5] bg-[#FAF3E0]">
                        <th class="px-6 py-4 text-left text-sm font-semibold text-[#2B2118]">Nama Role</th>
                        <th class="px-6 py-4 text-left text-sm font-semibold text-[#2B2118]">Permissions</th>
                        <th class="px-6 py-4 text-left text-sm font-semibold text-[#2B2118]">Jumlah User</th>
                        <th class="px-6 py-4 text-center text-sm font-semibold text-[#2B2118]">Aksi</th>
                    </tr>
                </thead>
                <tbody>
                    @forelse ($roles as $role)
                        <tr class="border-b border-[#EFE3D5] hover:bg-[#FAF3E0] transition-colors">
                            <td class="px-6 py-4">
                                <p class="text-sm font-semibold text-[#2B2118]">{{ $role->name }}</p>
                                <p class="text-xs text-stone-400 mt-0.5">{{ $role->guard_name }}</p>
                            </td>
                            <td class="px-6 py-4">
                                <div class="flex flex-wrap gap-1">
                                    @foreach ($role->permissions->take(3) as $permission)
                                        <span class="inline-block bg-[#F2E6D9] text-[#6F4E37] px-2 py-0.5 rounded-full text-xs font-medium">
                                            {{ $permission->name }}
                                        </span>
                                    @endforeach
                                    @if ($role->permissions->count() > 3)
                                        <span class="inline-block bg-stone-100 text-stone-500 px-2 py-0.5 rounded-full text-xs font-medium">
                                            +{{ $role->permissions->count() - 3 }} lainnya
                                        </span>
                                    @endif
                                </div>
                            </td>
                            <td class="px-6 py-4">
                                <span class="text-sm font-semibold text-[#2B2118]">{{ $role->users_count }}</span>
                                <span class="text-xs text-stone-400 ml-1">pengguna</span>
                            </td>
                            <td class="px-6 py-4">
                                <div class="flex justify-center gap-2">
                                    <button @click="editRole(@js($role))"
                                        class="px-3 py-2 bg-[#E8F0F7] text-[#2B5A7D] rounded-lg text-xs font-semibold hover:bg-[#D0E4F2] transition cursor-pointer"
                                        title="Edit">
                                        <x-heroicon-o-pencil class="w-4 h-4" />
                                    </button>
                                    <button @click="deleteRole(@js($role))"
                                        class="px-3 py-2 bg-[#FFE8E8] text-red-600 rounded-lg text-xs font-semibold hover:bg-[#FFD0D0] transition cursor-pointer"
                                        title="Hapus">
                                        <x-heroicon-o-trash class="w-4 h-4" />
                                    </button>
                                </div>
                            </td>
                        </tr>
                    @empty
                        <tr>
                            <td colspan="4" class="px-6 py-8 text-center text-stone-500">
                                Belum ada role. Klik "Tambah Role" untuk menambahkan.
                            </td>
                        </tr>
                    @endforelse
                </tbody>
            </table>
            {{ $roles->links('layouts.pagination') }}
        </div>

        <!-- ROLE MODAL (Create / Edit) -->
        <div x-show="showModal" x-transition.opacity style="display:none"
            class="fixed inset-0 z-50 bg-black/50 flex items-center justify-center p-4">

            <div @click.away="showModal = false"
                class="bg-white w-full max-w-2xl rounded-xl shadow-2xl overflow-hidden max-h-[90vh] overflow-y-auto">

                <!-- HEADER -->
                <div class="sticky top-0 bg-linear-to-r from-[#6F4E37] to-[#8B6F47] text-white p-4 flex justify-between items-center">
                    <div>
                        <p class="text-white/70 text-xs font-medium">Hak Akses</p>
                        <h2 class="text-xl font-bold" x-text="isEdit ? 'Edit Role' : 'Tambah Role'"></h2>
                    </div>
                    <button @click="showModal = false" class="text-white hover:bg-white/20 rounded-lg p-1 transition">
                        <svg class="w-5 h-5" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M6 18L18 6M6 6l12 12" />
                        </svg>
                    </button>
                </div>

                <!-- FORM -->
                <form @submit.prevent="submit()">
                    <div class="p-6 space-y-4">

                        <!-- Nama Role & Guard -->
                        <div class="grid grid-cols-2 gap-3">
                            <div>
                                <label class="text-xs uppercase tracking-wide text-stone-600 font-semibold block mb-1">
                                    Nama Role
                                </label>
                                <input x-model="role.name" name="name" placeholder="Contoh: admin"
                                    class="w-full px-3 py-2 border border-[#E6D7C8] rounded-lg focus:outline-none focus:border-[#6F4E37] focus:ring-1 focus:ring-[#6F4E37]/20 transition text-sm">
                                <p class="text-red-500 text-xs mt-1" x-show="errors.name" x-text="errors.name"></p>
                            </div>
                            <div>
                                <label class="text-xs uppercase tracking-wide text-stone-600 font-semibold block mb-1">
                                    Guard
                                </label>
                                <select x-model="role.guard_name" name="guard_name"
                                    class="w-full px-3 py-2 border border-[#E6D7C8] rounded-lg focus:outline-none focus:border-[#6F4E37] focus:ring-1 focus:ring-[#6F4E37]/20 transition text-sm">
                                    <option value="web">web</option>
                                    <option value="api">api</option>
                                </select>
                            </div>
                        </div>

                        <!-- Divider -->
                        <div class="border-t border-[#EFE3D5] my-2"></div>

                        <!-- Permissions Section -->
                        <div>
                            <h3 class="text-sm font-semibold text-[#2B2118] mb-3 flex items-center gap-2">
                                <x-heroicon-o-key class="w-4 h-4" />
                                Permissions
                            </h3>

                            <div class="bg-[#FAF3E0] rounded-lg border border-[#E6D7C8] p-4">
                                @foreach ($permissions->groupBy(fn($p) => explode('.', $p->name)[0]) as $group => $groupPermissions)
                                    <div class="mb-4 last:mb-0">
                                        <p class="text-xs font-bold uppercase tracking-wider text-[#6F4E37] mb-2">
                                            {{ ucfirst($group) }}
                                        </p>
                                        <div class="grid grid-cols-2 gap-2">
                                            @foreach ($groupPermissions as $permission)
                                                <label class="flex items-center gap-2 cursor-pointer group">
                                                    <input type="checkbox"
                                                        name="permissions[]"
                                                        value="{{ $permission->id }}"
                                                        x-model="role.permissions"
                                                        class="w-4 h-4 rounded cursor-pointer accent-[#6F4E37]">
                                                    <span class="text-sm text-stone-700 group-hover:text-[#6F4E37] transition">
                                                        {{ $permission->name }}
                                                    </span>
                                                </label>
                                            @endforeach
                                        </div>
                                    </div>

                                    {{-- divider antar group --}}
                                    @if (!$loop->last)
                                        <div class="border-t border-[#E6D7C8] my-3"></div>
                                    @endif
                                @endforeach
                            </div>

                            <p class="text-red-500 text-xs mt-1" x-show="errors.permissions" x-text="errors.permissions"></p>
                        </div>

                    </div>

                    <!-- FOOTER -->
                    <div class="sticky bottom-0 bg-[#FAF3E0] border-t border-[#E6D7C8] p-4 flex justify-end gap-2">
                        <button type="button" @click="showModal = false"
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


        <!-- DELETE ROLE MODAL -->
        <div x-show="showDelete" x-transition.opacity style="display:none"
            class="fixed inset-0 z-50 bg-black/60 flex items-center justify-center p-6">

            <div @click.away="showDelete = false"
                class="bg-white w-full max-w-lg rounded-[36px] shadow-[0_30px_80px_rgba(0,0,0,0.18)] overflow-hidden">

                <!-- HEADER -->
                <div class="bg-linear-to-r from-red-500 to-red-600 p-8 text-white text-center">
                    <div class="w-24 h-24 p-5 mx-auto rounded-full bg-white/20 flex items-center justify-center">
                        <x-heroicon-o-shield-exclamation class="w-14 h-14" />
                    </div>
                    <h2 class="text-3xl font-black mt-5">Hapus Role</h2>
                </div>

                <!-- BODY -->
                <div class="p-8 text-center">
                    <h3 class="text-2xl font-bold text-[#2B2118] mt-6" x-text="role.name"></h3>
                    <p class="text-stone-500 mt-4 leading-relaxed">
                        Role yang dihapus tidak dapat dikembalikan.
                        Pengguna dengan role ini akan kehilangan hak aksesnya.
                    </p>
                </div>

                <!-- FOOTER -->
                <div class="border-t border-[#EFE3D5] p-6 flex gap-4">
                    <button @click="showDelete = false"
                        class="flex-1 py-4 rounded-2xl border border-[#DDB892] hover:bg-[#FAF3E0] transition cursor-pointer">
                        Batal
                    </button>
                    <form :action="`{{ url('/roles') }}/${role.id}`" method="POST" class="flex-1">
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