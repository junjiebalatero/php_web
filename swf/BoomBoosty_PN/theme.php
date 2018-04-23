<?php
global $sepcolor;
/************************************************************************/
/* BoomBoosty - LAYOUT FOR PostNUKE (http://www.postnuke.com)           */
/* Copyright (C) 2001 davduf					                        */
/* http://www.boomtchak.net                                             */
/*                                                                      */
/* Many thanx to kodRed for his help & validation                       */
/* http://www.kodred.com                                                */
/*                                                                      */
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
$thename = "BoomBoosty";
$bgcolor1 = "#d7d9dc";
$bgcolor2 = "#CCCCCC";
$bgcolor3 = "#778899";
$bgcolor4 = "#DAA520";
$sepcolor = "#000000"; // Color for the seperator used in the theme.  Theme only.
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
    global $bgcolor1, $bgcolor2, $username, $user, $cookie, $bgcolor3, $bgcolor4,  $sepcolor, $sitename, $slogan, $banners, $index;
    cookiedecode($user);
    $username = $cookie[1];
    if ($username == "") {
        $username = "Anonymous";
    }
    echo "</HEAD>\n"
        ."<BODY>\n"
        ."<TABLE WIDTH=\"780\" BORDER=\"0\" CELLSPACING=\"0\" CELLPADDING=\"0\" ALIGN=\"center\">\n"
        ."<TR>\n"
        ."<TD VALIGN=\"top\">\n"
        ."<TABLE BORDER=\"0\" CELLSPACING=\"0\" CELLPADDING=\"0\" BGCOLOR=\"$bgcolor3\" WIDTH=\"100%\">\n"
        ."<TR>\n"
        ."<TD BGCOLOR=\"#000000\"><IMG SRC=\"themes/BoomBoosty/images/pix-t.gif\" WIDTH=\"1\" HEIGHT=\"1\" ALT=\"alt1\" BORDER=\"0\"></TD>\n"
        ."</TR>\n"
        
        ."<TR>\n"
        ."<TD ALIGN=\"left\" VALIGN=\"middle\">\n"
        ."<TABLE WIDTH=\"100%\" BORDER=\"0\" CELLSPACING=\"0\" CELLPADDING=\"4\">\n"
        ."<TR>\n"
        ."<TD CLASS=\"pn-title\" VALIGN=\"middle\" ALIGN=\"left\">$slogan</TD>\n"
        ."<TD WIDTH=\"50%\" VALIGN=\"middle\" ALIGN=\"right\" CLASS=\"pn-title\">\n";
        echo strftime(_DATETIMEBRIEF, (GetUserTime(time())));
        echo "</TD>\n"
        ."</TR>\n"
        ."</TABLE>\n"
        ."</TD>\n"
        ."</TR>\n"
        
        ."<TR BGCOLOR=\"#000000\">\n"
        ."<TD><IMG SRC=\"themes/BoomBoosty/images/pix-t.gif\" WIDTH=\"1\" HEIGHT=\"1\" ALT=\"alt1\" BORDER=\"0\"></TD>\n"
        ."</TR>\n"
        
        ."<TR>\n"
        ."<TD>\n"
        ."<TABLE WIDTH=\"100%\" BORDER=\"0\" CELLSPACING=\"0\" CELLPADDING=\"2\">\n"
        ."<TR>\n"
        ."<TD WIDTH=\"100%\"><IMG SRC=\"themes/BoomBoosty/images/logo.gif\" WIDTH=\"175\" HEIGHT=\"58\" ALT=\"welcome to $sitename\" BORDER=\"0\"></TD>\n"
        ."<TD VALIGN=\"middle\" ALIGN=\"right\">\n";
        if ($banners) {
        	include("banners.php");
        }
        echo "</TD>\n"
        ."</TR>\n"
        ."</TABLE>\n"
        ."</TD>\n"
        ."</TR>\n"
        
        ."<TR>\n"
        ."<TD WIDTH=\"100%\" BGCOLOR=\"#000000\"><IMG SRC=\"themes/BoomBoosty/images/pix-t.gif\" WIDTH=\"1\" HEIGHT=\"1\" ALT=\"alt1\" BORDER=\"0\"></TD>\n"
        ."</TR>\n"
        
        ."<TR>\n"
        ."<TD BGCOLOR=\"$bgcolor4\" ALIGN=\"center\" VALIGN=\"middle\">\n"
        ."<TABLE WIDTH=\"100%\" BORDER=\"0\" CELLSPACING=\"0\" CELLPADDING=\"2\">\n"
        ."<TR>\n"
        ."<TD ALIGN=\"center\" VALIGN=\"middle\" CLASS=\"pn-normal\">\n";
        include("themes/BoomBoosty/top_links.php");
        echo "</TD>\n"
        ."</TR>\n"
        ."</TABLE>\n"
        ."</TD>\n"
        ."</TR>\n"
        
        ."<TR>\n"
        ."<TD WIDTH=\"100%\" BGCOLOR=\"#000000\"><IMG SRC=\"themes/BoomBoosty/images/pix-t.gif\" WIDTH=\"1\" HEIGHT=\"1\" ALT=\"alt1\" BORDER=\"0\"></TD>\n"
        ."</TR>\n"
        
        ."<TR>\n"
        ."<TD>\n"
        ."<TABLE WIDTH=\"100%\" BORDER=\"0\" CELLSPACING=\"0\" CELLPADDING=\"2\">\n"
        ."<TR>\n"
        ."<TD ALIGN=\"left\" VALIGN=\"middle\">\n"
        ."<TABLE BORDER=\"0\" CELLSPACING=\"0\" CELLPADDING=\"0\">\n"
        ."<TR>\n"
        ."<TD WIDTH=\"85\"><A HREF=\"index.php\"><IMG SRC=\"themes/BoomBoosty/images/home.gif\" WIDTH=\"85\" HEIGHT=\"16\" ALT=\"Home sweet home\" BORDER=\"0\"></A></TD>\n"
        ."<TD WIDTH=\"85\"><A HREF=\"user.php\"><IMG SRC=\"themes/BoomBoosty/images/login.gif\" WIDTH=\"85\" HEIGHT=\"16\" ALT=\"Login\" BORDER=\"0\"></A></TD>\n"
        ."<TD WIDTH=\"85\"><A HREF=\"modules.php?op=modload&amp;name=Web_Links&amp;file=index\"><IMG SRC=\"themes/BoomBoosty/images/links.gif\" WIDTH=\"85\" HEIGHT=\"16\" ALT=\"Links\" BORDER=\"0\"></A></TD>\n"
        ."<TD WIDTH=\"85\"><A HREF=\"modules.php?op=modload&amp;name=Downloads&amp;file=index\"><IMG SRC=\"themes/BoomBoosty/images/download.gif\" WIDTH=\"85\" HEIGHT=\"16\" ALT=\"downloads\" BORDER=\"0\"></A></TD>\n"
        ."<TD WIDTH=\"85\"><A HREF=\"modules.php?op=modload&amp;name=FAQ&amp;file=index\"><IMG SRC=\"themes/BoomBoosty/images/faq.gif\" WIDTH=\"85\" HEIGHT=\"16\" ALT=\"faq\" BORDER=\"0\"></A></TD>\n"
        ."</TR>\n"
        ."</TABLE>\n"
        ."</TD>\n"
        ."<TD WIDTH=\"100%\" ALIGN=\"right\" VALIGN=\"middle\" CLASS=\"pn-sub\">$username, "._WELCOMETO." $sitename&nbsp;</TD>\n"
        ."</TR>\n"
        ."</TABLE>\n"
        ."</TD>\n"
        ."</TR>\n"
        
        ."<TR>\n"
        ."<TD WIDTH=\"100%\" BGCOLOR=\"#000000\"><IMG SRC=\"themes/BoomBoosty/images/pix-t.gif\" WIDTH=\"1\" HEIGHT=\"1\" ALT=\"alt1\" BORDER=\"0\"></TD>\n"
        ."</TR>\n"
        ."</TABLE>\n"
        
        
        ."<TABLE WIDTH=\"100%\" BORDER=\"0\" CELLSPACING=\"0\" CELLPADDING=\"0\">\n"
        ."<TR>\n"
        ."<TD WIDTH=\"160\" BGCOLOR=\"$bgcolor3\"><IMG SRC=\"themes/BoomBoosty/images/pix-t.gif\" WIDTH=\"160\" HEIGHT=\"5\" ALT=\"alt1\" BORDER=\"0\"></TD>\n"
        ."<TD WIDTH=\"5\"><IMG SRC=\"themes/BoomBoosty/images/pix-t.gif\" WIDTH=\"5\" HEIGHT=\"1\" ALT=\"alt1\" BORDER=\"0\"></TD>\n"
        ."<TD WIDTH=\"100%\"><IMG SRC=\"themes/BoomBoosty/images/pix-t.gif\" WIDTH=\"1\" HEIGHT=\"1\" ALT=\"alt1\" BORDER=\"0\"></TD>\n";
        if ($index == 1) {
        	echo "<TD WIDTH=\"5\"><IMG SRC=\"themes/BoomBoosty/images/pix-t.gif\" WIDTH=\"5\" HEIGHT=\"1\" ALT=\"alt1\" BORDER=\"0\"></TD>\n"
        	."<TD WIDTH=\"160\" BGCOLOR=\"$bgcolor3\"><IMG SRC=\"themes/BoomBoosty/images/pix-t.gif\" WIDTH=\"160\" HEIGHT=\"5\" ALT=\"alt1\" BORDER=\"0\"></TD>\n";
        }
        echo "</TR>\n"
        
        ."<TR>\n"
        ."<TD WIDTH=\"160\" BGCOLOR=\"$bgcolor3\" ALIGN=\"center\" VALIGN=\"top\">\n";
        blocks('left');
        echo "</TD>\n"
        ."<TD WIDTH=\"5\"><IMG SRC=\"themes/BoomBoosty/images/pix-t.gif\" WIDTH=\"5\" HEIGHT=\"1\" ALT=\"alt1\" BORDER=\"0\"></TD>\n"
        ."<TD ALIGN=\"center\" VALIGN=\"top\">\n";
}

