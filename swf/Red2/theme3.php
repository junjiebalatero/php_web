<?php
/************************************************************/
/* Theme Colors Definition                                  */
/************************************************************/
global $bgcolor1, $bgcolor2, $bgcolor3, $bgcolor4, $bgcolor5, $bgcolor6, $bgcolor7, $textcolor1, $textcolor2, $textcolor3, $textcolor4;
$thename = "Red2";
$bgcolor1 = "#FFFFFF";
$bgcolor2 = "#FFCC66";
$bgcolor3 = "#EFEFEF";
$bgcolor4 = "#CC9933";
$bgcolor5 = "#AE0000";
$bgcolor6 = "#FFCCCC";
$bgcolor7 = "#CCCCCC";
$textcolor1 = "#000000";
$textcolor2 = "#000000";
$textcolor3 = "#FFFFFF";
$textcolor4 = "#FFFF00";
//************************************************************************************************
// code to put who's online info in the top of the page instead of the sidebox
// adapted by slapd.net and re adapted ;) by kodred from online() in /mainfile.php
// not fully optimized or pretty, but functional. If you modify it, please send changes
// to john@slapd.net & kodred@babylone6tem.com so we can incorporate them into the code :)
//
// NOTE: This has only been tested on English sites, so some of this may need to be tweaked for
// other translations. If you do this ***PLEASE*** let us know what you did
//************************************************************************************************
function onlineHead() {
    global $user, $cookie;
    cookiedecode($user);
    $ip = getenv("REMOTE_ADDR");
    $username = $cookie[1];
    if (!isset($username)) {
        $username = "$ip";
        $guest = 1;
    }
    $past = time()-10;
    mysql_query("DELETE FROM nuke_session WHERE time < $past");
    $result = mysql_query("SELECT time FROM nuke_session WHERE username='$username'");
    $ctime = time();
    if ($row = mysql_fetch_array($result)) {
    mysql_query("UPDATE nuke_session SET username='$username', time='$ctime', host_addr='$ip', guest='$guest' WHERE username='$username'");
    } else {
    mysql_query("INSERT INTO nuke_session (username, time, host_addr, guest) VALUES ('$username', '$ctime', '$ip', '$guest')");
    }

    $result = mysql_query("SELECT username FROM nuke_session where guest=1");
    $guest_online_num = mysql_num_rows($result);
    $result = mysql_query("SELECT username FROM nuke_session where guest=0");
    $member_online_num = mysql_num_rows($result);
    $total_messages = mysql_num_rows(mysql_query("SELECT msg_id FROM nuke_priv_msgs WHERE to_userid = '$cookie[0]'"));
    $new_messages = mysql_num_rows(mysql_query("SELECT msg_id FROM nuke_priv_msgs WHERE to_userid = '$cookie[0]' AND read_msg='0'"));
    $who_online_num = $guest_online_num + $member_online_num;
        if ($member_online_num != 0){
                $memTag .= ""._MEMBERS.": ";
    }
    $who_online = "$guest_online_num "._GUESTS." $member_online_num "._MEMBERS."<br>$memTag";
    $title = ""._WHOSONLINE."";
    $content = "$who_online";

    if ($member_online_num > 2 ) {
        $result = mysql_query("SELECT username FROM nuke_session WHERE guest='0' LIMIT 4");
        while(list($memusername) = mysql_fetch_row($result)) {
            $content .="<a href=\"/user.php?op=userinfo&uname=$memusername\">$memusername</a>, ";
         }

    $content .="<a href=/members.php>"._READMORE."</a><br>";
    }
    elseif ($member_online_num != 0) {
        $first=0;
        $result = mysql_query("SELECT username FROM nuke_session WHERE guest='0'");
        while(list($memusername) = mysql_fetch_row($result)) {
        if ($first!=0) {
        $content .=", "; }
            $content .="<a href=\"/user.php?op=userinfo&uname=$memusername\">$memusername</a>";
         $first= 1;
        }
    }
        echo $content;
}
###########################################################################################
function OpenTable() {
global $bgcolor1, $bgcolor2, $bgcolor3, $bgcolor4, $bgcolor5, $bgcolor6, $bgcolor7, $textcolor1, $textcolor2, $textcolor3, $textcolor4;
    echo "<table border=\"0\" cellpadding=\"2\" cellspacing=\"0\" width=\"100%\" bgcolor=\"$bgcolor5\"><tr><td>\n";
    echo "<table border=\"0\" cellpadding=\"2\" cellspacing=\"0\" width=\"100%\" bgcolor=\"$bgcolor1\"><tr><td>\n";
}

