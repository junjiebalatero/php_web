<?php

$bgcolor1 = "#DCE4E8";
$bgcolor2 = "#FF9933";
$bgcolor3 = "#FFEEEE";
$bgcolor4 = "#FF9933";
$textcolor1 = "#FFFFFF";
$textcolor2 = "#000000";

function OpenTable() {
    global $bgcolor1, $bgcolor2;
    echo "<table width=\"100%\" align=center border=\"0\" cellspacing=\"1\" cellpadding=\"0\" ><tr><td>\n";
    echo "<table width=\"100%\" border=\"0\" cellspacing=\"1\" cellpadding=\"2\"><tr><td>\n";
}

function CloseTable() {
    echo "</td></tr></table></td></tr></table>\n";
}

function OpenTable2() {
    global $bgcolor1, $bgcolor2;
    echo "<table border=\"0\" cellspacing=\"1\" cellpadding=\"0\" bgcolor=\"$bgcolor2\" align=\"center\"><tr><td>\n";
    echo "<table border=\"0\" cellspacing=\"1\" cellpadding=\"2\" bgcolor=\"$bgcolor1\"><tr><td>\n";
}

function CloseTable2() {
    echo "</td></tr></table></td></tr></table>\n";
}

function FormatStory($thetext, $notes, $aid, $informant) {
    global $anonymous;
    if ($notes != "") {
        $notes = "<b>"._NOTE."</b> <i>$notes</i>\n";
    } else {
        $notes = "";
    }
    if ("$aid" == "$informant") {
        echo "<font size=\"1\" color=\"#505050\">$thetext<br><br>$notes</font>\n";
    } else {
        if($informant != "") {
            $boxstuff = "<a href=\"user.php?op=userinfo&amp;uname=$informant\">$informant</a> ";
        } else {
            $boxstuff = "$anonymous ";
        }
        $boxstuff .= ""._WRITES." <i>\"$thetext\"</i> $notes\n";
        echo "<font size=\"1\" color=\"#505050\">$boxstuff</font>\n";
    }
}

