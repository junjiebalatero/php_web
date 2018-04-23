<?php

$thename = "K-Be";
$bgcolor1 = "#FFFFFF";
$bgcolor2 = "#FF9933";
$bgcolor3 = "#FFFFFF";
$bgcolor4 = "#EEEEEE";
$textcolor1 = "#000000";
$textcolor2 = "#000000";

function OpenTable() {
    global $bgcolor1, $bgcolor2;
    echo "<table width=\"100%\" border=\"0\" cellspacing=\"0\" cellpadding=\"0\" bgcolor=\"$bgcolor2\"><tr><td>\n";
    echo "<table width=\"100%\" border=\"0\" cellspacing=\"0\" cellpadding=\"0\" bgcolor=\"$bgcolor1\"><tr><td>\n";
}

function OpenTable2() {
    global $bgcolor1, $bgcolor2;
    echo "<table border=\"0\" cellspacing=\"0\" cellpadding=\"0\" bgcolor=\"$bgcolor2\" align=\"center\"><tr><td>\n";
    echo "<table border=\"0\" cellspacing=\"0\" cellpadding=\"0\" bgcolor=\"$bgcolor1\"><tr><td>\n";
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
        $notes = "<b>"._NOTE."</b> <i>$notes</i>\n";
    } else {
        $notes = "";
    }
    if ("$aid" == "$informant") {
        echo "<font size=\"1\">$thetext<br>$notes</font>\n";
    } else {
        if($informant != "") {
            $boxstuff = "<font size=\"1\"><a href=\"user.php?op=userinfo&amp;uname=$informant\">$informant</a> </font>";
        } else {
            $boxstuff = "$anonymous ";
        }
        $boxstuff .= ""._WRITES." <i>\"$thetext\"</i> $notes\n";
        echo "<font size=\"1\">$boxstuff</font>\n";
    }
}

