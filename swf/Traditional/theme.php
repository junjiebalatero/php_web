<?php

$thename = "Cuadriculado";
$bgcolor1 = "#cccccc";
$bgcolor2 = "#999999";
$bgcolor3 = "#cccccc";
$textcolor1 = "#ffffff";
$textcolor2 = "#000000";

function OpenTable() {
    global $bgcolor1, $bgcolor2;
    echo "<table width=\"100%\" border=\"0\" cellspacing=\"1\" cellpadding=\"0\" bgcolor=\"$bgcolor2\"><tr><td>\n";
    echo "<table width=\"100%\" border=\"0\" cellspacing=\"1\" cellpadding=\"8\" bgcolor=\"$bgcolor1\"><tr><td>\n";
}

function CloseTable() {
    echo "</td></tr></table></td></tr></table>\n";
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
	$boxstuff .= ""._WRITES." <i>\"$thetext\"</i> $notes\n";
	echo "<font size=\"2\" color=\"#505050\">$boxstuff</font>\n";
    }
}

function themeheader() {
    global $banners, $sitename, $slogan;
    echo "<body bgcolor=\"#FFFFFF\" text=\"#000000\" link=\"#000000\" vlink=\"#000000\">"
	."<br>";
    if ($banners) {
	include("banners.php");
    }
    echo "<br>"
	."<table border=\"0\" cellspacing=\"0\" cellpadding=\"3\" width=\"100%\" bgcolor=\"FFFFFF\">"
	."<tr><td width=\"100%\">"
	."<a href=\"index.php\"><img src=\"themes/Traditional/images/logo.gif\" alt=\""._WELCOMETO." $sitename\" border=\"0\"></a>"
	."</td><td align=\"right\">"
	."<form action=\"search.php\" method=\"post\">"
	."<input type=\"text\" name=\"query\" width=\"20\" size=\"15\" length=\"20\">"
	."</td>"
	."<td width=\"60\" align=\"left\"><input type=\"submit\" value=\""._SEARCH."\"></td>"
	."</tr></table></form>"
	."<br>"
	."<table border=\"0\" width=\"100%\" cellspacing=\"5\"><tr><td valign=\"top\">";
}

function themefooter() {
    global $index;
    if ($index == 1) {
	echo "<td>&nbsp;</td><td valign=\"top\" width=\"200\">";
	blocks(left);
	blocks(right);
    }
    echo "</td></tr></table></td></tr></table>";
    footmsg();
}

function themesidebox($title, $content) {
    echo "<table border=\"0\" cellspacing=\"0\" cellpadding=\"0\" width=\"200\" bgcolor=\"#000000\"><tr><td>"
        ."<table width=\"100%\" border=\"0\" cellspacing=\"2\" cellpadding=\"3\"><tr><td bgcolor=\"#cccccc\">"
        ."<img src=\"themes/Traditional/images/tic.gif\" border=\"0\" alt=\"\">"
        ."<font size=\"3\">$title</font></td></tr>"
        ."<tr><td bgcolor=\"#ffffff\">"
        ."<font size=\"2\">$content</font></td></tr></table></td></tr></table>"
        ."<br>";
}



