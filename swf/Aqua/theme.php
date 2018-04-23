<?php

$thename = "AQUA";
$lnkcolor = "FFFFFF";
$bgcolor1 = "#EEEEEE";
$bgcolor2 = "#BCBCBC";
$bgcolor3 = "#EEEEEE";
$bgcolor4 = "#DEDEDE";
$textcolor1 = "#FFFFFF";
$textcolor2 = "#000000";
$hr = 1; # 1 to have horizonal rule in comments instead of table bgcolor


function OpenTable() {
    global $bgcolor1, $bgcolor2;
    echo "<table width=\"100%\" border=\"0\" cellspacing=\"1\" cellpadding=\"0\" bgcolor=\"$bgcolor2\"><tr><td>\n";
    echo "<table width=\"100%\" border=\"0\" cellspacing=\"1\" cellpadding=\"2\" bgcolor=\"$bgcolor1\"><tr><td>\n";
}

function OpenTable2() {
    global $bgcolor1, $bgcolor2;
    echo "<table border=\"0\" cellspacing=\"1\" cellpadding=\"0\" bgcolor=\"$bgcolor2\" align=\"center\"><tr><td>\n";
    echo "<table border=\"0\" cellspacing=\"1\" cellpadding=\"2\" bgcolor=\"$bgcolor1\"><tr><td>\n";
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

echo " 
<body background=themes/Aqua/images/background.gif text=000000 link=000000 vlink=000000 topmargin=5 leftmargin=0 rightmargin=0 marginheight=5>
<br>";
if ($banners) {
    include("banners.php");
}
echo "<br>
<center><br>
<a href=$nuke_url><img src=themes/Aqua/images/logo.gif Alt=\""._WELCOMETO." $sitename\" border=0></a>
<br><br></center>

<table border=0 cellspacing=0 cellpadding=2 width=100%><tr><td valign=top width=180>";

blocks(left);

echo "<img src=images/pix.gif border=0 width=180 height=1></td><td width=100% valign=top>";

}


function themefooter() {


    echo "<td>&nbsp;</td><td valign=\"top\">";
blocks(right);
    echo "</td>";
echo "</td></tr></table>";

}

