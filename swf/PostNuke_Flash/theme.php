<?php // $Id: theme.php,v 1.19 2001/08/03 00:21:58 pkellum Exp $ $Name:  $
/************************************************************************/
/* Post-Nuke: Content Management System                                 */
/* ====================================                                 */
/*                                                                      */
/* Copyright (c) 2001 by the Post Nuke development team                 */
/* http://www.postnuke.com                                              */
/************************************************************************/
/************************/
/* Modified version of: */
/************************************************************************/
/* PHP-NUKE: Web Portal System                                          */
/* ===========================                                          */
/*                                                                      */
/* Copyright (c) 2001 by Francisco Burzi (fbc@mandrakesoft.com)         */
/* http://phpnuke.org                                                   */
/*                                                                      */
/* This program is free software. You can redistribute it and/or modify */
/* it under the terms of the GNU General Public License as published by */
/* the Free Software Foundation; either version 2 of the License.       */
/************************************************************************/
/************************************************************************/
/* Filename:                                                            */
/* Original  Author: Francisco Burzi                                    */
/* Purpose:                                                             */
/************************************************************************/

$thename = "PostNuke_Flash";
$bgcolor1 = "#F6F7EB";
$bgcolor2 = "#B1B78B";
$bgcolor3 = "#D9DCC2";
$bgcolor4 = "#E1E4CE";
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
    global $bgcolor1, $bgcolor2, $bgcolor3, $bgcolor4, $sepcolor, $sitename, $slogan, $thename, $banners;
    echo "
    </head>
    <body>
<!-- main table definition so that we look the same with 800 and over settings -->
<center>
<table width=\"775\">
<tr>
    <td>

<!-- top table definition -->

<table border=\"0\" cellspacing=\"0\" cellpadding=\"0\" width=\"100%\">
<tr bgcolor=\"$bgcolor1\">
    <td width=\"100%\">
    <table width=\"100%\">
    <tr>
        <td align=\"left\">
            <OBJECT classid=\"clsid:D27CDB6E-AE6D-11cf-96B8-444553540000\"
 codebase=\"http://download.macromedia.com/pub/shockwave/cabs/flash/swflash.cab#version=5,0,0,0\"
 WIDTH=468 HEIGHT=81>
 <PARAM NAME=movie VALUE=\"themes/$thename/sitename.swf?text=$sitename\"> 
 <PARAM NAME=quality VALUE=high>
 <PARAM NAME=bgcolor VALUE=$bgcolor1>
 <PARAM NAME=menu VALUE=false>
 <EMBED src=\"themes/$thename/sitename.swf?text=$sitename\" quality=high bgcolor=$bgcolor1 WIDTH=335 HEIGHT=81 TYPE=\"application/x-shockwave-flash\" PLUGINSPAGE=\"http://www.macromedia.com/shockwave/download/index.cgi?P1_Prod_Version=ShockwaveFlash\" menu=\"false\"></EMBED>
</OBJECT><br><OBJECT classid=\"clsid:D27CDB6E-AE6D-11cf-96B8-444553540000\"
 codebase=\"http://download.macromedia.com/pub/shockwave/cabs/flash/swflash.cab#version=5,0,0,0\"
 WIDTH=468 HEIGHT=20>
 <PARAM NAME=movie VALUE=\"themes/$thename/slogan.swf?text=$slogan\"> 
 <PARAM NAME=quality VALUE=high>
 <PARAM NAME=bgcolor VALUE=$bgcolor1>
 <PARAM NAME=menu VALUE=false>
 <EMBED src=\"themes/$thename/slogan.swf?text=$slogan\" quality=high bgcolor=$bgcolor1 WIDTH=335 HEIGHT=20 TYPE=\"application/x-shockwave-flash\" PLUGINSPAGE=\"http://www.macromedia.com/shockwave/download/index.cgi?P1_Prod_Version=ShockwaveFlash\" menu=\"false\"></EMBED>
</OBJECT>
        </td>
        <td align=\"right\" valign=\"top\">";
    if ($banners) {
    include("banners.php");
    }
    echo "
            <font class=\"pn-logo-small\">";
    echo formatTimestamp(GetUserTime(strftime("%Y-%m-%d %H:%M:%S", time())));
        echo "
            <br></font>

        </td>
    </tr>
    </table>
        </td>

  </tr>

 <tr><td width=\"100%\"><IMG SRC=\"themes/$thename/images/black_dot.gif\" WIDTH=\"100%\" HEIGHT=\"1\" BORDER=0 ALT=\"\"></td></tr>

  <tr bgcolor=\"$bgcolor3\">
    <td align=\"right\" valign=\"middle\" width=\"100%\">";

    include("themes/$thename/top_links.php");

    echo "
    </td>
  </tr>
