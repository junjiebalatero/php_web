<?php

$thename = "edazine";
$bgcolor1 = "#FFCC66";
$bgcolor2 = "#F86400";
$bgcolor3 = "#fe9732";
$bgcolor4 = "#fe9732";
$textcolor1 = "#EFEFEF";
$textcolor2 = "#000000";
$hr = 1; # 1 to have horizonal rule in comments instead of table bgcolor

function OpenTable() {
    global $bgcolor1, $bgcolor2;?>
   <TABLE width="100%" border="0" cellspacing="0" cellpadding="0" align="center">
        <TR>
          <TD height="8" width="8" background="themes/edazine/images/table/top-left.gif"></TD>
          <TD background="themes/edazine/images/table/top-center.gif" height="8"></TD>
          <TD width="8" height="8" background="themes/edazine/images/table/top-right.gif"></TD>
        </TR><tr>  <TD background="themes/edazine/images/table/tab-left.gif" width="8"></TD>
          <TD background="themes/edazine/images/table/tab-center.gif" class=posted>
        <?
}

function OpenTable2() {
    global $bgcolor1, $bgcolor2;?>
   <TABLE width="100%" border="0" cellspacing="0" cellpadding="0" align="center">
        <TR>
          <TD height="8" width="8" background="themes/edazine/images/table/top-left.gif"></TD>
          <TD background="themes/edazine/images/table/top-center.gif" height="8"></TD>
          <TD width="8" height="8" background="themes/edazine/images/table/top-right.gif"></TD>
        </TR><tr>  <TD background="themes/edazine/images/table/tab-left.gif" width="8"></TD>
          <TD background="themes/edazine/images/table/tab-center.gif" class=posted><?
}

function CloseTable() {?>
   <TD width="8" background="themes/edazine/images/table/tab-right.gif"></TD>
        </TR>
        <TR>
          <TD background="themes/edazine/images/table/bottom-left.gif" width="8" height="8"></TD>
          <TD background="themes/edazine/images/table/bottom-center.gif" height="8"></TD>
          <TD width="8" background="themes/edazine/images/table/bottom-right.gif" height="8"></TD></TR>
        <TR><TD height="8"></TD></TR></TABLE> <?
}

