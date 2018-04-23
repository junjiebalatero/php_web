<?php

$bgcolor1 = "#C4CEDB";
$bgcolor2 = "#B0C1D3";
$bgcolor3 = "#E5E6DE";
$bgcolor4 = "#92A0AE";
$textcolor1 = "#000000";
$textcolor2 = "#000000";

function OpenTable() {
    global $bgcolor1, $bgcolor2;
    ?>

<TABLE border="0" cellspacing="0" cellpadding="0" align="center" width="100%">
  <TR>
    <TD height="8" width="8" background="themes/phpnuke-dk-1/images/table/top-left.gif"></TD>
    <TD background="themes/phpnuke-dk-1/images/table/top-center.gif" height="8"></TD>
    <TD width="8" height="8" background="themes/phpnuke-dk-1/images/table/top-right.gif"></TD>
  </TR>
  <TR>
    <TD background="themes/phpnuke-dk-1/images/table/tab-left.gif" width="8"></TD>
    <TD background="themes/phpnuke-dk-1/images/table/tab-center.gif">
<?php
}

function CloseTable() {
?>
    </TD>
    <TD width="8" background="themes/phpnuke-dk-1/images/table/tab-right.gif"></TD>
  </TR>
  <TR>
    <TD background="themes/phpnuke-dk-1/images/table/bottom-left.gif" width="8" height="8"></TD>
    <TD background="themes/phpnuke-dk-1/images/table/bottom-center.gif" height="8"></TD>
    <TD width="8" background="themes/phpnuke-dk-1/images/table/bottom-right.gif" height="8"></TD>
  </TR>
</TABLE>

<?php
}
function OpenTable2() {
    global $bgcolor1, $bgcolor2;
?>
<TABLE border="0" cellspacing="0" cellpadding="0" align="center" width="100%">
  <TR>
    <TD height="8" width="8" background="themes/phpnuke-dk-1/images/table/top-left.gif"></TD>
    <TD background="themes/phpnuke-dk-1/images/table/top-center.gif" height="8"></TD>
    <TD width="8" height="8" background="themes/phpnuke-dk-1/images/table/top-right.gif"></TD>
  </TR>
  <TR>
    <TD background="themes/phpnuke-dk-1/images/table/tab-left.gif" width="8"></TD>
    <TD background="themes/phpnuke-dk-1/images/table/tab-center.gif">
<?php
}

