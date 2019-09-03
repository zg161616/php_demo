<?php
try{
$data['title']=trim($_POST['title']);
$data['cid']=(int)$_POST['cid'];
$data['keyword']=$_POST['keywords'];
$data['description']=$_POST['desc'];
$data['contents']=htmlspecialchars(trim($_POST['content'],true));
session_start();
$user=$_SESSION['user'];
$data["uid"]=$user['id'];
require_once $_SERVER['DOCUMENT_ROOT']."/untitled/boke/Db.php";
$db=new Db();
$insertId=$db->table("demo_article")->insert($data);
if($insertId!=0){
    exit(json_encode(array("code"=>0,"msg"=>'保存成功',"icon"=>'ok')));
}
else{
    exit(json_encode(array("code"=>1,"msg"=>'保存失败',"icon"=>'error')));
}
}
catch (Exception $e){
}



