<!doctype html>
<html lang="en">
 <head>
  <meta charset="UTF-8">
  <title>Document</title>
 </head>
 <body>
  <table border="1" align="center">
            <tr>
                <td>昵称</td>
                <td>角色</td>
                <td>消息数量</td>
                <td>注册时间</td>
                <td>操作</td>
            </tr>
            @____(7)_____	<!—遍历rs 
            <tr>
                <td>{{____(8)_____ }}</td>	<!-- (输出nickname) -->
                <td>{{____(9)_____ }}</td>	<!-- (输出role)  -->
                <td>{{____(10)_____ }}</td>	<!-- (输出msgnum) -->
                <td>{{____(11)_____}}</td>	<!-- (输出createtime)  -->
                <td>
                   修改
                    &nbsp;
                    删除
                </td>
            </tr>
            @endforeach
            <tr>
                <td colspan='5' align="center">
                共{{$sumRow}}条记录,
                第{{$page}}/{{$sumPage}}页&nbsp;
                @____(12)_____		<!-- (如果当前页大于1)   -->
                <a href='./main?page=1'>首页</a>&nbsp;
                <a href='./main?page={{$page-1}}'>上一页</a>&nbsp;
                @endif
                @____(13)_____             <!-- (如果当前页小于最后一页)   -->
                <a href='./main?page={{$page+1}}'>下一页</a>&nbsp;
                <a href='./main?page={{$sumPage}}'>尾页</a>
                @endif
                </td>
            </tr>
        </table>

 </body>
</html>
