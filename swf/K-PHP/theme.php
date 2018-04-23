<?php // $Id: theme.php,v 1.5.1 20/08/2001 16:39 kodred Exp $ $Name:  $
/************************************************************************/
/* K_PHP - LAYOUT FOR PostNUKE (http://www.postnuke.com)                */
/* Copyright (C) 2001 collet Stéphane Aka KodRed                        */
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
global $thename, $bgcolor5, $bgcolor6, $bgcolor7, $bgcolor8; //don' t touch
/************************************************************/
/* settings                                                 */
/************************************************************/
$thename = "K-PHP"; // The name of your Theme (Name of the theme = The theme folder name)
/************************************************************/
/* Theme Colors Definition                                  */
/************************************************************/
$bgcolor1 = "#FFFFFF";
$bgcolor2 = "#FFCC33";
$bgcolor3 = "#CCCCCC";
$bgcolor4 = "#C0C0FF";
$bgcolor5 = "#9999cc"; //header background color, where the logo is!
$bgcolor6 = "#000000"; //Used for some borders
$bgcolor7 = "#eeeeee"; //left and right columns(where your blocks are)
$bgcolor8 = "#CCCCFF";
$textcolor1 = "#000000";
$textcolor2 = "#000000";
$postnuke_theme = true;
/************************************************************************/
/* End Internal setting                                                 */
/************************************************************************/

function OpenTable() {
    global $bgcolor1, $bgcolor2;
    echo "<table width=\"100%\" border=\"0\" cellspacing=\"1\" cellpadding=\"0\" bgcolor=\"$bgcolor2\"><tr><td>\n";
    echo "<table width=\"100%\" border=\"0\" cellspacing=\"1\" cellpadding=\"8\" bgcolor=\"$bgcolor1\"><tr><td>\n";
}