function CloseTable() {
    echo "</td></tr></table></td></tr></table>\n";
}

function OpenTable2() {
global $bgcolor1, $bgcolor2, $bgcolor3, $bgcolor4, $bgcolor5, $bgcolor6, $bgcolor7, $textcolor1, $textcolor2, $textcolor3, $textcolor4;
    echo "<table border=\"0\" cellpadding=\"2\" cellspacing=\"0\" bgcolor=\"$bgcolor5\" align=\"center\"><tr><td>\n";
    echo "<table border=\"0\" cellpadding=\"2\" cellspacing=\"0\" bgcolor=\"$bgcolor1\" align=\"center\"><tr><td>\n";
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
        echo "<font size=\"2\">$thetext<br>$notes</font>\n";
    } else {
        if($informant != "") {
            $boxstuff = "<a href=\"/user.php?op=userinfo&amp;uname=$informant\">$informant</a> ";
        } else {
            $boxstuff = "$anonymous ";
        }
        $boxstuff .= ""._WRITES." \"$thetext\" <br>$notes\n";
        echo "<font size=\"2\">$boxstuff</font>\n";
    }
}

/************************************************************/
/* Function themeheader()                                   */
/************************************************************/

function themeheader() {
    global $user, $username, $banners, $sitename, $slogan, $cookie, $prefix;
global $bgcolor1, $bgcolor2, $bgcolor3, $bgcolor4, $bgcolor5, $bgcolor6, $bgcolor7, $textcolor1, $textcolor2, $textcolor3, $textcolor4;
    cookiedecode($user);
    $username = $cookie[1];
    if ($username == "") {
        $username = "Anonymous";
    }
    echo "<body text=\"#000000\" link=\"#000000\" vlink=\"#000000\" alink=\"#000000\" topmargin=\"0\" leftmargin=\"0\" marginwidth=\"0\" marginheight=\"0\">\n"
          ."<table border=\"0\" cellpadding=\"2\" cellspacing=\"0\" width=\"100%\" bgcolor=\"$bgcolor5\">\n"
          ."<tr><td align=\"left\" valign=\"top\"><font size=\"6\" color=\"$textcolor3\"><b>$sitename</b></font><br><font size=\"3\" color=\"$textcolor3\"><b>$slogan</b></font></td>\n"
          ."<td align=\"right\"><a href=\"/index.php\"><img src=\"/themes/Red2/images/logo.gif\" alt=\""._WELCOMETO." $sitename\" border=\"0\"></a></td></tr>\n"
          ."</table>\n"

          ."<table border=\"0\" cellpadding=\"2\" cellspacing=\"0\" width=\"100%\" bgcolor=\"$bgcolor3\">\n"
          ."<tr><td width=\"65%\" valign=\"top\" align=\"left\"><font size=\"2\">\n";
          onlineHead();
          echo "</font><br></td></tr>\n"
          ."</table>\n"

          ."<table border=\"0\" cellpadding=\"2\" cellspacing=\"0\" width=\"100%\" bgcolor=\"$bgcolor3\">\n"
          ."<tr><td valign=\"middle\" align=\"left\" width=\"50%\"><font size=\"2\">\n";
    if ($username == "Anonymous") {
      echo ""._RCREATEACCOUNT."\n";
    } else {
      echo ""._HELLO." $username: <a href=\"/user.php\">"._OPTIONS."</a> | <a href=\"/user.php?op=logout\">"._LOGOUT."</a>";
    }
    echo  "</font></td>\n"
          ."<td valign=\"middle\" align=\"right\"><font size=\"2\">\n"
          ."<script type=\"text/javascript\">\n\n"
          ."<!--   // Array ofmonth Names\n"
          ."var monthNames = new Array( \""._JAN."\",\""._FEB."\",\""._MAR."\",\""._APR."\",\""._MAY."\",\""._JUN."\",\""._JUL."\",\""._AUG."\",\""._SEP."\",\""._OCT."\",\""._NOV."\",\""._DEC."\");\n"
          ."var now = new Date();\n"
          ."thisYear = now.getYear();\n"
          ."if(thisYear < 1900) {thisYear += 1900}; // corrections if Y2K display problem\n"
          ."document.write(monthNames[now.getMonth()] + \" \" + now.getDate() + \", \" + thisYear);\n"
          ."// -->\n\n"
          ."</script></font></td></tr>\n"
          ."</table>\n"

          ."<table border=\"0\" cellpadding=\"2\" cellspacing=\"0\" width=\"100%\" bgcolor=\"$bgcolor1\">\n"
          ."<tr>";
    if ($index == 1) {
          echo "<td align=\"center\" valign=\"top\" width=\"155\">\n"
          ."<table border=\"0\" cellpadding=\"2\" cellspacing=\"0\" width=\"100%\"><tr><td align=\"center\" valign=\"top\">\n";
          blocks(left);
    echo  "</td></tr></table></td>\n";
    }
          echo "<td align=\"center\" valign=\"top\" width=\"100%\">\n"
          ."<table border=\"0\" cellpadding=\"2\" cellspacing=\"0\" width=\"100%\" bgcolor=\"#FFFFFF\">\n"
          ."<tr><td align=\"center\" valign=\"top\">\n";
}

