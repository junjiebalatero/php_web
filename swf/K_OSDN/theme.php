<?php // $Id: theme.php,v 1.5.1 20/08/2001 16:37 kodred Exp $ $Name:  $
/************************************************************************/
/* K_OSDN - LAYOUT FOR PostNUKE (http://postnuke.com)                   */
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
global $thename, $TopMenu, $kcopyright, $kbarmenu, $bgcolor5, $bgcolor6, $bgcolor7, $bgcolor8, $bgcolor9, $bgcolor10;
/************************************************************************/
/* Internal setting                                                     */
/************************************************************************/
// The name of your Theme (Name of the theme = The theme folder name)
$thename = "K_OSDN";

// THIS is The Link Menu located on your top left header
$TopMenu = "<A HREF=\"http://www.babylone6tem.com\">KODRED</a> | <A HREF=\"http://www.phpnuke.org\">PHPNuke.org</a> | <A HREF=\"http://www.osdn.com/\">OSDN</a>";

// THIS is The Navigation Menu
$kbarmenu = "<B><SPAN CLASS=\"menu\"><A HREF=\"index.php\">"._INDEX."</A></SPAN>
<strong>&nbsp;&middot;&nbsp;</strong> <SPAN CLASS=\"menu\"><A HREF=\"modules.php?op=modload&amp;name=Topics&amp;file=index\">"._TOPICS."</A></SPAN>
<strong>&nbsp;&middot;&nbsp;</strong> <SPAN CLASS=\"menu\"><A HREF=\"modules.php?op=modload&amp;name=Reviews&amp;file=index\">"._REVIEWS."</A></SPAN>
<strong>&nbsp;&middot;&nbsp;</strong> <SPAN CLASS=\"menu\"><A HREF=\"modules.php?op=modload&amp;name=Sections&amp;file=index\">"._SSECTIONS."</A></SPAN>
<strong>&nbsp;&middot;&nbsp;</strong> <SPAN CLASS=\"menu\"><A HREF=\"modules.php?op=modload&amp;name=Downloads&amp;file=index\">"._UDOWNLOADS."</A></SPAN>
<strong>&nbsp;&middot;&nbsp;</strong> <SPAN CLASS=\"menu\"><A HREF=\"modules.php?op=modload&amp;name=Web_Links&amp;file=index\">"._WEBLINKS."</A></SPAN>
<strong>&nbsp;&middot;&nbsp;</strong> <SPAN CLASS=\"menu\"><A HREF=\"modules.php?op=modload&amp;name=Submit_News&amp;file=index\">"._SUBMITNEWS."</A></SPAN></B>";

// A little link to my WebSite :) on the bottom of the page
$kcopyright = "<A HREF=\"http://www.babylone6tem.com\">KodRed Design</a>";

// Theme Colors Definition
$bgcolor1 = "#eeeeee";
$bgcolor2 = "#B7B8DD";
$bgcolor3 = "#efefef";
$bgcolor4 = "#FFFFC0";
$bgcolor5 = "#999999";
$bgcolor6 = "#000000";
$bgcolor7 = "#336699";
$bgcolor8 = "#FFFFFF";
$bgcolor9 = "#00CCFF";
$bgcolor10 = "#cccc99";
$textcolor1 = "#000000";
$textcolor2 = "#000000";
$postnuke_theme = true;

/************************************************************************/
/* End Internal setting                                                 */
/************************************************************************/

/************************************************************/
/* OpenTable Functions                                      */
/************************************************************/

function OpenTable() {
    global $bgcolor1, $bgcolor2;
    echo "<table width=\"100%\" border=\"0\" cellspacing=\"1\" cellpadding=\"0\" bgcolor=\"$bgcolor2\"><tr><td>\n";
    echo "<table width=\"100%\" border=\"0\" cellspacing=\"1\" cellpadding=\"6\" bgcolor=\"$bgcolor1\"><tr><td>\n";
}

function CloseTable() {
    echo "</td></tr></table></td></tr></table>\n";
}

