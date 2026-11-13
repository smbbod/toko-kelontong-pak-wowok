<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Gudang Pak Wowok</title>
    <script src="https://cdn.tailwindcss.com"></script>
    <style>
        @import url('https://fonts.googleapis.com/css2?family=Outfit:wght@400;600;800&display=swap');
        body { font-family: 'Outfit', sans-serif; background-color: #faf9f6; color: #111; }
    </style>
</head>
<body class="antialiased">
    <nav class="border-b-4 border-black bg-yellow-400 p-4 mb-8">
        <div class="max-w-4xl mx-auto flex justify-between items-center">
            <a href="{{ route('dashboard') }}" class="text-2xl font-extrabold tracking-tight">📦 Gudang Pak Wowok</a>
            <div class="space-x-4 font-semibold">
                <a href="{{ route('dashboard') }}" class="hover:underline">Beranda</a>
                <a href="{{ route('products.index') }}" class="hover:underline">Daftar Dagangan</a>
            </div>
        </div>
    </nav>

    <div class="max-w-4xl mx-auto px-4 pb-12">
        @yield('content')
    </div>
</body>
</html>