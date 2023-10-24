<?php

namespace App\Http\Controllers\AA;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use function Laravel\Prompts\select;

class PointController extends Controller
{
    function indexClass(){
        $class_subjects = DB::table('class_subjects')
        ->join('classes', 'class_subjects.class_id', '=', 'classes.class_id')
        ->join('subjects', 'class_subjects.subject_id', '=', 'subjects.subject_id')
        ->select('classes.*', 'subjects.*')
        ->paginate(10);
        $classes = DB::table('classes')->get();
        $subjects = DB::table('subjects')->get();
        return view('academic_affairs.points.index_class', ['class_subjects' => $class_subjects, 'classes' => $classes, 'subjects' => $subjects]);
    }

    function indexSubject(Request $request){
        $class_id = $request->input('class_id');
        $class_subjects = DB::table('class_subjects')
            ->where('class_subjects.class_id', '=', $class_id)
            ->join('classes', 'class_subjects.class_id', '=', 'classes.class_id')
            ->join('subjects', 'class_subjects.subject_id', '=', 'subjects.subject_id')
            ->select('classes.*', 'subjects.*')
            ->paginate(10);
        $classes = DB::table('classes')->get();
        $subjects = DB::table('subjects')->get();
        return view('academic_affairs.points.index_subject', ['class_subjects' => $class_subjects, 'classes' => $classes, 'subjects' => $subjects]);
    }

    function indexPoint(Request $request){
        $subject_id = $request->input('subject_id');
        $class_subject_students = DB::table('class_subject_students')
            ->where('class_subjects.subject_id', '=', $subject_id)
            ->join('users', 'class_subject_students.id', '=', 'users.id')
            ->join('class_subjects', 'class_subject_students.cs_id', '=', 'class_subjects.cs_id')
            ->select('users.*', 'class_subjects.*')->get();
        $users = DB::table('users')->get();
        $class_subjects = DB::table('class_subjects')->get();
        $points = DB::table('points')
            ->join('class_subject_students', 'points.css_id', '=', 'class_subject_students.css_id')
            ->select('points.*', 'class_subject_students.*')->get();
        return view('academic_affairs.points.index_point', ['class_subject_students' => $class_subject_students, 'class_subjects' => $class_subjects, 'users' => $users, 'points' => $points]);
    }
}
