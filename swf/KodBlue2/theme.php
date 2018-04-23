<?php

$thename = "KodBlue2";
$bgcolor1 = "#FFFFFF";
$bgcolor2 = "#A4D8FF";
$bgcolor3 = "#FFFFFF";
$bgcolor4 = "#A4D8FF";
$textcolor1 = "#000000";
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
        $notes = "<br><b>"._NOTE."</b> <i>$notes</i>\n";
    } else {
        $notes = "";
    }
    if ("$aid" == "$informant") {
        echo "<font size=\"1\" color=\"#000000\">$thetext<br>$notes</font>\n";
    } else {
        if($informant != "") {
            $boxstuff = "<a href=\"user.php?op=userinfo&amp;uname=$informant\">$informant</a> ";
        } else {
            $boxstuff = "$anonymous ";
        }
        $boxstuff .= ""._WRITES." <i>\"$thetext\"</i> <br>$notes\n";
        echo "<font size=\"1\" color=\"#000000\">$boxstuff</font>\n";
    }
}


function themeheader() {
    global $user, $banners, $sitename, $slogan, $cookie;
    cookiedecode($user);
    $username = $cookie[1];
    if ($username == "") {
        $username = "Anonymous";
    }
    echo "<body bgcolor=\"#336699\" text=\"#000000\" link=\"#FF9933\" vlink=\"#FF9933\" alink=\"#FF9933\">\n"
        ."<table width=\"100%\" border=\"0\" cellspacing=\"0\" cellpadding=\"0\">\n"
        ."<tr>\n"
        ."<td width=\"15\" height=\"25\" nowrap><IMG src=\"themes/KodBlue2/images/header-top-corner-left.gif\" width=\"15\" height=\"25\" alt=\"\"></td>\n"
        ."<td width=\"100%\" background=\"themes/KodBlue2/images/top.gif\"><IMG src=\"themes/KodBlue2/images/spacer.gif\" width=\"1\" height=\"25\" alt=\"\"></td>\n"
        ."<td width=\"15\" height=\"25\"><IMG src=\"themes/KodBlue2/images/top-corner-right.gif\" width=\"15\" height=\"25\" alt=\"\"></td>\n"
        ."</tr>\n"
        ."<tr>\n"
        ."<td background=\"themes/KodBlue2/images/header-left.gif\"><IMG src=\"themes/KodBlue2/images/spacer.gif\" width=\"15\" height=\"1\" alt=\"\"></td>\n"
        ."<td>\n"
        ."<table width=\"100%\" border=\"0\" cellspacing=\"0\" cellpadding=\"0\">\n"
        ."<tr>\n"
        ."<td width=\"100%\"><IMG src=\"themes/KodBlue2/images/logo.gif\" width=\"200\" height=\"81\" alt=\"\"></td>\n"
        ."<td>\n"
        ."<table width=\"568\" border=\"0\" cellspacing=\"0\" cellpadding=\"0\">\n"
        ."<tr>\n"
        ."<td width=\"50\" height=\"60\" background=\"themes/KodBlue2/images/pub-left.gif\"><IMG src=\"themes/KodBlue2/images/spacer.gif\" width=\"50\" height=\"1\" alt=\"\"></td>\n"
        ."<td width=\"468\" height=\"60\">\n";
        if ($banners) {
        include("banners.php");
    }
    echo "</td>\n"
        ."<td width=\"50\" height=\"60\" background=\"themes/KodBlue2/images/pub-right.gif\"><IMG src=\"themes/KodBlue2/images/spacer.gif\" width=\"50\" height=\"1\" alt=\"\"></td>\n"
        ."</tr>\n"
        ."</table>\n"
        ."</td>\n"
        ."</tr>\n"
        ."</table>\n"
        ."</td>\n"
        ."<td background=\"themes/KodBlue2/images/right.gif\"><IMG src=\"themes/KodBlue2/images/spacer.gif\" width=\"15\" height=\"1\" alt=\"\"></td>\n"
        ."</tr>\n"
        ."<tr>\n"
        ."<td width=\"15\" height=\"25\"><IMG src=\"themes/KodBlue2/images/header-bottom-corner-left.gif\" width=\"15\" height=\"25\" alt=\"\"></td>\n"
        ."<td width=\"100%\" background=\"themes/KodBlue2/images/bottom.gif\"><IMG src=\"themes/KodBlue2/images/spacer.gif\" width=\"1\" height=\"25\" alt=\"\"></td>\n"
        ."<td width=\"15\" height=\"25\"><IMG src=\"themes/KodBlue2/images/bottom-corner-right.gif\" width=\"15\" height=\"25\" alt=\"\"></td>\n"
        ."</tr>\n"
        ."</table>\n"
        ."<br>\n"
        ."<table width=\"100%\" border=\"0\" cellspacing=\"0\" cellpadding=\"0\" bgcolor=\"#336699\">\n"
        ."<tr>\n"
        ."<td width=\"180\" height=\"25\"><IMG src=\"themes/KodBlue2/images/top-corner-left.gif\" width=\"180\" height=\"25\" alt=\"\"></td>\n"
        ."<td width=\"100%\" background=\"themes/KodBlue2/images/top.gif\"><IMG src=\"themes/KodBlue2/images/spacer.gif\" width=\"1\" height=\"25\" alt=\"\"></td>\n"
        ."<td width=\"15\" height=\"25\"><IMG src=\"themes/KodBlue2/images/top-corner-right.gif\" width=\"15\" height=\"25\" alt=\"\"></td>\n"
        ."</tr>\n"
        ."<tr>\n"
        ."<td width=\"180\" background=\"themes/KodBlue2/images/left.gif\" valign=\"top\">\n"
        ."<div align=\"center\">\n";
        if ($username == "Anonymous") {
        echo "<form method=\"post\" action=\"user.php\">\n"
        ."<table cellspacing=0 cellpadding=1 width=\"150\" border=0>\n"
        ."<tr>\n"
        ."<td align=right><font face=verdana color=#32659a size=1><b>login</b></font></td>\n"
        ."</tr>\n"
        ."<tr>\n"
        ."<td align=right><font face=verdana color=#32659a size=1>\n"
        ."<input type=text name=uname size=12 maxlength=25>\n"
        ."</font></td>\n"
        ."</tr>\n"
        ."<tr>\n"
        ."<td align=right><font face=verdana color=#32659a size=1><b>PassWord</b></font></td>\n"
        ."</tr>\n"
        ."<tr>\n"
        ."<td align=right><font face=verdana color=#32659a size=1>\n"
        ."<input type=password name=pass size=12 maxlength=20>\n"
        ."</font></td>\n"
        ."</tr>\n"
        ."<tr>\n"
        ."<td align=right><input type=\"hidden\" name=\"op\" value=\"login\"><input type=\"submit\" value=\"Login\"></td>\n"
        ."</tr>\n"
        ."</table>\n"
        ."</form>\n"
        ."<br>\n";
}
        else
{
        echo "<b><font face=verdana color=#32659a size=1>"._HELLO." $username<br>\n"
        ."&nbsp;&nbsp;<a href=\"user.php\"><IMG src=\"themes/KodBlue2/images/user.gif\" alt=\"ACCOUNT\" border=\"0\" alt=\"\"></a>\n"
        ."&nbsp;&nbsp;<a href=\"user.php?op=logout\"><IMG src=\"themes/KodBlue2/images/logout.gif\" alt=\"LOGOUT\" border=\"0\" alt=\"\"></a>\n"
        ."<br>\n";
}
        blocks(left);
        echo "</div>\n"
        ."</td>\n"
        ."<td width=\"100%\" valign=\"top\">\n"
        ."<table width=\"100%\" border=\"0\" cellspacing=\"0\" cellpadding=\"0\">\n"
        ."<tr>\n"
        ."<td width=\"100%\">\n";
}
        function themefooter() {
        global $index;
        if ($index == 1) {
        echo "</td>\n"
        ."<td width=\"10\" bgcolor=\"#336699\"><IMG src=\"themes/KodBlue2/images/spacer.gif\" width=\"10\" height=\"1\" alt=\"\"></td>\n"
        ."<td width=\"170\" background=\"themes/KodBlue2/images/back-box-right.gif\" valign=\"top\">\n";
        blocks(right);
}
        echo "</td>\n"
        ."</tr>\n"
        ."</table>\n"
        ."</td>\n"
        ."<td width=\"15\" background=\"themes/KodBlue2/images/right.gif\"><IMG src=\"themes/KodBlue2/images/spacer.gif\" width=\"15\" height=\"1\" alt=\"\"></td>\n"
        ."</tr>\n"
        ."<tr>\n"
        ."<td width=\"180\" height=\"25\"><IMG src=\"themes/KodBlue2/images/bottom-corner-left.gif\" width=\"180\" height=\"25\" alt=\"\"></td>\n"
        ."<td width=\"100%\" background=\"themes/KodBlue2/images/bottom.gif\"><IMG src=\"themes/KodBlue2/images/spacer.gif\" width=\"1\" height=\"25\" alt=\"\"></td>\n"
        ."<td width=\"15\" height=\"25\"><IMG src=\"themes/KodBlue2/images/bottom-corner-right.gif\" width=\"15\" height=\"25\" alt=\"\"></td>\n"
        ."</tr>\n"
        ."</table>\n"
        ."<br>\n"
        ."<table width=\"500\" border=\"0\" cellspacing=\"0\" cellpadding=\"4\" align=\"center\">\n"
        ."<tr>\n"
        ."<td>\n"
        ."<div align=\"center\"><font face=\"Verdana, Arial, Helvetica, sans-serif\" size=\"1\">\n";
         footmsg();
        echo "</font></div>\n"
        ."</td>\n"
        ."</tr>\n"
        ."</table><br>\n";

}
function themeindex ($aid, $informant, $time, $title, $counter, $topic, $thetext, $notes, $morelink, $topicname, $topicimage, $topictext) {
    global $anonymous, $tipath;
    echo "<table border=\"0\" cellpadding=\"0\" cellspacing=\"0\" bgcolor=\"#FFFFFF\" width=\"100%\"><tr><td>\n"
        ."<table border=\"0\" cellpadding=\"1\" cellspacing=\"0\" bgcolor=\"#000000\" width=\"100%\"><tr><td>\n"
        ."<table border=\"0\" cellpadding=\"3\" cellspacing=\"0\" bgcolor=\"#A4D8FF\" width=\"100%\"><tr><td align=\"left\">\n"
        ."<font size=\"2\" color=\"#32659a\"><b>$title</b></font>\n"
        ."</td></tr></table></td></tr></table>\n"
        ."<br><font color=\"#000000\"><b><a href=\"search.php?query=&amp;topic=$topic\"><IMG src=\"$tipath$topicimage\" border=\"0\" Alt=\"$topictext\" align=\"right\" hspace=\"5\" vspace=\"5\"></a></B></font>\n";
    FormatStory($thetext, $notes, $aid, $informant);
    echo "<br></td></tr></table>\n"
        ."<table border=\"0\" cellpadding=\"1\" cellspacing=\"0\" bgcolor=\"#000000\" width=\"100%\"><tr><td>\n"
        ."<table border=\"0\" cellpadding=\"3\" cellspacing=\"0\" bgcolor=\"#32659a\" width=\"100%\"><tr><td align=\"left\">\n"
        ."<font color=\"#000000\" size=\"1\">"._POSTEDBY." ";
    formatAidHeader($aid);
    echo " "._ON." $time $timezone ($counter "._READS.")<br></font>\n"
        ."<font size=\"1\">$morelink</font>\n"
        ."</td></tr></table></td></tr></table>\n"
        ."<br>\n\n\n";
}



