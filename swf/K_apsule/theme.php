<?php // $Id: theme.php,v 1.5.1 20/08/2001 16:33 KodRed Exp $ $Name:  $
/************************************************************************/
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
global $thename, $kbarmenu, $bgcolor5;
/************************************************************************/
/* Internal setting                                                     */
/************************************************************************/
// The name of your Theme (Name of the theme = The theme folder name)
$thename = "K_apsule";

/************************************************************/
/* Theme Colors Definition                                  */
/************************************************************/

$bgcolor1 = "#FFFFFF";
$bgcolor2 = "#9798B1";
$bgcolor3 = "#C1C1D3";
$bgcolor4 = "#D2DAD2";
$bgcolor5 = "#3C416F";
$textcolor1 = "#000000";
$textcolor2 = "#000000";
$postnuke_theme = true;

$kbarmenu = "<B><SPAN CLASS=\"menu\"><A HREF=\"index.php\">"._INDEX."</A></SPAN>
<strong>&nbsp;&middot;&nbsp;</strong> <SPAN CLASS=\"menu\"><A HREF=\"modules.php?op=modload&amp;name=Topics&amp;file=index\">"._TOPICS."</A></SPAN>
<strong>&nbsp;&middot;&nbsp;</strong> <SPAN CLASS=\"menu\"><A HREF=\"modules.php?op=modload&amp;name=Reviews&amp;file=index\">"._REVIEWS."</A></SPAN>
<strong>&nbsp;&middot;&nbsp;</strong> <SPAN CLASS=\"menu\"><A HREF=\"modules.php?op=modload&amp;name=Sections&amp;file=index\">"._SSECTIONS."</A></SPAN>
<strong>&nbsp;&middot;&nbsp;</strong> <SPAN CLASS=\"menu\"><A HREF=\"modules.php?op=modload&amp;name=Downloads&amp;file=index\">"._UDOWNLOADS."</A></SPAN>
<strong>&nbsp;&middot;&nbsp;</strong> <SPAN CLASS=\"menu\"><A HREF=\"modules.php?op=modload&amp;name=Web_Links&amp;file=index\">"._WEBLINKS."</A></SPAN>
<strong>&nbsp;&middot;&nbsp;</strong> <SPAN CLASS=\"menu\"><A HREF=\"modules.php?op=modload&amp;name=Submit_News&amp;file=index\">"._SUBMITNEWS."</A></SPAN></B>";


/************************************************************************/
/* End Internal setting                                                 */
/************************************************************************/

/************************************************************/
/* OpenTable Functions                                      */
/************************************************************/

function OpenTable() {
    global $bgcolor1, $bgcolor5;
    echo "<table width=\"100%\" border=\"0\" cellspacing=\"1\" cellpadding=\"0\" bgcolor=\"$bgcolor5\"><tr><td>\n";
    echo "<table width=\"100%\" border=\"0\" cellspacing=\"1\" cellpadding=\"8\" bgcolor=\"$bgcolor1\"><tr><td>\n";
}

function CloseTable() {
    echo "</td></tr></table></td></tr></table>\n";
}

