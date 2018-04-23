<?php

$thename = "Quantum"; 
$bgcolor1 = "#e2dfc8";
$bgcolor2 = "#cfcfbb";
$bgcolor3 = "#e2dfc8";
$bgcolor4 = "#e2dfc8";
$textcolor1 = "#000000";
$textcolor2 = "#000000";

function OpenTable() {
    global $bgcolor1, $bgcolor2;
    echo "<table width=\"100%\" border=\"0\" cellspacing=\"1\"
cellpadding=\"0\" bgcolor=\"$bgcolor2\"><tr><td>\n";
    echo "<table width=\"100%\" border=\"0\" cellspacing=\"1\"
cellpadding=\"5\" bgcolor=\"$bgcolor1\"><tr><td>\n";
}

function CloseTable() {
    echo "</td></tr></table></td></tr></table>\n";
}

function OpenTable2() {
    global $bgcolor1, $bgcolor2, $textcolor1;
    echo "<table border=\"0\" cellspacing=\"1\" cellpadding=\"0\"
bgcolor=\"$bgcolor2\" align=\"center\"><tr><td>\n";
    echo "<table border=\"0\" cellspacing=\"1\" cellpadding=\"5\"
bgcolor=\"$bgcolor1\"><tr><td>\n";
}

function CloseTable2() {
    echo "</td></tr></table></td></tr></table>\n";
}

function FormatStory($thetext, $notes, $aid, $informant) {
    global $anonymous;
    if ($notes != "") {
  $notes = "<br><b>"._NOTE."</b> $notes\n";
    } else {
  $notes = "";
    }
    if ("$aid" == "$informant") {
  echo "<font size=\"2\"
color=\"#000000\">$thetext<br>$notes</font>\n";
    } else {
  if($informant != "") {
      $boxstuff = "<a
href=\"user.php?op=userinfo&amp;uname=$informant\">$informant</a>
";
  } else {
      $boxstuff = "$anonymous ";
  }
  $boxstuff .= ""._WRITES." \"$thetext\" $notes\n";
  echo "<font size=\"2\" color=\"#000000\">$boxstuff</font>\n";
    }
}

/************************************************************/
/* Function themeheader()                                   */
/************************************************************/