function themearticle ($aid, $informant, $datetime, $title, $thetext, $topic, $topicname, $topicimage, $topictext) {
    global $admin, $sid, $tipath;
    echo "<table border=\"0\" cellpadding=\"0\" cellspacing=\"0\" bgcolor=\"#FFFFFF\" width=\"100%\"><tr><td>\n"
        ."<table border=\"0\" cellpadding=\"1\" cellspacing=\"0\" bgcolor=\"#000000\" width=\"100%\"><tr><td>\n"
        ."<table border=\"0\" cellpadding=\"3\" cellspacing=\"0\" bgcolor=\"#A4D8FF\" width=\"100%\"><tr><td align=\"left\">\n"
        ."<font size=\"2\" color=\"#32659a\"><b>$title</b></font><br>\n"
        ."<font size=\"1\">"._POSTEDON." $datetime "._BY." ";
    formatAidHeader($aid);
    if (is_admin($admin)) {
        echo "<br>[ <a href=\"admin.php?op=EditStory&amp;sid=$sid\">"._EDIT."</a> | <a href=\"admin.php?op=RemoveStory&amp;sid=$sid\">"._DELETE."</a> ]\n";
    }
    echo "</td></tr></table></td></tr></table><br>";
    echo "<a href=\"search.php?query=&amp;topic=$topic\"><IMG src=\"$tipath$topicimage\" border=\"0\" Alt=\"$topictext\" align=\"right\" hspace=\"10\" vspace=\"10\"></a>\n";
    FormatStory($thetext, $notes="", $aid, $informant);
    echo "</td></tr></table><br>\n\n\n";
}


