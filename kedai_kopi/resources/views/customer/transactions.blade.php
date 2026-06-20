@extends('customer.layouts.app')

@section('content')
<div class="max-w-5xl">
    <div class="mb-6">
        <h1 class="text-3xl font-black text-[#2B2118]">Riwayat Transaksi</h1>
        <p class="text-stone-500 mt-2">Daftar transaksi yang tersimpan di database.</p>
    </div>

    <div class="bg-white rounded-[28px] border border-[#EFE3D5] shadow-sm overflow-hidden">
        <div class="p-6 border-b border-[#EFE3D5] bg-[#FAF3E0]">
            <div class="flex items-center justify-between gap-3">
                <div>
                    <h2 class="font-bold text-[#2B2118]">Transactions</h2>
                    <p class="text-stone-600 mt-1">Menampilkan data terbaru (paginate).</p>
                </div>
            </div>
        </div>

        <div class="overflow-x-auto">
            <table class="w-full">
                <thead>
                    <tr class="bg-[#FAF3E0] border-b border-[#EFE3D5]">
                        <th class="px-6 py-4 text-left text-sm font-semibold text-[#2B2118]">ID</th>
                        <th class="px-6 py-4 text-left text-sm font-semibold text-[#2B2118]">Cust ID</th>
                        <th class="px-6 py-4 text-left text-sm font-semibold text-[#2B2118]">Subtotal</th>
                        <th class="px-6 py-4 text-left text-sm font-semibold text-[#2B2118]">Grand Total</th>
                        <th class="px-6 py-4 text-left text-sm font-semibold text-[#2B2118]">Payment</th>
                        <th class="px-6 py-4 text-left text-sm font-semibold text-[#2B2118]">Created</th>
                    </tr>
                </thead>
                <tbody>
                    @forelse ($transactions as $tx)
                    <tr class="border-b border-[#EFE3D5] hover:bg-[#FAF3E0] transition-colors">
                        <td class="px-6 py-4">{{ $tx->id }}</td>
                        <td class="px-6 py-4">{{ $tx->cust_id }}</td>
                        <td class="px-6 py-4">{{ $tx->subtotal }}</td>
                        <td class="px-6 py-4 font-bold text-[#6F4E37]">{{ $tx->grand_total }}</td>
                        <td class="px-6 py-4">
                            @if ($tx->payment_status)
                            <span class="inline-flex items-center px-3 py-1 rounded-full text-xs font-semibold bg-green-100 text-green-700">Paid</span>
                            @else
                            <span class="inline-flex items-center px-3 py-1 rounded-full text-xs font-semibold bg-red-100 text-red-700">Unpaid</span>
                            @endif
                        </td>
                        <td class="px-6 py-4 text-stone-600">{{ $tx->created_at->format('d M Y') }}</td>
                    </tr>
                    @empty
                    <tr>
                        <td colspan="6" class="px-6 py-12 text-center text-stone-500">
                            Belum ada transaksi.
                        </td>
                    </tr>
                    @endforelse
                </tbody>
            </table>
        </div>

        <div class="p-6">
            {{ $transactions->links() }}
        </div>
    </div>
</div>
@endsection