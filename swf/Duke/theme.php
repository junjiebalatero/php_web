<?php

$thename = "Duke";
$bgcolor1 = "#FFCC66";
$bgcolor2 = "#FFCC00";
$bgcolor3 = "#fe9732";
$bgcolor4 = "#fe9732";
$textcolor1 = "#EFEFEF";
$textcolor2 = "#000000";
$hr = 1; # 1 to have horizonal rule in comments instead of table bgcolor

function OpenTable() {
    global $bgcolor1, $bgcolor2;?>
   <TABLE width="100%" border="0" cellspacing="0" cellpadding="0" align="center">
        <TR>
          <TD height="8" width="8" background="themes/Duke/images/table/top-left.gif"></TD>
          <TD background="themes/Duke/images/table/top-center.gif" height="8"></TD>
          <TD width="8" height="8" background="themes/Duke/images/table/top-right.gif"></TD>
        </TR><tr>  <TD background="themes/Duke/images/table/tab-left.gif" width="8"></TD>
          <TD background="themes/Duke/images/table/tab-center.gif" class=posted>
        <?
}

function OpenTable2() {
    global $bgcolor1, $bgcolor2;?>
   <TABLE width="100%" border="0" cellspacing="0" cellpadding="0" align="center">
        <TR>
          <TD height="8" width="8" background="themes/Duke/images/table/top-left.gif"></TD>
          <TD background="themes/Duke/images/table/top-center.gif" height="8"></TD>
          <TD width="8" height="8" background="themes/Duke/images/table/top-right.gif"></TD>
        </TR><tr>  <TD background="themes/Duke/images/table/tab-left.gif" width="8"></TD>
          <TD background="themes/Duke/images/table/tab-center.gif" class=posted><?
}

function CloseTable() {?>
   <TD width="8" background="themes/Duke/images/table/tab-right.gif"></TD>
        </TR>
        <TR>
          <TD background="themes/Duke/images/table/bottom-left.gif" width="8" height="8"></TD>
          <TD background="themes/Duke/images/table/bottom-center.gif" height="8"></TD>
          <TD width="8" background="themes/Duke/images/table/bottom-right.gif" height="8"></TD></TR>
        <TR><TD height="8"></TD></TR></TABLE> <?
}