function themesidebox($title, $content) {
    echo "<table width=\"160\" border=\"0\" cellspacing=\"0\" cellpadding=\"2\">\n"
    ."<tr>\n"
    ."<td width=\"9\"><IMG src=\"themes/KodBlue2/images/ptit-fleche.gif\" width=\"9\" height=\"7\" align=\"middle\" alt=\"\"></td>\n"
    ."<td valign=\"middle\" align=\"left\"><b><font face=\"Verdana, Arial, Helvetica, sans-serif\" size=\"1\" color=\"#FF0000\">$title</font></b></td>\n"
    ."</tr>\n"
    ."<tr>\n"
    ."<td><IMG src=\"themes/KodBlue2/images/spacer.gif\" width=\"1\" height=\"1\" alt=\"\"></td>\n"
    ."<td><b><font face=\"Verdana, Arial, Helvetica, sans-serif\" size=\"1\" color=\"#000000\">$content</font></b></td>\n"
    ."</tr>\n"
    ."<tr>\n"
    ."<td height=\"3\"><IMG src=\"themes/KodBlue2/images/spacer.gif\" width=\"1\" height=\"3\" alt=\"\"></td>\n"
    ."<td valign=\"top\" height=\"3\"><IMG src=\"themes/KodBlue2/images/hr-box.gif\" width=\"150\" height=\"3\" alt=\"\"></td>\n"
    ."</tr>\n"
    ."</table><br>\n";

}

?>