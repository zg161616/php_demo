<?php
include 'conn.php';
$id = $_GET['id'];
$query="delete from message where id=".$id;
mysql_query($query);
?>
//引入conn文件，使用get方式获取id，使用sql语句来删除id
<?php
//页面跳转，实现方式为javascript
$url = "list.php";
echo "<script>";
echo "window.location.href='$url'";
echo "</script>";
?>
//使用js页面跳转回list查看文件的页面