/************************************************************/
/* Function themefooter()                                   */
/************************************************************/

function themefooter() {
    global $index, $banners;
global $bgcolor1, $bgcolor2, $bgcolor3, $bgcolor4, $bgcolor5, $bgcolor6, $bgcolor7, $textcolor1, $textcolor2, $textcolor3, $textcolor4;

    echo "</td></tr></table>\n"
        ."</td>\n"
        ."<td align=\"center\" valign=\"top\">\n"
        ."<table border=\"0\" cellpadding=\"2\" cellspacing=\"0\" width=\"100%\"><tr><td align=\"center\" valign=\"top\">\n";
        blocks(right);
    echo "</td></tr></table></td></tr></table>\n"
        ."<table border=\"0\" cellpadding=\"2\" cellspacing=\"0\" width=\"100%\" bgcolor=\"$bgcolor6\">\n"
        ."<tr><td align=\"center\"><font size=\"2\">&nbsp;\n</font>\n"
        ."</td></tr></table>\n"
        ."<table border=\"0\" cellpadding=\"2\" cellspacing=\"0\" width=\"100%\" bgcolor=\"$bgcolor3\">\n"
        ."<tr><td align=\"center\" valign=\"middle\"><font size=\"1\">\n";
        footmsg();
    echo "</font>\n"
        ."</td></tr></table>\n";
if ($banners) {
    echo "<table border=\"0\" cellpadding=\"2\" cellspacing=\"0\" width=\"100%\" bgcolor=\"$bgcolor5\">\n"
         ."<tr><td align=\"center\" valign=\"middle\">\n";
    include("banners.php");
    echo "</td></tr></table>\n";
}

}

/************************************************************/
/* themeindex                                               */
/************************************************************/

