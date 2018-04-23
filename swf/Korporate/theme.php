<?php // $Id: theme.php,v 1.5.1 20/08/2001 16:39 kodred Exp $ $Name:  $
global $thename;
/************************************************************************/
/* Korporate - LAYOUT FOR PostNUKE (http://postnuke.com)                */
/* Copyright (C) 2001 collet Stephane Aka KodRed                        */
/* kodred@babylone6tem.com                                              */
/* http://www.babylone6tem.com                                          */
/*                                                                      */
/* This program is free software; you can redistribute it and/or        */
/* modify it under the terms of the GNU General Public License          */
/* as published by the Free Software Foundation; either version 2       */
/* of the License, or any later version.                                */
/*                                                                      */
/* This program is distributed in the hope that it will be useful,      */
/* but WITHOUT ANY WARRANTY; without even the implied warranty of       */
/* MERCHANTABILITY or FITNESS FOR A PARTICULAR PURPOSE.  See the        */
/* GNU General Public License for more details.                         */
/*                                                                      */
/* You should have received a copy of the GNU General Public License    */
/* along with this program; if not, write to the Free Software          */
/* Foundation, Inc., 59 Temple Place - Suite 330, Boston,               */
/* MA  02111-1307, USA.                                                 */
/************************************************************************/
/************************************************************/
/* Settings                                                 */
/************************************************************/
$thename = "Korporate";// The name of your Theme (Name of the theme = The theme folder name)
/************************************************************/
/* Theme Colors Definition                                  */
/************************************************************/
$bgcolor1 = "#eeeeee";
$bgcolor2 = "#B1B2CB";
$bgcolor3 = "#CCCCCC";
$bgcolor4 = "#BBBCED";
$textcolor1 = "#000000";
$textcolor2 = "#000000";
$postnuke_theme = true;

function OpenTable() {
    global $bgcolor1, $bgcolor2;
    echo "<table width=\"100%\" border=\"0\" cellspacing=\"1\" cellpadding=\"0\"><tr><td class=\"tableborder\">\n";
    echo "<table width=\"100%\" border=\"0\" cellspacing=\"1\" cellpadding=\"8\"><tr><td class=\"backtable\">\n";
}

function CloseTable() {
    echo "</td></tr></table></td></tr></table>\n";
}

function OpenTable2() {
    global $bgcolor1, $bgcolor2;
    echo "<table border=\"0\" cellspacing=\"1\" cellpadding=\"0\" align=\"center\"><tr><td class=\"tableborder\">\n";
    echo "<table border=\"0\" width=\"100%\" cellspacing=\"1\" cellpadding=\"8\"><tr><td class=\"backtable\">\n";
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
        echo "<font class=\"pn-normal\">$thetext<br>$notes</font>\n";
    } else {
        if($informant != "") {
            $boxstuff = "<a href=\"user.php?op=userinfo&amp;uname=$informant\">$informant</a> ";
        } else {
            $boxstuff = "$anonymous ";
        }
        $boxstuff .= ""._WRITES.": $thetext<br>$notes\n";
        echo "<font class=\"pn-normal\">$boxstuff</font>\n";
    }
}

/************************************************************/
/* Function themeheader()                                   */
/************************************************************/

