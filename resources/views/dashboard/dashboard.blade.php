@extends('layout.app')

@section('title', 'Dashboard - Trường A')

@section('content')
    <div class="space-y-6">
        <!-- Stats Cards -->
        <div class="grid grid-cols-1 md:grid-cols-2 lg:grid-cols-4 gap-6">
            <!-- Card 1 -->
            <div class="bg-white rounded-2xl p-6 card-shadow">
                <div class="flex items-start justify-between">
                    <div class="space-y-2">
                        <p class="text-sm text-gray-500">Tổng số học sinh</p>
                        <h3 class="text-3xl font-semibold">1,234</h3>
                        <span class="text-sm text-green-600">+12% từ tháng trước</span>
                    </div>
                    <div class="w-12 h-12 bg-blue-500 rounded-xl flex items-center justify-center">
                        <i data-lucide="users" class="w-6 h-6 text-white"></i>
                    </div>
                </div>
            </div>

            <!-- Card 2 -->
            <div class="bg-white rounded-2xl p-6 card-shadow">
                <div class="flex items-start justify-between">
                    <div class="space-y-2">
                        <p class="text-sm text-gray-500">Tổng số giáo viên</p>
                        <h3 class="text-3xl font-semibold">87</h3>
                        <span class="text-sm text-green-600">+5% từ tháng trước</span>
                    </div>
                    <div class="w-12 h-12 bg-purple-500 rounded-xl flex items-center justify-center">
                        <i data-lucide="graduation-cap" class="w-6 h-6 text-white"></i>
                    </div>
                </div>
            </div>

            <!-- Card 3 -->
            <div class="bg-white rounded-2xl p-6 card-shadow">
                <div class="flex items-start justify-between">
                    <div class="space-y-2">
                        <p class="text-sm text-gray-500">Tổng số lớp học</p>
                        <h3 class="text-3xl font-semibold">42</h3>
                        <span class="text-sm text-green-600">+3% từ tháng trước</span>
                    </div>
                    <div class="w-12 h-12 bg-green-500 rounded-xl flex items-center justify-center">
                        <i data-lucide="book-open" class="w-6 h-6 text-white"></i>
                    </div>
                </div>
            </div>

            <!-- Card 4 -->
            <div class="bg-white rounded-2xl p-6 card-shadow">
                <div class="flex items-start justify-between">
                    <div class="space-y-2">
                        <p class="text-sm text-gray-500">Tỷ lệ điểm danh TB</p>
                        <h3 class="text-3xl font-semibold">94.2%</h3>
                        <span class="text-sm text-green-600">+2.1% từ tháng trước</span>
                    </div>
                    <div class="w-12 h-12 bg-orange-500 rounded-xl flex items-center justify-center">
                        <i data-lucide="trending-up" class="w-6 h-6 text-white"></i>
                    </div>
                </div>
            </div>
        </div>

{{--        <!-- Charts -->--}}
{{--        <div class="grid grid-cols-1 lg:grid-cols-2 gap-6">--}}
{{--            <!-- Attendance Chart -->--}}
{{--            <div class="bg-white rounded-2xl p-6 card-shadow">--}}
{{--                <div class="mb-4">--}}
{{--                    <h3 class="text-lg font-semibold">Điểm danh theo lớp</h3>--}}
{{--                    <p class="text-sm text-gray-500">Tỷ lệ điểm danh trung bình các lớp nổi bật</p>--}}
{{--                </div>--}}
{{--                <canvas id="attendanceChart" height="300"></canvas>--}}
{{--            </div>--}}

