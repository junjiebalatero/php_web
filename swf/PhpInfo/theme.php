<?php

$thename = "PhpInfo";
$bgcolor1 = "#B8C8FE";
$bgcolor2 = "#9DAEE8";
$bgcolor3 = "#7B8FD6";
$bgcolor4 = "#5A6BA5";
$textcolor1 = "#FFFFFF";
$textcolor2 = "#1c2d67";
$hr = 1; # 1 to have horizonal rule in comments instead of table bgcolor

function formatAidHeader2($aid) {
    global $prefix;
    $holder = mysql_query("SELECT url, email FROM $prefix"._authors." where aid='$aid'");
    if (!$holder) {
    echo mysql_errno(). ": ".mysql_error(). "<br>";
    exit();
    }
    list($url, $email) = mysql_fetch_row($holder);
    if (isset($url)) {
    echo "<a class=lien href=\"$url\">$aid</a>";
    } elseif (isset($email)) {
    echo "<a class=lien href=\"mailto:$email\">$aid</a>";
    } else {
    echo $aid;
    }
}

function OpenTable() {
    global $bgcolor1, $bgcolor2;?>
   <TABLE width="100%" border="0" cellspacing="0" cellpadding="0" align="center">
        <TR>
          <TD height="11" width="11" background="themes/PhpInfo/images/table/hg.gif"></TD>
          <TD background="themes/PhpInfo/images/table/hc.gif" height="11"></TD>
          <TD width="11" height="11" background="themes/PhpInfo/images/table/hd.gif"></TD>
        </TR><tr>  <TD background="themes/PhpInfo/images/table/gc.gif" width="11"></TD>
          <TD bgcolor="<?php echo $bgcolor1 ?>">
        <?
}

function OpenTable2() {
    global $bgcolor1, $bgcolor2;?>
   <TABLE width="100%" border="0" cellspacing="0" cellpadding="0" align="center">
        <TR>
          <TD height="11" width="11" background="themes/PhpInfo/images/table/hg.gif"></TD>
          <TD background="themes/PhpInfo/images/table/hc.gif" height="11"></TD>
          <TD width="11" height="11" background="themes/PhpInfo/images/table/hd.gif"></TD>
        </TR><tr>  <TD background="themes/PhpInfo/images/table/gc.gif" width="11"></TD>
          <TD bgcolor="<?php echo $bgcolor1 ?>">
        <?
}

function CloseTable() {?>
   <TD width="11" background="themes/PhpInfo/images/table/dc.gif"></TD>
        </TR>
        <TR>
          <TD background="themes/PhpInfo/images/table/bg.gif" width="11" height="11"></TD>
          <TD background="themes/PhpInfo/images/table/bc.gif" height="11"></TD>
          <TD width="11" background="themes/PhpInfo/images/table/bd.gif" height="11"></TD></TR>
        <TR><TD height="11"></TD></TR></TABLE> <?
}

function CloseTable2() {?>
   <TD width="11" background="themes/PhpInfo/images/table/dc.gif"></TD>
        </TR>
        <TR>
          <TD background="themes/PhpInfo/images/table/bg.gif" width="11" height="11"></TD>
          <TD background="themes/PhpInfo/images/table/bc.gif" height="11"></TD>
          <TD width="11" background="themes/PhpInfo/images/table/bd.gif" height="11"></TD></TR>
        <TR><TD height="11"></TD></TR></TABLE> <?
}

function FormatStory($thetext, $notes, $aid, $informant) {
    global $anonymous;
    if ($notes != "") {
    $notes = "<p><b>"._NOTE."</b> <i>$notes</i>\n";
    } else {
    $notes = "";
    }
    if ("$aid" == "$informant") {
    echo "$thetext$notes\n";
    } else {
    if($informant != "") {
        $boxstuff = "<a href=\"user.php?op=userinfo&amp;uname=$informant\">$informant</a> ";
    } else {
        $boxstuff = "$anonymous ";
    }
    $boxstuff .= ""._WRITES." <i>\"$thetext\"</i>$notes\n";
    echo "$boxstuff\n";
    }
}

