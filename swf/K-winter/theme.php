<?php

$thename = "K-winter";
$bgcolor1 = "#eeeeee";
$bgcolor2 = "#6699CC";
$bgcolor3 = "#cccccc";
$bgcolor4 = "#eeeeee";
$textcolor1 = "#000000";
$textcolor2 = "#000000";

function OpenTable() {
    global $bgcolor1, $bgcolor2;
    echo "<table width=\"100%\" border=\"0\" cellspacing=\"2\" cellpadding=\"0\" bgcolor=\"$bgcolor2\"><tr><td>\n";
    echo "<table width=\"100%\" border=\"0\" cellspacing=\"1\" cellpadding=\"4\" bgcolor=\"$bgcolor1\"><tr><td>\n";
}

function OpenTable2() {
    global $bgcolor3, $bgcolor4;
    echo "<table border=\"0\" cellspacing=\"1\" cellpadding=\"4\" bgcolor=\"$bgcolor3\" align=\"center\"><tr><td>\n";
    echo "<table border=\"0\" cellspacing=\"1\" cellpadding=\"4\" bgcolor=\"$bgcolor4\"><tr><td>\n";
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
        $notes = "<img src=\"themes/K-winter/images/point2.gif\" width=\"8\" height=\"8\" border=\"0\" alt=\"\">&nbsp;&nbsp;<font face=\"Verdana, Arial, Helvetica, sans-serif\" size=\"2\"><b>Notes:</b> $notes</font>\n";
    } else {
        $notes = "";
    }
    if ("$aid" == "$informant") {
        echo "<img src=\"themes/K-winter/images/point2.gif\" width=\"8\" height=\"8\" border=\"0\" alt=\"\">&nbsp;&nbsp;<font face=\"Verdana, Arial, Helvetica, sans-serif\" size=\"2\">$thetext</font><br><br><font face=\"Verdana, Arial, Helvetica, sans-serif\" size=\"2\">$notes</font>\n";
    } else {
        if($informant != "") {
            $boxstuff = "<img src=\"themes/K-winter/images/point.gif\" width=\"8\" height=\"8\" border=\"0\" alt=\"\">&nbsp;&nbsp;<a href=\"user.php?op=userinfo&amp;uname=$informant\"><font face=\"Verdana, Arial, Helvetica, sans-serif\" size=\"2\"><b>$informant</b></font></a> ";
        } else {
            $boxstuff = "$anonymous ";
        }
        $boxstuff .= ""._WRITES."<font face=\"Verdana, Arial, Helvetica, sans-serif\" size=\"2\"> $thetext</font><br><font face=\"Verdana, Arial, Helvetica, sans-serif\" size=\"2\">$notes</font>\n";
        echo "<font face=\"Verdana, Arial, Helvetica, sans-serif\" size=\"2\">$boxstuff</font>\n";
    }
}

