<?php
echo "<link rel=stylesheet href=themes/K-Bix-iceberg/style/style.css>";
$thename = "The K-Bix-iceberg 1.0";

$TablebgColor_A ="#000000";
$TablebgColor_B ="#FFFFFF";
$LinksTableRowColor = "#e9edf5";
$bgcolor1 = "#C7F1FF";
$bgcolor2 = "#C3D5F9";
$bgcolor3 = "#FFC1C1";
$textcolor1 = "#FFFFFF";
$textcolor2 = "#000000";
$pollcolor = "#A0C0FF";

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

function themeheader() {
global $user, $sitename, $username, $cookie;
cookiedecode($user);
$username = $cookie[1];
if ($username == "") {
$username = "Anonymous";
}
?>
<body topmargin="0" leftmargin="0" marginwidth="0" marginheight="0" bgcolor="#C9F5FF" text="#000000" link="#3661a1" vlink="#6f6c81" alink="#d5ae83">
 <TABLE cellpadding=0 cellspacing=0 width="100%" border="0" align="center" valign="center" bgcolor="#C9F5FF">
        <TR>
                <TD bgcolor="#000000" colspan=6><IMG src="themes/K-Bix-iceberg/images/pixel.gif" width=1 height=1 alt="" border=0 hspace=0></TD>
        </TR>
        <TR valign="center" bgcolor="#C9F5FF">
<TD width="28%" nowrap><font size="-1" color="#3661a1">
<b>
<?php
if ($username == "Anonymous") {
    echo "<b><font class=catdesc>&nbsp;<b><font color=#3661a1>"._LINKSNOTUSER8."</a></font><font color=#3661a1></b>";
}
else
{
    echo "<b><font class=catdesc>"._HELLO." $username! |<a href=user.php>"._USERLOGIN."</a>||<a href=user.php?op=logout>"._LOGOUT."</a>|</b></font>";
}
?>
</b></font></TD>
<TD align="middle" height="20" colspan=2 nowrap><FONT size="-1">::<B>:: <A href="/"><?php echo""._MAIN.""; ?></A>
::
<A href="submit.php"><?php echo""._SUBMITNEWS.""; ?></A>
::
<A href="links.php"><?php echo""._WLINKS.""; ?></A>
::
<A href="user.php"><?php echo""._USERLOGIN.""; ?></A>
::
<A href="sections.php"><?php echo""._SECTIONS.""; ?></A> ::</B>::</FONT>
</TD>
<TD align="right" width="25%" colspan=2 nowrap><FONT class=catdesc><b>
<?PHP echo  "<script type=\"text/javascript\">\n\n"
          ."<!--   // Array ofmonth Names\n"
          ."var monthNames = new Array( \""._JAN."\",\""._FEB."\",\""._MAR."\",\""._APR."\",\""._MAY."\",\""._JUN."\",\""._JUL."\",\""._AUG."\",\""._SEP."\",\""._OCT."\",\""._NOV."\",\""._DEC."\");\n"
          ."var now = new Date();\n"
          ."thisYear = now.getYear();\n"
          ."if(thisYear < 1900) {thisYear += 1900}; // corrections if Y2K display problem\n"
          ."document.write(monthNames[now.getMonth()] + \" \" + now.getDate() + \", \" + thisYear);\n"
          ."// -->\n\n"
          ."</script>\n"; ?>
          </b>&nbsp;&nbsp;</FONT></TD>
<td>&nbsp;</td>
</tr>
        <TR>
                <TD colspan=6 bgcolor="#000000"><IMG src="themes/K-Bix-iceberg/images/pixel.gif" width=1 height=1 alt="" border=0 hspace=0></TD>
        </TR>
        </TABLE>
<?php
if ($banners) {
    include("banners.php");
}
?>
<br>
<TABLE cellpadding=0 cellspacing=0 width="100%" border="0" align="center" bgcolor="#ffffff">
<TR valign="top" bgcolor="#3C9ED1">
<TD align="middle" bgcolor="#ffffff" background="themes/K-Bix-iceberg/images/streamline-bg.gif">
<IMG height=16 alt="" hspace=0 src="themes/K-Bix-iceberg/images/roundcorner-tl.gif" width=17 align=left>
<div align=left><A href="/"><IMG alt="<?php echo $sitename ?>" src="themes/K-Bix-iceberg/images/title.gif" border=0 aligh=left></A></TD>
<TD bgcolor="#000000"><IMG src="themes/K-Bix-iceberg/images/pixel.gif" width=1 height=1 alt="" border=0 hspace=0></TD>
<TD align="middle">
<CENTER><form action="search.php" method=post><font class=catdesc><br><b><?php echo ""._SEARCHIN.""; ?> <?php echo $sitename ?></b><br>
<input type=name name=query size="14"></font></form></CENTER></TD>
<TD align="middle">
<IMG height=17 alt="" hspace=0 src="themes/K-Bix-iceberg/images/roundcorner-tr.gif" width=17 align=right >
<CENTER><form action="search.php" method=get><FONT class=catdesc><BR><B><?php echo ""._SEARCHIN." "._TOPICS.""; ?>:</b><BR>
<!-- Topic Selection -->
<?php
    $toplist = mysql_query("select topicid, topictext from nuke_topics order by topictext");
    echo "<SELECT NAME=\"topic\"onChange='submit()'>" ;
    echo "<OPTION VALUE=\"\">"._ALLTOPICS."</option>\n";
    while(list($topicid, $topics) = mysql_fetch_row($toplist)) {
    if ($topicid==$topic) { $sel = "selected "; }
        echo "<option $sel value=\"$topicid\">$topics</option>\n";
    $sel = "";
    }
    echo "</SELECT>";
?>
 </FONT></FORM></CENTER>
        </TD>
        </TR>
</TABLE>
        <TABLE cellpadding=0 cellspacing=0 width="100%" border="0" align="center" bgcolor="#8FBDD5">
        <TR>
                <TD bgcolor="#000000" colspan=6><IMG src="themes/K-Bix-iceberg/images/pixel.gif" width=1 height=1 alt="" border=0 hspace=0></TD>
        </TR>
        <TR valign="center" bgcolor="#8FBDD5">
<TD width="28%" nowrap bgcolor="#8FBDD5"><font size="-1" color="#3661a1"><b>

</b></font></TD>
<TD align="middle" height="20" colspan=2 nowrap bgcolor="#8FBDD5"><FONT size="-1">::<B>:: <?php echo ""._WELCOMETO." $sitename" ?> ::</B>::</FONT>
</TD>
<TD align="right" width="25%" colspan=2 nowrap bgcolor="#8FBDD5"><FONT class=catdesc><b>
</b>&nbsp;&nbsp;</FONT></TD>
<td>&nbsp;</td>
</tr>
        <TR>
                <TD colspan=6 bgcolor="#000000"><IMG src="themes/K-Bix-iceberg/images/pixel.gif" width=1 height=1 alt="" border=0 hspace=0></TD>
        </TR>
        </TABLE>
<TABLE width="100%" cellpadding="0" cellspacing="0" border="0" bgcolor="#fefefe" align="center" nowrap >
        <!-- tr><td colspan="5">&nbsp</td><td width=80%><IMG src="themes/K-Bix-iceberg/images/pix.gif" height="1" width="350" alt=""></td><td colspan="5">&nbsp</td><tr -->
      <TR valign="top">
        <TD bgcolor="#ffffff" colspan=11 nowrap><IMG src="themes/K-Bix-iceberg/images/pixel.gif" width="1" height="16"></TD>
        </TR>
        <TR valign="top"><TD width="10"><IMG src="themes/K-Bix-iceberg/images/pixel.gif" height="1" width="16" alt=""></TD>
        <TD width="120">
        <P align="center">
        <P>     <P>
        <TABLE width="100%" cellpadding="0" cellspacing="0" border="0">
        <TR valign="bottom">
<?php
blocks(left);
?>

<TD width="16"><IMG src="themes/K-Bix-iceberg/images/pixel.gif" height="1" width="16" alt=""></TD>
<TD background="themes/K-Bix-iceberg/images/checkerboard.gif" width="1"><IMG src="themes/K-Bix-iceberg/images/pixel.gif" height="1" width="1" alt=""></TD>
<TD width="16"><IMG src="themes/K-Bix-iceberg/images/pixel.gif" height="1" width="16" alt=""></TD>
<td>
<P><H2 align="center"> </H2>
<P align="center"><P>
<?php
}