function OpenTable2() {
    global $bgcolor1, $bgcolor5;
    echo "<table border=\"0\" cellspacing=\"1\" cellpadding=\"0\" bgcolor=\"$bgcolor5\" align=\"center\"><tr><td>\n";
    echo "<table border=\"0\" cellspacing=\"1\" cellpadding=\"8\" bgcolor=\"$bgcolor1\"><tr><td>\n";
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

/**************************/
/* Function themeheader()*/
/*************************/

function themeheader() {
    global $thename, $user, $index, $banners, $sitename, $slogan, $cookie, $prefix, $kbarmenu, $bgcolor5, $bgcolor1;
    cookiedecode($user);
    $username = $cookie[1];
    if ($username == "") {
        $username = "Anonymous";
    }
    echo "</HEAD><BODY>\n";
    echo "<table width=\"100%\" border=\"0\" cellspacing=\"0\" cellpadding=\"0\">\n"
    ."<tbody>\n"
    ."<tr>\n"
    ."<td width=\"250\" align=\"left\" valign=\"top\" class=\"kheader\" rowspan=\"3\"><a href=\"index.php\"><img src=\"themes/$thename/images/logo.gif\" width=\"250\" height=\"60\" alt=\""._WELCOMETO." $sitename\" border=\"0\"></a></td>\n"
    ."<td align=\"right\" valign=\"middle\" class=\"kheader\" rowspan=\"3\" width=\"100%\">\n"
    ."<form action=\"search.php\" method=\"post\">\n"
    ."<input type=\"text\" name=\"query\" size=\"14\" class=\"formhead\"> <input type=\"submit\" name=\""._SEARCH."\" value=\""._SEARCH."\" class=\"formhead\">\n"
    ."</form>\n"
    ."</td>\n"
    ."<td align=\"left\" valign=\"middle\" width=\"33\" class=\"kheadercorner\" rowspan=\"3\"><img src=\"themes/$thename/images/pix.gif\" width=\"33\" height=\"1\" alt=\"\" border=\"0\"></td>\n"
    ."<td align=\"left\" valign=\"top\" width=\"155\" class=\"pn-normal\">&nbsp;<img src=\"themes/$thename/images/fm.gif\" width=\"11\" height=\"9\" alt=\"\" border=\"0\"> "._NAME.": $username<br>\n"
    ."&nbsp;<img src=\"themes/$thename/images/fm.gif\" width=\"11\" height=\"9\" alt=\"\" border=\"0\">\n";
if ($username == "Anonymous") {
   echo " <a href=\"user.php\">"._REGISTERNOW."</a>\n";
    } else {
    echo " <a href=\"user.php\">"._PREFERENCES."</a> | <a href=\"user.php?op=logout\">"._LOGOUT."</a>\n";
    }
echo "</td>\n"
    ."</tr>\n"
    ."<tr>\n"
    ."<td align=\"left\" valign=\"bottom\" width=\"155\" class=\"pn-normal\"><img src=\"themes/$thename/images/pix.gif\" width=\"155\" height=\"1\" alt=\"\" border=\"0\"></td>\n"
    ."</tr>\n"
    ."<tr>\n"
    ."<td align=\"left\" valign=\"bottom\" width=\"155\" class=\"pn-normal\">&nbsp;</td>\n"
    ."</tr>\n"
    ."<tr>\n"
    ."<td colspan=\"5\" class=\"greybg\"><img src=\"themes/$thename/images/pix.gif\" width=\"1\" height=\"2\" alt=\"\" border=\"0\"></td>\n"
    ."</tr>\n"
    ."</tbody>\n"
    ."</table>\n"
    ."<TABLE CELLSPACING=\"0\" CELLPADDING=\"0\" WIDTH=\"100%\" ALIGN=\"center\" BORDER=\"0\">\n"
    ."<TBODY>\n"
    ."<TR>\n"
    ."<TD BGCOLOR=\"$bgcolor5\"><IMG HEIGHT=\"1\" ALT=\"\" SRC=\"themes/$thename/images/pix.gif\" WIDTH=\"1\"></TD>\n"
    ."</TR>\n"

    ."<TR>\n"
    ."<TD BGCOLOR=\"$bgcolor5\"><IMG HEIGHT=\"1\" ALT=\"\" SRC=\"themes/$thename/images/pix.gif\" WIDTH=\"1\"></TD>\n"
    ."</TR>\n"

    ."<TR>\n"
    ."<TD VALIGN=\"middle\" ALIGN=\"center\" BGCOLOR=\"$bgcolor1\">$kbarmenu</TD>\n"
    ."</TR>\n"
    ."<TR>\n"
    ."<TD class=\"greybg\"><IMG HEIGHT=\"2\" ALT=\"\" SRC=\"themes/$thename/images/pix.gif\" WIDTH=\"1\"></TD>\n"
    ."</TR>\n"
    ."<TR>\n"
    ."<TD BGCOLOR=\"$bgcolor5\"><IMG HEIGHT=\"1\" ALT=\"\" SRC=\"themes/$thename/images/pix.gif\" WIDTH=\"1\"></TD>\n"
    ."</TR>\n"
    
    ."</TBODY>\n"
    ."</TABLE>\n"
    ."<table width=\"100%\" border=\"0\" cellspacing=\"0\" cellpadding=\"0\">\n"
    ."<tbody>\n"
    ."<tr>\n"
    ."<td class=\"backboxleft\" rowspan=\"2\" align=\"center\" valign=\"top\"><br>\n";
blocks(left);
echo "</td>\n"
    ."<td rowspan=\"3\" class=\"greybg\" width=\"2\"><img src=\"themes/$thename/images/pix.gif\" width=\"2\" height=\"1\" alt=\"\" border=\"0\"></td>\n"
    ."<td width=\"8\"><img src=\"themes/$thename/images/pix.gif\" width=\"8\" height=\"1\" alt=\"\" border=\"0\"></td>\n"
    ."<td width=\"100%\" align=\"left\" valign=\"top\"><br>\n";
}

/************************************************************/
/* Function themefooter()                                   */
/************************************************************/

function themefooter() {
    global $thename, $index, $banners;

echo "</td>\n"
    ."<td width=\"8\"><img src=\"themes/$thename/images/pix.gif\" width=\"8\" height=\"1\" alt=\"\" border=\"0\"></td>\n";
if ($index == 1) {
echo "<td rowspan=\"3\" class=\"greybg\" width=\"2\"><img src=\"themes/$thename/images/pix.gif\" width=\"2\" height=\"1\" alt=\"\" border=\"0\"></td>\n"
    ."<td class=\"backboxleft\" rowspan=\"2\" width=\"155\" align=\"center\" valign=\"top\"><br>\n";
blocks(right);
echo "</td>\n";
}
echo "</tr>\n"
    ."<tr>\n"
    ."<td valign=\"top\" align=\"center\" width=\"8\"><img src=\"themes/$thename/images/pix.gif\" width=\"8\" height=\"1\" alt=\"\" border=\"0\"></td>\n"
    ."<td valign=\"top\" align=\"center\" width=\"8\"><img src=\"themes/$thename/images/pix.gif\" width=\"8\" height=\"1\" alt=\"\" border=\"0\"></td>\n"
    ."</tr>\n"
    ."<tr>\n"
    ."<td class=\"backboxleft\" width=\"155\">&nbsp;</td>\n"
    ."<td width=\"8\"><img src=\"themes/$thename/images/pix.gif\" width=\"8\" height=\"1\" alt=\"\" border=\"0\"></td>\n"
    ."<td>&nbsp;</td>\n"
    ."<td width=\"8\"><img src=\"themes/$thename/images/pix.gif\" width=\"8\" height=\"1\" alt=\"\" border=\"0\"></td>\n";
if ($index == 1) {
echo "<td class=\"backboxleft\"><img src=\"themes/$thename/images/pix.gif\" width=\"155\" height=\"1\" alt=\"\" border=\"0\"></td>\n";
}
echo"</tr>\n"
    ."</tbody>\n"
    ."</table>\n"
    ."<table width=\"100%\" border=\"0\" cellspacing=\"0\" cellpadding=\"0\">\n"
    ."<tbody>\n"
    ."<tr>\n"
    ."<td class=\"greybg\" width=\"100%\" valign=\"middle\" align=\"center\">\n";
if ($banners) {
   include("banners.php");
}
echo "</td>\n"
    ."</tr>\n"
    ."</tbody>\n"
    ."</table>\n"
    ."<table width=\"100%\" border=\"0\" cellspacing=\"0\" cellpadding=\"2\" align=\"center\">\n"
    ."<tbody>\n"
    ."<tr>\n"
    ."<td valign=\"middle\" align=\"right\" class=\"pn-sub\"><a href=\"http://www.babylone6tem.com\" target=\"_blank\">KodRed Design</a></td>\n"
    ."</tr>\n"
    ."</tbody>\n"
    ."</table>\n"
    ."<table width=\"90%\" border=\"0\" cellspacing=\"0\" cellpadding=\"2\" align=\"center\">\n"
    ."<tbody>\n"
    ."<tr>\n"
    ."<td valign=\"middle\" align=\"center\">\n";
footmsg();
echo "</td>\n"
    ."</tr>\n"
    ."</tbody>\n"
    ."</table>\n"
    ."<br>\n";
}

/************************************************************/
/* Function themeindex()                                    */
/*                                                          */
/* This function format the stories on the Homepage         */
/************************************************************/

function themeindex ($aid, $informant, $time, $title, $counter, $topic, $thetext, $notes, $morelink, $topicname, $topicimage, $topictext) {
    global $thename, $anonymous, $tipath;
    if ($informant == "") {
    $informant = $anonymous;
    }
    echo "<table width=\"100%\" border=\"0\" cellspacing=\"0\" cellpadding=\"2\">\n"
         ."<tbody>\n"
         ."<tr>\n"
         ."<td valign=\"top\" align=\"left\">\n"
         ."<table border=\"0\" cellspacing=\"0\" cellpadding=\"0\" width=\"100%\">\n"
         ."<tbody>\n"
         ."<tr>\n"
         ."<td width=\"7\" class=\"newstitle\" align=\"left\" valign=\"top\"><img src=\"themes/$thename/images/cL.gif\" width=\"7\" height=\"10\" alt=\"\" border=\"0\"></td>\n"
         ."<td class=\"newstitle\" width=\"100%\">&nbsp;<img src=\"themes/$thename/images/Ft.gif\" width=\"8\" height=\"10\" alt=\"\" border=\"0\">$title</td>\n"
         ."<td width=\"7\" class=\"newstitle\" align=\"right\" valign=\"top\"><img src=\"themes/$thename/images/cR.gif\" width=\"7\" height=\"10\" alt=\"\" border=\"0\"></td>\n"
         ."</tr>\n"
         ."<tr>\n"
         ."<td colspan=\"4\" class=\"kheader\"><img src=\"themes/$thename/images/pix.gif\" width=\"1\" height=\"2\" alt=\"\" border=\"0\"></td>\n"
         ."</tr>\n"
         ."</tbody>\n"
         ."</table>\n"
         ."</td>\n"
         ."</tr>\n"
         ."<tr>\n"
         ."<td class=\"pn-normal\" width=\"100%\" valign=\"top\" align=\"left\"><a href=\"search.php?query=&amp;topic=$topic\"><img src=\"$tipath$topicimage\" border=\"0\" alt=\"$topictext\" align=\"left\" hspace=\"5\" vspace=\"5\"></a>\n";
    FormatStory($thetext, $notes, $aid, $informant);
    echo "<br><br>"._POSTEDBY." <b>$informant</b> "._ON." $time $timezone ($counter "._READS.")\n"
         ."</td>\n"
         ."</tr>\n"
         ."<tr>\n"
         ."<td>\n"
         ."<table width=\"100%\" border=\"0\" cellspacing=\"0\" cellpadding=\"0\">\n"
         ."<tbody>\n"
         ."<tr>\n"
         ."<td width=\"20%\" valign=\"bottom\">\n"
         ."<table width=\"100%\" border=\"0\" cellspacing=\"0\" cellpadding=\"0\">\n"
         ."<tbody>\n"
         ."<tr>\n"
         ."<td class=\"kheader\"><img src=\"themes/$thename/images/pix.gif\" width=\"1\" height=\"2\" alt=\"\" border=\"0\"></td>\n"
         ."</tr>\n"
         ."</tbody>\n"
         ."</table>\n"
         ."</td>\n"
         ."<td class=\"kmorelink\" valign=\"middle\" align=\"right\"><img src=\"themes/$thename/images/Ft.gif\" width=\"8\" height=\"10\" alt=\"\" border=\"0\">$morelink&nbsp;</td>\n"
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
/* Function themeindex()                                    */
/*                                                          */
/* This function format the stories on the story page, when */
/* you click on that "Read More..." link in the home        */
/************************************************************/

function themearticle ($aid, $informant, $datetime, $title, $thetext, $topic, $topicname, $topicimage, $topictext) {
    global $thename, $admin, $sid, $tipath;
    echo "<table border=\"0\" cellpadding=\"0\" cellspacing=\"0\" bgcolor=\"#ffffff\" width=\"100%\"><tr><td class=\"pn-normal\">\n"
        ."<table border=\"0\" cellpadding=\"1\" cellspacing=\"0\" bgcolor=\"#000000\" width=\"100%\"><tr><td>\n"
        ."<table border=\"0\" cellpadding=\"3\" cellspacing=\"0\" width=\"100%\"><tr><td align=\"left\" class=\"newstitle\">\n"
        ."$title<br>\n"
        .""._POSTEDON." $datetime "._BY." $informant\n";
    if (is_admin($admin)) {
        echo "<br>[ <a href=\"admin.php?op=EditStory&amp;sid=$sid\">"._EDIT."</a> | <a href=\"admin.php?op=RemoveStory&amp;sid=$sid\">"._DELETE."</a> ]\n";
    }
    echo "<br><a href=\"search.php?query=&amp;topic=$topic\">$topictext</a>\n";
    echo "</td></tr></table></td></tr></table><br>";
    FormatStory($thetext, $notes="", $aid, $informant);
    echo "</td></tr></table><br>\n\n\n";
}

/************************************************************/
/* Function themesidebox()                                  */
/*                                                          */
/* Control look of your blocks. Just simple.                */
/************************************************************/

function themesidebox($block) {
global $thename;
    echo "<table width=\"155\" border=\"0\" cellspacing=\"0\" cellpadding=\"0\">\n"
         ."<tbody>\n"
         ."<tr>\n"
         ."<td class=\"boxtitle\">\n"
         ."<table width=\"100%\" border=\"0\" cellspacing=\"0\" cellpadding=\"3\">\n"
         ."<tbody>\n"
         ."<tr>\n"
         ."<td class=\"boxtitle2\"><img src=\"themes/$thename/images/point.gif\" width=\"8\" height=\"8\" alt=\"\" border=\"0\">&nbsp;$block[title]</td>\n"
         ."</tr>\n"
         ."</tbody>\n"
         ."</table>\n"
         ."</td>\n"
         ."</tr>\n"
         ."<tr>\n"
         ."<td align=\"left\" valign=\"top\">\n"
         ."<table width=\"100%\" border=\"0\" cellspacing=\"0\" cellpadding=\"3\">\n"
         ."<tbody>\n"
         ."<tr>\n"
         ."<td class=\"boxcontent\">$block[content]</td>\n"
         ."</tr>\n"
         ."</tbody>\n"
         ."</table>\n"
         ."</td>\n"
         ."</tr>\n"
         ."<tr>\n"
         ."<td class=\"boxbot\"><img src=\"themes/$thename/images/pix.gif\" width=\"1\" height=\"2\" alt=\"\" border=\"0\"></td>\n"
         ."</tr>\n"
         ."</tbody>\n"
         ."</table>\n"
         ."<br>\n\n\n";
}

?>