<?php

/************************************************************/
/* Theme Colors Definition                                  */
/*                                                          */
/* Control the header for your site. You need to define the */
/* BODY tag and in some part of the code call the blocks    */
/* function for left side with: blocks(left);               */
/************************************************************/

if (isset($newlang)) {
    $language = $newlang;
} elseif (isset($lang)) {
    $language = $lang;
}

global $bgcolor1, $bgcolor2, $bgcolor3, $bgcolor4, $bgcolor5, $textcolor1, $textcolor2, $textcolor3, $thename;
$thename = "XBlue";
$bgcolor1   = "#E6F2FF";
$bgcolor2   = "#336699";
$bgcolor3   = "#C2D7EB";
$bgcolor4   = "#EEEEEE";
$bgcolor5   = "#FFFFFF";
$textcolor1 = "#FFFFFF";
$textcolor2 = "#cccccc";
$textcolor3 = "#F8ECD0";

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
                $memTag .= ""._WHOSONLINE.": ";
    }

    $who_online = ""._CURRENTLY." $guest_online_num "._GUESTS." $member_online_num "._MEMBERS."<br>$memTag";

    $title = ""._WHOSONLINE."";
    $content = "$who_online";

    if ($member_online_num > 2 ) {
        $result = mysql_query("SELECT username FROM nuke_session WHERE guest='0' LIMIT 4");
        while(list($memusername) = mysql_fetch_row($result)) {
            $content .="<a href=\"user.php?op=userinfo&uname=$memusername\">$memusername</a>, ";
         }

    $content .="<a href=\"members.php\">"._MORE."</a><br>";
    }
    elseif ($member_online_num != 0) {
        $first=0;
        $result = mysql_query("SELECT username FROM nuke_session WHERE guest='0'");
        while(list($memusername) = mysql_fetch_row($result)) {
        if ($first!=0) {
        $content .=", "; }
            $content .="<a href=\"user.php?op=userinfo&uname=$memusername\">$memusername</a>";
         $first= 1;
        }
    }
        echo $content;
}
###########################################################################################
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
        echo "$thetext<br>$notes\n";
    } else {
        if($informant != "") {
            $boxstuff = "<a href=\"user.php?op=userinfo&amp;uname=$informant\">$informant</a> ";
        } else {
            $boxstuff = "$anonymous ";
        }
        $boxstuff .= ""._WRITES." <i>\"$thetext\"</i> $notes\n";
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
    global $startdate, $prefix, $thename, $bgcolor5, $user, $banners, $sitename, $slogan, $cookie;
    cookiedecode($user);
    $username = $cookie[1];
    if ($username == "") {
        $username = "Anonymous";
    }
    echo "<body topmargin=\"2\" leftmargin=\"0\" marginwidth=\"0\" marginheight=\"0\" bgcolor=\"#FFFFFF\" text=\"#000000\" link=\"#000000\" vlink=\"#000000\" alink=\"#000000\">\n";
         if ($banners) {
             include("banners.php");
         }
    echo "<center>\n"
        ."<table border=\"0\" cellpadding=\"0\" cellspacing=\"0\" width=\"95%\">\n"
        ."  <tr>\n"
        ."    <td width=\"4\"><img border=\"0\" src=\"themes/$thename/images/toplefti.gif\" width=\"4\" height=\"4\"></td>\n"
        ."    <td background=\"themes/$thename/images/topi.gif\" colspan=\"2\"><img border=\"0\" src=\"themes/$thename/images/topi.gif\" width=\"152\" height=\"4\"></td>\n"
        ."    <td width=\"4\"><img border=\"0\" src=\"themes/$thename/images/toprighti.gif\" width=\"4\" height=\"4\"></td>\n"
        ."</tr>\n<tr>\n"
        ."  <td background=\"themes/$thename/images/midlefti.gif\" width=\"4\"><img border=\"0\" src=\"themes/$thename/images/midlefti.gif\" width=\"4\" height=\"30\"></td>\n"
        ."  <td class=\"blockitem\"><img border=\"0\" src=\"themes/$thename/images/logo.gif\"></td>\n"
        ."  <td class=\"blockitem\" align=\"center\" valign=\"top\">";
        $numrows = mysql_num_rows(mysql_query("select uid from $prefix"._users.""));
    echo ""._WEHAVE." $numrows "._REGSOFAR."<br>\n";
          onlineHead();
    echo " <td background=\"themes/$thename/images/midrighti.gif\" width=\"4\"><img border=\"0\" src=\"themes/$thename/images/midrighti.gif\" width=\"4\" height=\"30\"></td>\n"
        ."</tr>\n<tr>\n"
        ."  <td width=\"4\"><img border=\"0\" src=\"themes/$thename/images/botlefti.gif\" width=\"4\" height=\"4\"></td>\n"
        ."  <td background=\"themes/$thename/images/boti.gif\" colspan=\"2\"><img border=\"0\" src=\"themes/$thename/images/boti.gif\" width=\"152\" height=\"4\"></td>\n"
        ."  <td width=\"4\"><img border=\"0\" src=\"themes/$thename/images/botrighti.gif\" width=\"4\" height=\"4\"></td>\n"
        ."</tr>\n"
        ."</table>\n</center>\n"
        ."<table width=\"95%\" cellpadding=\"0\" cellspacing=\"0\" border=\"0\" bgcolor=\"$bgcolor5\" align=\"center\"><tr valign=top>\n"
        ."<td bgcolor=\"$bgcolor5\"><img src=\"themes/$thename/images/pixel.gif\" width=\"1\" height=\"10\" border=\"0\"></td></tr></table>\n"
        ."<center>\n<table border=\"0\" cellpadding=\"0\" cellspacing=\"0\" width=\"95%\">\n"
        ."    <tr>\n"
        ."      <td width=\"20\"><img border=\"0\" src=\"themes/$thename/images/toplefta.gif\" width=\"20\" height=\"4\"></td>\n"
        ."      <td background=\"themes/$thename/images/top.gif\"><img border=\"0\" src=\"themes/$thename/images/top.gif\" width=\"136\" height=\"4\"></td>\n"
        ."      <td background=\"themes/$thename/images/top.gif\"><img border=\"0\" src=\"themes/$thename/images/top.gif\" width=\"136\" height=\"4\"></td>\n"
        ."      <td background=\"themes/$thename/images/top.gif\"><img border=\"0\" src=\"themes/$thename/images/top.gif\" width=\"136\" height=\"4\"></td>\n"
        ."      <td width=\"20\"><img border=\"0\" src=\"themes/$thename/images/toprighta.gif\" width=\"20\" height=\"4\"></td>\n"
        ."    </tr>\n"
        ."    <tr>\n"
        ."      <td background=\"themes/$thename/images/midlefta.gif\" width=\"20\"><img border=\"0\" src=\"themes/$thename/images/midlefta.gif\" width=\"20\" height=\"14\"></td>\n"
        ."      <td align=\"left\" class=\"boxtitle\"><b>\n";
    if ($username == "Anonymous") {
      echo "&nbsp;&nbsp;<a href=\"user.php\" class=\"header\">"._LOGINCREATE."</a>\n";
    } else {
      echo "&nbsp;&nbsp;"._HELLO." $username: <a href=\"user.php\" class=\"header\">"._ACCOUNT."</a> | <a href=\"user.php?op=logout\" class=\"header\">"._LOGOUT."</a>";
    }
    echo "</b></td>\n"
        ." <td align=\"center\" class=\"boxtitle\"><b>\n";
$result = mysql_query("select type, var, count from $prefix"._counter." order by type desc");
while(list($type, $var, $count) = mysql_fetch_row($result)) {
	if(($type == "total") && ($var == "hits")) {
		$total = $count;
    echo  ""._WERECEIVED." $total "._PAGESVIEWS." $startdate\n";
	}
	}
    echo "</b></td>\n"
        ."<td align=\"right\" class=\"boxtitle\"><b>\n"
        ."<script language=JavaScript>\n"
        ."<!--   // Array ofmonth Names\n"
          ."var monthNames = new Array( \""._JAN."\",\""._FEB."\",\""._MAR."\",\""._APR."\",\""._MAY."\",\""._JUN."\",\""._JUL."\",\""._AUG."\",\""._SEP."\",\""._OCT."\",\""._NOV."\",\""._DEC."\");\n"
        ."var now = new Date();\n"
        ."thisYear = now.getYear();\n"
        ."if(thisYear < 1900) {thisYear += 1900}; // corrections if Y2K display problem\n"
        ."document.write(monthNames[now.getMonth()] + \" \" + now.getDate() + \", \" + thisYear);\n"
        ."// -->\n"
        ."</script>&nbsp;&nbsp;</b></td>\n"
        ."<td background=\"themes/$thename/images/midrighta.gif\" width=\"20\"><img border=\"0\" src=\"themes/$thename/images/midrighta.gif\" width=\"20\" height=\"14\"></td>\n"
        ."</tr>\n"
        ."<tr>\n"
        ."  <td width=\"20\"><img border=\"0\" src=\"themes/$thename/images/botlefta.gif\" width=\"20\" height=\"4\"></td>\n"
        ."  <td background=\"themes/$thename/images/bot.gif\"><img border=\"0\" src=\"themes/$thename/images/bot.gif\" width=\"136\" height=\"4\"></td>\n"
        ."  <td background=\"themes/$thename/images/bot.gif\"><img border=\"0\" src=\"themes/$thename/images/bot.gif\" width=\"136\" height=\"4\"></td>\n"
        ."  <td background=\"themes/$thename/images/bot.gif\"><img border=\"0\" src=\"themes/$thename/images/bot.gif\" width=\"136\" height=\"4\"></td>\n"
        ."  <td width=\"20\"><img border=\"0\" src=\"themes/$thename/images/botrighta.gif\" width=\"20\" height=\"4\"></td>\n"
        ."</tr>\n"
        ."</table>\n"
        ."</center>\n"
        ."<!-- END HEADER -->\n"
        ."<table width=\"95%\" cellpadding=\"0\" cellspacing=\"0\" border=\"0\" bgcolor=\"$bgcolor5\" align=\"center\"><tr valign=top>\n"
        ."<td bgcolor=\"$bgcolor5\"><img src=\"themes/$thename/images/pixel.gif\" width=\"1\" height=\"10\" border=\"0\"></td></tr></table>\n"
        ."<table width=\"95%\" cellpadding=\"0\" cellspacing=\"0\" border=\"0\" bgcolor=\"$bgcolor5\" align=\"center\"><tr valign=top>\n"
        ."<td bgcolor=\"$bgcolor5\" width=\"160\" valign=\"top\">\n";
         blocks(left);
    echo "</td><td><img src=themes/$thename/images/pixel.gif width=15 height=1 border=0></td><td width=100%>\n";

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
global $thename, $index;
    echo "</td><td><img src=themes/$thename/images/pixel.gif width=15 height=1 border=0></td><td align=\"right\" valign=\"top\" bgcolor=\"$bgcolor5\">";
         blocks(right);
    echo "</td>";
    echo "</td></tr></table></td></tr></table>"
        ."<table width=\"95%\" cellpadding=\"0\" cellspacing=\"0\" border=\"0\" bgcolor=\"$bgcolor5\" align=\"center\"><tr valign=top>\n"
        ."<td bgcolor=\"$bgcolor5\"><img src=\"themes/$thename/images/pixel.gif\" width=\"1\" height=\"10\" border=\"0\"></td></tr></table>\n"
        ."<center>"
        ."<table border=\"0\" cellpadding=\"0\" cellspacing=\"0\" width=\"95%\">"
        ."  <tr>"
        ."    <td width=\"20\"><img border=\"0\" src=\"themes/$thename/images/toplefta.gif\" width=\"20\" height=\"4\"></td>"
        ."    <td background=\"themes/$thename/images/top.gif\"><img border=\"0\" src=\"themes/$thename/images/top.gif\" width=\"136\" height=\"4\"></td>"
        ."    <td width=\"4\"><img border=\"0\" src=\"themes/$thename/images/toprighta.gif\" width=\"20\" height=\"4\"></td>"
        ."  </tr>"
        ."  <tr>"
        ."    <td background=\"themes/$thename/images/midlefta.gif\" width=\"20\"><img border=\"0\" src=\"themes/$thename/images/midlefta.gif\" width=\"20\" height=\"14\"></td>"
        ."    <td align=\"center\" class=\"boxtitle\">&nbsp;</td>"
        ."    <td background=\"themes/$thename/images/midrighta.gif\" width=\"4\"><img border=\"0\" src=\"themes/$thename/images/midrighta.gif\" width=\"20\" height=\"14\"></td>"
        ."  </tr>"
        ."  <tr>"
        ."    <td width=\"20\"><img border=\"0\" src=\"themes/$thename/images/botlefta.gif\" width=\"20\" height=\"4\"></td>"
        ."    <td background=\"themes/$thename/images/bot.gif\"><img border=\"0\" src=\"themes/$thename/images/bot.gif\" width=\"136\" height=\"4\"></td>"
        ."    <td width=\"4\"><img border=\"0\" src=\"themes/$thename/images/botrighta.gif\" width=\"20\" height=\"4\"></td>"
        ."  </tr>"
        ."</table>"
        ."</center>"
        ."<table width=\"95%\" cellpadding=\"0\" cellspacing=\"0\" border=\"0\" bgcolor=\"$bgcolor5\" align=\"center\"><tr valign=top>\n"
        ."<td bgcolor=\"$bgcolor5\"><img src=\"themes/$thename/images/pixel.gif\" width=\"1\" height=\"10\" border=\"0\"></td></tr></table>\n"
        ."<center><table border=\"0\" cellpadding=\"0\" cellspacing=\"0\" width=\"95%\">\n"

        ."  <tr>\n"
        ."    <td width=\"4\"><img border=\"0\" src=\"themes/$thename/images/toplefti.gif\" width=\"4\" height=\"4\"></td>\n"
        ."    <td background=\"themes/$thename/images/topi.gif\"><img border=\"0\" src=\"themes/$thename/images/topi.gif\" width=\"152\" height=\"4\"></td>\n"
        ."    <td width=\"4\"><img border=\"0\" src=\"themes/$thename/images/toprighti.gif\" width=\"4\" height=\"4\"></td>\n"
        ."</tr>\n"

        ."<tr>\n"
        ."  <td background=\"themes/$thename/images/midlefti.gif\" width=\"4\"><img border=\"0\" src=\"themes/$thename/images/midlefti.gif\" width=\"4\" height=\"30\"></td>\n"
        ."  <td class=\"boxcontent\" align=\"center\">\n";
         footmsg();
    echo "  </td>\n"
        ."  <td background=\"themes/$thename/images/midrighti.gif\" width=\"4\"><img border=\"0\" src=\"themes/$thename/images/midrighti.gif\" width=\"4\" height=\"30\"></td>\n"
        ."</tr>\n"

        ."<tr>\n"
        ."  <td width=\"4\"><img border=\"0\" src=\"themes/$thename/images/botlefti.gif\" width=\"4\" height=\"4\"></td>\n"
        ."  <td background=\"themes/$thename/images/boti.gif\"><img border=\"0\" src=\"themes/$thename/images/boti.gif\" width=\"152\" height=\"4\"></td>\n"
        ."  <td width=\"4\"><img border=\"0\" src=\"themes/$thename/images/botrighti.gif\" width=\"4\" height=\"4\"></td>\n"
        ."</tr>\n"

        ."</table></center>\n";
}

