<?php // $Id: theme.php,v 1.5.1 20/08/2001 16:35 kodred Exp $ $Name:  $
/************************************************************************/
/* K_Web_Os - LAYOUT FOR PostNUKE (http://www.postnuke.com)             */
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

$thename = "K_web_os";
$bgcolor1 = "#FFFFFF";
$bgcolor2 = "#FFCCC0";
$bgcolor3 = "#efefef";
$bgcolor4 = "#FFFFC0";
$textcolor1 = "#000000";
$textcolor2 = "#000000";
$postnuke_theme = true;

function OpenTable() {
    global $bgcolor1, $bgcolor2;
    echo "<table width=\"100%\" border=\"0\" cellspacing=\"0\" cellpadding=\"0\">\n"
    ."<tbody>\n"
    ."<tr>\n"
    ."<td width=\"8\"><img src=\"themes/K_web_os/images/box-top-left.gif\" width=\"8\" height=\"8\" alt=\"\" border=\"0\"></td>\n"
    ."<td width=\"100%\" class=\"boxtop\"><img src=\"themes/K_web_os/images/pix-transparent.gif\" width=\"1\" height=\"8\" alt=\"\" border=\"0\"></td>\n"
    ."<td width=\"8\"><img src=\"themes/K_web_os/images/box-top-right.gif\" width=\"8\" height=\"8\" alt=\"\" border=\"0\"></td>\n"
    ."</tr>\n"
    ."<tr>\n"
    ."<td class=\"boxleft\"><img src=\"themes/K_web_os/images/pix-transparent.gif\" width=\"8\" height=\"1\" alt=\"\" border=\"0\"></td>\n"
    ."<td valign=\"top\" bgcolor=\"$bgcolor1\">\n";
}

function CloseTable() {
    echo "</td>\n"
    ."<td class=\"boxright\"><img src=\"themes/K_web_os/images/pix-transparent.gif\" width=\"8\" height=\"1\" alt=\"\" border=\"0\"></td>\n"
    ."</tr>\n"
    ."<tr>\n"
    ."<td width=\"8\"><img src=\"themes/K_web_os/images/box-bot-left.gif\" width=\"8\" height=\"8\" alt=\"\" border=\"0\"></td>\n"
    ."<td class=\"boxbot\"><img src=\"themes/K_web_os/images/pix-transparent.gif\" width=\"1\" height=\"8\" alt=\"\" border=\"0\"></td>\n"
    ."<td width=\"8\"><img src=\"themes/K_web_os/images/box-bot-right.gif\" width=\"8\" height=\"8\" alt=\"\" border=\"0\"></td>\n"
    ."</tr>\n"
    ."</tbody>\n"
    ."</table>\n";
}

function OpenTable2() {
    global $bgcolor1, $bgcolor2;
     echo "<table border=\"0\" cellspacing=\"0\" cellpadding=\"0\">\n"
    ."<tbody>\n"
    ."<tr>\n"
    ."<td width=\"8\"><img src=\"themes/K_web_os/images/box-top-left.gif\" width=\"8\" height=\"8\" alt=\"\" border=\"0\"></td>\n"
    ."<td class=\"boxtop\"><img src=\"themes/K_web_os/images/pix-transparent.gif\" width=\"1\" height=\"8\" alt=\"\" border=\"0\"></td>\n"
    ."<td width=\"8\"><img src=\"themes/K_web_os/images/box-top-right.gif\" width=\"8\" height=\"8\" alt=\"\" border=\"0\"></td>\n"
    ."</tr>\n"
    ."<tr>\n"
    ."<td class=\"boxleft\"><img src=\"themes/K_web_os/images/pix-transparent.gif\" width=\"8\" height=\"1\" alt=\"\" border=\"0\"></td>\n"
    ."<td valign=\"top\" bgcolor=\"$bgcolor1\">\n";
}

function CloseTable2() {
    echo "</td>\n"
    ."<td class=\"boxright\"><img src=\"themes/K_web_os/images/pix-transparent.gif\" width=\"8\" height=\"1\" alt=\"\" border=\"0\"></td>\n"
    ."</tr>\n"
    ."<tr>\n"
    ."<td width=\"8\"><img src=\"themes/K_web_os/images/box-bot-left.gif\" width=\"8\" height=\"8\" alt=\"\" border=\"0\"></td>\n"
    ."<td class=\"boxbot\"><img src=\"themes/K_web_os/images/pix-transparent.gif\" width=\"1\" height=\"8\" alt=\"\" border=\"0\"></td>\n"
    ."<td width=\"8\"><img src=\"themes/K_web_os/images/box-bot-right.gif\" width=\"8\" height=\"8\" alt=\"\" border=\"0\"></td>\n"
    ."</tr>\n"
    ."</tbody>\n"
    ."</table>\n";
}

