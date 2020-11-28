<?php /* Smarty version 3.1.27, created on 2020-11-28 12:17:17
         compiled from "C:\wamp\www\birthregistration\site\templates\base\styles.html" */ ?>
<?php
/*%%SmartyHeaderCode:299915fc231bd805540_23218128%%*/
if(!defined('SMARTY_DIR')) exit('no direct access allowed');
$_valid = $_smarty_tpl->decodeProperties(array (
  'file_dependency' => 
  array (
    '125b832b54074c00277ad4b5a8529a76dfc9f17e' => 
    array (
      0 => 'C:\\wamp\\www\\birthregistration\\site\\templates\\base\\styles.html',
      1 => 1606561884,
      2 => 'file',
    ),
  ),
  'nocache_hash' => '299915fc231bd805540_23218128',
  'variables' => 
  array (
    'Site' => 0,
  ),
  'has_nocache_code' => false,
  'version' => '3.1.27',
  'unifunc' => 'content_5fc231bddebe17_03725941',
),false);
/*/%%SmartyHeaderCode%%*/
if ($_valid && !is_callable('content_5fc231bddebe17_03725941')) {
function content_5fc231bddebe17_03725941 ($_smarty_tpl) {

$_smarty_tpl->properties['nocache_hash'] = '299915fc231bd805540_23218128';
?>
<!-- Google Fonts -->
<link href="https://fonts.googleapis.com/css?family=Open+Sans:300,300i,400,400i,700,700i|Montserrat:300,400,500,700" rel="stylesheet">

<!-- Bootstrap CSS File -->
<link href="<?php echo $_smarty_tpl->tpl_vars['Site']->value['siteProtocol'];
echo $_smarty_tpl->tpl_vars['Site']->value['domainName'];?>
/lib/common/bootstrap/css/bootstrap.min.css" rel="stylesheet">

<!-- Libraries CSS Files -->
<link href="<?php echo $_smarty_tpl->tpl_vars['Site']->value['siteProtocol'];
echo $_smarty_tpl->tpl_vars['Site']->value['domainName'];?>
/lib/common/font-awesome/css/font-awesome.min.css" rel="stylesheet">
<link href="<?php echo $_smarty_tpl->tpl_vars['Site']->value['siteProtocol'];
echo $_smarty_tpl->tpl_vars['Site']->value['domainName'];?>
/lib/common/animate/animate.min.css" rel="stylesheet">
<link href="<?php echo $_smarty_tpl->tpl_vars['Site']->value['siteProtocol'];
echo $_smarty_tpl->tpl_vars['Site']->value['domainName'];?>
/lib/common/ionicons/css/ionicons.min.css" rel="stylesheet">
<link href="<?php echo $_smarty_tpl->tpl_vars['Site']->value['siteProtocol'];
echo $_smarty_tpl->tpl_vars['Site']->value['domainName'];?>
/lib/common/owlcarousel/assets/owl.carousel.min.css" rel="stylesheet">
<link href="<?php echo $_smarty_tpl->tpl_vars['Site']->value['siteProtocol'];
echo $_smarty_tpl->tpl_vars['Site']->value['domainName'];?>
/lib/common/lightbox/css/lightbox.min.css" rel="stylesheet">
<!-- Main Stylesheet File -->
<link href="<?php echo $_smarty_tpl->tpl_vars['Site']->value['siteProtocol'];
echo $_smarty_tpl->tpl_vars['Site']->value['domainName'];?>
/lib/common/css/style.css" rel="stylesheet">
<style type="text/css">
	.head-title-base{
		font-size: 80%;
	    color: #04946f;
	    word-break: break-word;
	    max-width: 400px !important;
	    font-weight: 700;
	}
	#header .head-title{
	    font-weight: 800;
	    color: #f37635;
	    margin-left: 3rem;
	}
	#header .head-title span{
		color: #04946f;
	}
	/*------------------*/
	.custom-checkbox .custom-control-input:checked ~ .custom-control-label::after {
	    background-color: #18d26e;
	}
	.border-success1{
		border-color: #18d26e !important;
	}
	.btn-success1 {
	    color: #fff;
	    background-color: #18d26e;
	    border-color: #18d264;
	}
	.btn-success1:hover {
	    color: #fff;
	    background-color: #a77c51;
	    border-color: #a77c51;
	}
	.btn-success1.focus, .btn-success1:focus {
	    box-shadow: 0 0 0 .2rem rgba(167, 124, 81, 0.32);
	}
	.btn-success1:not(:disabled):not(.disabled).active, .btn-success1:not(:disabled):not(.disabled):active, .show > .btn-success1.dropdown-toggle {
	    color: #fff;
	    background-color: #18d266;
	    border-color: #18d266;
	}
	.btn-success1:not(:disabled):not(.disabled).active:focus, .btn-success1:not(:disabled):not(.disabled):active:focus, .show > .btn-success1.dropdown-toggle:focus {
	    box-shadow: 0 0 0 .2rem rgba(95, 57, 19, 0.5);
	}
	.bg-success0 {
	    background-color: #a97b50 !important;
	}
	.alert-success1 {
	    color: #603813;
	    background-color: #f0d7bf;
	    border-color: #f0d7bf;
	}
	.accordion .card .card-header{
		cursor: pointer;
	}
	a.brown{
		color: #ab7a51;
	}
	.icon-bar{
		display: none;
		position: fixed;
	    top: 30px;
	    right: 31px;
	    color: #18d26e;
	    cursor: pointer;
	}
	/*-------------------*/