function themefooter() {
    global $index, $bgcolor1, $bgcolor2, $bgcolor3, $bgcolor4, $sepcolor;
        
        echo "</TD>\n";
        if ($index == 1) {
        	echo "<TD WIDTH=\"5\"><IMG SRC=\"themes/BoomBoosty/images/pix-t.gif\" WIDTH=\"5\" HEIGHT=\"1\" ALT=\"alt1\" BORDER=\"0\"></TD>\n"
        	."<TD BGCOLOR=\"$bgcolor3\" ALIGN=\"center\" VALIGN=\"top\">\n";
        	blocks('right');
        	echo "</TD>\n";
        }
        echo "</TR>\n"
        ."</TABLE>\n"
        
        ."<TABLE WIDTH=\"100%\" BORDER=\"0\" CELLSPACING=\"0\" CELLPADDING=\"0\">\n"
        ."<TR>\n"
        ."<TD WIDTH=\"100%\" BGCOLOR=\"#000000\"><IMG SRC=\"themes/BoomBoosty/images/pix-t.gif\" WIDTH=\"1\" HEIGHT=\"1\" ALT=\"alt1\" BORDER=\"0\"></TD>\n"
        ."</TR>\n"
        
        ."<TR>\n"
        ."<TD BGCOLOR=\"$bgcolor4\" ALIGN=\"center\" VALIGN=\"middle\">\n"
        ."<TABLE WIDTH=\"100%\" BORDER=\"0\" CELLSPACING=\"0\" CELLPADDING=\"2\">\n"
        ."<TR>\n"
        ."<TD VALIGN=\"middle\" ALIGN=\"center\" CLASS=\"pn-normal\">\n";
        include("themes/BoomBoosty/bottom_links.php");
        echo "</TD>\n"
        ."</TR>\n"
        ."</TABLE>\n"
        ."</TD>\n"
        ."</TR>\n"
        
        ."<TR>\n"
        ."<TD WIDTH=\"100%\" BGCOLOR=\"#000000\"><IMG SRC=\"themes/BoomBoosty/images/pix-t.gif\" WIDTH=\"1\" HEIGHT=\"1\" ALT=\"alt1\" BORDER=\"0\"></TD>\n"
        ."</TR>\n"
        
        ."<TR>\n"
        ."<TD BGCOLOR=\"$bgcolor3\" ALIGN=\"center\" VALIGN=\"middle\"><a href=\"http://www.boomtchak.net\" target=\"_blank\"><img src=\"themes/BoomBoosty/images/boomsign.gif\" WIDTH=\"109\" HEIGHT=\"16\" ALT=\"design by boomtchak\" hspace=\"0\" vspace=\"2\" align=\"middle\"></a><br>\n";
        footmsg();
        echo "</TD>\n"
        ."</TR>\n"
        
        ."<TR>\n"
        ."<TD BGCOLOR=\"#000000\"><IMG SRC=\"themes/BoomBoosty/images/pix-t.gif\" WIDTH=\"1\" HEIGHT=\"1\" ALT=\"alt1\" BORDER=\"0\"></TD>\n"
        ."</TR>\n"
        ."</TABLE>\n"
        ."</TD>\n"
        ."</TR>\n"
        ."</TABLE>\n";

}

