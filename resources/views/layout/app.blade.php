<!DOCTYPE html>
<html lang="vi">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta name="csrf-token" content="{{ csrf_token() }}">
    <title>@yield('title', 'Admin Dashboard') - Quản lý trường học</title>

    <!-- Tailwind CSS -->
    <script src="https://cdn.tailwindcss.com"></script>

    <!-- Alpine.js -->
    <script defer src="https://cdn.jsdelivr.net/npm/alpinejs@3.x.x/dist/cdn.min.js"></script>

    <!-- Chart.js -->
    <script src="https://cdn.jsdelivr.net/npm/chart.js"></script>

    <!-- Google Fonts -->
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Inter:wght@400;500;600;700&display=swap" rel="stylesheet">

    <!-- Lucide Icons -->
    <script src="https://unpkg.com/lucide@latest"></script>

    <style>
        * {
            font-family: 'Inter', system-ui, -apple-system, sans-serif;
        }

        :root {
            --primary: #3B82F6;
            --primary-dark: #2563EB;
            --background: #F1F5F9;
            --foreground: #1E293B;
            --muted: #64748B;
            --border: rgba(0, 0, 0, 0.1);
        }

        body {
            background-color: var(--background);
            color: var(--foreground);
        }

        .sidebar-active {
            background-color: var(--primary);
            color: white;
        }

        .card-shadow {
            box-shadow: 0 1px 3px 0 rgb(0 0 0 / 0.1), 0 1px 2px -1px rgb(0 0 0 / 0.1);
        }
    </style>

    @stack('styles')
</head>
<body x-data="{ sidebarOpen: false, currentPage: '{{ request()->route()->getName() }}' }">

<!-- Sidebar -->
<aside
    class="fixed top-0 left-0 z-40 w-64 h-screen transition-transform bg-white border-r"
    :class="sidebarOpen ? 'translate-x-0' : '-translate-x-full md:translate-x-0'"
>
    <div class="h-full flex flex-col">
        <!-- Logo -->
        <div class="p-6 border-b">
            <div class="flex items-center gap-3">
                <div class="w-10 h-10 rounded-xl bg-blue-500 flex items-center justify-center">
                    <i data-lucide="graduation-cap" class="w-6 h-6 text-white"></i>
                </div>
                <div>
                    <h2 class="font-semibold text-lg">Quản lý trường học</h2>
                    <p class="text-sm text-gray-500">Admin Dashboard</p>
                </div>
            </div>
        </div>

        <!-- Navigation -->
        <nav class="flex-1 px-3 py-4 overflow-y-auto">
            <ul class="space-y-1">
                <li>
                    <a href="{{ route('dashboard.index') }}"
                       class="w-full flex items-center gap-3 px-3 py-2.5 rounded-xl transition-colors {{ request()->routeIs('dashboard') ? 'bg-blue-500 text-white' : 'text-gray-700 hover:bg-gray-100' }}">
                        <i data-lucide="layout-dashboard" class="w-5 h-5"></i>
                        <span>Tổng quan</span>
                    </a>
                </li>
                <li>
                    <a href="{{ route('classes.index') }}"
                       class="w-full flex items-center gap-3 px-3 py-2.5 rounded-xl transition-colors {{ request()->routeIs('classes.*') ? 'bg-blue-500 text-white' : 'text-gray-700 hover:bg-gray-100' }}">
                        <i data-lucide="book-open" class="w-5 h-5"></i>
                        <span>Lớp học</span>
                    </a>
                </li>
                <li>
                    <a href="{{ route('teacher.index') }}"
                       class="w-full flex items-center gap-3 px-3 py-2.5 rounded-xl transition-colors {{ request()->routeIs('teachers.*') ? 'bg-blue-500 text-white' : 'text-gray-700 hover:bg-gray-100' }}">
                        <i data-lucide="graduation-cap" class="w-5 h-5"></i>
                        <span>Giáo viên</span>
                    </a>
                </li>
                <li>
                    <a "
                       class="w-full flex items-center gap-3 px-3 py-2.5 rounded-xl transition-colors {{ request()->routeIs('students.*') ? 'bg-blue-500 text-white' : 'text-gray-700 hover:bg-gray-100' }}">
                        <i data-lucide="users" class="w-5 h-5"></i>
                        <span>Học sinh</span>
                    </a>
                </li>
                <li>
                    <a "
                       class="w-full flex items-center gap-3 px-3 py-2.5 rounded-xl transition-colors {{ request()->routeIs('schedule.*') ? 'bg-blue-500 text-white' : 'text-gray-700 hover:bg-gray-100' }}">
                        <i data-lucide="calendar" class="w-5 h-5"></i>
                        <span>Lịch học</span>
                    </a>
                </li>
                <li>
                    <a "
                       class="w-full flex items-center gap-3 px-3 py-2.5 rounded-xl transition-colors {{ request()->routeIs('settings.*') ? 'bg-blue-500 text-white' : 'text-gray-700 hover:bg-gray-100' }}">
                        <i data-lucide="settings" class="w-5 h-5"></i>
                        <span>Cài đặt</span>
                    </a>
                </li>
            </ul>
        </nav>

        <!-- Footer -->
        <div class="p-4 border-t">
            <div class="flex items-center gap-3 px-3 py-2">
                <div class="w-8 h-8 rounded-full bg-blue-500 flex items-center justify-center">
                    <span class="text-sm text-white font-medium">AD</span>
                </div>
                <div class="flex-1 min-w-0">
                    <p class="text-sm font-medium truncate">Admin User</p>
                    <p class="text-xs text-gray-500 truncate">admin@school.vn</p>
                </div>
            </div>
        </div>
    </div>