function OpenTable2() {
    global $bgcolor1, $bgcolor2;
    echo "<table border=\"0\" cellspacing=\"1\" cellpadding=\"0\" bgcolor=\"$bgcolor2\" align=\"center\"><tr><td>\n";
    echo "<table border=\"0\" cellspacing=\"1\" cellpadding=\"6\" bgcolor=\"$bgcolor1\"><tr><td>\n";
}

function CloseTable2() {
    echo "</td></tr></table></td></tr></table>\n";
}

/************************************************************/
/* FormatStory                                              */
/************************************************************/

function FormatStory($thetext, $notes, $aid, $informant) {
    global $anonymous;
    if ($notes != "") {
    $notes = "<br><b>"._NOTE."</b><i>$notes</i>\n";
    } else {
    $notes = "";
    }
    if ("$aid" == "$informant") {
        echo "<font class=\"pn-normal\">$thetext$notes</font>\n";
    } else {
        if($informant != "") {
            $boxstuff = "<a href=\"user.php?op=userinfo&amp;uname=$informant\">$informant</a> ";
        } else {
            $boxstuff = "$anonymous ";
        }
        $boxstuff .= ""._WRITES." \"$thetext\"$notes\n";
        echo "<font class=\"pn-normal\">$boxstuff</font>\n";
    }
}

/************************************************************/
/* Function themeheader()                                   */
/************************************************************/

