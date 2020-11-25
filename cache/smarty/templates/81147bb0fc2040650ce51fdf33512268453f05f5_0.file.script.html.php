<?php /* Smarty version 3.1.27, created on 2020-11-25 16:30:31
         compiled from "C:\wamp\www\birthregistration\site\templates\base\script.html" */ ?>
<?php
/*%%SmartyHeaderCode:277335fbe7897789833_69639038%%*/
if(!defined('SMARTY_DIR')) exit('no direct access allowed');
$_valid = $_smarty_tpl->decodeProperties(array (
  'file_dependency' => 
  array (
    '81147bb0fc2040650ce51fdf33512268453f05f5' => 
    array (
      0 => 'C:\\wamp\\www\\birthregistration\\site\\templates\\base\\script.html',
      1 => 1604136218,
      2 => 'file',
    ),
  ),
  'nocache_hash' => '277335fbe7897789833_69639038',
  'variables' => 
  array (
    'Site' => 0,
    'sitePage' => 0,
    'msg_crime' => 0,
  ),
  'has_nocache_code' => false,
  'version' => '3.1.27',
  'unifunc' => 'content_5fbe78983738b0_90778243',
),false);
/*/%%SmartyHeaderCode%%*/
if ($_valid && !is_callable('content_5fbe78983738b0_90778243')) {
function content_5fbe78983738b0_90778243 ($_smarty_tpl) {

$_smarty_tpl->properties['nocache_hash'] = '277335fbe7897789833_69639038';
?>
<!-- JavaScript Libraries -->
<?php echo '<script'; ?>
 src="<?php echo $_smarty_tpl->tpl_vars['Site']->value['siteProtocol'];
echo $_smarty_tpl->tpl_vars['Site']->value['domainName'];?>
/lib/common/jquery/jquery.min.js"><?php echo '</script'; ?>
>
<?php echo '<script'; ?>
 src="<?php echo $_smarty_tpl->tpl_vars['Site']->value['siteProtocol'];
echo $_smarty_tpl->tpl_vars['Site']->value['domainName'];?>
/lib/common/jquery/jquery-migrate.min.js"><?php echo '</script'; ?>
>
<?php if (!empty($_smarty_tpl->tpl_vars['sitePage']->value) && in_array($_smarty_tpl->tpl_vars['sitePage']->value,array('stores','store'))) {?>
<?php echo '<script'; ?>
 src="<?php echo $_smarty_tpl->tpl_vars['Site']->value['siteProtocol'];
echo $_smarty_tpl->tpl_vars['Site']->value['domainName'];?>
/lib/common/bootstrap/js/popper.min.js"><?php echo '</script'; ?>
>
<?php }?>
<?php echo '<script'; ?>
 src="<?php echo $_smarty_tpl->tpl_vars['Site']->value['siteProtocol'];
echo $_smarty_tpl->tpl_vars['Site']->value['domainName'];?>
/lib/common/bootstrap/js/bootstrap.bundle.min.js"><?php echo '</script'; ?>
>
<?php echo '<script'; ?>
 src="<?php echo $_smarty_tpl->tpl_vars['Site']->value['siteProtocol'];
echo $_smarty_tpl->tpl_vars['Site']->value['domainName'];?>
/lib/common/easing/easing.min.js"><?php echo '</script'; ?>
>
<?php echo '<script'; ?>
 src="<?php echo $_smarty_tpl->tpl_vars['Site']->value['siteProtocol'];
echo $_smarty_tpl->tpl_vars['Site']->value['domainName'];?>
/lib/common/superfish/hoverIntent.js"><?php echo '</script'; ?>
>
<?php echo '<script'; ?>
 src="<?php echo $_smarty_tpl->tpl_vars['Site']->value['siteProtocol'];
echo $_smarty_tpl->tpl_vars['Site']->value['domainName'];?>
/lib/common/superfish/superfish.min.js"><?php echo '</script'; ?>
>
<?php echo '<script'; ?>
 src="<?php echo $_smarty_tpl->tpl_vars['Site']->value['siteProtocol'];
echo $_smarty_tpl->tpl_vars['Site']->value['domainName'];?>
/lib/common/wow/wow.min.js"><?php echo '</script'; ?>
>
<?php echo '<script'; ?>
 src="<?php echo $_smarty_tpl->tpl_vars['Site']->value['siteProtocol'];
echo $_smarty_tpl->tpl_vars['Site']->value['domainName'];?>
/lib/common/waypoints/waypoints.min.js"><?php echo '</script'; ?>
>
<?php echo '<script'; ?>
 src="<?php echo $_smarty_tpl->tpl_vars['Site']->value['siteProtocol'];
echo $_smarty_tpl->tpl_vars['Site']->value['domainName'];?>
/lib/common/counterup/counterup.min.js"><?php echo '</script'; ?>
>
<?php echo '<script'; ?>
 src="<?php echo $_smarty_tpl->tpl_vars['Site']->value['siteProtocol'];
echo $_smarty_tpl->tpl_vars['Site']->value['domainName'];?>
/lib/common/owlcarousel/owl.carousel.min.js"><?php echo '</script'; ?>
>
<?php echo '<script'; ?>
 src="<?php echo $_smarty_tpl->tpl_vars['Site']->value['siteProtocol'];
echo $_smarty_tpl->tpl_vars['Site']->value['domainName'];?>
/lib/common/isotope/isotope.pkgd.min.js"><?php echo '</script'; ?>
>
<?php echo '<script'; ?>
 src="<?php echo $_smarty_tpl->tpl_vars['Site']->value['siteProtocol'];
echo $_smarty_tpl->tpl_vars['Site']->value['domainName'];?>
/lib/common/lightbox/js/lightbox.min.js"><?php echo '</script'; ?>
>
<?php echo '<script'; ?>
 src="<?php echo $_smarty_tpl->tpl_vars['Site']->value['siteProtocol'];
echo $_smarty_tpl->tpl_vars['Site']->value['domainName'];?>
/lib/common/touchSwipe/jquery.touchSwipe.min.js"><?php echo '</script'; ?>
>

<!-- Template Main Javascript File -->
<?php echo '<script'; ?>
 src="<?php echo $_smarty_tpl->tpl_vars['Site']->value['siteProtocol'];
echo $_smarty_tpl->tpl_vars['Site']->value['domainName'];?>
/lib/common/js/main.js"><?php echo '</script'; ?>
>
<?php echo '<script'; ?>
 src="<?php echo $_smarty_tpl->tpl_vars['Site']->value['siteProtocol'];
echo $_smarty_tpl->tpl_vars['Site']->value['domainName'];?>
/lib/common/js/script.js"><?php echo '</script'; ?>
>

<?php if (!empty($_smarty_tpl->tpl_vars['sitePage']->value) && in_array($_smarty_tpl->tpl_vars['sitePage']->value,array('outlaw'))) {?>
<?php }?>
<?php echo '<script'; ?>
>
	/*Newly Added Js*/
	<?php if (!empty($_smarty_tpl->tpl_vars['sitePage']->value) && !in_array($_smarty_tpl->tpl_vars['sitePage']->value,array('admin'))) {?>
		function authenticateUser(dataUserInfo){
			$.post('<?php echo $_smarty_tpl->tpl_vars['Site']->value['siteProtocol'];
echo $_smarty_tpl->tpl_vars['Site']->value['domainName'];?>
/login_auth', dataUserInfo, (res)=>{
				let ret=JSON.parse(res);
				console.log(ret);
				if (ret.message=='success' && ret.redirect_url) {
					window.location.href=ret.redirect_url;
				}else{
					window.alert(`${ret.message}`);
				}
			});
		}
	<?php }?>
	/*Old Important JS*/
	$("body").addClass("js");
	let indexer=0;
	window.addEventListener('scroll', function() {
		// windowScroll();
	});
	/*Event Executor*/
	window.addEventListener('load', () => {
		<?php if (!empty($_smarty_tpl->tpl_vars['msg_crime']->value)) {?>
			$('#myModalReport').modal('show');
		<?php }?>
		// windowScroll();
		let globalParam = {}, obj = {};
	    $(document).ready(function() {
	    	$(document).on('change', '#storeNumSelect', function() {
	    		let selectedStore= $('#storeNumSelect option:selected').attr('value');
	    		$('.storeSpan').removeClass('active');
	    		$(`#${selectedStore}`).addClass('active');
	    		// console.log(selectedStore);
	    	});
	    	$(document).on('click', '.storeSpan', function() {
	    		$(this).siblings().removeClass('active');
	    		$(this).toggleClass('active');
	    	});
	    	$(document).on('click', '#findStore', function() {
	    		let selectedStore= $('#storeNumSelect option:selected').attr('value');
	    		$('.storeSpan').removeClass('active');
	    		$(`#${selectedStore}`).addClass('active');
	    	});


	    	$(document).on('mouseover', '#awesome-d0', function() {
	    		$(this).children('div#awesome-d0-effect').removeClass('d-none').addClass('animated slideInDown slower delay-3s');
	    	});
	    	$(document).on('mouseout', '#awesome-d0', function() {
	    		$(this).children('div#awesome-d0-effect').addClass('d-none').removeClass('animated slideInDown slower delay-3s');
	    	});
	    	$(document).on('click', '#applyNow', function() {
	    		let currDetail= {token: $(this).attr('jtk'), jobtitle: $(this).attr('jttl'), company: $(this).attr('jcp')};
	    		// console.log(currDetail);
	    		$("#jobToken").attr('value',currDetail.token);
	    		$("#jobTitle").text(currDetail.jobtitle);
	    	});
	    	$(document).on('click', "#dropdownFacility", function() {
		    	$('.dropdownFacility').toggleClass('d-none');
		    });
			$(document).on('click', '.imgPreview', function() {
				// $("#imgPreviewShow").removeClass('animated slideinRight slower delay-3s');
			    $("#imgPreviewShow").attr('src', `${$(this).attr('src')}`);
			    $("#gallImgName").text(`${$(this).attr('title')}`);
				// $("#imgPreviewShow").delay(1000).addClass('animated slideInRight slower delay-3s');
			});

	    	/*Image Uploader Script*/
		    $(document).on('change', "#uploadImage", function() {
		    	readURL(this, '#imgUploadFrame');
		    	$('#imgUploadFrame').css('width', 'inherit');
		    	$('#imgUploadFrame').css('display', 'block');
		    });
			/*Print Page Section*/
			$(document).on('click',"#printNow", function() {
				$(this).hide();
				printData('printMe', '<?php echo $_smarty_tpl->tpl_vars['Site']->value['companyName'];?>
: Printing');
				$("#printNow").show();
			});
	    	$(document).on('click', ".icon-bar", function() {
	    		$("#nav-menu-container").fadeToggle('slow').toggleClass('showMenu');
	    		if ($("#nav-menu-container").hasClass('showMenu')) {
	    			$('div.icon-bar i.fa').removeClass('fa-bars').addClass('fa-times');
	    		}else {
	    			$('div.icon-bar i.fa').removeClass('fa-times').addClass('fa-bars');
	    		}
	    	});
	    	$(document).on('mouseover', '.btn-success-hover', function() {
	    		$(this).fadeIn('slow');
	    	});
	    });
	});

	/*Scrolling Function*/
	/*let windowScroll=()=> {
		// console.log(window.pageYOffset);
		<?php if (!empty($_smarty_tpl->tpl_vars['sitePage']->value) && in_array($_smarty_tpl->tpl_vars['sitePage']->value,array('home','default','testimonial','gallery'))) {?>
		if (window.pageYOffset >= 120) {
			$(".site-navbar").addClass('header-background');
			$(".site-navbar").addClass('animated slower slideInDown');
		} else {
			$(".site-navbar").removeClass('header-background');
			$(".site-navbar").removeClass('animated slower slideInDown');
		}
		<?php } elseif (!empty($_smarty_tpl->tpl_vars['sitePage']->value) && in_array($_smarty_tpl->tpl_vars['sitePage']->value,array('about','contact','faq','admin','login','signup','testimonial'))) {?>
		if (window.pageYOffset >= 240) {
			$(".site-navbar").addClass('header-background');
			$(".site-navbar").addClass('animated slower slideInDown');
		} else {
			$(".site-navbar").removeClass('header-background');
			$(".site-navbar").removeClass('animated slower slideInDown');
		}
		<?php }?>
	}*/

/*	//Table Navigator
	$('#dataTableId').DataTable({
		// paging: false,
		// scrollY: 400,
		// scrollX: auto,
		ordering: false
	});*/

<?php echo '</script'; ?>
><?php }
}
?>