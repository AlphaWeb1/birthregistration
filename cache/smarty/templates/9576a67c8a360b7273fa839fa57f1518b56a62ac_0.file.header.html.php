<?php /* Smarty version 3.1.27, created on 2020-11-28 12:17:13
         compiled from "C:\wamp\www\birthregistration\site\templates\root\header.html" */ ?>
<?php
/*%%SmartyHeaderCode:229095fc231b9493b17_54504141%%*/
if(!defined('SMARTY_DIR')) exit('no direct access allowed');
$_valid = $_smarty_tpl->decodeProperties(array (
  'file_dependency' => 
  array (
    '9576a67c8a360b7273fa839fa57f1518b56a62ac' => 
    array (
      0 => 'C:\\wamp\\www\\birthregistration\\site\\templates\\root\\header.html',
      1 => 1587433302,
      2 => 'file',
    ),
  ),
  'nocache_hash' => '229095fc231b9493b17_54504141',
  'variables' => 
  array (
    'Site' => 0,
    'defaults' => 0,
  ),
  'has_nocache_code' => false,
  'version' => '3.1.27',
  'unifunc' => 'content_5fc231b97a0720_06890213',
),false);
/*/%%SmartyHeaderCode%%*/
if ($_valid && !is_callable('content_5fc231b97a0720_06890213')) {
function content_5fc231b97a0720_06890213 ($_smarty_tpl) {

$_smarty_tpl->properties['nocache_hash'] = '229095fc231b9493b17_54504141';
?>
<div class="dash-header-container">
	<header class="dash-header-main">
		<div class="desktop-view side-menu-logo">
			<img src="<?php echo $_smarty_tpl->tpl_vars['Site']->value['siteProtocol'];
echo $_smarty_tpl->tpl_vars['Site']->value['domainName'];?>
/site/media/i/logo1.png" class="header-logo bg-white" alt="<?php echo $_smarty_tpl->tpl_vars['Site']->value['companyName'];?>
">
		</div>
		<div class="dh-right-nav">
			<div class="dh-dropdown d-none">
				<div class="dh-dropdown-toggle">
					<a href="<?php echo $_smarty_tpl->tpl_vars['Site']->value['siteProtocol'];
echo $_smarty_tpl->tpl_vars['Site']->value['domainName'];?>
/root/notifications" class="dropdown-main-link">
						<i class="fa fa-bell"></i><sup id="notCount"><?php if (!empty($_smarty_tpl->tpl_vars['defaults']->value->not['counts'])) {
echo $_smarty_tpl->tpl_vars['defaults']->value->not['counts'];
}?></sup>
					</a>
				</div>
			</div>
			<div class="dh-dropdown dh-dropdown-user">
				<div class="dh-dropdown-toggle dropdown">
					<a href="" class="dropdown-main-link dropdown-toggle" id="userMenu" href="#" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false"><i class="fa fa-user fa-2x"></i></a>
					<div class="dropdown-menu" aria-labelledby="userMenu">
					    <a class="dropdown-item" href="<?php echo $_smarty_tpl->tpl_vars['Site']->value['siteProtocol'];
echo $_smarty_tpl->tpl_vars['Site']->value['domainName'];?>
/root/profile"><i class="fa fa-vcard"></i> My Profile</a>
						<?php if (in_array($_smarty_tpl->tpl_vars['Site']->value['session']['User']['userinfo']->userrole,array('level0','level1')) && $_smarty_tpl->tpl_vars['Site']->value['session']['User']['userinfo']->active == true) {?>
					    <a class="dropdown-item" href="<?php echo $_smarty_tpl->tpl_vars['Site']->value['siteProtocol'];
echo $_smarty_tpl->tpl_vars['Site']->value['domainName'];?>
/root/settings"><i class="fa fa-gear"></i> Settings</a>
						<?php }?>
					    <div class="dropdown-divider"></div>
						<a class="dropdown-item" href="<?php echo $_smarty_tpl->tpl_vars['Site']->value['siteProtocol'];
echo $_smarty_tpl->tpl_vars['Site']->value['domainName'];?>
/root/logout"><i class="fa fa-sign-out"></i> LOGOUT</a>
					</div>
				</div>
			</div>
		</div>
		<div id="openMobileMenu" class="dh-menu-icon">
			<span class="line"></span>
			<span class="line"></span>
			<span class="line"></span>
		</div>
	</header>
</div><?php }
}
?>