<tr><td width=\"100%\"><IMG SRC=\"themes/$thename/images/black_dot.gif\" WIDTH=\"100%\" HEIGHT=\"1\" BORDER=0 ALT=\"\"></td></tr>
<tr bgcolor=\"$bgcolor2\">
    <td align=\"right\" valign=\"middle\" colspan=\"2\">
        <form method=\"POST\" action=\"search.php\">
        <div align=\"right\"><font class=\"pn-normal\">"._SEARCH."&nbsp;
        <input class=\"pn-text\" NAME=\"query\" TYPE=\"text\" VALUE=\"\"></font>&nbsp;</div>
         </form>
    </td>
</tr>
<tr><td width=\"100%\"><IMG SRC=\"themes/$thename/images/black_dot.gif\" WIDTH=\"100%\" HEIGHT=\"1\" BORDER=0 ALT=\"\"></td></tr>
</table>

<!-- center table definition  -->
<table cellpadding=\"0\" cellspacing=\"0\" width=\"100%\">
<tr valign=\"top\">
    <td bgcolor=\"$bgcolor4\" width=\"20%\" align=left>";
    blocks(left);

  echo "
    </td><td width=15></td>";
    if ($index == 1) {

echo "
        <td align=left valign=top width=\"60%\">";
    }
if ($index == 0) {

echo "
        <td align=left valign=top width=\"80%\">";
    }
}

function themefooter() {
    global $index, $bgcolor1, $bgcolor2, $bgcolor3, $bgcolor4, $thename, $sepcolor;
    if ($index == 1) {
    echo "
    <td width=15></td>
    <td align=\"left\" valign=\"top\" width=\"20%\">";
    blocks(right);
    echo "
    </td>
</tr>
</table>";
    }
    if ($index == 0) {
    echo "
    </td>
</tr>
</table>";
    }
 echo "
<table border=\"0\" cellspacing=\"0\" cellpadding=\"0\" width=\"100%\">
<tr><td width=\"100%\"><IMG SRC=\"themes/$thename/images/black_dot.gif\" WIDTH=\"100%\" HEIGHT=\"1\" BORDER=0 ALT=\"\"></td></tr>
  <tr bgcolor=\"$bgcolor2\">
      <td align=\"right\" valign=\"bottom\">";

    include("themes/$thename/bottom_links.php");

    echo "
      </td>
  </tr>
 <tr><td width=\"100%\"><IMG SRC=\"themes/$thename/images/black_dot.gif\" WIDTH=\"100%\" HEIGHT=\"1\" BORDER=0 ALT=\"\"></td></tr>
</table>

<table border=\"0\" cellspacing=\"0\" cellpadding=\"0\" width=\"100%\">
  <tr valign=\"top\" bgcolor=\"$bgcolor3\">
    <td align=\"center\">";
         footmsg();
    echo "
    </td>
  </tr>
 <tr><td width=\"100%\"><IMG SRC=\"themes/$thename/images/black_dot.gif\" WIDTH=\"100%\" HEIGHT=\"1\" BORDER=0 ALT=\"\"></td></tr>
</table>
    </td>
</tr>
</table>
    </center>
";

}

function themeindex ($aid, $informant, $time, $title, $counter, $topic, $thetext, $notes, $morelink, $topicname, $topicimage, $topictext) {
    global $tipath, $anonymous, $bgcolor1, $bgcolor2, $bgcolor3, $bgcolor4, $thename, $sepcolor;
    if ($informant == "") {
    $informant = $anonymous;
    }
    echo "
        <table width=\"100%\">
        <tr>
            <td>
        <table width=\"100%\" cellpadding=0 cellspacing=0>
        <tr><td width=\"100%\"><IMG SRC=\"themes/$thename/images/black_dot.gif\" WIDTH=\"100%\" HEIGHT=\"1\" BORDER=0 ALT=\"\"></td></tr>
        <tr bgcolor=\"$bgcolor4\">
            <td><font class=\"pn-storytitle\">$title</font><br>
            <font class=\"pn-sub\">"._POSTEDBY.":&nbsp;$informant&nbsp;"._ON." $time $timezone</font>
            </td>
        </tr>
        <tr><td width=\"100%\"><IMG SRC=\"themes/$thename/images/black_dot.gif\" WIDTH=\"100%\" HEIGHT=\"1\" BORDER=0 ALT=\"\"></td></tr>
        <tr>
            <td>    <a href=\"search.php?query=&amp;topic=$topic\"><img src=\"$tipath$topicimage\" border=\"0\" Alt=\"$topictext\" align=\"left\" hspace=\"10\" vspace=\"10\"></a>
            <font class=\"pn-normal\">";
            FormatStory($thetext, $notes, $aid, $informant);
            echo "
            </font>
            </td>
        </tr>
        <tr><td width=\"100%\"><IMG SRC=\"themes/$thename/images/black_dot.gif\" WIDTH=\"100%\" HEIGHT=\"1\" BORDER=0 ALT=\"\"></td></tr>
        <tr bgcolor=\"$bgcolor4\"><td>
        <table width=\"100%\">
            <tr>
            <td align=\"left\"><font class=\"pn-sub\">("._READS.": $counter times)</font></td>
            <td align=\"right\"><font class=\"pn-sub\">$morelink</font></td>
            </tr>
        </table>
            </td>
        </tr>
        <tr><td width=\"100%\"><IMG SRC=\"themes/$thename/images/black_dot.gif\" WIDTH=\"100%\" HEIGHT=\"1\" BORDER=0 ALT=\"\"></td></tr>
        </table>
            </td>
        </tr>
        </table>";
}

