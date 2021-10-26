<?php
namespace App\Http\Controllers\Admin;
use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use DB;

class LoginController extends Controller{
	public function login(){
		return view('admin.login');
	}
	public function loginRequest(Request $request){
		$username=$request->input('username');
		$pwd=$request->password;

		$res = DB::select('select * from admin2 where username = ? and password = ?', [$username,$pwd]);

		if($res){
			return redirect('admin/index');
		}else{
			echo '输入有误';
		}
	}
}