function themeindex ($aid, $informant, $time, $title, $counter, $topic, $thetext, $notes, $morelink, $topicname, $topicimage, $topictext) {
    global $tipath, $anonymous, $bgcolor1, $bgcolor2, $bgcolor3, $bgcolor4,  $sepcolor;
    if ($informant == "") {
    	$informant = $anonymous;
    }
        echo "<TABLE WIDTH=\"100%\" BORDER=\"0\" CELLSPACING=\"0\" CELLPADDING=\"0\">\n"
        ."<TR>\n"
        ."<TD>\n"
        ."<TABLE WIDTH=\"100%\" BORDER=\"0\" CELLSPACING=\"0\" CELLPADDING=\"0\">\n"
        ."<TR BGCOLOR=\"#000000\">\n"
        ."<TD><IMG SRC=\"themes/BoomBoosty/images/pix-t.gif\" WIDTH=\"1\" HEIGHT=\"1\" ALT=\"alt1\" BORDER=\"0\"></TD>\n"
        ."</TR>\n"
        
        ."<TR>\n"
        ."<TD>\n"
        ."<TABLE BORDER=\"0\" CELLSPACING=\"0\" CELLPADDING=\"3\" BGCOLOR=\"$bgcolor4\">\n"
        ."<TR>\n"
        ."<TD CLASS=\"pn-title\">$title</TD>\n"
        ."</TR>\n"
        ."</TABLE>\n"
        ."</TD>\n"
        ."</TR>\n"
        ."</TABLE>\n"
        ."</TD>\n"
        ."</TR>\n"
        
        ."<TR>\n"
        ."<TD ALIGN=\"left\" VALIGN=\"top\" CLASS=\"pn-normal\">\n"
        ."<a href=\"search.php?query=&amp;topic=$topic\"><img src=\"$tipath$topicimage\" border=\"0\" Alt=\"$topictext\" align=\"left\" hspace=\"5\" vspace=\"5\"></a><b>"._ON." $time $timezone</b><br>\n";
        FormatStory($thetext, $notes, $aid, $informant);
        echo "</TD>\n"
        ."</TR>\n"
        
        ."<TR>\n"
        ."<TD VALIGN=\"middle\" ALIGN=\"right\" WIDTH=\"100%\">\n"
        ."<TABLE WIDTH=\"100%\" BORDER=\"0\" CELLSPACING=\"0\" CELLPADDING=\"3\">\n"
        ."<TR>\n"
        ."<TD WIDTH=\"40%\" VALIGN=\"baseline\" CLASS=\"pn-sub\"><b>"._POSTEDBY.":&nbsp;$informant</b></TD>\n"
        ."<TD ALIGN=\"right\" VALIGN=\"baseline\" WIDTH=\"60%\" CLASS=\"pn-sub\">$morelink</TD>\n"
        ."</TR>\n"
        ."</TABLE>\n"
        ."</TD>\n"
        ."</TR>\n"
        ."</TABLE>\n"
        
        ."<BR>\n";
}

