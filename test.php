<?php
error_reporting(0); //屏蔽程序中的错误
//定义Error_Handler函数，作为set_error_handler()函数的第一个参数“回调”
function error_handler($error_level,$error_message,$file,$line){
    $EXIT =FALSE;
    switch($error_level){
//提醒级别
        case E_NOTICE:
        case E_USER_NOTICE:
            $error_type = 'Notice';
            break;
//警告级别
        case E_WARNING:
        case E_USER_WARNING:
            $error_type='warning';
            break;
//错误级别
        case E_ERROR:
        case E_USER_ERROR:
            $error_type='Fatal Error';
            $EXIT = TRUE;
            break;
//其他未知错误
        default:
            $error_type='Unknown';
            $EXIT = TRUE;
            break;
    }
//直接打印错误信息，也可以写文件，写数据库，反正错误信息都在这，任你发落
    printf("<font color='#FF0000'><b>%s</b></font>:%s in<b>%s</b> on line <b>%d</b><br>\n",$error_type, $error_message, $file, $line);
    session_start();
    if(!isset($_SESSION['$error_type']))
    {
        $_SESSION['$error_type']=$error_type;
    }
    if(!isset($_SESSION['$error_message']))
    {
        $_SESSION['$error_message']=$error_message;
    }   if(!isset($_SESSION['$file']))
    {
        $_SESSION['$file']=$file;
    }   if(!isset($_SESSION['$line']))
    {
        $_SESSION['$line']=$line;
    }
    header("Location: error.php");
//如果错误影响到程序的正常执行，跳转到友好的错误提示页面
    if (TURE==$EXIT){
    }
}

//这个才是关键点，把错误的处理交给error_handle()
set_error_handler('error_handler');

//使用未定义的变量要报notice的

//除以0要报警告的
echo 3/0;

//自定义一个错误
?>