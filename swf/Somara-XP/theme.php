<?php

/************************************************************/
/* Theme Name: Somara-XP (v1.0)                             */
/* Theme Developer: Somara Sem (http://www.somara.com)      */
/* Last Updated: 09/06/2001                                 */
/*                                                          */
/* Note: This theme looks best in IE 5-6 and Netscape 6.    */
/* It looks okay in Netscape 4.7x but the right-hand side   */
/* of the Story Box displays a little off by a few pixels.  */
/************************************************************/

/************************************************************/
/* Theme Colors Definition                                  */
/*                                                          */
/* Define colors for your web site. $bgcolor2 is generaly   */
/* used for the tables border as you can see on OpenTable() */
/* function, $bgcolor1 is for the table background and the  */
/* other two bgcolor variables follows the same criteria.   */
/* $texcolor1 and 2 are for tables internal texts           */
/************************************************************/

$bgcolor1 = "#D6DFF7";
$bgcolor2 = "#6487dc";
$bgcolor3 = "#D6DFF7";
$bgcolor4 = "#6487dc";
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
	echo "<font class=\"content\" color=\"#505050\">$thetext$notes</font>\n";
    } else {
	if($informant != "") {
	    $boxstuff = "<a href=\"user.php?op=userinfo&amp;uname=$informant\">$informant</a> ";
	} else {
	    $boxstuff = "$anonymous ";
	}
	$boxstuff .= ""._WRITES." <i>\"$thetext\"</i>$notes\n";
	echo "<font class=\"content\" color=\"#505050\">$boxstuff</font>\n";
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
    echo "<body bgcolor=\"#ffffff\" topmargin=\"0\" leftmargin=\"0\" marginheight=\"0\" marginwidth=\"0\">\n\n";
    if ($banners) {
	include("banners.php");
    }
    echo "<table cellpadding=\"0\" cellspacing=\"0\" width=\"100%\" border=\"0\" bgcolor=\"#6487dc\">\n"
	."<tr>\n"
	."<td bgcolor=\"#6487dc\" align=\"left\" valign=\"top\" width=\"65%\"><a href=\"index.php\"><img src=\"themes/Somara-XP/images/logo.gif\" align=\"left\" alt=\""._WELCOMETO." $sitename\" border=\"0\"></a></td>\n"
	."<form action=\"search.php\" method=\"post\">\n"
	."<td bgcolor=\"#6487dc\" align=\"right\" valign=\"top\">\n"
	."<font class=\"content\" color=\"#000000\"><b>"._SEARCH." </b>\n"
	."<input type=\"text\" name=\"query\" size=\"14\"></font></td></form>\n"
	."<form action=\"search.php\" method=\"get\"><font class=\"content\">\n"
	."<td bgcolor=\"#6487dc\" align=\"right\" valign=\"top\">\n"
	."<b>"._TOPICS." </b>\n";
    $toplist = mysql_query("select topicid, topictext from $prefix"._topics." order by topictext");
    echo "<select name=\"topic\"onChange='submit()'>\n"
	."<option value=\"\">"._ALLTOPICS."</option>\n";
    while(list($topicid, $topics) = mysql_fetch_row($toplist)) {
    if ($topicid==$topic) { $sel = "selected "; }
	echo "<option $sel value=\"$topicid\">$topics</option>\n";
	$sel = "";
    }
    echo "</select></font></td></form>\n"
	."</tr></table>\n"
	."<table cellpadding=\"0\" cellspacing=\"0\" width=\"100%\" border=\"0\" align=\"center\" bgcolor=\"#F3F4F7\">\n"
        ."<tr>\n"
        ."<td bgcolor=\"#ffffff\" colspan=\"4\"><IMG src=\"themes/Somara-XP/images/pixel.gif\" width=\"1\" height=\"1\" alt=\"\" border=\"0\" hspace=\"0\"></td>\n"
        ."</tr>\n"
	."<tr valign=\"middle\" bgcolor=\"#EAE7D1\">\n"
    ."<td align=\"left\" valign=\"top\" width=\"8\" height=\"22\"><img src=\"themes/Somara-XP/images/topnav-left.gif\"></td>\n"
	."<td width=\"15%\" background=\"themes/Somara-XP/images/topnav-bg.gif\" nowrap><font class=\"content\" color=\"#363636\">\n";
    if ($username == "Anonymous") {
	echo "&nbsp;&nbsp;<font color=\"#ffffff\"><a href=\"user.php\">Create</a></font> an account\n";
    } else {
	echo "&nbsp;&nbsp;"._HELLO." $username!";
    }
    echo "</font></td>\n"
	."<td align=\"center\" height=\"20\" width=\"73%\" background=\"themes/Somara-XP/images/topnav-bg.gif\"><font class=\"content\">\n"
	."<A href=\"/\">Home</a>\n"
	."&nbsp;&middot;&nbsp;\n"
        ."<A href=\"topics.php\">Topics</a>\n"
        ."&nbsp;&middot;&nbsp;\n"
        ."<A href=\"download.php\">Downloads</a>\n"
        ."&nbsp;&middot;&nbsp;\n"
        ."<A href=\"user.php\">Your Account</a>\n"
        ."&nbsp;&middot;&nbsp;\n"
        ."<A href=\"submit.php\">Submit News</a>\n"
        ."&nbsp;&middot;&nbsp;\n"
        ."<A href=\"top.php\">Top 10</a>\n"
        ."</font>\n"
        ."</td>\n"
        ."<td align=\"left\" valign=\"top\" width=\"8\" height=\"22\"><img src=\"themes/Somara-XP/images/topnav-left.gif\"></td>\n"
        ."<td align=\"right\" width=\"140\" background=\"themes/Somara-XP/images/topnav-bg.gif\"><font class=\"content\">\n"
        ."<script type=\"text/javascript\">\n\n"
        ."<!--   // Array ofmonth Names\n"
        ."var monthNames = new Array( \"January\",\"February\",\"March\",\"April\",\"May\",\"June\",\"July\",\"August\",\"September\",\"October\",\"November\",\"December\");\n"
        ."var now = new Date();\n"
        ."thisYear = now.getYear();\n"
        ."if(thisYear < 1900) {thisYear += 1900}; // corrections if Y2K display problem\n"
        ."document.write(monthNames[now.getMonth()] + \" \" + now.getDate() + \", \" + thisYear);\n"
        ."// -->\n\n"
        ."</script></font>&nbsp;</td>\n"
        ."</tr>\n"
        ."<tr>\n"
        ."<td bgcolor=\"#EAE7D1\" colspan=\"5\"><IMG src=\"themes/Somara-XP/images/pixel.gif\" width=\"1\" height=\"3\" alt=\"\" border=\"0\" hspace=\"0\"></td>\n"
        ."</tr>\n"
        ."<tr>\n"
        ."<td bgcolor=\"#ACA899\" colspan=\"5\"><IMG src=\"themes/Somara-XP/images/pixel.gif\" width=\"1\" height=\"1\" alt=\"\" border=\"0\" hspace=\"0\"></td>\n"
        ."</tr>\n"
        ."<tr>\n"
        ."<td bgcolor=\"#716F64\" colspan=\"5\"><IMG src=\"themes/Somara-XP/images/pixel.gif\" width=\"1\" height=\"1\" alt=\"\" border=\"0\" hspace=\"0\"></td>\n"
        ."</tr>\n"
        ."</table>\n"
	."<!----- Begin Main Content Table ----->\n"
	."<table width=\"100%\" cellpadding=\"0\" cellspacing=\"0\" border=\"0\" bgcolor=\"#ffffff\" align=\"center\"><tr valign=\"top\">\n"
	."<td bgcolor=\"#6487dc\"><img src=\"themes/Somara-XP/images/pixel.gif\" width=\"10\" height=\"1\" border=\"0\" alt=\"\"></td>\n"
	."<td bgcolor=\"#6487dc\" width=\"175\" valign=\"top\">\n";
    blocks(left);
    echo "</td><td bgcolor=\"#6487dc\"><img src=\"themes/Somara-XP/images/pixel.gif\" width=\"15\" height=\"1\" border=\"0\" alt=\"\"></td>\n"
        ."<td bgcolor=\"#ffffff\"><img src=\"themes/Somara-XP/images/pixel.gif\" width=\"15\" height=\"1\" border=\"0\" alt=\"\"></td>\n"
        ."<td width=\"100%\">\n";
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
	echo "</td><td><img src=\"themes/Somara-XP/images/pixel.gif\" width=\"15\" height=\"1\" border=\"0\" alt=\"\"></td><td valign=\"top\" width=\"150\">\n";
	blocks(right);
    }
    echo "</td><td bgcolor=\"#ffffff\"><img src=\"themes/Somara-XP/images/pixel.gif\" width=10 height=1 border=0 alt=\"\">\n"
	."</td></tr></table>\n"
        ."<table width=\"100%\" cellpadding=\"0\" cellspacing=\"0\" border=\"0\" bgcolor=\"#ffffff\" align=\"center\">\n"
        ."<tr align=\"center\">\n"
        ."<td width=\"100%\" colspan=\"3\">\n";
    footmsg();
    echo "</td>\n"
        ."</tr></table>\n";
}