function themeheader() {
global $user, $sitename, $username, $cookie, $banners;
cookiedecode($user);
$username = $cookie[1];
if ($username == "") {
$username = "Anonymous";
}
    echo "<body bgcolor=\"#FFFFCC\" text=\"#000000\" leftmargin=\"0\" rightmargin=\"0\" topmargin=\"0\" link=\"#FF0000\" vlink=\"#FF0000\" alink=\"#FF0000\">\n"
    ."<table cellspacing=\"0\" cellpadding=\"0\" align=\"center\" width=\"750\" bgcolor=\"#FF9933\" border=\"0\">\n"
    ."<tr>\n"
    ."<td width=\"750\" nowrap bgcolor=\"#FF9933\" valign=\"middle\" align=\"center\" height=\"80\">\n"
    ."<table width=\"740\" cellspacing=\"0\" cellpadding=\"0\" height=\"70\" bgcolor=\"#FFFFCC\">\n"
    ."<tr>\n"
    ."<td rowspan=\"2\" width=\"420\" nowrap valign=\"middle\" align=\"left\"><IMG src=\"themes/K-ompagny/images/logo.gif\" width=\"300\" height=\"60\" alt=\"\"></td>\n"
    ."<td valign=\"bottom\" align=\"right\"><font face=\"Verdana, Arial, Helvetica, sans-serif\" size=\"1\">|<a href=\"index.php\">"._MAIN."</a>|<a href=\"topics.php\">"._TOPICS."</a>|<a href=\"download.php\">"._DOWNLOADS."</a>|<a href=\"submit.php\">"._SUBMITNEWS."</a>|<a href=\"top.php\">"._TOP10."</a>|</font>&nbsp;</td>\n"
    ."</tr>\n"
    ."<tr>\n"
    ."<td align=\"left\" valign=\"top\" width=\"320\" nowrap><IMG src=\"themes/K-ompagny/images/Divider.gif\" width=\"320\" height=\"23\" align=\"top\" alt=\"\"></td>\n"
    ."</tr>\n"
    ."</table>\n"
    ."</td>\n"
    ."</tr>\n"
    ."</table>\n"
    ."<br>\n"
    ."<table width=\"99%\" cellspacing=\"0\" cellpadding=\"0\" align=\"center\">\n"
    ."<tr>\n"
    ."<td height=\"90\" nowrap><IMG src=\"themes/K-ompagny/images/spacer.gif\" width=\"100%\" height=\"1\" alt=\"\"></td>\n"
    ."<td width=\"30\" height=\"90\" nowrap align=\"center\" valign=\"bottom\">\n"
    ."<table width=\"530\" cellspacing=\"0\" cellpadding=\"0\" align=\"center\" height=\"90\">\n"
    ."<tr>\n"
    ."<td width=\"30\" nowrap height=\"90\" background=\"themes/K-ompagny/images/pub-left.gif\"><IMG src=\"themes/K-ompagny/images/spacer.gif\" width=\"30\" height=\"90\" alt=\"\"></td>\n"
    ."<td width=\"470\" nowrap valign=\"top\" height=\"90\">\n"
    ."<table width=\"470\" cellspacing=\"0\" cellpadding=\"0\" height=\"64\">\n"
    ."<tr>\n"
    ."<td width=\"470\" height=\"64\" nowrap bgcolor=\"#FF9933\" align=\"center\" valign=\"middle\">\n"
    ."<table width=\"468\" cellspacing=\"0\" cellpadding=\"0\" align=\"center\" height=\"60\">\n"
    ."<tr>\n"
    ."<td bgcolor=\"#FFFFFF\">\n";
    if ($banners) {
        include("banners.php");
    }
    echo "</td>\n"
    ."</tr>\n"
    ."</table>\n"
    ."</td>\n"
    ."</tr>\n"
    ."</table>\n"
    ."<table width=\"100%\" cellspacing=\"0\" cellpadding=\"0\">\n"
    ."<tr>\n"
    ."<td>\n"
    ."<div align=\"center\"><b><font face=\"Verdana, Arial, Helvetica, sans-serif\" size=\"1\">\n";
    if ($username == "Anonymous") {
        echo "&nbsp;&nbsp;<b><font color=\"#363636\">"._LINKSNOTUSER8."</b>\n";
    } else {
        echo "&nbsp;&nbsp;"._HELLO." $username! <a href=\"user.php\">"._USERLOGIN."</a>.";
    }
    echo "</font></b></div>\n"
    ."</td>\n"
    ."</tr>\n"
    ."</table>\n"
   ." </td>\n"
   ."<td width=\"30\" nowrap height=\"90\" background=\"themes/K-ompagny/images/pub-right.gif\"><IMG src=\"themes/K-ompagny/images/spacer.gif\" width=\"30\" height=\"90\" vspace=\"0\" hspace=\"0\" border=\"0\" alt=\"\"></td>\n"
   ."</tr>\n"
   ."</table>\n"
   ."</td>\n"
   ."<td height=\"90\" nowrap><IMG src=\"themes/K-ompagny/images/spacer.gif\" width=\"100%\" height=\"1\" alt=\"\"></td>\n"
   ."</tr>\n"
   ."</table>"
    ."<table width=\"99%\" cellspacing=\"0\" cellpadding=\"0\" align=\"center\">\n"
    ."<tr align=\"center\" valign=\"top\">\n"
   ."<td colspan=\"3\">\n"
   ."<table width=\"100%\" cellspacing=\"0\" cellpadding=\"0\" align=\"center\">\n"
   ."<tr>\n"
   ."<td width=\"28\" height=\"42\" nowrap background=\"themes/K-ompagny/images/main-corner-left.gif\" align=\"left\"><IMG src=\"themes/K-ompagny/images/spacer.gif\" width=\"28\" height=\"42\" alt=\"\"></td>\n"
   ."<td background=\"themes/K-ompagny/images/main-top.gif\" width=\"100%\" nowrap><IMG src=\"themes/K-ompagny/images/spacer.gif\" width=\"8\" height=\"42\" alt=\"\"></td>\n"
   ."<td width=\"28\" height=\"42\" nowrap background=\"themes/K-ompagny/images/main-corner-top-right.gif\" align=\"left\"><IMG src=\"themes/K-ompagny/images/spacer.gif\" width=\"28\" height=\"42\" alt=\"\"></td>\n"
   ."</tr>\n"
   ."<tr>\n"
   ."<td background=\"themes/K-ompagny/images/main-left.gif\" width=\"28\" nowrap><IMG src=\"themes/K-ompagny/images/spacer.gif\" width=\"28\" height=\"8\" alt=\"\"></td>\n"
   ."<td bgcolor=\"#DCE4E8\" align=\"center\" valign=\"top\" width=\"100%\" nowrap>\n"
   ."<table width=\"100%\" cellspacing=\"0\" cellpadding=\"0\" bgcolor=\"#DCE4E8\" align=\"center\">\n"
   ."<tr>\n"
   ."<td width=\"160\" valign=\"top\" nowrap>\n";
   blocks(left);
   echo "</td>\n"
   ."<td valign=\"top\">\n"
  ."<font face=\"Arial, Helvetica, sans-serif\" size=\"1\">\n";
  }
  function themefooter() {
  global $index;
  if ($index == 1) {
  echo "</font>\n"
  ."</td>\n"
  ."<td width=\"160\" valign=\"top\">\n";
  blocks(right);
  }
  echo "</td>\n"
  ."</tr>\n"
  ."</table>\n"
  ."</td>\n"
  ."<td width=\"28\" height=\"42\" background=\"themes/K-ompagny/images/main-right.gif\" width=\"28\" nowrap align=\"left\"><IMG src=\"themes/K-ompagny/images/spacer.gif\" width=\"28\" height=\"8\" alt=\"\"></td>\n"
  ."</tr>\n"
  ."<tr>\n"
  ."<td width=\"28\" height=\"42\" background=\"themes/K-ompagny/images/main-corner-bottom-left.gif\" nowrap align=\"left\"><IMG src=\"themes/K-ompagny/images/spacer.gif\" width=\"28\" height=\"42\" alt=\"\"></td>\n"
  ."<td background=\"themes/K-ompagny/images/main-bottom.gif\" width=\"100%\"><IMG src=\"themes/K-ompagny/images/spacer.gif\" width=\"8\" height=\"42\" alt=\"\"></td>\n"
  ."<td width=\"28\" height=\"42\" background=\"themes/K-ompagny/images/main-corner-bottom-right.gif\" nowrap align=\"right\"><IMG src=\"themes/K-ompagny/images/spacer.gif\" width=\"28\" height=\"42\" alt=\"\"></td>\n"
  ."</tr>\n"
  ."</table>\n"
  ."</td>\n"
  ."</tr>\n"
  ."</table>\n"
  ."<br>\n"
  ."<table width=\"650\" cellspacing=\"0\" cellpadding=\"0\" align=\"center\">\n"
  ."<tr>\n"
  ."<td align=\"center\" valign=\"middle\" width=\"650\" nowrap><font face=\"Verdana, Arial, Helvetica, sans-serif\" size=\"1\">\n";
  footmsg();
  echo "</font><br><br></td>\n"
  ."</tr>\n"
  ."</table><br>\n\n\n";
}

