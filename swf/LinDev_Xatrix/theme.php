<?php
$thename = "LinDev_Xatrix";

$TablebgColor_A ="#000000";
$TablebgColor_B ="#FFFFFF";
$LinksTableRowColor = "#e9edf5";
$bgcolor1 = "#F9F9F9";
$bgcolor2 = "#e9edf5";
$bgcolor3 = "#e6e6e6";
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

function themeheader() {
global $user, $sitename, $username, $cookie;
cookiedecode($user);
$username = $cookie[1];
if ($username == "") {
        $username = "Anonymous";
}
?>
<body bgcolor="#ffffff" leftmargin="0" topmargin="0" marginwidth="0" marginheight="0" text="#000000" link="#3661a1" vlink="#6f6c81" alink="#d5ae83">

<TABLE border="0" cellPadding="0" cellSpacing="0" width="100%">
        <TBODY>
        <TR>
          <TD bgColor="#eeeeee"><IMG align="middle" 
border="0" height="33" src="themes/LinDev_Xatrix/images/vertical-divider-topsolid.gif" width="1" alt=""><IMG 
border="0"height="11" src="themes/LinDev_Xatrix/images/arrow-section.gif" width="15" alt=""><i><b><FONT 
color="#808080" face="verdana,Arial,helvetica" size="1"><a href="http://www.xatrix.org">Xatrix.org</a>; 
Security is completely theoretical</font></b></i></TD>
          <TD align=right background="/themes/LinDev_Xatrix/images/background-4.gif" bgColor="#eeeeee"><FONT color=#808080 
            face=verdana,Arial,helvetica size=1><form action="search.php" method=get><B>Explore:</B></FONT>
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
</FONT></TD></FORM></TR>
        <TR>
          <TD 
          background="themes/LinDev_Xatrix/images/background-2solid.gif" 
          bgColor=#ffffff width="99%"><IMG border=0 height=1 
            src="themes/LinDev_Xatrix/images/spacer.gif" width=1></TD>
          <TD align=right 
          background="themes/LinDev_Xatrix/images/background-2solid.gif" 
          bgColor=#ffffff><a href="<?php $nuke_url ?>backend.php"><IMG
            border=0 height=16 
            src="themes/LinDev_Xatrix/images/link-newsfeed.gif" 
            width=109></a><a href="http://www.linuxdeveloper.net/modules.php?op=modload&amp;name=Forum&amp;file=index"><IMG border=0 
            height=16 
            src="themes/LinDev_Xatrix/images/link-community.gif" 
            width=89></a></TD></TR></TBODY></TABLE>
<TABLE border=0 cellPadding=0 cellSpacing=0 width="100%">
  <TBODY>
  <TR>
    </TBODY></TABLE>
<TABLE align="center" bgColor="#ffffff" border="0" cellPadding="0" cellSpacing="0" width="100%">
  <TBODY>
  <TR vAlign=bottom>
    <TD align="left"><A href="<?php echo $nuke_url ?>"><IMG alt=<?php echo $sitename ?> border="0" 
      height="101" hspace="15" 
      src=<?php echo $nuke_url ?>"/images/logo.gif" 
      width=302></A></TD>
      <TR vAlign="bottom">
    <TD align="left" bgcolor="#000000" width="100%" colspan="2">
      <p align="center"><font size="2" face="Arial" color="#FFFFFF"><?php
if ($username == "Anonymous") {
    echo "<font class=\"infoa\">&nbsp;<a href=\"user.php\" class=\"infoa\"><font class=\"infoa\"><b>Please Register to be a member</b>&nbsp;</a></b>";
}
else
{
    echo "&nbsp;&nbsp;<FONT size=\"-1\" class=\"infoa\"><b>Wassup $username?</b>";
}
?></font>
    </TD>
  </TR></TBODY></TABLE>
<?php        if ($username == "Anonymous") {
echo  "<TABLE cellSpacing=\"0\" cellPadding=\"0\" width=\"100%\" border=\"0\" align=\"center\" nowrap>"
      ."<TR>"
      ."<TD bgcolor=\"#000000\" colspan=\"6\"><IMG src=\"themes/LinDev_Xatrix/images/pixel.gif\" width=\"1\" height=\"1\" alt=\"\" border=\"0\" hspace=\"0\"></TD>" 
      ."</TR>"
     ."<tr bgcolor=\"#A8A8A8\"><td nowrap><form action=\"user.php\" method=\"post\">&nbsp;"
     ."<font class=\"infoa\">Login&nbsp;</font></font><input class=\"textbox\" type=\"text\" name=\"uname\" size=\"12\" maxlength=\"25\">"
     ."&nbsp;<font class=\"infoa\">Password&nbsp;</font><input class=\"textbox\" type=\"password\" name=\"pass\" size=\"12\" maxlength=\"20\">"
     ."</td><td width=\"100%\" align=\"left\" valign=\"middle\">&nbsp;&nbsp;"
     ."<input type=image src=\"themes/LinDev_Xatrix/images/login.gif\" border=\"0\">"
     ."<a href=\"user.php\"><img src=\"themes/LinDev_Xatrix/images/register.gif\" border=\"0\"></a>"
     ."<input type=\"hidden\" name=\"op\" value=\"login\"></td></tr>"
     ."<TR>"
     ."<TD bgcolor=\"#000000\" colspan=\"6\"><IMG src=\"themes/LinDev_Xatrix/images/pixel.gif\" width=\"1\" height=\"1\" alt=\"\" border=\"0\" hspace=\"0\"></TD>"
     ."</TR>"
     ."</TABLE></form>";
     }
else
{    echo  "<TABLE cellSpacing=\"0\" cellPadding=\"0\" width=\"100%\" border=\"0\" align=\"center\" nowrap>"
     ."<TR>"
      ."<TD bgcolor=\"#000000\" colspan=6><IMG src=\"themes/LinDev_Xatrix/images/pixel.gif\" width=1 height=1 alt=\"\" border=0 hspace=0></TD>"
      ."</TR>"
     ."<td width=\"50%\" nowrap bgcolor=\"#a8a8a8\" align=\"center\">"
     ."<a href=\"user.php?op=logout\"><img src=\"themes/LinDev_Xatrix/images/logout.gif\" border=\"0\"></a>"
     ."<a href=\"user.php\"><img src=\"themes/LinDev_Xatrix/images/perso.gif\" alt=\"\" border=\"0\"></a>"
     ."<a href=\"index.php\"><img src=\"themes/LinDev_Xatrix/images/home.gif\" alt=\"HOME\" border=\"0\"></a>"
     ."<a href=\"submit.php\"><img src=\"themes/LinDev_Xatrix/images/submit.gif\" alt=\"Post News\" border=\"0\"></a>"
     ."</tr>"
     ."<TR>"
     ."<TD bgcolor=\"#000000\" colspan=6><IMG src=\"themes/LinDev_Xatrix/images/pixel.gif\" width=1 height=1 alt=\"\" border=0 hspace=0></TD>"
     ."</TR></TABLE>";
}
?>

<TABLE width="100%" cellpadding="0" cellspacing="0" border="0" bgcolor="#fefefe" align="center" nowrap >
<!-- tr><td colspan="5">&nbsp</td><td width=80%><IMG src="themes/LinDev_Xatrix/images/pix.gif" height="1" width="350" alt=""></td><td colspan="5">&nbsp</td><tr -->
<TR valign="top">
</TR>
<TR valign="top"><TD width="10"><IMG src="themes/LinDev_Xatrix/images/pixel.gif" height="1" width="16" alt=""></TD>
<TD width="120">
<P align="center">
<P>     <P>
<TABLE width="100%" cellpadding="0" cellspacing="0" border="0">
<TR valign="bottom">
<?php
blocks(left);
?>

<TD width="16"><IMG src="themes/LinDev_Xatrix/images/pixel.gif" height="1" width="16" alt=""></TD>
<TD background="themes/LinDev_Xatrix/images/checkerboard.gif" width="1"><IMG src="themes/LinDev_Xatrix/images/pixel.gif" height="1" width="1" alt=""></TD>
<TD width="16"><IMG src="themes/LinDev_Xatrix/images/pixel.gif" height="1" width="16" alt=""></TD>
<td>
<P><H2 align="center"> <?php
if ($banners) {
    include("banners.php");
}
?>
</H2>
<P align="center"><P>
<?php
}

