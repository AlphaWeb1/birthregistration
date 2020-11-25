<?php

function getSession(){
  global $Site;
  $return=null;
  if ( !empty($Site["session"]['Site']) ) {
      $return=$Site["session"];
  }else{
    @session_destroy();
  }
  return $return;
}

function setSession($value) {
  global $Site;
  $_SESSION["Site"] = $value;
  $Site["session"] = $_SESSION;
}

function sessionExists($session){
  global $ezDb,$siteName;
  $return=null;
  if( !empty($ezDb->get_var("SELECT `token` FROM `userprofile` WHERE `token`='".sha1(md5(base64_encode($session)))."';")) ):
    $return=true;
  endif;
  return $return;
}

function setCookies($name,$value=null,$second=86400){
   setcookie($name, $value, time() + ($second), "/");
}

function getCookie($name){
   $cookie=null;
   if(isset($_COOKIE[$name])):
      $cookie = $_COOKIE[$name];
      if(empty($cookie)):
         unset($_COOKIE[$name]);
         $cookie = null;
      endif;
   endif;
   return $cookie;
}

function destroyCookie($name){
   if( isset($_COOKIE[$name]) ){
      $_COOKIE[$name]="";
      setCookies($name, "", time() - 3600);
      unset($_COOKIE[$name]);
   }
}

function useIfPosted($theField, $theDefaultValue = "") {
  if (isset($_POST["$theField"])) {
      return filter_var($_POST["$theField"], FILTER_SANITIZE_STRING);
  } else {
      return $theDefaultValue;
  }
}

function useIfIntPosted($theField, $theDefaultValue = "") {
  if (isset($_POST["$theField"])) {
      return filter_var($_POST["$theField"], FILTER_SANITIZE_NUMBER_INT);
  } else {
      return $theDefaultValue;
  }
}

function useIfSent($theField, $theDefaultValue = "") {
  //works? like use_if_posted but for all post/get  form variables
  if (isset($_REQUEST["$theField"])) {
      return filter_var($_REQUEST["$theField"], FILTER_SANITIZE_STRING);
  } else {
      return $theDefaultValue;
  }
}

function useIfIntSent($theField, $theDefaultValue = "") {
  if (isset($_REQUEST["$theField"]) && $_REQUEST["$theField"] != "") {
      return filter_var($_REQUEST["$theField"], FILTER_SANITIZE_NUMBER_INT);
  } else {
      return $theDefaultValue;
  }
}

function checkEmail($email) {
   return filter_var($email, FILTER_VALIDATE_EMAIL);
}

function checkPhone($phone){
    // Alt preg_match('/^[A-z0-9_\-]+[@][A-z0-9_\-]+([.][A-z0-9_\-]+)+[A-z.]{2,4}$/', $email);
     // Allow +, - and . in phone number
     $filtered_phone_number = filter_var($phone, FILTER_SANITIZE_NUMBER_INT);
     // Remove "-" from number
     $phone_to_check = str_replace("-", "", $filtered_phone_number);
     $phone_to_check = str_replace(")", "", $phone_to_check);
     $phone_to_check = str_replace("(", "", $phone_to_check);
     // Check the lenght of number
     // This can be customized if you want phone number from a specific country
     if (strlen($phone_to_check) < 10 || strlen($phone_to_check) > 14) {
        return false;
     } else {
       return true;
     }
}
function inArray2($var, $arrayList=array()){
  $return = false;
  if (!empty($arrayList)) {
    foreach ($arrayList as $key => $arr) {
      if (in_array($var, $arr)) {
        $return = true;
      }
    }
  }

  return $return;
}

function useIfExists($filename, $actionFilename, $alternative = "", $actionAlternative = "") {
   //phase out in favour of use_if
   //echo("$filename $alternative $actionFilename $actionAlternative"); //debug
   if (file_exists($filename)) {
      //        echo("file exists, doing $actionFilename($filename)"); //debug
      $theFunction = $actionFilename;
      //        echo $theFunction.",".$filename;//debug
   } else {
      if ($alternative != "") {
         $filename = $alternative;
      }
      //        echo("doesn't exist, using alternative: $actionFilename($alternative)");//debug
      if ($actionAlternative != "") {
         $theFunction = $actionAlternative;
      }
   }
   if (isset($theFunction)) {
      $theFunction("$filename");
   }
   //    echo("$actionFilename($filename)");//debug
}