function themeheader() {
        global $user, $sitename, $username, $cookie, $slogan, $adminmail;
    cookiedecode($user);
    $username = $cookie[1];
    if ($username == "") {
        $username = "Anonymous";
    }

    echo "<LINK rel=\"StyleSheet\" HREF=\"themes/K-Be/style/style.css\" TYPE=\"text/css\">"
    ."<BODY BGCOLOR=\"0B5882\" TEXT=\"000000\" LINK=\"FF0000\" VLINK=\"FF0000\" ALINK=\"FF0000\">";
    echo "<table width=\"100%\" border=\"0\" cellspacing=\"0\" cellpadding=\"0\">"
    ."<tr>"
    ."<td width=\"20\" height=\"20\" nowrap><img src=\"themes/K-Be/images/corner-left.gif\" width=\"20\" height=\"20\"></td>"
    ."<td colspan=\"2\">"
    ."<table border=\"0\" cellspacing=\"0\" cellpadding=\"0\">"
    ."<tr>"
    ."<td bgcolor=\"#FFCC00\"><font size=\"1\">$username, "._WELCOMETO." $sitename</font></td>"
    ."<td width=\"11\" height=\"20\" nowrap><img src=\"themes/K-Be/images/corner-right.gif\" width=\"11\" height=\"20\"></td>"
    ."</tr>"
    ."</table>"
    ."</td>"
    ."</tr>"
    ."<tr>"
    ."<td rowspan=\"2\" height=\"120\" nowrap background=\"themes/K-Be/images/left.gif\">&nbsp;</td>"
    ."<td background=\"themes/K-Be/images/top.gif\">&nbsp;</td>"
    ."<td width=\"20\" height=\"20\" nowrap><img src=\"themes/K-Be/images/corner-right-top.gif\" width=\"20\" height=\"20\"></td>"
    ."</tr>"
    ."<tr>"
    ."<td bgcolor=\"#FFFFFF\">"
    ."<table width=\"100%\" border=\"0\" cellspacing=\"0\" cellpadding=\"0\" height=\"100\">"
    ."<tr>"
    ."<td rowspan=\"3\"><img src=\"themes/K-Be/title.gif\" width=\"230\" height=\"100\" alt=\""._WELCOMETO." $sitename\"></td>"
    ."<td>&nbsp;</td>"
    ."<td>"
    ."</td>"
    ."<td>"
    ."<div align=\"right\"><form action=\"search.php\" method=\"get\"><font size=\"1\"><b>"._TOPICS." </b></font>\n";
    $toplist = mysql_query("select topicid, topictext from nuke_topics order by topictext");
    echo "<select name=\"topic\"onChange='submit()'>\n"
    ."<option value=\"\">"._ALLTOPICS."</option>\n";
    while(list($topicid, $topics) = mysql_fetch_row($toplist)) {
    if ($topicid==$topic) { $sel = "selected "; }
    echo "<option $sel value=\"$topicid\">$topics</option>\n";
    $sel = "";
    }
    echo "</select></font></form></div>"
    ."</td>"
    ."</tr>"
    ."<tr>"
    ."<td></td>"
    ."<td width=\"468\" height=\"60\" align=center valign=center nowrap>";
    if ($banners) {
    include("banners.php");
    }
    echo "</td>"
    ."<td nowarp align=right valign=center><form action=\"search.php\" method=\"post\">"
    ."<font size=\"1\" color=\"#000000\"><b>"._SEARCH." </b>"
    ."<input type=\"text\" name=\"query\" size=\"10\"></font></form></td>"
    ."</tr>"
    ."<tr>"
    ."<td>&nbsp;</td>"
    ."<td>"
    ."</td>"
    ."<td>&nbsp;<div align=right><font size=\"1\"><b>"
    ."<a href=\"user.php\"><img src=\"themes/K-Be/images/menu/users.gif\" alt=\""._USERLOGIN."\" border=\"0\"></a>"
    ."&nbsp;<a href=\"index.php\"><img src=\"themes/K-Be/images/menu/home.gif\" alt=\""._MAIN."\" border=\"0\"></a>"
    ."&nbsp;<a href=\"submit.php\"><img src=\"themes/K-Be/images/menu/submit.gif\" alt=\""._SUBMITNEWS."\" border=\"0\"></a>"
    ."&nbsp;<a href=\"forum.php\"><img src=\"themes/K-Be/images/menu/forum.gif\" alt=\""._FORUMS."\" border=\"0\"></a>"
    ."&nbsp;<a href=\"download.php\"><img src=\"themes/K-Be/images/menu/download.gif\" alt=\""._DOWNLOADS."\" border=\"0\"></a>"
    ."&nbsp;<a href=\"links.php\"><img src=\"themes/K-Be/images/menu/links.gif\" alt=\""._LINKS."\" border=\"0\"></a>"
    ."&nbsp;<a href=\"mailto:$adminmail\"><img src=\"themes/K-Be/images/menu/mail.gif\" alt=\"Contact Us\" border=\"0\"></a></div></td>"
    ."</tr>"
    ."</table>"
    ."</td>"
    ."<td height=\"100\" nowrap background=\"themes/K-Be/images/right.gif\">&nbsp;</td>"
    ."</tr>"
    ."<tr>"
    ."<td width=\"20\" height=\"20\" nowrap><img src=\"themes/K-Be/images/corner-left-bottom.gif\" width=\"20\" height=\"20\"></td>"
    ."<td background=\"themes/K-Be/images/bottom.gif\">&nbsp;</td>"
    ."<td width=\"20\" height=\"20\" nowrap><img src=\"themes/K-Be/images/corner-right-bottom.gif\" width=\"20\" height=\"20\"></td>"
    ."</tr>"
    ."</table>"
    ."<br>";


    echo   "<TABLE BORDER=\"0\" CELLSPACING=\"0\" CELLPADDING=\"0\" WIDTH=\"100%\"><TR><TD vALIGN=\"top\" WIDTH=\"160\" BGCOLOR=\"0B5882\"><font size=\"1\">";

    blocks(left);

    echo "</font></TD><TD>&nbsp;&nbsp;</TD><TD WIDTH=\"100%\" vALIGN=\"top\">"
    ."<table align=center border=\"0\" cellspacing=\"0\" cellpadding=\"0\">"
    ."<tr>"
    ."<td width=\"11\" height=\"20\" nowrap><img src=\"themes/K-Be/images/corner-left2.gif\" width=\"11\" height=\"20\"></td>"
    ."<td colspan=\"2\">"
    ."<table border=\"0\" cellspacing=\"0\" cellpadding=\"0\">"
    ."<tr>"
    ."<td bgcolor=\"#FFCC00\"><font size=\"1\">::<b>:: <script type=\"text/javascript\">\n\n"
    ."<!--   // Array ofmonth Names\n"
    ."var monthNames = new Array( \""._JAN."\",\""._FEB."\",\""._MAR."\",\""._APR."\",\""._MAY."\",\""._JUN."\",\""._JUL."\",\""._AUG."\",\""._SEP."\",\""._OCT."\",\""._NOV."\",\""._DEC."\");\n"
    ."var now = new Date();\n"
    ."thisYear = now.getYear();\n"
    ."if(thisYear < 1900) {thisYear += 1900}; // corrections if Y2K display problem\n"
    ."document.write(monthNames[now.getMonth()] + \" \" + now.getDate() + \" \" + thisYear);\n"
    ."// -->\n\n"
    ."</script> ::</b>::</font></td>"
    ."<td width=\"11\" height=\"20\" nowrap><img src=\"themes/K-Be/images/corner-right.gif\" width=\"11\" height=\"20\"></td>"
    ."</tr>"
    ."</table>"
    ."</td>"
    ."</tr></table>"
    ."<TABLE WIDTH=\"100%\" BORDER=\"0\" CELLPADDING=\"0\" CELLSPACING=\"0\">"
    ."<TR><TD WIDTH=\"17\"><IMG SRC=\"themes/K-Be/images/b11.gif\" WIDTH=\"17\" HEIGHT=\"12\"></TD>"
    ."<TD WIDTH=\"100%\"><IMG SRC=\"themes/K-Be/images/b22.gif\" WIDTH=\"100%\" HEIGHT=\"12\"></TD>"
    ."<TD WIDTH=\"28\"><IMG SRC=\"themes/K-Be/images/b33.gif\" WIDTH=\"28\" HEIGHT=\"12\"></TD></TR>"
    ."</TABLE><TABLE WIDTH=\"100%\" BORDER=\"0\" CELLPADDING=\"0\" CELLSPACING=\"0\">"
    ."<TR><TD WIDTH=\"17\" BACKGROUND=\"themes/K-Be/images/c11.gif\">&nbsp;</TD>"
    ."<TD WIDTH=\"100%\" BGCOLOR=\"FFFFFF\" ALIGN=\"center\">";
     echo "<IMG SRC=\"themes/K-Be/images/pix.gif\" BORDER=\"0\" WIDTH=\"1\" HEIGHT=\"1\"></TD>"
     ."<TD WIDTH=\"17\" BACKGROUND=\"themes/K-Be/images/c33.gif\">&nbsp;<TD bgcolor=000000 width=1 height=1><img src=themes/K-Be/images/pix.gif width=1 height=1 border=0></TD></TD></TR></TABLE>"
     ."<TABLE WIDTH=\"100%\" BORDER=\"0\" CELLPADDING=\"0\" CELLSPACING=\"0\">"
     ."<TR><TD WIDTH=\"17\" BACKGROUND=\"themes/K-Be/images/c11.gif\">&nbsp;</TD><TD WIDTH=\"100%\" BGCOLOR=\"FFFFFF\"><font size=\"1\">";

}

      function themefooter() {
    global $index;
                 {
            echo "</font></TD>"
           ."<TD WIDTH=\"17\" BACKGROUND=\"themes/K-Be/images/c33.gif\">&nbsp;<TD bgcolor=000000 width=1 height=1><img src=themes/K-Be/images/pix.gif width=1 height=1 border=0></TD></TD></TR></TABLE>"
           ."<TABLE WIDTH=\"100%\" BORDER=\"0\" CELLPADDING=\"0\" CELLSPACING=\"0\">"
           ."<TR><TD WIDTH=\"17\" HEIGHT=\"10\"><IMG SRC=\"themes/K-Be/images/h11.gif\" WIDTH=\"17\" HEIGHT=\"10\" BORDER=\"0\"></TD>"
           ."<TD WIDTH=\"100%\" HEIGHT=\"10\"><IMG SRC=\"themes/K-Be/images/h22.gif\" WIDTH=\"100%\" HEIGHT=\"10\" BORDER=\"0\"></TD>"
           ."<TD WIDTH=\"28\" HEIGHT=\"10\"><IMG SRC=\"themes/K-Be/images/h33.gif\" WIDTH=\"28\" HEIGHT=\"10\" BORDER=\"0\"></TD></TR>"
           ."</TABLE>";
          }

    if ($index == 1) {

      echo "</TD><TD>&nbsp;&nbsp;</TD><TD WIDTH=\"160\" VALIGN=\"top\" BGCOLOR=\"0B5882\"><font size=\"1\">";

    blocks(right);

      echo "</font></TD>";

  }

     echo "</TD></TR></TABLE></TD></TR></TABLE><br><br>";

    footmsg();

}

