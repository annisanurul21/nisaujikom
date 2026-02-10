<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-[#3A6F43] leading-tight">
            {{ __('Daftar Alat Peminjaman') }}
        </h2>
    </x-slot>

    <div class="py-12 bg-[#FFD5D5]">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
            <div class="bg-white/90 backdrop-blur-md overflow-hidden shadow-sm sm:rounded-lg border border-[#FDAAAA]">
                <div class="p-6 text-gray-900">
                    <div class="flex justify-between mb-6">
                        <h3 class="text-lg font-bold text-[#3A6F43]">Manajemen Data Alat</h3>
                        <a href="{{ route('alat.create') }}" class="bg-[#59AC77] hover:bg-[#3A6F43] text-white px-4 py-2 rounded-md transition duration-300">
                            + Tambah Alat
                        </a>
                    </div>

                    @if(session('success'))
                        <div class="bg-green-100 border border-green-400 text-green-700 px-4 py-3 rounded mb-4">
                            {{ session('success') }}
                        </div>
                    @endif

                    <table class="w-full border-collapse border border-[#FDAAAA]">
                        <thead class="bg-[#FFD5D5]">
                            <tr class="text-[#3A6F43]">
                                <th class="border border-[#FDAAAA] px-4 py-2">No</th>
                                <th class="border border-[#FDAAAA] px-4 py-2">Nama Alat</th>
                                <th class="border border-[#FDAAAA] px-4 py-2">Kode</th>
                                <th class="border border-[#FDAAAA] px-4 py-2">Stok</th>
                                <th class="border border-[#FDAAAA] px-4 py-2">Aksi</th>
            
                            </tr>
                        </thead>
                        <tbody>
                            @forelse($alats as $key => $alat)
                                <tr class="hover:bg-[#FFF0F0] text-center">
                                    <td class="border border-[#FDAAAA] px-4 py-2">{{ $key + 1 }}</td>
                                    <td class="border border-[#FDAAAA] px-4 py-2">{{ $alat->nama_alat }}</td>
                                    <td class="border border-[#FDAAAA] px-4 py-2">{{ $alat->kode_alat }}</td>
                                    <td class="border border-[#FDAAAA] px-4 py-2">{{ $alat->stok }}</td>
                                    <td class="border border-[#FDAAAA] px-4 py-2 flex justify-center gap-2">
                                        <a href="{{ route('alat.edit', $alat->id) }}" class="text-blue-600 hover:underline">Edit</a>
                                        <form action="{{ route('alat.destroy', $alat->id) }}" method="POST" onsubmit="return confirm('Yakin hapus?')">
                                            @csrf @method('DELETE')
                                            <button class="text-red-600 hover:underline">Hapus</button>
                                        </form>
                                    </td>
                                </tr>
                            @empty
                                <tr>
                                    <td colspan="5" class="border border-[#FDAAAA] px-4 py-2 text-center text-gray-500 italic">Belum ada data alat.</td>
                                </tr>
                            @endforelse
                        </tbody>
                    </table>
                </div>
            </div>
        </div>
    </div>
</x-app-layout>