<!DOCTYPE html>
<html lang="en">

<head>

    <meta charset="UTF-8">

    <meta name="viewport"
          content="width=device-width, initial-scale=1.0">

    <title>KOPIN LOGIN</title>

    @vite(['resources/css/app.css','resources/js/app.js'])

</head>

<body
    class="bg-[#FAF3E0]">

<div class="min-h-screen grid lg:grid-cols-2">

    <!-- LEFT -->

<div class="hidden lg:flex relative overflow-hidden bg-gradient-to-br from-[#2B2118] via-[#4A3728] to-[#6F4E37] text-white">

    <!-- Glow -->

    <div class="absolute -top-40 -left-40 w-96 h-96 bg-[#A67B5B]/20 blur-[120px] rounded-full"></div>

    <div class="absolute bottom-0 right-0 w-80 h-80 bg-[#DDB892]/10 blur-[100px] rounded-full"></div>

    <!-- Coffee Image -->

    <img
        src="https://images.unsplash.com/photo-1495474472287-4d71bcdd2085?auto=format&fit=crop&w=1200&q=80"
        class="absolute inset-0 w-full h-full object-cover opacity-20">

    <div class="absolute inset-0 bg-black/40"></div>

    <div class="relative z-10 flex flex-col justify-center px-20 py-16">

        <img
            src="{{ asset('img/kopin2.png') }}"
            class="h-40 w-auto object-contain mb-10">

        <span
            class="inline-flex w-fit bg-white/10 backdrop-blur px-4 py-2 rounded-full text-sm">

            Coffee Shop CRM Platform
        </span>

        <h1
            class="text-6xl font-black leading-tight mt-6">

            Kelola Bisnis
            <br>
            Kopi Lebih
            <span class="text-[#DDB892]">
                Cerdas
            </span>

        </h1>

        <p
            class="mt-6 text-lg text-stone-200 max-w-xl leading-relaxed">

            Kelola pelanggan, campaign, laporan bisnis,
            hingga rekomendasi produk menggunakan
            Apriori dalam satu dashboard modern.

        </p>

        <div
            class="grid grid-cols-3 gap-4 mt-12 max-w-xl">

            <div
                class="bg-white/10 backdrop-blur rounded-3xl p-5 border border-white/10">

                <h2 class="text-3xl font-bold">
                    1.2K
                </h2>

                <p class="text-sm text-stone-300">
                    Customer
                </p>

            </div>

            <div
                class="bg-white/10 backdrop-blur rounded-3xl p-5 border border-white/10">

                <h2 class="text-3xl font-bold">
                    864
                </h2>

                <p class="text-sm text-stone-300">
                    Transaksi
                </p>

            </div>

            <div
                class="bg-white/10 backdrop-blur rounded-3xl p-5 border border-white/10">

                <h2 class="text-3xl font-bold">
                    28JT
                </h2>

                <p class="text-sm text-stone-300">
                    Revenue
                </p>

            </div>

        </div>

    </div>

</div>

    <!-- RIGHT -->

    <!-- RIGHT -->

<div
class="relative flex justify-center py-16 px-10 bg-[#F8F4EC] overflow-hidden">

    <!-- DECORATION -->

    <div class="absolute top-10 right-10 w-64 h-64 bg-[#DDB892]/20 rounded-full blur-[120px]"></div>

    <div class="absolute bottom-0 left-0 w-72 h-72 bg-[#A67B5B]/10 rounded-full blur-[120px]"></div>

    <div
    class="w-full max-w-lg">

        <div
        class="bg-white/95 backdrop-blur-xl
        rounded-[42px]
        shadow-[0_30px_80px_rgba(0,0,0,0.12)]
        border border-[#EFE3D5]
        p-10">

            <!-- LOGO -->

            <div class="text-center">

                <div
                class="w-20 h-20 mx-auto rounded-[24px]
                bg-[#FAF3E0]
                flex items-center justify-center
                border border-[#E6D7C8]
                shadow-lg">

                    <img
                    src="{{ asset('img/kopin2.png') }}"
                    class="w-14 h-auto">

                </div>

                <h2
                class="text-5xl font-black text-[#2B2118] mt-6">

                    Welcome Back

                </h2>

                <p
                class="text-stone-500 mt-3">

                    Login untuk mengakses dashboard KOPIN CRM

                </p>

            </div>

            <!-- BADGES -->

            <div class="flex justify-center gap-3 mt-6">

                <div
                class="px-4 py-2 rounded-full bg-[#FAF3E0] text-[#6F4E37] text-xs font-semibold">

                    Customer Analytics

                </div>

                <div
                class="px-4 py-2 rounded-full bg-[#FAF3E0] text-[#6F4E37] text-xs font-semibold">

                    Apriori AI

                </div>

            </div>

            <!-- FORM -->

            <form
            action="/dashboard"
            class="mt-10 space-y-5">

                <!-- EMAIL -->

                <div>

                    <label
                    class="text-sm font-semibold text-stone-600">

                        Email

                    </label>

                    <div class="relative mt-2">

                        <input
                        type="email"
                        placeholder="admin@coffeecrm.com"
                        class="w-full rounded-2xl border border-stone-200 pl-5 pr-4 py-4 focus:outline-none focus:ring-2 focus:ring-[#A67B5B]">

                    </div>

                </div>

                <!-- PASSWORD -->

                <div>

                    <label
                    class="text-sm font-semibold text-stone-600">

                        Password

                    </label>

                    <div class="relative mt-2">

                        <input
                        type="password"
                        placeholder="••••••••"
                        class="w-full rounded-2xl border border-stone-200 pl-5 pr-4 py-4 focus:outline-none focus:ring-2 focus:ring-[#A67B5B]">

                    </div>

                </div>

                <!-- REMEMBER -->

                <div
                class="flex justify-between items-center text-sm">

                    <label
                    class="flex items-center gap-2 text-stone-600">

                        <input type="checkbox">

                        Remember me

                    </label>

                    <a
                    href="#"
                    class="font-semibold text-[#6F4E37]">

                        Forgot Password?

                    </a>

                </div>

                <!-- BUTTON -->

                <button
                class="w-full py-4 rounded-2xl
                bg-gradient-to-r
                from-[#6F4E37]
                to-[#A67B5B]
                text-white
                font-bold
                text-lg
                hover:-translate-y-1
                hover:shadow-xl
                transition duration-300">

                    Login

                </button>

            </form>

            <!-- DIVIDER -->

            <div class="flex items-center gap-4 my-8">

                <div class="h-px bg-stone-200 flex-1"></div>

                <span class="text-xs text-stone-400">
                    DEMO ACCOUNT
                </span>

                <div class="h-px bg-stone-200 flex-1"></div>

            </div>

            <!-- DEMO -->

            <div
            class="bg-[#FAF3E0]
            rounded-3xl
            p-5 text-center">

                <p
                class="font-semibold text-[#6F4E37]">

                    admin@coffeecrm.com

                </p>

                <p
                class="text-stone-500 mt-1">

                    password

                </p>

            </div>

            <!-- FOOTER -->

            <div
            class="text-center mt-8">

                <p
                class="text-xs text-stone-400">

                    KOPIN CRM • Coffee Business Intelligence

                </p>

            </div>

        </div>

    </div>

</div>

</div>

</body>
</html>