function includeIt($filename) {
  include $filename;
}

function requireIt($filename) {
  require $filename;
}

function redirect($theUrl) {
  header("Location: $theUrl");
  exit;
}

function cryptoRandSecure($min, $max) {
   //http://us1.php.net/manual/en/function.openssl-random-pseudo-bytes.php#104322
   $range = $max - $min;
   if ($range < 0) {
      return $min; // not so random...
   } $log = log($range, 2);
   $bytes = (int) ($log / 8) + 1; // length in bytes
   $bits = (int) $log + 1; // length in bits
   $filter = (int) (1 << $bits) - 1; // set all lower bits to 1
   do {
      $rnd = hexdec(bin2hex(openssl_random_pseudo_bytes($bytes)));
      $rnd = $rnd & $filter; // discard irrelevant bits
   } while ($rnd >= $range);
   return $min + $rnd;
}

function getToken($length) {
    //http://us1.php.net/manual/en/function.openssl-random-pseudo-bytes.php#104322
    $token = "";
    $codeAlphabet = "ABCDEFGHIJKLMNOPQRSTUVWXYZ";
    $codeAlphabet.= "abcdefghijklmnopqrstuvwxyz";
    $codeAlphabet.= "0123456789";
    for ($i = 0; $i < $length; $i++) {
        $token .= $codeAlphabet[cryptoRandSecure(0, strlen($codeAlphabet))];
    }
    return $token;
}

function getAToken($length) {
    //http://us1.php.net/manual/en/function.openssl-random-pseudo-bytes.php#104322
    $token = "";
    $codeAlphabet = "ABCDEFGHIJKLMNOPQRSTUVWXYZ";
    $codeAlphabet.= "abcdefghijklmnopqrstuvwxyz";
    for ($i = 0; $i < $length; $i++) {
        $token .= $codeAlphabet[cryptoRandSecure(0, strlen($codeAlphabet))];
    }
    return $token;
}

function getNToken($length) {
    //http://us1.php.net/manual/en/function.openssl-random-pseudo-bytes.php#104322
    $token = "";
    $codeAlphabet.= "0123456789";
    for ($i = 0; $i < $length; $i++) {
        $token .= $codeAlphabet[cryptoRandSecure(0, strlen($codeAlphabet))];
    }
    return $token;
}

function nl2br2($string) {
$string = str_replace(array("\r\n", "\r", "\n"), "<br/>", $string);
return $string;
}
function nl2sp2($string) {
$string = str_replace(array("\r\n", "\r", "\n"), " ", $string);
return $string;
}
function br2nl2($string) {
$string = str_replace("<br/>", "\n", $string);
return $string;
}
function tb2sp2($string) {
$string = str_replace(array("\r\t", "\r", "\t"), "  ", $string);
return $string;
}
function tb2br2($string) {
$string = str_replace(array("\r\t", "\r", "\t"), "<br/>", $string);
return $string;
}
function tb2tab2($string) {
  $string = str_replace(array("\r\t", "\r", "\t"), "    ", $string);
  return $string;
}

function testInput($data) {
  $data = trim($data);
  $data = stripslashes($data);
  $data = htmlspecialchars($data, ENT_QUOTES);
  return $data;
}
function testInputln($data) {
  $data=str_replace(array("\r\n", "\r", "\n"), "<br/>", $data);
  $data = trim($data);
  $data = stripslashes($data);
  $data = htmlspecialchars($data, ENT_QUOTES);
  return $data;
}

function testInputReverse($data) {
  $data = htmlspecialchars_decode($data, ENT_QUOTES);
  $data = stripcslashes($data);
  $data = trim($data);
  return $data;
}
function testInputReverseln($data) {
  $data = htmlspecialchars_decode($data, ENT_QUOTES);
  $data = stripcslashes($data);
  $data=str_replace("<br/>", "\n", $data);
  $data = trim($data);
  return $data;
}

function stripeInput($content){
  $content_stripe=str_replace("<", "&lt;", $content);
  $content_stripe=str_replace(">", "&gt;", $content_stripe);
}
function stripeInputReverse($content){
  $content_stripe=str_replace("&lt;", "<", $content);
  $content_stripe=str_replace("&gt;", ">", $content_stripe);
  return $content_stripe;
}