function themeheader() {
    global $user, $TopMenu, $banners, $sitename, $slogan, $cookie, $prefix, $thename, $username, $bgcolor1, $bgcolor5, $bgcolor6, $bgcolor7, $bgcolor8, $bgcolor10, $kbarmenu;
    cookiedecode($user);
    $username = $cookie[1];
    if ($username == "") {
        $username = "Anonymous";
    }
    echo "</head><BODY>\n"
    ."<FORM METHOD=\"POST\" ACTION=\"search.php\">\n"
    ."<TABLE WIDTH=\"100%\" BORDER=\"0\" CELLSPACING=\"0\" CELLPADDING=\"0\">\n"
    ."<TBODY>\n"
    ."<TR>\n"
    ."<TD COLSPAN=\"3\" BGCOLOR=\"$bgcolor5\"><IMG SRC=\"themes/$thename/images/pixT.gif\" WIDTH=\"1\" HEIGHT=\"1\" ALT=\"alt1\" BORDER=\"0\"></TD>\n"
    ."</TR>\n"

    ."<TR>\n"
    ."<TD BGCOLOR=\"$bgcolor1\">&nbsp;&nbsp;&nbsp;<SPAN CLASS=\"pn-sub\"><B>$TopMenu</B></SPAN></TD>\n"
    ."<TD VALIGN=\"middle\" ALIGN=\"right\" BGCOLOR=\"$bgcolor1\"><IMG SRC=\"themes/$thename/images/pixT.gif\" WIDTH=\"1\" HEIGHT=\"22\" ALT=\"alt1\" BORDER=\"0\"></TD>\n"
    ."<TD VALIGN=\"middle\" ALIGN=\"right\" BGCOLOR=\"$bgcolor1\"><SPAN CLASS=\"pn-sub\"><B>"._SEARCH.":</B></SPAN> <INPUT NAME=\"query\" SIZE=\"10\"> <INPUT TYPE=\"submit\" VALUE=\""._GO."\">&nbsp;&nbsp;&nbsp;&nbsp;</TD>\n"
    ."</TR>\n"

    ."<TR>\n"
    ."<TD COLSPAN=\"3\" BGCOLOR=\"$bgcolor5\"><IMG SRC=\"themes/$thename/images/pixT.gif\" WIDTH=\"1\" HEIGHT=\"1\" ALT=\"alt1\" BORDER=\"0\"></TD>\n"
    ."</TR>\n"
    ."</TBODY>\n"
    ."</TABLE>\n"
    ."</FORM>\n"

    ."<TABLE WIDTH=\"100%\" BORDER=\"0\" CELLSPACING=\"0\" CELLPADDING=\"0\">\n"
    ."<TR>\n"
    ."<TD WIDTH=\"25%\"><A HREF=\"index.php\"><IMG SRC=\"themes/$thename/images/logo.gif\" WIDTH=\"180\" HEIGHT=\"60\" ALT=\""._WELCOMETO." $sitename\" BORDER=\"0\"></A></TD>\n"
    ."<TD VALIGN=\"middle\" ALIGN=\"center\">\n"
    ."<TABLE WIDTH=\"468\" BORDER=\"0\" CELLSPACING=\"0\" CELLPADDING=\"0\">\n"
    ."<TR>\n"
    ."<TD VALIGN=\"middle\" ALIGN=\"center\">\n";
    if ($banners) {
        include("banners.php");
    }
    echo "</TD>\n"
    ."</TR>\n"
    ."</TABLE>\n"
    ."</TD>\n"
    ."<TD WIDTH=\"25%\">&nbsp;</TD>\n"
    ."</TR>\n"
    ."</TABLE><br>\n"

    ."<TABLE CELLSPACING=\"0\" CELLPADDING=\"0\" WIDTH=\"100%\" ALIGN=\"center\" BORDER=\"0\">\n"
    ."<TBODY>\n"
    ."<TR>\n"
    ."<TD BGCOLOR=\"$bgcolor5\"><IMG HEIGHT=\"1\" ALT=\"\" SRC=\"themes/$thename/images/pixT.gif\" WIDTH=\"1\"></TD>\n"
    ."</TR>\n"

    ."<TR>\n"
    ."<TD BGCOLOR=\"$bgcolor6\"><IMG HEIGHT=\"1\" ALT=\"\" SRC=\"themes/$thename/images/pixT.gif\" WIDTH=\"1\"></TD>\n"
    ."</TR>\n"

    ."<TR>\n"
    ."<TD BGCOLOR=\"$bgcolor7\"><IMG HEIGHT=\"4\" ALT=\"alt1\" SRC=\"themes/$thename/images/pixT.gif\" WIDTH=\"1\" BORDER=\"0\"></TD>\n"
    ."</TR>\n"

    ."<TR>\n"
    ."<TD VALIGN=\"middle\" ALIGN=\"center\" BGCOLOR=\"$bgcolor1\">$kbarmenu</TD>\n"
    ."</TR>\n"

    ."<TR>\n"
    ."<TD BGCOLOR=\"$bgcolor5\"><IMG HEIGHT=\"1\" ALT=\"\" SRC=\"themes/$thename/images/pixT.gif\" WIDTH=\"1\"></TD>\n"
    ."</TR>\n"
    ."</TBODY>\n"
    ."</TABLE>\n"

    ."<TABLE WIDTH=\"100%\" BORDER=\"0\" CELLSPACING=\"0\" CELLPADDING=\"0\">\n"
    ."<TR>\n"
    ."<TD><IMG SRC=\"themes/$thename/images/pixT.gif\" WIDTH=\"1\" HEIGHT=\"5\" ALT=\"alt1\" BORDER=\"0\"></TD>\n"
    ."</TR>\n"
    ."</TABLE>\n"

    ."<TABLE WIDTH=\"100%\" BORDER=\"0\" CELLSPACING=\"0\" CELLPADDING=\"0\" BGCOLOR=\"$bgcolor8\">\n"
    ."<TBODY>\n"
    ."<TR>\n"
    ."<TD BGCOLOR=\"$bgcolor6\"><IMG SRC=\"themes/$thename/images/pixT.gif\" WIDTH=\"1\" HEIGHT=\"1\" ALT=\"alt1\" BORDER=\"0\"></TD>\n"
    ."<TD ROWSPAN=\"3\" VALIGN=\"middle\" ALIGN=\"center\" WIDTH=\"29\"><IMG HEIGHT=\"22\" SRC=\"themes/$thename/images/sep.gif\" WIDTH=\"29\" ALT=\"alt1\" BORDER=\"0\"></TD>\n"
    ."<TD BGCOLOR=\"$bgcolor6\"><IMG SRC=\"themes/$thename/images/pixT.gif\" WIDTH=\"1\" HEIGHT=\"1\" ALT=\"alt1\" BORDER=\"0\"></TD>\n"
    ."<TD BGCOLOR=\"$bgcolor6\"><IMG SRC=\"themes/$thename/images/pixT.gif\" WIDTH=\"1\" HEIGHT=\"1\" ALT=\"alt1\" BORDER=\"0\"></TD>\n"
    ."</TR>\n"

    ."<TR>\n"
    ."<TD WIDTH=\"20%\" ALIGN=\"left\" VALIGN=\"middle\">&nbsp;&nbsp;</TD>\n"
    ."<TD VALIGN=\"middle\" ALIGN=\"left\" WIDTH=\"50%\"><I CLASS=\"pn-sub\">$slogan...</I></TD>\n"
    ."<TD VALIGN=\"middle\" ALIGN=\"right\" WIDTH=\"30%\"><SPAN CLASS=\"pn-sub\"><b>\n";
    echo formatTimestamp(GetUserTime(strftime("%Y-%m-%d %H:%M:%S", time())));
    echo "</b>&nbsp;&nbsp;</SPAN></TD>\n"
    ."<TD WIDTH=\"1\" VALIGN=\"middle\" ALIGN=\"right\"><IMG SRC=\"themes/$thename/images/pixT.gif\" WIDTH=\"1\" HEIGHT=\"20\" ALT=\"alt1\" BORDER=\"0\"></TD>\n"
    ."</TR>\n"

    ."<TR>\n"
    ."<TD BGCOLOR=\"$bgcolor6\"><IMG SRC=\"themes/$thename/images/pixT.gif\" WIDTH=\"1\" HEIGHT=\"1\" ALT=\"alt1\" BORDER=\"0\"></TD>\n"
    ."<TD BGCOLOR=\"$bgcolor6\"><IMG SRC=\"themes/$thename/images/pixT.gif\" WIDTH=\"1\" HEIGHT=\"1\" ALT=\"alt1\" BORDER=\"0\"></TD>\n"
    ."<TD BGCOLOR=\"$bgcolor6\"><IMG SRC=\"themes/$thename/images/pixT.gif\" WIDTH=\"1\" HEIGHT=\"1\" ALT=\"alt1\" BORDER=\"0\"></TD>\n"
    ."</TR>\n"
    ."</TBODY>\n"
    ."</TABLE>\n"

    ."<TABLE WIDTH=\"100%\" BORDER=\"0\" CELLSPACING=\"0\" CELLPADDING=\"0\">\n"
    ."<TR>\n"
    ."<TD><IMG SRC=\"themes/$thename/images/pixT.gif\" WIDTH=\"1\" HEIGHT=\"10\" ALT=\"alt1\" BORDER=\"0\"></TD>\n"
    ."</TR>\n"
    ."</TABLE>\n"

    ."<TABLE WIDTH=\"100%\" BORDER=\"0\" CELLSPACING=\"0\" CELLPADDING=\"0\">\n"
    ."<TBODY>\n"
    ."<TR>\n"
    ."<TD ALIGN=\"center\" VALIGN=\"top\" WIDTH=\"4\"><IMG SRC=\"themes/$thename/images/pixT.gif\" WIDTH=\"4\" HEIGHT=\"1\" ALT=\"alt1\" BORDER=\"0\"></TD>\n"
    ."<TD ALIGN=\"left\" VALIGN=\"top\" WIDTH=\"155\">\n";
    if ($username == "Anonymous") {
    echo "\n";
    } else {
    echo "<TABLE WIDTH=\"155\" BORDER=\"0\" CELLSPACING=\"0\" CELLPADDING=\"1\" BGCOLOR=\"$bgcolor6\">\n"
    ."<TBODY>\n"
    ."<TR>\n"
    ."<TD ALIGN=\"center\" VALIGN=\"middle\">\n"
    ."<TABLE CELLSPACING=\"0\" CELLPADDING=\"4\" WIDTH=\"155\" BORDER=\"0\" BGCOLOR=\"$bgcolor8\">\n"
    ."<TBODY>\n"
    ."<TR BGCOLOR=\"$bgcolor7\">\n"
    ."<TD BGCOLOR=\"$bgcolor7\" CLASS=\"boxtitle\">"._PREFERENCES."</TD>\n"
    ."</TR>\n"

    ."<TR>\n"
    ."<TD BGCOLOR=\"$bgcolor10\"><IMG HEIGHT=\"1\" SRC=\"themes/$thename/images/pixT.gif\" WIDTH=\"1\" ALT=\"alt1\" BORDER=\"0\"></TD>\n"
    ."</TR>\n"

    ."<TR>\n"
    ."<TD VALIGN=\"top\" BGCOLOR=\"$bgcolor8\" CLASS=\"pn-sub\"><b>$username<br><br>\n"
    ."<A HREF=\"user.php?op=edituser\">"._CHANGEYOURINFO."</a><br><A HREF=\"user.php?op=edithome\">"._HOMECONFIG."</a><br>\n"
    ."<A HREF=\"user.php?op=editcomm\">"._CONFIGCOMMENTS."</a><br><A HREF=\"user.php?op=chgtheme\">"._SELECTTHETHEME."</a><br>\n"
    ."<A HREF=\"user.php?op=logout\">"._LOGOUTEXIT."</a><br></TD>\n"
    ."</TR>\n"
    ."</TBODY>\n"
    ."</TABLE>\n"
    ."</TD>\n"
    ."</TR>\n"
    ."</TBODY>\n"
    ."</TABLE>\n"

    ."<BR>\n";
    }
    blocks(left);

    echo "</TD>\n"
    ."<TD WIDTH=\"4\" ALIGN=\"left\" VALIGN=\"top\"><IMG SRC=\"themes/$thename/images/pixT.gif\" WIDTH=\"8\" HEIGHT=\"1\" ALT=\"alt1\" BORDER=\"0\"></TD>\n"
    ."<TD WIDTH=\"100%\" VALIGN=\"top\" ALIGN=\"center\">\n";
}