function themeindex ($aid, $informant, $time, $title, $counter, $topic, $thetext, $notes, $morelink, $topicname, $topicimage, $topictext) {
	global $tipath, $anonymous;
	
	
	
		if ("$aid" == "$informant") { ?>

<table width="100%" border="0" cellspacing="0" cellpadding="0" >
  <tr> 
    <td width="15" height="15" background="themes/Aqua/images/cadre/coinsupg.gif"><img src="themes/Aqua/images/space15_15.gif" width="15" height="15"></td>
    <td height="15" colspan="3" background="themes/Aqua/images/cadre/sup.gif"><img src="themes/Aqua/images/space15_15.gif" width="15" height="15"></td>
    <td width="15" height="15" background="themes/Aqua/images/cadre/coinsupd.gif"><img src="themes/Aqua/images/space15_15.gif" width="15" height="15"></td>
  </tr>
  <tr> 
    <td width="15" rowspan="4" background="themes/Aqua/images/cadre/g.gif"><img src="themes/Aqua/images/space15_15.gif" width="15" height="15"></td>
    <td height="15" width="15" background="themes/Aqua/images/cadre/carresupg.gif"><img src="themes/Aqua/images/space15_15.gif" width="15" height="15"></td>
    <td height="15" background="themes/Aqua/images/cadre/carresup.gif"><img src="themes/Aqua/images/space15_15.gif" width="15" height="15"></td>
    <td height="15" width="15" background="themes/Aqua/images/cadre/carresupd.gif"><img src="themes/Aqua/images/space15_15.gif" width="15" height="15"></td>
    <td width="15" rowspan="4" background="themes/Aqua/images/cadre/d.gif"><img src="themes/Aqua/images/space15_15.gif" width="15" height="15"></td>
  </tr>
  <tr> 
    <td background="themes/Aqua/images/cadre/carreg.gif"><img src="themes/Aqua/images/space15_15.gif" width="15" height="15"></td>
      <td background="themes/Aqua/images/cadre/carrefond.gif" align="left" width="100%" ><B><?php echo"$title"; ?></B><BR><FONT SIZE=2><?php echo ""._POSTEDBY." "; ?><b><?php formatAidHeader($aid) ?></b> <?php echo ""._ON.""; ?> <?php echo"$time $timezone"; ?><br>(<?php echo $counter; ?> <?php echo ""._READS.""; ?>)<br></FONT></td>
    <td width="15" background="themes/Aqua/images/cadre/carred.gif"><img src="themes/Aqua/images/space15_15.gif" width="15" height="15"></td>
  </tr>
  <tr> 
    <td height="15" width="15" background="themes/Aqua/images/cadre/carreinfg.gif"><img src="themes/Aqua/images/space15_15.gif" width="15" height="15"></td>
    <td height="15" background="themes/Aqua/images/cadre/carreinf.gif"><img src="themes/Aqua/images/space15_15.gif" width="15" height="15"></td>
    <td height="15" width="15" background="themes/Aqua/images/cadre/carreinfd.gif"><img src="themes/Aqua/images/space15_15.gif" width="15" height="15"></td>
  </tr>
  <tr> 
      <td colspan="3" background="themes/Aqua/images/cadre/fond.gif"><FONT size=2>
    <a href="search.php?query=&topic=<?php echo"$topic"; ?>&author="><img src=<?php echo"$tipath$topicimage"; ?> border=1 Alt=<?php echo"\"$topictext\""; ?> align=left hspace=10 vspace=10></a>
    <?php echo"$thetext<br><br>$morelink"; ?></td>
  </tr>
  <tr> 
    <td width="15" height="15" background="themes/Aqua/images/cadre/coininfg.gif"><img src="themes/Aqua/images/space15_15.gif" width="15" height="15"></td>
    <td height="15" colspan="3" background="themes/Aqua/images/cadre/inf.gif"><img src="themes/Aqua/images/space15_15.gif" width="15" height="15"></td>
    <td width="15" height="15" background="themes/Aqua/images/cadre/coininfd.gif"><img src="themes/Aqua/images/space15_15.gif" width="15" height="15"></td>
  </tr>
</table>


<?php	} 




else {
		if($informant != "") $boxstuff = "<a href=\"user.php?op=userinfo&uname=$informant\">$informant</a> ";
		else $boxstuff = "$anonymous ";
		$boxstuff .= ""._WRITES." <i>\"$thetext\"</i> $notes";
?>


<table width="100%" border="0" cellspacing="0" cellpadding="0" >
  <tr> 
    <td width="15" height="15" background="themes/Aqua/images/cadre/coinsupg.gif"><img src="themes/Aqua/images/space15_15.gif" width="15" height="15"></td>
    <td height="15" colspan="3" background="themes/Aqua/images/cadre/sup.gif"><img src="themes/Aqua/images/space15_15.gif" width="15" height="15"></td>
    <td width="15" height="15" background="themes/Aqua/images/cadre/coinsupd.gif"><img src="themes/Aqua/images/space15_15.gif" width="15" height="15"></td>
  </tr>
  <tr> 
    <td width="15" rowspan="4" background="themes/Aqua/images/cadre/g.gif"><img src="themes/Aqua/images/space15_15.gif" width="15" height="15"></td>
    <td height="15" width="15" background="themes/Aqua/images/cadre/carresupg.gif"><img src="themes/Aqua/images/space15_15.gif" width="15" height="15"></td>
    <td height="15" background="themes/Aqua/images/cadre/carresup.gif"><img src="themes/Aqua/images/space15_15.gif" width="15" height="15"></td>
    <td height="15" width="15" background="themes/Aqua/images/cadre/carresupd.gif"><img src="themes/Aqua/images/space15_15.gif" width="15" height="15"></td>
    <td width="15" rowspan="4" background="themes/Aqua/images/cadre/d.gif"><img src="themes/Aqua/images/space15_15.gif" width="15" height="15"></td>
  </tr>
  <tr> 
    <td background="themes/Aqua/images/cadre/carreg.gif"><img src="themes/Aqua/images/space15_15.gif" width="15" height="15"></td>
      <td background="themes/Aqua/images/cadre/carrefond.gif" align="left" width="100%" ><B><?php echo"$title"; ?></B><BR><FONT SIZE=2>
    <?php echo ""._POSTEDBY." "; ?><?php formatAidHeader($aid); ?> <?php echo ""._ON.""; ?> <?php echo"$time $timezone"; ?><br>(<?php echo $counter; ?> <?php echo ""._READS.""; ?>)<br></FONT></td>
    <td width="15" background="themes/Aqua/images/cadre/carred.gif"><img src="themes/Aqua/images/space15_15.gif" width="15" height="15"></td>
  </tr>
  <tr> 
    <td height="15" width="15" background="themes/Aqua/images/cadre/carreinfg.gif"><img src="themes/Aqua/images/space15_15.gif" width="15" height="15"></td>
    <td height="15" background="themes/Aqua/images/cadre/carreinf.gif"><img src="themes/Aqua/images/space15_15.gif" width="15" height="15"></td>
    <td height="15" width="15" background="themes/Aqua/images/cadre/carreinfd.gif"><img src="themes/Aqua/images/space15_15.gif" width="15" height="15"></td>
  </tr>
  <tr> 
      <td colspan="3" background="themes/Aqua/images/cadre/fond.gif"><FONT size=2>
    <a href="search.php?query=&topic=<?php echo"$topic"; ?>&author="><img src=<?php echo"$tipath$topicimage"; ?> border=1 Alt=<?php echo"\"$topictext\""; ?> align=left hspace=10 vspace=10></a>
    <?php echo"$boxstuff<br><br>$morelink"; ?></td>
  </tr>
  <tr> 
    <td width="15" height="15" background="themes/Aqua/images/cadre/coininfg.gif"><img src="themes/Aqua/images/space15_15.gif" width="15" height="15"></td>
    <td height="15" colspan="3" background="themes/Aqua/images/cadre/inf.gif"><img src="themes/Aqua/images/space15_15.gif" width="15" height="15"></td>
    <td width="15" height="15" background="themes/Aqua/images/cadre/coininfd.gif"><img src="themes/Aqua/images/space15_15.gif" width="15" height="15"></td>
  </tr>
</table>



<?php	}
}