function themeindex ($aid, $informant, $time, $title, $counter, $topic, $thetext, $notes, $morelink, $topicname, $topicimage, $topictext) {
    global $tipath, $anonymous;
   if ("$aid" == "$informant") { ?>

<table border=0 cellpadding=0 cellspacing=0 align=center bgcolor=000000 width=100%>
<tr><td>
<table border=0 cellpadding=3 cellspacing=1 width=100%>
<tr><td bgcolor=FFCC00>
<p><font size=\"1\"><b><center><u><?php echo"$title"; ?></u></center></b></font><br>
<font size=\"1\"><?php echo ""._POSTEDBY." "; ?><?php formatAidHeader($aid) ?> (<?php echo $counter; ?> <?php echo ""._READS.""; ?>)<br><?php echo ""._ON.""; ?> <?php echo"$time"; ?> </font><br>
</td>
</tr>
<tr>
<td bgcolor=EEEEEE>
<font size=\"1\"><a href="search.php?query=&topic=<?php echo"$topic"; ?>&author=">
<B><a href="search.php?query=&topic=<?php echo"$topic"; ?>&author="><img src=<?php echo"$tipath$topicimage"; ?> border=0 Alt=<?php echo"\"$topictext\""; ?> align=right hspace=10 vspace=10></a></B>
<P><?php echo"$thetext"; ?>
<?php echo"<br><br>
</td></tr><tr><td bgcolor=ABA9A9 align=left>
<p><img src=\"themes/K-Be/point.gif\" width=\"8\" height=\"8\" border=\"0\" align=\"middle\"> $morelink"; ?>
</font></td>
</tr>
</table>
</td>
</tr>
</table><br>


<?php        } else {
                if($informant != "") $boxstuff = "<a href=\"user.php?op=userinfo&uname=$informant\">$informant</a> ";
                else $boxstuff = "$anonymous ";
                $boxstuff .= ""._WRITES." <i>\"$thetext\"</i> $notes";
?>
<table border=0 cellpadding=0 cellspacing=0 align=center bgcolor=000000 width=100%>
<tr><td>

<table border=0 cellpadding=3 cellspacing=1 width=100%>
<tr><td bgcolor=FFCC00>
<p><b><font size=\"1\"><center><u><?php echo"$title"; ?></u></center></b></font><br>
<font size=\"1\"><?php echo ""._POSTEDBY." "; ?><?php formatAidHeader($aid); ?> <?php echo ""._ON.""; ?> <?php echo"$time"; ?> (<?php echo $counter; ?> <?php echo ""._READS.""; ?>)<br>
</font></td>
</tr>
<tr>
<td bgcolor=EEEEEE>
<font size=\"1\"><a href="search.php?query=&topic=<?php echo"$topic"; ?>&author=">
<B><a href="search.php?query=&topic=<?php echo"$topic"; ?>&author="><img src=<?php echo"$tipath$topicimage"; ?> border=0 Alt=<?php echo"\"$topictext\""; ?> align=right hspace=10 vspace=10></a></B>
</a>
<?php echo"$boxstuff<br><br>
</font></td></tr><tr><td bgcolor=ABA9A9 align=left>
<p><font size=\"1\"><img src=\"themes/K-Be/point.gif\" width=\"8\" height=\"8\" border=\"0\" align=\"middle\"> $morelink</font>"; ?>
</td>
</tr>
</table>
</td>
</tr>
</table><br>

<?php        }
}