function FormatStory($thetext, $notes, $aid, $informant) {
    global $anonymous;
    if ($notes != "") {
    $notes = ""._NOTE." <i>$notes</i>\n";
    } else {
    $notes = "";
    }
    if ("$aid" == "$informant") {
    echo "$thetext<br>$notes\n";
    } else {
    $boxstuff .= "$thetext <br><br>$notes\n";
    echo "$boxstuff\n";
    }
}

/************************************************************/
/* Function themeheader()                                   */
/************************************************************/

function themeheader() {
    global $user, $banners, $sitename, $slogan, $cookie, $prefix;
    cookiedecode($user);
    $username = $cookie[1];
    if ($username == "") {
        $username = "Anonymous";
    }
    echo "</head><body>\n"
    ."<form action=\"search.php\" method=\"post\">\n"
    ."<table width=\"100%\" border=\"0\" cellspacing=\"0\" cellpadding=\"0\">\n"
    ."<tbody>\n"
    ."<tr>\n"
    ."<td width=\"300\"><img src=\"themes/K_web_os/images/logo.gif\" width=\"300\" height=\"60\" alt=\"\" border=\"0\"></td>\n"
    ."<td width=\"100%\" valign=\"bottom\" align=\"right\">\n"
    ."<table border=\"0\" cellspacing=\"0\" cellpadding=\"0\">\n"
    ."<tr>\n"
    ."<td class=\"headmenu\" valign=\"bottom\" align=\"right\"><a href=\"index.php\">"._INDEX."&nbsp;</a></td>\n"
    ."<td valign=\"bottom\"><img src=\"themes/K_web_os/images/menu-border-right.gif\" width=\"17\" height=\"17\" alt=\"\" border=\"0\"></td>\n"
    ."<td class=\"headmenu\" valign=\"bottom\" align=\"right\"><a href=\"modules.php?op=modload&amp;name=Topics&amp;file=index\">"._TOPICS."&nbsp;</a></td>\n"
    ."<td valign=\"bottom\"><img src=\"themes/K_web_os/images/menu-border-right.gif\" width=\"17\" height=\"17\" alt=\"\" border=\"0\"></td>\n"
    ."<td class=\"headmenu\" valign=\"bottom\" align=\"right\"><a href=\"modules.php?op=modload&amp;name=Downloads&amp;file=index\">"._UDOWNLOADS."&nbsp;</a></td>\n"
    ."<td valign=\"bottom\"><img src=\"themes/K_web_os/images/menu-border-right.gif\" width=\"17\" height=\"17\" alt=\"\" border=\"0\"></td>\n"
    ."<td class=\"headmenu\" valign=\"bottom\" align=\"right\"><a href=\"modules.php?op=modload&amp;name=Web_Links&amp;file=index\">"._LINKPAGETITLE."&nbsp;</a></td>\n"
    ."<td valign=\"bottom\"><img src=\"themes/K_web_os/images/menu-border-right.gif\" width=\"17\" height=\"17\" alt=\"\" border=\"0\"></td>\n"
    ."<td valign=\"bottom\" align=\"right\" class=\"headmenu\"><a href=\"modules.php?op=modload&amp;name=Submit_News&amp;file=index\">"._SUBMIT."&nbsp;</a></td>\n"
    ."<td valign=\"bottom\"><img src=\"themes/K_web_os/images/menu-border-right.gif\" width=\"17\" height=\"17\" alt=\"\" border=\"0\"></td>\n"
    ."</tr>\n"
    ."</table>\n"
    ."</td>\n"
    ."</tr>\n"
    ."<tr valign=\"middle\" align=\"left\">\n"
    ."<td class=\"headgreyline\">\n";
    if ($username == "Anonymous") {
        echo "&nbsp;&nbsp;"._RCREATEACCOUNT."\n";
    } else {
        echo "&nbsp;&nbsp;$username, "._WELCOMETO." $sitename";
    }
    echo "</td>\n"
    ."<td class=\"headgreyline\" align=\"right\">"._SEARCH.": <input name=\"query\" size=\"13\" class=\"formbut\">&nbsp;<input type=\"submit\" value=\""._GO."\" class=\"submitbut\">&nbsp;&nbsp;</td>\n"
    ."</tr>\n"
    ."</tbody>\n"
    ."</table>\n"
    ."</form>\n"
    ."<table width=\"100%\" border=\"0\" cellspacing=\"0\" cellpadding=\"0\">\n"
    ."<tbody>\n"
    ."<tr>\n"
    ."<td width=\"180\" valign=\"top\" align=\"center\">\n";
    blocks(left);
    echo "</td>\n"
    ."<td width=\"2\" class=\"redback\"><img src=\"themes/K_web_os/images/pix-transparent.gif\" width=\"2\" height=\"1\" alt=\"\" border=\"0\"></td>\n"
    ."<td valign=\"top\" align=\"center\" width=\"8\"><img src=\"themes/K_web_os/images/pix-transparent.gif\" width=\"8\" height=\"1\" alt=\"\" border=\"0\"></td>\n"
    ."<td valign=\"top\" align=\"center\">\n";
}
/************************************************************/
/* Function themefooter()                                   */
/************************************************************/

