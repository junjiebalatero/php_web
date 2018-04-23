<?php // $Id: theme.php,v 1.5.1 20/08/2001 16:38 kodred Exp $ $Name:  $
global $thename, $bgcolor5;
/************************************************************************/
/* KodBlue - LAYOUT FOR PostNUKE (http://www.postnuke.com)              */
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
$thename = "KodBlue";
$bgcolor1 = "#FFFFFF";
$bgcolor2 = "#FFCC00";
$bgcolor3 = "#CCCCCC";
$bgcolor4 = "#EEEEEE";
$bgcolor5 = "#000000";
$textcolor1 = "#000000";
$textcolor2 = "#000000";
$postnuke_theme = true;

function OpenTable() {
    global $bgcolor1, $bgcolor2;
    echo "<table width=\"100%\" border=\"0\" cellspacing=\"0\" cellpadding=\"1\" bgcolor=\"$bgcolor2\"><tr><td>\n";
    echo "<table width=\"100%\" border=\"0\" cellspacing=\"0\" cellpadding=\"4\" bgcolor=\"$bgcolor1\"><tr><td>\n";
}

function OpenTable2() {
    global $bgcolor1, $bgcolor2;
    echo "<table border=\"0\" cellspacing=\"0\" cellpadding=\"1\" bgcolor=\"$bgcolor2\"><tr><td>\n";
    echo "<table border=\"0\" cellspacing=\"0\" cellpadding=\"4\" bgcolor=\"$bgcolor1\"><tr><td>\n";
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
        $notes = "<br><b>"._NOTE."</b> $notes\n";
    } else {
        $notes = "";
    }
    if ("$aid" == "$informant") {
        echo "<font class=\"pn-normal\">$thetext</font><br>$notes\n";
    } else {
        if($informant != "") {
            $boxstuff = "<a href=\"user.php?op=userinfo&amp;uname=$informant\">$informant</a>";
        } else {
            $boxstuff = "$anonymous ";
        }
        $boxstuff .= " <font class=\"pn-normal\">"._WRITES."</font> <font class=\"pn-normal\">\"$thetext\"</font><br>$notes\n";
        echo "$boxstuff\n";
    }
}

