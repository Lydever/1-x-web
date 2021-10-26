<?php
namespace App\Http\Controllers\admin;
use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use DB;

class Newscontroller extends Controller{
	public function aajax(){
	
	    //获取到ajax传来的需要删除的id
	    $id = $_GET['str'];
	    //把传来的所有id改为数组形式  explode  字符串转数组
	    $str = __(5)___(",",$id);
	    //利用循环将需要删除的id 一个一个进行执行sql；
	    foreach($str as $v){
	        DB::table('product')->____(6)______->delete();//删除数据的条件
	    }
	    ___(7)______;//返回删除的数据id
	}
}