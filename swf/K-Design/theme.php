<?php
/**************************************************************/
/* K-Design copyright Kodred                                  */
/* Http://www.babylone6tem.com/~kodred                        */
/* contact: kodred@babylone6tem.com                           */
/* Released under the GNU/GPL license                         */
/**************************************************************/
/************************************************************/
/* Theme Colors Definition                                  */
/************************************************************/

$thename = "K-Design";
$bgcolor1 = "#ffffff";
$bgcolor2 = "#eeeeee";
$bgcolor3 = "#cccccc";
$bgcolor4 = "#cfcfcf";
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
        $notes = "<br><b>"._NOTE."</b> $notes\n";
    } else {
        $notes = "";
    }
    if ("$aid" == "$informant") {
        echo "$thetext<br>$notes\n";
    } else {
        if($informant != "") {
            $boxstuff = "<a href=\"user.php?op=userinfo&amp;uname=$informant\">$informant</a> ";
        } else {
            $boxstuff = "$anonymous ";
        }
        $boxstuff .= ""._WRITES." $thetext <br>$notes\n";
        echo "$boxstuff\n";
    }
}

/************************************************************/
/* Function themeheader()                                   */
/*                                                          */
/* Control the header for your site. You need to define the */
/* BODY tag and in some part of the code call the blocks    */
/* function for left side with: blocks(left);               */
/************************************************************/

function themeheader() {
    global $user, $banners, $sitename, $slogan, $cookie, $prefix;
    cookiedecode($user);
    $username = $cookie[1];
    if ($username == "") {
        $username = "Anonymous";
    }
    echo "<body>\n"
    ."<table width=\"100%\" border=\"0\" cellspacing=\"0\" cellpadding=\"0\">\n"
    ."<tr>\n"
    ."<td width=\"25\" height=\"100\"><img src=\"themes/K-Design/images/top-left.gif\" width=\"25\" height=\"100\" alt=\"\" border=\"0\" vspace=\"0\" hspace=\"0\"></td>\n"
    ."<td width=\"100%\" class=\"headerback\" valign=\"top\">\n"
    ."<table width=\"100%\" border=\"0\" cellspacing=\"0\" cellpadding=\"0\" class=\"headertable\">\n"
    ."<tr>\n"
    ."<td valign=\"top\" align=\"left\" width=\"219\"><a href=\"index.php\"><img src=\"themes/K-Design/images/logo.gif\" width=\"219\" height=\"70\" alt=\"Welcome on $sitename\" border=\"0\"></a></td>\n"
    ."<td align=\"right\" valign=\"top\">\n";
    if ($banners) {
    echo "<table border=\"0\" cellspacing=\"0\" cellpadding=\"2\" class=\"pub\">\n"
    ."<tr>\n"
    ."<td align=\"center\" valign=\"middle\">\n";
    include("banners.php");
    echo "</td>\n"
    ."</tr>\n"
    ."</table>\n";
}
    echo "</td>\n"
    ."</tr>\n"
    ."<tr>\n"
    ."<td class=\"headertablebot\" align=\"left\" valign=\"top\">\n";
    if ($username == "Anonymous") {
        echo "&nbsp;&nbsp;_RCREATEACCOUNT\n";
    } else {
        echo "&nbsp;&nbsp;"._HELLO." $username";
    }
    echo "</td>\n"
    ."<td class=\"headertablebot\" valign=\"top\" align=\"right\"><script type=\"text/javascript\">\n\n"
    ."var monthNames = new Array( \""._JAN."\",\""._FEB."\",\""._MAR."\",\""._APR."\",\""._MAY."\",\""._JUN."\",\""._JUL."\",\""._AUG."\",\""._SEP."\",\""._OCT."\",\""._NOV."\",\""._DEC."\");\n"
    ."var now = new Date();\n"
    ."thisYear = now.getYear();\n"
    ."if(thisYear < 1900) {thisYear += 1900}; // corrections if Y2K display problem\n"
    ."document.write(monthNames[now.getMonth()] + \" \" + now.getDate() + \" \" + thisYear);\n\n"
    ."</script></td>\n"
    ."</tr>\n"
    ."</table>\n"
    ."</td>\n"
    ."<td width=\"25\" height=\"100\"><img src=\"themes/K-Design/images/top-right.gif\" width=\"25\" height=\"100\" alt=\"\" border=\"0\" vspace=\"0\" hspace=\"0\"></td>\n"
    ."</tr>\n"
    ."</table>\n"
    ."<br>\n"
    ."<table width=\"100%\" border=\"0\" cellspacing=\"0\" cellpadding=\"0\">\n"
    ."<tr>\n"
    ."<td valign=\"bottom\" align=\"left\"><img src=\"themes/K-Design/images/nav-top.gif\" width=\"570\" height=\"26\" usemap=\"#Map\" alt=\"\" border=\"0\"></td>\n"
    ."</tr>\n"
    ."<tr>\n"
    ."<td>\n"
    ."<table width=\"100%\" cellspacing=\"0\" cellpadding=\"0\" bgcolor=\"#003366\">\n"
    ."<tr>\n"
    ."<td align=\"right\" class=\"searchform\">\n";
     if ($username == "Anonymous") {
        echo "&nbsp;\n";
    } else {
        echo "<a href=\"user.php?op=logout\">| "._LOGOUT." |</a>&nbsp;&nbsp;";
    }
    echo "</td>\n"
    ."</tr>\n"
    ."</table>\n"
    ."</td>\n"
    ."</tr>\n"
    ."</table>\n"
    ."<table width=\"100%\" border=\"0\" cellspacing=\"0\" cellpadding=\"4\" bgcolor=\"#000000\">\n"
    ."<tr>\n"
    ."<td align=\"center\" valign=\"middle\">\n"
    ."<table width=\"100%\" border=\"0\" cellspacing=\"0\" cellpadding=\"0\" bgcolor=\"#FFFFFF\">\n"
    ."<tr>\n"
    ."<td width=\"170\" valign=\"top\" align=\"center\"><img src=\"themes/K-Design/images/pix-transparent.gif\" width=\"170\" height=\"10\" alt=\"\" border=\"0\">\n";
    blocks(left);
    echo "</td>\n"
    ."<td width=\"10\" class=\"tiret\"><img src=\"themes/K-Design/images/pix-transparent.gif\" width=\"10\" height=\"1\" alt=\"\" border=\"0\"></td>\n"
    ."<td width=\"100%\" align=\"left\" valign=\"top\"><img src=\"themes/K-Design/images/pix-transparent.gif\" width=\"1\" height=\"10\" alt=\"\" border=\"0\">\n";
}

