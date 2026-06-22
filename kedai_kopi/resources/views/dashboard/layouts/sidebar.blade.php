<aside :class="sidebarOpen ? 'w-64' : 'w-20'"
    class="fixed left-0 top-0 h-screen bg-[#2B2118] text-white shadow-2xl transition-all duration-300 flex flex-col z-50">

    {{-- Header / Logo --}}
    <div class="p-5 border-b border-stone-800 shrink-0">
        <div :class="sidebarOpen ? 'justify-start' : 'justify-center'" class="flex items-center gap-3">
            <div class="w-12 h-12 rounded-xl bg-[#FAF3E0] border border-[#DDB892] overflow-hidden shadow-lg shrink-0">
                <img src="{{ asset('img/kopin2.png') }}" alt="KOPIN" class="w-full h-full object-cover">
            </div>

            <div x-show="sidebarOpen" x-transition>
                <h2 class="font-bold text-xl">KOPIN</h2>
                <p class="text-xs text-stone-400">Smart Analytics</p>
            </div>
        </div>
    </div>

    {{-- Navigation --}}
    <nav class="flex-1 p-3 space-y-1 overflow-y-auto">

        {{-- Dashboard --}}
        <a href="{{ route('dashboard.index') }}"
            :class="sidebarOpen ? 'justify-start px-4 gap-3' : 'justify-center'"
            class="flex items-center h-12 rounded-2xl transition-all duration-200
            {{ request()->is('dashboard') ? 'bg-[#A67B5B] text-white shadow-lg' : 'hover:bg-[#DDB892]/20' }}">
            <x-heroicon-o-chart-bar class="w-6 h-6 shrink-0" />
            <span x-show="sidebarOpen" x-transition class="text-sm font-medium">Dashboard</span>
        </a>

        {{-- Pelanggan --}}
        <a href="{{ route('customers.index') }}"
            :class="sidebarOpen ? 'justify-start px-4 gap-3' : 'justify-center'"
            class="flex items-center h-12 rounded-2xl transition-all duration-200
            {{ request()->is('customers') ? 'bg-[#A67B5B] text-white shadow-lg' : 'hover:bg-[#DDB892]/20' }}">
            <x-heroicon-o-users class="w-6 h-6 shrink-0" />
            <span x-show="sidebarOpen" x-transition class="text-sm font-medium">Pelanggan</span>
        </a>

        {{-- Divider --}}
        <div x-show="sidebarOpen" class="pt-2">
            <div class="border-t border-stone-800"></div>
        </div>

        {{-- MASTER DATA GROUP --}}
        <div x-show="sidebarOpen" x-transition>
            <button @click="menu.master = !menu.master"
                class="flex items-center w-full px-3 py-2 rounded-xl text-stone-400 hover:text-stone-200 transition-colors duration-200 cursor-pointer">
                <span class="flex-1 text-left text-xs font-semibold uppercase tracking-wider">Master Data</span>
                <x-heroicon-o-chevron-right
                    class="w-4 h-4 transition-transform duration-200"
                    ::class="{ 'rotate-90': menu.master }" />
            </button>

            <div x-show="menu.master" x-transition class="pl-3 space-y-1 mt-1">
                <a href="{{ route('products.index') }}"
                    class="flex items-center h-11 px-4 gap-3 rounded-2xl transition-all duration-200
                    {{ request()->is('products') ? 'bg-[#A67B5B] text-white shadow-lg' : 'hover:bg-[#DDB892]/20' }}">
                    <x-heroicon-o-inbox class="w-5 h-5 shrink-0" />
                    <span class="text-sm">Produk</span>
                </a>

                <a href="{{ route('campaigns.index') }}"
                    class="flex items-center h-11 px-4 gap-3 rounded-2xl transition-all duration-200
                    {{ request()->is('campaigns') ? 'bg-[#A67B5B] text-white shadow-lg' : 'hover:bg-[#DDB892]/20' }}">
                    <x-heroicon-o-megaphone class="w-5 h-5 shrink-0" />
                    <span class="text-sm">Campaign</span>
                </a>

                <a href="{{ route('loyalty.index') }}"
                    class="flex items-center h-11 px-4 gap-3 rounded-2xl transition-all duration-200
                    {{ request()->is('loyalty') ? 'bg-[#A67B5B] text-white shadow-lg' : 'hover:bg-[#DDB892]/20' }}">
                    <x-heroicon-o-trophy class="w-5 h-5 shrink-0" />
                    <span class="text-sm">Loyalty Level</span>
                </a>
            </div>
        </div>

        {{-- REPORT GROUP --}}
        @can(['apriori.view', 'report.view'])
            <div x-show="sidebarOpen" x-transition>
                <button @click="menu.report = !menu.report"
                    class="flex items-center w-full px-3 py-2 rounded-xl text-stone-400 hover:text-stone-200 transition-colors duration-200 cursor-pointer">
                    <span class="flex-1 text-left text-xs font-semibold uppercase tracking-wider">Report</span>
                    <x-heroicon-o-chevron-right
                        class="w-4 h-4 transition-transform duration-200"
                        ::class="{ 'rotate-90': menu.report }" />
                </button>

                <div x-show="menu.report" x-transition class="pl-3 space-y-1 mt-1">
                    <a href="{{ route('apriori.index') }}"
                        class="flex items-center h-11 px-4 gap-3 rounded-2xl transition-all duration-200
                        {{ request()->is('apriori') ? 'bg-[#A67B5B] text-white shadow-lg' : 'hover:bg-[#DDB892]/20' }}">
                        <x-heroicon-o-cube-transparent class="w-5 h-5 shrink-0" />
                        <span class="text-sm">Apriori</span>
                    </a>

                    <a href="{{ route('reports.index') }}"
                        class="flex items-center h-11 px-4 gap-3 rounded-2xl transition-all duration-200
                        {{ request()->is('reports') ? 'bg-[#A67B5B] text-white shadow-lg' : 'hover:bg-[#DDB892]/20' }}">
                        <x-heroicon-o-clipboard-document-list class="w-5 h-5 shrink-0" />
                        <span class="text-sm">Laporan</span>
                    </a>
                </div>
            </div>
        @endcan

        {{-- CREDENTIAL GROUP --}}
        @role('super admin')
            <div x-show="sidebarOpen" x-transition>
                <button @click="menu.credential = !menu.credential"
                    class="flex items-center w-full px-3 py-2 rounded-xl text-stone-400 hover:text-stone-200 transition-colors duration-200 cursor-pointer">
                    <span class="flex-1 text-left text-xs font-semibold uppercase tracking-wider">Credential</span>
                    <x-heroicon-o-chevron-right
                        class="w-4 h-4 transition-transform duration-200"
                        ::class="{ 'rotate-90': menu.credential }" />
                </button>

                <div x-show="menu.credential" x-transition class="pl-3 space-y-1 mt-1">
                    <a href="{{ route('users.index') }}"
                        class="flex items-center h-11 px-4 gap-3 rounded-2xl transition-all duration-200
                        {{ request()->is('users') ? 'bg-[#A67B5B] text-white shadow-lg' : 'hover:bg-[#DDB892]/20' }}">
                        <x-heroicon-o-user-circle class="w-5 h-5 shrink-0" />
                        <span class="text-sm">User</span>
                    </a>

                    <a href="{{ route('roles.index') }}"
                        class="flex items-center h-11 px-4 gap-3 rounded-2xl transition-all duration-200
                        {{ request()->is('roles') ? 'bg-[#A67B5B] text-white shadow-lg' : 'hover:bg-[#DDB892]/20' }}">
                        <x-heroicon-o-shield-check class="w-5 h-5 shrink-0" />
                        <span class="text-sm">Roles</span>
                    </a>
                </div>
            </div>
        @endrole

    </nav>

    {{-- Footer / User --}}
    <div class="p-4 border-t border-stone-800 shrink-0">
        <div :class="sidebarOpen ? 'justify-start' : 'justify-center'" class="flex items-center mb-3">
            <div class="w-9 h-9 rounded-full bg-[#A67B5B] flex items-center justify-center font-bold text-sm shrink-0">
                A
            </div>
            <div x-show="sidebarOpen" x-transition class="ml-3">
                <h4 class="font-semibold text-sm">Admin</h4>
                <p class="text-xs text-stone-400">administrator</p>
            </div>
        </div>

        <form id="logout-form" action="{{ route('logout') }}" method="POST">
            @csrf
            <button type="button" @click.prevent="confirmLogout"
                :class="sidebarOpen ? 'w-full px-4 gap-2' : 'w-10 mx-auto'"
                class="bg-[#8B5E3C] hover:bg-[#6F4E37] h-10 rounded-2xl text-white transition-all duration-200 flex items-center justify-center cursor-pointer">
                <x-heroicon-o-arrow-left-on-rectangle class="w-5 h-5" />
                <span x-show="sidebarOpen" x-transition class="text-sm font-medium">Logout</span>
            </button>
        </form>
    </div>

</aside>