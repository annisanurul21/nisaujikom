<x-guest-layout>
    <div class="mb-6 text-center">
        <h2 class="text-2xl font-bold text-[#3A6F43]">Buat Akun Baru</h2>
        <p class="text-sm text-gray-500 italic">Bergabunglah bersama kami hari ini</p>
    </div>

    <form method="POST" action="{{ route('register') }}">
        @csrf

        <div>
            <x-input-label for="name" :value="__('Nama Lengkap')" class="text-[#3A6F43] font-semibold" />
            <x-text-input id="name" 
                class="block mt-1 w-full border-[#FDAAAA] focus:border-[#59AC77] focus:ring-[#59AC77] rounded-lg shadow-sm bg-[#FFD5D5]" 
                type="text" name="name" :value="old('name')" required autofocus autocomplete="name" />
            <x-input-error :messages="$errors->get('name')" class="mt-2" />
        </div>

        <div class="mt-4">
            <x-input-label for="email" :value="__('Alamat Email')" class="text-[#3A6F43] font-semibold" />
            <x-text-input id="email" 
                class="block mt-1 w-full border-[#FDAAAA] focus:border-[#59AC77] focus:ring-[#59AC77] rounded-lg shadow-sm bg-[#FFD5D5]" 
                type="email" name="email" :value="old('email')" required autocomplete="username" />
            <x-input-error :messages="$errors->get('email')" class="mt-2" />
        </div>

        <div class="mt-4">
            <x-input-label for="password" :value="__('Kata Sandi')" class="text-[#3A6F43] font-semibold" />
            <x-text-input id="password" 
                class="block mt-1 w-full border-[#FDAAAA] focus:border-[#59AC77] focus:ring-[#59AC77] rounded-lg shadow-sm bg-[#FFD5D5]"
                type="password"
                name="password"
                required autocomplete="new-password" />
            <x-input-error :messages="$errors->get('password')" class="mt-2" />
        </div>

        <div class="mt-4">
            <x-input-label for="password_confirmation" :value="__('Konfirmasi Kata Sandi')" class="text-[#3A6F43] font-semibold" />
            <x-text-input id="password_confirmation" 
                class="block mt-1 w-full border-[#FDAAAA] focus:border-[#59AC77] focus:ring-[#59AC77] rounded-lg shadow-sm bg-[#FFD5D5]"
                type="password"
                name="password_confirmation" required autocomplete="new-password" />
            <x-input-error :messages="$errors->get('password_confirmation')" class="mt-2" />
        </div>

        <div class="flex flex-col space-y-4 mt-6">
            <x-primary-button class="w-full justify-center py-3 bg-[#59AC77] hover:bg-[#3A6F43] active:bg-[#3A6F43] transition duration-300 shadow-lg shadow-green-100 uppercase tracking-widest font-bold">
                {{ __('Daftar Sekarang') }}
            </x-primary-button>

            <div class="text-center">
                <a class="text-sm text-[#3A6F43] hover:text-[#59AC77] transition duration-150 underline decoration-[#FDAAAA]" href="{{ route('login') }}">
                    {{ __('Sudah punya akun?') }}
                </a>
            </div>
        </div>
    </form>
</x-guest-layout>