/************************************************************/
/* Function themefooter()                                   */
/************************************************************/

function themefooter() {
    global $index, $thename, $bgcolor1, $bgcolor6, $bgcolor8, $kcopyright;
    if ($index == 1) {
    echo "</TD>\n"
    ."<TD WIDTH=\"4\" ALIGN=\"center\" VALIGN=\"top\"><IMG SRC=\"themes/$thename/images/pixT.gif\" WIDTH=\"8\" HEIGHT=\"1\" ALT=\"alt1\" BORDER=\"0\"></TD>\n"
    ."<TD ALIGN=\"center\" VALIGN=\"top\" WIDTH=\"155\">\n";
        blocks(right);
    }
    echo "</TD>\n"
    ."<TD ALIGN=\"right\" VALIGN=\"top\" WIDTH=\"4\"><IMG SRC=\"themes/$thename/images/pixT.gif\" WIDTH=\"4\" HEIGHT=\"1\" ALT=\"alt1\" BORDER=\"0\"></TD>\n"
    ."</TR>\n"
    ."</TBODY>\n"
    ."</TABLE>\n"

    ."<TABLE WIDTH=\"100%\" BORDER=\"0\" CELLSPACING=\"0\" CELLPADDING=\"0\" BGCOLOR=\"$bgcolor8\">\n"
    ."<TBODY>\n"
    ."<TR>\n"
    ."<TD BGCOLOR=\"$bgcolor6\"><IMG SRC=\"themes/$thename/images/pixT.gif\" WIDTH=\"1\" HEIGHT=\"1\" ALT=\"alt1\" BORDER=\"0\"></TD>\n"
    ."<TD ROWSPAN=\"3\" VALIGN=\"middle\" ALIGN=\"center\" WIDTH=\"29\"><IMG HEIGHT=\"22\" SRC=\"themes/$thename/images/sep2.gif\" WIDTH=\"29\" ALT=\"alt1\" BORDER=\"0\"></TD>\n"
    ."<TD BGCOLOR=\"$bgcolor6\"><IMG SRC=\"themes/$thename/images/pixT.gif\" WIDTH=\"1\" HEIGHT=\"1\" ALT=\"alt1\" BORDER=\"0\"></TD>\n"
    ."<TD BGCOLOR=\"$bgcolor6\"><IMG SRC=\"themes/$thename/images/pixT.gif\" WIDTH=\"1\" HEIGHT=\"1\" ALT=\"alt1\" BORDER=\"0\"></TD>\n"
    ."</TR>\n"

    ."<TR>\n"
    ."<TD><IMG SRC=\"themes/$thename/images/pixT.gif\" WIDTH=\"170\" HEIGHT=\"1\" ALT=\"alt1\" BORDER=\"0\"></TD>\n"
    ."<TD WIDTH=\"1\"><IMG SRC=\"themes/$thename/images/pixT.gif\" WIDTH=\"1\" HEIGHT=\"20\" BORDER=\"0\" ALT=\"alt\"></TD>\n"
    ."<TD WIDTH=\"100%\" ALIGN=\"right\"> <FONT CLASS=\"pn-sub\">$kcopyright&nbsp;&nbsp;</FONT></TD>\n"
    ."</TR>\n"

    ."<TR>\n"
    ."<TD BGCOLOR=\"$bgcolor6\"><IMG SRC=\"themes/$thename/images/pixT.gif\" WIDTH=\"1\" HEIGHT=\"1\" ALT=\"alt1\" BORDER=\"0\"></TD>\n"
    ."<TD BGCOLOR=\"$bgcolor6\"><IMG SRC=\"themes/$thename/images/pixT.gif\" WIDTH=\"1\" HEIGHT=\"1\" ALT=\"alt1\" BORDER=\"0\"></TD>\n"
    ."<TD BGCOLOR=\"$bgcolor6\"><IMG SRC=\"themes/$thename/images/pixT.gif\" WIDTH=\"1\" HEIGHT=\"1\" ALT=\"alt1\" BORDER=\"0\"></TD>\n"
    ."</TR>\n"
    ."</TBODY>\n"
    ."</TABLE>\n"

    ."<TABLE WIDTH=\"100%\" BORDER=\"0\" CELLSPACING=\"0\" CELLPADDING=\"4\">\n"
    ."<TBODY>\n"
    ."<TR>\n"
    ."<TD CLASS=\"pn-sub\">\n";
    footmsg();
    echo "</TD>\n"
    ."</TR>\n"
    ."</TBODY>\n"
    ."</TABLE><br>\n";
}

