<x-guest-layout>
    <div class="min-h-screen flex flex-col justify-center items-center bg-stone-50 px-4 py-12 relative overflow-hidden">
        
        <div class="absolute -top-40 -left-40 w-96 h-96 bg-amber-200/40 rounded-full blur-3xl pointer-events-none"></div>
        <div class="absolute -bottom-40 -right-40 w-96 h-96 bg-orange-200/30 rounded-full blur-3xl pointer-events-none"></div>

        <div class="w-full sm:max-w-md bg-white/80 backdrop-blur-md p-8 rounded-3xl shadow-2xl border border-stone-200/60 z-10">
            
            <div class="text-center mb-8">
                <div class="inline-flex items-center justify-center w-16 h-16 rounded-2xl bg-gradient-to-br from-amber-100 to-amber-50 text-3xl mb-4 shadow-inner ring-4 ring-amber-50/50">
                    ☕
                </div>
                <h2 class="text-2xl font-black text-stone-900 tracking-tight">
                    KopiKita <span class="text-amber-800 font-medium text-xl">POS</span>
                </h2>
                <p class="text-xs text-stone-500 mt-1.5 uppercase tracking-widest font-semibold">Sistem Manajemen Kasir</p>
            </div>

            <x-auth-session-status class="mb-4" :status="session('status')" />

            <form method="POST" action="{{ route('login') }}" class="space-y-5">
                @csrf

                <div>
                    <x-input-label for="email" :value="__('Email Kasir / Admin')" class="text-stone-700 text-xs font-bold uppercase tracking-wider" />
                    <div class="mt-1.5 relative rounded-xl shadow-sm">
                        <div class="absolute inset-y-0 left-0 pl-3.5 flex items-center pointer-events-none text-stone-400">
                            <svg class="h-5 w-5" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M16 12a4 4 0 10-8 0 4 4 0 008 0zm0 0v1.5a2.5 2.5 0 005 0V12a9 9 0 10-9 9m4.5-1.206a8.959 8.959 0 01-4.5 1.206" /></svg>
                        </div>
                        <x-text-input id="email" class="block w-full pl-11 pr-4 py-3 bg-stone-50/50 border-stone-200 focus:border-amber-800 focus:ring-amber-800/20 rounded-xl transition placeholder-stone-400 text-sm" type="email" name="email" :value="old('email')" required autofocus autocomplete="username" placeholder="nama@kopikita.com" />
                    </div>
                    <x-input-error :messages="$errors->get('email')" class="mt-1.5 text-xs text-red-500" />
                </div>

                <div>
                    <x-input-label for="password" :value="__('Kata Sandi')" class="text-stone-700 text-xs font-bold uppercase tracking-wider" />
                    <div class="mt-1.5 relative rounded-xl shadow-sm">
                        <div class="absolute inset-y-0 left-0 pl-3.5 flex items-center pointer-events-none text-stone-400">
                            <svg class="h-5 w-5" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M12 15v2m-6 4h12a2 2 0 002-2v-6a2 2 0 00-2-2H6a2 2 0 00-2 2v6a2 2 0 002 2zm10-10V7a4 4 0 00-8 0v4h8z" /></svg>
                        </div>
                        <x-text-input id="password" class="block w-full pl-11 pr-4 py-3 bg-stone-50/50 border-stone-200 focus:border-amber-800 focus:ring-amber-800/20 rounded-xl transition placeholder-stone-400 text-sm"
                                        type="password"
                                        name="password"
                                        required autocomplete="current-password"
                                        placeholder="••••••••" />
                    </div>
                    <x-input-error :messages="$errors->get('password')" class="mt-1.5 text-xs text-red-500" />
                </div>

                <div class="flex items-center justify-between text-sm pt-1">
                    <label for="remember_me" class="inline-flex items-center cursor-pointer select-none">
                        <input id="remember_me" type="checkbox" class="rounded-md border-stone-300 text-amber-800 shadow-sm focus:ring-amber-800/30 focus:ring-offset-0" name="remember">
                        <span class="ms-2 text-xs text-stone-500 font-medium">{{ __('Ingat saya') }}</span>
                    </label>

                    @if (Route::has('password.request'))
                        <a class="text-xs font-semibold text-amber-800 hover:text-amber-950 hover:underline transition" href="{{ route('password.request') }}">
                            {{ __('Lupa password?') }}
                        </a>
                    @endif
                </div>

                <div class="pt-2">
                    <button type="submit" class="w-full flex justify-center items-center space-x-2 py-3 px-4 border border-transparent rounded-xl shadow-md text-sm font-bold text-white bg-gradient-to-r from-amber-800 to-amber-900 hover:from-amber-900 hover:to-amber-950 focus:outline-none focus:ring-2 focus:ring-offset-2 focus:ring-amber-700 transition duration-150 transform active:scale-[0.98]">
                        <span>Buka Meja Kasir</span>
                        <svg class="w-4 h-4" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M14 5l7 7m0 0l-7 7m7-7H3" /></svg>
                    </button>
                </div>
            </form>
            
        </div>

        <p class="text-center text-xs text-stone-400 mt-8 z-10">
            © {{ date('Y') }} KopiKita POS System. Terhubung secara aman.
        </p>
    </div>
</x-guest-layout>