/************************************************************/
/* Function themefooter()                                   */
/************************************************************/

function themefooter() {
    global $index;
    if ($index == 1) {
    echo "</td>\n"
    ."<td width=\"10\" class=\"tiret\"><img src=\"themes/K-Design/images/pix-transparent.gif\" width=\"10\" height=\"1\" alt=\"\" border=\"0\"></td>\n"
    ."<td width=\"170\" valign=\"top\" align=\"center\"><img src=\"themes/K-Design/images/pix-transparent.gif\" width=\"170\" height=\"10\" alt=\"\" border=\"0\">\n";
    blocks(right);
}
    echo "</td>\n"
    ."</tr>\n"
    ."<tr>\n"
    ."<td colspan=\"5\" class=\"blackline\"><img src=\"themes/K-Design/images/pix-transparent.gif\" width=\"1\" height=\"4\" alt=\"\" border=\"0\"></td>\n"
    ."</tr>\n"
    ."<tr valign=\"middle\" align=\"center\">\n"
    ."<td colspan=\"5\" class=\"copyright\"><font face=\"Verdana, Arial, Helvetica, sans-serif\" size=\"1\">| <a href=\"index.php\">"._MAIN."</a> | <a href=\"sections.php\">"._SECTIONS."</a> | <a href=\"download.php\">"._DOWNLOADS."</a> | <a href=\"submit.php\">"._SUBMITNEWS."</a> | <a href=\"top.php\">"._TOP10."</a> |</font></td>\n"
    ."</tr>\n"
    ."</table>\n"
    ."</td>\n"
    ."</tr>\n"
    ."</table>\n"
    ."<div align=\"center\"><br>\n";
    footmsg();
    echo "<br></div>\n"
    ."<map name=\"Map\">\n"
    ."<area shape=\"rect\" coords=\"2,3,72,23\" href=\"index.php\" alt=\""._MAIN."\" title=\""._MAIN."\">\n"
    ."<area shape=\"rect\" coords=\"79,4,169,22\" href=\"user.php\" alt=\""._ACCOUNT."\" title=\""._ACCOUNT."\">\n"
    ."<area shape=\"rect\" coords=\"183,2,283,24\" href=\"download.php\" alt=\""._DOWNLOADS."\" title=\""._DOWNLOADS."\">\n"
    ."<area shape=\"rect\" coords=\"298,3,390,23\" href=\"links.php\" alt=\""._LINKS."\" title=\""._LINKS."\">\n"
    ."<area shape=\"rect\" coords=\"406,3,483,23\" href=\"submit.php\" alt=\""._SUBMITNEWS."\" title=\""._SUBMITNEWS."\">\n"
    ."<area shape=\"rect\" coords=\"493,3,565,23\" href=\"top.php\" alt=\""._TOP10."\" title=\""._TOP10."\">\n"
    ."</map>\n";
}

