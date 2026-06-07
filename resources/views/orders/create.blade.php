<x-app-layout>
    <x-slot name="header">
        <div class="flex items-center space-x-3">
            <a href="{{ route('orders.index') }}" class="inline-flex items-center justify-center w-9 h-9 text-gray-500 bg-white hover:text-gray-700 rounded-xl border border-gray-200 shadow-sm transition-all hover:shadow">
                <svg class="w-5 h-5" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M10 19l-7-7m0 0l7-7m-7 7h18"></path>
                </svg>
            </a>
            <h2 class="font-bold text-xl text-gray-800 leading-tight">Buat Order Baru</h2>
        </div>
    </x-slot>

    <div class="py-12 bg-gray-50/50 min-h-screen">
        <div class="max-w-2xl mx-auto sm:px-6 lg:px-8">
            
            @if($errors->any())
                <div class="mb-6 bg-red-50 border border-red-100 text-red-700 p-4 rounded-2xl text-sm flex items-start space-x-3 shadow-sm">
                    <div class="p-1 bg-red-100 rounded-lg text-red-600 flex-shrink-0">
                        <svg class="w-5 h-5" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M12 9v2m0 4h.01m-6.938 4h13.856c1.54 0 2.502-1.667 1.732-3L13.732 4c-.77-1.333-2.694-1.333-3.464 0L3.34 16c-.77 1.333.192 3 1.732 3z"></path>
                        </svg>
                    </div>
                    <div>
                        <span class="font-bold text-base block mb-1">Terjadi Kesalahan Input</span>
                        <ul class="list-disc list-inside space-y-0.5 opacity-90 text-red-600/90">
                            @foreach ($errors->all() as $error)
                                <li>{{ $error }}</li>
                            @endforeach
                        </ul>
                    </div>
                </div>
            @endif

            <div class="bg-white rounded-2xl shadow-sm border border-gray-200/60 overflow-hidden">
                <div class="p-6 sm:p-8">
                    <form action="{{ route('orders.store') }}" method="POST" class="space-y-6">
                        @csrf
                        
                        <div>
                            <label class="block text-sm font-bold text-gray-700 mb-2 tracking-wide">Nama Pelanggan <span class="text-red-500">*</span></label>
                            <div class="relative rounded-xl shadow-sm">
                                <input type="text" name="customer_name" value="{{ old('customer_name') }}"
                                    class="block w-full rounded-xl border-gray-300 px-4 py-3 text-gray-900 placeholder-gray-400 focus:border-green-500 focus:ring-4 focus:ring-green-100 shadow-sm transition-all text-sm" 
                                    placeholder="Masukkan nama lengkap pelanggan" required>
                            </div>
                        </div>

                        <div>
                            <label class="block text-sm font-bold text-gray-700 mb-2 tracking-wide">Pilih Produk <span class="text-red-500">*</span></label>
                            <select name="product_id" 
                                class="block w-full rounded-xl border-gray-300 px-4 py-3 text-gray-900 focus:border-green-500 focus:ring-4 focus:ring-green-100 shadow-sm transition-all text-sm appearance-none bg-no-repeat bg-right"
                                style="background-image: url('data:image/svg+xml;utf8,<svg xmlns=\'http://www.w3.org/2000/svg\' fill=\'none\' viewBox=\'0 0 24 24\' stroke=\'%236B7280\'><path stroke-linecap=\'round\' stroke-linejoin=\'round\' stroke-width=\'2\' d=\'M19 9l-7 7-7-7\'/></svg>'); background-size: 1.25rem; background-position: calc(100% - 1rem) center;" required>
                                <option value="" disabled selected class="text-gray-400">-- Pilih produk yang dipesan --</option>
                                @foreach($products as $product)
                                    <option value="{{ $product->id }}" {{ old('product_id') == $product->id ? 'selected' : '' }}>
                                        {{ $product->name }} (Stok: {{ $product->stock }} | Rp{{ number_format($product->price, 0, ',', '.') }})
                                    </option>
                                @endforeach
                            </select>
                        </div>

                        <div>
                            <label class="block text-sm font-bold text-gray-700 mb-2 tracking-wide">Jumlah Kuantitas (Qty) <span class="text-red-500">*</span></label>
                            <div class="relative rounded-xl shadow-sm">
                                <input type="number" name="quantity" value="{{ old('quantity', 1) }}" min="1" 
                                    class="block w-full rounded-xl border-gray-300 px-4 py-3 text-gray-900 placeholder-gray-400 focus:border-green-500 focus:ring-4 focus:ring-green-100 shadow-sm transition-all text-sm" 
                                    placeholder="1" required>
                                <div class="absolute inset-y-0 right-0 pr-4 flex items-center pointer-events-none">
                                    <span class="text-gray-400 text-xs font-medium">Item</span>
                                </div>
                            </div>
                        </div>

                        <div class="flex items-center justify-end space-x-3 pt-6 border-t border-gray-100">
                            <a href="{{ route('orders.index') }}" 
                                class="bg-white border border-gray-300 hover:bg-gray-50 text-gray-700 font-semibold py-2.5 px-5 rounded-xl text-sm transition-all shadow-sm hover:shadow">
                                Batal
                            </a>
                            <button type="submit" 
                                class="bg-green-600 hover:bg-green-700 text-white font-semibold py-2.5 px-6 rounded-xl text-sm transition-all shadow-sm hover:shadow-lg hover:shadow-green-600/20 focus:outline-none focus:ring-2 focus:ring-offset-2 focus:ring-green-500">
                                Checkout Order
                            </button>
                        </div>
                    </form>
                </div>
            </div>

        </div>
    </div>
</x-app-layout>