function themeheader() {
global $thename, $user, $sitename, $username, $cookie, $banners, $index, $bgcolor1, $bgcolor5;
    cookiedecode($user);
    $username = $cookie[1];
    if ($username == "") {
        $username = "Anonymous";
}
    echo "</head><BODY>\n"
    ."<table width=\"100%\" border=\"0\" cellpadding=\"0\" cellspacing=\"0\">\n"
    ."<tbody>\n"
    ."<tr>\n"
    ."<td width=\"17\"><img src=\"themes/$thename/images/corner1.gif\" width=\"17\" height=\"12\" alt=\"\" border=\"0\"></td>\n"
    ."<td class=\"bar1top\"><img src=\"themes/$thename/images/spacer.gif\" width=\"1\" height=\"12\" alt=\"\" border=\"0\"></td>\n"
    ."<td width=\"17\"><img src=\"themes/$thename/images/corner2.gif\" width=\"17\" height=\"12\" alt=\"\" border=\"0\"></td>\n"
    ."</tr>\n"
    ."<tr>\n"
    ."<td class=\"bar3left\"><img src=\"themes/$thename/images/spacer.gif\" width=\"17\" height=\"1\" alt=\"\" border=\"0\"></td>\n"
    ."<td bgcolor=\"$bgcolor1\">\n"
    ."<table width=\"100%\" border=\"0\" cellpadding=\"0\" cellspacing=\"0\">\n"
    ."<tr>\n"
    ."<td width=\"25%\"><a href=\"index.php\"><img src=\"themes/$thename/title.gif\" width=\"200\" height=\"81\" alt=\"welcome to $sitename\" border=\"0\"></a></td>\n"
    ."<td width=\"50%\" align=\"center\" valign=\"middle\">\n";
   if ($banners) {
include("banners.php");
}
 echo "</td>\n"
    ."<td width=\"25%\">&nbsp;</td>\n"
    ."</tr>\n"
    ."<tr>\n"
    ."<td><font class=\"pn-normal\">\n";
    echo formatTimestamp(GetUserTime(strftime("%Y-%m-%d %H:%M:%S", time())));
    echo "</font></td>\n"
    ."<td colspan=\"2\" valign=\"bottom\" align=\"right\">\n";
    if ($username == "Anonymous") {
    echo "<font class=\"pn-normal\"><a href=\"user.php\">"._REGISTERNOW."</a></font>\n";
}
else
{
    echo "<font class=\"pn-normal\">Welcome $username! |<a href=user.php>Account</a>||<a href=user.php?op=logout>Logout</a>|</font>\n";
}
    echo "</td>\n"
    ."</tr>\n"
    ."</table>\n"
    ."</td>\n"
    ."<td width=\"17\" class=\"bar4right\"><img src=\"themes/$thename/images/spacer.gif\" width=\"17\" height=\"1\" alt=\"\" border=\"0\"></td>\n"
    ."</tr>\n"
    ."<tr>\n"
    ."<td width=\"17\" valign=\"top\" align=\"left\"><img src=\"themes/$thename/images/corner3.gif\" width=\"17\" height=\"12\" alt=\"\" border=\"0\"></td>\n"
    ."<td width=\"100%\" class=\"bar2bot\" valign=\"top\"><img src=\"themes/$thename/images/spacer.gif\" width=\"1\" height=\"12\" alt=\"\" border=\"0\"><img src=\"themes/$thename/images/spacer.gif\" width=\"1\" height=\"12\" alt=\"\" border=\"0\"></td>\n"
    ."<td width=\"17\" valign=\"top\" align=\"right\"><img src=\"themes/$thename/images/corner4.gif\" width=\"17\" height=\"12\" alt=\"\" border=\"0\"></td>\n"
    ."</tr>\n"
    ."</tbody>\n"
    ."</table>\n"
    ."<table width=\"100%\" border=\"0\" cellpadding=\"0\" cellspacing=\"0\">\n"
    ."<tbody>\n"
    ."<tr valign=\"middle\" align=\"center\">\n"
    ."<td colspan=\"5\"><img src=\"themes/$thename/images/spacer.gif\" width=\"10\" height=\"10\" alt=\"\" border=\"0\"></td>\n"
    ."</tr>\n"
    ."<tr>\n"
    ."<td width=\"170\" valign=\"top\" align=\"center\">\n";
    blocks(left);
    echo "</td>\n"
    ."<td width=\"10\"><img src=\"themes/$thename/images/spacer.gif\" width=\"10\" height=\"1\" border=\"0\" alt=\"\"></td>\n"
    ."<td valign=\"top\" align=\"center\" width=\"100%\">\n"
    ."<table width=\"100%\" border=\"0\" cellpadding=\"0\" cellspacing=\"0\">\n"
    ."<tbody>\n"
    ."<tr>\n"
    ."<td width=\"17\"><img src=\"themes/$thename/images/corner1.gif\" width=\"17\" height=\"12\" alt=\"\" border=\"0\"></td>\n"
    ."<td class=\"bar1top\" width=\"100%\"><img src=\"themes/$thename/images/spacer.gif\" width=\"1\" height=\"12\" alt=\"\" border=\"0\"></td>\n"
    ."<td width=\"17\"><img src=\"themes/$thename/images/corner2.gif\" width=\"17\" height=\"12\" alt=\"\" border=\"0\"></td>\n"
    ."</tr>\n"
    ."<tr>\n"
    ."<td class=\"bar3left\"><img src=\"themes/$thename/images/spacer.gif\" width=\"17\" height=\"1\" alt=\"\" border=\"0\"></td>\n"
    ."<td width=\"100%\" align=\"center\" valign=\"top\" bgcolor=\"$bgcolor1\">\n";
}
     function themefooter() {
     global $index, $thename;
{
      echo "</td>\n"
    ."<td width=\"17\" class=\"bar4right\"><img src=\"themes/$thename/images/spacer.gif\" width=\"17\" height=\"1\" alt=\"\" border=\"0\"></td>\n"
    ."</tr>\n"
    ."<tr>\n"
    ."<td width=\"17\" valign=\"top\" align=\"left\"><img src=\"themes/$thename/images/corner3.gif\" width=\"17\" height=\"12\" alt=\"\" border=\"0\"></td>\n"
    ."<td class=\"bar2bot\" valign=\"top\"><img src=\"themes/$thename/images/spacer.gif\" width=\"1\" height=\"12\" alt=\"\" border=\"0\"><img src=\"themes/$thename/images/spacer.gif\" width=\"1\" height=\"12\" alt=\"\" border=\"0\"></td>\n"
    ."<td width=\"17\" valign=\"top\" align=\"right\"><img src=\"themes/$thename/images/corner4.gif\" width=\"17\" height=\"12\" alt=\"\" border=\"0\"></td>\n"
    ."</tr>\n"
    ."</tbody>\n"
    ."</table>\n"
    ."</td>\n";
}
      if ($index == 1) {
      echo "<td width=\"10\"><img src=\"themes/$thename/images/spacer.gif\" width=\"10\" height=\"1\" border=\"0\" alt=\"\"></td>\n"
    ."<td width=\"170\" align=\"center\" valign=\"top\">\n";
      blocks(right);
      echo "</td>\n";
}
    echo "</tr>\n"
    ."<tr valign=\"top\" align=\"center\">\n"
    ."<td colspan=\"5\"><br>\n";
      footmsg();
    echo "</td>\n"
    ."</tr>\n"
    ."</tbody>\n"
    ."</table>\n"
    ."<br>\n";
}
function themeindex ($aid, $informant, $time, $title, $counter, $topic, $thetext, $notes, $morelink, $topicname, $topicimage, $topictext) {
    global $anonymous, $tipath, $thename, $bgcolor1, $bgcolor5;
    if ($informant == "") {
    $informant = $anonymous;
}
    echo "<TABLE cellSpacing=\"0\" cellPadding=\"1\" width=\"100%\" bgColor=\"$bgcolor5\" border=\"0\">\n"
    ."<TBODY>\n"
    ."<TR>\n"
    ."<TD vAlign=\"top\">\n"
    ."<TABLE cellSpacing=\"0\" cellPadding=\"4\" width=\"100%\" border=\"0\">\n"
    ."<TBODY>\n"
    ."<TR>\n"
    ."<TD align=\"left\" class=\"newstitle\" vAlign=\"top\"><b>$title</b></TD>\n"
    ."<TR>\n"
    ."<TD align=\"left\" vAlign=\"top\" bgColor=\"$bgcolor1\">\n"
    ."<a href=\"search.php?query=&amp;topic=$topic\"><img src=\"$tipath$topicimage\" border=\"0\" Alt=\"$topictext\" align=\"left\" hspace=\"5\" vspace=\"5\"></a>\n";
    FormatStory($thetext, $notes, $aid, $informant);
    echo "<HR noShade><font class=\"pn-sub\">"._POSTEDBY.":&nbsp;$informant&nbsp;"._ON." $time $timezone</font><br><font class=\"pn-normal\">$morelink</font></TD></TR></TBODY></TABLE>\n"
    ."</TD></TR></TBODY></TABLE>\n"
    ."<br>\n\n\n";
}