function themearticle ($aid, $informant, $datetime, $title, $thetext, $topic, $topicname, $topicimage, $topictext) {
    global $admin, $sid, $tipath, $bgcolor1, $bgcolor2, $bgcolor3, $bgcolor4, $thename, $sepcolor;
   echo "
        <table width=\"100%\">
        <tr>
            <td>
        <table width=\"100%\" cellpadding=0 cellspacing=0>
        <tr><td width=\"100%\"><IMG SRC=\"themes/$thename/images/black_dot.gif\" WIDTH=\"100%\" HEIGHT=\"1\" BORDER=0 ALT=\"\"></td></tr>
        <tr bgcolor=\"$bgcolor4\">
            <td><font class=\"pn-storytitle\">$title</font><br>
            <font class=\"pn-sub\">"._POSTEDBY.":&nbsp;$informant   </font>
             </td>
        </tr>
        <tr><td width=\"100%\"><IMG SRC=\"themes/$thename/images/black_dot.gif\" WIDTH=\"100%\" HEIGHT=\"1\" BORDER=0 ALT=\"\"></td></tr>
        <tr>
            <td>";
            if ($admin) {
             echo "<br><br>
             <table>
                 <tr>
                 <td align=\"center\">
                 &nbsp;&nbsp; <font class=\"pn-sub\"> [ <a class=\"pn-sub\" href=\"admin.php?op=EditStory&amp;sid=$sid\">"._EDIT."</a> | <a class=\"pn-sub\" href=\"admin.php?op=RemoveStory&amp;sid=$sid\">"._DELETE."</a> ]</font>
                 </td>
                </tr>
            </table>
            <br><br>";
            }
            echo "<font class=\"pn-normal\">";
            FormatStory($thetext, $notes, $aid, $informant);
            echo "
            </font>
            </td>
        </tr>
        </table>
            </td>
        </tr>
        </table>";
}

function themesidebox($block) {
global $bgcolor1, $thename;
  
    echo "
    <table width=\"150\" cellpadding=\"4\" cellspacing=\"0\">
    <tr valign=\"top\">
        <td>
            <table border=\"0\" CELLPADDING=\"4\" CELLSPACING=\"0\" width=\"100%\">
                <tr><td width=\"100%\"><IMG SRC=\"themes/$thename/images/black_dot.gif\" WIDTH=\"100%\" HEIGHT=\"1\" BORDER=0 ALT=\"\"></td></tr>
                <tr valign=\"top\">
                    <td width=\"150\" class=\"pn-title\"><OBJECT classid=\"clsid:D27CDB6E-AE6D-11cf-96B8-444553540000\"
 codebase=\"http://download.macromedia.com/pub/shockwave/cabs/flash/swflash.cab#version=5,0,0,0\"
 WIDTH=150 HEIGHT=30>
 <PARAM NAME=movie VALUE=\"themes/$thename/title.swf?text=$block[title]\"> 
 <PARAM NAME=quality VALUE=high>
 <PARAM NAME=bgcolor VALUE=$bgcolor1>
 <PARAM NAME=menu VALUE=false>
 <EMBED src=\"themes/$thename/title.swf?text=$block[title]\" quality=high bgcolor=$bgcolor1  WIDTH=150 HEIGHT=30 TYPE=\"application/x-shockwave-flash\" PLUGINSPAGE=\"http://www.macromedia.com/shockwave/download/index.cgi?P1_Prod_Version=ShockwaveFlash\" menu=\"false\"></EMBED>
</OBJECT></td></tr>
                <tr><td width=\"100%\"><IMG SRC=\"themes/$thename/images/black_dot.gif\" WIDTH=\"100%\" HEIGHT=\"1\" BORDER=0 ALT=\"\"></td></tr>
                <tr valign=\"top\">
                    <td class=\"pn-normal\">
                    $block[content]
                    </td>
                </tr>
                </table>
            </td>
        </tr>
    </table>";
}
?>