function themeheader() {
    global $user, $username, $banners, $sitename, $slogan, $cookie;
    cookiedecode($user);
    $username = $cookie[1];
    if ($username == "") {
        $username = "Anonymous";
    }
    echo  "<body text=\"#000000\" background=\"themes/K-winter/images/bg.gif\" link=\"#FF0000\" vlink=\"#FF0000\" alink=\"#FF0000\">"
/************************************************************/
/* table1 : logo + banners                                  */
/************************************************************/

     ."<table width=\"100%\" border=\"0\" cellspacing=\"0\" cellpadding=\"0\">\n"
     ."<tr>\n"
     ."<td><img src=\"themes/K-winter/images/logo.gif\" width=\"219\" height=\"70\" alt=\""._WELCOMETO." $sitename\" border=\"0\"></td>\n"
     ."<td align=\"right\" valign=\"top\">\n";
     if ($banners) {
     include("banners.php");
}
     echo "</td>\n"
     ."</tr>\n"
     ."</table>\n"

     ."<br>\n"
/************************************************************/
/* table2                                                   */
/************************************************************/
     ."<table width=\"100%\" border=\"0\" cellspacing=\"0\" cellpadding=\"0\">\n"
     ."<tr valign=\"bottom\">\n"
     ."<td align=\"left\" colspan=\"2\" height=\"21\">\n"
     ."<table width=\"100%\" border=\"0\" cellspacing=\"0\" cellpadding=\"0\">\n"
     ."<tr>\n"
     ."<td width=\"11\" height=\"21\"><img src=\"themes/K-winter/images/nav-bar-left.gif\" width=\"11\" height=\"21\" alt=\"\" border=\"0\"></td>\n"
     ."<td width=\"100%\" bgcolor=\"#FFFFFF\" valign=\"middle\" align=\"center\">\n"
     ."<div align=\"left\"><font face=\"Verdana, Arial, Helvetica, sans-serif\" size=\"1\">"._HELLO." $username</font></div>\n"
     ."</td>\n"
     ."<td align=\"left\" valign=\"bottom\" width=\"480\" height=\"21\"><img src=\"themes/K-winter/images/nav-bar.gif\" width=\"480\" height=\"21\" alt=\"\" border=\"0\" usemap=\"#Map\"></td>\n"
     ."</tr>\n"
     ."</table>\n"
     ."</td>\n"
     ."</tr>\n"

     ."<tr>\n"
     ."<td bgcolor=\"#FFFFFF\" align=\"left\" valign=\"middle\">\n"
     ."<table border=\"0\" cellspacing=\"0\" cellpadding=\"5\">\n"
     ."<tr>\n";
     if ($username == "Anonymous") {
     echo "<td align=\"left\" valign=\"middle\"><a href=\"user.php\"><img src=\"themes/K-winter/images/login.gif\" width=\"60\" height=\"15\" alt=\""._USERREGLOGIN."\" border=\"0\"></a></td>\n"
     ."<td align=\"left\" valign=\"middle\"><a href=\"user.php\"><img src=\"themes/K-winter/images/register.gif\" width=\"60\" height=\"15\" alt=\""._REGNEWUSER."\" border=\"0\"></a></td>\n";
} else {
     echo "<td align=\"left\" valign=\"middle\"><a href=\"user.php?op=logout\"><img src=\"themes/K-winter/images/logout.gif\" width=\"60\" height=\"15\" alt=\""._LOGOUT."\" border=\"0\"></a></td>\n"
     ."<td align=\"left\" valign=\"middle\"><a href=\"user.php\"><img src=\"themes/K-winter/images/account.gif\" width=\"60\" height=\"15\" alt=\""._ACCOUNT."\" border=\"0\"></a></td>\n";
}
     echo"</tr>\n"
     ."</table>\n"
     ."</td>\n"
     ."<td bgcolor=\"#FFFFFF\" width=\"100%\" align=\"right\" valign=\"top\">\n"
     ."<table border=\"0\" cellspacing=\"0\" cellpadding=\"3\" align=\"right\">\n"
     ."<tr>\n"
     ."<td valign=\"middle\" align=\"center\"><form action=\"search.php\" method=\"post\"><font size=\"2\" color=\"#000000\"><b>"._SEARCH." </b>\n"
     ."<input type=\"text\" name=\"query\" size=\"14\"></font></form></td>\n"
     ."</tr>\n"
     ."</table>\n"
     ."</td>\n"
     ."</tr>\n"

     ."<tr>\n"
     ."<td bgcolor=\"#000000\" align=\"left\" valign=\"bottom\" colspan=\"2\" height=\"5\"><img src=\"themes/K-winter/images/pix-black.gif\" width=\"100%\" height=\"5\" alt=\"\" border=\"0\"></td>\n"
     ."</tr>\n"
     ."</table>\n"

     ."<table width=\"100%\" cellpadding=\"0\" cellspacing=\"0\" border=\"0\" bgcolor=\"#ffffff\" align=\"center\"><tr valign=\"top\">\n"
     ."<td bgcolor=\"#ffffff\" width=\"160\" valign=\"top\">\n";
     blocks(left);
     echo "</td><TD>&nbsp;&nbsp;&nbsp;</TD><td width=\"100%\" align=\"center\">\n";
}

