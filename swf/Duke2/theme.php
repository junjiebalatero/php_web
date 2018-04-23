<?php

$thename = "Duke2";
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
          <TD height="8" width="8" background="themes/Duke2/images/table/top-left.gif"></TD>
          <TD background="themes/Duke2/images/table/top-center.gif" height="8"></TD>
          <TD width="8" height="8" background="themes/Duke2/images/table/top-right.gif"></TD>
        </TR><tr>  <TD background="themes/Duke2/images/table/tab-left.gif" width="8"></TD>
          <TD background="themes/Duke2/images/table/tab-center.gif" class=posted>
        <?
}

function OpenTable2() {
    global $bgcolor1, $bgcolor2;?>
   <TABLE width="100%" border="0" cellspacing="0" cellpadding="0" align="center">
        <TR>
          <TD height="8" width="8" background="themes/Duke2/images/table/top-left.gif"></TD>
          <TD background="themes/Duke2/images/table/top-center.gif" height="8"></TD>
          <TD width="8" height="8" background="themes/Duke2/images/table/top-right.gif"></TD>
        </TR><tr>  <TD background="themes/Duke2/images/table/tab-left.gif" width="8"></TD>
          <TD background="themes/Duke2/images/table/tab-center.gif" class=posted><?
}

function CloseTable() {?>
   <TD width="8" background="themes/Duke2/images/table/tab-right.gif"></TD>
        </TR>
        <TR>
          <TD background="themes/Duke2/images/table/bottom-left.gif" width="8" height="8"></TD>
          <TD background="themes/Duke2/images/table/bottom-center.gif" height="8"></TD>
          <TD width="8" background="themes/Duke2/images/table/bottom-right.gif" height="8"></TD></TR>
        <TR><TD height="8"></TD></TR></TABLE> <?
}

function CloseTable2() {?>
   <TD width="8" background="themes/Duke2/images/table/tab-right.gif"></TD>
        </TR>
        <TR>
          <TD background="themes/Duke2/images/table/bottom-left.gif" width="8" height="8"></TD>
          <TD background="themes/Duke2/images/table/bottom-center.gif" height="8"></TD>
          <TD width="8" background="themes/Duke2/images/table/bottom-right.gif" height="8"></TD>
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

echo " <head><LINK rel=\"StyleSheet\" HREF=\"themes/Duke2/style/style.css\" TYPE=\"text/css\">";

echo "</head><body bgcolor=#FFCC00 marginwidth=0 marginheight=0 topmargin=5 leftmargin=0>
<a name=#top></a><div align=center>
  <center>";
  ?><div align="center">
        
<table border="0" cellspacing="0" cellpadding="0" bgcolor="#FFCC00">
  <tr>
    <td width="149"><a href="index.php"><img alt="CreationSite" src="themes/Duke2/images/gologo1.jpg" border="0" width="149" height="58"></a></td>
    <td><table border="0" cellspacing="0" cellpadding="0">
  <tr>
    <td width="600" height="27">&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp; <a href="EnvMail.php?email=pop"><img src="themes/Duke2/images/mail.gif" border="0" width="74" height="21"></a>&nbsp;&nbsp;
      <a href="ban-ex.php?op=add_client"><img src="themes/Duke2/images/banne_.gif" border="0" width="110" height="21"></a>&nbsp;&nbsp;
      <a href="links.php"><img src="themes/Duke2/images/ANNUAIRE.gif" border="0" width="102" height="21"></a>&nbsp;&nbsp;
      <?  if ($username == "Anonymous") {
                echo "<a href=user.php></font><img border=0 src=themes/Duke2/sticker03.gif width=178 height=21></a>";
                }else{
                echo "<a href=user.php?op=edituser></font><img border=0 src=themes/Duke2/compte.gif width=154 height=21></a>";
                }
              ?></td>
  </tr>
  <tr>
    <td width="600" bgcolor="#FF6400" height="31"><b><font size="3">&nbsp;</font><font face="Times New Roman" color="#ffff00" size="2">
    <a href="index.php"><?PHP echo ""._MAIN.""; ?></a>&nbsp;
    <a href="partenaires.php?page=ajout_partenaire">Partners</a>&nbsp;
    <a href="submit.php"><?PHP echo ""._SUBMITNEWS.""; ?></a>&nbsp;
    <a href="download.php"><?PHP echo ""._DOWNLOADS.""; ?></a>&nbsp;
    <a href="contact.php">Contact</a>&nbsp;
    <a href="top.php"><?PHP echo ""._TOP10.""; ?></a>&nbsp;
    <a href="sub.php">Référenceur</a>&nbsp;
    <a href="links.php?op=AddLink"><?PHP echo ""._ADDLINK.""; ?></a></font></td>
  </tr>
</table>
</td>
  </tr>
</table><center><table border=0 width=775><tr><td>
<?
echo "<br><table width=100% border=0 cellspacing=0 cellpadding=0>
   <TR>
    <TD width=8></form></TD>
    <TD width=136 valign=top>
      ";
      
  blocks(left);
        
  
/*   statbox(); */
echo "</TD>
    <TD width=16>&nbsp;&nbsp;</TD>
    <TD valign=top>";
  OpenTable2();

if ($username == "Anonymous") {
print "<form action=user.php method=post>"._NICKNAME.":<input class=TEXTAREA type=text name=uname size=10 maxlength=25>&nbsp; "._PASSWORD.":<input class=TEXTAREA type=password name=pass size=10 maxlength=25>&nbsp;<input type=image src=themes/Duke2/images/login.gif border=0>
 <a href=user.php><img src=themes/Duke2/images/register.gif border=0></a><input type=hidden name=op value=login><br>&nbsp;";
} else { 
print "<br>[ <font size=1>"._WELCOMETO."  $sitename <b> $cookie[1]! </b> ]<br>&nbsp;";
}
CloseTable2();
echo "</form>";
}

