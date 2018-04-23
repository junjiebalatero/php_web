<?php
// Theme created by J.P. Pasnak
// http://www.warpedsystems.sk.ca 
//
$thename = "Warped";
$lnkcolor = "#000000";
$bgcolor1 = "#ccdddd";
$bgcolor2 = "#8064b4";
$bgcolor3 = "#ccdddd";
$bgcolor4 = "#660000";
$textcolor1 = "#FFFFFF";
$textcolor2 = "#000000";
$hr = 1; # 1 to have horizonal rule in comments instead of table bgcolor

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

#function themepreview($title, $hometext, $bodytext="", $notes="") {
#	echo "<p><b>$title</b><br>$hometext<br><br>$bodytext $notes";
#}
function themeheader() {

global $admin, $banners;

echo "
<body bgcolor=FFFFFF text=000000 link=000000 vlink=000000 topmargin=5 leftmargin=0 rightmargin=0 marginheight=5>";
if ($banners) {
    include("banners.php");
}

echo "
<table border=0 cellpadding=4 cellspacing=0 width=100% align=center><tr><td bgcolor=778899>
<table border=0 cellspacing=0 cellpadding=1 width=100% bgcolor=000000><tr><td>
<table border=0 cellspacing=0 cellpadding=3 width=100% bgcolor=ffffff><tr><td>
<a href=$nuke_url><img src=images/logo.gif Alt=\""._WELCOMETO." $sitename\" border=0></a>
</td><td align=right>
    <form action=search.php method=post><font size=2 color=000000>
    "._SEARCH."
    <input type=name name=query>
    </form>
</tr><tr bgcolor=8064b4><td colspan=2 bgcolor=8064b4>
<font size=3 color=CCCCCC>$slogan</td>
</td></tr></table></td></tr></table>
</td></tr><tr><td valign=top width=100% bgcolor=ffffff>
<table border=0 cellspacing=0 cellpadding=2 width=100%><tr><td valign=top width=150 bgcolor=ffffff>";

blocks(left);
echo "<img src=images/pix.gif border=0 width=150 height=1></td><td>&nbsp;&nbsp;</td><td width=100% valign=top>";
}

function themefooter() {
echo "</td><td>&nbsp;&nbsp;</td><td valign=\"top\" bgcolor=\"#ffffff\">";
blocks(right);
echo "</td>";
echo "</td></tr></table></td></tr></table>";
footmsg();

}

function themeindex ($aid, $informant, $time, $title, $counter, $topic, $thetext, $notes, $morelink, $topicname, $topicimage, $topictext) {
	global $tipath, $anonymous;
	if ("$aid" == "$informant") { ?>
<table border=0 cellpadding=0 cellspacing=0 align=center bgcolor=000000 width=100%>
<tr><td>

<table border=0 cellpadding=3 cellspacing=1 width=100%>
<tr><td bgcolor=8064b4>
<b><font color=ccdddd><?php echo"$title"; ?></font></b><br>
<font size=1 color=ccdddd>
<?php echo _POSTEDBY; ?><b><?php formatAidHeader($aid) ?></b> <?php echo _ON; ?> <?php echo"$time $timezone"; ?> (<?php echo $counter; ?> <?php echo ""._READS.""; ?>)<br>
</td>
</tr>
<tr>
<td bgcolor=ccdddd>
<a href="search.php?query=&topic=<?php echo"$topic"; ?>&author="><img src=<?php echo"$tipath$topicimage"; ?> border=1 Alt=<?php echo"\"$topictext\""; ?> align=right hspace=10 vspace=10></a>
<?php echo"$thetext<br><br>
</td></tr><tr><td bgcolor=8064b4 align=right>
<font size=2>$morelink"; ?>
</td>
</tr>
</table>
</td>
</tr>
</table><br>


<?php	} else {
		if($informant != "") $boxstuff = "<a href=\"user.php?op=userinfo&uname=$informant\">$informant</a> ";
		else $boxstuff = "$anonymous ";
		$boxstuff .= ""._WRITES." <i>\"$thetext\"</i> $notes";
?>
<table border=0 cellpadding=0 cellspacing=0 align=center bgcolor=000000 width=100%>
<tr><td>

<table border=0 cellpadding=3 cellspacing=1 width=100%>
<tr><td bgcolor=8064b4>
<b><?php echo"$title"; ?></b><br>
<font size=1>
<?php echo _POSTEDBY; ?><?php formatAidHeader($aid); ?> <?php echo _ON; ?> <?php echo"$time $timezone"; ?> (<?php echo $counter; ?> <?php echo ""._READS.""; ?>)<br>
</td>
</tr>
<tr>
<td bgcolor=ccdddd>
<a href="search.php?query=&topic=<?php echo"$topic"; ?>&author="><img src=<?php echo"$tipath$topicimage"; ?> border=0 Alt=<?php echo"\"$topictext\""; ?> align=right hspace=10 vspace=10></a>
<?php echo"$boxstuff<br><br>
</td></tr><tr><td bgcolor=8064b4 align=right>
<font size=2>$morelink"; ?>
</td></tr></table>
</td></tr></table><br>

<?php	}
}

function themearticle ($aid, $informant, $datetime, $title, $thetext, $topic, $topicname, $topicimage, $topictext) {
	global $admin, $sid, $tipath;	
	if ("$aid" == "$informant") {
echo"

<table border=0 cellpadding=0 cellspacing=0 align=center bgcolor=000000 width=100%>
<tr><td>

<table border=0 cellpadding=3 cellspacing=1 width=100%>
<tr><td bgcolor=8064b4>
<b>$title</b><br><font size=1>"._POSTEDON." $datetime
";
if ($admin) {
    echo "&nbsp;&nbsp; $font2 [ <a href=admin.php?op=EditStory&sid=$sid>"._EDIT."</a> | <a href=admin.php?op=RemoveStory&sid=$sid>"._DELETE."</a> ]";
}

echo "
</td>
</tr>
<tr>
<td bgcolor=ccdddd>
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
<tr><td bgcolor=8064b4>
<b>$title</b><br><font size=2>"._CONTRIBUTEDBY." $informant "._ON." $datetime</font>
";
if ($admin) {
    echo "&nbsp;&nbsp; $font2 [ <a href=admin.php?op=EditStory&sid=$sid>"._EDIT."</a> | <a href=admin.php?op=RemoveStory&sid=$sid>"._DELETE."</a> ]";
}
echo "
</td>
</tr>
<tr>
<td bgcolor=ccdddd>
<a href=search.php?query=&topic=$topic&author=><img src=$tipath$topicimage
border=0 Alt=\"$topictext\" align=right hspace=10 vspace=10></a>
$thetext
</td>
</tr>
</table>
</td>
</tr>
</table><br>
";

	}
}

function themesidebox($title, $content) {
    echo "
    <table border=0 cellspacing=0 cellpadding=0 width=100% bgcolor=000000><tr><td>
    <table width=100% border=0 cellspacing=1 cellpadding=3><tr><td colspan=1 bgcolor=8064b4>
    <font size=2>$title
    </td></tr><tr><td bgcolor=ccdddd><font size=2>
    $content
    </td></tr></table></td></tr></table><br>";
}
?>