function CloseTable2() {?>
   <TD width="8" background="themes/Duke/images/table/tab-right.gif"></TD>
        </TR>
        <TR>
          <TD background="themes/Duke/images/table/bottom-left.gif" width="8" height="8"></TD>
          <TD background="themes/Duke/images/table/bottom-center.gif" height="8"></TD>
          <TD width="8" background="themes/Duke/images/table/bottom-right.gif" height="8"></TD>
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
echo " <head><LINK rel=\"StyleSheet\" HREF=\"themes/Duke/style/style.css\" TYPE=\"text/css\">";
echo "</head><body bgcolor=#FFFFFF marginwidth=0 marginheight=0 topmargin=0 leftmargin=0>
<a name=#top></a><div align=center>
  <center>
<table border=0 bgcolor=#ffffff cellspacing=0 cellpadding=0 width=785>
  <tr> 
    <td>
<div align=center>
  <center><table border=0 background=themes/Duke/images/bg_header.gif cellspacing=0 cellpadding=0 width=780>
  <tr> 
    <td width=10><img src=themes/Duke/images/space.gif width=10 height=20></td>
    <td width=512 valign=top>";?><br><br>
<table border="0" cellpadding="0" cellspacing="0">
<TR><TD Colspan=6 bgcolor="#0089cd"><img src="/graphics/blank.gif" width=1 height=1 border="0"></TD></TR>
  <tr>
    <td>&nbsp;<img border=0 src=themes/Duke/images/menu.gif> <a href="index.php" target="_top" class=nav><?PHP echo ""._MAIN.""; ?></a></td>
    <td>&nbsp;<img border=0 src=themes/Duke/images/menu.gif> <a href="meta_gen.php" target="_top" class=nav>Meta Tags</a></td>
    <td>&nbsp;<img border=0 src=themes/Duke/images/menu.gif> <a href="EnvMail.php?email=pop" target="_top" class=nav><?PHP echo ""._EMAIL.""; ?></a></td>
    <td>&nbsp;<img border=0 src=themes/Duke/images/menu.gif> <a href="submit.php" target="_top" class=nav><?PHP echo ""._SUBMITNEWS.""; ?></a></td>
    <td>&nbsp;<img border=0 src=themes/Duke/images/menu.gif> <a href="news.php" target="_top" class=nav>Newsletter</a></td>
    <td>&nbsp;<img border=0 src=themes/Duke/images/menu.gif> <a href="modules.php?op=modload&name=Forum&file=index" target="_top" class=nav><?PHP echo ""._FORUMS.""; ?></a></td>
  </tr>
  <tr>
  <TR><TD Colspan=6 bgcolor="#0089cd"><img src="/graphics/blank.gif" width=1 height=1 border="0"></TD></TR>
    <td>&nbsp;<img border=0 src=themes/Duke/images/menu.gif> <a href="top.php" target="_top" class=nav>Top 10</a></td>
    <td>&nbsp;<img border=0 src=themes/Duke/images/menu.gif> <a href="memberslist.php" target="_top" class=nav><?PHP echo ""._MEMBERSLIST.""; ?></a></td>
    <td>&nbsp;<img border=0 src=themes/Duke/images/menu.gif> <a href="links.php" target="_top" class=nav><?PHP echo ""._LINKS.""; ?></a></td>
    <td>&nbsp;<img border=0 src=themes/Duke/images/menu.gif> <a href="http://www.ma-banniere.fr.st" target="_blank" class="nav">Banners</a></td>
    <td>&nbsp;<img border=0 src=themes/Duke/images/menu.gif> <a href="stats.php" target="_top" class=nav><?PHP echo ""._STATS.""; ?></a></td>
    <td>&nbsp;<img border=0 src=themes/Duke/images/menu.gif> <a target="_top" class="nav" href="friend.php"><?PHP echo ""._YOURFRIEND.""; ?></a></td>
  </tr>
  <tr>
  <TR><TD Colspan=6 bgcolor="#0089cd"><img src="/graphics/blank.gif" width=1 height=1 border="0"></TD></TR>
    <td>&nbsp;<img border=0 src=themes/Duke/images/menu.gif> <a target="_top" class="nav" href="reviews.php"><?PHP echo ""._REVIEWS.""; ?></a></td>
    <td>&nbsp;<img border=0 src=themes/Duke/images/menu.gif> <a href="topics.php" target="_top" class=nav><?PHP echo ""._TOPICS.""; ?></a></td>
    <td>&nbsp;<img border=0 src=themes/Duke/images/menu.gif> <a href="contact.php" target="_top" class=nav>Contact</a></td>
    <td>&nbsp;<img border=0 src=themes/Duke/images/menu.gif> <a href="pollBooth.php" target="_top" class="nav"><?PHP echo ""._POLLS.""; ?></a></td>
    <td>&nbsp;<img border=0 src=themes/Duke/images/menu.gif> <a href="download.php" target="_top" class=nav><?PHP echo ""._DOWNLOADS.""; ?></a></td>
    <td>&nbsp;<img border=0 src=themes/Duke/images/menu.gif> <a target="_top" class="nav" href="links.php?op=AddLink"><?PHP echo ""._ADDLINK.""; ?></a></td>
  </tr>
  <TR><TD Colspan=6 bgcolor="#0089cd"><img src="/graphics/blank.gif" width=1 height=1 border="0"></TD></TR>
</table>
<?


echo "</td>
    <td  valign=top width=258> 
      <div align=center>
  <center><table border=0 cellspacing=0 cellpadding=0 width=100%>
        <tr> 
          <td align=right></td>
        

        </tr>
      </table>
     <br>
     &nbsp;&nbsp;<font color=#FFC878><b>EDAZINE Le Portail Pour Tous</font></b><br><img src=themes/Duke/images/gcn_logo.gif width=137 height=23><br><a href=partenaires.php?page=ajout_partenaire class=nav>Devenez Partenaire</a> </td>
  </tr>
  <tr> 
    <td width=10><img src=themes/Duke/images/space.gif width=10 height=28></td>
    <td width=512 valign=bottom> 
      <table border=0 cellspacing=0 cellpadding=0>
        <tr> 
          <td width=72 height=18><img src=themes/Duke/images/space.gif height=15 width=0><img src=themes/Duke/images/gcn.gif width=90 height=23 name=we alt=(c)2001 border=0></td>
          <td width=407 height=18><img src=themes/Duke/images/space.gif width=4 height=20>
	 
	 
	 </td>
        </tr>
      </table>
    </td>
  </tr>
  <tr> 
    <td width=10 ><img src=themes/Duke/images/space.gif width=10></td>
    <td width=512 valign=top height=22>";

if ($username == "Anonymous") {
print "<form action=user.php method=post><br>Pseudo:<input class=TEXTAREA type=text name=uname size=12 maxlength=25>&nbsp; Mot de Passe:<input class=TEXTAREA type=password name=pass size=12 maxlength=25><input type=image src=themes/Duke/images/login.gif border=0>
 <a href=user.php><img src=themes/Duke/images/register.gif border=0></a><input type=hidden name=op value=login><br>&nbsp;";


} else { 


print "<br>[ <font size=1>"._WELCOMETO."  $sitename $cookie[1]! &nbsp; | &nbsp;<a href=user.php>"._ACCOUNT."</a>&nbsp; | &nbsp;<a href=user.php?op=edituser>"._CHANGEYOURINFO."</a>&nbsp; | &nbsp;<a href=user.php?op=logout>"._LOGOUT."</a> ]<br><br>&nbsp;";

}
echo "</td></tr></table>
<table width=100% border=0 cellspacing=0 cellpadding=0>
   <TR>
    <TD width=8></form></TD>
    <TD width=136 valign=top>
      ";
      
  blocks(left);
       
echo "</TD>
    <TD width=16>&nbsp;&nbsp;</TD>
    <TD valign=top>";
    

}