function themeindex ($aid, $informant, $time, $title, $counter, $topic, $thetext, $notes, $morelink, $topicname, $topicimage, $topictext) {
	global $tipath, $anonymous;
	if ("$aid" == "$informant") { ?>


<table border=0 cellpadding=3 cellspacing=1 width=100%>
<tr><td bgcolor=CCCCCC>
<font size=4>
<b><?php echo"$title"; ?></b><br>
</td></tr><tr><td bgcolor=FFFFFF>
<a href="search.php?query=&topic=<?php echo"$topic"; ?>&author="><img src=<?php echo"$tipath$topicimage"; ?> border=0 Alt=<?php echo"\"$topictext\""; ?> align=right hspace=10 vspace=10></a>
<font size=3>
<?php echo ""._POSTEDBY." "; ?> <b><?php formatAidHeader($aid) ?></b> <?php echo ""._ON.""; ?> <?php echo"$time $timezone"; ?><br>(<?php echo $counter; ?> <?php echo ""._READS.""; ?>)
<br><br>
<?php echo"$thetext<br><br>
</td></tr><tr><td align=left>
<font size=3>$morelink"; ?>
</td>
</tr>
</table>
<br>


<?php	} else {
		if($informant != "") $boxstuff = "<a href=\"user.php?op=userinfo&uname=$informant\">$informant</a> ";
		else $boxstuff = "$anonymous ";
		$boxstuff .= ""._WRITES." <i>\"$thetext\"</i> $notes";
?>

<table border=0 cellpadding=3 cellspacing=1 width=100%>
<tr><td bgcolor=CCCCCC>
<font size=4>
<b><?php echo"$title"; ?></b><br>
<font size=3>
</td></tr><tr><td bgcolor=FFFFFF>
<a href="search.php?query=&topic=<?php echo"$topic"; ?>&author="><img src=<?php echo"$tipath$topicimage"; ?> border=0 Alt=<?php echo"\"$topictext\""; ?> align=right hspace=10 vspace=10></a>
<font size=3>
<?php echo ""._POSTEDBY." "; ?> <?php formatAidHeader($aid); ?> <?php echo ""._ON.""; ?> <?php echo"$time $timezone"; ?><br>(<?php echo $counter; ?> <?php echo ""._READS.""; ?>)
<br><br>

<?php echo"$boxstuff<br><br>
</td></tr><tr><td align=left>
<font size=3>$morelink"; ?>
</td>
</tr>
</table>
<br>

<?php	}
}

function themearticle ($aid, $informant, $datetime, $title, $thetext, $topic, $topicname, $topicimage, $topictext) {
	global $admin, $sid, $tipath;
	if ("$aid" == "$informant") {
echo"

<table border=0 cellpadding=0 cellspacing=0 align=center bgcolor=000000 width=100%>
<tr><td>

<table border=0 cellpadding=3 cellspacing=1 width=100%>
<tr><td bgcolor=CCCCCC>
$font2
<b>$title</b><br>$font2 Enviado el $datetime
";
if ($admin) {
    echo "&nbsp;&nbsp; $font2 [ <a href=admin.php?op=EditStory&sid=$sid>"._EDIT."</a> | <a href=admin.php?op=RemoveStory&sid=$sid>"._DELETE."</a> ]";
}
echo "
</td>
</tr>
<tr>
<td bgcolor=ffffff>
<a href=search.php?query=&topic=$topic&author=><img src=$tipath$topicimage border=0 Alt=\"$topictext\" align=right hspace=10 vspace=10></a>
$thetext
</td>
</tr>
</table>
</td>
</tr>
</table><br>
";

	} else {
		if($informant != "") $informant = "<a href=\"user.php?op=userinfo&uname=$informant\">$informant</a> ";
		else $boxstuff = "$anonymous ";
		$boxstuff .= ""._WRITES." <i>\"$thetext\"</i> $notes";
echo "

<table border=0 cellpadding=0 cellspacing=0 align=center bgcolor=000000 width=100%>
<tr><td>
<table border=0 cellpadding=3 cellspacing=1 width=100%>
<tr><td bgcolor=CCCCCC>
$font3
<b>$title</b><br>$font2 "._CONTRIBUTEDBY." $informant "._ON." $datetime</font>
";
if ($admin) {
    echo "&nbsp;&nbsp; $font2 [ <a href=admin.php?op=EditStory&sid=$sid>"._EDIT."</a> | <a href=admin.php?op=RemoveStory&sid=$sid>"._DELETE."</a> ]";
}
echo "
</td>
</tr>
<tr>
<td bgcolor=ffffff>
<a href=search.php?query=&topic=$topic&author=><img src=$tipath$topicimage border=0 Alt=\"$topictext\" align=right hspace=10 vspace=10></a>
$font3 $thetext
</td>
</tr>
</table>
</td>
</tr>
</table><br>
";

	}
}

?>
