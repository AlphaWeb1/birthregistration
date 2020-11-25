$(document).ready(function() {
	$('[data-toggle="tooltip"]').tooltip();//Enable tooltip
	//password and confirm password checking
	$(document).on('change keyup','#dataConfPass, #dataNewPass, #cpassword, #password', function(){
		// var dataPass = document.getElementById("dataUsername");
		let dataPass=$('#dataNewPass, #password').val();
		let dataCPass=$('#dataConfPass, #cpassword').val();
		if(dataPass!='' || dataCPass!=''){
			$(".matches").html(( dataPass==dataCPass? '<i class="text-success fa fa-check-circle-o"> password matched</i>':
				'<i class="text-danger fa fa-times-circle-o"> password does not match confirm password</i>'));
		}else{
			$(".matches").empty();
		}
	});

	// load and transform upload 1 image display style
	$(document).on('change','#dataID', function(){
		$("#imgSrc").css('display','block');
		$("#imgSrc").css('width','220px');
		$("#imgSrc").css('height','220px');
		// $("#imgSrc").css('padding','10');
		$("#imgSrc").css('margin-left','2pc');
		readURL(this,"#imgSrc");
	});

	//fetch countr's state to datalist
	$(document).on('change','#dataCountry', function(){
		let dataCountry=$(this).val();
		$.post("http://localhost/ftmpcis/site/inc/general.php",{dataCountry:dataCountry, evt:'fetchAddr'}, (res, err)=>{
			const obj=JSON.parse(res);
			// console.log(obj);
			if(obj && obj.length>0){
				$("#states").empty();
				for(objects of obj){
					$("#states").append(`<option value="${objects.name}">${objects.name}`);
				}
			}
		});
	});
	//fetch state's city to datalist
	$(document).on('change','#dataState', function(){
		let dataCountry=$('#dataCountry').val();
		let dataState=$(this).val();
		$.post("http://localhost/ftmpcis/site/inc/general.php",{dataState:dataState, dataCountry:dataCountry, evt:'fetchAddr'}, (res, err)=>{
			const obj=JSON.parse(res);
			// console.log(obj);
			if(obj && obj.length>0){
				$("#cities").empty();
				for(objects of obj){
					$("#cities").append(`<option value="${objects.name}">${objects.name}`);
				}
			}
		});
	});
	
  /*Handle currency*/
    let format={lang: 'en-US', code:'NGN'};
      // console.log(formatCurrency(Number($(".spanCurrency").text()),format));
      // console.log($(".spanCurrency"));
      if ($(".spanCurrency").length && $(".spanCurrency").length>1) {
        for (spcon of $(".spanCurrency")) {
          // console.log($(spcon));console.log(spcon);
          $(spcon).text(formatCurrency(Number($(spcon).text().trim()),format));
        }
      }else{
        $(".spanCurrency").text(formatCurrency(Number($(".spanCurrency").text().trim()),format));
      }
  /*End handle currency*/
});

//generate token
let getToken=function(length) {
    //http://us1.php.net/manual/en/function.openssl-random-pseudo-bytes.php#104322
    let token = "";
    let codeAlphabet = "ABCDEFGHIJKLMNOPQRSTUVWXYZabcdefghijklmnopqrstuvwxyz0123456789+=@#$)(%-_/\\";
    for (let i = 0; i < length; i++) {
        token += codeAlphabet[Math.floor((Math.random() * 73) + 1)];
    }
    return token;
}

// image upload function
let readURL= (input, tagPointer, buttonClass=null)=> {
	let targetValue=null;
    if (input.files && input.files[0]) {
        let reader = new FileReader();
        console.log(reader);
        reader.onload = (e) =>{
        	// console.log(e.target);
        	targetValue=e.target.result;
        	if(buttonClass!=null){
	            $(buttonClass).removeClass("hidden");
	        }
            $(tagPointer).attr('src', targetValue);
        };

        reader.readAsDataURL(input.files[0]);
    }
    return targetValue;
}

//export to ms-excel
let exportToExcel=(printData, title=null)=>{
	//Get the HTML of selector
	let selector=null;
	if( document.getElementById(printData) ){
		selector =document.getElementById(printData);
	}else if( document.getElementByClassName(printData) ){
		selector =document.getElementByClassName(printData);
	}else{
		selector =document.querySelector(printData);
	}
	title=(title==null?'HFP Eastline Shopping Complex':title);
    let divElements = selector.innerHTML;

    //open in MS Excel
    let file = new Blob([divElements], {type:"application/vnd.ms-excel"}); // application/vnd.openxmlformats-officedocument.spreadsheetml.sheet | application/vnd.ms-excel
	let url = URL.createObjectURL(file);
	let a = $("<a/>", {
	href: url,  download: `${title}.xls`}).appendTo("body").get(0).click();  //xlsx | xls
}