/************************************************************/
/* Function themeindex                                      */
/************************************************************/

function themeindex ($aid, $informant, $time, $title, $counter, $topic, $thetext, $notes, $morelink, $topicname, $topicimage, $topictext) {
    global $anonymous, $tipath;
    echo   "<table width=\"100%\" border=\"0\" cellspacing=\"0\" cellpadding=\"0\">\n"
    ."<tr>\n"
    ."<td valign=\"bottom\" align=\"center\">\n"
    ."<table border=\"0\" cellspacing=\"0\" cellpadding=\"0\">\n"
    ."<tr>\n"
    ."<td width=\"10\" valign=\"bottom\"><img src=\"themes/K-Design/images/titre-left.gif\" width=\"10\" height=\"20\" alt=\"\" border=\"0\"></td>\n"
    ."<td class=\"boxtitretop\" valign=\"middle\">$title</td>\n"
    ."<td width=\"10\" valign=\"bottom\"><img src=\"themes/K-Design/images/titre-right.gif\" width=\"10\" height=\"20\" alt=\"\" border=\"0\"></td>\n"
    ."</tr>\n"
    ."</table>\n"
    ."</td>\n"
    ."</tr>\n"
    ."<tr>\n"
    ."<td>\n"
    ."<table width=\"100%\" border=\"0\" cellspacing=\"0\" cellpadding=\"0\">\n"
    ."<tr>\n"
    ."<td width=\"24\" valign=\"top\"><img src=\"themes/K-Design/images/titre-news-left.gif\" width=\"24\" height=\"13\" alt=\"\" border=\"0\" vspace=\"0\" hspace=\"0\"></td>\n"
    ."<td width=\"100%\" class=\"newsbacktop\" valign=\"top\"><img src=\"themes/K-Design/images/pix-transparent.gif\" width=\"1\" height=\"13\" alt=\"\" border=\"0\"></td>\n"
    ."<td width=\"24\" valign=\"top\"><img src=\"themes/K-Design/images/titre-news-right.gif\" width=\"24\" height=\"13\" alt=\"\" vspace=\"0\" hspace=\"0\" border=\"0\"></td>\n"
    ."</tr>\n"
    ."</table>\n"
    ."</td>\n"
    ."</tr>\n"
    ."<tr>\n"
    ."<td align=\"center\">\n"
    ."<table width=\"100%\" border=\"0\" cellspacing=\"0\" cellpadding=\"0\">\n"
    ."<tr>\n"
    ."<td width=\"24\"><img src=\"themes/K-Design/images/pix-transparent.gif\" width=\"24\" height=\"1\" alt=\"\" border=\"0\"></td>\n"
    ."<td width=\"100%\">\n"
    ."<table width=\"100%\" border=\"0\" cellspacing=\"0\" cellpadding=\"1\" bgcolor=\"#000000\">\n"
    ."<tr>\n"
    ."<td valign=\"top\" align=\"center\">\n"
    ."<table width=\"100%\" border=\"0\" cellspacing=\"0\" cellpadding=\"4\" bgcolor=\"#FFFFFF\">\n"
    ."<tr>\n"
    ."<td valign=\"top\" align=\"left\" class=\"newstexte\"><a href=\"search.php?query=&amp;topic=$topic\"><img src=\"$tipath$topicimage\" border=\"0\" Alt=\"$topictext\" align=\"right\" hspace=\"10\" vspace=\"10\"></a>\n";
     FormatStory($thetext, $notes, $aid, $informant);
    echo "<br>"._POSTEDBY." ";
    formatAidHeader($aid);
    echo " "._ON." $time $timezone ($counter "._READS.")<br></td>\n"
    ."</tr>\n"
    ."</table>\n"
    ."</td>\n"
    ."</tr>\n"
    ."</table>\n"
    ."</td>\n"
    ."<td><img src=\"themes/K-Design/images/pix-transparent.gif\" width=\"24\" height=\"1\" alt=\"\" border=\"0\"></td>\n"
    ."</tr>\n"
    ."</table>\n"
    ."</td>\n"
    ."</tr>\n"
    ."<tr>\n"
    ."<td>\n"
    ."<table width=\"100%\" border=\"0\" cellspacing=\"0\" cellpadding=\"1\" bgcolor=\"#000000\">\n"
    ."<tr>\n"
    ."<td valign=\"top\" align=\"center\">\n"
    ."<table width=\"100%\" border=\"0\" cellspacing=\"0\" cellpadding=\"2\" bgcolor=\"#FFFFFF\">\n"
    ."<tr>\n"
    ."<td valign=\"top\" align=\"left\" class=\"newsmore\">$morelink</td>\n"
    ."</tr>\n"
    ."</table>\n"
    ."</td>\n"
    ."</tr>\n"
    ."</table>\n"
    ."</td>\n"
    ."</tr>\n"
    ."</table>\n"
    ."<br>\n\n\n";
}