function slugTitle($content){
  $content= str_replace(" ", "-", testInputln($content));
  $content= str_replace("\"", "-", testInputln($content));
  $content= strtolower(str_replace("'", "-", testInputln($content)));
  return $content;
}

// smarty display function;

function emmitData($template){
  global $smarty, $Tempemmiter;
  if ($Tempemmiter!==true and !empty($smarty) and is_object($smarty)) {
    $template="$template.html";
    if ($smarty->templateExists($template)==true) {
      $smarty->display($template);
    } elseif($smarty->templateExists($template)==false){
        $smarty->display("default.html");
    }
  }else{
    if (!empty(trim($template))) {
      echo $template;
    }
  }
   
}

//logout control
function logoutUser($page="login"){
  global $Site;
  unset($Site["session"]["User"]);
  unset($Site["session"]['Site']["Page"]);
  $_SESSION=$Site["session"];
  redirect("$page");
}

// login authentication function
function loginUser(){
  global $ezDb, $siteName, $dashboard, $admin, $smarty, $Site, $domainName, $siteProtocol, $sitePage;
  $userName=$Site["post"]['dataUsername'];
  $password=$Site["post"]['dataPass'];
  $userType= ($sitePage=="admin"? 'admin': 'client');
  $data=$ezDb->get_row("SELECT `password`,`username` FROM `userprofile` WHERE (`username`='$userName' OR `email`='$userName') AND `usertype`='$userType' AND `verified`='1';");
  if( !empty($data) && is_object($data) ){
    if( $data->password==base64_encode($password) ){
      $Site["session"]['User'][$userType]['Token'] = getToken(6);
      $ezDb->query("UPDATE `userprofile` SET `token`='".sha1(md5(base64_encode($Site["session"]["User"][$userType]["Token"])))."' WHERE `username`='$data->username';");
      $Site["session"]["User"]["Username"]=$data->username;
      $Site["session"]['Site']["Page"]= ($sitePage=="admin"? $admin: $dashboard);
      if($Site["session"]['Site']["Page"]==$dashboard){
        logVisit($data->username);
      }else{
        logEvent($data->username, '', 'Login', '');
      }
      $_SESSION=$Site["session"];
      return true;
    }else{
      $smarty->assign("fail",'Invalid username or password!');
      return false;
    }
  }else{
    $smarty->assign("fail",'Invalid username or password!');
    return false;
  }
}

//true logics
/*Latest Real Functions*/
// Delete Directory and Files
function deleteDirAndFilesInIt($target) {
  if(file_exists($target) and is_dir($target)){
      $files = glob( $target . '*', GLOB_MARK ); //GLOB_MARK adds a slash to directories returned
      foreach( $files as $file ){
        deleteDirAndFilesInIt( $file );      
      }
      if (file_exists($target) and is_dir($target)) {
        rmdir( $target );
      }
      return true;
  } elseif(file_exists($target) and is_file($target)){
    unlink( $target );
    return true;  
  }else{
    return false;
  }
}

//user user information functions
function userInfo($username=null) {
  global $ezDb, $Site, $smarty;
  $username = ( !empty($username)? $username: (!empty($Site["session"]["User"]["Username"])?$Site["session"]["User"]["Username"]:"") );

  $return =$ezDb->get_row("SELECT * FROM `userprofile` WHERE `username`='$username' OR `email`='$username';");

  if( !empty($return) and empty($username)){
    if( !empty($Site["session"]["User"]) ){
      // $return->profiledocs=json_decode($return->profiledocs);
      $return->initials= ucfirst( substr($return->firstname, 0,1) ) ."". ucfirst( substr($return->lastname, 0,1) );
      $Site["session"]["User"]["userinfo"] = $return;
    }
  }
  return $return;
}

