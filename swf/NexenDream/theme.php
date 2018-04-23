<?php


/****************************************************************/
/*	This theme NEXENDREAM based on design idea of site		*/
/*			www.NEXEN.net                      */
/****************************************************************/


$thename = "Lunch";
$lnkcolor = "#990000";
$bgcolor1 = "#FFCC66";
$bgcolor2 = "#FFFFFF";
$bgcolor3 = "#3399CC";
$bgcolor4 = "#000000";
$textcolor1 = "#000000";
$textcolor2 = "#000000";
$hr = 1; # 1 to have horizonal rule in comments instead of table bgcolor

function OpenTable() {
    global $bgcolor1, $bgcolor4;
    echo "<table width=\"100%\" border=\"0\" cellspacing=\"1\" cellpadding=\"0\" bgcolor=\"$bgcolor4\"><tr><td>\n";
    echo "<table width=\"100%\" border=\"0\" cellspacing=\"1\" cellpadding=\"8\" bgcolor=\"$bgcolor1\"><tr><td>\n";
}

function OpenTable2() {
    global $bgcolor1, $bgcolor4;
    echo "<table border=\"0\" cellspacing=\"1\" cellpadding=\"0\" bgcolor=\"$bgcolor4\" align=\"center\"><tr><td>\n";
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
    global $user, $bgcolor1, $bgcolor2, $bgcolor3, $bgcolor4, $banners, $sitename;
    echo "<BODY bgColor=$bgcolor3 leftMargin=0 topMargin=0 marginheight=\"0\" marginwidth=\"0\">";

echo ""
."<table width=\"750\" border=\"0\" cellspacing=\"0\" cellpadding=\"0\" align=\"center\">
    <tr> 
      <td rowspan=\"2\"><img src=\"themes/NexenDream/images/Nexenleft_r1_c1.gif\" width=\"281\" height=\"150\"></td>
      <td height=\"95\" bgcolor=$bgcolor3>";

    if ($banners) {
	include("banners.php");
    }

echo "
</td>
    </tr>
    <tr> 
      <td><img src=\"themes/NexenDream/images/Nexenleft_r2_c2.gif\" width=\"469\" height=\"55\" usemap=\"#map\" border=\"0\"></td>
    </tr>
    <trbgcolor=$bgcolor4><td colspan=\"2\" height=\"1\"></td></tr>
    <tr bgcolor=$bgcolor4> 
      <td colspan=\"2\">
        <table width=\"100%\" border=\"0\" cellspacing=\"1\" cellpadding=\"1\">
          <tr bgcolor=$bgcolor1> 
            <td align=\"center\" width=\"20%\"> 
              <a href=\"index.php\">"._MAIN."</a>
            </td>
            <td align=\"center\" width=\"20%\"> 
              <a href=\"submit.php\">"._SUBMIT."</a>
            </td>
            <td align=\"center\"> 
              <a href=\"links.php\" width=\"20%\">"._LINKS."</a>
            </td>
            <td align=\"center\"> 
              <a href=\"download.php\" width=\"20%\">"._DOWNLOAD."</a>
            </td>
            <td align=\"center\" width=\"20%\"> 
              <a href=\"index.php\">about</a>
            </td>
          </tr>
        </table>
      </td>
    </tr>
    <tr><td height=\"1\"></td></tr>
  </table>
";

echo "<table width=\"750\" border=\"0\" cellspacing=\"0\" cellpadding=\"1\" bgcolor=$bgcolor4 align=\"center\">\n"
        ."<tr><td valign=\"top\">\n"
        ."<table border=\"0\" cellspacing=\"0\" cellpadding=\"1\" width=\"100%\" bgcolor=$bgcolor3>
        <tr><td valign=\"top\" width=\"150\">";
	blocks(left);
	echo "</td><td width=\"100%\" valign=\"top\">";
}

function themefooter() {
    global $index, $bgcolor1, $bgcolor2, $bgcolor3;
    if ($index == 1) {
	echo "</td><td valign=\"top\" bgcolor=$bgcolor4>";
	blocks(right);
	echo "</td>";
    }
    echo "</td></tr>
</table></td></tr></tr></table><table width=750 align=center>
    <tr> 
      <td bgcolor=\"#3399CC\"><img src=\"themes/NexenDream/images/NexenTableBottom.gif\" width=\"748\" height=\"15\"></td>
    </tr>
</table>";
    footmsg();
}

function themeindex ($aid, $informant, $time, $title, $counter, $topic, $thetext, $notes, $morelink, $topicname, $topicimage, $topictext) {
    global $tipath, $anonymous, $bgcolor1, $bgcolor2, $bgcolor3, $bgcolor4;
	$thetext = str_replace("<!-- image=", "<img src=\"images/articles/", $thetext);
	$thetext = str_replace(" -->", "\" align=\"left\" hspace=\"4\" vspace=\"4\">", $thetext);

    echo "<table border=\"0\" cellpadding=\"0\" cellspacing=\"0\" align=\"center\" bgcolor=$bgcolor4 width=\"100%\"><tr><td>"
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
        ."</td></tr><tr><td bgcolor=$bgcolor2 align=\"right\">"
        ."<font size=\"2\">$morelink</font>"
        ."</td></tr></table></td></tr></table>"
	."<br>";
}

function themearticle ($aid, $informant, $datetime, $title, $thetext, $topic, $topicname, $topicimage, $topictext) {
    global $admin, $sid, $tipath,$bgcolor1, $bgcolor2, $bgcolor3, $bgcolor4;
	$thetext = str_replace("<!-- image=", "<img src=\"images/articles/", $thetext);
	$thetext = str_replace(" -->", "\" align=\"left\" hspace=\"4\" vspace=\"4\">", $thetext);

    if ("$aid" == "$informant") {
	echo"
	<table border=0 cellpadding=0 cellspacing=0 align=center bgcolor=$bgcolor4 width=100%><tr><td>
	<table border=0 cellpadding=3 cellspacing=1 width=100%><tr><td bgcolor=$bgcolor2
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
	global $bgcolor1, $bgcolor2, $bgcolor3, $bgcolor4, $bgcolor4;
    echo "<table border=\"0\" cellspacing=\"0\" cellpadding=\"0\" width=\"150\" bgcolor=$bgcolor4>\n"
	."<tr><td>\n"
        ."<table width=\"100%\" border=\"0\" cellspacing=\"1\" cellpadding=\"2\">\n"
	."<tr><td bgcolor=$bgcolor2>"
	."<img src=\"themes/NexenDream/images/NexenBoxTopLeft.gif\" width=\"21\" height=\"11\">&nbsp;"
        ."<B>$title</B></td></tr><tr><td bgcolor=$bgcolor1><font size=\"2\">"
        ."$content"
	."</font></td></tr>
          <tr bgcolor=$bgcolor2> 
            <td><img src=\"themes/NexenDream/images/NexenBoxBottom.gif\" width=\"150\" height=\"11\"></td>
          </tr>
	</table></td></tr></table><br>";
}

?>