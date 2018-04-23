<?php

// include the variables-table:
include("config.php");
include("themes/LocalFoo2/vars.php");

$thename = "NukeNews";
$bgcolor1 = "#FFFFFF";
$bgcolor2 = "#85ad85";
$bgcolor3 = "#85ad85";
$bgcolor4 = "#99cc99";
$textcolor1 = "#FFFFFF";
$textcolor2 = "#000000";
$pollcolor = "#e9edf5";
$hr = 0; # 1 to have horizonal rule in comments instead of table bgcolor

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

include("config.php");
include("themes/LocalFoo2/vars.php");

function newonline() {
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
    $who_online_num = $guest_online_num + $member_online_num;
        if ($member_online_num != 0){
                $memTag .= ""._MEMBERS.": ";
    }
    $who_online = "$guest_online_num "._GUESTS." $member_online_num "._MEMBERS."<br>$memTag";
    $title = ""._WHOSONLINE."";
    $content = "$who_online";
    if ($user) {
	  $content .= ""._YOUARELOGGED." <b>$username</b>.</font>";
    } else {
	  $content .= ""._YOUAREANON."";
    }
	echo $content;
}

function themeheader() {
cookiedecode($user);
include("themes/LocalFoo2/vars.php");
$username = $cookie[1];
if ($username == "") {
        $username = "Anonymous";
}
echo "<div align=\"right\">";
echo  "<script type=\"text/javascript\">\n\n"
          ."<!--   // Array ofmonth Names\n"
          ."var monthNames = new Array( \""._JAN."\",\""._FEB."\",\""._MAR."\",\""._APR."\",\""._MAY."\",\""._JUN."\",\""._JUL."\",\""._AUG."\",\""._SEP."\",\""._OCT."\",\""._NOV."\",\""._DEC."\");\n"
          ."var now = new Date();\n"
          ."thisYear = now.getYear();\n"
          ."if(thisYear < 1900) {thisYear += 1900}; // corrections if Y2K display problem\n"
          ."document.write(monthNames[now.getMonth()] + \" \" + now.getDate() + \", \" + thisYear);\n"
          ."// -->\n\n"
          ."</script>\n";
echo "&nbsp;";

/* Start of the body; also the css is integrated*/
echo "<body topmargin=\"0\" leftmargin=\"0\" marginwidth=\"0\" marginheight=\"0\" bgcolor=#FFFFFF text=#000000 link=#000080 alink=#FF0000 vlink=#000080>
      <link rel=stylesheet href=themes/LocalFoo2/style.css>
      <br>";


echo "<table cellpadding=0 cellspacing=0 width=\"100%\" border=\"0\" align=\"center\" bgcolor=\"#fefefe\" background=\"themes/LocalFoo2/images/green_grid.gif\">
 <tr><td bgcolor=\"#000000\" colspan=9><img src=\"themes/LocalFoo2/images/pix.gif\" width=1 height=1 border=0></td></tr>
 <tr><td colspan=9><img src=\"themes/LocalFoo2/images/pix.gif\" width=1 height=1 border=0></td></tr>
 <tr><td colspan=9><img src=\"themes/LocalFoo2/images/pix.gif\" width=1 height=1></td></tr>

 <tr valign=\"middle\" background=\"themes/LocalFoo2/images/green_grid.gif\">
  <td align=center width=\"10%\"><a href=$hyp1><img src=$icon1 border=0 width=22 height=22 alt=$icon_alt1></a></td>
  <td align=center width=\"10%\"><a href=$hyp2><img src=$icon2 border=0 width=25 height=25 alt=$icon_alt2></a></td>
  <td align=center width=\"10%\"><a href=$hyp3><img src=$icon3 border=0 width=22 height=22 alt=$icon_alt3></a></td>
  <td align=center width=\"10%\"><a href=$hyp4><img src=$icon4 border=0 width=22 height=22 alt=$icon_alt4></a></td>
  <td align=center width=\"10%\"><a href=$hyp5><img src=$icon5 border=0 width=22 height=22 alt=$icon_alt5></a></td>
  <td align=center width=\"10%\"><a href=$hyp6><img src=$icon6 border=0 width=25 height=25 alt=$icon_alt6></a></td>
  <td align=center width=\"10%\">";
if ($username == "anonymous") {
    echo "<a href=$hyp7><img src=$icon7 border=0 width=22 height=22 alt=$icon_alt7></a>";
    $reg_u = "Neuen Account erstellen";
} else {
    echo "<a href=$hyp8><img src=$icon8 border=0 width=22 height=22 alt=$icon_alt8></a>";
    $reg_u = _SUBMITNEWS;
}
echo "
  </td>
  <td align=center width=\"10%\"><a href=$hyp9><img src=$icon9 border=0 width=22 height=22 alt=$icon_alt9></a></td>
  <td align=center width=\"10%\"><a href=$hyp10><img src=$icon10 border=0 width=22 height=22 alt=$icon_alt10></a></td>
 </tr>
 <tr valign=\"middle\">
  <td align=center><font size=2><a href=$hyp1>$icon_alt1</a></font></td>
  <td align=center><font size=2><a href=$hyp2>$icon_alt2</a></font></td>
  <td align=center><font size=2><a href=$hyp3>$icon_alt3</a></font></td>
  <td align=center><font size=2><a href=$hyp4>$icon_alt4</a></font></td>
  <td align=center><font size=2><a href=$hyp5>$icon_alt5</a></font></td>
  <td align=center><font size=2><a href=$hyp6>$icon_alt6</a></font></td>
  <td align=center><font size=2><a href=$hyp7>$reg_u</a></font></td>
  <td align=center><font size=2><a href=$hyp9>$icon_alt9</a></font></td>
  <td align=center><font size=2><a href=$hyp10>$icon_alt10</a></font></td>
 </tr>

 <tr><td colspan=9><img src=\"themes/LocalFoo2/images/pix.gif\" width=1 height=1></td></tr>
";
?>

 <tr>
   <td colspan=9><img src=\"themes/LocalFoo2/images/pix.gif\" width=1 height=1 alt="" border=0></td>
 </tr>
 <tr>
  <td bgcolor=\"#000000\" colspan=9><img src=\"themes/LocalFoo2/images/pix.gif\" width=1 height=1 alt="" border=0></td>
 </tr>
</table>

<tr>
<td bgcolor="#cccccc" colspan=9><img src=\"themes/LocalFoo2/images/pix.gif\" width=1 height=1 alt="" border=0></td>
</tr><tr>
<td bgcolor="#000000" colspan=9><img src=\"themes/LocalFoo2/images/pix.gif\" width=1 height=1 alt="" border=0></td>
</tr></table>

<?

/* Logo-Section */
echo "
<table width=\"100%\" border=\"0\" cellspacing=\"0\" cellpadding=\"10\" bgcolor=\"#FFFFFF\">
<tr><td><a href=$hyp1><img src=$logo border=0 Alt=\""._WELCOMETO." $sitename\"></a></td><td>";

newonline();

echo "</td><td><center><form action=$hyp13 method=get><font size=2>"._TOPICS." ";
       $toplist = mysql_query("select topicid, topictext from topics order by topictext");
       echo "<SELECT NAME=\"topic\"onChange='submit()'>" ;
       echo "<OPTION VALUE=\"\">"._ALLTOPICS."</option>\n";
       while(list($topicid, $topics) = mysql_fetch_row($toplist)) {
       if ($topicid==$topic) { $sel = "selected "; }
       echo "<option $sel value=\"$topicid\">$topics</option>\n";
       $sel = "";
      }
echo "
</select></font></form></center></td>
  </tr>
</table>";
global $slogan;
echo "<table cellpadding=1 cellspacing=0 border=0 width=100% bgcolor=101070 align=center>
	   <tr background=\"themes/LocalFoo2/images/green_grid.gif\">
 	    <td>
    	 <table cellpadding=5 cellspacing=1 border=0 width=100% bgcolor=ffffff background=\"themes/LocalFoo2/images/green_grid.gif\">
	      <tr>
	       <td width=\"38%\">&nbsp;<$fontface><b>$slogan</b></font></td>
           <td width=\"2%\">&nbsp; <a href= ></td>
		   <td width=\"2%\">&nbsp; <a href= ></a></td>
		   <td width=\"2%\">&nbsp; <a href= ></a></td>
		   <td width=\"2%\">&nbsp; <a href= ></a></td>
		   <td width=\"2%\">&nbsp; <a href= ></a></td>
		   <td width=\"2%\">&nbsp; <a href= ></a></td>
		   <td width=\"2%\">&nbsp; <a href= ></a></td>
		   <td align=right>
		    <form action=$hyp13 method=post>
		     <input type=text name=query width=20 size=20 length=20></td>
	       <td align=left>
	         <input type=image src=\"themes/LocalFoo2/images/search.gif\" border=0 align=middle alt=\""._SEARCH."\"></td>
	        </form>
		  </tr>
         </table>
	    </td>
	   </tr>
	  </table>";
echo "<table width=\"95%\" cellpadding=\"0\" cellspacing=\"0\" border=\"0\" bgcolor=\"#ffffff\" align=\"center\"><tr valign=top>
<td bgcolor=ffffff><img src=themes/LocalFoo2/images/pix.gif width=1 height=20 border=0 alt=\"\"></td></tr></table>

<table width=\"95%\" cellpadding=\"0\" cellspacing=\"0\" border=\"0\" bgcolor=\"#ffffff\" align=\"center\"><tr valign=top>
<td bgcolor=ffffff><img src=themes/LocalFoo2/images/pix.gif width=10 height=1 border=0 alt=\"\"></td>
<td bgcolor=ffffff width=150 valign=top>";

blocks(left);

echo "</td><td><img src=themes/LocalFoo2/images/pix.gif width=15 height=1 border=0 alt=\"\"></td><td width=\"100%\">";

global $showNewTopics;
}

