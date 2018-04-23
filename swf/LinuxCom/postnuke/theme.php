<?php
$TablebgColor_A ="#000000";
$TablebgColor_B ="#FFFFFF";
$LinksTableRowColor = "#e9edf5";
$bgcolor1 = "#cccccc";
$bgcolor2 = "#e9edf5";
$bgcolor3 = "#e6e6e6";
$textcolor1 = "#FFFFFF";
$textcolor2 = "#000000";
$pollcolor = "#e9edf5";
$hr = 0; # 1 to have horizonal rule in comments instead of table bgcolor
$index = "1";

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

echo "<body topmargin=0 leftmargin=0 marginwidth=0 marginheight=0 bgcolor=#505050 text=#000000 link=#3661a1 vlink=#6f6c81 alink=#d5ae83><br>";
if ($banners) {
    include("banners.php");
}

echo "<br>
<TABLE cellpadding=0 cellspacing=0 width=95% border=0 align=center bgcolor=#fefefe>
<TR valign=top bgcolor=#eeeeee>
<TD align=middle bgcolor=#ffffff background=themes/LinuxCom/images/streamline-bg.gif>
<IMG src=\"themes/LinuxCom/images/roundcorner-tl.gif\" height=16 alt=\"\" hspace=0 width=17 align=left>
<A href=\"/\"><IMG src=themes/LinuxCom/images/title.gif alt=\"$sitename\" hspace=0 vspace=4 border=0></A></TD>
<TD bgcolor=#999999><IMG src=\"themes/LinuxCom/images/pixel.gif\" width=1 height=1 alt=\"\" border=0 hspace=0></TD>
<TD align=middle>
<CENTER><form action=search.php method=post><font size=\"-1\" color=#000000><br><b>"._SEARCH." $sitename</b><br>
<input type=name name=query size=14></font></form></CENTER></TD>
<TD align=middle>
<IMG height=17 alt=\"\" hspace=0 src=\"themes/LinuxCom/images/roundcorner-tr.gif\" width=17 align=right >
<CENTER><form action=search.php method=get><FONT size=\"-1\"><BR><B>"._SEARCH."</B> "._TOPIC.":<BR>";

    $toplist = mysql_query("select topicid, topictext from topics order by topictext");
    echo "<SELECT NAME=\"topic\"onChange='submit()'>" ;
    echo "<OPTION VALUE=\"\">"._ALLTOPICS."</option>\n";
    while(list($topicid, $topics) = mysql_fetch_row($toplist)) {
    if ($topicid==$topic) { $sel = "selected "; }
	echo "<option $sel value=\"$topicid\">$topics</option>\n";
    $sel = "";
    }
    echo "</SELECT>

</FONT></FORM></CENTER>
        </TD>
        </TR>
</TABLE>
        <TABLE cellpadding=0 cellspacing=0 width=\"95%\" border=\"0\" align=center bgcolor=#fefefe>
        <TR>
                <TD bgcolor=#000000 colspan=6><IMG src=themes/LinuxCom/images/pixel.gif width=1 height=1 alt=\"\" border=0 hspace=0></TD>
        </TR>
        <TR valign=center bgcolor=\"#e9edf5\">
<TD width=28% nowrap><font size=\"-1\" color=\"#3661a1\"><b>";

if ($username == "Anonymous") {
    echo "<b>(Why not <font color=#3661a1><a href=\"user.php\">sign up</a></font> for an account?*)</b>";
}
else
{
    echo ""._HELLO." $username";
}

echo "</b></font></TD>
<TD align=middle height=20 colspan=2 nowrap><FONT size=\"-1\"><B>
<A href=\"/\">"._MAIN."</A>
::
<A href=\"modules.php?op=modload&name=Submit_News&file=index\">"._SUBMITNEWS."</A>
::
<A href=\"modules.php?op=modload&name=Web_Links&file=index\">"._LINKS."</A>
::
<A href=user.php>"._PREFERENCES."</A>
::
<A href=\"?theme=.print\">Print*</A>
::
<A href=\"modules.php?op=modload&name=Sections&file=index\">"._SECTIONS."</A>
</B></FONT>
</TD>
<TD align=right width=\"25%\" colspan=2 nowrap><FONT size=\"-1\"><b>";
echo "<script language=JavaScript>\n"
        ."<!--   // Array ofmonth Names\n"
        ."var monthNames = new Array( \""._JAN."\",\""._FEB."\",\""._MAR."\",\""._APR."\",\""._MAY."\",\""._JUN."\",\""._JUL."\",\""._AUG."\",\""._SEP."\",\""._OCT."\",\""._NOV."\",\""._DEC."\");\n"
        ."var now = new Date();\n"
        ."thisYear = now.getYear();\n"
        ."if(thisYear < 1900) {thisYear += 1900}; // corrections if Y2K display problem\n"
        ."document.write(monthNames[now.getMonth()] + \" \" + now.getDate() + \", \" + thisYear);\n"
        ."// -->\n"
        ."</script></b>&nbsp;&nbsp;</FONT></TD>
