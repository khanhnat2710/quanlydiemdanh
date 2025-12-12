@extends('layout.app')
@section('title', 'Lớp học - thêm lớp học mới')
@section('content')
    <form method="post" action="{{ route('classes.store') }} ">
        @csrf

        <div>
            <label for="class_name">Tên lớp: </label>
            <input type="text" name="class_name" id="class_name" placeholder="Nhập tên lớp">
        </div>

        <div>
            <label for="grade">Lớp: </label>
            <select name="grade" id="grade">
                <option>10</option>
                <option>11</option>
                <option>12</option>
            </select>
        </div>

        <div>
            <label for="number_of_students">Sĩ số: </label>
            <input type="text" name="number_of_students" id="number_of_students" placeholder="Nhập sĩ số">
        </div>

        <div>
            <label for="homeroom_teacher_id">Giáo viên chủ nhiệm: </label>
            <input type="text" name="homeroom_teacher_id" id="homeroom_teacher_id" placeholder="Nhập tên giáo viên">
        </div>

        <div>
            <a href="{{ route('classes.index') }}">
                Quay lại
            </a>
            <button type="submit">Thêm</button>
        </div>
    </form>
@endsection