function themearticle ($aid, $informant, $datetime, $title, $thetext, $topic, $topicname, $topicimage, $topictext) {
	global $admin, $sid, $tipath;
	
	
	if ("$aid" == "$informant") {

?>
<table width="100%" border="0" cellspacing="0" cellpadding="0" >
  <tr> 
    <td width="15" height="15" background="themes/Aqua/images/cadre/coinsupg.gif"><img src="themes/Aqua/images/space15_15.gif" width="15" height="15"></td>
    <td height="15" colspan="3" background="themes/Aqua/images/cadre/sup.gif"><img src="themes/Aqua/images/space15_15.gif" width="15" height="15"></td>
    <td width="15" height="15" background="themes/Aqua/images/cadre/coinsupd.gif"><img src="themes/Aqua/images/space15_15.gif" width="15" height="15"></td>
  </tr>
  <tr> 
    <td width="15" rowspan="4" background="themes/Aqua/images/cadre/g.gif"><img src="themes/Aqua/images/space15_15.gif" width="15" height="15"></td>
    <td height="15" width="15" background="themes/Aqua/images/cadre/carresupg.gif"><img src="themes/Aqua/images/space15_15.gif" width="15" height="15"></td>
    <td height="15" background="themes/Aqua/images/cadre/carresup.gif"><img src="themes/Aqua/images/space15_15.gif" width="15" height="15"></td>
    <td height="15" width="15" background="themes/Aqua/images/cadre/carresupd.gif"><img src="themes/Aqua/images/space15_15.gif" width="15" height="15"></td>
    <td width="15" rowspan="4" background="themes/Aqua/images/cadre/d.gif"><img src="themes/Aqua/images/space15_15.gif" width="15" height="15"></td>
  </tr>
  <tr> 
    <td background="themes/Aqua/images/cadre/carreg.gif"><img src="themes/Aqua/images/space15_15.gif" width="15" height="15"></td>
      <td background="themes/Aqua/images/cadre/carrefond.gif" align="left" width="100%" >
      	<?
      	echo "<FONT size=3 color=blue><b>$title</b><br><font size=1>"._POSTEDON." $datetime";
		if ($admin)
			{
			echo "&nbsp;&nbsp; $font2 [ <a href=admin.php?op=EditStory&sid=$sid>"._EDIT."</a> | <a href=admin.php?op=RemoveStory&sid=$sid>"._DELETE."</a> ]";
    		}
      	?>
      </td>
    <td width="15" background="themes/Aqua/images/cadre/carred.gif"><img src="themes/Aqua/images/space15_15.gif" width="15" height="15"></td>
  </tr>
  <tr> 
    <td height="15" width="15" background="themes/Aqua/images/cadre/carreinfg.gif"><img src="themes/Aqua/images/space15_15.gif" width="15" height="15"></td>
    <td height="15" background="themes/Aqua/images/cadre/carreinf.gif"><img src="themes/Aqua/images/space15_15.gif" width="15" height="15"></td>
    <td height="15" width="15" background="themes/Aqua/images/cadre/carreinfd.gif"><img src="themes/Aqua/images/space15_15.gif" width="15" height="15"></td>
  </tr>
  <tr> 
      <td colspan="3" background="themes/Aqua/images/cadre/fond.gif">
      <?
      echo "<FONT size=2><a href=search.php?query=&topic=$topic&author=><img src=$tipath$topicimage border=1 Alt=\"$topictext\" align=left hspace=10 vspace=10></a>$thetext";

      ?>
      </td>
  </tr>
  <tr> 
    <td width="15" height="15" background="themes/Aqua/images/cadre/coininfg.gif"><img src="themes/Aqua/images/space15_15.gif" width="15" height="15"></td>
    <td height="15" colspan="3" background="themes/Aqua/images/cadre/inf.gif"><img src="themes/Aqua/images/space15_15.gif" width="15" height="15"></td>
    <td width="15" height="15" background="themes/Aqua/images/cadre/coininfd.gif"><img src="themes/Aqua/images/space15_15.gif" width="15" height="15"></td>
  </tr>
</table>
<?





	} 
	
	
	
	else {
		if($informant != "") $informant = "<a href=\"user.php?op=userinfo&uname=$informant\">$informant</a> ";
		else $boxstuff = "$anonymous ";
		$boxstuff .= ""._WRITES." <i>\"$thetext\"</i> $notes";


?>
<table width="100%" border="0" cellspacing="0" cellpadding="0" >
  <tr> 
    <td width="15" height="15" background="themes/Aqua/images/cadre/coinsupg.gif"><img src="themes/Aqua/images/space15_15.gif" width="15" height="15"></td>
    <td height="15" colspan="3" background="themes/Aqua/images/cadre/sup.gif"><img src="themes/Aqua/images/space15_15.gif" width="15" height="15"></td>
    <td width="15" height="15" background="themes/Aqua/images/cadre/coinsupd.gif"><img src="themes/Aqua/images/space15_15.gif" width="15" height="15"></td>
  </tr>
  <tr> 
    <td width="15" rowspan="4" background="themes/Aqua/images/cadre/g.gif"><img src="themes/Aqua/images/space15_15.gif" width="15" height="15"></td>
    <td height="15" width="15" background="themes/Aqua/images/cadre/carresupg.gif"><img src="themes/Aqua/images/space15_15.gif" width="15" height="15"></td>
    <td height="15" background="themes/Aqua/images/cadre/carresup.gif"><img src="themes/Aqua/images/space15_15.gif" width="15" height="15"></td>
    <td height="15" width="15" background="themes/Aqua/images/cadre/carresupd.gif"><img src="themes/Aqua/images/space15_15.gif" width="15" height="15"></td>
    <td width="15" rowspan="4" background="themes/Aqua/images/cadre/d.gif"><img src="themes/Aqua/images/space15_15.gif" width="15" height="15"></td>
  </tr>
  <tr> 
    <td background="themes/Aqua/images/cadre/carreg.gif"><img src="themes/Aqua/images/space15_15.gif" width="15" height="15"></td>
      <td background="themes/Aqua/images/cadre/carrefond.gif" align="left" width="100%" >
      	<?
      	echo "<FONT size=3 color=blue><b>$title</b><br><font size=2>"._CONTRIBUTEDBY." $informant "._ON." $datetime</font>";
		if ($admin)
			{
			echo "&nbsp;&nbsp; $font2 [ <a href=admin.php?op=EditStory&sid=$sid>"._EDIT."</a> | <a href=admin.php?op=RemoveStory&sid=$sid>"._DELETE."</a> ]";
    		}
      	?>
      </td>
    <td width="15" background="themes/Aqua/images/cadre/carred.gif"><img src="themes/Aqua/images/space15_15.gif" width="15" height="15"></td>
  </tr>
  <tr> 
    <td height="15" width="15" background="themes/Aqua/images/cadre/carreinfg.gif"><img src="themes/Aqua/images/space15_15.gif" width="15" height="15"></td>
    <td height="15" background="themes/Aqua/images/cadre/carreinf.gif"><img src="themes/Aqua/images/space15_15.gif" width="15" height="15"></td>
    <td height="15" width="15" background="themes/Aqua/images/cadre/carreinfd.gif"><img src="themes/Aqua/images/space15_15.gif" width="15" height="15"></td>
  </tr>
  <tr> 
      <td colspan="3" background="themes/Aqua/images/cadre/fond.gif">
      <?
      echo "<FONT size=2><a href=search.php?query=&topic=$topic&author=><img src=$tipath$topicimage border=1 Alt=\"$topictext\" align=left hspace=10 vspace=10></a>$thetext";

      ?>
      </td>
  </tr>
  <tr> 
    <td width="15" height="15" background="themes/Aqua/images/cadre/coininfg.gif"><img src="themes/Aqua/images/space15_15.gif" width="15" height="15"></td>
    <td height="15" colspan="3" background="themes/Aqua/images/cadre/inf.gif"><img src="themes/Aqua/images/space15_15.gif" width="15" height="15"></td>
    <td width="15" height="15" background="themes/Aqua/images/cadre/coininfd.gif"><img src="themes/Aqua/images/space15_15.gif" width="15" height="15"></td>
  </tr>
</table>
<?


    }
}




