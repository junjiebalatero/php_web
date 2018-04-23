<?php

$thename = "Paper";
$bgcolor1 = "#006699";
$bgcolor2 = "#FFFFFF";
$bgcolor3 = "#FFCC33";
$bgcolor4 = "#FFFFCC";
$textcolor1 = "#006699";
$textcolor2 = "#000000";

function OpenTable() {
    global $bgcolor1, $bgcolor2, $bgcolor3, $bgcolor4;
    echo "<table width=\"100%\" border=\"0\" cellspacing=\"1\" cellpadding=\"0\" bgcolor=$bgcolor3><tr><td>\n";
    echo "<table width=\"100%\" border=\"0\" cellspacing=\"1\" cellpadding=\"8\" bgcolor=$bgcolor4><tr><td>\n";
}

function CloseTable() {
    echo "</td></tr></table></td></tr></table>\n";
}

function OpenTable2() {
    global $bgcolor1, $bgcolor2, $bgcolor3, $bgcolor4;
    echo "<table border=\"0\" cellspacing=\"1\" cellpadding=\"0\" bgcolor=$bgcolor3 align=\"center\"><tr><td>\n";
    echo "<table border=\"0\" cellspacing=\"1\" cellpadding=\"8\" bgcolor=$bgcolor4><tr><td>\n";
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
	$boxstuff .= ""._WRITES." <i>\"$thetext\"</i> $notes\n";
	echo "<font size=\"2\" color=\"#505050\">$boxstuff</font>\n";
    }
}

/************************************************************/
/* Function THEMEHEADER()                                   */
/************************************************************/

function themeheader() {
    global $user, $bgcolor1, $bgcolor2, $bgcolor3, $bgcolor4, $sitename, $banners;
    cookiedecode($user);
    $username = $cookie[1];
    if ($username == "") {
        $username = "Anonymous";
    }
    echo "<body bgcolor=$bgcolor1 text=\"#000000\">\n";

    echo "
<table cellpadding=\"0\" cellspacing=\"0\" width=\"90%\" border=\"0\" align=\"center\" background=\"themes/Paper/images/tp_back.gif\">
  <tr valign=\"top\"> 
    <td width=\"22\" height=\"75\"><img src=\"themes/Paper/images/tp_left_corner.gif\" width=\"22\" height=\"75\"></td>
    <td  valign=\"middle\" width=\"274\"><img src=\"themes/Paper/images/tp_name.gif\" width=\"274\" height=\"75\"></td>
    <td align=\"center\" valign=\"bottom\" background=\"themes/Paper/images/tp_back.gif\" width=100%>";

    if ($banners) {
	include("banners.php");
    }

echo "</td>
    <td width=\"22\" height=\"75\"><img src=\"themes/Paper/images/tp_right_corner.gif\" width=\"22\" height=\"75\"></td>
  </tr>
  <tr valign=\"top\"> 
    <td width=\"22\" background=\"themes/Paper/images/mp-left.gif\"><img src=\"themes/Paper/images/mp_left.gif\" width=\"22\" height=\"34\"></td>
    <td bgcolor=\"#FFFFFF\" colspan=2 valign=\"middle\"> 
      <table width=\"100%\" border=\"0\" cellspacing=\"2\" cellpadding=\"0\">
        <tr bgcolor=$bgcolor3 valign=\"bottom\" height=20> 
          <td width=\"14%\" align=\"center\"><a href=index.php>"._MAIN."</a></td>
          <td width=\"14%\" align=\"center\"><a href=submit.php>"._SUBMIT."</a></td>
          <td width=\"14%\" align=\"center\"><a href=links.php>"._LINKS."</a></td>
          <td width=\"14%\" align=\"center\"><a href=download.php>"._DOWNLOAD."</a></td>
          <td width=\"14%\" align=\"center\"><a href=faq.php>"._FAQ."</a></td>
          <td width=\"14%\" align=\"center\"><a href=user.php>"._LOGIN."</a></td>
          <td width=\"14%\" align=\"center\"><a href=index.php>about</a></td>
        </tr>
        <tr bgcolor=$bgcolor3 valign=\"middle\"> 
          <td colspan=\"7\" height=\"2\"></td>
        </tr>
      </table>
    </td>
    <td width=\"22\"><img src=\"themes/Paper/images/mp_right.gif\" width=\"22\" height=\"34\"></td>
  </tr>
</table>"
	."<table width=\"90%\" cellpadding=\"0\" cellspacing=\"0\" border=\"0\" bgcolor=\"#ffffff\" align=\"center\"><tr valign=\"top\">\n"
	."<td width=\"22\" background=\"themes/Paper/images/mp_left.gif\">"
	."<img src=\"themes/Paper/images/pixel.gif\" width=\"22\" height=\"1\" border=\"0\">"
	."</td>\n"
	."<td bgcolor=\"#ffffff\" width=\"150\" valign=\"top\">\n";
    blocks(left);
    echo "</td><td><img src=\"themes/NukeNews/images/pixel.gif\" width=\"15\" height=\"1\" border=\"0\" alt=\"\"></td><td width=\"100%\">\n";
}



/************************************************************/
/* Function THEMEFOOTER()                                   */
/************************************************************/