function themefooter() {
include("themes/LocalFoo2/vars.php");
    echo "</td><td><img src=$pix_w width=15 height=1 border=0 alt=\"\"></td><td width=150>";
blocks(right);

echo "</td></tr></table>
<br><br>
<TABLE cellpadding=0 cellspacing=0 width=\"100%\" border=\"0\" align=\"center\">
<TR><TD bgcolor=\"#000000\">
<IMG src=$pix_w width=1 height=1 alt=\"\" border=0></TD>
</tr><tr>
<TD bgcolor=\"#FFFFFF\">
<IMG src=$pix_w width=1 height=1 alt=\"\" border=0></TD>
</TR><TR valign=\"middle\">
<TD align=\"middle\" height=\"20\"><FONT size=\"2\">


<A href=$hyp11>Flash Games</A>&nbsp;&nbsp;&middot;&nbsp;
<A href=$hyp12>Reviews</A>

</FONT>
</TD></tr>";
global $banners;
echo "<br>";

if ($banners) {
echo "<center>";
include("banners.php");
echo "</center>";
}
echo"<TR><TD bgcolor=cccccc><IMG src=$pix_w width=1 height=1 border=0></TD></tr><tr>
<TD bgcolor=000000><IMG src=$pix_w width=1 height=1 border=0></TD>
</tr><tr><td background=\"themes/LocalFoo2/images/green_grid.gif\" height=115>";

footmsg();
echo "</TR></TABLE>";
}

