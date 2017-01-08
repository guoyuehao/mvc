<?php
/* Smarty version 3.1.29, created on 2016-11-26 16:39:38
  from "D:\Wmap\Apache24\htdocs\gyh\MVC\application\home\view\user\login.html" */

if ($_smarty_tpl->smarty->ext->_validateCompiled->decodeProperties($_smarty_tpl, array (
  'has_nocache_code' => false,
  'version' => '3.1.29',
  'unifunc' => 'content_58394a4a32d6d0_85378144',
  'file_dependency' => 
  array (
    'b2a8bf61a4eb0010659edfd303fb1677621a6e28' => 
    array (
      0 => 'D:\\Wmap\\Apache24\\htdocs\\gyh\\MVC\\application\\home\\view\\user\\login.html',
      1 => 1478186418,
      2 => 'file',
    ),
  ),
  'includes' => 
  array (
  ),
),false)) {
function content_58394a4a32d6d0_85378144 ($_smarty_tpl) {
?>
<!DOCTYPE html>
<html>
<head>
	<meta http-equiv="Content-Type" content="text/html;charset=utf-8">
	<meta charset="utf-8">
	<meta name="viewport" content="width=device-width, initial-scale=1.0, maximum-scale=1.0, user-scalable=no">
	<meta content="IE=edge,Chrome=1" http-equiv="X-UA-Compatible">
	<meta content="webkit" name="renderer">
	<title>登录 - 有问必答</title>
	<meta content="有问必答,知识社区,社交社区,问答社区" name="keywords">
	<meta content="有问必答 社交化知识社区" name="description">
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
<link type="text/css" rel="stylesheet" href="<?php echo HOME;?>
/css/default/login.css?v=20151125">

<?php echo '<script'; ?>
 type="text/javascript">
	var _BDC5955058AF5448FAEB7201057CD351="";
	var G_POST_HASH=_BDC5955058AF5448FAEB7201057CD351;
	var G_INDEX_SCRIPT = "?/";
	var G_SITE_NAME = "";
	var G_BASE_URL = "?";
	var G_STATIC_URL = "static";
	var G_UPLOAD_URL = "uploads";
	var G_USER_ID = "";
	var G_USER_NAME = "";
	var G_UPLOAD_ENABLE = "N";
	var G_UNREAD_NOTIFICATION = 0;
	var G_NOTIFICATION_INTERVAL = 100000;
	var G_CAN_CREATE_TOPIC = "";
	var G_ADVANCED_EDITOR_ENABLE = "Y";

<?php echo '</script'; ?>
>
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
 type="text/javascript" src="<?php echo HOME;?>
/js/md5.js?v=20151125"><?php echo '</script'; ?>
>
<?php echo '<script'; ?>
 src="<?php echo HOME;?>
/js/compatibility.js" type="text/javascript"><?php echo '</script'; ?>
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
<div id="wrapper">
	<div class="aw-login-box">
		<div class="mod-body clearfix">
			<div class="content pull-left">
				<h1 class="logo">
					<a href=""></a>
				</h1>
				<h2>有问必答</h2>
				<form action="?c=user&a=dologin" method="post" id="login_form">
					<input type="hidden" value="?/" name="return_url">
					<ul>
						<li>
							<input type="text" name="user_name" placeholder="邮箱 / 用户名" class="form-control" id="aw-login-user-name"></li>
						<li>
							<input type="password" name="password" placeholder="密码" class="form-control" id="aw-login-user-password"></li>
						<li class="alert alert-danger hide error_message"> <i class="icon icon-delete"></i> <em></em>
						</li>
						<li class="last">
							<input type="submit" class="pull-right btn btn-large btn-primary" value="登录" />
							<label>
								<input type="checkbox" name="remerber" value="1">记住我
							</label>
							<a href="forget_password.html">&nbsp;&nbsp;忘记密码</a>
						</li>
					</ul>
				</form>
			</div>
			<div class="side-bar pull-left"></div>
		</div>
		<div class="mod-footer">
			<span>还没有账号?</span>
			&nbsp;&nbsp;
			<a href="register.html">立即注册</a>
			&nbsp;&nbsp;•&nbsp;&nbsp;
			<a href="">游客访问</a>
		</div>
	</div>
</div>

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
</html><?php }
}
