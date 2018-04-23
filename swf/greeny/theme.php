<?php
$thename = "greeny";

$TablebgColor_A ="#000000";
$TablebgColor_B ="#FFFFFF";
$LinksTableRowColor = "#7bcead";
$bgcolor1 = "#F9F9F9";
$bgcolor2 = "#7bcead";
$bgcolor3 = "#efe2f0";
$textcolor1 = "#FFFFFF";
$textcolor2 = "#000000";
$pollcolor = "#7bcead";

$hr = 1; # 1 to have horizonal rule in comments instead of table bgcolor

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
cookiedecode($user);
$username = $cookie[1];
if ($username == "") {
        $username = "Anonymous";
}
?>
<body topmargin="0" leftmargin="0" marginwidth="0" marginheight="0" bgcolor="#ffffff" text="#000000" link="#3661a1" vlink="#6f6c81" alink="#d5ae83">
<TABLE cellpadding=0 cellspacing=0 width="95%" border="0" align="center" bgcolor="green">
<TR valign="center" span="3">
<td align=left width="20%"><A href="/"><IMG alt="<?php echo $sitename ?>" src="themes/greeny/images/title.gif" border=0 align=left></A>
</TD>
<td>
<?php

    include("banners.php");

?>
</td>
<td width="18%" background="themes/greeny/images/fonduser.gif" align="center">
<?php
echo "
	<br><form action=search.php method=post>
	<font size=2><input type=text name=query width=20 size=15 length=20>
	<br><br><input type=submit value=\""._SEARCH."\">
	</form>";
?>
</td>
</TR>
</TABLE>
        <TABLE cellpadding=0 width="95%" border="0" align="center" bgcolor="#7bcead">
        <TR valign="center" bgcolor="#7bcead">
<TD width="25%"><font size="-1" color="#3661a1"><b>
<?php
if ($username == "Anonymous") {
    echo "<font class=catdesc>&nbsp;<font color=#3661a1><a href=\"user.php\">Create</a>&nbsp;</font><font color=#3661a1>an account";
}
else
{
    echo ""._HELLO.", $username";
}
?>
</b></font></TD>
<TD align="middle" height="20"><FONT size="-1"><B>
&nbsp<A href="index.php">"._MAIN."</A>
&nbsp
<A href="submit.php">"._SUBMITNEWS."</A>
&nbsp
<A href="links.php">"._LINKS."</A>
&nbsp
<A href="user.php">"._USERLOGIN."</A>
&nbsp
<A href="friend.php">"._RECOMMEND."</A>
</B></FONT>
</TD>
<TD align="right" width="25%"><FONT class=catdesc><b>
<script language=JavaScript>
      <!--   // Array ofmonth and days Names
      var dayNames = new Array("dimanche","Lundi","Mardi","Mercredi","Jeudi","Vendredi","samedi"); 
      var monthNames = new Array( "Janvier","Fevrier","Mars","Avril","Mai","Juin","Juillet","Août","Septembre","Octobre","Novembre","Decembre");
      var now = new Date();
      thisYear = now.getYear();
      if(thisYear < 1900) {thisYear += 1900}; // corrections if Y2K display problem
      document.write(dayNames[now.getDay()]+" "+now.getDate() + " " + monthNames[now.getMonth()] +" " + thisYear);
      // --> 
</script></b>&nbsp;&nbsp;</FONT></TD>
</tr>		
</TABLE>
<table cellpadding="3" cellspacing="3" width="95%" border="0" align="center" bgcolor="#7bcead">
<tr>
<td width="15%" valign="top">
<?php
blocks(left);
?>
</td>
<td valign="top" bgcolor="#fefefe">
<?php
}

function themefooter() {
global $index;
if ($index == 1) {
?>
</td>
<td width="15%" valign="top">
<?php
    blocks(right);
    echo "</td>";
}

?>
</td>
</tr></table><br>

<?php
footmsg();
?>
<?php
}

function themeindex ($aid, $informant, $time, $title, $counter, $topic, $thetext, $notes, $morelink, $topicname, $topicimage, $topictext) {
	if (!$config_called) {if (!isset($config)) {if (!isset($config)) { include("config.php"); }}}
	if ("$aid" == "$informant") { ?>
<!-- title -->
<table width=100% cellpadding=0 cellspacing=0 border=0 bgcolor="#7bcead">
<tr valign="bottom"><td align="left"><FONT class=catdesc><font color=486591><B><?php echo"$title"; ?></B></FONT></td>
<td align="right" valign="center" width="1%"><IMG height=14 alt="" src="themes/greeny/images/endcap.gif" width=14>&nbsp;</td></tr>
<TR valign="bottom"><TD bgcolor="#cecece" width="100%" colspan=2><IMG src="themes/yeeppp/images/pixel.gif" width=1 height=1 alt=""></TD></TR>
</table>
<!-- topic -->
<FONT color="#999999"><B><a href="search.php?query=&topic=<?php echo"$topic"; ?>&author="><img src=<?php echo"$tipath$topicimage"; ?> border=0 Alt=<?php echo"\"$topictext\""; ?> align=right hspace=10 vspace=10></a></B></FONT>

<FONT class=catdesc><font color="#505050"><P><?php echo"$thetext"; ?>
</FONT>
<P>
<DIV align="right">
<?php echo"$time $timezone - "._POSTEDBY.""; ?>&nbsp;<?php formatAidHeader($aid) ?>  </FONT>
<FONT size="-1" color="#cccccc"><I>&gt;&gt;</I></FONT><br>
<?php echo"$morelink"; ?>
<P></P></DIV>
<P>

<?php	} else { ?>
<table width=100% cellpadding=0 cellspacing=0 border=0>
<tr valign="bottom"><td align="left"><FONT class=catdesc><font color=486591><B><?php echo"$title"; ?></B></FONT><BR><IMG src="themes/yeeppp/images/pixel.gif" height=3 width=1 alt=""><br></td>
<td align="right" width="1%"><IMG height=14 alt="" src="themes/yeeppp/images/endcap-grey.gif" width=14></td></tr>
<TR valign="bottom"><TD bgcolor="#cecece" width="100%" colspan=2><IMG src="themes/yeeppp/images/pixel.gif" width=1 height=1 alt=""></TD></TR>
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
<FONT color="#999999"><?php echo"$time $timezone - "._POSTEDBY.""; ?>&nbsp;<?php formatAidHeader($aid) ?>  </FONT>
<FONT size="-1" color="#cccccc"><I>&gt;&gt;</I></FONT><br>
<?php echo"$morelink"; ?>
<P></P></DIV>
<?php	}
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
    echo "&nbsp;&nbsp; $font2 [ <a href=admin.php?op=EditStory&sid=$sid>"._EDIT."</a> | <a href=admin.php?op=RemoveStory&sid=$sid>"._EDIT."</a> ]";
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
<TABLE width="140" cellpadding=1 cellspacing=3 border=0 bgcolor="#7bcead">
<TR valign="bottom">
<TD align="left" bgcolor="#24b400"><font class=catdesc><b><?php echo"$title"; ?></B></font><IMG src="themes/yeeppp/images/pixel.gif" height=3 width=1 alt=""></TD>
</TR>
<tr><td colspan=2 bgcolor="#7bcead">
<font class=catdesc><?php echo"$content"; ?>
</tr>
</TABLE>
<?php  }
?>