function dateDifference($lowerDate, $laterDate){
  $datetime1 = new DateTime($lowerDate);
  $datetime2 = new DateTime($laterDate);
  $return = $datetime1->diff($datetime2);
  $return = dateDiffToNum($return);
  // error_log(json_encode($return));
  return $return;
}
function dateDiffToNum($date,$property='min')
{
  // to be improved
  switch ($property) {
    case 'min':
      $date->min= (($date->d * 24 * 60)+ ($date->h * 60)+ ($date->i)+ ($date->m * 60)+ ($date->y * 60));
      break;
    
    default:
       $date->min= (($date->d * 24 * 60)+ ($date->h * 60)+ ($date->i)+ ($date->m * 60 * 24 * 28)+ ($date->y * 60 * 24 * 365));
      break;
  }
  // {"y":0,"m":0,"d":11,"h":7,"i":11,"s":0,"weekday":0,"weekday_behavior":0,"first_last_day_of":0,"invert":0,"days":11,"special_type":0,"special_amount":0,"have_weekday_relative":0,"have_special_relative":0}

  return $date;
}

/*Project Functions*/
function getCourseIN($value=array()){
  $ret="";
  if (is_array($value) and !empty($value)) {
    foreach ($value as $key => $val) {
      $ret.=($key==0 ?"'$val'" :", '$val'");
    }
    $ret="WHERE `courseid` IN($ret)";
  }
  return $ret;
}

function getQuestions($courseid){
  global $ezDb;
  $questions=$ezDb->get_results("SELECT * FROM `questions` WHERE `courseid`='$courseid';");
    if (!empty($questions)):
      foreach ($questions as $key => $question) :
        $questions[$key]->options=@json_decode($question->options);
      endforeach;
    endif;
  return $questions;
}
function getRandomQuestion($questions, $searchArray){
  do{
    $randVal=rand(0, count($questions)-1);
  }while(in_array($randVal, $searchArray));
  return array($questions[$randVal], $randVal);
}

function secToHMS($seconds) {
  $hours = floor($seconds / 3600);
  $minutes = floor(($seconds / 60) % 60);
  $seconds = $seconds % 60;
  $hours=(strlen($hours)==1?"0":"").$hours;
  $minutes=(strlen($minutes)==1?"0":"").$minutes;
  $seconds=(strlen($seconds)==1?"0":"").$seconds;
  return array("hh"=> $hours, "mm"=> $minutes, "ss"=> $seconds);
}

function getExamTiming(){
  global $sessions, $Site, $posts, $ezDb, $dateNow, $siteProtocol, $domainName;
  $assessment=$ezDb->get_row("SELECT *, TIMESTAMPDIFF(SECOND, `startdate`, '$dateNow') AS `attempttime` FROM `attempt` WHERE `regid`='".$sessions->assessment['regid']."' AND `courseid`='".$sessions->assessment['courseid']."' AND `user`='".$sessions->assessment['user']."'");
  $assessment->usedtime=$assessment->attempttime;
  $ezDb->query("UPDATE `attempt` SET `usedtime`='$assessment->usedtime' WHERE `id`='$assessment->id'");
  if (($assessment->settime+5) <= $assessment->attempttime) {
    $assessment->submitstatus='toresult';
    $ezDb->query("UPDATE `attempt` SET `submitstatus`='$assessment->submitstatus', `enddate`='$dateNow' WHERE `regid`='".$sessions->assessment['regid']."' AND `courseid`='".$sessions->assessment['courseid']."' AND `user`='".$sessions->assessment['user']."'");
    if (empty($ezDb->get_var("SELECT `regid` FROM `results` WHERE `regid`='".$sessions->assessment['regid']."' AND `courseid`='".$sessions->assessment['courseid']."' AND `user`='".$sessions->assessment['user']."' AND `examtype`='".$sessions->assessment['examtype']."'")) ) {
      $ezDb->query("INSERT INTO `results` (`regid`, `courseid`, `totalquestions`, `score`, `datetaken`, `examtype`, `user`, `expectedduration`, `usedduration`) VALUES ('$assessment->regid', '$assessment->courseid', '$assessment->attainable', '$assessment->score', '$assessment->startdate', '".$sessions->assessment['examtype']."', '$assessment->user', '$assessment->settime', '".($assessment->usedtime-5)."')");
      unset($Site["session"]['assessment']);
      $_SESSION= $Site["session"];
    }
    redirect("$siteProtocol"."$domainName/dashboard/exam?type=".$sessions->assessment['examtype']."&course=".$sessions->assessment['courseid']."&regid=".$sessions->assessment['regid']."&page=intro");
    exit;
    $assessment->remains=array("hh"=> "00", "mm"=> "00", "ss"=> "00");
  }else{
    $assessment->remains=secToHMS(($assessment->settime-$assessment->usedtime));
  }
  return $assessment->remains;
}