</aside>

<!-- Main Content -->
<div class="md:ml-64">
    <!-- Header -->
    <header class="sticky top-0 z-30 bg-white border-b">
        <div class="px-6 py-4 flex items-center justify-between">
            <div class="flex items-center gap-4">
                <button
                    @click="sidebarOpen = !sidebarOpen"
                    class="md:hidden p-2 hover:bg-gray-100 rounded-xl"
                >
                    <i data-lucide="menu" class="w-5 h-5"></i>
                </button>
                <div>
                    <h1 class="text-xl font-semibold">@yield('page-title', 'Dashboard')</h1>
                    <p class="text-sm text-gray-500">Xin chào, chào mừng bạn quay trở lại</p>
                </div>
            </div>
            <div class="flex items-center gap-2">
                <div class="px-4 py-2 bg-gray-100 rounded-xl text-sm">
                    Ngày hôm nay: {{ now()->format('d/m/Y') }}
                </div>
            </div>
        </div>
    </header>

    <!-- Page Content -->
    <main class="p-6">
        @if(session('success'))
            <div class="mb-6 p-4 bg-green-50 border border-green-200 text-green-800 rounded-2xl flex items-center gap-3">
                <i data-lucide="check-circle" class="w-5 h-5"></i>
                <span>{{ session('success') }}</span>
            </div>
        @endif

        @if(session('error'))
            <div class="mb-6 p-4 bg-red-50 border border-red-200 text-red-800 rounded-2xl flex items-center gap-3">
                <i data-lucide="alert-circle" class="w-5 h-5"></i>
                <span>{{ session('error') }}</span>
            </div>
        @endif

        @yield('content')
    </main>
</div>

<!-- Mobile Overlay -->
<div
    x-show="sidebarOpen"
    @click="sidebarOpen = false"
    x-transition:enter="transition ease-out duration-200"
    x-transition:enter-start="opacity-0"
    x-transition:enter-end="opacity-100"
    x-transition:leave="transition ease-in duration-150"
    x-transition:leave-start="opacity-100"
    x-transition:leave-end="opacity-0"
    class="fixed inset-0 z-30 bg-black/50 md:hidden"
    style="display: none;"
></div>

<!-- Initialize Lucide Icons -->
<script>
    lucide.createIcons();
</script>

@stack('scripts')
</body>
</html>
