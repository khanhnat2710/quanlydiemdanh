@extends('layout.app')
@section('content')
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

            <tbody>
                <tr>
                    <td class="text-center">1</td>
                    <td class="text-center">Nguyễn Văn A</td>
                    <td class="text-center">nguyenvana@gmail.com</td>
                    <td class="text-center">0123456789</td>
                </tr>
            </tbody>
        </table>
    </div>
@endsection
