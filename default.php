<?
$srvr_http_user_agent = $_SERVER['HTTP_USER_AGENT'];
$old = false;
if ((stristr($srvr_http_user_agent,"MSIE 6.0") == true) || (stristr($srvr_http_user_agent,"MSIE 7.0") == true) || (stristr($srvr_http_user_agent,"MSIE 8.0") == true)) {
  $old = true;
}
if ($_GET["feed"] == "rss2") {
  header("Expires:Mon, 31 Dec 2010 05:00:00 GMT");
  header("Content-type: text/xml");
  $page_contents = file_get_contents("http://www.worldofwarren.com/?feed=rss2");
  echo $page_contents;
} else if ($_GET["feed"] == "comments-rss2") {
  header("Expires:Mon, 31 Dec 2010 05:00:00 GMT");
  header("Content-type: text/xml");
  $page_contents = file_get_contents("http://www.worldofwarren.com/?feed=comments-rss2");
  echo $page_contents;
} ?>
<!doctype html>
<? if ($old) {?><html><? } else { ?><html lang="en-ca"><? } echo "\n";?>
  <head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=9;IE=8;IE=7;IE=6;IE=EDGE;chrome=1">
    <meta name="revised" content="Warren Shea, 11/06/2012">
    <meta name="description" content="Warren Shea's Resume and Portfolio">
    <meta name="keywords" content="Warren Shea,Resume,Portfolio">
    <meta name="author" content="Warren Shea">
    <title>Warren Shea</title>
    <link rel="Icon" type="image/png" href="common/images/favicon.png">
    <? if ($old) {?><link rel="stylesheet" href="common/proxy.php?url=stylesheet.css&type=css"><? } else { ?><link rel="stylesheet" href="common/stylesheet.css"><? } echo "\n"; ?>
  </head>
  <body>
<? if ($old) {?>    <script>alert ('This site uses HTML5 which is not supported with the browser you are using. Some items may not function as intended. Please use a modern browser (Chrome, Firefox, Safari, Edge or Internet Explorer 11) for the full experience.');</script><? echo "\n"; ?><? } ?>
<? if ($old) {?>
    <div id="header">
      <div id="nav">
        <ul id="nav-text"></ul>
        <ul id="nav-background"></ul>
      </div>
      <div id="header-content"></div>
      <div id="title"></div>
    </div><? } else { ?>
    <header>
      <nav>
        <ul id="nav-text"></ul>
        <ul id="nav-background"></ul>
      </nav>
      <div id="header-content"></div>
      <div id="title"></div>
    </header><? } echo "\n"; ?>
    <div id="showcontent-container"></div>
    <div id="container-background"></div>
    <div id="container">
      <div id="content-container">
        <div id="primary-content"></div>
        <div id="secondary"><div id="secondary-content"></div></div>
      </div>
      <div id="content-footer"></div>
    </div>
    <? if ($old) {?><div id="footer"><div id="footer-content"></div></div><? } else { ?><footer><div id="footer-content"></div></footer><? } echo "\n"; ?>
    <? if ($old) {?><script src="common/proxy.php?url=scripts.js&type=js"></script><? } else { ?><script src="common/scripts.js"></script><? } echo "\n"; ?>
  </body>
</html>