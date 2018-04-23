<?php

$bgcolor1 = "#6699CC";
$bgcolor2 = "#336699";
$bgcolor3 = "#99CCFF";
$bgcolor4 = "#006699";
$textcolor1 = "#FFFFFF";
$textcolor2 = "#000000";

function OpenTable() {
    global $bgcolor1, $bgcolor2;
    ?>
<TABLE border="0" cellspacing="0" cellpadding="0" align="center" width="100%">
  <TR>
    <TD width="6" class=table-top-left height="8"><IMG src="themes/DarkBlueCSflash/images/pix.gif" alt=""></TD>
    <TD class=table-top-center height="8"><IMG src="themes/DarkBlueCSflash/images/pix.gif" alt=""></TD>
    <TD width="6" class=table-top-right height="8"><IMG src="themes/DarkBlueCSflash/images/pix.gif" alt=""></TD>
  </TR>
  <TR>
    <TD width="6" class=article-middle-left><IMG src="themes/DarkBlueCSflash/images/pix.gif" alt=""></TD>
    <TD class=article-middle-center>
<?php
}

function CloseTable() {
?>
    </TD>
    <TD width="6" class=article-middle-right><IMG src="themes/DarkBlueCSflash/images/pix.gif" alt=""></TD>
  </TR>
  <TR>
    <TD width="6" class=article-bottom-left height="3"><IMG src="themes/DarkBlueCSflash/images/pix.gif" alt=""></TD>
    <TD class=article-bottom-center height="3"><IMG src="themes/DarkBlueCSflash/images/pix.gif" alt=""></TD>
    <TD width="6" class=article-bottom-right height="3"><IMG src="themes/DarkBlueCSflash/images/pix.gif" alt=""></TD>
  </TR>
</TABLE>
<?php
}
function OpenTable2() {
    global $bgcolor1, $bgcolor2;
?>
<TABLE border="0" cellspacing="0" cellpadding="0" align="center" width="100%">
  <TR>
    <TD width="6" class=table-top-left height="8"><IMG src="themes/DarkBlueCSflash/images/pix.gif" alt=""></TD>
    <TD class=table-top-center height="8"><IMG src="themes/DarkBlueCSflash/images/pix.gif" alt=""></TD>
    <TD width="6" class=table-top-right height="8"><IMG src="themes/DarkBlueCSflash/images/pix.gif" alt=""></TD>
  </TR>
  <TR>
    <TD width="6" class=article-middle-left><IMG src="themes/DarkBlueCSflash/images/pix.gif" alt=""></TD>
    <TD class=article-middle-center>
<?php
}

function CloseTable2() {
?>
    </TD>
    <TD width="6" class=article-middle-right><IMG src="themes/DarkBlueCSflash/images/pix.gif" alt=""></TD>
  </TR>
  <TR>
    <TD width="6" class=article-bottom-left height="3"><IMG src="themes/DarkBlueCSflash/images/pix.gif" alt=""></TD>
    <TD class=article-bottom-center height="3"><IMG src="themes/DarkBlueCSflash/images/pix.gif" alt=""></TD>
    <TD width="6" class=article-bottom-right height="3"><IMG src="themes/DarkBlueCSflash/images/pix.gif" alt=""></TD>
  </TR>
</TABLE>
<?php
}

function FormatStory($thetext, $notes, $aid, $informant) {
    global $anonymous, $index;
    if ($notes != "") {
        $notes = "<FONT size=\"1\"><b>"._NOTE."</b> <i>$notes</i></FONT>\n";
    } else {
        $notes = "";
    }
    if ("$aid" == "$informant") {
        echo "$thetext<br>$notes\n";
    } else {
        if($informant != "") {
            $boxstuff = "<a href=\"user.php?op=userinfo&amp;uname=$informant\">$informant</a> ";
        } else {
            $boxstuff = "$anonymous ";
        }
          if ($index == 1) {
           $boxstuff .= "à ecrit <i>\"$thetext\"</i> <BR>$notes\n";
           } else {
           $boxstuff = "$thetext<BR>$notes\n";
           }
        echo "$boxstuff\n";
    }
}

