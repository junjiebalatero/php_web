<?php

/************************************************************/
/* Theme Colors Definition                                  */
/*                                                          */
/* Control the header for your site. You need to define the */
/* BODY tag and in some part of the code call the blocks    */
/* function for left side with: blocks(left);               */
/************************************************************/

$thename = "ilVeneto";
$bgcolor1 = "#333366";
$bgcolor2 = "#333366";
$bgcolor3 = "#444466";
$bgcolor4 = "#444466";
$textcolor1 = "#FFA000";
$textcolor2 = "#FFA000";

function OpenTable() {
    global $bgcolor1, $bgcolor2;
    echo "<table width=\"100%\" border=\"0\" cellspacing=\"1\" cellpadding=\"0\" bgcolor=\"$bgcolor2\"><tr><td>\n";
    echo "<table width=\"100%\" border=\"0\" cellspacing=\"1\" cellpadding=\"8\" bgcolor=\"$bgcolor1\"><tr><td>\n";
}

function CloseTable() {
    echo "</td></tr></table></td></tr></table>\n";
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
	$notes = "<br><b>"._NOTE."</b> <i>$notes</i>\n";
    } else {
	$notes = "";
    }
    if ("$aid" == "$informant") {
	echo "<font size=\"2\" color=\"#ffbb00\">$thetext<br>$notes</font>\n";
    } else {
	if($informant != "") {
	    $boxstuff = "<a href=\"user.php?op=userinfo&amp;uname=$informant\">$informant</a> ";
	} else {
	    $boxstuff = "$anonymous ";
	}
	$boxstuff .= ""._WRITES." <i>\"$thetext\"</i> $notes\n";
	echo "<font size=\"2\" color=\"#ffbb00\">$boxstuff</font>\n";
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
    global $user, $banners, $sitename, $slogan, $cookie, $prefix;
    cookiedecode($user);
    $username = $cookie[1];
    if ($username == "") {
        $username = "Anonymous";
    }
    echo "<body background=\"themes/ilVeneto/images/back.gif\" text=\"#ffbb00\" link=\"#ff9900\" vlink=\"#ff6600\" alink=\"#ffff00\">\n"
	."<br>\n";
    if ($banners) {
	include("banners.php");
    }
    echo "<br>\n"
	."<table cellpadding=\"0\" cellspacing=\"0\" width=\"99%\" border=\"0\" align=\"center\" bgcolor=\"#333366\">\n"
	."<tr>\n"
	."<td bgcolor=\"#333366\">\n"
	."<img height=\"16\" alt=\"\" hspace=\"0\" src=\"themes/ilVeneto/images/corner-top-left.gif\" width=\"17\" align=\"left\">\n"
	."<a href=\"index.php\"><img src=\"themes/ilVeneto/images/logo.gif\"
	align=\"left\" vspace=\"10\" hspace=\"5\" alt=\""._WELCOMETO." $sitename\" 
	border=\"0\" width=\"307\" height=\"66\"></a></td>\n"
	."<td bgcolor=\"#333366\"><IMG src=\"themes/ilVeneto/images/pixel.gif\" width=\"1\" height=\"1\" alt=\"\" border=\"0\" hspace=\"0\"></td>\n"
	."<td bgcolor=\"#333366\" align=\"center\">\n"
	."&nbsp;</td>\n"
	."<td bgcolor=\"#333366\" align=\"center\">\n"
	."<center><form action=\"search.php\" method=\"get\"><font size=\"1\"><b>"._TOPICS." </b>\n";
    $toplist = mysql_query("select topicid, topictext from $prefix"._topics." order by topictext");
    echo "<select name=\"topic\"onChange='submit()'>\n" 
	."<option value=\"\">"._ALLTOPICS."</option>\n";
    while(list($topicid, $topics) = mysql_fetch_row($toplist)) {
    if ($topicid==$topic) { $sel = "selected "; }
	echo "<option $sel value=\"$topicid\">$topics</option>\n";
	$sel = "";
    }
    echo "</select></font></form></center></td>\n"
	."<td bgcolor=\"#333366\" valign=\"top\"><img height=\"17\" alt=\"\" hspace=\"0\" src=\"themes/ilVeneto/images/corner-top-right.gif\" width=\"17\" align=\"right\"></td>\n"
	."</tr></table>\n"
	."<table cellpadding=\"0\" cellspacing=\"0\" width=\"99%\" border=\"0\" align=\"center\" bgcolor=\"#B6CCE1\">\n"
	."<tr>\n"
	."<td bgcolor=\"#B6CCE1\" colspan=\"4\"><IMG src=\"themes/ilVeneto/images/pixel.gif\" width=\"1\" height=1 alt=\"\" border=\"0\" hspace=\"0\"></td>\n"
	."</tr>\n"
	."<tr valign=\"middle\" bgcolor=\"#28224C\">\n"
	."<td width=\"15%\" nowrap><font size=\"1\" color=\"#28224C\"><b>\n";
    if ($username == "Anonymous") {
	echo "&nbsp;&nbsp;<b><font color=\"#ffbb00\"><a href=\"user.php\"><img 
	src=\"themes/ilVeneto/images/nav/members.gif\" border=\"0\" height=\"19\"></a></font></b>\n";
    } else {
	echo "&nbsp;&nbsp;"._HELLO." $username!";
    }
    echo "</b></font></td>\n"
	."<td align=\"center\" height=\"20\" width=\"70%\"><font size=\"1\"><B>\n"
	."<A href=\"/\"><img src=\"themes/ilVeneto/images/nav/home.gif\" border=\"0\" height=\"19\" Alt=\""._MAIN."\"></a>\n"
        ."<A href=\"topics.php\"><img src=\"themes/ilVeneto/images/nav/topics.gif\" border=\"0\" height=\"19\" Alt=\""._TOPICS."\"></a>\n"
        ."<A href=\"download.php\"><img src=\"themes/ilVeneto/images/nav/downloads.gif\" border=\"0\" height=\"19\" Alt=\""._DOWNLOADS."\"></a>\n"
        ."<A href=\"modules.php?op=modload&name=My_eGallery&file=index\"><img src=\"themes/ilVeneto/images/nav/gallery.gif\" border=\"0\" height=\"19\" Alt=\""._GALLERY."\"></a>\n"
        ."<A href=\"postcard3.php\"><img src=\"themes/ilVeneto/images/nav/postcards.gif\" border=\"0\" height=\"19\" Alt=\"Postcards\"></a>\n"
        ."<A href=\"links.php\"><img src=\"themes/ilVeneto/images/nav/links.gif\" border=\"0\" height=\"19\" Alt=\""._LINKS."\"></a>\n"
        ."<A href=\"submit.php\"><img src=\"themes/ilVeneto/images/nav/submit.gif\" border=\"0\" height=\"19\" Alt=\""._SUBMITNEWS."\"></a>\n"
        ."</B></font>\n"
        ."</td>\n"
        ."<td align=\"right\" width=\"15%\"><font size=\"1\"><b>\n"
        ."<script type=\"text/javascript\">\n\n"
        ."<!--   // Array ofmonth Names\n"
        ."var monthNames = new Array( \""._JAN."\",\""._FEB."\",\""._MAR."\",\""._APR."\",\""._MAY."\",\""._JUN."\",\""._JUL."\",\""._AUG."\",\""._SEP."\",\""._OCT."\",\""._NOV."\",\""._DEC."\");\n"
        ."var now = new Date();\n"
        ."thisYear = now.getYear();\n"
        ."if(thisYear < 1900) {thisYear += 1900}; // corrections if Y2K display problem\n"
        ."document.write(monthNames[now.getMonth()] + \" \" + now.getDate() + \", \" + thisYear);\n"
        ."// -->\n\n"
        ."</script></b></font></td>\n"
        ."<td>&nbsp;</td>\n"
        ."</tr>\n"
        ."<tr>\n"
        ."<td bgcolor=\"#B6CCE1\" colspan=\"4\"><IMG src=\"themes/ilVeneto/images/pixel.gif\" width=\"1\" height=\"1\" alt=\"\" border=\"0\" hspace=\"0\"></td>\n"
        ."</tr>\n"
        ."</table>\n"
	."<!-- FIN DEL TITULO -->\n"
	."<table width=\"99%\" cellpadding=\"0\" cellspacing=\"0\" border=\"0\" 
	bgcolor=\"#333366\" align=\"center\"><tr valign=\"top\">\n"
	."<td bgcolor=\"#333366\"><img src=\"themes/ilVeneto/images/pixel.gif\" width=\"1\" height=\"20\" border=\"0\" alt=\"\"></td></tr></table>\n"
	."<table width=\"99%\" cellpadding=\"0\" cellspacing=\"0\" border=\"0\" 
	bgcolor=\"#333366\" align=\"center\"><tr valign=\"top\">\n"
	."<td bgcolor=\"#333366\"><img src=\"themes/ilVeneto/images/pixel.gif\" width=\"10\" height=\"1\" border=\"0\" alt=\"\"></td>\n"
	."<td bgcolor=\"#333366\" width=\"150\" valign=\"top\">\n";
    blocks(left);
    echo "</td><td><img src=\"themes/ilVeneto/images/pixel.gif\" width=\"15\" height=\"1\" border=\"0\" alt=\"\"></td><td width=\"100%\">\n";
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
    global $index;
    if ($index == 1) {
	echo "</td><td><img src=\"themes/ilVeneto/images/pixel.gif\" width=\"15\" height=\"1\" border=\"0\" alt=\"\"></td><td valign=\"top\" width=\"150\">\n";
	blocks(right);
    }
    echo "</td><td bgcolor=\"#333366\"><img src=\"themes/ilVeneto/images/pixel.gif\" width=10 height=1 border=0 alt=\"\">\n"
	."</td></tr></table>\n"
        ."<table width=\"99%\" cellpadding=\"0\" cellspacing=\"0\" 
        border=\"0\" bgcolor=\"#333366\" align=\"center\"><tr valign=\"top\">\n"
        ."<td align=\"center\" height=\"17\">\n"
        ."<IMG height=\"17\" alt=\"\" hspace=\"0\" src=\"themes/ilVeneto/images/corner-bottom-left.gif\" width=\"17\" align=\"left\">\n"
        ."<IMG height=\"17\" alt=\"\" hspace=\"0\" src=\"themes/ilVeneto/images/corner-bottom-right.gif\" width=\"17\" align=\"right\">\n"
        ."</td></tr></table>\n"
        ."<br>"
        ."<table width=\"99%\" cellpadding=\"0\" cellspacing=\"0\" border=\"0\" align=\"center\"><tr valign=\"top\">\n"
        ."<td><IMG height=\"17\" alt=\"\" hspace=\"0\" src=\"themes/ilVeneto/images/pixel.gif\" width=\"1\" align=\"left\"></td>\n"
        ."<td width=\"100%\">&nbsp;</td>\n"
        ."<td><IMG height=\"17\" alt=\"\" hspace=\"0\" src=\"themes/ilVeneto/images/pixel.gif\" width=\"1\" align=\"right\"></td>\n"
        ."</tr><tr align=\"center\">\n"
        ."<td width=\"100%\" colspan=\"3\">\n";
    footmsg();
    echo "</td>\n"
        ."</tr><tr>\n"
        ."<td><IMG height=\"17\" alt=\"\" hspace=\"0\" src=\"themes/ilVeneto/images/pixel.gif\" width=\"1\" align=\"left\"></td>\n"
        ."<td width=\"100%\">&nbsp;</td>\n"
        ."<td><IMG height=\"17\" alt=\"\" hspace=\"0\" src=\"themes/ilVeneto/images/pixel.gif\" width=\"1\" align=\"right\"></td>\n"
        ."</tr></table>\n";
}

