<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>Coffee Shop - Nikmati Kopi Terbaik Anda</title>
    <link rel="preconnect" href="https://fonts.bunny.net">
    <link href="https://fonts.bunny.net/css?family=figtree:400,500,600,700,800&display=swap" rel="stylesheet" />
    @vite(['resources/css/app.css', 'resources/js/app.js'])
</head>
<body class="antialiased bg-stone-50 text-stone-800 font-['Figtree']">

    <nav class="bg-white/80 backdrop-blur-md sticky top-0 z-50 border-b border-stone-100">
        <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8">
            <div class="flex justify-between h-16 items-center">
                <div class="flex-shrink-0 flex items-center space-x-2">
                    <span class="text-2xl">☕</span>
                    <span class="font-extrabold text-xl tracking-wider text-amber-900">KopiKita</span>
                </div>
                
                <div class="hidden sm:flex space-x-8 font-medium text-stone-600 text-sm">
                    <a href="#hero" class="hover:text-amber-800 transition">Beranda</a>
                    <a href="#features" class="hover:text-amber-800 transition">Keunggulan</a>
                    <a href="#menu" class="hover:text-amber-800 transition">Daftar Menu</a>
                    <a href="#kontak" class="hover:text-amber-800 transition">Kontak</a>
                </div>

                <div class="flex items-center space-x-4">
                    @if (Route::has('login'))
                        @auth
                            <a href="{{ url('/dashboard') }}" class="text-sm font-semibold text-amber-950 bg-amber-100 px-4 py-2 rounded-xl hover:bg-amber-200 transition">Dashboard Admin</a>
                        @else
                            <a href="{{ route('login') }}" class="text-sm font-medium text-stone-600 hover:text-amber-900 transition">Masuk</a>
                      
                        @endauth
                    @endif
                </div>
            </div>
        </div>
    </nav>

    <header id="hero" class="relative bg-stone-900 text-white overflow-hidden">
        <div class="absolute inset-0 opacity-40 bg-[url('https://images.unsplash.com/photo-1501339847302-ac426a4a7cbb?q=80&w=1600')] bg-cover bg-center"></div>
        <div class="absolute inset-0 bg-gradient-to-t from-stone-900 via-stone-900/60 to-transparent"></div>

        <div class="relative max-w-7xl mx-auto px-4 sm:px-6 lg:px-8 py-24 md:py-32 flex flex-col items-center text-center z-10">
            <span class="inline-flex items-center gap-1.5 py-1.5 px-3 rounded-full text-xs font-semibold bg-amber-500/20 text-amber-400 border border-amber-500/30 mb-5">
                ✨ Premium Coffee Roasters
            </span>
            <h1 class="text-4xl sm:text-5xl md:text-6xl font-black tracking-tight max-w-3xl leading-tight">
                Awali Hari Anda dengan Secangkir <span class="text-amber-400">Kehangatan</span>
            </h1>
            <p class="mt-6 text-lg text-stone-300 max-w-2xl font-light leading-relaxed">
                Dibuat dari biji kopi pilihan nusantara yang dipanggang dengan penuh ketelitian oleh barista berpengalaman demi menciptakan cita rasa yang sempurna.
            </p>
            <div class="mt-10 flex flex-col sm:flex-row gap-4 justify-center w-full sm:w-auto">
                <a href="#menu" class="px-8 py-3.5 bg-amber-500 text-amber-950 font-bold rounded-xl shadow-lg hover:bg-amber-400 transition text-center">
                    Lihat Daftar Menu
                </a>
                <a href="#kontak" class="px-8 py-3.5 bg-white/10 backdrop-blur-sm text-white font-semibold rounded-xl border border-white/20 hover:bg-white/20 transition text-center">
                    Lokasi & Jam Buka
                </a>
            </div>
        </div>
    </header>

    <section id="features" class="py-20 max-w-7xl mx-auto px-4 sm:px-6 lg:px-8">
        <div class="text-center max-w-xl mx-auto mb-16">
            <h2 class="text-3xl font-extrabold text-amber-950">Mengapa Memilih Kopi Kita?</h2>
            <p class="text-stone-500 mt-2">Kami menjaga kualitas setiap tetes kopi yang dihidangkan di meja Anda.</p>
        </div>

        <div class="grid grid-cols-1 md:grid-cols-3 gap-8">
            <div class="bg-white p-8 rounded-2xl border border-stone-100 shadow-sm flex flex-col items-center text-center">
                <div class="w-12 h-12 bg-amber-50 rounded-xl flex items-center justify-center text-2xl text-amber-700 mb-5">🌱</div>
                <h3 class="font-bold text-xl text-stone-900 mb-2">100% Biji Kopi Organik</h3>
                <p class="text-stone-500 text-sm leading-relaxed">Dipasok langsung dari petani lokal terbaik guna mendukung ekosistem pertanian berkelanjutan.</p>
            </div>
            <div class="bg-white p-8 rounded-2xl border border-stone-100 shadow-sm flex flex-col items-center text-center">
                <div class="w-12 h-12 bg-amber-50 rounded-xl flex items-center justify-center text-2xl text-amber-700 mb-5">🔥</div>
                <h3 class="font-bold text-xl text-stone-900 mb-2">Dipanggang Segar</h3>
                <p class="text-stone-500 text-sm leading-relaxed">Proses roasting dilakukan secara berkala dalam jumlah kecil demi menjaga profil rasa asli biji kopi.</p>
            </div>
            <div class="bg-white p-8 rounded-2xl border border-stone-100 shadow-sm flex flex-col items-center text-center">
                <div class="w-12 h-12 bg-amber-50 rounded-xl flex items-center justify-center text-2xl text-amber-700 mb-5">🧑‍🍳</div>
                <h3 class="font-bold text-xl text-stone-900 mb-2">Barista Berdedikasi</h3>
                <p class="text-stone-500 text-sm leading-relaxed">Diseduh dengan teknik presisi tinggi untuk menghasilkan cangkir kopi yang kaya akan aroma.</p>
            </div>
        </div>
    </section>

    <section id="menu" class="py-20 bg-amber-50/30">
        <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8">
            <div class="text-center max-w-xl mx-auto mb-12">
                <h2 class="text-3xl font-extrabold text-amber-950">Daftar Menu Kedai Kami</h2>
                <p class="text-stone-500 mt-2">Pilih racikan favorit Anda mulai dari kopi espresso, non-kopi, hingga cemilan hangat pendamping santai.</p>
            </div>

            @if($products->isEmpty())
                <div class="bg-white rounded-2xl p-12 text-center shadow-sm border border-stone-100 max-w-md mx-auto">
                    <span class="text-4xl">📋</span>
                    <h3 class="font-bold text-lg text-stone-800 mt-4">Menu Belum Tersedia</h3>
                    <p class="text-stone-500 text-sm mt-1">Admin belum memasukkan daftar menu ke dalam katalog database.</p>
                </div>
            @else
                <div class="grid grid-cols-1 sm:grid-cols-2 lg:grid-cols-4 gap-6">
                    @foreach($products as $product)
                        <div class="bg-white rounded-2xl overflow-hidden shadow-sm border border-stone-100 group hover:shadow-md transition duration-200">
                            
                            <div class="h-48 bg-stone-100 overflow-hidden relative">
                                @if(isset($product->image) && $product->image)
                                    <img src="{{ asset('storage/' . $product->image) }}" class="w-full h-full object-cover group-hover:scale-105 transition duration-300" alt="{{ $product->name }}">
                                @else
                                    <img src="https://images.unsplash.com/photo-1541167760496-1628856ab772?q=80&w=600" class="w-full h-full object-cover group-hover:scale-105 transition duration-300" alt="{{ $product->name }}">
                                @endif
                                
                                @if(isset($product->category))
                                    <span class="absolute top-3 left-3 px-2 py-0.5 bg-amber-900/90 backdrop-blur-sm text-white text-[10px] font-bold rounded-md uppercase tracking-wider">
                                        {{ $product->category }}
                                    </span>
                                @endif
                            </div>

                            <div class="p-5">
                                <h3 class="font-bold text-lg text-stone-900 line-clamp-1">{{ $product->name }}</h3>
                                
                                <p class="text-xs text-stone-400 mt-1 line-clamp-2">
                                    {{ $product->description ?? 'Racikan menu istimewa pilihan dari barista KopiKita.' }}
                                </p>
                                
                                <div class="flex justify-between items-center mt-4 pt-4 border-t border-stone-50">
                                    <span class="text-xs text-stone-400 font-medium">Harga</span>
                                    <span class="font-extrabold text-amber-900 text-lg">
                                        Rp{{ number_format($product->price, 0, ',', '.') }}
                                    </span>
                                </div>
                            </div>
                        </div>
                    @endforeach
                </div>
            @endif
        </div>
    </section>

    <section id="kontak" class="py-20 max-w-7xl mx-auto px-4 sm:px-6 lg:px-8 border-t border-stone-100">
        <div class="grid grid-cols-1 md:grid-cols-2 gap-12 items-center">
            <div>
                <h2 class="text-3xl font-extrabold text-amber-950 mb-4">Mampir Ke Kedai Kami</h2>
                <p class="text-stone-500 mb-6 leading-relaxed">
                    Kami menyediakan ruang yang nyaman lengkap dengan koneksi Wi-Fi kencang untuk Anda yang ingin bekerja maupun sekadar mengobrol santai.
                </p>
                <div class="space-y-4 text-stone-600">
                    <div class="flex items-start space-x-3">
                        <span class="text-amber-800 font-bold min-w-[70px]">📍 Lokasi:</span>
                        <span>Jl. Pangeran Diponegoro No. 23, Kota Bandung, Jawa Barat</span>
                    </div>
                    <div class="flex items-start space-x-3">
                        <span class="text-amber-800 font-bold min-w-[70px]">⏰ Jam:</span>
                        <div>
                            <p>Senin - Jumat: 09.00 - 22.00 WIB</p>
                            <p>Sabtu - Minggu: 08.00 - 23.00 WIB</p>
                        </div>
                    </div>
                    <div class="flex items-start space-x-3">
                        <span class="text-amber-800 font-bold min-w-[70px]">📞 Kontak:</span>
                        <span>+62 812-3456-7890</span>
                    </div>
                </div>
            </div>
            <div class="h-72 bg-stone-200 rounded-2xl overflow-hidden shadow-inner relative">
                <iframe class="w-full h-full border-0 grayscale hover:grayscale-0 transition duration-300" src="https://maps.google.com/maps?q=bandung&t=&z=13&ie=UTF8&iwloc=&output=embed" allowfullscreen="" loading="lazy"></iframe>
            </div>
        </div>
    </section>

    <footer class="bg-stone-900 text-stone-400 py-8 text-center text-sm border-t border-stone-800">
        <p>© {{ date('Y') }} KopiKita. Hak Cipta Dilindungi Undang-Undang.</p>
    </footer>

</body>
</html>