function themefooter() {
 

// BEGIN Duke2 CREDIT //
// PLEASE OUT OF RESPECT, DO NOT REMOVE //
  global $index;
    if ($index == 1) {
echo "<td background=themes/Duke2/rightline.gif width=17 valign=top>&nbsp; </td>
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
    <td>
    <? echo "
<p align=center>
<td><br>"; footmsg(); echo" </td>
  </tr>
</table>"; CloseTable();
echo "</td></tr></table><br>";


}

function themeindex ($aid, $informant, $datetime, $title, $counter, $topic, $thetext, $notes, $morelink, $topicname, $topicimage, $topictext) {
        global $tipath, $anonymous;
        ?>
        <TABLE width="100%" border="0" cellspacing="0" cellpadding="0" align="center">
        <TR>
          <TD height="8" width="8" background="themes/Duke2/images/table/top-left.gif"></TD>
          <TD background="themes/Duke2/images/table/top-center.gif" height="8"></TD>
          <TD width="8" height="8" background="themes/Duke2/images/table/top-right.gif"></TD>
        </TR>
        <TR>
          <TD background="themes/Duke2/images/table/middle-left.gif" width="8" height="16"></TD>
          <TD background="themes/Duke2/images/table/middle-center2.gif" height="16">
            &nbsp;&nbsp;&nbsp;&nbsp;<B><?php echo "<font color=#FFFFFF><b>$title</b></font>"; ?></B></TD>
          <TD width="8" background="themes/Duke2/images/table/middle-right.gif" height="16"></TD>
        </TR>
        <TR>
          <TD background="themes/Duke2/images/table/tab-left.gif" width="8"></TD>
          <TD background="themes/Duke2/images/table/tab-center.gif" class=posted>
           <?php echo _POSTEDBY; ?> <?php formatAidHeader($aid); ?> <?php echo _ON." $datetime $timezone "."($counter "._READS.")"; ?>
          </TD>
          <TD width="8" background="themes/Duke2/images/table/tab-right.gif"></TD>
        </TR>
        <TR>
          <TD background="themes/Duke2/images/table/tab-left.gif" width="8"></TD>
          <TD background="themes/Duke2/images/table/tab-center.gif">
            <a href="search.php?query=&topic=<?php echo"$topic"; ?>&author="><img src=<?php echo "$tipath$topicimage"; ?> border=0 Alt=<?php echo"\"$topictext\""; ?> align=right hspace=10 vspace=10></a>
            <?php FormatStory($thetext, $notes, $aid, $informant); ?>
            &nbsp;<BR>
          </TD>
          <TD width="8" background="themes/Duke2/images/table/tab-right.gif"></TD>
        </TR>
        <TR>
          <TD background="themes/Duke2/images/table/middle-left.gif" width="8" height="16"></TD>
          <TD background="themes/Duke2/images/table/middle-center3.gif" height="16" class=title nowrap>
            <img src="themes/Duke2/images/menu.gif" border=0>
            <?php echo "$morelink"; ?>
          </TD>
          <TD width="8" background="themes/Duke2/images/table/middle-right.gif" height="16"></TD>
        </TR>
        <TR>
          <TD background="themes/Duke2/images/table/bottom-left.gif" width="8" height="8"></TD>
          <TD background="themes/Duke2/images/table/bottom-center.gif" height="8"></TD>
          <TD width="8" background="themes/Duke2/images/table/bottom-right.gif" height="8"></TD>
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
          <TD height="8" width="8" background="themes/Duke2/images/table/top-left.gif"></TD>
          <TD background="themes/Duke2/images/table/top-center.gif" height="8"></TD>
          <TD width="8" height="8" background="themes/Duke2/images/table/top-right.gif"></TD>
        </TR>
        <TR>
          <TD background="themes/Duke2/images/table/middle-left.gif" width="8" height="16"></TD>
          <TD background="themes/Duke2/images/table/middle-center2.gif" height="16" >
            &nbsp;&nbsp;&nbsp;&nbsp;<B><?php echo "<font color=#FFFFFF><b>$title</b></font>"; ?></B></TD>
          <TD width="8" background="themes/Duke2/images/table/middle-right.gif" height="16"></TD>
        </TR>
        <TR>
          <TD background="themes/Duke2/images/table/tab-left.gif" width="8"></TD>
          <TD background="themes/Duke2/images/table/tab-center.gif" class=posted>
            <?php echo _POSTEDON." $datetime "._BY; ?> <?php formatAidHeader($aid); ?>
            <?php if ($admin) {
                    echo "&nbsp;&nbsp;[ <a href=admin.php?op=EditStory&sid=$sid>"._EDIT."</a> | <a href=admin.php?op=RemoveStory&sid=$sid>"._DELETE."</a> ]";
                      } ?>
            <BR>
            <?php echo ""._CONTRIBUTEDBY." <a href=\"user.php?op=userinfo&uname=$informant\">$informant</a>"; ?>
          </TD>
          <TD width="8" background="themes/Duke2/images/table/tab-right.gif"></TD>
        </TR>
        <TR>
          <TD background="themes/Duke2/images/table/tab-left.gif" width="8"></TD>
          <TD background="themes/Duke2/images/table/tab-center.gif">
            <a href="search.php?query=&topic=<?php echo"$topic"; ?>&author="><img src=<?php echo "$tipath$topicimage"; ?> border=0 Alt=<?php echo"\"$topictext\""; ?> align=right hspace=10 vspace=10></a>
            <?php FormatStory($thetext, $notes, $aid, $informant); ?>
            <BR><BR>
          </TD>
          <TD width="8" background="themes/Duke2/images/table/tab-right.gif"></TD>
        </TR>
        <TR>
          <TD background="themes/Duke2/images/table/bottom-left.gif" width="8" height="8"></TD>
          <TD background="themes/Duke2/images/table/bottom-center.gif" height="8"></TD>
          <TD width="8" background="themes/Duke2/images/table/bottom-right.gif" height="8"></TD>
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
          <TD height="8" width="8" background="themes/Duke2/images/table/top-left.gif"></TD>
          <TD background="themes/Duke2/images/table/top-center.gif" height="8" width="130"></TD>
          <TD width="8" height="8" background="themes/Duke2/images/table/top-right.gif"></TD>
        </TR>
        <TR>
          <TD background="themes/Duke2/images/table/middle-left.gif" width="8" height="16"></TD>
          <TD background="themes/Duke2/images/table/middle-center.gif" height="16" width="130" >&nbsp;&nbsp;&nbsp;&nbsp;<b><?php echo"<font color=#FFFFFF><b>$title</b></font>"; ?></b></TD>
          <TD width="8" background="themes/Duke2/images/table/middle-right.gif" height="16"></TD>
        </TR>
        <TR>
          <TD background="themes/Duke2/images/table/tab-left.gif" width="8"></TD>
          <TD background="themes/Duke2/images/table/tab-center.gif" width="130"><?php echo"$content"; ?></TD>
          <TD width="8" background="themes/Duke2/images/table/tab-right.gif"></TD>
        </TR>
        <TR>
          <TD background="themes/Duke2/images/table/bottom-left.gif" width="8" height="8"></TD>
          <TD background="themes/Duke2/images/table/bottom-center.gif" height="8" width="130"></TD>
          <TD width="8" background="themes/Duke2/images/table/bottom-right.gif" height="8"></TD>
        </TR>
        <TR>
          <TD height="8"></TD>
        </TR>
      </TABLE>

<?php
}

?>