/************************************************************/
/* Function themeindex()                                    */
/*                                                          */
/* This function format the stories on the Homepage         */
/************************************************************/

function themeindex ($aid, $informant, $time, $title, $counter, $topic, $thetext, $notes, $morelink, $topicname, $topicimage, $topictext) {
    global $anonymous, $tipath;
    echo "<br><table border=\"0\" cellpadding=\"0\" cellspacing=\"0\" bgcolor=\"#ffffff\" width=\"100%\">\n"
    ."<tr>\n"
    ."<td>\n"

	."<table border=\"0\" cellpadding=\"0\" cellspacing=\"0\" width=\"100%\">\n"
	."<tr>\n"
	."<td align=\"left\" valign=\"top\" width=\"26\" height=\"30\"><img src=\"themes/Somara-XP/images/sidebox-title-left.gif\"></td>\n"
	."<td align=\"left\" valign=\"middle\" background=\"themes/Somara-XP/images/sidebox-title-bg.gif\" width=\"100%\" height=\"30\">\n"
	."<font class=\"option\" color=\"#363636\">&nbsp;&nbsp;<b>$title</b></font>\n"
	."</td>\n"
	."<td align=\"left\" valign=\"top\" width=\"6\" height=\"30\"><img src=\"themes/Somara-XP/images/sidebox-title-right.gif\"></td>\n"
	."</tr>\n"
	."</table>\n"

	."<table border=\"0\" cellpadding=\"0\" cellspacing=\"0\" width=\"100%\">\n"
	."<tr>\n"
	."<td>\n"

	."<table border=\"0\" cellpadding=\"0\" cellspacing=\"0\" width=\"100%\">\n"
	."<tr>\n"
	."<td align=\"left\" valign=\"top\" width=\"15\" height=\"46\"><img src=\"themes/Somara-XP/images/storybox-left.gif\"></td>\n"
	."<td align=\"left\" valign=\"middle\" background=\"themes/Somara-XP/images/storybox-bg.gif\" width=\"100%\" height=\"46\">\n"
	."<font color=\"#999999\" size=\"1\">"._POSTEDBY." ";
    formatAidHeader($aid);
    echo " "._ON." $time $timezone ($counter "._READS.")</font>\n"
	."<font color=\"#999999\">$morelink</font>\n"
	."</td>\n"
    ."<td width=\"12\" align=\"left\" valign=\"top\"><img src=\"themes/Somara-XP/images/storybox-right.gif\"></td>\n"
	."</tr>\n"
	."</table>\n"

	."<table border=\"0\" cellpadding=\"0\" cellspacing=\"0\" width=\"100%\">\n"
	."<tr>\n"
	."<td width=\"4\" align=\"left\" valign=\"top\" background=\"themes/Somara-XP/images/sidebox-bar-left.gif\"><img src=\"themes/Somara-XP/images/sidebox-bar-px.gif\"></td>\n"
	."<td>\n"

	."<table border=\"0\" cellpadding=\"3\" cellspacing=\"0\" width=\"100%\">\n"
	."<tr valign=\"top\">\n"
	."<td>\n"
	."<font color=\"#999999\"><b><a href=\"search.php?query=&amp;topic=$topic\"><img src=\"$tipath$topicimage\" border=\"0\" Alt=\"$topictext\" align=\"right\" hspace=\"10\" vspace=\"10\"></a></B></font>\n";
    FormatStory($thetext, $notes, $aid, $informant);
    echo "</td></tr></table>\n"
    ."</td>\n"
    ."<td width=\"13\" align=\"left\" valign=\"top\" background=\"themes/Somara-XP/images/storybox-content-right.gif\"><img src=\"themes/Somara-XP/images/storybox-content-right-px.gif\"></td>\n"
    ."</tr></table>\n"

	."<table border=\"0\" cellpadding=\"0\" cellspacing=\"0\" width=\"100%\">\n"
	."<tr valign=\"top\">\n"
	."<td width=\"9\" height=\"29\" align=\"left\" valign=\"top\"><img src=\"themes/Somara-XP/images/storybox-bottom-left.gif\"></td>\n"
	."<td width=\"100%\" height=\"29\" background=\"themes/Somara-XP/images/storybox-bottom-bg.gif\">&nbsp;</td>\n"
	."<td width=\"18\" height=\"29\" align=\"left\" valign=\"top\"><img src=\"themes/Somara-XP/images/storybox-bottom-right.gif\"></td>\n"
    ."</table>\n"

    ."</td></tr></table>\n"

    ."</td></tr></table>\n";
}