/************************************************************/
/* Function themeindex()                                    */
/*                                                          */
/* Control the header for your site. You need to define the */
/* BODY tag and in some part of the code call the blocks    */
/* function for left side with: blocks(left);               */
/************************************************************/

function themeindex ($aid, $informant, $time, $title, $counter, $topic, $thetext, $notes, $morelink, $topicname, $topicimage, $topictext) {
    global $thename, $anonymous, $tipath, $admin;
    echo "<center>"
        ."<table border=\"0\" cellpadding=\"0\" cellspacing=\"0\" width=\"100%\">"
        ."  <tr>"
        ."    <td width=\"20\"><img border=\"0\" src=\"themes/$thename/images/toplefta.gif\" width=\"20\" height=\"4\"></td>"
        ."    <td background=\"themes/$thename/images/top.gif\"><img border=\"0\" src=\"themes/$thename/images/top.gif\" width=\"100\" height=\"4\"></td>"
        ."    <td width=\"20\"><img border=\"0\" src=\"themes/$thename/images/toprighta.gif\" width=\"20\" height=\"4\"></td>"
        ."  </tr>"
        ."  <tr>"
        ."    <td width=\"20\" background=\"themes/$thename/images/midlefta.gif\"><img border=\"0\" src=\"themes/$thename/images/midlefta.gif\" width=\"20\" height=\"18\"></td>"
        ."    <td class=\"storytitle\"><b>&nbsp;&nbsp;$title</b></td>"
        ."    <td width=\"20\" background=\"themes/$thename/images/midrighta.gif\"><img border=\"0\" src=\"themes/$thename/images/midrighta.gif\" width=\"20\" height=\"18\"></td>"
        ."  </tr>"
        ."  <tr>"
        ."    <td width=\"20\"><img border=\"0\" src=\"themes/$thename/images/botlefta.gif\" width=\"20\" height=\"4\"></td>"
        ."    <td background=\"themes/$thename/images/bot.gif\"><img border=\"0\" src=\"themes/$thename/images/bot.gif\" width=\"100\" height=\"4\"></td>"
        ."    <td width=\"20\"><img border=\"0\" src=\"themes/$thename/images/botrighta.gif\" width=\"20\" height=\"4\"></td>"
        ."  </tr>"
        ."  <tr><td colspan=\"3\"><img border=\"0\" src=\"themes/$thename/images/space.gif\" width=\"2\" height=\"2\"></td></tr>\n"
        ."</table>"
        ."<table border=\"0\" cellpadding=\"0\" cellspacing=\"0\" width=\"100%\">"
        ."<tr>\n"
        ."  <td width=\"4\"><img border=\"0\" src=\"themes/$thename/images/toplefti.gif\" width=\"4\" height=\"4\"></td>\n"
        ."  <td background=\"themes/$thename/images/topi.gif\"><img border=\"0\" src=\"themes/$thename/images/topi.gif\" width=\"152\" height=\"4\"></td>\n"
        ."  <td width=\"4\"><img border=\"0\" src=\"themes/$thename/images/toprighti.gif\" width=\"4\" height=\"4\"></td>\n"
        ."</tr>\n"
        ."  <tr>"
        ."  <td background=\"themes/$thename/images/midlefti.gif\"><img border=\"0\" src=\"themes/$thename/images/midlefti.gif\" width=\"4\" height=\"30\"></td>\n"
        ."    <td class=\"content\">"
        ."    &nbsp;&nbsp;"._POSTEDBY." <b>";
         formatAidHeader($aid);
    echo "</b> "._ON." $time $timezone ($counter "._READS.")<br>";
         if ($aid == $informant) {
            $boxstuff = "$thetext";
         } else {
         if ($informant != "") {
            $boxstuff = "<a href=\"user.php?op=userinfo&uname=$informant\">$informant</a> ";
         } else {
            $boxstuff = "$anonymous ";
         }
            $boxstuff .= ""._WRITES." <i>\"$thetext\"</i> $notes";
         }
    echo "&nbsp;&nbsp;"._TOPIC.": <a href=\"search.php?query=&topic=$topic\">$topictext</a><br><br>"
        ."      <a href=\"search.php?query=&topic=$topic\"><img src=\"$tipath$topicimage\" Alt=\"$topictext\" align=\"right\" border=\"0\"></a>"
        ."      $boxstuff<br><br>"
        ."    </td>"
        ."  <td background=\"themes/$thename/images/midrighti.gif\"><img border=\"0\" src=\"themes/$thename/images/midrighti.gif\" width=\"4\" height=\"30\"></td>\n"
        ."  </tr>"
        ."<tr>\n"
        ."  <td width=\"4\"><img border=\"0\" src=\"themes/$thename/images/botlefti.gif\" width=\"4\" height=\"4\"></td>\n"
        ."  <td background=\"themes/$thename/images/boti.gif\"><img border=\"0\" src=\"themes/$thename/images/boti.gif\" width=\"152\" height=\"4\"></td>\n"
        ."  <td width=\"4\"><img border=\"0\" src=\"themes/$thename/images/botrighti.gif\" width=\"4\" height=\"4\"></td>\n"
        ."</tr>\n"
        ."</table>"
        ."<table border=\"0\" cellpadding=\"0\" cellspacing=\"0\" width=\"100%\">"
        ."  <tr>"
        ."    <td width=\"4\"><img border=\"0\" src=\"themes/$thename/images/space.gif\" width=\"2\" height=\"2\"></td>"
        ."    <td><img border=\"0\" src=\"themes/$thename/images/space.gif\" width=\"2\" height=\"2\"></td>"
        ."    <td width=\"4\"><img border=\"0\" src=\"themes/$thename/images/space.gif\" width=\"2\" height=\"2\"></td>"
        ."  </tr>"
        ."<tr>\n"
        ."  <td width=\"4\"><img border=\"0\" src=\"themes/$thename/images/toplefti.gif\" width=\"4\" height=\"4\"></td>\n"
        ."  <td background=\"themes/$thename/images/topi.gif\"><img border=\"0\" src=\"themes/$thename/images/topi.gif\" width=\"152\" height=\"4\"></td>\n"
        ."  <td width=\"4\"><img border=\"0\" src=\"themes/$thename/images/toprighti.gif\" width=\"4\" height=\"4\"></td>\n"
        ."</tr>\n"
        ."  <tr>"
        ."  <td background=\"themes/$thename/images/midlefti.gif\"><img border=\"0\" src=\"themes/$thename/images/midlefti.gif\" width=\"4\" height=\"30\"></td>\n"
        ."    <td align=\"right\">";
    echo "$morelink&nbsp;&nbsp;</td>"
        ."  <td background=\"themes/$thename/images/midrighti.gif\"><img border=\"0\" src=\"themes/$thename/images/midrighti.gif\" width=\"4\" height=\"30\"></td>\n"
        ."  </tr>"
        ."<tr>\n"
        ."  <td width=\"4\"><img border=\"0\" src=\"themes/$thename/images/botlefti.gif\" width=\"4\" height=\"4\"></td>\n"
        ."  <td background=\"themes/$thename/images/boti.gif\"><img border=\"0\" src=\"themes/$thename/images/boti.gif\" width=\"152\" height=\"4\"></td>\n"
        ."  <td width=\"4\"><img border=\"0\" src=\"themes/$thename/images/botrighti.gif\" width=\"4\" height=\"4\"></td>\n"
        ."</tr>\n"
        ."</table>"
        ."</center><br><br>";

}