function themeindex ($aid, $informant, $time, $title, $counter, $topic, $thetext, $notes, $morelink, $topicname, $topicimage, $topictext) {
    global $anonymous, $tipath;
    echo "<table border=\"0\" cellpadding=\"4\" cellspacing=\"0\" width=\"100%\" align=\"center\"><tr><td>\n"
        ."<table border=\"0\" cellpadding=\"1\" cellspacing=\"0\" bgcolor=\"#000000\" width=\"100%\" align=\"center\"><tr><td>\n"
        ."<table border=\"0\" cellpadding=\"3\" cellspacing=\"0\" background=\"themes/K-ompagny/images/back-titre.gif\" width=\"100%\"><tr><td align=\"left\">\n"
        ."<font size=\"2\" color=\"#000000\" class=\"titre\"><b>$title</b></font><br>\n"
         ."<font color=\"#000000\" size=\"1\" class=\"info\">"._POSTEDBY." ";
    formatAidHeader($aid);
    echo " "._ON." $time $timezone ($counter "._READS.")<br></font>\n"
        ."</td></tr></table></td></tr></table>\n"
        ."<font color=\"#999999\"><b><a href=\"search.php?query=&amp;topic=$topic\"><IMG src=\"$tipath$topicimage\" border=\"0\" Alt=\"$topictext\" align=\"right\" hspace=\"10\" vspace=\"10\"></a></B></font><br>\n";
    FormatStory($thetext, $notes, $aid, $informant);
    echo "</td></tr></table>\n"
        ."<table border=\"0\" cellpadding=\"1\" cellspacing=\"0\" width=\"98%\" align=\"center\"><tr><td>\n"
        ."<table border=\"0\" cellpadding=\"3\" cellspacing=\"0\" width=\"98%\" align=\"center\"><tr><td align=\"left\">\n"
        ."<IMG src=\"themes/K-ompagny/images/fleche2.gif\" width=\"9\" height=\"7\" alt=\"\"><font size=\"1\"> $morelink</font>\n"
        ."</td></tr></table></td></tr></table>\n"
        ."<br><br><br>\n\n\n";
}

