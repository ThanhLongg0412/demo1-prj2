@extends('layouts.app')

@section('content')
    <div class="card">
        <div class="card-body">
            @foreach($users as $user)
                <form action="{{ route('aa-student-update') }}" method="POST">
                    @csrf
                    <div class="modal-body">
                        <input name="id" hidden value="{{ $user->id }}">
                        <input class="form-control" name="name" placeholder="Tên sinh viên" value="{{ $user->name }}" autocomplete="off" style="margin-top: 20px" required>
                        <input class="form-control" name="student_code" placeholder="Mã sinh viên" value="{{ $user->student_code }}" autocomplete="off" style="margin-top: 20px" required>
                        <input class="form-control" name="email" placeholder="Email" value="{{ $user->email }}" autocomplete="off" style="margin-top: 20px" required>
                        <input type="password" class="form-control" name="password" placeholder="Mật khẩu" value="{{ $user->password }}" autocomplete="off" style="margin-top: 20px" required>
                        <select name="class_name" style="margin-top: 20px" required>
                            <option value="{{ $user->class_id }}">{{ $user->class_name }}</option>
                            @foreach($classes as $class)
                                <option value="{{ $class->class_id }}">{{ $class->class_name }}</option>
                            @endforeach
                        </select>
                    </div>
                    <div class="modal-footer">
                        <button class="btn btn-secondary"><a href="{{ route('aa-student') }}" style="text-decoration: none">Đóng</a></button>
                        <button type="submit" class="btn btn-primary">Xác nhận</button>
                    </div>
                </form>
            @endforeach
        </div>
    </div>
@endsection