function themefooter() {
global $index;
if ($index == 1) {
?>
<TD width="16"><IMG src="themes/K-Bix-iceberg/images/pixel.gif" height="1" width="16" alt=""></TD>
<TD background="themes/K-Bix-iceberg/images/checkerboard.gif" width="1"><IMG src="themes/K-Bix-iceberg/images/pixel.gif" height="1" width="1" alt=""></TD>
<TD width="16"><IMG src="themes/K-Bix-iceberg/images/pixel.gif" height="1" width="8" alt=""></TD>
<?php
    echo "<td valign=\"top\">";
    blocks(right);
    echo "</td>";
}

?>
<td width="10">&nbsp</td>
<tr>
<TD align="middle" height=17 colspan=11>
                <IMG height=17 alt="" hspace=0 src="themes/K-Bix-iceberg/images/roundcorner-bl.gif" width=17 align=left >
                <IMG height=17 alt="" hspace=0 src="themes/K-Bix-iceberg/images/roundcorner-br.gif" width=17 align=right >
        </TD>
      </TR>
    </TABLE>
        </td></tr></table><center><font class=catdesc>K-Bix-iceberg. Modified version of TheBixLight from <a href=http://www.thebix.com class=catdesc>TheBix.com</a>. <font class=catdesc>By </font><a href=http://www.babylone6tem.com/~kodred class=catdesc><b>KodRed</b></a><br><br><br>
<div align="center"><?php echo footmsg(); ?></div><br><br>

<?php
}

