<?php // $Id: theme.php,v 1.3 2001/08/12 16:34:50 niceguyeddie Exp $ $Name:  $

$thename = "ExtraLite_Flash";
$bgcolor1 = "#ffffff";
$bgcolor2 = "#cccccc";
$bgcolor3 = "#ffffff";
$bgcolor4 = "#eeeeee";
$bgcolor5 = "#000000";
$textcolor1 = "#ffffff";
$textcolor2 = "#000000";

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
    echo "<font class=\"pn-normal\">$thetext<br>$notes</font>\n";
    } else {
    if($informant != "") {
        $boxstuff = "<a href=\"user.php?op=userinfo&amp;uname=$informant\">$informant</a> ";
    } else {
        $boxstuff = "$anonymous ";
    }
    $boxstuff .= "<font class=\"pn-normal\">"._WRITES." <i>\"$thetext\"</i> $notes</font>\n";
    echo "<font class=\"pn-normal\">$boxstuff</font>\n";
    }
}

function themeheader() {
    global $bgcolor1, $bgcolor2, $bgcolor3, $bgcolor4, $banners, $sitename, $slogan, $thename;
    echo "</head>";
    echo "<body>"
    ."<br>";
    if ($banners) {
    include("banners.php");
    }
    echo "<br>"
    ."<table border=\"0\" cellpadding=\"4\" cellspacing=\"0\" width=\"100%\" align=\"center\"><tr><td bgcolor=\"$bgcolor1\">"
        ."<table border=\"0\" cellspacing=\"0\" cellpadding=\"3\" width=\"100%\" bgcolor=\"$bgcolor1\"><tr><td>"
        ."<OBJECT classid=\"clsid:D27CDB6E-AE6D-11cf-96B8-444553540000\"
 codebase=\"http://download.macromedia.com/pub/shockwave/cabs/flash/swflash.cab#version=5,0,0,0\"
 WIDTH=335 HEIGHT=81>
 <PARAM NAME=movie VALUE=\"themes/$thename/sitename.swf?text=$sitename\"> 
 <PARAM NAME=quality VALUE=high>
 <PARAM NAME=bgcolor VALUE=$bgcolor1>
 <PARAM NAME=menu VALUE=false>
 <EMBED src=\"themes/$thename/sitename.swf?text=$sitename\" quality=high bgcolor=$bgcolor1 WIDTH=335 HEIGHT=81 TYPE=\"application/x-shockwave-flash\" PLUGINSPAGE=\"http://www.macromedia.com/shockwave/download/index.cgi?P1_Prod_Version=ShockwaveFlash\" menu=\"false\"></EMBED>
</OBJECT><br><OBJECT classid=\"clsid:D27CDB6E-AE6D-11cf-96B8-444553540000\"
 codebase=\"http://download.macromedia.com/pub/shockwave/cabs/flash/swflash.cab#version=5,0,0,0\"
 WIDTH=335 HEIGHT=20>
 <PARAM NAME=movie VALUE=\"themes/$thename/slogan.swf?text=$slogan\"> 
 <PARAM NAME=quality VALUE=high>
 <PARAM NAME=bgcolor VALUE=$bgcolor1>
 <PARAM NAME=menu VALUE=false>
 <EMBED src=\"themes/$thename/slogan.swf?text=$slogan\" quality=high bgcolor=$bgcolor1 WIDTH=335 HEIGHT=20 TYPE=\"application/x-shockwave-flash\" PLUGINSPAGE=\"http://www.macromedia.com/shockwave/download/index.cgi?P1_Prod_Version=ShockwaveFlash\" menu=\"false\"></EMBED>
</OBJECT>"
        ."</td><td align=\"right\">"
        ."<form action=\"search.php\" method=\"post\">"
        ."<font class=\"pn-normal\">"._SEARCH.""
        ."<input type=\"text\" name=\"query\">"
        ."</font></form>"
        ."</td></tr></table></td></tr><tr><td valign=\"top\" width=\"100%\" bgcolor=\"$bgcolor1\">"
        ."<table border=\"0\" cellspacing=\"0\" cellpadding=\"2\" width=\"100%\"><tr><td valign=\"top\" width=\"150\" bgcolor=\"$bgcolor1\">";
    blocks(left);
    echo "<img src=\"images/pix.gif\" border=\"0\" width=\"150\" height=\"1\" alt=\"\"></td><td>&nbsp;&nbsp;</td><td width=\"100%\" valign=\"top\">";
}

function themefooter() {
    global $bgcolor1, $bgcolor2, $bgcolor3, $bgcolor4, $index;
    if ($index == 1) {
    echo "</td><td>&nbsp;&nbsp;</td><td valign=\"top\" bgcolor=\"$bgcolor1\">";
    blocks(right);
    }
    echo "</td></tr></table></td></tr></table>";
    echo "<center>";
    footmsg();
    echo "</center>";
}