/************************************************************/
/* Function themearticle                                    */
/************************************************************/

function themearticle ($aid, $informant, $datetime, $title, $thetext, $topic, $topicname, $topicimage, $topictext) {
    global $admin, $sid, $tipath;
    echo "<table border=\"0\" cellspacing=\"0\" cellpadding=\"2\" align=\"center\">\n"
    ."<tr>\n"
    ."<td valign=\"bottom\" align=\"left\" width=\"20\"><img src=\"themes/K-Design/images/loupe.gif\" width=\"20\" height=\"19\" alt=\"\" border=\"0\"></td>\n"
    ."<td align=\"left\"><b><u>$title</u></b></td>\n"
    ."</tr>\n"
    ."</table>\n"
    ."<table border=\"0\" cellspacing=\"0\" cellpadding=\"0\" width=\"100%\">\n"
    ."<tr>\n"
    ."<td width=\"20\"><img src=\"themes/K-Design/images/article-line-left.gif\" width=\"20\" height=\"16\" alt=\"\" border=\"0\"></td>\n"
    ."<td width=\"100%\" class=\"articletopback\"><img src=\"themes/K-Design/images/pix-transparent.gif\" width=\"1\" height=\"16\" alt=\"\" border=\"0\"></td>\n"
    ."<td width=\"20\"><img src=\"themes/K-Design/images/article-line-right.gif\" width=\"20\" height=\"16\" alt=\"\" border=\"0\"></td>\n"
    ."</tr>\n"
    ."</table>\n"
    ."<table width=\"95%\" border=\"0\" cellspacing=\"0\" cellpadding=\"4\" align=\"center\">\n"
    ."<tr>\n"
    ."<td class=\"newstexte\">"._POSTEDON." $datetime "._BY." ";
    formatAidHeader($aid);
    if (is_admin($admin)) {
        echo "<br>[ <a href=\"admin.php?op=EditStory&amp;sid=$sid\">"._EDIT."</a> | <a href=\"admin.php?op=RemoveStory&amp;sid=$sid\">"._DELETE."</a> ]\n";
}
    echo "</td>\n"
    ."</tr>\n"
    ."<tr>\n"
    ."<td>\n"
    ."<table width=\"100%\" border=\"0\" cellspacing=\"0\" cellpadding=\"0\" class=\"articleline\">\n"
    ."<tr>\n"
    ."<td width=\"100%\"><img src=\"themes/K-Design/images/pix-transparent.gif\" width=\"1\" height=\"2\" alt=\"\"></td>\n"
    ."</tr>\n"
    ."</table>\n"
    ."</td>\n"
    ."</tr>\n"
    ."<tr>\n"
    ."<td class=\"newstexte\">\n";
    echo "<a href=\"search.php?query=&amp;topic=$topic\"><img src=\"$tipath$topicimage\" border=\"0\" Alt=\"$topictext\" align=\"right\" hspace=\"10\" vspace=\"10\"></a>\n";
    FormatStory($thetext, $notes="", $aid, $informant);
    echo "</td>\n"
    ."</tr>\n"
    ."<tr>\n"
    ."<td>\n"
    ."<table width=\"100%\" border=\"0\" cellspacing=\"0\" cellpadding=\"0\" class=\"articleline\">\n"
    ."<tr>\n"
    ."<td width=\"100%\"><img src=\"themes/K-Design/images/pix-transparent.gif\" width=\"1\" height=\"2\" alt=\"\"></td>\n"
    ."</tr>\n"
    ."</table>\n"
    ."</td>\n"
    ."</tr>\n"
    ."</table><br>\n\n\n";
}