<td>&nbsp;</td>
</tr>		
        <TR>
                <TD colspan=6 bgcolor=#000000><IMG src=themes/LinuxCom/images/pixel.gif width=1 height=1 alt=\"\" border=0 hspace=0></TD>
        </TR>
        </TABLE>
<TABLE width=\"95%\" cellpadding=0 cellspacing=0 border=0 bgcolor=#fefefe align=center nowrap >
	<!-- tr><td colspan=5>&nbsp</td><td width=80%><IMG src=themes/LinuxCom/images/pix.gif height=1 width=350 alt=\"\"></td><td colspan=5>&nbsp</td><tr -->
      <TR valign=top>
        <TD bgcolor=#ffffff colspan=11 nowrap><IMG src=themes/LinuxCom/images/pixel.gif width=1 height=16></TD>
        </TR>
        <TR valign=top><TD width=50><IMG src=themes/LinuxCom/images/pixel.gif height=1 width=16 alt=\"\"></TD>
        <TD width=120>
        <P align=center>
        <P>     <P>
        <TABLE width=100% cellpadding=0 cellspacing=0 border=0>
        <TR valign=bottom>";
blocks(left);
echo "<TD width=16><IMG src=\"themes/LinuxCom/images/pixel.gif\" height=1 width=16 alt=\"\"></TD>
<TD background=\"themes/LinuxCom/images/checkerboard.gif\" width=1><IMG src=\"themes/LinuxCom/images/pixel.gif\" height=1 width=1 alt=\"\"></TD>
<TD width=16><IMG src=\"themes/LinuxCom/images/pixel.gif\" height=1 width=16 alt=\"\"></TD>
<td>
<P><H2 align=center> </H2>
<P align=center><P>";
}

function themefooter() {
global $index;
if ($index == 1) {
echo "<TD width=16><IMG src=themes/LinuxCom/images/pixel.gif height=1 width=16 alt=\"\"></TD>
<TD background=\"themes/LinuxCom/images/checkerboard.gif\" width=1><IMG src=\"themes/LinuxCom/images/pixel.gif\" height=1 width=1 alt=\"\"></TD>
<TD width=16><IMG src=\"themes/LinuxCom/images/pixel.gif\" height=1 width=8 alt=\"\"></TD>
<td valign=top>";
blocks(right);
echo "</td>";
}

echo "<td width=10>&nbsp</td>
<tr>
<TD align=middle height=17 colspan=11>
                <IMG height=17 alt=\"\" hspace=0 src=\"themes/LinuxCom/images/roundcorner-bl.gif\" width=17 align=left >
                <IMG height=17 alt=\"\" hspace=0 src=\"themes/LinuxCom/images/roundcorner-br.gif\" width=17 align=right >
        </TD>
      </TR>
    </TABLE>
	</td></tr></table>";

footmsg();
}

function themefeature($fulltext)
{
  echo "<TABLE width=100% cellpadding=0 cellspacing=0 border=0>
        <TR valign=bottom>
<TD align=left><br><B>Feature Story</B><BR><IMG src=\"themes/LinuxCom/images/pixel.gif\" height=3 width=1 alt=\"\"></TD>
<TD align=right width=\"1%\"><IMG height=14 alt=\"\" src=themes/LinuxCom/images/endcap-grey.gif width=14></TD>
</tr>
<TR valign=bottom><TD bgcolor=#cecece width=100% colspan=2><IMG src=themes/LinuxCom/images/pixel.gif width=1 height=1 alt=\"\"></TD></TR>
        </TABLE><P><FONT size=\"-1\"><P align=center>
<P>
<FONT size=\"-1\" color=#505050>";
echo $fulltext;
echo "</FONT>
<P>
        <TABLE width=100% cellpadding=0 cellspacing=0 border=0>
		<tr><td colspan=2 background=themes/LinuxCom/images/checkerboard.gif height=1><IMG src=themes/LinuxCom/images/pixel.gif height=1 width=1 alt=\"\"></TD></tr>
        <tr><td>&nbsp;</td><td>&nbsp;</td></tr>
		<TR valign=\"bottom\">
        <TD align=left><B> News Articles </B><BR><IMG src=themes/LinuxCom/images/pixel.gif height=3 width=1 alt=\"\"></TD>
<TD align=\"right\" width=\"1%\"><IMG height=14 alt=\"\" src=\"themes/LinuxCom/images/endcap.gif\" width=15></TD>
</TR>
        <TR valign=\"bottom\"><TD bgcolor=\"#000000\" width=\"100%\" colspan=2><IMG 
                src=\"themes/LinuxCom/images/pixel.gif\" width=1 height=1
                alt=\"\"></TD></TR>
        </TABLE>
		<br><p>";
}

