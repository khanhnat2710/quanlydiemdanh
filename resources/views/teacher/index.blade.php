@extends('layout.app')
@section('content')
    <div>
        <a href="{{ route('teacher.create') }}">
            <button>
                thêm giáo viên
            </button>
        </a>
    </div>
    <div>
        <table class="min-w-full border border-gray-200 text-sm text-left">
            <thead>
                <tr>
                    <th class="px-4 py-2 border text-center">STT</th>
                    <th class="px-4 py-2 border text-center">Họ tên giáo viên</th>
                    <th class="px-4 py-2 border text-center">Email</th>
                    <th class="px-4 py-2 border text-center">Số điện thoại</th>
                </tr>
            </thead>

            @foreach($teacher as $teacher)
            <tbody>
                <tr>
                    <td class="text-center">{{ $teacher->id }}</td>
                    <td class="text-center">{{ $teacher->full_name }}</td>
                    <td class="text-center">{{ $teacher->email }}</td>
                    <td class="text-center">{{ $teacher->phone_number }}</td>
                </tr>
            </tbody>
            @endforeach
        </table>
    </div>
@endsection
