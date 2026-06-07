<x-app-layout>
    <x-slot name="header">
        <h2 class="font-bold text-2xl text-amber-900 leading-tight">
            {{ __('☕ Coffee Shop Dashboard') }}
        </h2>
    </x-slot>

    <div class="py-12 bg-amber-50/40 min-h-screen">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8 space-y-8">
            
            <div class="bg-gradient-to-r from-amber-800 via-amber-700 to-amber-600 overflow-hidden shadow-xl rounded-2xl text-white">
                <div class="p-8 sm:p-10 flex flex-col md:flex-row justify-between items-center relative">
                    <div class="mb-6 md:mb-0 z-10">
                        <h3 class="text-2xl sm:text-3xl font-extrabold mb-2">Selamat Datang Kembali, {{ Auth::user()->name }}! 👋</h3>
                        <p class="text-amber-100 text-sm sm:text-base">Seduh kopi terbaikmu hari ini. Kelola menu varian kopi dan pantau pesanan pelanggan dengan mudah.</p>
                    </div>
                    <div class="z-10">
                        <a href="{{ route('orders.create') }}" class="inline-flex items-center px-6 py-3 bg-white text-amber-800 font-semibold rounded-xl shadow-md hover:bg-amber-50 transition duration-200 text-sm">
                            <svg class="w-5 h-5 mr-2" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M12 6v6m0 0v6m0-6h6m-6 0H6"></path></svg>
                            Catat Pesanan Baru
                        </a>
                    </div>
                    <div class="absolute right-0 bottom-0 opacity-10 transform translate-x-6 translate-y-6">
                        <svg class="w-64 h-64" fill="currentColor" viewBox="0 0 24 24"><path d="M2 21h18v-2H2v2zM20 8h-2V5h2v3zm2-5H4v13c0 2.21 1.79 4 4 4h8c2.21 0 4-1.79 4-4V3zm-2 3v2h-2V6h2z"/></svg>
                    </div>
                </div>
            </div>

            <div class="grid grid-cols-1 sm:grid-cols-2 lg:grid-cols-3 gap-6">
                <div class="bg-white overflow-hidden shadow-sm rounded-2xl border border-amber-100 p-6 flex items-center justify-between hover:shadow-md transition duration-200">
                    <div class="flex items-center space-x-4">
                        <div class="p-3 rounded-xl bg-amber-50 text-amber-700">
                            <svg class="w-8 h-8" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M12 3v1m0 16v1m9-9h-1M4 12H3m15.364-6.364l-.707.707M6.343 17.657l-.707.707m0-11.314l.707.707m11.314 11.314l.707-.707M12 5a7 7 0 100 14 7 7 0 000-14z"></path></svg>
                        </div>
                        <div>
                            <p class="text-sm font-medium text-gray-400 uppercase tracking-wider">Total Menu & Varian</p>
                            <p class="text-3xl font-extrabold text-amber-900 mt-1">{{ $totalProducts }}</p>
                        </div>
                    </div>
                    <a href="{{ route('products.index') }}" class="text-xs text-amber-700 font-semibold hover:underline">Lihat Menu</a>
                </div>

                <div class="bg-white overflow-hidden shadow-sm rounded-2xl border border-amber-100 p-6 flex items-center justify-between hover:shadow-md transition duration-200">
                    <div class="flex items-center space-x-4">
                        <div class="p-3 rounded-xl bg-emerald-50 text-emerald-600">
                            <svg class="w-8 h-8" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M9 5H7a2 2 0 00-2 2v12a2 2 0 002 2h10a2 2 0 002-2V7a2 2 0 00-2-2h-2M9 5a2 2 0 002 2h2a2 2 0 002-2M9 5a2 2 0 012-2h2a2 2 0 012 2m-3 7h3m-3 4h3m-6-4h.01M9 16h.01"></path></svg>
                        </div>
                        <div>
                            <p class="text-sm font-medium text-gray-400 uppercase tracking-wider">Pesanan Masuk</p>
                            <p class="text-3xl font-extrabold text-gray-900 mt-1">{{ $totalOrders }}</p>
                        </div>
                    </div>
                    <a href="{{ route('orders.index') }}" class="text-xs text-emerald-600 font-semibold hover:underline">Lihat Semua</a>
                </div>

                <div class="bg-white overflow-hidden shadow-sm rounded-2xl border border-amber-100 p-6 flex items-center space-x-4 hover:shadow-md transition duration-200 sm:col-span-2 lg:col-span-1">
                    <div class="p-3 rounded-xl bg-blue-50 text-blue-600">
                        <svg class="w-8 h-8" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M9 12l2 2 4-4m5.618-4.016A11.955 11.955 0 0112 2.944a11.955 11.955 0 01-8.618 3.04A12.02 12.02 0 003 9c0 5.591 3.824 10.29 9 11.622 5.176-1.332 9-6.03 9-11.622 0-1.042-.133-2.052-.382-3.016z"></path></svg>
                    </div>
                    <div>
                        <p class="text-sm font-medium text-gray-400 uppercase tracking-wider">Status Sistem POS</p>
                        <p class="text-lg font-bold text-emerald-600 mt-1 flex items-center">
                            <span class="w-2 h-2 rounded-full bg-emerald-500 inline-block mr-2 animate-pulse"></span>
                            Mesin Kasir Aktif
                        </p>
                    </div>
                </div>
            </div>

            <div class="grid grid-cols-1 lg:grid-cols-3 gap-8">
                
                <div class="bg-white overflow-hidden shadow-sm rounded-2xl border border-amber-100 p-6 lg:col-span-2">
                    <div class="flex justify-between items-center mb-6">
                        <h4 class="text-lg font-bold text-gray-900">Antrean Pesanan Kafe</h4>
                        <span class="px-2.5 py-1 text-xs bg-amber-50 text-amber-800 font-semibold rounded-md animate-pulse">Real-time Order</span>
                    </div>

                    @if($recentOrders->isEmpty())
                        <div class="text-center py-12 text-gray-400 text-sm">
                            ☕ Belum ada pesanan masuk. Sambil menunggu, mari bersihkan meja bar!
                        </div>
                    @else
                        <div class="overflow-x-auto">
                            <table class="min-w-full divide-y divide-gray-100 text-sm">
                                <thead>
                                    <tr class="text-left text-gray-400 font-medium">
                                        <th class="pb-3">Pelanggan / Meja</th>
                                        <th class="pb-3">Menu Kopi / Cemilan</th>
                                        <th class="pb-3">Total Bayar</th>
                                        <th class="pb-3 text-right">Status</th>
                                    </tr>
                                </thead>
                                <tbody class="divide-y divide-gray-50">
                                    @foreach($recentOrders as $order)
                                    <tr>
                                        <td class="py-3 font-semibold text-gray-900">
                                            {{ $order->customer_name }}
                                        </td>
                                        <td class="py-3 text-gray-600">
                                            <span class="font-medium text-amber-900">{{ $order->product->name ?? 'Menu Dihapus' }}</span> 
                                            <span class="text-xs text-gray-400">(x{{ $order->quantity }})</span>
                                        </td>
                                        <td class="py-3 text-gray-900 font-medium">Rp{{ number_format($order->total_price, 0, ',', '.') }}</td>
                                        <td class="py-3 text-right">
                                            <span class="px-2.5 py-0.5 text-xs font-semibold rounded-full 
                                            {{ $order->status === 'completed' ? 'bg-green-50 text-green-700' : ($order->status === 'cancelled' ? 'bg-red-50 text-red-700' : 'bg-amber-50 text-amber-700') }}">
                                                {{ $order->status === 'completed' ? 'Selesai' : ($order->status === 'cancelled' ? 'Batal' : 'Diproses / Antre') }}
                                            </span>
                                        </td>
                                    </tr>
                                    @endforeach
                                </tbody>
                            </table>
                        </div>
                    @endif
                </div>

                <div class="space-y-6">
                    <div class="bg-white overflow-hidden shadow-sm rounded-2xl border border-amber-100 p-6">
                        <h4 class="text-lg font-bold text-gray-900 mb-4">Navigasi Kasir</h4>
                        <div class="space-y-3">
                            <a href="{{ route('products.create') }}" class="flex items-center justify-between p-3 rounded-xl bg-amber-50/30 hover:bg-amber-50 hover:text-amber-800 transition duration-150 text-sm font-medium text-gray-700">
                                <span class="flex items-center">☕ Tambah Menu Baru</span>
                                <svg class="w-4 h-4" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M9 5l7 7-7 7"></path></svg>
                            </a>
                            <a href="{{ route('products.index') }}" class="flex items-center justify-between p-3 rounded-xl bg-amber-50/30 hover:bg-amber-50 hover:text-amber-800 transition duration-150 text-sm font-medium text-gray-700">
                                <span class="flex items-center">📖 Atur Daftar Menu (Katalog)</span>
                                <svg class="w-4 h-4" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M9 5l7 7-7 7"></path></svg>
                            </a>
                            <a href="{{ route('orders.index') }}" class="flex items-center justify-between p-3 rounded-xl bg-amber-50/30 hover:bg-emerald-50 hover:text-emerald-700 transition duration-150 text-sm font-medium text-gray-700">
                                <span class="flex items-center">📊 Laporan & Riwayat Nota</span>
                                <svg class="w-4 h-4" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M9 5l7 7-7 7"></path></svg>
                            </a>
                        </div>
                    </div>
                </div>

            </div>

        </div>
    </div>
</x-app-layout>