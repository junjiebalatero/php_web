<?php


/****************************************************************/
/*	This theme LUNCH based on design idea of site		*/
/*			www.dinerminor.com                      */
/****************************************************************/


$thename = "Lunch";
$lnkcolor = "#336699";
$bgcolor1 = "#F6F6EB";
$bgcolor2 = "#D8D8C4";
$bgcolor3 = "#B7B78B";
$textcolor1 = "#000000";
$textcolor2 = "#000000";
$hr = 1; # 1 to have horizonal rule in comments instead of table bgcolor

function OpenTable() {
    global $bgcolor1, $bgcolor2;
    echo "<table width=\"100%\" border=\"0\" cellspacing=\"1\" cellpadding=\"0\" bgcolor=\"$bgcolor2\"><tr><td>\n";
    echo "<table width=\"100%\" border=\"0\" cellspacing=\"1\" cellpadding=\"8\" bgcolor=\"$bgcolor1\"><tr><td>\n";
}

function OpenTable2() {
    global $bgcolor1, $bgcolor2;
    echo "<table border=\"0\" cellspacing=\"1\" cellpadding=\"0\" bgcolor=\"$bgcolor2\" align=\"center\"><tr><td>\n";
    echo "<table border=\"0\" cellspacing=\"1\" cellpadding=\"8\" bgcolor=\"$bgcolor1\"><tr><td>\n";
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
	echo "<font size=\"2\">$thetext<br>$notes</font>\n";
    } else {
	if($informant != "") {
	    $boxstuff = "<a href=\"user.php?op=userinfo&amp;uname=$informant\">$informant</a> ";
	} else {
	    $boxstuff = "$anonymous ";
	}
	$boxstuff .= ""._WRITES." <i>\"$thetext\"</i> $notes\n";
	echo "<font size=\"2\">$boxstuff</font>\n";
    }
}

function themeheader() {
    global $user, $bgcolor1, $bgcolor2, $bgcolor3, $banners, $sitename;
    echo "<body bgcolor=$bgcolor1 text=\"000000\" link=\"0000ff\" vlink=\"0000ff\">";

echo ""
."<table width=\"100%\" border=\"0\" cellspacing=\"0\" cellpadding=\"0\" background=\"themes/Lunch/images/LogoMiddle.gif\">
  <tr> 
    <td rowspan=\"2\" width=\"210\"><img src=\"themes/Lunch/images/LogoLeft.gif\" width=\"210\" height=\"100\"></td>
    <td rowspan=\"2\" width=\"10\"><img src=\"themes/Lunch/images/LogoMiddle.gif\" width=\"10\" height=\"100\"></td>
    <td height=\"30\">
	<font face=\"Verdana, Arial, Helvetica, sans-serif\" size=\"5\" color=\"b7b78b\">
	<b>
	$sitename
	</b></font>
    </td>
  </tr>
  <tr> 
    <td height=\"70\">";

    if ($banners) {
	include("banners.php");
    }

echo "
    </td>
  </tr>
  <tr> 
    <td colspan=\"2\" background=\"themes/Lunch/images/MenuBack.gif\">
	<img src=\"themes/Lunch/images/LogoBottom.gif\" width=\"220\" height=\"50\"></td>
    <td align=\"right\" background=\"themes/Lunch/images/MenuBack.gif\"> 
      <table width=\"475\" border=\"0\" cellspacing=\"0\" cellpadding=\"0\">
	<tr>
	<td width=\"95\"><a href=\"index.php\"><img src=\"themes/Lunch/images/MenuHome.gif\" width=\"95\" height=\"50\" border=\"0\" alt=\""._MAIN."\"></a></td>
	<td width=\"95\"><a href=\"submit.php\"><img src=\"themes/Lunch/images/MenuYourArticle.gif\" width=\"95\" height=\"50\" border=\"0\" alt=\""._SUBMITNEWS."\"></a></td>
	<td width=\"95\"><a href=\"links.php\"><img src=\"themes/Lunch/images/MenuWWW.gif\" width=\"95\" height=\"50\" border=\"0\" alt=\""._LINKS."\"></a></td>
	<td width=\"95\"><a href=\"download.php\"><img src=\"themes/Lunch/images/MenuDownload.gif\" width=\"95\" height=\"50\" border=\"0\" alt=\""._DOWNLOADS."\"></a></td>
	<td width=\"95\"><a href=\"index.php\"><img src=\"themes/Lunch/images/MenuAbout.gif\" width=\"95\" height=\"50\" border=\"0\" alt=\"About Us\"></a></td>
	</tr>
      </table>
    </td>
  </tr>
</table>";

echo "<table border=\"0 cellpadding=\"4\" cellspacing=\"0\" width=\"100%\" align=\"center\">\n"
	."<tr><td bgcolor=$bgcolor3 height=2></td></tr>\n"
        ."<tr><td valign=\"top\" width=\"100%\">\n"
        ."<table border=\"0\" cellspacing=\"0\" cellpadding=\"2\" width=\"100%\"><tr><td valign=\"top\" width=\"150\" bgcolor=$bgcolor1>";
	blocks(left);
	echo "<img src=\"images/pix.gif\" border=\"0\" width=\"150\" height=\"1\"></td><td>&nbsp;&nbsp;</td><td width=\"100%\" valign=\"top\">";
}

