<?php // $Id: theme.php,v 1.5.1 20/08/2001 16:36 kodred Exp $ $Name:  $
global $bgcolor5, $thename;
/************************************************************************/
/* injeKtion - LAYOUT FOR PostNUKE (http://www.postnuke.com)            */
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
$thename = "injeKtion";
$bgcolor1 = "#FFFFFF";
$bgcolor2 = "#FFC600";
$bgcolor3 = "#868687";
$bgcolor4 = "#F2DC78";
$bgcolor5 = "#003366";
$textcolor1 = "#000000";
$textcolor2 = "#000000";
$postnuke_theme = true;

function OpenTable() {
    global $bgcolor1, $bgcolor2;
    echo "<table width=\"100%\" border=\"0\" cellspacing=\"1\" cellpadding=\"0\" bgcolor=\"$bgcolor2\"><tr><td>\n";
    echo "<table width=\"100%\" border=\"0\" cellspacing=\"1\" cellpadding=\"8\" bgcolor=\"$bgcolor1\"><tr><td class=\"backnews\">\n";
}

function CloseTable() {
    echo "</td></tr></table></td></tr></table>\n";
}

function OpenTable2() {
    global $bgcolor1, $bgcolor2;
    echo "<table border=\"0\" width=\"100%\" cellspacing=\"1\" cellpadding=\"0\" bgcolor=\"$bgcolor2\" align=\"center\"><tr><td>\n";
    echo "<table border=\"0\" width=\"100%\" cellspacing=\"1\" cellpadding=\"8\" bgcolor=\"$bgcolor1\"><tr><td class=\"backnews\">\n";
}

function CloseTable2() {
    echo "</td></tr></table></td></tr></table>\n";
}
function FormatStory($thetext, $notes, $aid, $informant) {
    global $anonymous, $thename;
    if ($notes != "") {
        $notes = "<br><br><b>"._NOTE."</b> $notes\n";
    } else {
        $notes = "";
    }
    if ("$aid" == "$informant") {
        echo "<img src=\"themes/$thename/images/fleche2.gif\" width=\"4\" height=\"8\" alt=\"\" border=\"0\">&nbsp;<font class=\"pn-normal\">$thetext$notes</font>\n";
    } else {
        if($informant != "") {
            $boxstuff = "<a href=\"user.php?op=userinfo&amp;uname=$informant\">$informant</a> ";
        } else {
            $boxstuff = "<font class=\"pn-normal\">$anonymous </font>";
        }
        $boxstuff .= "<font class=\"pn-normal\">writes \"$thetext\"$notes</font>\n";
        echo "<img src=\"themes/$thename/images/fleche2.gif\" width=\"4\" height=\"8\" alt=\"\" border=\"0\">&nbsp;<font class=\"pn-normal\">$boxstuff</font>\n";
    }
}

/************************************************************/
/* Function themeheader()                                   */
/************************************************************/