function themefooter() {
    global $index;
    if ($index == 1) {
	echo "</td><td><img src=\"themes/NukeNews/images/pixel.gif\" width=\"15\" height=\"1\" border=\"0\" alt=\"\"></td><td valign=\"top\" width=\"150\">\n";
	blocks(right);
    }
    echo "</td>\n"
	."<td width=22 background=\"themes/Paper/images/mp_right.gif\">"
	."<img src=\"themes/Paper/images/pixel.gif\" width=\"22\" height=\"1\" border=\"0\">"
	."</td>\n"
	."</tr></table>\n"

."
<table cellpadding=\"0\" cellspacing=\"0\" width=\"90%\" border=\"0\" align=\"center\" background=\"themes/Paper/images/tp_back.gif\">
  <tr valign=\"top\"> 
    <td width=\"22\" background=\"themes/Paper/images/tp_back.gif\"><img src=\"themes/Paper/images/bp_left_corner.gif\" width=\"22\" height=\"35\"></td>
    <td background=\"themes/Paper/images/bp_middle.gif\" valign=\"middle\" width=\"100%\">&nbsp; </td>
    <td align=\"right\" width=110 valign=\"bottom\"><img src=\"themes/Paper/images/bp_theme.gif\" width=\"110\" height=\"35\"></td>
    <td width=\"22\"><img src=\"themes/Paper/images/bp_right_corner.gif\" width=\"22\" height=\"35\"></td>
  </tr>
</table>"
	."</td></tr></table>
";

}



/************************************************************/
/* Function THEMEINDEX()                                   */
/************************************************************/

function themeindex ($aid, $informant, $time, $title, $counter, $topic, $thetext, $notes, $morelink, $topicname, $topicimage, $topictext) {
    global $tipath, $anonymous, $bgcolor1, $bgcolor2, $bgcolor3, $bgcolor4;
	$thetext = str_replace("<!-- image=", "<img src=\"images/articles/", $thetext);
	$thetext = str_replace(" -->", "\" border=\"1\" align=\"left\" hspace=\"4\" vspace=\"4\">", $thetext);

    echo "<table border=\"0\" cellpadding=\"0\" cellspacing=\"0\" align=\"center\" bgcolor=$bgcolor3 width=\"100%\"><tr><td>"
        ."<table border=\"0\" cellpadding=\"3\" cellspacing=\"1\" width=\"100%\"><tr><td bgcolor=$bgcolor3>"
        ."<h2>$title"
	." <a href=\"search.php?query=&amp;topic=$topic&amp;author=\">($topictext)</a></h2><br>"
        ."<font size=\"1\">"
	."$time "
        ."<b>";
    formatAidHeader($aid);
    echo "</b></font></td></tr>"
	."<tr><td bgcolor=$bgcolor4>";
    FormatStory($thetext, $notes, $aid, $informant);
    echo "<br>"
        ."</td></tr><tr><td bgcolor=$bgcolor2 align=\"right\">"
        ."<font size=\"2\">$morelink</font>"
        ."</td></tr></table></td></tr></table>"
	."<br>";
}


/************************************************************/
/* Function THEMEARTICLE()                                  */
/************************************************************/

function themearticle ($aid, $informant, $datetime, $title, $thetext, $topic, $topicname, $topicimage, $topictext) {
    global $admin, $sid, $tipath,$bgcolor1, $bgcolor2, $bgcolor3, $bgcolor4;
	$thetext = str_replace("<!-- image=", "<img src=\"images/articles/", $thetext);
	$thetext = str_replace(" -->", "\" border=\"1\" align=\"left\" hspace=\"4\" vspace=\"4\">", $thetext);

    if ("$aid" == "$informant") {
	echo"
	<table border=0 cellpadding=0 cellspacing=0 align=center bgcolor=$bgcolor3 width=100%><tr><td>
	<table border=0 cellpadding=3 cellspacing=1 width=100%><tr><td bgcolor=$bgcolor3
	<h2>$title</h2><p>"._POSTEDON." $datetime";
	if ($admin) {
	    echo "&nbsp;&nbsp; $font2 [ <a href=admin.php?op=EditStory&sid=$sid>"._EDIT."</a> | <a href=admin.php?op=RemoveStory&sid=$sid>"._DELETE."</a> ]";
	}
	echo "
	<br>"._TOPIC.": <a href=search.php?query=&topic=$topic&author=>$topictext</a></p>
	</td></tr><tr><td bgcolor=$bgcolor4>
	$thetext
	</td></tr></table></td></tr></table><br>";
    } else {
	if($informant != "") $informant = "<a href=\"user.php?op=userinfo&uname=$informant\">$informant</a> ";
	else $boxstuff = "$anonymous ";
	$boxstuff .= ""._WRITES." <i>\"$thetext\"</i> $notes";
	echo "
	<table border=0 cellpadding=0 cellspacing=0 align=center bgcolor=$bgcolor4 width=100%><tr><td>
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
	global $bgcolor1, $bgcolor2, $bgcolor3, $bgcolor4;
    echo "<table border=\"0\" cellpadding=\"1\" cellspacing=\"0\" bgcolor=$bgcolor3 width=\"150\"><tr><td>\n"
	."<table border=\"0\" cellpadding=\"2\" cellspacing=\"1\" bgcolor=$bgcolor4 width=\"100%\">
	<tr><td align=left bgcolor=$bgcolor3><b>$title</b></td></tr>"
	."<tr valign=\"top\"><td>\n"
	."$content\n"
	."</td></tr></table>\n"
	."</td></tr></table>\n"
	."<br>\n\n\n";
}

?>