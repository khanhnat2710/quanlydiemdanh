@extends('layout.app')

@section('title', 'Quản lý Giáo viên')

@section('content')
    <div x-data="teacherManager()" x-init="init()">
        <!-- Header Section -->
        <div class="mb-6">
            <div class="flex flex-col sm:flex-row sm:items-center sm:justify-between gap-4">
                <div>
                    <h1 class="text-[#1E293B] mb-2">Quản lý Giáo viên</h1>
                    <p class="text-[#64748B]">Quản lý thông tin giáo viên trong hệ thống</p>
                </div>
                <button @click="openCreateModal()" class="inline-flex items-center px-4 py-2 bg-[#3B82F6] text-white rounded-lg hover:bg-[#2563EB] transition-colors">
                    <svg class="w-5 h-5 mr-2" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M12 4v16m8-8H4"></path>
                    </svg>
                    Thêm giáo viên
                </button>
            </div>
        </div>

        <!-- Statistics Cards -->
        <div class="grid grid-cols-1 md:grid-cols-2 lg:grid-cols-4 gap-6 mb-6">
            <div class="bg-white rounded-xl shadow-sm p-6 border border-gray-100">
                <div class="flex items-center justify-between mb-4">
                    <div class="w-12 h-12 bg-[#3B82F6]/10 rounded-lg flex items-center justify-center">
                        <svg class="w-6 h-6 text-[#3B82F6]" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M12 4.354a4 4 0 110 5.292M15 21H3v-1a6 6 0 0112 0v1zm0 0h6v-1a6 6 0 00-9-5.197M13 7a4 4 0 11-8 0 4 4 0 018 0z"></path>
                        </svg>
                    </div>
                    <span class="text-sm text-green-600 bg-green-50 px-2 py-1 rounded">+12%</span>
                </div>
                <div class="text-2xl text-[#1E293B] mb-1">{{ $totalTeachers ?? 45 }}</div>
                <div class="text-sm text-[#64748B]">Tổng giáo viên</div>
            </div>

            <div class="bg-white rounded-xl shadow-sm p-6 border border-gray-100">
                <div class="flex items-center justify-between mb-4">
                    <div class="w-12 h-12 bg-green-500/10 rounded-lg flex items-center justify-center">
                        <svg class="w-6 h-6 text-green-600" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M9 12l2 2 4-4m6 2a9 9 0 11-18 0 9 9 0 0118 0z"></path>
                        </svg>
                    </div>
                    <span class="text-sm text-green-600 bg-green-50 px-2 py-1 rounded">Active</span>
                </div>
                <div class="text-2xl text-[#1E293B] mb-1">{{ $activeTeachers ?? 42 }}</div>
                <div class="text-sm text-[#64748B]">Đang giảng dạy</div>
            </div>

            <div class="bg-white rounded-xl shadow-sm p-6 border border-gray-100">
                <div class="flex items-center justify-between mb-4">
                    <div class="w-12 h-12 bg-orange-500/10 rounded-lg flex items-center justify-center">
                        <svg class="w-6 h-6 text-orange-600" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M12 8v4l3 3m6-3a9 9 0 11-18 0 9 9 0 0118 0z"></path>
                        </svg>
                    </div>
                </div>
                <div class="text-2xl text-[#1E293B] mb-1">{{ $onLeaveTeachers ?? 3 }}</div>
                <div class="text-sm text-[#64748B]">Đang nghỉ phép</div>
            </div>

            <div class="bg-white rounded-xl shadow-sm p-6 border border-gray-100">
                <div class="flex items-center justify-between mb-4">
                    <div class="w-12 h-12 bg-purple-500/10 rounded-lg flex items-center justify-center">
                        <svg class="w-6 h-6 text-purple-600" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M19 21V5a2 2 0 00-2-2H7a2 2 0 00-2 2v16m14 0h2m-2 0h-5m-9 0H3m2 0h5M9 7h1m-1 4h1m4-4h1m-1 4h1m-5 10v-5a1 1 0 011-1h2a1 1 0 011 1v5m-4 0h4"></path>
                        </svg>
                    </div>
                </div>
                <div class="text-2xl text-[#1E293B] mb-1">{{ $departments ?? 8 }}</div>
                <div class="text-sm text-[#64748B]">Tổ bộ môn</div>
            </div>
        </div>

        <!-- Filters and Search -->
        <div class="bg-white rounded-xl shadow-sm p-6 mb-6 border border-gray-100">
            <div class="grid grid-cols-1 md:grid-cols-2 lg:grid-cols-4 gap-4">
                <!-- Search -->
                <div class="relative">
                    <div class="absolute inset-y-0 left-0 pl-3 flex items-center pointer-events-none">
                        <svg class="h-5 w-5 text-[#64748B]" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M21 21l-6-6m2-5a7 7 0 11-14 0 7 7 0 0114 0z"></path>
                        </svg>
                    </div>
                    <input
                        type="text"
                        x-model="filters.search"
                        @input.debounce.300ms="filterTeachers()"
                        placeholder="Tìm kiếm theo tên, email..."
                        class="pl-10 w-full px-4 py-2 border border-gray-200 rounded-lg focus:ring-2 focus:ring-[#3B82F6] focus:border-transparent"
                    >
                </div>

                <!-- Department Filter -->
                <div>
                    <select
                        x-model="filters.department"
                        @change="filterTeachers()"
                        class="w-full px-4 py-2 border border-gray-200 rounded-lg focus:ring-2 focus:ring-[#3B82F6] focus:border-transparent"
                    >
                        <option value="">Tất cả tổ bộ môn</option>
                        <option value="toan">Toán</option>
                        <option value="van">Ngữ văn</option>
                        <option value="anh">Tiếng Anh</option>
                        <option value="ly">Vật lý</option>
                        <option value="hoa">Hóa học</option>
                        <option value="sinh">Sinh học</option>
                        <option value="su">Lịch sử</option>
                        <option value="dia">Địa lý</option>
                    </select>
                </div>

                <!-- Status Filter -->
                <div>
                    <select
                        x-model="filters.status"
                        @change="filterTeachers()"
                        class="w-full px-4 py-2 border border-gray-200 rounded-lg focus:ring-2 focus:ring-[#3B82F6] focus:border-transparent"
                    >
                        <option value="">Tất cả trạng thái</option>
                        <option value="active">Đang giảng dạy</option>
                        <option value="on_leave">Nghỉ phép</option>
                        <option value="inactive">Không hoạt động</option>
                    </select>
                </div>

                <!-- Sort -->
                <div>
                    <select
                        x-model="filters.sortBy"
                        @change="filterTeachers()"
                        class="w-full px-4 py-2 border border-gray-200 rounded-lg focus:ring-2 focus:ring-[#3B82F6] focus:border-transparent"
                    >
                        <option value="name">Sắp xếp theo tên</option>
                        <option value="department">Sắp xếp theo tổ</option>
                        <option value="experience">Sắp xếp theo kinh nghiệm</option>
                        <option value="classes">Sắp xếp theo số lớp</option>
                    </select>
                </div>
            </div>

            <!-- Active Filters -->
            <div x-show="hasActiveFilters()" class="flex items-center gap-2 mt-4 pt-4 border-t border-gray-200">
                <span class="text-sm text-[#64748B]">Bộ lọc:</span>
                <div class="flex flex-wrap gap-2">
                    <template x-if="filters.department">
                    <span class="inline-flex items-center px-3 py-1 bg-[#3B82F6]/10 text-[#3B82F6] rounded-lg text-sm">
                        <span x-text="getDepartmentName(filters.department)"></span>
                        <button @click="filters.department = ''; filterTeachers()" class="ml-2">
                            <svg class="w-4 h-4" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M6 18L18 6M6 6l12 12"></path>
                            </svg>
                        </button>
                    </span>
                    </template>
                    <template x-if="filters.status">
                    <span class="inline-flex items-center px-3 py-1 bg-[#3B82F6]/10 text-[#3B82F6] rounded-lg text-sm">
                        <span x-text="getStatusName(filters.status)"></span>
                        <button @click="filters.status = ''; filterTeachers()" class="ml-2">
                            <svg class="w-4 h-4" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M6 18L18 6M6 6l12 12"></path>
                            </svg>
                        </button>
                    </span>
                    </template>
                </div>
                <button
                    @click="clearFilters()"
                    class="ml-auto text-sm text-[#3B82F6] hover:text-[#2563EB]"
                >
                    Xóa tất cả
                </button>
            </div>
        </div>

        <!-- Teachers Table -->
        <div class="bg-white rounded-xl shadow-sm border border-gray-100 overflow-hidden">
            <!-- Table Header -->
            <div class="px-6 py-4 border-b border-gray-200">
                <div class="flex items-center justify-between">
                    <h2 class="text-[#1E293B]">Danh sách giáo viên</h2>
{{--                    <div class="flex items-center gap-3">--}}
{{--                        <button class="inline-flex items-center px-3 py-2 text-[#64748B] hover:text-[#1E293B] border border-gray-200 rounded-lg hover:bg-gray-50 transition-colors">--}}
{{--                            <svg class="w-5 h-5 mr-2" fill="none" stroke="currentColor" viewBox="0 0 24 24">--}}
{{--                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M12 10v6m0 0l-3-3m3 3l3-3m2 8H7a2 2 0 01-2-2V5a2 2 0 012-2h5.586a1 1 0 01.707.293l5.414 5.414a1 1 0 01.293.707V19a2 2 0 01-2 2z"></path>--}}
{{--                            </svg>--}}
{{--                            Xuất Excel--}}
{{--                        </button>--}}
{{--                        <button class="inline-flex items-center px-3 py-2 text-[#64748B] hover:text-[#1E293B] border border-gray-200 rounded-lg hover:bg-gray-50 transition-colors">--}}
{{--                            <svg class="w-5 h-5 mr-2" fill="none" stroke="currentColor" viewBox="0 0 24 24">--}}
{{--                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M4 16v1a3 3 0 003 3h10a3 3 0 003-3v-1m-4-4l-4 4m0 0l-4-4m4 4V4"></path>--}}
{{--                            </svg>--}}
{{--                            Import--}}
{{--                        </button>--}}
{{--                    </div>--}}
                </div>
            </div>

            <!-- Table Content -->
            <div class="overflow-x-auto">
                <table class="w-full">
                    <thead class="bg-[#F1F5F9]">
                    <tr>
                        <th class="px-6 py-3 text-left text-xs text-[#64748B] uppercase tracking-wider">
                            <input type="checkbox" class="rounded border-gray-300 text-[#3B82F6] focus:ring-[#3B82F6]">
                        </th>
                        <th class="px-6 py-3 text-left text-xs text-[#64748B] uppercase tracking-wider">Giáo viên</th>
                        <th class="px-6 py-3 text-left text-xs text-[#64748B] uppercase tracking-wider">Tổ bộ môn</th>
                        <th class="px-6 py-3 text-left text-xs text-[#64748B] uppercase tracking-wider">Số điện thoại</th>
                        <th class="px-6 py-3 text-left text-xs text-[#64748B] uppercase tracking-wider">Số lớp</th>
                        <th class="px-6 py-3 text-left text-xs text-[#64748B] uppercase tracking-wider">Kinh nghiệm</th>
                        <th class="px-6 py-3 text-left text-xs text-[#64748B] uppercase tracking-wider">Trạng thái</th>
                        <th class="px-6 py-3 text-left text-xs text-[#64748B] uppercase tracking-wider">Thao tác</th>
                    </tr>
                    </thead>
                    <tbody class="bg-white divide-y divide-gray-200">
                    <template x-for="teacher in filteredTeachers" :key="teacher.id">
                        <tr class="hover:bg-gray-50 transition-colors">
                            <td class="px-6 py-4 whitespace-nowrap">
                                <input type="checkbox" class="rounded border-gray-300 text-[#3B82F6] focus:ring-[#3B82F6]">
                            </td>
                            <td class="px-6 py-4 whitespace-nowrap">
                                <div class="flex items-center">
                                    <div class="h-10 w-10 flex-shrink-0">
                                        <img
                                            class="h-10 w-10 rounded-full object-cover"
                                            :src="teacher.avatar || 'https://ui-avatars.com/api/?name=' + encodeURIComponent(teacher.name) + '&background=3B82F6&color=fff'"
                                            :alt="teacher.name"
                                        >
                                    </div>
                                    <div class="ml-4">
                                        <div class="text-sm text-[#1E293B]" x-text="teacher.name"></div>
                                        <div class="text-sm text-[#64748B]" x-text="teacher.email"></div>
                                    </div>
                                </div>
                            </td>
                            <td class="px-6 py-4 whitespace-nowrap">
                                <div class="flex items-center">
                                    <span class="px-3 py-1 rounded-lg text-sm"
                                          :class="getDepartmentColor(teacher.department)"
                                          x-text="teacher.department_name"></span>
                                </div>
                            </td>
                            <td class="px-6 py-4 whitespace-nowrap text-sm text-[#64748B]" x-text="teacher.phone"></td>
                            <td class="px-6 py-4 whitespace-nowrap">
                                <div class="flex items-center">
                                    <svg class="w-4 h-4 text-[#3B82F6] mr-1" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M19 21V5a2 2 0 00-2-2H7a2 2 0 00-2 2v16m14 0h2m-2 0h-5m-9 0H3m2 0h5M9 7h1m-1 4h1m4-4h1m-1 4h1m-5 10v-5a1 1 0 011-1h2a1 1 0 011 1v5m-4 0h4"></path>
                                    </svg>
                                    <span class="text-sm text-[#1E293B]" x-text="teacher.class_count"></span>
                                </div>
                            </td>
                            <td class="px-6 py-4 whitespace-nowrap text-sm text-[#64748B]" x-text="teacher.experience + ' năm'"></td>
                            <td class="px-6 py-4 whitespace-nowrap">
                                <span
                                    class="px-3 py-1 rounded-full text-xs"
                                    :class="{
                                        'bg-green-100 text-green-800': teacher.status === 'active',
                                        'bg-orange-100 text-orange-800': teacher.status === 'on_leave',
                                        'bg-gray-100 text-gray-800': teacher.status === 'inactive'
                                    }"
                                    x-text="getStatusText(teacher.status)"
                                ></span>
                            </td>
                            <td class="px-6 py-4 whitespace-nowrap text-sm">
                                <div class="flex items-center gap-2">
                                    <button
                                        @click="viewTeacher(teacher)"
                                        class="p-1.5 text-[#3B82F6] hover:bg-[#3B82F6]/10 rounded-lg transition-colors"
                                        title="Xem chi tiết"
                                    >
                                        <svg class="w-5 h-5" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M15 12a3 3 0 11-6 0 3 3 0 016 0z"></path>
                                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M2.458 12C3.732 7.943 7.523 5 12 5c4.478 0 8.268 2.943 9.542 7-1.274 4.057-5.064 7-9.542 7-4.477 0-8.268-2.943-9.542-7z"></path>
                                        </svg>
                                    </button>
                                    <button
                                        @click="editTeacher(teacher)"
                                        class="p-1.5 text-[#3B82F6] hover:bg-[#3B82F6]/10 rounded-lg transition-colors"
                                        title="Chỉnh sửa"
                                    >
                                        <svg class="w-5 h-5" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M11 5H6a2 2 0 00-2 2v11a2 2 0 002 2h11a2 2 0 002-2v-5m-1.414-9.414a2 2 0 112.828 2.828L11.828 15H9v-2.828l8.586-8.586z"></path>
                                        </svg>
                                    </button>
                                    <button
                                        @click="deleteTeacher(teacher)"
                                        class="p-1.5 text-red-600 hover:bg-red-50 rounded-lg transition-colors"
                                        title="Xóa"
                                    >
                                        <svg class="w-5 h-5" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M19 7l-.867 12.142A2 2 0 0116.138 21H7.862a2 2 0 01-1.995-1.858L5 7m5 4v6m4-6v6m1-10V4a1 1 0 00-1-1h-4a1 1 0 00-1 1v3M4 7h16"></path>
                                        </svg>
                                    </button>
                                </div>
                            </td>
                        </tr>
                    </template>
                    </tbody>
                </table>
            </div>

            <!-- Empty State -->
            <div x-show="filteredTeachers.length === 0" class="text-center py-12">
                <svg class="mx-auto h-12 w-12 text-[#64748B]" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M20 13V6a2 2 0 00-2-2H6a2 2 0 00-2 2v7m16 0v5a2 2 0 01-2 2H6a2 2 0 01-2-2v-5m16 0h-2.586a1 1 0 00-.707.293l-2.414 2.414a1 1 0 01-.707.293h-3.172a1 1 0 01-.707-.293l-2.414-2.414A1 1 0 006.586 13H4"></path>
                </svg>
                <h3 class="mt-2 text-sm text-[#1E293B]">Không tìm thấy giáo viên</h3>
                <p class="mt-1 text-sm text-[#64748B]">Thử thay đổi bộ lọc hoặc thêm giáo viên mới</p>
            </div>

            <!-- Pagination -->
            <div class="px-6 py-4 border-t border-gray-200 flex items-center justify-between">
                <div class="text-sm text-[#64748B]">
                    Hiển thị <span x-text="(currentPage - 1) * perPage + 1"></span> đến
                    <span x-text="Math.min(currentPage * perPage, filteredTeachers.length)"></span>
                    trong tổng số <span x-text="filteredTeachers.length"></span> giáo viên
                </div>
                <div class="flex items-center gap-2">
                    <button
                        @click="previousPage()"
                        :disabled="currentPage === 1"
                        :class="currentPage === 1 ? 'opacity-50 cursor-not-allowed' : 'hover:bg-gray-50'"
                        class="px-3 py-2 border border-gray-200 rounded-lg text-sm text-[#64748B] transition-colors"
                    >
                        Trước
                    </button>
                    <template x-for="page in totalPages" :key="page">
                        <button
                            @click="currentPage = page"
                            :class="currentPage === page ? 'bg-[#3B82F6] text-white' : 'text-[#64748B] hover:bg-gray-50'"
                            class="px-3 py-2 border border-gray-200 rounded-lg text-sm transition-colors"
                            x-text="page"
                        ></button>
                    </template>
                    <button
                        @click="nextPage()"
                        :disabled="currentPage === totalPages"
                        :class="currentPage === totalPages ? 'opacity-50 cursor-not-allowed' : 'hover:bg-gray-50'"
                        class="px-3 py-2 border border-gray-200 rounded-lg text-sm text-[#64748B] transition-colors"
                    >
                        Sau
                    </button>
                </div>
            </div>
        </div>

        <!-- Create/Edit Modal -->
        <div
            x-show="showModal"
            x-transition:enter="transition ease-out duration-300"
            x-transition:enter-start="opacity-0"
            x-transition:enter-end="opacity-100"
            x-transition:leave="transition ease-in duration-200"
            x-transition:leave-start="opacity-100"
            x-transition:leave-end="opacity-0"
            class="fixed inset-0 bg-black bg-opacity-50 z-50 flex items-center justify-center p-4"
            @click.self="closeModal()"
        >
            <div
                x-transition:enter="transition ease-out duration-300"
                x-transition:enter-start="opacity-0 scale-95"
                x-transition:enter-end="opacity-100 scale-100"
                x-transition:leave="transition ease-in duration-200"
                x-transition:leave-start="opacity-100 scale-100"
                x-transition:leave-end="opacity-0 scale-95"
                class="bg-white rounded-xl shadow-xl max-w-2xl w-full max-h-[90vh] overflow-y-auto"
            >
                <!-- Modal Header -->
                <div class="px-6 py-4 border-b border-gray-200 flex items-center justify-between sticky top-0 bg-white">
                    <h3 class="text-[#1E293B]" x-text="isEditing ? 'Chỉnh sửa giáo viên' : 'Thêm giáo viên mới'"></h3>
                    <button @click="closeModal()" class="text-[#64748B] hover:text-[#1E293B]">
                        <svg class="w-6 h-6" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M6 18L18 6M6 6l12 12"></path>
                        </svg>
                    </button>
                </div>

                <!-- Modal Body -->
                <form @submit.prevent="saveTeacher()" class="px-6 py-4">
                    <div class="grid grid-cols-1 md:grid-cols-2 gap-4">
                        <!-- Full Name -->
                        <div class="md:col-span-2">
                            <label class="block text-sm text-[#1E293B] mb-2">
                                Họ và tên <span class="text-red-500">*</span>
                            </label>
                            <input
                                type="text"
                                x-model="formData.name"
                                required
                                class="w-full px-4 py-2 border border-gray-200 rounded-lg focus:ring-2 focus:ring-[#3B82F6] focus:border-transparent"
                                placeholder="Nhập họ và tên"
                            >
                        </div>

                        <!-- Email -->
                        <div>
                            <label class="block text-sm text-[#1E293B] mb-2">
                                Email <span class="text-red-500">*</span>
                            </label>
                            <input
                                type="email"
                                x-model="formData.email"
                                required
                                class="w-full px-4 py-2 border border-gray-200 rounded-lg focus:ring-2 focus:ring-[#3B82F6] focus:border-transparent"
                                placeholder="email@example.com"
                            >
                        </div>

                        <!-- Phone -->
                        <div>
                            <label class="block text-sm text-[#1E293B] mb-2">
                                Số điện thoại <span class="text-red-500">*</span>
                            </label>
                            <input
                                type="tel"
                                x-model="formData.phone"
                                required
                                class="w-full px-4 py-2 border border-gray-200 rounded-lg focus:ring-2 focus:ring-[#3B82F6] focus:border-transparent"
                                placeholder="0123456789"
                            >
                        </div>

                        <!-- Department -->
                        <div>
                            <label class="block text-sm text-[#1E293B] mb-2">
                                Tổ bộ môn <span class="text-red-500">*</span>
                            </label>
                            <select
                                x-model="formData.department"
                                required
                                class="w-full px-4 py-2 border border-gray-200 rounded-lg focus:ring-2 focus:ring-[#3B82F6] focus:border-transparent"
                            >
                                <option value="">Chọn tổ bộ môn</option>
                                <option value="toan">Toán</option>
                                <option value="van">Ngữ văn</option>
                                <option value="anh">Tiếng Anh</option>
                                <option value="ly">Vật lý</option>
                                <option value="hoa">Hóa học</option>
                                <option value="sinh">Sinh học</option>
                                <option value="su">Lịch sử</option>
                                <option value="dia">Địa lý</option>
                            </select>
                        </div>

                        <!-- Date of Birth -->
                        <div>
                            <label class="block text-sm text-[#1E293B] mb-2">
                                Ngày sinh <span class="text-red-500">*</span>
                            </label>
                            <input
                                type="date"
                                x-model="formData.date_of_birth"
                                required
                                class="w-full px-4 py-2 border border-gray-200 rounded-lg focus:ring-2 focus:ring-[#3B82F6] focus:border-transparent"
                            >
                        </div>

                        <!-- Gender -->
                        <div>
                            <label class="block text-sm text-[#1E293B] mb-2">
                                Giới tính <span class="text-red-500">*</span>
                            </label>
                            <select
                                x-model="formData.gender"
                                required
                                class="w-full px-4 py-2 border border-gray-200 rounded-lg focus:ring-2 focus:ring-[#3B82F6] focus:border-transparent"
                            >
                                <option value="">Chọn giới tính</option>
                                <option value="male">Nam</option>
                                <option value="female">Nữ</option>
                                <option value="other">Khác</option>
                            </select>
                        </div>

                        <!-- Experience -->
                        <div>
                            <label class="block text-sm text-[#1E293B] mb-2">
                                Kinh nghiệm (năm)
                            </label>
                            <input
                                type="number"
                                x-model="formData.experience"
                                min="0"
                                class="w-full px-4 py-2 border border-gray-200 rounded-lg focus:ring-2 focus:ring-[#3B82F6] focus:border-transparent"
                                placeholder="0"
                            >
                        </div>

                        <!-- Status -->
                        <div>
                            <label class="block text-sm text-[#1E293B] mb-2">
                                Trạng thái <span class="text-red-500">*</span>
                            </label>
                            <select
                                x-model="formData.status"
                                required
                                class="w-full px-4 py-2 border border-gray-200 rounded-lg focus:ring-2 focus:ring-[#3B82F6] focus:border-transparent"
                            >
                                <option value="active">Đang giảng dạy</option>
                                <option value="on_leave">Nghỉ phép</option>
                                <option value="inactive">Không hoạt động</option>
                            </select>
                        </div>

                        <!-- Address -->
                        <div class="md:col-span-2">
                            <label class="block text-sm text-[#1E293B] mb-2">
                                Địa chỉ
                            </label>
                            <textarea
                                x-model="formData.address"
                                rows="2"
                                class="w-full px-4 py-2 border border-gray-200 rounded-lg focus:ring-2 focus:ring-[#3B82F6] focus:border-transparent"
                                placeholder="Nhập địa chỉ"
                            ></textarea>
                        </div>

                        <!-- Specialization -->
                        <div class="md:col-span-2">
                            <label class="block text-sm text-[#1E293B] mb-2">
                                Chuyên môn
                            </label>
                            <input
                                type="text"
                                x-model="formData.specialization"
                                class="w-full px-4 py-2 border border-gray-200 rounded-lg focus:ring-2 focus:ring-[#3B82F6] focus:border-transparent"
                                placeholder="VD: Thạc sĩ Toán học, Giáo viên ưu tú..."
                            >
                        </div>

                        <!-- Bio -->
                        <div class="md:col-span-2">
                            <label class="block text-sm text-[#1E293B] mb-2">
                                Ghi chú
                            </label>
                            <textarea
                                x-model="formData.bio"
                                rows="3"
                                class="w-full px-4 py-2 border border-gray-200 rounded-lg focus:ring-2 focus:ring-[#3B82F6] focus:border-transparent"
                                placeholder="Thông tin bổ sung về giáo viên..."
                            ></textarea>
                        </div>
                    </div>

                    <!-- Modal Footer -->
                    <div class="flex items-center justify-end gap-3 mt-6 pt-6 border-t border-gray-200">
                        <button
                            type="button"
                            @click="closeModal()"
                            class="px-4 py-2 text-[#64748B] hover:text-[#1E293B] border border-gray-200 rounded-lg hover:bg-gray-50 transition-colors"
                        >
                            Hủy
                        </button>
                        <button
                            type="submit"
                            class="px-4 py-2 bg-[#3B82F6] text-white rounded-lg hover:bg-[#2563EB] transition-colors"
                        >
                            <span x-text="isEditing ? 'Cập nhật' : 'Thêm mới'"></span>
                        </button>
                    </div>
                </form>
            </div>
        </div>

        <!-- View Details Modal -->
        <div
            x-show="showViewModal"
            x-transition:enter="transition ease-out duration-300"
            x-transition:enter-start="opacity-0"
            x-transition:enter-end="opacity-100"
            x-transition:leave="transition ease-in duration-200"
            x-transition:leave-start="opacity-100"
            x-transition:leave-end="opacity-0"
            class="fixed inset-0 bg-black bg-opacity-50 z-50 flex items-center justify-center p-4"
            @click.self="showViewModal = false"
        >
            <div
                x-transition:enter="transition ease-out duration-300"
                x-transition:enter-start="opacity-0 scale-95"
                x-transition:enter-end="opacity-100 scale-100"
                x-transition:leave="transition ease-in duration-200"
                x-transition:leave-start="opacity-100 scale-100"
                x-transition:leave-end="opacity-0 scale-95"
                class="bg-white rounded-xl shadow-xl max-w-3xl w-full max-h-[90vh] overflow-y-auto"
            >
                <template x-if="selectedTeacher">
                    <div>
                        <!-- Header -->
                        <div class="px-6 py-4 border-b border-gray-200 flex items-center justify-between sticky top-0 bg-white">
                            <h3 class="text-[#1E293B]">Chi tiết giáo viên</h3>
                            <button @click="showViewModal = false" class="text-[#64748B] hover:text-[#1E293B]">
                                <svg class="w-6 h-6" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M6 18L18 6M6 6l12 12"></path>
                                </svg>
                            </button>
                        </div>

                        <!-- Body -->
                        <div class="px-6 py-6">
                            <!-- Profile Section -->
                            <div class="flex items-start gap-6 mb-6 pb-6 border-b border-gray-200">
                                <img
                                    class="h-24 w-24 rounded-full object-cover border-4 border-[#3B82F6]/20"
                                    :src="selectedTeacher.avatar || 'https://ui-avatars.com/api/?name=' + encodeURIComponent(selectedTeacher.name) + '&background=3B82F6&color=fff&size=200'"
                                    :alt="selectedTeacher.name"
                                >
                                <div class="flex-1">
                                    <h4 class="text-xl text-[#1E293B] mb-1" x-text="selectedTeacher.name"></h4>
                                    <p class="text-[#64748B] mb-3" x-text="selectedTeacher.email"></p>
                                    <div class="flex flex-wrap gap-2">
                                    <span
                                        class="px-3 py-1 rounded-full text-xs"
                                        :class="{
                                            'bg-green-100 text-green-800': selectedTeacher.status === 'active',
                                            'bg-orange-100 text-orange-800': selectedTeacher.status === 'on_leave',
                                            'bg-gray-100 text-gray-800': selectedTeacher.status === 'inactive'
                                        }"
                                        x-text="getStatusText(selectedTeacher.status)"
                                    ></span>
                                        <span
                                            class="px-3 py-1 rounded-lg text-xs"
                                            :class="getDepartmentColor(selectedTeacher.department)"
                                            x-text="selectedTeacher.department_name"
                                        ></span>
                                    </div>
                                </div>
                            </div>

                            <!-- Information Grid -->
                            <div class="grid grid-cols-1 md:grid-cols-2 gap-6 mb-6">
                                <div>
                                    <label class="block text-sm text-[#64748B] mb-1">Số điện thoại</label>
                                    <p class="text-[#1E293B]" x-text="selectedTeacher.phone"></p>
                                </div>
                                <div>
                                    <label class="block text-sm text-[#64748B] mb-1">Ngày sinh</label>
                                    <p class="text-[#1E293B]" x-text="selectedTeacher.date_of_birth"></p>
                                </div>
                                <div>
                                    <label class="block text-sm text-[#64748B] mb-1">Giới tính</label>
                                    <p class="text-[#1E293B]" x-text="selectedTeacher.gender === 'male' ? 'Nam' : selectedTeacher.gender === 'female' ? 'Nữ' : 'Khác'"></p>
                                </div>
                                <div>
                                    <label class="block text-sm text-[#64748B] mb-1">Kinh nghiệm</label>
                                    <p class="text-[#1E293B]" x-text="selectedTeacher.experience + ' năm'"></p>
                                </div>
                                <div class="md:col-span-2">
                                    <label class="block text-sm text-[#64748B] mb-1">Địa chỉ</label>
                                    <p class="text-[#1E293B]" x-text="selectedTeacher.address || 'Chưa cập nhật'"></p>
                                </div>
                                <div class="md:col-span-2">
                                    <label class="block text-sm text-[#64748B] mb-1">Chuyên môn</label>
                                    <p class="text-[#1E293B]" x-text="selectedTeacher.specialization || 'Chưa cập nhật'"></p>
                                </div>
                                <div class="md:col-span-2">
                                    <label class="block text-sm text-[#64748B] mb-1">Ghi chú</label>
                                    <p class="text-[#1E293B]" x-text="selectedTeacher.bio || 'Không có ghi chú'"></p>
                                </div>
                            </div>

                            <!-- Teaching Statistics -->
                            <div class="grid grid-cols-3 gap-4 mb-6 p-4 bg-[#F1F5F9] rounded-lg">
                                <div class="text-center">
                                    <div class="text-2xl text-[#3B82F6] mb-1" x-text="selectedTeacher.class_count || 0"></div>
                                    <div class="text-sm text-[#64748B]">Lớp đang dạy</div>
                                </div>
                                <div class="text-center">
                                    <div class="text-2xl text-[#3B82F6] mb-1" x-text="selectedTeacher.student_count || 0"></div>
                                    <div class="text-sm text-[#64748B]">Tổng học sinh</div>
                                </div>
                                <div class="text-center">
                                    <div class="text-2xl text-[#3B82F6] mb-1" x-text="selectedTeacher.total_hours || 0"></div>
                                    <div class="text-sm text-[#64748B]">Giờ giảng dạy</div>
                                </div>
                            </div>

                            <!-- Action Buttons -->
                            <div class="flex items-center gap-3">
                                <button
                                    @click="editTeacher(selectedTeacher); showViewModal = false"
                                    class="flex-1 px-4 py-2 bg-[#3B82F6] text-white rounded-lg hover:bg-[#2563EB] transition-colors"
                                >
                                    Chỉnh sửa
                                </button>
                                <button
                                    @click="showViewModal = false"
                                    class="flex-1 px-4 py-2 border border-gray-200 text-[#64748B] rounded-lg hover:bg-gray-50 transition-colors"
                                >
                                    Đóng
                                </button>
                            </div>
                        </div>
                    </div>
                </template>
            </div>
        </div>
    </div>

    <script>
        function teacherManager() {
            return {
                teachers: [],
                filteredTeachers: [],
                showModal: false,
                showViewModal: false,
                isEditing: false,
                selectedTeacher: null,
                currentPage: 1,
                perPage: 10,
                filters: {
                    search: '',
                    department: '',
                    status: '',
                    sortBy: 'name'
                },
                formData: {
                    name: '',
                    email: '',
                    phone: '',
                    department: '',
                    date_of_birth: '',
                    gender: '',
                    experience: 0,
                    status: 'active',
                    address: '',
                    specialization: '',
                    bio: ''
                },

                init() {
                    // Sample data - Replace with API call
                    this.teachers = [
                        {
                            id: 1,
                            name: 'Nguyễn Văn An',
                            email: 'nguyenvanan@school.edu.vn',
                            phone: '0912345678',
                            department: 'toan',
                            department_name: 'Toán',
                            date_of_birth: '1985-05-15',
                            gender: 'male',
                            experience: 12,
                            status: 'active',
                            class_count: 3,
                            student_count: 120,
                            total_hours: 480,
                            address: '123 Đường ABC, Quận 1, TP.HCM',
                            specialization: 'Thạc sĩ Toán học, Giáo viên ưu tú',
                            bio: 'Giáo viên giàu kinh nghiệm trong việc giảng dạy môn Toán',
                            avatar: null
                        },
                        {
                            id: 2,
                            name: 'Trần Thị Bình',
                            email: 'tranthibinh@school.edu.vn',
                            phone: '0987654321',
                            department: 'van',
                            department_name: 'Ngữ văn',
                            date_of_birth: '1988-08-20',
                            gender: 'female',
                            experience: 10,
                            status: 'active',
                            class_count: 4,
                            student_count: 160,
                            total_hours: 520,
                            address: '456 Đường XYZ, Quận 3, TP.HCM',
                            specialization: 'Thạc sĩ Ngữ văn Việt Nam',
                            bio: 'Chuyên về giảng dạy văn học hiện đại',
                            avatar: null
                        },
                        {
                            id: 3,
                            name: 'Lê Minh Châu',
                            email: 'leminhchau@school.edu.vn',
                            phone: '0901234567',
                            department: 'anh',
                            department_name: 'Tiếng Anh',
                            date_of_birth: '1990-03-10',
                            gender: 'female',
                            experience: 8,
                            status: 'active',
                            class_count: 5,
                            student_count: 200,
                            total_hours: 600,
                            address: '789 Đường DEF, Quận 5, TP.HCM',
                            specialization: 'TESOL Certificate, IELTS 8.0',
                            bio: 'Chuyên luyện thi IELTS và giao tiếp tiếng Anh',
                            avatar: null
                        },
                        {
                            id: 4,
                            name: 'Phạm Quốc Dũng',
                            email: 'phamquocdung@school.edu.vn',
                            phone: '0923456789',
                            department: 'ly',
                            department_name: 'Vật lý',
                            date_of_birth: '1987-11-25',
                            gender: 'male',
                            experience: 11,
                            status: 'on_leave',
                            class_count: 2,
                            student_count: 80,
                            total_hours: 320,
                            address: '321 Đường GHI, Quận 7, TP.HCM',
                            specialization: 'Tiến sĩ Vật lý lý thuyết',
                            bio: 'Nghiên cứu và giảng dạy vật lý đại cương',
                            avatar: null
                        },
                        {
                            id: 5,
                            name: 'Hoàng Thu Hà',
                            email: 'hoangthuha@school.edu.vn',
                            phone: '0934567890',
                            department: 'hoa',
                            department_name: 'Hóa học',
                            date_of_birth: '1992-07-08',
                            gender: 'female',
                            experience: 6,
                            status: 'active',
                            class_count: 3,
                            student_count: 120,
                            total_hours: 400,
                            address: '654 Đường JKL, Quận 10, TP.HCM',
                            specialization: 'Thạc sĩ Hóa hữu cơ',
                            bio: 'Giảng dạy hóa học phổ thông và nâng cao',
                            avatar: null
                        }
                    ];
                    this.filterTeachers();
                },

                filterTeachers() {
                    let result = [...this.teachers];

                    // Search filter
                    if (this.filters.search) {
                        const search = this.filters.search.toLowerCase();
                        result = result.filter(t =>
                            t.name.toLowerCase().includes(search) ||
                            t.email.toLowerCase().includes(search) ||
                            t.phone.includes(search)
                        );
                    }

                    // Department filter
                    if (this.filters.department) {
                        result = result.filter(t => t.department === this.filters.department);
                    }

                    // Status filter
                    if (this.filters.status) {
                        result = result.filter(t => t.status === this.filters.status);
                    }

                    // Sort
                    result.sort((a, b) => {
                        switch(this.filters.sortBy) {
                            case 'name':
                                return a.name.localeCompare(b.name);
                            case 'department':
                                return a.department_name.localeCompare(b.department_name);
                            case 'experience':
                                return b.experience - a.experience;
                            case 'classes':
                                return b.class_count - a.class_count;
                            default:
                                return 0;
                        }
                    });

                    this.filteredTeachers = result;
                    this.currentPage = 1;
                },

                hasActiveFilters() {
                    return this.filters.department || this.filters.status;
                },

                clearFilters() {
                    this.filters = {
                        search: '',
                        department: '',
                        status: '',
                        sortBy: 'name'
                    };
                    this.filterTeachers();
                },

                getDepartmentName(dept) {
                    const departments = {
                        'toan': 'Toán',
                        'van': 'Ngữ văn',
                        'anh': 'Tiếng Anh',
                        'ly': 'Vật lý',
                        'hoa': 'Hóa học',
                        'sinh': 'Sinh học',
                        'su': 'Lịch sử',
                        'dia': 'Địa lý'
                    };
                    return departments[dept] || dept;
                },

                getStatusName(status) {
                    const statuses = {
                        'active': 'Đang giảng dạy',
                        'on_leave': 'Nghỉ phép',
                        'inactive': 'Không hoạt động'
                    };
                    return statuses[status] || status;
                },

                getStatusText(status) {
                    return this.getStatusName(status);
                },

                getDepartmentColor(dept) {
                    const colors = {
                        'toan': 'bg-blue-100 text-blue-800',
                        'van': 'bg-purple-100 text-purple-800',
                        'anh': 'bg-green-100 text-green-800',
                        'ly': 'bg-orange-100 text-orange-800',
                        'hoa': 'bg-pink-100 text-pink-800',
                        'sinh': 'bg-teal-100 text-teal-800',
                        'su': 'bg-amber-100 text-amber-800',
                        'dia': 'bg-cyan-100 text-cyan-800'
                    };
                    return colors[dept] || 'bg-gray-100 text-gray-800';
                },

                openCreateModal() {
                    this.isEditing = false;
                    this.formData = {
                        name: '',
                        email: '',
                        phone: '',
                        department: '',
                        date_of_birth: '',
                        gender: '',
                        experience: 0,
                        status: 'active',
                        address: '',
                        specialization: '',
                        bio: ''
                    };
                    this.showModal = true;
                },

                editTeacher(teacher) {
                    this.isEditing = true;
                    this.selectedTeacher = teacher;
                    this.formData = { ...teacher };
                    this.showModal = true;
                },

                viewTeacher(teacher) {
                    this.selectedTeacher = teacher;
                    this.showViewModal = true;
                },

                closeModal() {
                    this.showModal = false;
                    this.selectedTeacher = null;
                },

                saveTeacher() {
                    if (this.isEditing) {
                        // Update existing teacher
                        const index = this.teachers.findIndex(t => t.id === this.selectedTeacher.id);
                        if (index !== -1) {
                            this.teachers[index] = {
                                ...this.teachers[index],
                                ...this.formData,
                                department_name: this.getDepartmentName(this.formData.department)
                            };
                        }
                    } else {
                        // Add new teacher
                        const newTeacher = {
                            id: this.teachers.length + 1,
                            ...this.formData,
                            department_name: this.getDepartmentName(this.formData.department),
                            class_count: 0,
                            student_count: 0,
                            total_hours: 0,
                            avatar: null
                        };
                        this.teachers.push(newTeacher);
                    }

                    this.filterTeachers();
                    this.closeModal();

                    // Show success message (you can use a toast library)
                    alert(this.isEditing ? 'Cập nhật giáo viên thành công!' : 'Thêm giáo viên mới thành công!');
                },

                deleteTeacher(teacher) {
                    if (confirm(`Bạn có chắc chắn muốn xóa giáo viên ${teacher.name}?`)) {
                        this.teachers = this.teachers.filter(t => t.id !== teacher.id);
                        this.filterTeachers();
                        alert('Đã xóa giáo viên thành công!');
                    }
                },

                get totalPages() {
                    return Math.ceil(this.filteredTeachers.length / this.perPage);
                },

                previousPage() {
                    if (this.currentPage > 1) {
                        this.currentPage--;
                    }
                },

                nextPage() {
                    if (this.currentPage < this.totalPages) {
                        this.currentPage++;
                    }
                }
            }
        }
    </script>
@endsection
