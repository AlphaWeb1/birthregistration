<?php /* Smarty version 3.1.27, created on 2020-11-28 12:17:01
         compiled from "C:\wamp\www\birthregistration\site\templates\root\birth-cert.html" */ ?>
<?php
/*%%SmartyHeaderCode:279445fc231ad24e891_82462011%%*/
if(!defined('SMARTY_DIR')) exit('no direct access allowed');
$_valid = $_smarty_tpl->decodeProperties(array (
  'file_dependency' => 
  array (
    'd27fc5023fc00ae42c85983c7807bc7155133a3b' => 
    array (
      0 => 'C:\\wamp\\www\\birthregistration\\site\\templates\\root\\birth-cert.html',
      1 => 1606561456,
      2 => 'file',
    ),
    '60ccdb52d9f346d855b9258e2d7fb3f73de0424b' => 
    array (
      0 => 'C:\\wamp\\www\\birthregistration\\site\\templates\\root\\root.html',
      1 => 1582535490,
      2 => 'file',
    ),
    'b61c7878a19a8dfcdc5dcd7880351f48e9361de3' => 
    array (
      0 => 'C:\\wamp\\www\\birthregistration\\site\\templates\\root\\default.html',
      1 => 1587329612,
      2 => 'file',
    ),
    '5f352d2badacc62027254a0f9b5c78d2dd52610a' => 
    array (
      0 => '5f352d2badacc62027254a0f9b5c78d2dd52610a',
      1 => 0,
      2 => 'string',
    ),
    '0d6d7a9ffc22c8f6054c56353b7830c2c886d344' => 
    array (
      0 => '0d6d7a9ffc22c8f6054c56353b7830c2c886d344',
      1 => 0,
      2 => 'string',
    ),
  ),
  'nocache_hash' => '279445fc231ad24e891_82462011',
  'variables' => 
  array (
    'Site' => 0,
    'sitePage' => 0,
  ),
  'has_nocache_code' => false,
  'version' => '3.1.27',
  'unifunc' => 'content_5fc231ae43be18_10672853',
),false);
/*/%%SmartyHeaderCode%%*/
if ($_valid && !is_callable('content_5fc231ae43be18_10672853')) {
function content_5fc231ae43be18_10672853 ($_smarty_tpl) {
if (!is_callable('smarty_modifier_capitalize')) require_once 'C:\\wamp\\www\\birthregistration\\lib\\Smarty\\plugins\\modifier.capitalize.php';

$_smarty_tpl->properties['nocache_hash'] = '279445fc231ad24e891_82462011';
?>
<!doctype html>
<html lang="en-us">
    <head>
        <meta charset="utf-8">
        <title>Admin @ <?php echo smarty_modifier_capitalize($_smarty_tpl->tpl_vars['Site']->value['companyName']);?>
 | <?php echo smarty_modifier_capitalize($_smarty_tpl->tpl_vars['sitePage']->value);?>
</title>
        <meta name="viewport" content="width=device-width, initial-scale=1.0">
        <meta name="description" content="">
        <meta name="author" content="">
        <meta name="robots" content="noindex">
    	<link href="<?php echo $_smarty_tpl->tpl_vars['Site']->value['siteProtocol'];
echo $_smarty_tpl->tpl_vars['Site']->value['domainName'];?>
/site/media/i/logo1.png" rel="icon">
    	<link href="<?php echo $_smarty_tpl->tpl_vars['Site']->value['siteProtocol'];
echo $_smarty_tpl->tpl_vars['Site']->value['domainName'];?>
/site/media/i/logo1.png" rel="apple-touch-icon">
        <?php echo $_smarty_tpl->getSubTemplate ('stylesheet.html', $_smarty_tpl->cache_id, $_smarty_tpl->compile_id, 0, $_smarty_tpl->cache_lifetime, array(), 0);
?>

    </head>
	<body>
		<div class="dashboard-wrapper is-responsive">
			<!--div class="overlay-menu"></div-->
			<!Dashboard Side Menu>
			<?php echo $_smarty_tpl->getSubTemplate ('dash_sidemenu.html', $_smarty_tpl->cache_id, $_smarty_tpl->compile_id, 0, $_smarty_tpl->cache_lifetime, array(), 0);
?>

			<!Dashboard Header>
			<?php echo $_smarty_tpl->getSubTemplate ('header.html', $_smarty_tpl->cache_id, $_smarty_tpl->compile_id, 0, $_smarty_tpl->cache_lifetime, array(), 0);
?>

			<!Dashboard Content Wrapper>
			<div class="dashboard-content-wrapper">
				<div class="dash-main-content">
					<div class="col-sm-12">
						<?php
$_smarty_tpl->properties['nocache_hash'] = '279445fc231ad24e891_82462011';
?>

<section class="breadcrumb"><strong class="uppercase">Dasboard |</strong> BIRTH REGISTRATIONS&nbsp;<i class="fa fa-certificate"></i>&nbsp; | Certificate Detail</section>

						<?php
$_smarty_tpl->properties['nocache_hash'] = '279445fc231ad24e891_82462011';
?>

<section class="row justify-content-center">
	<div class="col-sm-10 form-group mb-3">
		<?php if (!empty($_smarty_tpl->tpl_vars['fail']->value)) {?>
		  <?php echo $_smarty_tpl->tpl_vars['fail']->value;?>

		<?php }?>
    </div>
    <?php if (!empty($_smarty_tpl->tpl_vars['birth_reg']->value)) {?>
        <div class="card col-sm-10 my-5 float-left p-2 birth-cert-frame"  id="printMe">
            <div class="card birth-cert-frame">
                <fieldset class="p-4 mt-3 birth-cert-frame">
                    <legend class="text-center mb-4">
                        <h3 class="font-weight-bold">
                            <img class="coat-logo" src="<?php echo $_smarty_tpl->tpl_vars['Site']->value['siteProtocol'];
echo $_smarty_tpl->tpl_vars['Site']->value['domainName'];?>
/site/media/i/logo0.jpg" alt="Nigerian Coat of Arm">
                        </h3> <span class="text-right float-right font-weight-bold text-uppercase">ORIGINAL</span>
                        <h3 class="text-uppercase">
                            FEDERAL REPUBLIC OF NIGERIA <br/>
                            <span class="font-weight-bold">NATIONAL POPULATION COMMISSION</span>
                        </h3>
                    </legend>
                    
                    <div class="form-row">
                        <div class="col-sm-12 text-center">
                            <h5 class="text-uppercase"><u>Certificate of Birth</u></h5>
                            <p class="h6">Issue under the Births and Deaths Etc. (Compulsory Regulation) Decree 69 of 1992</p>
                        </div>
                        <div class="form-group col-sm-6">
                            <h5 class="my-2"><span class="float-left">Registration Center:&nbsp;</span> <?php echo $_smarty_tpl->tpl_vars['birth_reg']->value->center;?>
</h5>
                            <h5 class="my-2"><span class="float-left">Town / Village:&nbsp;</span> <?php echo $_smarty_tpl->tpl_vars['birth_reg']->value->town;?>
</h5>
                            <h5 class="my-2"><span class="float-left">L.G.A.:&nbsp;</span> <?php echo $_smarty_tpl->tpl_vars['birth_reg']->value->lga;?>
</h5>
                            <h5 class="my-2"><span class="float-left">State:&nbsp;</span> <?php echo $_smarty_tpl->tpl_vars['birth_reg']->value->state;?>
</h5>
                        </div>
                        <div class="form-group col-sm-6">
                            <p class="h5 my-3 text-center">Certficate Number:</p>
                            <div class="my-3 text-center">
                                <h5 class="d-inline-flex">
                                    <span><u><?php echo $_smarty_tpl->tpl_vars['birth_reg']->value->register_volume;?>
</u>&nbsp;/&nbsp;<br/>&nbsp;Volume&nbsp;</span>
                                    <span><u><?php echo $_smarty_tpl->tpl_vars['birth_reg']->value->register_volume;?>
</u>&nbsp;/&nbsp;<br/>&nbsp;Year&nbsp;</span>
                                    <span><u><?php echo $_smarty_tpl->tpl_vars['birth_reg']->value->reg_year;?>
</u>&nbsp;<br/>&nbsp;Entry No</span>
                                </h5>
                            </div>
                        </div>
                        <div class="col-sm-12 text-center">
                            <p class="h6">This is to certify that thye birth details of which are recorded herein, has been registered on.</p>
                            <h6 class="d-inline-flex">
                                <span><u><?php echo $_smarty_tpl->tpl_vars['birth_reg']->value->reg_day;?>
</u><br/>Day</span>&nbsp;/&nbsp;<span><u><?php echo $_smarty_tpl->tpl_vars['birth_reg']->value->reg_month;?>
</u><br/>Month</span>&nbsp;/&nbsp;
                                <span><u><?php echo $_smarty_tpl->tpl_vars['birth_reg']->value->reg_year;?>
</u><br/>Year</span>
                                &nbsp;at this Registration Center
                            </h6>
                        </div>
                        <div class="col-sm-12 text-left">
                            <h5 class="h5 my-3">
                                <span>1.&nbsp;&nbsp;&nbsp;&nbsp;Full Name:&nbsp;&nbsp;
                                    <?php echo $_smarty_tpl->tpl_vars['birth_reg']->value->child_surname;?>
 <?php echo $_smarty_tpl->tpl_vars['birth_reg']->value->child_firstname;?>
 <?php echo $_smarty_tpl->tpl_vars['birth_reg']->value->child_other_name;?>

                                </span>
                            </h5>
                            <h5 class="h5 my-3 text-center">
                                <span class="float-left">2.&nbsp;&nbsp;&nbsp;&nbsp;Sex:&nbsp;<?php echo $_smarty_tpl->tpl_vars['birth_reg']->value->sex;?>
&nbsp;</span>
                                <span class="h5 d-inline-flex">3.&nbsp;&nbsp;&nbsp;&nbsp;Date of Birth:&nbsp;
                                    <span><u><?php echo $_smarty_tpl->tpl_vars['birth_reg']->value->child_birth_day;?>
</u><br/>Day</span>&nbsp;/&nbsp;<span><u><?php echo $_smarty_tpl->tpl_vars['birth_reg']->value->child_birth_month;?>
</u><br/>Month</span>&nbsp;/&nbsp;
                                    <span><u><?php echo $_smarty_tpl->tpl_vars['birth_reg']->value->child_birth_year;?>
</u><br/>Year</span>
                                </span>
                            </h5>
                            <h5 class="h5 my-3">
                                <span>
                                    4.&nbsp;&nbsp;&nbsp;&nbsp;Place or Birth:&nbsp;&nbsp; <?php echo $_smarty_tpl->tpl_vars['birth_reg']->value->town_village;?>
 <?php echo $_smarty_tpl->tpl_vars['birth_reg']->value->place_of_birth;?>
 Town / Village
                                </span>
                            </h5>
                            <h5 class="h5 my-3">
                                <span>5.&nbsp;&nbsp;&nbsp;&nbsp;Full name of Father:&nbsp;&nbsp;
                                    <?php echo $_smarty_tpl->tpl_vars['birth_reg']->value->father_surname;?>
 <?php echo $_smarty_tpl->tpl_vars['birth_reg']->value->father_firstname;?>

                                </span>
                            </h5>
                            <h5 class="h5 my-3">
                                <span>6.&nbsp;&nbsp;&nbsp;&nbsp;Full name of Mother:&nbsp;&nbsp;
                                    <?php echo $_smarty_tpl->tpl_vars['birth_reg']->value->mother_surname;?>
 <?php echo $_smarty_tpl->tpl_vars['birth_reg']->value->mother_firstname;?>

                                </span>
                            </h5>
                        </div>
                        <div class="col-sm-12 text-left">
                            <h5 class="my-5">
                                <span class="float-left">Place of Issue:&nbsp;<?php echo $_smarty_tpl->tpl_vars['birth_reg']->value->lga;?>
 <?php echo $_smarty_tpl->tpl_vars['birth_reg']->value->state;?>
&nbsp;</span>
                                <span class=" float-right">Name of Register:&nbsp;_____________</span>
                            </h5>
                        </div>
                        <div class="col-sm-12 text-left">
                            <h5 class="my-3">
                                <span class="float-left">Date:&nbsp;<?php echo $_smarty_tpl->tpl_vars['birth_reg']->value->updated_at;?>
&nbsp;</span>
                                <span class=" float-right">Signature:&nbsp;__________________</span>
                            </h5>
                        </div>
                    </div>
                    <div class="form-row">
                        <div class="form-group col-sm-12">
                            <button class="btn btn-sm btn-info rounded-0" id="printSect"><i class="fa fa-print"></i> Print</button>
                        </div>
                    </div>
                </fieldset>
            </div>
        </div>
    <?php } else { ?>
        <div class="col-sm-10 form-group mb-3">
            <h6 class="text-center">No record found</h6>
        </div>
    <?php }?>
</section>

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
					</div>
					<footer class="dash-footer">
						<div class="container-fluid">
							<div class="row">
								<div class="col-sm-12 text-center">
									 
									<span>
										Copyright © <a href="mailto:contact@pennywise.com" target="__top" charset="text-white"><strong><?php echo $_smarty_tpl->tpl_vars['Site']->value['companyName'];?>
. All Rights Reserved</strong></a> 2020 | <small class="d-none">Developed by <a href="http://minderstech.com" target="__blank"><em class="text-primary"><strong>Minderstech</strong></em></a></small>
									</span>
									
								</div>
							</div>
						</div>
						<hr/>
					</footer>
				</div>
			</div>
		</div>
		<?php echo $_smarty_tpl->getSubTemplate ('javascript.html', $_smarty_tpl->cache_id, $_smarty_tpl->compile_id, 0, $_smarty_tpl->cache_lifetime, array(), 0);
?>

	</body>
</html><?php }
}
?>