function themefooter() {
global $index;
if ($index == 1) {
?>
<br>
<TD width="16"><IMG src="themes/LinDev_Xatrix/images/pixel.gif" height="1" width="16" alt=""></TD>
<TD background="themes/LinDev_Xatrix/images/checkerboard.gif" width="1"><IMG src="themes/LinDev_Xatrix/images/pixel.gif" height="1" width="1" alt=""></TD>
<TD width="16"><IMG src="themes/LinDev_Xatrix/images/pixel.gif" height="1" width="8" alt=""></TD>
<?php
    echo "<td valign=\"top\">";
    blocks(right);
    echo "</td>";
}

?>
<td width="10">&nbsp</td>
<tr>
<TD align="middle" height="1" colspan="11" background="themes/LinDev_Xatrix/images/checkerboard.gif">
                <IMG height="1" alt="" hspace="0" src="themes/LinDev_Xatrix/images/pixel.gif" width="1" height="1" align="left">
</TR>
</TABLE>
</td></tr></table><center>
LinDev_Xatrix, a modified version of Linux Developer theme. Phiber, <a href="http://www.xatrix.org">Xatrix.org</a></center>

<?php
}

function themeindex ($aid, $informant, $time, $title, $counter, $topic, $thetext, $notes, $morelink, $topicname, $topicimage, $topictext) {
        if (!$config_called) {if (!isset($config)) {if (!isset($config)) { include("config.php"); }}}
        if ("$aid" == "$informant") { ?>


<!-- title -->
<table width="100%" cellpadding="0" cellspacing="0" border="0">
<tr valign="bottom"><td align="left"><FONT class=catdesc><font color="486591" size="2" face="Arial"><B><?php 
echo"$title"; ?></B></FONT><BR><IMG src="themes/LinDev_Xatrix/images/pixel.gif" height=3 width=1 alt=""><br></td>
<td align="right" width="1%"><IMG height=14 alt="" src="themes/LinDev_Xatrix/images/endcap-grey.gif" width=14></td></tr>
<TR valign="bottom"><TD bgcolor="#cecece" width="100%" colspan=2><IMG src="themes/LinDev_Xatrix/images/pixel.gif" width=1 height=1 alt=""></TD></TR>
</table>
<!-- topic -->
<FONT color="#999999" font size=1 face=Arial><B></B></FONT>
<br>
<FONT color="#999999"><B></B></FONT>

<FONT class=catdesc><font color="#505050" size=2 face=Arial><P><?php echo"$thetext"; ?>
</FONT>
<P>
<DIV align="center">
(<?php echo $counter ?> reads)
<FONT size="-1" color="#cccccc"><I></I></FONT><br>
<?php echo"$morelink"; ?>
<P></P></DIV>
<P>

<?php        } else { ?>
<!--By User-->

<!-- title -->
<table width=100% cellpadding=0 cellspacing=0 border=0>
<tr valign="bottom"><td align="left"><FONT class=catdesc><font color=486591 size=2 face=Arial><B><?php echo"$title"; ?></B></FONT><BR><IMG src="themes/Linux/images/pixel.gif" height=3 width=1 alt=""><br></td>
<td align="right" width="1%"><IMG height=14 alt="" src="themes/LinDev_Xatrix/images/endcap-grey.gif" width=14></td></tr>
<TR valign="bottom"><TD bgcolor="#cecece" width="100%" colspan=2><IMG src="themes/LinDev_Xatrix/images/pixel.gif" width=1 height=1 alt=""></TD></TR>
</table>
<!-- topic -->
<FONT color="#999999" size=1 face=Arial><B>By&nbsp;<?php echo"<a href=\"user.php?op=userinfo&uname=$informant\">$informant</a>"; ?><br><?php echo"$time"; ?></B></FONT>
<br>
<FONT color="#999999"><B></B></FONT>

<FONT class=catdesc><font color="#505050" size=2 face=Arial><P><?php echo"$thetext"; ?>
</FONT>
<P>
<DIV align="right">
<FONT size="-1" color="#cccccc"><I></I></FONT><br>
<?php echo"$morelink"; ?>
<P></P></DIV>
<?php        }
}