function themearticle ($aid, $informant, $datetime, $title, $thetext, $topic, $topicname, $topicimage, $topictext) {
        if (!$config_called) {if (!isset($config)) {if (!isset($config)) { include("config.php"); }}}
        if ("$aid" == "$informant") {
    echo"
<font size=\"1\"><B>$title</B><BR>
"._POSTEDON." $datetime ";
global $admin, $sid;
if ($admin) {
    echo "&nbsp;&nbsp; $font2 [ <a href=admin.php?op=EditStory&sid=$sid>"._EDIT."</a> | <a href=admin.php?op=RemoveStory&sid=$sid>"._DELETE."</a> ]";
}
echo "
<a href=search.php?query=&topic=$topic&author=><img src=$tipath$topicimage border=0 Alt=\"$topictext\" align=right hspace=10 vspace=10></a>
<br><br><br>$thetext</font>
<br>
";
        } else {
                if($informant != "") $informant = "<font size=\"1\"><a href=\"user.php?op=userinfo&uname=$informant\">$informant</a> ";
                else $boxstuff = "$anonymous ";
                $boxstuff .= ""._WRITES." <i>\"$thetext\"</i> $notes</font>";
echo "
<font size=\"1\"><b>$title</b><br><font face=Arial,Helvetica size=2>"._CONTRIBUTEDBY." $informant "._ON." $datetime</font>
";
global $admin, $sid;
if ($admin) {
    echo "&nbsp;&nbsp; $font2 [ <a href=admin.php?op=EditStory&sid=$sid>"._EDIT."</a> | <a href=admin.php?op=RemoveStory&sid=$sid>"._DELETE."</a> ]";
}
echo "
<a href=search.php?query=&topic=$topic&author=><img src=$tipath$topicimage border=0 Alt=\"$topictext\" align=right hspace=10 vspace=10></a>
<br><br><br>$thetext</font>
<br>
";

        }
}

