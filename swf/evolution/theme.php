<?php // $Id: theme.php,v 1.1 2001/08/28 01:32:06 kodred Exp $ $Name:  $
global $thename, $bgcolor5, $bgcolor6, $bgcolor7, $bgcolor8;
/************************************************************************/
/* Evolution: Theme For PostNuke (http://www.postnuke.com)              */
/* ===========================                                          */
/*                                                                      */
/* Copyright (c) 2001 the PostNuke devlopment Team                      */
/*                    http://www.PostNuke.com                           */
/*                                                                      */
/*                                                                      */
/* This program is free software. You can redistribute it and/or modify */
/* it under the terms of the GNU General Public License as published by */
/* the Free Software Foundation; either version 2 of the License.       */
/************************************************************************/
/************************************************************************/
/* Filename: evolution                                                  */
/* Original Author: KodRed                                              */
/************************************************************************/
//

$thename = "evolution";
$bgcolor1 = "#8BA2C2";
$bgcolor2 = "#A2B3CB";
$bgcolor3 = "#D9DCC2";
$bgcolor4 = "#6E86B8";
$bgcolor5 = "#336699";
$bgcolor6 = "#FFFFFF";
$bgcolor7 = "#d7d9dc";
$bgcolor8 = "#000000";
$textcolor1 = "#000000";
$textcolor2 = "#000000";
$postnuke_theme = true;

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
global $index, $cookie, $user, $bgcolor1, $bgcolor2, $bgcolor3, $bgcolor4, $bgcolor7, $sitename, $slogan, $banners, $thename, $username, $prefix;
    cookiedecode($user);
    $username = $cookie[1];
    if ($username == "") {
        $username = "Anonymous";
    }
    echo "</HEAD><BODY>\n"
    ."<BR>\n"
    ."<TABLE WIDTH=\"100%\" BORDER=\"0\" CELLSPACING=\"0\" CELLPADDING=\"0\" ALIGN=\"center\" SUMMARY=\"Top table for publicity data\">\n"
    ."<TBODY>\n"
    ."<TR>\n"
    ."<TD WIDTH=\"100\"><IMG SRC=\"themes/$thename/images/cr-tl.gif\" WIDTH=\"100\" HEIGHT=\"80\" ALT=\"\" BORDER=\"0\"></TD>\n"
    ."<TD ALIGN=\"left\" VALIGN=\"top\" WIDTH=\"100%\">\n"
    ."<TABLE WIDTH=\"468\" BORDER=\"0\" CELLSPACING=\"0\" CELLPADDING=\"2\" BGCOLOR=\"$bgcolor2\" ALIGN=\"left\" SUMMARY=\"Banners\">\n"
    ."<TBODY>\n"
    ."<TR>\n"
    ."<TD WIDTH=\"468\" ALIGN=\"center\" VALIGN=\"middle\">\n";
    if ($banners) {
    include("banners.php");
    }
    echo "</TD>\n"
    ."<TD WIDTH=\"150\" BGCOLOR=\"$bgcolor7\" class=\"pubrighr\"><IMG SRC=\"themes/$thename/images/pix-t.gif\" WIDTH=\"140\" HEIGHT=\"1\" ALT=\"\" BORDER=\"0\"></TD>\n"
    ."</TR>\n"
    ."</TBODY>\n"
    ."</TABLE>\n"
    ."</TD>\n"
    ."</TR>\n"
    ."</TBODY>\n"
    ."</TABLE>\n"
    
    ."<TABLE WIDTH=\"100%\" BORDER=\"0\" CELLSPACING=\"0\" CELLPADDING=\"0\" ALIGN=\"center\" SUMMARY=\"Main table for menus and content\">\n"
    ."<TBODY>\n"
    ."<TR>\n"
    ."<TD class=\"boxback\" WIDTH=\"150\" VALIGN=\"top\"><A HREF=\"index.php\"><IMG SRC=\"themes/$thename/images/logo.gif\" WIDTH=\"150\" HEIGHT=\"65\" ALT=\""._WELCOMETO." $sitename\" BORDER=\"0\"></A><BR>\n"
    ."<BR>\n";
    blocks(left);
    echo "</TD>\n"
    ."<TD ALIGN=\"left\" VALIGN=\"top\" ROWSPAN=\"2\" WIDTH=\"10\"><IMG SRC=\"themes/$thename/images/pix-t.gif\" WIDTH=\"10\" HEIGHT=\"1\" BORDER=\"0\" ALT=\"\"></TD>\n"
    ."<TD ALIGN=\"center\" VALIGN=\"top\">\n"
    ."<TABLE WIDTH=\"100%\" BORDER=\"0\" CELLSPACING=\"0\" CELLPADDING=\"0\" SUMMARY=\"Data For Visitors\">\n"
    ."<TBODY>\n"
    ."<TR>\n"
    ."<TD WIDTH=\"15\"><IMG SRC=\"themes/$thename/images/bar-l.gif\" WIDTH=\"15\" HEIGHT=\"28\" ALT=\"\" BORDER=\"0\"></TD>\n"
    ."<TD WIDTH=\"100%\" VALIGN=\"middle\" ALIGN=\"center\" class=\"barback\">\n";
 if (is_user($user)) {
    echo ""._YOUARELOGGED." <b>$username</b>.";
        $result = mysql_query("select uid from $prefix"._users." where uname='$username'");
        list($uid) = mysql_fetch_row($result);
        $result2 = mysql_query("select to_userid from $prefix"._priv_msgs." where to_userid='$uid'");
        $numrow = mysql_num_rows($result2);
        echo ""._YOUHAVE." <a href=\"viewpmsg.php\"><b>$numrow</b></a> "._PRIVATEMSG."\n";
    } else {
    echo ""._YOUAREANON."\n";
    }
