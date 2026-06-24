@extends('customer.layouts.app')

@section('content')

@if(session('success'))

<div
    class="mb-6 p-4 rounded-2xl
    bg-green-100 border border-green-200
    text-green-700 font-semibold">

    {{ session('success') }}

</div>

@endif

<div x-data="transactionJs">
    <div class="mb-6">
        <h1 class="text-3xl font-black text-[#2B2118]">Riwayat Transaksi</h1>
        <p class="text-stone-500 mt-2">{{ $transactions->total() }} transaksi ditemukan.</p>
    </div>

    {{-- CARD LIST --}}
    <div class="space-y-4">
        @forelse ($transactions as $tx)
        <div
            class="bg-white rounded-[20px] border border-[#EFE3D5] shadow-sm overflow-hidden hover:shadow-md transition-shadow">

            {{-- CARD HEADER --}}
            <div class="flex items-center gap-4 px-5 py-4 border-b border-[#EFE3D5]">
                <div
                    class="w-11 h-11 rounded-xl bg-[#FAF3E0] border border-[#E6D7C8] flex items-center justify-center shrink-0">
                    <x-heroicon-o-shopping-bag class="w-5 h-5 text-[#6F4E37]" />
                </div>

                <div class="flex-1 min-w-0">
                    <p class="font-bold text-sm text-[#2B2118]">TRX-{{ $tx['id'] }}</p>
                    <p class="text-xs text-stone-400 mt-0.5">{{ $tx['created_at'] }}</p>
                </div>

                <span
                    class="px-3 py-1 rounded-full text-xs font-bold shrink-0
                            {{ $tx['payment_status'] ? 'bg-green-100 text-green-700' : 'bg-red-100 text-red-700' }}">
                    {{ $tx['payment_status'] ? 'Paid' : 'Unpaid' }}
                </span>
            </div>

            {{-- PRODUK CHIPS --}}
            <div class="px-5 py-3 flex flex-wrap gap-2">
                @foreach ($tx['items'] as $item)
                <span
                    class="bg-[#FAF3E0] border border-[#EFE3D5] text-[#6F4E37] text-xs font-semibold px-3 py-1 rounded-full">
                    {{ $item['name'] }}
                    @if ($item['variant'])
                    <span class="text-[#A67B5B]">({{ $item['variant'] }})</span>
                    @endif
                </span>
                @endforeach
            </div>

            {{-- CARD FOOTER --}}
            <div class="flex items-center justify-between px-5 py-3 bg-[#FAF3E0] border-t border-[#EFE3D5]">
                <div>
                    <p class="text-xs text-stone-400">Grand Total</p>
                    <p class="text-base font-black text-[#6F4E37]">Rp
                        {{ $tx['total'] }}
                    </p>
                </div>

                <button @click="openDetail(@js($tx))"
                    class="bg-[#2B2118] hover:bg-[#3d2e22] text-white text-xs font-bold px-4 py-2 rounded-xl transition cursor-pointer">
                    Lihat Detail ›
                </button>
            </div>
        </div>

        @empty
        <div class="bg-white rounded-[20px] border border-[#EFE3D5] px-6 py-16 text-center">
            <x-heroicon-o-clipboard-document-list class="w-10 h-10 text-stone-300 mx-auto mb-3" />
            <p class="text-stone-400 font-semibold">Belum ada transaksi.</p>
        </div>
        @endforelse
    </div>

    {{-- PAGINATION --}}
    <div class="mt-6">
        {{ $transactions->links('layouts.pagination') }}
    </div>

    {{-- ═══════════ MODAL DETAIL ═══════════ --}}
    <div x-show="detailModal" x-transition.opacity style="display:none"
        class="fixed inset-0 z-50 bg-black/50 flex items-end sm:items-center justify-center p-0 sm:p-4">

        <div id="tx-modal" @click.away="detailModal=false"
            class="bg-white w-full sm:max-w-md rounded-t-4xl sm:rounded-[28px] overflow-hidden shadow-2xl transform transition-all">

            {{-- MODAL HEADER --}}
            <div class="bg-[#2B2118] px-6 py-5 flex items-start justify-between">
                <div>
                    <p class="text-stone-400 text-xs uppercase tracking-wider">Transaksi</p>
                    <h2 x-text="`TRX-${tx.id}`" class="text-white font-black text-lg mt-0.5">-</h2>
                    <p x-text="tx.created_at" class="text-stone-400 text-xs mt-1">-</p>
                </div>
                <button @click="detailModal=false"
                    class="bg-white/10 hover:bg-white/20 text-white rounded-xl w-8 h-8 flex items-center justify-center transition cursor-pointer text-lg leading-none">
                    ×
                </button>
            </div>

            {{-- MODAL BODY --}}
            <div class="px-6 py-5 space-y-1">

                {{-- Produk --}}
                <p class="text-xs text-stone-400 uppercase tracking-wider font-semibold mb-3">Produk dipesan</p>
                <div id="modal-products" class="space-y-2 mb-5">
                    <template x-for="tx in tx.items">
                        <div class="flex items-center justify-between gap-3 py-2 border-b border-[#EFE3D5] last:border-0">
                            <div class="flex items-center gap-3">
                                <div class="w-2 h-2 rounded-full bg-[#A67B5B] shrink-0"></div>
                                <span x-text="tx.name" class="text-sm text-[#2B2118] font-semibold"></span>
                                <span x-text="tx.variant ? tx.variant : ''" class="text-xs text-stone-400"></span>
                            </div>
                            <span x-text="tx.price" class="text-sm text-[#2B2118] font-semibold"></span>
                        </div>
                    </template>
                </div>

                <div class="border-t border-[#EFE3D5] pt-4 space-y-3">
                    <div class="flex justify-between text-sm">
                        <span class="text-stone-400">Subtotal</span>
                        <span x-text="tx.subtotal" class="font-semibold text-[#2B2118]">-</span>
                    </div>
                    <div class="flex justify-between text-sm">
                        <span class="text-stone-400">Status Pembayaran</span>
                        <span x-text="tx.payment_status ? 'Lunas' : 'Belum Lunas'"
                            :class="tx.payment_status ? 'text-green-600' : 'text-red-600'" class="font-bold"></span>
                    </div>
                </div>
            </div>

            {{-- MODAL FOOTER --}}
            <div class="px-6 py-4 bg-[#FAF3E0] border-t border-[#EFE3D5] flex justify-between items-center">
                <div>
                    <p class="text-xs text-stone-400">Grand Total</p>
                    <p x-text="`Rp${tx.total}`" class="text-xl font-black text-[#6F4E37]">-</p>
                </div>
                <button @click="detailModal=false"
                    class="border border-[#DDB892] text-[#6F4E37] text-sm font-semibold px-4 py-2 rounded-xl hover:bg-white transition cursor-pointer">
                    Tutup
                </button>
            </div>
        </div>
    </div>
