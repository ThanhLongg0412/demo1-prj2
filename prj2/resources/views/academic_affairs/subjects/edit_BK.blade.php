@extends('layouts.app')

@section('content')
    <div class="card">
        <div class="card-body">
            @foreach($subjects as $subject)
                <form action="{{ route('aa-subject-updateBK') }}" method="POST">
                    @csrf
                    <div class="modal-body">
                        <input name="subject_id" hidden value="{{ $subject->subject_id }}">
                        <input class="form-control" name="subject_name" placeholder="Tên môn" value="{{ $subject->subject_name }}" autocomplete="off" required>
                        <input type="number" min="1" max="2" class="form-control" name="exam_times" placeholder="Lần thi" value="{{ $subject->exam_times }}" autocomplete="off" style="margin-top: 20px" required>
                        <select name="major_name" style="margin-top: 20px" required>
                            <option value="{{ $subject->major_id }}">{{ $subject->major_name }}</option>
                            @foreach($majors as $major)
                                <option value="{{ $major->major_id }}">{{ $major->major_name }}</option>
                            @endforeach
                        </select>
                    </div>
                    <div class="modal-footer">
                        <button class="btn btn-secondary"><a href="{{ route('aa-subject-BK') }}" style="text-decoration: none">Đóng</a></button>
                        <button type="submit" class="btn btn-primary">Xác nhận</button>
                    </div>
                </form>
            @endforeach
        </div>
    </div>
@endsection
