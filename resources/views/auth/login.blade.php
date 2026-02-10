<x-guest-layout>
    <x-auth-session-status class="mb-4" :status="session('status')" />

    <div class="mb-6 text-center">
        <h2 class="text-2xl font-bold text-[#3A6F43]">Selamat Datang</h2>
        <p class="text-sm text-gray-500 italic">Silakan masuk ke akun peminjaman alat</p>
    </div>

    <form method="POST" action="{{ route('login') }}">
        @csrf

        <div>
            <x-input-label for="email" :value="__('Alamat Email')" class="text-[#3A6F43] font-semibold" />
            <x-text-input id="email" 
                class="block mt-1 w-full border-[#FDAAAA] focus:border-[#59AC77] focus:ring-[#59AC77] rounded-lg shadow-sm bg-[#FFD5D5]" 
                type="email" name="email" :value="old('email')" required autofocus autocomplete="username" />
            <x-input-error :messages="$errors->get('email')" class="mt-2" />
        </div>

        <div class="mt-4">
            <x-input-label for="password" :value="__('Kata Sandi')" class="text-[#3A6F43] font-semibold" />
            <x-text-input id="password" 
                class="block mt-1 w-full border-[#FDAAAA] focus:border-[#59AC77] focus:ring-[#59AC77] rounded-lg shadow-sm bg-[#FFD5D5]"
                type="password"
                name="password"
                required autocomplete="current-password" />
            <x-input-error :messages="$errors->get('password')" class="mt-2" />
        </div>

        <div class="block mt-4">
            <label for="remember_me" class="inline-flex items-center">
                <input id="remember_me" type="checkbox" class="rounded border-[#FDAAAA] text-[#59AC77] shadow-sm focus:ring-[#59AC77]" name="remember">
                <span class="ms-2 text-sm text-[#3A6F43]">{{ __('Ingat saya') }}</span>
            </label>
        </div>

        <div class="flex flex-col space-y-4 mt-6">
            <x-primary-button class="w-full justify-center py-3 bg-[#59AC77] hover:bg-[#3A6F43] active:bg-[#3A6F43] transition duration-300 shadow-lg shadow-green-100 uppercase tracking-widest font-bold">
                {{ __('Masuk Sekarang') }}
            </x-primary-button>

            <div class="flex flex-col space-y-2 text-center">
                @if (Route::has('password.request'))
                    <a class="text-xs text-[#3A6F43] hover:text-[#59AC77] transition duration-150 underline decoration-[#FDAAAA]" href="{{ route('password.request') }}">
                        {{ __('Lupa kata sandi Anda?') }}
                    </a>
                @endif
                
                <a class="text-sm text-[#3A6F43] hover:text-[#59AC77] transition duration-150 font-medium" href="{{ route('register') }}">
                    {{ __('Belum punya akun? Daftar di sini') }}
                </a>
            </div>
        </div>
    </form>
</x-guest-layout>