function themeheader() {
global $user, $sitename, $username, $cookie;
cookiedecode($user);
$username = $cookie[1];
if ($username == "") {
        $username = "Guest";
}
?>
<table width="100%" border="0" cellspacing="0" cellpadding="0" align="center">
<tr bgcolor="#6B6B6B">
<td height="15" width="400" valign="top"><font face="Arial" color="#00FF00" size="3"><b>&nbsp;&nbsp;&nbsp;
<?PHP
global $sitename, $slogan;
echo "$sitename - $slogan";
?>
</b></font></td>
<td height="15" align="left" colspan="4" valign="top">
<form action="search.php" method="post"><font face="Arial" color="#00FF00" size="2"><b><?php echo ""._SEARCH.""; ?></b><input type="text" name="query"
size="10"><input type="hidden" value="submit"></td></form>
<td height="15" align="right" colspan="3" valign="top">
<form action="search.php" method="get"><font face="Arial" color="#00FF00" size="2"><b><?php echo
    "".Explore.""; ?></b><?php
    $toplist = mysql_query("select topicid, topictext from nuke_topics order by topictext");
    echo "<SELECT NAME=\"topic\"onChange='submit()'>" ;
    echo "<OPTION VALUE=\"\">"._ALLTOPICS."</option>\n";
    while(list($topicid, $topics) = mysql_fetch_row($toplist)) {
    if ($topicid==$topic) { $sel = "selected "; }
        echo "<option $sel value=\"$topicid\">$topics</option>\n";
    $sel = "";
    }
    echo "</SELECT>";
?>
</FONT></FORM>
</td>
</tr>
</table>
<table cellspacing="0" cellpadding="0" width="100%" border="0">
            <tr>
              <td><img src="/themes/Quantum/images/m1-1.gif" alt width="22" height="26"></td>
              <td width="100%" background="/themes/Quantum/images/m1-2.gif"><img height="8" width="8" src="/themes/Quantum/images/pixel.gif" alt></td>
              <td><img src="/themes/Quantum/images/m1-3.gif" alt width="22" height="26"></td>
            </tr>
            <tr>
              <td background="/themes/Quantum/images/m1-4.gif"><img height="8" width="8" src="/themes/Quantum/images/pixel.gif" alt></td>
              <td width="100%" bgcolor="#333333" align="left"><font face="Arial" color="#00FF00" size="2"><b><?php
if ($username == "") {
    echo "<a href=\"user.php\" Please Register to be a member";
}
else
{
    echo ""._HELLO." $username";
}
echo "</b></font>";
?>&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
<?php 
global $banners;
         if ($banners) {
             include("banners.php");
         }
?><br><br><?php        if ($username == "Guest") {
echo  "<TABLE cellSpacing=\"0\" cellPadding=\"0\" width=\"100%\" border=\"0\" align=\"center\" nowrap>"
     ."<TR>"
     ."<TD bgcolor=\"#000000\" colspan=6 ><IMG src=\"themes/Quantum/images/pixel.gif\" width=1 height=1 alt=\"\" border=0 hspace=0></TD>" 
     ."</TR>"
     ."<tr bgcolor=\"#000000\" ><td nowrap><form action=user.php method=post>&nbsp;"
     ."<font face=\"Arial\" color=\"#00FF00\" size=\"2\"><b>Login&nbsp;</b></font><input class=textbox type=text name=uname size=12 maxlength=25>"
     ."&nbsp;<font face=\"Arial\" color=\"#00FF00\" size=\"2\"><b>Password&nbsp;</b></font><input class=textbox type=password name=pass size=12 maxlength=20>"
     ."</td><td width=\"100%\" align=\"left\" valign=\"middle\">&nbsp;&nbsp;"
     ."<input type=image src=\"themes/Quantum/images/login.gif\" border=\"0\">&nbsp;&nbsp;&nbsp;"
     ."<a href=\"user.php\"><img src=\"themes/Quantum/images/submit1.gif\" alt=\"Register\" border=\"0\"></a>"
     ."<input type=hidden name=op value=login></td></tr></form>"
     ."<TR>"
     ."<TD bgcolor=\"#000000\" colspan=6><IMG src=\"themes/Quantum/images/pixel.gif\" width=1 height=1 alt=\"\" border=0 hspace=0></TD>"
     ."</TR>"
     ."</TABLE>";
     }
else
{    echo  "<TABLE cellSpacing=\"0\" cellPadding=\"0\" width=\"100%\" border=\"0\" align=\"center\" nowrap>"
     ."<TR>"
     ."<TD bgcolor=\"#000000\" colspan=6><IMG src=\"themes/Quantum/images/pixel.gif\" width=1 height=1 alt=\"\" border=0 hspace=0></TD>"
     ."</TR>"
     ."<tr bgcolor=\"#000000\"><td width=\"50%\" nowrap align=\"right\">&nbsp;&nbsp;"
     ."<a href=\"user.php?op=logout\"><img src=\"themes/Quantum/images/logout.gif\" border=\"0\"></a>&nbsp;&nbsp;&nbsp;&nbsp;"
     ."</td>"
     ."<td width=\"50%\" nowrap><a href=\"user.php\"><img src=\"themes/Quantum/images/perso.gif\" alt=\"Your Profile\" border=\"0\"></a>&nbsp;&nbsp;&nbsp;"
     ."&nbsp;&nbsp;<a href=\"index.php\"><img src=\"themes/Quantum/images/home1.gif\" alt=\"HOME\" border=\"0\"></a>&nbsp;&nbsp;&nbsp;"
     ."&nbsp;&nbsp;<a href=\"submit.php\"><img src=\"themes/Quantum/images/submit1.gif\" alt=\"Post A News\" border=\"0\"></a>"
     ."</tr>"
     ."<TR>"
     ."<TD bgcolor=\"#000000\" colspan=6><IMG src=\"themes/Quantum/images/pixel.gif\" width=1 height=1 alt=\"\" border=0 hspace=0></TD>"
     ."</TR></TABLE>";
}
?></td>
              <td background="/themes/Quantum/images/m1-5.gif"><img height="8" width="8" src="/themes/Quantum/images/pixel.gif" alt></td>
            </tr>
            <tr>
              <td><img src="/themes/Quantum/images/m1-6.gif" alt width="22" height="18"></td>
              <td width="100%" background="/themes/Quantum/images/m1-7.gif"><img height="8" width="8" src="/themes/Quantum/images/pixel.gif" alt></td>
              <td><img src="/themes/Quantum/images/m1-8.gif" alt width="22" height="18"></td>
            </tr>
        </table>
<TABLE width="100%" cellpadding="0" cellspacing="0" border="0" bgcolor="#ececec" align="center">
<TR>
    <TD width="100" bgcolor="#000000" valign="top">
      <?php
blocks(left);
?>
</TD>
<td width="18" valign="top" background="themes/Quantum/images/vsplit1.gif"><img src="/themes/Quantum/images/vsplit2.gif" alt width="18" height="1"></td>
    <TD valign=top>
<?php
}
/************************************************************/
/* Function themefooter()                                   */
/*                                                          */
/* Control the footer for your site. You don't need to      */
/* close BODY and HTML tags at the end. In some part call   */
/* the function for right blocks with: blocks(right);       */
/* Also, $index variable need to be global and is used to   */
/* determine if the page your're viewing is the Homepage or */
/* and internal one.                                        */
/************************************************************/

