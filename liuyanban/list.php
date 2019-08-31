<!DOCTYPE html>
<html lang="utf-8">
<head>
    <?php
    include ("conn.php");
    ?>
    <link href="css.css" rel="stylesheet" type="text/css">
</head>


<table width=500 border="0" align="center" cellpadding="5" cellspacing="1" bgcolor="#add3ef" >
    <?php
    $sql="select * from message order by id desc";
    $result=$conn->query($sql);
    while($row=$result->fetch_assoc()){  ?>

        <tr bgcolor="#eff3ff">
            <td>标题： <?php echo $row['title'];?> <font color="red">用户： <?php echo $row['user'];?> </td>
        </tr>
        <tr bgColor="#ffffff">
            <td>发表内容:<?php echo $row['content'];?></td>
        </tr>
        <tr bgColor="#ffffff">
            <td><div align="right">时间:<?php echo $row['lastdate'];?></td>
        </tr>
    <?php } ?>
    <tr bgcolor="#f0fff0">
        <td><div align="right"><a href="add.html">返回留言</a> </td>
    </tr>
</table>
</html>