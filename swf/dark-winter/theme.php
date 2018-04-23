<?php

$thename = "dark-winter";
$bgcolor1 = "#FFFFFF";
$bgcolor2 = "#1F87E0";
$bgcolor3 = "#7DB7C1";
$textcolor1 = "#000000";
$textcolor2 = "#000000";

function OpenTable() {
    global $bgcolor1, $bgcolor2;
    echo "<table width=\"100%\" border=\"0\" cellspacing=\"0\" cellpadding=\"0\" bgcolor=\"$bgcolor2\" align=\"center\"><tr><td>\n";
    echo "<table width=\"98%\" border=\"0\" cellspacing=\"0\" cellpadding=\"4\" bgcolor=\"$bgcolor1\" align=\"center\"><tr><td>\n";
}

function CloseTable() {
    echo "</td></tr></table></td></tr></table>\n";
}

function OpenTable2() {
    global $bgcolor1, $bgcolor2;
    echo "<table border=\"0\" cellspacing=\"0\" cellpadding=\"0\" bgcolor=\"$bgcolor2\" align=\"center\"><tr><td>\n";
    echo "<table border=\"0\" cellspacing=\"0\" cellpadding=\"4\" bgcolor=\"$bgcolor1\" align=\"center\"><tr><td>\n";
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
        echo "<font face=\"Arial, Helvetica, sans-serif\" size=\"2\">$thetext<br>$notes</font>\n";
    } else {
        if($informant != "") {
            $boxstuff = "<a href=\"user.php?op=userinfo&amp;uname=$informant\">$informant</a> ";
        } else {
            $boxstuff = "$anonymous ";
        }
        $boxstuff .= ""._WRITES." <i>\"$thetext\"</i> $notes\n";
        echo "<font face=\"Arial, Helvetica, sans-serif\" size=\"2\">$boxstuff</font>\n";
    }
}

