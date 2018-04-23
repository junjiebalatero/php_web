<?php
$thename = "anjara5";
$bgcolor1 = "#FCF1E1";
$bgcolor2 = "#007F9B";
$bgcolor3 = "#e6e6e6";
$textcolor1 = "#FFFFFF";
$textcolor2 = "#000000";
$pollcolor = "brown";
$hr = 1;  # 1 to have horizonal rule in comments instead of table bgcolor

function OpenTable() {
    global $bgcolor1, $bgcolor2;
    echo "<table width=\"600\" border=\"0\" cellspacing=\"1\" cellpadding=\"0\" bgcolor=\"$bgcolor2\"><tr><td>\n";
    echo "<table width=\"100%\" border=\"0\" cellspacing=\"1\" cellpadding=\"8\" bgcolor=\"$bgcolor1\"><tr><td>\n";
}

function OpenTable2() {
    global $bgcolor1, $bgcolor2;
    echo "<table width=\"600\" border=\"0\" cellspacing=\"1\" cellpadding=\"0\" bgcolor=\"$bgcolor2\" align=\"center\"><tr><td>\n";
    echo "<table width=\"100%\" border=\"0\" cellspacing=\"1\" cellpadding=\"8\" bgcolor=\"$bgcolor1\"><tr><td>\n";
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
	echo "<font size=\"2\">$thetext<br>$notes</font>\n";
    } else {
	if($informant != "") {
	    $boxstuff = "<a href=\"user.php?op=userinfo&amp;uname=$informant\">$informant</a> ";
	} else {
	    $boxstuff = "$anonymous ";
	}
	$boxstuff .= ""._WRITES." <i>\"$thetext\"</i> $notes\n";
	echo "<font size=\"2\">$boxstuff</font>\n";
    }
}

function themeheader() {
    global $sitename, $banners, $anonymous, $username, $user, $cookie;
cookiedecode($user);
$username = $cookie[1];
if ($username == "") {
$username = "Anonymous";
}
    echo "

<body bgcolor=#DDDDDD background=themes/anjara/gfx/fondo_principal.gif link=#000000 vlink=#000000 alink=#000000>

<LINK REL=STYLESHEET HREF=themes/anjara/css.css>
";
global $slogan;
echo "

<table border=0 cellpadding=0 cellspacing=0 width=760 height=30 align=center>
<tr>
<td colspan=4 height=1 bgcolor='#5C5C5C'><img src=themes/anjara/gfx/pix.gif height=1 width=1></td>
</tr>

<tr>
<td width='1' bgcolor='#5C5C5C'><img src=themes/anjara/gfx/pix.gif height=1 width=1></td>
<td width='401' class=ctnegro>&nbsp;"._WELCOMETO." $sitename ,&nbsp; $slogan</td>
<td height='28' width='362' background='themes/anjara/gfx/fondo1.gif' valign='middle' align='right'>

	<table border='0' align=left>
	<form action=search.php method=post>
	<tr>
	<td align=right valign=middle class=ctnegro>&nbsp;"._SEARCH." </td>
	<td valign=middle><input type=text class=resalta1 style='border: solid 1px #000000; background : Silver' name=query ></td>
	</tr>
	</form>
	</table>
	
	<table border='0' align=left>
	<form action=\"search.php\" method=get>
	<tr>
	<td class=ctnegro valign='middle'>"._TOPICS."</td>
	<td class=ctnegro valign='middle'>";
    $toplist = mysql_query("select topicid, topictext from topics order by topictext");
    echo "<SELECT class=resalta1 style='border: solid 1px #000000; background : #FCF1E1' NAME=\"topic\"onChange='submit()'>" ;
    echo "<OPTION VALUE=\"\">"._ALLTOPICS."</option>\n";
    while(list($topicid, $topics) = mysql_fetch_row($toplist)) {
    if ($topicid==$topic) { $sel = "selected "; }
	echo "<option $sel value=\"$topicid\">$topics</option>\n";
    $sel = "";
    }
	echo "
	</td>
	</tr>
	</form>
	</table>



</td>
<td width=1 bgcolor=#5C5C5C><img src=themes/anjara/gfx/pix.gif height=1 width=1></td>
</tr>

<tr>
<td colspan=4 height=1 bgcolor=#5C5C5C><img src=themes/anjara/gfx/pix.gif height=1 width=1></td>
</tr>
</table>




<table border=0 cellpadding=0 cellspacing=0 width=760 align=center>
<tr>
<td valign=top width=237>

	    ";
		include ('themes/anjara/includes/anjaraloop.php');
		echo "		

</td>
<td valign=top width=523 align=right>

		<table border=0 cellpadding=0 cellspacing=0 width=523 height=72 align=center>
		<tr>		
		<td height=72 width=523 valign=top align=right class=ctblanco background=themes/anjara/gfx/fondo2.jpg>";
if ($banners) {
    include("banners.php");
}
echo "</td>
		<td height=72 width=1 bgcolor='#5C5C5C'><img src=themes/anjara/gfx/pix.gif height=1 width=1></td>
		</tr>
		</table>

	    ";
		include ('themes/anjara/includes/yourown.php');
		echo "
		";
		include ('themes/anjara/includes/navbar.php');
		echo "

</td>
</tr>

</table>
<br>
<table width=760 align=center cellpadding=0 cellspacing=0 border=0>
<tr>

<td valign=top>";
  blocks(left);
      

 
 

echo "</TD>
    <TD width=16>&nbsp;&nbsp;</TD>
    <TD valign=top>
<!-- Block Begins -->
      <center>
      
      
</center>
<!-- Block Ends -->";  


}

