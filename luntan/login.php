<?php
session_start();
header("Content-type:text/html;charset=utf-8");
$link = mysqli_connect('localhost','root','root','mybbs');//链接数据库
mysqli_set_charset($link,'utf8'); //设定字符集
$username=$_POST['username'];
$password=md5($_POST['password']);


if($username==''){
    echo "<script>console.log('请输入用户名');location='" . $_SERVER['HTTP_REFERER'] . "'</script>";
    exit;
}
if($password==''){

    echo "<script>console.log('请输入密码');location='" . $_SERVER['HTTP_REFERER'] . "'</script>";
    exit;

}

$sql="select id,username,password from member where username='$username'"; //从数据库查询信息
$que=mysqli_query($link,$sql);
$row=mysqli_fetch_array($que);
if($row){

    if($password !=($row['password']) || $username !=$row['username']){

        echo "<script>console.log('密码错误，请重新输入');location='login.html'</script>";
        exit;
    }
    else{
        $_SESSION['username']=$row['username'];
        $_SESSION['id']=$row['id'];
        echo "<script>console.log('登录成功');location='index.php'</script>";
    }

}else{
    echo "<script>console.log('您输入的用户名不存在');location='login.html'</script>";
    exit;
};
?>