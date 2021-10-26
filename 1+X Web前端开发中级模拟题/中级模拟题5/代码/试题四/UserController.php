<?php
<?php
namespace App\Http\Controllers;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class UserController extends Controller
{
    function main(Request $req){ 
            //---获取总条目数
            $sql = 'select ____(2)_____ from users';	
            $rs1 = DB::select($sql);
            $sumRow = $rs1[0]->sum;
            //---每页显示几条,获得总页数
            $pageSize = 3;
            $sumPage = ____(3)_____;		//获得总页数 
            //---得到当前页,<1=1,>总耶数=总页数
            $page=1;
            if(____(4)_____ ($req['page'])){	//如果$req中含有page键 
                $page = $req['page'];
                if($page<1)
                    $page=1;
                else if($page>$sumPage)
                    $page=$sumPage;
            }
            //---根据当天页获得分页结果集的起点位置
            $startP = ____(5)_____;		
            $sql = "select * from users ____(6)_____";	//分页显示，起点为$strartP,长度为$pageSize
            $rs = DB::select($sql,[$startP]);
            return view('main')->with(['rs'=>$rs,'sumRow'=>$sumRow,'page'=>$page,'sumPage'=>$sumPage]); 
    }
}