function themeheader() {
    global $user, $banners, $sitename, $slogan, $cookie, $prefix, $index, $bgcolor3, $bgcolor2, $bgcolor5, $bgcolor1, $thename;
    cookiedecode($user);
    $username = $cookie[1];
    if ($username == "") {
        $username = "Anonymous";
    }
    echo "</head><body>\n"
    ."<table width=\"100%\" border=\"0\" cellspacing=\"0\" cellpadding=\"0\" bgcolor=\"$bgcolor3\">\n"
    ."<tbody>\n"
    ."<tr>\n"
    ."<td class=\"head-line\" valign=\"middle\" align=\"left\">&nbsp;&nbsp;\n";
//    echo formatTimestamp(GetUserTime(strftime("%Y-%m-%d %H:%M:%S", time())));
    echo "</td>\n"
    ."</tr>\n"
    ."</tbody>\n"
    ."</table>\n"
    ."<table width=\"100%\" border=\"0\" cellspacing=\"0\" cellpadding=\"0\" bgcolor=\"$bgcolor5\">\n"
    ."<tbody>\n"
    ."<tr>\n"
    ."<td width=\"161\"><img src=\"themes/$thename/images/logo-header.gif\" width=\"161\" height=\"40\" alt=\"\" border=\"0\"></td>\n"
    ."<td valign=\"bottom\" align=\"right\" rowspan=\"2\" width=\"100%\">\n"
    ."<table width=\"100%\" border=\"0\" cellspacing=\"0\" cellpadding=\"0\">\n"
    ."<tbody>\n"
    ."<tr>\n"
    ."<td width=\"100%\" valign=\"top\" align=\"center\">\n"
    ."<table width=\"100%\" border=\"0\" cellspacing=\"0\" cellpadding=\"2\">\n"
    ."<tbody>\n"
    ."<tr>\n"
    ."<td valign=\"middle\" align=\"center\" width=\"20%\"><a href=\"index.php\"><img src=\"themes/$thename/images/menu/home.gif\" width=\"20\" height=\"20\" alt=\"$sitename\" border=\"0\"></a></td>\n"
    ."<td align=\"center\" valign=\"middle\" width=\"20%\"><a href=\"user.php\"><img src=\"themes/$thename/images/menu/user-locked.gif\" width=\"21\" height=\"20\" alt=\""._LOGINCREATE."\" border=\"0\"></a></td>\n"
    ."<td valign=\"middle\" align=\"center\" width=\"20%\"><a href=\"modules.php?op=modload&amp;name=Downloads&amp;file=index\"><img src=\"themes/$thename/images/menu/download.gif\" width=\"18\" height=\"19\" alt=\""._UDOWNLOADS."\" border=\"0\"></a></td>\n"
    ."<td align=\"center\" valign=\"middle\" width=\"20%\"><a href=\"modules.php?op=modload&amp;name=Submit_News&amp;file=index\"><img src=\"themes/$thename/images/menu/news.gif\" width=\"20\" height=\"20\" alt=\""._SUBMITNEWS."\" border=\"0\"></a></td>\n"
    ."<td align=\"center\" valign=\"middle\" width=\"20%\"><a href=\"modules.php?op=modload&amp;name=Topics&amp;file=index\"><img src=\"themes/$thename/images/menu/forum.gif\" width=\"18\" height=\"18\" alt=\""._TOPICS."\" border=\"0\"></a></td>\n"
    ."</tr>\n"
    ."<tr>\n"
    ."<td valign=\"middle\" align=\"center\" class=\"headmenu\" width=\"20%\"><a href=\"index.php\">"._INDEX."</a></td>\n"
    ."<td valign=\"middle\" align=\"center\" class=\"headmenu\" width=\"20%\"><a href=\"user.php\">"._SUSERS."</a></td>\n"
    ."<td valign=\"middle\" align=\"center\" class=\"headmenu\" width=\"20%\"><a href=\"modules.php?op=modload&amp;name=Downloads&amp;file=index\">"._UDOWNLOADS."</a></td>\n"
    ."<td align=\"center\" valign=\"middle\" class=\"headmenu\" width=\"20%\"><A HREF=\"modules.php?op=modload&amp;name=Submit_News&amp;file=index\">"._SUBMITNEWS."</A></td>\n"
    ."<td align=\"center\" valign=\"middle\" class=\"headmenu\" width=\"20%\"><A HREF=\"modules.php?op=modload&amp;name=Topics&amp;file=index\">"._TOPICS."</A></td>\n"
    ."</tr>\n"
    ."</tbody>\n"
    ."</table>\n"
    ."</td>\n"
    ."<td align=\"right\" width=\"213\"><img src=\"themes/$thename/images/trans.gif\" width=\"213\" height=\"70\" alt=\"\" border=\"0\"></td>\n"
    ."</tr>\n"
    ."</tbody>\n"
    ."</table>\n"
    ."</td>\n"
    ."</tr>\n"
    ."<tr>\n"
    ."<td class=\"head-dark-back\" valign=\"bottom\" align=\"left\">\n"
    ."<table border=\"0\" cellspacing=\"0\" cellpadding=\"0\">\n"
    ."<tbody>\n"
    ."<tr>\n"
    ."<td width=\"141\"><img src=\"themes/$thename/images/search.gif\" width=\"141\" height=\"20\" alt=\"\" border=\"0\"></td>\n"
    ."<td width=\"20\"><img src=\"themes/$thename/images/search-corner.gif\" width=\"20\" height=\"20\" alt=\"\" border=\"0\"></td>\n"
    ."</tr>\n"
    ."</tbody>\n"
    ."</table>\n"
    ."</td>\n"
    ."</tr>\n"
    ."</tbody>\n"
    ."</table>\n"
    ."<table width=\"100%\" border=\"0\" cellspacing=\"0\" cellpadding=\"0\" bgcolor=\"$bgcolor2\">\n"
    ."<tbody>\n"
    ."<tr>\n"
    ."<td class=\"fond-orange-head\" valign=\"top\" align=\"left\">\n"
    ."<form action=\"search.php\" method=\"post\">&nbsp;&nbsp;<input type=\"text\" name=\"query\" size=\"12\"> <input type=\"submit\" name=\"Submit\" value=\""._GO."\"></form></td>\n"
    ."<td width=\"50%\" class=\"fond-orange-head\" align=\"right\" valign=\"middle\">\n"
    ."<form action=\"search.php\" method=\"get\">\n";
    $toplist = mysql_query("select topicid, topictext from $prefix"._topics." order by topictext");
    echo "<select name=\"topic\" onChange='submit()'>\n"
        ."<option value=\"\">"._ALLTOPICS."</option>\n";
    while(list($topicid, $topics) = mysql_fetch_row($toplist)) {
    if ($topicid==$topic) { $sel = "selected "; }
        echo "<option $sel value=\"$topicid\">$topics</option>\n";
        $sel = "";
    }
    echo "</select>&nbsp;&nbsp;&nbsp;&nbsp;</form></td>\n"
    ."</tr>\n"
    ."</tbody>\n"
    ."</table>\n"
    ."<table width=\"100%\" border=\"0\" cellspacing=\"0\" cellpadding=\"0\">\n"
    ."<tbody>\n"
    ."<tr>\n"
    ."<td class=\"fond-nuit\" width=\"170\"><img src=\"themes/$thename/images/pix-transparent.gif\" width=\"170\" height=\"1\" alt=\"\" border=\"0\"></td>\n"
    ."<td class=\"lineblue\" width=\"20\"><img src=\"themes/$thename/images/pix-transparent.gif\" width=\"20\" height=\"1\" alt=\"\" border=\"0\"></td>\n"
    ."<td class=\"lineblue\" width=\"100%\">&nbsp;</td>\n"
    ."<td width=\"20\"><img src=\"themes/$thename/images/corner1\" width=\"20\" height=\"22\" alt=\"\"></td>\n";
    if ($index == 1) {
    echo "<td width=\"170\" class=\"fond-orange\"><img src=\"themes/$thename/images/pix-transparent.gif\" width=\"170\" height=\"1\" alt=\"\" border=\"0\"></td>\n";
}
    else {
    echo "<td width=\"20\" class=\"fond-orange\"><img src=\"themes/$thename/images/pix-transparent.gif\" width=\"20\" height=\"1\" alt=\"\" border=\"0\"></td>\n";
}
    echo "</tr>\n"
    ."<tr>\n"
    ."<td class=\"fond-nuit\" width=\"170\" valign=\"top\" align=\"center\">\n";
    blocks(left);
    echo "</td>\n"
    ."<td width=\"20\"><img src=\"themes/$thename/images/pix-transparent.gif\" width=\"20\" height=\"1\" alt=\"\" border=\"0\"></td>\n"
    ."<td valign=\"top\" class=\"backbigtable\">\n"
    ."<table width=\"100%\" border=\"0\" cellspacing=\"0\" cellpadding=\"0\">\n"
    ."<tbody>\n"
    ."<tr>\n"
    ."<td class=\"backbigtable\">\n";
}
/************************************************************/
/* Function themefooter()                                   */
/************************************************************/