/************************************************************/
/* Function themeindex()                                    */
/************************************************************/

function themeindex ($aid, $informant, $time, $title, $counter, $topic, $thetext, $notes, $morelink, $topicname, $topicimage, $topictext) {
    global $tipath, $anonymous, $thename, $bgcolor1, $bgcolor6, $bgcolor8;
    echo "<TABLE WIDTH=\"100%\" BORDER=\"0\" CELLSPACING=\"0\" CELLPADDING=\"1\" BGCOLOR=\"$bgcolor6\">\n"
    ."<TBODY>\n"
    ."<TR>\n"
    ."<TD ALIGN=\"center\" VALIGN=\"middle\">\n"
    ."<TABLE WIDTH=\"100%\" BORDER=\"0\" CELLSPACING=\"0\" CELLPADDING=\"2\" BGCOLOR=\"$bgcolor8\">\n"
    ."<TBODY>\n"
    ."<TR>\n"
    ."<TD BGCOLOR=\"$bgcolor1\"><FONT CLASS=\"newstitle\">$title</FONT><BR><FONT CLASS=\"pn-sub\">"._POSTEDBY." ";
    formatAidHeader($aid);
    echo " "._ON." $time $timezone</FONT></TD>\n"
    ."</TR>\n"

    ."<TR>\n"
    ."<TD ALIGN=\"left\" VALIGN=\"top\"><a href=\"search.php?query=&amp;topic=$topic\"><img src=\"$tipath$topicimage\" border=\"0\" Alt=\"$topictext\" align=\"left\" hspace=\"5\" vspace=\"5\"></a>\n";
    FormatStory($thetext, $notes, $aid, $informant);
    echo "</TD>\n"
    ."</TR>\n"

    ."<TR>\n"
    ."<TD ALIGN=\"LEFT\" VALIGN=\"middle\">\n"
    ."<TABLE WIDTH=\"100%\" BORDER=\"0\" CELLSPACING=\"0\" CELLPADDING=\"0\">\n"
    ."<TBODY>\n"
    ."<TR>\n"
    ."<TD BGCOLOR=\"$bgcolor1\"><IMG SRC=\"themes/$thename/images/pixT.gif\" WIDTH=\"1\" HEIGHT=\"1\" ALT=\"alt1\"></TD>\n"
    ."</TR>\n"
    ."</TBODY>\n"
    ."</TABLE>\n"

    ."<SPAN CLASS=\"ktexte11\">=&gt; $morelink $counter "._READS.".</SPAN></TD>\n"
    ."</TR>\n"
    ."</TBODY>\n"
    ."</TABLE>\n"
    ."</TD>\n"
    ."</TR>\n"
    ."</TBODY>\n"
    ."</TABLE>\n"

    ."<BR>\n\n\n";
}

