<?php

/**************************************************************/
/* fmII-5x Copyright MonkeyKing                               */
/* this the rc2 release | now 4.0.1 compliant                 */
/* http://www.samuraisunday.com                               */
/* contact: monkeyking@samuraisunday.com                      */
/* Released under the GNU/GPL license                         */
/*                                                            */
/* I also went into banners.php and set border=0 	      */
/**************************************************************/
/**************************************************************/
/* Theme Colors Definition                                    */
/**************************************************************/

$thename = "fmII-5x";
$bgcolor1 = "#FFFFFF";
$bgcolor2 = "#CCCCCC";
$bgcolor3 = "#C6C6C6";
$bgcolor4 = "#e7e7e7";
$textcolor1 = "#FFFFFF";
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
        $notes = "<br><b>"._NOTE."</b> $notes\n";
    } else {
        $notes = "";
    }
    if ("$aid" == "$informant") {
        echo "$thetext<br>$notes\n";
    } else {
        if($informant != "") {
            $boxstuff = "<a href=\"user.php?op=userinfo&amp;uname=$informant\">$informant</a> ";
        } else {
            $boxstuff = "$anonymous ";
        }
        $boxstuff .= ""._WRITES." $thetext<br>$notes\n";
        echo "$boxstuff\n";
    }
}

/************************************************************/
/* Function themeheader                                     */
/************************************************************/

function themeheader() {
    global $user, $username, $banners, $sitename, $slogan, $cookie, $prefix, $index;
    cookiedecode($user);
    $username = $cookie[1];
    if ($username == "") {
        $username = "Anonymous";
    }
echo "<body>\n"

// ***** begin top bar *****

	."<table cellspacing=\"0\" cellpadding=\"1\" width=\"100%\" border=\"0\">\n"
	."<tr valign=\"middle\">\n"
	."<td class=\"osdn_banner\">\n";
	print( ""._WELCOMETO." $sitename" );
echo "</td>\n"
	."<td class=\"osdn_banner\" align=\"right\">\n";
	print( "$slogan" );
echo "</td>\n"
	."</tr>\n"
	."</table>\n"
	
	."<table cellspacing=\"0\" cellpadding=\"0\" width=\"100%\" border=\"0\">\n"
	."<tr valign=\"middle\" bgcolor=\"#6f6f6f\">\n"
	."<td><img src=\"themes/fmII-5x/images/pixel.gif\" width=\"1\" height=\"1\" alt=\"\"></td>\n"
	."</tr>\n"

	."<tr bgcolor=\"#e7e7e7\">\n"
	."<td><img src=\"themes/fmII-5x/images/pixel.gif\" width=\"1\" height=\"1\" alt=\"\"></td>\n"
	."</tr>\n"
	."</table>\n"
	
// ***** end top bar *****

    ."<table width=\"100%\" border=\"0\" cellspacing=\"0\" cellpadding=\"0\">\n"
    ."<tr>\n"
    ."<td class=\"headertop\" width=\"100%\" valign=\"top\">\n"
    ."<table width=\"100%\" border=\"0\" cellspacing=\"0\" cellpadding=\"0\">\n"
    ."<tr>\n"
    ."<td width=\"168\"><a href=\"index.php\"><img src=\"themes/fmII-5x/images/logo.gif\" alt=\""._WELCOMETO." $sitename\" border=\"0\"></a></td>\n"
    ."<td valign=\"top\" align=\"right\">\n"
    ."<table width=\"100%\" border=\"0\" cellspacing=\"0\" cellpadding=\"0\" class=\"headertabledate\">\n"
    ."<tr>\n"
    ."<td align=\"right\"><br>\n";
    if ($banners) {
    include("banners.php");
}
    echo "</td>\n"
    ."</tr>\n"
    ."</table>\n"
    ."</td>\n"
    ."</tr>\n"
    ."</table>\n"

    ."</td>\n"
    ."</tr>\n"
    ."<tr>\n"
    ."<td class=\"headerline\" width=\"100%\"><img src=\"themes/fmII-5x/images/pix-transparent.gif\" width=\"1\" height=\"2\" alt=\"/\" border=\"0\"></td>\n"
    ."</tr>\n"
    ."<tr>\n"
    ."<td class=\"osdn_banner\">\n"
	
	."<table class=\"osdn_banner\" border=\"0\" width=\"100%\" cellspacing=\"0\" cellpadding=\"2\">\n"
	."<tr>\n"	
	."<td align=\"left\" valign=\"middle\">\n";
	print (date ("l M dS"));
echo "</td>\n"


// ***** Start Hardcoded Navbar here ***************	
    ."<td align=\"center\" valign=\"middle\">\n"
    ."<a href=\"index.php\">"._MAIN."</a>\n"
    ." | \n"
    ."<a href=\"topics.php\">"._TOPICS."</a>\n"
    ." | \n"
    ."<a href=\"download.php\">"._DOWNLOADS."</a>\n"
    ." | \n"
    ."<a href=\"user.php\">"._ACCOUNT."</a>\n"
    ." | \n"
    ."<a href=\"links.php\">"._LINKS."</a>\n"
    ." | \n"
    ."<a href=\"user.php?op=logout\">"._LOGOUT."</a>\n"
    ."</td>\n"
// ***** End Hardcoded Navbar here ***************	
	."<td align=\"right\">\n";

print (date ("h:i:s A"));
echo " <strong> EST</strong>\n"

	."</td>\n"
	

    ."</table>\n"
	
    ."</td>\n"
    ."</tr>\n"
	
    ."<tr>\n"
    ."<td class=\"headerline\" width=\"100%\"><img src=\"themes/fmII-5x/images/pix-transparent.gif\" width=\"1\" height=\"2\" alt=\"/\" border=\"0\"></td>\n"
    ."</tr>\n"
    ."</table>\n"

	."<table cellspacing=\"0\" cellpadding=\"5\" width=\"100%\" border=\"0\" class=\"osdn_banner\" align=\"center\">\n"
	."<tr bgcolor=\"#BBDDFF\">\n"
	."<td align=\"left\">\n"

	 ."<FORM action=search.php method=post>\n"
 	 ."find: <input type=text name=query size=15>\n"
	 ."</FORM>\n"

	."</td>\n"
	."<td valign=\"top\" align=\"right\">\n";

if ($username == "Anonymous") {
echo "<a href=\"user.php\">not logged in</a> «\n"
	."<br><a href=\"user.php\"><strong>register</strong></a> «\n"
	."<br><a href=\"user.php#lost\">lost password</a> «";
}
else

    if (is_user($user)) {
	$content .= ""._YOUARELOGGED." <b>$username</b>    «<br>";
	$result = mysql_query("select uid from $prefix"._users." where uname='$username'");
	list($uid) = mysql_fetch_row($result);
	$result2 = mysql_query("select to_userid from $prefix"._priv_msgs." where to_userid='$uid'");
	$numrow = mysql_num_rows($result2);
	$content .= ""._YOUHAVE." <a href=\"viewpmsg.php\"><b>$numrow</b></a> "._PRIVATEMSG."   «</font></center>";
    } 
	echo "$content";
	
echo    "</td>\n"
	."</tr>\n"
	."</table>\n"
	
	."<table cellspacing=\"0\" cellpadding=\"0\" width=\"100%\" border=\"0\" bgcolor=\"#FFFFFF\">\n"
	."<tr valign=\"middle\" bgcolor=\"#6f6f6f\">\n"
	."<td><img src=\"themes/fmII-5x/images/pixel.gif\" width=\"1\" height=\"2\" alt=\"\"></td>\n"
	."</tr>\n"
	."</table>\n"
	
	
	
    ."<table width=\"100%\" border=\"0\" cellspacing=\"0\" cellpadding=\"0\">\n"
    ."<tr>\n"
    ."<td valign=\"top\" width=\"166\" class=\"boxback1\" align=\"center\">\n";

    echo "</td>\n"
    ."<td width=\"10\" class=\"tiretvertical\"><img src=\"themes/fmII-5x/images/pix-transparent.gif\" alt=\"/\" border=\"0\" width=\"1\" height=\"1\"></td>\n"
    ."<td valign=\"top\" align=\"center\" width=\"100%\"><br>\n";
    if ($index == 1) {

}
}

