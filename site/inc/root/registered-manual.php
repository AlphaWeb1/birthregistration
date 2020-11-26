<?php


$countries=getCountries();
$states=getStates('Nigeria');
if(!empty($posts->signup) and $posts->signup=='register' and $sitePage=='register'):
    $fail = '';
    $err = 0;
	if( empty($posts->center) ):
		$fail.='<p class="border border-danger p-2">Invalid Birth Center: Enter birth center</p>';
		$err++;
	endif;
	if( empty($posts->register_volume) ):
		$fail.='<p class="border border-danger p-2">Invalid Center Register Volume: Enter register volume</p>';
		$err++;
	endif;
	if( empty($posts->town) ):
		$fail.='<p class="border border-danger p-2">Invalid Center Town / Village: Enter town or village</p>';
		$err++;
	endif;
	if( empty($posts->entry_number) ):
		$fail.='<p class="border border-danger p-2">Invalid Center Entry Number: Enter birth entry number</p>';
		$err++;
	endif;
	if( empty($posts->lga) ):
		$fail.='<p class="border border-danger p-2">Invalid Center Local Government Area: Enter local government area</p>';
		$err++;
	endif;
    if( empty($posts->reg_day) || $posts->reg_day < 1 || $posts->reg_day > 31 || 
        ($posts->reg_day > date('d') && $posts->reg_month >= date('m') && $posts->reg_year >= date('y')) ):
		$fail.='<p class="border border-danger p-2">Invalid Registration Date: Enter registration day</p>';
		$err++;
	endif;
	if( empty($posts->reg_month) || $posts->reg_month < 1 || $posts->reg_month > 12 || ( $posts->reg_month > date('m') && $posts->reg_year >= date('y')) ):
		$fail.='<p class="border border-danger p-2">Invalid Registration Date: Enter registration month</p>';
		$err++;
	endif;
	if( empty($posts->reg_year) || ($posts->reg_year < 10 || $posts->reg_year > date('y'))):
		$fail.='<p class="border border-danger p-2">Invalid Registration Date: Enter registration year</p>';
		$err++;
	endif;
	if( empty($posts->state) || empty(getStates('Nigeria', $posts->state)) ):
		$fail.='<p class="border border-danger p-2">Invalid Center State: Enter birth state</p>';
		$err++;
    endif;

	if( empty($posts->child_surname) ):
		$fail.='<p class="border border-danger p-2">Invalid Child\'s Name: Enter child\'s surname</p>';
		$err++;
	endif;
	if( empty($posts->child_firstname) ):
		$fail.='<p class="border border-danger p-2">Invalid Child\'s Name: Enter child\'s name</p>';
		$err++;
	endif;
	if( empty($posts->child_other_name) ):
		$fail.='<p class="border border-danger p-2">Invalid Child\'s Name: Enter child\'s middle name</p>';
		$err++;
	endif;
	if( empty($posts->child_birth_day)  || $posts->child_birth_day < 1 || $posts->child_birth_day > 31 || 
        ($posts->child_birth_day > date('d') && $posts->child_birth_month >= date('m') && $posts->child_birth_year >= date('y')) ):
		$fail.='<p class="border border-danger p-2">Invalid Child Birth Date: Enter child\'s birth day</p>';
		$err++;
	endif;
    if( empty($posts->child_birth_month) || $posts->child_birth_month < 1 || $posts->child_birth_month > 12 || ( $posts->reg_month > date('m') 
        && $posts->child_birth_year >= date('y')) ):
		$fail.='<p class="border border-danger p-2">Invalid Child Birth Date: Enter child\'s birth month</p>';
		$err++;
	endif;
	if( empty($posts->child_birth_year) || ($posts->child_birth_year < 10 || $posts->child_birth_year > date('y'))):
		$fail.='<p class="border border-danger p-2">Invalid Child Birth Date: Enter child\'s birth year</p>';
		$err++;
	endif;
	if( empty($posts->sex) || !in_array($posts->sex, array("female", "male"))):
		$fail.='<p class="border border-danger p-2">Invalid Child Sex: select a valid sex</p>';
		$err++;
	endif;
	if( empty($posts->place_of_birth) || !in_array($posts->place_of_birth, array("hospital", "maternity home", "at home", "traditional doctor's place", "others"))):
		$fail.='<p class="border border-danger p-2">Invalid Child Birth Detail: Select a valid place of birth</p>';
		$err++;
	endif;
	if( empty($posts->town_village) ):
		$fail.='<p class="border border-danger p-2">Invalid Child\'s Birth Detail: Enterchild\'s  birth town or village</p>';
		$err++;
    endif;
    
	if( empty($posts->mother_surname) ):
		$fail.='<p class="border border-danger p-2">Invalid Mother\'s Name: Enter mother\'s surname</p>';
		$err++;
	endif;
	if( empty($posts->mother_firstname) ):
		$fail.='<p class="border border-danger p-2">Invalid Mother\'s Name: Enter mother\'s firstname</p>';
		$err++;
	endif;
	if( empty($posts->mother_place_of_residence) ):
		$fail.='<p class="border border-danger p-2">Invalid Mother\'s Detail: Enter mother\'s place of residence</p>';
		$err++;
	endif;
	if( empty($posts->mother_age) || is_nan($posts->mother_age)):
		$fail.='<p class="border border-danger p-2">Invalid Mother\'s Age: Enter mother\'s age during birth</p>';
		$err++;
	endif;
	if( empty($posts->mother_marital_status) || !in_array($posts->mother_marital_status, array("single", "married", "separated", "divorced", "widow"))):
		$fail.='<p class="border border-danger p-2">Invalid Mother\'s Marital Status: Select a valid marital status</p>';
		$err++;
	endif;
	if( empty($posts->mother_nationality) || !in_array($posts->mother_nationality, array("nigerian", "non-nigerian"))):
		$fail.='<p class="border border-danger p-2">Invalid Mother\'s Nationality: Select a valid mother\'s nationality</p>';
		$err++;
	endif;
	if( (empty($posts->mother_state) || empty(getStates('Nigeria', $posts->mother_state))) && $posts->mother_nationality == 'nigerian'):
		$fail.='<p class="border border-danger p-2">Invalid Mother\'s State: Select a valid mother\'s state</p>';
		$err++;
	endif;
	if( empty($posts->mother_ethnic) && $posts->mother_nationality == 'nigerian'):
		$fail.='<p class="border border-danger p-2">Invalid Mother\'s Ethnic: Enter mother\'s ethnic</p>';
		$err++;
	endif;
	if( empty($posts->mother_literacy)  || !in_array($posts->mother_literacy, array("literate", "illiterate"))):
		$fail.='<p class="border border-danger p-2">Invalid Mother\'s Detail: Select a avalid mother\'s literacy</p>';
		$err++;
	endif;
	if( empty($posts->mother_level_of_education) && $posts->mother_literacy == 'literate' ):
		$fail.='<p class="border border-danger p-2">Invalid Mother\'s Detail: Enter mother\'s level of education</p>';
		$err++;
	endif;
    
	if( empty($posts->father_surname) ):
		$fail.='<p class="border border-danger p-2">Invalid Father\'s Name: Enter father\'s surname</p>';
		$err++;
	endif;
	if( empty($posts->father_firstname) ):
		$fail.='<p class="border border-danger p-2">Invalid Father\'s Name: Enter father\'s firstname</p>';
		$err++;
	endif;
	if( empty($posts->father_place_of_residence) ):
		$fail.='<p class="border border-danger p-2">Invalid Father\'s Detail: Enter father\'s place of residence</p>';
		$err++;
	endif;
	if( empty($posts->father_age) || is_nan($posts->father_age)):
		$fail.='<p class="border border-danger p-2">Invalid Father\'s Age: Enter father\'s age during birth</p>';
		$err++;
	endif;
	if( empty($posts->father_marital_status) || !in_array($posts->father_marital_status, array("single", "married", "separated", "divorced", "widow"))):
		$fail.='<p class="border border-danger p-2">Invalid Father\'s Marital Status: Select a valid marital status</p>';
		$err++;
	endif;
	if( empty($posts->father_nationality) || !in_array($posts->father_nationality, array("nigerian", "non-nigerian"))):
		$fail.='<p class="border border-danger p-2">Invalid Father\'s Nationality: Select a valid father\'s nationality</p>';
		$err++;
	endif;
	if( (empty($posts->father_state) || empty(getStates('Nigeria', $posts->father_state))) && $posts->father_nationality == 'nigerian'):
		$fail.='<p class="border border-danger p-2">Invalid Father\'s State: Select a valid father\'s state</p>';
		$err++;
	endif;
	if( empty($posts->father_ethnic) && $posts->father_nationality == 'nigerian'):
		$fail.='<p class="border border-danger p-2">Invalid Father\'s Ethnic: Enter father\'s ethnic</p>';
		$err++;
	endif;
	if( empty($posts->father_literacy)  || !in_array($posts->father_literacy, array("literate", "illiterate"))):
		$fail.='<p class="border border-danger p-2">Invalid Father\'s Detail: Select a avalid father\'s literacy</p>';
		$err++;
	endif;
	if( empty($posts->father_level_of_education) && $posts->father_literacy == 'literate' ):
		$fail.='<p class="border border-danger p-2">Invalid Father\'s Detail: Enter father\'s level of education</p>';
		$err++;
	endif;
    
	if( empty($posts->informant_relationship_to_child) ):
		$fail.='<p class="border border-danger p-2">Invalid Informant\'s Relaionship: Enter informant\'s relationship</p>';
		$err++;
	endif;
	if( empty($posts->informant_surname) ):
		$fail.='<p class="border border-danger p-2">Invalid Infrmant\'s Name: Enter informant\'s surname</p>';
		$err++;
	endif;
	if( empty($posts->informant_firstname) ):
		$fail.='<p class="border border-danger p-2">Invalid Infrmant\'s Name: Enter informant\'s firstname</p>';
		$err++;
	endif;
	if( empty($posts->informant_place_of_residence) ):
		$fail.='<p class="border border-danger p-2">Invalid Informant\'s Detail: Enter informant\'s place of residence</p>';
		$err++;
	endif;
	if( empty($posts->informant_email) or !checkEmail($posts->informant_email)):
		$fail.='<p class="border border-danger p-2">Invalid Informant\'s Detail: Enter a valid informant\'s email to receive notification if approved</p>';
		$err++;
	endif;
	if( empty($posts->terms) or $posts->terms!='1'):
		$fail.='<p class="border border-danger p-2">Confirmation Is Required: kindly confirm the checkbox provided in this form that all entered detail is valid </p>';
		$err++;
	endif;

    if ($err == 0) {
		$genRefid=getToken(8).$ezDb->get_var("SELECT IFNULL((`id`+1),'1') FROM `birth_registration` ORDER BY `id` DESC LIMIT 1;");
		$ezDb->query("INSERT INTO `birth_registration` (`registration_id`, `center`, `register_volume`, `town`, `entry_number`, `lga`, `reg_day`, `reg_month`, `reg_year`, 
        `state`, `child_surname`, `child_firstname`, `child_other_name`, `child_birth_day`, `child_birth_month`, `child_birth_year`, `sex`, `place_of_birth`, `town_village`, 
        `mother_surname`, `mother_firstname`, `mother_place_of_residence`, `mother_age`, `mother_marital_status`, `mother_nationality`, 
        `mother_state`, `mother_ethnic`, `mother_literacy`, `mother_level_of_education`, `father_surname`, `father_firstname`, `father_place_of_residence`, 
        `father_age`, `father_marital_status`, `father_nationality`, `father_state`, `father_ethnic`, `father_literacy`, `father_level_of_education`, 
        `informant_relationship_to_child`, `informant_surname`, `informant_firstname`, `informant_place_of_residence`, `informant_email`, `status`, `updated_at`, `created_at`) 
        VALUES ('$genRefid', '$posts->center', '$posts->register_volume', '$posts->town', '$posts->entry_number', '$posts->lga', '$posts->reg_day', '$posts->reg_month', 
        '$posts->reg_year', '$posts->state', '$posts->child_surname', '$posts->child_firstname', '$posts->child_other_name', '$posts->child_birth_day', 
        '$posts->child_birth_month', '$posts->child_birth_year', '$posts->sex', '$posts->place_of_birth', '$posts->town_village', '$posts->mother_surname', 
        '$posts->mother_firstname', '$posts->mother_place_of_residence', '$posts->mother_age', '$posts->mother_marital_status', '$posts->mother_nationality', 
        '$posts->mother_state', '$posts->mother_ethnic', '$posts->mother_literacy', '$posts->mother_level_of_education', '$posts->father_surname', '$posts->father_firstname', 
        '$posts->father_place_of_residence', '$posts->father_age', '$posts->father_marital_status', '$posts->father_nationality', '$posts->father_state', 
        '$posts->father_ethnic', '$posts->father_literacy', '$posts->father_level_of_education', '$posts->informant_relationship_to_child', '$posts->informant_surname', 
        '$posts->informant_firstname', '$posts->informant_place_of_residence', '$posts->informant_email', '1', '$dateNow', '$dateNow');");

        require_once 'mail_success_registration.php';
        
    }else{
        $fail='<div class="alert alert-danger text-justify">
                    <i class="fa fa-warning"></i> <button type="button" class="close" data-dismiss="alert" aria-label="Close"><span aria-hidden="true">&times;</span></button>
                    <h3>Error Messages</h3><div class="alert alert-danger alert-dismissible" role="alert"> '.$fail.'</div>
                </div>';
    }

endif;


$smarty->assign("states", $states);