function themeindex ($aid, $informant, $time, $title, $counter, $topic, $thetext, $notes, $morelink, $topicname, $topicimage, $topictext) {
        if (!$config_called) {if (!isset($config)) {if (!isset($config)) { include("config.php"); }}}
        if ("$aid" == "$informant") { ?>
<!-- title -->
<table width=100% cellpadding=0 cellspacing=0 border=0>
<tr valign="bottom"><td align="left"><FONT class=catdesc><font color=486591><B><?php echo"$title"; ?></B></FONT><BR><IMG src="themes/K-Bix-iceberg/images/pixel.gif" height=3 width=1 alt=""><br></td>
<td align="right" width="1%"><IMG height=14 alt="" src="themes/K-Bix-iceberg/images/endcap-grey.gif" width=14></td></tr>
<TR valign="bottom"><TD bgcolor="#cecece" width="100%" colspan=2><IMG src="themes/K-Bix-iceberg/images/pixel.gif" width=1 height=1 alt=""></TD></TR>
</table>
<!-- topic -->
<FONT color="#999999"><B><a href="search.php?query=&topic=<?php echo"$topic"; ?>&author="><img src=<?php echo"$tipath$topicimage"; ?> border=0 Alt=<?php echo"\"$topictext\""; ?> align=right hspace=10 vspace=10></a></B></FONT>

<FONT class=catdesc><font color="#505050"><P><?php echo"$thetext"; ?>
</FONT>
<P>
<DIV align="right">
<?php echo"$time $timezone"; ?> - <?php echo""._POSTEDBY.""; ?>&nbsp;<?php formatAidHeader($aid) ?>  </FONT>
<FONT size="-1" color="#cccccc"><I>&gt;&gt;</I></FONT><br>
<?php echo"$morelink"; ?>
<P></P></DIV>
<P>

<?php        } else { ?>
<table width=100% cellpadding=0 cellspacing=0 border=0>
<tr valign="bottom"><td align="left"><FONT class=catdesc><font color=486591><B><?php echo"$title"; ?></B></FONT><BR><IMG src="themes/K-Bix-iceberg/images/pixel.gif" height=3 width=1 alt=""><br></td>
<td align="right" width="1%"><IMG height=14 alt="" src="themes/K-Bix-iceberg/images/endcap-grey.gif" width=14></td></tr>
<TR valign="bottom"><TD bgcolor="#cecece" width="100%" colspan=2><IMG src="themes/K-Bix-iceberg/images/pixel.gif" width=1 height=1 alt=""></TD></TR>
</table>
<FONT color="#999999"><B><a href="search.php?query=&topic=<?php echo"$topic"; ?>&author="><img src=<?php echo"$tipath$topicimage"; ?> border=0 Alt=<?php echo"\"$topictext\""; ?> align=right hspace=10 vspace=10></a></B></FONT>
<?php

                if($informant != "") $boxstuff = "<a href=\"user.php?op=userinfo&uname=$informant\">$informant</a> ";
                else $boxstuff = "$anonymous ";
                $boxstuff .= ""._WRITES." <i>\"$thetext\"</i><br> $notes";

?>

<FONT class=catdesc><font color="#505050"><P><?php echo "$boxstuff"; ?>
</FONT>
<P>
<DIV align="right">
<FONT color="#999999"><?php echo"$time $timezone"; ?> - <?php echo""._POSTEDBY.""; ?>&nbsp;<?php formatAidHeader($aid) ?>  </FONT>
<FONT size="-1" color="#cccccc"><I>&gt;&gt;</I></FONT><br>
<?php echo"$morelink"; ?>
<P></P></DIV>
<?php        }
}