/*$("[id$=myButtonControlID]").click(function(e) {
    window.open('data:application/vnd.ms-excel,' + encodeURIComponent( $('div[id$=divTableDataHolder]').html()));
    e.preventDefault();
});​*/

let exportToExcel2=()=>{
	var htmls = "";
    var uri = 'data:application/vnd.ms-excel;base64,';
    var template = '<html xmlns:o="urn:schemas-microsoft-com:office:office" xmlns:x="urn:schemas-microsoft-com:office:excel" xmlns="http://www.w3.org/TR/REC-html40"><head><!--[if gte mso 9]><xml><x:ExcelWorkbook><x:ExcelWorksheets><x:ExcelWorksheet><x:Name>{worksheet}</x:Name><x:WorksheetOptions><x:DisplayGridlines/></x:WorksheetOptions></x:ExcelWorksheet></x:ExcelWorksheets></x:ExcelWorkbook></xml><![endif]--></head><body><table>{table}</table></body></html>'; 
    var base64 = function(s) {
        return window.btoa(unescape(encodeURIComponent(s)))
    };

    var format = function(s, c) {
        return s.replace(/{(\w+)}/g, function(m, p) {
            return c[p];
        })
    };

    htmls = "YOUR HTML AS TABLE"

    var ctx = {
        worksheet : 'Worksheet',
        table : htmls
    }


    var link = document.createElement("a");
    link.download = "export.xls";
    link.href = uri + base64(format(template, ctx));
    link.click();
}

let fnExcelReport=()=>{
    var tab_text="<table border='2px'><tr bgcolor='#87AFC6'>";
    var textRange; var j=0;
    tab = document.getElementById('headerTable'); // id of table

    for(j = 0 ; j < tab.rows.length ; j++) 
    {     
        tab_text=tab_text+tab.rows[j].innerHTML+"</tr>";
        //tab_text=tab_text+"</tr>";
    }

    tab_text=tab_text+"</table>";
    tab_text= tab_text.replace(/<A[^>]*>|<\/A>/g, "");//remove if u want links in your table
    tab_text= tab_text.replace(/<img[^>]*>/gi,""); // remove if u want images in your table
    tab_text= tab_text.replace(/<input[^>]*>|<\/input>/gi, ""); // reomves input params

    var ua = window.navigator.userAgent;
    var msie = ua.indexOf("MSIE "); 

    if (msie > 0 || !!navigator.userAgent.match(/Trident.*rv\:11\./))      // If Internet Explorer
    {
        txtArea1.document.open("txt/html","replace");
        txtArea1.document.write(tab_text);
        txtArea1.document.close();
        txtArea1.focus(); 
        sa=txtArea1.document.execCommand("SaveAs",true,"Say Thanks to Sumit.xls");
    }  
    else                 //other browser not tested on IE 11
        sa = window.open('data:application/vnd.ms-excel,' + encodeURIComponent(tab_text));  

    return (sa);
}

//print data
let printData= (printData, title=null)=> {
	//Get the HTML of selector
	let selector=null;
	if( document.getElementById(printData) ){
		selector =document.getElementById(printData);
	}else if( document.getElementByClassName(printData) ){
		selector =document.getElementByClassName(printData);
	}else{
		selector =document.querySelector(printData);
	}
	title=(title==null?'HFP Eastline Shopping Complex':title);
    let divElements = selector.innerHTML;
    //Get the HTML of whole page
    let oldPage = document.body.innerHTML;
    //Reset the page's HTML with div's HTML only
    document.body.innerHTML = `<html>
	      <head>
	      	<title>${title}</title>
	      	<link rel="stylesheet" href="http://scog.ajahcity.com.ng/lib/common/bootstrap/css/bootstrap.min.css"/>
			<link rel="stylesheet" href="http://scog.ajahcity.com.ng/lib/common/css/style.css" type="text/css"/>
			<link rel="stylesheet" href="http://scog.ajahcity.com.ng/lib/common/font-awesome/css/font-awesome.min.css">
			<style>
			</style>
	      </head>
      	  <body>
      	  	${divElements}
			<script src="http://scog.ajahcity.com.ng/lib/common/js/jquery-3.3.1.js"></script>
			<script src="http://scog.ajahcity.com.ng/lib/common/bootstrap/js/bootstrap.min.js"></script>
			<script src="http://scog.ajahcity.com.ng/lib/common/js/script.js"></script>
      	  </body>
      </html>`;
      // console.log(document.body.innerHTML);
    //Print Page
    window.print();
    //Restore orignal HTML
    document.body.innerHTML = oldPage;
}