function themeheader() {
    global $user, $banners, $sitename, $slogan, $cookie, $prefix, $index, $thename;
    cookiedecode($user);
    $username = $cookie[1];
    if ($username == "") {
        $username = "Anonymous";
    }
    echo "</head><body>\n"
    ."<form action=\"search.php\" method=\"post\">\n"
    ."<table cellspacing=\"0\" cellpadding=\"0\" width=\"100%\" border=\"0\">\n"
    ."<tbody>\n"
    ."<tr>\n"
    ."<td class=\"header\" valign=\"bottom\"><img height=\"33\" alt=\"\" src=\"themes/$thename/images/back-header-left.gif\" width=\"350\" border=\"0\"></td>\n"
    ."<td class=\"header\" align=\"right\" width=\"100%\"><input name=\"query\" size=\"14\" class=\"formbut\">&nbsp;<input type=\"submit\" value=\""._SEARCH."\" class=\"submitbut\">&nbsp;&nbsp;</td>\n"
    ."</tr>\n"
    ."<tr>\n"
    ."<td valign=\"top\"><a href=\"index.php\"><img src=\"themes/$thename/images/logo.gif\" width=\"350\" height=\"40\" border=\"0\" alt=\""._WELCOMETO." $sitename\"></a></td>\n"
    ."<td align=\"right\" valign=\"middle\" class=\"more\">\n";
    if ($username == "Anonymous") {
        echo "<a href=\"user.php\">"._REGISTERNOW."</a>&nbsp;&nbsp;\n";
    } else {
        echo ""._YOUARELOGGED." $username&nbsp;&nbsp;";
    }
    echo "</td>\n"
    ."</tr>\n"
    ."</tbody>\n"
    ."</table>\n"
    ."</form>\n"
    ."<table width=\"100%\" border=\"0\" cellspacing=\"0\" cellpadding=\"0\">\n"
    ."<tr>\n"
    ."<td valign=\"top\" width=\"170\">\n"
    ."<table cellspacing=\"0\" cellpadding=\"0\" width=\"170\" border=\"0\">\n"
    ."<tbody>\n"
    ."<tr>\n"
    ."<td class=\"header\" width=\"10\"><img src=\"themes/$thename/images/pix-transparent.gif\" width=\"10\" height=\"1\" alt=\"\"></td>\n"
    ."<td valign=\"top\">\n";
    blocks(left);
    echo "</td>\n"
    ."</tr>\n"
    ."<tr>\n"
    ."<td valign=\"top\" width=\"10\"><img src=\"themes/$thename/images/cap.gif\" width=\"10\" height=\"12\" alt=\"\"></td>\n"
    ."<td><img src=\"themes/$thename/images/pix-transparent.gif\" width=\"1\" height=\"1\" alt=\"\"></td>\n"
    ."</tr>\n"
    ."</tbody>\n"
    ."</table>\n"
    ."</td>\n"
    ."<td width=\"2\" class=\"tiretleft\"><img src=\"themes/$thename/images/pix-transparent.gif\" width=\"2\" height=\"1\" alt=\"\" border=\"0\"></td>\n"
    ."<td width=\"10\"><img src=\"themes/$thename/images/pix-transparent.gif\" width=\"10\" height=\"1\" alt=\"\" border=\"0\"></td>\n"
    ."<td width=\"100%\" valign=\"top\" align=\"center\">\n";
}
/************************************************************/
/* Function themefooter                                     */
/************************************************************/
    function themefooter() {
    global $index, $banners, $thename;

    echo "</td>\n"
    ."<td align=\"center\" valign=\"top\" width=\"10\"><img src=\"themes/$thename/images/pix-transparent.gif\" width=\"10\" height=\"1\" alt=\"\"></td>\n";
    if ($index == 1) {
    echo "<td width=\"2\" class=\"tiretleft\"><img src=\"themes/$thename/images/pix-transparent.gif\" width=\"2\" height=\"1\" alt=\"\" border=\"0\"></td>\n"
    ."<td valign=\"top\" align=\"right\">\n";
    blocks(right);
    echo "</td>\n";
}
    echo "</tr>\n"
    ."</table>\n"
    ."<br>\n"
    ."<table width=\"90%\" border=\"0\" cellspacing=\"0\" cellpadding=\"0\" align=\"center\">\n"
    ."<tr>\n"
    ."<td valign=\"middle\" align=\"center\" class=\"copyright\">\n";
    if ($banners) {
        include("banners.php");
}
    echo "<br>\n";
    footmsg();
    echo "<br><br>\n"
    ."</td>\n"
    ."</tr>\n"
    ."</table>\n";
}

/************************************************************/
/* Function themeindex                                      */
/************************************************************/

