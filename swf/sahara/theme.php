<?php // $Id: theme.php,v 1.5.1 20/08/2001 16:40 kodred Exp $ $Name:  $
/************************************************************************/
/* sahara - LAYOUT FOR PostNUKE (http://www.postnuke.com)               */
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
global $kbarmenu, $bgcolor5, $thename;
$thename = "sahara";
$bgcolor1 = "#f7f6e6";
$bgcolor2 = "#CC9933";
$bgcolor3 = "#ffcc00";
$bgcolor4 = "#FFCC66";
$bgcolor5 = "#000000";
$textcolor1 = "#000000";
$textcolor2 = "#000000";
$postnuke_theme = true;

// THIS is The Navigation Menu
$kbarmenu = "<B><A HREF=\"index.php\">"._INDEX."</A>
| <A HREF=\"modules.php?op=modload&amp;name=Topics&amp;file=index\">"._TOPICS."</A>
| <A HREF=\"modules.php?op=modload&amp;name=Reviews&amp;file=index\">"._REVIEWS."</A>
| <A HREF=\"modules.php?op=modload&amp;name=Sections&amp;file=index\">"._SSECTIONS."</A>
| <A HREF=\"modules.php?op=modload&amp;name=Downloads&amp;file=index\">"._UDOWNLOADS."</A>
| <A HREF=\"modules.php?op=modload&amp;name=Web_Links&amp;file=index\">"._WEBLINKS."</A>
| <A HREF=\"modules.php?op=modload&amp;name=Submit_News&amp;file=index\">"._SUBMITNEWS."</A></B>";

