<?php
Route::get('/', function () {
    return view('welcome');
});

// 后台首页
Route::___(1)____(['namespace'=>'Admin','prefix'=>'admin'],function(){
	// 后台商品管理模块
	Route::resource('goods','GoodsController');
	Route::get('news_ajax',"Newscontroller@aajax");
	
});