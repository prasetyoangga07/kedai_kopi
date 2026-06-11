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
        class="bg-gradient-to-r from-[#A67B5B] to-[#6F4E37] rounded-2xl p-4 text-black">

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
                <svg xmlns="http://www.w3.org/2000/svg"
                    class="w-6 h-6"
                    fill="none"
                    viewBox="0 0 24 24"
                    stroke="currentColor"
                    stroke-width="2">
                    <path stroke-linecap="round"
                        stroke-linejoin="round"
                        d="M3 3v18h18" />
                    <path stroke-linecap="round"
                        stroke-linejoin="round"
                        d="M7 14l4-4 3 3 5-7" />
                </svg>
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

    <svg xmlns="http://www.w3.org/2000/svg"
         class="w-6 h-6 shrink-0"
         fill="none"
         viewBox="0 0 24 24"
         stroke="currentColor">
        <path stroke-linecap="round"
              stroke-linejoin="round"
              stroke-width="2"
              d="M17 20h5V18a4 4 0 00-4-4h-1m-4 6H4v-2a4 4 0 014-4h5a4 4 0 014 4v2z"/>
        <circle cx="9" cy="7" r="4" stroke-width="2"/>
    </svg>

    <span x-show="sidebarOpen">Pelanggan</span>
</a>

<a href="/products"
   :class="sidebarOpen ? 'justify-start px-4 gap-3' : 'justify-center'"
   class="flex items-center h-14 rounded-2xl transition-all duration-300
   {{ request()->is('products') ? 'bg-[#A67B5B] text-white shadow-lg' : 'hover:bg-[#DDB892]/20' }}">

    <svg xmlns="http://www.w3.org/2000/svg"
         class="w-6 h-6 shrink-0"
         fill="none"
         viewBox="0 0 24 24"
         stroke="currentColor">
        <path stroke-linecap="round"
              stroke-linejoin="round"
              stroke-width="2"
              d="M18 8h1a3 3 0 010 6h-1M6 4h6a4 4 0 014 4v8a4 4 0 01-4 4H6a4 4 0 01-4-4V8a4 4 0 014-4z"/>
    </svg>

    <span x-show="sidebarOpen">Produk</span>
</a>

<a href="/campaigns"
   :class="sidebarOpen ? 'justify-start px-4 gap-3' : 'justify-center'"
   class="flex items-center h-14 rounded-2xl transition-all duration-300
   {{ request()->is('campaigns') ? 'bg-[#A67B5B] text-white shadow-lg' : 'hover:bg-[#DDB892]/20' }}">

    <svg xmlns="http://www.w3.org/2000/svg"
         class="w-6 h-6 shrink-0"
         fill="none"
         viewBox="0 0 24 24"
         stroke="currentColor">
        <path stroke-linecap="round"
              stroke-linejoin="round"
              stroke-width="2"
              d="M3 11l18-5v12l-18-5v-2z"/>
    </svg>

    <span x-show="sidebarOpen">Campaign</span>
</a>

<a href="/apriori"
   :class="sidebarOpen ? 'justify-start px-4 gap-3' : 'justify-center'"
   class="flex items-center h-14 rounded-2xl transition-all duration-300
   {{ request()->is('apriori') ? 'bg-[#A67B5B] text-white shadow-lg' : 'hover:bg-[#DDB892]/20' }}">

    <svg xmlns="http://www.w3.org/2000/svg"
         class="w-6 h-6 shrink-0"
         fill="none"
         viewBox="0 0 24 24"
         stroke="currentColor">
        <circle cx="6" cy="12" r="2"/>
        <circle cx="18" cy="6" r="2"/>
        <circle cx="18" cy="18" r="2"/>
        <path stroke-width="2"
              stroke-linecap="round"
              d="M8 12h8M16 8l2 2M16 16l2-2"/>
    </svg>

    <span x-show="sidebarOpen">Apriori</span>
</a>

<a href="/reports"
   :class="sidebarOpen ? 'justify-start px-4 gap-3' : 'justify-center'"
   class="flex items-center h-14 rounded-2xl transition-all duration-300
   {{ request()->is('reports') ? 'bg-[#A67B5B] text-white shadow-lg' : 'hover:bg-[#DDB892]/20' }}">

    <svg xmlns="http://www.w3.org/2000/svg"
         class="w-6 h-6 shrink-0"
         fill="none"
         viewBox="0 0 24 24"
         stroke="currentColor">
        <path stroke-linecap="round"
              stroke-linejoin="round"
              stroke-width="2"
              d="M9 12h6m-6 4h6m2 5H7a2 2 0 01-2-2V5a2 2 0 012-2h5l5 5v11a2 2 0 01-2 2z"/>
    </svg>

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
