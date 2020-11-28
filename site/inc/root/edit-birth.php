<?php 

$regId = !empty($gets->id) ? $gets->id : '';

$birth_reg = $ezDb->get_row("SELECT * FROM `birth_registration` WHERE `registration_id`= '$regId'");

if (empty($birth_reg)) {
    redirect("registered-all");
}

$countries=getCountries();
$states=getStates('Nigeria');
if(!empty($posts->edit) and $posts->edit=='edit' and $sitePage=='edit-birth'):
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
    if( empty($posts->reg_day) || $posts->reg_day < 1 || $posts->reg_day > 31 ):
		$fail.='<p class="border border-danger p-2">Invalid Registration Date: Enter registration day</p>';
		$err++;
	endif;
	if( empty($posts->reg_month) || $posts->reg_month < 1 || $posts->reg_month > 12 ):
		$fail.='<p class="border border-danger p-2">Invalid Registration Date: Enter registration month</p>';
		$err++;
	endif;
	if( empty($posts->reg_year)):
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
	if( empty($posts->child_birth_day)  || $posts->child_birth_day < 1 || $posts->child_birth_day > 31):
		$fail.='<p class="border border-danger p-2">Invalid Child Birth Date: Enter child\'s birth day</p>';
		$err++;
	endif;
    if( empty($posts->child_birth_month) || $posts->child_birth_month < 1 || $posts->child_birth_month > 12 ):
		$fail.='<p class="border border-danger p-2">Invalid Child Birth Date: Enter child\'s birth month</p>';
		$err++;
	endif;
	if( empty($posts->child_birth_year) ):
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
	if( empty($posts->father_marital_status) || !in_array($posts->father_marital_status, array("single", "married", "separated", "divorced", "widower"))):
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

    if ($err == 0) {
		$genRefid=getToken(15).$ezDb->get_var("SELECT IFNULL((`id`+1),'1') FROM `birth_registration` ORDER BY `id` DESC LIMIT 1;");
		$ezDb->query("UPDATE `birth_registration` SET  `center`='$posts->center', `register_volume`='$posts->register_volume', `town`='$posts->town', 
        `entry_number`='$posts->entry_number', `lga`='$posts->lga', `reg_day`='$posts->reg_day', `reg_month`='$posts->reg_month', `reg_year`='$posts->reg_year', 
        `state`='$posts->state', `child_surname`='$posts->child_surname', `child_firstname`='$posts->child_firstname', `child_other_name`='$posts->child_other_name', 
        `child_birth_day`='$posts->child_birth_day', `child_birth_month`='$posts->child_birth_month', `child_birth_year`='$posts->child_birth_year', `sex`='$posts->sex', 
        `place_of_birth`='$posts->place_of_birth', `town_village`='$posts->town_village', `mother_surname`='$posts->mother_surname', `mother_firstname`='$posts->mother_firstname', 
        `mother_place_of_residence`='$posts->mother_place_of_residence', `mother_age`='$posts->mother_age', `mother_marital_status`='$posts->mother_marital_status', 
        `mother_nationality`='$posts->mother_nationality', `mother_state`='$posts->mother_state', `mother_ethnic`='$posts->mother_ethnic', 
        `mother_literacy`='$posts->mother_literacy', `mother_level_of_education`='$posts->mother_level_of_education', `father_surname`='$posts->father_surname', 
        `father_firstname`='$posts->father_firstname', `father_place_of_residence`='$posts->father_place_of_residence', `father_age`='$posts->father_age', 
        `father_marital_status`='$posts->father_marital_status', `father_nationality`='$posts->father_nationality', `father_state`='$posts->father_state', 
        `father_ethnic`='$posts->father_ethnic', `father_literacy`='$posts->father_literacy', `father_level_of_education`='$posts->father_level_of_education', 
        `informant_relationship_to_child`='$posts->informant_relationship_to_child', `informant_surname`='$posts->informant_surname', 
        `informant_firstname`='$posts->informant_firstname', `informant_place_of_residence`='$posts->informant_place_of_residence', `informant_email`='$posts->informant_email', 
        `status`='$posts->status', `updated_at`='$dateNow' WHERE `registration_id`='$regId';");
        $birth_reg = $ezDb->get_row("SELECT * FROM `birth_registration` WHERE `registration_id`= '$regId'");

        require_once 'mail_success_registration.php';
        
    }else{
        $fail='<div class="alert alert-danger text-justify">
                    <i class="fa fa-warning"></i> <button type="button" class="close" data-dismiss="alert" aria-label="Close"><span aria-hidden="true">&times;</span></button>
                    <h3>Error Messages</h3><div class="alert alert-danger alert-dismissible" role="alert"> '.$fail.'</div>
                </div>';
    }

endif;

$smarty->assign('birth_reg', $birth_reg)->assign('regId', $regId)->assign('states', $states);