/* 	.w-100 {
    width: 100%!important;
    height: 600px;
}
.bg-slide-1{
	background: #aa97b3;
}
	.bg-slide-2{
	background: #aa97b3;
}
	.bg-slide-2{
	background: #aa97b3;
}
	.bg-slide-3{
	background: #aa97b3;
}
	.bg-slide-4{
	background: #aa97b3;
}
	.bg-slide-5{
	background: #aa97b3;
}
	.bg-slide-6{
	background: #aa97b3;
}
	.bg-slide-7{
	background: #aa97b3;
}
	.bg-slide-8{
	background: #aa97b3;
} */

.h-auto{
	height: auto !important;
}
.header-image-logo{
	max-height: 100px;
}
.text-main-titled{
	line-height: 2rem; font-size: 1.25rem;
}
.site-bg-1{
    background: #1a632a;
    color: #fff;
}
.site-bg-2{
	background-color: #a97b50 !important;
    color: #fff;
}
.site-bg-3{
	background-color: #f1f11b !important;
    color: #23442d;
}

.bg-image-1{
	background: url(<?php echo $_smarty_tpl->tpl_vars['Site']->value['siteProtocol'];
echo $_smarty_tpl->tpl_vars['Site']->value['domainName'];?>
/site/media/i/webs/web2.jpg) !important;
	background-repeat: no-repeat !important;
	background-size: cover !important;
	background-position: center !important;
}
#contact-button {
    position: fixed;
    z-index: 999;
    top: 150px;
    /*bottom: 100px;*/
    left: 0px;
    /*right: 0px;*/
    padding: 6px;
    background: #0aa050;
    transform: rotate(270deg);
    border-color: #a97b50;
}
#contact-button:hover, #contact-button:focus, #contact-button:focus-within, #contact-button:active, #contact-button:visited{
    right: 5px;
    padding: 10px;
  /*  padding: 10px;
    bottom: 100px;*/
    font-size: 17px;

}
#contact-button.btn-primary.focus, #contact-button.btn-primary:focus {
    box-shadow: 0 0 0 .2rem rgba(169, 123, 80, 0.5) !important;
}
.data-bg-light{
	background-color: #f8f9fab0;
}
#footer .footer-top{
    background: #1ad26fa3 !important;
}
#footer.footer-bg-img{
	background: url(<?php echo $_smarty_tpl->tpl_vars['Site']->value['siteProtocol'];
echo $_smarty_tpl->tpl_vars['Site']->value['domainName'];?>
/site/media/i/webs/app3.jpg) !important;
}
#footer.footer-bg-img, .data-bg-sec1{
	background-repeat: no-repeat !important;
	background-size: cover !important;
	background-position: center !important;
}
#footer .footer-bottom{
	background: #0aa050;
}
.bg-overlay-green{
	background-color: #23462e8c !important;
}
.bg-overlay-green:hover{
	background-color: #dade1e59 !important;
	color: #23462e !important;
}
.card-overlay-footer{
	position: absolute;
    bottom: 0;
    width: 98%;
}
.replace-slider-main {
    width: 100%;
    height: 10vh;
    margin-top: 150px !important;
}
.author-link{
	color: #ebec1c;
    transition: 0.5s;
}
.author-link:hover{
	color: #ca293e;
}
.store-card:hover, .store-card:active, .store-card:focus{
	box-shadow: #23462e 0px 3px 4px 1px;
}
nav#nav-menu-container ul li:hover, nav#nav-menu-container ul li.menu-active, .nav-menu li:hover > a, .nav-menu > .menu-active > a{
	background:#28a745a3;
	color: #fff;
}
#intro .carousel-indicators li{
	/*transition-timing-function: ease-in;*/
    offset-rotate: 24deg; 
    height: 1rem;
    border-radius: 1rem;
}
@media only screen and (max-width: 991px) {
   .header-image-logo{
		max-height: 90px;
	}
}
@media only screen and (max-width : 751px) {
	.icon-bar{
		display: block;
   	 	z-index: 999;
	}
	#nav-menu-container{
		display: none;
	    background: #fff !important;
	    margin-right: 0px !important;
	    position: fixed !important;
	    top: 70px !important;
	    right: 0 !important;
	    width: 100% !important;
	    padding-bottom: 1rem;
	}
	nav#nav-menu-container ul li{
		width: 100%;
    	border-left: #ccc 1.5px solid;
    	margin-left: 23px;
	}
	
}
@media only screen and (min-width: 768px){
	#logn-frame{
		margin-right: 2rem;
	}
	.footer-top #half-base{
		display: none;
	}
}
@media only screen and (max-width: 767px){
	.footer-top #half-top{
		display: none;
	}
	#logn-frame{
		margin-top: 5rem !important;
	}
	.intro-container{
		display: none;
	}
	.intro-container #introCarousel{
		display: none;
	}
}
@media only screen and (max-width: 414px){
	.dsm-none{
		display: none !important;
	}
	#contact-button {
	    transform: rotate(0deg);
    	left: 10px;
	}
}

.showMenu{
	display: block !important;
}

.imgPreview{
    cursor: pointer;
}
.imgPreview:hover{
    box-shadow: #23442d 1px 1px 1px 1px;
}
.h-200px{
    height: 200px !important;
}
.h-150px{
    height: 150px !important;
}
.h-80px {
    height: 80px !important;
}
.h-unset{
	height: unset;
}
.h-auto{
	height: auto;
}
.a {
    color: #59360e;
}
.pspace-maxh{
    max-height: 400px;
    overflow-y: auto;
}
.birth-cert-frame{
	background: #fffad9;
	color: #000;
}
.coat-logo{
	max-height: 150px;
}
</style>

<noscript>
	<style type="text/css">
		.jsonly{display: none;}
	</style>
</noscript>
<?php }
}
?>