function themeindex ($aid, $informant, $time, $title, $counter, $topic, $thetext, $notes, $morelink, $topicname, $topicimage, $topictext) {
    global $anonymous, $tipath;
     if ($informant == "") {
        $informant = $anonymous;
     }
    echo "<table width=\"100%\" border=\"0\" cellspacing=\"0\" cellpadding=\"6\">\n"
        ."<tr>\n"
        ."<td class=\"titlenews\">$title</td>\n"
        ."</tr>\n"
        ."</table>\n"
        ."<table width=\"100%\" border=\"0\" cellspacing=\"0\" cellpadding=\"3\">\n"
        ."<tr>\n"
        ."<td><a href=\"search.php?query=&amp;topic=$topic\"><img src=\"$tipath$topicimage\" border=\"0\" Alt=\"$topictext\" align=\"right\" hspace=\"10\" vspace=\"10\"></a>\n";
    FormatStory($thetext, $notes, $aid, $informant);
    echo "<br>\n"
        ."<font class=\"pn-sub\">"._POSTEDBY.":&nbsp;$informant&nbsp;"._ON." $time $timezone ($counter "._READS.")</font></td>\n"
        ."</tr>\n"
        ."</table>\n"
        ."<table width=\"100%\" border=\"0\" cellspacing=\"0\" cellpadding=\"3\">\n"
        ."<tr>\n"
        ."<td class=\"more\">$morelink</td>\n"
        ."</tr>\n"
        ."<tr>\n"
        ."<td class=\"horizontalback\" width=\"100%\">&nbsp;</td>\n"
        ."</tr>\n"
        ."</table>\n\n\n";
}

/************************************************************/
/* Function themearticle()                                  */
/************************************************************/

function themearticle ($aid, $informant, $datetime, $title, $thetext, $topic, $topicname, $topicimage, $topictext) {
    global $admin, $sid, $tipath;
        echo "<table width=\"100%\" border=\"0\" cellspacing=\"0\" cellpadding=\"4\">\n"
    ."<tr>\n"
    ."<td class=\"titlenews\">$title<br>\n";
    if (is_admin($admin)) {
        echo "<font class=\"more\">[ <a href=\"admin.php?op=EditStory&amp;sid=$sid\">"._EDIT."</a> | <a href=\"admin.php?op=RemoveStory&amp;sid=$sid\">"._DELETE."</a> ]</font>\n";
}
        echo "</td>\n"
        ."</tr>\n"
        ."</table>\n"
        ."<table width=\"100%\" border=\"0\" cellspacing=\"0\" cellpadding=\"3\">\n"
        ."<tr>\n"
        ."<td class=\"pn-normal\"><a href=\"search.php?query=&amp;topic=$topic\"><img src=\"$tipath$topicimage\" border=\"0\" Alt=\"$topictext\" align=\"right\" hspace=\"10\" vspace=\"10\"></a>\n";
    FormatStory($thetext, $notes, $aid, $informant);
        echo "</td>\n"
        ."</tr>\n"
        ."</table>\n"
        ."<table width=\"100%\" border=\"0\" cellspacing=\"0\" cellpadding=\"3\">\n"
        ."<tr>\n"
        ."<td class=\"more\">"._POSTEDBY.":&nbsp;$informant<br><br></td>\n"
        ."</tr>\n"
        ."<tr>\n"
        ."<td class=\"horizontalback\" width=\"100%\">&nbsp;</td>\n"
        ."</tr>\n"
        ."</table>\n\n\n";
}


/************************************************************/
/* Function themesidebox                                    */
/************************************************************/

function themesidebox($block) {
    global $thename;
    echo "<table width=\"160\" border=\"0\" cellspacing=\"0\" cellpadding=\"0\" bgcolor=\"#FFFFFF\">\n"
    ."<tr>\n"
    ."<td width=\"5\" class=\"boxtitle\"><img src=\"themes/$thename/images/boxmark.gif\" width=\"5\" height=\"21\" alt=\"\"></td>\n"
    ."<td class=\"boxtitle\" align=\"left\" valign=\"middle\">&nbsp;$block[title]</td>\n"
    ."</tr>\n"
    ."<tr>\n"
    ."<td width=\"5\"><img src=\"themes/$thename/images/pix-transparent.gif\" width=\"5\" height=\"1\" alt=\"\"></td>\n"
    ."<td valign=\"top\" align=\"left\" class=\"pn-normal\">$block[content]</td>\n"
    ."</tr>\n"
    ."</table>\n"
    ."<br>\n\n\n";
}

?>