function themearticle ($aid, $informant, $datetime, $title, $thetext, $topic, $topicname, $topicimage, $topictext) {
        if (!$config_called) {if (!isset($config)) {if (!isset($config)) { include("config.php"); }}}
        if ("$aid" == "$informant") {
echo"
<!-- article -->
<FONT color='#486591' scolor='#000000'><B>$title</B></FONT><BR>
"._POSTEDON." $datetime ";
global $admin, $sid;
if ($admin) {
    echo "&nbsp;&nbsp; $font2 [ <a href=admin.php?op=EditStory&sid=$sid>"._EDIT."</a> | <a href=admin.php?op=RemoveStory&sid=$sid>"._DELETE."</a> ]";
}
echo "
<a href=search.php?query=&topic=$topic&author=><img src=$tipath$topicimage border=0 Alt=\"$topictext\" align=right hspace=10 vspace=10></a>
$thetext
<br>
";
        } else {
                if($informant != "") $informant = "<a href=\"user.php?op=userinfo&uname=$informant\">$informant</a> ";
                else $boxstuff = "$anonymous ";
                $boxstuff .= ""._WRITES." <i>\"$thetext\"</i> $notes";
echo "
<b>$title</b><br><font face=Arial,Helvetica size=2>"._CONTRIBUTEDBY." $informant "._ON." $datetime</font>
";
global $admin, $sid;
if ($admin) {
    echo "&nbsp;&nbsp; $font2 [ <a href=admin.php?op=EditStory&sid=$sid>"._EDIT."</a> | <a href=admin.php?op=RemoveStory&sid=$sid>"._DELETE."</a> ]";
}
echo "
<a href=search.php?query=&topic=$topic&author=><img src=$tipath$topicimage border=0 Alt=\"$topictext\" align=right hspace=10 vspace=10></a>
$thetext
<br>
";

        }
}

function themesidebox($title, $content) {
     ?><br>
<!-- start side box -->
<TABLE width="140" cellpadding=0 cellspacing=0 border=0>
<TR valign="bottom">
<TD align="left"><font class=catdesc><b><?php echo"$title"; ?></FONT></B><IMG src="themes/K-Bix-iceberg/images/pixel.gif" height=3 width=1 alt=""></TD>
<TD align="right" width="1%"><IMG height=14 alt="" src="themes/K-Bix-iceberg/images/endcap-grey.gif" width=14></TD>
</TR>
<TR valign="bottom"><TD bgcolor="#cecece" width="100%" colspan=2><IMG src="themes/K-Bix-iceberg/images/pixel.gif" width=1 height=1 alt=""></TD></TR>
<tr><td>
<font class=catdesc><?php echo"$content"; ?>
</td></tr>
</TABLE>
<?php }
?>