function CloseTable2() {?>
   <TD width="8" background="themes/edazine/images/table/tab-right.gif"></TD>
        </TR>
        <TR>
          <TD background="themes/edazine/images/table/bottom-left.gif" width="8" height="8"></TD>
          <TD background="themes/edazine/images/table/bottom-center.gif" height="8"></TD>
          <TD width="8" background="themes/edazine/images/table/bottom-right.gif" height="8"></TD>
        </TR>
        <TR>
          <TD height="8"></TD>
        </TR>
      </TABLE> <?
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

echo " <head><LINK rel=\"StyleSheet\" HREF=\"themes/edazine/style/style.css\" TYPE=\"text/css\">";

echo "</head><body bgcolor=#000080 marginwidth=0 marginheight=0 topmargin=10 leftmargin=0>
<a name=#top></a><div align=center>
  <center>";
  ?><div align="center"><table border="0" width="780" bgcolor="#FFCC00" cellspacing="0" cellpadding="0">
  <tr>
    <td width="100%"><img border="0" src="themes/edazine/top-left.gif" align="left" hspace="0" width="8" height="8"><img border="0" src="themes/edazine/top-right.gif" align="right" hspace="0" width="8" height="8"></td>
  </tr>
  <tr>
    <td width="100%">
 <?       

echo "<table width=\"750\" border=\"0\" cellspacing=\"0\" cellpadding=\"0\" align=\"center\">
    <tr> 
      <td rowspan=\"2\"><img src=\"themes/edazine/images/r1.gif\" width=\"281\" height=\"150\"></td>
      <td height=\"95\" bgcolor='#309CD0'"; 
global $banners;
         if ($banners) {
             include("banners.php");
         }
echo "
</td>
    </tr>
    <tr> 
      <td><img src=\"themes/edazine/images/r2.gif\" width=\"469\" height=\"55\" usemap=\"#map\" border=\"0\"></td>
    </tr><table>"; ?> 
  </tr>
</table><center><table border=0 width=775><tr><td>
<table border="0" cellspacing="3" cellpadding="0">
  <tr>
    <td>&nbsp; </td>
    <td><a href="index.php"><img border="0" src="themes/edazine/n1.gif" width="147" height="13"></a></td>
    <td><a href="submit.php"><img border="0" src="themes/edazine/n2.gif" width="147" height="13"></a></td>
    <td><a href="sub.php"><img border="0" src="themes/edazine/n3.gif" width="147" height="13"></a></td>
    <td><a href="download.php"><img border="0" src="themes/edazine/n4.gif" width="147" height="13"></a></td>
    <td><?  if ($username == "Anonymous") {
                echo "<a href=user.php><img border=0 src=themes/edazine/n5.gif width=147 height=13></a></a>";
                }else{
                echo "<a href=user.php?op=edituser><img border=0 src=themes/edazine/n6.gif width=147 height=13></a>";
                }
              ?></td>
  </tr>
</table> <?

echo "<table width=100% border=0 cellspacing=0 cellpadding=0>
   <TR>
    <TD width=8></form></TD>
    <TD width=136 valign=top>
      ";
      
  blocks(left);
      
echo "</TD>
    <TD width=16>&nbsp;&nbsp;</TD>
    <TD valign=top>";
  OpenTable2();
?>
<center><OBJECT classid="clsid:D27CDB6E-AE6D-11cf-96B8-444553540000"
 codebase="http://download.macromedia.com/pub/shockwave/cabs/flash/swflash.cab#version=5,0,0,0"
 WIDTH=405 HEIGHT=40>
 <PARAM NAME=movie VALUE="themes/edazine/slogan.swf?text=<?PHP
 global $sitename;
 echo ""._WELCOMETO." $sitename"; ?>"> 
 <PARAM NAME=quality VALUE=high>
 <PARAM NAME=bgcolor VALUE=#FFC470>
 <PARAM NAME=menu VALUE=false>
 <embed src="themes/edazine/slogan.swf?text=<?PHP
 global $sitename;
 echo ""._WELCOMETO." $sitename";
  ?>" quality="high" bgcolor="#D9DCC2" WIDTH="405" HEIGHT="40" TYPE="application/x-shockwave-flash" PLUGINSPAGE="http://www.macromedia.com/shockwave/download/index.cgi?P1_Prod_Version=ShockwaveFlash" menu="false">
</OBJECT></center>
<?
if ($username == "Anonymous") {
print "<br><form action=user.php method=post>"._NICKNAME.":<input class=TEXTAREA type=text name=uname size=10 maxlength=25>&nbsp; "._PASSWORD.":<input class=TEXTAREA type=password name=pass size=10 maxlength=25>&nbsp;<input type=image src=themes/edazine/images/login.gif border=0>
 <a href=user.php><img src=themes/edazine/images/register.gif border=0></a><input type=hidden name=op value=login>";
} else { 
print "<br>[ <font size=1>"._WELCOMETO." $sitename <b> $cookie[1]! </b> ]";
}
echo "</form>";
CloseTable2();

}

function themefooter() {
 

// BEGIN edazine CREDIT //
// PLEASE OUT OF RESPECT, DO NOT REMOVE //
  global $index;
    if ($index == 1) {
echo "<td background=themes/edazine/rightline.gif width=17 valign=top>&nbsp; </td>
    <td width=136 valign=top>";
 blocks(right);
 
   }

    echo" <TD width=8></TD>
  </TR>
</TABLE>
    </td>
  </tr>
</table>";

// END CREDIT //

?><br><table border=0 bgcolor=#FFCC00 cellspacing=0 cellpadding=0 width=765><tr><td><? OpenTable2();?><table border=0 cellpadding=0 cellspacing=0 width=99%>
  <tr>
    <td> <? echo "<center>
        <table border=0 cellpadding=0 cellspacing=0>
          <tr>
            <td></td>
            <td>";
             echo "</td>
            <td><b></td>
          </tr>
        </table>
        </center>
      </div>
  </tr>
  <tr>
    <td></td>
  </tr>
  <tr>
<p align=center>
<td><br>"; footmsg(); echo" </td>
  </tr>
</table>"; CloseTable();
echo "</td></tr></table></td>
  </tr>
  <tr>";?>
    <td width="100%"><img border="0" src="themes/edazine/bottom-left.gif" align="left" hspace="0" width="8" height="8"><img border="0" src="themes/edazine/bottom-right.gif" align="right" hspace="0" width="8" height="8"></td>
  </tr>
</table><br> <?


}