function themeheader() {
global $user, $sitename, $username, $cookie, $banners;
cookiedecode($user);
$username = $cookie[1];
if ($username == "") {
$username = "Anonymous";
}
?>
<SCRIPT src='themes/dark-winter/jsnav.js'></SCRIPT>
<body bgcolor="#000000" text="#606060" link="#FF1D2D" vlink="#FF1D2D" alink="#FF1D2D" leftmargin="2" topmargin="2" marginwidth="2" marginheight="2">
<table width="100%" border="0" cellspacing="0" cellpadding="0">
<tr>
<td width="141" height="68" nowrap><IMG SRC="themes/dark-winter/images/head-top-left.gif" width="141" height="68" border="0"></td>
<td bgcolor="#FF8400" valign="middle" width="100%" nowrap>
<DIV align="center">
<table width="100%" border="0" cellspacing="0" cellpadding="0" height="100%" bgcolor="#FF8400">
<tr>
<td width="168" nowrap height="68"><A href="index.php"><IMG alt="<?php echo $sitename ?>" src="themes/dark-winter/images/logo.gif" width="168" height="68" border="0"></a></td>
<td nowrap>
<DIV align="left"><table border="0" cellspacing="0" cellpadding="0" align="right">
<tr>
<td width="20" height="60" nowrap><IMG SRC="themes/dark-winter/images/pub.gif" width="20" height="60"></td>
<td width="468" nowrap height="60"><?php
if ($banners) {
    include("banners.php");
}
?>
</td>
</tr>
</table>
</DIV>
</td>
</tr>
</table>
</DIV>
</td>
<td width="141" height="68" nowrap><IMG SRC="themes/dark-winter/images/head-top-right.gif" width="141" height="68"></td>
</tr>
<tr>
<td align="left" valign="top" width="141" height="11"><IMG SRC="themes/dark-winter/images/head-bottom-left.gif" width="141" height="11"></td>
<td><DIV align="center"><b>
<?php
if ($username == "Anonymous") {
    echo "&nbsp;<font face=\"Arial, Helvetica, sans-serif\" size=\"1\" class=\"info\">"._LINKSNOTUSER8."</font>";
}
else
{
    echo "&nbsp;<font face=\"Arial, Helvetica, sans-serif\" size=\"1\" class=\"info\">"._HELLO." $username! |<a href=user.php>"._USERLOGIN."</a>||<a href=user.php?op=logout>"._LOGOUT."</a>|</font>";
}
?>
</b></DIV>
</td>
<td align="right" valign="top" width="141" height="11" nowrap><IMG SRC="themes/dark-winter/images/head-bottom-right.gif" width="141" height="11"></td>
</tr>
<tr>
<td>&nbsp;</td>
<td>
</td>
<td>&nbsp;</td>
</tr>
</table><br>
<table border="0" cellspacing="0" cellpadding="0">
<tr>
<td>&nbsp;</td>
<td align="center">
<table width="100%" border="0" cellspacing="0" cellpadding="0">
<tr>
<td>
<DIV align="center">
<SCRIPT>
    do_tabs("Home", "")
</SCRIPT>
</DIV>
</td>
</tr>
</table>
</td>
<td>&nbsp;</td>
</tr>
<tr>
<td align="left" valign="top" width="170" nowrap>
<?php
blocks(left);
?>
</td>
<td valign="top">
<?php
}
function themeindex ($aid, $informant, $time, $title, $counter, $topic, $thetext, $notes, $morelink, $topicname, $topicimage, $topictext) {
        if (!$config_called) {if (!isset($config)) {if (!isset($config)) { include("config.php"); }}}
        if ("$aid" == "$informant") { ?>
<table border=0 cellpadding=0 cellspacing=0 align=center bgcolor=1F87E0 width=100%>
<tr><td>
<table border=0 cellpadding=3 cellspacing=1 width=100%>
<tr><td background="themes/dark-winter/images/titre-back.gif">
<p><b><font face="Arial, Helvetica, sans-serif" size="2" class="titre"><?php echo"$title"; ?></font></b><br>
<font face="Arial, Helvetica, sans-serif" size="2" class="info"><?php echo ""._POSTEDBY." "; ?><?php formatAidHeader($aid) ?> <?php echo ""._ON.""; ?> <?php echo"$time"; ?> </font><br>
</td>
</tr>
<tr>
<td bgcolor=EEEEEE>
<a href="search.php?query=&topic=<?php echo"$topic"; ?>&author=">
<B><a href="search.php?query=&topic=<?php echo"$topic"; ?>&author="><IMG SRC=<?php echo"$tipath$topicimage"; ?> border=0 Alt=<?php echo"\"$topictext\""; ?> align=right hspace=10 vspace=10></a></B>
<P><font face="Arial, Helvetica, sans-serif" size="2"><?php echo"$thetext"; ?></font>
<br><br>
</td></tr><tr><td bgcolor=FFFFFF align=left>
<p><IMG SRC=\"themes/dark-winter/images/fleche1.gif\" width=\"8\" height=\"8\" border=\"0\" align=\"middle\"><?php echo "$morelink"; ?>
</td>
</tr>
</table>
</td>
</tr>
</table><br>
<?php
} else {
if($informant != "") $boxstuff = "<a href=\"user.php?op=userinfo&uname=$informant\">$informant</a> ";
else $boxstuff = "$anonymous ";
$boxstuff .= ""._WRITES." <i>\"$thetext\"</i> $notes";
?>
<table border=0 cellpadding=0 cellspacing=0 align=center bgcolor=1F87E0 width=100%>
<tr><td>
<table border=0 cellpadding=3 cellspacing=1 width=100%>
<tr><td background="themes/dark-winter/images/titre-back.gif">
<p><b><font face="Arial, Helvetica, sans-serif" size="2" class="titre"><?php echo"$title"; ?></font></b><br>
<font face="Arial, Helvetica, sans-serif" size="2" class="info"><?php echo ""._POSTEDBY." "; ?><?php formatAidHeader($aid); ?> <?php echo ""._ON.""; ?> <?php echo"$time"; ?> </font><br>
</td>
</tr>
<tr>
<td bgcolor=EEEEEE>
<a href="search.php?query=&topic=<?php echo"$topic"; ?>&author=">
<B><a href="search.php?query=&topic=<?php echo"$topic"; ?>&author="><IMG SRC=<?php echo"$tipath$topicimage"; ?> border=0 Alt=<?php echo"\"$topictext\""; ?> align=right hspace=10 vspace=10></a></B>
</a>
<?php echo"<font face=\"Arial, Helvetica, sans-serif\" size=\"2\">$boxstuff</font><br><br>
</td></tr><tr><td bgcolor=FFFFFF align=left>
<p><IMG SRC=\"themes/dark-winter/images/fleche1.gif\" width=\"8\" height=\"8\" border=\"0\" align=\"middle\"> $morelink"; ?>
</td>
</tr>
</table>
</td>
</tr>
</table><br>
<?php
}
}