function themeindex ($aid, $informant, $time, $title, $counter, $topic, $thetext, $notes, $morelink, $topicname, $topicimage, $topictext) {
include("themes/LocalFoo2/vars.php");
    global $anonymous, $tipath;
    echo "
    <table border=0 cellpadding=0 cellspacing=0 bgcolor=ffffff width=\"100%\"><tr><td>
    <table border=0 cellpadding=1 cellspacing=0 bgcolor=000000 width=\"100%\"><tr><td>
    <table border=0 cellpadding=0 cellspacing=0 width=100% background=\"themes/LocalFoo2/images/green_grid.gif\"><tr><td>
    <TD><IMG src=\"temes/LocalFoo2/images/pixel.gif\" width=1 height=1 alt=\"\" border=0></TD></tr>
    <tr><td align=left height=20 background=\"themes/LocalFoo2/images/green_grid.gif\">
    <font size=2 color=\"#000000\"><b>&nbsp;$title</b></font>
    </td></tr>
    <TD bgcolor=\"#aaaaaa\"><IMG src=\"temes/LocalFoo2/images/pixel.gif\" width=1 height=1 alt=\"\" border=0></TD></tr>
    </table></td></tr></table>
    <a href=\"search.php?query=&topic=$topic\">$topictext<img src=\"$tipath$topicimage\" border=0 Alt=\"$topictext\" align=right hspace=10 vspace=10></a>
    <FONT color=\"#000000\" size=1>"._POSTEDBY." ";
    formatAidHeader($aid);
    echo ""._ON." $time $timezone ($counter "._READS.")<br><br></font>

    ";
    if ("$aid" == "$informant") {
	echo "<FONT size=2 color=\"#000000\">$thetext</FONT>";
    } else {
	if($informant != "") {
	    $boxstuff = "<a href=\"user.php?op=userinfo&uname=$informant\">$informant</a> ";
	} else {
	    $boxstuff = "$anonymous ";
	}
	$boxstuff .= ""._WRITES." <i>\"$thetext\"</i> $notes\n";
	echo "<font size=2 color=\"#000000\">$boxstuff</font>\n";
    }
    echo "
    <br><br><div align=left><img src=\"themes/LocalFoo2/images/point.gif\" border=0 alt=\"\">&nbsp;<font size=2>$morelink</div>
    </td></tr></table>
    <br><br>";
}