function themefooter() {
 

  global $index;
    if ($index == 1) {
echo "  <td background=themes/anjara/images/rightline.gif width=17 valign=top>&nbsp; </td>
    <td width=136 valign=top>";
 blocks(right);
}
echo "</tr></table></td></tr></table>";
?>
<?php
echo "<br><table width=760 cellpadding=0 cellspacing=0 align=center border=0 bgcolor=#FCF1E1>";
echo "<tr><td colspan=3 bgcolor=#000000 height=1><img src=themes/anjara/gfx/pix.gif height=1 width=1></td></tr>";
echo "<tr><td bgcolor=#000000 width=1><img src=themes/anjara/gfx/pix.gif height=1 width=1></td><td align=center><br>";
footmsg();
echo "<br></td><td bgcolor=#000000 width=1><img src=themes/anjara/gfx/pix.gif height=1 width=1></td></tr>";
echo "<tr><td colspan=3 bgcolor=#000000 height=1><img src=themes/anjara/gfx/pix.gif height=1 width=1></td></tr></table>";

}

function themeindex ($aid, $informant, $datetime, $title, $counter, $topic, $thetext, $notes, $morelink, $topicname, $topicimage, $topictext) {
        global $tipath, $anonymous;
        ?>
        <table width="100%" border="0" cellpadding="0" cellspacing="0">
                <tr valign="top">
                <td align="right">
                        <table height="22" bgcolor="#007F9B" border="0" cellpadding="0" cellspacing="0">
                        <tr>
                        <td valign="middle"><img src="themes/anjara/gfx/corner.gif"></td>
                        <td background="themes/anjara/gfx/cornerwall.gif" class="ctblanco">&nbsp;<B><?php echo"$title"; ?></B>&nbsp;</td>
                        <td valign="middle"><img src="themes/anjara/gfx/corner2.gif"></td>
                </tr>
                        </table>
                </td>
                </tr>
                </table>

                <table border="0" cellpadding="0" cellspacing="0">
                <tr bgcolor="#000000"><td colspan="3"><img src="themes/anjara/gfx/pix.gif" width="1" height="1"></td></tr>
                <tr bgcolor="#e6e6e6">
                        <td background="themes/anjara/gfx/gl.gif"><img src="themes/anjara/gfx/pix.gif" width="11" height="11" alt=""></td>
                        <td width="100%">
                                <table width="100%" border="0" cellpadding="5" cellspacing="0"><tr>
                                <td class="ctnegro"><?php echo ""._POSTEDBY.""; ?> <?php formatAidHeader($aid) ?> <?php echo ""._ON.""; ?> <?php echo"$datetime $timezone"; ?> (<?php echo $counter; ?> <?php echo ""._READS.""; ?>)</font></td>
                                </tr></table>
                        </td>
                        <td background="themes/anjara/gfx/gr.gif"><img src="themes/anjara/gfx/pix.gif" width="11" height="11" alt=""></td>
                </tr>
                <tr bgcolor="#000000"><td colspan="3"><img src="themes/anjara/gfx/pix.gif" width="1" height="1"></td></tr>
                <tr bgcolor="#FCF1E1">
                <td background="themes/anjara/gfx/wl.gif"><img src="themes/anjara/gfx/pix.gif" width="11" height="11" alt=""></td>
                <td width="100%">
                        <table border=0 width="100%" border="0" cellpadding="5" cellspacing="0">
                        <tr>
                        <td>
                        <a href="search.php?query=&topic=<?php echo"$topic"; ?>&author="><img src=<?php echo"$tipath$topicimage"; ?> border=1 bordercolor="#000000" Alt=<?php echo"\"$topictext\""; ?> align=left hspace=10 vspace=10></a>
                        <?php echo "<font size=2>$thetext"; ?>
            </td>
                        </tr>
                        </table>
                </td>
        <td background="themes/anjara/gfx/wr.gif"><img src="themes/anjara/gfx/pix.gif" width="11" height="11" alt=""></td>
                </tr>
                <tr bgcolor="#000000"><td colspan="3"><img src="themes/anjara/gfx/pix.gif" width="1" height="1"></td></tr>
                </table>

                <table border="0" cellpadding="0" cellspacing="0" width="100%">
                <tr>
                <td width="100%">
                        <table align="right" border="0" cellpadding="5" cellspacing="0">
                        <tr>
                        <td bgcolor="#dddddd"><font class="tnegro"></font> <font size="2"><?php echo"$morelink"; ?></font></td>
                        </tr>
                        </table>
                </td>
                </tr>
                </table>
                <BR>

<?php 
       
}



