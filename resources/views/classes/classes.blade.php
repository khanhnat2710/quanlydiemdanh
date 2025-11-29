@extends('layout.app')

@section('title', 'Quản lý Lớp học')

@section('content')
    <div x-data="classManager()" x-init="init()">
        <!-- Header Section -->
        <div class="mb-6">
            <div class="flex flex-col sm:flex-row sm:items-center sm:justify-between gap-4">
                <div>
                    <h1 class="text-[#1E293B] mb-2">Quản lý Lớp học</h1>
                    <p class="text-[#64748B]">Quản lý thông tin lớp học trong hệ thống</p>
                </div>
                <button @click="openCreateModal()" class="inline-flex items-center px-4 py-2 bg-[#3B82F6] text-white rounded-lg hover:bg-[#2563EB] transition-colors">
                    <svg class="w-5 h-5 mr-2" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M12 4v16m8-8H4"></path>
                    </svg>
                    Thêm lớp học
                </button>
            </div>
        </div>

        <!-- Statistics Cards -->
{{--        <div class="grid grid-cols-1 md:grid-cols-2 lg:grid-cols-4 gap-6 mb-6">--}}
{{--            <div class="bg-white rounded-xl shadow-sm p-6 border border-gray-100">--}}
{{--                <div class="flex items-center justify-between mb-4">--}}
{{--                    <div class="w-12 h-12 bg-[#3B82F6]/10 rounded-lg flex items-center justify-center">--}}
{{--                        <svg class="w-6 h-6 text-[#3B82F6]" fill="none" stroke="currentColor" viewBox="0 0 24 24">--}}
{{--                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M19 21V5a2 2 0 00-2-2H7a2 2 0 00-2 2v16m14 0h2m-2 0h-5m-9 0H3m2 0h5M9 7h1m-1 4h1m4-4h1m-1 4h1m-5 10v-5a1 1 0 011-1h2a1 1 0 011 1v5m-4 0h4"></path>--}}
{{--                        </svg>--}}
{{--                    </div>--}}
{{--                    <span class="text-sm text-green-600 bg-green-50 px-2 py-1 rounded">+8%</span>--}}
{{--                </div>--}}
{{--                <div class="text-2xl text-[#1E293B] mb-1">{{ $totalClasses ?? 42 }}</div>--}}
{{--                <div class="text-sm text-[#64748B]">Tổng số lớp</div>--}}
{{--            </div>--}}

{{--            <div class="bg-white rounded-xl shadow-sm p-6 border border-gray-100">--}}
{{--                <div class="flex items-center justify-between mb-4">--}}
{{--                    <div class="w-12 h-12 bg-green-500/10 rounded-lg flex items-center justify-center">--}}
{{--                        <svg class="w-6 h-6 text-green-600" fill="none" stroke="currentColor" viewBox="0 0 24 24">--}}
{{--                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M17 20h5v-2a3 3 0 00-5.356-1.857M17 20H7m10 0v-2c0-.656-.126-1.283-.356-1.857M7 20H2v-2a3 3 0 015.356-1.857M7 20v-2c0-.656.126-1.283.356-1.857m0 0a5.002 5.002 0 019.288 0M15 7a3 3 0 11-6 0 3 3 0 016 0zm6 3a2 2 0 11-4 0 2 2 0 014 0zM7 10a2 2 0 11-4 0 2 2 0 014 0z"></path>--}}
{{--                        </svg>--}}
{{--                    </div>--}}
{{--                </div>--}}
{{--                <div class="text-2xl text-[#1E293B] mb-1">{{ $totalStudents ?? 1234 }}</div>--}}
{{--                <div class="text-sm text-[#64748B]">Tổng học sinh</div>--}}
{{--            </div>--}}

{{--            <div class="bg-white rounded-xl shadow-sm p-6 border border-gray-100">--}}
{{--                <div class="flex items-center justify-between mb-4">--}}
{{--                    <div class="w-12 h-12 bg-purple-500/10 rounded-lg flex items-center justify-center">--}}
{{--                        <svg class="w-6 h-6 text-purple-600" fill="none" stroke="currentColor" viewBox="0 0 24 24">--}}
{{--                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M12 4.354a4 4 0 110 5.292M15 21H3v-1a6 6 0 0112 0v1zm0 0h6v-1a6 6 0 00-9-5.197M13 7a4 4 0 11-8 0 4 4 0 018 0z"></path>--}}
{{--                        </svg>--}}
{{--                    </div>--}}
{{--                </div>--}}
{{--                <div class="text-2xl text-[#1E293B] mb-1">{{ $avgStudents ?? 29 }}</div>--}}
{{--                <div class="text-sm text-[#64748B]">TB học sinh/lớp</div>--}}
{{--            </div>--}}

{{--            <div class="bg-white rounded-xl shadow-sm p-6 border border-gray-100">--}}
{{--                <div class="flex items-center justify-between mb-4">--}}
{{--                    <div class="w-12 h-12 bg-orange-500/10 rounded-lg flex items-center justify-center">--}}
{{--                        <svg class="w-6 h-6 text-orange-600" fill="none" stroke="currentColor" viewBox="0 0 24 24">--}}
{{--                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M9 12l2 2 4-4m6 2a9 9 0 11-18 0 9 9 0 0118 0z"></path>--}}
{{--                        </svg>--}}
{{--                    </div>--}}
{{--                </div>--}}
{{--                <div class="text-2xl text-[#1E293B] mb-1">{{ $attendanceRate ?? '94.2%' }}</div>--}}
{{--                <div class="text-sm text-[#64748B]">Tỷ lệ điểm danh TB</div>--}}
{{--            </div>--}}
{{--        </div>--}}

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
                        @input.debounce.300ms="filterClasses()"
                        placeholder="Tìm kiếm lớp học..."
                        class="pl-10 w-full px-4 py-2 border border-gray-200 rounded-lg focus:ring-2 focus:ring-[#3B82F6] focus:border-transparent"
                    >
                </div>

                <!-- Grade Filter -->
                <div>
                    <select
                        x-model="filters.grade"
                        @change="filterClasses()"
                        class="w-full px-4 py-2 border border-gray-200 rounded-lg focus:ring-2 focus:ring-[#3B82F6] focus:border-transparent"
                    >
                        <option value="">Tất cả khối</option>
                        <option value="10">Khối 10</option>
                        <option value="11">Khối 11</option>
                        <option value="12">Khối 12</option>
                    </select>
                </div>

                <!-- Academic Year Filter -->
                <div>
                    <select
                        x-model="filters.academicYear"
                        @change="filterClasses()"
                        class="w-full px-4 py-2 border border-gray-200 rounded-lg focus:ring-2 focus:ring-[#3B82F6] focus:border-transparent"
                    >
                        <option value="">Tất cả năm học</option>
                        <option value="2024-2025">2024-2025</option>
                        <option value="2023-2024">2023-2024</option>
                        <option value="2022-2023">2022-2023</option>
                    </select>
                </div>

                <!-- Sort -->
                <div>
                    <select
                        x-model="filters.sortBy"
                        @change="filterClasses()"
                        class="w-full px-4 py-2 border border-gray-200 rounded-lg focus:ring-2 focus:ring-[#3B82F6] focus:border-transparent"
                    >
                        <option value="name">Sắp xếp theo tên</option>
                        <option value="grade">Sắp xếp theo khối</option>
                        <option value="students">Sắp xếp theo số học sinh</option>
                        <option value="attendance">Sắp xếp theo điểm danh</option>
                    </select>
                </div>
            </div>
        </div>

        <!-- Classes Grid -->
        <div class="grid grid-cols-1 md:grid-cols-2 lg:grid-cols-3 gap-6">
            <template x-for="classItem in filteredClasses" :key="classItem.id">
                <div class="bg-white rounded-xl shadow-sm border border-gray-100 p-6 hover:shadow-md transition-shadow">
                    <!-- Header -->
                    <div class="flex items-start justify-between mb-4">
                        <div class="flex-1">
                            <h3 class="text-lg text-[#1E293B] mb-1" x-text="classItem.name"></h3>
                            <p class="text-sm text-[#64748B]" x-text="'Năm học: ' + classItem.academic_year"></p>
                        </div>
                        <div
                            class="px-3 py-1 rounded-lg text-xs"
                            :class="getGradeColor(classItem.grade)"
                            x-text="'Khối ' + classItem.grade"
                        ></div>
                    </div>

                    <!-- Teacher Info -->
                    <div class="flex items-center gap-3 mb-4 pb-4 border-b border-gray-100">
                        <div class="w-10 h-10 rounded-full bg-[#3B82F6] flex items-center justify-center">
                            <svg class="w-5 h-5 text-white" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M16 7a4 4 0 11-8 0 4 4 0 018 0zM12 14a7 7 0 00-7 7h14a7 7 0 00-7-7z"></path>
                            </svg>
                        </div>
                        <div>
                            <p class="text-sm text-[#64748B]">Giáo viên chủ nhiệm</p>
                            <p class="text-sm text-[#1E293B]" x-text="classItem.teacher_name"></p>
                        </div>
                    </div>

                    <!-- Stats -->
                    <div class="grid grid-cols-2 gap-4 mb-4">
                        <div>
                            <div class="flex items-center gap-2 mb-1">
                                <svg class="w-4 h-4 text-[#3B82F6]" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M17 20h5v-2a3 3 0 00-5.356-1.857M17 20H7m10 0v-2c0-.656-.126-1.283-.356-1.857M7 20H2v-2a3 3 0 015.356-1.857M7 20v-2c0-.656.126-1.283.356-1.857m0 0a5.002 5.002 0 019.288 0M15 7a3 3 0 11-6 0 3 3 0 016 0zm6 3a2 2 0 11-4 0 2 2 0 014 0zM7 10a2 2 0 11-4 0 2 2 0 014 0z"></path>
                                </svg>
                                <span class="text-sm text-[#64748B]">Học sinh</span>
                            </div>
                            <p class="text-lg text-[#1E293B]" x-text="classItem.student_count"></p>
                        </div>
                        <div>
                            <div class="flex items-center gap-2 mb-1">
                                <svg class="w-4 h-4 text-green-600" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M9 12l2 2 4-4m6 2a9 9 0 11-18 0 9 9 0 0118 0z"></path>
                                </svg>
                                <span class="text-sm text-[#64748B]">Điểm danh</span>
                            </div>
                            <p class="text-lg text-[#1E293B]" x-text="classItem.attendance_rate + '%'"></p>
                        </div>
                    </div>

                    <!-- Room Info -->
                    <div class="flex items-center gap-2 mb-4 text-sm text-[#64748B]">
                        <svg class="w-4 h-4" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M17.657 16.657L13.414 20.9a1.998 1.998 0 01-2.827 0l-4.244-4.243a8 8 0 1111.314 0z"></path>
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M15 11a3 3 0 11-6 0 3 3 0 016 0z"></path>
                        </svg>
                        <span x-text="'Phòng: ' + classItem.room"></span>
                    </div>

                    <!-- Actions -->
                    <div class="flex items-center gap-2 pt-4 border-t border-gray-100">
                        <button
                            @click="viewClassDetail(classItem)"
                            class="flex-1 px-3 py-2 text-sm text-[#3B82F6] border border-[#3B82F6] rounded-lg hover:bg-[#3B82F6]/10 transition-colors"
                        >
                            Xem chi tiết
                        </button>
                        <button
                            @click="editClass(classItem)"
                            class="p-2 text-[#3B82F6] hover:bg-[#3B82F6]/10 rounded-lg transition-colors"
                            title="Chỉnh sửa"
                        >
                            <svg class="w-5 h-5" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M11 5H6a2 2 0 00-2 2v11a2 2 0 002 2h11a2 2 0 002-2v-5m-1.414-9.414a2 2 0 112.828 2.828L11.828 15H9v-2.828l8.586-8.586z"></path>
                            </svg>
                        </button>
                        <button
                            @click="deleteClass(classItem)"
                            class="p-2 text-red-600 hover:bg-red-50 rounded-lg transition-colors"
                            title="Xóa"
                        >
                            <svg class="w-5 h-5" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M19 7l-.867 12.142A2 2 0 0116.138 21H7.862a2 2 0 01-1.995-1.858L5 7m5 4v6m4-6v6m1-10V4a1 1 0 00-1-1h-4a1 1 0 00-1 1v3M4 7h16"></path>
                            </svg>
                        </button>
                    </div>
                </div>
            </template>
        </div>

        <!-- Empty State -->
        <div x-show="filteredClasses.length === 0" class="text-center py-12">
            <svg class="mx-auto h-12 w-12 text-[#64748B]" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M19 21V5a2 2 0 00-2-2H7a2 2 0 00-2 2v16m14 0h2m-2 0h-5m-9 0H3m2 0h5M9 7h1m-1 4h1m4-4h1m-1 4h1m-5 10v-5a1 1 0 011-1h2a1 1 0 011 1v5m-4 0h4"></path>
            </svg>
            <h3 class="mt-2 text-sm text-[#1E293B]">Không tìm thấy lớp học</h3>
            <p class="mt-1 text-sm text-[#64748B]">Thử thay đổi bộ lọc hoặc thêm lớp học mới</p>
        </div>

        <!-- Detail Modal -->
        <div
            x-show="showDetailModal"
            x-transition:enter="transition ease-out duration-300"
            x-transition:enter-start="opacity-0"
            x-transition:enter-end="opacity-100"
            class="fixed inset-0 bg-black bg-opacity-50 z-50 flex items-center justify-center p-4"
            @click.self="closeDetailModal()"
        >
            <div class="bg-white rounded-xl shadow-xl max-w-5xl w-full max-h-[90vh] overflow-y-auto">
                <!-- Modal Header -->
                <div class="px-6 py-4 border-b border-gray-200 flex items-center justify-between sticky top-0 bg-white z-10">
                    <div class="flex items-center gap-3">
                        <div class="w-12 h-12 bg-[#3B82F6]/10 rounded-lg flex items-center justify-center">
                            <svg class="w-6 h-6 text-[#3B82F6]" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M19 21V5a2 2 0 00-2-2H7a2 2 0 00-2 2v16m14 0h2m-2 0h-5m-9 0H3m2 0h5M9 7h1m-1 4h1m4-4h1m-1 4h1m-5 10v-5a1 1 0 011-1h2a1 1 0 011 1v5m-4 0h4"></path>
                            </svg>
                        </div>
                        <div>
                            <h3 class="text-[#1E293B]" x-text="'Chi tiết lớp ' + (selectedClass?.name || '')"></h3>
                            <p class="text-sm text-[#64748B]" x-text="'Năm học ' + (selectedClass?.academic_year || '')"></p>
                        </div>
                    </div>
                    <button @click="closeDetailModal()" class="text-[#64748B] hover:text-[#1E293B] p-2 hover:bg-gray-100 rounded-lg transition-colors">
                        <svg class="w-6 h-6" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M6 18L18 6M6 6l12 12"></path>
                        </svg>
                    </button>
                </div>

                <!-- Modal Body -->
                <div class="px-6 py-6 space-y-6">
                    <!-- Overview Stats -->
                    <div class="grid grid-cols-1 md:grid-cols-4 gap-4">
                        <div class="bg-gradient-to-br from-blue-50 to-blue-100 rounded-xl p-4 border border-blue-200">
                            <div class="flex items-center gap-3 mb-2">
                                <div class="w-10 h-10 bg-blue-500 rounded-lg flex items-center justify-center">
                                    <svg class="w-5 h-5 text-white" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M17 20h5v-2a3 3 0 00-5.356-1.857M17 20H7m10 0v-2c0-.656-.126-1.283-.356-1.857M7 20H2v-2a3 3 0 015.356-1.857M7 20v-2c0-.656.126-1.283.356-1.857m0 0a5.002 5.002 0 019.288 0M15 7a3 3 0 11-6 0 3 3 0 016 0zm6 3a2 2 0 11-4 0 2 2 0 014 0zM7 10a2 2 0 11-4 0 2 2 0 014 0z"></path>
                                    </svg>
                                </div>
                                <span class="text-sm text-blue-900">Sĩ số</span>
                            </div>
                            <div class="text-2xl text-blue-900" x-text="selectedClass?.student_count + '/' + selectedClass?.max_students"></div>
                        </div>

                        <div class="bg-gradient-to-br from-green-50 to-green-100 rounded-xl p-4 border border-green-200">
                            <div class="flex items-center gap-3 mb-2">
                                <div class="w-10 h-10 bg-green-500 rounded-lg flex items-center justify-center">
                                    <svg class="w-5 h-5 text-white" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M9 12l2 2 4-4m6 2a9 9 0 11-18 0 9 9 0 0118 0z"></path>
                                    </svg>
                                </div>
                                <span class="text-sm text-green-900">Điểm danh</span>
                            </div>
                            <div class="text-2xl text-green-900" x-text="selectedClass?.attendance_rate + '%'"></div>
                        </div>

                        <div class="bg-gradient-to-br from-purple-50 to-purple-100 rounded-xl p-4 border border-purple-200">
                            <div class="flex items-center gap-3 mb-2">
                                <div class="w-10 h-10 bg-purple-500 rounded-lg flex items-center justify-center">
                                    <svg class="w-5 h-5 text-white" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M17.657 16.657L13.414 20.9a1.998 1.998 0 01-2.827 0l-4.244-4.243a8 8 0 1111.314 0z"></path>
                                    </svg>
                                </div>
                                <span class="text-sm text-purple-900">Phòng học</span>
                            </div>
                            <div class="text-2xl text-purple-900" x-text="selectedClass?.room"></div>
                        </div>

                        <div class="bg-gradient-to-br from-orange-50 to-orange-100 rounded-xl p-4 border border-orange-200">
                            <div class="flex items-center gap-3 mb-2">
                                <div class="w-10 h-10 bg-orange-500 rounded-lg flex items-center justify-center">
                                    <svg class="w-5 h-5 text-white" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M12 6.253v13m0-13C10.832 5.477 9.246 5 7.5 5S4.168 5.477 3 6.253v13C4.168 18.477 5.754 18 7.5 18s3.332.477 4.5 1.253m0-13C13.168 5.477 14.754 5 16.5 5c1.747 0 3.332.477 4.5 1.253v13C19.832 18.477 18.247 18 16.5 18c-1.746 0-3.332.477-4.5 1.253"></path>
                                    </svg>
                                </div>
                                <span class="text-sm text-orange-900">Khối</span>
                            </div>
                            <div class="text-2xl text-orange-900" x-text="'Lớp ' + selectedClass?.grade"></div>
                        </div>
                    </div>

                    <!-- Class Info -->
                    <div class="bg-white rounded-xl border border-gray-200 p-6">
                        <h4 class="text-[#1E293B] mb-4 flex items-center gap-2">
                            <svg class="w-5 h-5 text-[#3B82F6]" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M13 16h-1v-4h-1m1-4h.01M21 12a9 9 0 11-18 0 9 9 0 0118 0z"></path>
                            </svg>
                            Thông tin chung
                        </h4>
                        <div class="grid grid-cols-1 md:grid-cols-2 gap-6">
                            <div class="flex items-start gap-3">
                                <div class="w-10 h-10 bg-[#3B82F6] rounded-full flex items-center justify-center flex-shrink-0">
                                    <svg class="w-5 h-5 text-white" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M16 7a4 4 0 11-8 0 4 4 0 018 0zM12 14a7 7 0 00-7 7h14a7 7 0 00-7-7z"></path>
                                    </svg>
                                </div>
                                <div>
                                    <p class="text-sm text-[#64748B] mb-1">Giáo viên chủ nhiệm</p>
                                    <p class="text-[#1E293B]" x-text="selectedClass?.teacher_name"></p>
                                    <p class="text-sm text-[#64748B] mt-1">Email: gvcn@school.edu.vn</p>
                                </div>
                            </div>
                            <div class="flex items-start gap-3">
                                <div class="w-10 h-10 bg-purple-500 rounded-full flex items-center justify-center flex-shrink-0">
                                    <svg class="w-5 h-5 text-white" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M8 7V3m8 4V3m-9 8h10M5 21h14a2 2 0 002-2V7a2 2 0 00-2-2H5a2 2 0 00-2 2v12a2 2 0 002 2z"></path>
                                    </svg>
                                </div>
                                <div>
                                    <p class="text-sm text-[#64748B] mb-1">Thời gian học</p>
                                    <p class="text-[#1E293B]">Thứ 2 - Thứ 6</p>
                                    <p class="text-sm text-[#64748B] mt-1">7:00 - 11:30</p>
                                </div>
                            </div>
                        </div>
                    </div>

                    <!-- Attendance Calculation -->
                    <div class="bg-gradient-to-br from-green-50 to-emerald-50 rounded-xl border border-green-200 p-6">
                        <h4 class="text-[#1E293B] mb-4 flex items-center gap-2">
                            <svg class="w-5 h-5 text-green-600" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M9 7h6m0 10v-3m-3 3h.01M9 17h.01M9 14h.01M12 14h.01M15 11h.01M12 11h.01M9 11h.01M7 21h10a2 2 0 002-2V5a2 2 0 00-2-2H7a2 2 0 00-2 2v14a2 2 0 002 2z"></path>
                            </svg>
                            Cách tính tỷ lệ điểm danh
                        </h4>

                        <div class="bg-white rounded-lg p-4 mb-4">
                            <div class="flex items-center justify-between mb-3">
                                <span class="text-sm text-[#64748B]">Công thức:</span>
                                <code class="px-3 py-1 bg-gray-100 text-[#1E293B] rounded text-sm">
                                    (Tổng số buổi có mặt / Tổng số buổi học) × 100%
                                </code>
                            </div>
                            <div class="border-t border-gray-200 pt-3 space-y-2">
                                <div class="flex justify-between items-center">
                                    <span class="text-sm text-[#64748B]">Tổng số buổi học:</span>
                                    <span class="text-[#1E293B]" x-text="selectedClass?.total_sessions || 120"></span>
                                </div>
                                <div class="flex justify-between items-center">
                                    <span class="text-sm text-[#64748B]">Tổng buổi có mặt:</span>
                                    <span class="text-green-600" x-text="selectedClass?.attended_sessions || 114"></span>
                                </div>
                                <div class="flex justify-between items-center">
                                    <span class="text-sm text-[#64748B]">Tổng buổi vắng:</span>
                                    <span class="text-red-600" x-text="selectedClass?.absent_sessions || 6"></span>
                                </div>
                                <div class="border-t border-gray-200 pt-2 mt-2">
                                    <div class="flex justify-between items-center">
                                        <span class="text-[#1E293B]">Tỷ lệ điểm danh:</span>
                                        <span class="text-lg text-green-600" x-text="selectedClass?.attendance_rate + '%'"></span>
                                    </div>
                                </div>
                            </div>
                        </div>

                        <div class="grid grid-cols-3 gap-3">
                            <div class="bg-white rounded-lg p-3 text-center">
                                <div class="text-2xl text-green-600 mb-1" x-text="(selectedClass?.attended_sessions || 114)"></div>
                                <div class="text-xs text-[#64748B]">Buổi có mặt</div>
                            </div>
                            <div class="bg-white rounded-lg p-3 text-center">
                                <div class="text-2xl text-red-600 mb-1" x-text="(selectedClass?.absent_sessions || 6)"></div>
                                <div class="text-xs text-[#64748B]">Buổi vắng</div>
                            </div>
                            <div class="bg-white rounded-lg p-3 text-center">
                                <div class="text-2xl text-orange-600 mb-1" x-text="(selectedClass?.late_sessions || 2)"></div>
                                <div class="text-xs text-[#64748B]">Buổi đi muộn</div>
                            </div>
                        </div>
                    </div>

                    <!-- Students List -->
                    <div class="bg-white rounded-xl border border-gray-200">
                        <div class="px-6 py-4 border-b border-gray-200 flex items-center justify-between">
                            <h4 class="text-[#1E293B] flex items-center gap-2">
                                <svg class="w-5 h-5 text-[#3B82F6]" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M17 20h5v-2a3 3 0 00-5.356-1.857M17 20H7m10 0v-2c0-.656-.126-1.283-.356-1.857M7 20H2v-2a3 3 0 015.356-1.857M7 20v-2c0-.656.126-1.283.356-1.857m0 0a5.002 5.002 0 019.288 0M15 7a3 3 0 11-6 0 3 3 0 016 0zm6 3a2 2 0 11-4 0 2 2 0 014 0zM7 10a2 2 0 11-4 0 2 2 0 014 0z"></path>
                                </svg>
                                Danh sách học sinh (<span x-text="classStudents.length"></span>)
                            </h4>
                            <input
                                type="text"
                                x-model="studentSearch"
                                @input="filterStudents()"
                                placeholder="Tìm học sinh..."
                                class="px-3 py-1.5 text-sm border border-gray-200 rounded-lg focus:ring-2 focus:ring-[#3B82F6] focus:border-transparent"
                            >
                        </div>
                        <div class="overflow-x-auto">
                            <table class="w-full">
                                <thead class="bg-[#F1F5F9]">
                                <tr>
                                    <th class="px-6 py-3 text-left text-xs text-[#64748B] uppercase">STT</th>
                                    <th class="px-6 py-3 text-left text-xs text-[#64748B] uppercase">Họ và tên</th>
                                    <th class="px-6 py-3 text-left text-xs text-[#64748B] uppercase">Mã số</th>
                                    <th class="px-6 py-3 text-left text-xs text-[#64748B] uppercase">Giới tính</th>
                                    <th class="px-6 py-3 text-left text-xs text-[#64748B] uppercase">Điểm danh</th>
                                    <th class="px-6 py-3 text-left text-xs text-[#64748B] uppercase">Xếp loại</th>
                                </tr>
                                </thead>
                                <tbody class="bg-white divide-y divide-gray-200">
                                <template x-for="(student, index) in filteredStudents" :key="student.id">
                                    <tr class="hover:bg-gray-50">
                                        <td class="px-6 py-4 whitespace-nowrap text-sm text-[#64748B]" x-text="index + 1"></td>
                                        <td class="px-6 py-4 whitespace-nowrap">
                                            <div class="flex items-center">
                                                <img
                                                    class="h-8 w-8 rounded-full object-cover"
                                                    :src="'https://ui-avatars.com/api/?name=' + encodeURIComponent(student.name) + '&background=3B82F6&color=fff'"
                                                    :alt="student.name"
                                                >
                                                <div class="ml-3">
                                                    <div class="text-sm text-[#1E293B]" x-text="student.name"></div>
                                                </div>
                                            </div>
                                        </td>
                                        <td class="px-6 py-4 whitespace-nowrap text-sm text-[#64748B]" x-text="student.code"></td>
                                        <td class="px-6 py-4 whitespace-nowrap text-sm text-[#64748B]" x-text="student.gender === 'male' ? 'Nam' : 'Nữ'"></td>
                                        <td class="px-6 py-4 whitespace-nowrap">
                                            <span class="text-sm" :class="student.attendance >= 95 ? 'text-green-600' : student.attendance >= 80 ? 'text-orange-600' : 'text-red-600'" x-text="student.attendance + '%'"></span>
                                        </td>
                                        <td class="px-6 py-4 whitespace-nowrap">
                                            <span
                                                class="px-2 py-1 rounded-full text-xs"
                                                :class="getStudentRating(student.rating)"
                                                x-text="student.rating"
                                            ></span>
                                        </td>
                                    </tr>
                                </template>
                                </tbody>
                            </table>
                        </div>
                    </div>
                </div>

                <!-- Modal Footer -->
                <div class="px-6 py-4 border-t border-gray-200 bg-gray-50 flex items-center justify-end gap-3">
                    <button
                        @click="closeDetailModal()"
                        class="px-4 py-2 text-[#64748B] hover:text-[#1E293B] border border-gray-200 rounded-lg hover:bg-white transition-colors"
                    >
                        Đóng
                    </button>
                    <button
                        @click="editClass(selectedClass)"
                        class="px-4 py-2 bg-[#3B82F6] text-white rounded-lg hover:bg-[#2563EB] transition-colors"
                    >
                        Chỉnh sửa
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
                class="bg-white rounded-xl shadow-xl max-w-2xl w-full max-h-[90vh] overflow-y-auto"
            >
                <!-- Modal Header -->
                <div class="px-6 py-4 border-b border-gray-200 flex items-center justify-between sticky top-0 bg-white">
                    <h3 class="text-[#1E293B]" x-text="isEditing ? 'Chỉnh sửa lớp học' : 'Thêm lớp học mới'"></h3>
                    <button @click="closeModal()" class="text-[#64748B] hover:text-[#1E293B]">
                        <svg class="w-6 h-6" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M6 18L18 6M6 6l12 12"></path>
                        </svg>
                    </button>
                </div>

                <!-- Modal Body -->
                <form @submit.prevent="saveClass()" class="px-6 py-4">
                    <div class="grid grid-cols-1 md:grid-cols-2 gap-4">
                        <!-- Class Name -->
                        <div>
                            <label class="block text-sm text-[#1E293B] mb-2">
                                Tên lớp <span class="text-red-500">*</span>
                            </label>
                            <input
                                type="text"
                                x-model="formData.name"
                                required
                                class="w-full px-4 py-2 border border-gray-200 rounded-lg focus:ring-2 focus:ring-[#3B82F6] focus:border-transparent"
                                placeholder="VD: 10A1"
                            >
                        </div>

                        <!-- Grade -->
                        <div>
                            <label class="block text-sm text-[#1E293B] mb-2">
                                Khối <span class="text-red-500">*</span>
                            </label>
                            <select
                                x-model="formData.grade"
                                required
                                class="w-full px-4 py-2 border border-gray-200 rounded-lg focus:ring-2 focus:ring-[#3B82F6] focus:border-transparent"
                            >
                                <option value="">Chọn khối</option>
                                <option value="10">Khối 10</option>
                                <option value="11">Khối 11</option>
                                <option value="12">Khối 12</option>
                            </select>
                        </div>

                        <!-- Academic Year -->
                        <div>
                            <label class="block text-sm text-[#1E293B] mb-2">
                                Năm học <span class="text-red-500">*</span>
                            </label>
                            <select
                                x-model="formData.academic_year"
                                required
                                class="w-full px-4 py-2 border border-gray-200 rounded-lg focus:ring-2 focus:ring-[#3B82F6] focus:border-transparent"
                            >
                                <option value="">Chọn năm học</option>
                                <option value="2024-2025">2024-2025</option>
                                <option value="2023-2024">2023-2024</option>
                            </select>
                        </div>

                        <!-- Room -->
                        <div>
                            <label class="block text-sm text-[#1E293B] mb-2">
                                Phòng học <span class="text-red-500">*</span>
                            </label>
                            <input
                                type="text"
                                x-model="formData.room"
                                required
                                class="w-full px-4 py-2 border border-gray-200 rounded-lg focus:ring-2 focus:ring-[#3B82F6] focus:border-transparent"
                                placeholder="VD: A101"
                            >
                        </div>

                        <!-- Homeroom Teacher -->
                        <div class="md:col-span-2">
                            <label class="block text-sm text-[#1E293B] mb-2">
                                Giáo viên chủ nhiệm <span class="text-red-500">*</span>
                            </label>
                            <select
                                x-model="formData.teacher_id"
                                required
                                class="w-full px-4 py-2 border border-gray-200 rounded-lg focus:ring-2 focus:ring-[#3B82F6] focus:border-transparent"
                            >
                                <option value="">Chọn giáo viên</option>
                                <option value="1">Nguyễn Văn An</option>
                                <option value="2">Trần Thị Bình</option>
                                <option value="3">Lê Minh Châu</option>
                            </select>
                        </div>

                        <!-- Max Students -->
                        <div>
                            <label class="block text-sm text-[#1E293B] mb-2">
                                Sĩ số tối đa
                            </label>
                            <input
                                type="number"
                                x-model="formData.max_students"
                                min="1"
                                class="w-full px-4 py-2 border border-gray-200 rounded-lg focus:ring-2 focus:ring-[#3B82F6] focus:border-transparent"
                                placeholder="35"
                            >
                        </div>

                        <!-- Description -->
                        <div class="md:col-span-2">
                            <label class="block text-sm text-[#1E293B] mb-2">
                                Ghi chú
                            </label>
                            <textarea
                                x-model="formData.description"
                                rows="3"
                                class="w-full px-4 py-2 border border-gray-200 rounded-lg focus:ring-2 focus:ring-[#3B82F6] focus:border-transparent"
                                placeholder="Thông tin bổ sung về lớp học..."
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
    </div>

    <script>
        // javascript
        function classManager() {
            return {
                classes: [],
                filteredClasses: [],
                showModal: false,
                showDetailModal: false,
                isEditing: false,
                selectedClass: null,
                classStudents: [],
                filteredStudents: [],
                studentSearch: '',
                filters: {
                    search: '',
                    grade: '',
                    academicYear: '',
                    sortBy: 'name'
                },
                formData: {
                    name: '',
                    grade: '',
                    academic_year: '',
                    room: '',
                    teacher_id: '',
                    max_students: 35,
                    description: ''
                },

                // Load classes from server
                async fetchClasses() {
                    try {
                        const res = await fetch('/api/classes');
                        if (!res.ok) throw new Error('Failed to fetch classes');
                        const data = await res.json();
                        this.classes = data;
                        this.filterClasses();
                    } catch (e) {
                        console.error(e);
                        alert('Không thể tải danh sách lớp từ server.');
                    }
                },

                // init: call fetchClasses instead of setting sample data
                init() {
                    this.fetchClasses();
                },

                // view detail: fetch class detail and students from server
                async viewClassDetail(classItem) {
                    try {
                        const [clsRes, studentsRes] = await Promise.all([
                            fetch(`/api/classes/${classItem.id}`),
                            fetch(`/api/classes/${classItem.id}/students`)
                        ]);
                        if (!clsRes.ok || !studentsRes.ok) throw new Error('Failed to fetch detail');
                        this.selectedClass = await clsRes.json();
                        this.classStudents = await studentsRes.json();
                        this.filteredStudents = this.classStudents;
                        this.studentSearch = '';
                        this.showDetailModal = true;
                    } catch (e) {
                        console.error(e);
                        alert('Không thể tải chi tiết lớp từ server.');
                    }
                },

                filterClasses() {
                    let result = [...this.classes];

                    if (this.filters.search) {
                        const search = this.filters.search.toLowerCase();
                        result = result.filter(c =>
                            c.name.toLowerCase().includes(search) ||
                            c.teacher_name.toLowerCase().includes(search)
                        );
                    }

                    if (this.filters.grade) {
                        result = result.filter(c => c.grade === this.filters.grade);
                    }

                    if (this.filters.academicYear) {
                        result = result.filter(c => c.academic_year === this.filters.academicYear);
                    }

                    result.sort((a, b) => {
                        switch(this.filters.sortBy) {
                            case 'name':
                                return a.name.localeCompare(b.name);
                            case 'grade':
                                return a.grade.localeCompare(b.grade);
                            case 'students':
                                return b.student_count - a.student_count;
                            case 'attendance':
                                return b.attendance_rate - a.attendance_rate;
                            default:
                                return 0;
                        }
                    });

                    this.filteredClasses = result;
                },

                filterStudents() {
                    if (!this.studentSearch) {
                        this.filteredStudents = this.classStudents;
                        return;
                    }
                    const search = this.studentSearch.toLowerCase();
                    this.filteredStudents = this.classStudents.filter(s =>
                        s.name.toLowerCase().includes(search) ||
                        s.code.toLowerCase().includes(search)
                    );
                },

                getGradeColor(grade) {
                    const colors = {
                        '10': 'bg-blue-100 text-blue-800',
                        '11': 'bg-purple-100 text-purple-800',
                        '12': 'bg-green-100 text-green-800'
                    };
                    return colors[grade] || 'bg-gray-100 text-gray-800';
                },

                getStudentRating(rating) {
                    const colors = {
                        'Giỏi': 'bg-green-100 text-green-800',
                        'Khá': 'bg-blue-100 text-blue-800',
                        'Trung bình': 'bg-orange-100 text-orange-800'
                    };
                    return colors[rating] || 'bg-gray-100 text-gray-800';
                },

                openCreateModal() {
                    this.isEditing = false;
                    this.formData = {
                        name: '',
                        grade: '',
                        academic_year: '2024-2025',
                        room: '',
                        teacher_id: '',
                        max_students: 35,
                        description: ''
                    };
                    this.showModal = true;
                },

                editClass(classItem) {
                    this.isEditing = true;
                    this.selectedClass = classItem;
                    this.formData = { ...classItem };
                    this.showDetailModal = false;
                    this.showModal = true;
                },

                closeModal() {
                    this.showModal = false;
                    this.selectedClass = null;
                },

                closeDetailModal() {
                    this.showDetailModal = false;
                    this.selectedClass = null;
                    this.classStudents = [];
                    this.filteredStudents = [];
                },

                // saveClass now uses API (POST or PUT)
                async saveClass() {
                    const tokenMeta = document.querySelector('meta[name="csrf-token"]');
                    const csrf = tokenMeta ? tokenMeta.getAttribute('content') : '';

                    try {
                        let res;
                        if (this.isEditing && this.selectedClass && this.selectedClass.id) {
                            res = await fetch(`/api/classes/${this.selectedClass.id}`, {
                                method: 'PUT',
                                headers: {
                                    'Content-Type': 'application/json',
                                    'X-CSRF-TOKEN': csrf
                                },
                                body: JSON.stringify(this.formData)
                            });
                        } else {
                            res = await fetch('/api/classes', {
                                method: 'POST',
                                headers: {
                                    'Content-Type': 'application/json',
                                    'X-CSRF-TOKEN': csrf
                                },
                                body: JSON.stringify(this.formData)
                            });
                        }

                        if (!res.ok) throw new Error('Save failed');

                        // After success, refresh list from server
                        await this.fetchClasses();
                        this.closeModal();
                        alert(this.isEditing ? 'Cập nhật lớp học thành công!' : 'Thêm lớp học mới thành công!');
                    } catch (e) {
                        console.error(e);
                        alert('Lưu lớp học thất bại.');
                    }
                },

                // deleteClass now calls API
                async deleteClass(classItem) {
                    if (!confirm(`Bạn có chắc chắn muốn xóa lớp ${classItem.name}?`)) return;

                    const tokenMeta = document.querySelector('meta[name="csrf-token"]');
                    const csrf = tokenMeta ? tokenMeta.getAttribute('content') : '';

                    try {
                        const res = await fetch(`/api/classes/${classItem.id}`, {
                            method: 'DELETE',
                            headers: {
                                'X-CSRF-TOKEN': csrf
                            }
                        });
                        if (!res.ok) throw new Error('Delete failed');
                        await this.fetchClasses();
                        alert('Đã xóa lớp học thành công!');
                    } catch (e) {
                        console.error(e);
                        alert('Xóa lớp học thất bại.');
                    }
                }
            }
        }
    </script>
@endsection
