@extends('layouts.app')

@section('content')
    <div class="card">
        <div class="card-body">
            <button class="btn btn-primary mb-3" data-coreui-toggle="modal" data-coreui-target="#staticBackdrop1">Thêm lớp</button>
            <table class="table table-striped table-responsive table-bordered">
                <thead>
                    <tr>
                        <th>STT</th>
                        <th>Tên lớp</th>
                        <th>Niên khóa</th>
                        <th>Hành động</th>
                    </tr>
                </thead>
                <tbody>
                    @forelse ($classes as $class)
                        <tr>
                            <td>{{ $loop->iteration }}</td>
                            <td>{{ $class->class_name }}</td>
                            <td>K{{ $class->school_year }}</td>
                            <td>
                                <form action="{{ route('aa-class-delete') }}" method="POST">
                                    @csrf
                                    <input name="class_id" hidden value="{{ $class->class_id }}">
                                    <button class="btn btn-danger">Xóa</button>
                                </form>
                                <button class="btn btn-warning" data-coreui-toggle="modal" data-coreui-target="#staticBackdrop2">Cập nhật</button>
                            </td>
                        </tr>
                    @empty
                        <tr>
                            <td colspan="5" class="text-center">Không có lớp</td>
                        </tr>
                    @endforelse
                </tbody>
            </table>
        </div>
    </div>
    
    <div class="modal fade" id="staticBackdrop1" data-coreui-backdrop="static" data-coreui-keyboard="false" tabindex="-1" aria-labelledby="staticBackdropLabel" aria-hidden="true">
        <div class="modal-dialog">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title" id="staticBackdropLabel">Thêm lớp</h5>
                    <button type="button" class="btn-close" data-coreui-dismiss="modal" aria-label="Close"></button>
                </div>
                <form action="{{ route('aa-class-create') }}" method="POST">
                    @csrf
                    <div class="modal-body">
                        <input class="form-control" name="class_name" placeholder="Tên lớp" autocomplete="off">
                        <input type="number" min="1" class="form-control" name="school_year" placeholder="Niên khóa" autocomplete="off" style="margin-top: 20px">
                    </div>
                    <div class="modal-footer">
                        <button type="button" class="btn btn-secondary" data-coreui-dismiss="modal">Đóng</button>
                        <button type="submit" class="btn btn-primary">Xác nhận</button>
                    </div>
                </form>
            </div>
        </div>
    </div>

    <div class="modal fade" id="staticBackdrop2" data-coreui-backdrop="static" data-coreui-keyboard="false" tabindex="-1" aria-labelledby="staticBackdropLabel" aria-hidden="true">
        <div class="modal-dialog">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title" id="staticBackdropLabel">Cập nhật lớp</h5>
                    <button type="button" class="btn-close" data-coreui-dismiss="modal" aria-label="Close"></button>
                </div>
                <form action="{{ route('aa-class-update') }}" method="POST">
                    @csrf
                    <div class="modal-body">
                        <input name="class_id" hidden value="{{ $class->class_id }}">
                        <input class="form-control" name="major_name" placeholder="Tên chuyên ngành" value="{{ $class->class_name }}" autocomplete="off">
                        <input type="number" min="1" class="form-control" name="school_year" placeholder="Niên khóa" value="{{ $class->school_year }}" autocomplete="off" style="margin-top: 20px">
                    </div>
                    <div class="modal-footer">
                        <button type="button" class="btn btn-secondary" data-coreui-dismiss="modal">Đóng</button>
                        <button type="submit" class="btn btn-primary">Xác nhận</button>
                    </div>
                </form>
            </div>
        </div>
    </div>
@endsection