function themesidebox($title, $content) {
  echo  "<table width=\"180\" border=\"0\" cellspacing=\"0\" cellpadding=\"0\">"
   ."<tr>"
   ."<td>"
   ."<table border=\"0\" cellspacing=\"0\" cellpadding=\"0\" align=\"left\">"
   ."<tr>"
   ."<td width=\"20\" height=\"20\" nowrap><img src=\"themes/K-Be/images/corner-left.gif\" width=\"20\" height=\"20\"></td>"
   ."<td bgcolor=\"#FFCC00\"><font size=\"1\">&nbsp;$title</font></td>"
   ."<td width=\"11\" height=\"20\" nowrap><img src=\"themes/K-Be/images/corner-right.gif\" width=\"11\" height=\"20\"></td>"
   ."</tr>"
   ."</table>"
   ."</td>"
   ."</tr>"
   ."<tr>"
   ."<td align=\"left\" valign=\"top\">"
   ."<table width=\"100%\" border=\"0\" cellspacing=\"0\" cellpadding=\"0\">"
   ."<tr>"
   ."<td rowspan=\"2\" nowrap background=\"themes/K-Be/images/left.gif\" width=\"20\">&nbsp;</td>"
   ."<td height=\"20\" nowrap background=\"themes/K-Be/images/top.gif\">&nbsp;</td>"
   ."<td width=\"20\" nowrap><img src=\"themes/K-Be/images/corner-right-top.gif\" width=\"20\" height=\"20\"></td>"
   ."</tr>"
   ."<tr>"
   ."<td bgcolor=\"#FFFFFF\"><font size=\"1\">$content</font></td>"
   ."<td nowrap background=\"themes/K-Be/images/right.gif\">&nbsp;</td>"
   ."</tr>"
   ."<tr>"
   ."<td width=\"20\" nowrap><img src=\"themes/K-Be/images/corner-left-bottom.gif\" width=\"20\" height=\"20\"></td>"
   ."<td background=\"themes/K-Be/images/bottom.gif\">&nbsp;</td>"
   ."<td width=\"20\" height=\"20\" nowrap><img src=\"themes/K-Be/images/corner-right-bottom.gif\" width=\"20\" height=\"20\"></td>"
   ."</tr>"
   ."</table>"
   ."</td>"
   ."</tr>"
   ."</table><br>";
}

?>