function themearticle ($aid, $informant, $datetime, $title, $thetext, $topic, $topicname, $topicimage, $topictext) {
        global $admin, $sid, $tipath;
        if ("$aid" == "$informant") {
echo"

<table border=0 cellpadding=0 cellspacing=0 align=center bgcolor=000000 width=100%>
<tr><td>

<table border=0 cellpadding=3 cellspacing=0 width=100%>
<tr><td background=\"themes/dark-winter/images/titre-back.gif\">
<font face=\"Arial, Helvetica, sans-serif\" size=\"2\" class=\"titre\">
<b>$title</b></font><br><font face=\"Arial, Helvetica, sans-serif\" size=\"2\" class=\"info\"> On $datetime
";
if ($admin) {
    echo "&nbsp;&nbsp;  [ <a href=admin.php?op=EditStory&sid=$sid>"._EDIT."</a> | <a href=admin.php?op=RemoveStory&sid=$sid>"._DELETE."</a></font> ]";
}
echo "
</td>
</tr>
<tr>
<td bgcolor=ffffff>
<a href=search.php?query=&topic=$topic&author=><IMG SRC=$tipath$topicimage border=0 Alt=\"$topictext\" align=right hspace=10 vspace=10></a>
<font face=\"Arial, Helvetica, sans-serif\" size=\"2\">$thetext</font>
</td>
</tr>
</table>
</td>
</tr>
</table><br>
";

        } else {
                if($informant != "") $informant = "<a href=\"user.php?op=userinfo&uname=$informant\">$informant</a> ";
                else $boxstuff = "$anonymous ";
                $boxstuff .= ""._WRITES." <font face=\"Arial, Helvetica, sans-serif\" size=\"2\"><i>\"$thetext\"</i> $notes</font>";
echo "

<table border=0 cellpadding=0 cellspacing=0 align=center bgcolor=000000 width=100%>
<tr><td>
<table border=0 cellpadding=3 cellspacing=1 width=100%>
<tr><td bgcolor=CCCCCC>
<font face=\"Arial, Helvetica, sans-serif\" size=\"2\" class=\"titre\">
<b>$title</b></font><br><font face=\"Arial, Helvetica, sans-serif\" size=\"2\" class=\"info\"> "._POSTEDBY." $informant "._ON." $datetime</font>
";
if ($admin) {
    echo "&nbsp;&nbsp; $font2 [ <a href=admin.php?op=EditStory&sid=$sid>"._EDIT."</a> | <a href=admin.php?op=RemoveStory&sid=$sid>"._DELETE."</a> ]";
}
echo "
</td>
</tr>
<tr>
<td bgcolor=ffffff>
<a href=search.php?query=&topic=$topic&author=><IMG SRC=$tipath$topicimage border=0 Alt=\"$topictext\" align=right hspace=10 vspace=10></a>
<font face=\"Arial, Helvetica, sans-serif\" size=\"2\"> $thetext </font>
</td>
</tr>
</table>
</td>
</tr>
</table><br>
";

        }
}

function themefooter() {
global $index;
if ($index == 1) {
?>
    </td>
    <?php
    echo "<td valign=\"top\" width=\"170\" align=\"right\" nowrap>";
    blocks(right);
}
    echo "</td>";?>
</tr>
<tr>
<td>&nbsp;</td>
<td>&nbsp;</td>
<td>&nbsp;</td>
</tr>
<tr>
<td>&nbsp;</td>
<td align="center">
<table width="100%" border="0" cellspacing="0" cellpadding="0" align="center">
<tr>
<td width="160" height="14" nowrap valign="bottom"><IMG SRC="themes/dark-winter/images/box-top.gif" width="160" height="14"></td>
<td width="100%" nowrap>&nbsp;</td>
<td width="160" height="14" nowrap valign="bottom"><IMG SRC="themes/dark-winter/images/box-top-right.gif" width="160" height="14"></td>
</tr>
<tr>
<td bgcolor="#1F87E0" colspan="3">
<DIV align="center"><font face="Arial, Helvetica, sans-serif" size="2"><br><?php echo footmsg(); ?><br><br></font></DIV>
</td>
</tr>
<tr>
<td width="160" height="14" nowrap valign="top"><IMG SRC="themes/dark-winter/images/box-bottom.gif" width="160" height="14"></td>
<td>&nbsp;</td>
<td width="160" height="14" nowrap valign="top"><IMG SRC="themes/dark-winter/images/box-bottom-right.gif" width="160" height="14"></td>
</tr>
</table>
</td>
<td>&nbsp;</td>
</tr>
</table><br>br>


<?php
}


function themesidebox($title, $content) {
     ?>
<table width="160" border="0" cellspacing="0" cellpadding="0">
<tr>
<td><IMG SRC="themes/dark-winter/images/box-top.gif" width="160" height="14" align="absbottom"></td>
</tr>
<tr>
<td bgcolor="#1F87E0">
<table width="100%" border="0" cellspacing="0" cellpadding="0">
<tr>
<td><font face="Arial, Helvetica, sans-serif" size="2" class="titrebox">&nbsp;&nbsp;<b><?php echo"$title"; ?></b><br></font></td>
<tr>
<td width="160" height="3" nowarp><IMG SRC="themes/dark-winter/images/box-line.gif" width="160" height="3"></td>
</tr>
</tr>
</table>
</td>
</tr>
<tr>
<td bgcolor="#FFFFFF">
<table width="100%" border="0" cellspacing="0" cellpadding="4">
<tr>
<td><font face="Arial, Helvetica, sans-serif" size="2"><?php echo"$content"; ?></font></td>
</tr>
</table><br></td>
</tr>
<tr>
<td width="160" height="3" nowarp><IMG SRC="themes/dark-winter/images/box-line.gif" width="160" height="3"></td>
</tr>
<tr>
<td><IMG SRC="themes/dark-winter/images/box-bottom.gif" width="160" height="14"></td>
</tr>
</table><br>


<?php
}

?>
