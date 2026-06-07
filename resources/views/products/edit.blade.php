<x-app-layout>
    <x-slot name="header">
        <div class="flex items-center space-x-3">
            <a href="{{ route('products.index') }}" class="inline-flex items-center justify-center w-9 h-9 text-gray-500 bg-white hover:text-gray-700 rounded-xl border border-gray-200 shadow-sm transition-all hover:shadow">
                <svg class="w-5 h-5" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M10 19l-7-7m0 0l7-7m-7 7h18"></path>
                </svg>
            </a>
            <h2 class="font-bold text-xl text-gray-800 leading-tight">Edit Produk</h2>
        </div>
    </x-slot>

    <div class="py-12 bg-gray-50/50 min-h-screen">
        <div class="max-w-3xl mx-auto sm:px-6 lg:px-8">
            
            @if($errors->any())
                <div class="mb-6 bg-red-50 border border-red-100 text-red-700 p-4 rounded-2xl text-sm flex items-start space-x-3 shadow-sm animate-fade-in">
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
                <div class="p-6 sm:p-10">
                    <form action="{{ route('products.update', $product->id) }}" method="POST" enctype="multipart/form-data" class="space-y-6">
                        @csrf 
                        @method('PUT')
                        
                        <div>
                            <label class="block text-sm font-bold text-gray-700 mb-2 tracking-wide">Nama Produk <span class="text-red-500">*</span></label>
                            <input type="text" name="name" value="{{ old('name', $product->name) }}" 
                                class="block w-full rounded-xl border-gray-300 px-4 py-3 text-gray-900 placeholder-gray-400 focus:border-indigo-500 focus:ring-4 focus:ring-indigo-100 shadow-sm transition-all text-sm" 
                                placeholder="Masukkan nama barang dagangan Anda" required>
                        </div>

                        <div>
                            <label class="block text-sm font-bold text-gray-700 mb-2 tracking-wide">Deskripsi Produk</label>
                            <textarea name="description" rows="4" 
                                class="block w-full rounded-xl border-gray-300 px-4 py-3 text-gray-900 placeholder-gray-400 focus:border-indigo-500 focus:ring-4 focus:ring-indigo-100 shadow-sm transition-all text-sm resize-none" 
                                placeholder="Jelaskan spesifikasi detail, keunggulan, atau kelengkapan produk...">{{ old('description', $product->description) }}</textarea>
                        </div>

                        <div class="grid grid-cols-1 sm:grid-cols-2 gap-6">
                            <div>
                                <label class="block text-sm font-bold text-gray-700 mb-2 tracking-wide">Harga Jual <span class="text-red-500">*</span></label>
                                <div class="relative rounded-xl shadow-sm">
                                    <div class="absolute inset-y-0 left-0 pl-4 flex items-center pointer-events-none">
                                        <span class="text-gray-400 text-sm font-semibold">Rp</span>
                                    </div>
                                    <input type="number" name="price" value="{{ old('price', $product->price) }}" min="0"
                                        class="block w-full rounded-xl border-gray-300 pl-11 pr-4 py-3 text-gray-900 placeholder-gray-400 focus:border-indigo-500 focus:ring-4 focus:ring-indigo-100 transition-all text-sm" 
                                        placeholder="0" required>
                                </div>
                            </div>

                            <div>
                                <label class="block text-sm font-bold text-gray-700 mb-2 tracking-wide">Jumlah Stok <span class="text-red-500">*</span></label>
                                <div class="relative rounded-xl shadow-sm">
                                    <input type="number" name="stock" value="{{ old('stock', $product->stock) }}" min="0"
                                        class="block w-full rounded-xl border-gray-300 px-4 py-3 text-gray-900 placeholder-gray-400 focus:border-indigo-500 focus:ring-4 focus:ring-indigo-100 shadow-sm transition-all text-sm" 
                                        placeholder="0" required>
                                    <div class="absolute inset-y-0 right-0 pr-4 flex items-center pointer-events-none">
                                        <span class="text-gray-400 text-xs font-medium">Pcs</span>
                                    </div>
                                </div>
                            </div>
                        </div>

                        <div>
                            <label class="block text-sm font-bold text-gray-700 mb-2 tracking-wide">Foto Produk</label>
                            
                            <div class="flex flex-col sm:flex-row items-center space-y-4 sm:space-y-0 sm:space-x-6 bg-gray-50/70 p-5 rounded-2xl border-2 border-dashed border-gray-300/80 hover:border-indigo-400 transition-colors">
                                <div class="w-28 h-28 bg-white rounded-2xl flex-shrink-0 flex items-center justify-center overflow-hidden border border-gray-200 shadow-inner relative group">
                                    @if($product->image)
                                        <img id="imagePreview" src="{{ asset('storage/' . $product->image) }}" alt="Preview" class="w-full h-full object-cover">
                                        <div id="imagePlaceholder" class="hidden text-gray-400 text-center p-2">
                                            <svg class="mx-auto h-7 w-7 text-gray-400" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="1.5" d="M4 16l4.586-4.586a2 2 0 012.828 0L16 16m-2-2l1.586-1.586a2 2 0 012.828 0L20 14m-6-6h.01M6 20h12a2 2 0 002-2V6a2 2 0 00-2-2H6a2 2 0 00-2 2v12a2 2 0 002 2z"></path>
                                            </svg>
                                        </div>
                                    @else
                                        <img id="imagePreview" src="#" alt="Preview" class="hidden w-full h-full object-cover">
                                        <div id="imagePlaceholder" class="text-gray-400 text-center p-2">
                                            <svg class="mx-auto h-7 w-7 text-gray-400" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="1.5" d="M4 16l4.586-4.586a2 2 0 012.828 0L16 16m-2-2l1.586-1.586a2 2 0 012.828 0L20 14m-6-6h.01M6 20h12a2 2 0 002-2V6a2 2 0 00-2-2H6a2 2 0 00-2 2v12a2 2 0 002 2z"></path>
                                            </svg>
                                            <span class="text-[10px] text-gray-400 block mt-1 font-medium">Belum ada foto</span>
                                        </div>
                                    @endif
                                </div>
                                
                                <div class="flex-1 w-full text-center sm:text-left">
                                    <input type="file" name="image" id="imageInput" accept="image/*"
                                        class="block w-full text-sm text-gray-500 file:mr-4 file:py-2.5 file:px-4 file:rounded-xl file:border-0 file:text-sm file:font-semibold file:bg-indigo-50 file:text-indigo-700 hover:file:bg-indigo-100 file:cursor-pointer transition-colors shadow-sm file:shadow-sm">
                                    <p class="mt-2 text-xs text-gray-400">Pilih file baru jika ingin mengganti foto saat ini. <span class="font-semibold">(Maks. 2MB)</span></p>
                                </div>
                            </div>
                        </div>

                        <div class="flex items-center justify-end space-x-3 pt-6 border-t border-gray-100">
                            <a href="{{ route('products.index') }}" 
                                class="bg-white border border-gray-300 hover:bg-gray-50 text-gray-700 font-semibold py-2.5 px-5 rounded-xl text-sm transition-all shadow-sm hover:shadow">
                                Batal
                            </a>
                            <button type="submit" 
                                class="bg-indigo-600 hover:bg-indigo-700 text-white font-semibold py-2.5 px-6 rounded-xl text-sm transition-all shadow-sm hover:shadow-lg hover:shadow-indigo-600/20 focus:outline-none focus:ring-2 focus:ring-offset-2 focus:ring-indigo-500">
                                Perbarui Produk
                            </button>
                        </div>
                    </form>
                </div>
            </div>

        </div>
    </div>

    <script>
        document.getElementById('imageInput').addEventListener('change', function(event) {
            const file = event.target.files[0];
            const preview = document.getElementById('imagePreview');
            const placeholder = document.getElementById('imagePlaceholder');
            const defaultSrc = "{{ $product->image ? asset('storage/' . $product->image) : '#' }}";

            if (file) {
                const reader = new FileReader();
                reader.onload = function(e) {
                    preview.src = e.target.result;
                    preview.classList.remove('hidden');
                    if(placeholder) placeholder.classList.add('hidden');
                }
                reader.readAsDataURL(file);
            } else {
                if(defaultSrc !== '#') {
                    preview.src = defaultSrc;
                    preview.classList.remove('hidden');
                    if(placeholder) placeholder.classList.add('hidden');
                } else {
                    preview.src = "#";
                    preview.classList.add('hidden');
                    if(placeholder) placeholder.classList.remove('hidden');
                }
            }
        });
    </script>
</x-app-layout>