@extends('layouts.app')

@section('content')
<div class="max-w-2xl">
    <div class="flex justify-between items-center mb-6">
        <h1 class="text-3xl font-extrabold">Detail Barang</h1>
        <a href="{{ route('products.index') }}" class="text-blue-600 font-bold hover:underline">&larr; Balik ke daftar</a>
    </div>

    <div class="bg-yellow-400 border-4 border-black p-8 rounded-xl shadow-[8px_8px_0px_0px_rgba(0,0,0,1)]">
        <div class="mb-4">
            <p class="text-sm font-bold uppercase tracking-wider">Nama Barang</p>
            <h2 class="text-4xl font-extrabold">{{ $product->name }}</h2>
        </div>
        
        <div class="grid grid-cols-2 gap-6 mt-8">
            <div class="bg-white border-4 border-black p-4 rounded-lg">
                <p class="text-sm font-bold text-gray-500">Kategori</p>
                <p class="text-xl font-bold">{{ $product->category->name }}</p>
            </div>
            <div class="bg-white border-4 border-black p-4 rounded-lg">
                <p class="text-sm font-bold text-gray-500">Harga Jual</p>
                <p class="text-xl font-bold">Rp {{ number_format($product->price, 0, ',', '.') }}</p>
            </div>
            <div class="bg-white border-4 border-black p-4 rounded-lg col-span-2">
                <p class="text-sm font-bold text-gray-500">Kondisi Stok</p>
                <p class="text-2xl font-extrabold mb-1">{{ $product->stock }} <span class="text-base font-semibold">pcs di gudang</span></p>
                
                @if($product->stock == 0)
                    <p class="text-red-600 font-bold">Waduh, stoknya udah ludes. Buruan kulakan lagi, Pak!</p>
                @elseif($product->stock < 5)
                    <p class="text-yellow-700 font-bold">Stok mulai menipis nih. Persiapan beli lagi ya.</p>
                @else
                    <p class="text-green-700 font-bold">Aman! Stok masih melimpah ruah.</p>
                @endif
            </div>
        </div>
    </div>
</div>
@endsection