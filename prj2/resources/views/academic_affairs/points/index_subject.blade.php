@extends('layouts.app')

@section('content')
    <div class="row">
        @foreach($class_subject as $class_subjectt)
            <div class="col-lg-2">
                <div class="card card-chart">
                    <div class="card-header">
                        <form action="{{ route('aa-point-detail') }}" method="GET">
                            @csrf
                            <input name="class_id" hidden value="{{ $class_subjectt->subject_id }}">
                            <button class="btn btn-primary">{{ $class_subjectt->subject_name }}</button>
                        </form>
                    </div>
                </div>
            </div>
        @endforeach
    </div>
@endsection