/************************************************************/
/* Function themeheader()                                   */
/*                                                          */
/* MAINTEXT...Control the header for your site. You need to define the */
/* BODY tag and in some part of the code call the blocks    */
/* function for left side with: blocks(left);               */
/************************************************************/

function themeindex ($aid, $informant, $time, $title, $counter, $topic, $thetext, $notes, $morelink, $topicname, $topicimage, $topictext) {
    global $anonymous, $tipath;
    echo "<table border=\"0\" cellpadding=\"1\" cellspacing=\"0\" 
    bgcolor=\"#B6CCE1\" width=\"100%\"><tr><td>\n"
	."<table border=\"0\" cellpadding=\"0\" cellspacing=\"0\" bgcolor=\"#B6CCE1\" width=\"100%\"><tr><td>\n"
	."<table border=\"0\" cellpadding=\"5\" cellspacing=\"0\" 
	bgcolor=\"#444490\" 
	width=\"100%\"><tr><td align=\"left\">\n"
	."<font size=\"2\" color=\"#FFA000\"><b>$title</b></font><br>\n"
."<font color=\"#999999\" size=\"1\">"._POSTEDBY." ";
    formatAidHeader($aid);
    echo " "._ON." $time $timezone ($counter "._READS.")<br></font>\n"    
."</td></tr></table></td></tr></table>\n"
	."<table border=\"0\" cellpadding=\"5\" cellspacing=\"0\" bgcolor=\"#28224C\" 
	width=\"100%\"><tr><td align=\"justify\">\n"
	."<font size=\"2\" color=\"#ffbb00\"><b><a href=\"search.php?query=&amp;topic=$topic\"><img src=\"$tipath$topicimage\" border=\"0\" Alt=\"$topictext\" align=\"right\" hspace=\"10\" vspace=\"10\"></a></B></font>\n";
    FormatStory($thetext, $notes, $aid, $informant);
    echo "</td></tr></table></td></tr></table>\n"
	."<table border=\"0\" cellpadding=\"0\" cellspacing=\"0\" bgcolor=\"#ffbb00\" width=\"100%\"><tr><td>\n"
	."<table border=\"0\" cellpadding=\"0\" cellspacing=\"0\" bgcolor=\"#333366\" 
	width=\"100%\"><tr><td align=\"right\">\n"
	
	."<font color=\"#999999\" size=\"1\">$morelink</font>\n"
	."</td></tr></table></td></tr></table>\n"
	."<br>\n\n\n";
}

