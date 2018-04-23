<?php
/************************************************************************/
/* PHP-NUKE: Web Portal System                                          */
/* ===========================                                          */
/*                                                                      */
/* Copyright (c) 2001 by Francisco Burzi (fbc@mandrakesoft.com)         */
/* http://phpnuke.org                                                   */
/*                                                                      */
/* Theme"AstroBlueB" design by Astro Web Design & Jack Kozbial          */
/* Copyright (C) 2001 Jack Kozbial                                      */
/* jack@internetintl.com  Chicago,USA                                   */
/* http://www.internetintl.com                                          */
/*                                                                      */
/* This program is free software. You can redistribute it and/or modify */
/* it under the terms of the GNU General Public License as published by */
/* the Free Software Foundation; either version 2 of the License.       */
/************************************************************************/

$bgcolor1 = "#E1F5F7"; // top theme (logo,banners)& bordercolor - blocks
$bgcolor2 = "#CCEEFF"; // top2 & top1 - menu
$bgcolor3 = "#99CCFF"; // Scripts - Registered users ...  & bottom1
$bgcolor4 = "#FFFFFF"; // left column
$textcolor1 = "#000000";
$textcolor2 = "#000000";

/************************************************************/
/* OpenTable Functions                                      */
/*                                                          */
/* Define the tables look&feel for you whole site. For this */
/* we have two options: OpenTable and OpenTable2 functions. */
/* Then we have CloseTable and CloseTable2 function to      */
/* properly close our tables. The difference is that        */
/* OpenTable has a 100% width and OpenTable2 has a width    */
/* according with the table content                         */
/************************************************************/
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

/************************************************************/
/* FormatStory                                              */
/*                                                          */
/* Here we'll format the look of the stories in our site.   */
/* If you dig a little on the function you will notice that */
/* we set different stuff for anonymous, admin and users    */
/* when displaying the story.                               */
/************************************************************/
function FormatStory($thetext, $notes, $aid, $informant) {
    global $anonymous;
    if ($notes != "") {
	$notes = "<br><br><b>"._NOTE."</b> <i>$notes</i>\n";
    } else {
	$notes = "";
    }
    if ("$aid" == "$informant") {
	echo "$thetext$notes\n";
    } else {
	if($informant != "") {
	    $boxstuff = "<a href=\"user.php?op=userinfo&amp;uname=$informant\">$informant</a> ";
	} else {
	    $boxstuff = "$anonymous ";
	}
	$boxstuff .= ""._WRITES." <i>\"$thetext\"</i>$notes\n";
	echo "$boxstuff\n";
    }
}

/************************************************************/
/* Function themeheader()                                   */
/*                                                          */
/* Control the header for your site. You need to define the */
/* BODY tag and in some part of the code call the blocks    */
/* function for left side with: blocks(left);               */
/************************************************************/

