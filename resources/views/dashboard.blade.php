@extends('layouts.app')

@section('content')
<div class="mb-8">
    <h1 class="text-3xl font-extrabold mb-2">Halo, Pak Wowok! 👋</h1>
    <p class="text-gray-600 text-lg">Gimana kabarnya hari ini? Ini ringkasan kondisi gudang kita:</p>
</div>

<div class="grid grid-cols-1 md:grid-cols-2 gap-6">
    <div class="bg-white border-4 border-black p-6 rounded-xl shadow-[8px_8px_0px_0px_rgba(0,0,0,1)]">
        <h2 class="text-xl font-bold mb-1">Macam Barang</h2>
        <p class="text-5xl font-extrabold">{{ $totalProducts }} <span class="text-lg">item</span></p>
    </div>
    
    <div class="bg-white border-4 border-black p-6 rounded-xl shadow-[8px_8px_0px_0px_rgba(0,0,0,1)]">
        <h2 class="text-xl font-bold mb-1">Total Stok Keseluruhan</h2>
        <p class="text-5xl font-extrabold">{{ $totalStock }} <span class="text-lg">pcs</span></p>
    </div>
</div>
@endsection