function themeindex ($aid, $informant, $time, $title, $counter, $topic, $thetext, $notes, $morelink, $topicname, $topicimage, $topictext) {
    global $anonymous, $tipath;
global $bgcolor1, $bgcolor2, $bgcolor3, $bgcolor4, $bgcolor5, $bgcolor6, $bgcolor7, $textcolor1, $textcolor2, $textcolor3, $textcolor4;
     echo "<table border=\"0\" cellpadding=\"2\" cellspacing=\"0\" width=\"100%\" bgcolor=\"$bgcolor5\">\n"
          ."<tr><td align=\"center\" valign=\"middle\">\n"
          ."<table border=\"0\" cellpadding=\"2\" cellspacing=\"0\" width=\"100%\">\n"
          ."<tr><td bgcolor=\"$bgcolor3\"><font color=\"$bgcolor5\" size=\"2\"><b><u>$title</u></b></font><br>\n"
          ."<font size=\"1\">"._POSTEDBY." ";
    formatAidHeader($aid);
    echo  " "._ON." $time ($counter "._READS.")<br></font></td></tr>\n"
          ."<tr><td bgcolor=\"$bgcolor1\"><font size=\"2\"><a href=\"/search.php?query=&amp;topic=$topic\"><img src=\"/$tipath$topicimage\" border=\"0\" Alt=\"$topictext\" align=\"right\" hspace=\"10\" vspace=\"10\"></a>\n";
    FormatStory($thetext, $notes, $aid, $informant);
    echo  "</font></td></tr>\n"
          ."<tr><td bgcolor=\"$bgcolor6\"><font size=\"2\">$morelink</font></td></tr>\n"
          ."</table>\n"
          ."</td></tr></table>\n"
          ."<br>\n";
}

/************************************************************/
/* themearticle                                             */
/************************************************************/

function themearticle ($aid, $informant, $datetime, $title, $thetext, $topic, $topicname, $topicimage, $topictext) {
    global $admin, $sid, $tipath;
global $bgcolor1, $bgcolor2, $bgcolor3, $bgcolor4, $bgcolor5, $bgcolor6, $bgcolor7, $textcolor1, $textcolor2, $textcolor3, $textcolor4;
    echo  "<table border=\"0\" cellpadding=\"2\" cellspacing=\"0\" width=\"100%\" bgcolor=\"$bgcolor5\">\n"
          ."<tr><td align=\"center\" valign=\"middle\">\n"
          ."<table border=\"0\" cellpadding=\"2\" cellspacing=\"0\" width=\"100%\">\n"
          ."<tr><td bgcolor=\"$bgcolor3\"><font color=\"$bgcolor5\" size=\"2\"><b><u>$title</u></b></font><br>\n"
          ."<font size=\"1\">"._POSTEDON." $datetime "._BY." ";
    formatAidHeader($aid);
    if (is_admin($admin)) {
    echo  "<br>[ <a href=\"/admin.php?op=EditStory&amp;sid=$sid\">"._EDIT."</a> | <a href=\"/admin.php?op=RemoveStory&amp;sid=$sid\">"._DELETE."</a> ]\n";
}
    echo  "<br></font></td>\n"
          ."</tr>\n"
          ."<tr><td bgcolor=\"$bgcolor1\"><font size=\"2\"><a href=\"/search.php?query=&amp;topic=$topic\"><img src=\"/$tipath$topicimage\" border=\"0\" Alt=\"$topictext\" align=\"right\" hspace=\"10\" vspace=\"10\"></a>\n";
    FormatStory($thetext, $notes, $aid, $informant);
    echo  "</font></td></tr></table>\n"
          ."</td></tr></table>\n"
          ."<br>\n\n\n";
}

/************************************************************/
/* themesidebox                                             */
/************************************************************/

function themesidebox($title, $content) {
global $bgcolor1, $bgcolor2, $bgcolor3, $bgcolor4, $bgcolor5, $bgcolor6, $bgcolor7, $textcolor1, $textcolor2, $textcolor3, $textcolor4;
    echo  "<table border=\"0\" cellpadding=\"2\" cellspacing=\"0\" width=\"155\" bgcolor=\"$bgcolor5\">\n"
          ."<tr><td align=\"center\"><font size=\"2\" color=\"$textcolor3\"><b>$title</b></font></td></tr>\n"
          ."<tr><td>\n"
          ."<table border=\"0\" cellpadding=\"2\" cellspacing=\"0\" width=\"100%\" bgcolor=\"$bgcolor3\">\n"
          ."<tr><td><font size=\"2\">";
	if (file_exists($content)) { 
    $fp = fopen ($content, "r"); 
    $content = fread($fp, filesize($content)); 
    fclose ($fp); 
    $content = "?>$content<?"; 
    echo eval($content); 
} else { 
    echo $content; 
} 
    echo "</font></td></tr></table>\n"
          ."</td></tr></table>\n"
          ."<br>\n\n\n";
}

?>