function themeheader() {
    global $sitename, $banners, $anonymous, $username, $user, $cookie, $nuke_url, $PHP_SELF;
cookiedecode($user);
$username = $cookie[1];
if ($username == "") {
$username = "Anonymous";
}
echo " <head><LINK rel=\"StyleSheet\" HREF=\"themes/PhpInfo/style/style.css\" TYPE=\"text/css\">";
echo "</head><body background=\"themes/PhpInfo/images/fond-phpinfo.gif\" marginwidth=0 marginheight=0 topmargin=0 leftmargin=0>" ?>
<a name=#top></a><div align=center>
<TABLE BORDER='0' WIDTH='100%' BGCOLOR='#7B8FD6' CELLPADDING='0' CELLSPACING='0'><TR height=60>
<TD WIDTH='178' ALIGN='left'><A HREF='<?php echo $nuke_url ?>'  CLASS='lien'><IMG SRC='themes/PhpInfo/images/logo.gif'  BORDER=0 ALIGN='absmiddle'></A><a href="/antia"><FONT COLOR="#7B8FD6">.</FONT></a></TD>
<TD VALIGN='center'>
<?php if($banners) include("banners.php")?>
<?php echo "          </TD>";
echo "<TD WIDTH=\"43\">&nbsp;</TD>";
echo "<TD ALIGN=\"center\" WIDTH=\"135\"><A HREF=\"/?p=logos-vince\"  CLASS=\"lien\"><IMG SRC=\"themes/PhpInfo/images/logo-vince.gif\"  BORDER=\"0\" ALIGN=\"absmiddle\"></A></TD></TR></TABLE>";
echo "<TABLE BORDER=\"0\" WIDTH=\"100%\" Background=images/fond-phpinfo.gif CELLPADDING=\"0\" CELLSPACING=\"0\">";
echo "<TR><TD ALIGN=\"center\" HEIGHT=\"16\" CLASS=\"menu\"> <A HREF=\"index.php\" CLASS=\"menu\">&nbsp;"._MAIN."&nbsp;</A> &middot; <A HREF=\"submit.php\" CLASS=\"menu\">&nbsp;"._SUBMITNEWS."&nbsp;</A> &middot; <A HREF=\"download.php\" CLASS=\"menu\">&nbsp;"._DOWNLOADS."&nbsp;</A> &middot; <A HREF=\"sections.php\" CLASS=\"menu\">&nbsp;"._SECTIONS."&nbsp;</A> &middot; <A HREF=\"reviews.php\" CLASS=\"menu\">&nbsp;"._REVIEWS."&nbsp;</A> &middot; <A HREF=\"user.php\" CLASS=\"menu\">&nbsp;";
if ($user) {echo ""._OPTIONS."";}
else {echo ""._USERLOGIN."";}
echo "&nbsp;</A> &middot; <A HREF=\"modules.php?op=modload&name=Forum&file=index\" CLASS=\"menu\">&nbsp;"._FORUMS."&nbsp;</A> &middot; <A HREF=\"modules.php?op=modload&name=Guestbook&file=index\" CLASS=\"menu\">&nbsp;"._GUESTBOOK."&nbsp;</A> &middot; <A HREF=\"links.php\" CLASS=\"menu\">&nbsp;"._LINKS."&nbsp;</A></TD></TR></TABLE>";
echo "</td></tr></table>
<table width=100% border=0 cellspacing=0 cellpadding=0>
    <td width=8></td>
    <td width=130 valign=top>";
      
  blocks(left);
       
echo "</TD><td width=17 valign=top>&nbsp; </td>";?>
            <TD valign=top><br>
<?php if(eregi("index.php", $PHP_SELF)) { 
?>
            <TABLE width="100%" border="0" cellspacing="0" cellpadding="0" align="center">
                    <TR>
                      <TD height="11" width="11" background="themes/PhpInfo/images/table/hg.gif"></TD>
                      <TD background="themes/PhpInfo/images/table/hc.gif" height="11"></TD>
                      <TD width="11" height="11" background="themes/PhpInfo/images/table/hd.gif"></TD>
            </TR>
            <TR>
            <TD BACKGROUND="themes/PhpInfo/images/table/gc.gif" WIDTH=11><IMG SRC='themes/PhpInfo/images/vide.gif' WIDTH="1" HEIGHT="1" BORDER=0 ALIGN='absmiddle'></TD>
            <TD BGCOLOR="#B8C8FE">
            <TABLE WIDTH='100%' BORDER='0' CELLSPACING='0' CELLPADDING='2'><TR><TD WIDTH='35%' VALIGN='top'><B><?php echo ""._WELCOMETO." $sitename :"; ?>
            </B><BR><BR><?php
            global $slogan;
            echo "$slogan"; ?></TD><TD BACKGROUND='themes/PhpInfo/images/barrev.gif'><IMG SRC='themes/PhpInfo/images/vide.gif' WIDTH='1' HEIGHT='1' BORDER=0></TD>
            
            <!-- [module: desc_rubriques]---[cache: 5 mn]---[maj: 13-06 16:51] //-->
            
<TD WIDTH='65%' BGCOLOR='A7B8F2' VALIGN='top'>&nbsp;<IMG SRC='themes/PhpInfo/images/droitev.gif' WIDTH="5" HEIGHT="10" BORDER=0 ALIGN='absmiddle'>&nbsp;<A HREF='download.php'  CLASS='lien'><?PHP echo ""._DOWNLOADS.""; ?></A><HR COLOR='5A6BA5' NOSHADE>This category is leaning mainly on your contributions, don't hesitate to help it growing by sending me one of your programs, or some you can recommend [<A HREF='download.php?op=AddDownload'  CLASS='lien'><?PHP echo ""._ADDDOWNLOAD.""; ?></A>].</TD></TR></TABLE><TD height="11" width="11" background="themes/PhpInfo/images/table/dc.gif"></TD></TR><TR><TD background="themes/PhpInfo/images/table/bg.gif" width="11" height="18"></TD>
              <TD background="themes/PhpInfo/images/table/bc.gif" height="18"></TD>
              <TD width="11" background="themes/PhpInfo/images/table/bd.gif" height="18"></TD>


</tr></TABLE>
<TABLE BORDER=0 CELLPADDING=0 CELLSPACING=0 WIDTH='100%'>
        <TR>
          <TD height="11" width="11" background="themes/PhpInfo/images/table/hg.gif"></TD>
          <TD background="themes/PhpInfo/images/table/hc.gif" height="11"></TD>
          <TD width="11" height="11" background="themes/PhpInfo/images/table/hd.gif"></TD>
        </TR>
        <TR>
          <TD height="11" width="11" background="themes/PhpInfo/images/table/gc.gif"></TD>
          <TD BGCOLOR="#B8C8FE">
          <TABLE BORDER='0'  CELLSPACING='0' CELLPADDING='0'  WIDTH='100%'>
          <TR VALIGN='top'><TD>
          <A CLASS='titre'>&nbsp;&nbsp;NEWS <?php echo $sitename ?>&nbsp;&nbsp;</A>
          </TD><TD ALIGN='right' NOWRAP WIDTH='0%'>
          &nbsp;<IMG SRC='themes/PhpInfo/images/droitev.gif' WIDTH="5" HEIGHT="10" BORDER=0 ALIGN='absmiddle'><IMG SRC='themes/PhpInfo/images/droitev.gif' WIDTH="5" HEIGHT="10" BORDER=0 ALIGN='absmiddle'>&nbsp;<A HREF='search.php'  CLASS='lien'><?php echo ""._SEARCH."" ?></A> | <A HREF='submit.php'  CLASS='lien'><?php echo ""._SUBMITNEWS."" ?></A></TD></TR>
          </TABLE>
          <HR COLOR='5A6BA5' NOSHADE></TD>
          <TD height="11" width="11" background="themes/PhpInfo/images/table/dc.gif"></TD></TR>
    
<?php
}
}