/************************************************************/
/* Function themeheader()                                   */
/*                                                          */
/* Control the header for your site. You need to define the */
/* BODY tag and in some part of the code call the blocks    */
/* function for left side with: blocks(left);               */
/************************************************************/

function themearticle ($aid, $informant, $datetime, $title, $thetext, $topic, $topicname, $topicimage, $topictext) {
    global $admin, $sid, $tipath;
    echo "<table border=\"0\" cellpadding=\"0\" cellspacing=\"0\" 
    bgcolor=\"#333366\" width=\"100%\"><tr><td>\n"
        ."<table border=\"0\" cellpadding=\"1\" cellspacing=\"0\" bgcolor=\"#ffbb00\" width=\"100%\"><tr><td>\n"
        ."<table border=\"0\" cellpadding=\"3\" cellspacing=\"0\" bgcolor=\"#333366\" width=\"100%\"><tr><td align=\"left\">\n"
        ."<font size=\"1\" color=\"#ffbb00\"><b>$title</b></font><br>\n"
        ."<font size=\"1\">"._POSTEDON." $datetime "._BY." ";
    formatAidHeader($aid);
    if (is_admin($admin)) {
	echo "<br>[ <a href=\"admin.php?op=EditStory&amp;sid=$sid\">"._EDIT."</a> | <a href=\"admin.php?op=RemoveStory&amp;sid=$sid\">"._DELETE."</a> ]\n";
    }
    echo "</td></tr></table></td></tr></table><br>";
    echo "<a href=\"search.php?query=&amp;topic=$topic\"><img src=\"$tipath$topicimage\" border=\"0\" Alt=\"$topictext\" align=\"right\" hspace=\"10\" vspace=\"10\"></a>\n";
    FormatStory($thetext, $notes="", $aid, $informant);
    echo "</td></tr></table><br>\n\n\n";
}

/************************************************************/
/* Function themeheader()                                   */
/*                                                          */
/* sidebOX Control the header for your site. You need to define the */
/* BODY tag and in some part of the code call the blocks    */
/* function for left side with: blocks(left);               */
/************************************************************/

function themesidebox($title, $content) {
    echo "<table border=\"0\" cellpadding=\"1\" cellspacing=\"0\" 
    bgcolor=\"#B6CCE1\" width=\"150\"><tr><td>\n"
	."<table border=\"0\" cellpadding=\"2\" cellspacing=\"1\" 
	bgcolor=\"#444490\" 
	width=\"100%\"><tr><td align=center>\n"
	."<font size=\"2\" color=\"#FFA000\"><b>$title</b></font>\n"
	."</td></tr><tr valign=\"top\"><td bgcolor=\"#28224C\">\n"
	."<font size=\"2\">$content</font>\n"
	."</td></tr></table></td></tr></table>\n"
	."<br>\n\n\n";
}

?>