function themeheader() {
    global $sitename, $banners, $anonymous, $username, $user, $cookie;
$topbar = 1;
cookiedecode($user);
$username = $cookie[1];
if ($username == "") {
$username = "Anonymous";
}
?>

<BODY>
<br><center><table border=0 width=795><tr><td><center><TABLE width="98%" border="0" cellspacing="0" cellpadding="0">
<?php
  if ($topbar == 1) { ?>
      <TR>
        <TD colspan=2 bgcolor="#6699CC" align="center" class=topbar><br><?php include("themes/DarkBlueCSflash/topbar.php")?></TD>
      </TR
<?php
  }
?>
  <TR>
  <?php
      if ($banners) {
echo "<TD bgcolor=\"#6699CC\" align=center valign=middle width=\"100%\">
<OBJECT classid=\"clsid:D27CDB6E-AE6D-11cf-96B8-444553540000\"
 codebase=\"http://download.macromedia.com/pub/shockwave/cabs/flash/swflash.cab#version=5,0,0,0\" WIDTH=450 HEIGHT=75>
 <PARAM NAME=movie VALUE=\"themes/DarkBlueCSflash/sitename.swf?text="._WELCOMETO." $sitename\"> 
 <PARAM NAME=quality VALUE=high>
 <PARAM NAME=bgcolor VALUE=\"#6699CC\">
 <PARAM NAME=menu VALUE=false>
 <EMBED src=\"themes/DarkBlueCSflash/sitename.swf?text=\""._WELCOMETO." $sitename\" quality=high bgcolor=\"#6699CC\"  WIDTH=450 HEIGHT=75 TYPE=\"application/x-shockwave-flash\" PLUGINSPAGE=\"http://www.macromedia.com/shockwave/download/index.cgi?P1_Prod_Version=ShockwaveFlash\" menu=false></EMBED>
</OBJECT>
</TD>
    <TD bgcolor=\"#6699CC\">";

include("banners.php");

echo    "</TD>";
     }else{
echo "<TD bgcolor=\"#6699CC\" align=center valign=middle width=\"100%\">
<OBJECT classid=\"clsid:D27CDB6E-AE6D-11cf-96B8-444553540000\"
 codebase=\"http://download.macromedia.com/pub/shockwave/cabs/flash/swflash.cab#version=5,0,0,0\" WIDTH=450 HEIGHT=75>
 <PARAM NAME=movie VALUE=\"themes/DarkBlueCSflash/sitename.swf?text="._WELCOMETO." $sitename\"> 
 <PARAM NAME=quality VALUE=high>
 <PARAM NAME=bgcolor VALUE=\"#6699CC\">
 <PARAM NAME=menu VALUE=false>
 <EMBED src=\"themes/DarkBlueCSflash/sitename.swf?text="._WELCOMETO." $sitename\" quality=high bgcolor=\"#6699CC\" WIDTH=450 HEIGHT=75 TYPE=\"application/x-shockwave-flash\" PLUGINSPAGE=\"http://www.macromedia.com/shockwave/download/index.cgi?P1_Prod_Version=ShockwaveFlash\" menu=false></EMBED>
</OBJECT>
    </TD>";

  }
?>
  </TR>
</TABLE>
<center><TABLE width="98%" border="0" cellspacing="0" cellpadding="0">
  <TR>
    <TD class=header-bottom-back-date width="180" nowrap align="center" valign="middle" height="32">
<?PHP echo  "<script type=\"text/javascript\">\n\n"
          ."<!--   // Array ofmonth Names\n"
          ."var monthNames = new Array( \""._JAN."\",\""._FEB."\",\""._MAR."\",\""._APR."\",\""._MAY."\",\""._JUN."\",\""._JUL."\",\""._AUG."\",\""._SEP."\",\""._OCT."\",\""._NOV."\",\""._DEC."\");\n"
          ."var now = new Date();\n"
          ."thisYear = now.getYear();\n"
          ."if(thisYear < 1900) {thisYear += 1900}; // corrections if Y2K display problem\n"
          ."document.write(monthNames[now.getMonth()] + \" \" + now.getDate() + \", \" + thisYear);\n"
          ."// -->\n\n"
          ."</script>\n"; ?>
          </TD>
    <TD width="7" class=header-left-center height="32" nowrap><IMG src="themes/DarkBlueCSflash/images/pix.gif" alt=""></TD>
    <TD class=header-top-back align="center" height="32" valign="middle" nowrap>
<?php
  if ($username == "Anonymous") {
?>
  <B><font color=#FFFFFF><?php echo ""._HELLO." "._USER.""; ?>&nbsp;&nbsp; <b><font color=#FFFF00><?php echo ""._RCREATEACCOUNT.""; ?></font></B>    
<?php     } else { ?>
<B><font color=#FFFFFF><?php echo ""._HELLO." $username"; ?>!</font></B>
&nbsp;<a href="user.php"><img src="themes/DarkBlueCSflash/images/menu/users.gif" alt="<?php echo ""._ACCOUNT.""; ?>" border="0"></a>
&nbsp;<a href="index.php"><img src="themes/DarkBlueCSflash/images/menu/home.gif" alt="<?php echo ""._MAIN.""; ?>" border="0"></a>
&nbsp;<a href="submit.php"><img src="themes/DarkBlueCSflash/images/menu/submit.gif" alt="E<?php echo ""._SUBMITNEWS.""; ?>" border="0"></a>
&nbsp;<a href="download.php"><img src="themes/DarkBlueCSflash/images/menu/download.gif" alt="<?php echo ""._DOWNLOADS.""; ?>" border="0"></a>
&nbsp;<a href="links.php"><img src="themes/DarkBlueCSflash/images/menu/links.gif" alt="<?php echo ""._LINKS.""; ?>" border="0"></a>
&nbsp;<a href="mailto:<?php global $adminmail; echo "$adminmail"; ?>"><img src="themes/DarkBlueCSflash/images/menu/mail.gif" alt="<?php echo ""._EMAIL.""; ?>" border="0"></a>
&nbsp;<a href="user.php?op=logout"><img src="themes/DarkBlueCSflash/images/menu/logout.gif" alt="<?php echo ""._LOGOUT.""; ?>" border="0"></a>
<?php
  }
?>

        </TD>
    <TD class=header-right-center width="7" height="32" nowrap><IMG src="themes/DarkBlueCSflash/images/pix.gif" alt=""></TD>
    <TD class=header-bottom-back-search width="180" align="center" height="32" valign="top" nowrap>
       <form action=search.php method=post>
       <input type=text name=query size=12>
       <input type=image src="themes/DarkBlueCSflash/images/buttons/search.gif">
       <input type=hidden value=submit>
       </form>
    </TD>
  </TR>
  <TR>
    <TD width="8"><IMG src="themes/DarkBlueCSflash/images/pix.gif" alt=""></TD>
  </TR>
</TABLE>
<TABLE width="100%" border="0" cellspacing="0" cellpadding="0">
  <TR>
    <TD width="8"><IMG src="themes/DarkBlueCSflash/images/pix.gif" alt=""></TD>
    <TD width="150" valign="top">
<?php
blocks(left); 
#partenaires();
?>
    </TD>
    <TD width="8"><IMG src="themes/DarkBlueCSflash/images/pix.gif" alt=""></TD>
    <TD valign="top">
<?php
}