function themearticle ($aid, $informant, $datetime, $title, $thetext, $topic, $topicname, $topicimage, $topictext) {
    global $admin, $sid, $tipath, $thename, $bgcolor1, $bgcolor5;
    echo "<table border=\"0\" cellpadding=\"4\" cellspacing=\"0\" bgcolor=\"$bgcolor1\" width=\"100%\"><tr><td>\n"
        ."<table border=\"0\" cellpadding=\"1\" cellspacing=\"0\" bgcolor=\"$bgcolor5\" width=\"100%\"><tr><td>\n"
        ."<table border=\"0\" cellpadding=\"3\" cellspacing=\"0\" bgcolor=\"$bgcolor1\" width=\"100%\"><tr><td align=\"left\">\n"
        ."<font class=\"title\"><b>$title</b></font><br>\n"
        ."<font class=\"pn-normal\">"._POSTEDON." $datetime "._BY." ";
    formatAidHeader($aid);
    if (is_admin($admin)) {
        echo "<br>[ <a href=\"admin.php?op=EditStory&amp;sid=$sid\">"._EDIT."</a> | <a href=\"admin.php?op=RemoveStory&amp;sid=$sid\">"._DELETE."</a> ]\n";
    }
    echo "</td></tr></table></td></tr></table><br>";
    echo "<a href=\"search.php?query=&amp;topic=$topic\"><IMG src=\"$tipath$topicimage\" border=\"0\" Alt=\"$topictext\" align=\"right\" hspace=\"10\" vspace=\"10\"></a>\n";
    FormatStory($thetext, $notes="", $aid, $informant);
    echo "</td></tr></table><br>\n\n\n";
}

function themesidebox($block) {
global $thename, $bgcolor1;
   echo "<table width=\"170\" border=\"0\" cellpadding=\"0\" cellspacing=\"0\">\n"
    ."<tr>\n"
    ."<td width=\"17\"><img src=\"themes/$thename/images/corner1.gif\" width=\"17\" height=\"12\" alt=\"\" border=\"0\"></td>\n"
    ."<td class=\"bar1top\" width=\"100%\"><img src=\"themes/$thename/images/spacer.gif\" width=\"1\" height=\"12\" alt=\"\" border=\"0\"></td>\n"
    ."<td width=\"17\"><img src=\"themes/$thename/images/corner2.gif\" width=\"17\" height=\"12\" alt=\"\" border=\"0\"></td>\n"
    ."</tr>\n"
    ."<tr>\n"
    ."<td class=\"bar3left\"><img src=\"themes/$thename/images/spacer.gif\" width=\"17\" height=\"1\" alt=\"\" border=\"0\"></td>\n"
    ."<td bgcolor=\"$bgcolor1\" align=\"left\" valign=\"top\"><center><font class=\"titrebox\"><b>$block[title]</b></font></center>$block[content]</td>\n"
    ."<td width=\"17\" class=\"bar4right\"><img src=\"themes/$thename/images/spacer.gif\" width=\"17\" height=\"1\" alt=\"\" border=\"0\"></td>\n"
    ."</tr>\n"
    ."<tr>\n"
    ."<td width=\"17\" valign=\"top\" align=\"left\"><img src=\"themes/$thename/images/corner3.gif\" width=\"17\" height=\"12\" alt=\"\" border=\"0\"></td>\n"
    ."<td class=\"bar2bot\" valign=\"top\"><img src=\"themes/$thename/images/spacer.gif\" width=\"1\" height=\"12\" alt=\"\" border=\"0\"><img src=\"themes/$thename/images/spacer.gif\" width=\"1\" height=\"12\" alt=\"\" border=\"0\"></td>\n"
    ."<td width=\"17\" valign=\"top\" align=\"right\"><img src=\"themes/$thename/images/corner4.gif\" width=\"17\" height=\"12\" alt=\"\" border=\"0\"></td>\n"
    ."</tr>\n"
    ."</table><br>\n";
}

?>