/************************************************************/
/* Function themefooter                                     */
/************************************************************/

function themefooter() {
    global $index;
    if ($index == 1) {
    echo "</td>\n"
    ."<td align=\"center\" valign=\"top\" width=\"1\" class=\"headerline\"><img src=\"themes/fmII-5x/images/pix.gif\" width=\"1\" height=\"1\" alt=\"/\" border=\"0\"></td>\n"
    ."<td valign=\"top\" align=\"center\" width=\"166\" class=\"boxback1\">\n";

blocks(left);
blocks(right);
}
    echo "</td>\n"
    ."</tr>\n"
    ."</table>\n"
    ."<table width=\"100%\" border=\"0\" cellspacing=\"0\" cellpadding=\"0\" bgcolor=\"#FFFFFF\">\n"
    ."<tr>\n"
    ."<td class=\"headerline\" width=\"100%\"><img src=\"themes/fmII-5x/images/pix-transparent.gif\" width=\"1\" height=\"2\" alt=\"/\" border=\"0\"></td>\n"
    ."</tr>\n"
    ."<tr>\n"
    ."<td class=\"headertop\" align=\"center\" valign=\"middle\">\n"
    ."<table width=\"100%\" border=\"0\" cellspacing=\"0\" cellpadding=\"5\">\n"
    ."<tr>\n"
    ."<td align=\"center\" valign=\"middle\" class=\"copyright\">\n";
footmsg();
    echo "</td>\n"
    ."</tr>\n"
    ."</table>\n"
    ."</td>\n"
    ."</tr>\n"
    ."</table>\n";
}

/************************************************************/
/* Function themeindex                                      */
/************************************************************/