echo "</TD>\n"
    ."<TD WIDTH=\"15\"><IMG SRC=\"themes/$thename/images/bar-r.gif\" WIDTH=\"15\" HEIGHT=\"28\" ALT=\"\" BORDER=\"0\"></TD>\n"
    ."</TR>\n"
    
    ."<TR>\n"
    ."<TD COLSPAN=\"3\"><IMG SRC=\"themes/$thename/images/pix-t.gif\" WIDTH=\"1\" HEIGHT=\"10\" ALT=\"\" BORDER=\"0\"></TD>\n"
    ."</TR>\n"
    ."</TBODY>\n"
    ."</TABLE>\n"
    
    ."<TABLE WIDTH=\"100%\" BORDER=\"0\" CELLSPACING=\"0\" CELLPADDING=\"0\" BGCOLOR=\"$bgcolor1\" SUMMARY=\"Border for Generic Block\">\n"
    ."<TBODY>\n"
    ."<TR>\n"
    ."<TD ALIGN=\"left\" VALIGN=\"bottom\" WIDTH=\"11\"><IMG SRC=\"themes/$thename/images/t-tl.gif\" WIDTH=\"11\" HEIGHT=\"11\" ALT=\"\" BORDER=\"0\"></TD>\n"
    ."<TD class=\"tabletop\"><IMG SRC=\"themes/$thename/images/pix-t.gif\" WIDTH=\"1\" HEIGHT=\"11\" ALT=\"\" BORDER=\"0\"></TD>\n"
    ."<TD ALIGN=\"right\" VALIGN=\"bottom\" WIDTH=\"11\"><IMG SRC=\"themes/$thename/images/t-tr.gif\" WIDTH=\"11\" HEIGHT=\"11\" ALT=\"\" BORDER=\"0\"></TD>\n"
    ."</TR>\n"
    
    ."<TR>\n"
    ."<TD WIDTH=\"11\" class=\"tableleft\">&nbsp;</TD>\n"
    ."<TD ALIGN=\"center\" VALIGN=\"top\"><BR>\n";
}
    