function themefooter() {
 

// BEGIN Duke CREDIT //
// PLEASE OUT OF RESPECT, DO NOT REMOVE //
  global $index;
    if ($index == 1) {
echo "<td background=themes/Duke/rightline.gif width=17 valign=top>&nbsp; </td>
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

?><br><table border=0 bgcolor=#ffffff cellspacing=0 cellpadding=0 width=765><tr><td><? OpenTable2();?><table border=0 cellpadding=0 cellspacing=0 width=99%>
  <tr>
    <td>
        </td>
  </tr>
  <tr>
<p align=center><? echo"
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
          <TD height="8" width="8" background="themes/Duke/images/table/top-left.gif"></TD>
          <TD background="themes/Duke/images/table/top-center.gif" height="8"></TD>
          <TD width="8" height="8" background="themes/Duke/images/table/top-right.gif"></TD>
        </TR>
        <TR>
          <TD background="themes/Duke/images/table/middle-left.gif" width="8" height="16"></TD>
          <TD background="themes/Duke/images/table/middle-center2.gif" height="16">
            &nbsp;&nbsp;&nbsp;&nbsp;<B><?php echo "<font color=#FFFFFF><b>$title</b></font>"; ?></B></TD>
          <TD width="8" background="themes/Duke/images/table/middle-right.gif" height="16"></TD>
        </TR>
        <TR>
          <TD background="themes/Duke/images/table/tab-left.gif" width="8"></TD>
          <TD background="themes/Duke/images/table/tab-center.gif" class=posted>
           <?php echo _POSTEDBY; ?> <?php formatAidHeader($aid); ?> <?php echo _ON." $datetime $timezone "."($counter "._READS.")"; ?>
          </TD>
          <TD width="8" background="themes/Duke/images/table/tab-right.gif"></TD>
        </TR>
        <TR>
          <TD background="themes/Duke/images/table/tab-left.gif" width="8"></TD>
          <TD background="themes/Duke/images/table/tab-center.gif">
            <a href="search.php?query=&topic=<?php echo"$topic"; ?>&author="><img src=<?php echo "$tipath$topicimage"; ?> border=0 Alt=<?php echo"\"$topictext\""; ?> align=right hspace=10 vspace=10></a>
            <?php FormatStory($thetext, $notes, $aid, $informant); ?>
            &nbsp;<BR>
          </TD>
          <TD width="8" background="themes/Duke/images/table/tab-right.gif"></TD>
        </TR>
        <TR>
          <TD background="themes/Duke/images/table/middle-left.gif" width="8" height="16"></TD>
          <TD background="themes/Duke/images/table/middle-center3.gif" height="16" class=title nowrap>
            <img src="themes/Duke/images/menu.gif" border=0>
            <?php echo "$morelink"; ?>
          </TD>
          <TD width="8" background="themes/Duke/images/table/middle-right.gif" height="16"></TD>
        </TR>
        <TR>
          <TD background="themes/Duke/images/table/bottom-left.gif" width="8" height="8"></TD>
          <TD background="themes/Duke/images/table/bottom-center.gif" height="8"></TD>
          <TD width="8" background="themes/Duke/images/table/bottom-right.gif" height="8"></TD>
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
          <TD height="8" width="8" background="themes/Duke/images/table/top-left.gif"></TD>
          <TD background="themes/Duke/images/table/top-center.gif" height="8"></TD>
          <TD width="8" height="8" background="themes/Duke/images/table/top-right.gif"></TD>
        </TR>
        <TR>
          <TD background="themes/Duke/images/table/middle-left.gif" width="8" height="16"></TD>
          <TD background="themes/Duke/images/table/middle-center2.gif" height="16" >
            &nbsp;&nbsp;&nbsp;&nbsp;<B><?php echo "<font color=#FFFFFF><b>$title</b></font>"; ?></B></TD>
          <TD width="8" background="themes/Duke/images/table/middle-right.gif" height="16"></TD>
        </TR>
        <TR>
          <TD background="themes/Duke/images/table/tab-left.gif" width="8"></TD>
          <TD background="themes/Duke/images/table/tab-center.gif" class=posted>
            <?php echo _POSTEDON." $datetime "._BY; ?> <?php formatAidHeader($aid); ?>
            <?php if ($admin) {
                    echo "&nbsp;&nbsp;[ <a href=admin.php?op=EditStory&sid=$sid>"._EDIT."</a> | <a href=admin.php?op=RemoveStory&sid=$sid>"._DELETE."</a> ]";
                      } ?>
            <BR>
            <?php echo _CONTRIBUTEDBY." "."<a href=\"user.php?op=userinfo&uname=$informant\">$informant</a>"; ?>
          </TD>
          <TD width="8" background="themes/Duke/images/table/tab-right.gif"></TD>
        </TR>
        <TR>
          <TD background="themes/Duke/images/table/tab-left.gif" width="8"></TD>
          <TD background="themes/Duke/images/table/tab-center.gif">
            <a href="search.php?query=&topic=<?php echo"$topic"; ?>&author="><img src=<?php echo "$tipath$topicimage"; ?> border=0 Alt=<?php echo"\"$topictext\""; ?> align=right hspace=10 vspace=10></a>
            <?php FormatStory($thetext, $notes, $aid, $informant); ?>
            <BR><BR>
          </TD>
          <TD width="8" background="themes/Duke/images/table/tab-right.gif"></TD>
        </TR>
        <TR>
          <TD background="themes/Duke/images/table/bottom-left.gif" width="8" height="8"></TD>
          <TD background="themes/Duke/images/table/bottom-center.gif" height="8"></TD>
          <TD width="8" background="themes/Duke/images/table/bottom-right.gif" height="8"></TD>
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
          <TD height="8" width="8" background="themes/Duke/images/table/top-left.gif"></TD>
          <TD background="themes/Duke/images/table/top-center.gif" height="8" width="130"></TD>
          <TD width="8" height="8" background="themes/Duke/images/table/top-right.gif"></TD>
        </TR>
        <TR>
          <TD background="themes/Duke/images/table/middle-left.gif" width="8" height="16"></TD>
          <TD background="themes/Duke/images/table/middle-center.gif" height="16" width="130" >&nbsp;&nbsp;&nbsp;&nbsp;<b><?php echo"<font color=#FFFFFF><b>$title</b></font>"; ?></b></TD>
          <TD width="8" background="themes/Duke/images/table/middle-right.gif" height="16"></TD>
        </TR>
        <TR>
          <TD background="themes/Duke/images/table/tab-left.gif" width="8"></TD>
          <TD background="themes/Duke/images/table/tab-center.gif" width="130"><?php echo"$content"; ?></TD>
          <TD width="8" background="themes/Duke/images/table/tab-right.gif"></TD>
        </TR>
        <TR>
          <TD background="themes/Duke/images/table/bottom-left.gif" width="8" height="8"></TD>
          <TD background="themes/Duke/images/table/bottom-center.gif" height="8" width="130"></TD>
          <TD width="8" background="themes/Duke/images/table/bottom-right.gif" height="8"></TD>
        </TR>
        <TR>
          <TD height="8"></TD>
        </TR>
      </TABLE>

<?php
}

?>