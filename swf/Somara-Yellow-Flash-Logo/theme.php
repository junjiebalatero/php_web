<?php

/************************************************************/
/* THEME NAME: Somara-Yellow-Flash-Logo                     */
/* THEME DEVELOPER: Somara Sem (http://www.somara.com)      */
/************************************************************/

/************************************************************/
/* Theme Colors Definition                                  */
/*                                                          */
/* Control the header for your site. You need to define the */
/* BODY tag and in some part of the code call the blocks    */
/* function for left side with: blocks(left);               */
/************************************************************/

$thename = "Somara-Yellow-Borderless";
$bgcolor1 = "#ffffff";
$bgcolor2 = "#ffb71c";
$bgcolor3 = "#ffffff";
$bgcolor4 = "#ffb71c";
$textcolor1 = "#000000";
$textcolor2 = "#000000";

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
	echo "<font size=\"2\" color=\"#505050\">$thetext<br>$notes</font>\n";
    } else {
	if($informant != "") {
	    $boxstuff = "<a href=\"user.php?op=userinfo&amp;uname=$informant\">$informant</a> ";
	} else {
	    $boxstuff = "$anonymous ";
	}
	$boxstuff .= "".translate("writes:")." \"$thetext\" $notes\n";
	echo "<font size=\"2\" color=\"#505050\">$boxstuff</font>\n";
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
    echo "<body bgcolor=\"#ffcc00\" background=\"themes/Somara-Yellow-Borderless/images/mainBackground.gif\" text=\"#000000\" link=\"#363636\" vlink=\"#363636\" alink=\"#d5ae83\" topmargin=\"0\">\n"
	    ."<br>\n";
    if ($banners) {
	include("banners.php");
    }
    echo "<table cellpadding=\"1\" cellspacing=\"0\" width=\"97%\" border=\"0\" align=\"center\" bgcolor=\"#ffcc00\">\n"
        ."<tr>\n"
        ."<td width=\"100%\" background=\"themes/Somara-Yellow-Borderless/images/titleBar.gif\">&nbsp; \n"
        ."</td>\n"
        ."</tr>\n"
        ."</table>\n\n"

        ."<table cellpadding=\"0\" cellspacing=\"0\" width=\"97%\" border=\"0\" align=\"center\" bgcolor=\"#ffffff\">\n"
	    ."<tr>\n"
	    ."<td bgcolor=\"#ffcc00\" width=\"200\" align=\"left\" valign=\"middle\">\n\n"

    ."<!-- Begin Somara Flash Logo -->\n"
	."<OBJECT classid=\"clsid:D27CDB6E-AE6D-11cf-96B8-444553540000\" \n"
	."codebase=\"http://download.macromedia.com/pub/shockwave/cabs/flash/swflash.cab#version=5,0,0,0\" \n"
	."WIDTH=220 HEIGHT=40>\n"
    ."<PARAM NAME=movie VALUE=\"themes/Somara-Yellow-Flash-Logo/flash/somaraLogo.swf\">\n"
    ."<PARAM NAME=quality VALUE=high>\n"
    ."<PARAM NAME=bgcolor VALUE=#FFCC00>\n"
    ."<EMBED src=\"themes/Somara-Yellow-Flash-Logo/flash/somaraLogo.swf\" quality=high bgcolor=#FFCC00  WIDTH=220 HEIGHT=40 TYPE=\"application/x-shockwave-flash\" PLUGINSPAGE=\"http://www.macromedia.com/shockwave/download/index.cgi?P1_Prod_Version=ShockwaveFlash\"></EMBED>\n"
    ."</OBJECT>\n"
    ."<!-- End Somara Flash Logo -->\n\n"

	    ."</td>\n"
	    ."<td bgcolor=\"#ffcc00\" align=\"right\">\n"
	    ."<td bgcolor=\"#ffcc00\" align=\"right\">\n"
	    ."<table>\n"
	    ."<tr>\n"
	    ."<td>\n"
	    ."<form action=\"search.php\" method=\"post\"><font size=\"2\" color=\"#000000\"><b>".translate("Search")." </b>\n"
	    ."<input type=\"text\" name=\"query\" size=\"14\"></font></form></td>\n"
	    ."<td bgcolor=\"#ffcc00\" align=\"right\">\n"
	    ."<form action=\"search.php\" method=\"get\"><font size=\"2\"><b>".translate("Topics")." </b>\n";
    $toplist = mysql_query("select topicid, topictext from $prefix"._topics." order by topictext");
    echo "<select name=\"topic\"onChange='submit()'>\n"
	."<option value=\"\">".translate("All Topics")."</option>\n";
    while(list($topicid, $topics) = mysql_fetch_row($toplist)) {
    if ($topicid==$topic) { $sel = "selected "; }
	echo "<option $sel value=\"$topicid\">$topics</option>\n";
	$sel = "";
    }
    echo "</select></font></form></td></tr></table></td>\n"
	    ."<td bgcolor=\"#ffcc00\" valign=\"top\">&nbsp;</td>\n"
	    ."</tr></table>\n"
	    ."<table cellpadding=\"0\" cellspacing=\"0\" width=\"97%\" border=\"0\" align=\"center\" bgcolor=\"#fefefe\">\n"
	    ."<tr>\n"
	    ."<td bgcolor=\"#000000\" colspan=\"4\"><IMG src=\"themes/Somara-Yellow-Borderless/images/pixel.gif\" width=\"1\" height=1 alt=\"\" border=\"0\" hspace=\"0\"></td>\n"
	    ."</tr>\n"
	    ."<tr valign=\"middle\" bgcolor=\"#ffffff\">\n"
	    ."<td width=\"15%\" nowrap><font size=\"2\" color=\"#363636\"><b>\n";
    if ($username == "Anonymous") {
	echo "&nbsp;&nbsp;<b><font color=\"#363636\"><a href=\"user.php\">Create</a></font> an account</b>\n";
    } else {
	echo "&nbsp;&nbsp;Welcome $username!";
    }
    echo "</b></font></td>\n"
	    ."<td align=\"center\" height=\"20\" width=\"71%\"><font size=\"2\"><B>\n"
	    ."<img src=\"themes/Somara-Yellow-Borderless/images/arrow.gif\" border=0> <A href=\"/\">Home</a>\n"
        ."<img src=\"themes/Somara-Yellow-Borderless/images/arrow.gif\" border=0> <A href=\"topics.php\">Topics</a>\n"
        ."<img src=\"themes/Somara-Yellow-Borderless/images/arrow.gif\" border=0> <A href=\"download.php\">Downloads</a>\n"
        ."<img src=\"themes/Somara-Yellow-Borderless/images/arrow.gif\" border=0> <A href=\"user.php\">Your Account</a>\n"
        ."<img src=\"themes/Somara-Yellow-Borderless/images/arrow.gif\" border=0> <A href=\"submit.php\">Submit News</a>\n"
        ."<img src=\"themes/Somara-Yellow-Borderless/images/arrow.gif\" border=0> <A href=\"top.php\">Top 10</a>\n"
        ."</B></font>\n"
        ."</td>\n"
        ."<td align=\"right\" width=\"15%\"><font size=\"2\"><b>\n"
        ."<script type=\"text/javascript\">\n\n"
        ."<!--   // Array ofmonth Names\n"
        ."var monthNames = new Array( \"January\",\"February\",\"March\",\"April\",\"May\",\"June\",\"July\",\"August\",\"September\",\"October\",\"November\",\"December\");\n"
        ."var now = new Date();\n"
        ."thisYear = now.getYear();\n"
        ."if(thisYear < 1900) {thisYear += 1900}; // corrections if Y2K display problem\n"
        ."document.write(monthNames[now.getMonth()] + \" \" + now.getDate() + \", \" + thisYear);\n"
        ."// -->\n\n"
        ."</script></b></font></td>\n"
        ."<td>&nbsp;</td>\n"
        ."</tr>\n"
        ."<tr>\n"
        ."<td bgcolor=\"#000000\" colspan=\"4\"><IMG src=\"themes/Somara-Yellow-Borderless/images/pixel.gif\" width=\"1\" height=\"1\" alt=\"\" border=\"0\" hspace=\"0\"></td>\n"
        ."</tr>\n"
        ."</table>\n\n"

	    ."<!-- FIN DEL TITULO -->\n"
	    ."<table width=\"99%\" cellpadding=\"0\" cellspacing=\"0\" border=\"0\" align=\"center\"><tr valign=\"top\">\n"
	    ."<td><img src=\"themes/Somara-Yellow-Borderless/images/pixel.gif\" width=\"1\" height=\"20\" border=\"0\" alt=\"\"></td></tr></table>\n"
	    ."<table width=\"99%\" cellpadding=\"0\" cellspacing=\"0\" border=\"0\" align=\"center\"><tr valign=\"top\">\n"
	    ."<td><img src=\"themes/Somara-Yellow-Borderless/images/pixel.gif\" width=\"10\" height=\"1\" border=\"0\" alt=\"\"></td>\n"
	    ."<td width=\"150\" valign=\"top\">\n";
    blocks(left);
    echo "</td><td><img src=\"themes/Somara-Yellow-Borderless/images/pixel.gif\" width=\"15\" height=\"1\" border=\"0\" alt=\"\"></td><td width=\"100%\">\n";
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
	echo "</td><td><img src=\"themes/Somara-Yellow-Borderless/images/pixel.gif\" width=\"15\" height=\"1\" border=\"0\" alt=\"\"></td><td valign=\"top\" width=\"150\">\n";
	blocks(right);
    }
    echo "</td><td><img src=\"themes/Somara-Yellow-Borderless/images/pixel.gif\" width=10 height=1 border=0 alt=\"\">\n"
	    ."</td></tr></table>\n"
        ."<table width=\"99%\" cellpadding=\"0\" cellspacing=\"0\" border=\"0\" align=\"center\"><tr valign=\"top\">\n"
        ."<td height=\"17\">&nbsp;</td>\n"
        ."</tr></table>\n"
        ."<br>"
        ."<table width=\"97%\" cellpadding=\"0\" cellspacing=\"0\" border=\"0\" align=\"center\"><tr valign=\"top\">\n"
        ."</tr><tr align=\"center\">\n"
        ."<td width=\"100%\" colspan=\"3\">\n";
    footmsg();
    echo "</td>\n"
        ."</tr>\n"
        ."</table><br><br>\n";
}