function themefooter() {
global $index, $bgcolor1, $bgcolor2, $bgcolor3, $bgcolor4, $thename;
    
    echo "<BR>\n"
    ."</TD>\n"
    ."<TD class=\"tableright\">&nbsp;</TD>\n"
    ."</TR>\n"
    
    ."<TR>\n"
    ."<TD ALIGN=\"left\" VALIGN=\"top\" WIDTH=\"11\"><IMG SRC=\"themes/$thename/images/t-bl.gif\" WIDTH=\"11\" HEIGHT=\"11\" ALT=\"\" BORDER=\"0\"></TD>\n"
    ."<TD WIDTH=\"100%\" class=\"tablebottom\"><IMG SRC=\"themes/$thename/images/pix-t.gif\" WIDTH=\"1\" HEIGHT=\"11\" ALT=\"\" BORDER=\"0\"></TD>\n"
    ."<TD WIDTH=\"11\" ALIGN=\"right\" VALIGN=\"top\"><IMG SRC=\"themes/$thename/images/t-br.gif\" WIDTH=\"11\" HEIGHT=\"11\" ALT=\"\" BORDER=\"0\"></TD>\n"
    ."</TR>\n"
    ."</TBODY>\n"
    ."</TABLE>\n"
    ."</TD>\n";
    if ($index == 1) {
    echo "<TD ROWSPAN=\"2\" ALIGN=\"right\" VALIGN=\"top\" WIDTH=\"10\"><IMG SRC=\"themes/$thename/images/pix-t.gif\" WIDTH=\"10\" HEIGHT=\"1\" ALT=\"\" BORDER=\"0\"></TD>\n"
    ."<TD WIDTH=\"150\" ALIGN=\"center\" VALIGN=\"top\" class=\"boxrihgtback\"><IMG SRC=\"themes/$thename/images/b-top-r.gif\" WIDTH=\"150\" HEIGHT=\"27\" ALT=\"\" BORDER=\"0\">\n";
    blocks(right);
    echo "</TD>\n";
    }
    echo "</TR>\n"
    
    ."<TR>\n"
    ."<TD class=\"boxback\">&nbsp;</TD>\n"
    ."<TD>&nbsp;</TD>\n"
    ."<TD class=\"boxrihgtback\">&nbsp;</TD>\n"
    ."</TR>\n"
    ."</TBODY>\n"
    ."</TABLE>\n"

    ."<TABLE WIDTH=\"100%\" BORDER=\"0\" CELLSPACING=\"0\" CELLPADDING=\"0\" BGCOLOR=\"$bgcolor1\" ALIGN=\"center\" SUMMARY=\"copyright Block\">\n"
    ."<TBODY>\n"
    ."<TR>\n"
    ."<TD ALIGN=\"left\" VALIGN=\"bottom\" WIDTH=\"11\"><IMG SRC=\"themes/$thename/images/t-tl.gif\" WIDTH=\"11\" HEIGHT=\"11\" ALT=\"\" BORDER=\"0\"></TD>\n"
    ."<TD WIDTH=\"100%\" class=\"tabletop\"><IMG SRC=\"themes/$thename/images/pix-t.gif\" WIDTH=\"1\" HEIGHT=\"11\" ALT=\"\" BORDER=\"0\"></TD>\n"
    ."<TD ALIGN=\"right\" VALIGN=\"bottom\" WIDTH=\"11\"><IMG SRC=\"themes/$thename/images/t-tr.gif\" WIDTH=\"11\" HEIGHT=\"11\" ALT=\"\" BORDER=\"0\"></TD>\n"
    ."</TR>\n"
    
    ."<TR>\n"
    ."<TD WIDTH=\"11\" class=\"tableleft\">&nbsp;</TD>\n"
    ."<TD VALIGN=\"middle\" ALIGN=\"center\" class=\"pn-sub\" WIDTH=\"100%\">\n";
    footmsg();
    echo "</TD>\n"
    ."<TD class=\"tableright\">&nbsp;</TD>\n"
    ."</TR>\n"
    
    ."<TR>\n"
    ."<TD ALIGN=\"left\" VALIGN=\"top\" WIDTH=\"11\"><IMG SRC=\"themes/$thename/images/t-bl.gif\" WIDTH=\"11\" HEIGHT=\"11\" ALT=\"\" BORDER=\"0\"></TD>\n"
    ."<TD WIDTH=\"100%\" class=\"tablebottom\"><IMG SRC=\"themes/$thename/images/pix-t.gif\" WIDTH=\"1\" HEIGHT=\"11\" ALT=\"\" BORDER=\"0\"></TD>\n"
    ."<TD WIDTH=\"11\" ALIGN=\"right\" VALIGN=\"top\"><IMG SRC=\"themes/$thename/images/t-br.gif\" WIDTH=\"11\" HEIGHT=\"11\" ALT=\"\" BORDER=\"0\"></TD>\n"
    ."</TR>\n"
    ."</TBODY>\n"
    ."</TABLE><br><br>\n";    
}
    
