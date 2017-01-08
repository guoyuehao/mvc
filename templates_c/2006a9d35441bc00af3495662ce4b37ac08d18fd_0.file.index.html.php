<?php
/* Smarty version 3.1.29, created on 2016-11-26 16:39:52
  from "D:\Wmap\Apache24\htdocs\gyh\MVC\application\home\view\index.html" */

if ($_smarty_tpl->smarty->ext->_validateCompiled->decodeProperties($_smarty_tpl, array (
  'has_nocache_code' => false,
  'version' => '3.1.29',
  'unifunc' => 'content_58394a587eb8f8_58097963',
  'file_dependency' => 
  array (
    '2006a9d35441bc00af3495662ce4b37ac08d18fd' => 
    array (
      0 => 'D:\\Wmap\\Apache24\\htdocs\\gyh\\MVC\\application\\home\\view\\index.html',
      1 => 1479880958,
      2 => 'file',
    ),
  ),
  'includes' => 
  array (
    'file:layout.html' => 1,
  ),
),false)) {
function content_58394a587eb8f8_58097963 ($_smarty_tpl) {
$_smarty_tpl->ext->_inheritance->init($_smarty_tpl, true);
?>

<?php 
$_smarty_tpl->ext->_inheritance->processBlock($_smarty_tpl, 0, "content", array (
  0 => 'block_50758394a58791b60_56674496',
  1 => false,
  3 => 0,
  2 => 0,
));
?>

<?php $_smarty_tpl->ext->_inheritance->endChild($_smarty_tpl);
$_smarty_tpl->smarty->ext->_subtemplate->render($_smarty_tpl, "file:layout.html", $_smarty_tpl->cache_id, $_smarty_tpl->compile_id, 0, $_smarty_tpl->cache_lifetime, array(), 2, false);
}
/* {block 'content'}  file:./application/home/view/index.html */
function block_50758394a58791b60_56674496($_smarty_tpl, $_blockParentStack) {
?>

<div class="aw-container-wrap">
	<div class="container category">
		<div class="row">
			<div class="col-sm-12">
				<?php
$_from = $_smarty_tpl->tpl_vars['cat_list']->value;
if (!is_array($_from) && !is_object($_from)) {
settype($_from, 'array');
}
$__foreach_v_0_saved_item = isset($_smarty_tpl->tpl_vars['v']) ? $_smarty_tpl->tpl_vars['v'] : false;
$_smarty_tpl->tpl_vars['v'] = new Smarty_Variable();
$_smarty_tpl->tpl_vars['v']->_loop = false;
foreach ($_from as $_smarty_tpl->tpl_vars['v']->value) {
$_smarty_tpl->tpl_vars['v']->_loop = true;
$__foreach_v_0_saved_local_item = $_smarty_tpl->tpl_vars['v'];
?>
				<dl>
					<dt>
						<img alt="默认分类" src="<?php echo THUMB_PATH;
echo $_smarty_tpl->tpl_vars['v']->value['cat_logo'];?>
">
					</dt>
					<dd>
						<p class="title">
							<a href="category.html"><?php echo $_smarty_tpl->tpl_vars['v']->value['cat_name'];?>
</a>
						</p>
						<span>默认分类描述</span>
					</dd>
				</dl>
				<?php
$_smarty_tpl->tpl_vars['v'] = $__foreach_v_0_saved_local_item;
}
if ($__foreach_v_0_saved_item) {
$_smarty_tpl->tpl_vars['v'] = $__foreach_v_0_saved_item;
}
?>
			</div>
		</div>
	</div>

	<div class="container">
		<div class="row">
			<div class="aw-content-wrap clearfix">
				<div class="col-sm-12 col-md-9 aw-main-content">
					<!-- end 新消息通知 -->
					<!-- tab切换 -->
					<ul class="nav nav-tabs aw-nav-tabs active hidden-xs">
						<li>
							<a href="">等待回复</a>
						</li>
						<li>
							<a id="sort_control_hot" href="">热门</a>
						</li>
						<li>
							<a href="">推荐</a>
						</li>
						<li class="active">
							<a href="">最新</a>
						</li>

						<h2 class="hidden-xs">
							<i class="icon icon-list"></i>
							发现
						</h2>
					</ul>
					<!-- end tab切换 -->

					<div class="aw-mod aw-explore-list">
						<div class="mod-body">
							<div class="aw-common-list" id="content">

							</div>
						</div>
						<div class="mod-footer">

							<div class="page-control" id="pages">
                                
							</div>
                        
                            <?php echo '<script'; ?>
>
        goPage(1);
<?php echo '</script'; ?>
>
						</div>
					</div>
				</div>

				<!-- 侧边栏 -->
				<div class="col-sm-12 col-md-3 aw-side-bar hidden-xs hidden-sm">
					<div class="aw-mod aw-text-align-justify">
						<div class="mod-head">
							<a class="pull-right" href="topic_index.html">更多 &gt;</a>
							<h3>热门话题</h3>
						</div>
						<div class="mod-body">
							<?php
$_from = $_smarty_tpl->tpl_vars['topic_list']->value;
if (!is_array($_from) && !is_object($_from)) {
settype($_from, 'array');
}
$__foreach_v_1_saved_item = isset($_smarty_tpl->tpl_vars['v']) ? $_smarty_tpl->tpl_vars['v'] : false;
$_smarty_tpl->tpl_vars['v'] = new Smarty_Variable();
$_smarty_tpl->tpl_vars['v']->_loop = false;
foreach ($_from as $_smarty_tpl->tpl_vars['v']->value) {
$_smarty_tpl->tpl_vars['v']->_loop = true;
$__foreach_v_1_saved_local_item = $_smarty_tpl->tpl_vars['v'];
?>
							<dl>
								<dt class="pull-left aw-border-radius-5">
									<a href="topic.html">
										<img src="<?php echo HOME;?>
/common/avatar-mid-img.png" alt=""></a>
								</dt>
								<dd class="pull-left">
									<p class="clearfix">
										<span class="topic-tag">
											<a data-id="4" class="text" href="topic.html"><?php echo $_smarty_tpl->tpl_vars['v']->value['topic_title'];?>
</a>
										</span>
									</p>
									<p>
										<b><?php echo (($tmp = @$_smarty_tpl->tpl_vars['v']->value['focus_count'])===null||$tmp==='' ? 11 : $tmp);?>
</b>
										个问题,
										<b><?php echo (($tmp = @$_smarty_tpl->tpl_vars['v']->value['talk_count'])===null||$tmp==='' ? 99 : $tmp);?>
</b>
										人关注
									</p>
								</dd>
							</dl>
							<?php
$_smarty_tpl->tpl_vars['v'] = $__foreach_v_1_saved_local_item;
}
if ($__foreach_v_1_saved_item) {
$_smarty_tpl->tpl_vars['v'] = $__foreach_v_1_saved_item;
}
?>
						</div>
					</div>
					<div class="aw-mod aw-text-align-justify">
						<div class="mod-head">
							<a class="pull-right" href="?/people/">更多 &gt;</a>
							<h3>热门用户</h3>
						</div>
						<?php
$_from = $_smarty_tpl->tpl_vars['hot_user']->value;
if (!is_array($_from) && !is_object($_from)) {
settype($_from, 'array');
}
$__foreach_v_2_saved_item = isset($_smarty_tpl->tpl_vars['v']) ? $_smarty_tpl->tpl_vars['v'] : false;
$_smarty_tpl->tpl_vars['v'] = new Smarty_Variable();
$_smarty_tpl->tpl_vars['v']->_loop = false;
foreach ($_from as $_smarty_tpl->tpl_vars['v']->value) {
$_smarty_tpl->tpl_vars['v']->_loop = true;
$__foreach_v_2_saved_local_item = $_smarty_tpl->tpl_vars['v'];
?>
						<div class="mod-body">

							<dl>
								<dt class="pull-left aw-border-radius-5">
									<a href="people.html">
										<img src="<?php echo HOME;?>
/common/avatar-mid-img.png" alt=""></a>
								</dt>
								<dd class="pull-left">
									<a class="aw-user-name" data-id="2" href="people.html"><?php echo $_smarty_tpl->tpl_vars['v']->value['username'];?>
</a>
									<p class="signature"></p>
									<p>
										<b><?php echo $_smarty_tpl->tpl_vars['v']->value['q_num'];?>
</b>
										个问题,
										<b>0</b>
										次赞同
									</p>
								</dd>
							</dl>
						</div>
						<?php
$_smarty_tpl->tpl_vars['v'] = $__foreach_v_2_saved_local_item;
}
if ($__foreach_v_2_saved_item) {
$_smarty_tpl->tpl_vars['v'] = $__foreach_v_2_saved_item;
}
?>
					</div>
				</div>
				<!-- end 侧边栏 -->
			</div>
		</div>
	</div>
</div>
<?php
}
/* {/block 'content'} */
}
