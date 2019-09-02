<?php
require "model/Db.php";
require "model/Model.php";
require "model/StudentModel.php";
$c=isset($_GET['c'])?$_GET['c']:'Student';
$controller=$c."Controller";
require "controller/{$controller}.php";
$action=isset($_GET['a'])?$_GET['a']:'listAll';
$stu=new $controller();
$stu->$action();