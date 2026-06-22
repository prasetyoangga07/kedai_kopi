@extends('dashboard.layouts.app')

@section('content')
    <div x-data="loyaltyJs">

        <!-- HEADER -->
        <div class="flex justify-between items-center mb-8">
            <div>
                <h1 class="text-4xl font-bold text-[#2B2118]">Manajemen Loyalty</h1>
                <p class="text-[#8B6E54] mt-2">Kelola tingkat loyalitas dan poin pelanggan.</p>
            </div>
            <button @click="createLoyalty()"
                class="bg-linear-to-r from-[#6F4E37] to-[#A67B5B] text-white px-6 py-4 rounded-2xl shadow-xl cursor-pointer">
                + Tambah Level
            </button>
        </div>

        <!-- KPI -->
        <div class="grid md:grid-cols-2 xl:grid-cols-4 gap-6 mb-8">

            <div class="bg-white rounded-[30px] p-6 shadow-xl border border-[#EFE3D5]">
                <div class="flex justify-between items-start">
                    <div>
                        <p class="text-stone-500">Total Level</p>
                        <h2 class="text-5xl font-black text-[#2B2118] mt-3">4</h2>
                        <p class="text-[#A67B5B] text-sm mt-3 font-semibold">Bronze s/d Platinum</p>
                    </div>
                    <div class="w-14 h-14 rounded-2xl bg-[#FAF3E0] flex items-center justify-center">
                        <x-heroicon-o-trophy class="h-7 w-7 text-[#6F4E37]" />
                    </div>
                </div>
            </div>

            <div class="bg-white rounded-[30px] p-6 shadow-xl border border-[#EFE3D5]">
                <div class="flex justify-between items-start">
                    <div>
                        <p class="text-stone-500">Member Aktif</p>
                        <h2 class="text-5xl font-black text-[#2B2118] mt-3">128</h2>
                        <p class="text-green-600 text-sm mt-3 font-semibold">+12 bulan ini</p>
                    </div>
                    <div class="w-14 h-14 rounded-2xl bg-[#FAF3E0] flex items-center justify-center">
                        <x-heroicon-o-users class="h-7 w-7 text-[#6F4E37]" />
                    </div>
                </div>
            </div>

            <div class="bg-white rounded-[30px] p-6 shadow-xl border border-[#EFE3D5]">
                <div class="flex justify-between items-start">
                    <div>
                        <p class="text-stone-500">Poin Tertinggi</p>
                        <h2 class="text-5xl font-black text-[#2B2118] mt-3">5K</h2>
                        <p class="text-[#A67B5B] text-sm mt-3 font-semibold">Batas Platinum</p>
                    </div>
                    <div class="w-14 h-14 rounded-2xl bg-[#FAF3E0] flex items-center justify-center">
                        <x-heroicon-o-star class="h-7 w-7 text-[#6F4E37]" />
                    </div>
                </div>
            </div>

            <div class="bg-white rounded-[30px] p-6 shadow-xl border border-[#EFE3D5]">
                <div class="flex justify-between items-start">
                    <div>
                        <p class="text-stone-500">Level Terpopuler</p>
                        <h2 class="text-3xl font-black text-[#2B2118] mt-3">Silver</h2>
                        <p class="text-green-600 text-sm mt-3 font-semibold">54 member</p>
                    </div>
                    <div class="w-14 h-14 rounded-2xl bg-[#FAF3E0] flex items-center justify-center">
                        <x-heroicon-o-chart-bar class="h-7 w-7 text-[#6F4E37]" />
                    </div>
                </div>
            </div>
        </div>

        <!-- LEVEL CARDS -->
        <div class="grid md:grid-cols-2 xl:grid-cols-4 gap-5 mb-8">

            @php
                $levelStyles = [
                    ['bg' => '#2B2118', 'badge' => '#A67B5B', 'label' => 'Bronze', 'icon' => '🥉', 'members' => 28],
                    ['bg' => '#4A5568', 'badge' => '#718096', 'label' => 'Silver', 'icon' => '🥈', 'members' => 54],
                    ['bg' => '#744210', 'badge' => '#D69E2E', 'label' => 'Gold', 'icon' => '🥇', 'members' => 31],
                    ['bg' => '#1a1a2e', 'badge' => '#7B68EE', 'label' => 'Platinum', 'icon' => '💎', 'members' => 15],
                ];
                $levels = [
                    ['name' => 'Bronze', 'min' => 0, 'max' => 499, 'created_at' => '1 Jan 2024'],
                    ['name' => 'Silver', 'min' => 500, 'max' => 1499, 'created_at' => '1 Jan 2024'],
                    ['name' => 'Gold', 'min' => 1500, 'max' => 2999, 'created_at' => '1 Jan 2024'],
                    ['name' => 'Platinum', 'min' => 3000, 'max' => 9999, 'created_at' => '1 Jan 2024'],
                ];
            @endphp

            @foreach ($levels as $i => $lvl)
                @php $style = $levelStyles[$i]; @endphp
                <div class="relative overflow-hidden rounded-[28px] text-white shadow-xl"
                    style="background: {{ $style['bg'] }}">

                    <!-- dekorasi lingkaran -->
                    <div class="pointer-events-none absolute -top-8 -right-8 w-32 h-32 rounded-full opacity-20"
                        style="background: {{ $style['badge'] }}"></div>
                    <div class="pointer-events-none absolute -bottom-6 -left-6 w-24 h-24 rounded-full opacity-10"
                        style="background: {{ $style['badge'] }}"></div>

                    <div class="relative p-6">
                        <div class="flex items-center justify-between mb-4">
                            <span class="text-3xl">{{ $style['icon'] }}</span>
                            <span class="text-xs font-bold px-2 py-1 rounded-full"
                                style="background: {{ $style['badge'] }}20; border: 1px solid {{ $style['badge'] }}50; color: {{ $style['badge'] }}">
                                {{ $style['members'] }} member
                            </span>
                        </div>

                        <h3 class="text-2xl font-black">{{ $lvl['name'] }}</h3>

                        <div class="mt-4 space-y-1">
                            <div class="flex justify-between text-xs text-white/60">
                                <span>Min Poin</span>
                                <span class="font-bold text-white">{{ number_format($lvl['min']) }}</span>
                            </div>
                            <div class="w-full h-1.5 rounded-full bg-white/10">
                                <div class="h-1.5 rounded-full"
                                    style="background: {{ $style['badge'] }}; width: {{ min(100, ($lvl['max'] / 9999) * 100) }}%">
                                </div>
                            </div>
                            <div class="flex justify-between text-xs text-white/60">
                                <span>Max Poin</span>
                                <span class="font-bold text-white">{{ number_format($lvl['max']) }}</span>
                            </div>
                        </div>

                        <p class="text-xs text-white/40 mt-4">Dibuat {{ $lvl['created_at'] }}</p>
                    </div>
                </div>
            @endforeach
        </div>

        <!-- SEARCH -->
        <div class="bg-white rounded-3xl shadow-xl p-6 mb-8">
            <input x-model="search" type="text" placeholder="Cari level loyalty..."
                class="w-full border border-[#E6D7C8] rounded-2xl p-4">
        </div>

        <!-- TABLE -->
        <div class="bg-white rounded-3xl shadow-xl overflow-hidden border border-[#EFE3D5]">
            <table class="w-full">
                <thead>
                    <tr class="border-b border-[#EFE3D5] bg-[#FAF3E0]">
                        <th class="px-6 py-4 text-left text-sm font-semibold text-[#2B2118]">Level</th>
                        <th class="px-6 py-4 text-left text-sm font-semibold text-[#2B2118]">Rentang Poin</th>
                        <th class="px-6 py-4 text-left text-sm font-semibold text-[#2B2118]">Progress Range</th>
                        <th class="px-6 py-4 text-left text-sm font-semibold text-[#2B2118]">Dibuat</th>
                        <th class="px-6 py-4 text-center text-sm font-semibold text-[#2B2118]">Aksi</th>
                    </tr>
                </thead>
                <tbody>
                    @forelse ($loyalty as $ly)
                        {{-- @php $style = $levelStyles[$i]; @endphp --}}
                        <tr class="border-b border-[#EFE3D5] hover:bg-[#FAF3E0] transition-colors">
                            <td class="px-6 py-4">
                                <div class="flex items-center gap-3">
                                    {{-- <div class="w-9 h-9 rounded-xl flex items-center justify-center text-lg"
                                    style="background: {{ $style['bg'] }}15; border: 1px solid {{ $style['bg'] }}20">
                                    {{ $style['icon'] }}
                                </div> --}}
                                    <div>
                                        <p class="text-sm font-bold text-[#2B2118]">{{ $ly->name }}</p>
                                        <p class="text-xs text-stone-400">{{ $ly->customer_count }} member</p>
                                    </div>
                                </div>
                            </td>
                            <td class="px-6 py-4">
                                <span
                                    class="inline-block bg-[#F2E6D9] text-[#6F4E37] px-3 py-1 rounded-full text-xs font-medium">
                                    {{ number_format($ly->min_points) }} –
                                    {{ $ly->max_points ? number_format($ly->max_points) : '∞' }} pts
                                </span>
                            </td>
                            <td class="px-6 py-4">
                                <div class="flex items-center gap-2 w-40">
                                    <div class="flex-1 h-2 rounded-full bg-[#EFE3D5]">
                                        <div class="h-2 rounded-full"
                                            style="background: {{ $style['badge'] }}; width: {{ min(100, ($ly->max_points / 9999) * 100) }}%">
                                        </div>
                                    </div>
                                    <span class="text-xs text-stone-400 shrink-0">
                                        {{ round(($ly->max_points / 9999) * 100) }}%
                                    </span>
                                </div>
                            </td>
                            <td class="px-6 py-4 text-sm text-stone-500">{{ $ly->created_at->format('l, d F Y') }}</td>
                            <td class="px-6 py-4">
                                <div class="flex justify-center gap-2">
                                    <button @click="editLoyalty(@js($ly))"
                                        class="px-3 py-2 bg-[#E8F0F7] text-[#2B5A7D] rounded-lg text-xs font-semibold hover:bg-[#D0E4F2] transition cursor-pointer"
                                        title="Edit">
                                        <x-heroicon-o-pencil class="w-4 h-4" />
                                    </button>
                                    <button @click="deleteLevel({{ json_encode($lvl) }})"
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
                                Belum ada level loyalty.
                            </td>
                        </tr>
                    @endforelse
                </tbody>
            </table>
            {{-- {{ $levels->links('layouts.pagination') }} --}}
        </div>


        <!-- CREATE / EDIT MODAL -->
        <div x-show="showModal" x-transition.opacity style="display:none"
            class="fixed inset-0 z-50 bg-black/50 flex items-center justify-center p-4">

            <div @click.away="showModal = false"
                class="bg-white w-full max-w-lg rounded-[28px] shadow-2xl overflow-hidden">

                <!-- HEADER -->
                <div class="bg-linear-to-r from-[#6F4E37] to-[#8B6F47] text-white p-5 flex justify-between items-center">
                    <div>
                        <p class="text-white/70 text-xs font-medium">Loyalty Level</p>
                        <h2 class="text-xl font-bold" x-text="isEdit ? 'Edit Level' : 'Tambah Level'"></h2>
                    </div>
                    <button @click="showModal = false"
                        class="text-white hover:bg-white/20 rounded-xl p-1.5 transition cursor-pointer">
                        <svg class="w-5 h-5" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                d="M6 18L18 6M6 6l12 12" />
                        </svg>
                    </button>
                </div>

                <!-- FORM -->
                <form @submit.prevent="submit()">
                    <div class="p-6 space-y-5">

                        <!-- Nama Level -->
                        <div>
                            <label class="text-xs uppercase tracking-wide text-stone-600 font-semibold block mb-1">
                                Nama Level
                            </label>
                            <input x-model="loyalty.name" name="name" placeholder="Contoh: Gold"
                                class="w-full px-4 py-3 border border-[#E6D7C8] rounded-xl focus:outline-none focus:border-[#6F4E37] focus:ring-1 focus:ring-[#6F4E37]/20 transition text-sm">
                            <p class="text-red-500 text-xs mt-1" x-show="errors.name" x-text="errors.name"></p>
                        </div>

                        <!-- Min & Max Points -->
                        <div class="grid grid-cols-2 gap-4">
                            <div>
                                <label class="text-xs uppercase tracking-wide text-stone-600 font-semibold block mb-1">
                                    Min Poin
                                </label>
                                <input x-model="loyalty.min_points" name="min_points" type="number" min="0"
                                    placeholder="0"
                                    class="w-full px-4 py-3 border border-[#E6D7C8] rounded-xl focus:outline-none focus:border-[#6F4E37] focus:ring-1 focus:ring-[#6F4E37]/20 transition text-sm">
                                <p class="text-red-500 text-xs mt-1" x-show="errors.min_points"
                                    x-text="errors.min_points"></p>
                            </div>
                            <div>
                                <label class="text-xs uppercase tracking-wide text-stone-600 font-semibold block mb-1">
                                    Max Poin
                                </label>
                                <input x-model="loyalty.max_points" name="max_points" type="number" min="0"
                                    placeholder="999"
                                    class="w-full px-4 py-3 border border-[#E6D7C8] rounded-xl focus:outline-none focus:border-[#6F4E37] focus:ring-1 focus:ring-[#6F4E37]/20 transition text-sm">
                                <p class="text-red-500 text-xs mt-1" x-show="errors.max_points"
                                    x-text="errors.max_points"></p>
                            </div>
                        </div>

                        <div class="border-t border-[#EFE3D5]"></div>

                        <!-- Warna -->
                        <div>
                            <p class="text-xs uppercase tracking-wide text-stone-600 font-semibold mb-3">Warna Level</p>

                            <div class="grid grid-cols-3 gap-4">

                                <!-- Primary Color -->
                                <div>
                                    <label class="text-xs text-stone-500 font-medium block mb-1.5">Primary</label>
                                    <div
                                        class="flex items-center gap-2 px-3 py-2.5 border border-[#E6D7C8] rounded-xl focus-within:border-[#6F4E37] focus-within:ring-1 focus-within:ring-[#6F4E37]/20 transition">
                                        <input x-model="loyalty.primary_color" name="primary_color" type="color"
                                            class="w-7 h-7 rounded-lg border-0 cursor-pointer bg-transparent p-0 shrink-0"
                                            title="Pilih primary color">
                                        <input x-model="loyalty.primary_color" name="primary_color_hex" type="text"
                                            placeholder="#6F4E37" maxlength="7"
                                            class="flex-1 min-w-0 text-xs font-mono text-stone-600 border-0 outline-none bg-transparent uppercase"
                                            @input="syncColor('primary_color', $event.target.value)">
                                    </div>
                                    <p class="text-red-500 text-xs mt-1" x-show="errors.primary_color"
                                        x-text="errors.primary_color"></p>
                                </div>

                                <!-- Secondary Color -->
                                <div>
                                    <label class="text-xs text-stone-500 font-medium block mb-1.5">Secondary</label>
                                    <div
                                        class="flex items-center gap-2 px-3 py-2.5 border border-[#E6D7C8] rounded-xl focus-within:border-[#6F4E37] focus-within:ring-1 focus-within:ring-[#6F4E37]/20 transition">
                                        <input x-model="loyalty.secondary_color" name="secondary_color" type="color"
                                            class="w-7 h-7 rounded-lg border-0 cursor-pointer bg-transparent p-0 shrink-0"
                                            title="Pilih secondary color">
                                        <input x-model="loyalty.secondary_color" name="secondary_color_hex" type="text"
                                            placeholder="#A67B5B" maxlength="7"
                                            class="flex-1 min-w-0 text-xs font-mono text-stone-600 border-0 outline-none bg-transparent uppercase"
                                            @input="syncColor('secondary_color', $event.target.value)">
                                    </div>
                                    <p class="text-red-500 text-xs mt-1" x-show="errors.secondary_color"
                                        x-text="errors.secondary_color"></p>
                                </div>

                                <!-- Text Color -->
                                <div>
                                    <label class="text-xs text-stone-500 font-medium block mb-1.5">Text</label>
                                    <div
                                        class="flex items-center gap-2 px-3 py-2.5 border border-[#E6D7C8] rounded-xl focus-within:border-[#6F4E37] focus-within:ring-1 focus-within:ring-[#6F4E37]/20 transition">
                                        <input x-model="loyalty.text_color" name="text_color" type="color"
                                            class="w-7 h-7 rounded-lg border-0 cursor-pointer bg-transparent p-0 shrink-0"
                                            title="Pilih text color">
                                        <input x-model="loyalty.text_color" name="text_color_hex" type="text"
                                            placeholder="#FFFFFF" maxlength="7"
                                            class="flex-1 min-w-0 text-xs font-mono text-stone-600 border-0 outline-none bg-transparent uppercase"
                                            @input="syncColor('text_color', $event.target.value)">
                                    </div>
                                    <p class="text-red-500 text-xs mt-1" x-show="errors.text_color"
                                        x-text="errors.text_color"></p>
                                </div>
                            </div>
                        </div>

                        <!-- Preview Card -->
                        <div x-show="loyalty.primary_color">
                            <p class="text-xs uppercase tracking-wide text-stone-600 font-semibold mb-2">Preview</p>
                            <div class="relative overflow-hidden rounded-2xl p-5 transition-all"
                                :style="`background: ${loyalty.primary_color || '#2B2118'}`">

                                <div class="absolute -top-5 -right-5 w-20 h-20 rounded-full opacity-20 transition-all"
                                    :style="`background: ${loyalty.secondary_color || '#A67B5B'}`"></div>

                                <div class="relative flex items-center justify-between">
                                    <div>
                                        <p class="text-xs font-semibold opacity-60 transition-all"
                                            :style="`color: ${loyalty.text_color || '#ffffff'}`">
                                            Loyalty Level
                                        </p>
                                        <p class="text-xl font-black mt-0.5 transition-all"
                                            :style="`color: ${loyalty.text_color || '#ffffff'}`"
                                            x-text="loyalty.name || 'Nama Level'">
                                        </p>
                                    </div>
                                    <div class="w-10 h-10 rounded-xl flex items-center justify-center transition-all"
                                        :style="`background: ${loyalty.secondary_color || '#A67B5B'}30; border: 1px solid ${loyalty.secondary_color || '#A67B5B'}50`">
                                        <span class="text-lg">⭐</span>
                                    </div>
                                </div>

                                <div class="relative mt-4">
                                    <div class="w-full h-1.5 rounded-full opacity-20"
                                        :style="`background: ${loyalty.text_color || '#ffffff'}`"></div>
                                    <div class="absolute top-0 left-0 h-1.5 rounded-full transition-all"
                                        :style="`background: ${loyalty.secondary_color || '#A67B5B'}; width: ${loyalty.max_points ? Math.min(100, (loyalty.max_points / 9999) * 100) : 30}%`">
                                    </div>
                                </div>

                                <div class="relative flex justify-between mt-2">
                                    <p class="text-xs opacity-50 transition-all"
                                        :style="`color: ${loyalty.text_color || '#ffffff'}`"
                                        x-text="`${Number(loyalty.min_points || 0).toLocaleString('id')} pts`">
                                    </p>
                                    <p class="text-xs opacity-50 transition-all"
                                        :style="`color: ${loyalty.text_color || '#ffffff'}`"
                                        x-text="`${Number(loyalty.max_points || 0).toLocaleString('id')} pts`">
                                    </p>
                                </div>
                            </div>
                        </div>

                        <!-- Preview rentang poin -->
                        <div class="bg-[#FAF3E0] border border-[#E6D7C8] rounded-xl px-4 py-3 flex items-center gap-3"
                            x-show="loyalty.min_points !== '' || loyalty.max_points !== ''">
                            <x-heroicon-o-information-circle class="w-5 h-5 text-[#A67B5B] shrink-0" />
                            <p class="text-sm text-[#6F4E37]">
                                Member dengan
                                <span class="font-bold"
                                    x-text="Number(loyalty.min_points || 0).toLocaleString('id')"></span>
                                –
                                <span class="font-bold"
                                    x-text="Number(loyalty.max_points || 0).toLocaleString('id')"></span>
                                poin akan masuk level ini.
                            </p>
                        </div>

                    </div>

                    <!-- FOOTER -->
                    <div class="bg-[#FAF3E0] border-t border-[#E6D7C8] p-4 flex justify-end gap-2">
                        <button type="button" @click="showModal = false"
                            class="px-4 py-2 rounded-xl text-sm font-semibold border border-[#DDB892] text-[#6F4E37] hover:bg-white transition cursor-pointer">
                            Batal
                        </button>
                        <button type="submit"
                            class="px-4 py-2 rounded-xl text-sm font-semibold bg-linear-to-r from-[#6F4E37] to-[#A67B5B] text-white hover:shadow-lg transition cursor-pointer">
                            Simpan
                        </button>
                    </div>
                </form>
            </div>
        </div>

        <!-- DELETE MODAL -->
        <div x-show="showDelete" x-transition.opacity style="display:none"
            class="fixed inset-0 z-50 bg-black/60 flex items-center justify-center p-6">

            <div @click.away="showDelete = false"
                class="bg-white w-full max-w-lg rounded-[36px] shadow-[0_30px_80px_rgba(0,0,0,0.18)] overflow-hidden">

                <div class="bg-linear-to-r from-red-500 to-red-600 p-8 text-white text-center">
                    <div class="w-24 h-24 p-5 mx-auto rounded-full bg-white/20 flex items-center justify-center">
                        <x-heroicon-o-trophy class="w-14 h-14" />
                    </div>
                    <h2 class="text-3xl font-black mt-5">Hapus Level</h2>
                </div>

                <div class="p-8 text-center">
                    <h3 class="text-2xl font-bold text-[#2B2118] mt-6" x-text="loyalty.name"></h3>
                    <p class="text-stone-500 mt-4 leading-relaxed">
                        Level yang dihapus tidak dapat dikembalikan. Member yang berada di level ini
                        perlu dipindahkan secara manual.
                    </p>
                </div>

                <div class="border-t border-[#EFE3D5] p-6 flex gap-4">
                    <button @click="showDelete = false"
                        class="flex-1 py-4 rounded-2xl border border-[#DDB892] hover:bg-[#FAF3E0] transition cursor-pointer">
                        Batal
                    </button>
                    <form :action="`{{ url('/loyalty') }}/${level.id}`" method="POST" class="flex-1">
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

    @push('scripts')
        <script>
            document.addEventListener('alpine:init', () => {
                Alpine.data('loyaltyJs', () => ({
                    search: '',
                    showModal: false,
                    showDelete: false,
                    isEdit: false,
                    errors: {},

                    level: {
                        id: null,
                        name: '',
                        min_points: '',
                        max_points: '',
                    },

                    createLevel() {
                        this.isEdit = false;
                        this.errors = {};
                        this.level = {
                            id: null,
                            name: '',
                            min_points: '',
                            max_points: ''
                        };
                        this.showModal = true;
                    },

                    editLevel(data) {
                        this.isEdit = true;
                        this.errors = {};
                        this.level = {
                            ...data
                        };
                        this.showModal = true;
                    },

                    deleteLevel(data) {
                        this.level = data;
                        this.showDelete = true;
                    },

                    async submitLevel() {
                        const url = this.isEdit ? `/loyalty/${this.level.id}` : `/loyalty`;
                        const method = this.isEdit ? 'PUT' : 'POST';

                        const res = await fetch(url, {
                            method,
                            headers: {
                                'Content-Type': 'application/json',
                                'X-CSRF-TOKEN': document.querySelector(
                                    'meta[name="csrf-token"]').content,
                            },
                            body: JSON.stringify(this.level),
                        });

                        const data = await res.json();

                        if (!res.ok) {
                            this.errors = data.errors ?? {};
                            return;
                        }

                        window.location.reload();
                    },
                }));
            });
        </script>
    @endpush
@endsection
