<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
//在（3）处使用DB门面
（3） DB;

class IndexController extends Controller
{

    public function info(){
        //在（4）处补齐代码
        $res=DB::（4）("information")->where("status","=",1)->get();
        //在（5）处填写渲染视图方法名，根据info.blade.php模板中传递的对象填写（6）
        return （5）("info",["（6）"=>$res]);
    }


}