function themearticle ($aid, $informant, $datetime, $title, $thetext, $topic, $topicname, $topicimage, $topictext) {
        if (!$config_called) {if (!isset($config)) {if (!isset($config)) { include("config.php"); }}}
        if ("$aid" == "$informant") {
echo"
<!-- article -->
<table width=100% cellpadding=0 cellspacing=0 border=0>
<tr valign=bottom><td align=left><FONT color='#486591' scolor='#000000' size=2 face=Arial><B>$title</B></FONT><IMG src=themes/Linux/images/pixel.gif height=3 width=1><br></td>
<td align=right width=1%><IMG height=14 src=themes/LinDev_Xatrix/images/endcap-grey.gif width=14></td></tr>
<TR valign=bottom><TD bgcolor=#cecece width=100% colspan=2><IMG src=themes/LinDev_Xatrix/images/pixel.gif width=1 height=1></TD></TR>
</table>
$datetime ";
global $admin, $sid;
if ($admin) {
    echo "&nbsp;&nbsp; $font2 [ <a href=admin.php?op=EditStory&sid=$sid>"._EDIT."</a> | <a href=admin.php?op=RemoveStory&sid=$sid>"._DELETE."</a> ]";
}
echo "
<a href=search.php?query=&topic=$topic&author=><img src=$tipath$topicimage border=0 Alt=\"$topictext\" align=right hspace=10 vspace=10></a>
<br><br><br>$thetext
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
<br><br><br>$thetext
<br>
";

        }
}

