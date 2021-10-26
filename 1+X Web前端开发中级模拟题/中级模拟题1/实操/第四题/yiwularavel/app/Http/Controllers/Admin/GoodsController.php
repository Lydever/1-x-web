<?php
namespace _____(2)_____;
use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
___(3)___; //使用数据库
class GoodsController extends Controller{
	// 定义list方法
	public function index(){
		$data=DB::table('product')->get();
		return view('admin.news')->___(4)_____("data",$data);//返回结果数据
	}
}