<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-[#3A6F43] leading-tight">
            {{ __('Edit Data Alat') }}
        </h2>
    </x-slot>

    <div class="py-12 bg-[#FFD5D5]">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
            <div class="bg-white/90 backdrop-blur-md overflow-hidden shadow-sm sm:rounded-lg border border-[#FDAAAA]">
                <div class="p-6">
                    <form method="POST" action="{{ route('alat.update', $alat->id) }}">
                        @csrf
                        @method('PUT')

                        <div class="mb-4">
                            <label for="nama_alat" class="block font-medium text-sm text-[#3A6F43]">Nama Alat</label>
                            <input id="nama_alat" class="block mt-1 w-full border-[#FDAAAA] focus:border-[#59AC77] focus:ring-[#59AC77] rounded-md shadow-sm bg-white" 
                                   type="text" name="nama_alat" value="{{ $alat->nama_alat }}" required />
                        </div>

                        <div class="mb-4">
                            <label for="kode_alat" class="block font-medium text-sm text-[#3A6F43]">Kode Alat</label>
                            <input id="kode_alat" class="block mt-1 w-full border-[#FDAAAA] focus:border-[#59AC77] focus:ring-[#59AC77] rounded-md shadow-sm bg-white" 
                                   type="text" name="kode_alat" value="{{ $alat->kode_alat }}" required />
                        </div>

                        <div class="mb-4">
                            <label for="stok" class="block font-medium text-sm text-[#3A6F43]">Jumlah Stok</label>
                            <input id="stok" class="block mt-1 w-full border-[#FDAAAA] focus:border-[#59AC77] focus:ring-[#59AC77] rounded-md shadow-sm bg-white" 
                                   type="number" name="stok" value="{{ $alat->stok }}" required />
                        </div>

                        <div class="flex items-center justify-end mt-4">
                            <a href="{{ route('alat.index') }}" class="text-[#3A6F43] hover:underline mr-4">Batal</a>
                            <button type="submit" class="bg-[#59AC77] hover:bg-[#3A6F43] text-white px-4 py-2 rounded-md transition duration-300">
                                Perbarui Alat
                            </button>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
</x-app-layout>