@extends('layouts.app')

@section('content')
    <div class="p-6"
         x-data="{
        openCreate:false,
        openEdit:false,
        editId:'',
        editName:'',
        editGrade:'',
        editTeacher:'',
     }">

        <!-- Header -->
        <div class="flex justify-between items-center mb-6">
            <h1 class="text-2xl font-bold text-gray-700">Quản lý danh sách lớp học trong trường</h1>

            <button @click="openCreate=true"
                    class="flex items-center gap-2 bg-blue-600 text-white px-4 py-2 rounded-lg hover:bg-blue-700">
                <span class="text-xl font-bold">+</span> Thêm lớp học
            </button>
        </div>

        <!-- Table -->
        <div class="bg-white shadow-sm rounded-xl p-6">
            <h2 class="text-xl font-semibold text-gray-700 mb-4">Danh sách lớp học</h2>

            <table class="w-full border-collapse">
                <thead>
                <tr class="text-gray-600 font-semibold border-b">
                    <th class="py-3 text-left">Tên lớp</th>
                    <th class="py-3 text-left">Khối</th>
                    <th class="py-3 text-left">GVCN</th>
                    <th class="py-3 text-left">Sĩ số</th>
                    <th class="py-3 text-left">Tỷ lệ điểm danh</th>
                    <th class="py-3 text-center">Hành động</th>
                </tr>
                </thead>

                <tbody>
                @foreach($classes as $class)
                    <tr class="border-b hover:bg-gray-50 transition">
                        <td class="py-4">{{ $class->name }}</td>
                        <td>Khối {{ $class->grade }}</td>
                        <td>{{ $class->teacher }}</td>
                        <td>{{ $class->student_count }} học sinh</td>
                        <td>
                        <span class="px-3 py-1 bg-green-100 text-green-600 font-bold rounded-full">
                            {{ $class->attendance_rate }}%
                        </span>
                        </td>

                        <td class="flex justify-center gap-4 py-4">
                            <!-- Edit -->
                            <button @click="
                            openEdit=true;
                            editId={{ $class->id }};
                            editName='{{ $class->name }}';
                            editGrade='{{ $class->grade }}';
                            editTeacher='{{ $class->teacher }}';
                        " class="text-blue-600 hover:text-blue-800">✏️</button>

                            <!-- Delete -->
                            <form action="{{ route('classes.destroy', $class->id) }}" method="POST"
                                  onsubmit="return confirm('Bạn có chắc chắn muốn xóa?')">
                                @csrf
                                @method('DELETE')
                                <button class="text-red-600 hover:text-red-800">🗑️</button>
                            </form>
                        </td>
                    </tr>
                @endforeach
                </tbody>

            </table>
        </div>


        <!-- ================= MODAL THÊM ================= -->
        <div x-show="openCreate"
             class="fixed inset-0 bg-black/40 flex items-center justify-center z-50"
             x-transition>
            <div class="bg-white rounded-2xl p-6 w-[450px] relative shadow-xl">

                <button @click="openCreate=false"
                        class="absolute top-4 right-4 text-gray-500 hover:text-gray-700">✖</button>

                <h2 class="text-xl font-bold text-gray-700 mb-4">Thêm lớp học mới</h2>

                <form action="{{ route('classes.store') }}" method="POST">
                    @csrf

                    <label>Tên lớp</label>
                    <input type="text" name="name" placeholder="Ví dụ: Lớp 10A1"
                           class="mt-1 mb-4 w-full rounded-full border-gray-300 focus:ring-2 focus:ring-blue-500">

                    <label>Khối</label>
                    <select name="grade"
                            class="mt-1 mb-4 w-full rounded-full border-gray-300 focus:ring-2 focus:ring-blue-500">
                        <option>Chọn khối</option>
                        <option value="10">Khối 10</option>
                        <option value="11">Khối 11</option>
                        <option value="12">Khối 12</option>
                    </select>

                    <label>Giáo viên chủ nhiệm</label>
                    <input type="text" name="teacher" placeholder="Nhập tên giáo viên"
                           class="mt-1 mb-6 w-full rounded-full border-gray-300 focus:ring-2 focus:ring-blue-500">

                    <div class="flex gap-4">
                        <button type="submit"
                                class="flex-1 bg-blue-600 text-white py-3 rounded-full hover:bg-blue-700 font-semibold">
                            Lưu
                        </button>
                        <button type="button" @click="openCreate=false"
                                class="flex-1 bg-gray-100 text-gray-700 py-3 rounded-full hover:bg-gray-200 font-semibold">
                            Hủy
                        </button>
                    </div>
                </form>
            </div>
        </div>


        <!-- ================= MODAL SỬA ================= -->
        <div x-show="openEdit"
             class="fixed inset-0 bg-black/40 flex items-center justify-center z-50"
             x-transition>
            <div class="bg-white rounded-2xl p-6 w-[450px] relative shadow-xl">

                <button @click="openEdit=false"
                        class="absolute top-4 right-4 text-gray-500 hover:text-gray-700">✖</button>

                <h2 class="text-xl font-bold text-gray-700 mb-4">Chỉnh sửa lớp học</h2>

                <form :action="`/classes/${editId}`" method="POST">
                    @csrf
                    @method('PUT')

                    <label>Tên lớp</label>
                    <input type="text" name="name" x-model="editName"
                           class="mt-1 mb-4 w-full rounded-full border-gray-300 focus:ring-2 focus:ring-blue-500">

                    <label>Khối</label>
                    <select name="grade" x-model="editGrade"
                            class="mt-1 mb-4 w-full rounded-full border-gray-300 focus:ring-2 focus:ring-blue-500">
                        <option value="10">Khối 10</option>
                        <option value="11">Khối 11</option>
                        <option value="12">Khối 12</option>
                    </select>

                    <label>Giáo viên chủ nhiệm</label>
                    <input type="text" name="teacher" x-model="editTeacher"
                           class="mt-1 mb-6 w-full rounded-full border-gray-300 focus:ring-2 focus:ring-blue-500">

                    <div class="flex gap-4">
                        <button type="submit"
                                class="flex-1 bg-blue-600 text-white py-3 rounded-full hover:bg-blue-700 font-semibold">
                            Cập nhật
                        </button>
                        <button type="button" @click="openEdit=false"
                                class="flex-1 bg-gray-100 text-gray-700 py-3 rounded-full hover:bg-gray-200 font-semibold">
                            Hủy
                        </button>
                    </div>
                </form>
            </div>
        </div>

    </div>
@endsection