/************************************************************/
/* Fonction themefooter()                                   */
/************************************************************/

function themefooter() {
    global $index;
    if ($index == 1) {
        echo "</td><TD>&nbsp;&nbsp;&nbsp;</TD><td valign=\"top\" width=\"160\" bgcolor=\"#FFFFFF\">\n";
        blocks(right);
    }
    echo "</td>\n"
        ."</tr></table>\n"

     ."<table width=\"100%\" border=\"0\" cellspacing=\"0\" cellpadding=\"0\">\n"
     ."<tr>\n"
     ."<td align=\"left\" valign=\"top\" width=\"11\"><img src=\"themes/K-winter/images/main-bottom-left.gif\" width=\"11\" height=\"21\" alt=\"\" border=\"0\"></td>\n"
     ."<td width=\"100%\" align=\"center\" valign=\"middle\" bgcolor=\"#FFFFFF\"><font face=\"Verdana, Arial, Helvetica, sans-serif\" size=\"1\">| <a href=\"index.php\">"._MAIN."</a> | <a href=\"topics.php\">"._TOPICS."</a> | <a href=\"download.php\">"._DOWNLOADS."</a> | <a href=\"stats.php\">"._STATS."</a> | <a href=\"top.php\">"._TOP10."</a> | <a href=\"submit.php\">"._SUBMITNEWS."</a> |</font></td>\n"
     ."<td align=\"right\" valign=\"top\" width=\"11\"><img src=\"themes/K-winter/images/main-bottom-right.gif\" width=\"11\" height=\"21\" alt=\"\" border=\"0\"></td>\n"
     ."</tr>\n"
     ."</table>\n"

     ."<br>\n"
     ."<table width=\"100%\" border=\"0\" cellspacing=\"0\" cellpadding=\"0\">\n"
     ."<tr align=\"center\">\n"
     ."<td>\n";
footmsg();
     echo "</td></tr></table>\n"
     ."<br>\n"
     ."<map name=\"Map\">\n"
     ."<area shape=\"rect\" coords=\"15,3,106,17\" href=\"index.php\" alt=\""._MAIN."\" title=\""._MAIN."\">\n"
     ."<area shape=\"rect\" coords=\"108,4,200,16\" href=\"topics.php\" alt=\""._ALLTOPICS."\" title=\""._ALLTOPICS."\">\n"
     ."<area shape=\"rect\" coords=\"205,3,296,17\" href=\"download.php\" alt=\""._DOWNLOADS."\" title=\""._DOWNLOADS."\">\n"
     ."<area shape=\"rect\" coords=\"302,3,389,16\" href=\"submit.php\" alt=\""._SUBMITNEWS."\" title=\""._SUBMITNEWS."\">\n"
     ."<area shape=\"rect\" coords=\"394,3,474,16\" href=\"links.php\" alt=\""._LINKS."\" title=\""._LINKS."\">\n"
     ."</map>\n";
}
/************************************************************/
/* Function themeindex                                      */
/************************************************************/
function themeindex ($aid, $informant, $time, $title, $counter, $topic, $thetext, $notes, $morelink, $topicname, $topicimage, $topictext) {
    global $tipath, $anonymous;
    echo "<table width=\"99%\" border=\"0\" cellspacing=\"0\" cellpadding=\"6\">\n"
    ."<tr>\n"
    ."<td align=\"left\" valign=\"top\">\n"
    ."<table border=\"0\" cellspacing=\"0\" cellpadding=\"2\">\n"
    ."<tr>\n"
    ."<td valign=\"middle\" align=\"left\" width=\"28\"><img src=\"themes/K-winter/images/loupe.gif\" width=\"28\" height=\"14\" alt=\"\" border=\"0\"></td>\n"
    ."<td align=\"left\" valign=\"middle\"><font size=\"2\" face=\"Verdana, Arial, Helvetica, sans-serif\"><u><b>$title</b></u></font></td>\n"
    ."</tr>\n"
    ."</table>\n"
    ."</td>\n"
    ."</tr>\n"
    ."<tr>\n"
    ."<td align=\"left\" valign=\"top\" bgcolor=\"#eeeeee\" width=\"100%\"><font face=\"Arial, Helvetica, sans-serif\" size=\"2\"><a href=\"search.php?query=&amp;topic=$topic\"><img src=\"$tipath$topicimage\" border=\"0\" Alt=\"$topictext\" align=\"right\" hspace=\"5\" vspace=\"5\"></a>\n";
FormatStory($thetext, $notes, $aid, $informant);
    echo "</font></td></tr>\n"
    ."<tr>\n"
    ."<td bgcolor=\"#6699CC\" valign=\"middle\" align=\"left\"><font face=\"Arial, Helvetica, sans-serif\" size=\"2\">"._POSTEDBY." ";
    formatAidHeader($aid);
    echo " "._ON." $time $timezone ($counter "._READS.")<br>$morelink</font></td>\n"
    ."</tr>\n"
    ."</table>\n\n\n";
}
/************************************************************/
/* Function themearticle                                    */
/************************************************************/
function themearticle ($aid, $informant, $datetime, $title, $thetext, $topic, $topicname, $topicimage, $topictext) {
    global $admin, $sid, $tipath;
    echo "<table width=\"100%\" border=\"0\" cellspacing=\"0\" cellpadding=\"5\">\n"
    ."<tr>\n"
    ."<td align=\"left\" valign=\"top\">\n"
    ."<table border=\"0\" cellspacing=\"0\" cellpadding=\"2\">\n"
    ."<tr>\n"
    ."<td align=\"left\">\n"
    ."<font size=\"3\"><b>$title</b></font><br>\n"
    ."<font size=\"2\">"._POSTEDON." $datetime "._BY." ";
    formatAidHeader($aid);
    if (is_admin($admin)) {
    echo "<br>[ <a href=\"admin.php?op=EditStory&amp;sid=$sid\">"._EDIT."</a> | <a href=\"admin.php?op=RemoveStory&amp;sid=$sid\">"._DELETE."</a> ]\n";
}
    echo "</td>\n"
    ."</tr>\n"
    ."</table>\n"
    ."</td>\n"
    ."</tr>\n"
    ."<tr>\n"
    ."<td align=\"left\" valign=\"top\" bgcolor=\"#eeeeee\" width=\"100%\"><font face=\"Arial, Helvetica, sans-serif\" size=\"2\"><a href=\"search.php?query=&amp;topic=$topic\"><img src=\"$tipath$topicimage\" border=\"0\" Alt=\"$topictext\" align=\"right\" hspace=\"5\" vspace=\"5\"></a>\n";
FormatStory($thetext, $notes, $aid, $informant);
    echo "</font></td>\n"
    ."</tr>\n"

    ."</table>\n\n\n";
}

/************************************************************/
/* Function themesidebox                                    */
/************************************************************/
function themesidebox($title, $content) {
    echo "<table width=\"160\" border=\"0\" cellspacing=\"0\" cellpadding=\"2\">\n"
    ."<tr>\n"
    ."<td bgcolor=\"#6699CC\">\n"
    ."<table width=\"100%\" border=\"0\" cellspacing=\"0\" cellpadding=\"2\">\n"
    ."<tr>\n"
    ."<td width=\"14\" height=\"20\" valign=\"middle\" align=\"left\"><img src=\"themes/K-winter/images/box-fleche-titre.gif\" width=\"14\" height=\"20\" alt=\"\" border=\"0\"></td>\n"
    ."<td align=\"left\" valign=\"middle\" width=\"100%\">\n"
    ."<div align=\"left\"><font face=\"Verdana, Arial, Helvetica, sans-serif\" size=\"2\"><u><b>$title</b></u></font></div>\n"
    ."</td>\n"
    ."</tr>\n"
    ."</table>\n"
    ."</td>\n"
    ."</tr>\n"
    ."<tr><td>\n"
    ."$content\n"
    ."</td></tr></table>\n"
    ."<br>\n\n\n";
}

?>