@extends('layouts.app')

@section('content')
<div class="flex flex-col md:flex-row justify-between items-center mb-8 gap-4">
    <h1 class="text-3xl font-extrabold">Daftar Dagangan</h1>
    <a href="{{ route('products.create') }}" class="bg-black text-white font-bold py-2 px-6 rounded-lg hover:bg-gray-800 transition">
        + Catet Barang Baru
    </a>
</div>

@if(session('success'))
    <div class="bg-green-200 border-4 border-black text-black font-bold p-4 rounded-xl mb-6">
        {{ session('success') }}
    </div>
@endif

<!-- Form Pencarian -->
<form method="GET" action="{{ route('products.index') }}" class="mb-6 flex gap-2">
    <input type="text" name="search" value="{{ request('search') }}" placeholder="Cari nama barang..." class="flex-1 border-4 border-black rounded-lg p-3 font-semibold focus:outline-none focus:border-yellow-400">
    <button type="submit" class="bg-yellow-400 border-4 border-black font-bold py-2 px-6 rounded-lg hover:bg-yellow-300">Cari</button>
</form>

<div class="bg-white border-4 border-black rounded-xl overflow-hidden shadow-[8px_8px_0px_0px_rgba(0,0,0,1)]">
    <table class="w-full text-left">
        <thead class="bg-yellow-400 border-b-4 border-black">
            <tr>
                <th class="p-4 font-extrabold text-lg">Nama Barang</th>
                <th class="p-4 font-extrabold text-lg">Kategori</th>
                <th class="p-4 font-extrabold text-lg">Stok</th>
                <th class="p-4 font-extrabold text-lg">Aksi</th>
            </tr>
        </thead>
        <tbody>
            @forelse ($products as $item)
            <tr class="border-b-2 border-gray-200 hover:bg-gray-50">
                <td class="p-4 font-bold">{{ $item->name }}</td>
                <td class="p-4 font-semibold">{{ $item->category->name }}</td>
                <td class="p-4 font-bold">
                    @if($item->stock == 0)
                        <span class="bg-red-200 text-red-800 py-1 px-3 rounded-full text-sm">Habis!</span>
                    @elseif($item->stock < 5)
                        <span class="bg-yellow-200 text-yellow-800 py-1 px-3 rounded-full text-sm">Sisa {{ $item->stock }}</span>
                    @else
                        <span class="bg-green-200 text-green-800 py-1 px-3 rounded-full text-sm">{{ $item->stock }} pcs</span>
                    @endif
                </td>
                <td class="p-4 flex gap-2">
                    <a href="{{ route('products.show', $item->id) }}" class="text-blue-600 font-bold hover:underline">Detail</a>
                    <span class="text-gray-300">|</span>
                    <a href="{{ route('products.edit', $item->id) }}" class="text-yellow-600 font-bold hover:underline">Edit</a>
                    <span class="text-gray-300">|</span>
                    <form action="{{ route('products.destroy', $item->id) }}" method="POST" class="inline">
                        @csrf
                        @method('DELETE')
                        <button type="submit" class="text-red-600 font-bold hover:underline" onclick="return confirm('Yakin mau hapus barang ini?')">Hapus</button>
                    </form>
                </td>
            </tr>
            @empty
            <tr>
                <td colspan="4" class="p-8 text-center text-gray-500 font-semibold">
                    Waduh, barangnya nggak ketemu atau gudangnya emang lagi kosong nih.
                </td>
            </tr>
            @endforelse
        </tbody>
    </table>
</div>
@endsection