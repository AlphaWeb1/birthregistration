<?php /* Smarty version 3.1.27, created on 2020-11-28 12:17:13
         compiled from "C:\wamp\www\birthregistration\site\templates\root\javascript.html" */ ?>
<?php
/*%%SmartyHeaderCode:246905fc231b9e6cd17_92731404%%*/
if(!defined('SMARTY_DIR')) exit('no direct access allowed');
$_valid = $_smarty_tpl->decodeProperties(array (
  'file_dependency' => 
  array (
    'f0426691457a8e9e6dac1b63c16494bb3d21f22d' => 
    array (
      0 => 'C:\\wamp\\www\\birthregistration\\site\\templates\\root\\javascript.html',
      1 => 1606551470,
      2 => 'file',
    ),
  ),
  'nocache_hash' => '246905fc231b9e6cd17_92731404',
  'variables' => 
  array (
    'Site' => 0,
    'sitePage' => 0,
    'clients' => 0,
    'client' => 0,
    'centers' => 0,
    'store_numbers' => 0,
    'news' => 0,
    'defaultDetail' => 0,
    'transProgressM' => 0,
    'transProgressW' => 0,
    'chartStats' => 0,
    'value' => 0,
  ),
  'has_nocache_code' => false,
  'version' => '3.1.27',
  'unifunc' => 'content_5fc231bba10fd9_43338116',
),false);
/*/%%SmartyHeaderCode%%*/
if ($_valid && !is_callable('content_5fc231bba10fd9_43338116')) {
function content_5fc231bba10fd9_43338116 ($_smarty_tpl) {

$_smarty_tpl->properties['nocache_hash'] = '246905fc231b9e6cd17_92731404';
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

<?php echo '<script'; ?>
 src="<?php echo $_smarty_tpl->tpl_vars['Site']->value['siteProtocol'];
echo $_smarty_tpl->tpl_vars['Site']->value['domainName'];?>
/lib/common/datatables/js/jquery.datatables.min.js"><?php echo '</script'; ?>
>
<?php echo '<script'; ?>
 src="<?php echo $_smarty_tpl->tpl_vars['Site']->value['siteProtocol'];
echo $_smarty_tpl->tpl_vars['Site']->value['domainName'];?>
/lib/common/datatables/js/datatables.min.js"><?php echo '</script'; ?>
>
<?php if (!empty($_smarty_tpl->tpl_vars['sitePage']->value) && in_array($_smarty_tpl->tpl_vars['sitePage']->value,array('add_news','edit_news'))) {?>
<?php echo '<script'; ?>
 src="<?php echo $_smarty_tpl->tpl_vars['Site']->value['siteProtocol'];
echo $_smarty_tpl->tpl_vars['Site']->value['domainName'];?>
/lib/common/bootstrap/popper.js"><?php echo '</script'; ?>
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

<?php if (!empty($_smarty_tpl->tpl_vars['sitePage']->value) && in_array($_smarty_tpl->tpl_vars['sitePage']->value,array('add_news','edit_news','newsletter'))) {?>
<?php echo '<script'; ?>
 type="text/javascript" src="<?php echo $_smarty_tpl->tpl_vars['Site']->value['siteProtocol'];
echo $_smarty_tpl->tpl_vars['Site']->value['domainName'];?>
/lib/common/quilljs/quill.min.js"><?php echo '</script'; ?>
>
<?php }?>
<?php if (!empty($_smarty_tpl->tpl_vars['sitePage']->value) && in_array($_smarty_tpl->tpl_vars['sitePage']->value,array('home'))) {?>
<?php echo '<script'; ?>
 src="<?php echo $_smarty_tpl->tpl_vars['Site']->value['siteProtocol'];
echo $_smarty_tpl->tpl_vars['Site']->value['domainName'];?>
/lib/common/canvasjs-2.3.2/canvasjs.min.js"><?php echo '</script'; ?>
>
<?php }?>

<!-- Template Main Javascript File -->
<?php echo '<script'; ?>
 src="<?php echo $_smarty_tpl->tpl_vars['Site']->value['siteProtocol'];
echo $_smarty_tpl->tpl_vars['Site']->value['domainName'];?>
/lib/common/js/main.js"><?php echo '</script'; ?>
>

<?php echo '<script'; ?>
 type="text/javascript" src="<?php echo $_smarty_tpl->tpl_vars['Site']->value['siteProtocol'];
echo $_smarty_tpl->tpl_vars['Site']->value['domainName'];?>
/lib/common/js/script.js"><?php echo '</script'; ?>
>
<?php echo '<script'; ?>
 type="text/javascript">
$(document).ready(function(){
  $("body").addClass("js");
  let globalParam={};
  let indexer=0;
  let printTitle= `Nigerian Maritime Administration And Safety Agency`;
  /*Outer Logics*/
  <?php if ($_smarty_tpl->tpl_vars['sitePage']->value == 'security') {?>
    <?php if (!empty($_smarty_tpl->tpl_vars['Site']->value['session']['Site']['User']['security2'])) {?>
      $('.login-shield').hide();
    <?php }?>
  <?php }?>
  /*General Event Controller*/
  $(document).on('click','.side-menu-link',function(){
    $(this).toggleClass('isactive')
    $(this).siblings().removeClass('isactive');
  });
  $(document).on('click','#rootEvt', function(){
    /*Security Page Access Control*/
    <?php if ($_smarty_tpl->tpl_vars['sitePage']->value == 'security') {?>
      var secDetail={username: $("#vUsername").val(), password: $("#vPassword").val()};
       globalParam= {sp: `<?php echo $_smarty_tpl->tpl_vars['sitePage']->value;?>
`, sd: secDetail};
      $.post("<?php echo $_smarty_tpl->tpl_vars['Site']->value['siteProtocol'];
echo $_smarty_tpl->tpl_vars['Site']->value['domainName'];?>
/site/inc/root/general.php", globalParam, (res)=> {
        if (res=='success') {
          $('.alert1').addClass('alert-success').removeClass('alert-danger');
          $('.alert1').html(`<p><strong>Notice:</strong> ${res}</p>`);
          $('.login-shield').hide(2000);
        }else{
          $('.alert1').addClass('alert-danger').removeClass('alert-success');
          $('.login-shield').show(2000);
          $('.alert1').html(`<p><strong>Notice:</strong> ${res}</p>`);
        }
        // $(this).addClass("hidden");
        // $(".sec-token-request").html('<a class="btn btn-sm">Security token sent</a>');
      });
    <?php }?>
  });
  /*Changing of Country State City*/
  <?php if (in_array($_smarty_tpl->tpl_vars['sitePage']->value,array('profile','events','edit_event','add_news','edit_news','newsletter'))) {?>
    $(document).on('change','#country, #state', function(){
      let csd={ data: $(this).val(), type: $(this).attr('id') };
      globalParam={sp: `<?php echo $_smarty_tpl->tpl_vars['sitePage']->value;?>
`, csd: csd};
      $.post("<?php echo $_smarty_tpl->tpl_vars['Site']->value['siteProtocol'];
echo $_smarty_tpl->tpl_vars['Site']->value['domainName'];?>
/site/inc/root/general.php", globalParam, (res)=> {
        let ret=JSON.parse(res);
        // console.log(ret);
        let target=( $(this).attr('id')=="country"? "#state": "#city");
        if(ret.length>0 && ret!=null){
          $(target).empty();
          for (let re of ret) {
            $(target).append(`<option value="${re.name}">${re.name}</option>`);
          }
        }else{
          $(target).html(`<option value="">No Record Found</option>`);
        }
      });
    });
  <?php }?>
  $(document).on('change', "#img-upload", function() {
    readURL(this, '#dataImg');
    $('#dataImg').css('width', 'inherit');
    $('#dataImg').css('display', 'block');
  });
  $(document).on('change', "#img-upload1", function() {
    readURL(this, '#dataImg1');
    $('#dataImg1').css('width', 'inherit');
    $('#dataImg1').css('display', 'block');
  });
  <?php if (in_array($_smarty_tpl->tpl_vars['sitePage']->value,array('new_store','post_ads','store','ads'))) {?>
    $(document).on('change', "#img-upload2", function() {
      readURL(this, '#dataImg2');
      $('#dataImg2').css('width', 'inherit');
      $('#dataImg2').css('display', 'block');
    });
    $(document).on('change', "#img-upload3", function() {
      readURL(this, '#dataImg3');
      $('#dataImg3').css('width', 'inherit');
      $('#dataImg3').css('display', 'block');
    });
  <?php }?>
  $(document).on('click','.deleteTrig', function(){
    let deleConf=confirm(`Are you Sure to Remove This ${$(this).attr(`what`)}?`);
    if (deleConf!==true) {
      return false;
    }
  });
  $(document).on('click','.confirmTrig', function(){
    let deleConf=confirm(`Are you sure to ${$(this).attr(`what`)}?`);
    if (deleConf!==true) {
      return false;
    }
  });
  $(document).on('click','.viewPassword', function(){
    $('#password').attr('type', `${($('#password').attr('type')=='text'?'password':'text')}`);
    if ($(this).find('i').hasClass('fa-eye')) {
      $(this).html('<i class="fa fa-eye-slash"></i> Hide Password');
    }else{
      $(this).html('<i class="fa fa-eye"></i> View Password');
    }
  });
  $(document).on('click','.genPassword', function(){
    let genPass=getToken(8);
    $('#password').attr('value',`${genPass}`).val(genPass);
    $('.genedPass').text(genPass);
  });
  <?php if (in_array($_smarty_tpl->tpl_vars['sitePage']->value,array('add_client','client','add_staff','staff'))) {?>
    $(document).on('change keyup', "#firstName, #lastName", function() {
      $('#username').attr('value', `${$("#lastName").val().charAt(0).toLowerCase()}${$("#firstName").val().toLowerCase()}`);
    });
    $(document).on('change keyup', "#password", function() {
      $('.genedPass').text(`${$("#password").val()}`);
    });
  <?php }?>
  <?php if (in_array($_smarty_tpl->tpl_vars['sitePage']->value,array('package','course'))) {?>
  $('#dataTableId').DataTable({
    // paging: false,
    // scrollY: 400,
    // scrollX: auto,
    ordering: false
  });
  <?php }?>
  <?php if (in_array($_smarty_tpl->tpl_vars['sitePage']->value,array('compose'))) {?>
    $(document).on('change', '#sendto', function() {
      let sendto=$("#sendto option:selected").attr('value').trim();
      if (sendto=='*') {
        $('#filterclients').addClass('d-none').children().find('select').attr('disabled', 'disabled'); $('#singles').addClass('d-none');
      }else if (sendto=='#') {
        $('#filterclients').addClass('d-none').children().find('select').attr('disabled', 'disabled');
        $('#singles').removeClass('d-none').html(`
          <label for="receiver"><h5>Receivers <sup class="text-danger">(*)</sup></h5></label>
          <select id="receiver" name="receivers[]" class="form-control input-block lh-3" multiple="" required>
            <?php if (!empty($_smarty_tpl->tpl_vars['clients']->value)) {?>
                <?php
$_from = $_smarty_tpl->tpl_vars['clients']->value;
if (!is_array($_from) && !is_object($_from)) {
settype($_from, 'array');
}
$_smarty_tpl->tpl_vars['client'] = new Smarty_Variable;
$_smarty_tpl->tpl_vars['client']->_loop = false;
$_smarty_tpl->tpl_vars['ky'] = new Smarty_Variable;
foreach ($_from as $_smarty_tpl->tpl_vars['ky']->value => $_smarty_tpl->tpl_vars['client']->value) {
$_smarty_tpl->tpl_vars['client']->_loop = true;
$foreach_client_Sav = $_smarty_tpl->tpl_vars['client'];
?>
                <option value="<?php echo $_smarty_tpl->tpl_vars['client']->value->email;?>
" style="word-break: break-word;">(<?php echo $_smarty_tpl->tpl_vars['client']->value->names;?>
) <?php echo $_smarty_tpl->tpl_vars['client']->value->email;?>
</option>
                <?php
$_smarty_tpl->tpl_vars['client'] = $foreach_client_Sav;
}
?>
            <?php } else { ?>
              <option value="">No Registered Client</option>
            <?php }?><hr/>
          </select>
          <hr/>`);
      }else if(sendto=='$'){
        $('#singles').addClass('d-none').html('');
        /*console.log(`<?php echo json_encode($_smarty_tpl->tpl_vars['centers']->value);?>
`);
        $('#filterclients').removeClass('d-none').html(`
          <label for="receiver"><h5>Search By Store e.g. (A, or A1)<sup class="text-danger">(*)</sup></h5></label>
          <input type="text" id="filter" name="filter" class="form-control form-control-sm input-block" value=""/>
          `);*/
        // console.log(`<?php echo json_encode($_smarty_tpl->tpl_vars['store_numbers']->value);?>
`);
        $('#filterclients').removeClass('d-none').children().find('select').removeAttr(`disabled`);
      }else{
        $('#filterclients').addClass('d-none').children().find('select').attr('disabled', 'disabled');
        $('#singles').removeClass('d-none').html(`
          <label for="receivers"><h5>Receivers <sup class="text-danger">(*)</sup></h5></label>
          <select id="receivers" name="receivers[]" class="form-control input-block lh-3" multiple="" required>
            <?php if (!empty($_smarty_tpl->tpl_vars['clients']->value)) {?>
                <?php
$_from = $_smarty_tpl->tpl_vars['clients']->value;
if (!is_array($_from) && !is_object($_from)) {
settype($_from, 'array');
}
$_smarty_tpl->tpl_vars['client'] = new Smarty_Variable;
$_smarty_tpl->tpl_vars['client']->_loop = false;
$_smarty_tpl->tpl_vars['ky'] = new Smarty_Variable;
foreach ($_from as $_smarty_tpl->tpl_vars['ky']->value => $_smarty_tpl->tpl_vars['client']->value) {
$_smarty_tpl->tpl_vars['client']->_loop = true;
$foreach_client_Sav = $_smarty_tpl->tpl_vars['client'];
?>
                <option value="<?php echo $_smarty_tpl->tpl_vars['client']->value->email;?>
" style="word-break: break-word;">(<?php echo $_smarty_tpl->tpl_vars['client']->value->names;?>
) <?php echo $_smarty_tpl->tpl_vars['client']->value->email;?>
</option>
                <?php
$_smarty_tpl->tpl_vars['client'] = $foreach_client_Sav;
}
?>
            <?php } else { ?>
              <option value="">No Registered Client</option>
            <?php }?><hr/>
          </select>
          <hr/>`);
      }
    });
    $(document).on('change', '#blockNum', function() {
      let selectedBlock=$("#blockNum option:selected");
      /**/
      $('#storeNum').html(`<option value="all">All</option>`);
      console.log(selectedBlock.length);

      if (selectedBlock && selectedBlock.attr('value')=='all') {
        let selectedBlockContent=JSON.parse(selectedBlock.attr('i').trim());
        for (sBC in selectedBlockContent) {
          // console.log(selectedBlockContent[`${sBC}`]);
          for (val of selectedBlockContent[`${sBC}`]) {
            $('#storeNum').append(`<option value="${val}">${val}</option>`);
          }
        }
      }else if (selectedBlock && selectedBlock.length>1) {
        for (sBlock of selectedBlock) {
          let sBContent=JSON.parse($(sBlock).attr('i').trim());
          for (val of sBContent) {
            $('#storeNum').append(`<option value="${val}">${val}</option>`);
          }
          // console.log($(sBContent));
          console.log(sBContent.length);
        }
      }else if(selectedBlock && selectedBlock.length==1){
        // console.log($(selectedBlock));
        let selectedBlockContent=JSON.parse(selectedBlock.attr('i').trim());
        for (val of selectedBlockContent) {
          $('#storeNum').append(`<option value="${val}">${val}</option>`);
        }
        console.log(selectedBlockContent.length);
      }

    // $('#storeNum');
        

    });
  <?php }?>
  <?php if (!empty($_smarty_tpl->tpl_vars['sitePage']->value) && in_array($_smarty_tpl->tpl_vars['sitePage']->value,array('edit_news','add_news'))) {?>
    let plOlder = 'news';
  <?php } elseif (!empty($_smarty_tpl->tpl_vars['sitePage']->value) && in_array($_smarty_tpl->tpl_vars['sitePage']->value,array('add_event','edit_event'))) {?>
    let plOlder = 'event';
  <?php } elseif (!empty($_smarty_tpl->tpl_vars['sitePage']->value) && in_array($_smarty_tpl->tpl_vars['sitePage']->value,array('newsletter'))) {?>
    let plOlder = 'newsletter';
  <?php }?>
  <?php if (!empty($_smarty_tpl->tpl_vars['sitePage']->value) && in_array($_smarty_tpl->tpl_vars['sitePage']->value,array('add_news','edit_news','newsletter'))) {?>
    // Initialize Quill editor
    let toolbarOptions = [
      ['bold', 'italic', 'underline', 'strike'],        // toggled buttons
      ['blockquote', 'code-block', 'code'],

      //[{ 'header': 1 }, { 'header': 2 }],               // custom button values
      [{ 'list': 'ordered'}, { 'list': 'bullet' }],
      [{ 'script': 'sub'}, { 'script': 'super' }],      // superscript/subscript
      [{ 'indent': '-1'}, { 'indent': '+1' }],          // outdent/indent
      [{ 'direction': 'rtl' }],                         // text direction

       //[{ 'size': ['small', false, 'large', 'huge'] }],  // custom dropdown
      // [{ 'header': [1, 2, 3, 4, 5, 6, false] }],
      [{ 'header': [4, 5, 6, false] }],

      [{ 'color': [] }, { 'background': [] }],          // dropdown with defaults from theme
      [{ 'font': [] }],
      [{ 'align': [] }],
      ['image', 'formula', 'link', 'video'], 
      ['clean']                                         // remove formatting button
    ]
    let quillOptions = {
      modules: {
        toolbar: toolbarOptions
      },
      placeholder: `Type your ${plOlder} content here...`,
      theme: 'snow'
    };
    var quill = new Quill('#editcontent', quillOptions);

    /*Event Triggerers*/
    quill.on('text-change', function(delta, oldDelta, source) {
      // if (source == 'api') {
      //   console.log("An API call triggered this change.");
      // } else if (source == 'user') {
      //   console.log("A user action triggered this change.");
      // }
      $('#content').attr('value',htmlEntities($('#editcontent .ql-editor').html()));
      // console.log($('#content').attr('value'));
    });
  <?php }?>
  <?php if (!empty($_smarty_tpl->tpl_vars['sitePage']->value) && in_array($_smarty_tpl->tpl_vars['sitePage']->value,array('edit_news','edit_event'))) {?>
    $('#editcontent .ql-editor').html(`<?php echo $_smarty_tpl->tpl_vars['news']->value->content_stripe;?>
`);
  <?php }?>
  <?php if (in_array($_smarty_tpl->tpl_vars['sitePage']->value,array('user'))) {?>
    $(document).on('click', '.payOutlet', function() {
      let pOut ={
        amount: $(this).attr('amount'),
        purpose: $(this).attr('purpose'),
        payid: $(this).attr('payid'),
        discount: $(this).attr('discount'),
      };
      console.log(pOut);
      $("#ptitle").attr('value', pOut.purpose).val(pOut.purpose);
      $("#amount").attr('value', `₦${pOut.amount}`).val(`₦${pOut.amount}`);
      $("#payid").attr('value', pOut.payid).val(pOut.payid);
      $("#discount").attr('value',`${ pOut.discount}%`).val(`${pOut.discount}%`);
    });
  <?php }?>
  $(document).on('click', '.imgPreview', function() {
    $("#imgPreviewShow").attr('src', `${$(this).attr('src')}`);
    $("#gallImgName").text(`${$(this).attr('title')}`);
  });
  $(document).on('change', '#store_owner', function() {
    let usrDetail=JSON.parse($("#store_owner option:selected").attr('i').trim());
      $("#phone_number").val(`${usrDetail.phone}`);
      $("#owner_names").val(`${usrDetail.firstname} ${usrDetail.lastname}`);
  });
  $(document).on('change', '#client_email', function() {
    let usrDetail=JSON.parse($("#client_email option:selected").attr('i').trim());
      $("#phone_number").val(`${usrDetail.phone}`);
      $("#client_names").val(`${usrDetail.firstname} ${usrDetail.lastname}`);
  });
  // $(document).on('click', '#min-det', function(){
  //   $(this).children().find('.fa-angle-down').css('-webkit-transform', 'rotate(-180deg)');
  //   $(this).children().find('.fa-angle-down').css('transform', 'rotate(-180deg)');
  // });
  /*Toggling of Menu*/
  $(document).on("click", "#openMobileMenu", function () {
    $(this).toggleClass("open");
    $('.dashboard-wrapper').toggleClass('mobile-menu-open');
  });
});
  /*Print Event Handler*/
  $(document).on('click',"#printSect", function() {
    $("#printSect").hide();
    printData('printMe', '<?php echo $_smarty_tpl->tpl_vars['Site']->value['companyName'];?>
: Manage');
    $("#printSect").show();
  });
  /*Export to Excel*/
  $(document).on('click',"#toExcel", function() {
    $("#toExcel").hide();
    exportToExcel('excelMe', '<?php echo $_smarty_tpl->tpl_vars['Site']->value['companyName'];?>
: Manage');
    $("#toExcel").show();
  });
  /*Side Menu Controller*/
  // const sideMenu = document.getElementsByClassName("side-menu-main-link");
  // let i;
  // for (i = 0; i < sideMenu.length; i++) {
  //   sideMenu[i].addEventListener("click", function(e) {
  //     e.preventDefault();
  //     const subSideMenu = this.nextElementSibling;
  //     if (subSideMenu) {
  //       if (subSideMenu.style.maxHeight) {
  //         this.classList.remove("isopened");
  //         subSideMenu.style.maxHeight = null;
  //       } else {
  //         this.classList.add("isopened");
  //         subSideMenu.style.maxHeight = subSideMenu.scrollHeight + "px";
  //       }
  //     }
  //   });
  // }
  
/* Table Navigator*/
/*  $('#dataTableId').DataTable({
    // paging: false,
    // scrollY: 400,
    // scrollX: auto,
    ordering: false
  });*/
function htmlEntities(str) {
    return String(str).replace(/&/g, '&amp;').replace(/</g, '&lt;').replace(/>/g, '&gt;').replace(/"/g, '&quot;');
}
function htmlReverseEntities(str) {
    return String(str).replace(/&quot;/g, '"').replace(/&gt;/g, '>').replace(/&lt;/g, '<').replace(/&amp;/g, '&');
    // return String(str).replace('&amp;', /&/g).replace('&lt;', '<');
}
  <?php if (!empty($_smarty_tpl->tpl_vars['sitePage']->value) && in_array($_smarty_tpl->tpl_vars['sitePage']->value,array('root','home')) && 0 == 1) {?>
    /*Statistics Scripts*/
    let dt = new Date();
    window.onload = function () {
      var chart ={ 
        <?php if (!empty($_smarty_tpl->tpl_vars['defaultDetail']->value->transProgressM)) {?>
          chart1 : new CanvasJS.Chart("chartContainer", {
            exportEnabled: true,
            animationEnabled: true,
            title:{
              text: "Monthly Transaction History"
            },
            subtitles: [{
              text: "Contains the amount and sales made"
            }], 
            axisX: {
              title: "Dates",
              valueFormatString: "DD MMM YYYY"
            },
            axisY: {
              title: "Total Transaction Amount",
              titleFontColor: "#4F81BC",
              lineColor: "#4F81BC",
              labelFontColor: "#4F81BC",
              tickColor: "#4F81BC"
            },
            axisY2: {
              title: "Total Transaction",
              titleFontColor: "#C0504E",
              lineColor: "#C0504E",
              labelFontColor: "#C0504E",
              tickColor: "#C0504E"
            },
            toolTip: {
              shared: true
            },
            legend: {
              cursor: "pointer",
              itemclick: toggleDataSeries
            },
            data: [

            {
              type: "column",
              name: "Amount",
              showInLegend: true,      
              yValueFormatString: "\"₦\"#,##0.#",
              dataPoints: [
              <?php
$_from = $_smarty_tpl->tpl_vars['defaultDetail']->value->transProgressM;
if (!is_array($_from) && !is_object($_from)) {
settype($_from, 'array');
}
$_smarty_tpl->tpl_vars['transProgressM'] = new Smarty_Variable;
$_smarty_tpl->tpl_vars['transProgressM']->_loop = false;
foreach ($_from as $_smarty_tpl->tpl_vars['transProgressM']->value) {
$_smarty_tpl->tpl_vars['transProgressM']->_loop = true;
$foreach_transProgressM_Sav = $_smarty_tpl->tpl_vars['transProgressM'];
?>
                { y: <?php echo $_smarty_tpl->tpl_vars['transProgressM']->value->amount;?>
, label: "<?php echo $_smarty_tpl->tpl_vars['transProgressM']->value->dateadded;?>
"  },
              <?php
$_smarty_tpl->tpl_vars['transProgressM'] = $foreach_transProgressM_Sav;
}
?>
              ]
            },
            {
              type: "column",
              name: "Number of Transactions",
              axisYType: "secondary",
              showInLegend: true,
              yValueFormatString: "#,##0.# Items",
              dataPoints: [
              <?php
$_from = $_smarty_tpl->tpl_vars['defaultDetail']->value->transProgressM;
if (!is_array($_from) && !is_object($_from)) {
settype($_from, 'array');
}
$_smarty_tpl->tpl_vars['transProgressM'] = new Smarty_Variable;
$_smarty_tpl->tpl_vars['transProgressM']->_loop = false;
foreach ($_from as $_smarty_tpl->tpl_vars['transProgressM']->value) {
$_smarty_tpl->tpl_vars['transProgressM']->_loop = true;
$foreach_transProgressM_Sav = $_smarty_tpl->tpl_vars['transProgressM'];
?>
                { y: <?php echo $_smarty_tpl->tpl_vars['transProgressM']->value->count;?>
, label: "<?php echo $_smarty_tpl->tpl_vars['transProgressM']->value->dateadded;?>
" },
              <?php
$_smarty_tpl->tpl_vars['transProgressM'] = $foreach_transProgressM_Sav;
}
?>
              ]
            }]
          }),
        <?php }?>
        <?php if (!empty($_smarty_tpl->tpl_vars['defaultDetail']->value->transProgressW)) {?>
          chart2 : new CanvasJS.Chart("chartContainer1", {
            exportEnabled: true,
            animationEnabled: true,
            title:{
              text: "Weekly Transaction History"
            },
            subtitles: [{
              text: "Contains the amount and sales made"
            }], 
            axisX: {
              title: "Dates",
              valueFormatString: "DD MMM YYYY"
            },
            axisY: {
              title: "Total Transaction Amount",
              titleFontColor: "#4F81BC",
              lineColor: "#4F81BC",
              labelFontColor: "#4F81BC",
              tickColor: "#4F81BC"
            },
            axisY2: {
              title: "Total Transaction",
              titleFontColor: "#C0504E",
              lineColor: "#C0504E",
              labelFontColor: "#C0504E",
              tickColor: "#C0504E"
            },
            toolTip: {
              shared: true
            },
            legend: {
              cursor: "pointer",
              itemclick: toggleDataSeries
            },
            data: [

            {
              type: "column",
              name: "Amount",
              showInLegend: true,      
              yValueFormatString: "\"₦\"#,##0.#",
              dataPoints: [
              <?php
$_from = $_smarty_tpl->tpl_vars['defaultDetail']->value->transProgressW;
if (!is_array($_from) && !is_object($_from)) {
settype($_from, 'array');
}
$_smarty_tpl->tpl_vars['transProgressW'] = new Smarty_Variable;
$_smarty_tpl->tpl_vars['transProgressW']->_loop = false;
foreach ($_from as $_smarty_tpl->tpl_vars['transProgressW']->value) {
$_smarty_tpl->tpl_vars['transProgressW']->_loop = true;
$foreach_transProgressW_Sav = $_smarty_tpl->tpl_vars['transProgressW'];
?>
                { y: <?php echo $_smarty_tpl->tpl_vars['transProgressW']->value->amount;?>
, label: "<?php echo $_smarty_tpl->tpl_vars['transProgressW']->value->dateadded;?>
"  },
              <?php
$_smarty_tpl->tpl_vars['transProgressW'] = $foreach_transProgressW_Sav;
}
?>
              ]
            },
            {
              type: "column",
              name: "Number of Transactions",
              axisYType: "secondary",
              showInLegend: true,
              yValueFormatString: "#,##0.# Items",
              dataPoints: [
              <?php
$_from = $_smarty_tpl->tpl_vars['defaultDetail']->value->transProgressW;
if (!is_array($_from) && !is_object($_from)) {
settype($_from, 'array');
}
$_smarty_tpl->tpl_vars['transProgressW'] = new Smarty_Variable;
$_smarty_tpl->tpl_vars['transProgressW']->_loop = false;
foreach ($_from as $_smarty_tpl->tpl_vars['transProgressW']->value) {
$_smarty_tpl->tpl_vars['transProgressW']->_loop = true;
$foreach_transProgressW_Sav = $_smarty_tpl->tpl_vars['transProgressW'];
?>
                { y: <?php echo $_smarty_tpl->tpl_vars['transProgressW']->value->count;?>
, label: "<?php echo $_smarty_tpl->tpl_vars['transProgressW']->value->dateadded;?>
" },
              <?php
$_smarty_tpl->tpl_vars['transProgressW'] = $foreach_transProgressW_Sav;
}
?>
              ]
            }]
          }),
        <?php }?>
         /* chart4: new CanvasJS.Chart("chartContainer4", {
          animationEnabled: true,
          exportEnabled: true,
          theme: "dark2", // "light1", "light2", "dark1", "dark2"
          title:{
            text: "Vehicle Schedule Engagement"
          },
          axisY: {
            title: "Trip Schedule"
          },
          data: [{        
            type: "column",  
            showInLegend: true, 
            legendMarkerColor: "grey",
            legendText: "Vehicles",
            dataPoints: [  
              <?php
$_from = $_smarty_tpl->tpl_vars['chartStats']->value->vehicles;
if (!is_array($_from) && !is_object($_from)) {
settype($_from, 'array');
}
$_smarty_tpl->tpl_vars['value'] = new Smarty_Variable;
$_smarty_tpl->tpl_vars['value']->_loop = false;
foreach ($_from as $_smarty_tpl->tpl_vars['value']->value) {
$_smarty_tpl->tpl_vars['value']->_loop = true;
$foreach_value_Sav = $_smarty_tpl->tpl_vars['value'];
?>
                { y: <?php echo $_smarty_tpl->tpl_vars['value']->value->engagement;?>
, label: `<?php echo $_smarty_tpl->tpl_vars['value']->value->model;?>
 (<?php echo $_smarty_tpl->tpl_vars['value']->value->vehicleid;?>
)` },
              <?php
$_smarty_tpl->tpl_vars['value'] = $foreach_value_Sav;
}
?>
            ]
          }]
        }),*/
      }
      for (chartVar in chart) {
        chart[chartVar].render();
      }
    }
    function explodePie (e) {
      if(typeof (e.dataSeries.dataPoints[e.dataPointIndex].exploded) === "undefined" || !e.dataSeries.dataPoints[e.dataPointIndex].exploded) {
        e.dataSeries.dataPoints[e.dataPointIndex].exploded = true;
      } else {
        e.dataSeries.dataPoints[e.dataPointIndex].exploded = false;
      }
      e.chart.render();

    } 
    function toggleDataSeries(e) {
      if (typeof (e.dataSeries.visible) === "undefined" || e.dataSeries.visible) {
        e.dataSeries.visible = false;
      } else {
        e.dataSeries.visible = true;
      }
      e.chart.render();
    }
  <?php }?>
<?php echo '</script'; ?>
><?php }
}
?>