/************************************************************/
/* Function themearticle()                                  */
/*                                                          */
/* Control the header for your site. You need to define the */
/* BODY tag and in some part of the code call the blocks    */
/* function for left side with: blocks(left);               */
/************************************************************/

function themearticle ($aid, $informant, $datetime, $title, $thetext, $topic, $topicname, $topicimage, $topictext) {
    global $thename, $bgcolor1, $admin, $sid, $tipath;
    echo "<center>"
        ."<table border=\"0\" cellpadding=\"0\" cellspacing=\"0\" width=\"100%\">"
        ."    <td width=\"20\"><img border=\"0\" src=\"themes/$thename/images/toplefta.gif\" width=\"20\" height=\"4\"></td>"
        ."    <td background=\"themes/$thename/images/top.gif\"><img border=\"0\" src=\"themes/$thename/images/top.gif\" width=\"100\" height=\"4\"></td>"
        ."    <td width=\"20\"><img border=\"0\" src=\"themes/$thename/images/toprighta.gif\" width=\"20\" height=\"4\"></td>"
        ."  </tr>"
        ."  <tr>"
        ."    <td width=\"20\" background=\"themes/$thename/images/midlefta.gif\"><img border=\"0\" src=\"themes/$thename/images/midlefta.gif\" width=\"20\" height=\"18\"></td>"
        ."    <td class=\"storytitle\" bgcolor=\"$bgcolor1\"><b>&nbsp;&nbsp;$title</b></td>"
        ."    <td width=\"20\" background=\"themes/$thename/images/midrighta.gif\"><img border=\"0\" src=\"themes/$thename/images/midrighta.gif\" width=\"20\" height=\"18\"></td>"
        ."  </tr>"
        ."  <tr>"
        ."    <td width=\"20\"><img border=\"0\" src=\"themes/$thename/images/botlefta.gif\" width=\"20\" height=\"4\"></td>"
        ."    <td background=\"themes/$thename/images/bot.gif\"><img border=\"0\" src=\"themes/$thename/images/bot.gif\" width=\"100\" height=\"4\"></td>"
        ."    <td width=\"20\"><img border=\"0\" src=\"themes/$thename/images/botrighta.gif\" width=\"20\" height=\"4\"></td>"
        ."  </tr>"
        ."  <tr><td colspan=\"3\"><img border=\"0\" src=\"themes/$thename/images/space.gif\" width=\"2\" height=\"2\"></td></tr>\n"
        ."</table>"
        ."<table border=\"0\" cellpadding=\"0\" cellspacing=\"0\" width=\"100%\">"
        ."<tr>\n"
        ."  <td width=\"4\"><img border=\"0\" src=\"themes/$thename/images/toplefti.gif\" width=\"4\" height=\"4\"></td>\n"
        ."  <td background=\"themes/$thename/images/topi.gif\"><img border=\"0\" src=\"themes/$thename/images/topi.gif\" width=\"152\" height=\"4\"></td>\n"
        ."  <td width=\"4\"><img border=\"0\" src=\"themes/$thename/images/toprighti.gif\" width=\"4\" height=\"4\"></td>\n"
        ."</tr>\n"
        ."  <tr>"
        ."  <td background=\"themes/$thename/images/midlefti.gif\"><img border=\"0\" src=\"themes/$thename/images/midlefti.gif\" width=\"4\" height=\"30\"></td>\n"
        ."    <td class=\"content\">"
        ."    &nbsp;&nbsp;"._POSTEDON." $datetime";
         if ($admin) {
            echo "&nbsp;&nbsp;[ <a href=\"admin.php?op=EditStory&sid=$sid\">"._EDIT."</a> | <a href=\"admin.php?op=RemoveStory&sid=$sid\">"._DELETE."</a> ]";
         }
    echo "<br>&nbsp;&nbsp;"._TOPIC.": <a href=\"search.php?query=&topic=$topic&author=\">$topictext</a><br><br>";
         if ($aid == $informant) {
            $boxstuff = "$thetext";
         } else {
         if($informant != "") {
            $boxstuff = "<a href=\"user.php?op=userinfo&uname=$informant\">$informant</a> ";
         } else {
            $boxstuff = "$anonymous ";
         }
            $boxstuff .= ""._WRITES." <i>\"$thetext\"</i> $notes";
         }
    echo "    <a href=\"search.php?query=&topic=$topic\"><img src=\"$tipath$topicimage\" Alt=\"$topictext\" align=\"right\" border=\"0\"></a>"
        ."    $boxstuff<br><br>"
        ."    </td>"
        ."    </td>"
        ."  <td background=\"themes/$thename/images/midrighti.gif\"><img border=\"0\" src=\"themes/$thename/images/midrighti.gif\" width=\"4\" height=\"30\"></td>\n"
        ."  </tr>"
        ."<tr>\n"
        ."  <td width=\"4\"><img border=\"0\" src=\"themes/$thename/images/botlefti.gif\" width=\"4\" height=\"4\"></td>\n"
        ."  <td background=\"themes/$thename/images/boti.gif\"><img border=\"0\" src=\"themes/$thename/images/boti.gif\" width=\"152\" height=\"4\"></td>\n"
        ."  <td width=\"4\"><img border=\"0\" src=\"themes/$thename/images/botrighti.gif\" width=\"4\" height=\"4\"></td>\n"
        ."</tr>\n"
        ."  <tr><td colspan=\"3\"><img border=\"0\" src=\"themes/$thename/images/space.gif\" width=\"2\" height=\"2\"></td></tr>\n"
        ."</table>"
        ."</center><br><br>";


}

