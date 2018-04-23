<?php // $Id: theme.php,v 1.5.1 20/08/2001 16:36 kodred Exp $ $Name:  $
global $thename, $bgcolor5, $bgcolor6;
/************************************************************************/
/* FunkyDelic - LAYOUT FOR PostNUKE (http://postnuke.com)               */
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
$thename = "FunkyDelic";
$bgcolor1 = "#EEEEEE";
$bgcolor2 = "#FFCD36";
$bgcolor3 = "#FFFFFF";
$bgcolor4 = "#EEEEEE";
$bgcolor5 = "#000000";
$bgcolor6 = "#C4C4F4";
$textcolor1 = "#000000";
$textcolor2 = "#000000";
$postnuke_theme = true;

function OpenTable() {
    global $bgcolor3, $bgcolor2;
    echo "<table width=\"100%\" border=\"0\" cellspacing=\"1\" cellpadding=\"0\" bgcolor=\"$bgcolor2\"><tr><td>\n";
    echo "<table width=\"100%\" border=\"0\" cellspacing=\"1\" cellpadding=\"4\" bgcolor=\"$bgcolor3\"><tr><td>\n";
}

function OpenTable2() {
    global $bgcolor1, $bgcolor2;
    echo "<table border=\"0\" cellspacing=\"1\" cellpadding=\"0\" bgcolor=\"$bgcolor2\" align=\"center\"><tr><td>\n";
    echo "<table border=\"0\" cellspacing=\"1\" cellpadding=\"4\" bgcolor=\"$bgcolor1\"><tr><td>\n";
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
        $notes = "<font class=\"pn-normal\"><b>"._NOTE."</b> $notes</font>\n";
    } else {
        $notes = "";
    }
    if ("$aid" == "$informant") {
        echo "<font class=\"pn-normal\">$thetext</font><br>$notes\n";
    } else {
        if($informant != "") {
            $boxstuff = "<a href=\"user.php?op=userinfo&amp;uname=$informant\">$informant</a> ";
        } else {
            $boxstuff = "$anonymous ";
        }
        $boxstuff .= ""._WRITES." \"$thetext\"<br>$notes\n";
        echo "<font class=\"pn-normal\">$boxstuff</font>\n";
    }
}