function themeindex ($aid, $informant, $time, $title, $counter, $topic, $thetext, $notes, $morelink, $topicname, $topicimage, $topictext) {
global $tipath, $anonymous, $bgcolor1, $bgcolor2, $bgcolor3, $bgcolor4, $thename, $bgcolor6, $bgcolor8;
    if ($informant == "") {
    $informant = $anonymous;
    }
    echo "<TABLE WIDTH=\"100%\" BORDER=\"0\" CELLSPACING=\"0\" CELLPADDING=\"0\" ALIGN=\"center\" SUMMARY=\"Border for Generic Block\">\n"
    ."<TBODY>\n"
    ."<TR>\n"
    ."<TD ROWSPAN=\"3\" WIDTH=\"1\" BGCOLOR=\"$bgcolor8\"><IMG SRC=\"themes/$thename/images/pix-t.gif\" WIDTH=\"1\" HEIGHT=\"1\" ALT=\"\" BORDER=\"0\"></TD>\n"
    ."<TD>\n"
    ."<TABLE WIDTH=\"100%\" BORDER=\"0\" CELLSPACING=\"0\" CELLPADDING=\"0\" ALIGN=\"center\" SUMMARY=\"Data for News Block\">\n"
    ."<TBODY>\n"
    ."<TR>\n"
    ."<TD WIDTH=\"100%\" BGCOLOR=\"$bgcolor8\"><IMG SRC=\"themes/$thename/images/pix-t.gif\" WIDTH=\"1\" HEIGHT=\"1\" ALT=\"\" BORDER=\"0\"></TD>\n"
    ."</TR>\n"
    
    ."<TR>\n"
    ."<TD class=\"headline\" WIDTH=\"100%\" VALIGN=\"middle\" ALIGN=\"left\"><IMG SRC=\"themes/$thename/images/n-fl.gif\" WIDTH=\"15\" HEIGHT=\"8\" ALT=\"\" BORDER=\"0\">$title</TD>\n"
    ."</TR>\n"
    
    ."<TR>\n"
    ."<TD WIDTH=\"100%\" BGCOLOR=\"$bgcolor8\"><IMG SRC=\"themes/$thename/images/pix-t.gif\" WIDTH=\"1\" HEIGHT=\"1\" ALT=\"\" BORDER=\"0\"></TD>\n"
    ."</TR>\n"
    ."</TBODY>\n"
    ."</TABLE>\n"
    ."</TD>\n"
    ."<TD ROWSPAN=\"3\" WIDTH=\"1\" BGCOLOR=\"$bgcolor8\"><IMG SRC=\"themes/$thename/images/pix-t.gif\" WIDTH=\"1\" HEIGHT=\"1\" ALT=\"\" BORDER=\"0\"></TD>\n"
    ."</TR>\n"
    
    ."<TR>\n"
    ."<TD BGCOLOR=\"$bgcolor6\" WIDTH=\"100%\" VALIGN=\"top\" ALIGN=\"left\">\n"
    ."<TABLE WIDTH=\"100%\" BORDER=\"0\" CELLSPACING=\"0\" CELLPADDING=\"4\" SUMMARY=\"Content for News Block\">\n"
    ."<TBODY>\n"
    ."<TR>\n"
    ."<TD WIDTH=\"100\" VALIGN=\"top\" ALIGN=\"left\" class=\"newstxt\"><font class=\"pn-sub\">"._POSTEDBY.":&nbsp;$informant&nbsp;"._ON." $time $timezone($counter "._READS.")</font><BR> <b>"._TOPIC.":</b> <a href=\"search.php?query=&amp;topic=$topic&amp;author=\">$topictext</a><br>\n";
    FormatStory($thetext, $notes, $aid, $informant);
    echo "<BR>\n"
    ."<IMG SRC=\"themes/$thename/images/n-inf.gif\" WIDTH=\"10\" HEIGHT=\"8\" BORDER=\"0\" ALT=\"\"> <font class=\"pn-sub\">$morelink</font></TD>\n"
    ."</TR>\n"
    ."</TBODY>\n"
    ."</TABLE>\n"
    ."</TD>\n"
    ."</TR>\n"
    
    ."<TR>\n"
    ."<TD WIDTH=\"100%\" BGCOLOR=\"$bgcolor8\"><IMG SRC=\"themes/$thename/images/pix-t.gif\" WIDTH=\"1\" HEIGHT=\"1\" ALT=\"\"></TD>\n"
    ."</TR>\n"
    ."</TBODY>\n"
    ."</TABLE>\n"
    
    ."<BR>\n";
}
    