function themesidebox($title, $content) {
     ?><br>
<TABLE width="130" border="0" cellspacing="0" cellpadding="0">
        <TR>
          <TD bgcolor="#a8a8a8">&nbsp;</TD>
          <TD bgcolor="#a8a8a8" height="16" width="130" class=title nowrap><p align="center"><b><font size="2" face="Arial"><?php echo"$title"; ?></font></b></p></TD>
          <TD bgcolor="#a8a8a8" height="16">&nbsp;</TD>
        </TR>
        <TR>
          <TD background="themes/LinDev_Xatrix/images/tab-left.gif" width="8">&nbsp;</TD>
          <TD background="themes/LinDev_Xatrix/images/tab-center.gif" width="130"><font size="1" face="verdana"><?php echo"$content"; ?></font></TD>
          <TD width="8" background="themes/LinDev_Xatrix/images/tab-right.gif">&nbsp;</TD>
        </TR>
        <TR>
          <TD width="8" height="8"><img border="0" src="themes/LinDev_Xatrix/images/bottom-left.gif"></TD>
          <TD height="8" width="130">
            <p align="center"><img border="0" src="themes/LinDev_Xatrix/images/bottom-center.gif"></TD>
          <TD width="8" height="8"><img border="0" src="themes/LinDev_Xatrix/images/bottom-right.gif"></TD>
        </TR>
      </TABLE>

<?php }
?>