function themeheader() {
    global $thename, $user, $sitename, $banners, $bgcolor3;

      echo "</head><BODY>"
      ."<TABLE BORDER=\"0\" CELLSPACING=\"2\" CELLPADDING=\"0\" WIDTH=\"100%\">"
      ."<tbody>"
      ."<TR>"
      ."<TD vALIGN=\"top\" WIDTH=\"160\">"
      ."<center>"
      ."<a href=\"index.php\"><IMG SRC=\"themes/$thename/logo.gif\" Alt=\"Index\" WIDTH=\"160\" HEIGHT=\"95\" BORDER=\"0\" vspace=\"3\"></a></center>"
      ."<TABLE WIDTH=\"100%\" BORDER=\"0\" CELLPADDING=\"0\" CELLSPACING=\"0\">"
      ."<tbody>"
      ."<TR>"
      ."<TD WIDTH=\"17\"><IMG SRC=\"themes/$thename/images/b11.gif\" WIDTH=\"17\" HEIGHT=\"12\"  Alt=\"\"></TD>"
      ."<TD WIDTH=\"100%\" class=\"b22back\"><IMG SRC=\"themes/$thename/images/spacer.gif\" WIDTH=\"1\" HEIGHT=\"12\"  Alt=\"\"></TD>"
      ."<TD WIDTH=\"28\"><IMG SRC=\"themes/$thename/images/b33.gif\" WIDTH=\"28\" HEIGHT=\"12\"  Alt=\"\"></TD></TR></TABLE>";
      blocks(left);
      echo "<TABLE WIDTH=\"100%\" BORDER=\"0\" CELLPADDING=\"0\" CELLSPACING=\"0\">"
      ."<tbody>"
      ."<TR>"
      ."<TD WIDTH=\"17\"><IMG SRC=\"themes/$thename/images/h11.gif\" WIDTH=\"17\" HEIGHT=\"10\" BORDER=\"0\"  Alt=\"\"></TD>"
      ."<TD WIDTH=\"100%\" class=\"h22back\"><IMG SRC=\"themes/$thename/images/spacer.gif\" WIDTH=\"1\" HEIGHT=\"10\" BORDER=\"0\"  Alt=\"\"></TD>"
      ."<TD WIDTH=\"28\"><IMG SRC=\"themes/$thename/images/h33.gif\" WIDTH=\"28\" HEIGHT=\"10\" BORDER=\"0\"  Alt=\"\"></TD>"
      ."</TR>"
      ."</tbody>"
      ."</TABLE>"
      ."</TD>"
      ."<TD>&nbsp;&nbsp;</TD>"
      ."<TD WIDTH=\"100%\" vALIGN=\"top\">"
      ."<TABLE WIDTH=\"100%\" BORDER=\"0\" CELLPADDING=\"0\" CELLSPACING=\"0\">"
      ."<tbody>"
      ."<TR>"
      ."<TD WIDTH=\"17\"><IMG SRC=\"themes/$thename/images/b11.gif\" WIDTH=\"17\" HEIGHT=\"12\"  Alt=\"\"></TD>"
      ."<TD WIDTH=\"100%\" class=\"b22back\"><IMG SRC=\"themes/$thename/images/spacer.gif\" WIDTH=\"1\" HEIGHT=\"12\"  Alt=\"\"></TD>"
      ."<TD WIDTH=\"28\"><IMG SRC=\"themes/$thename/images/b33.gif\" WIDTH=\"28\" HEIGHT=\"12\"  Alt=\"\"></TD>"
      ."</TR>"
      ."</tbody>"
      ."</TABLE>"
      ."<TABLE WIDTH=\"100%\" BORDER=\"0\" CELLPADDING=\"0\" CELLSPACING=\"0\" bgcolor=\"$bgcolor3\">"
      ."<tbody>"
      ."<TR>"
      ."<TD WIDTH=\"17\" class=\"c11back\"><IMG SRC=\"themes/$thename/images/spacer.gif\" WIDTH=\"17\" HEIGHT=\"1\"  Alt=\"\"></TD>"
      ."<TD WIDTH=\"100%\" ALIGN=\"center\">";
    if ($banners) {
    include("banners.php");
}
      echo "</TD>"
      ."<TD WIDTH=\"17\" class=\"c33back\"><img src=\"themes/$thename/images/pix.gif\" width=\"17\" height=\"1\" border=0  Alt=\"\"></TD>"
      ."</TR>"
      ."</tbody>"
      ."</TABLE>"
      ."<TABLE WIDTH=\"100%\" BORDER=\"0\" CELLPADDING=\"0\" CELLSPACING=\"0\">"
      ."<tbody>"
      ."<TR>"
      ."<TD WIDTH=\"17\"><IMG SRC=\"themes/$thename/images/d11.gif\" WIDTH=\"17\" HEIGHT=\"27\" BORDER=\"0\"  Alt=\"\"></TD>"
      ."<TD WIDTH=\"100%\" class=\"d22back\"><IMG SRC=\"themes/$thename/images/spacer.gif\" WIDTH=\"1\" HEIGHT=\"27\" BORDER=\"0\"  Alt=\"\"></TD>"
      ."<TD WIDTH=\"28\"><IMG SRC=\"themes/$thename/images/d33.gif\" WIDTH=\"28\" HEIGHT=\"27\" BORDER=\"0\"  Alt=\"\"></TD>"
      ."</TR>"
      ."<TR>"
      ."<TD WIDTH=\"17\" class=\"e11back\">&nbsp;</TD>"
      ."<TD class=\"titrebox\" ALIGN=\"center\"><b>"._WELCOMETO." $sitename</b></TD>"
      ."<TD WIDTH=\"28\" class=\"e33back\">&nbsp;</TD>"
      ."</TR>"
      ."<TR>"
      ."<TD WIDTH=\"17\"><IMG SRC=\"themes/$thename/images/f11.gif\" WIDTH=\"17\" HEIGHT=\"30\" BORDER=\"0\"  Alt=\"\"></TD>"
      ."<TD WIDTH=\"100%\" class=\"f22back\"><IMG SRC=\"themes/$thename/images/spacer.gif\" WIDTH=\"1\" HEIGHT=\"30\" BORDER=\"0\"  Alt=\"\"></TD>"
      ."<TD WIDTH=\"28\"><IMG SRC=\"themes/$thename/images/f33.gif\" WIDTH=\"28\" HEIGHT=\"30\" BORDER=\"0\"  Alt=\"\"></TD>"
      ."</TR>"
      ."</tbody>"
      ."</TABLE>"
      ."<TABLE WIDTH=\"100%\" BORDER=\"0\" CELLPADDING=\"0\" CELLSPACING=\"0\">"
      ."<tbody>"
      ."<TR>"
      ."<TD WIDTH=\"17\" class=\"c11back\"><IMG SRC=\"themes/$thename/images/spacer.gif\" WIDTH=\"17\" HEIGHT=\"1\"  Alt=\"\"></TD>"
      ."<TD WIDTH=\"100%\" bgcolor=\"$bgcolor3\">";
}
      function themefooter() {
      global $thename, $index, $bgcolor6;
{
      echo "</TD>"
      ."<TD WIDTH=\"17\" class=\"c33back\"><img src=\"themes/$thename/images/pix.gif\" width=\"17\" height=\"1\" border=0  Alt=\"\"></td>"
      ."</TR>"
      ."</tbody>"
      ."</TABLE>"
      ."<TABLE WIDTH=\"100%\" BORDER=\"0\" CELLPADDING=\"0\" CELLSPACING=\"0\">"
      ."<tbody>"
      ."<TR>"
      ."<TD WIDTH=\"17\"><IMG SRC=\"themes/$thename/images/h11.gif\" WIDTH=\"17\" HEIGHT=\"10\" BORDER=\"0\"  Alt=\"\"></TD>"
      ."<TD WIDTH=\"100%\" class=\"h22back\"><IMG SRC=\"themes/$thename/images/spacer.gif\" WIDTH=\"1\" HEIGHT=\"10\" BORDER=\"0\"  Alt=\"\"></TD>"
      ."<TD WIDTH=\"28\"><IMG SRC=\"themes/$thename/images/h33.gif\" WIDTH=\"28\" HEIGHT=\"10\" BORDER=\"0\"  Alt=\"\"></TD>"
      ."</TR>"
      ."</tbody>"
      ."</TABLE>";
}
    if ($index == 1) {
      echo "</TD>"
      ."<TD>&nbsp;&nbsp;</TD>"
      ."<TD WIDTH=\"160\" VALIGN=\"top\" bgcolor=\"$bgcolor6\">"
      ."<TABLE WIDTH=\"100%\" BORDER=\"0\" CELLPADDING=\"0\" CELLSPACING=\"0\">"
      ."<TR><TD WIDTH=\"17\"><IMG SRC=\"themes/$thename/images/b11.gif\" WIDTH=\"17\" HEIGHT=\"12\"  Alt=\"\"></TD>"
      ."<TD WIDTH=\"100%\" class=\"b22back\"><IMG SRC=\"themes/$thename/images/spacer.gif\" WIDTH=\"1\" HEIGHT=\"12\"  Alt=\"\"></TD>"
      ."<TD WIDTH=\"28\"><IMG SRC=\"themes/$thename/images/b33.gif\" WIDTH=\"28\" HEIGHT=\"12\"  Alt=\"\"></TD>"
      ."</TR>"
      ."</tbody>"
      ."</TABLE>";
blocks(right);
      echo "<TABLE WIDTH=\"100%\" BORDER=\"0\" CELLPADDING=\"0\" CELLSPACING=\"0\">"
      ."<tbody>"
      ."<TR>"
      ."<TD WIDTH=\"17\"><IMG SRC=\"themes/$thename/images/h11.gif\" WIDTH=\"17\" HEIGHT=\"10\" BORDER=\"0\" Alt=\"\"></TD>"
      ."<TD WIDTH=\"100%\" class=\"h22back\"><IMG SRC=\"themes/$thename/images/spacer.gif\" WIDTH=\"1\" HEIGHT=\"10\" BORDER=\"0\"  Alt=\"\"></TD>"
      ."<TD WIDTH=\"28\"><IMG SRC=\"themes/$thename/images/h33.gif\" WIDTH=\"28\" HEIGHT=\"10\" BORDER=\"0\"  Alt=\"\"></TD>"
      ."</TR>"
      ."</tbody>"
      ."</TABLE>";
}
      echo "</TD>"
      ."</TR>"
      ."</tbody>"
      ."</TABLE>"
      ."<br><br><center>";
      footmsg();
      echo "</center><br>";
}
function themeindex ($aid, $informant, $time, $title, $counter, $topic, $thetext, $notes, $morelink, $topicname, $topicimage, $topictext) {
    global $thename, $anonymous, $tipath, $bgcolor3, $bgcolor2, $bgcolor1;
    echo  "<table width=\"100%\" border=\"0\" cellspacing=\"0\" cellpadding=\"1\" bgcolor=\"$bgcolor2\">\n"
    ."<tbody>\n"
    ."<tr>\n"
    ."<td align=\"center\" valign=\"middle\">\n"
    ."<table width=\"100%\" border=\"0\" cellspacing=\"0\" cellpadding=\"4\" bgcolor=\"$bgcolor3\">\n"
    ."<tbody>\n"
    ."<tr>\n"
    ."<td bgcolor=\"$bgcolor1\"><font class=\"newstitle\"><b>$title</b></font><br><font class=\"pn-sub\">"._POSTEDBY." \n";
    formatAidHeader($aid);
    echo " "._ON." $time $timezone ($counter "._READS.")</font></td>\n"
    ."</tr>\n"
    ."<tr>\n"
    ."<td><a href=\"search.php?query=&amp;topic=$topic\"><IMG src=\"$tipath$topicimage\" border=\"0\" Alt=\"$topictext\" align=\"right\" hspace=\"5\" vspace=\"5\"></a>\n";
    FormatStory($thetext, $notes, $aid, $informant);
    echo "</td>\n"
    ."</tr>\n"
    ."<tr>\n"
    ."<td bgcolor=\"$bgcolor1\" valign=\"middle\"><img src=\"themes/$thename/point.gif\" width=\"8\" height=\"8\" border=\"0\" Alt=\"\"><font class=\"pn-normal\"> $morelink</font></td>\n"
    ."</tr>\n"
    ."</tbody>\n"
    ."</table>\n"
    ."</td>\n"
    ."</tr>\n"
    ."</tbody>\n"
    ."</table>\n"
    ."<br>\n\n\n";
}
function themearticle ($aid, $informant, $datetime, $title, $thetext, $topic, $topicname, $topicimage, $topictext) {
    global $thename, $admin, $sid, $tipath, $bgcolor5, $bgcolor3, $bgcolor2;
    echo "<table width=\"100%\" border=\"0\" cellspacing=\"0\" cellpadding=\"2\" bgcolor=\"$bgcolor5\">\n"
    ."<tbody>\n"
    ."<tr><td>\n"
    ."<table border=\"0\" cellpadding=\"2\" cellspacing=\"0\" bgcolor=\"$bgcolor3\" width=\"100%\">\n"
    ."<tbody>\n"
    ."<tr><td>\n"
    ."<table border=\"0\" cellpadding=\"1\" cellspacing=\"0\" bgcolor=\"$bgcolor5\" width=\"100%\">\n"
    ."<tbody>\n"
    ."<tr><td>\n"
    ."<table border=\"0\" cellpadding=\"3\" cellspacing=\"0\" bgcolor=\"$bgcolor2\" width=\"100%\">\n"
    ."<tbody>\n"
    ."<tr><td align=\"left\">\n"
    ."<font class=\"newstitle\">$title</font><br>\n"
    ."<font class=\"pn-sub\">"._POSTEDBY.":&nbsp;$informant</font>\n";
    if (is_admin($admin)) {
        echo "<br><font class=\"pn-sub\">[ <a href=\"admin.php?op=EditStory&amp;sid=$sid\">"._EDIT."</a> | <a href=\"admin.php?op=RemoveStory&amp;sid=$sid\">"._DELETE."</a> ]</font>\n";
    }
    echo "</td></tr>\n"
    ."</tbody>\n"
    ."</table>\n"
    ."</td></tr>\n"
    ."</tbody>\n"
    ."</table>";
    echo "<a href=\"search.php?query=&amp;topic=$topic\"><img src=\"$tipath$topicimage\" border=\"0\" Alt=\"$topictext\" align=\"right\" hspace=\"5\" vspace=\"5\"></a>\n";
    FormatStory($thetext, $notes="", $aid, $informant);
    echo "</td></tr>\n"
    ."</tbody>\n"
    ."</table>\n"
    ."</tr></td>\n"
    ."</tbody>\n"
    ."</table><br>\n\n\n";
}

