<?php
/* Smarty version 3.1.29, created on 2016-11-26 16:39:52
  from "D:\Wmap\Apache24\htdocs\gyh\MVC\application\home\view\layout.html" */

if ($_smarty_tpl->smarty->ext->_validateCompiled->decodeProperties($_smarty_tpl, array (
  'has_nocache_code' => false,
  'version' => '3.1.29',
  'unifunc' => 'content_58394a58849519_44165005',
  'file_dependency' => 
  array (
    '042589147ffb965cbf0f4551618c67411d4d8eb1' => 
    array (
      0 => 'D:\\Wmap\\Apache24\\htdocs\\gyh\\MVC\\application\\home\\view\\layout.html',
      1 => 1480126725,
      2 => 'file',
    ),
  ),
  'includes' => 
  array (
  ),
),false)) {
function content_58394a58849519_44165005 ($_smarty_tpl) {
$_smarty_tpl->ext->_inheritance->init($_smarty_tpl, false);
?>
<!DOCTYPE html>
<html class="">
<head>
    <meta http-equiv="Content-Type" content="text/html;charset=utf-8">
    <meta content="IE=edge,Chrome=1" http-equiv="X-UA-Compatible">
    <meta content="webkit" name="renderer">
    <title>发现 - 有问必答</title>
    <meta content="有问必答,知识社区,社交社区,问答社区" name="keywords">
    <meta content="有问必答 社交化知识社区" name="description">
    <base href="">
    <!--[if IE]>
</base>
<![endif]-->
<link type="image/x-icon" rel="shortcut icon" href="<?php echo HOME;?>
/css/default/img/favicon.ico?v=20151125">

<link href="<?php echo HOME;?>
/css/bootstrap.css" type="text/css" rel="stylesheet">
<link href="<?php echo HOME;?>
/css/icon.css" type="text/css" rel="stylesheet">

<link type="text/css" rel="stylesheet" href="<?php echo HOME;?>
/css/default/common.css?v=20151125">
<link type="text/css" rel="stylesheet" href="<?php echo HOME;?>
/css/default/link.css?v=20151125">
<link type="text/css" rel="stylesheet" href="<?php echo HOME;?>
/js/plug_module/style.css?v=20151125">

<?php echo '<script'; ?>
 type="text/javascript" src="<?php echo HOME;?>
/js/jquery.2.js?v=20151125"><?php echo '</script'; ?>
>
<?php echo '<script'; ?>
 type="text/javascript" src="<?php echo HOME;?>
/js/jquery.form.js?v=20151125"><?php echo '</script'; ?>
>
<?php echo '<script'; ?>
 type="text/javascript" src="<?php echo HOME;?>
/js/plug_module/plug-in_module.js?v=20151125"><?php echo '</script'; ?>
>
<?php echo '<script'; ?>
 type="text/javascript" src="<?php echo HOME;?>
/js/aws.js?v=20151125"><?php echo '</script'; ?>
>
<?php echo '<script'; ?>
 type="text/javascript" src="<?php echo HOME;?>
/js/aw_template.js?v=20151125"><?php echo '</script'; ?>
>
<?php echo '<script'; ?>
 type="text/javascript" src="<?php echo HOME;?>
/js/app.js?v=20151125"><?php echo '</script'; ?>
>
<?php echo '<script'; ?>
 src="<?php echo HOME;?>
/js/compatibility.js" type="text/javascript"><?php echo '</script'; ?>
>
<?php echo '<script'; ?>
 src="<?php echo HOME;?>
/js/common.js" type="text/javascript"><?php echo '</script'; ?>
>
<?php echo '<script'; ?>
 src="<?php echo HOME;?>
/js/ajax.js" type="text/javascript"><?php echo '</script'; ?>
>
<!--[if lte IE 8]>
<?php echo '<script'; ?>
 type="text/javascript" src="<?php echo HOME;?>
/js/respond.js"><?php echo '</script'; ?>
>
<![endif]-->

</head>
<body>
<noscript id="noscript" unselectable="on">
    <div class="aw-404 aw-404-wrap container">
        <img src="<?php echo HOME;?>
/common/no-js.jpg">
        <p>你的浏览器禁用了JavaScript, 请开启后刷新浏览器获得更好的体验!</p>
    </div>
</noscript>

<div class="aw-top-menu-wrap">
    <div class="container">
        <!-- logo -->
        <div class="aw-logo hidden-xs">
            <a href=""></a>
        </div>
        <!-- end logo -->
        <!-- 搜索框 -->
        <div class="aw-search-box  hidden-xs hidden-sm">
            <form method="post" id="global_search_form" action="?/search/" class="navbar-search">
                <input type="text" id="aw-search-query" name="q" autocomplete="off" placeholder="搜索问题、话题或人" class="form-control search-query" onkeyup="search();">
                <ul id="hidden"></ul>
                <span onclick="$('#global_search_form').submit();" id="global_search_btns" title="搜索"> <i class="icon icon-search"></i>
                </span>
                <div class="aw-dropdown">
                    <div class="mod-body">
                        <p class="title">输入关键字进行搜索</p>
                        <ul class="aw-dropdown-list hide"></ul>
                        <p class="search">
                            <span>搜索:</span>
                            <a onclick="$('#global_search_form').submit();"></a>
                        </p>
                    </div>
                    <div class="mod-footer">
                        <a class="pull-right btn btn-mini btn-success publish" href="publish.html">发起问题</a>
                    </div>
                </div>
            </form>
        </div>
        <!-- end 搜索框 -->
        <!-- 导航 -->
        <div class="aw-top-nav navbar">
            <div class="navbar-header">
                <button class="navbar-toggle pull-left">
                    <span class="icon-bar"></span>
                    <span class="icon-bar"></span>
                    <span class="icon-bar"></span>
                </button>
            </div>
            <nav class="collapse navbar-collapse bs-navbar-collapse" role="navigation">
                <ul class="nav navbar-nav">
                    <li>
                        <a class="active" href="index.html"> <i class="icon icon-list"></i>
                            发现
                        </a>
                    </li>
                    <li>
                        <a href="topic_index.html">
                            <i class="icon icon-topic"></i>
                            话题
                        </a>
                    </li>
                    <li>
                        <a style="font-weight:bold;">· · ·</a>
                        <div class="dropdown-list pull-right">
                            <ul id="extensions-nav-list"></ul>
                        </div>
                    </li>
                </ul>
            </nav>
        </div>
        <!-- end 导航 -->
<?php if ($_SESSION) {?>
        <div class="aw-user-nav">
            <!-- 登陆&注册栏 -->
            <a class="aw-user-nav-dropdown" href="people.html">
                <img src="<?php echo HOME;?>
/common/avatar-mid-img.png" alt="itbull">
                <?php echo $_SESSION['user']['username'];?>

            </a>

            <div class="aw-dropdown dropdown-list pull-right">
                <ul class="aw-dropdown-list">
                    <li class="hidden-xs">
                        <a href="user_set.html">
                            <i class="icon icon-setting"></i>
                            设置
                        </a>
                    </li>
                    <li class="hidden-xs">
                        <a href="admin/login.html">
                            <i class="icon icon-job"></i>
                            管理
                        </a>
                    </li>
                    <li>
                        <a href="?c=user&a=logout">
                            <i class="icon icon-logout"></i>
                            退出
                        </a>
                    </li>
                </ul>
            </div>
            <!-- end 登陆&注册栏 -->
        </div>
<?php } else { ?>
        <!-- 未登录展示 -->
        <div class="aw-user-nav">
            <!-- 登陆&注册栏 -->
            <a href="?c=user&a=login" class="login btn btn-normal btn-primary">登录</a>
            <a href="?c=user&a=register" class="register btn btn-normal btn-success">注册</a>
            <!-- end 登陆&注册栏 -->
        </div>
        <!-- 登陆成功展示用户栏 -->
<?php }?>
        <!-- end 用户栏 -->
        <!-- 发起 -->
        <div class="aw-publish-btn">

            <a>
                <i class="icon icon-ask"></i>
                发起
            </a>
            <div class="dropdown-list pull-right">
                <ul>
                    <li>
                        <a onclick="" href="?m=home&a=add&c=question">问题</a>
                    </li>
                </ul>
            </div>
        </div>
        <!-- end 发起 -->
    </div>
</div>

<?php 
$_smarty_tpl->ext->_inheritance->processBlock($_smarty_tpl, 0, "content", array (
  0 => 'block_2571358394a58835c81_56177789',
  1 => false,
  3 => 0,
  2 => 0,
));
?>


<div class="aw-ajax-box" id="aw-ajax-box"></div>

<div class="aw-footer-wrap">
    <div class="aw-footer">
        Copyright &copy; 2016-2099, All Rights Reserved
        <span class="hidden-xs">
            Powered By
            <a target="blank" href="http://helloitbull.net/">有问必答 1.0</a>
        </span>

    </div>
</div>

</body>
</html>
<?php }
/* {block 'content'}  file:layout.html */
function block_2571358394a58835c81_56177789($_smarty_tpl, $_blockParentStack) {
}
/* {/block 'content'} */
}
