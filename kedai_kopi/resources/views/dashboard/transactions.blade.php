@extends('dashboard.layouts.app')

@section('content')
    <div x-data="adminTrxJs" class="space-y-8">

        <!-- HEADER -->
        <div>
            <h1 class="text-4xl font-bold text-[#2B2118]">
                Manajemen Transaksi
            </h1>

            <p class="text-[#8B6E54] mt-2">
                Kelola pembayaran customer dan verifikasi transaksi.
            </p>
        </div>

        <!-- KPI -->
        <div class="grid md:grid-cols-2 xl:grid-cols-4 gap-6">

            <div class="bg-white rounded-[30px] p-6 shadow-xl border border-[#EFE3D5]">
                <p class="text-stone-500">Total Transaksi</p>

                <h2 class="text-5xl font-black text-[#2B2118] mt-3">
                    {{ $stats['total'] }}
                </h2>
            </div>

            <div class="bg-white rounded-[30px] p-6 shadow-xl border border-[#EFE3D5]">
                <p class="text-stone-500">Pending</p>

                <h2 class="text-5xl font-black text-yellow-600 mt-3">
                    {{ $stats['pending'] }}
                </h2>
            </div>

            <div class="bg-white rounded-[30px] p-6 shadow-xl border border-[#EFE3D5]">
                <p class="text-stone-500">Success</p>

                <h2 class="text-5xl font-black text-green-600 mt-3">
                    {{ $stats['success'] }}
                </h2>
            </div>

            <div class="bg-white rounded-[30px] p-6 shadow-xl border border-[#EFE3D5]">
                <p class="text-stone-500">Revenue</p>

                <h2 class="text-3xl font-black text-[#2B2118] mt-3">
                    Rp {{ number_format($stats['revenue'], 0, ',', '.') }}
                </h2>
            </div>

        </div>

        <!-- FILTER -->
        <div class="bg-white border border-[#E8D8C4] rounded-[28px] p-4 shadow-lg">
            <div class="flex flex-wrap gap-3">
                <a href="{{ route('transactions.index') }}"
                    class="inline-flex items-center justify-center min-w-27.5 px-5 py-3 rounded-2xl font-semibold transition-all duration-200
                    {{ request('status', 'all') == 'all'
                        ? 'bg-[#6F4E37] text-white shadow-lg'
                        : 'bg-[#F8F3ED] text-[#2B2118] hover:bg-[#EFE3D5]' }}">

                    Semua

                </a>

                <a href="{{ route('transactions.index', ['status' => 'pending']) }}"
                    class="inline-flex items-center justify-center min-w-27.5 px-5 py-3 rounded-2xl font-semibold transition-all duration-200
                    {{ request('status') == 'pending'
                        ? 'bg-yellow-500 text-white shadow-lg'
                        : 'bg-[#F8F3ED] text-[#2B2118] hover:bg-[#EFE3D5]' }}">

                    Pending

                </a>

                <a href="{{ route('transactions.index', ['status' => 'success']) }}"
                    class="inline-flex items-center justify-center min-w-27.5 px-5 py-3 rounded-2xl font-semibold transition-all duration-200
                    {{ request('status') == 'success'
                        ? 'bg-green-600 text-white shadow-lg'
                        : 'bg-[#F8F3ED] text-[#2B2118] hover:bg-[#EFE3D5]' }}">

                    Success

                </a>
            </div>
        </div>

        <!-- LIST TRANSAKSI -->
        <div class="bg-white rounded-[28px] border border-[#EFE3D5] shadow-lg overflow-hidden">

            <div class="overflow-x-auto">

                <table class="w-full">

                    <thead class="bg-[#FAF3E0]">

                        <tr>
                            <th class="px-6 py-4 text-left">ID</th>
                            <th class="px-6 py-4 text-left">Customer</th>
                            <th class="px-6 py-4 text-left">Tanggal</th>
                            <th class="px-6 py-4 text-left">Metode</th>
                            <th class="px-6 py-4 text-left">Total</th>
                            <th class="px-6 py-4 text-left">Status</th>
                            <th class="px-6 py-4 text-center">Aksi</th>
                        </tr>

                    </thead>

                    <tbody>

                        @forelse($transactions as $transaction)
                            <tr class="border-t border-[#EFE3D5] hover:bg-[#FCF8F3]">

                                <td class="px-6 py-4 font-bold">
                                    #{{ $transaction->id }}
                                </td>

                                <td class="px-6 py-4">
                                    {{ $transaction->customer?->user?->name ?? 'Customer Tidak Ditemukan' }}
                                </td>

                                <td class="px-6 py-4">
                                    {{ $transaction->created_at->format('d M Y H:i') }}
                                </td>

                                <td class="px-6 py-4">
                                    {{ strtoupper($transaction->payment_method) }}
                                </td>

                                <td class="px-6 py-4 font-bold text-[#6F4E37]">
                                    Rp {{ number_format($transaction->grand_total, 0, ',', '.') }}
                                </td>

                                <td class="px-6 py-4">

                                    @if ($transaction->payment_status)
                                        <span class="px-3 py-1 rounded-full bg-green-100 text-green-700 font-bold text-sm">
                                            SUCCESS
                                        </span>
                                    @else
                                        <span
                                            class="px-3 py-1 rounded-full bg-yellow-100 text-yellow-700 font-bold text-sm">
                                            PENDING
                                        </span>
                                    @endif

                                </td>

                                <td class="px-6 py-4 text-center">

                                    @if (!$transaction->payment_status)
                                        <form id="approveForm{{ $transaction->id }}"
                                            action="{{ route('transactions.approve', $transaction->id) }}" method="POST">

                                            @csrf

                                            <button type="button" onclick="confirmApprove({{ $transaction->id }})"
                                                class="px-4 py-2 rounded-xl bg-green-600 text-white font-bold hover:bg-green-700 transition">

                                                ACC

                                            </button>

                                        </form>
                                    @else
                                        <span class="text-green-600 font-bold">
                                            ✓
                                        </span>
                                    @endif

                                </td>

                            </tr>

                        @empty

                            <tr>
                                <td colspan="7" class="text-center py-10 text-stone-500">
                                    Tidak ada transaksi
                                </td>
                            </tr>
                        @endforelse

                    </tbody>

                </table>

            </div>

        </div>

        <div>
            {{ $transactions->links('layouts.pagination') }}
        </div>


    </div>

    @push('scripts')
        <script>
            function confirmApprove(id) {

                Swal.fire({
                    title: 'Verifikasi Pembayaran?',
                    html: `
            <p>
                Transaksi <b>#${id}</b> akan ditandai sebagai
                <b>SUCCESS</b>.
            </p>
        `,
                    icon: 'question',
                    showCancelButton: true,
                    confirmButtonText: 'Ya, Verifikasi',
                    cancelButtonText: 'Batal',
                    confirmButtonColor: '#16a34a',
                    cancelButtonColor: '#78716c',
                    reverseButtons: true
                }).then((result) => {

                    if (result.isConfirmed) {
                        document.getElementById('approveForm' + id).submit();
                    }

                });

            }
        </script>
    @endpush
@endsection
