<?php /* Smarty version 3.1.27, created on 2020-11-28 12:17:07
         compiled from "C:\wamp\www\birthregistration\site\templates\root\dash_sidemenu.html" */ ?>
<?php
/*%%SmartyHeaderCode:132685fc231b3ab1510_37610023%%*/
if(!defined('SMARTY_DIR')) exit('no direct access allowed');
$_valid = $_smarty_tpl->decodeProperties(array (
  'file_dependency' => 
  array (
    '41e1dafdfadbe580fdcb1e22c06c56c8aa1f568e' => 
    array (
      0 => 'C:\\wamp\\www\\birthregistration\\site\\templates\\root\\dash_sidemenu.html',
      1 => 1606409330,
      2 => 'file',
    ),
  ),
  'nocache_hash' => '132685fc231b3ab1510_37610023',
  'variables' => 
  array (
    'Site' => 0,
    'userinfo' => 0,
    'defaults' => 0,
    'sitePage' => 0,
  ),
  'has_nocache_code' => false,
  'version' => '3.1.27',
  'unifunc' => 'content_5fc231b61f6598_95117440',
),false);
/*/%%SmartyHeaderCode%%*/
if ($_valid && !is_callable('content_5fc231b61f6598_95117440')) {
function content_5fc231b61f6598_95117440 ($_smarty_tpl) {

$_smarty_tpl->properties['nocache_hash'] = '132685fc231b3ab1510_37610023';
?>
<div class="dash-side-menu rounded">
	<div class="side-menu-logo">
		<img src="<?php echo $_smarty_tpl->tpl_vars['Site']->value['siteProtocol'];
echo $_smarty_tpl->tpl_vars['Site']->value['domainName'];?>
/site/media/i/logo1.png" class="header-logo" alt="<?php echo $_smarty_tpl->tpl_vars['Site']->value['companyName'];?>
">
	</div>
	<aside class="side-menu-wrapper pb-5 mb-5 overflow-y-auto">
		<div class="sm-container">
			<div class="side-menu-user">
				<img src="<?php echo $_smarty_tpl->tpl_vars['Site']->value['siteProtocol'];
echo $_smarty_tpl->tpl_vars['Site']->value['domainName'];?>
/<?php if (!empty($_smarty_tpl->tpl_vars['userinfo']->value->userimg)) {
echo $_smarty_tpl->tpl_vars['userinfo']->value->userimg;
} else { ?>site/media/i/usericon.png<?php }?>">
				<data><a data-toggle="collapse" href="#min-det"><strong><?php echo $_smarty_tpl->tpl_vars['userinfo']->value->firstname;?>
 <?php echo $_smarty_tpl->tpl_vars['userinfo']->value->lastname;?>
 <i class="fa fa-angle-down"></i></strong></a></data>
				<section id="min-det"  class="text-center collapse show">
					<div>TOTAL Registered <span class="text-warning"><?php echo $_smarty_tpl->tpl_vars['defaults']->value->not['reg'];?>
</span></div>
					<div>TOTAL Approved <span class="text-warning"><?php echo $_smarty_tpl->tpl_vars['defaults']->value->not['approved'];?>
</span></div>
					<div>TOTAL Reject <span class="text-warning"><?php echo $_smarty_tpl->tpl_vars['defaults']->value->not['rejected'];?>
</span></div>
					<div class="d-none">ACCOUNT STATUS</div>
					<data class="d-none"><?php if ($_smarty_tpl->tpl_vars['Site']->value['session']['User']['userinfo']->active == true) {?><span class="badge site-bg-1">Active</span><?php } else { ?><span class="badge badge-danger">Blocked</span><?php }?></data>
				</section>
			</div>
			<div class="dash-menu-wrapper pb-5">
				<ul class="side-menu-list">
					<?php if (in_array($_smarty_tpl->tpl_vars['Site']->value['session']['User']['userinfo']->userrole,array('level0','level1')) && $_smarty_tpl->tpl_vars['Site']->value['session']['User']['userinfo']->active == true) {?>
					<li class="side-menu-link <?php if (in_array($_smarty_tpl->tpl_vars['sitePage']->value,array('home'))) {?>isactive<?php }?>">
						<a href="<?php echo $_smarty_tpl->tpl_vars['Site']->value['siteProtocol'];
echo $_smarty_tpl->tpl_vars['Site']->value['domainName'];?>
/root/home"><i class="fa fa-home"></i> Dashboard</a>
					</li>
					<?php }?>
					<li class="side-menu-link <?php if (in_array($_smarty_tpl->tpl_vars['sitePage']->value,array('profile','logout'))) {?>isactive<?php }?>">
						<a href="#"><i class="fa fa-vcard"></i> Profile <span><i class="fa fa-angle-down"></i></span></a>
						<ul class="side-menu-sub-list">
							<li class="side-menu-sub-link <?php if ($_smarty_tpl->tpl_vars['sitePage']->value == 'profile') {?>isactive<?php }?>">
								<a href="<?php echo $_smarty_tpl->tpl_vars['Site']->value['siteProtocol'];
echo $_smarty_tpl->tpl_vars['Site']->value['domainName'];?>
/root/profile">My Profile</a>
							</li>
							<li class="side-menu-sub-link <?php if ($_smarty_tpl->tpl_vars['sitePage']->value == 'logout') {?>isactive<?php }?>">
								<a href="<?php echo $_smarty_tpl->tpl_vars['Site']->value['siteProtocol'];
echo $_smarty_tpl->tpl_vars['Site']->value['domainName'];?>
/root/logout">Logout</a>
							</li>
						</ul>
					</li>
					<?php if (in_array($_smarty_tpl->tpl_vars['Site']->value['session']['User']['userinfo']->userrole,array('level0','level1')) && $_smarty_tpl->tpl_vars['Site']->value['session']['User']['userinfo']->active == true) {?>
					<li class="side-menu-link d-none <?php if (in_array($_smarty_tpl->tpl_vars['sitePage']->value,array('settings'))) {?>isactive<?php }?>">
						<a href="<?php echo $_smarty_tpl->tpl_vars['Site']->value['siteProtocol'];
echo $_smarty_tpl->tpl_vars['Site']->value['domainName'];?>
/root/settings"><i class="fa fa-gear"></i> Settings</a>
					</li>
					<?php }?>
					<?php if (in_array($_smarty_tpl->tpl_vars['Site']->value['session']['User']['userinfo']->userrole,array('level0','level1')) && $_smarty_tpl->tpl_vars['Site']->value['session']['User']['userinfo']->active == true) {?>
					<li class="side-menu-link <?php if (in_array($_smarty_tpl->tpl_vars['sitePage']->value,array('search','certificate'))) {?>isactive<?php }?>">
						<a href="<?php echo $_smarty_tpl->tpl_vars['Site']->value['siteProtocol'];
echo $_smarty_tpl->tpl_vars['Site']->value['domainName'];?>
/root/search"><i class="fa fa-search"></i> Find Certificate</a>
					</li>
					<li class="side-menu-link <?php if (in_array($_smarty_tpl->tpl_vars['sitePage']->value,array('registered-approved','registered-new','registered-declined','registered-all','registered-manual','birth-detail'))) {?>isactive<?php }?>">
						<a href="#"><i class="fa fa-certificate"></i> Birth Certificates <span><i class="fa fa-angle-down"></i></span></a>
						<ul class="side-menu-sub-list">
							<li class="side-menu-sub-link <?php if (in_array($_smarty_tpl->tpl_vars['sitePage']->value,array('registered-all'))) {?>isactive<?php }?>">
								<a href="<?php echo $_smarty_tpl->tpl_vars['Site']->value['siteProtocol'];
echo $_smarty_tpl->tpl_vars['Site']->value['domainName'];?>
/root/registered-all"><i class="fa fa-list"></i> All</a>
							</li>
							<li class="side-menu-sub-link <?php if (in_array($_smarty_tpl->tpl_vars['sitePage']->value,array('registered-new'))) {?>isactive<?php }?>">
								<a href="<?php echo $_smarty_tpl->tpl_vars['Site']->value['siteProtocol'];
echo $_smarty_tpl->tpl_vars['Site']->value['domainName'];?>
/root/registered-new"><i class="fa fa-list"></i> Pending</a>
							</li>
							<li class="side-menu-sub-link <?php if (in_array($_smarty_tpl->tpl_vars['sitePage']->value,array('registered-approved'))) {?>isactive<?php }?>">
								<a href="<?php echo $_smarty_tpl->tpl_vars['Site']->value['siteProtocol'];
echo $_smarty_tpl->tpl_vars['Site']->value['domainName'];?>
/root/registered-approved"><i class="fa fa-list"></i> Approved</a>
							</li>
							<li class="side-menu-sub-link <?php if (in_array($_smarty_tpl->tpl_vars['sitePage']->value,array('registered-declined'))) {?>isactive<?php }?>">
								<a href="<?php echo $_smarty_tpl->tpl_vars['Site']->value['siteProtocol'];
echo $_smarty_tpl->tpl_vars['Site']->value['domainName'];?>
/root/registered-declined"><i class="fa fa-list"></i> Declined</a>
							</li>
							<li class="side-menu-sub-link <?php if (in_array($_smarty_tpl->tpl_vars['sitePage']->value,array('registered-manual'))) {?>isactive<?php }?>">
								<a href="<?php echo $_smarty_tpl->tpl_vars['Site']->value['siteProtocol'];
echo $_smarty_tpl->tpl_vars['Site']->value['domainName'];?>
/root/registered-manual"><i class="fa fa-plus"></i> Add New</a>
							</li>
						</ul>
					</li>
					<?php }?>
					<li class="side-menu-link d-none <?php if (in_array($_smarty_tpl->tpl_vars['sitePage']->value,array('newsletter'))) {?>isactive<?php }?>">
						<a href="<?php echo $_smarty_tpl->tpl_vars['Site']->value['siteProtocol'];
echo $_smarty_tpl->tpl_vars['Site']->value['domainName'];?>
/root/newsletter"><i class="fa fa-envelope"></i> NEWSLETTERS </a>
					</li>
					<li class="side-menu-link d-none <?php if (in_array($_smarty_tpl->tpl_vars['sitePage']->value,array('add_news','news','edit_news'))) {?>isactive<?php }?>">
						<a href="#"><i class="fa fa-newspaper-o"></i> NEWS <span><i class="fa fa-angle-down"></i></span></a>
						<ul class="side-menu-sub-list">
							<li class="side-menu-sub-link <?php if (in_array($_smarty_tpl->tpl_vars['sitePage']->value,array('news','edit_news'))) {?>isactive<?php }?>">
								<a href="<?php echo $_smarty_tpl->tpl_vars['Site']->value['siteProtocol'];
echo $_smarty_tpl->tpl_vars['Site']->value['domainName'];?>
/root/news"><i class="fa fa-newspaper-o"></i> All News</a>
							</li>
							<li class="side-menu-sub-link <?php if (in_array($_smarty_tpl->tpl_vars['sitePage']->value,array('add_news'))) {?>isactive<?php }?>">
								<a href="<?php echo $_smarty_tpl->tpl_vars['Site']->value['siteProtocol'];
echo $_smarty_tpl->tpl_vars['Site']->value['domainName'];?>
/root/add_news"><i class="fa fa-plus-square"></i> Add News</a>
							</li>
						</ul>
					</li>
					<li class="side-menu-link d-none <?php if (in_array($_smarty_tpl->tpl_vars['sitePage']->value,array('compose','messages','inbox'))) {?>isactive<?php }?>">
						<a href="#" class="side-menu-main-link"><i class="fa fa-envelope"></i> Messaging <span><i class="fa fa-angle-down"></i></span></a>
						<ul class="side-menu-sub-list">
							<li class="side-menu-sub-link <?php if ($_smarty_tpl->tpl_vars['sitePage']->value == 'compose') {?>isactive<?php }?>">
								<a href="<?php echo $_smarty_tpl->tpl_vars['Site']->value['siteProtocol'];
echo $_smarty_tpl->tpl_vars['Site']->value['domainName'];?>
/root/compose"><i class="fa fa-pencil"></i> Compose</a>
							</li>
							<li class="side-menu-sub-link <?php if ($_smarty_tpl->tpl_vars['sitePage']->value == 'messages') {?>isactive<?php }?>">
								<a href="<?php echo $_smarty_tpl->tpl_vars['Site']->value['siteProtocol'];
echo $_smarty_tpl->tpl_vars['Site']->value['domainName'];?>
/root/messages"><i class="fa fa-send"></i> Sent Messages</a>
							</li>
							<li class="side-menu-sub-link <?php if ($_smarty_tpl->tpl_vars['sitePage']->value == 'inbox') {?>isactive<?php }?>">
								<a href="<?php echo $_smarty_tpl->tpl_vars['Site']->value['siteProtocol'];
echo $_smarty_tpl->tpl_vars['Site']->value['domainName'];?>
/root/inbox"><i class="fa fa-inbox"></i> Inbox</a>
							</li>
						</ul>
					</li>
					<?php if (in_array($_smarty_tpl->tpl_vars['Site']->value['session']['User']['userinfo']->userrole,array('level0','level1','level2')) && $_smarty_tpl->tpl_vars['Site']->value['session']['User']['userinfo']->active == true) {?>
					<li class="side-menu-link d-none <?php if (in_array($_smarty_tpl->tpl_vars['sitePage']->value,array('clients','add_client','client'))) {?>isactive<?php }?>">
						<a href="#" class="side-menu-main-link"><i class="fa fa-users"></i> INVESTORS <span><i class="fa fa-angle-down"></i></span></a>
						<ul class="side-menu-sub-list">
							<li class="side-menu-sub-link <?php if ($_smarty_tpl->tpl_vars['sitePage']->value == 'client' || $_smarty_tpl->tpl_vars['sitePage']->value == 'clients') {?>isactive<?php }?>">
								<a href="<?php echo $_smarty_tpl->tpl_vars['Site']->value['siteProtocol'];
echo $_smarty_tpl->tpl_vars['Site']->value['domainName'];?>
/root/clients"><i class="fa fa-users"></i> Investors</a>
							</li>
							<li class="side-menu-sub-link <?php if ($_smarty_tpl->tpl_vars['sitePage']->value == 'add_client') {?>isactive<?php }?>">
								<a href="<?php echo $_smarty_tpl->tpl_vars['Site']->value['siteProtocol'];
echo $_smarty_tpl->tpl_vars['Site']->value['domainName'];?>
/root/add_client"><i class="fa fa-user-plus"></i> Add a New Investor</a>
							</li>
						</ul>
					</li>
					<?php if (in_array($_smarty_tpl->tpl_vars['Site']->value['session']['User']['userinfo']->userrole,array('level0','level1')) && $_smarty_tpl->tpl_vars['Site']->value['session']['User']['userinfo']->active == true) {?>
					<li class="side-menu-link <?php if (in_array($_smarty_tpl->tpl_vars['sitePage']->value,array('staffs','add_staff','edit_staff'))) {?>isactive<?php }?>">
						<a href="#" class="side-menu-main-link"><i class="fa fa-users"></i> STAFFS <span><i class="fa fa-angle-down"></i></span></a>
						<ul class="side-menu-sub-list">
							<li class="side-menu-sub-link <?php if ($_smarty_tpl->tpl_vars['sitePage']->value == 'staffs' || $_smarty_tpl->tpl_vars['sitePage']->value == 'edit_staff') {?>isactive<?php }?>">
								<a href="<?php echo $_smarty_tpl->tpl_vars['Site']->value['siteProtocol'];
echo $_smarty_tpl->tpl_vars['Site']->value['domainName'];?>
/root/staffs"><i class="fa fa-users"></i> All Staff</a>
							</li>
							<li class="side-menu-sub-link <?php if ($_smarty_tpl->tpl_vars['sitePage']->value == 'add_staff') {?>isactive<?php }?>">
								<a href="<?php echo $_smarty_tpl->tpl_vars['Site']->value['siteProtocol'];
echo $_smarty_tpl->tpl_vars['Site']->value['domainName'];?>
/root/add_staff"><i class="fa fa-user-plus"></i> Add a Staff</a>
							</li>
						</ul>
					</li>
					<?php }?>
					<?php }?>
					<?php if (in_array($_smarty_tpl->tpl_vars['Site']->value['session']['User']['userinfo']->userrole,array('level0','level1')) && $_smarty_tpl->tpl_vars['Site']->value['session']['User']['userinfo']->active == true) {?>
					<li class="side-menu-link <?php if (in_array($_smarty_tpl->tpl_vars['sitePage']->value,array('faq'))) {?>isactive<?php }?>">
						<a href="<?php echo $_smarty_tpl->tpl_vars['Site']->value['siteProtocol'];
echo $_smarty_tpl->tpl_vars['Site']->value['domainName'];?>
/root/faq"><i class="fa fa-question"></i> FAQ </a>
					</li>
					<?php }?>
				</ul>
			</div>
		</div>
	</aside>
</div><?php }
}
?>