function themefooter() {
    global $index, $banners, $bgcolor3, $thename;
    echo "<br><br></td>\n"
    ."</tr>\n"
    ."</tbody>\n"
    ."</table>\n"
    ."</td>\n"
    ."<td width=\"20\" class=\"linevertical\"><img src=\"themes/$thename/images/pix-transparent.gif\" width=\"20\" height=\"1\" alt=\"\" border=\"0\"></td>\n";
    if ($index == 1) {
    echo "<td class=\"fond-orange\" align=\"center\" valign=\"top\">\n"
    ."<img src=\"themes/$thename/images/pix-transparent.gif\" width=\"170\" height=\"1\" alt=\"\" border=\"0\"><br>\n";
        blocks(right);
    echo "</td>\n";
}
     else {
    echo "<td width=\"20\" class=\"fond-orange\"><img src=\"themes/$thename/images/pix-transparent.gif\" width=\"20\" height=\"1\" alt=\"\" border=\"0\"></td>\n";
}
    echo "</tr>\n"
    ."</tbody>\n"
    ."</table>\n"
    ."<table width=\"100%\" border=\"0\" cellspacing=\"0\" cellpadding=\"0\" bgcolor=\"$bgcolor3\">\n"
    ."<tbody>\n"
    ."<tr>\n"
    ."<td class=\"back-line\" valign=\"middle\" align=\"center\">\n";
    footmsg();
    echo "</td>\n"
    ."</tr>\n"
    ."</tbody>\n"
    ."</table>\n"
    ."<br>\n"
    ."<table width=\"468\" border=\"0\" cellspacing=\"0\" cellpadding=\"3\" align=\"center\">\n"
    ."<tbody>\n"
    ."<tr>\n"
    ."<td valign=\"middle\" align=\"center\">\n";
    if ($banners) {
        include("banners.php");
    }
    echo "</td>\n"
    ."</tr>\n"
    ."</tbody>\n"
    ."</table>\n"
    ."<br>\n";
}