function themefooter() {
    global $index; ?>
<?php
  if ($index == 1) {
?>


    </TD>
    <TD width="8"><IMG src="themes/DarkBlueCSflash/images/pix.gif" alt=""></TD>
    <TD width="150" valign="top">
<?php
blocks(right);
#statbox();
?>
    </TD>
<?php
}
?>
    <TD width="8"><IMG src="themes/DarkBlueCSflash/images/pix.gif" alt=""></TD>
  </TR>
</TABLE><br>
<center><TABLE width="98%" border="0" cellspacing="0" cellpadding="0">
  <TR>
    <TD width="8"><IMG src="themes/DarkBlueCSflash/images/pix.gif" alt=""></TD>
  </TR>
  <TR>
    <TD class=footer-bottom-back width="180" nowrap align="center" valign="top" height="28"><IMG src="themes/DarkBlueCSflash/images/pix.gif" alt=""></TD>
    <TD width="7" class=footer-left-center height="28"><IMG src="themes/DarkBlueCSflash/images/pix.gif" alt=""></TD>
    <TD class=footer-top-back align="center" height="28" valign="middle">
     <font color=#ffffff>Copyright &copy; 2001, amigoz.net</font>
    </TD>
    <TD class=footer-right-center width="7" height="28"><IMG src="themes/DarkBlueCSflash/images/pix.gif" alt=""></TD>
    <TD class=footer-bottom-back width="180" align="center" height="28" valign="top"><IMG src="themes/DarkBlueCSflash/images/pix.gif" alt=""></TD>
  </TR>
</TABLE>
<center><TABLE width="98%" border="0" cellspacing="0" cellpadding="0">
  <TR>
    <TD bgcolor="#6699CC" align="center"><br><?php footmsg();?>
    <table border="0" cellpadding="0" cellspacing="0" width="100%">
  <tr>
    <td>
      </tr></td></table>
<div align="center">
  <center>
        <table border="0" cellpadding="0" cellspacing="0">
          <tr>
            <td></td>
          </tr>
        </table>
  </center>
</div>
<div align="center">
  <center><table>
           <tr><td><center><a href=http://phpnuke.org target=blank><img src=images/powered/nuke.gif border=0 Alt=Web site powered by PHP-Nuke hspace=10></a>
<a href=http://www.nukeaddon.com target=blank><img src=images/powered/phpbbint.gif border=0 Alt=Web site using PHPBB Integration hspace=10></a>
<a href=http://www.apache.org target=blank><img src=images/powered/apache.gif Alt=Apache Web Server border=0 hspace=10></a>
<a href=http://www.php3.net target=blank><img src=images/powered/php2.gif Alt=PHP Scripting Language border=0 hspace=10></a></center><br>
 </td>
  </tr>
</table></center></TD>
  </TR>
</TABLE><br></tr></td></table>
<?php
}