function themearticle ($aid, $informant, $datetime, $title, $thetext, $topic, $topicname, $topicimage, $topictext) {
    global $admin, $sid, $tipath, $bgcolor1, $bgcolor2, $bgcolor3, $bgcolor4,   $sepcolor;
   echo "<TABLE WIDTH=\"100%\" BORDER=\"0\" CELLSPACING=\"0\" CELLPADDING=\"0\">\n"
        ."<TR BGCOLOR=\"$sepcolor\">\n"
        ."<TD><IMG SRC=\"themes/PostNuke/images/pix-t.gif\" WIDTH=\"1\" HEIGHT=\"1\" ALT=\"alt1\" BORDER=\"0\"></TD>\n"
        ."</TR>\n"
        ."<TR>\n"
        ."<TD>\n"
        ."<TABLE BORDER=\"0\" CELLSPACING=\"0\" CELLPADDING=\"3\" WIDTH=\"100%\" BGCOLOR=\"$bgcolor4\">\n"
        ."<TR>\n"
        ."<TD WIDTH=\"100%\"><font CLASS=\"pn-title\">$title</font><br>\n"
        ."<font CLASS=\"pn-sub\">"._POSTEDBY.": $informant</font></TD>\n"
        ."</TR>\n"
        ."</TABLE>\n"
        ."</TD>\n"
        ."</TR>\n"
        ."<TR BGCOLOR=\"$sepcolor\">\n"
        ."<TD><IMG SRC=\"themes/PostNuke/images/pix-t.gif\" WIDTH=\"1\" HEIGHT=\"1\" ALT=\"alt1\" BORDER=\"0\"></TD>\n"
        ."</TR>\n"
        ."<TR>\n"
        ."<TD ALIGN=\"left\" VALIGN=\"top\" CLASS=\"pn-normal\">\n";
        if ($admin) {
        	echo "<font class=\"pn-sub\"> [ <a href=\"admin.php?op=EditStory&amp;sid=$sid\">"._EDIT."</a> | <a href=\"admin.php?op=RemoveStory&amp;sid=$sid\">"._DELETE."</a> ]</font><br><br>\n";
        }
        echo "<b>"._TOPIC."</b> <a href=\"search.php?query=&amp;topic=$topic&amp;author=\">$topictext</a><br>\n";
        FormatStory($thetext, $notes, $aid, $informant);
        echo "</TD>\n"
        ."</TR>\n"
        ."<TR BGCOLOR=\"$sepcolor\">\n"
        ."<TD><IMG SRC=\"themes/PostNuke/images/pix-t.gif\" WIDTH=\"1\" HEIGHT=\"1\" ALT=\"alt1\" BORDER=\"0\"></TD>\n"
        ."</TR>\n"
        ."<TR BGCOLOR=\"$sepcolor\">\n"
        ."<TD><IMG SRC=\"themes/PostNuke/images/pix-t.gif\" WIDTH=\"1\" HEIGHT=\"1\" ALT=\"alt1\" BORDER=\"0\"></TD>\n"
        ."</TR>\n"
        ."</TABLE>\n";
}

