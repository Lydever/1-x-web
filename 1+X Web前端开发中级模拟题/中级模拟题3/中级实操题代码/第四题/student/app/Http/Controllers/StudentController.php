<?php
namespace ____(3)______;
____(4)___  DB;
class StudentController ___(5)_____  Controller
{
    public function index()
    {   
	    $students=__(6)___::table('student')->paginate(1);  
        //跳转转到视图student文件夹下的index.blade.php
	    return view('___(7)___',[
	        'students'=>$students
	    ]);
    }
}