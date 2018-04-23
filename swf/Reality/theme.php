<?php

/************************************************************/
/* Theme Colors Def  <-- AND YOU KNOW IT ALREADY -->        */
/*                                                          */
/* Control the header for your site. You need to define the */
/* BODY tag and in some part of the code call the blocks    */
/* function for left side with: blocks(left);               */
/* Contributions From Stealth,Blizard,RootDiger,Boo         */
/************************************************************/

$thename = "Reality";
$bgcolor = "#000000"; 
$bgcolor1 = "#efefef";
$bgcolor2 = "#cfcfbb";
$bgcolor3 = "#efefef";
$bgcolor4 = "#cfcfbb";
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
    global $bgcolor1, $bgcolor2;
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
/* Function themeheader() <-- HELL YEA! -->                 */
/************************************************************/

function themeheader() {
global $user, $sitename, $username, $cookie;
cookiedecode($user);
$username = $cookie[1];
if ($username == "") {
        $username = "Guest";
}
?>
<body bgcolor="#000000">
<SCRIPT type="text/javascript">
<!--
function MM_swapImgRestore() { //v3.0
  var i,x,a=document.MM_sr; for(i=0;a&&i<a.length&&(x=a[i])&&x.oSrc;i++) x.src=x.oSrc;
}

function MM_preloadImages() { //v3.0
  var d=document; if(d.images){ if(!d.MM_p) d.MM_p=new Array();
    var i,j=d.MM_p.length,a=MM_preloadImages.arguments; for(i=0; i<a.length; i++)
    if (a[i].indexOf("#")!=0){ d.MM_p[j]=new Image; d.MM_p[j++].src=a[i];}}
}

function MM_swapImage() { //v3.0
  var i,j=0,x,a=MM_swapImage.arguments; document.MM_sr=new Array; for(i=0;i<(a.length-2);i+=3)
   if ((x=MM_findObj(a[i]))!=null){document.MM_sr[j++]=x; if(!x.oSrc) x.oSrc=x.src; x.src=a[i+2];}
}

function MM_findObj(n, d) { //v4.01
  var p,i,x;  if(!d) d=document; if((p=n.indexOf("?"))>0&&parent.frames.length) {
    d=parent.frames[n.substring(p+1)].document; n=n.substring(0,p);}
  if(!(x=d[n])&&d.all) x=d.all[n]; for (i=0;!x&&i<d.forms.length;i++) x=d.forms[i][n];
  for(i=0;!x&&d.layers&&i<d.layers.length;i++) x=MM_findObj(n,d.layers[i].document);
  if(!x && d.getElementById) x=d.getElementById(n); return x;
}
//-->
</script>
if ($banners) {	
include("banners.php");    
}
<table width="95%" border="0" cellspacing="0" cellpadding="0" align="center">
<tr bgcolor="#FF8302">
<td height="74" width="348" valign="top"><img src="themes/Reality/images/leftOrange.gif" alt="" width="10" height="72">
<img src="themes/Reality/images/logo.gif" width="325" height="62" alt=""></td>
<td height="74" align="left" valign="middle" colspan="4">
<form action="search.php" method="post"><b><?php echo
""._SEARCH.""; ?></b> <input type="text" name="query"
size="10"><input type="hidden" value="submit"></form></td>
<td height="74" align="right" colspan="5" valign="middle">
    <form action="search.php" method="get"><b><?php echo
    "".Explore.""; ?></b> <?php
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
</FORM>
<td height="74" width="20" align="right" valign="top"><img
src="themes/Reality/images/orangeEnd.gif" alt="" width="20"
height="72"></td>
</tr>
<tr>
<td colspan="11" bgcolor="#666666" height="6"><img
src="themes/Reality/images/topLines.gif" alt="" width="100%"
height="6"></td>
</tr>
<tr>
<td colspan="11" bgcolor="#666666" height="19" valign="middle">
<table width="100%" border="0" cellspacing="0" cellpadding="0">
<tr>
<td width="10" height="19"><img
src="themes/Reality/images/1x1Trans.gif" alt="/" width="10"
height="19"></td>
<td width="62" height="19"><a href="index.php"><img name="home" border="0"
src="themes/Reality/images/home.gif" alt="Home" width="62" height="19" /></a></td>
<td width="62" height="19">
<a href="submit.php"><img name="submit news" border="0" src="themes/Reality/images/news.gif" alt="News" width="62" height="19"></a></td>
<td width="62" height="19">
<a href="modules.php?op=modload&amp;name=Templates&amp;file=index">
<img name="articles" border="0" src="themes/Reality/images/articles.gif" alt="picture Gallery" width="62" height="19"></a></td>
<td width="69" height="19">
<a href="backend.php"><img name="company" border="0" src="themes/Reality/images/company.gif" alt="Retrieve News" width="69" height="19"></a></td>
<td height="19" width="69">
<a href="links.php"><img name="links" border="0" src="themes/Reality/images/links.gif" alt="Web Links" width="69" height="19"></a></td>
<td height="19" width="62">
<a href="modules.php?op=modload&amp;name=FAQ&amp;file=index"><img name="faqs" border="0"
src="themes/Reality/images/faqs.gif" alt="FAQ's" width="62" height="19"></a></td>
<td height="19" width="62">
<a href="top.php"><img name="contact" border="0" src="themes/Reality/images/contact.gif"
alt="Top Ranked Pages" width="62" height="19"></a></td>
<td height="19" width="80%"><img src="themes/Reality/images/endButton.gif" alt="" width="29" height="19"></td>
<td height="19" width="20"><img src="themes/Reality/images/1x1Trans.gif " alt="" width="20" height="19"></td>
</tr>
</table>
<tr>
<td colspan="11" bgcolor="#999999" height="6"><img
src="themes/Reality/images/topLines.gif" alt="" width="100%"
height="6"></td>
</tr>
<tr>
<td bgcolor="#999999" colspan="10" height="19" align="right"><font size="1"
face="System" color="#00FF00"><?php
if ($username == "Guest") {
    echo "<a href=\"user.php\">Please Register to be a member</a>";
}
else
{
    echo ""._HELLO."
$username";
}
?> </font>
</td>
    <td width="20" bgcolor="#999999" height="19" align="right"><img src="themes/Reality/images/1x1Trans.gif" width="20" height="19" alt=""></td>
  </tr>
  <tr>
    <td colspan="11"><img src="themes/Reality/images/topLines.gif" width="100%" height="6" alt=""></td>
  </tr>
</table>

<?php        if ($username == "Guest") {
echo  "<TABLE cellSpacing=\"0\" cellPadding=\"0\" border=\"0\" width=\"95%\" align=\"center\">"
     ."<TR>"
     ."<TD bgcolor=\"#999999\" colspan=6 ><IMG src=\"themes/Reality/images/pixel.gif\" width=1 height=1 alt=\"\" border=\"0\" hspace=0></TD>" 
     ."</TR>"
     ."<tr bgcolor=\"#A8A8A8\" ><td nowrap><form action=user.php method=post>&nbsp;"
     ."<font class=infoa>Login&nbsp;</font><input class=textbox type=text name=uname size=12 maxlength=25>"
     ."&nbsp;<font class=infoa>Password&nbsp;</font><input class=textbox type=password name=pass size=12 maxlength=20>"
     ."</td><td width=\"95%\" align=\"left\" valign=\"middle\">&nbsp;&nbsp;"
     ."<input type=image src=\"themes/Reality/images/login.gif\" border=\"0\">&nbsp;&nbsp;"
     ."<a href=\"user.php\"><img src=\"themes/Reality/images/submit1.gif\" border=\"0\"></a>"
     ."<input type=hidden name=op value=login></td></tr></form>"
     ."<TR>"
     ."<TD bgcolor=\"#000000\" colspan=6><IMG src=\"themes/Reality/images/pixel.gif\" width=1 height=1 alt=\"\" border=0 hspace=0></TD>"
     ."</TR>"
     ."</TABLE>";
     }
else
{    echo  "<TABLE cellSpacing=\"0\" cellPadding=\"0\" border=\"0\" width=\"95%\" align=\"center\">"
     ."<TR>"
     ."<TD bgcolor=\"#A8A8A8\" colspan=\"6\"><IMG src=\"themes/Reality/images/pixel.gif\" width=\"1\" height=\"1\" alt=\"\" border=\"0\" hspace=\"0\"></TD>"
     ."</TR>"
     ."<tr bgcolor=\"#A8A8A8\"><td width=\"50%\" align=\"right\">&nbsp;&nbsp;"
     ."<a href=\"user.php?op=logout\"><img src=\"themes/Reality/images/logout.gif\" border=\"0\"></a>&nbsp;&nbsp;&nbsp;&nbsp;"
     ."</td>"
     ."<td width=\"50%\" nowrap><a href=\"user.php\"><img src=\"themes/Reality/images/perso.gif\" alt=\"Your Profile\" border=\"0\"></a>&nbsp;&nbsp;&nbsp;"
     ."&nbsp;&nbsp;<a href=\"index.php\"><img src=\"themes/Reality/images/home1.gif\" alt=\"HOME\" border=\"0\"></a>&nbsp;&nbsp;&nbsp;"
     ."&nbsp;&nbsp;<a href=\"submit.php\"><img src=\"themes/Reality/images/submit1.gif\" alt=\"Post A News\" border=\"0\"></a>"
     ."</tr>"
     ."<TR>"
     ."<TD bgcolor=\"#000000\" colspan=\"6\"><IMG src=\"themes/Reality/images/pixel.gif\" width=\"1\" height=\"1\" alt=\"\" border=\"0\" hspace=\"0\"></TD>"
     ."</TR></TABLE>";
}
?>

<TABLE width="95%" cellpadding="0" cellspacing="0" border="0" bgcolor="#fefefe" align="center">
<!-- tr><td>&nbsp</td><td width=70%><IMG src="themes/Reality/images/pix.gif" height="2" width="200" alt=""></td><td>&nbsp</td><tr -->
<TR valign="bottom">
<TR valign="top"><TD width="15"><IMG src="themes/Reality/images/pixel.gif" height="1" width="16" alt=""></TD>
<TD width="115">
<P align="center">
<TABLE width="95%" cellpadding="0" cellspacing="0" border="0">
<TR valign="bottom">
<?php
blocks(left);
?>
<TD width="16"><IMG src="themes/Reality/images/pixel.gif" height="1" width="16" alt=""></TD>
<TD>
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
/* BOO says BOO!                                            */
/************************************************************/

function themefooter() {
    global $index;
    if ($index == 1) {
	echo "</td><td><img src=\"themes/Reality/images/pixel.gif\" width=\"15\" height=\"1\" border=\"0\" alt=\"\"></td><td valign=\"top\" width=\"130\">\n";
	blocks(right);
    }
    echo "</td><td bgcolor=\"#ffffff\"><img src=\"themes/Reality/images/pixel.gif\" width=10 height=1 border=0 alt=\"\">\n"
	."</td></tr></table>\n"
        ."<table width=\"95%\" cellpadding=\"0\" cellspacing=\"0\" border=\"0\" bgcolor=\"#ffffff\" align=\"center\"><tr valign=\"top\">\n"
        ."<td align=\"center\" height=\"17\">\n"
        ."<IMG height=\"17\" alt=\"\" hspace=\"0\" src=\"themes/Reality/images/corner-bottom-left.gif\" width=\"17\" align=\"left\">\n"
        ."<IMG height=\"17\" alt=\"\" hspace=\"0\" src=\"themes/OpenNuke/images/corner-bottom-right.gif\" width=\"17\" align=\"right\">\n"
        ."</td></tr></table>\n"
        ."<br>"
        ."<table width=\"95%\" cellpadding=\"0\" cellspacing=\"0\" border=\"0\" bgcolor=\"#ffffff\" align=\"center\"><tr valign=\"top\">\n"
        ."<td><IMG height=\"17\" alt=\"\" hspace=\"0\" src=\"themes/Reality/images/corner-top-left.gif\" width=\"17\" align=\"left\"></td>\n"
        ."<td width=\"100%\">&nbsp;</td>\n"
        ."<td><IMG height=\"17\" alt=\"\" hspace=\"0\" src=\"themes/Reality/images/corner-top-right.gif\" width=\"17\" align=\"right\"></td>\n"
        ."</tr><tr align=\"center\">\n"
        ."<td width=\"100%\" colspan=\"3\">\n";
    footmsg();
    echo "</td>\n"
        ."</tr><tr>\n"
        ."<td><IMG height=\"17\" alt=\"\" hspace=\"0\" src=\"themes/Reality/images/corner-bottom-left.gif\" width=\"17\" align=\"left\"></td>\n"
        ."<td width=\"100%\">&nbsp;</td>\n"
        ."<td><IMG height=\"17\" alt=\"\" hspace=\"0\" src=\"themes/Reality/images/corner-bottom-right.gif\" width=\"17\" align=\"right\"></td>\n"
        ."</tr></table>\n";
}

/************************************************************/
/* Function themeindex()                                    */
/* ÷á‰FbÁè‰Fdúf¶Ff÷f$f·VfÐf‹F f+Âƒ~                  */
/* This function format the stories on the Homepage         */
/* BLIZARD IS THE REAL GOD !                                */
/************************************************************/
function themeindex ($aid, $informant, $time, $title, $counter, $topic, $thetext, $notes, $morelink, $topicname, $topicimage, $topictext) {
    global $anonymous, $tipath;
    echo "<table border=\"0\" cellpadding=\"0\" cellspacing=\"0\" bgcolor=\"#ffffff\" width=\"100%\"><tr><td>\n"
	."<table border=\"0\" cellpadding=\"1\" cellspacing=\"0\" bgcolor=\"#000000\" width=\"100%\"><tr><td>\n"
	."<table border=\"0\" cellpadding=\"3\" cellspacing=\"0\" bgcolor=\"#cfcfbb\" width=\"100%\"><tr><td align=\"left\">\n"
	."<font size=\"3\" color=\"#363636\"><b>$title</b></font>\n"
	."</td></tr></table></td></tr></table>\n"
	."<font color=\"#999999\"><b><a href=\"search.php?query=&amp;topic=$topic\"><img src=\"$tipath$topicimage\" border=\"0\" Alt=\"$topictext\" align=\"right\" hspace=\"10\" vspace=\"10\"></a></B></font>\n";
    FormatStory($thetext, $notes, $aid, $informant);
    echo "</td></tr></table>\n"
	."<table border=\"0\" cellpadding=\"1\" cellspacing=\"0\" bgcolor=\"#000000\" width=\"100%\"><tr><td>\n"
	."<table border=\"0\" cellpadding=\"3\" cellspacing=\"0\" bgcolor=\"#efefef\" width=\"100%\"><tr><td align=\"center\">\n"
	."<font color=\"#999999\" size=\"1\">"._POSTEDBY." ";
    formatAidHeader($aid);
    echo " "._ON." $time $timezone ($counter "._READS.")<br></font>\n"
	."<font size=\"2\">$morelink</font>\n"
	."</td></tr></table></td></tr></table>\n"
	."<br><br><br>\n\n\n";
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
    echo "<table border=\"0\" cellpadding=\"0\" cellspacing=\"0\" bgcolor=\"#ffffff\" width=\"100%\"><tr><td>\n"
        ."<table border=\"0\" cellpadding=\"1\" cellspacing=\"0\" bgcolor=\"#000000\" width=\"100%\"><tr><td>\n"
        ."<table border=\"0\" cellpadding=\"3\" cellspacing=\"0\" bgcolor=\"#cfcfbb\" width=\"100%\"><tr><td align=\"left\">\n"
        ."<font size=\"3\" color=\"#363636\"><b>$title</b></font><br>\n"
        ."<font size=\"2\">"._POSTEDON." $datetime "._BY." ";
    formatAidHeader($aid);
    if (is_admin($admin)) {
	echo "<br>[ <a href=\"admin.php?op=EditStory&amp;sid=$sid\">"._EDIT."</a> | <a href=\"admin.php?op=RemoveStory&amp;sid=$sid\">"._DELETE."</a> ]\n";
    }
    echo "</td></tr></table></td></tr></table><br>";
    echo "<a href=\"search.php?query=&amp;topic=$topic\"><img src=\"$tipath$topicimage\" border=\"0\" Alt=\"$topictext\" align=\"right\" hspace=\"10\" vspace=\"10\"></a>\n";
    FormatStory($thetext, $notes="", $aid, $informant);
    echo "</td></tr></table><br>\n\n\n";
}

/************************************************************/
/* Function themesidebox()                                  */
/*                                                          */
/* Control look of your blocks. Just simple.                */
/* And this is the bottom rock..Thats All ??                */
/************************************************************/
function themesidebox($title, $content) {
    echo "<table border=\"0\" cellpadding=\"0\" cellspacing=\"0\" bgcolor=\"#000000\" width=\"130\"><tr><td>\n"
	."<table border=\"0\" cellpadding=\"2\" cellspacing=\"0\" bgcolor=\"#dedebb\" width=\"100%\"><tr><td align=center>\n"
	."<font size=\"1\" color=\"#363636\"><b>$title</b></font>\n"
	."</td></tr></table></td></tr></table>\n"
	."<table border=\"0\" cellpadding=\"0\" cellspacing=\"0\" bgcolor=\"#ffffff\" width=\"130\">\n"
	."<tr valign=\"top\"><td bgcolor=\"#ffffff\">\n"
	."$content\n"
	."</td></tr></table>\n"
	."<br>\n\n\n";
}

?>