function themesidebox($block) {
global $bgcolor4;


    echo "<TABLE WIDTH=\"140\" BORDER=\"0\" CELLSPACING=\"0\" CELLPADDING=\"0\">\n"
        ."<TR>\n"
        ."<TD>\n"
        ."<TABLE WIDTH=\"140\" BORDER=\"0\" CELLSPACING=\"0\" CELLPADDING=\"0\">\n"
        ."<TR>\n"
        ."<TD BGCOLOR=\"$bgcolor4\"><IMG SRC=\"themes/BoomBoosty/images/pix-t.gif\" WIDTH=\"6\" HEIGHT=\"6\" ALT=\"alt1\" BORDER=\"0\"></TD>\n"
        ."<TD WIDTH=\"100%\"><IMG SRC=\"themes/BoomBoosty/images/pix-t.gif\" WIDTH=\"1\" HEIGHT=\"1\" ALT=\"alt1\" BORDER=\"0\"></TD>\n"
        ."</TR>\n"
        
        ."<TR BGCOLOR=\"$bgcolor4\">\n"
        ."<TD COLSPAN=\"2\"><IMG SRC=\"themes/BoomBoosty/images/pix-t.gif\" WIDTH=\"1\" HEIGHT=\"1\" ALT=\"alt1\" BORDER=\"0\"></TD>\n"
        ."</TR>\n"
        ."</TABLE>\n"
        ."</TD>\n"
        ."</TR>\n"
        
        ."<TR>\n"
        ."<TD>\n"
        ."<TABLE WIDTH=\"140\" BORDER=\"0\" CELLSPACING=\"0\" CELLPADDING=\"2\">\n"
        ."<TR>\n"
        ."<TD ALIGN=\"left\" VALIGN=\"top\" CLASS=\"pn-title\">$block[title]</TD>\n"
        ."</TR>\n"
        
        ."<TR>\n"
        ."<TD ALIGN=\"left\" VALIGN=\"top\" CLASS=\"pn-normal\">$block[content]</TD>\n"
        ."</TR>\n"
        ."</TABLE>\n"
        ."</TD>\n"
        ."</TR>\n"
        ."</TABLE><br>\n";
}

?>