function themeindex ($aid, $informant, $datetime, $title, $counter, $topic, $thetext, $notes, $morelink, $topicname, $topicimage, $topictext) {
        global $tipath, $anonymous, $admin, $sid;
        ?>
      <TABLE width="100%" border="0" cellspacing="0" cellpadding="0">
        <TR>
          <TD width="6" class=article-top-left height="24"><IMG src="themes/DarkBlueCSflash/images/pix.gif" alt=""></TD>
          <TD class=article-top-center height="24">
             &nbsp;<?php echo "$title"; ?>
          </TD>
          <TD width="6" class=article-top-right height="24"><IMG src="themes/DarkBlueCSflash/images/pix.gif" alt=""></TD>
        </TR>
        <TR>
          <TD width="6" class=article-middle-left><IMG src="themes/DarkBlueCSflash/images/pix.gif" alt=""></TD>
          <TD class=article-middle-center-posted>
             <?php echo "Posté Par"; ?> <?php formatAidHeader($aid); ?> <?php echo "Le $datetime $timezone (Lus $counter Fois)"; ?>
          </TD>
          <TD width="6" class=article-middle-right><IMG src="themes/DarkBlueCSflash/images/pix.gif" alt=""></TD>
        </TR>
        <TR>
          <TD width="6" class=article-middle-left><IMG src="themes/DarkBlueCSflash/images/pix.gif" alt=""></TD>
          <TD class=article-middle-center>
             <a href="search.php?query=&amp;topic=<?php echo"$topic"; ?>&amp;author="><img src="<?php echo "$tipath$topicimage"; ?>" border=0 alt=<?php echo"\"$topictext\""; ?> align=right hspace=10 vspace=10></a>
             <?php FormatStory($thetext, $notes, $aid, $informant); ?>
             &nbsp;<BR>
          </TD>
          <TD width="6" class=article-middle-right><IMG src="themes/DarkBlueCSflash/images/pix.gif" alt=""></TD>
        </TR>
        <TR>
          <TD width="6" class=article-middle-left><IMG src="themes/DarkBlueCSflash/images/pix.gif" alt=""></TD>
          <TD class=article-middle-center>
             <?php echo "$morelink"; ?>
          </TD>
          <TD width="6" class=article-middle-right><IMG src="themes/DarkBlueCSflash/images/pix.gif" alt=""></TD>
        </TR>
        <TR>
          <TD width="6" class=article-bottom-left height="3"><IMG src="themes/DarkBlueCSflash/images/pix.gif" alt=""></TD>
          <TD class=article-bottom-center height="3"><IMG src="themes/DarkBlueCSflash/images/pix.gif" alt=""></TD>
          <TD width="6" class=article-bottom-right height="3"><IMG src="themes/DarkBlueCSflash/images/pix.gif" alt=""></TD>
        </TR>
        <TR>
          <TD colspan="3" height="8"><IMG src="themes/DarkBlueCSflash/images/pix.gif" alt=""></TD>
        </TR>
      </TABLE>
<?php
}

