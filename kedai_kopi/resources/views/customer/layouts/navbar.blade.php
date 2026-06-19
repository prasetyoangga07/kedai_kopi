<div class="flex items-center justify-between gap-3">

    <div class="flex items-center gap-3">
        <nav class="hidden md:flex items-center gap-2">
            <a href="{{ route('customer.dashboard') }}"
                class="px-4 py-2 rounded-2xl text-sm font-semibold transition {{ request()->is('customer/dashboard') ? 'bg-[#8B5E3C] text-white shadow-sm' : 'bg-white border border-[#E6D7C8] text-[#6F4E37] hover:bg-[#FAF3E0]' }}">
                Dashboard
            </a>
            <a href="{{ route('customer.purchase') }}"
                class="px-4 py-2 rounded-2xl text-sm font-semibold transition {{ request()->is('customer/purchase') ? 'bg-[#8B5E3C] text-white shadow-sm' : 'bg-white border border-[#E6D7C8] text-[#6F4E37] hover:bg-[#FAF3E0]' }}">
                Purchase
            </a>
            <a href="{{ route('customer.products') }}"
                class="px-4 py-2 rounded-2xl text-sm font-semibold transition {{ request()->is('customer/products*') ? 'bg-[#8B5E3C] text-white shadow-sm' : 'bg-white border border-[#E6D7C8] text-[#6F4E37] hover:bg-[#FAF3E0]' }}">
                Produk
            </a>
            <a href="{{ route('customer.transactions') }}"
                class="px-4 py-2 rounded-2xl text-sm font-semibold transition {{ request()->is('customer/transactions') ? 'bg-[#8B5E3C] text-white shadow-sm' : 'bg-white border border-[#E6D7C8] text-[#6F4E37] hover:bg-[#FAF3E0]' }}">
                Riwayat
            </a>
        </nav>

        {{-- Profile mini (icon huruf awal) + dropdown --}}
        @php($initials = strtoupper(substr(auth()->user()->name ?? 'U', 0, 1)))

        <div class="relative inline-block group">
            <button
                type="button"
                class="w-10 h-10 rounded-full bg-[#FAF3E0] border border-[#E6D7C8] flex items-center justify-center text-[#6F4E37] font-bold shadow-sm">
                {{ $initials }}
            </button>

            {{-- Dropdown --}}
            <div
                class="absolute right-0 top-full pt-2 w-44 hidden group-hover:block z-50" x-data>
                <div class="bg-white border border-[#E6D7C8] rounded-2xl shadow-lg overflow-hidden">
                    <a href="{{ route('customer.dashboard') }}"
                        class="flex items-center gap-3 px-4 py-3 text-sm font-semibold text-[#6F4E37] hover:bg-[#FAF3E0]">
                        <x-heroicon-o-user-circle class="w-5 h-5" />
                        Profile
                    </a>

                    <div class="h-px bg-[#E6D7C8] mx-4"></div>

                    <a href="{{ route('customer.dashboard') }}"
                        class="flex items-center gap-3 px-4 py-3 text-sm font-semibold text-[#6F4E37] hover:bg-[#FAF3E0]">
                        <x-heroicon-o-cog-6-tooth class="w-5 h-5" />
                        Setting
                    </a>

                    <div class="h-px bg-[#E6D7C8] mx-4"></div>

                    <form
                        id="logout-form"
                        method="POST"
                        action="{{ route('logout') }}">

                        @csrf

                        <button
                            type="button"
                            onclick="confirmLogout()"
                            class="w-full flex items-center gap-3 text-left px-4 py-3 text-sm font-semibold text-red-600 hover:bg-[#FFE8E8]">

                            <x-heroicon-o-arrow-left-on-rectangle class="w-5 h-5" />

                            Logout

                        </button>

                    </form>
                </div>
            </div>
        </div>
    </div>
</div>