function themefooter() {
    global $index, $banners;
    echo "</td>\n"
    ."<td valign=\"top\" align=\"center\" width=\"8\"><img src=\"themes/K_web_os/images/pix-transparent.gif\" width=\"8\" height=\"1\" alt=\"\" border=\"0\"></td>\n";
    if ($index == 1) {
    echo "<td width=\"2\" class=\"redback\"><img src=\"themes/K_web_os/images/pix-transparent.gif\" width=\"2\" height=\"1\" alt=\"\" border=\"0\"></td>\n"
    ."<td width=\"180\" valign=\"top\" align=\"center\">\n";
    blocks(right);
    echo "</td>\n";
}
    echo "</tr>\n"
    ."</tbody>\n"
    ."</table>\n"
     ."<table width=\"100%\" border=\"0\" cellspacing=\"0\" cellpadding=\"4\">\n"
    ."<tr>\n"
    ."<td align=\"center\" valign=\"middle\">\n";
    if ($banners) {
        include("banners.php");
    }
    echo "</td>\n"
    ."</tr>\n"
    ."</table>\n"
    ."<table width=\"100%\" border=\"0\" cellspacing=\"0\" cellpadding=\"5\">\n"
    ."<tbody>\n"
    ."<tr>\n"
    ."<td valign=\"middle\" align=\"center\">\n";
    footmsg();
    echo "</td>\n";
    echo "</tr>\n"
    ."</tbody>\n"
    ."</table>\n"
    ."<br>\n";
}
/************************************************************/
/* themeindex                                               */
/************************************************************/

function themeindex ($aid, $informant, $time, $title, $counter, $topic, $thetext, $notes, $morelink, $topicname, $topicimage, $topictext) {
    global $anonymous, $tipath, $bgcolor1;
    if ($informant == "") {
    $informant = $anonymous;
}
Opentable();
    echo  "<table width=\"100%\" border=\"0\" cellspacing=\"0\" cellpadding=\"0\">\n"
    ."<tr>\n"
    ."<td class=\"newstitle\">$title</td>\n"
    ."</tr>\n"
    ."<tr>\n"
    ."<td class=\"pn-normal\" bgcolor=\"$bgcolor1\"><br><a href=\"search.php?query=&amp;topic=$topic\"><img src=\"$tipath$topicimage\" border=\"0\" Alt=\"$topictext\" align=\"right\" hspace=\"10\" vspace=\"10\"></a>\n";
    FormatStory($thetext, $notes, $aid, $informant);
    echo "<br><br><font class=\"pn-sub\">"._POSTEDBY." $informant "._ON." $time $timezone ($counter "._READS.")</font><br><br></td>\n"
    ."</tr>\n"
    ."<tr>\n"
    ."<td align=\"right\" valign=\"middle\" class=\"newsline\" width=\"100%\">\n"
    ."<table border=\"0\" cellspacing=\"0\" cellpadding=\"0\">\n"
    ."<tr>\n"
    ."<td class=\"newsmore\" valign=\"middle\" align=\"left\">$morelink</td>\n"
    ."</tr>\n"
    ."</table>\n"
    ."</td>\n"
    ."</tr>\n"
    ."</table>\n";
CloseTable();    
    echo "<br>\n\n\n";
}

/************************************************************/
/* themearticle                                             */
/************************************************************/

