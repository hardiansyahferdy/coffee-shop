<x-app-layout>
    <x-slot name="header">
        <h2 class="font-bold text-2xl text-gray-800 leading-tight">
            {{ __('Dashboard Utama') }}
        </h2>
    </x-slot>

    <div class="py-12 bg-gray-50 min-h-screen">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8 space-y-8">
            
            <div class="bg-gradient-to-r from-indigo-600 via-purple-600 to-pink-600 overflow-hidden shadow-xl rounded-2xl text-white">
                <div class="p-8 sm:p-10 flex flex-col md:flex-row justify-between items-center relative">
                    <div class="mb-6 md:mb-0 z-10">
                        <h3 class="text-2xl sm:text-3xl font-extrabold mb-2">Selamat Datang Kembali, {{ Auth::user()->name }}! 👋</h3>
                        <p class="text-indigo-100 text-sm sm:text-base">Aplikasi toko Anda siap digunakan. Kelola produk dan pantau pesanan pelanggan dengan mudah di sini.</p>
                    </div>
                    <div class="z-10">
                        <a href="{{ route('orders.create') }}" class="inline-flex items-center px-6 py-3 bg-white text-indigo-700 font-semibold rounded-xl shadow-md hover:bg-indigo-50 transition duration-200 text-sm">
                            <svg class="w-5 h-5 mr-2" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M12 4v16m8-8H4"></path></svg>
                            Buat Order Baru
                        </a>
                    </div>
                    <div class="absolute right-0 bottom-0 opacity-10 transform translate-x-10 translate-y-10">
                        <svg class="w-64 h-64" fill="currentColor" viewBox="0 0 24 24"><path d="M7 18c-1.1 0-1.99.9-1.99 2S5.9 22 7 22s2-.9 2-2-.9-2-2-2zM1M17 18c-1.1 0-1.99.9-1.99 2s.89 2 1.99 2 2-.9 2-2-.9-2-2-2zm-9.83-3.25l.03-.12c0-.14.07-.27.18-.35L17 8.35c.38-.28.84-.19 1.12.19.28.38.19.84-.19 1.12L10.25 15H18c.55 0 1 .45 1 1s-.45 1-1 1H6.17l-.92-1.92zM3 2h1.45l1.04 2.19L8.62 11h7.02l2.36-4.28C18.29 6.27 18.04 6 17.5 6H6.13L5.05 3.73C4.82 3.25 4.34 2.94 3.82 2.94H2C1.45 2.94 1 2.49 1 1.94S1.45.94 2 .94h1z"/></svg>
                    </div>
                </div>
            </div>

            <div class="grid grid-cols-1 sm:grid-cols-2 lg:grid-cols-3 gap-6">
                <div class="bg-white overflow-hidden shadow-sm rounded-2xl border border-gray-100 p-6 flex items-center justify-between hover:shadow-md transition duration-200">
                    <div class="flex items-center space-x-4">
                        <div class="p-3 rounded-xl bg-indigo-50 text-indigo-600">
                            <svg class="w-8 h-8" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M20 7l-8-4-8 4m16 0l-8 4m8-4v10l-8 4m0-10L4 11m8 4V4"></path></svg>
                        </div>
                        <div>
                            <p class="text-sm font-medium text-gray-400 uppercase tracking-wider">Total Produk</p>
                            <p class="text-3xl font-extrabold text-gray-900 mt-1">{{ $totalProducts }}</p>
                        </div>
                    </div>
                    <a href="{{ route('products.index') }}" class="text-xs text-indigo-600 font-semibold hover:underline">Lihat Semua</a>
                </div>

                <div class="bg-white overflow-hidden shadow-sm rounded-2xl border border-gray-100 p-6 flex items-center justify-between hover:shadow-md transition duration-200">
                    <div class="flex items-center space-x-4">
                        <div class="p-3 rounded-xl bg-green-50 text-green-600">
                            <svg class="w-8 h-8" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M16 11V7a4 4 0 00-8 0v4M5 9h14l1 12H4L5 9z"></path></svg>
                        </div>
                        <div>
                            <p class="text-sm font-medium text-gray-400 uppercase tracking-wider">Total Order</p>
                            <p class="text-3xl font-extrabold text-gray-900 mt-1">{{ $totalOrders }}</p>
                        </div>
                    </div>
                    <a href="{{ route('orders.index') }}" class="text-xs text-green-600 font-semibold hover:underline">Lihat Semua</a>
                </div>

                <div class="bg-white overflow-hidden shadow-sm rounded-2xl border border-gray-100 p-6 flex items-center space-x-4 hover:shadow-md transition duration-200 sm:col-span-2 lg:col-span-1">
                    <div class="p-3 rounded-xl bg-amber-50 text-amber-600">
                        <svg class="w-8 h-8" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M9 12l2 2 4-4m5.618-4.016A11.955 11.955 0 0112 2.944a11.955 11.955 0 01-8.618 3.04A12.02 12.02 0 003 9c0 5.591 3.824 10.29 9 11.622 5.176-1.332 9-6.03 9-11.622 0-1.042-.133-2.052-.382-3.016z"></path></svg>
                    </div>
                    <div>
                        <p class="text-sm font-medium text-gray-400 uppercase tracking-wider">Status Proteksi</p>
                        <p class="text-lg font-bold text-emerald-600 mt-1 flex items-center">
                            <span class="w-2 h-2 rounded-full bg-emerald-500 inline-block mr-2 animate-pulse"></span>
                            Terhubung & Aman
                        </p>
                    </div>
                </div>
            </div>

            <div class="grid grid-cols-1 lg:grid-cols-3 gap-8">
                
                <div class="bg-white overflow-hidden shadow-sm rounded-2xl border border-gray-100 p-6 lg:col-span-2">
                    <div class="flex justify-between items-center mb-6">
                        <h4 class="text-lg font-bold text-gray-900">Aktivitas Pesanan Terbaru</h4>
                        <span class="px-2.5 py-1 text-xs bg-indigo-50 text-indigo-700 font-semibold rounded-md">Live Data</span>
                    </div>

                    @if($recentOrders->isEmpty())
                        <div class="text-center py-12 text-gray-400 text-sm">
                            Belum ada transaksi order masuk saat ini.
                        </div>
                    @else
                        <div class="overflow-x-auto">
                            <table class="min-w-full divide-y divide-gray-100 text-sm">
                                <thead>
                                    <tr class="text-left text-gray-400 font-medium">
                                        <th class="pb-3">Pelanggan</th>
                                        <th class="pb-3">Produk</th>
                                        <th class="pb-3">Total</th>
                                        <th class="pb-3 text-right">Status</th>
                                    </tr>
                                </thead>
                                <tbody class="divide-y divide-gray-50">
                                    @foreach($recentOrders as $order)
                                    <tr>
                                        <td class="py-3 font-semibold text-gray-900">{{ $order->customer_name }}</td>
                                        <td class="py-3 text-gray-600">{{ $order->product->name ?? 'Produk Dihapus' }} <span class="text-xs text-gray-400">(x{{ $order->quantity }})</span></td>
                                        <td class="py-3 text-gray-900 font-medium">Rp{{ number_format($order->total_price) }}</td>
                                        <td class="py-3 text-right">
                                            <span class="px-2.5 py-0.5 text-xs font-semibold rounded-full 
                                            {{ $order->status === 'completed' ? 'bg-green-50 text-green-700' : ($order->status === 'cancelled' ? 'bg-red-50 text-red-700' : 'bg-yellow-50 text-yellow-700') }}">
                                                {{ ucfirst($order->status) }}
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
                    <div class="bg-white overflow-hidden shadow-sm rounded-2xl border border-gray-100 p-6">
                        <h4 class="text-lg font-bold text-gray-900 mb-4">Navigasi Kilat</h4>
                        <div class="space-y-3">
                            <a href="{{ route('products.create') }}" class="flex items-center justify-between p-3 rounded-xl bg-gray-50 hover:bg-indigo-50 hover:text-indigo-700 transition duration-150 text-sm font-medium text-gray-700">
                                <span class="flex items-center">✨ Tambah Produk Baru</span>
                                <svg class="w-4 h-4" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M9 5l7 7-7 7"></path></svg>
                            </a>
                            <a href="{{ route('products.index') }}" class="flex items-center justify-between p-3 rounded-xl bg-gray-50 hover:bg-indigo-50 hover:text-indigo-700 transition duration-150 text-sm font-medium text-gray-700">
                                <span class="flex items-center">📦 Kelola Katalog Produk</span>
                                <svg class="w-4 h-4" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M9 5l7 7-7 7"></path></svg>
                            </a>
                            <a href="{{ route('orders.index') }}" class="flex items-center justify-between p-3 rounded-xl bg-gray-50 hover:bg-green-50 hover:text-green-700 transition duration-150 text-sm font-medium text-gray-700">
                                <span class="flex items-center">📊 Semua Riwayat Transaksi</span>
                                <svg class="w-4 h-4" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M9 5l7 7-7 7"></path></svg>
                            </a>
                        </div>
                    </div>
                </div>

            </div>

        </div>
    </div>
</x-app-layout>