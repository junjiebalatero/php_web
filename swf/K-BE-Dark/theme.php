<?php

$thename = "K-BE-Dark";
$bgcolor1 = "#FFFFFF";
$bgcolor2 = "#BDBDBD";
$bgcolor3 = "#959595";
$bgcolor4 = "#B9B9B9";
$textcolor1 = "#505050";
$textcolor2 = "#505050";

function OpenTable() {
    global $bgcolor1, $bgcolor2;
    echo "<br><br><table width=\"100%\" border=\"1\" cellspacing=\"0\" cellpadding=\"4\" bgcolor=\"$bgcolor2\"><tr><td>\n";
    echo "<table width=\"100%\" border=\"1\" cellspacing=\"0\" cellpadding=\"4\" bgcolor=\"$bgcolor1\"><tr><td>\n";
}

function OpenTable2() {
    global $bgcolor1, $bgcolor2;
    echo "<br><br><table border=\"1\" cellspacing=\"0\" cellpadding=\"4\" bgcolor=\"$bgcolor2\" align=\"center\"><tr><td>\n";
    echo "<table border=\"1\" cellspacing=\"0\" cellpadding=\"4\" bgcolor=\"$bgcolor1\"><tr><td>\n";
}

function CloseTable() {
    echo "</td></tr></table></td></tr></table>\n";
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
        echo "<font size=\"2\" face=\"Arial, Helvetica, sans-serif\">$thetext<br>$notes</font>\n";
    } else {
        if($informant != "") {
            $boxstuff = "<a href=\"user.php?op=userinfo&amp;uname=$informant\">$informant</a> ";
        } else {
            $boxstuff = "$anonymous ";
        }
        $boxstuff .= ""._WRITES." <i>\"$thetext\"</i> $notes\n";
        echo "<font size=\"2\" face=\"Arial, Helvetica, sans-serif\">$boxstuff</font>\n";
    }
}

