<?php
// 在（3）处补齐代码
$file=$_FILES["（3）"];
// 在（4）补齐代码，判断不为空；（5）处补齐代码，判断错误值为0
if(（4）($_FILES) &&  $file['（5）']===0){
    // 在（6）处补齐代码，判断上传文件类型
    $type=$file[' （6） '];
    if($type == 'image/gif' || $type == 'image/jpeg' || $type == 'image/png'){
        //（7）处补齐代码，判断文件大小
        $size= $file['（7）'];
        if($size< 8*1024*1024){
            $tmp_file=$file["tmp_name"];
            //在（8）处补齐代码，获取后缀名
            $ext=（8）($file["name"],PATHINFO_EXTENSION);//后缀名
            $new_file="file".rand(1,1000000).".".$ext;
            //在（9）处补齐代码，设置保存文件路径，使用相对路径，以./开始
            $path="（9）";
            $new_file=$path.$new_file;
            //在（10）处补齐代码，临时文件转换成正式文件
            （10）($tmp_file,$new_file);
            echo "上传成功";
        }else{
            echo "文件过大，无法上传";
        }
    }else{
        echo "文件类型不正确";
    }
}else{
    echo "文件上传失败";
}