function themefooter() {
 

// BEGIN PhpInfo CREDIT //
// PLEASE OUT OF RESPECT, DO NOT REMOVE //
  global $index, $bgcolor, $PHP_SELF;
    if (eregi("index.php", $PHP_SELF)) {
    ?>
            <TR>
              <TD background="themes/PhpInfo/images/table/bg.gif" width="11" height="11"></TD>
              <TD background="themes/PhpInfo/images/table/bc.gif" height="11"></TD>
              <TD width="11" background="themes/PhpInfo/images/table/bd.gif" height="11"></TD>
            </TR>
            <TR>
              <TD height="8"></TD>
            </TR>
      </TABLE>
  <?php
  }
  if($index==1) {
echo "<td width=17 valign=top>&nbsp; </td>
    <td width=130 valign=top>";
 blocks(right);
 
   }

    echo" <TD width=8></TD>
  </TR>
</TABLE>
    </td>
  </tr>
</table>";

// END CREDIT //

?><br><center><? footmsg(); ?> <center>

<? }

function themeindex ($aid, $informant, $datetime, $title, $counter, $topic, $thetext, $notes, $morelink, $topicname, $topicimage, $topictext) {
        global $tipath, $anonymous, $bgcolor2;
        ?>
        <TR>
          <TD background="themes/PhpInfo/images/table/gc.gif" width="11" height="16"></TD>
          <TD background="themes/PhpInfo/images/raye10.gif" height="16">
            <table width=100%><tr><td width=50%><B><?php echo "<font color=#FFFFFF><b>$title</b></font>"; ?></B></td>
            <TD align="right" width="50%">
                <?php echo "<font color=\"yellow\">[$datetime]</font>" ?>
            </TD></TR></TABLE></TD>
          <TD width="11" background="themes/PhpInfo/images/table/dc.gif" height="11"></TD>
        </TR>
        <TR>
          <TD background="themes/PhpInfo/images/table/gc.gif" width="11"></TD>
          <TD bgcolor="#9DAEE8">
            <a href="search.php?query=&topic=<?php echo"$topic"; ?>&author="><img src=<?php echo "$tipath$topicimage"; ?> border=0 Alt=<?php echo"\"$topictext\""; ?> align=right hspace=10 vspace=10></a>
            <?php FormatStory(eregi_replace("<a","<a class=lien",$thetext), $notes, $aid, $informant); ?>
            &nbsp;
          </TD>
          <TD width="11" background="themes/PhpInfo/images/table/dc.gif"></TD>
        </TR>
        <TR>
          <TD background="themes/PhpInfo/images/table/gc.gif" width="11" height="11"></TD>
          <TD bgcolor="<?php echo $bgcolor2 ?>" class=abc3 height="11" nowrap>
            <table width=100%><td width=55%><?php echo _POSTEDBY; ?> <?php formatAidHeader2($aid); ?> <?php echo _ON." $datetime $timezone "."($counter "._READS.")"; ?></td><td width=45% align=right><?php echo eregi_replace("<a","<a class=lien",$morelink); ?></td></table>
          </TD>
          <TD width="11" background="themes/PhpInfo/images/table/dc.gif" height="11"></TD>
        </TR>
        <TR>
          <TD background="themes/PhpInfo/images/table/gc.gif" width="11" height="11"></TD>
          <TD bgcolor="#B8C8FE" height="11" nowrap><br></TD>
          <TD width="11" background="themes/PhpInfo/images/table/dc.gif" height="11"></TD>
        </TR>
          
<?php
}