{{--            <!-- Distribution Chart -->--}}
{{--            <div class="bg-white rounded-2xl p-6 card-shadow">--}}
{{--                <div class="mb-4">--}}
{{--                    <h3 class="text-lg font-semibold">Phân bổ học sinh theo khối</h3>--}}
{{--                    <p class="text-sm text-gray-500">Tổng quan số lượng học sinh từng khối</p>--}}
{{--                </div>--}}
{{--                <canvas id="distributionChart" height="300"></canvas>--}}
{{--            </div>--}}
{{--        </div>--}}

        <!-- Class Table -->
        <div class="bg-white rounded-2xl card-shadow">
            <div class="p-6 border-b">
                <h3 class="text-lg font-semibold">Danh sách lớp học nổi bật</h3>
                <p class="text-sm text-gray-500">Các lớp có tỷ lệ điểm danh cao nhất</p>
            </div>
            <div class="p-6">
                <div class="overflow-x-auto">
                    <table class="w-full">
                        <thead>
                        <tr class="border-b">
                            <th class="text-left py-3 px-4 text-gray-500 font-medium">Tên lớp</th>
                            <th class="text-left py-3 px-4 text-gray-500 font-medium">Giáo viên chủ nhiệm</th>
                            <th class="text-left py-3 px-4 text-gray-500 font-medium">Tỷ lệ điểm danh</th>
                            <th class="text-left py-3 px-4 text-gray-500 font-medium">Số học sinh</th>
                        </tr>
                        </thead>
                        <tbody>
                        <tr class="border-b">
                            <td class="py-3 px-4">Lớp 10A1</td>
                            <td class="py-3 px-4">Nguyễn Văn A</td>
                            <td class="py-3 px-4">
                                <span class="inline-flex items-center px-2.5 py-0.5 rounded-full text-xs font-medium bg-green-100 text-green-800">
                                    95.2%
                                </span>
                            </td>
                            <td class="py-3 px-4">35 học sinh</td>

                        </tr>
                        <tr class="border-b">
                            <td class="py-3 px-4">Lớp 11B2</td>
                            <td class="py-3 px-4">Trần Thị B</td>
                            <td class="py-3 px-4">
                                <span class="inline-flex items-center px-2.5 py-0.5 rounded-full text-xs font-medium bg-green-100 text-green-800">
                                    96.8%
                                </span>
                            </td>
                            <td class="py-3 px-4">32 học sinh</td>

                        </tr>
                        <tr class="border-b">
                            <td class="py-3 px-4">Lớp 12C1</td>
                            <td class="py-3 px-4">Lê Văn C</td>

                            <td class="py-3 px-4">38 học sinh</td>

                        </tr>
                        <tr>
                            <td class="py-3 px-4">Lớp 10A2</td>
                            <td class="py-3 px-4">Phạm Thị D</td>
                            <td class="py-3 px-4">
                                <span class="inline-flex items-center px-2.5 py-0.5 rounded-full text-xs font-medium bg-green-100 text-green-800">
                                    92.3%
                                </span>
                            </td>
                            <td class="py-3 px-4">34 học sinh</td>
                            <td class="py-3 px-4">
                                <button class="px-4 py-2 text-sm border border-gray-300 rounded-xl hover:bg-gray-50">
                                    Xem chi tiết
                                </button>
                            </td>
                        </tr>
                        </tbody>
                    </table>
                </div>
            </div>
        </div>
    </div>
@endsection

@push('scripts')
    <script>
        // Attendance Bar Chart
        const attendanceCtx = document.getElementById('attendanceChart').getContext('2d');
        new Chart(attendanceCtx, {
            type: 'bar',
            data: {
                labels: ['Lớp 10A1', 'Lớp 10A2', 'Lớp 11B1', 'Lớp 11B2', 'Lớp 12C1', 'Lớp 12C2'],
                datasets: [{
                    label: 'Tỷ lệ điểm danh (%)',
                    data: [95, 92, 88, 96, 91, 94],
                    backgroundColor: '#3B82F6',
                    borderRadius: 8,
                }]
            },
            options: {
                responsive: true,
                maintainAspectRatio: false,
                scales: {
                    y: {
                        beginAtZero: false,
                        min: 80,
                        max: 100
                    }
                }
            }
        });

        // Distribution Pie Chart
        const distributionCtx = document.getElementById('distributionChart').getContext('2d');
        new Chart(distributionCtx, {
            type: 'pie',
            data: {
                labels: ['Khối 10', 'Khối 11', 'Khối 12'],
                datasets: [{
                    data: [420, 398, 416],
                    backgroundColor: ['#3B82F6', '#8B5CF6', '#10B981'],
                }]
            },
            options: {
                responsive: true,
                maintainAspectRatio: false,
                plugins: {
                    legend: {
                        position: 'bottom'
                    }
                }
            }
        });

        // Reinitialize Lucide icons
        lucide.createIcons();
    </script>
@endpush



