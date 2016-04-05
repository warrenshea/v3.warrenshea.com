<?php header("Expires:Mon, 31 Dec 2010 05:00:00 GMT"); ?>
<?php //PHP EMAIL SEND
$browser = getBrowser();
$os = getOS();
$srvr_remote_addr = $_SERVER['REMOTE_ADDR'];
$srvr_http_user_agent = $_SERVER['HTTP_USER_AGENT'];
$srvr_http_referer = $_SERVER['HTTP_REFERER'];
$srvr_query_string = $_SERVER['QUERY_STRING'];

ini_set('sendmail_from', 'warren.shea@bmo.com');
  
$form_name = $_GET["name"];
$form_email = $_GET["email"];
$form_subject = $_GET["subject"];
$form_message = $_GET["message"];
  
$screen_res = $_COOKIE["user_resolution"];
  
$to = "warren.shea@gmail.com";
$subject = "warrenshea.com contact - " . $form_subject;
$msg =  "<table style='font-size: 12px;font-family: courier new;'><tr><td><strong>" .
  "Name</strong></td><td>: " . $form_name . "</td></tr><tr><td><strong>" .
  "Email</strong></td><td>: " . $form_email . "</td></tr><tr><td><strong>" .
  "Subject</strong></td><td>: " . $form_subject . "</td></tr><tr><td><strong>" .
  "Message</strong></td><td>: " . $form_message . "</td></tr><tr><td colspan='2'><br /></td></tr><tr><td><strong>" .
  "User-Agent</strong></td><td>: " . $srvr_http_user_agent . "</td></tr><tr><td><strong>" .
  "OS</strong></td><td>: " . $os . "</td></tr><tr><td><strong>" .
  "Browser</strong></td><td>: " . $browser . "</td></tr><tr><td><strong>" .
  "Remote Host</strong></td><td>: " . $_SERVER['REMOTE_HOST'] . "</td></tr><tr><td><strong>" .
  "Resolution</strong></td><td>: " . $screen_res . "</td></tr><tr><td><strong>" .
  "Time</strong></td><td>: " . date("h:i:s a") . "</td></tr>" .
  "</table>";
$headers = "Content-type: text/html;";
$headers .= 'From: warren.shea@gmail.com';
//$config = "warren.shea@gmail.com";
mail("$to", "$subject", "$msg", "$headers");

function getOS() {
  $srvr_http_user_agent = $_SERVER['HTTP_USER_AGENT'];
  if (stristr($srvr_http_user_agent,"Windows NT 6.1") != false) {
    $OS = "Windows 7";
  } elseif (stristr($srvr_http_user_agent,"Windows NT 6.0") != false) {
    $OS = "Windows Vista";
  } elseif (stristr($srvr_http_user_agent,"Windows NT 5.1") != false) {
    $OS = "Windows XP";
  } elseif (stristr($srvr_http_user_agent,"Windows 98") != false) {
    $OS = "Windows 98";
  } elseif (stristr($srvr_http_user_agent,"Windows 95") != false) {
    $OS = "Windows 95";
  } elseif (stristr($srvr_http_user_agent,"Windows 3.1") != false) {
    $OS = "Windows 3.1";
  } elseif (stristr($srvr_http_user_agent,"Linux") != false) {
    $OS = "Linux";
  } elseif (stristr($srvr_http_user_agent,"Mac") != false) {
    if (stristr($srvr_http_user_agent,"iPhone") != false) {
      $OS = "iPhone";
    } elseif (stristr($srvr_http_user_agent,"iPad") != false) {
      $OS = "iPad";
    } else {
      $OS = "Mac";
    }
  } else {
    $OS = "?";
  }
  return $OS;  
}

function getBrowser() {
  $srvr_http_user_agent = $_SERVER['HTTP_USER_AGENT'];
  if (stristr($srvr_http_user_agent,"MSIE 9.0") != false) {
    $Browser = "Internet Explorer 9.0";
  } elseif (stristr($srvr_http_user_agent,"MSIE 8.0") != false) {
    $Browser = "Internet Explorer 8.0";
  } elseif (stristr($srvr_http_user_agent,"MSIE 7.0") != false) {
    $Browser = "Internet Explorer 7.0";
  } elseif (stristr($srvr_http_user_agent,"MSIE 6.0") != false) {
    $Browser = "Internet Explorer 6.0";
  } elseif (stristr($srvr_http_user_agent,"MSIE 5.5") != false) {
    $Browser = "Internet Explorer 5.5";
  } elseif (stristr($srvr_http_user_agent,"MSIE 5.0") != false) {
    $Browser = "Internet Explorer 5.0";
  } elseif (stristr($srvr_http_user_agent,"MSIE 4.0") != false) {
    $Browser = "Internet Explorer 4.0";
  } elseif (stristr($srvr_http_user_agent,"Firefox") != false) {
    $Browser = "Firefox";
  } elseif (stristr($srvr_http_user_agent,"Opera") != false) {
    $Browser = "Opera";
  } elseif (stristr($srvr_http_user_agent,"Safari") != false) {
    if (stristr($srvr_http_user_agent,"Chrome") != false) {
      $Browser = "Chrome";
    } else {
      $Browser = "Safari";
    }
  } else {
    $Browser = "?";
  }
  return $Browser;  
}
?>