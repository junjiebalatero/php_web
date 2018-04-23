<?php

$thename = "Kenshin";
$bgcolor1 = "#cccccc";
$bgcolor2 = "#999999";
$bgcolor3 = "#cccccc";
$textcolor1 = "#ffffff";
$textcolor2 = "#000000";

function OpenTable() {
    global $bgcolor1, $bgcolor2;

	echo "<table width=98% border=0 cellspacing=2 cellpadding=2 align=center bgcolor=#000000>"
	."<tr><td><table width=100% border=0 cellspacing=1 cellpadding=0 bgcolor=#FFFFFF><tr><td>";
}

function CloseTable() {
    echo "</td>
              </tr>
            </table>
          </td>
        </tr>
      </table>\n";
}

function OpenTable2() {
    global $bgcolor1, $bgcolor2;
    echo "<table border=\"0\" cellspacing=\"1\" cellpadding=\"0\" bgcolor=\"$bgcolor2\" align=\"center\"><tr><td>\n";
    echo "<table border=\"0\" cellspacing=\"1\" cellpadding=\"8\" bgcolor=\"$bgcolor1\"><tr><td>\n";
}

function CloseTable2() {
    echo "</td></tr></table></td></tr></table>\n";
}

function FormatStory($thetext, $notes, $aid, $informant) {
    global $anonymous;
    if ($notes != "") {
	$notes = "<b>"._NOTE."</b> <i>$notes</i>\n";
    } else {
	$notes = "";
    }
    if ("$aid" == "$informant") {
	echo "<font size=\"2\" color=\"#505050\">$thetext<br>$notes</font>\n";
    } else {
	if($informant != "") {
	    $boxstuff = "<a href=\"user.php?op=userinfo&amp;uname=$informant\">$informant</a> ";
	} else {
	    $boxstuff = "$anonymous ";
	}
	$boxstuff .= " escreveu <i>\"$thetext\"</i><br> $notes\n";
	echo "<font size=\"2\" color=\"#505050\">$boxstuff</font>\n";
    }
}