</div>

{{-- DATA TRANSAKSI untuk JS --}}
{{-- @push('scripts')
        <script>
            const txData = {
                @foreach ($transactions as $tx)
                    {{ $tx->id }}: {
id: 'TRX-{{ str_pad($tx->id, 4, '0', STR_PAD_LEFT) }}',
date: '{{ $tx->created_at->format('d M Y, H:i') }}',
subtotal: 'Rp {{ number_format($tx->subtotal, 0, ',', '.') }}',
grand: 'Rp {{ number_format($tx->grand_total, 0, ',', '.') }}',
paid: {{ $tx->payment_status ? 'true' : 'false' }},
products: [
@foreach ($tx->details as $dt)
{
name: '{{ $dt->variantId->product->name }}',
variant: '{{ $dt->variantId->variant_name ?? '' }}',
},
@endforeach
],
},
@endforeach
};

function openTxModal(id) {
const tx = txData[id];
if (!tx) return;

document.getElementById('modal-tx-id').textContent = tx.id;
document.getElementById('modal-tx-date').textContent = tx.date;
document.getElementById('modal-subtotal').textContent = tx.subtotal;
document.getElementById('modal-grand').textContent = tx.grand;

const statusEl = document.getElementById('modal-status');
statusEl.textContent = tx.paid ? 'Lunas' : 'Belum Lunas';
statusEl.className = tx.paid ?
'font-bold text-green-600' :
'font-bold text-red-600';

const prodEl = document.getElementById('modal-products');
prodEl.innerHTML = tx.products.map(p => `
<div class="flex items-center gap-3 py-2 border-b border-[#EFE3D5] last:border-0">
    <div class="w-2 h-2 rounded-full bg-[#A67B5B] flex-shrink-0"></div>
    <span class="text-sm text-[#2B2118] font-semibold">${p.name}</span>
    ${p.variant ? `<span class="text-xs text-stone-400">(${p.variant})</span>` : ''}
</div>
`).join('');

document.getElementById('tx-modal-backdrop').style.display = 'flex';
document.body.style.overflow = 'hidden';
}

function closeTxModal() {
document.getElementById('tx-modal-backdrop').style.display = 'none';
document.body.style.overflow = '';
}
</script>
@endpush --}}

@endsection