function themearticle ($aid, $informant, $datetime, $title, $thetext, $topic, $topicname, $topicimage, $topictext) {
        global $admin, $sid, $tipath;
?>
      <TABLE width="100%" border="0" cellspacing="0" cellpadding="0">
        <TR>
          <TD width="6" class=article-top-left height="24"><IMG src="themes/DarkBlueCSflash/images/pix.gif" alt=""></TD>
          <TD class=article-top-center height="24">
             &nbsp;<?php echo "$title"; ?>
          </TD>
          <TD width="6" class=article-top-right height="24"><IMG src="themes/DarkBlueCSflash/images/pix.gif" alt=""></TD>
        </TR>
        <TR>
          <TD width="6" class=article-middle-left><IMG src="themes/DarkBlueCSflash/images/pix.gif" alt=""></TD>
          <TD class=article-middle-center-posted>
             <?php echo "Posté le $datetime Par "; ?> <?php formatAidHeader($aid); ?>
             <?php if ($admin) {
                     echo "&nbsp;&nbsp;[ <a href=admin.php?op=EditStory&amp;sid=$sid>"._EDIT."</a> | <a href=admin.php?op=RemoveStory&amp;sid=$sid>"._DELETE."</a> ]";
                       } ?>
             <BR>
             <?php echo "Contribué par <a href=\"user.php?op=userinfo&amp;uname=$informant\">$informant</a>"; ?>
          </TD>
          <TD width="6" class=article-middle-right><IMG src="themes/DarkBlueCSflash/images/pix.gif" alt=""></TD>
        </TR>
        <TR>
          <TD width="6" class=article-middle-left><IMG src="themes/DarkBlueCSflash/images/pix.gif" alt=""></TD>
          <TD class=article-middle-center>
            <a href="search.php?query=&amp;topic=<?php echo"$topic"; ?>&amp;author="><img src="<?php echo "$tipath$topicimage"; ?>" border=0 Alt=<?php echo"\"$topictext\""; ?> align=right hspace=10 vspace=10></a>
            <?php FormatStory($thetext, $notes, $aid, $informant); ?>
            <BR>
          </TD>
          <TD width="6" class=article-middle-right><IMG src="themes/DarkBlueCSflash/images/pix.gif" alt=""></TD>
        </TR>
        <TR>
          <TD width="6" class=article-bottom-left height="3"><IMG src="themes/DarkBlueCSflash/images/pix.gif" alt=""></TD>
          <TD class=article-bottom-center height="3"><IMG src="themes/DarkBlueCSflash/images/pix.gif" alt=""></TD>
          <TD width="6" class=article-bottom-right height="3"><IMG src="themes/DarkBlueCSflash/images/pix.gif" alt=""></TD>
        </TR>
        <TR>
          <TD colspan="3" height="8"><IMG src="themes/DarkBlueCSflash/images/pix.gif" alt=""></TD>
        </TR>
      </TABLE>
<?php
}

function themesidebox($title, $content) {
?>
      <TABLE width="150" border="0" cellspacing="0" cellpadding="0">
        <TR>
          <TD class=box-top height="24" align="center" valign="middle">
<?php
echo"
<OBJECT classid=\"clsid:D27CDB6E-AE6D-11cf-96B8-444553540000\"
 codebase=\"http://download.macromedia.com/pub/shockwave/cabs/flash/swflash.cab#version=5,0,0,0\"
 WIDTH=148 HEIGHT=30>
 <PARAM NAME=movie VALUE=\"themes/DarkBlueCSflash/title.swf?text=$title\"> 
 <PARAM NAME=quality VALUE=high>
 <PARAM NAME=bgcolor VALUE=\"#6699CC\">
 <PARAM NAME=menu VALUE=false>
 <EMBED src=\"themes/DarkBlueCSflash/title.swf?text=$title\" quality=high bgcolor=\"#6699CC\"  WIDTH=148 HEIGHT=30 TYPE=\"application/x-shockwave-flash\" PLUGINSPAGE=\"http://www.macromedia.com/shockwave/download/index.cgi?P1_Prod_Version=ShockwaveFlash\" menu=\"false\"></EMBED>
</OBJECT>
"; ?></TD>
        </TR>
        <TR>
          <TD class=box-middle height="53">
            <?php echo"$content"; ?>
          </TD>
        </TR>
        <TR>
          <TD class=box-bottom height="3"><IMG src="themes/DarkBlueCSflash/images/pix.gif" alt=""></TD>
        </TR>
        <TR>
          <TD height="8"><IMG src="themes/DarkBlueCSflash/images/pix.gif" alt=""></TD>
        </TR>
      </TABLE>
<?php
}
?>