function themearticle ($aid, $informant, $datetime, $title, $thetext, $topic, $topicname, $topicimage, $topictext) {
global $admin, $sid, $tipath, $bgcolor1, $bgcolor2, $bgcolor3, $bgcolor4, $thename, $bgcolor5, $bgcolor6;
    echo "<table width=\"100%\">\n"
    ."<tbody>\n"
    ."<tr>\n"
    ."<td>\n"
    ."<table width=\"100%\" cellpadding=\"5\" cellspacing=\"0\">\n"
    ."<tbody>\n"
    ."<tr>\n"
    ."<td width=\"100%\" bgcolor=\"$bgcolor5\"><font class=\"myboxtxt\"><IMG SRC=\"themes/$thename/images/n-inf.gif\" WIDTH=\"10\" HEIGHT=\"8\" BORDER=\"0\" ALT=\"\"> $title</font><br>\n"
    ."<font class=\"myboxtxt\">"._POSTEDBY.":&nbsp;$informant   </font>\n"
    ."</td>\n"
    ."<tr>\n"
    ."<td bgcolor=\"$bgcolor6\" width=\"100%\">\n";
    if ($admin) {
    echo "<font class=\"pn-sub\"> [ <a class=\"pn-sub\" href=\"admin.php?op=EditStory&amp;sid=$sid\">"._EDIT."</a> | <a class=\"pn-sub\" href=\"admin.php?op=RemoveStory&amp;sid=$sid\">"._DELETE."</a> ]</font><br>\n";
    }
    echo "<font class=\"pn-normal\"><a href=\"search.php?query=&amp;topic=$topic\"><img src=\"$tipath$topicimage\" border=\"0\" Alt=\"$topictext\" align=\"right\" hspace=\"5\" vspace=\"5\"></a>\n";
    FormatStory($thetext, $notes, $aid, $informant);
    echo "</font>\n"
    ."</td>\n"
    ."</tr>\n"
    ."</tbody>\n"
    ."</table>\n"
    ."</td>\n"
    ."</tr>\n"
    ."</tbody>\n"
    ."</table>\n";
}
    
function themesidebox($block) {
global $thename, $bgcolor1, $bgcolor2;    
    echo "<TABLE WIDTH=\"150\" BORDER=\"0\" CELLSPACING=\"0\" CELLPADDING=\"0\" SUMMARY=\"Border for generic menu block\">\n"
    ."<TBODY>\n"
    ."<TR>\n"
    ."<TD><IMG SRC=\"themes/$thename/images/b-top.gif\" WIDTH=\"150\" HEIGHT=\"11\" ALT=\"\"></TD>\n"
    ."</TR>\n"
    
    ."<TR>\n"
    ."<TD BGCOLOR=\"$bgcolor2\">\n"
    ."<TABLE WIDTH=\"100%\" BORDER=\"0\" CELLSPACING=\"0\" CELLPADDING=\"0\" BGCOLOR=\"$bgcolor2\" SUMMARY=\"Data for Generic Menu Block\">\n"
    ."<TBODY>\n"
    ."<TR>\n"
    ."<TD ALIGN=\"center\" VALIGN=\"middle\" class=\"boxtitle\">$block[title]</TD>\n"
    ."</TR>\n"
    
    ."<TR>\n"
    ."<TD VALIGN=\"middle\" ALIGN=\"center\"><IMG SRC=\"themes/$thename/images/b-tbot.gif\" WIDTH=\"150\" HEIGHT=\"2\" ALT=\"\" BORDER=\"0\"></TD>\n"
    ."</TR>\n"
    
    ."<TR>\n"
    ."<TD ALIGN=\"left\" VALIGN=\"top\" BGCOLOR=\"$bgcolor2\">\n"
    ."<TABLE WIDTH=\"100%\" BORDER=\"0\" CELLSPACING=\"0\" CELLPADDING=\"4\" SUMMARY=\"Content For Generic Menu Block\">\n"
    ."<TBODY>\n"
    ."<TR>\n"
    ."<TD BGCOLOR=\"$bgcolor2\" class=\"pn-normal\">$block[content]</TD>\n"
    ."</TR>\n"
    ."</TBODY>\n"
    ."</TABLE>\n"
    ."</TD>\n"
    ."</TR>\n"
    ."</TBODY>\n"
    ."</TABLE>\n"
    ."</TD>\n"
    ."</TR>\n"
    
    ."<TR>\n"
    ."<TD><IMG SRC=\"themes/$thename/images/b-bot.gif\" WIDTH=\"150\" HEIGHT=\"25\" ALT=\"\" BORDER=\"0\"></TD>\n"
    ."</TR>\n"
    ."</TBODY>\n"
    ."</TABLE>\n";
}

?>