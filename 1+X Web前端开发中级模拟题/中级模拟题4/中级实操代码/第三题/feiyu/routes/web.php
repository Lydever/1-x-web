<?php
// 访问首页
Route::get('/', function () {
    return view('index');
})->name("index");
// 访问information页面
Route::get('/info',"IndexController@info")->name("info");
// 在（1）处补全代码，设置路由方法为get，在（2）处补全代码，设置路由别名
Route::（）("/login","IndexController@login")->（2）("login");
// 检查用户注册
Route::post("/check","IndexController@check")->name("check");