function OpenTable() {
    global $bgcolor1, $bgcolor2;
    echo "<table width=\"100%\" border=\"0\" cellspacing=\"1\" cellpadding=\"0\"><tr><td>\n";
    echo "<table width=\"100%\" border=\"0\" cellspacing=\"1\" cellpadding=\"8\"><tr><td>\n";
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
    $notes = ""._NOTE."<i>$notes</i>\n";
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

function themeheader() {
global $user, $thename, $username, $banners, $sitename, $slogan, $cookie, $prefix, $kbarmenu, $bgcolor5, $bgcolor4, $bgcolor1;
cookiedecode($user);
$username = $cookie[1];
if ($username == "") {
$username = "Anonymous";
}
    echo "</head><body>\n"
    ."<table width=\"100%\" border=\"0\" cellspacing=\"0\" cellpadding=\"2\" bgcolor=\"$bgcolor5\">\n"
    ."<tr>\n"
    ."<td align=\"center\" valign=\"middle\">\n"
    ."<table cellspacing=\"0\" cellpadding=\"2\" width=\"100%\" border=\"0\" bgcolor=\"$bgcolor4\">\n"
    ."<tr>\n"
    ."<td align=\"left\" class=\"Marronfonce\">&nbsp;<b>$sitename - $slogan</b></td>\n"
    ."<td align=\"right\" class=\"Marronfonce\"><a href=\"index.php\"><img src=\"themes/$thename/images/logo.gif\" width=\"200\" height=\"30\" alt=\""._WELCOMETO." $sitename\" border=\"0\"></a>&nbsp;</td>\n"
    ."</tr>\n"
    ."<tr>\n"
    ."<td width=\"65%\" valign=\"top\" align=\"left\" class=\"marronclair\"><b>\n";
    if ($username == "Anonymous") {
        echo "&nbsp;&nbsp;<a href=\"user.php\">"._LOGINCREATE."</a>\n";
    } else {
        echo "&nbsp;&nbsp;"._YOUARELOGGED." <b>$username</b>. [ <a href=\"user.php?op=logout\">"._LOGOUT."</a> ]";
    }
    echo "</b></td>\n"
    ."<td align=\"right\" width=\"35%\" valign=\"top\" class=\"marronclair\"><form action=\"search.php\" method=\"post\"><b>"._SEARCH." </b>\n"
    ."<input type=\"text\" name=\"query\" size=\"12\" class=\"formbut\">&nbsp;&nbsp;</form>\n"
    ."</td>\n"
    ."</tr>\n"
    ."<tr align=\"center\" valign=\"middle\">\n"
    ."<td colspan=\"2\" class=\"greytop\">$kbarmenu</td>\n"
    ."</tr>\n"
    ."</table>\n"
    ."</td>\n"
    ."</tr>\n"
    ."</table>\n"
    ."<table width=\"100%\" border=\"0\" cellspacing=\"0\" cellpadding=\"2\" bgcolor=\"$bgcolor5\">\n"
    ."<tr>\n"
    ."<td align=\"center\" valign=\"middle\">\n"
    ."<table width=\"100%\" border=\"0\" cellspacing=\"0\" cellpadding=\"0\" bgcolor=\"$bgcolor1\">\n"
    ."<tr>\n"
    ."<td align=\"center\" valign=\"top\" width=\"160\"><img src=\"themes/$thename/images/pix-transparent.gif\" width=\"160\" height=\"1\" alt=\"\" border=\"0\"><br>\n"
    ."<br>\n";
    blocks(left);
    echo "</td>\n"
    ."<td width=\"3\" class=\"blackline\"><img src=\"themes/$thename/images/pix-transparent.gif\" width=\"3\" height=\"1\" alt=\"\" border=\"0\"></td>\n"
    ."<td width=\"3\"><img src=\"themes/$thename/images/pix-transparent.gif\" width=\"3\" height=\"1\" alt=\"\" border=\"0\"></td>\n"
    ."<td align=\"center\" valign=\"top\" width=\"100%\"><br>\n";
}
    function themefooter() {
    global $index, $banners, $thename;
    if ($index == 1) {
    echo "</td>\n"
    ."<td width=\"3\" class=\"blackline\"><img src=\"themes/$thename/images/pix-transparent.gif\" width=\"3\" height=\"1\" alt=\"\" border=\"0\"></td>\n"
    ."<td align=\"center\" valign=\"top\" width=\"160\"><img src=\"themes/$thename/images/pix-transparent.gif\" width=\"160\" height=\"1\" alt=\"\" border=\"0\"><br><br>\n";
    blocks(right);
  }
    if ($index == 0) {
    echo "<td width=\"3\"><img src=\"themes/$thename/images/pix-transparent.gif\" width=\"3\" height=\"1\" alt=\"\" border=\"0\">\n";
  }
    echo "</td></tr>\n"
    ."</table>\n"
    ."</td>\n"
    ."</tr>\n"
    ."</table><br><center>\n";
    if ($banners) {
        include("banners.php");
}
    echo "</center><br><center>\n";
    footmsg();
    echo "</center><br>\n";
}

function themeindex ($aid, $informant, $time, $title, $counter, $topic, $thetext, $notes, $morelink, $topicname, $topicimage, $topictext) {
    global $tipath, $anonymous, $thename;
     if ($informant == "") {
    $informant = $anonymous;
    }
    echo  "<table width=\"95%\" border=\"0\" cellspacing=\"0\" cellpadding=\"0\">\n"
    ."<tr>\n"
    ."<td class=\"pn-title\">$title<br></td>\n"
    ."</tr>\n"
    ."<tr>\n"
    ."<td class=\"pn-normal\"><font class=\"pn-sub\">"._POSTEDBY.": $informant "._ON." $time $timezone($counter "._READS.")</font><br>\n"
    ."<b>"._TOPIC.":</b> <a href=\"search.php?query=&amp;topic=$topic&amp;author=\">$topictext</a><br><br>\n";
    FormatStory($thetext, $notes, $aid, $informant);
    echo "<br>$morelink<br><br></td>\n"
    ."</tr>\n"
    ."<tr>\n"
    ."<td class=\"blackback\" width=\"100%\" align=\"left\" valign=\"top\"><img src=\"themes/$thename/images/pix-transparent.gif\" width=\"1\" height=\"2\" alt=\"\" border=\"0\"></td>\n"
    ."</tr>\n"
    ."</table>\n"
    ."<br>\n";
}

function themearticle ($aid, $informant, $datetime, $title, $thetext, $topic, $topicname, $topicimage, $topictext) {
    global $admin, $sid, $tipath, $thename;
    echo "<table width=\"95%\" border=\"0\" cellspacing=\"0\" cellpadding=\"0\">\n"
    ."<tr>\n"
    ."<td class=\"pn-title\">$title<br></td>\n"
    ."</tr>\n"
    ."<tr>\n"
    ."<td class=\"pn-normal\">"._POSTEDON." $datetime "._BY." $informant\n"
    ."<br><b>"._TOPIC.":</b> <a href=\"search.php?query=&amp;topic=$topic&amp;author=\">$topictext</a></B>\n";
    if (is_admin($admin)) {
        echo "<br>[ <a href=\"admin.php?op=EditStory&amp;sid=$sid\">"._EDIT."</a> | <a href=\"admin.php?op=RemoveStory&amp;sid=$sid\">"._DELETE."</a> ]\n";
    }
    echo "<br><br>\n";
    FormatStory($thetext, $notes, $aid, $informant);
    echo "<br><br></td>\n"
    ."</tr>\n"
    ."<tr>\n"
    ."<td class=\"blackback\" width=\"100%\" align=\"left\" valign=\"top\"><img src=\"themes/$thename/images/pix-transparent.gif\" width=\"1\" height=\"2\" alt=\"\" border=\"0\"></td>\n"
    ."</tr>\n"
    ."</table>\n"
    ."<br>\n";
}

function themesidebox($block) {
    global $thename;
    echo "<table width=\"150\" border=\"0\" cellspacing=\"0\" cellpadding=\"0\">\n"
    ."<tr>\n"
    ."<td class=\"blackback\" width=\"100%\" align=\"left\" valign=\"top\"><img src=\"themes/$thename/images/pix-transparent.gif\" width=\"1\" height=\"2\" alt=\"\" border=\"0\"></td>\n"
    ."</tr>\n"
    ."<tr>\n"
    ."<td align=\"left\" valign=\"middle\" class=\"marronclair2\"><b>&nbsp;$block[title]</b></td>\n"
    ."</tr>\n"
    ."<tr>\n"
    ."<td class=\"blackback\" width=\"100%\" align=\"left\" valign=\"top\"><img src=\"themes/$thename/images/pix-transparent.gif\" width=\"1\" height=\"2\" alt=\"\" border=\"0\"></td>\n"
    ."</tr>\n"
    ."<tr>\n"
    ."<td class=\"pn-normal\">$block[content]<br></td>\n"
    ."</tr>\n"
    ."</table>\n"
    ."<br>\n";
}

?>