function themeindex ($aid, $informant, $time, $title, $counter, $topic, $thetext, $notes, $morelink, $topicname, $topicimage, $topictext) {
    global $bgcolor1, $bgcolor2, $bgcolor3, $bgcolor4, $bgcolor5, $tipath, $anonymous;
    echo "<table border=\"0\" cellpadding=\"0\" cellspacing=\"0\" align=\"center\" bgcolor=\"$bgcolor5\" width=\"100%\"><tr><td>"
        ."<table border=\"0\" cellpadding=\"3\" cellspacing=\"1\" width=\"100%\"><tr><td bgcolor=\"$bgcolor1\">"
        ."<b>$title</b><br>"
        ."<font class=\"pn-normal\">"
        .""._POSTEDBY." <b>";
    formatAidHeader($aid);
    echo "</b> "._ON." $time $timezone ($counter "._READS.")<br>"
    ."<b>"._TOPIC."</b> <a href=\"search.php?query=&amp;topic=$topic&amp;author=\">$topictext</a><br>"
    ."</font></td></tr><tr><td bgcolor=\"$bgcolor1\">";
    FormatStory($thetext, $notes, $aid, $informant);
    echo "<br><br>"
        ."</td></tr><tr><td bgcolor=\"$bgcolor1\" align=\"right\">"
        ."<font class=\"pn-sub\">$morelink</font>"
        ."</td></tr></table></td></tr></table>"
    ."<br>";
}

function themearticle ($aid, $informant, $datetime, $title, $thetext, $topic, $topicname, $topicimage, $topictext) {
    global $bgcolor1, $bgcolor2, $bgcolor3, $bgcolor4, $bgcolor5, $admin, $sid, $tipath;
    echo"
    <table border=0 cellpadding=0 cellspacing=0 align=center bgcolor=\"$bgcolor5\" width=\"100%\"><tr><td>
    <table border=0 cellpadding=3 cellspacing=1 width=\"100%\"><tr><td bgcolor=\"$bgcolor1\">
    <font class=\"pn-title\">$title</font><br><font class=\"pn-normal\">"._ON." $datetime</font>";
    if ($admin) {
        echo "&nbsp;&nbsp; <font class=\"pn-normal\"> [ <a href=\"admin.php?op=EditStory&amp;sid=$sid\">"._EDIT."</a> | <a href=\"admin.php?op=RemoveStory&amp;sid=$sid\">"._DELETE."</a> ]</font>";
    }
    echo "
    <br><font class=\"pn-normal\">"._TOPIC.":</font> <a href=\"search.php?query=&amp;topic=$topic&amp;author=\">$topictext</a>
    </td></tr><tr><td bgcolor=\"$bgcolor1\"><font class=\"pn-norma\">";
    FormatStory($thetext, $notes, $aid, $informant);
    echo "
    </font></td></tr></table></td></tr></table><br>";
    }


function themesidebox($title, $content) {



    global $bgcolor1, $bgcolor2, $bgcolor3, $bgcolor4, $bgcolor5, $thename;
 


   echo "<table border=\"0\" cellspacing=\"0\" cellpadding=\"0\" width=\"150\" bgcolor=\"$bgcolor5\"><tr><td>"
        ."<table width=\"100%\" border=\"0\" cellspacing=\"1\" cellpadding=\"3\"><tr><td bgcolor=\"$bgcolor1\" class=\"pn-title\">"
        ."<OBJECT classid=\"clsid:D27CDB6E-AE6D-11cf-96B8-444553540000\"
 codebase=\"http://download.macromedia.com/pub/shockwave/cabs/flash/swflash.cab#version=5,0,0,0\"
 WIDTH=150 HEIGHT=30>
 <PARAM NAME=movie VALUE=\"themes/$thename/title.swf?text=$title\"> 
 <PARAM NAME=quality VALUE=high>
 <PARAM NAME=bgcolor VALUE=$bgcolor1>
 <PARAM NAME=menu VALUE=false>
 <EMBED src=\"themes/$thename/title.swf?text=$title\" quality=high bgcolor=$bgcolor1  WIDTH=150 HEIGHT=30 TYPE=\"application/x-shockwave-flash\" PLUGINSPAGE=\"http://www.macromedia.com/shockwave/download/index.cgi?P1_Prod_Version=ShockwaveFlash\" menu=\"false\"></EMBED>
</OBJECT></td></tr><tr><td bgcolor=\"$bgcolor1\" class=\"pn-normal\">"; 
if (file_exists($content)) { 
$fp = fopen ($content, "r"); 
$content = fread($fp, filesize($content)); 
fclose ($fp); 
$content = "?>$content<?"; 
echo eval($content); 
} else { 
echo $content; 
} 
echo "</td></tr></table></td></tr></table><br>";
}

?>