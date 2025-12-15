@extends('layout.app')
@section('content')
    <form action="{{ route('teacher.store') }}" method="post">
        @csrf

        <div>
            <label for="full_name">Họ tên: </label>
            <input type="text" name="full_name" id="full_name" placeholder="Nhập họ tên">
        </div>

        <div>
            <label for="email">Email: </label>
            <input type="text" name="email" id="email" placeholder="Nhập email">
        </div>

        <div>
            <label for="phone_number">Số điện thoại: </label>
            <input type="text" name="phone_number" id="phone_number" placeholder="Nhập số điện thoại">
        </div>

        <div>
            <a href="{{ route('teacher.index') }}">
                quay lại
            </a>
            <button type="submit">
                thêm
            </button>
        </div>
    </form>
@endsection
