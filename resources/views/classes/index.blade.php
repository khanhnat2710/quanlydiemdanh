@extends('layout.app')

@section('title', 'Lớp học - Quản lý lớp học')

@section('content')
    <div>
        <a href="{{ route('classes.create') }}">
            <button>
                Thêm lớp học
            </button>
        </a>
    </div>

    <div>
        <table class="min-w-full border border-gray-200 text-sm text-left">
            <thead>
                <tr>
                    <th class="px-4 py-2 border text-center">STT</th>
                    <th class="px-4 py-2 border text-center">Tên lớp</th>
                    <th class="px-4 py-2 border text-center">Lớp</th>
                    <th class="px-4 py-2 border text-center">Sĩ số</th>
                    <th class="px-4 py-2 border text-center">Giáo viên chủ nhiệm</th>
                    <th></th>
                    <th></th>
                </tr>
            </thead>
            @foreach($classes as $class)
            <tbody>
                <tr>
                    <td class="text-center">{{ $class->id }}</td>
                    <td class="text-center">{{ $class->class_name }}</td>
                    <td class="text-center">{{ $class->grade }}</td>
                    <td class="text-center">{{ $class->number_of_students }}</td>
                    <td class="text-center">{{ $class->homeroomTeacher->full_name ?? 'Chưa phân công' }}</td>
                    <td class="text-center">Sửa</td>
                    <td class="text-center">Xóa</td>
                </tr>
            </tbody>
            @endforeach
        </table>
    </div>
@endsection