function themesidebox($title, $content) {


?>
<table width="180" border="0" cellspacing="0" cellpadding="0" >
  <tr> 
    <td width="15" height="15" background="themes/Aqua/images/cadre/coinsupg.gif"><img src="themes/Aqua/images/space15_15.gif" width="15" height="15"></td>
    <td height="15" colspan="3" background="themes/Aqua/images/cadre/sup.gif"><img src="themes/Aqua/images/space15_15.gif" width="15" height="15"></td>
    <td width="15" height="15" background="themes/Aqua/images/cadre/coinsupd.gif"><img src="themes/Aqua/images/space15_15.gif" width="15" height="15"></td>
  </tr>
  <tr> 
    <td width="15" rowspan="4" background="themes/Aqua/images/cadre/g.gif"><img src="themes/Aqua/images/space15_15.gif" width="15" height="15"></td>
    <td height="15" width="15" background="themes/Aqua/images/cadre/carrebsupg.gif"><img src="themes/Aqua/images/space15_15.gif" width="15" height="15"></td>
    <td height="15" background="themes/Aqua/images/cadre/carrebsup.gif"><img src="themes/Aqua/images/space15_15.gif" width="15" height="15"></td>
    <td height="15" width="15" background="themes/Aqua/images/cadre/carrebsupd.gif"><img src="themes/Aqua/images/space15_15.gif" width="15" height="15"></td>
    <td width="15" rowspan="4" background="themes/Aqua/images/cadre/d.gif"><img src="themes/Aqua/images/space15_15.gif" width="15" height="15"></td>
  </tr>
  <tr> 
    <td background="themes/Aqua/images/cadre/carrebg.gif"><img src="themes/Aqua/images/space15_15.gif" width="15" height="15"></td>
      <td background="themes/Aqua/images/cadre/carrebfond.gif" align="center" width="180" >
      	<B><FONT size=2 color=black><? echo "$title"; ?></B></FONT>
      </td>
    <td width="15" background="themes/Aqua/images/cadre/carrebd.gif"><img src="themes/Aqua/images/space15_15.gif" width="15" height="15"></td>
  </tr>
  <tr> 
    <td height="15" width="15" background="themes/Aqua/images/cadre/carrebinfg.gif"><img src="themes/Aqua/images/space15_15.gif" width="15" height="15"></td>
    <td height="15" background="themes/Aqua/images/cadre/carrebinf.gif"><img src="themes/Aqua/images/space15_15.gif" width="15" height="15"></td>
    <td height="15" width="15" background="themes/Aqua/images/cadre/carrebinfd.gif"><img src="themes/Aqua/images/space15_15.gif" width="15" height="15"></td>
  </tr>
  <tr> 
      <td colspan="3" background="themes/Aqua/images/cadre/fond.gif"  align="left"  width="180" >
      <BR><B><FONT size=2 color=black><? echo "$content"; ?><BR></B></FONT>
      </td>
  </tr>
  <tr> 
    <td width="15" height="15" background="themes/Aqua/images/cadre/coininfg.gif"><img src="themes/Aqua/images/space15_15.gif" width="15" height="15"></td>
    <td height="15" colspan="3" background="themes/Aqua/images/cadre/inf.gif"><img src="themes/Aqua/images/space15_15.gif" width="15" height="15"></td>
    <td width="15" height="15" background="themes/Aqua/images/cadre/coininfd.gif"><img src="themes/Aqua/images/space15_15.gif" width="15" height="15"></td>
  </tr>
</table>
<?

}

?>