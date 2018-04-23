<?php

$bgcolor1 = "background.gif";
$bgcolor2 = "background.gif";
$bgcolor3 = "background.gif";
$bgcolor4 = "background.gif";
$textcolor1 = "#ffffff";
$textcolor2 = "#ffffff";

function OpenTable() {
    global $bgcolor1, $bgcolor2;
    ?>
<div="center">
<TABLE border="0" cellspacing="1" cellpadding="1" align="center" width="100%">
  <TR bgcolor="6789ba"> 
    <TD> <?php
}

function CloseTable() {
?> </TD>
  </TR>
</TABLE>

<?php
}
function OpenTable2() {
    global $bgcolor1, $bgcolor2;
?>
<TABLE border="0" cellspacing="0" cellpadding="0" align="center" width="100%">
  <TR>
    <TD height="8" width="8" background="obenl.gif"></TD>
    <TD background="oben.gif" height="8"></TD>
    <TD width="8" height="8" background="obenr.gif"></TD>
  </TR>
  <TR>
    <TD background="links.gif" width="8"></TD>
    <TD bgcolor="6789ba"> <?php
}

function CloseTable2() {
?> </TD>
    <TD width="8" background="rechts.gif"></TD>
  </TR>
  <TR>
    <TD background="untenl.gif" width="8" height="8"></TD>
    <TD background="unten.gif" height="8"></TD>
    <TD width="8" background="untenr.gif" height="8"></TD>
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
        echo "$thetext<br>$notes</font>\n";
    } else {
        if($informant != "") {
            $boxstuff = "<a href=\"user.php?op=userinfo&amp;uname=$informant\">$informant</a> ";
        } else {
            $boxstuff = "$anonymous ";
        }
          if ($index == 1) {
           $boxstuff .= ""._WRITES." <i>\"$thetext\"</i> <BR>$notes\n";
           } else {
           $boxstuff = "$thetext<BR>$notes\n";
           }
        echo "$boxstuff\n";
    }
}

function themeheader() {
    global $sitename, $banners, $anonymous, $username, $user, $cookie;
cookiedecode($user);
$username = $cookie[1];
if ($username == "") {
$username = "Anonymous";
}
?>
<BODY>
<TABLE width="100%" border="0" cellspacing="0" cellpadding="0">
  <TR>
    <TD height="24" colspan="2" class=topbar nowrap><?php include ("themes/amigoz-net/topbar.php"); ?></TD>
  </TR>
</TABLE>
<TABLE width="100%" border="0" cellspacing="0" cellpadding="0">
  <TR>
    <TD height="8" colspan="2"></TD>
  </TR>
  <TR>
    <TD height="60" align="center" colspan="2" nowrap>
      <P><IMG src="logo.gif" width="401" height="58" alt=""></P>
    </TD>
  </TR>
  <TR>
    <TD height="16" colspan="2"></TD>
  </TR>
  <TR>
    <TD width="100%" align="left" valign="middle" class=title nowrap>
<?php
  if ($username == "Anonymous") {
?>
      <form action=../../themes/amigoz-net/user.php method=post>
        &nbsp; Login&nbsp;
        <input class=textbox type=text name=uname size=12 maxlength=25>
        &nbsp; Password&nbsp;
        <input class=textbox type=password name=pass size=12 maxlength=20>
        &nbsp;&nbsp;
        <input type=image src="../../themes/amigoz-net/themes/amigoz-net/images/buttons/login.gif" border="0">
        <a href="../../themes/amigoz-net/user.php"><img src="../../themes/amigoz-net/themes/amigoz-net/images/buttons/register.gif" border="0"></a>
        <input type=hidden name=op value=login>
      </form>
<?php     } else { ?>
<B>&nbsp;&nbsp;Welcome, <?php echo $username; ?>!</B>
&nbsp;<a href="../../themes/amigoz-net/user.php"><img src="../../themes/amigoz-net/themes/amigoz-net/images/menu/users.gif" alt="Your Account" border="0"></a>
&nbsp;<a href="../../themes/amigoz-net/index.php"><img src="../../themes/amigoz-net/themes/amigoz-net/images/menu/home.gif" alt="Home" border="0"></a>
&nbsp;<a href="../../themes/amigoz-net/submit.php"><img src="../../themes/amigoz-net/themes/amigoz-net/images/menu/submit.gif" alt="Submit News" border="0"></a>
&nbsp;<a href="../../themes/amigoz-net/download.php"><img src="../../themes/amigoz-net/themes/amigoz-net/images/menu/download.gif" alt="Downloads" border="0"></a>
&nbsp;<a href="../../themes/amigoz-net/links.php"><img src="../../themes/amigoz-net/themes/amigoz-net/images/menu/links.gif" alt="Web Links" border="0"></a>
&nbsp;<a href="mailto:MyEmail@MyDomain.com"><img src="../../themes/amigoz-net/themes/amigoz-net/images/menu/mail.gif" alt="Contact us" border="0"></a>
&nbsp;<a href="../../themes/amigoz-net/user.php?op=logout"><img src="../../themes/amigoz-net/themes/amigoz-net/images/menu/logout.gif" alt="Logout" border="0"></a>
<?php
  }
?>

    </TD>
    <TD width="200" align=right valign="middle" nowrap>
       <form action=../../themes/amigoz-net/search.php method=post>
       <input type=text name=query size=12>
       <input type=image src="../../themes/amigoz-net/themes/amigoz-net/images/buttons/search.gif" border="0">
       <input type=hidden value=submit>&nbsp;&nbsp;
       </form>
    </TD>
  </TR>
  <TR>
    <TD height="16" colspan="2"></TD>
  </TR>
</TABLE>
&nbsp;<BR>

<?php
          if ($banners) {
?>
<TABLE width="484" border="0" cellspacing="0" cellpadding="0" align="center">
  <TR>
    <TD height="8" width="8" background="obenl.gif"></TD>
    <TD background="oben.gif" height="8"></TD>
    <TD width="8" height="8" background="obenr.gif"></TD>
  </TR>
  <TR>
    <TD background="links.gif" width="8"></TD>
    <TD width="468" height="60" nowrap bgcolor="6789ba"> <?php
                   include("banners.php");
?> </TD>
    <TD width="8" background="rechts.gif"></TD>
  </TR>
  <TR>
    <TD background="untenl.gif" width="8" height="8"></TD>
    <TD background="unten.gif" height="8"></TD>
    <TD width="8" background="untenr.gif" height="8"></TD>
  </TR>
</TABLE>
<?php
                         }
?>
&nbsp;<BR>
<TABLE width="100%" border="0" cellspacing="0" cellpadding="0">
  <TR>
    <TD width="8"></TD>
    <TD width="146" valign="top">
       <?php blocks(left); ?>
    </TD>
    <TD width="8"></TD>
    <TD valign="top">
<?php
}

