<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>Title</title>
</head>
<body>
<h2 align="center">学生信息</h2>
<table border="1" cellpadding="5" cellspacing="0" align="center" width="60%">
    <tr>
        <th>ID</th>
        <th>姓名</th>
    </tr>
<!--    --><?php //foreach ($data as $stu) {
//        echo "<tr align='center'>
//<td>{$stu["id"]}</td>
//<td>{$stu["name"]}</td>
//</tr>";
//    } ?>
    <?php foreach ($data as $stu): ?>
    <tr align="center">
        <td><?php echo $stu["id"]?></td>
        <td><?php echo $stu["name"]?></td>
    </tr>
    <?php endforeach;?>
</table>
</body>
</html>