<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>KOPIN Customer</title>

    @vite(['resources/css/app.css','resources/js/app.js'])
</head>

<body class="bg-[#F8F3ED] text-[#2B2118] overflow-x-hidden">

    <header class="sticky top-0 z-50 bg-white/90 backdrop-blur-xl border-b border-[#E6D7C8] shadow-sm">
        <div class="max-w-7xl mx-auto px-6 py-4 flex items-center justify-between gap-4">
            <div class="flex items-center gap-3">
                <div class="w-12 h-12 rounded-2xl bg-[#FAF3E0] border border-[#DDB892] flex items-center justify-center shadow-sm">
                    <img src="{{ asset('img/kopin2.png') }}" alt="KOPIN" class="w-8 h-8 object-contain" />
                </div>
                <div>
                    <h1 class="text-2xl font-bold">KOPIN</h1>
                    <p class="text-sm text-[#8B6E54]">Customer Dashboard</p>
                </div>
            </div>

            <div>
                @include('customer.layouts.navbar')
            </div>

            {{-- SweetAlert2 (untuk animasi/alert) --}}
            <script src="https://cdn.jsdelivr.net/npm/sweetalert2@11"></script>

            <script>
                // Saat halaman customer/dashboard/etc muncul setelah login
                window.__showLoginSuccess = function() {
                    const msg = @json(session('success'));
                    if (!msg) return;

                    if (typeof Swal !== 'undefined') {
                        Swal.fire({
                            toast: true,
                            position: 'top-end',
                            icon: 'success',
                            title: msg,
                            showConfirmButton: false,
                            timer: 1800,
                            timerProgressBar: true,
                            background: '#ffffff',
                            color: '#2B2118',
                            didOpen: (toast) => {
                                toast.style.borderRadius = '16px';
                            }
                        });
                    }
                }

                window.addEventListener('load', () => {
                    window.__showLoginSuccess();
                });
            </script>
        </div>
    </header>

    <main class="max-w-7xl mx-auto px-6 py-8">
        @yield('content')
    </main>
    <script src="https://cdn.jsdelivr.net/npm/sweetalert2@11"></script>

    <script>
        function confirmLogout() {

            Swal.fire({
                title: 'Logout Akun?',
                html: `
            <p class="text-gray-600">
                Anda akan keluar dari sistem KOPIN CRM
            </p>
        `,
                icon: 'warning',
                showCancelButton: true,
                confirmButtonColor: '#8B5E3C',
                cancelButtonColor: '#d33',
                confirmButtonText: 'Ya, Logout',
                cancelButtonText: 'Batal',
                reverseButtons: true,
                customClass: {
                    popup: 'rounded-[24px]'
                }
            }).then((result) => {

                if (result.isConfirmed) {

                    document.getElementById('logout-form').submit();

                }

            });

        }
    </script>
</body>

</html>