function CloseTable2() {
?>
    </TD>
    <TD width="8" background="themes/phpnuke-dk-1/images/table/tab-right.gif"></TD>
  </TR>
  <TR>
    <TD background="themes/phpnuke-dk-1/images/table/bottom-left.gif" width="8" height="8"></TD>
    <TD background="themes/phpnuke-dk-1/images/table/bottom-center.gif" height="8"></TD>
    <TD width="8" background="themes/phpnuke-dk-1/images/table/bottom-right.gif" height="8"></TD>
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
<BODY leftmargin="0" topmargin="0" marginwidth="0" marginheight="0">
<TABLE width="100%" border="0" cellspacing="0" cellpadding="0">
  <TR>
    <TD height="24" colspan="2" class=topbar nowrap><?php include ("themes/phpnuke-dk-1/topbar.php"); ?></TD>
  </TR>
</TABLE>
<TABLE width="100%" border="0" cellspacing="0" cellpadding="0">
  <TR>
    <TD height="8" colspan="2"></TD>
  </TR>
  <?php
      if ($banners) {
  ?>
  <TR>
    <TD height="60" align="left" nowrap>
      <P><a href="http://www.phpnuke.dk"><img border="0" IMG src="themes/phpnuke-dk-1/images/logo.gif" alt="PHPNuke.dk"></a></P>
    </TD>
    <TD>
    <?php
      include("banners.php");
    ?>
    </TD>
  </TR>

  <?php
     }else{
  ?>
  <TR>
    <TD height="60" align="center" colspan="2" nowrap>
      <IMG src="themes/phpnuke-dk-1/images/logo.gif">
    </TD>
  </TR>
  <?php
  }
  ?>
  <TR>
    <TD height="16" colspan="2"></TD>
  </TR>
</TABLE>
<TABLE width="100%" border="0" cellspacing="0" cellpadding="0">
  <TR>
    <TD width="80%" align="left" valign="middle" class=title nowrap>
<?php
  if ($username == "Anonymous") {
?>
      <form action=user.php method=post>
        &nbsp; <?php echo ""._NICKNAME.""; ?>&nbsp;
        <input class=textbox type=text name=uname size=12 maxlength=25>
        &nbsp; <?php echo ""._PASSWORD.""; ?>&nbsp;
        <input class=textbox type=password name=pass size=12 maxlength=20>
        &nbsp;&nbsp;
        <input type=image src="themes/phpnuke-dk-1/images/buttons/login.gif" border="0">
        <a href="user.php"><img src="themes/phpnuke-dk-1/images/buttons/register.gif" border="0"></a>
        <input type=hidden name=op value=login>
      </form>
<?php     } else { ?>
<B>&nbsp;&nbsp;<?php echo ""._HELLO.""; ?> <?php echo $username; ?>!</B>
&nbsp;<a href="user.php"><img src="themes/phpnuke-dk-1/images/menu/users.gif" alt="<?php echo ""._ACCOUNT.""; ?>" border="0"></a>
&nbsp;<a href="index.php"><img src="themes/phpnuke-dk-1/images/menu/home.gif" alt="<?php echo ""._MAIN.""; ?>" border="0"></a>
&nbsp;<a href="submit.php"><img src="themes/phpnuke-dk-1/images/menu/submit.gif" alt="<?php echo ""._SUBMITNEWS.""; ?>" border="0"></a>
&nbsp;<a href="download.php"><img src="themes/phpnuke-dk-1/images/menu/download.gif" alt="<?php echo ""._DOWNLOAD.""; ?>" border="0"></a>
&nbsp;<a href="links.php"><img src="themes/phpnuke-dk-1/images/menu/links.gif" alt="<?php echo ""._LINKS.""; ?>" border="0"></a>
&nbsp;<a href="mailto:<?PHP global $adminmail; echo $adminmail; ?>"><img src="themes/phpnuke-dk-1/images/menu/mail.gif" alt="Contact webmaster" border="0"></a>
&nbsp;<a href="user.php?op=logout"><img src="themes/phpnuke-dk-1/images/menu/logout.gif" alt="<?php echo ""._LOGOUT.""; ?>" border="0"></a>
<?php
  }
?>

    </TD>
    <TD width="20%" align=right valign="middle" nowrap>
       <form action=search.php method=post>
       <input type=text name=query size=12>
       <input type=image src="themes/phpnuke-dk-1/images/buttons/search.gif" alt="<?php echo ""._SEARCH.""; ?>" border="0">
       <input type=hidden value=submit>&nbsp;&nbsp;
       </form>
    </TD>
  </TR>
  <TR>
    <TD height="16" colspan="2"></TD>
  </TR>
</TABLE>
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
        global $tipath, $anonymous, $admin, $sid;
        ?>
        <TABLE width="100%" border="0" cellspacing="0" cellpadding="0" align="center">
        <TR>
          <TD height="8" width="8" background="themes/phpnuke-dk-1/images/table/top-left.gif"></TD>
          <TD background="themes/phpnuke-dk-1/images/table/top-center.gif" height="8"></TD>
          <TD width="8" height="8" background="themes/phpnuke-dk-1/images/table/top-right.gif"></TD>
        </TR>
        <TR>
          <TD background="themes/phpnuke-dk-1/images/table/middle-left.gif" width="8" height="16"></TD>
          <TD background="themes/phpnuke-dk-1/images/table/middle-center2.gif" height="16" class=title nowrap>
            &nbsp;&nbsp;&nbsp;&nbsp;<B><?php echo "$title"; ?></B></TD>
          <TD width="8" background="themes/phpnuke-dk-1/images/table/middle-right.gif" height="16"></TD>
        </TR>
        <TR>
          <TD background="themes/phpnuke-dk-1/images/table/tab-left.gif" width="8"></TD>
          <TD background="themes/phpnuke-dk-1/images/table/tab-center.gif" class=posted>
           <?php echo _POSTEDBY; ?> <?php formatAidHeader($aid); ?> <?php echo _ON." $datetime $timezone "."($counter "._READS.")"; ?>
            <?php if ($admin) {
                    echo "&nbsp;&nbsp;[ <a href=admin.php?op=EditStory&sid=$sid>"._EDIT."</a> | <a href=admin.php?op=RemoveStory&sid=$sid>"._DELETE."</a> ]";
                      } ?>
          </TD>
          <TD width="8" background="themes/phpnuke-dk-1/images/table/tab-right.gif"></TD>
        </TR>
        <TR>
          <TD background="themes/phpnuke-dk-1/images/table/tab-left.gif" width="8"></TD>
          <TD background="themes/phpnuke-dk-1/images/table/tab-center.gif">
            <a href="search.php?query=&topic=<?php echo"$topic"; ?>&author="><img src=<?php echo "$tipath$topicimage"; ?> border=0 Alt=<?php echo"\"$topictext\""; ?> align=right hspace=10 vspace=10></a>
            <?php FormatStory($thetext, $notes, $aid, $informant); ?>
            &nbsp;<BR>
          </TD>
          <TD width="8" background="themes/phpnuke-dk-1/images/table/tab-right.gif"></TD>
        </TR>
        <TR>
          <TD background="themes/phpnuke-dk-1/images/table/middle-left.gif" width="8" height="16"></TD>
          <TD background="themes/phpnuke-dk-1/images/table/middle-center3.gif" height="16" class=title nowrap>
            <img src="themes/phpnuke-dk-1/images/menu.gif" border=0>
            <?php echo "$morelink"; ?>
          </TD>
          <TD width="8" background="themes/phpnuke-dk-1/images/table/middle-right.gif" height="16"></TD>
        </TR>
        <TR>
          <TD background="themes/phpnuke-dk-1/images/table/bottom-left.gif" width="8" height="8"></TD>
          <TD background="themes/phpnuke-dk-1/images/table/bottom-center.gif" height="8"></TD>
          <TD width="8" background="themes/phpnuke-dk-1/images/table/bottom-right.gif" height="8"></TD>
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
          <TD height="8" width="8" background="themes/phpnuke-dk-1/images/table/top-left.gif"></TD>
          <TD background="themes/phpnuke-dk-1/images/table/top-center.gif" height="8"></TD>
          <TD width="8" height="8" background="themes/phpnuke-dk-1/images/table/top-right.gif"></TD>
        </TR>
        <TR>
          <TD background="themes/phpnuke-dk-1/images/table/middle-left.gif" width="8" height="16"></TD>
          <TD background="themes/phpnuke-dk-1/images/table/middle-center2.gif" height="16" class=title nowrap>
            &nbsp;&nbsp;&nbsp;&nbsp;<B><?php echo "$title"; ?></B></TD>
          <TD width="8" background="themes/phpnuke-dk-1/images/table/middle-right.gif" height="16"></TD>
        </TR>
        <TR>
          <TD background="themes/phpnuke-dk-1/images/table/tab-left.gif" width="8"></TD>
          <TD background="themes/phpnuke-dk-1/images/table/tab-center.gif" class=posted>
            <?php echo _POSTEDON." $datetime "._BY; ?> <?php formatAidHeader($aid); ?>
            <?php if ($admin) {
                    echo "&nbsp;&nbsp;[ <a href=admin.php?op=EditStory&sid=$sid>"._EDIT."</a> | <a href=admin.php?op=RemoveStory&sid=$sid>"._DELETE."</a> ]";
                      } ?>
            <BR>
            <?php echo _CONTRIBUTEDBY." "."<a href=\"user.php?op=userinfo&uname=$informant\">$informant</a>"; ?>
          </TD>
          <TD width="8" background="themes/phpnuke-dk-1/images/table/tab-right.gif"></TD>
        </TR>
        <TR>
          <TD background="themes/phpnuke-dk-1/images/table/tab-left.gif" width="8"></TD>
          <TD background="themes/phpnuke-dk-1/images/table/tab-center.gif">
            <a href="search.php?query=&topic=<?php echo"$topic"; ?>&author="><img src=<?php echo "$tipath$topicimage"; ?> border=0 Alt=<?php echo"\"$topictext\""; ?> align=right hspace=10 vspace=10></a>
            <?php FormatStory($thetext, $notes, $aid, $informant); ?>
            <BR><BR>
          </TD>
          <TD width="8" background="themes/phpnuke-dk-1/images/table/tab-right.gif"></TD>
        </TR>
        <TR>
          <TD background="themes/phpnuke-dk-1/images/table/bottom-left.gif" width="8" height="8"></TD>
          <TD background="themes/phpnuke-dk-1/images/table/bottom-center.gif" height="8"></TD>
          <TD width="8" background="themes/phpnuke-dk-1/images/table/bottom-right.gif" height="8"></TD>
        </TR>
        <TR>
          <TD height="8"></TD>
        </TR>
      </TABLE>
<?php
}