function themefooter() {
    global $index;
    if ($index ==1) {
	echo "</td><td width=\"18\" valign=\"top\" background=\"themes/Quantum/images/vsplit1.gif\"><img src=\"/themes/Quantum/images/vsplit2.gif\" alt width=\"18\" height=\"1\"></td><td width=\"100\" bgcolor=\"#000000\" valign=\"top\">\n";
	blocks(right);
    }
    echo "</td></tr></table>\n"
        ."<table width=\"100%\" cellpadding=\"0\" cellspacing=\"0\" border=\"0\" bgcolor=\"#000000\" align=\"center\">\n"
        ."<tr align=\"center\">\n"
        ."<td width=\"100%\" colspan=\"3\">\n";
    footmsg();
    echo "</td>\n"
        ."</tr></tr></table>\n";
}

/************************************************************/
/* Function themeindex()                                    */
/*                                                          */
/* This function format the stories on the Homepage         */
/************************************************************/
function themeindex ($aid, $informant, $datetime, $title, $counter, $topic, $thetext, $notes, $morelink, $topicname, $topicimage, $topictext) {
        global $tipath, $anonymous;
?>
     <table cellspacing="0" cellpadding="0" width="100%" border="0" align="center">
           <tbody>
           <tr>
              <td><img src="/themes/Quantum/images/m2-1.gif" alt width="22" height="32"></td>
              <td width="100%" background="/themes/Quantum/images/m2-2.gif" align="center"><B><?php echo "<font color=#000000><b>$title</b></font>"; ?></B></td>
              <td><img src="/themes/Quantum/images/m2-3.gif" alt width="22" height="32"></td>
            </tr>
            <tr>
              <td background="/themes/Quantum/images/m2-4.gif"><img height="8" width="8" src="/themes/Quantum/images/pixel.gif" alt></td>
              <td width="100%" bgcolor="#e2dfc8">
              <a href="search.php?query=&topic=<?php echo"$topic"; ?>&author="><img src=<?php echo "$tipath$topicimage"; ?> border=0 Alt=<?php echo"\"$topictext\""; ?> align=right hspace=10 vspace=10></a>
            <?php FormatStory($thetext, $notes, $aid, $informant); ?>
            &nbsp;<BR>
              <?php echo ""._POSTEDBY." "; ?>
              <?php formatAidHeader($aid) ?>
              <?php echo ""._ON.""; ?>
              <?php echo"$datetime"; ?>
              (<?php echo $counter; ?><?php echo ""._READS.""; ?>)
              <?php echo $morelink; ?>
              </td>
              <td background="/themes/Quantum/images/m2-5.gif"><img height="8" width="8" src="/themes/Quantum/images/pixel.gif" alt></td>
            </tr>
            <tr>
              <td><img src="/themes/Quantum/images/m2-6.gif" alt width="22" height="22"></td>
              <td width="100%" background="/themes/Quantum/images/m2-7.gif"><img height="8" width="8" src="/themes/Quantum/images/pixel.gif" alt></td>
              <td><img src="/themes/Quantum/images/m2-8.gif" alt width="22" height="22"></td>
            </tr>
          </tbody>
        </table>
<?php
}