function themearticle ($aid, $informant, $datetime, $title, $thetext, $topic, $topicname, $topicimage, $topictext) {
        global $admin, $sid, $tipath, $bgcolor2;
?>
      <TABLE width="100%" border="0" cellspacing="0" cellpadding="0" align="center">
        <TR>
          <TD height="11" width="11" background="themes/PhpInfo/images/table/hg.gif"></TD>
          <TD background="themes/PhpInfo/images/table/hc.gif" height="11"></TD>
          <TD width="11" height="11" background="themes/PhpInfo/images/table/hd.gif"></TD>
        </TR>
        <TR>
                  <TD height="11" width="11" background="themes/PhpInfo/images/table/gc.gif"></TD>
                  <TD BGCOLOR="#B8C8FE">
                  <TABLE BORDER='0'  CELLSPACING='0' CELLPADDING='0'  WIDTH='100%'>
                  <TR VALIGN='top'><TD>
                  <A CLASS='titre'>&nbsp;&nbsp;<?PHP echo ""._COMMENTREPLY.""; ?>&nbsp;&nbsp;</A>
                  </TD><TD ALIGN='right' NOWRAP WIDTH='0%'>
                  &nbsp;<IMG SRC='themes/PhpInfo/images/droitev.gif' WIDTH="5" HEIGHT="10" BORDER=0 ALIGN='absmiddle'><IMG SRC='themes/PhpInfo/images/droitev.gif' WIDTH="5" HEIGHT="10" BORDER=0 ALIGN='absmiddle'>&nbsp;<A HREF='search.php'  CLASS='lien'>Les Archives</A></TD></TR>
                  </TABLE>
                  <HR COLOR='5A6BA5' NOSHADE></TD>
          <TD height="11" width="11" background="themes/PhpInfo/images/table/dc.gif"></TD>
        <TR>
          <TD background="themes/PhpInfo/images/table/gc.gif" width="11" height="11"></TD>
          <TD background="themes/PhpInfo/images/raye10.gif" height="16">
            <table width=100%><tr><td width=50%><B><?php echo "<font color=#FFFFFF><b>$title</b></font>"; ?></B></td>
            <TD align="right" width="50%">
                <?php echo "<font color=\"yellow\">[$datetime]</font>" ?>
            </TD></TR></TABLE></TD>
          <TD width="11" background="themes/PhpInfo/images/table/dc.gif" height="11"></TD>
        </TR>
        <TR>
          <TD background="themes/PhpInfo/images/table/gc.gif" width="11"></TD>
          <TD bgcolor="<?php echo $bgcolor2 ?>">
            <?php echo _POSTEDON." $datetime "._BY; ?> <?php formatAidHeader2($aid); ?>
            <?php if ($admin) {
                    echo "&nbsp;&nbsp;[ <a class=\"lien\"href=admin.php?op=EditStory&sid=$sid>"._EDIT."</a> | <a class=\"lien\" href=admin.php?op=RemoveStory&sid=$sid>"._DELETE."</a> ]";
                      } ?>
            <BR>
            <?php echo _CONTRIBUTEDBY." "."<a class=\"lien\" href=\"user.php?op=userinfo&uname=$informant\">$informant</a>"; ?>
          </TD>
          <TD width="11" background="themes/PhpInfo/images/table/dc.gif"></TD>
        </TR>
        <TR>
          <TD background="themes/PhpInfo/images/table/gc.gif" width="11"></TD>
          <TD bgcolor="<?php echo $bgcolor2 ?>">
            <a href="search.php?query=&topic=<?php echo"$topic"; ?>&author="><img src=<?php echo "$tipath$topicimage"; ?> border=0 Alt=<?php echo"\"$topictext\""; ?> align=right hspace=10 vspace=10></a>
            <?php FormatStory(eregi_replace("<a","<a class=lien",$thetext), $notes, $aid, $informant); ?>
            <BR><BR>
          </TD>
          <TD width="11" background="themes/PhpInfo/images/table/dc.gif"></TD>
        </TR>
        <TR>
          <TD background="themes/PhpInfo/images/table/bg.gif" width="11" height="11"></TD>
          <TD background="themes/PhpInfo/images/table/bc.gif" height="11"></TD>
          <TD width="11" background="themes/PhpInfo/images/table/bd.gif" height="11"></TD>
        </TR>
        <TR>
          <TD height="11"></TD>
        </TR>
      </TABLE>
<?php
}

function themesidebox($title, $content) {
?>
<TABLE BORDER='0'  CELLSPACING='0' CELLPADDING='0' width=130>
<TR VALIGN='top'><TD>
<IMG SRC='themes/PhpInfo/images/menu/t-haut.gif' WIDTH="130" HEIGHT="18" BORDER=0 ALIGN='absmiddle'></TD></TR><TR><TD BGCOLOR=#5A6BA5><center><b><font color=yellow><?php echo $title ?></b></font></center>
<IMG SRC='themes/PhpInfo/images/barre2.gif' WIDTH="124" HEIGHT="12" BORDER=0 ALIGN='absmiddle'><BR><?php echo $content ?>
</TD></TR><TR><TD ><IMG SRC='themes/PhpInfo/images/menu/t-bas.gif' WIDTH="130" HEIGHT="16" BORDER=0 ALIGN='absmiddle'></TD></TR>
</TABLE>

<?php
}

?>