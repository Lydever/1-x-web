<?php
//在（3）处填写开启session的方法
           （3）          ;
//在（4）处填写mysqli连接数据库方法，并判断。
$link =   (4)   ("localhost","root","root") or die('数据库连接失败！');
//2.设置字符集
mysqli_set_charset($link, 'utf8');
//在（5）处填写选择数据库的方法
（5）($link,'study');
// 接收用户名和密码
$username=$_POST['username'];
$password=$_POST['password'];
$capchar=$_POST['capchar'];
// 查看captcha.php文件中session存储的信息，填写（6），判断传过来的验证码和session中存储的验证码是否一致
if(     （6）    ){
    //4.定义SQL语句，并发送
    $sql="select * from admin where username= '$username' and password='$password'";
    //使用query方法，在（7）处填写查询sql语句的方法
    $result =     （7）   ($link, $sql);
    //在（8）处填写方法，判断解析结果集行数是否大于0
    if($result &&    （8）  ($result)>0){
        echo "string";
        // 在（9）处补齐代码，设置cookie
             (9)   ('username',$username,0);
        echo "登录成功";
        // 在（10)处补齐代码，跳转到首页
           （10）  ("location:index.php");
    }else{
        echo "用户名密码输入有误";
    }
    //在（11）处补齐代码，关闭数据库链接
    mysqli_free_result($result);
        （11）   ($link);
}else{
    echo '验证码输入不正确';
}