/************************************************************/
/* Function themesidebox                                    */
/************************************************************/

function themesidebox($title, $content) {
    echo  "<table width=\"160\" border=\"0\" cellspacing=\"0\" cellpadding=\"0\">\n"
    ."<tr>\n"
    ."<td>\n"
    ."<table border=\"0\" cellspacing=\"0\" cellpadding=\"0\">\n"
    ."<tr>\n"
    ."<td class=\"boxverticalleft\"><img src=\"themes/K-Design/images/pix-transparent.gif\" width=\"2\" height=\"1\" alt=\"\" border=\"0\"></td>\n"
    ."<td width=\"14\" class=\"boxtitretop\"><img src=\"themes/K-Design/images/folder-box.gif\" width=\"14\" height=\"15\" alt=\"\" border=\"0\"></td>\n"
    ."<td class=\"boxtitretop\">&nbsp;$title</td>\n"
    ."<td width=\"10\" valign=\"top\"><img src=\"themes/K-Design/images/titre-right.gif\" width=\"10\" height=\"20\" alt=\"\" border=\"0\"></td>\n"
    ."</tr>\n"
    ."</table>\n"
    ."</td>\n"
    ."</tr>\n"
    ."<tr>\n"
    ."<td>\n"
    ."<table width=\"160\" border=\"0\" cellspacing=\"0\" cellpadding=\"2\" bgcolor=\"#000000\">\n"
    ."<tr>\n"
    ."<td>\n"
    ."<table width=\"160\" border=\"0\" cellspacing=\"0\" cellpadding=\"2\" bgcolor=\"#FFFFFF\">\n"
    ."<tr>\n"
    ."<td class=\"boxtexte\">$content</td>\n"
    ."</tr>\n"
    ."</table>\n"
    ."</td>\n"
    ."</tr>\n"
    ."<tr>\n"
    ."<td class=\"boxbottom\"><img src=\"themes/K-Design/images/pix-transparent.gif\" width=\"1\" height=\"6\" alt=\"\" border=\"0\"></td>\n"
    ."</tr>\n"
    ."</table>\n"
    ."</td>\n"
    ."</tr>\n"
    ."</table>\n"
    ."<br>\n\n\n";
}

?>