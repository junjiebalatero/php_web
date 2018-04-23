<?php

$thename 	= "0ri0n";
$bgcolor1 	= "#000000";
$bgcolor2 	= "#CC0000";
$bgcolor3 	= "#FFFFff";
$bgcolor4 	= "#CC0000";
$textcolor1 	= "#FFFFFF";
$textcolor2 	= "#FFFFFF";

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
	echo "<font class=\"content\">$thetext<br>$notes</font>\n";
    } else {
	if($informant != "") {
	    $boxstuff = "<a href=\"user.php?op=userinfo&amp;uname=$informant\">$informant</a> ";
	} else {
	    $boxstuff = "$anonymous ";
	}
	$boxstuff .= ""._WRITES." <i>\"$thetext\"</i> $notes\n";
	echo "<font class=\"content\">$boxstuff</font>\n";
    }
}

function themeheader() {
    global $slogan;
    echo "<body bgcolor=\"000000\" text=\"FFFFFF\" link=\"FFFFFF\" vlink=\"FFFFFF\">";
    if ($banners) {
	echo "<br>";
	include("banners.php");
	echo "<br>";
    }
    echo "<table border=\"0 cellpadding=\"4\" cellspacing=\"0\" width=\"100%\" align=\"center\"><tr><td bgcolor=\"000000\">"
        ."<table border=\"0\" cellspacing=\"0\" cellpadding=\"3\" width=\"100%\" bgcolor=\"000000\"><tr><td>"
        ."<a href=\"index.php\"><img src=\"themes/0ri0n/images/logo.gif\" Alt=\""._WELCOMETO." $sitename\" border=\"0\"></a>"
        ."</td><td align=\"right\">"
        ."<form action=\"search.php\" method=\"post\">"
        ."<font class=\"content\">"._SEARCH.""
        ."<input type=\"text\" name=\"query\">"
        ."</font></form>"
        ."</td></tr></table></td></tr>"
	."<tr><td valign=\"top\" bgcolor=\"000000\">&nbsp;&nbsp;</td></tr>"	
	."<tr><td valign=\"top\" bgcolor=\"CC0000\" background=\"themes/0ri0n/images/barra.gif\"><font class=content>$slogan</font></td></tr>"
	."<tr><td valign=\"top\" bgcolor=\"000000\">&nbsp;&nbsp;</td></tr>"
	."<tr><td valign=\"top\" width=\"100%\" bgcolor=\"000000\">"
        ."<table border=\"0\" cellspacing=\"0\" cellpadding=\"2\" width=\"100%\"><tr><td valign=\"top\" width=\"150\" bgcolor=\"000000\">";
    blocks(left);
    echo "<img src=\"images/pix.gif\" border=\"0\" width=\"150\" height=\"1\"></td><td>&nbsp;&nbsp;</td><td width=\"100%\" valign=\"top\">";
}

function themefooter() {
    global $index;
    if ($index == 1) {
	echo "</td><td>&nbsp;&nbsp;</td><td valign=\"top\" bgcolor=\"#000000\">";
	blocks(right);
	echo "</td>";
    }
    echo "</td></tr></table></td></tr></table>";
    footmsg();
}

function themeindex ($aid, $informant, $time, $title, $counter, $topic, $thetext, $notes, $morelink, $topicname, $topicimage, $topictext) {
    global $tipath, $anonymous;
    echo "<table border=\"0\" cellpadding=\"0\" cellspacing=\"0\" align=\"center\" bgcolor=\"000000\" width=\"100%\"><tr><td>"
        ."<table border=\"0\" cellpadding=\"3\" cellspacing=\"1\" width=\"100%\"><tr><td bgcolor=\"CC0000\" background=\"themes/0ri0n/images/barra.gif\">"
        ."<b>$title</b><br>"
	."</font></td></tr><tr><td bgcolor=\"000000\">"
        ."<font class=\"tiny\">"
        .""._POSTEDBY." <b>";
    formatAidHeader($aid);
    echo "<a href=search.php?query=&amp;topic=$topic><img src=$tipath$topicimage border=\"0\" Alt=\"$topictext\" align=\"left\" hspace=\"10\" vspace=\"10\"></a>";
    echo "</b> "._ON." $time $timezone ($counter "._READS.")<br><br>";
    FormatStory($thetext, $notes, $aid, $informant);
    echo "<br><br>"
        ."</td></tr><tr><td bgcolor=\"000000\" align=\"left\">"
        ."<font class=\"content\">$morelink</font>"
        ."</td></tr></table></td></tr></table>"
	."<br><br>";
}

function themearticle ($aid, $informant, $datetime, $title, $thetext, $topic, $topicname, $topicimage, $topictext) {
    global $admin, $sid, $tipath;
    if ("$aid" == "$informant") {
	echo "<table border=0 cellpadding=0 cellspacing=0 align=center bgcolor=000000 width=100%><tr><td>"
	    ."<table border=0 cellpadding=3 cellspacing=1 width=100%><tr><td bgcolor=CC0000 background=\"themes/0ri0n/images/barra.gif\">"
	    ."<b>$title</b>"
	    ."</td></tr><tr><td bgcolor=000000>"
	    ."<font class=tiny>"._POSTEDON." $datetime </font>";
	    if ($admin) {
		echo "<font class=\"tiny\">&nbsp;&nbsp; $font2 [ <a href=admin.php?op=EditStory&sid=$sid>"._EDIT."</a> | <a href=admin.php?op=RemoveStory&sid=$sid>"._DELETE."</a> ] <font>";
	    }
	    echo "<a href=\"search.php?query=&amp;topic=$topic\"><img src=\"$tipath$topicimage\" border=\"0\" Alt=\"$topictext\" align=\"left\" hspace=\"10\" vspace=\"10\"></a>"
	        ."<br><br>$thetext"
	        ."</td></tr></table></td></tr></table><br>";
    } else {

	if($informant != "") $informant = "<a href=\"user.php?op=userinfo&uname=$informant\">$informant</a>";
	else $boxstuff = "$anonymous ";
	$boxstuff .= ""._WRITES." <i>\"$thetext\"</i> $notes";
	echo "
	<table border=0 cellpadding=0 cellspacing=0 align=center bgcolor=000000 width=100%><tr><td>
	<table border=0 cellpadding=3 cellspacing=1 width=100%><tr><td bgcolor=CC0000 background=\"themes/0ri0n/images/barra.gif\">
	<b>$title</b>
	</td></tr><tr><td bgcolor=000000>
	<font class=tiny>"._CONTRIBUTEDBY." $informant "._ON." $datetime</font>";
	if ($admin) {
	    echo "<font class=tiny>&nbsp;&nbsp; $font2 [ <a href=admin.php?op=EditStory&sid=$sid>"._EDIT."</a> | <a href=admin.php?op=RemoveStory&sid=$sid>"._DELETE."</a> ]</font>";
	}
	echo "
	</td></tr><tr><td bgcolor=000000>
	$thetext
	</td></tr></table></td></tr></table><br>";
    }
}

function themesidebox($title, $content) {
    echo "<table border=\"0\" cellspacing=\"0\" cellpadding=\"0\" width=\"150\" bgcolor=\"CC0000\"><tr><td>"
        ."<table width=\"100%\" border=\"0\" cellspacing=\"1\" cellpadding=\"3\"><tr><td bgcolor=\"CC0000\" background=\"themes/0ri0n/images/barra.gif\">"
        ."<font class=\"content\">$title</font></td></tr><tr><td bgcolor=\"000000\"><font class=\"content\">"
        ."<font class=\"content\">$content</font>"
	."</font></td></tr></table></td></tr></table><br>";
}

?>