function themefooter() {
    global $index; ?>
<?php
  if ($index == 1) {
?>
    </TD>
    <TD width="8"></TD>
    <TD width="146" valign="top">
    <?php blocks(right); ?>
    </TD>
<?php
}
?>
    <TD width="8"></TD>
  </TR>
</TABLE>
<?php
footmsg();
}

function themeindex ($aid, $informant, $datetime, $title, $counter, $topic, $thetext, $notes, $morelink, $topicname, $topicimage, $topictext) {
        global $tipath, $anonymous;
        ?>
        <TABLE width="100%" border="0" cellspacing="0" cellpadding="0" align="center">
        <TR>
          
    <TD height="8" width="7" background="obenl.gif"></TD>
          
    <TD background="oben.gif" height="8" width="1067"></TD>
          
    <TD width="8" height="8" background="obenr.gif"></TD>
        </TR>
        <TR>
          
    <TD background="links.gif" width="7" height="16"></TD>
          
    <TD width="1067" height="16" class=title nowrap bgcolor="6789ba"> &nbsp;&nbsp;&nbsp;&nbsp;<B><?php echo "$title"; ?></B></TD>
          
    <TD width="8" background="rechts.gif" height="16"></TD>
        </TR>
        <TR>
          
    <TD background="links.gif" width="7"></TD>
          
    <TD bgcolor="6789ba" class=posted width="1067"> <?php echo _POSTEDBY; ?> <?php formatAidHeader($aid); ?> 
      <?php echo _ON." $datetime $timezone "."($counter "._READS.")"; ?> </TD>
          
    <TD width="8" background="rechts.gif"></TD>
        </TR>
        <TR>
          
    <TD background="links.gif" width="7"></TD>
          
    <TD width="1067" bgcolor="6789ba"> <a href="search.php?query=&topic=<?php echo"$topic"; ?>&author="><img src=<?php echo "$tipath$topicimage"; ?> border=0 Alt=<?php echo"\"$topictext\""; ?> align=right hspace=10 vspace=10></a> 
      <?php FormatStory($thetext, $notes, $aid, $informant); ?> &nbsp;<BR>
    </TD>
          
    <TD width="8" background="rechts.gif"></TD>
        </TR>
        <TR>
          
    <TD background="links.gif" width="7" height="16"></TD>
          
    <TD bgcolor="6789ba" height="16" class=title nowrap width="1067"> <img src="../../themes/amigoz-net/themes/amigoz-net/images/menu.gif" border=0> 
      <?php echo "$morelink"; ?> </TD>
          
    <TD width="8" background="rechts.gif" height="16"></TD>
        </TR>
        <TR>
          
    <TD background="untenl.gif" width="7" height="8"></TD>
          
    <TD background="unten.gif" height="8" width="1067"></TD>
          
    <TD width="8" background="untenr.gif" height="8"></TD>
        </TR>
        <TR>
          
    <TD height="8" width="7"></TD>
        </TR>
      </TABLE>
<?php
}

