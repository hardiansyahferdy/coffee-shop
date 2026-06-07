<x-app-layout>
    <x-slot name="header">
        <div class="flex justify-between items-center">
            <h2 class="font-semibold text-xl text-gray-800 leading-tight">Daftar Order</h2>
            <a href="{{ route('orders.create') }}" class="bg-green-600 hover:bg-green-700 text-white font-medium py-2 px-4 rounded-md text-sm">Buat Transaksi</a>
        </div>
    </x-slot>

    @if(session('success'))
    <div id="successModal" class="fixed inset-0 z-50 flex items-center justify-center p-4 bg-black bg-opacity-40 transition-opacity duration-300">
        <div class="bg-white rounded-lg shadow-xl max-w-sm w-full p-6 text-center transform transition-all duration-300 scale-100 border-t-4 border-green-500">
            <div class="mx-auto flex items-center justify-center h-12 w-12 rounded-full bg-green-100 mb-4">
                <svg class="h-6 w-6 text-green-600" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M5 13l4 4L19 7"></path>
                </svg>
            </div>
            
            <h3 class="text-lg font-semibold text-gray-900 mb-1">Berhasil!</h3>
            <p class="text-sm text-gray-500 mb-6">{{ session('success') }}</p>
            
            <button onclick="closeModal()" class="w-full bg-green-600 hover:bg-green-700 text-white font-medium py-2 px-4 rounded-md text-sm shadow-sm transition-colors duration-200">
                Oke, Mengerti
            </button>
        </div>
    </div>

    <script>
        function closeModal() {
            const modal = document.getElementById('successModal');
            if (modal) {
                modal.style.opacity = '0';
                setTimeout(() => {
                    modal.remove();
                }, 300); // Menghapus elemen setelah animasi transisi memudar selesai
            }
        }

        // Otomatis menutup dalam 4 detik jika tidak diklik
        setTimeout(() => {
            closeModal();
        }, 4000);
    </script>
    @endif

    <div class="py-12">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
            <div class="bg-white overflow-hidden shadow-sm sm:rounded-lg p-6">
                <table class="min-w-full divide-y divide-gray-200">
                    <thead class="bg-gray-50">
                        <tr>
                            <th class="px-6 py-3 text-left text-xs font-semibold text-gray-500 uppercase">Pelanggan</th>
                            <th class="px-6 py-3 text-left text-xs font-semibold text-gray-500 uppercase">Produk</th>
                            <th class="px-6 py-3 text-left text-xs font-semibold text-gray-500 uppercase">Qty</th>
                            <th class="px-6 py-3 text-left text-xs font-semibold text-gray-500 uppercase">Total</th>
                            <th class="px-6 py-3 text-left text-xs font-semibold text-gray-500 uppercase">Status</th>
                            <th class="px-6 py-3 text-left text-xs font-semibold text-gray-500 uppercase">Aksi</th>
                        </tr>
                    </thead>
                    <tbody class="divide-y divide-gray-200">
                        @foreach($orders as $order)
                        <tr>
                            <td class="px-6 py-4 font-medium">{{ $order->customer_name }}</td>
                            <td class="px-6 py-4">{{ $order->product->name ?? 'Produk Dihapus' }}</td>
                            <td class="px-6 py-4">{{ $order->quantity }}</td>
                            <td class="px-6 py-4">Rp{{ number_format($order->total_price) }}</td>
                            <td class="px-6 py-4">
                                <span class="px-2 py-1 text-xs font-medium rounded-full 
                                {{ $order->status === 'completed' ? 'bg-green-100 text-green-800' : ($order->status === 'cancelled' ? 'bg-red-100 text-red-800' : 'bg-yellow-100 text-yellow-800') }}">
                                    {{ ucfirst($order->status) }}
                                </span>
                            </td>
                            <td class="px-6 py-4 text-sm">
                                <a href="{{ route('orders.edit', $order->id) }}" class="text-indigo-600 hover:underline">Ubah Status</a>
                            </td>
                        </tr>
                        @endforeach
                    </tbody>
                </table>
            </div>
        </div>
    </div>
</x-app-layout>