function themesidebox($block) {
global $bgcolor5, $bgcolor3, $thename, $bgcolor1;
echo "<table bgcolor=\"$bgcolor5\" border=\"0\" width=\"160\" cellspacing=\"0\" cellpadding=\"0\">\n"
    ."<tbody>\n"
    ."<tr>\n"
    ."<td>\n"
    ."<table border=\"0\" WIDTH=\"100%\" cellspacing=\"1\" cellpadding=\"3\">\n"
    ."<tbody>\n"
    ."<tr>\n"
    ."<td bgcolor=\"$bgcolor1\" class=\"titrebox\" align=\"center\"><b>$block[title]</b></td>\n"
    ."</tr>\n"
    ."<tr>\n"
    ."<td bgcolor=\"$bgcolor3\" class=\"pn-normal\">$block[content]</td></tr>\n"
    ."</tbody>\n"
    ."</table>\n"
    ."<TABLE WIDTH=\"100%\" BORDER=\"0\" CELLPADDING=\"0\" CELLSPACING=\"0\">\n"
    ."<tbody>\n"
    ."<TR>\n"
    ."<TD WIDTH=\"100%\" class=\"c22back\">&nbsp;</TD>\n"
    ."<TD bgcolor=\"$bgcolor5\" width=\"1\"><img src=\"themes/$thename/images/pix.gif\" width=\"1\" height=\"1\" border=0 Alt=\"\"></TD>\n"
    ."</TR>\n"
    ."</tbody>\n"
    ."</TABLE>\n"
    ."</td>\n"
    ."</tr>\n"
    ."</tbody>\n"
    ."</table>\n";
}
?>