/************************************************************/
/* Function themeindex()                                    */
/*                                                          */
/* This function format the stories on the story page, when */
/* you click on that "Read More..." link in the home        */
/************************************************************/

function themearticle ($aid, $informant, $datetime, $title, $thetext, $topic, $topicname, $topicimage, $topictext) {
    global $admin, $sid, $tipath;
    echo "<table border=\"0\" cellpadding=\"0\" cellspacing=\"0\" bgcolor=\"#ffffff\" width=\"100%\"><tr><td>\n"
        ."<table border=\"0\" cellpadding=\"1\" cellspacing=\"0\" bgcolor=\"#000000\" width=\"100%\"><tr><td>\n"
        ."<table border=\"0\" cellpadding=\"3\" cellspacing=\"0\" bgcolor=\"#6487dc\" width=\"100%\"><tr><td align=\"left\">\n"
        ."<font class=\"option\" color=\"#363636\"><b>$title</b></font><br>\n"
        ."<font class=\"content\">"._POSTEDON." $datetime "._BY." ";
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
/* Function themesidebox()                                  */
/*                                                          */
/* Control look of your blocks. Just simple.                */
/************************************************************/

function themesidebox($title, $content) {
    echo "<br><table border=\"0\" cellpadding=\"0\" cellspacing=\"0\" width=\"175\"><tr><td>\n"
	."<table border=\"0\" cellpadding=\"0\" cellspacing=\"0\" width=\"100%\">\n"
	."<tr>\n"
	."<td align=\"left\" valign=\"top\" width=\"26\" height=\"30\"><img src=\"themes/Somara-XP/images/sidebox-title-left.gif\"></td>\n"
	."<td align=\"left\" valign=\"middle\" background=\"themes/Somara-XP/images/sidebox-title-bg.gif\" width=\"143\" height=\"30\">\n"
	."<font class=\"option\" color=\"#ffffff\">&nbsp;&nbsp;<b>$title</b></font></td>\n"
	."<td align=\"left\" valign=\"top\" width=\"6\" height=\"30\"><img src=\"themes/Somara-XP/images/sidebox-title-right.gif\"></td>\n"
	."</tr>\n"
	."</table>\n"
	."</td>\n"
	."</tr>\n"
	."</table>\n\n"
	."<!----- Side Box Content ----->\n"
	."<table border=\"0\" cellpadding=\"0\" cellspacing=\"0\" width=\"175\">\n"
	."<tr valign=\"top\">\n"
	."<td width=\"4\" align=\"left\" valign=\"top\" background=\"themes/Somara-XP/images/sidebox-bar-left.gif\"><img src=\"themes/Somara-XP/images/sidebox-bar-px.gif\"></td>\n"

	."<td bgcolor=\"#D6DFF7\" width=\"166\" align=\"left\" valign=\"top\">\n"
	."<table border=\"0\" cellpadding=\"3\" cellspacing=\"0\" width=\"166\">\n"
	."<tr>\n"
	."<td>\n"
	."$content\n"
	."</td>\n"
	."</tr>\n"
	."</table>\n"
	."</td>\n"
    ."<td width=\"4\" align=\"left\" valign=\"top\" background=\"themes/Somara-XP/images/sidebox-bar-right.gif\"><img src=\"themes/Somara-XP/images/sidebox-bar-px.gif\"></td>\n"
	."</tr></table>\n"

	."<table border=\"0\" cellpadding=\"0\" cellspacing=\"0\" width=\"175\">\n"
	."<tr>\n"
	."<td align=\"left\" valign=\"top\" width=\"175\" height=\"29\">\n"
	."<img src=\"themes/Somara-XP/images/sidebox-bottom.gif\">\n"
	."</td>\n"
	."</tr>\n"
	."</table>\n\n\n";
}

?>