<?php

namespace App\Http\Controllers\AA;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class AaStudentController extends Controller
{
    function index(){
        $users = DB::table('users')->where('role', '=', 0)
            ->join('classes', 'users.class_id', '=', 'classes.class_id')
            ->select('users.*', 'classes.class_name as class_name')->paginate(5);
        $classes = DB::table('classes')->get();
        return view('academic_affairs.students.index', ['users' => $users, 'classes' => $classes]);
    }

    function createStudent(Request $request){
        $name = $request->input('name');
        $student_code = $request->input('student_code');
        $email = $request->input('email');
        $password = $request->input('password');
        $hashedPassword = bcrypt($password);
        $class_name = $request->input('class_name');
        $result = DB::table('users')->join('classes', 'users.class_id', '=', 'classes.class_id')
            ->select('users.*', 'classes.class_name as class_name')->insert([
            'name' => $name,
            'student_code' => $student_code,
            'email' => $email,
            'password' => $hashedPassword,
            'class_id' => $class_name
        ]);
        if($result){
            flash()->addSuccess('Thêm thành công!');
            return redirect()->route('aa-student');
        }else {
            flash()->addError('Thêm thất bại!');
            return redirect()->route('aa-student');
        }
    }

    function deleteStudentById(Request $request){
        $id = $request->input('id');
        $result = DB::table('users')->where('id', '=', $id)->delete();
        if($result){
            flash()->addSuccess('Xóa thành công!');
            return redirect()->route('aa-student');
        }else {
            flash()->addError('Xóa thất bại!');
            return redirect()->route('aa-student');
        }
    }

    function updateStudentById(Request $request){
        $id = $request->input('id');
        $name = $request->input('name');
        $student_code = $request->input('student_code');
        $email = $request->input('email');
        $password = $request->input('password');
        $hashedPassword = bcrypt($password);
        $class_name = $request->input('class_name');
        $result = DB::table('users')->where('id', '=', $id)->update([
            'name' => $name,
            'student_code' => $student_code,
            'email' => $email,
            'password' => $hashedPassword,
            'class_id' => $class_name
        ]);
        if($result){
            flash()->addSuccess('Cập nhật thành công!');
            return redirect()->route('aa-class');
        }else {
            flash()->addError('Cập nhật thất bại!');
            return redirect()->route('aa-class');
        }
    }

    function edit(Request $request){
        $id = $request->input('id');
        $users = DB::table('users')
            ->join('classes', 'users.class_id', '=', 'classes.class_id')
            ->select('users.*', 'classes.class_name as class_name')->where('id', '=', $id)->get();
        $classes = DB::table('classes')->get();
        return view('academic_affairs.students.edit', ['users' => $users, 'classes' => $classes]);
    }
}