/************************************************************/
/* Function themearticle()                                  */
/************************************************************/

function themearticle ($aid, $informant, $datetime, $title, $thetext, $topic, $topicname, $topicimage, $topictext) {
    global $admin, $sid, $tipath, $thename, $bgcolor1, $bgcolor6, $bgcolor8;
    echo "<TABLE WIDTH=\"100%\" BORDER=\"0\" CELLSPACING=\"0\" CELLPADDING=\"1\">\n"
    ."<TR>\n"
    ."<TD ALIGN=\"center\" VALIGN=\"top\">\n"
    ."<TABLE WIDTH=\"100%\" BORDER=\"0\" CELLSPACING=\"0\" CELLPADDING=\"2\" BGCOLOR=\"$bgcolor8\">\n"
    ."<TR>\n"
    ."<TD BGCOLOR=\"$bgcolor1\"><FONT CLASS=\"newstitle\">$title</FONT><BR><FONT CLASS=\"pn-sub\">=>"._POSTEDBY.":&nbsp;$informant.<br>=>$datetime\n";
    if (is_admin($admin)) {
    echo "<br>[ <a href=\"admin.php?op=EditStory&amp;sid=$sid\">"._EDIT."</a> | <a href=\"admin.php?op=RemoveStory&amp;sid=$sid\">"._DELETE."</a> ]\n";
    }
    echo "</FONT></TD>\n"
    ."</TR>\n"

    ."<TR>\n"
    ."<TD ALIGN=\"left\" VALIGN=\"top\"><a href=\"search.php?query=&amp;topic=$topic\"><img src=\"$tipath$topicimage\" border=\"0\" Alt=\"$topictext\" align=\"right\" hspace=\"5\" vspace=\"5\"></a>\n";
    FormatStory($thetext, $notes, $aid, $informant);
    echo "</TD>\n"
    ."</TR>\n"
    ."</TABLE>\n"
    ."</TD>\n"
    ."</TR>\n"
    ."</TABLE>\n"

    ."<BR>\n\n\n";
}