function themeheader() {
    global $user, $sitename, $cookie, $prefix, $bgcolor1, $bgcolor2, $bgcolor3, $bgcolor4, $textcolor1, $sitename, $slogan, $banners;
	cookiedecode($user);
    $username = $cookie[1];
    if ($username == "") {
        $username = "Anonymous";
		}
    echo "<body>
<!-- main table 100% -->
<center><table width=\"775\" border=\"1\" bordercolor=\"$bgcolor1\" cellspacing=\"0\" cellpadding=\"2\">
<tr><td>

<!-- top table definition -->

<table border=\"0\" cellspacing=\"0\" cellpadding=\"0\" width=\"100%\">
<tr bgcolor=\"$bgcolor1\">
    <td width=\"100%\">
    <table width=\"100%\">
    <tr><TD align=middle>
        <div align=\"left\">
		<a href=\"index.php\"><img src=\"themes/AstroBlueB/images/logo.gif\" width=\"200\" height=\"101\" border=\"0\"></A></div>
        </TD><td align=\"right\" valign=\"top\">";
    if ($banners) {
    include("banners.php");
    }
    echo "</td></tr></table></td></tr>
 <tr><td width=\"100%\"><IMG SRC=\"themes/AstroBlueB/images/blue.gif\" WIDTH=\"100%\" HEIGHT=\"1\" BORDER=0 ALT=\"\"></td></tr>
 <tr bgcolor=\"$bgcolor3\">
 <td align=\"right\" valign=\"middle\" width=\"100%\">";
 
include("themes/AstroBlueB/top1.php");  
   
include("themes/AstroBlueB/top2.php"); 
//<!-- center table definition  -->
echo "<table cellpadding=\"0\" cellspacing=\"0\" width=\"100%\">
<tr valign=\"top\">
    <td bgcolor=\"$bgcolor4\" width=\"15%\" align=left>";
    blocks(left);

  echo "
    </td>";
    if ($index == 1) {

echo "
        <td align=center valign=top width=\"100%\">";
    }
if ($index == 0) {

echo "
        <td align=left valign=top width=\"100%\">";
    }
}
/************************************************************/
/* Function themefooter()                                   */
/*                                                          */
/* Control the footer for your site. You don't need to      */
/* close BODY and HTML tags at the end. In some part call   */
/* the function for right blocks with: blocks(right);       */
/* Also, $index variable need to be global and is used to   */
/* determine if the page your're viewing is the Homepage or */
/* and internal one.                                        */
/************************************************************/

function themefooter() {
    global $index, $bgcolor1, $bgcolor2, $bgcolor3, $bgcolor4;
    if ($index == 1) {
    echo "
     <td align=\"right\" valign=\"top\" width=\"100%\">";
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
	echo "<TABLE border=0 cellPadding=0 cellSpacing=0 width=\"100%\">
        <TBODY><TR>
          <TD width=\"100%\"><IMG src=\"themes/AstroBlueB/images/blue.gif\" width=\"100%\" border=0 height=1></TD></TR>
          <TR bgColor=\"$bgcolor2\"> 
          <TD align=right vAlign=bottom>";
		  
include("themes/AstroBlueB/bottom.php"); 
echo "<table width=\"100%\" border=\"0\" cellspacing=\"0\" cellpadding=\"2\">
        <tr>
          <td>
<div align=\"left\"><b>&nbsp;&nbsp;<a href=\"#top\">"._BACKTOTOP."</a>&nbsp;&nbsp;::&nbsp;&nbsp;Best view in <img src=\"themes/AstroBlueB/images/explorer.gif\" align=\"absmiddle\" alt=\"Internet Explorer\"> 800x600 and up</b></div></td>
          <td>
<div align=\"right\"><b>Theme by <a href=\"http://www.internetintl.com\">Astro Web Design</a>&nbsp;&nbsp;</b></div></td>
        </tr>
      </table>
    </TD>
  </TR><TR>
          <TD width=\"100%\"><IMG src=\"themes/AstroBlueB/images/blue.gif\" width=\"100%\" border=0 height=1></TD></TR></TBODY></TABLE>
            
<table border=\"0\" cellspacing=\"0\" cellpadding=\"0\" width=\"100%\">
  <tr valign=\"top\" bgcolor=\"$bgcolor3\">
    <td align=\"center\">";
         footmsg();
    echo "
    </td>
  </tr>
 <tr><td width=\"100%\"><IMG SRC=\"themes/AstroBlueB/images/blue.gif\" WIDTH=\"100%\" HEIGHT=\"1\" BORDER=0></td></tr>
</table>
    </td>
</tr>
</table>
    </center>";
}

/************************************************************/
/* Function themeindex()                                    */
/*                                                          */
/* This function format the stories on the Homepage         */
/************************************************************/

include("themes/AstroBlueB/stories.php");  

/************************************************************/
/* Function themesidebox()                                  */
/*                                                          */
/* Control look of your blocks. Just simple.                */
/************************************************************/

include("themes/AstroBlueB/blocks.php");
?> 
