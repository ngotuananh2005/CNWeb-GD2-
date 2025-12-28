@extends('layouts.app')

@section('content')
<h2>Danh sách sinh viên</h2>

<form action="{{ route('sinhvien.store') }}" method="POST">
    @csrf
    Tên sinh viên: <input type="text" name="ten_sinh_vien" required>
    Email: <input type="email" name="email" required>
    <button type="submit">Thêm</button>
</form>

<br>

<table border="1" cellpadding="5">
    <tr>
        <th>ID</th>
        <th>Tên</th>
        <th>Email</th>
    </tr>

    @foreach($danhSachSV as $sv)
    <tr>
        <td>{{ $sv->id }}</td>
        <td>{{ $sv->ten_sinh_vien }}</td>
        <td>{{ $sv->email }}</td>
    </tr>
    @endforeach
</table>
@endsection