/************************************************************/
/* Function themeheader()                                   */
/*                                                          */
/* Control the header for your site. You need to define the */
/* BODY tag and in some part of the code call the blocks    */
/* function for left side with: blocks(left);               */
/************************************************************/

function themearticle ($aid, $informant, $datetime, $title, $thetext, $topic, $topicname, $topicimage, $topictext) {
        global $admin, $sid, $tipath;
?>
   <table cellspacing="0" cellpadding="0" width="100%" border="0" align="center">
           <tbody>
            <tr>
              <td><img src="/themes/Quantum/images/m2-1.gif" alt width="22" height="32"></td>
              <td width="100%" background="/themes/Quantum/images/m2-2.gif" align="center">&nbsp;<B><?php echo "<font color=#000000><b>$title</b></font>"; ?></B></td>
              <td><img src="/themes/Quantum/images/m2-3.gif" alt width="22" height="32"></td>
            </tr>
            <tr>
              <td background="/themes/Quantum/images/m2-4.gif"><img height="8" width="8" src="/themes/Quantum/images/pixel.gif" alt></td>
              <td width="100%" bgcolor="#e2dfc8">
              <?php echo _POSTEDON." $datetime "._BY; ?> <?php formatAidHeader($aid); ?>
            <?php if ($admin) {
                    echo "&nbsp;&nbsp;[ <a href=admin.php?op=EditStory&sid=$sid>"._EDIT."</a> | <a href=admin.php?op=RemoveStory&sid=$sid>"._DELETE."</a> ]";
                      } ?>
            <BR><BR>
            <?php echo _CONTRIBUTEDBY." "."<a href=\"user.php?op=userinfo&uname=$informant\">$informant</a>"; ?>
             <a href="search.php?query=&topic=<?php echo"$topic"; ?>&author="><img src=<?php echo "$tipath$topicimage"; ?> border=0 Alt=<?php echo"\"$topictext\""; ?> align=right hspace=10 vspace=10></a>
            <?php FormatStory($thetext, $notes, $aid, $informant); ?>
              </td>
              <td background="/themes/Quantum/images/m2-5.gif"><img height="8" width="8" src="/themes/Quantum/images/pixel.gif" alt></td>
            </tr>
            <tr>
              <td><img src="/themes/Quantum/images/m2-6.gif" alt width="22" height="22"></td>
              <td width="100%" background="/themes/Quantum/images/m2-7.gif"><img height="8" width="8" src="/themes/Quantum/images/pixel.gif" alt></td>
              <td><img src="/themes/Quantum/images/m2-8.gif" alt width="22" height="22"></td>
            </tr>
           </tbody>
          </table>

<?php
}

/************************************************************/
/* Function themesidebox()                                  */
/*                                                          */
/* Control look of your blocks. Just simple.                */
/************************************************************/
function themesidebox($title, $content) {
?>
    <table cellspacing="0" cellpadding="0" width="165" border="0">
           <tbody>
            <tr>
              <td><img src="/themes/Quantum/images/m2-1.gif" alt width="22" height="32"></td>
              <td width="100%" background="/themes/Quantum/images/m2-2.gif" align="center"><?php echo"<font color=#000000 class=small><b>$title</b></font>"; ?></td>
              <td><img src="/themes/Quantum/images/m2-3.gif" alt width="22" height="32"></td>
            </tr>
            <tr>
              <td background="/themes/Quantum/images/m2-4.gif"><img height="8" width="8" src="/themes/Quantum/images/pixel.gif" alt></td>
              <td width="100%" bgcolor="#e2dfc8"><?php echo"$content"; ?></td>
              <td background="/themes/Quantum/images/m2-5.gif"><img height="8" width="8" src="/themes/Quantum/images/pixel.gif" alt></td>
            </tr>
            <tr>
              <td><img src="/themes/Quantum/images/m2-6.gif" alt width="22" height="22"></td>
              <td width="100%" background="/themes/Quantum/images/m2-7.gif"><img height="8" width="8" src="/themes/Quantum/images/pixel.gif" alt></td>
              <td><img src="/themes/Quantum/images/m2-8.gif" alt width="22" height="22"></td>
            </tr>
          </tbody>
        </table>

<?php
}

?>