<?php

namespace App\Http\Controllers\AA;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class ClassController extends Controller
{
    function index(){
        $classes = DB::table('classes')->get();
        return view('academic_affairs.classes.index', ['classes' => $classes]);
    }

    function createClass(Request $request){
        $class_name = $request->input('class_name');
        $school_year = $request->input('school_year');
        $result = DB::table('classes')->insert([
            'class_name' => $class_name,
            'school_year' => $school_year
        ]);
        if($result){
            flash()->addSuccess('Thêm thành công!');
            return redirect()->route('aa-class');
        }else {
            flash()->addError('Thêm thất bại!');
            return redirect()->route('aa-class');
        }
    }

    function deleteClassById(Request $request){
        $class_id = $request->input('class_id');
        $result = DB::table('classes')->where('class_id', '=', $class_id)->delete();
        if($result){
            flash()->addSuccess('Xóa thành công!');
            return redirect()->route('aa-class');
        }else {
            flash()->addError('Xóa thất bại!');
            return redirect()->route('aa-class');
        }
    }

    function updateClassbyId(Request $request){
        $class_id = $request->input('class_id');
        $class_name = $request->input('class_name');
        $school_year = $request->input('school_year');
        $result = DB::table('classes')->where('class_id', '=', $class_id)->update([
            'class_name' => $class_name,
            'school_year' => $school_year
        ]);
        if($result){
            flash()->addSuccess('Cập nhật thành công!');
            return redirect()->route('aa-class');
        }else {
            flash()->addError('Cập nhật thất bại!');
            return redirect()->route('aa-class');
        }
    }
}
