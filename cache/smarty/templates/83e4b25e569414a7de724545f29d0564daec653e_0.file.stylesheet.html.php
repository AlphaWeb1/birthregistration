<?php /* Smarty version 3.1.27, created on 2020-11-28 12:17:06
         compiled from "C:\wamp\www\birthregistration\site\templates\root\stylesheet.html" */ ?>
<?php
/*%%SmartyHeaderCode:136075fc231b223d108_88142641%%*/
if(!defined('SMARTY_DIR')) exit('no direct access allowed');
$_valid = $_smarty_tpl->decodeProperties(array (
  'file_dependency' => 
  array (
    '83e4b25e569414a7de724545f29d0564daec653e' => 
    array (
      0 => 'C:\\wamp\\www\\birthregistration\\site\\templates\\root\\stylesheet.html',
      1 => 1606556926,
      2 => 'file',
    ),
  ),
  'nocache_hash' => '136075fc231b223d108_88142641',
  'variables' => 
  array (
    'Site' => 0,
    'sitePage' => 0,
  ),
  'has_nocache_code' => false,
  'version' => '3.1.27',
  'unifunc' => 'content_5fc231b2b12d56_44613247',
),false);
/*/%%SmartyHeaderCode%%*/
if ($_valid && !is_callable('content_5fc231b2b12d56_44613247')) {
function content_5fc231b2b12d56_44613247 ($_smarty_tpl) {

$_smarty_tpl->properties['nocache_hash'] = '136075fc231b223d108_88142641';
?>
<!-- Google Fonts -->
<link href="https://fonts.googleapis.com/css?family=Open+Sans:300,300i,400,400i,700,700i|Montserrat:300,400,500,700" rel="stylesheet">

<link rel="stylesheet" type="text/css" href="<?php echo $_smarty_tpl->tpl_vars['Site']->value['siteProtocol'];
echo $_smarty_tpl->tpl_vars['Site']->value['domainName'];?>
/lib/common/datatables/css/datatables.min.css" />

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
<?php if (!empty($_smarty_tpl->tpl_vars['sitePage']->value) && in_array($_smarty_tpl->tpl_vars['sitePage']->value,array('add_news','edit_news','newsletter'))) {?>
<link rel="stylesheet" href="<?php echo $_smarty_tpl->tpl_vars['Site']->value['siteProtocol'];
echo $_smarty_tpl->tpl_vars['Site']->value['domainName'];?>
/lib/common/quilljs/quill.core.css">
<link rel="stylesheet" href="<?php echo $_smarty_tpl->tpl_vars['Site']->value['siteProtocol'];
echo $_smarty_tpl->tpl_vars['Site']->value['domainName'];?>
/lib/common/quilljs/quill.bubble.css">
<link rel="stylesheet" href="<?php echo $_smarty_tpl->tpl_vars['Site']->value['siteProtocol'];
echo $_smarty_tpl->tpl_vars['Site']->value['domainName'];?>
/lib/common/quilljs/quill.snow.css">
<?php }?>
<link rel="stylesheet" type="text/css" href="<?php echo $_smarty_tpl->tpl_vars['Site']->value['siteProtocol'];
echo $_smarty_tpl->tpl_vars['Site']->value['domainName'];?>
/lib/common/css/style.css">
<style type="text/css">
/*Root Styles*/
body,.main-container-wrapper,.dashboard-wrapper {
	display: flex;
	flex-direction: column;
	height: 100vh;
    font-size: 12px;
    color: #15924f;
}
.overlay-menu {
    background-color: rgba(0,0,0,.5);
    height: 100%;
    overflow: hidden;
    position: fixed;
    top: 0;
    width: 100vw;
    z-index: 2005;
}
.mobile-menu-open .overlay-menu {
    background-color: rgba(0,0,0,.5);
    height: 100%;
    overflow: hidden;
    position: fixed;
    top: 0;
    width: 100vw;
    z-index: 2005;
}
/*Dashboard Side Menu Styles*/
.dash-side-menu {
    position: fixed;
    width: 210px;
    color: #18d26e;
    z-index: 100;
    font-size: 13px;
    top: 0;
    bottom: 0;
    transition: 320ms ease-out all;
    box-shadow: 0 0 1px 1px rgba(20,23,28,.1), 0 3px 1px 0 rgba(20,23,28,.1);
    z-index: 9999;
    border-right: 2px solid #18d26e;
    background-color: #fff;
}
.mobile-menu-open .dash-side-menu{
    transform: translateX(100%);
}
.mobile-menu-container {
    width: 100%;
    background: #fff;
    margin-top: 90px;
    padding: 10px 0;
    z-index: 3000;
    transition: 320ms ease-out all;
    right: -100%;
    position: fixed;
    box-shadow: 0 3px 6px -4px rgba(0,0,0,0.16), 0 3px 6px rgba(0,0,0,0.23);
}
.mobile-menu-open .mobile-menu-container {
    transform: translateX(-100%);
}
.mobile-menu-container ul li {
    list-style: none;
}
.mobile-menu-container ul li a {
    color: #555;
    display: block;
    font-weight: 400;
    line-height: 20px;
    padding: 12px 10px;
    white-space: nowrap;
}
.side-menu-logo {
    padding: 15px 20px 15px 5px;
}
.side-menu-logo img{
    /*max-height: 50px;*/
    display: block;
    width: 186px;
    max-width: 100%;
    height: auto;
    display: inline-block;
    vertical-align: middle;
}

.side-menu-wrapper {
    height: calc(100% - 20px);
}
/*Side Menu User Styles*/
.sm-container {
    overflow: auto;
    height: calc(100% - 50px);
}
.side-menu-user {
    display: flex;
    flex-direction: column;
    justify-content: center;
    align-items: center;
    margin: 10px 0px;
    font-weight: 500px;
    color: #15924f;
}
.side-menu-user> img {
    width: 100px;
    height: 100px;
    border-radius: 20%;
    margin-bottom: 10px;
}
.side-menu-user> section> data, .side-menu-user> data{
	text-transform: uppercase;
}
.side-menu-user> data> a{
	color: inherit;
}
.side-menu-user> section> div{
	margin-top: 6px;
}
/*Side Menu Lists Styles*/
.side-menu-list {
    overflow: auto;
    height: calc(100% - 50px);
    margin: 0;
}
.side-menu-list, .side-menu-sub-list {
	padding: 0;
    list-style-type: none;
    margin: 0;
}
.side-menu-sub-list {
	overflow: hidden;
	max-height: 0;
    transition: max-height 320ms ease-out;
}
/*.side-menu-link.isactive .side-menu-sub-list {
	max-height: unset;
}*/
.side-menu-list .side-menu-link>a {
	padding: 12px 10px;
    color: inherit;
    text-transform: uppercase;
    display: block;
    font-size: 14px;
    font-weight: bolder;
}
.side-menu-list .side-menu-link>a>span {
	float: right;
}
.side-menu-sub-list .side-menu-sub-link>a {
	padding: 5px 10px;
    color: #e7e7e7 !important;
    display: block;
    font-size: 14px;
}
.side-menu-sub-link{
	padding-left: 5px;
}
.side-menu-link:hover a, .side-menu-link.isactive a {
    background-color: rgb(24, 210, 110, .2);
    color: #15924f !important;
}
.side-menu-sub-link.isactive a {
    background-color: rgb(79, 185, 118, .4);
    color: #23462e !important;
    font-weight: bolder;
}
/*.side-menu-sub-link.isactive a {
    background-color: rgba(241, 240, 28, 0.7);
    color: #9d520b !important;
    font-weight: bolder;
}*/
.side-menu-sub-link:hover a, .side-menu-sub-link.isactive:hover a {
    background-color: rgb(24, 210, 110, .7);
    font-weight: bold;
    color: #15924f !important;
}
.side-menu-link:active .side-menu-sub-list, .side-menu-link:focus .side-menu-sub-list, .side-menu-link.isactive .side-menu-sub-list {
	max-height: unset;
}

.isactive span .fa-angle-down, .isopened span .fa-angle-down {
    -webkit-transform: rotate(-180deg);
    transform: rotate(-180deg);
}

/*Dashboard Header Styles*/
.dash-header-container, .dash-header-main {
    height: 55px;
    width: calc(100% - 210px);
    display: flex;
    flex-direction: row;
    background-color: #18d26e;
    color: #ffffff;
    position: fixed;
    z-index: 9998;
    box-shadow: 0 0 1px 1px rgba(20,23,28,.1), 0 3px 1px 0 rgba(20,23,28,.1);
    left: 210px;
}
.dash-header-main {
    padding: 0 20px;
    justify-content: space-between;
    align-items: center;
}
/* Dashboard Right Header Styles*/
.dh-right-nav {
	display: flex;
	justify-content: flex-end;
    align-items: center;
}
.dh-right-nav .dh-dropdown{
	border-left: none;
    border-radius: 0;
    font-size: 13px;
    margin: 0 2px;
	position: relative;
}
.dh-right-nav .dh-dropdown:hover .dropdown-main-link, .dh-right-nav .dh-dropdown:active .dropdown-main-link {
 	background-color: rgba(255,255,255,.5);
 	border-radius: 10%;
}
/*.dh-right-nav .dh-dropdown.dh__dropdown-user:hover .dropdown-main-link {
 	background-color: unset;
}*/
.dh-dropdown .dh-dropdown-toggle {
	display: flex;
    flex-direction: row;
    align-items: center;
    border-radius: 3px;
    height: 45px;
    border: 1px solid transparent
}
.dh-dropdown-toggle .dropdown-main-link {
    color: #e9ecef;
	display: block;
    font-weight: 400;
    line-height: 20px;
	padding: 12px 15px;
}
 .dropdown-main-link sup{
	border-radius: 10%;
	background-color: #f00;
	color: #fff;
}
 .dropdown-main-link sup, .dropdown-main-link sub{
	font-weight: bolder;
	font-stretch: ultra-expanded;
	padding: 1px 2px;
	left: -4px;
}
.dh-dropdown-toggle.dropdown .dropdown-menu{
    background-color: #18d26e;
    color: #ffffff;
    font-size: 18px;
}
.signout .dropdown-main-link {
    display: flex;
    align-items: center;
}
.dropdown-main-link i{
	font-size: 18px;
}
.dropdown-item{
    color: #e9ecef;
}
.dropdown-item:focus, .dropdown-item:hover {
    color: #18d26e;
    background-color: #e9ecefb3;
}
/*Menu Icon Styles*/
.dh-menu-icon {
    display: flex;
    flex-direction: column;
    justify-content: center;
    width: 45px;
    height: 45px;
    /*box-shadow: 1px 2px 2px 1px;*/
    padding: 5px 5px;
    -webkit-transform: rotate(0deg);
    transform: rotate(0deg);
    -webkit-transition: 0.5s ease-in-out;
    transition: 0.5s ease-in-out;
    cursor: pointer;
 }
.dh-menu-icon .line {
    height: 10px;
    width: inherit;
    margin-bottom: 5px;
    background: #000;
    border-radius: 10%;
    opacity: 1;
    left: 0;
    -webkit-transform: rotate(0deg);
    transform: rotate(0deg);
    -webkit-transition: 0.25s ease-in-out;
    transition: 0.25s ease-in-out;
}
.header-wrapper .dh-menu-icon .line {
    background: #446084;
}
.dh-menu-icon.open .line:nth-child(1) {
    -webkit-transform: rotate(45deg);
    transform: rotate(45deg);
    /*margin-bottom: 0;*/
}
.dh-menu-icon.open .line:nth-child(2) {
    -webkit-transform: rotate(-45deg);
    transform: rotate(-45deg);
    margin-bottom: 0;
    margin-top: -15px;
}
.dh-menu-icon.open .line:nth-child(3) {
    display: none;
}
/*
Sass
someDiv {
    @extend .opacity;
    @extend .radius;
}*/
/*Dashboard Content Styles*/
.dashboard-content-wrapper {
    display: flex;
    margin-top: 80px;
}
/*Main Content Style*/
.dash-main-content {
    flex-direction: column;
    height: 100%;
    width: 100%;
    margin-left: 210px;
}
.dash-main-content>.col-sm-12 {
	min-height: calc(100vh - 135px);
	padding-top: 10px;
	justify-content: center;
    margin-bottom: 20px;
}
/*Other General Style*/
.login-shield{/*Security Page*/
	height: calc(100% - 40px);
	width: 100%;
	z-index: 999;
	position: absolute;
	background-color: rgb(0,0,0,.7);
	box-shadow: 10, 0, 10, 10;
	padding: 60px 20px; 
	<?php if ($_smarty_tpl->tpl_vars['sitePage']->value == 'security') {?>
	    <?php if (!empty($_smarty_tpl->tpl_vars['Site']->value['session']['Site']['User']['security2'])) {?>
	     	display: none;
	    <?php }?>
	<?php }?>
}
.login-shield>div>div{/*Security Page*/
	margin: 50px 0px;
}
.message-container{
	border: 0.2px solid #d5cece;
	border-radius: 5px;
	padding: 10px;
}
.list-inline .list-inline-item:hover{
	background-color: #c6c8ca;
}
.list-inline-item> a{
	color: #343a40;
}
/*Text Styles*/
.uppercase{
	text-transform: uppercase;
}
.help-block{
	font-size: 12px;
	color: rgb(125, 125, 125, 0.5);
}

/*Image Styles*/
.img-circle{
	border-radius: 45%;
}
/* Profile Image Styling */
.img-scope, .img-scope-landscape{
	width: 170px; 
	height: 170px; 
	margin: 0 auto; 
	position: relative; 
	font-size: 13px;
}
.img-scope-landscape{
    width: 90%;
    height: 220px;
}
.img-scope label, .img-scope label .img, .img-scope-landscape label, .img-scope-landscape label .img{
	width: 100%; 
	height: 100%;
}
.img-scope label data, .img-scope-landscape label data{
	height: 32px; 
	width: 100%; 
	position: absolute;
	bottom: 0; left: 0; 
	font-weight: bolder; 
    background-color: rgb(24, 210, 110, .86);
    color: #fff;
	z-index: 10; 
	padding: 8px;
}
.img-scope input[type=file], .img-scope-landscape input[type=file]{
	position: absolute; 
	z-index: 0; left: 0; 
	bottom: 0; 
	opacity: 0; 
	width: 100%;
}

.alert-success1 {
    color: #59360e;
    background-color: #dbc4aa;
    border-color: #dbc4aa;
}

.btn-success1 {
    color: #fff;
    background-color: #59360e;
    border-color: #694b2a;
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
    background-color: #5f3913;
    border-color: #5f3913;
}
.btn-success1:not(:disabled):not(.disabled).active:focus, .btn-success1:not(:disabled):not(.disabled):active:focus, .show > .btn-success1.dropdown-toggle:focus {
    box-shadow: 0 0 0 .2rem rgba(95, 57, 19, 0.5);
}
.bg-success0 {
    background-color: #a97b50 !important;
}
.border-success1 {
    border-color: #603813 !important;   
}
.alert-success1 {
    color: #603813;
    background-color: #f0d7bf;
    border-color: #f0d7bf;
}
tr.collapse.show {
    display: table-row;
}
.site-bg-1{
    background: #159292;
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
/*Visibility Styling*/
.show{	display: block; }
.hide{ display: none; }
/*Settings Styling*/
<?php if ($_smarty_tpl->tpl_vars['sitePage']->value == 'settings') {?>
/*div.col-sm-6.justify-content-center{
	margin-top: 30px;
}
div.col-sm-6.justify-content-center fieldset{
	border: solid #000 2px;
	border-radius: 5px;
	padding: 0px 20px;
}
div.col-sm-6.justify-content-center fieldset legend{
	padding-bottom: 10px;
}*/

/*New Setting Styles*/
.bannerSetting .imgUploaded{
    width: 100%;
    max-height: 200px;
    margin-top: 10px;
}
<?php }?>
/*Footer Styles*/
footer {
	background-color: #f7f7f7;
    color: inherit;
    font-size: 13px;
    line-height: 18px;
    width: 100%;
    padding-top: 1px;
}

.dash-footer .container-fluid{
	margin: 25px auto;
	padding-top: 10px;
}
.dash-footer hr{
    border-top: 3px solid #18d26e;
	margin: 0;
}
.dash-footer a{
    color: #222953;
}
.text-midnight-lighter {
	color: #686f7a;
}

/*Media Responsive Styles*/
@media (min-width: 960px) {
    .dh-right-icon, .dh-menu-icon, .side-menu-user>img {
        display: none;
    }
    .desktop-view.side-menu-logo {
        visibility: hidden;
    }
    #manifestDetail .modal-content{
        margin-left: 17%;
        margin-right: -6%;
    }
}
@media (max-width: 960px) {
    .dh-right-nav , .header-right, .main-header-right{
        display: none;
    }
    .dash-side-menu {
        left: -210px;
    }
    .dash-header-container, .dash-header-main {
        width: 100%;
        left: 0;
    }
    .dash-main-content {
        margin-left: 0;
    }
}
/*End Root Styles*/
	.minor-padd{
		padding: 10px;
	}
	.mgt-50{
		margin-top: 50px;
	}
	.pd-5{
		padding: 5%;
	}

/*Newest Styling*/
    .imgPreview{
        cursor: pointer;
    }
    .imgPreview:hover{
        box-shadow: #23442d 1px 1px 1px 1px;
    }
    .h-150px{
        height: 150px !important;
    }
    .h-200px{
        height: 200px !important;
    }
    .h-300px{
        height: 300px !important;
    }
    .h-400px{
        height: 400px !important;
    }
    .hmax-200px{
        max-height: 200px !important;
    }
    .overflowy-auto{
        overflow-y: auto;
    }
    .overflowx-auto{
        overflow-x: auto;
    }
    .btn-primary1 {
        color: #fff;
        background-color: #222953;
        border-color: #222953;
    }
    .btn-primary1:hover {
        color: #fff;
        background-color: #40b2e3;
        border-color: #3eb1e3;
    }
    .profile-img-detail{
        max-height: 350px;
    }
    /*.team-prf .col-md-6{
        min-height: 400px;
    }
    .team-prf .col-md-6 img.team-p-img{
        height: 100%;
        max-height: 600px;
        max-width: 100%;
    }
    .team-prf .col-md-6 h5{
        line-height: 1.3rem;
    }*/

    /* ///////// */
    .card-special{
        box-shadow: 3px 4px 4px 2px;
    }
    .card-special .card-header{
        background-color: rgb(0, 84, 166, 0.75);
        color: #fff;
    }
    .select-timeframe{
        background-color: unset !important;
        border-radius: unset;
        max-height: 39px;
        padding-top: 5px;
        border: unset;
        text-align: center;
    }
    .package-img{
        max-height: 450px;
    }
    /* .package-img{
        max-height: 400px;
    } */
    .user-clip{
        border-radius: 10rem;
        border: 0.5rem;
    }
    .clip-span{
        margin-top: -3rem;
    }
    .d-absolute{
        position: absolute !important;
    }
    .button-center-position{
        left: 38%;
        top: 20%;
    }
    .ql-editor{
        min-height: 230px;
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
<noscript><style type="text/css">.jsonly{display: none;}</style></noscript><?php }
}
?>