function themefooter() {
    global $index, $bgcolor1, $bgcolor2, $bgcolor3;
    if ($index == 1) {
	echo "</td><td>&nbsp;&nbsp;</td><td valign=\"top\" bgcolor=$bgcolor1>";
	blocks(right);
	echo "</td>";
    }
    echo "</td></tr></table></td></tr></table>";
    footmsg();
}

function themeindex ($aid, $informant, $time, $title, $counter, $topic, $thetext, $notes, $morelink, $topicname, $topicimage, $topictext) {
    global $tipath, $anonymous, $bgcolor1, $bgcolor2, $bgcolor3;
    echo "<table border=\"0\" cellpadding=\"0\" cellspacing=\"0\" align=\"center\" bgcolor=$bgcolor3 width=\"100%\"><tr><td>"
        ."<table border=\"0\" cellpadding=\"3\" cellspacing=\"1\" width=\"100%\"><tr><td bgcolor=$bgcolor2>"
        ."<h2>$title"
	." <a href=\"search.php?query=&amp;topic=$topic&amp;author=\">($topictext)</a></h2><br>"
        ."<font size=\"1\">"
	."$time "
        ."<b>";
    formatAidHeader($aid);
    echo "</b></font></td></tr>"
	."<tr><td bgcolor=$bgcolor1>";
    FormatStory($thetext, $notes, $aid, $informant);
    echo "<br>"
        ."</td></tr><tr><td bgcolor=$bgcolor1 align=\"right\">"
        ."<font size=\"2\">$morelink</font>"
        ."</td></tr></table></td></tr></table>"
	."<br>";
}

function themearticle ($aid, $informant, $datetime, $title, $thetext, $topic, $topicname, $topicimage, $topictext) {
    global $admin, $sid, $tipath,$bgcolor1, $bgcolor2, $bgcolor3;
    if ("$aid" == "$informant") {
	echo"
	<table border=0 cellpadding=0 cellspacing=0 align=center bgcolor=$bgcolor3 width=100%><tr><td>
	<table border=0 cellpadding=3 cellspacing=1 width=100%><tr><td bgcolor=$bgcolor2>
	<h2>$title</h2><p>"._POSTEDON." $datetime";
	if ($admin) {
	    echo "&nbsp;&nbsp; $font2 [ <a href=admin.php?op=EditStory&sid=$sid>"._EDIT."</a> | <a href=admin.php?op=RemoveStory&sid=$sid>"._DELETE."</a> ]";
	}
	echo "
	<br>"._TOPIC.": <a href=search.php?query=&topic=$topic&author=>$topictext</a></p>
	</td></tr><tr><td bgcolor=$bgcolor1>
	$thetext
	</td></tr></table></td></tr></table><br>";
    } else {
	if($informant != "") $informant = "<a href=\"user.php?op=userinfo&uname=$informant\">$informant</a> ";
	else $boxstuff = "$anonymous ";
	$boxstuff .= ""._WRITES." <i>\"$thetext\"</i> $notes";
	echo "
	<table border=0 cellpadding=0 cellspacing=0 align=center bgcolor=$bgcolor3 width=100%><tr><td>
	<table border=0 cellpadding=3 cellspacing=1 width=100%><tr><td bgcolor=$bgcolor2>
	<h2>$title</b></h2><p>"._CONTRIBUTEDBY." $informant "._ON." $datetime</font>";
	if ($admin) {
	    echo "&nbsp;&nbsp; $font2 [ <a href=admin.php?op=EditStory&sid=$sid>"._EDIT."</a> | <a href=admin.php?op=RemoveStory&sid=$sid>"._DELETE."</a> ]";
	}
	echo "
	<br>"._TOPIC.": <a href=search.php?query=&topic=$topic&author=>$topictext</a></p>
	</td></tr><tr><td bgcolor=$bgcolor1>
	$thetext
	</td></tr></table></td></tr></table><br>";
    }
}

function themesidebox($title, $content) {
	global $bgcolor1, $bgcolor2, $bgcolor3;
    echo "<table border=\"0\" cellspacing=\"0\" cellpadding=\"0\" width=\"150\" bgcolor=$bgcolor3>\n"
	."<tr><td>\n"
        ."<table width=\"100%\" border=\"0\" cellspacing=\"1\" cellpadding=\"3\">\n"
	."<tr><td bgcolor=$bgcolor2>"
        ."<h3>$title</h3></td></tr><tr><td bgcolor=$bgcolor1><font size=\"2\">"
        ."$content"
	."</font></td></tr></table></td></tr></table><br>";
}

?>