/************************************************************/
/* Function themesidebox()                                  */
/*                                                          */
/* Control the header for your site. You need to define the */
/* BODY tag and in some part of the code call the blocks    */
/* function for left side with: blocks(left);               */
/************************************************************/

function themesidebox($title, $content) {
    global $thename;
    echo "<table border=\"0\" cellpadding=\"0\" cellspacing=\"0\" width=\"160\">\n"
        ."<tr><td><img border=\"0\" src=\"themes/$thename/images/toplefta.gif\" width=\"20\" height=\"4\"></td>\n"
        ."<td><img border=\"0\" src=\"themes/$thename/images/top.gif\" width=\"136\" height=\"4\"></td>\n"
        ."<td><img border=\"0\" src=\"themes/$thename/images/toprighti.gif\" width=\"4\" height=\"4\"></td></tr>\n"
        ."<tr><td background=\"themes/$thename/images/midlefta.gif\"><img border=\"0\" src=\"themes/$thename/images/midlefta.gif\" width=\"20\" height=\"14\"></td>\n"
        ."<td align=\"center\" class=\"boxtitle\">$title</td>\n"
        ."<td background=\"themes/$thename/images/midright.gif\"><img border=\"0\" src=\"themes/$thename/images/midright.gif\" width=\"4\" height=\"14\"></td></tr>\n"
        ."<tr><td><img border=\"0\" src=\"themes/$thename/images/botlefta.gif\" width=\"20\" height=\"4\"></td>\n"
        ."<td><img border=\"0\" src=\"themes/$thename/images/bot.gif\" width=\"136\" height=\"4\"></td>\n"
        ."<td><img border=\"0\" src=\"themes/$thename/images/botrighti.gif\" width=\"4\" height=\"4\"></td></tr>\n"
        ."</table>\n"
        ."<table border=\"0\" cellpadding=\"0\" cellspacing=\"0\" width=\"160\">\n"
        ."<tr><td colspan=\"3\"><img border=\"0\" src=\"themes/$thename/images/space.gif\" width=\"2\" height=\"2\"></td></tr>\n"
        ."<tr><td><img border=\"0\" src=\"themes/$thename/images/toplefti.gif\" width=\"4\" height=\"4\"></td>\n"
        ."<td background=\"themes/$thename/images/topi.gif\"><img border=\"0\" src=\"themes/$thename/images/topi.gif\" width=\"152\" height=\"4\"></td>\n"
        ."<td><img border=\"0\" src=\"themes/$thename/images/toprighti.gif\" width=\"4\" height=\"4\"></td></tr>\n"
        ."<tr><td background=\"themes/$thename/images/midlefti.gif\"><img border=\"0\" src=\"themes/$thename/images/midlefti.gif\" width=\"4\" height=\"30\"></td>\n"
        ."<td class=\"boxcontent\">";
            if (file_exists($content)) { 
            $fp = fopen ($content, "r"); 
            $content = fread($fp, filesize($content)); 
            fclose ($fp); 
            $content = "?>$content<?"; 
            echo eval($content); 
            } else { 
            echo $content; 
            } 
    echo "</td>\n"
        ."<td background=\"themes/$thename/images/midrighti.gif\"><img border=\"0\" src=\"themes/$thename/images/midrighti.gif\" width=\"4\" height=\"30\"></td></tr>\n"
        ."<tr><td><img border=\"0\" src=\"themes/$thename/images/botlefti.gif\" width=\"4\" height=\"4\"></td>\n"
        ."<td background=\"themes/$thename/images/boti.gif\"><img border=\"0\" src=\"themes/$thename/images/boti.gif\" width=\"152\" height=\"4\"></td>\n"
        ."<td><img border=\"0\" src=\"themes/$thename/images/botrighti.gif\" width=\"4\" height=\"4\"></td></tr>\n"
        ."</table><br>\n";

}

?>