function themearticle ($aid, $informant, $datetime, $title, $thetext, $topic, $topicname, $topicimage, $topictext) {
        global $admin, $sid, $tipath;
?>
      <TABLE width="100%" border="0" cellspacing="0" cellpadding="0" align="center">
        <TR>
          
    <TD height="8" width="8" background="obenl.gif"></TD>
          
    <TD background="oben.gif" height="8"></TD>
          
    <TD width="8" height="8" background="obenr.gif"></TD>
        </TR>
        <TR>
          
    <TD background="links.gif" width="8" height="16"></TD>
          
    <TD height="16" class=title nowrap bgcolor="6789ba"> &nbsp;&nbsp;&nbsp;&nbsp;<B><?php echo "$title"; ?></B></TD>
          
    <TD width="8" background="rechts.gif" height="16"></TD>
        </TR>
        <TR>
          
    <TD background="links.gif" width="8"></TD>
          
    <TD bgcolor="6789ba" class=posted> <?php echo _POSTEDON." $datetime "._BY; ?> 
      <?php formatAidHeader($aid); ?> <?php if ($admin) {
                    echo "&nbsp;&nbsp;[ <a href=admin.php?op=EditStory&sid=$sid>"._EDIT."</a> | <a href=admin.php?op=RemoveStory&sid=$sid>"._DELETE."</a> ]";
                      } ?> <BR>
      <?php echo _CONTRIBUTEDBY." "."<a href=\"user.php?op=userinfo&uname=$informant\">$informant</a>"; ?> 
    </TD>
          
    <TD width="8" background="rechts.gif"></TD>
        </TR>
        <TR>
          
    <TD background="links.gif" width="8"></TD>
          
    <TD bgcolor="6789ba"> <a href="search.php?query=&topic=<?php echo"$topic"; ?>&author="><img src=<?php echo "$tipath$topicimage"; ?> border=0 Alt=<?php echo"\"$topictext\""; ?> align=right hspace=10 vspace=10></a> 
      <?php FormatStory($thetext, $notes, $aid, $informant); ?> <BR>
      <BR>
          </TD>
          
    <TD width="8" background="rechts.gif"></TD>
        </TR>
        <TR>
          
    <TD background="untenl.gif" width="8" height="8"></TD>
          
    <TD background="unten.gif" height="8"></TD>
          
    <TD width="8" background="untenr.gif" height="8"></TD>
        </TR>
        <TR>
          <TD height="8"></TD>
        </TR>
      </TABLE>
<?php
}

function themesidebox($title, $content) {
?> 
<table width="146" border="0" cellspacing="0" cellpadding="0">
  <tr> 
    <td height="8" width="8" background="obenl.gif"></td>
    <td background="oben.gif" height="8" width="130"></td>
    <td width="8" height="8" background="obenr.gif"></td>
  </tr>
  <tr> 
    <td background="links.gif" width="8" height="16"></td>
    <td height="16" width="130" class=title nowrap bgcolor="6789ba">&nbsp;&nbsp;&nbsp;&nbsp;<b><?php echo"$title"; ?></b></td>
    <td width="8" background="rechts.gif" height="16"></td>
  </tr>
  <tr> 
    <td background="links.gif" width="8"></td>
    <td bgcolor="6789ba" width="130"><?php echo"$content"; ?></td>
    <td width="8" background="rechts.gif"></td>
  </tr>
  <tr> 
    <td background="untenl.gif" width="8" height="8"></td>
    <td background="unten.gif" height="8" width="130"></td>
    <td width="8" background="untenr.gif" height="8"></td>
  </tr>
  <tr> 
    <td height="8" colspan="3"></td>
  </tr>
</table>
<?php
}
?> 