function attachAnswers($answers, $questions){
  if (is_array($answers)) {
    foreach ($answers as $kee => $value) {
      $questions[$value->key]->choice=$value->answer;
    }
  }
  return $questions;
}

function generateScore($answers, $questions){
  $score=0;
  if (is_array($answers)) {
    foreach ($answers as $kee => $value) {
      if (array_key_exists($value->key, $questions) and ($questions[$value->key]->answer == $value->answer)) {
        $score++;
      }
    }
  }
  return $score;
}

function answerExists($answers, $qid){
  $return=-1;
  if (is_array($answers)) {
    foreach ($answers as $kee => $value) {
      if ($value->key==$qid) {
        $return=$kee;
        break;
      }
    }
  }
  return $return;
}


/*End Project Functions*/

function optimizeJSON($variable){
  $variable=json_encode($variable);
  $variable=str_replace('""', '', $variable);
  $variable=rtrim($variable,'"');
  $variable=ltrim($variable,'"');
  return $variable;
}

/*End Latest Real Function*/

// return system settings
function getSettings($field=null){
  global $ezDb;
  $return=false;
  if(empty($field)){
    $return=$ezDb->get_row("SELECT * FROM `settings`;");
    if (!empty($return)) {
      foreach ($return as $key=>$value) {
        if ($key=='id' || $key=='updated') {
          continue;
        }
        $return->$key=json_decode($value);
      }
    }
  }else{
    $return=$ezDb->get_var("SELECT `$field` FROM `settings`;");
    $return=json_decode($return);
  }
  return $return;
}

//return all stored countries in database
function getCountries($id=null){
  global $ezDb, $siteName, $Site;
  $filter=( !empty($id)? "WHERE (`id`='$id' OR `name`='$id')" : "");
  return $ezDb->get_results("SELECT * FROM `countries` $filter ORDER BY `name` ASC;");
}

function getStates($cid=null,$id=null){
  global $ezDb, $siteName, $Site;
  if (empty(trim($cid))) {
    $cid=1;
  }
  $filter=( !empty($cid)? "AND (`cn`.`id`='$cid' OR `cn`.`name`='$cid')": ""). (!empty($id)? " AND (`st`.`id`='$id' OR `st`.`name`='$id')": "");
  return $ezDb->get_results("SELECT `st`.`id`, `st`.`name`, `st`.`country_id` FROM `states` AS `st`, `countries` AS `cn` WHERE `st`.`country_id`=`cn`.`id` $filter ORDER BY `st`.`name` ASC;");
}

function getCities($sid=null,$id=null){
  global $ezDb, $siteName, $Site;
  if (empty(trim($sid))) {
    $sid=1;
  }
  $filter=( !empty($sid)? "AND (`st`.`id`='$sid' OR `st`.`name`='$sid')": ""). (!empty($id)? " AND (`ct`.`id`='$id' OR `ct`.`name`='$id')": "");
  return $ezDb->get_results("SELECT `ct`.`id`, `ct`.`name`, `ct`.`state_id` FROM `cities` AS `ct`, `states` AS `st` WHERE `ct`.`state_id`=`st`.`id` $filter ORDER BY `ct`.`name` ASC;");
}

//Function for Security Token Generation
function generateSecurityToken(){
  global $ezDb, $siteName, $companyName, $sitePage, $Site;
  $dateNow=date("Y-m-d H:i:s");
  $eol = "\r\n";
  $headers = "From: Lawcon <admin@cityhoppers.com.ng>" . $eol;
  $headers .= "Organisation: $companyName" . $eol;
  $headers .= "MIME-Version: 1.0" . $eol;
  $headers .= "Content-Transfer-Encoding: 7bit" . $eol;
  $prefix="";
  $user = base64_encode($Site["session"]["User"]["Username"]);
  $user_email = base64_decode($ezDb->get_var("SELECT `email` FROM `userprofile` WHERE `username`='$user'"));
  $sec_token = $prefix.getToken(20);
  $the_subject = "Security Token Request";
  $the_message = "Token: $eol $eol $sec_token";
  if ($ezDb->query("UPDATE `userprofile` SET `recKey`='$sec_token', `recDate`='$dateNow' WHERE `username`='$user' AND `active`='1' AND `verified`='1'")):
    if (mail($user_email, $the_subject, $the_message, $headers)):
      return 'Security token has been successfully sent to your email';
    else:
      return 'There is a problem sending a security token to your email';
    endif;
  endif;
}
function nullifySecurityToken(){
  global $ezDb, $siteName, $companyName, $sitePage, $Site;
  $user = base64_encode($Site["session"]["User"]["Username"]);
  $ezDb->query("UPDATE `userprofile` SET `recKey`=NULL WHERE `username`='$user' AND `active`='1' AND `verified`='1'");
}
//log visit
function logVisit($username){
  global $ezDb, $siteName, $Site;
  
}