/************************************************************/
/* Function themesidebox()                                  */
/************************************************************/

function themesidebox($block) {
    global $thename, $bgcolor6, $bgcolor8, $bgcolor9;
    echo "<TABLE WIDTH=\"155\" BORDER=\"0\" CELLSPACING=\"0\" CELLPADDING=\"1\" BGCOLOR=\"$bgcolor6\">\n"
    ."<TR>\n"
    ."<TD ALIGN=\"center\" VALIGN=\"middle\">\n"
    ."<TABLE CELLSPACING=\"0\" CELLPADDING=\"4\" WIDTH=\"155\" BORDER=\"0\" BGCOLOR=\"$bgcolor8\">\n"
    ."<TBODY>\n"
    ."<TR>\n"
    ."<TD CLASS=\"boxtitle\">$block[title]</TD>\n"
    ."</TR>\n"

    ."<TR>\n"
    ."<TD BGCOLOR=\"$bgcolor9\"><IMG HEIGHT=\"1\" SRC=\"themes/$thename/images/pixT.gif\" WIDTH=\"1\" ALT=\"alt1\" BORDER=\"0\"></TD>\n"
    ."</TR>\n"

    ."<TR>\n"
    ."<TD VALIGN=\"top\" BGCOLOR=\"$bgcolor8\" class=\"boxcontent\">$block[content]</TD>\n"
    ."</TR>\n"
    ."</TBODY>\n"
    ."</TABLE>\n"
    ."</TD>\n"
    ."</TR>\n"
    ."</TABLE>\n"

    ."<BR>\n\n\n";
}

?>