function themeindex ($aid, $informant, $time, $title, $counter, $topic, $thetext, $notes, $morelink, $topicname, $topicimage, $topictext) {
	if (!$config_called) {if (!isset($config)) {if (!isset($config)) { include("config.php"); }}}
	if ("$aid" == "$informant") {
echo "<table width=100% cellpadding=0 cellspacing=0 border=0>
<tr valign=\"bottom\"><td align=\"left\"><FONT color=\"#486591\" scolor=\"#000000\"><B>$title</B></FONT><BR><IMG src=\"themes/LinuxCom/images/pixel.gif\" height=3 width=1 alt=\"\"><br></td>
<td align=\"right\" width=\"1%\"><IMG height=14 alt=\"\" src=\"themes/LinuxCom/images/endcap-grey.gif\" width=14></td></tr>
<TR valign=\"bottom\"><TD bgcolor=\"#cecece\" width=\"100%\" colspan=2><IMG src=\"themes/LinuxCom/images/pixel.gif\" width=1 height=1 alt=\"\"></TD></TR>
</table>
<!-- topic -->
<FONT color=#999999><B><a href=\"search.php?query=&topic=$topic&author=\"><img src=\"$tipath$topicimage\" border=0 Alt=$topictext align=right hspace=10 vspace=10></a></B></FONT>

<FONT size=\"-1\" color=\"#505050\"><P>$thetext</FONT>

<DIV align=right>
<FONT color=#999999>$time $timezone - ";
formatAidHeader($aid);
echo "</FONT>
<FONT size=\"-1\" color=\"#cccccc\"><I>&gt;&gt;</I></FONT><br>$morelink<P></P></DIV>
<P>";
} else {
		if($informant != "") $boxstuff = "<a href=\"user.php?op=userinfo&uname=$informant\">$informant</a> ";
		else $boxstuff = "$anonymous ";
		$boxstuff .= ""._WRITES." <i>\"$thetext\"</i><br> $notes";

echo "<FONT color=\"#999999\"><B><a href=\"search.php?query=&topic=$topic&author=\"><img src=$tipath$topicimage border=0 Alt=$topictext align=right hspace=10 vspace=10></a></B></FONT>
<FONT color=#486591 scolor=#000000><B>$title</B>"._POSTEDBY."";
formatAidHeader($aid);
echo "</FONT><BR>
<FONT size=\"-1\" color=\"#505050\"><P>$time $timezone&nbsp;&nbsp;&nbsp; [ <a href=\"search.php?query=&topic=$topic&author=\"><b>$topictext</b></a> ]<br>
$boxstuff
      </font>
$morelink
<br>";
}
}


function themearticle ($aid, $informant, $datetime, $title, $thetext, $topic, $topicname, $topicimage, $topictext) {
        if (!$config_called) {if (!isset($config)) {if (!isset($config)) { include("config.php"); }}}
        if ("$aid" == "$informant") {
echo"
<FONT color=#486591 scolor=#000000><B>$title</B></FONT><BR>
"._POSTEDON." $datetime ";
global $admin, $sid;
if ($admin) {
    echo "&nbsp;&nbsp; $font2 [ <a href=admin.php?op=EditStory&sid=$sid>".translate("Edit")."</a> | <a href=admin.php?op=RemoveStory&sid=$sid>".translate("Delete")."</a> ]";
}
echo "
<a href=\"search.php?query=&topic=$topic&author=\"><img src=\"$tipath$topicimage\" border=0 Alt=\"$topictext\" align=right hspace=10 vspace=10></a>
$thetext
<br>";
	} else {
		if($informant != "") $informant = "<a href=\"user.php?op=userinfo&uname=$informant\">$informant</a> ";
		else $boxstuff = "$anonymous ";
		$boxstuff .= ""._WRITES." <i>\"$thetext\"</i> $notes";
echo "
<b>$title</b><br><font face=Arial,Helvetica size=2>"._CONTRIBUTEDBY." $informant "._ON." $datetime</font>";

global $admin, $sid;
if ($admin) {
    echo "&nbsp;&nbsp; $font2 [ <a href=admin.php?op=EditStory&sid=$sid>"._EDIT."</a> | <a href=admin.php?op=RemoveStory&sid=$sid>"._DELETE."</a> ]";
}
echo "
<a href=\"search.php?query=&topic=$topic&author=\"><img src=\"$tipath$topicimage\" border=0 Alt=\"$topictext\" align=right hspace=10 vspace=10></a>
$thetext<br>";

	}
}

function themesidebox($title, $content) {
echo "<br>
<TABLE width=\"100%\" cellpadding=0 cellspacing=0 border=0>
<TR valign=bottom>
<TD align=left><B><FONT color=#000000>$title</FONT></B><IMG src=pixel.gif height=3 width=1 alt=\"\"></TD>
<TD align=right width=\"1%\"><IMG height=14 alt=\"\" src=themes/LinuxCom/images/endcap-grey.gif width=14></TD>
</TR>
<TR valign=bottom><TD bgcolor=#cecece width=100% colspan=2><IMG src=themes/LinuxCom/images/pixel.gif width=1 height=1 alt=\"\"></TD></TR>
<tr><td>
$content
</td></tr>
</TABLE>";
}

?>