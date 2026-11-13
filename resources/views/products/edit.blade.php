@extends('layouts.app')

@section('content')
<h1 class="text-3xl font-extrabold mb-6">Edit Data Dagangan</h1>

<form action="{{ route('products.update', $product->id) }}" method="POST" class="bg-white border-4 border-black p-6 rounded-xl shadow-[8px_8px_0px_0px_rgba(0,0,0,1)] max-w-2xl">
    @csrf
    @method('PUT')

    <div class="mb-4">
        <label class="block font-bold mb-2">Pilih Kategori</label>
        <select name="category_id" class="w-full border-4 border-black p-3 rounded-lg font-semibold focus:outline-none">
            <option value="">-- Kategori --</option>
            @foreach($categories as $cat)
                <option value="{{ $cat->id }}" {{ old('category_id', $product->category_id) == $cat->id ? 'selected' : '' }}>
                    {{ $cat->name }}
                </option>
            @endforeach
        </select>
        @error('category_id') <span class="text-red-500 font-bold text-sm">{{ $message }}</span> @enderror
    </div>

    <div class="mb-4">
        <label class="block font-bold mb-2">Nama Barang</label>
        <input type="text" name="name" value="{{ old('name', $product->name) }}" class="w-full border-4 border-black p-3 rounded-lg font-semibold focus:outline-none">
        @error('name') <span class="text-red-500 font-bold text-sm">{{ $message }}</span> @enderror
    </div>

    <div class="grid grid-cols-2 gap-4 mb-8">
        <div>
            <label class="block font-bold mb-2">Harga Jual (Rp)</label>
            <input type="number" name="price" value="{{ old('price', $product->price) }}" class="w-full border-4 border-black p-3 rounded-lg font-semibold focus:outline-none">
            @error('price') <span class="text-red-500 font-bold text-sm">{{ $message }}</span> @enderror
        </div>
        <div>
            <label class="block font-bold mb-2">Jumlah Stok</label>
            <input type="number" name="stock" value="{{ old('stock', $product->stock) }}" class="w-full border-4 border-black p-3 rounded-lg font-semibold focus:outline-none">
            @error('stock') <span class="text-red-500 font-bold text-sm">{{ $message }}</span> @enderror
        </div>
    </div>

    <div class="flex gap-4">
        <button type="submit" class="bg-black text-white font-bold py-3 px-8 rounded-lg hover:bg-gray-800">Simpan Perubahan</button>
        <a href="{{ route('products.index') }}" class="bg-gray-200 border-4 border-black font-bold py-3 px-8 rounded-lg hover:bg-gray-300">Batal</a>
    </div>
</form>
@endsection