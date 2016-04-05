<?php header("Expires:Mon, 31 Dec 2010 05:00:00 GMT"); ?>
<?php
$page_contents = file_get_contents($_GET["url"]);
if ($_GET["type"] == "css") {
  header("Content-type: text/css");
  $page_contents = str_replace("header","#header",$page_contents);
  $page_contents = str_replace("##header","#header",$page_contents);
  $page_contents = str_replace("footer","#footer",$page_contents);
  $page_contents = str_replace("##footer","#footer",$page_contents);
  $page_contents = str_replace("content-#footer","content-footer",$page_contents);
  $page_contents = str_replace("nav","#nav",$page_contents);
  $page_contents = str_replace("##nav-text","#nav-text",$page_contents);
  $page_contents = str_replace("##nav-background","#nav-background",$page_contents);  
} else if ($_GET["type"] == "js") {
  header("Content-type: application/javascript");
  $page_contents = str_replace('$("header")','$("#header")',$page_contents);
  $page_contents = str_replace('$("nav")','$("#nav")',$page_contents);
  $page_contents = str_replace('$("footer")','$("#footer")',$page_contents);
} else if ($_GET["type"] = "xml") {
  header("Content-type: text/xml");
}
echo $page_contents;
?>