//Log admin Events
function logEvent($username, $tablename, $type, $content=''){
  global $ezDb, $siteName, $remoteIP, $Site;
  
}

// Get the real extension of a file.
function getMime($file) {
  if (function_exists("finfo_file")) {
    $finfo = finfo_open(FILEINFO_MIME_TYPE); // return mime type ala mimetype extension
    $mime = finfo_file($finfo, $file);
    finfo_close($finfo);
    return $mime;
  } else if (function_exists("mime_content_type")) {
    return mime_content_type($file);
  } else if (!stristr(ini_get("disable_functions"), "shell_exec")) {
    // http://stackoverflow.com/a/134930/1593459
    $file = escapeshellarg($file);
    $mime = shell_exec("file -bi " . $file);
    return $mime;
  } else {
    return false;
  }
}

function tableRoutine($tablename, $fields, $where, $order, $orderBy="DESC", $defField="`id`", $entryDefault="5"){
  global $dateNow, $gets, $smarty, $ezDb;

  if ( strpos($tablename, '`')===FALSE ) {
    $tablename="`$tablename`";
  }

  $gets->search=(empty($gets->search)? "": $gets->search);
  $filter=" ";
  if(!empty($gets->search) and !empty($columns=$ezDb->get_row("SELECT * FROM $tablename LIMIT 1")) ){
    $cnter=0;
    foreach ($columns as $key => $value) {
      if (strtolower($key)=='id') {
        continue;
      }
      $filter.=($cnter==0? "`$key` LIKE '%$gets->search%' ": "OR `$key` LIKE '%$gets->search%' ");
      $cnter++;
    }
    $where=(empty(trim($where))? "WHERE ($filter)": "WHERE $where AND ($filter)");
  }else{
    $where=(empty(trim($where))? "": "WHERE $where");
  }
  $order=(empty($order)? "": "ORDER BY $order $orderBy");

  $gets->totalRecs=$ezDb->get_var("SELECT COUNT($defField) FROM $tablename $where;");
  $gets->entry=((empty($gets->entry) or !is_numeric($gets->entry) or $gets->entry<5)? $entryDefault : $gets->entry);
  $totalPages=($gets->entry>=$gets->totalRecs? 1: ($gets->totalRecs/$gets->entry) );
  $totalPagesArray=explode(".", "$totalPages");
  $gets->totalPages=(count($totalPagesArray)>1? $totalPagesArray[0]+1: $totalPages);

  $gets->page=((empty($gets->page) or $gets->page<0 or $gets->page > $gets->totalPages)? "1": $gets->page);
  if ( ( $gets->page * $gets->entry ) > $gets->totalRecs ) {
    // $gets->from= (( $gets->page * $gets->entry ) % $gets->totalRecs);
    $gets->from=  ($gets->page-1) * $gets->entry ;
    $gets->to= $gets->totalRecs;
  }elseif( ( $gets->page * $gets->entry ) <= ($gets->totalRecs) ){
    $gets->from=($gets->page-1) * $gets->entry;
    $gets->to= ($gets->page * $gets->entry );
  }
  // error_log("SELECT $fields FROM $tablename $where $order LIMIT $gets->from, $gets->entry;");

  $ret=$ezDb->get_results("SELECT $fields FROM $tablename $where $order LIMIT $gets->from, $gets->entry;");
  $smarty->assign("Pager", $gets)->assign("countStarted", $gets->from+1);
  return $ret;
}

/*Generating Schedule Routine*/
function routineCode(){
  global $ezDb, $dateNow;
  
}