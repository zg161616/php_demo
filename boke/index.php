<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>Title</title>
</head>
<link rel="stylesheet" type="text/css" href="./static/css/bootstrap.min.css">
<link rel="stylesheet" type="text/css" href="./static/css/site.css">
<script type="text/javascript" src="./static/js/jquery-3.4.1.min.js"></script>
<script type="text/javascript" src="./static/js/bootstrap.min.js"></script>
<body style="background:#f5f5f5">
<div class="header">
<div class="container">
   <span class="title">西门博客</span>
    <div class="search">
        <div class="input-group">
            <input type="text" class="form-control" placeholder="Search for...">
            <span class="input-group-btn">
        <button class="btn btn-default" type="button">Go!</button>
      </span>
        </div><!-- /input-group -->
    </div>
    <div class="login-reg">
        <?php session_start(); $user=isset($_SESSION['user'])?$_SESSION['user']:null ?>
        <?php if(isset($user)){?>
            <span><?php echo $user['name']?></span><a href="javascript:;" onclick="logout()">退出</a>
        <?php }else{?>
        <button type="button" class="btn btn-success" onclick="login()">登录</button>
        <?php }?>
        <button type="button" class="btn btn-warning" onclick="add_article()">发表</button>
    </div>
</div>
</div>
<div class="main container" align="center">
    <div class="left-container col-lg-3">
        <p class="cates">博客分类</p>
        <div class="cates-list">
            <div class="cates-item"><a href="">编程语言</a></div>
            <div class="cates-item"><a href="">软件设计</a></div>
            <div class="cates-item"><a href="">WEB前端</a></div>
            <div class="cates-item"><a href="">企业信息化</a></div>
            <div class="cates-item"><a href="">安卓开发</a></div>
            <div class="cates-item"><a href="">IOS开发</a></div>
            <div class="cates-item"><a href="">软件工程</a></div>
            <div class="cates-item"><a href="">数据库技术</a></div>
            <div class="cates-item"><a href="">操作系统</a></div>
            <div class="cates-item"><a href="">其他技术</a></div>
        </div>
    </div>
    <div class="col-lg-9 ">
        <div class="nav">
            <a >热门</a>
            <a class="active">最新</a>
        </div>
        <div class="content-list">
            <div class="content-item">
                <img src="./static/img/avatar.png"/>
                <div class="title">
                <p><a href="">安全策略</a></p>
                <div><span>1次浏览</span><span>2019-09-02 17:00:00</span></div>
                </div>
            </div>
            <div class="content-item">

                <img src="./static/img/avatar.png"/>
            </div>
            <div class="content-item">
                <img src="./static/img/avatar.png"/>
            </div>
            <div class="content-item">
                <img src="./static/img/avatar.png"/>
            </div>
        </div>
    </div>
</div>
</body>
<script src="static/js/UI.js"></script>
<script>
    function login() {
        UI.open ({url:"./login.php"});
    }
    function logout(){
        if(!confirm('确定要退出吗？')){
            return;
        }
        $.get('./service/logout.php',{},function(res){
            if(res.code>0){
                UI.alert({msg:res.msg,icon:'error'});
            }else{
                UI.alert({msg:res.msg,icon:'ok'});
                setTimeout(function(){parent.window.location.reload();},1000);
            }
        },'json');
    }

    // 发表博客
    function add_article(){
        UI.open({title:'发表博客',url:'./add_article.php',width:750,height:650});
    }
</script>
</html>