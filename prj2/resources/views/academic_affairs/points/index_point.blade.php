@extends('layouts.app')

@section('content')
    <div class="card">
        <div class="card-body">
            <table class="table table-striped table-responsive table-bordered">
                <thead>
                <tr>
                    <th>STT</th>
                    <th>Tên sinh viên</th>
                    <th>Mã sinh viên</th>
                    <th>Lý thuyết</th>
                    <th>Thực hành</th>
                    <th>ASM</th>
                    <th>Kết quả</th>
                    <th>Hành động</th>
                </tr>
                </thead>
                <tbody>
                @foreach($points as $point)
                    <tr>
                        <td>{{ $loop->iteration }}</td>
                        <td>{{ $point->name }}</td>
                        <td>{{ $point->student_code }}</td>
                        <td>{{ $point->theory }}</td>
                        <td>{{ $point->practice }}</td>
                        <td>{{ $point->asm }}</td>
                        <td>{{ $point->result }}</td>
                        <td>
                            <form action="{{ route('aa-point-edit') }}" method="GET">
                                @csrf
                                <input name="point_id" hidden value="{{ $point->point_id }}">
                                <button class="btn btn-warning">Nhập điểm</button>
                            </form>
                        </td>
                    </tr>
                @endforeach
                </tbody>
            </table>
        </div>
    </div>
@endsection
