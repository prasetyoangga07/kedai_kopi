<aside
     :class="sidebarOpen ? 'w-64' : 'w-20'"
    class="fixed left-0 top-0 h-screen bg-[#2B2118] text-white shadow-2xl transition-all duration-300 flex flex-col z-50">


<div class="p-5 border-b border-stone-800">

    <div
    :class="sidebarOpen ? 'justify-start' : 'justify-center'"
    class="flex items-center gap-3">

        <div
            class="w-12 h-12 rounded-xl bg-[#FAF3E0] border border-[#DDB892] overflow-hidden shadow-lg shrink-0">

            <img
                src="{{ asset('img/kopin2.png') }}"
                alt="KOPIN"
                class="w-full h-full object-cover">

        </div>

        <div x-show="sidebarOpen" x-transition>
            <h2 class="font-bold text-xl">
                KOPIN
            </h2>

            <p class="text-xs text-stone-400">
                Smart Analytics
            </p>
        </div>

    </div>

</div>

<div
    x-show="sidebarOpen"
    x-transition
    class="p-4">

    <div
        class="bg-linear-to-r from-[#A67B5B] to-[#6F4E37] rounded-2xl p-4 text-black">

        <h3 class="font-bold text-white">
            Owner Dashboard
        </h3>

        <p class="text-sm mt-2 text-white">
            Revenue naik 18% bulan ini
        </p>

    </div>

</div>

<nav class="flex-1 p-3 space-y-2">

    <a href="/dashboard"
        :class="sidebarOpen ? 'justify-start px-4' : 'justify-center px-0'"
        class="flex items-center h-14 rounded-2xl transition-all duration-300
        {{ request()->is('dashboard') ? 'bg-[#A67B5B] text-white shadow-lg' : 'hover:bg-[#DDB892]/20' }}">

            <span class="shrink-0">
                <x-heroicon-o-chart-bar class="w-6 h-6"/>
            </span>

            <span
                x-show="sidebarOpen"
                x-transition
                class="ml-3">

                Dashboard

            </span>

    </a>

    <a href="/customers"
   :class="sidebarOpen ? 'justify-start px-4 gap-3' : 'justify-center'"
   class="flex items-center h-14 rounded-2xl transition-all duration-300
   {{ request()->is('customers') ? 'bg-[#A67B5B] text-white shadow-lg' : 'hover:bg-[#DDB892]/20' }}">

    <x-heroicon-o-users class="w-6 h-6"/>

    <span x-show="sidebarOpen">Pelanggan</span>
</a>

<a href="/products"
   :class="sidebarOpen ? 'justify-start px-4 gap-3' : 'justify-center'"
   class="flex items-center h-14 rounded-2xl transition-all duration-300
   {{ request()->is('products') ? 'bg-[#A67B5B] text-white shadow-lg' : 'hover:bg-[#DDB892]/20' }}">

    <x-heroicon-o-inbox class="w-6 h-6"/>

    <span x-show="sidebarOpen">Produk</span>
</a>

<a href="/campaigns"
   :class="sidebarOpen ? 'justify-start px-4 gap-3' : 'justify-center'"
   class="flex items-center h-14 rounded-2xl transition-all duration-300
   {{ request()->is('campaigns') ? 'bg-[#A67B5B] text-white shadow-lg' : 'hover:bg-[#DDB892]/20' }}">

    <x-heroicon-o-megaphone class="w-6 h-6"/>

    <span x-show="sidebarOpen">Campaign</span>
</a>

<a href={{ route('apriori.index') }}
   :class="sidebarOpen ? 'justify-start px-4 gap-3' : 'justify-center'"
   class="flex items-center h-14 rounded-2xl transition-all duration-300
   {{ request()->is('apriori') ? 'bg-[#A67B5B] text-white shadow-lg' : 'hover:bg-[#DDB892]/20' }}">

   <x-heroicon-o-cube-transparent class="w-7 h-7"/>

    <span x-show="sidebarOpen">Apriori</span>
</a>

<a href="/reports"
   :class="sidebarOpen ? 'justify-start px-4 gap-3' : 'justify-center'"
   class="flex items-center h-14 rounded-2xl transition-all duration-300
   {{ request()->is('reports') ? 'bg-[#A67B5B] text-white shadow-lg' : 'hover:bg-[#DDB892]/20' }}">

    <x-heroicon-o-clipboard-document-list class="w-7 h-7"/>

    <span x-show="sidebarOpen">Laporan</span>
</a>

</nav>

<div class="p-4 border-t border-stone-800">

    <div
    :class="sidebarOpen ? 'justify-start' : 'justify-center'"
    class="flex items-center mb-4">

        <div
            class="w-10 h-10 rounded-full bg-[#A67B5B] flex items-center justify-center font-bold shrink-0">
            A
        </div>

        <div x-show="sidebarOpen" class="ml-3">

            <h4 class="font-semibold">
                Admin
            </h4>

            <p class="text-xs text-stone-400">
                administrator
            </p>

        </div>

    </div>

    <a
        href="/login"
        :class="sidebarOpen
            ? 'w-full h-12 px-4'
            : 'w-12 h-12 mx-auto'"
        class="bg-[#8B5E3C] hover:bg-[#6F4E37] rounded-2xl text-white transition-all duration-300 flex items-center justify-center">

        <svg xmlns="http://www.w3.org/2000/svg"
            class="w-5 h-5 shrink-0"
            fill="none"
            viewBox="0 0 24 24"
            stroke="currentColor">

            <path stroke-linecap="round"
                stroke-linejoin="round"
                stroke-width="2"
                d="M17 16l4-4m0 0l-4-4m4 4H7"/>

            <path stroke-linecap="round"
                stroke-linejoin="round"
                stroke-width="2"
                d="M3 21h10a2 2 0 002-2V5a2 2 0 00-2-2H3"/>

        </svg>

        <span
            x-show="sidebarOpen"
            class="ml-2 font-medium">

            Logout

        </span>

    </a>

</div>


</aside>
