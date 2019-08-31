<?php
session_start();
if(isset($_GET["act"])) {
    if ($_GET['act'] == "loginout") {
        $_SESSION['username'] = '';
        ?>
        <script>
            location.href = "?";
        </script>
        <?
        exit;
    }
}
header("Content-type:text/html;charset=utf-8");    //设置编码
$servername = "localhost";
$username = "root";
$password = "root";
$dbname = "mybbs";
// 创建连接
$conn = mysqli_connect($servername, $username, $password, $dbname);
mysqli_set_charset($conn,'utf8'); //设定字符集
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>论坛</title>
    <style>
        .cen{
            width: 55%;
            margin: 0 auto;
            text-align: right;
            margin-top: 30px;
        }
        table{
            width: 55%;
            margin-top: 10px;
        }
        .title{
            background-color: #B10707;
            font-size: 17px;
            color: white;
        }
        .right{
            margin-left: 120px;
        }
    </style>
</head>
<body>
<div class="cen">
    <?php
    if(isset($_SESSION['username'])) {
        if ($_SESSION['username']) {
            ?>
            <a href="?act=loginout">退出</a>
        <?php } else {
            ?>
            <a href="login.html">登录</a>|<a href="reg.html">注册</a>
            <?php
        }
    }
    ?>
</div>
<table border="1px" cellspacing="0" cellpadding="8"align="center">
    <tr class="title">
        <td COLSPAN="3">
            论坛列表<span class="right">[<a style="color: white" href="add_forum.php">添加</a> ]</span>
        </td>
    </tr>
    <tr>
        <td width="10%"><strong>主题</strong></td>
        <td width="40"><strong>论坛</strong></td>
        <td width="15"><strong>最后更新</strong></td>
    </tr>
    <?php
    $sql="select * from forums";
    $que=mysqli_query($conn,$sql);
    $sum=mysqli_num_rows($que);
    if($sum>0) {
        while ($row = mysqli_fetch_array($que)) {
            ?>
            <tr>
                <td><?php echo $row['subject'] ?></td>
                <td><?php echo "<div class=\"bold\"><a class=\"forum\" href=\"forums.php?F=" . $row['id'] . "\">" . $row["forum_name"] . "</a></div>"
                        . $row["forum_description"] ?></td>
                <td>
                    <div><?php echo $row["last_post_time"]?></div>
                </td>
            </tr>
            <?php
        }
    }else{
        echo "<tr><td colspan='3'>对不起，论坛正在建设中，感谢你的关注......</td></tr>";
    }
    ?>
</table>
</body>
</html>