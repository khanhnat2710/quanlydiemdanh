{{-- resources/views/admin/index.blade.php --}}
@extends('layout.app')

@section('title', 'Dashboard - Tổng quan')

@section('page-title', 'Bảng điều khiển tổng quan')

@section('content')
    <div class="space-y-6">
        <!-- Stats Cards -->
        <div class="grid grid-cols-1 md:grid-cols-3 lg:grid-cols-3 gap-6">
            <div class="bg-white rounded-2xl card-shadow p-6">
                <div class="flex items-center justify-between">
                    <div>
                        <p class="text-sm font-medium text-muted">Tổng số học sinh</p>
                        <p class="text-3xl font-bold text-foreground mt-1">1,250</p>
                    </div>
                    <div class="w-12 h-12 bg-blue-100 rounded-xl flex items-center justify-center">
                        <i data-lucide="users" class="w-6 h-6 text-blue-600"></i>
                    </div>
                </div>
            </div>
            <div class="bg-white rounded-2xl card-shadow p-6">
                <div class="flex items-center justify-between">
                    <div>
                        <p class="text-sm font-medium text-muted">Tổng số giáo viên</p>
                        <p class="text-3xl font-bold text-foreground mt-1">85</p>
                    </div>
                    <div class="w-12 h-12 bg-green-100 rounded-xl flex items-center justify-center">
                        <i data-lucide="graduation-cap" class="w-6 h-6 text-green-600"></i>
                    </div>
                </div>
            </div>
            <div class="bg-white rounded-2xl card-shadow p-6">
                <div class="flex items-center justify-between">
                    <div>
                        <p class="text-sm font-medium text-muted">Tổng số lớp học</p>
                        <p class="text-3xl font-bold text-foreground mt-1">45</p>
                    </div>
                    <div class="w-12 h-12 bg-purple-100 rounded-xl flex items-center justify-center">
                        <i data-lucide="book-open" class="w-6 h-6 text-purple-600"></i>
                    </div>
                </div>
            </div>
        </div>

        <!-- Table: Danh sách lớp học nổi bật -->
        <div class="bg-white rounded-2xl card-shadow p-6">
            <div class="flex items-center justify-between mb-4">
                <h3 class="text-lg font-semibold text-foreground">Danh sách lớp học nổi bật</h3>
                <a href="{{ route('classes.index') }}" class="text-blue-600 hover:text-blue-700 text-sm font-medium">Xem tất cả</a>
            </div>
            <div class="overflow-x-auto">
                <table class="w-full text-left">
                    <thead>
                    <tr class="border-b border-border">
                        <th class="py-3 px-4 text-sm font-medium text-muted">Tên lớp</th>
                        <th class="py-3 px-4 text-sm font-medium text-muted">Giáo viên chủ nhiệm</th>
                        <th class="py-3 px-4 text-sm font-medium text-muted">Số học sinh</th>
                        <th class="py-3 px-4 text-sm font-medium text-muted">Hành động</th>
                    </tr>
                    </thead>
                    <tbody>
                    <tr class="border-b border-border hover:bg-gray-50">
                        <td class="py-3 px-4">10A1</td>
                        <td class="py-3 px-4">Nguyễn Văn A</td>
                        <td class="py-3 px-4">35</td>
                        <td class="py-3 px-4">
                            <a href="#" class="text-blue-600 hover:text-blue-700 text-sm font-medium">Xem chi tiết</a>
                        </td>
                    </tr>
                    <tr class="border-b border-border hover:bg-gray-50">
                        <td class="py-3 px-4">10A2</td>
                        <td class="py-3 px-4">Trần Thị B</td>
                        <td class="py-3 px-4">32</td>
                        <td class="py-3 px-4">
                            <a href="#" class="text-blue-600 hover:text-blue-700 text-sm font-medium">Xem chi tiết</a>
                        </td>
                    </tr>
                    <tr class="border-b border-border hover:bg-gray-50">
                        <td class="py-3 px-4">11A1</td>
                        <td class="py-3 px-4">Lê Văn C</td>
                        <td class="py-3 px-4">38</td>
                        <td class="py-3 px-4">
                            <a href="#" class="text-blue-600 hover:text-blue-700 text-sm font-medium">Xem chi tiết</a>
                        </td>
                    </tr>
                    </tbody>
                </table>
            </div>
        </div>
    </div>
@endsection