function themearticle ($aid, $informant, $datetime, $title, $thetext, $topic, $topicname, $topicimage, $topictext) {
include("themes/LocalFoo2/vars.php");
    global $admin, $sid, $tipath;
    echo"
    <table border=0 cellpadding=0 cellspacing=0 bgcolor=ffffff width=\"100%\"><tr><td>
    <table border=0 cellpadding=1 cellspacing=0 bgcolor=000000 width=\"100%\"><tr><td>
    <table border=0 cellpadding=0 cellspacing=0 width=\"100%\" background=\"themes/LocalFoo2/images/green_grid.gif\"><tr>
    <TD bgcolor=\"#FFFFFF\"><IMG src=\"themes/LocalFoo2/images/pixel.gif\" width=1 height=1 alt=\"\" border=0></TD></tr>
    <tr><td align=left height=20>
    <font size=1 color=\"#000000\"><b>&nbsp;$title</b></font>
    </td></tr>
    <tr><TD bgcolor=\"#AAAAAA\"><IMG src=\"themes/LocalFoo2/images/pixel.gif\" width=1 height=1 alt=\"\" border=0></TD></tr>
    </td></tr></table></td></tr></table>
    <font size=1 color=\"#000000\">".'posted'." $datetime by ";
    formatAidHeader($aid);
    if ($admin) {
	echo "&nbsp;&nbsp;[ <a href=admin.php?op=EditStory&sid=$sid>"._EDIT."</a> | <a href=admin.php?op=RemoveStory&sid=$sid>"._DELETE."</a> ]</font>";
    }
    echo "<br>";
    echo "<a href=\"search.php?query=&topic=$topic\">$topictext<img src=\"$tipath$topicimage\" border=0 Alt=\"$topictext\" align=right hspace=10 vspace=10></a>";
    if($informant != "") {
	echo "<font size=1>"._USERINFO.": <a href=\"user.php?op=userinfo&uname=$informant\">$informant</a></font><br><br>";
    } else {
        echo "<font size=1>"._CONTRIBUTEDBY.": $anonymous</font><br><br>";
    }
    echo "$thetext";
    echo "</td></tr></table><br>";
}

function themesidebox($title, $content) {
include("themes/LocalFoo2/vars.php");
    global $tbl;
    if (!isset($tbl)) {
	$tbl = 150;
    }
    echo "
	<table border=0 cellpadding=1 cellspacing=0 bgcolor=000000 width=$tbl><tr><td>
	<table border=0 cellpadding=0 cellspacing=0 width=\"100%\" background=\"themes/LocalFoo2/images/green_grid.gif\"><tr>
	<TD bgcolor=\"#FFFFFF\"><IMG src=\"themes/LocalFoo2/images/pixel.gif\" width=1 height=1 alt=\"\" border=0></TD></tr>
	<tr><td align=left height=20>\n
	<font size=2 color=\"#000000\"><b>&nbsp;&nbsp;$title</b></font></td></tr>\n
	<tr><TD bgcolor=\"#aaaaaa\"><IMG src=\"themes/LocalFoo2/images/pixel.gif\" width=1 height=1 alt=\"\" border=0></TD>
	</tr></table></td></tr></table>
	<table border=0 cellpadding=0 cellspacing=0 bgcolor=ffffff width=$tbl>
	<tr valign=top><td bgcolor=ffffff>
	<font size=2>$content</font>
	</td></tr>
	<tr><td><br><img src=\"themes/LocalFoo2/images/dk_shadow1gr.gif\" width=$tbl border=0 alt=\"\">
	</td></tr></table>
	<br>\n\n\n";
}

?>