function themearticle ($aid, $informant, $datetime, $title, $thetext, $topic, $topicname, $topicimage, $topictext) {
        global $admin, $sid, $tipath;


?>
                <table width="100%" border="0" cellpadding="0" cellspacing="0">
                <tr valign="top">
                <td align="right">
                        <table height="22" bgcolor="#007F9B" border="0" cellpadding="0" cellspacing="0">
                        <tr>
                        <td valign="middle"><img src="themes/anjara/gfx/corner.gif"></td>
                        <td background="themes/anjara/gfx/cornerwall.gif" class="ctblanco">&nbsp;<B><?php echo"$title"; ?></B>&nbsp;</td>
                        <td valign="middle"><img src="themes/anjara/gfx/corner2.gif"></td>
                </tr>
                        </table>
                </td>
                </tr>
                </table>

                <table border="0" cellpadding="0" cellspacing="0">
                <tr bgcolor="#000000"><td colspan="3"><img src="themes/anjara/gfx/pix.gif" width="1" height="1"></td></tr>
                <td background="themes/anjara/gfx/gl.gif"><img src="themes/anjara/gfx/pix.gif" width="11" height="11" alt=""></td>
                <td width="100%">
                                <table bgcolor="#E6E6E6" width="100%" border="0" cellpadding="5" cellspacing="0"><tr>
                                <td class="ctnegro"><?php echo ""._POSTEDBY.""; ?> <?php formatAidHeader($aid) ?> <?php echo ""._ON.""; ?> <?php echo"$datetime $timezone"; ?></font>

<?php
if ($admin) {
    echo "<br><br><center><font size=2> [ <a href=admin.php?op=EditStory&sid=$sid>"._EDIT."</a> | <a href=admin.php?op=RemoveStory&sid=$sid>"._DELETE."</a> ]</center>";
}
?>
                                </td>
                                </tr>
                                </table>
                </td>
                <td background="themes/anjara/gfx/gr.gif"><img src="themes/anjara/gfx/pix.gif" width="11" height="11" alt=""></td>
                </tr>
                <tr bgcolor="#000000"><td colspan="3"><img src="themes/anjara/gfx/pix.gif" width="1" height="1"></td></tr>
                <tr bgcolor="#FCF1E1">
                <td background="themes/anjara/gfx/wl.gif"><img src="themes/anjara/gfx/pix.gif" width="11" height="11" alt=""></td>
                <td width="100%">
                        <table width="100%" border="0" cellpadding="5" cellspacing="0">
                        <tr>
                        <td>
                        <?php echo "<a href=search.php?query=&topic=$topic&author=><img src=$tipath$topicimage border=1 bordercolor=#000000 Alt=\"$topictext\" align=left hspace=10 vspace=10></a>"; ?>
                        <?php echo "<font size=2>$thetext"; ?>
                </td>
                        </tr>
                        </table>
                </td>
        <td background="themes/anjara/gfx/wr.gif"><img src="themes/anjara/gfx/pix.gif" width="11" height="11" alt=""></td>
                </tr>
                <tr bgcolor="#000000"><td colspan="3"><img src="themes/anjara/gfx/pix.gif" width="1" height="1"></td></tr>
               </table>
<?php


}



function themesidebox($title, $content) {
        ?>
        <table width="100%" border="0" cellpadding="0" cellspacing="0" valign="top">
        <tr>
        <td width="21" height="22"><img src="themes/anjara/gfx/leftcorner.gif"></td>
        <td height="22" class="ctnegro" background="themes/anjara/gfx/tdpaper.gif">&nbsp;<B><?php echo"$title"; ?></B></td>
        <td width="5" height="22"><img src="themes/anjara/gfx/rightcorner.gif"></td>
        </tr>
        </table>


        <br>

        <table width="100%" border="0" cellpadding="0" cellspacing="0">
        <tr>
                <td class="ctnegro">
<?php


if (file_exists($content)) {
	$fp = fopen ($content, "r");
	$content = fread($fp, filesize($content));
	fclose ($fp);
	$content = "?>$content<?";
	echo eval($content);
} else {
	echo $content;
}
?></td>
        </tr>
        </table><br><br>
<?php
}

?>
