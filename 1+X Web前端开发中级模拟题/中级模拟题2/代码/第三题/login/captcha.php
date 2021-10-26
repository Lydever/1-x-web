<?php
session_start();//开启session
$str="1234567890qwertyuiopasdfghjklzxcvbnm";
$strNew=str_shuffle($str);//此函数每次都会随机打乱所有字符
$content=substr($strNew,0,4);

// 存放content，用来和输入的内容对比
$_SESSION['capchar']=$content;


$i=imagecreatetruecolor(100,30);
$bgcolor=imagecolorallocate($i,mt_rand(150,255),mt_rand(150,255),mt_rand(150,255));
imagefill($i, 0, 0, $bgcolor);
// 加入干扰元素
// 画点
for($num=0;$num<100;$num++){
    $color=imagecolorallocate($i,mt_rand(0,255),mt_rand(0,255),mt_rand(0,255));
    imagesetpixel($i, mt_rand(0,100), mt_rand(0,30), $color);
}
// 画线
for($num=0;$num<3;$num++){
    $color=imagecolorallocate($i,mt_rand(0,255),mt_rand(0,255),mt_rand(0,255));
    imageline($i, 0, mt_rand(0,30), 100, mt_rand(0,28), $color);
}
// 文字
for($index =0;$index<strlen($content);$index++){
    // 写图片
    $x=15+20*$index;//文字x轴的位置
    $char=$content[$index];
    $color=imagecolorallocate($i,mt_rand(0,155),mt_rand(0,155),mt_rand(0,155));
    imagefttext($i,20,mt_rand(-15,15),$x,25,$color,'c://WINDOWS//Fonts//simsun.ttc',$char);
}
header("content-type:image/png");
imagepng($i);