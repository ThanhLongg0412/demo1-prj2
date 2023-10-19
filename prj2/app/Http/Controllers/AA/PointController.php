<?php

namespace App\Http\Controllers\AA;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use function Laravel\Prompts\select;

class PointController extends Controller
{
    function indexClass(){
        $class_subject = DB::table('class_subject')
        ->join('classes', 'class_subject.class_id', '=', 'classes.class_id')
        ->join('subjects', 'class_subject.subject_id', '=', 'subjects.subject_id')
        ->select('classes.*', 'subjects.*')
        ->paginate(10);
        $classes = DB::table('classes')->get();
        $subjects = DB::table('subjects')->get();
        return view('academic_affairs.points.index_class', ['class_subject' => $class_subject, 'classes' => $classes, 'subjects' => $subjects]);
    }

    function indexSubject(){
        $class_subject = DB::table('class_subject')
            ->join('classes', 'class_subject.class_id', '=', 'classes.class_id')
            ->join('subjects', 'class_subject.subject_id', '=', 'subjects.subject_id')
            ->select('classes.*', 'subjects.*')
            ->paginate(10);
        $classes = DB::table('classes')->get();
        $subjects = DB::table('subjects')->get();
        return view('academic_affairs.points.index_subject', ['class_subject' => $class_subject, 'classes' => $classes, 'subjects' => $subjects]);
    }
}