function themeheader() {
    global $user, $username, $banners, $sitename, $cookie, $adminmail;
    cookiedecode($user);
    $username = $cookie[1];
    if ($username == "") {
        $username = "Anonymous";
    }
     echo "<script language=\"JavaScript\">
<!--
function MM_swapImgRestore() { //v3.0
  var i,x,a=document.MM_sr; for(i=0;a&&i<a.length&&(x=a[i])&&x.oSrc;i++) x.src=x.oSrc;
}

function MM_preloadImages() { //v3.0
  var d=document; if(d.images){ if(!d.MM_p) d.MM_p=new Array();
    var i,j=d.MM_p.length,a=MM_preloadImages.arguments; for(i=0; i<a.length; i++)
    if (a[i].indexOf(\"#\")!=0){ d.MM_p[j]=new Image; d.MM_p[j++].src=a[i];}}
}

function MM_findObj(n, d) { //v4.0
  var p,i,x;  if(!d) d=document; if((p=n.indexOf(\"?\"))>0&&parent.frames.length) {
    d=parent.frames[n.substring(p+1)].document; n=n.substring(0,p);}
  if(!(x=d[n])&&d.all) x=d.all[n]; for (i=0;!x&&i<d.forms.length;i++) x=d.forms[i][n];
  for(i=0;!x&&d.layers&&i<d.layers.length;i++) x=MM_findObj(n,d.layers[i].document);
  if(!x && document.getElementById) x=document.getElementById(n); return x;
}

function MM_swapImage() { //v3.0
  var i,j=0,x,a=MM_swapImage.arguments; document.MM_sr=new Array; for(i=0;i<(a.length-2);i+=3)
   if ((x=MM_findObj(a[i]))!=null){document.MM_sr[j++]=x; if(!x.oSrc) x.oSrc=x.src; x.src=a[i+2];}
}
//-->
</script>";

    echo "<body bgcolor=\"#000000\" text=\"#505050\" link=\"#FF0000\" vlink=\"#FF0000\" alink=\"#FF0000\" onLoad=\"MM_preloadImages('themes/K-BE-Dark/images/home2.gif','themes/K-BE-Dark/images/connect2.gif','themes/K-BE-Dark/images/download2.gif','themes/K-BE-Dark/images/submit2.gif','themes/K-BE-Dark/images/weblinks2.gif','themes/K-BE-Dark/images/top-list2.gif','themes/K-BE-Dark/images/contact2.gif','themes/K-BE-Dark/images/logout2.gif')\" leftmargin=\"2\" topmargin=\"2\" marginwidth=\"2\" marginheight=\"2\">";
    echo "<table width=\"100%\" border=\"0\" cellspacing=\"0\" cellpadding=\"0\">"
    ."<tr>"
    ."<td width=\"74\" nowrap height=\"49\"><a href=\"index.php\" onMouseOut=\"MM_swapImgRestore()\" onMouseOver=\"MM_swapImage('Image16','','themes/K-BE-Dark/images/home2.gif',1)\"><img name=\"Image16\" border=\"0\" src=\"themes/K-BE-Dark/images/home.gif\" width=\"74\" height=\"49\"></a></td>"
    ."<td rowspan=\"6\" width=\"30\" nowrap><IMG SRC=\"themes/K-BE-Dark/images/Spacer1.gif\" width=\"30\" height=\"8\"></td>"
    ."<td align=\"left\" rowspan=\"6\" valign=\"top\">"
    ."<table width=\"95%\" border=\"0\" cellspacing=\"0\" cellpadding=\"0\">"
    ."<tr>"
    ."<td width=\"20\" height=\"20\" nowrap><IMG SRC=\"themes/K-BE-Dark/images/corner-left.gif\" width=\"20\" height=\"20\"><IMG SRC=\"themes/K-BE-Dark/images/spacer.gif\" width=\"20\" height=\"1\"></td>"
    ."<td colspan=\"2\">"
    ."<table border=\"0\" cellspacing=\"0\" cellpadding=\"0\">"
    ."<tr>"
    ."<td bgcolor=\"#FFCC00\"><font size=\"2\" face=\"Arial, Helvetica, sans-serif\">$username, Welcome to $sitename</font></td>"
    ."<td width=\"11\" height=\"20\" nowrap><IMG SRC=\"themes/K-BE-Dark/images/corner-right.gif\" width=\"11\" height=\"20\"></td>"
    ."</tr>"
    ."</table>"
    ."</td>"
    ."</tr>"
    ."<tr>"
    ."<td rowspan=\"2\" height=\"120\" nowrap background=\"themes/K-BE-Dark/images/left.gif\"><IMG SRC=\"themes/K-BE-Dark/images/spacer.gif\" width=\"20\" height=\"1\"></td>"
    ."<td height=\"20\" background=\"themes/K-BE-Dark/images/top.gif\"><IMG SRC=\"themes/K-BE-Dark/images/spacer.gif\" width=\"1\" height=\"20\"></td>"
    ."<td width=\"20\" height=\"20\" nowrap><IMG SRC=\"themes/K-BE-Dark/images/corner-right-top.gif\" width=\"20\" height=\"20\"></td>"
    ."</tr>"
    ."<tr>"
    ."<td bgcolor=\"#FFFFFF\" width=\"100%\">"
    ."<table width=\"100%\" border=\"0\" cellspacing=\"0\" cellpadding=\"0\" height=\"100\">"
    ."<tr>"
    ."<td rowspan=\"3\"><IMG SRC=\"themes/K-BE-Dark/title.gif\" width=\"230\" height=\"100\" alt=\"Welcome to $sitename\"></td>"
    ."<td></td>"
    ."<td>"
    ."<div align=\"center\"><font size=\"1\"><u>Visit our partners</u></font></div>"
    ."</td>"
    ."</tr>"
    ."<tr>"
    ."<td width=\"20\" height=\"60\" nowrap><IMG SRC=\"themes/K-BE-Dark/images/pub.gif\" width=\"20\" height=\"60\"></td>"
    ."<td width=\"468\" height=\"60\" nowrap>";
    if ($banners) {
    include("banners.php");
}
    echo "</td>"
    ."</tr>"
    ."<tr>"
    ."<td></td>"
    ."</tr>"
    ."</table>"
    ."</td>"
    ."<td width=\"20\" height=\"100\" nowrap background=\"themes/K-BE-Dark/images/right.gif\"><IMG SRC=\"themes/K-BE-Dark/images/spacer.gif\" width=\"20\" height=\"1\"></td>"
    ."</tr>"
    ."<tr>"
    ."<td width=\"20\" height=\"20\" nowrap><IMG SRC=\"themes/K-BE-Dark/images/corner-left-bottom.gif\" width=\"20\" height=\"20\"></td>"
    ."<td background=\"themes/K-BE-Dark/images/bottom.gif\"><IMG SRC=\"themes/K-BE-Dark/images/spacer.gif\" width=\"20\" height=\"1\"></td>"
    ."<td width=\"20\" height=\"20\" nowrap><IMG SRC=\"themes/K-BE-Dark/images/corner-right-bottom.gif\" width=\"20\" height=\"20\"></td>"
    ."</tr>"
    ."</table>"
    ."<table width=\"95%\" border=\"0\" cellspacing=\"0\" cellpadding=\"0\">"
    ."<tr>"
    ."<td align=\"center\"></td>"
    ."</tr>"
    ."</table>"
    ."</td>"
    ."<td align=\"left\" rowspan=\"6\" valign=\"top\" width=\"74\" nowrap>"
    ."<table width=\"50%\" border=\"0\" cellspacing=\"0\" cellpadding=\"0\">"
    ."<tr>"
    ."<td width=\"74\"><a href=\"links.php\" onMouseOut=\"MM_swapImgRestore()\" onMouseOver=\"MM_swapImage('weblinks','','themes/K-BE-Dark/images/weblinks2.gif',1)\"><img name=\"weblinks\" border=\"0\" src=\"themes/K-BE-Dark/images/weblinks.gif\" width=\"74\" height=\"49\"></a></td>"
    ."</tr>"
    ."<tr>"
    ."<td><a href=\"top.php\" onMouseOut=\"MM_swapImgRestore()\" onMouseOver=\"MM_swapImage('top','','themes/K-BE-Dark/images/top-list2.gif',1)\"><img name=\"top\" border=\"0\" src=\"themes/K-BE-Dark/images/top-list.gif\" width=\"74\" height=\"38\"></a></td>"
    ."</tr>"
    ."<tr>"
    ."<td><a href=\"mailto:$adminmail\" onMouseOut=\"MM_swapImgRestore()\" onMouseOver=\"MM_swapImage('contact','','themes/K-BE-Dark/images/contact2.gif',1)\"><img name=\"contact\" border=\"0\" src=\"themes/K-BE-Dark/images/contact.gif\" width=\"74\" height=\"38\"></a></td>"
    ."</tr>"
    ."<tr>"
    ."<td><a href=\"user.php?op=logout\" onMouseOut=\"MM_swapImgRestore()\" onMouseOver=\"MM_swapImage('logout','','themes/K-BE-Dark/images/logout2.gif',1)\"><img name=\"logout\" border=\"0\" src=\"themes/K-BE-Dark/images/logout.gif\" width=\"74\" height=\"42\"></a></td>"
    ."</tr>"
    ."</table>"
    ."</td>"
    ."</tr>"
    ."<td width=\"74\" nowrap><a href=\"submit.php\" onMouseOut=\"MM_swapImgRestore()\" onMouseOver=\"MM_swapImage('submit','','themes/K-BE-Dark/images/submit2.gif',1)\"><img name=\"submit\" border=\"0\" src=\"themes/K-BE-Dark/images/submit.gif\" width=\"74\" height=\"38\"></a></td>"
    ."</tr>"
    ."<tr>"
    ."<td width=\"74\" nowrap><a href=\"download.php\" onMouseOut=\"MM_swapImgRestore()\" onMouseOver=\"MM_swapImage('download','','themes/K-BE-Dark/images/download2.gif',1)\"><img name=\"download\" border=\"0\" src=\"themes/K-BE-Dark/images/download.gif\" width=\"74\" height=\"38\"></a></td>"
    ."</tr>"
    ."<tr>"
    ."<td width=\"74\" nowrap><a href=\"user.php\" onMouseOut=\"MM_swapImgRestore()\" onMouseOver=\"MM_swapImage('connect','','themes/K-BE-Dark/images/connect2.gif',1)\"><img name=\"connect\" border=\"0\" src=\"themes/K-BE-Dark/images/connect.gif\" width=\"74\" height=\"42\"></a></td>"
    ."</tr>"
    ."<tr>"
    ."<td nowrap>&nbsp;</td>"
    ."</tr>"
    ."</table>";


    echo   "<table width=99% align=center cellpadding=0 cellspacing=0 border=0><tr><td valign=top rowspan=5>";

blocks(left);

echo "</td><td>&nbsp;</td><td valign=top width=100%>";
}

function themefooter() {
    global $index;
if ($index == 1) {
    echo "<td>&nbsp;</td><td valign=\"top\">";
    blocks(right);
    echo "</td>";
}
echo "</tr></table></td></tr></table><font color=FFFFFF>";
footmsg();
echo "</font>";

}

function themeindex ($aid, $informant, $time, $title, $counter, $topic, $thetext, $notes, $morelink, $topicname, $topicimage, $topictext) {
    global $tipath, $anonymous;

   echo "<table width=\"100%\" border=\"0\" cellspacing=\"0\" cellpadding=\"0\">"
   ."<tr>"
   ."<td>&nbsp;</td>"
   ."<td colspan=\"2\">"
   ."<table border=\"0\" cellspacing=\"0\" cellpadding=\"0\" align=\"center\">"
   ."<tr>"
   ."<td width=\"11\" height=\"20\" nowarp><IMG SRC=\"themes/K-BE-Dark/images/corner-left2.gif\" width=\"11\" height=\"20\"></td>"
   ."<td bgcolor=\"#FFCC00\">&nbsp;&nbsp;<font size=\"2\" face=\"Arial, Helvetica, sans-serif\"><font class=infoa><b>$title</b></font></font>&nbsp;&nbsp;</td>"
   ."<td width=\"11\" height=\"20\" nowrap><IMG SRC=\"themes/K-BE-Dark/images/corner-right.gif\" width=\"11\" height=\"20\"></td>"
   ."</tr>"
   ."</table>"
   ."</td>"
   ."<td>&nbsp;</td>"
   ."</tr>"
   ."<tr>"
   ."<td width=\"20\" height=\"20\" nowrap><IMG SRC=\"themes/K-BE-Dark/images/corner-left-top.gif\" width=\"20\" height=\"20\"></td>"
   ."<td colspan=\"2\" height=\"20\" nowrap background=\"themes/K-BE-Dark/images/top.gif\"><IMG SRC=\"themes/K-BE-Dark/images/spacer.gif\" width=\"1\" height=\"20\"></td>"
   ."<td width=\"20\" height=\"20\" nowrap><IMG SRC=\"themes/K-BE-Dark/images/corner-right-top.gif\" width=\"20\" height=\"20\"></td>"
   ."</tr>"
   ."<tr>"
   ."<td rowspan=\"3\" width=\"20\" nowrap background=\"themes/K-BE-Dark/images/left.gif\" align=\"left\"><IMG SRC=\"themes/K-BE-Dark/images/spacer.gif\" width=\"20\" height=\"1\"></td>"
   ."<td bgcolor=\"#FFFFFF\" width=\"100%\"><font size=\"1\" face=\"Arial, Helvetica, sans-serif\">"._POSTEDBY." ";
   formatAidHeader($aid);
    echo "<br>"._ON." $time $timezone ($counter "._READS.")</font><br>"
   ."</td>"
   ."<td bgcolor=\"#FFFFFF\" width=\"100%\"><b><a href=\"search.php?query=&amp;topic=$topic\"><IMG SRC=\"$tipath$topicimage\" border=\"0\" Alt=\"$topictext\" align=\"right\" hspace=\"10\" vspace=\"10\"></a></B></td>"
   ."<td rowspan=\"3\" height=\"20\" nowrap align=\"right\" background=\"themes/K-BE-Dark/images/right.gif\"><IMG SRC=\"themes/K-BE-Dark/images/spacer.gif\" width=\"20\" height=\"1\"></td>"
   ."</tr>"
   ."<tr>"
   ."<td colspan=\"2\" bgcolor=\"#FFFFFF\" width=\"100%\"><font size=\"2\" face=\"Arial, Helvetica, sans-serif\">";
   FormatStory($thetext, $notes, $aid, $informant);
    echo "</font></td>"
   ."</tr>"
   ."<tr>"
   ."<td colspan=\"2\" bgcolor=\"#FFFFFF\"><br><font size=\"2\" face=\"Arial, Helvetica, sans-serif\">$morelink</font></td>"
   ."</tr>"
   ."<tr>"
   ."<td height=\"20\" nowrap width=\"20\"><IMG SRC=\"themes/K-BE-Dark/images/corner-left-bottom.gif\" width=\"20\" height=\"20\"></td>"
   ."<td height=\"20\" nowrap colspan=\"2\" background=\"themes/K-BE-Dark/images/bottom.gif\"><IMG SRC=\"themes/K-BE-Dark/images/spacer.gif\" width=\"1\" height=\"20\"></td>"
   ."<td height=\"20\" nowrap width=\"20\"><IMG SRC=\"themes/K-BE-Dark/images/corner-right-bottom.gif\" width=\"20\" height=\"20\"></td>"
   ."</tr>"
   ."</table><br>";

}

function themearticle ($aid, $informant, $datetime, $title, $thetext, $topic, $topicname, $topicimage, $topictext) {
    global $admin, $sid, $tipath;

     echo "<table width=\"100%\" border=\"0\" cellspacing=\"0\" cellpadding=\"0\">"
   ."<tr>"
   ."<td>&nbsp;</td>"
   ."<td colspan=\"2\">"
   ."<table border=\"0\" cellspacing=\"0\" cellpadding=\"0\" align=\"center\">"
   ."<tr>"
   ."<td width=\"11\" height=\"20\" nowarp><IMG SRC=\"themes/K-BE-Dark/images/corner-left2.gif\" width=\"11\" height=\"20\"></td>"
   ."<td bgcolor=\"#FFCC00\"><font size=\"2\" face=\"Arial, Helvetica, sans-serif\">$title</font></td>"
   ."<td width=\"11\" height=\"20\" nowrap><IMG SRC=\"themes/K-BE-Dark/images/corner-right.gif\" width=\"11\" height=\"20\"></td>"
   ."</tr>"
   ."</table>"
   ."</td>"
   ."<td>&nbsp;</td>"
   ."</tr>"
   ."<tr>"
   ."<td width=\"20\" height=\"20\" nowrap><IMG SRC=\"themes/K-BE-Dark/images/corner-left-top.gif\" width=\"20\" height=\"20\"></td>"
   ."<td colspan=\"2\" height=\"20\" nowrap background=\"themes/K-BE-Dark/images/top.gif\">&nbsp;</td>"
   ."<td width=\"20\" height=\"20\" nowrap><IMG SRC=\"themes/K-BE-Dark/images/corner-right-top.gif\" width=\"20\" height=\"20\"></td>"
   ."</tr>"
   ."<tr>"
   ."<td rowspan=\"3\" width=\"20\" nowrap background=\"themes/K-BE-Dark/images/left.gif\" align=\"left\">&nbsp;</td>"
   ."<td bgcolor=\"#FFFFFF\" width=\"100%\"><font size=\"1\" face=\"Arial, Helvetica, sans-serif\">"._POSTEDON." $datetime by ";
    formatAidHeader($aid);
    if (is_admin($admin)) {
        echo "<br>[ <a href=\"admin.php?op=EditStory&amp;sid=$sid\">"._EDIT."</a> | <a href=\"admin.php?op=RemoveStory&amp;sid=$sid\">"._DELETE."</a> ]\n";
    }
    echo "</font><br>"
   ."</td>"
   ."<td bgcolor=\"#FFFFFF\"><a href=\"search.php?query=&amp;topic=$topic\"><IMG SRC=\"$tipath$topicimage\" border=\"0\" Alt=\"$topictext\" align=\"right\" hspace=\"10\" vspace=\"10\"></a></td>"
   ."<td rowspan=\"3\" height=\"20\" nowrap align=\"right\" background=\"themes/K-BE-Dark/images/right.gif\">&nbsp;</td>"
   ."</tr>"
   ."<tr>"
   ."<td colspan=\"2\" bgcolor=\"#FFFFFF\" width=\"100%\"><font size=\"2\" face=\"Arial, Helvetica, sans-serif\">";
   FormatStory($thetext, $notes="", $aid, $informant);
    echo "</font></td>"
   ."</tr>"
   ."<tr>"
   ."<td colspan=\"2\" bgcolor=\"#FFFFFF\"><font size=\"2\" face=\"Arial, Helvetica, sans-serif\">$morelink</font></td>"
   ."</tr>"
   ."<tr>"
   ."<td height=\"20\" nowrap width=\"20\"><IMG SRC=\"themes/K-BE-Dark/images/corner-left-bottom.gif\" width=\"20\" height=\"20\"></td>"
   ."<td height=\"20\" nowrap colspan=\"2\" background=\"themes/K-BE-Dark/images/bottom.gif\"><IMG SRC=\"themes/K-BE-Dark/images/spacer.gif\" width=\"100%\" height=\"20\"></td>"
   ."<td height=\"20\" nowrap width=\"20\"><IMG SRC=\"themes/K-BE-Dark/images/corner-right-bottom.gif\" width=\"20\" height=\"20\"></td>"
   ."</tr>"
   ."</table><br>";

}




function themesidebox($title, $content) {

   echo  "<table width=\"180\" border=\"0\" cellspacing=\"0\" cellpadding=\"0\">"
   ."<tr>"
   ."<td>"
   ."<table border=\"0\" cellspacing=\"0\" cellpadding=\"0\" align=\"left\">"
   ."<tr>"
   ."<td width=\"20\" height=\"20\" nowrap><IMG SRC=\"themes/K-BE-Dark/images/corner-left.gif\" width=\"20\" height=\"20\"></td>"
   ."<td bgcolor=\"#FFCC00\"><font size=\"1\" face=\"Arial, Helvetica, sans-serif\"><font class=infoa>$title</font></font></td>"
   ."<td width=\"11\" height=\"20\" background=\"themes/K-BE-Dark/images/corner-right.gif\" nowrap><IMG SRC=\"themes/K-BE-Dark/images/spacer.gif\" width=\"11\" height=\"20\"></td>"
   ."</tr>"
   ."</table>"
   ."</td>"
   ."</tr>"
   ."<tr>"
   ."<td align=\"left\" valign=\"top\">"
   ."<table width=\"100%\" border=\"0\" cellspacing=\"0\" cellpadding=\"0\">"
   ."<tr>"
   ."<td rowspan=\"2\" nowrap background=\"themes/K-BE-Dark/images/left.gif\" width=\"20\"><IMG SRC=\"themes/K-BE-Dark/images/spacer.gif\" width=\"20\" height=\"1\"></td>"
   ."<td height=\"20\" nowrap background=\"themes/K-BE-Dark/images/top.gif\">&nbsp;</td>"
   ."<td width=\"20\" nowrap><IMG SRC=\"themes/K-BE-Dark/images/corner-right-top.gif\" width=\"20\" height=\"20\"></td>"
   ."</tr>"
   ."<tr>"
   ."<td bgcolor=\"#FFFFFF\" width=\"140\" nowarp><IMG SRC=\"themes/K-BE-Dark/images/spacer.gif\" width=\"140\" height=\"1\"><br><font size=\"1\" face=\"Arial, Helvetica, sans-serif\">$content</font></td>"
   ."<td nowrap background=\"themes/K-BE-Dark/images/right.gif\"><IMG SRC=\"themes/K-BE-Dark/images/spacer.gif\" width=\"20\" height=\"1\"></td>"
   ."</tr>"
   ."<tr>"
   ."<td width=\"20\" nowrap><IMG SRC=\"themes/K-BE-Dark/images/corner-left-bottom.gif\" width=\"20\" height=\"20\"></td>"
   ."<td background=\"themes/K-BE-Dark/images/bottom.gif\">&nbsp;</td>"
   ."<td width=\"20\" height=\"20\" nowrap><IMG SRC=\"themes/K-BE-Dark/images/corner-right-bottom.gif\" width=\"20\" height=\"20\"></td>"
   ."</tr>"
   ."</table>"
   ."</td>"
   ."</tr>"
   ."</table><br>";
}

?>