function themeheader() {

?>
<SCRIPT LANGUAGE="JavaScript">

<!--
     NS4 = (document.layers);
     IE4 = (document.all);
    ver4 = (NS4 || IE4);
   isMac = (navigator.appVersion.indexOf("Mac") != -1);
  isMenu = (NS4 || (IE4 && !isMac));
  function popUp(){return};
  function popDown(){return};
  function startIt(){return};
  if (!ver4) event = null;

  if (isMenu) {
menuVersion = 3;
menuWidth = 100;
borWid = 0;
borSty = "";
borCol = "#000000";
separator = 1;
separatorCol = "#ffffff";
fntFam = "Arial";
fntBold = true;
fntItal = false;
fntSiz = 9;
fntCol = "white";
overFnt = "black";
itemPad = 3;
backCol = "black";
overCol = "676767";
imgSrc = "themes/kenshin/images/tri.gif";
imgSiz = 10;

childOffset = 6;
childOverlap = 60;
perCentOver = null;

clickStart = false;
clickKill = false;
secondsVisible = 0.5;

keepHilite = false;
NSfontOver = false;

isFrames = false;
navFrLoc = "top";
mainFrName = "main";
  }
//-->
</SCRIPT>


<SCRIPT LANGUAGE="JavaScript1.2">
<!--
if (isMenu) {
  document.write("<SCRIPT LANGUAGE='JavaScript1.2' SRC='themes/kenshin/links.js'><\/SCRIPT>");
  document.write("<SCRIPT LANGUAGE='JavaScript1.2' SRC='themes/kenshin/topnav.js'><\/SCRIPT>");
} //--> </SCRIPT>

<?

	echo "<BODY bgcolor=#000000 leftMargin=0 topMargin=0><!--Começo do cabeçalho -->"
	."<table width=760 border=0 cellspacing=0 cellpadding=0><tr><td><img src=themes/kenshin/images/KenshinTp1.jpg width=425 height=91><img src=themes/kenshin/images/KenshinTp2.jpg width=335 height=91></td>"
	."</tr></table><table width=760 border=0 cellspacing=0 cellpadding=0>"
	."<tr><td bgcolor=#000000><table width=605 border=0 cellspacing=0
cellpadding=0><tr align=center>";
?>

<!--Menu Drop-Down -->

<td width=88 height=12>
<font size=2 face=Arial, Helvetica,sans-serif>
<a href="sections.php" onMouseOut="popDown('eMenu1')"onMouseOver="popUp('eMenu1',event)">
<font color=#FFFFFF><b>Seções</b></font></a></font></td>

<td width=88 height=12><font size=2 face=Arial, Helvetica, sans-serif>
<a href="links.php" onMouseOut="popDown('eMenu2')" onMouseOver="popUp('eMenu2',event)">
<font color=#FFFFFF><b>Links</b></font></a></font></td>

<td width=89 height=12><font size=2 face=Arial, Helvetica, sans-serif>
<a href="Reviews" onMouseOut="popDown('eMenu3')"onMouseOver="popUp('eMenu3',event)">
<font color=#FFFFFF><b>Reviews</b></font></a></font></td> 

<td width=88 height=12><font size=2 face=Arial, Helvetica, sans-serif>
<a href="#" onMouseOut="popDown('eMenu4')" onMouseOver="popUp('eMenu4',event)">
<font color=#FFFFFF><b>Outros</b></font></a></font></td>

<td width=88 height=12><font size=2 face=Arial, Helvetica, sans-serif>
<a href="#" onMouseOut="popDown('eMenu5')"onMouseOver="popUp('eMenu5',event)">
<font color=#FFFFFF><b>Sobre o Site</b></font></a></font></td>

<!--Fim do Menu Drop Down -->


<?
echo "</tr></table></td>"
."<td width=152 height=24><img src=themes/kenshin/images/KenshinTp3.jpg width=152 height=24></td></tr></table>"
."<!--Fim do Cabeçalho -->"
."<table width=760 border=1 cellspacing=0 cellpadding=0 bgcolor=#FFFFFF bordercolor=#000000>"
."<tr><td width=150 valign=top align=center>"
."<!--Começo do box lateral --><br>"; 

blocks(left); 

echo "<!--Fim do Box Lateral -->"
."<br><br></td><td valign=top align=center><!--Começo da tabela de notícias--><br>";

include("banners.php");

echo "<br>";

}

function themefooter() {

    global $index;

	echo "<!--Fim da tabela de notícias -->"
	."</td>";
    if ($index == 1) {
	echo "<td valign=\"top\" width=\"200\" align=center> <br>";
	blocks(right);
    }
    echo " </td></tr></table>";
    footmsg();
}


function themesidebox($title, $content) {

	echo "<TABLE border=0 cellPadding=2 cellSpacing=1 width=90% bgcolor=#000000><TBODY>"
	."<TR  vAlign=bottom><TD align=left class=topico valign=middle>"
	."<div align=center>$title</div></TD></TR>"
	."<TR><TD valign=top>"
	."<table width=100% border=0 bgcolor=white cellSpacing=0 cellpadding=1><tr>"
	."<td><font size=2>";
if (file_exists($content)) { 
    $fp = fopen ($content, "r"); 
    $content = fread($fp, filesize($content)); 
    fclose ($fp); 
    $content = "?>$content<?"; 
    echo eval($content); 
} else { 
    echo $content; 
} 


	echo "</font></td></tr></table></TD></TR></TBODY></TABLE><br>";
}



