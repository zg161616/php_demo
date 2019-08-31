<?php
var_dump($_FILES);
session_start();
if(is_uploaded_file($_FILES['file1']['tmp_name'])){                                            //判断是否是上传文件
    //unlink($_FILES['file1']['tmp_name']);
    move_uploaded_file($_FILES['file1']['tmp_name'], "./{$_FILES['file1']['name']}");     //将缓存文件移动到指定位置
}
?>