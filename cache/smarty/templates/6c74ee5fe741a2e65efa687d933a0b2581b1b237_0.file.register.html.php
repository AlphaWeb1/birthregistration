<?php /* Smarty version 3.1.27, created on 2020-11-25 16:30:15
         compiled from "C:\wamp\www\birthregistration\site\templates\base\register.html" */ ?>
<?php
/*%%SmartyHeaderCode:144705fbe7887137331_44900093%%*/
if(!defined('SMARTY_DIR')) exit('no direct access allowed');
$_valid = $_smarty_tpl->decodeProperties(array (
  'file_dependency' => 
  array (
    '6c74ee5fe741a2e65efa687d933a0b2581b1b237' => 
    array (
      0 => 'C:\\wamp\\www\\birthregistration\\site\\templates\\base\\register.html',
      1 => 1606313045,
      2 => 'file',
    ),
    '1520cf1ca0cb00b5bdc5e9633dd8a6a98982cc1e' => 
    array (
      0 => 'C:\\wamp\\www\\birthregistration\\site\\templates\\base\\default.html',
      1 => 1606313345,
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
    '3407d1111bb9de09dbf1ef363f3b29700608c8cd' => 
    array (
      0 => '3407d1111bb9de09dbf1ef363f3b29700608c8cd',
      1 => 0,
      2 => 'string',
    ),
    'e13f02a258e0ef1a5104493ac8a272c464ce5155' => 
    array (
      0 => 'C:\\wamp\\www\\birthregistration\\site\\templates\\base\\modal-file.html',
      1 => 1587823471,
      2 => 'file',
    ),
    '59230045c002c6b6f138258a7301f1feee22b598' => 
    array (
      0 => '59230045c002c6b6f138258a7301f1feee22b598',
      1 => 0,
      2 => 'string',
    ),
  ),
  'nocache_hash' => '144705fbe7887137331_44900093',
  'variables' => 
  array (
    'Site' => 0,
    'sitePage' => 0,
    'homePageData' => 0,
    'key' => 0,
    'promo' => 0,
    'fail' => 0,
    'msg_nl' => 0,
  ),
  'has_nocache_code' => false,
  'version' => '3.1.27',
  'unifunc' => 'content_5fbe788a1ccb05_14819904',
),false);
/*/%%SmartyHeaderCode%%*/
if ($_valid && !is_callable('content_5fbe788a1ccb05_14819904')) {
function content_5fbe788a1ccb05_14819904 ($_smarty_tpl) {
if (!is_callable('smarty_modifier_capitalize')) require_once 'C:\\wamp\\www\\birthregistration\\lib\\Smarty\\plugins\\modifier.capitalize.php';

$_smarty_tpl->properties['nocache_hash'] = '144705fbe7887137331_44900093';
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
echo $_smarty_tpl->getInlineSubTemplate('header.html', $_smarty_tpl->cache_id, $_smarty_tpl->compile_id, 0, $_smarty_tpl->cache_lifetime, array(), 0, '249485fbe7888780592_94466571', 'content_5fbe78886b9f80_53136283');
/*  End of included template "header.html" */?>

		
		
			
				<?php /*  Call merged included template "main-slider.html" */
echo $_smarty_tpl->getInlineSubTemplate('main-slider.html', $_smarty_tpl->cache_id, $_smarty_tpl->compile_id, 0, $_smarty_tpl->cache_lifetime, array(), 0, '222905fbe7889097126_04335221', 'content_5fbe7889091851_85465586');
/*  End of included template "main-slider.html" */?>

			
			
			<main id="main wow fadeInUp slow">
			
			
				
				
				<?php
$_smarty_tpl->properties['nocache_hash'] = '144705fbe7887137331_44900093';
?>

<section class="row no-gutters justify-content-end bg-image-1">
    <div class="card col-sm-8 my-5 float-left p-3" id="logn-frame">
        <form method="post" action="<?php echo $_smarty_tpl->tpl_vars['Site']->value['siteProtocol'];
echo $_smarty_tpl->tpl_vars['Site']->value['domainName'];?>
/signup">
            <fieldset class="card p-4 mt-3">
                <legend class="text-center mb-4"><h3 class="font-weight-bold"><i class="fa fa-certificate"></i> Birth Registration Form</h3></legend>
                <?php if (!empty($_smarty_tpl->tpl_vars['fail']->value)) {?>
                    <div class="form-group m-1">
                        <div class="alert alert-danger alert-dismissible" role="alert"><button type="button" class="close" data-dismiss="alert" aria-label="Close"><span aria-hidden="true">&times;</span></button><h3>Error:</h3> 
                            <?php echo $_smarty_tpl->tpl_vars['fail']->value;?>

                        </div>
                    </div>
                <?php }?>
                <div class="form-row">
                    <div class="col-sm-12"><h5 class="text-center">Birth Center</h5></div>
                    <div class="form-group col-sm-6 mb-3">
                        <label for="center">Registration Center</label>
                        <input type="text" class="form-control form-control-sm badge-pill" name="center" id="center" value="" placeholder="Registration Center">
                    </div>
                    <div class="form-group col-sm-6 mb-3">
                        <label for="register_volume">Register Volume</label>
                        <input type="text" class="form-control form-control-sm badge-pill" name="register_volume" id="register_volume" value="" placeholder="Register Volume">
                    </div>
                </div>
                <div class="form-row">
                    <div class="form-group col-sm-6 mb-3">
                        <label for="town">Town / Village</label>
                        <input type="text" class="form-control form-control-sm badge-pill" name="town" id="town" value="" placeholder="Town / Village">
                    </div>
                    <div class="form-group col-sm-6 mb-3">
                        <label for="entry_number">Entry Number</label>
                        <input type="text" class="form-control form-control-sm badge-pill" name="entry_number" id="entry_number" value="" placeholder="Entry Number">
                    </div>
                </div>
                <div class="form-row justify-content-center mb-3">
                    <div class="form-group col-sm-6">
                        <label for="lga">Local Government Area</label>
                        <input type="text" class="form-control form-control-sm badge-pill" id="lga" name="lga" placeholder="Local Government Area" value="">
                    </div>
                    <div class="form-group col-sm-6 mb-3">
                        <label for="date_of_registraton">Date of Registration</label>
                        <div class="row">
                            <div class="col-4">
                                <input type="text" class="form-control form-control-sm badge-pill" id="reg_day" name="reg_day" placeholder="Day" value="" required="">
                            </div>
                            <div class="col-4">
                                <input type="text" class="form-control form-control-sm badge-pill" id="reg_month" name="reg_month" placeholder="Month" value="" required="">
                            </div>
                            <div class="col-4">
                                <input type="text" class="form-control form-control-sm badge-pill" id="reg_year" name="reg_year" placeholder="Year" value="" required="">
                            </div>
                        </div>
                    </div>
                </div>
                <div class="form-group mb-3">
                    <label for="state">State</label>
                    <select class="form-control form-control-sm badge-pill" id="state" name="state" placeholder="State" required="">
                        <?php if (!empty($_smarty_tpl->tpl_vars['states']->value)) {?>
                        <?php
$_from = $_smarty_tpl->tpl_vars['states']->value;
if (!is_array($_from) && !is_object($_from)) {
settype($_from, 'array');
}
$_smarty_tpl->tpl_vars['state'] = new Smarty_Variable;
$_smarty_tpl->tpl_vars['state']->_loop = false;
foreach ($_from as $_smarty_tpl->tpl_vars['state']->value) {
$_smarty_tpl->tpl_vars['state']->_loop = true;
$foreach_state_Sav = $_smarty_tpl->tpl_vars['state'];
?>
                            <option value="<?php echo $_smarty_tpl->tpl_vars['state']->value->name;?>
"><?php echo smarty_modifier_capitalize($_smarty_tpl->tpl_vars['state']->value->name);?>
</option>
                        <?php
$_smarty_tpl->tpl_vars['state'] = $foreach_state_Sav;
}
?>
                        <?php }?>
                    </select>
                </div>
                <h5 class="text-center">Particulars of Child</h5>
                <div class="form-group text-justify mb-3">
                    <label for="child_name">Child Name</label>
                    <div class="row">
                        <div class="col-4">
                            <input type="text" class="form-control form-control-sm badge-pill" id="child_surname" name="child_surname" placeholder="Surname" required="">
                        </div>
                        <div class="col-4">
                            <input type="text" class="form-control form-control-sm badge-pill" id="child_firstname" name="child_firstname" placeholder="First Name" required="">
                        </div>
                        <div class="col-4">
                            <input type="text" class="form-control form-control-sm badge-pill" id="child_other_name" name="child_other_name" placeholder="Middle Name" required="">
                        </div>
                    </div>
                </div>
                <div class="form-row">
                    <div class="form-group col-sm-6 text-justify mb-3">
                        <label for="child_date">Date of Birth</label>
                        <div class="row">
                            <div class="col-4">
                                <input type="text" class="form-control form-control-sm badge-pill" id="child_birth_day" name="child_birth_day" placeholder="Day" required="">
                            </div>
                            <div class="col-4">
                                <input type="text" class="form-control form-control-sm badge-pill" id="child_birth_month" name="child_birth_month" placeholder="Month" required="">
                            </div>
                            <div class="col-4">
                                <input type="text" class="form-control form-control-sm badge-pill" id="child_birth_year" name="child_birth_year" placeholder="Year" required="">
                            </div>
                        </div>
                    </div>
                    <div class="form-group col-sm-6 text-justify mb-3">
                        <label for="sex">Sex</label>
                        <select id="sex" name="sex" placeholder="Sex" class="form-control form-control-sm badge-pill" required>
                            <option value="male">Male</option>
                            <option value="female">Femaile</option>
                        </select>
                    </div>
                </div>
                <div class="form-row">
                    <div class="form-group col-sm-6 text-justify mb-3">
                        <label for="place_of_birth">Place of Birth</label>
                        <select id="place_of_birth" name="place_of_birth" placeholder="Place of Birth" class="form-control form-control-sm badge-pill" required>
                            <option value="hospital">Hospital</option>
                            <option value="maternity home">Maternity Home</option>
                            <option value="at home">At Home</option>
                            <option value="traditional doctor's place">Traditional Doctor's Place</option>
                            <option value="others">Others</option>
                        </select>
                    </div>
                    <div class="form-group col-sm-6 text-justify mb-3">
                        <label for="town_village">Village / Town</label>
                        <input type="text" id="town_village" name="town_village" placeholder="Town / Village" class="form-control form-control-sm badge-pill" required="">
                    </div>
                </div>
                <h5 class="text-center">Particulars of Mother</h5>
                <div class="form-group text-justify mb-3">
                    <label for="mother_name">Mother's Name</label>
                    <div class="row">
                        <div class="col-6">
                            <input type="text" class="form-control form-control-sm badge-pill" id="mother_surname" name="mother_surname" placeholder="Surname" required="">
                        </div>
                        <div class="col-6">
                            <input type="text" class="form-control form-control-sm badge-pill" id="mother_firstname" name="mother_firstname" placeholder="First Name" required="">
                        </div>
                    </div>
                </div>
                <div class="form-group text-justify mb-3">
                    <label for="mother_place_of_residence">Place of Residence</label>
                    <input type="text" id="mother_place_of_residence" name="mother_place_of_residence" placeholder="Place of Residence" class="form-control form-control-sm badge-pill" required="">
                </div>
                <div class="form-row">
                    <div class="form-group col-sm-6 text-justify mb-3">
                        <label for="mother_age">Age at Birth of Child</label>
                        <input type="number" id="mother_age" name="mother_age" placeholder="Age At Birth of Child" class="form-control form-control-sm badge-pill" required="">
                    </div>
                    <div class="form-group col-sm-6 text-justify mb-3">
                        <label for="mother_marital_status">Marital Status</label>
                        <select id="mother_marital_status" name="mother_marital_status" placeholder="Marital Status" class="form-control form-control-sm badge-pill" required>
                            <option value="single">Single</option>
                            <option value="married">Married</option>
                            <option value="separated">Separated</option>
                            <option value="divorced">Divorced</option>
                            <option value="widow">Widow</option>
                        </select>
                    </div>
                </div>
                <div class="form-row">
                    <div class="form-group col-sm-6 text-justify mb-3">
                        <label for="mother_nationality">Nationality</label>
                        <select id="mother_nationality" name="mother_nationality" placeholder="Nationality" class="form-control form-control-sm badge-pill" required>
                            <option value="nigerian">Nigerian</option>
                            <option value="non-nigerian">Non Nigerian</option>
                        </select>
                    </div>
                    <div class="form-group col-sm-6 text-justify mb-3">
                        <label for="mother_ethicity">If Nigerian</label>
                        <div class="row">
                            <div class="col-6">
                                <select class="form-control form-control-sm badge-pill" id="mother_state" name="mother_state" placeholder="State of Origin" required="">
                                    <option value="others">Select State of Origin</option>
                                    <?php if (!empty($_smarty_tpl->tpl_vars['states']->value)) {?>
                                    <?php
$_from = $_smarty_tpl->tpl_vars['states']->value;
if (!is_array($_from) && !is_object($_from)) {
settype($_from, 'array');
}
$_smarty_tpl->tpl_vars['state'] = new Smarty_Variable;
$_smarty_tpl->tpl_vars['state']->_loop = false;
foreach ($_from as $_smarty_tpl->tpl_vars['state']->value) {
$_smarty_tpl->tpl_vars['state']->_loop = true;
$foreach_state_Sav = $_smarty_tpl->tpl_vars['state'];
?>
                                        <option value="<?php echo $_smarty_tpl->tpl_vars['state']->value->name;?>
"><?php echo smarty_modifier_capitalize($_smarty_tpl->tpl_vars['state']->value->name);?>
</option>
                                    <?php
$_smarty_tpl->tpl_vars['state'] = $foreach_state_Sav;
}
?>
                                    <?php }?>
                                </select>
                            </div>
                            <div class="col-6">
                                <input type="text" class="form-control form-control-sm badge-pill" id="mother_ethnic" name="mother_ethnic" placeholder="Ethnic of Origin">
                            </div>
                        </div>
                    </div>
                </div>
                <div class="form-row">
                    <div class="form-group col-sm-6 text-justify mb-3">
                        <label for="mother_literacy">Literacy</label>
                        <select id="mother_literacy" name="mother_literacy" placeholder="Literacy" class="form-control form-control-sm badge-pill" required>
                            <option value="literate">Literate</option>
                            <option value="illiterate">Illiterate</option>
                        </select>
                    </div>
                    <div class="form-group col-sm-6 text-justify mb-3">
                        <label for="mother_level_of_education">Level of Education <small>if literate</small></label>
                        <input type="text" id="mother_level_of_education" name="mother_level_of_education" placeholder="Level of Education" class="form-control form-control-sm badge-pill">
                    </div>
                </div>
                <h5 class="text-center">Particulars of Father</h5>
                <div class="form-group text-justify mb-3">
                    <label for="father_name">Father's Name</label>
                    <div class="row">
                        <div class="col-6">
                            <input type="text" class="form-control form-control-sm badge-pill" id="father_surname" name="father_surname" placeholder="Surname">
                        </div>
                        <div class="col-6">
                            <input type="text" class="form-control form-control-sm badge-pill" id="father_firstname" name="father_firstname" placeholder="First Name">
                        </div>
                    </div>
                </div>
                <div class="form-group text-justify mb-3">
                    <label for="father_place_of_residence">Place of Residence</label>
                    <input type="text" id="father_place_of_residence" name="father_place_of_residence" placeholder="Place of Residence" class="form-control form-control-sm badge-pill">
                </div>
                <div class="form-row">
                    <div class="form-group col-sm-6 text-justify mb-3">
                        <label for="father_age">Age at Birth of Child</label>
                        <input type="text" id="father_age" name="father_age" placeholder="Age At Birth of Child" class="form-control form-control-sm badge-pill">
                    </div>
                    <div class="form-group col-sm-6 text-justify mb-3">
                        <label for="father_marital_status">Marital Status</label>
                        <select id="father_marital_status" name="father_marital_status" placeholder="Marital Status" class="form-control form-control-sm badge-pill">
                            <option value="single">Single</option>
                            <option value="married">Married</option>
                            <option value="separated">Separated</option>
                            <option value="divorced">Divorced</option>
                            <option value="widow">Widow</option>
                        </select>
                    </div>
                </div>
                <div class="form-row">
                    <div class="form-group col-sm-6 text-justify mb-3">
                        <label for="father_nationality">Nationality</label>
                        <select id="father_nationality" name="father_nationality" placeholder="Nationality" class="form-control form-control-sm badge-pill">
                            <option value="nigerian">Nigerian</option>
                            <option value="non-nigerian">Non Nigerian</option>
                        </select>
                    </div>
                    <div class="form-group col-sm-6 text-justify mb-3">
                        <label for="father_ethicity">If Nigerian</label>
                        <div class="row">
                            <div class="col-6">
                                <select class="form-control form-control-sm badge-pill" id="father_state" name="father_state" placeholder="State of Origin">
                                    <option value="others">Select State of Origin</option>
                                    <?php if (!empty($_smarty_tpl->tpl_vars['states']->value)) {?>
                                    <?php
$_from = $_smarty_tpl->tpl_vars['states']->value;
if (!is_array($_from) && !is_object($_from)) {
settype($_from, 'array');
}
$_smarty_tpl->tpl_vars['state'] = new Smarty_Variable;
$_smarty_tpl->tpl_vars['state']->_loop = false;
foreach ($_from as $_smarty_tpl->tpl_vars['state']->value) {
$_smarty_tpl->tpl_vars['state']->_loop = true;
$foreach_state_Sav = $_smarty_tpl->tpl_vars['state'];
?>
                                        <option value="<?php echo $_smarty_tpl->tpl_vars['state']->value->name;?>
"><?php echo smarty_modifier_capitalize($_smarty_tpl->tpl_vars['state']->value->name);?>
</option>
                                    <?php
$_smarty_tpl->tpl_vars['state'] = $foreach_state_Sav;
}
?>
                                    <?php }?>
                                </select>
                            </div>
                            <div class="col-6">
                                <input type="text" class="form-control form-control-sm badge-pill" id="father_ethnic" name="father_ethnic" placeholder="Ethnic of Origin">
                            </div>
                        </div>
                    </div>
                </div>
                <div class="form-row">
                    <div class="form-group col-sm-6 text-justify mb-3">
                        <label for="father_literacy">Literacy</label>
                        <select id="father_literacy" name="father_literacy" placeholder="Literacy" class="form-control form-control-sm badge-pill">
                            <option value="literate">Literate</option>
                            <option value="illiterate">Illiterate</option>
                        </select>
                    </div>
                    <div class="form-group col-sm-6 text-justify mb-3">
                        <label for="father_level_of_education">Level of Education <small>if literate</small></label>
                        <input type="text" id="father_level_of_education" name="father_level_of_education" placeholder="Level of Education" class="form-control form-control-sm badge-pill">
                    </div>
                </div>
                <h5 class="text-center">Particulars of Informant / Guardian</h5>
                <div class="form-group text-justify mb-3">
                    <label for="informant_email">Informant's Active Email</label>
                    <input type="text" id="informant_email" name="informant_email" placeholder="Informat's Active Email" class="form-control form-control-sm badge-pill">
                </div>
                <div class="form-group text-justify mb-3">
                    <label for="informant_relationship_to_child">Relationship to Child</label>
                    <input type="text" id="informant_relationship_to_child" name="informant_relationship_to_child" placeholder="Relationship to Child" class="form-control form-control-sm badge-pill">
                </div>
                <div class="form-group text-justify mb-3">
                    <label for="informant_name">Full Name</label>
                    <div class="row">
                        <div class="col-6">
                            <input type="text" class="form-control form-control-sm badge-pill" id="informant_surname" name="informant_surname" placeholder="Surname">
                        </div>
                        <div class="col-6">
                            <input type="text" class="form-control form-control-sm badge-pill" id="informant_firstname" name="informant_firstname" placeholder="First Name">
                        </div>
                    </div>
                </div>
                <div class="form-group text-justify mb-3">
                    <label for="informant_place_of_residence">Place of Residence</label>
                    <input type="text" id="informant_place_of_residence" name="informant_place_of_residence" placeholder="Place of Residence" class="form-control form-control-sm badge-pill">
                </div>
                <div class="form-group">
                    <span class="matches"></span>
                </div>
                <div class="form-group">
                    <div class="custom-control custom-checkbox m-3">
                        <input type="checkbox" class="custom-control-input" name="terms" value="1" id="agree-terms">
                        <label class="custom-control-label" for="agree-terms">I confirm that all information entered is true, uinque and strict to the birth registration <a class="text-success" href="<?php echo $_smarty_tpl->tpl_vars['Site']->value['siteProtocol'];
echo $_smarty_tpl->tpl_vars['Site']->value['domainName'];?>
/terms" target="__top">Terms &amp; Regulation</a>.</label>
                    </div>
                </div>      
                <div class="form-group text-center">
                    <button class="btn btn-success btn-block badge-pill" type="submit" name="signup" value="signup">Register</button>
                </div>
                <div class="form-group text-center">
                    <h5 class="font-weight-bold">OR</h5>    
                </div>
                <div class="form-group text-center">
                    <a class="btn btn-link" href="<?php echo $_smarty_tpl->tpl_vars['Site']->value['siteProtocol'];
echo $_smarty_tpl->tpl_vars['Site']->value['domainName'];?>
/find-registration">Confirm Registration</a>
                </div>
            </fieldset>
        </form>
    </div>
</section>

				
				
				
				<section class="row justify-content-center d-none no-gutters mb-3">
					<div class="col-sm-3 text-center site-bg-2 py-3">
						<h2 class="font-weight-bold wow flash slower infinite"> !!! Promotions !!!</h2>
					</div>
					<div class="col-sm-6 bg-light text-dark py-3">
						<div id="complexPromo" class="carousel slide" data-ride="carousel">
						  <div class="carousel-inner">
		                  <?php if (!empty($_smarty_tpl->tpl_vars['homePageData']->value->promos)) {?>
		                    <?php
$_from = $_smarty_tpl->tpl_vars['homePageData']->value->promos;
if (!is_array($_from) && !is_object($_from)) {
settype($_from, 'array');
}
$_smarty_tpl->tpl_vars['promo'] = new Smarty_Variable;
$_smarty_tpl->tpl_vars['promo']->_loop = false;
$_smarty_tpl->tpl_vars['key'] = new Smarty_Variable;
foreach ($_from as $_smarty_tpl->tpl_vars['key']->value => $_smarty_tpl->tpl_vars['promo']->value) {
$_smarty_tpl->tpl_vars['promo']->_loop = true;
$foreach_promo_Sav = $_smarty_tpl->tpl_vars['promo'];
?>
						    <div class="carousel-item <?php if ($_smarty_tpl->tpl_vars['key']->value == 0) {?>active<?php }?>">
						      <h4 class="pt-2 text-center"><?php echo $_smarty_tpl->tpl_vars['promo']->value->description;?>
</h4>
						    </div>
		                    <?php
$_smarty_tpl->tpl_vars['promo'] = $foreach_promo_Sav;
}
?>
		                  <?php }?>
						  </div>
						  <a class="carousel-control-prev d-none" href="#complexPromo" role="button" data-slide="prev">
						    <span class="carousel-control-prev-icon" aria-hidden="true"></span>
						    <span class="sr-only">Previous</span>
						  </a>
						  <a class="carousel-control-next d-none" href="#complexPromo" role="button" data-slide="next">
						    <span class="carousel-control-next-icon" aria-hidden="true"></span>
						    <span class="sr-only">Next</span>
						  </a>
						</div>
					</div>
					<div class="col-sm-3 text-center site-bg-2 py-3">
						<h2 class="font-weight-bold wow flash slower infinite"> !!! Promotions !!!</h2>
					</div>
				</section>
				
				
				
			
			
			</main>
			
		
		
			<?php /*  Call merged included template "modal-file.html" */
echo $_smarty_tpl->getInlineSubTemplate('modal-file.html', $_smarty_tpl->cache_id, $_smarty_tpl->compile_id, 0, $_smarty_tpl->cache_lifetime, array(), 0, '285695fbe7889bc0a34_86524633', 'content_5fbe7889b99be0_18372327');
/*  End of included template "modal-file.html" */?>

		
		<?php
$_smarty_tpl->properties['nocache_hash'] = '144705fbe7887137331_44900093';
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

		                    <!--<div class="col-lg-3 col-md-6 footer-newsletter">
		                        <h4>Our Newsletter</h4>
		                        <p>Tamen quem nulla quae legam multos aute sint culpa legam noster magna veniam enim veniam illum dolore legam minim quorum culpa amet magna export quem marada parida nodela caramase seza.</p>
		                        <form action="" method="post">
		                            <input type="email" name="email"><input type="submit" value="Subscribe">
		                        </form>
		                    </div>-->

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
/*%%SmartyHeaderCode:249485fbe7888780592_94466571%%*/
if ($_valid && !is_callable('content_5fbe78886b9f80_53136283')) {
function content_5fbe78886b9f80_53136283 ($_smarty_tpl) {
?>
<?php
$_smarty_tpl->properties['nocache_hash'] = '249485fbe7888780592_94466571';
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
/*/%%SmartyNocache:249485fbe7888780592_94466571%%*/
}
}
?><?php
/*%%SmartyHeaderCode:222905fbe7889097126_04335221%%*/
if ($_valid && !is_callable('content_5fbe7889091851_85465586')) {
function content_5fbe7889091851_85465586 ($_smarty_tpl) {
?>
<?php
$_smarty_tpl->properties['nocache_hash'] = '222905fbe7889097126_04335221';
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
/*/%%SmartyNocache:222905fbe7889097126_04335221%%*/
}
}
?><?php
/*%%SmartyHeaderCode:285695fbe7889bc0a34_86524633%%*/
if ($_valid && !is_callable('content_5fbe7889b99be0_18372327')) {
function content_5fbe7889b99be0_18372327 ($_smarty_tpl) {
?>
<?php
$_smarty_tpl->properties['nocache_hash'] = '285695fbe7889bc0a34_86524633';
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
/*/%%SmartyNocache:285695fbe7889bc0a34_86524633%%*/
}
}
?>