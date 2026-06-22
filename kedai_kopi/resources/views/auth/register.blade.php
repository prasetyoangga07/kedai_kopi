<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">

    <meta name="viewport" content="width=device-width, initial-scale=1.0">

    <title>KOPIN REGISTER</title>

    @vite(['resources/css/app.css','resources/js/app.js'])
</head>

<body class="bg-[#FAF3E0]">
    <div class="min-h-screen grid lg:grid-cols-2">

        <!-- LEFT -->
        <div class="hidden lg:flex relative overflow-hidden bg-linear-to-br from-[#2B2118] via-[#4A3728] to-[#6F4E37] text-white">

            <!-- Glow -->
            <div class="absolute -top-40 -left-40 w-96 h-96 bg-[#A67B5B]/20 blur-[120px] rounded-full"></div>

            <div class="absolute bottom-0 right-0 w-80 h-80 bg-[#DDB892]/10 blur-[100px] rounded-full"></div>

            <!-- Coffee Image -->
            <img
                src="https://images.unsplash.com/photo-1495474472287-4d71bcdd2085?auto=format&fit=crop&w=1200&q=80"
                class="absolute inset-0 w-full h-full object-cover opacity-20">

            <div class="absolute inset-0 bg-black/40"></div>

            <div class="relative z-10 flex flex-col justify-center px-20 py-16">

                <img src="{{ asset('img/kopin2.png') }}"
                    class="h-40 w-auto object-contain mb-10">

                <span class="inline-flex w-fit bg-white/10 backdrop-blur px-4 py-2 rounded-full text-sm">
                    Coffee Shop CRM Platform
                </span>

                <h1 class="text-6xl font-black leading-tight mt-6">

                    Bergabung dengan
                    <br>
                    Komunitas KOPIN
                    <span class="text-[#DDB892]">
                        Sekarang
                    </span>

                </h1>

                <p
                    class="mt-6 text-lg text-stone-200 max-w-xl leading-relaxed">

                    Daftar akun pelanggan dan nikmati keuntungan eksklusif dari kedai kopi kami. 
                    Dapatkan poin reward dan akses ke penawaran spesial.

                </p>

                <div
                    class="grid grid-cols-3 gap-4 mt-12 max-w-xl">

                    <div
                        class="bg-white/10 backdrop-blur rounded-3xl p-5 border border-white/10">

                        <h2 class="text-3xl font-bold">
                            1.2K
                        </h2>

                        <p class="text-sm text-stone-300">
                            Member Aktif
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

                    <div class="bg-white/10 backdrop-blur rounded-3xl p-5 border border-white/10">
                        <h2 class="text-3xl font-bold">
                            28JT
                        </h2>

                        <p class="text-sm text-stone-300">
                            Reward
                        </p>
                    </div>
                </div>
            </div>
        </div>

        <!-- RIGHT -->
        <div class="relative flex justify-center py-16 px-10 bg-[#F8F4EC] overflow-hidden">

            <!-- DECORATION -->
            <div class="absolute top-10 right-10 w-64 h-64 bg-[#DDB892]/20 rounded-full blur-[120px]"></div>

            <div class="absolute bottom-0 left-0 w-72 h-72 bg-[#A67B5B]/10 rounded-full blur-[120px]"></div>

            <div class="w-full max-w-lg">

                <div class="bg-white/95 backdrop-blur-xl
                    rounded-[42px]
                    shadow-[0_30px_80px_rgba(0,0,0,0.12)]
                    border border-[#EFE3D5]
                    p-10">

                    <!-- LOGO -->
                    <div class="text-center">
                        <div class="w-20 h-20 mx-auto rounded-3xl
                            bg-[#FAF3E0]
                            flex items-center justify-center
                            border border-[#E6D7C8]
                            shadow-lg">

                            <img src="{{ asset('img/kopin2.png') }}" class="w-14 h-auto">
                        </div>

                        <h2 class="text-5xl font-black text-[#2B2118] mt-6">
                            Daftar Akun
                        </h2>

                        <p class="text-stone-500 mt-3">
                            Buat akun KOPIN CRM untuk menikmati pengalaman berbelanja terbaik 
                        </p>
                    </div>

                    <!-- BADGES -->
                    <div class="flex justify-center gap-3 mt-6">
                        <div class="px-4 py-2 rounded-full bg-[#FAF3E0] text-[#6F4E37] text-xs font-semibold">
                            Gratis Untuk Semua
                        </div>

                        <div class="px-4 py-2 rounded-full bg-[#FAF3E0] text-[#6F4E37] text-xs font-semibold">
                            Reward Menarik
                        </div>
                    </div>

                    <!-- FORM -->
                    <form method="POST" action="{{ route('register.process') }}" class="mt-10 space-y-4">
                        @csrf

                        <!-- NAME -->
                        <div>
                            <label class="text-sm font-semibold text-stone-600">
                                Nama Lengkap
                            </label>

                            <div class="relative mt-2">
                                <input name="name" type="text" required value="{{ old('name') }}"
                                    placeholder="Masukkan nama lengkap Anda"
                                    class="w-full rounded-2xl border 
                                    @error('name') border-red-500 @else border-stone-200 @enderror 
                                    pl-5 pr-4 py-4 focus:outline-none focus:ring-2 focus:ring-[#A67B5B]">
                            </div>

                            @error('name')
                                <p class="text-red-500 text-xs mt-1">{{ $message }}</p>
                            @enderror
                        </div>

                        <div class="flex gap-2">
                            <!-- EMAIL -->
                            <div>
                                <label class="text-sm font-semibold text-stone-600">
                                    Email
                                </label>
    
                                <div class="relative mt-2">
                                    <input
                                        name="email"
                                        type="email"
                                        required
                                        value="{{ old('email') }}"
                                        placeholder="nama@email.com"
                                        class="w-full rounded-2xl border 
                                        @error('email') border-red-500 @else border-stone-200 @enderror 
                                        pl-5 pr-4 py-4 focus:outline-none focus:ring-2 focus:ring-[#A67B5B]"
                                    >
                                </div>
    
                                @error('email')
                                    <p class="text-red-500 text-xs mt-1">{{ $message }}</p>
                                @enderror
                            </div>
    
                            <!-- PHONE -->
                            <div>
                                <label class="text-sm font-semibold text-stone-600">
                                    Phone
                                </label>
    
                                <div class="relative mt-2">
                                    <input
                                        name="phone"
                                        type="string"
                                        required
                                        value="{{ old('phone') }}"
                                        placeholder="+62 xxxx xxxx"
                                        class="w-full rounded-2xl border 
                                        @error('phone') border-red-500 @else border-stone-200 @enderror 
                                        pl-5 pr-4 py-4 focus:outline-none focus:ring-2 focus:ring-[#A67B5B]"
                                    >
                                </div>
    
                                @error('email')
                                    <p class="text-red-500 text-xs mt-1">{{ $message }}</p>
                                @enderror
                            </div>
                        </div>

                        <!-- PASSWORD -->
                        <div>
                            <label class="text-sm font-semibold text-stone-600">
                                Password
                            </label>

                            <div class="relative mt-2">
                                <input
                                    name="password"
                                    type="password"
                                    required
                                    placeholder="Minimal 6 karakter"
                                    class="w-full rounded-2xl border 
                                    @error('password') border-red-500 @else border-stone-200 @enderror 
                                    pl-5 pr-4 py-4 focus:outline-none focus:ring-2 focus:ring-[#A67B5B]"
                                >
                            </div>

                            @error('password')
                                <p class="text-red-500 text-xs mt-1">{{ $message }}</p>
                            @enderror
                        </div>

                        <!-- PASSWORD CONFIRMATION -->
                        <div>
                            <label class="text-sm font-semibold text-stone-600">
                                Konfirmasi Password
                            </label>

                            <div class="relative mt-2">
                                <input
                                    name="password_confirmation"
                                    type="password"
                                    required
                                    placeholder="Masukkan ulang password"
                                    class="w-full rounded-2xl border 
                                    @error('password_confirmation') border-red-500 @else border-stone-200 @enderror 
                                    pl-5 pr-4 py-4 focus:outline-none focus:ring-2 focus:ring-[#A67B5B]"
                                >
                            </div>

                            @error('password_confirmation')
                                <p class="text-red-500 text-xs mt-1">{{ $message }}</p>
                            @enderror
                        </div>

                        <!-- TERMS -->
                        <div class="flex items-start gap-2 text-sm">
                            <input type="checkbox" required class="mt-1">
                            <label class="text-stone-600">
                                Saya setuju dengan 
                                <a href="#" class="text-[#6F4E37] font-semibold hover:underline">
                                    Syarat & Ketentuan
                                </a> 
                                dan 
                                <a href="#" class="text-[#6F4E37] font-semibold hover:underline">
                                    Kebijakan Privasi
                                </a>
                            </label>
                        </div>

                        <!-- BUTTON -->
                        <button type="submit"
                            class="w-full py-4 rounded-2xl
                                bg-linear-to-r from-[#6F4E37] to-[#A67B5B]
                                text-white font-bold text-lg
                                hover:-translate-y-1 hover:shadow-xl
                                transition duration-300 
                                cursor-pointer">

                            Buat Akun
                        </button>
                    </form>

                    <!-- LOGIN LINK -->
                    <div class="text-center mt-8">
                        <p class="text-stone-600">
                            Sudah punya akun?
                            <a href="{{ route('login') }}" class="text-[#6F4E37] font-semibold hover:underline">
                                Login di sini
                            </a>
                        </p>
                    </div>

                    <!-- FOOTER -->
                    <div class="text-center mt-6">
                        <p class="text-xs text-stone-400">
                            KOPIN CRM • Coffee Business Intelligence
                        </p>
                    </div>
                </div>
            </div>
        </div>
    </div>

    @if(session('error'))
    <script>
        Swal.fire({
            icon: 'error',
            title: 'Registrasi Gagal',
            text: '{{ session("error") }}',
            confirmButtonColor: '#A67B5B'
        })
    </script>
    @endif

    @if(session('success'))
    <script>
        Swal.fire({
            icon: 'success',
            title: 'Registrasi Berhasil',
            text: '{{ session("success") }}',
            confirmButtonColor: '#A67B5B'
        })
    </script>
    @endif

</body>

</html>
