<?php /* Smarty version 3.1.27, created on 2020-11-28 12:17:08
         compiled from "C:\wamp\www\birthregistration\site\templates\base\find-registration.html" */ ?>
<?php
/*%%SmartyHeaderCode:48735fc231b40a8f95_36592556%%*/
if(!defined('SMARTY_DIR')) exit('no direct access allowed');
$_valid = $_smarty_tpl->decodeProperties(array (
  'file_dependency' => 
  array (
    'e631103dc25bd97d9d6449776397c74523f88485' => 
    array (
      0 => 'C:\\wamp\\www\\birthregistration\\site\\templates\\base\\find-registration.html',
      1 => 1606553115,
      2 => 'file',
    ),
    '1520cf1ca0cb00b5bdc5e9633dd8a6a98982cc1e' => 
    array (
      0 => 'C:\\wamp\\www\\birthregistration\\site\\templates\\base\\default.html',
      1 => 1606553973,
      2 => 'file',
    ),
    '356e1f1da8499a9aaf7ce175c564fa46a12b306f' => 
    array (
      0 => 'C:\\wamp\\www\\birthregistration\\site\\templates\\base\\header.html',
      1 => 1606314319,
      2 => 'file',
    ),
    'b9e357d1bb40e76f5255977e11ae77ff36200225' => 
    array (
      0 => 'C:\\wamp\\www\\birthregistration\\site\\templates\\base\\main-slider.html',
      1 => 1587175773,
      2 => 'file',
    ),
    '708103ae7a6909660d1c4f9f8c0c27470cd52dc1' => 
    array (
      0 => '708103ae7a6909660d1c4f9f8c0c27470cd52dc1',
      1 => 0,
      2 => 'string',
    ),
    'e13f02a258e0ef1a5104493ac8a272c464ce5155' => 
    array (
      0 => 'C:\\wamp\\www\\birthregistration\\site\\templates\\base\\modal-file.html',
      1 => 1587823471,
      2 => 'file',
    ),
    'c4f29984150e7dd0acdb2a43116e8610308ec7b7' => 
    array (
      0 => 'c4f29984150e7dd0acdb2a43116e8610308ec7b7',
      1 => 0,
      2 => 'string',
    ),
  ),
  'nocache_hash' => '48735fc231b40a8f95_36592556',
  'variables' => 
  array (
    'Site' => 0,
    'sitePage' => 0,
    'summary' => 0,
    'fail' => 0,
    'msg_nl' => 0,
  ),
  'has_nocache_code' => false,
  'version' => '3.1.27',
  'unifunc' => 'content_5fc231b74c0217_70621800',
),false);
/*/%%SmartyHeaderCode%%*/
if ($_valid && !is_callable('content_5fc231b74c0217_70621800')) {
function content_5fc231b74c0217_70621800 ($_smarty_tpl) {
if (!is_callable('smarty_modifier_capitalize')) require_once 'C:\\wamp\\www\\birthregistration\\lib\\Smarty\\plugins\\modifier.capitalize.php';

$_smarty_tpl->properties['nocache_hash'] = '48735fc231b40a8f95_36592556';
?>
<!DOCTYPE html>
<?php echo $_smarty_tpl->getSubTemplate ('declare.html', $_smarty_tpl->cache_id, $_smarty_tpl->compile_id, 0, $_smarty_tpl->cache_lifetime, array(), 0);
?>

<html lang="en-us">
    <head>
        <meta charset="utf-8">
        <title><?php echo $_smarty_tpl->tpl_vars['Site']->value['companyName'];?>
 - <?php echo smarty_modifier_capitalize($_smarty_tpl->tpl_vars['sitePage']->value);?>
</title>
        <meta name="author" content="Hoffenheim Technologies">
		<meta http-equiv="X-UA-Compatible" content="IE=edge">
		<meta name="description" content="<?php echo smarty_modifier_capitalize($_smarty_tpl->tpl_vars['sitePage']->value);?>
">
    	<meta content="width=device-width, initial-scale=1.0" name="viewport">
	    <meta content="<?php echo smarty_modifier_capitalize($_smarty_tpl->tpl_vars['sitePage']->value);?>
" name="keywords">
	    <meta name="robots" content="index, follow">
	    <!-- Favicons -->
    	<link href="<?php echo $_smarty_tpl->tpl_vars['Site']->value['siteProtocol'];
echo $_smarty_tpl->tpl_vars['Site']->value['domainName'];?>
/site/media/i/logo0.jpg" rel="icon">
    	<link href="<?php echo $_smarty_tpl->tpl_vars['Site']->value['siteProtocol'];
echo $_smarty_tpl->tpl_vars['Site']->value['domainName'];?>
/site/media/i/logo0.jpg" rel="apple-touch-icon">
        <?php echo $_smarty_tpl->getSubTemplate ('styles.html', $_smarty_tpl->cache_id, $_smarty_tpl->compile_id, 0, $_smarty_tpl->cache_lifetime, array(), 0);
?>

    </head>	
    <body class="body">
		
			<?php /*  Call merged included template "header.html" */
echo $_smarty_tpl->getInlineSubTemplate('header.html', $_smarty_tpl->cache_id, $_smarty_tpl->compile_id, 0, $_smarty_tpl->cache_lifetime, array(), 0, '202715fc231b482b784_34285661', 'content_5fc231b4824581_30161490');
/*  End of included template "header.html" */?>

		
		
			
				<?php /*  Call merged included template "main-slider.html" */
echo $_smarty_tpl->getInlineSubTemplate('main-slider.html', $_smarty_tpl->cache_id, $_smarty_tpl->compile_id, 0, $_smarty_tpl->cache_lifetime, array(), 0, '222135fc231b54d5b80_89704930', 'content_5fc231b54d0cb7_74754199');
/*  End of included template "main-slider.html" */?>

			
			
			<main id="main wow fadeInUp slow">
			
			
				<?php
$_smarty_tpl->properties['nocache_hash'] = '48735fc231b40a8f95_36592556';
?>

    <section class="row no-gutters justify-content-end bg-image-1">
        <div class="card col-sm-10 my-5 float-left p-3" id="logn-frame">
            <form method="get" action="<?php echo $_smarty_tpl->tpl_vars['Site']->value['siteProtocol'];
echo $_smarty_tpl->tpl_vars['Site']->value['domainName'];?>
/find-registration">
                <fieldset class="card p-2">
                    <legend class="text-center"><h3 class="font-weight-bold">Search for Detail</h3></legend>
                    <div class="form-group text-justify mb-2">
                        <label for="regId">Registration Id</label>
                        <input type="text" id="regId" name="regId" value="<?php if (!empty($_smarty_tpl->tpl_vars['Site']->value['get']['regId'])) {
echo $_smarty_tpl->tpl_vars['Site']->value['get']['regId'];
}?>" placeholder="Enter Registration Id" class="form-control badge-pill" required="">
                    </div>
                    <div class="form-group text-center">
                        <button class="btn btn-success btn-block badge-pill" type="submit">Find Certificate</button>
                    </div>
                </fieldset>
            </form>
        </div>
        <?php if (!empty($_smarty_tpl->tpl_vars['birth_reg']->value)) {?>
            <div class="card col-sm-10 my-5 float-left p-3" id="logn-frame">
                <fieldset class="card p-4 mt-3">
                    <legend class="text-center mb-4"><h3 class="font-weight-bold"><i class="fa fa-certificate"></i> Birth Registration Detail</h3></legend>
                    
                    <div class="form-row">
                        <div class="col-sm-12"><h4 class="text-center">Birth Center</h4></div>
                        <div class="form-group col-sm-6">
                            <h5 class="my-2"><span class="float-left">Registration Center: </span> <?php echo $_smarty_tpl->tpl_vars['birth_reg']->value->center;?>
</h5>
                            <h5 class="my-2"><span class="float-left">Town / Village: </span> <?php echo $_smarty_tpl->tpl_vars['birth_reg']->value->town;?>
</h5>
                            <h5 class="my-2"><span class="float-left">Local Government Area: </span> <?php echo $_smarty_tpl->tpl_vars['birth_reg']->value->lga;?>
</h5>
                            <h5 class="my-2"><span class="float-left">State: </span> <?php echo $_smarty_tpl->tpl_vars['birth_reg']->value->state;?>
</h5>
                        </div>
                        <div class="form-group col-sm-6">
                            <h5 class="my-2"><span class="float-left">Register Volume: </span> <?php echo $_smarty_tpl->tpl_vars['birth_reg']->value->register_volume;?>
</h5>
                            <h5 class="my-2"><span class="float-left">Entry Number: </span> <?php echo $_smarty_tpl->tpl_vars['birth_reg']->value->entry_number;?>
</h5>
                            <h5 class="my-2"><span class="float-left">Date of Registration: </span> <?php echo $_smarty_tpl->tpl_vars['birth_reg']->value->reg_day;?>
 - <?php echo $_smarty_tpl->tpl_vars['birth_reg']->value->reg_month;?>
 - <?php echo $_smarty_tpl->tpl_vars['birth_reg']->value->reg_year;?>
</h5>
                        </div>
                    </div>
                    <div class="form-row">
                        <div class="col-sm-12"><h4 class="text-center">Particulars of Child</h4></div>
                        <div class="form-group col-sm-12">
                            <h5 class="my-2"><span class="float-left">Child Name: </span> <?php echo $_smarty_tpl->tpl_vars['birth_reg']->value->child_surname;?>
 <?php echo $_smarty_tpl->tpl_vars['birth_reg']->value->child_firstname;?>
 <?php echo $_smarty_tpl->tpl_vars['birth_reg']->value->child_other_name;?>
</h5>
                        </div>
                        <div class="form-group col-sm-6">
                            <h5 class="my-2"><span class="float-left">Date of Birth: </span> <?php echo $_smarty_tpl->tpl_vars['birth_reg']->value->child_birth_day;?>
 - <?php echo $_smarty_tpl->tpl_vars['birth_reg']->value->child_birth_month;?>
 - <?php echo $_smarty_tpl->tpl_vars['birth_reg']->value->child_birth_year;?>
</h5>
                            <h5 class="my-2"><span class="float-left">Place of Birth: </span> <?php echo ucwords($_smarty_tpl->tpl_vars['birth_reg']->value->place_of_birth);?>
</h5>
                        </div>
                        <div class="form-group col-sm-6">
                            <h5 class="my-2"><span class="float-left">Sex: </span> <?php echo ucwords($_smarty_tpl->tpl_vars['birth_reg']->value->sex);?>
</h5>
                            <h5 class="my-2"><span class="float-left">Village / Town: </span> <?php echo $_smarty_tpl->tpl_vars['birth_reg']->value->town_village;?>
</h5>
                        </div>
                    </div>
                    <div class="form-row">
                        <div class="col-sm-12"><h4 class="text-center">Particulars of Mother</h4></div>
                        <div class="form-group col-sm-12">
                            <h5 class="my-2"><span class="float-left">Mother's Name: </span> <?php echo $_smarty_tpl->tpl_vars['birth_reg']->value->mother_surname;?>
 <?php echo $_smarty_tpl->tpl_vars['birth_reg']->value->mother_firstname;?>
</h5>
                            <h5 class="my-2"><span class="float-left">Place of Residence: </span> <?php echo $_smarty_tpl->tpl_vars['birth_reg']->value->mother_place_of_residence;?>
</h5>
                        </div>
                        <div class="form-group col-sm-6">
                            <h5 class="my-2"><span class="float-left">Age at Birth of Child: </span> <?php echo $_smarty_tpl->tpl_vars['birth_reg']->value->mother_age;?>
</h5>
                            <h5 class="my-2"><span class="float-left">Nationality: </span> <?php echo ucwords($_smarty_tpl->tpl_vars['birth_reg']->value->mother_nationality);?>
</h5>
                            <h5 class="my-2"><span class="float-left">Literacy: </span> <?php echo ucwords($_smarty_tpl->tpl_vars['birth_reg']->value->mother_literacy);?>
</h5>
                        </div>
                        <div class="form-group col-sm-6">
                            <h5 class="my-2"><span class="float-left">Marital Status: </span> <?php echo ucwords(str_replace('-',' ',$_smarty_tpl->tpl_vars['birth_reg']->value->mother_marital_status));?>
</h5>
                            <?php if (!empty($_smarty_tpl->tpl_vars['birth_reg']->value->mother_state)) {?>
                            <h5 class="my-2"><span class="float-left">State of Origin: </span> <?php echo ucwords($_smarty_tpl->tpl_vars['birth_reg']->value->mother_state);?>
</h5>
                            <?php }?>
                            <?php if (!empty($_smarty_tpl->tpl_vars['birth_reg']->value->mother_ethnic)) {?>
                            <h5 class="my-2"><span class="float-left">Ethnic of Origin: </span> <?php echo ucwords($_smarty_tpl->tpl_vars['birth_reg']->value->mother_ethnic);?>
</h5>
                            <?php }?>
                            <h5 class="my-2"><span class="float-left">Level of Education: </span> <?php echo $_smarty_tpl->tpl_vars['birth_reg']->value->mother_level_of_education;?>
</h5>
                        </div>
                    </div>
                    <div class="form-row">
                        <div class="col-sm-12"><h4 class="text-center">Particulars of Father</h4></div>
                        <div class="form-group col-sm-12">
                            <h5 class="my-2"><span class="float-left">Father's Name: </span> <?php echo $_smarty_tpl->tpl_vars['birth_reg']->value->father_surname;?>
 <?php echo $_smarty_tpl->tpl_vars['birth_reg']->value->father_firstname;?>
</h5>
                            <h5 class="my-2"><span class="float-left">Place of Residence: </span> <?php echo $_smarty_tpl->tpl_vars['birth_reg']->value->father_place_of_residence;?>
</h5>
                        </div>
                        <div class="form-group col-sm-6">
                            <h5 class="my-2"><span class="float-left">Age at Birth of Child: </span> <?php echo $_smarty_tpl->tpl_vars['birth_reg']->value->father_age;?>
</h5>
                            <h5 class="my-2"><span class="float-left">Nationality: </span> <?php echo ucwords($_smarty_tpl->tpl_vars['birth_reg']->value->father_nationality);?>
</h5>
                            <h5 class="my-2"><span class="float-left">Literacy: </span> <?php echo ucwords($_smarty_tpl->tpl_vars['birth_reg']->value->father_literacy);?>
</h5>
                        </div>
                        <div class="form-group col-sm-6">
                            <h5 class="my-2"><span class="float-left">Marital Status: </span> <?php echo ucwords(str_replace('-',' ',$_smarty_tpl->tpl_vars['birth_reg']->value->father_marital_status));?>
</h5>
                            <?php if (!empty($_smarty_tpl->tpl_vars['birth_reg']->value->father_state)) {?>
                            <h5 class="my-2"><span class="float-left">State of Origin: </span> <?php echo ucwords($_smarty_tpl->tpl_vars['birth_reg']->value->father_state);?>
</h5>
                            <?php }?>
                            <?php if (!empty($_smarty_tpl->tpl_vars['birth_reg']->value->father_ethnic)) {?>
                            <h5 class="my-2"><span class="float-left">Ethnic of Origin: </span> <?php echo ucwords($_smarty_tpl->tpl_vars['birth_reg']->value->father_ethnic);?>
</h5>
                            <?php }?>
                            <h5 class="my-2"><span class="float-left">Level of Education: </span> <?php echo $_smarty_tpl->tpl_vars['birth_reg']->value->father_level_of_education;?>
</h5>
                        </div>
                    </div>
                    <div class="form-row">
                        <div class="col-sm-12"><h4class="text-center">Particulars of Informant / Guardian</h4></div>
                        <div class="form-group col-sm-6">
                            <h5 class="my-2"><span class="float-left">Informant's Active Email: </span> <?php echo $_smarty_tpl->tpl_vars['birth_reg']->value->informant_email;?>
</h5>
                        </div>
                        <div class="form-group col-sm-6">
                            <h5 class="my-2"><span class="float-left">Relationship to Child: </span> <?php echo $_smarty_tpl->tpl_vars['birth_reg']->value->informant_relationship_to_child;?>
</h5>
                        </div>
                        <div class="form-group col-sm-12">
                            <h5 class="my-2"><span class="float-left">Full Name: </span> <?php echo $_smarty_tpl->tpl_vars['birth_reg']->value->informant_surname;?>
 <?php echo $_smarty_tpl->tpl_vars['birth_reg']->value->informant_firstname;?>
</h5>
                            <h5 class="my-2"><span class="float-left">Place of Residence: </span> <?php echo $_smarty_tpl->tpl_vars['birth_reg']->value->informant_place_of_residence;?>
</h5>
                        </div>
                        <div class="form-group col-sm-12">
                            <h4><span class="float-left">Status: </span>
                                <?php if (isset($_smarty_tpl->tpl_vars['birth_reg']->value->status) && $_smarty_tpl->tpl_vars['birth_reg']->value->status == 1) {?><span class="badge badge-success">Approved</span>
                                <?php } elseif (isset($_smarty_tpl->tpl_vars['birth_reg']->value->status) && $_smarty_tpl->tpl_vars['birth_reg']->value->status == 2) {?><span class="badge badge-danger">Declined</span>
                                <?php } else { ?><span class="badge badge-info">Pending</span>
                                <?php }?>
                            </h4>
                        </div>
                        <div class="form-group col-sm-12">
                            <?php if (isset($_smarty_tpl->tpl_vars['birth_reg']->value->status) && $_smarty_tpl->tpl_vars['birth_reg']->value->status == 1) {?>
                            <a class="btn btn-sm btn-info rounded-0"  href="<?php echo $_smarty_tpl->tpl_vars['Site']->value['siteProtocol'];
echo $_smarty_tpl->tpl_vars['Site']->value['domainName'];?>
/birth-cert?id=<?php echo $_smarty_tpl->tpl_vars['birth_reg']->value->registration_id;?>
"><i class="fa fa-ellipsis-v"></i> View Certificate</a>
                            <?php }?>
                        </div>
                    </div>
                </fieldset>
            </div>
        <?php } else { ?>
            <div class="col-sm-10 form-group mb-3">
                <h6 class="text-center">No record found</h6>
            </div>
        <?php }?>
    </section>


			
			
			</main>
			
		
		
			<?php /*  Call merged included template "modal-file.html" */
echo $_smarty_tpl->getInlineSubTemplate('modal-file.html', $_smarty_tpl->cache_id, $_smarty_tpl->compile_id, 0, $_smarty_tpl->cache_lifetime, array(), 0, '115605fc231b6dc37c1_99721388', 'content_5fc231b6dbe188_75547258');
/*  End of included template "modal-file.html" */?>

		
		<?php
$_smarty_tpl->properties['nocache_hash'] = '48735fc231b40a8f95_36592556';
?>


		
			<!--========================== Footer ============================-->
		    <footer id="footer" class="footer-bg-img">
		   	
		        <div class="footer-top">
		            <div class="container">
		                <div id="half-top" class="row justify-content-center">
		                    <div class="col-lg-3 col-md-4 footer-links">
		                        <h4>Smart Links</h4>
		                        <ul>
		                            <li><i class="ion-ios-arrow-right"></i> <a href="<?php echo $_smarty_tpl->tpl_vars['Site']->value['siteProtocol'];
echo $_smarty_tpl->tpl_vars['Site']->value['domainName'];?>
/about">About</a></li>
		                            <li><i class="ion-ios-arrow-right"></i> <a href="<?php echo $_smarty_tpl->tpl_vars['Site']->value['siteProtocol'];
echo $_smarty_tpl->tpl_vars['Site']->value['domainName'];?>
/faq">F.A.Q</a></li>
		                            <li><i class="ion-ios-arrow-right"></i> <a href="<?php echo $_smarty_tpl->tpl_vars['Site']->value['siteProtocol'];
echo $_smarty_tpl->tpl_vars['Site']->value['domainName'];?>
/contact">Contact</a></li>
		                            <li><i class="ion-ios-arrow-right"></i> <a href="<?php echo $_smarty_tpl->tpl_vars['Site']->value['siteProtocol'];
echo $_smarty_tpl->tpl_vars['Site']->value['domainName'];?>
/register">New Registration</a></li>
		                        </ul>
		                    </div>
		                    <div class="col-lg-4 col-md-3 footer-contact">
		                        <h4>Social Connect</h4>
		                        <div class="social-links">
		                            <a href="#" class="twitter"><i class="fa fa-twitter"></i></a>
		                            <a href="#" class="facebook"><i class="fa fa-facebook"></i></a>
		                            <a href="#" class="instagram"><i class="fa fa-instagram"></i></a>
		                            <a href="#" class="google-plus d-none"><i class="fa fa-youtube"></i></a>
		                        </div>
		                    </div>
		                    <div class="col-lg-5 col-md-5 footer-info">
		                    	<h4>Subscribe for our updates</h4>
		                        <p>Drop your email here...</p>
		                        <form action="" method="post">
		                            <input type="email" class="py-2 px-2 border-0" name="email"><input type="submit" class="site-bg-1 border-0 py-2 px-2 cursor-pointer btn-success-hover" name="trigger" value="Subscribe">
		                            <?php if (!empty($_smarty_tpl->tpl_vars['msg_nl']->value)) {
echo $_smarty_tpl->tpl_vars['msg_nl']->value;
}?>
		                        </form>
		                    </div>

		                </div>
		                <div id="half-base" class="row justify-content-center">
		                    <div class="col-lg-3 col-md-4 footer-links">
		                        <h4>Smart Links</h4>
		                        <ul>
		                            <li><i class="ion-ios-arrow-right"></i> <a href="<?php echo $_smarty_tpl->tpl_vars['Site']->value['siteProtocol'];
echo $_smarty_tpl->tpl_vars['Site']->value['domainName'];?>
/about">About</a></li>
		                            <li><i class="ion-ios-arrow-right"></i> <a href="<?php echo $_smarty_tpl->tpl_vars['Site']->value['siteProtocol'];
echo $_smarty_tpl->tpl_vars['Site']->value['domainName'];?>
/faq">F.A.Q</a></li>
		                            <li><i class="ion-ios-arrow-right"></i> <a href="<?php echo $_smarty_tpl->tpl_vars['Site']->value['siteProtocol'];
echo $_smarty_tpl->tpl_vars['Site']->value['domainName'];?>
/contact">Contact</a></li>
		                            <li><i class="ion-ios-arrow-right"></i> <a href="<?php echo $_smarty_tpl->tpl_vars['Site']->value['siteProtocol'];
echo $_smarty_tpl->tpl_vars['Site']->value['domainName'];?>
/register">New Registration</a></li>
		                        </ul>
		                    </div>
		                </div>
		            </div>
		        </div>
			
			
			<div class="row no-gutters footer-bottom pb-4">
				<div class="container">
		            <div class="copyright">
		                &copy; Copyright 2020 <strong><?php echo $_smarty_tpl->tpl_vars['Site']->value['companyName'];?>
</strong>. All Rights Reserved
		            </div>
		            <div class="credits d-none"> Developed by <a class="author-link" target="__blank" href="https://minderstech.com/">Minderstech </a>
		            </div>
		        </div>
			</div>
		       
			
		    </footer><!-- #footer -->
		    <a href="#" class="back-to-top"><i class="fa fa-chevron-up"></i></a>
		
		<?php echo $_smarty_tpl->getSubTemplate ('script.html', $_smarty_tpl->cache_id, $_smarty_tpl->compile_id, 0, $_smarty_tpl->cache_lifetime, array(), 0);
?>

    </body>
</html>

<?php }
}
?><?php
/*%%SmartyHeaderCode:202715fc231b482b784_34285661%%*/
if ($_valid && !is_callable('content_5fc231b4824581_30161490')) {
function content_5fc231b4824581_30161490 ($_smarty_tpl) {
?>
<?php
$_smarty_tpl->properties['nocache_hash'] = '202715fc231b482b784_34285661';
?>
<!--==========================  Header  ============================-->
<header class="border border-top-0 border-left-0 border-right-0 border-success" id="header">
    <div class="container-fluid">
        <div id="logo" class="pull-left mt-4 bg-white h-100">
            <a href="<?php echo $_smarty_tpl->tpl_vars['Site']->value['siteProtocol'];
echo $_smarty_tpl->tpl_vars['Site']->value['domainName'];?>
">
                <img class="header-image-logo h-100" src="<?php echo $_smarty_tpl->tpl_vars['Site']->value['siteProtocol'];
echo $_smarty_tpl->tpl_vars['Site']->value['domainName'];?>
/site/media/i/logo1.png" alt="" title="<?php echo $_smarty_tpl->tpl_vars['Site']->value['companyName'];?>
" />
                <h6 class="font-weight-bold text-center"><?php echo $_smarty_tpl->tpl_vars['Site']->value['companyAbbr'];?>
</h6>
            </a>
        </div>
        <div class="icon-bar is-pulled-right"><i class="fa fa-bars fa-2x"></i></div>

        <nav id="nav-menu-container" class="bg-white">
            <ul class="nav-menu">
                <li class="mb-1 <?php if ($_smarty_tpl->tpl_vars['sitePage']->value == 'default' || $_smarty_tpl->tpl_vars['sitePage']->value == 'home') {?>menu-active<?php }?>"><a href="<?php echo $_smarty_tpl->tpl_vars['Site']->value['siteProtocol'];
echo $_smarty_tpl->tpl_vars['Site']->value['domainName'];?>
/home"><i class="fa fa-home"></i> Home</a></li>
                <li class="<?php if (in_array($_smarty_tpl->tpl_vars['sitePage']->value,array('faq'))) {?>active<?php }?>"><a href="<?php echo $_smarty_tpl->tpl_vars['Site']->value['siteProtocol'];
echo $_smarty_tpl->tpl_vars['Site']->value['domainName'];?>
/faq"><i class="fa fa-question"></i> F.A.Q.</a></li>
                <li class="mb-1 <?php if ($_smarty_tpl->tpl_vars['sitePage']->value == 'about') {?>menu-active<?php }?>"><a href="<?php echo $_smarty_tpl->tpl_vars['Site']->value['siteProtocol'];
echo $_smarty_tpl->tpl_vars['Site']->value['domainName'];?>
/about"><i class="fa fa-info"></i> About Us</a></li>
                <li class="mb-1 <?php if ($_smarty_tpl->tpl_vars['sitePage']->value == 'contact') {?>menu-active<?php }?>"><a href="<?php echo $_smarty_tpl->tpl_vars['Site']->value['siteProtocol'];
echo $_smarty_tpl->tpl_vars['Site']->value['domainName'];?>
/contact"><i class="fa fa-headphones"></i> Contact</a></li>
                <li class="mb-1 <?php if ($_smarty_tpl->tpl_vars['sitePage']->value == 'register') {?>menu-active<?php }?>"><a href="<?php echo $_smarty_tpl->tpl_vars['Site']->value['siteProtocol'];
echo $_smarty_tpl->tpl_vars['Site']->value['domainName'];?>
/register"><i class="fa fa-register"></i> Register Now</a></li>
                <li class="mb-1 <?php if ($_smarty_tpl->tpl_vars['sitePage']->value == 'find-registration') {?>menu-active<?php }?>"><a href="<?php echo $_smarty_tpl->tpl_vars['Site']->value['siteProtocol'];
echo $_smarty_tpl->tpl_vars['Site']->value['domainName'];?>
/find-registation"><i class="fa fa-print"></i> Print Certificate</a></li>
                <?php if (!empty($_smarty_tpl->tpl_vars['Site']->value['session']['User']['client']['Token'])) {?>
                    <li class="d-none"><a href="<?php echo $_smarty_tpl->tpl_vars['Site']->value['siteProtocol'];
echo $_smarty_tpl->tpl_vars['Site']->value['domainName'];?>
/dashboard/home"></i><i class="fa fa-dashboard"></i> Visit Dashboard</a></li>
                <?php } elseif (!empty($_smarty_tpl->tpl_vars['Site']->value['session']['User']['admin']['Token'])) {?>
                    <li class="d-none"><a href="<?php echo $_smarty_tpl->tpl_vars['Site']->value['siteProtocol'];
echo $_smarty_tpl->tpl_vars['Site']->value['domainName'];?>
/root/home"></i><i class="fa fa-dashboard"></i> Visit Dashboard</a></li>
                <?php } else { ?>
                    
                        <li class="mb-1 d-none <?php if ($_smarty_tpl->tpl_vars['sitePage']->value == 'signup') {?>menu-active<?php }?>"><a href="<?php echo $_smarty_tpl->tpl_vars['Site']->value['siteProtocol'];
echo $_smarty_tpl->tpl_vars['Site']->value['domainName'];?>
/signup"><i class="fa fa-sign-in"></i> Register</a></li>
                    
                <?php }?>
            </ul>
        </nav><!-- #nav-menu-container -->
    </div>
</header><!-- #header -->
<button type="button" class="btn btn-primary d-none" data-toggle="modal" data-target="#myModal3" id="contact-button"><b><i class="fa fa-headphones"></i> Contact</b></button><?php
/*/%%SmartyNocache:202715fc231b482b784_34285661%%*/
}
}
?><?php
/*%%SmartyHeaderCode:222135fc231b54d5b80_89704930%%*/
if ($_valid && !is_callable('content_5fc231b54d0cb7_74754199')) {
function content_5fc231b54d0cb7_74754199 ($_smarty_tpl) {
?>
<?php
$_smarty_tpl->properties['nocache_hash'] = '222135fc231b54d5b80_89704930';
?>
<!--==========================Intro Section============================-->
<section id="intro d-none">
    <div class="intro-container">
        <div id="introCarousel" class="carousel  slide carousel-fade" data-ride="carousel">
            <ol class="carousel-indicators"></ol>
            <div class="carousel-inner" role="listbox">
                <div class="carousel-item active">
                    <div class="carousel-background"><img src="<?php echo $_smarty_tpl->tpl_vars['Site']->value['siteProtocol'];
echo $_smarty_tpl->tpl_vars['Site']->value['domainName'];?>
/site/media/i/new-imgs/main-slider/mainslide0.jpg" height="900px" alt=""></div>
                    <div class="carousel-container">
                        <div class="carousel-content">
                            <h2>Penny Wise</h2>
                            <p>
                                ....
                            </p>
                            <a href="<?php echo $_smarty_tpl->tpl_vars['Site']->value['siteProtocol'];
echo $_smarty_tpl->tpl_vars['Site']->value['domainName'];?>
/login" class="btn-get-started d-none">Login</a>
                        </div>
                    </div>
                </div>

                <div class="carousel-item">
                    <div class="carousel-background"><img src="<?php echo $_smarty_tpl->tpl_vars['Site']->value['siteProtocol'];
echo $_smarty_tpl->tpl_vars['Site']->value['domainName'];?>
/site/media/i/new-imgs/main-slider/mainslide1.jpg"  height="900px" alt=""></div>
                    <div class="carousel-container">
                        <div class="carousel-content">
                            <h2>Penny Wise</h2>
                            <p>
                                ....
                            </p>
                        </div>
                    </div>
                </div>

                <div class="carousel-item">
                    <div class="carousel-background"><img src="<?php echo $_smarty_tpl->tpl_vars['Site']->value['siteProtocol'];
echo $_smarty_tpl->tpl_vars['Site']->value['domainName'];?>
/site/media/i/new-imgs/main-slider/mainslide2.jpg"  height="900px" alt=""></div>
                    <div class="carousel-container">
                        <div class="carousel-content">
                            <h2>Penny Wise</h2>
                            <p>
                               ....
                            </p>
                        </div>
                    </div>
                </div>

                <div class="carousel-item">
                    <div class="carousel-background"><img src="<?php echo $_smarty_tpl->tpl_vars['Site']->value['siteProtocol'];
echo $_smarty_tpl->tpl_vars['Site']->value['domainName'];?>
/site/media/i/new-imgs/main-slider/mainslide3.jpg"  height="900px" alt=""></div>
                    <div class="carousel-container">
                        <div class="carousel-content">
                            <h2>Penny Wise</h2>
                            <p>
                                ....
                            </p>
                        </div>
                    </div>
                </div>

                <div class="carousel-item">
                    <div class="carousel-background"><img src="<?php echo $_smarty_tpl->tpl_vars['Site']->value['siteProtocol'];
echo $_smarty_tpl->tpl_vars['Site']->value['domainName'];?>
/site/media/i/new-imgs/main-slider/mainslide4.jpg"  height="900px" alt=""></div>
                    <div class="carousel-container">
                        <div class="carousel-content">
                            <h2>Penny Wise</h2>
                            <p>
                                ....
                            </p>
                        </div>
                    </div>
                </div>
            </div>
            <a class="carousel-control-prev" href="#introCarousel" role="button" data-slide="prev">
                <span class="carousel-control-prev-icon ion-chevron-left" aria-hidden="true"></span>
                <span class="sr-only">Previous</span>
            </a>

            <a class="carousel-control-next" href="#introCarousel" role="button" data-slide="next">
                <span class="carousel-control-next-icon ion-chevron-right" aria-hidden="true"></span>
                <span class="sr-only">Next</span>
            </a>

        </div>
    </div>
</section><!-- #intro --><?php
/*/%%SmartyNocache:222135fc231b54d5b80_89704930%%*/
}
}
?><?php
/*%%SmartyHeaderCode:115605fc231b6dc37c1_99721388%%*/
if ($_valid && !is_callable('content_5fc231b6dbe188_75547258')) {
function content_5fc231b6dbe188_75547258 ($_smarty_tpl) {
?>
<?php
$_smarty_tpl->properties['nocache_hash'] = '115605fc231b6dc37c1_99721388';
?>
<div class="modal fade" id="myModal3" tabindex="-1" role="dialog" aria-labelledby="myModal1" aria-hidden="true">
    <div class="modal-dialog modal-dialog-centered" role="document" >
        <div class="modal-content p-2">
            <div class="modal-header">
                <img class="mb-4 h-80px float-left" src="<?php echo $_smarty_tpl->tpl_vars['Site']->value['siteProtocol'];
echo $_smarty_tpl->tpl_vars['Site']->value['domainName'];?>
/site/media/i/logo1.png" alt="">
                <button type="button" class="close" data-dismiss="modal" aria-label="Close" >
                    <span aria-hidden="true" >&times;</span>
                </button>
            </div>
            <div class="modal-body">
                <form class="form-signin" action="" method="post">
                    <h1 class="h3 mb-3 font-weight-normal text-center"><b>Drop Your Message Here</b></h1>
                    <div class="form-group">
                        <label for="names" class="sr-only">Name</label>
                        <input type="text" id="names" class="form-control form-control-sm badge-pill m-2" placeholder="Name" required="" name="names" autofocus="Enter your name">
                    </div>
                    <div class="form-group">
                        <label for="email" class="sr-only">Email</label>
                        <input type="email" id="email" class="form-control form-control-sm badge-pill m-2" placeholder="Email" name="email" required="" autofocus="Enter a valid email">
                    </div>
                    <div class="form-group">
                        <label for="inputTelNo" class="sr-only">Mobile Number</label>
                        <input type="tel" id="inputTelNo" class="form-control form-control-sm badge-pill m-2" placeholder="Mobile Number" name="phone" autofocus="Enter a valid phone number">
                    </div>
                    <div class="form-group">
                        <label for="subject" class="sr-only">Subject</label>
                        <input type="text" id="subject" class="form-control form-control-sm badge-pill m-2" placeholder="Subject" name="subject" autofocus="Enter a valid subject">
                    </div>
                    <div class="form-group">
                        <label for="message" class="sr-only">Message</label>
                        <textarea type="text" id="message" class="form-control form-control-sm rounded m-2" placeholder="Message" name="message" autofocus="Enter a valid message" rows="5"></textarea>
                    </div>
                    <div class="form-group">
                        <button class="btn btn-success1 btn-block m-1" type="submit" name="trigger" value="contact">Submit</button>
                    </div>
                    <div class="form-group">
                        <p>Just in case you did not hear back from us on time, You can checkout our<a href="<?php echo $_smarty_tpl->tpl_vars['Site']->value['siteProtocol'];
echo $_smarty_tpl->tpl_vars['Site']->value['domainName'];?>
/faq" title="Frequently Asked Questions">F.A.Q.</a> -OR- reach us through our <a href="<?php echo $_smarty_tpl->tpl_vars['Site']->value['siteProtocol'];
echo $_smarty_tpl->tpl_vars['Site']->value['domainName'];?>
/contact" title="Contact Care Line">Contact Page</a></p>
                    </div>
                </form>
            </div>
        </div>
    </div>
</div>
<div class="modal fade" id="showImgPreview" tabindex="-1" role="dialog" aria-labelledby="showImgPreviewTitle" aria-hidden="true">
  <div class="modal-dialog modal-lg modal-dialog-centered" role="document">
    <div class="modal-content">
      <div class="modal-header"><button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button></div>
      <div class="modal-body">
        <img id="imgPreviewShow" class="w-100 h-100" src="" alt="">
        <span class="text-muted" id="gallImgName"></span>
      </div>
      <div class="modal-footer"><button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button></div>
    </div>
  </div>
</div>
<?php if (!empty($_smarty_tpl->tpl_vars['msg']->value)) {?>
    <?php echo $_smarty_tpl->tpl_vars['msg']->value;?>

<?php }?><?php
/*/%%SmartyNocache:115605fc231b6dc37c1_99721388%%*/
}
}
?>