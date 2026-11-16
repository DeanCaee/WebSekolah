<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Aplikasi Web Sekolah</title>
    <link rel="stylesheet" href="{{ asset('css/style.css') }}">
</head>
<body>
    <header>
        <h2>Aplikasi Pendataan Web Sekolah</h2>
        <nav style="margin-top: 10px;">
            <a href="{{ route('products.index') }}">Products</a>
            <a href="{{ route('categories.index') }}">Categories</a>
            <a href="{{ route('customers.index')}}">Customers</a>
        </nav>
    </header>

    <!-- KONTEN UTAMA (Akan berubah-ubah sesuai form yang dibuka) -->
    <main style="padding: 20px; min-height: 400px;">
        @yield('content')
    </main>

    <!-- FOOTER OTOMATIS -->
    <footer>
        <p>&copy; 2026 Web POS. All rights reserved.</p>
    </footer>

</body>
</html>
