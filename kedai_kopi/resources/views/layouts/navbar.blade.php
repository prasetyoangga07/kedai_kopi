<div x-data="{ scrolled: false }" @scroll.window="scrolled = window.pageYOffset > 50"
    :class="scrolled
        ?
        'bg-[#120C07]/95 backdrop-blur-xl shadow-2xl' :
        'bg-transparent'"
    class="fixed top-0 left-0 right-0 z-50 transition-all duration-500">

    <div class="max-w-7xl mx-auto px-8">
        <div class="h-24 flex justify-between items-center">
            <a href="{{ route('landing') }}">
                <div class="flex items-center gap-4">
                    <img src="{{ asset('img/kopin2.png') }}" class="h-14">
                    <div>
                        <h1 class="text-3xl font-black text-white">
                            KOPIN
                        </h1>

                        <p class="text-sm text-stone-500 tetx-white">
                            Coffee for life
                        </p>
                    </div>
                </div>
            </a>

            <div class="hidden lg:flex items-center gap-10 font-semibold">
                <a href="{{ route('landing') }}" class="text-white hover:text-[#8B5E3C] transition">
                    Home
                </a>

                <a href="{{ route('products.menu') }}" class="hover:text-[#8B5E3C] transition 
                    {{ request()->routeIs('products.*') ? 'text-[#8B5E3C]' : 'text-white' }}">
                    Produk
                </a>

                <a href="{{ route('promo.index') }}" class="hover:text-[#8B5E3C] transition
                    {{ request()->routeIs('promo.*') ? 'text-[#8B5E3C]' : 'text-white' }}">
                    Promo
                </a>

                @auth
                    <a href="{{ route('customer.dashboard') }}">
                        <div class="w-10 h-10 rounded-full bg-[#FAF3E0] border border-[#E6D7C8] flex items-center justify-center text-[#6F4E37] font-bold shadow-sm cursor-pointer">
                            {{ auth()->user()->initials }}
                        </div>
                    </a>
                @endauth

                @guest
                    <a href="{{ route('login') }}"
                        class="px-5 py-3 rounded-xl bg-[#8B5E3C] text-white font-bold flex items-center gap-3 hover:scale-105 transition">
                        Login
                    </a>
                @endguest

            </div>
        </div>
    </div>
</div>
