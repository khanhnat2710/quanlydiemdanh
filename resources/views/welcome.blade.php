<!DOCTYPE html>
<html lang="vi">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Đăng nhập - Trường A</title>
    @vite(['resources/css/app.css', 'resources/js/app.js'])
</head>

<body class="bg-gray-50 flex items-center justify-center h-screen">

<div class="w-full max-w-md bg-white shadow-xl rounded-2xl p-8 border border-gray-100">

    <!-- Logo & Title -->
    <div class="text-center mb-8">
        <h1 class="text-3xl font-bold text-gray-800">Trường A</h1>
        <p class="text-gray-500 mt-1">Hệ thống quản lý điểm danh</p>
    </div>

    <!-- Form -->
    <form method="POST" action="{{ route('login') }}">
        @csrf

        <!-- Email -->
        <div class="mb-4">
            <label class="block font-medium text-gray-700 mb-1">Email</label>
            <input
                type="email"
                name="email"
                class="w-full px-4 py-2 rounded-lg border border-gray-300 focus:ring-2 focus:ring-blue-500 focus:border-blue-500 outline-none"
                placeholder="nhapemail@truonga.edu.vn"
                required
            >
        </div>

        <!-- Password -->
        <div class="mb-4">
            <label class="block font-medium text-gray-700 mb-1">Mật khẩu</label>
            <input
                type="password"
                name="password"
                class="w-full px-4 py-2 rounded-lg border border-gray-300 focus:ring-2 focus:ring-blue-500 focus:border-blue-500 outline-none"
                placeholder="••••••••"
                required
            >
        </div>

        <!-- Remember -->
        <div class="flex items-center justify-between mb-6">
            <label class="flex items-center gap-2 text-gray-600">
                <input type="checkbox" name="remember" class="w-4 h-4 rounded">
                Ghi nhớ đăng nhập
            </label>
        </div>

        <!-- Button -->
        <button
            type="submit"
            class="w-full bg-blue-600 hover:bg-blue-700 text-white py-2 rounded-lg text-lg font-semibold transition"
        >
            Đăng nhập
        </button>
    </form>

    <!-- Footer -->
    <p class="text-center text-gray-500 text-sm mt-6">
        © 2025 - Hệ thống điểm danh Trường A
    </p>
</div>

</body>
</html>