function themeindex ($aid, $informant, $datetime, $title, $counter, $topic, $thetext, $notes, $morelink, $topicname, $topicimage, $topictext) {
        global $tipath, $anonymous;
        ?>
        <TABLE width="100%" border="0" cellspacing="0" cellpadding="0" align="center">
        <TR>
          <TD height="8" width="8" background="themes/edazine/images/table/top-left.gif"></TD>
          <TD background="themes/edazine/images/table/top-center.gif" height="8"></TD>
          <TD width="8" height="8" background="themes/edazine/images/table/top-right.gif"></TD>
        </TR>
        <TR>
          <TD background="themes/edazine/images/table/middle-left.gif" width="8" height="16"></TD>
          <TD background="themes/edazine/images/table/middle-center2.gif" height="16">
            &nbsp;&nbsp;&nbsp;&nbsp;<B><?php echo "<font color=#FFFFFF><b>&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;$title</b></font>"; ?></B></TD>
          <TD width="8" background="themes/edazine/images/table/middle-right.gif" height="16"></TD>
        </TR>
        <TR>
          <TD background="themes/edazine/images/table/tab-left.gif" width="8"></TD>
          <TD background="themes/edazine/images/table/tab-center.gif" class=posted>
           <?php echo _POSTEDBY; ?> <?php formatAidHeader($aid); ?> <?php echo _ON." $datetime $timezone "."($counter "._READS.")"; ?>
          </TD>
          <TD width="8" background="themes/edazine/images/table/tab-right.gif"></TD>
        </TR>
        <TR>
          <TD background="themes/edazine/images/table/tab-left.gif" width="8"></TD>
          <TD background="themes/edazine/images/table/tab-center.gif">
            <a href="search.php?query=&topic=<?php echo"$topic"; ?>&author="><img src=<?php echo "$tipath$topicimage"; ?> border=0 Alt=<?php echo"\"$topictext\""; ?> align=right hspace=10 vspace=10></a>
            <?php FormatStory($thetext, $notes, $aid, $informant); ?>
            &nbsp;<BR>
          </TD>
          <TD width="8" background="themes/edazine/images/table/tab-right.gif"></TD>
        </TR>
        <TR>
          <TD background="themes/edazine/images/table/middle-left.gif" width="8" height="16"></TD>
          <TD background="themes/edazine/images/table/middle-center3.gif" height="16" class=title nowrap>
            <img src="themes/edazine/images/menu.gif" border=0>
            <?php echo "$morelink"; ?>
          </TD>
          <TD width="8" background="themes/edazine/images/table/middle-right.gif" height="16"></TD>
        </TR>
        <TR>
          <TD background="themes/edazine/images/table/bottom-left.gif" width="8" height="8"></TD>
          <TD background="themes/edazine/images/table/bottom-center.gif" height="8"></TD>
          <TD width="8" background="themes/edazine/images/table/bottom-right.gif" height="8"></TD>
        </TR>
        <TR>
          <TD height="8"></TD>
        </TR>
      </TABLE>
<?php
}