function themesidebox($title, $content) {
?>
      <TABLE width="160" border="0" cellspacing="0" cellpadding="0">
        <TR>
          <TD height="8" width="8" background="themes/phpnuke-dk-1/images/table/top-left.gif"></TD>
          <TD background="themes/phpnuke-dk-1/images/table/top-center.gif" height="8" width="144"></TD>
          <TD width="8" height="8" background="themes/phpnuke-dk-1/images/table/top-right.gif"></TD>
        </TR>
        <TR>
          <TD background="themes/phpnuke-dk-1/images/table/middle-left.gif" width="8" height="16"></TD>
          <TD background="themes/phpnuke-dk-1/images/table/middle-center.gif" height="16" width="144" class=title nowrap>&nbsp;&nbsp;&nbsp;&nbsp;<b><?php echo"$title"; ?></b></TD>
          <TD width="8" background="themes/phpnuke-dk-1/images/table/middle-right.gif" height="16"></TD>
        </TR>
        <TR>
          <TD background="themes/phpnuke-dk-1/images/table/tab-left.gif" width="8"></TD>
          <TD background="themes/phpnuke-dk-1/images/table/tab-center.gif" width="144"><?php echo"$content"; ?></TD>
          <TD width="8" background="themes/phpnuke-dk-1/images/table/tab-right.gif"></TD>
        </TR>
        <TR>
          <TD background="themes/phpnuke-dk-1/images/table/bottom-left.gif" width="8" height="8"></TD>
          <TD background="themes/phpnuke-dk-1/images/table/bottom-center.gif" height="8" width="144"></TD>
          <TD width="8" background="themes/phpnuke-dk-1/images/table/bottom-right.gif" height="8"></TD>
        </TR>
        <TR>
          <TD height="8"></TD>
        </TR>
      </TABLE>

<?php
}
?>
