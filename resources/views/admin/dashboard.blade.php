<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Dashboard Admin - SiFunding</title>
    <script src="https://cdn.tailwindcss.com"></script>
</head>
<body class="bg-gray-100 flex items-center justify-center h-screen">
    <div class="bg-white p-10 rounded-lg shadow-lg text-center">
        <h1 class="text-3xl font-bold text-red-600 mb-4">Ini Halaman Admin</h1>
        <p class="text-gray-600 mb-6">Hanya dapat diakses oleh Administrator Sistem.</p>
        <a href="{{ route('login') }}" class="text-blue-500 hover:underline">Logout (Kembali ke Login)</a>
    </div>
</body>
</html>