function themearticle ($aid, $informant, $datetime, $title, $thetext, $topic, $topicname, $topicimage, $topictext) {
    global $admin, $sid, $tipath, $bgcolor3, $bgcolor1;
    OpenTable();
    echo "<table border=\"0\" cellpadding=\"0\" cellspacing=\"0\" width=\"100%\"><tr><td>\n"
        ."<table border=\"0\" cellpadding=\"1\" cellspacing=\"0\" bgcolor=\"$bgcolor3\" width=\"100%\"><tr><td>\n"
        ."<table border=\"0\" cellpadding=\"3\" cellspacing=\"0\" bgcolor=\"$bgcolor1\" width=\"100%\"><tr><td align=\"left\">\n"
        ."<font class=\"pn-title\"><b>$title</b></font><br>\n"
        ."<font class=\"pn-sub\">"._POSTEDON." $datetime "._BY." $informant</font>\n";
    if (is_admin($admin)) {
        echo "<br><font class=\"pn-sub\">[ <a href=\"admin.php?op=EditStory&amp;sid=$sid\">"._EDIT."</a> | <a href=\"admin.php?op=RemoveStory&amp;sid=$sid\">"._DELETE."</a> ]</font>\n";
    }
    echo "</td></tr></table></td></tr></table><br>\n";
    echo "<a href=\"search.php?query=&amp;topic=$topic\"><img src=\"$tipath$topicimage\" border=\"0\" Alt=\"$topictext\" align=\"right\" hspace=\"10\" vspace=\"10\"></a>\n";
    FormatStory($thetext, $notes="", $aid, $informant);
    echo "</td></tr></table>\n";
    CloseTable();
    echo "<br>\n\n\n";
}

/************************************************************/
/* themesidebox                                             */
/************************************************************/

function themesidebox($block) {
    echo "<table width=\"170\" border=\"0\" cellspacing=\"0\" cellpadding=\"0\">\n"
    ."<tbody>\n"
    ."<tr>\n"
    ."<td>\n"
    ."<table width=\"170\" border=\"0\" cellspacing=\"0\" cellpadding=\"0\">\n"
    ."<tr>\n"
    ."<td width=\"8\"><img src=\"themes/K_web_os/images/box-top-left.gif\" width=\"8\" height=\"8\" alt=\"\" border=\"0\"></td>\n"
    ."<td width=\"100%\" class=\"boxtop\"><img src=\"themes/K_web_os/images/pix-transparent.gif\" width=\"1\" height=\"8\" alt=\"\" border=\"0\"></td>\n"
    ."<td width=\"8\"><img src=\"themes/K_web_os/images/box-top-right.gif\" width=\"8\" height=\"8\" alt=\"\" border=\"0\"></td>\n"
    ."</tr>\n"
    ."<tr>\n"
    ."<td class=\"boxleft\"><img src=\"themes/K_web_os/images/pix-transparent.gif\" width=\"8\" height=\"1\" alt=\"\" border=\"0\"></td>\n"
    ."<td class=\"boxtitle\" align=\"center\" valign=\"middle\">$block[title]</td>\n"
    ."<td class=\"boxright\"><img src=\"themes/K_web_os/images/pix-transparent.gif\" width=\"8\" height=\"1\" alt=\"\" border=\"0\"></td>\n"
    ."</tr>\n"
    ."<tr>\n"
    ."<td width=\"8\"><img src=\"themes/K_web_os/images/box-bot-left.gif\" width=\"8\" height=\"8\" alt=\"\" border=\"0\"></td>\n"
    ."<td class=\"boxbot\"><img src=\"themes/K_web_os/images/pix-transparent.gif\" width=\"1\" height=\"8\" alt=\"\" border=\"0\"></td>\n"
    ."<td width=\"8\"><img src=\"themes/K_web_os/images/box-bot-right.gif\" width=\"8\" height=\"8\" alt=\"\" border=\"0\"></td>\n"
    ."</tr>\n"
    ."</table>\n"
    ."</td>\n"
    ."</tr>\n"
    ."<tr>\n"
    ."<td><img src=\"themes/K_web_os/images/pix-transparent.gif\" width=\"1\" height=\"8\" alt=\"\" border=\"0\"></td>\n"
    ."</tr>\n"
    ."<tr>\n"
    ."<td class=\"pn-normal\">$block[content]</td>\n"
    ."</tr>\n"
    ."<tr>\n"
    ."<td><img src=\"themes/K_web_os/images/pix-transparent.gif\" width=\"1\" height=\"8\" alt=\"\" border=\"0\"></td>\n"
    ."</tr>\n"
    ."</tbody>\n"
    ."</table>\n\n\n";
}

?>