function CloseTable() {
    echo "</td></tr></table></td></tr></table><br>\n";
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

/************************************************************/
/* Function themeheader                                     */
/************************************************************/

function themeheader() {
    global $user, $username, $banners, $sitename, $slogan, $cookie, $prefix, $index, $thename, $bgcolor1, $bgcolor5, $bgcolor6, $bgcolor7;
    cookiedecode($user);
    $username = $cookie[1];
    if ($username == "") {
        $username = "Anonymous";
    }
    echo "</head><body>\n"
    ."<a name=\"top\"></a>\n";
    if ($banners) {
    include("banners.php");
}
    echo "<br><table width=\"775\" bgcolor=\"$bgcolor6\" border=\"0\" cellspacing=\"0\" cellpadding=\"2\" align=\"center\">\n"
    ."<tbody>\n"
    ."<tr>\n"
    ."<td width=\"100%\" align=\"center\" valign=\"top\">\n"
    ."<table width=\"100%\" border=\"0\" cellspacing=\"0\" cellpadding=\"0\">\n"
    ."<tbody>\n"
    ."<tr>\n"
    ."<td bgcolor=\"$bgcolor5\" width=\"100%\" valign=\"middle\">\n"
    ."<table width=\"100%\" border=\"0\" cellspacing=\"0\" cellpadding=\"0\" align=\"right\">\n"
    ."<tbody>\n"
    ."<tr>\n"
    ."<td width=\"187\"><a href=\"index.php\"><img src=\"themes/$thename/images/logo.gif\" width=\"205\" height=\"80\" alt=\"welcome to $sitename\" border=\"0\" hspace=\"5\" vspace=\"5\"></a></td>\n"
    ."<td width=\"100%\" valign=\"middle\">\n"
    ."<FORM METHOD=\"POST\" ACTION=\"search.php\">\n"
    ."<table border=\"0\" cellspacing=\"0\" cellpadding=\"2\" align=\"right\">\n"
    ."<tbody>\n"
    ."<tr>\n"
    ."<td align=\"right\" valign=\"middle\">\n"
    ."<font class=\"pn-title\">"._SEARCH."</font>  </td>\n"
    ."<td align=\"left\" valign=\"middle\">\n"
    ."<INPUT NAME=\"query\" SIZE=\"12\" class=\"search\"> <INPUT TYPE=\"submit\" VALUE=\""._GO."\" class=\"search\">&nbsp;&nbsp;</td>\n"
    ."</tr>\n"
    ."</tbody>\n"
    ."</table>\n"
    ."</form>\n"
    ."</td>\n"
    ."</tr>\n"
    ."</tbody>\n"
    ."</table>\n"
    ."</td>\n"
    ."</tr>\n"
    ."<tr>\n"
    ."<td class=\"headerline\" width=\"100%\"><img src=\"themes/$thename/images/pix-transparent.gif\" width=\"1\" height=\"2\" alt=\"\" border=\"0\"></td>\n"
    ."</tr>\n"
    ."<tr>\n"
    ."<td bgcolor=\"$bgcolor5\" align=\"center\">\n"
    ."<table border=\"0\" cellspacing=\"0\" cellpadding=\"2\">\n"
    ."<tbody>\n"
    ."<tr>\n"
    ."<td>\n";
    if (is_user($user)) {
        echo ""._YOUARELOGGED." <b>$username</b>.";
        $result = mysql_query("select uid from $prefix"._users." where uname='$username'");
        list($uid) = mysql_fetch_row($result);
        $result2 = mysql_query("select to_userid from $prefix"._priv_msgs." where to_userid='$uid'");
        $numrow = mysql_num_rows($result2);
        echo " "._YOUHAVE." <a href=\"viewpmsg.php\"><b>$numrow</b></a> "._PRIVATEMSG."";
    } else {
        echo " "._YOUAREANON."";
    }
    echo "</td>\n"
    ."</tr>\n"
    ."</tbody>\n"
    ."</table>\n"
    ."</td>\n"
    ."</tr>\n"
    ."<tr>\n"
    ."<td class=\"headerline\" width=\"100%\"><img src=\"themes/$thename/images/pix-transparent.gif\" width=\"1\" height=\"2\" alt=\"\" border=\"0\"></td>\n"
    ."</tr>\n"
    ."</tbody>\n"
    ."</table>\n"
    ."<table width=\"100%\" border=\"0\" cellspacing=\"0\" cellpadding=\"0\">\n"
    ."<tbody>\n"
    ."<tr>\n"
    ."<td valign=\"top\" width=\"145\" bgcolor=\"$bgcolor7\" align=\"center\">\n";
    blocks(left);
    echo "</td>\n"
    ."<td bgcolor=\"$bgcolor1\" width=\"5\" class=\"tiretvertical\"><img src=\"themes/$thename/images/pix-transparent.gif\" width=\"5\" height=\"1\" alt=\"\" border=\"0\"></td>\n"
    ."<td bgcolor=\"$bgcolor1\" valign=\"top\" align=\"center\" width=\"100%\"><br>\n";
}

/************************************************************/
/* Function themefooter                                     */
/************************************************************/

function themefooter() {
    global $index, $thename, $bgcolor1, $bgcolor7;
    echo "</td>\n";
    if ($index == 1) {
    echo "<td width=\"5\" bgcolor=\"$bgcolor1\" class=\"tiretright\"><img src=\"themes/$thename/images/pix-transparent.gif\" width=\"5\" height=\"1\" alt=\"\" border=\"0\"></td>\n";
    echo "<td valign=\"top\" align=\"center\" width=\"145\" bgcolor=\"$bgcolor7\">\n";
blocks(right);
    echo "</td>\n";
    } else {
    echo "<td align=\"center\" valign=\"top\" width=\"5\" bgcolor=\"$bgcolor1\"><img src=\"themes/$thename/images/pix-transparent.gif\" width=\"5\" height=\"1\" alt=\"\" border=\"0\"></td>\n";
}
    echo "</tr>\n"
    ."</tbody>\n"
    ."</table>\n"
    ."<table width=\"100%\" border=\"0\" cellspacing=\"0\" cellpadding=\"0\">\n"
    ."<tbody>\n"
    ."<tr>\n"
    ."<td class=\"headerline\" width=\"100%\"><img src=\"themes/$thename/images/pix-transparent.gif\" width=\"1\" height=\"2\" alt=\"\" border=\"0\"></td>\n"
    ."</tr>\n"
    ."<tr>\n"
    ."<td class=\"headertop\" align=\"center\" valign=\"middle\">\n"
    ."<table border=\"0\" cellspacing=\"0\" cellpadding=\"2\">\n"
    ."<tbody>\n"
    ."<tr align=\"left\" valign=\"middle\">\n"
    ."<td width=\"10\"><img src=\"themes/$thename/images/fleche2.gif\" width=\"10\" height=\"10\" alt=\"\" border=\"0\"></td>\n"
    ."<td class=\"menu\"><a href=\"#top\">"._BACKTOTOP."</a></td>\n"
    ."</tr>\n"
    ."</tbody>\n"
    ."</table>\n"
    ."</td>\n"
    ."</tr>\n"
    ."</tbody>\n"
    ."</table>\n"
    ."</td></tr></tbody></table><br><center>\n";
    footmsg();
    echo"</center><br>\n";
}

/************************************************************/
/* Function themeindex                                      */
/************************************************************/

function themeindex ($aid, $informant, $time, $title, $counter, $topic, $thetext, $notes, $morelink, $topicname, $topicimage, $topictext) {
    global $anonymous, $tipath, $thename, $bgcolor1, $bgcolor6, $bgcolor8;
    if ($informant == "") {
        $informant = $anonymous;
        }
    echo "<table width=\"100%\" border=\"0\" cellspacing=\"0\" cellpadding=\"1\">\n"
    ."<tbody>\n"
    ."<tr>\n"
    ."<td>\n"
    ."<table width=\"100%\" border=\"0\" cellspacing=\"0\" cellpadding=\"3\">\n"
    ."<tbody>\n"
    ."<tr>\n"
    ."<td valign=\"middle\" align=\"left\" width=\"20\"><img src=\"themes/$thename/images/news.gif\" width=\"20\" height=\"21\" alt=\"\" border=\"0\"></td>\n"
    ."<td valign=\"middle\" align=\"left\" class=\"newstitle\" width=\"100%\">$title</td>\n"
    ."</tr>\n"
    ."</tbody>\n"
    ."</table>\n"
    ."</td>\n"
    ."</tr>\n"
    ."<tr>\n"
    ."<td bgcolor=\"$bgcolor6\" align=\"center\" valign=\"middle\">\n"
    ."<table bgcolor=\"$bgcolor1\" width=\"100%\" border=\"0\" cellspacing=\"0\" cellpadding=\"4\">\n"
    ."<tbody>\n"
    ."<tr>\n"
    ."<td class=\"pn-normal\">\n"
    ."<a href=\"search.php?query=&amp;topic=$topic\"><img src=\"$tipath$topicimage\" border=\"0\" Alt=\"$topictext\" align=\"right\" hspace=\"5\" vspace=\"5\"></a>\n";
    FormatStory($thetext, $notes, $aid, $informant);
    echo "<br><font class=\"pn-normal\">"._POSTEDBY.": $informant&nbsp;"._ON." $time $timezone ($counter "._READS.")</font><br></td>\n"
    ."</tr>\n"
    ."</tbody>\n"
    ."</table>\n"
    ."</td>\n"
    ."</tr>\n"
    ."<tr>\n"
    ."<td align=\"left\" valign=\"top\">\n"
    ."<table width=\"95%\" border=\"0\" cellspacing=\"0\" cellpadding=\"4\" bgcolor=\"$bgcolor8\">\n"
    ."<tbody>\n"
    ."<tr>\n"
    ."<td class=\"moreinfos\">$morelink</td>\n"
    ."</tr>\n"
    ."</tbody>\n"
    ."</table>\n"
    ."</td>\n"
    ."</tr>\n"
    ."</tbody>\n"
    ."</table>\n"
    ."<br>\n\n\n";
}

/************************************************************/
/* Function themearticle                                    */
/************************************************************/

function themearticle ($aid, $informant, $datetime, $title, $thetext, $topic, $topicname, $topicimage, $topictext) {
    global $admin, $sid, $tipath, $thename, $bgcolor1, $bgcolor6;
    if ($informant == "") {
        $informant = $anonymous;
        }
    echo  "<table width=\"100%\" border=\"0\" cellspacing=\"0\" cellpadding=\"1\">\n"
    ."<tbody>\n"
    ."<tr>\n"
    ."<td>\n"
    ."<table width=\"100%\" border=\"0\" cellspacing=\"0\" cellpadding=\"4\">\n"
    ."<tbody>\n"
    ."<tr>\n"
    ."<td valign=\"middle\" align=\"left\" width=\"100%\" class=\"newstitle\">$title<br><font class=\"pn-sub\">"._CONTRIBUTEDBY.": $informant</font></td>\n"
    ."</tr>\n"
    ."</tbody>\n"
    ."</table>\n"
    ."</td>\n"
    ."</tr>\n"
    ."<tr>\n"
    ."<td bgcolor=\"$bgcolor6\" align=\"left\" valign=\"top\">\n"
    ."<table bgcolor=\"$bgcolor1\" width=\"100%\" border=\"0\" cellspacing=\"0\" cellpadding=\"4\">\n"
    ."<tbody>\n"
    ."<tr>\n"
    ."<td class=\"pn-normal\">\n"
    ."<a href=\"search.php?query=&amp;topic=$topic\"><img src=\"$tipath$topicimage\" border=\"0\" Alt=\"$topictext\" align=\"right\" hspace=\"5\" vspace=\"5\"></a>\n";
    FormatStory($thetext, $notes, $aid, $informant);
    echo "</td>\n"
    ."</tr>\n"
    ."</tbody>\n"
    ."</table>\n"
    ."</td>\n"
    ."</tr>\n"
    ."<tr>\n"
    ."<td>\n"
    ."<table width=\"100%\" border=\"0\" cellspacing=\"0\" cellpadding=\"4\">\n"
    ."<tbody>\n"
    ."<tr>\n"
    ."<td valign=\"middle\" align=\"left\" width=\"100%\" class=\"newstexte\">"._POSTEDON." $datetime "._BY." ";
    formatAidHeader($aid);
    if (is_admin($admin)) {
    echo "<br>[ <a href=\"admin.php?op=EditStory&amp;sid=$sid\">"._EDIT."</a> | <a href=\"admin.php?op=RemoveStory&amp;sid=$sid\">"._DELETE."</a> ]\n";
}
     echo "</td>\n"
    ."</tr>\n"
    ."</tbody>\n"
    ."</table>\n"
    ."</td>\n"
    ."</tr>\n"
    ."</tbody>\n"
    ."</table>\n"
    ."<br>\n\n\n";
}

/************************************************************/
/* Function themesidebox                                    */
/************************************************************/

function themesidebox($block) {
    global $thename;
    echo "<table width=\"145\" border=\"0\" cellspacing=\"0\" cellpadding=\"3\">\n"
    ."<tbody>\n"
    ."<tr>\n"
    ."<td>\n"
    ."<table width=\"145\" border=\"0\" cellspacing=\"0\" cellpadding=\"0\">\n"
    ."<tbody>\n"
    ."<tr>\n"
    ."<td><img src=\"themes/$thename/images/box-separator.gif\" width=\"145\" height=\"10\" alt=\"\" border=\"0\"></td>\n"
    ."</tr>\n"
    ."<tr>\n"
    ."<td class=\"pn-title\" width=\"145\" align=\"left\">$block[title]</td>\n"
    ."</tr>\n"
    ."<tr>\n"
    ."<td><img src=\"themes/$thename/images/box-separator.gif\" width=\"145\" height=\"10\" alt=\"\" border=\"0\"></td>\n"
    ."</tr>\n"
    ."</tbody>\n"
    ."</table>\n"
    ."</td>\n"
    ."</tr>\n"
    ."<tr>\n"
    ."<td class=\"boxtexte\">$block[content]</td>\n"
    ."</tr>\n"
    ."</tbody>\n"
    ."</table><br>\n\n\n";
}

?>