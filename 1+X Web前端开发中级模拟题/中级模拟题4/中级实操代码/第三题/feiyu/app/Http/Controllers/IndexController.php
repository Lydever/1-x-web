<?php
namespace App\Http\Controllers;
use Illuminate\Http\Request;
use DB;
use Input;
class IndexController extends Controller
{
    // 处理info页面业务逻辑的方法
    public  function info(){
        // 数据库查询数据
        $result=DB::table('information')->where("status","=","1")->paginate(5);
        // dd($result);
        return view("information",["data"=>$result]);
    }
    // 处理login页面逻辑的方法
    public function login(){
        // 在（3）处补全代码，渲染视图
        return （3）("login");
    }
    // 处理用户表单注册的方法
    public function  check(Request $request){
        //在（4）处补全代码，根据上下文填写变量名
        （4）=Input::all();
        // 在（5）处补全代码，实现自动验证
        $this->（5）($request, [
            'username' => 'required|min:6|max:12',
            'userpsw' => 'required|min:6|max:12',
            'useremail' => 'required|email',
            'captcha' => 'required|captcha'
        ]);
         //在（6）处补全代码，使用数据库类，在（7）处补全代码，写入数据库
         $re=（6）::（7）("insert into user values(?,?,?,?)",[null,$result['username'],md5( $result['userpsw'] ),$result['useremail'] ]);
         if($re){
            return '注册成功';
        }else{
            return '注册失败';
        };
    }
}