function themearticle ($aid, $informant, $datetime, $title, $thetext, $topic, $topicname, $topicimage, $topictext) {
        global $admin, $sid, $tipath;
?>
      <TABLE width="100%" border="0" cellspacing="0" cellpadding="0" align="center">
        <TR>
          <TD height="8" width="8" background="themes/edazine/images/table/top-left.gif"></TD>
          <TD background="themes/edazine/images/table/top-center.gif" height="8"></TD>
          <TD width="8" height="8" background="themes/edazine/images/table/top-right.gif"></TD>
        </TR>
        <TR>
          <TD background="themes/edazine/images/table/middle-left.gif" width="8" height="16"></TD>
          <TD background="themes/edazine/images/table/middle-center2.gif" height="16" >
            &nbsp;&nbsp;&nbsp;&nbsp;<B><?php echo "<font color=#FFFFFF><b>&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;$title</b></font>"; ?></B></TD>
          <TD width="8" background="themes/edazine/images/table/middle-right.gif" height="16"></TD>
        </TR>
        <TR>
          <TD background="themes/edazine/images/table/tab-left.gif" width="8"></TD>
          <TD background="themes/edazine/images/table/tab-center.gif" class=posted>
            <?php echo _POSTEDON." $datetime "._BY; ?> <?php formatAidHeader($aid); ?>
            <?php if ($admin) {
                    echo "&nbsp;&nbsp;[ <a href=admin.php?op=EditStory&sid=$sid>"._EDIT."</a> | <a href=admin.php?op=RemoveStory&sid=$sid>"._DELETE."</a> ]";
                      } ?>
            <BR>
            <?php echo _CONTRIBUTEDBY." "."<a href=\"user.php?op=userinfo&uname=$informant\">$informant</a>"; ?>
          </TD>
          <TD width="8" background="themes/edazine/images/table/tab-right.gif"></TD>
        </TR>
        <TR>
          <TD background="themes/edazine/images/table/tab-left.gif" width="8"></TD>
          <TD background="themes/edazine/images/table/tab-center.gif">
            <a href="search.php?query=&topic=<?php echo"$topic"; ?>&author="><img src=<?php echo "$tipath$topicimage"; ?> border=0 Alt=<?php echo"\"$topictext\""; ?> align=right hspace=10 vspace=10></a>
            <?php FormatStory($thetext, $notes, $aid, $informant); ?>
            <BR><BR>
          </TD>
          <TD width="8" background="themes/edazine/images/table/tab-right.gif"></TD>
        </TR>
        <TR>
          <TD background="themes/edazine/images/table/bottom-left.gif" width="8" height="8"></TD>
          <TD background="themes/edazine/images/table/bottom-center.gif" height="8"></TD>
          <TD width="8" background="themes/edazine/images/table/bottom-right.gif" height="8"></TD>
        </TR>
        <TR>
          <TD height="8"></TD>
        </TR>
      </TABLE>
<?php
}

function themesidebox($title, $content) {
?>
      <TABLE width="146" border="0" cellspacing="0" cellpadding="0">
        <TR>
          <TD height="8" width="8" background="themes/edazine/images/table/top-left.gif"></TD>
          <TD background="themes/edazine/images/table/top-center.gif" height="8" width="130"></TD>
          <TD width="8" height="8" background="themes/edazine/images/table/top-right.gif"></TD>
        </TR>
        <TR>
          <TD background="themes/edazine/images/table/middle-left.gif" width="8" height="16"></TD>
          <TD background="themes/edazine/images/table/middle-center.gif" height="16" width="130" >&nbsp;&nbsp;&nbsp;&nbsp;<b><?php echo"<font color=#FFFFFF><b>$title</b></font>"; ?></b></TD>
          <TD width="8" background="themes/edazine/images/table/middle-right.gif" height="16"></TD>
        </TR>
        <TR>
          <TD background="themes/edazine/images/table/tab-left.gif" width="8"></TD>
          <TD background="themes/edazine/images/table/tab-center.gif" width="130"><?php echo"$content"; ?></TD>
          <TD width="8" background="themes/edazine/images/table/tab-right.gif"></TD>
        </TR>
        <TR>
          <TD background="themes/edazine/images/table/bottom-left.gif" width="8" height="8"></TD>
          <TD background="themes/edazine/images/table/bottom-center.gif" height="8" width="130"></TD>
          <TD width="8" background="themes/edazine/images/table/bottom-right.gif" height="8"></TD>
        </TR>
        <TR>
          <TD height="8"></TD>
        </TR>
      </TABLE>

<?php
}

?>