function themeindex ($aid, $informant, $time, $title, $counter, $topic, $thetext, $notes, $morelink, $topicname, $topicimage, $topictext) {
	global $tipath, $anonymous;
	if ("$aid" == "$informant") { 


	echo "<TABLE cellPadding=3 cellSpacing=1 width=96% bgcolor=#000000>"
	."<TBODY><TR class=topico vAlign=bottom><TD class=topicotitulo>$title</TD></TR>"
	."<TR vAlign=bottom><TD>"
	."<table width=100% border=0 cellspacing=2 cellpadding=0 bgcolor=#FFFFFF>"
	."<tr><td><b><a href=search.php?query=&topic=$topic&author=>"
	."<img src=$tipath$topicimage border=0 Alt=$topictext align=right hspace=10 vspace=10>"
	."</a></b><p class=catdesc>$thetext"
	."</p></td></tr></table><P class=catdesc>"
	."<table width=100% border=0 cellspacing=0 cellpadding=0 bgcolor=#FFFFFF>"
	."<tr><td><div align=right><font color=#000000 size=1>Postado por: <b>";
 formatAidHeader($aid);
	echo "</b><br>( Lido: $counter vezes)"
	."<br><br><p class=catdesc> $morelink <br></font></div></td></tr></table>"
	."</TD></TR></TBODY></TABLE><br>";

} else {
		if($informant != "") $boxstuff = "<a href=\"user.php?op=userinfo&uname=$informant\">$informant</a> ";
		else $boxstuff = "$anonymous ";
		$boxstuff .= "escreveu <i>\"$thetext\"</i> $notes";

	echo "<TABLE cellPadding=3 cellSpacing=1 width=96% bgcolor=#000000>"
	."<TBODY><TR class=topico vAlign=bottom><TD class=topicotitulo>$title</TD></TR>"
	."<TR vAlign=bottom><TD><table width=100% border=0 cellspacing=2 cellpadding=0 bgcolor=#FFFFFF>"
	."<tr><td><b><a href=search.php?query=&topic=$topic&author=>"
	."<img src=$tipath$topicimage border=0 Alt=$topictext align=right hspace=10 vspace=10>"
	."</a></b><p class=catdesc>$boxstuff </p> </td> </tr> </table>"
	."<P class=catdesc> <table width=100% border=0 cellspacing=0 cellpadding=0 bgcolor=#FFFFFF>"
	."<tr><td><div align=right><font color=#000000 size=1>Postado por: <b>";
formatAidHeader($aid);
	echo "</b><br>( Lido: $counter vezes)"
	."<br><br> <p class=catdesc> $morelink  <br></font></div>"
	."</td></tr></table></TD></TR></TBODY></TABLE><br>";

}
}

function themearticle ($aid, $informant, $datetime, $title, $thetext, $topic, $topicname, $topicimage, $topictext) {
	global $admin, $sid, $tipath;
	if ("$aid" == "$informant") {
	echo "<table width=96% cellpadding=5 cellspacing=0><tr valign=bottom class=topico>" 
	."<td class=topicotitulo>$font2 <b>$title</b></td></tr><tr valign=bottom >"
	."<td ><a href=search.php?query=&topic=$topic&author=>"
	."<img src=$tipath$topicimage border=0 Alt=\"$topictext\" align=right hspace=10 vspace=10></a>"
	."<p class=catdesc>$thetext<p> </td> </tr></table>";

	} else {
		if($informant != "") $informant = "<a href=\"user.php?op=userinfo&uname=$informant\">$informant</a> ";
		else $boxstuff = "$anonymous ";
		$boxstuff .= "escreveu <i>\"$thetext\"</i> $notes";
	echo "<table width=96% cellpadding=5 cellspacing=0><tr valign=bottom class=topico>" 
	."<td class=topicotitulo>$font2 <b>$title</b> $font2 Enviado por $informant</td>"
	."</tr><tr valign=bottom ><td ><a href=search.php?query=&topic=$topic&author=>"
	."<img src=$tipath$topicimage border=0 Alt=\"$topictext\" align=right hspace=10 vspace=10></a>"
	."<p class=catdesc>$boxstuff <p> </td></tr></table>";

	}
}
?>