/************************************************************/
/* Function themeindex()                                    */
/************************************************************/

function themeindex ($aid, $informant, $time, $title, $counter, $topic, $thetext, $notes, $morelink, $topicname, $topicimage, $topictext) {
   global $anonymous, $tipath, $thename, $bgcolor1;
   if ($informant == "") {
    $informant = $anonymous;
    }
    echo  "<table width=\"100%\" border=\"0\" cellspacing=\"0\" cellpadding=\"3\">\n"
    ."<tbody>\n"
    ."<tr>\n"
    ."<td class=\"news-titre\"><img src=\"themes/$thename/images/fleche1.gif\" width=\"8\" height=\"8\" alt=\"\" border=\"0\">&nbsp;$title</td>\n"
    ."</tr>\n"
    ."<tr>\n"
    ."<td class=\"backbigtable\"><a href=\"search.php?query=&amp;topic=$topic\"><img src=\"$tipath$topicimage\" border=\"0\" Alt=\"$topictext\" align=\"right\" hspace=\"10\" vspace=\"10\"></a>\n"
    ."<font class=\"pn-sub\">"._POSTEDBY.":&nbsp;$informant&nbsp;"._ON." $time $timezone</font><br>\n";
    FormatStory($thetext, $notes, $aid, $informant);
    echo "</td>\n"
    ."</tr>\n"
    ."<tr>\n"
    ."<td align=\"left\" valign=\"middle\" class=\"newsline\" width=\"100%\">\n"
    ."<table border=\"0\" cellspacing=\"0\" cellpadding=\"0\">\n"
    ."<tbody>\n"
    ."<tr>\n"
    ."<td bgcolor=\"$bgcolor1\" valign=\"middle\" align=\"left\"><font class=\"pn-sub\">$morelink</font></td>\n"
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
/************************************************************/

function themearticle ($aid, $informant, $datetime, $title, $thetext, $topic, $topicname, $topicimage, $topictext) {
    global $admin, $sid, $tipath, $bgcolor1, $bgcolor5, $thename;
    echo "<table width=\"100%\" border=\"0\" cellspacing=\"0\" cellpadding=\"2\" bgcolor=\"$bgcolor5\">\n"
    ."<tbody>\n"
    ."<tr><td>\n"
    ."<table border=\"0\" cellpadding=\"2\" cellspacing=\"0\" bgcolor=\"$bgcolor1\" width=\"100%\">\n"
    ."<tbody>\n"
    ."<tr><td class=\"backnews\">\n"
    ."<table border=\"0\" cellpadding=\"1\" cellspacing=\"0\" bgcolor=\"$bgcolor5\" width=\"100%\">\n"
    ."<tbody>\n"
    ."<tr><td>\n"
    ."<table border=\"0\" cellpadding=\"3\" cellspacing=\"0\" bgcolor=\"$bgcolor1\" width=\"100%\">\n"
    ."<tbody>\n"
    ."<tr><td align=\"left\" class=\"news-titre\">\n"
    ."$title<br>\n"
    .""._POSTEDBY.":&nbsp;$informant\n";
    if (is_admin($admin)) {
        echo "<br>[ <a href=\"admin.php?op=EditStory&amp;sid=$sid\">"._EDIT."</a> | <a href=\"admin.php?op=RemoveStory&amp;sid=$sid\">"._DELETE."</a> ]\n";
    }
    echo "</td></tr>\n"
    ."</tbody>\n"
    ."</table>\n"
    ."</td></tr>\n"
    ."</tbody>\n"
    ."</table>";
    echo "<a href=\"search.php?query=&amp;topic=$topic\"><img src=\"$tipath$topicimage\" border=\"0\" Alt=\"$topictext\" align=\"left\" hspace=\"5\" vspace=\"5\"></a>\n";
    FormatStory($thetext, $notes="", $aid, $informant);
    echo "</td></tr>\n"
    ."</tbody>\n"
    ."</table>\n"
    ."</tr></td>\n"
    ."</tbody>\n"
    ."</table><br>\n\n\n";
}

/************************************************************/
/* Function themesidebox()                                  */
/************************************************************/
function themesidebox($block) {
global $thename;
    echo "<table width=\"150\" border=\"0\" cellspacing=\"0\" cellpadding=\"0\">\n"
    ."<tbody>\n"
    ."<tr>\n"
    ."<td width=\"1\" align=\"left\" valign=\"top\"><img src=\"themes/$thename/images/pix-transparent.gif\" width=\"1\" height=\"19\" alt=\"\" border=\"0\"></td>\n"
    ."<td align=\"left\" class=\"boxtitle\" valign=\"top\">&nbsp;&nbsp;$block[title]</td>\n"
    ."</tr>\n"
    ."<tr>\n"
    ."<td align=\"center\" colspan=\"2\">\n"
    ."<table width=\"150\" border=\"0\" cellspacing=\"0\" cellpadding=\"0\">\n"
    ."<tbody>\n"
    ."<tr>\n"
    ."<td class=\"boxin\">$block[content]</td>\n"
    ."</tr>\n"
    ."</tbody>\n"
    ."</table>\n"
    ."</td>\n"
    ."</tr>\n"
    ."</tbody>\n"
    ."</table>\n"
    ."<br>\n\n\n";
}

?>