function themeindex ($aid, $informant, $time, $title, $counter, $topic, $thetext, $notes, $morelink, $topicname, $topicimage, $topictext) {
    global $anonymous, $tipath;
    echo "<table width=\"100%\" border=\"0\" cellspacing=\"0\" cellpadding=\"2\">\n"
    ."<tr>\n"
    ."<td>\n"
    ."<table width=\"100%\" border=\"0\" cellspacing=\"0\" cellpadding=\"4\">\n"
    ."<tr>\n"
    ."<td valign=\"middle\" align=\"left\" width=\"20\"><img src=\"themes/fmII-5x/images/fleche2.gif\" width=\"20\" height=\"20\" alt=\"/\" border=\"0\"></td>\n"
    ."<td valign=\"middle\" align=\"left\" class=\"newstitle\">$title<br></td>\n"
    ."</tr>\n"
    ."</table>\n"
    ."</td>\n"
    ."</tr>\n"
    
    ."<tr>\n"
    ."<td class=\"newstex2\" align=\"left\" valign=\"top\">"._POSTEDBY." ";
    formatAidHeader($aid);
    echo " "._ON." $time $timezone <br><a href=\"search.php?query=&amp;topic=$topic\">Topic: $topictext </a> ($counter "._READS.") $morelink<br><hr noshade align=\"left\" width=\"90\" size=\"1\">\n"
    ."</td></tr>\n"
    
    ."<tr><td class=\"newstexte\" align=\"left\" valign=\"top\">\n";
    FormatStory($thetext, $notes, $aid, $informant);
    echo "</td>\n"
    ."</tr>\n"
    
    ."<tr>\n"
    ."<td class=\"newsline\" width=\"100%\"><img src=\"themes/fmII-5x/images/pix-transparent.gif\" width=\"1\" height=\"10\" alt=\"/\" border=\"0\"></td>\n"
    ."</tr>\n"
    ."</table>\n"
    ."<hr noshade align=\"left\" width=\"95%\">\n\n\n";
}

/************************************************************/
/* Function themearticle                                    */
/************************************************************/

function themearticle ($aid, $informant, $datetime, $title, $thetext, $topic, $topicname, $topicimage, $topictext) {
    global $admin, $sid, $tipath;
    echo  "<table width=\"100%\" border=\"0\" cellspacing=\"0\" cellpadding=\"2\">\n"
    ."<tr>\n"
    ."<td>\n"
    ."<table width=\"100%\" border=\"0\" cellspacing=\"0\" cellpadding=\"4\">\n"
    ."<tr>\n"
    ."<td valign=\"middle\" align=\"left\" width=\"20\"><img src=\"themes/fmII-5x/images/fleche2.gif\" width=\"20\" height=\"20\" alt=\"/\" border=\"0\"></td>\n"
    ."<td valign=\"middle\" align=\"left\" class=\"newstitle\">$title</td>\n"
    ."</tr>\n"
    ."</table>\n"
    ."</td>\n"
    ."</tr>\n"
    ."<tr>\n"
    ."<td class=\"newstexte\" align=\"left\" valign=\"top\"><a href=\"search.php?query=&amp;topic=$topic\"><img src=\"$tipath$topicimage\" border=\"0\" Alt=\"$topictext\" align=\"right\" hspace=\"5\" vspace=\"5\"></a>\n";
    FormatStory($thetext, $notes, $aid, $informant);
    echo "</td>\n"
    ."</tr>\n"
    ."<tr>\n"
    ."<td class=\"newstexte\" align=\"left\" valign=\"top\">"._POSTEDON." $datetime "._BY." ";
    formatAidHeader($aid);
    if (is_admin($admin)) {
    echo "<br>[ <a href=\"admin.php?op=EditStory&amp;sid=$sid\">"._EDIT."</a> | <a href=\"admin.php?op=RemoveStory&amp;sid=$sid\">"._DELETE."</a> ]\n";
}
     echo "</td>\n"
    ."</tr>\n"
    ."<tr>\n"
    ."<td class=\"newsline\" width=\"100%\"><img src=\"themes/fmII-5x/images/pix-transparent.gif\" width=\"1\" height=\"10\" alt=\"/\" border=\"0\"></td>\n"
    ."</tr>\n"
    ."</table>\n"
    ."<br>\n\n\n";
}

/************************************************************/
/* Function themesidebox                                    */
/************************************************************/

function themesidebox($title, $content) {
    echo "<br><table width=\"160\" border=\"0\" cellspacing=\"0\" cellpadding=\"3\">\n"
    ."<tr>\n"
    ."<td>\n"
    ."<table width=\"160\" border=\"0\" cellspacing=\"0\" cellpadding=\"0\">\n"
    ."<tr>\n"
    ."<td width=\"20\"><img src=\"themes/fmII-5x/images/fleche2.gif\" width=\"20\" height=\"20\" alt=\"/\" border=\"0\"></td>\n"
    ."<td class=\"boxtitle\">&nbsp;$title&nbsp;</td>\n"
    ."</tr>\n"
    ."</table>\n"
    ."</td>\n"
    ."</tr>\n"
    ."<tr>\n"
    ."<td class=\"boxtexte\">$content</td>\n"
    ."</tr>\n"
   ."</table>\n\n\n";
}

?>