function themearticle ($aid, $informant, $datetime, $title, $thetext, $topic, $topicname, $topicimage, $topictext) {
    global $admin, $sid, $tipath;
    echo "<table border=\"0\" cellpadding=\"0\" cellspacing=\"0\" width=\"100%\"><tr><td>\n"
        ."<table border=\"0\" cellpadding=\"1\" cellspacing=\"0\" bgcolor=\"#000000\" width=\"100%\"><tr><td>\n"
        ."<table border=\"0\" cellpadding=\"3\" cellspacing=\"0\" background=\"themes/K-ompagny/images/back-titre.gif\" width=\"100%\"><tr><td align=\"left\">\n"
        ."<font size=\"2\" color=\"#000000\" class=\"titre\"><b>$title</b></font><br>\n"
        ."<font size=\"1\" class=\"info\">"._POSTEDON." $datetime "._BY." ";
    formatAidHeader($aid);
    if (is_admin($admin)) {
        echo "<br>[ <a href=\"admin.php?op=EditStory&amp;sid=$sid\">"._EDIT."</a> | <a href=\"admin.php?op=RemoveStory&amp;sid=$sid\">"._DELETE."</a> ]\n";
    }
    echo "</td></tr></table></td></tr></table><br>";
    echo "<a href=\"search.php?query=&amp;topic=$topic\"><IMG src=\"$tipath$topicimage\" border=\"0\" Alt=\"$topictext\" align=\"right\" hspace=\"10\" vspace=\"10\"></a>\n";
    FormatStory($thetext, $notes="", $aid, $informant);
    echo "</td></tr></table><br>\n\n\n";
}

function themesidebox($title, $content) {
    echo "<table width=\"160\" cellspacing=\"0\" cellpadding=\"0\">\n"
    ."<tr>\n"
    ."<td>\n"
    ."<table width=\"160\" cellspacing=\"0\" cellpadding=\"0\">\n"
    ."<tr>\n"
    ."<td width=\"18\" height=\"19\" nowrap valign=\"middle\" align=\"left\"><IMG src=\"themes/K-ompagny/images/fleche1.gif\" width=\"18\" height=\"19\" alt=\"\"></td>\n"
    ."<td valign=\"middle\" align=\"left\" width=\"142\" nowrap><font size=\"1\">&nbsp;<font face=\"Verdana, Arial, Helvetica, sans-serif\" size=\"2\" class=\"titre\">$title</font></font></td>\n"
    ."</tr>\n"
    ."</table>\n"
    ."</td>\n"
    ."</tr>\n"
    ."<tr>\n"
    ."<td height=\"3\" align=\"left\" valign=\"middle\">\n"
    ."</td>\n"
    ."</tr>\n"
    ."<tr>\n"
    ."<td><table width=\"160\" border=\"1\" cellspacing=\"0\" cellpadding=\"3\" bordercolor=\"#FF9933\">\n"
    ."<tr>\n"
    ."<td><font face=\"Verdana, Arial, Helvetica, sans-serif\" size=\"1\" class=\"infobox\">$content</font></td>\n"
    ."</tr>\n"
    ."</table></td>\n"
    ."</tr>\n"
    ."<tr>\n"
    ."<td height=\"3\">\n"
    ."<hr width=\"140\" align=\"center\" noshade size=\"1\">\n"
    ."</td>\n"
    ."</tr>\n"
    ."</table><br>\n\n\n";

}

?>