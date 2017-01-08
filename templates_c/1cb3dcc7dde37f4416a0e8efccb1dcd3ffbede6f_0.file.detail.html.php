<?php
/* Smarty version 3.1.29, created on 2017-01-06 15:28:07
  from "D:\Wmap\Apache24\htdocs\gyh\MVC\application\home\view\detail.html" */

if ($_smarty_tpl->smarty->ext->_validateCompiled->decodeProperties($_smarty_tpl, array (
  'has_nocache_code' => false,
  'version' => '3.1.29',
  'unifunc' => 'content_586f4707cd88b5_19390835',
  'file_dependency' => 
  array (
    '1cb3dcc7dde37f4416a0e8efccb1dcd3ffbede6f' => 
    array (
      0 => 'D:\\Wmap\\Apache24\\htdocs\\gyh\\MVC\\application\\home\\view\\detail.html',
      1 => 1478520861,
      2 => 'file',
    ),
  ),
  'includes' => 
  array (
    'file:layout.html' => 1,
  ),
),false)) {
function content_586f4707cd88b5_19390835 ($_smarty_tpl) {
if (!is_callable('smarty_modifier_date_format')) require_once 'D:\\Wmap\\Apache24\\htdocs\\gyh\\MVC\\framework\\vendor\\smarty\\plugins\\modifier.date_format.php';
$_smarty_tpl->ext->_inheritance->init($_smarty_tpl, true);
?>

<?php 
$_smarty_tpl->ext->_inheritance->processBlock($_smarty_tpl, 0, "content", array (
  0 => 'block_9823586f4707bde889_82373812',
  1 => false,
  3 => 0,
  2 => 0,
));
$_smarty_tpl->ext->_inheritance->endChild($_smarty_tpl);
$_smarty_tpl->smarty->ext->_subtemplate->render($_smarty_tpl, "file:layout.html", $_smarty_tpl->cache_id, $_smarty_tpl->compile_id, 0, $_smarty_tpl->cache_lifetime, array(), 2, false);
}
/* {block 'content'}  file:detail.html */
function block_9823586f4707bde889_82373812($_smarty_tpl, $_blockParentStack) {
?>

<div class="aw-container-wrap">
	<div class="container">
		<div class="row">
			<div class="aw-content-wrap clearfix">
				<div class="col-sm-12 col-md-9 aw-main-content">
					<!-- 话题推荐bar -->
					<!-- 话题推荐bar -->
					<!-- 话题bar -->
					<div data-id="12" data-type="question" id="question_topic_editor" class="aw-mod aw-topic-bar">
						<div class="tag-bar clearfix">
							<span data-id="2" class="topic-tag">
								<a class="text" href="topic.html">
								<?php echo $_smarty_tpl->tpl_vars['question']->value['cat_name'];?>

								</a>
							</span>

						</div>
					</div>
					<!-- end 话题bar -->
					<div class="aw-mod aw-question-detail aw-item">
						<div class="mod-head">
							<h1><?php echo $_smarty_tpl->tpl_vars['question']->value['question_title'];?>
</h1>

						</div>
						<div class="mod-body">
							<div class="content markitup-box"></div>
						</div>
						<div class="mod-footer">
							<div class="meta">
								<span class="text-color-999">
									<?php echo smarty_modifier_date_format($_smarty_tpl->tpl_vars['question']->value['pub_time'],"%Y-%m-%d %H:%M:%S");?>

							    </span>

								<a href="publish.html" class="text-color-999">
									<i class="icon icon-edit"></i>
									编辑
								</a>

								<div class="pull-right more-operate">
									<a data-toggle="dropdown" class="text-color-999 dropdown-toggle">
										<i class="icon icon-share"></i>
										分享
									</a>
								</div>
							</div>
						</div>

					</div>

					<div class="aw-mod aw-question-comment">
						<div class="mod-head">
							<ul class="nav nav-tabs aw-nav-tabs active">
								<li>
									<a href="question.html">
										时间
										<i class="icon icon-up"></i>
									</a>
								</li>

								<h2 class="hidden-xs"><?php echo $_smarty_tpl->tpl_vars['answer_count']->value;?>
个回复</h2>
							</ul>
						</div>
						<div class="mod-body aw-feed-list">
							<?php
$_from = $_smarty_tpl->tpl_vars['answer']->value;
if (!is_array($_from) && !is_object($_from)) {
settype($_from, 'array');
}
$__foreach_row_0_saved_item = isset($_smarty_tpl->tpl_vars['row']) ? $_smarty_tpl->tpl_vars['row'] : false;
$_smarty_tpl->tpl_vars['row'] = new Smarty_Variable();
$_smarty_tpl->tpl_vars['row']->_loop = false;
foreach ($_from as $_smarty_tpl->tpl_vars['row']->value) {
$_smarty_tpl->tpl_vars['row']->_loop = true;
$__foreach_row_0_saved_local_item = $_smarty_tpl->tpl_vars['row'];
?>
							<div id="answer_list_2" force_fold="0" uninterested_count="0" class="aw-item">
								<div class="mod-head">
									<a name="answer_2" class="anchor"></a>
									<!-- 用户头像 -->
									<a data-id="3" href="people.html" class="aw-user-img aw-border-radius-5">
										<img alt="" src="<?php echo HOME;?>
/common/avatar-mid-img.png"></a>
									<!-- end 用户头像 -->
									<div class="title">
										<p>
											<a data-id="3" href="people.html" class="aw-user-name">
											<?php echo $_smarty_tpl->tpl_vars['row']->value['username'];?>

											</a>
											-
											<span class="text-color-999">一句话介绍</span>
										</p>
										<p class="text-color-999 aw-agree-by hide">赞同来自:</p>
									</div>
								</div>
								<div class="mod-body clearfix">
									<!-- 评论内容 -->
									<div class="markitup-box">
									<?php echo $_smarty_tpl->tpl_vars['row']->value['answer_content'];?>


									</div>

									<!-- end 评论内容 -->
								</div>
								<div class="mod-footer">
									<!-- 社交操作 -->
									<div class="meta clearfix">
										<span class="text-color-999 pull-right">
										<?php echo smarty_modifier_date_format($_smarty_tpl->tpl_vars['row']->value['answer_time'],"%Y-%m-%d %H:%M:%S");?>

										</span>
										<!-- 投票栏 -->
										<span class="operate">
											<a onclick="AWS.User.agree_vote(this, 'itbull', 2);" class="agree  ">
												<i data-original-title="赞同回复" class="icon icon-agree" data-toggle="tooltip" title="" data-placement="right"></i> <b class="count">0</b>
											</a>
											<a onclick="AWS.User.disagree_vote(this, 'itbull', 2)" class="disagree ">
												<i data-original-title="对回复持反对意见" class="icon icon-disagree" data-toggle="tooltip" title="" data-placement="right"></i>
											</a>
										</span>
										<!-- end 投票栏 -->
										<span class="operate">
											<a href="javascript:;" data-first-click="hide" data-comment-count="0" data-type="answer" data-id="2" class="aw-add-comment">
												<i class="icon icon-comment"></i>
												0
											</a>
										</span>
										<!-- 可显示/隐藏的操作box -->
										<div class="more-operate">
											<a  href="javascript:;" class="text-color-999">
												<i class="icon icon-edit"></i>
												编辑
											</a>
											<a class="text-color-999" onclick="AWS.User.answer_force_fold($(this), 2);" href="javascript:;">
												<i class="icon icon-fold"></i>
												折叠
											</a>

											<a class="text-color-999"  href="javascript:;">
												<i class="icon icon-favor"></i>
												收藏
											</a>

											<a data-placement="bottom" title="" data-toggle="tooltip" data-original-title="感谢热心的回复者" class="aw-icon-thank-tips text-color-999" onclick="AWS.User.answer_user_rate($(this), 'thanks', 2);" href="javascript:;">
												<i class="icon icon-thank"></i>
												感谢
											</a>
											<div class="btn-group pull-left">
												<a data-toggle="dropdown" class="text-color-999 dropdown-toggle">
													<i class="icon icon-share"></i>
													分享
												</a>
												<div class="aw-dropdown shareout pull-right" role="menu" aria-labelledby="dropdownMenu">
													<ul class="aw-dropdown-list">
														<li>
															<a >
																<i class="icon icon-weibo"></i>
																微博
															</a>
														</li>
														<li>
															<a >
																<i class="icon icon-qzone"></i>
																QZONE
															</a>
														</li>
														<li>
															<a >
																<i class="icon icon-wechat"></i>
																微信
															</a>
														</li>
													</ul>
												</div>
											</div>
											<a class="text-color-999" onclick="AWS.ajax_request(G_BASE_URL + '/question/ajax/set_best_answer/', 'answer_id=2');" href="javascript:;">
												<i class="icon icon-best"></i>
												最佳回复
											</a>
										</div>
										<!-- end 可显示/隐藏的操作box -->

									</div>
									<!-- end 社交操作 -->
								</div>
							</div>
							<?php
$_smarty_tpl->tpl_vars['row'] = $__foreach_row_0_saved_local_item;
}
if (!$_smarty_tpl->tpl_vars['row']->_loop) {
?>
							快来抢沙发吧!
							<?php
}
if ($__foreach_row_0_saved_item) {
$_smarty_tpl->tpl_vars['row'] = $__foreach_row_0_saved_item;
}
?>
						</div>
						<div class="mod-footer">
							<div id="load_uninterested_answers" class="aw-load-more-content hide">
								<span onclick="AWS.alert('被折叠的回复是被你或者被大多数用户认为没有帮助的回复');" tabindex="-1" href="javascript:;" class="text-color-999 aw-alert-box text-color-999">为什么被折叠?</span>
								<a class="aw-load-more-content" href="javascript:;">
									<span class="hide_answers_count">0</span>
									个回复被折叠
								</a>
							</div>

							<div id="uninterested_answers_list" class="hide aw-feed-list"></div>
						</div>

					</div>
					<!-- end 问题详细模块 -->

					<div class="aw-mod aw-replay-box question">
						<a name="answer_form"></a>
						<form class="question_answer_form" id="answer_form" method="post" onsubmit="return false;" action="http://localhost/wecenter/?/question/ajax/save_answer/">
							<input type="hidden" value="969A6F422476B374" name="post_hash">
							<input type="hidden" value="12" name="question_id">
							<input type="hidden" value="cb47a83f34f20122b8fcb1119f7b8fdb" name="attach_access_key">
							<div class="mod-head">
								<p>
									<label class="pull-right">
										<input type="checkbox" name="anonymous" value="1">匿名回复</label>
									<label class="pull-right"></label>
								
								</p>
							</div>
						</form>
					</div>

					<!-- 回复编辑器 -->
					<form action="?m=home&c=answer&a=getAnswer" method="post">
					<div class="aw-mod aw-replay-box question">
						<textarea class="form-control" rows="10" name="answer_content"></textarea>
						<input type="submit" value="回复" class="register btn btn-normal btn-success" />
						<input type="hidden" name="question_id" value="<?php echo $_smarty_tpl->tpl_vars['question']->value['question_id'];?>
" />
					</div>
					</form>
					<!-- end 回复编辑器 -->
				</div>
				<!-- 侧边栏 -->
				<div class="col-md-3 aw-side-bar hidden-xs hidden-sm">
					<!-- 发起人 -->
					<div class="aw-mod">
						<div class="mod-head">
							<h3>发起人</h3>
						</div>
						<div class="mod-body">
							<dl>
								<dt class="pull-left aw-border-radius-5">
									<a href="http://localhost/wecenter/?/people/itbull">
			
										<img alt="" src="./application/public/home/common/avatar-mid-img.png">
									</a>
								</dt>
								<dd class="pull-left">
									<a data-id="1" href="http://localhost/wecenter/?/people/itbull" class="aw-user-name">
										<?php echo $_smarty_tpl->tpl_vars['question']->value['username'];?>

									</a>
									<p></p>
								</dd>
							</dl>
						</div>
					</div>
					<!-- end 发起人 -->

					<!-- 问题状态 -->
					<div class="aw-mod question-status">
						<div class="mod-head">
							<h3>问题状态</h3>
						</div>
						<div class="mod-body">
							<ul>
								
								<li>
									浏览:
									<span class="aw-text-color-blue">
										<?php echo (($tmp = @$_smarty_tpl->tpl_vars['question']->value['view_count'])===null||$tmp==='' ? 1 : $tmp);?>

									</span>
								</li>
								<li>
									关注:
									<span class="aw-text-color-blue">
										<?php echo (($tmp = @$_smarty_tpl->tpl_vars['question']->value['focus_count'])===null||$tmp==='' ? 1 : $tmp);?>

									</span>
									人
								</li>

								
							</ul>
						</div>
					</div>
					<!-- end 问题状态 -->
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