/************************************************************/
/* Function themeheader()                                   */
/*                                                          */
/* Control the header for your site. You need to define the */
/* BODY tag and in some part of the code call the blocks    */
/* function for left side with: blocks(left);               */
/************************************************************/

function themeindex ($aid, $informant, $time, $title, $counter, $topic, $thetext, $notes, $morelink, $topicname, $topicimage, $topictext) {
    global $anonymous, $tipath;
    echo "<table cellpadding=\"1\" cellspacing=\"0\" width=\"100%\" border=\"0\" align=\"center\" bgcolor=\"#000000\">\n"
        ."<tr>\n"
        ."<td width=\"100%\" background=\"themes/Somara-Yellow-Borderless/images/titleBar.gif\">&nbsp; \n"
        ."</td>\n"
        ."</tr>\n"
        ."</table>\n\n"
        ."<table border=\"0\" cellpadding=\"0\" cellspacing=\"0\" width=\"100%\"><tr><td>\n"
	    ."<table border=\"0\" cellpadding=\"3\" cellspacing=\"1\" bgcolor=\"#ffcc00\" width=\"100%\"><tr>\n"
	    ."<td bgcolor=\"#ffcc00\" align=\"left\">\n"
	    ."<font size=\"3\" color=\"#363636\"><b>$title</b></font>\n"
	    ."<br><font color=\"#999999\" size=\"1\">"._POSTEDBY." ";
    formatAidHeader($aid);
    echo " "._ON." $time $timezone ($counter "._READS.")</font>\n"
        ."<br><b>"._TOPIC."</b> <a href=\"search.php?query=&amp;topic=$topic&amp;author=\">$topictext</a>\n"
	    ."</td></tr>\n"
	    ."<tr><td bgcolor=\"#ffffff\">\n"
	    ."<font color=\"#999999\"><b><a href=\"search.php?query=&amp;topic=$topic\"><img src=\"$tipath$topicimage\" border=\"0\" Alt=\"$topictext\" align=\"right\" hspace=\"10\" vspace=\"10\"></a></B></font>\n";
    FormatStory($thetext, $notes, $aid, $informant);
    echo "</td></tr>\n"
        ."<tr><td bgcolor=\"#ffffff\" align=\"right\">\n"
	    ."<font size=\"2\">$morelink</font>\n"
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
    echo "<table border=\"0\" cellpadding=\"0\" cellspacing=\"5\" bgcolor=\"#ffffff\" width=\"100%\"><tr><td>\n"
        ."<table border=\"0\" cellpadding=\"1\" cellspacing=\"0\" bgcolor=\"#000000\" width=\"100%\"><tr><td>\n"
        ."<table border=\"0\" cellpadding=\"3\" cellspacing=\"0\" bgcolor=\"#ffcc00\" width=\"100%\"><tr><td align=\"left\">\n"
        ."<font size=\"3\" color=\"#363636\"><b>$title</b></font><br>\n"
        .""._POSTEDON." $datetime "._BY." ";
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
/* Control the header for your site. You need to define the */
/* BODY tag and in some part of the code call the blocks    */
/* function for left side with: blocks(left);               */
/************************************************************/

function themesidebox($title, $content) {
    echo "<table border=\"0\" cellpadding=\"0\" cellspacing=\"0\" bgcolor=\"#ffcc00\" width=\"150\"><tr><td>\n"
        ."<table border=\"0\" cellpadding=\"1\" cellspacing=\"0\" width=\"150\" bgcolor=\"#000000\">\n"
        ."<tr>\n"
        ."<td background=\"themes/Somara-Yellow-Borderless/images/titleBar.gif\">&nbsp;</td>\n"
        ."</tr>\n"
        ."</table>\n"

	    ."<table border=\"0\" cellpadding=\"3\" cellspacing=\"0\" bgcolor=\"#ffcc00\" width=\"100%\">\n"
	    ."<tr><td bgcolor=\"#ffb71c\" align=\"center\">\n"
	    ."<font size=\"2\" color=\"#363636\"><b>$title</b></font>\n"
	    ."</td></tr>\n"
	    ."<tr>\n"
	    ."<td bgcolor=\"#ffcc00\">$content</td>\n"
	    ."</tr>\n"
	    ."</table></td></tr></table>\n"
	    ."<br>\n\n\n";
}

?>
