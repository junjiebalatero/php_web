<?php

$thename = "Fusion-Radio";
$bgcolor1 = "#6789BA";
$bgcolor2 = "#6789BA";
$bgcolor3 = "#6789BA";
$textcolor1 = "#000000";
$textcolor2 = "#000000";
$hr = 1; # 1 to have horizonal rule in comments instead of table bgcolor

function OpenTable() {
    global $bgcolor1, $bgcolor2;
    echo "<table width=\"600\" border=\"0\" cellspacing=\"1\" cellpadding=\"0\" bgcolor=\"$bgcolor2\"><tr><td>\n";
    echo "<table width=\"100%\" border=\"0\" cellspacing=\"1\" cellpadding=\"8\" bgcolor=\"$bgcolor1\"><tr><td>\n";
}

function OpenTable2() {
    global $bgcolor1, $bgcolor2;
    echo "<table width=\"600\" border=\"0\" cellspacing=\"1\" cellpadding=\"0\" bgcolor=\"$bgcolor2\" align=\"center\"><tr><td>\n";
    echo "<table width=\"100%\" border=\"0\" cellspacing=\"1\" cellpadding=\"8\" bgcolor=\"$bgcolor1\"><tr><td>\n";
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
    global $sitename, $banners, $anonymous, $username, $user, $cookie;
cookiedecode($user);
$username = $cookie[1];
if ($username == "") {
$username = "Anonymous";
}
    ?><head>
<style type="text/css">
<!--

/* Fixed Size Styles these need to be one pixel bigger to work nice in Netscape! */

body 			{color: #000000; font-family: Verdana, Arial, helvetica, sans-serif; font-size: 10px;
				}


div.small 		{color: #000000; font-size: 11px; font-family: Verdana, Arial, helvetica, sans-serif; }
div.text 		{color: #000000; font-size: 13px; font-family: Verdana, Arial, helvetica, sans-serif; }
div.main 		{margin-left: 30px; }
div.arcadehead	{color: #000000; font-size: 19px; font-weight: bold;}
div.margin 		{ margin-left: 60px;}
td	 			{color: #000000; font-family: Verdana, Arial, helvetica, sans-serif; font-size: 10px;}
td.heading		{color: #ffffff; background-color: #6789BA; font-size: 18px; font-weight: bold; font-style: italic;}
td.announceback	{color: #000000; background-color: #6789BA; font-size: 12px;}
td.homeback		{color: #000000; background-color: #6789BA; font-size: 12px;}
td.animeback	{color: #000000; background-color: #6789BA; font-size: 12px;}
td.ymain		{color: #000000; background-color:#6789BA; font-size: 13px; font-weight: bold; padding: 2;}
td.categories	{color: #ffffff; background-color:#6789BA; font-size: 13px; font-weight: bold;}
td.arcadehead	{color: #000000; font-size: 19px; font-weight: bold;}
td.typerhow1	{color: #000000; background-color: #6789BA; font-size: 11px;}
td.typerhow2	{color: #000000; background-color: #6789BA; font-size: 11px;}

.text			{color: #000000; font-size: 13px;}
.textbold		{color: #ffffff; font-size: 13px; font-weight: bold;}
.textwhite		{color: #ffffff; font-size: 13px;}
.textboldwhite	{color: #ffffff; font-size: 13px; font-weight: bold;}
.translate		{color: #ffffff; background-color: #6789BA; font-size: 11px;}
.mail			{color: #000000; background-color: #6789BA; font-size: 11px;}
.mailbig		{color: #000000; font-size: 18px; font-family: Arial, helvetica, sans-serif; font-weight: bold;}
.search			{color: #ffffff; background-color: #6789BA; font-size: 11px;}
.link 			{color: #000000; font-size: 13px; font-weight: bold;}
.linknew		{color: #000000; font-size: 13px; font-weight: bold;}
.linksmall		{color: #000000; font-size: 11px;}
.reviews		{color: #000000; background-color: #ffffc4; font-size: 12px;}

/* Headers */
h2 				{color: #333333; font-size: 18 px; font-weight: bold; }
h3				{color: #333333; font-size: 16 px; font-weight: bold; }
h4				{color: #0000dd; font-size: 14px; font-weight: bold;}

/* Form Button settings */
.pnorm 			{color:#000000; background-color:#6789BA; font: 13px Verdana, Arial,Helvetica,Sans Serif; font-weight: bold}
.pover 			{color:#ffffff; background-color:#6789BA; font: 13px Verdana, Arial,Helvetica,Sans Serif; font-weight: bold}

/* Navbar */
A.nav 			{color: #000000; text-decoration:none;}
A.nav:visited 	{color: #000000; text-decoration:none;}
A.nav:hover 	{color: #000000; text-decoration:underline;}
A.nav:active 	{color: #000000; text-decoration:underline;}
td.nav  		{color: #ffffff; font-weight: bold;}
tr.main 		{background-color: #000099;}

/* Title Bar */
td.ysmall		{color: #000000; background-color:#6789BA; font-weight: bold;}

/* Lines Links */
td.blueline 	{background-color: #000000;}
td.whiteline	{background-color: #ffffff;}
td.blackline 	{background-color: #000000;}

/* Text Styles */
.smallbold		{color: #000000; font-weight: bold;}
.smallboldgrey	{color: #000000; font-weight: bold;}
.smallboldwhite	{color: #ffffff; font-weight: bold;}
.small			{color: #000000;}
.smallwhite		{color: #ffffff;}
.smallgrey		{color: #777777;}

/* Global Settings */
A 				{color: #000000; text-decoration:none;}
A:visited 		{color: #000000; text-decoration:none;}
A:hover 		{color: #000000; text-decoration:underline overline;}
A:active 		{color: #000000; text-decoration:none;}

A.links 		{color: #000000; text-decoration:none;}
A.links:visited {color: #000000; text-decoration:none;}
A.links:hover 	{color: #000000; text-decoration:underline;}
A.links:active 	{color: #000000; text-decoration:underline;}

A.white			{color: #ffffff; text-decoration:underline;}
A.white:visited	{color: #ffffff; text-decoration:underline;}
A.white:hover 	{color: #ffffff; text-decoration:underline;}
A.white:active	{color: #ffffff; text-decoration:underline;}

/* Homepage Specific */
A.title			{color: #ffffff; text-decoration:none;}
A.title:visited {color: #ffffff; text-decoration:none;}
A.title:hover 	{color: #ffffff; text-decoration:underline;}
A.title:active 	{color: #ffffff; text-decoration:underline;}
td.dates		{color: #ffffff; background-color: #ffffff;}
td.title		{color: #ffffff; background-color: #000000; font-weight: bold;}
td.titlewhite	{color: #ffffff; background-color: #ffffff; font-weight: bold;}

/* Arcade Specific */
td.arcadeback	{background-color: #FFD400;}

/* FLASHtyper Specific */
table.typerback  	{background-color: #6789BA;}
table.typerback2  	{background-color: #6789BA;}
td.typerinner		{color: #000000; background-color: #ffffff; padding:4px;}
td.typerfeature 	{color: #000000; background-color: #ffffff;}
td.typerinnergrey 	{color: #000000; background-color: #dddddd; padding:4px;}

/* Loops Specific */
table.loopleft  	{background-color: #6789BA;}
table.loopright  	{background-color: #6789BA;}
td.loopleftinner	{color: #000000; background-color: #6789BA;}
td.looprightinner	{color: #000000; background-color: #ffffff; padding:4px;}

/* movies Specific */
.version4			{color: #000000; font-weight: bold;}
.version5			{color: #ff0000; font-weight: bold;}

/* email Specific */
A.email				{color: #ffffff; text-decoration:underline;}
A.email:visited	 	{color: #ffffff; text-decoration:underline;}
A.email:hover 		{color: #ffc400; text-decoration:underline;}
A.email:active		{color: #ffc400; text-decoration:underline;}

/* Poll Specific */
.pollTable 			{font-family: Verdana, Arial, Helvetica, sans-serif; font-size: 13px; padding:0px; font-size: 13px;}
.pollTitle 			{color: #ffffff; background-color: #3184BD; font-weight: bold; padding:2px; font-size: 13px;}
.pollItem			{color: #000000; background-color: #ffdb5a; padding:2px; font-size: 13px;}
.pollOption 		{background-color:#ffc400; vertical-align:middle; text-align:left;  font-size: 13px;}
.pollSummary 		{color:#000000; background-color:#ffffff; padding:2px; vertical-align:middle; text-align:center; font-size: 13px;}
.pollImage 			{text-align:left; background-color:#ffc400; padding:2px; vertical-align:middle;  font-size: 13px;}
.pollPercent 		{color: #000000; background-color: #ffdb5a; padding:2px; text-align:right; font-size: 13px;}
.pollVotes 			{color: #000000; background-color: #ffc400; padding:2px; font-size: 13px;}
.maxReachedTable   	{font-family: Verdana, Arial, Helvetica, sans-serif; font-size: 13px; font-size: 13px;}
.maxReachedMessage 	{ text-align:center; color:#000000; background-color:#D2D8D6; padding:2px; text-align:left; font-size: 13px;}

/* Announcement Specific */
A.announce 			{color: #000000; text-decoration:underline;}
A.announce:visited 	{color: #000000; text-decoration:underline;}
A.announce:hover 	{color: #ffc400; text-decoration:underline;}

/* Tutorial Specific */
td.tuteclass		{color: #ffffff; background-color: #ff8300; font-size: 14px; font-weight: bold;}
td.tutelevel		{color: #ff8000; font-size: 14px; font-weight: bold;}
td.tuteheader		{color: #000000; font-size: 18px; font-weight: bold;}
div.notes 			{background: #eeeeee; font-size: 12px; margin-left: 40px; margin-right: 40px; padding: 10px; border-color: #000000;}
div.code 			{color: #3366CC; font-size: 12px; margin-left: 40px; margin-right: 40px; padding: 10px;}

/*Links Engine settings*/
.smalltext 			{font-size: 10px; }
.descript			{color: #333333; font-size: 13px;}
td.home 			{font-size: 10px;}
td.nav				{color: #0089cd; font-size: 10px; font-weight: bold;}
div.next 			{background-color:#ffdb5a; font-size: 13px; padding: 2; border-width : 1 1 1 1; border-style : solid;}
ul 					{margin-left: 40px; font-size: 12px; list-style: disc;}
sup.new 			{color: #FF0000; font-size: 12px;}
sup.pop 			{background: #ffc400; font-size: 12px;}
small.date 			{color: #666666; font-size: 10px;}
small.numlinks 		{color: #666666; font-size: 10px;}
strong.search 		{font-size: 14px; font-weight: bold;}
small.more 			{font-size: 10px;}
strong.error 		{color: #ff0000; font-weight: bold;}
strong.title 		{font-size: 13px; font-weight: bold;}
td.catlist 			{font-size: 12px;}
pre 				{color: #3366CC; margin-left: 40px; margin-right: 40px; padding: 10px; font-size: 12px;}
.code 				{color: #3366CC; font-size: 12px;}
small.update 		{color: #999999; font-size: 10px; font-weight: bold;}

/* Fonts Specific */
td.myfk 			{background: #FFF599; font-size: 10px;}
ul.font 			{margin-left: 10px; font-size: 10px; font-weight: bold;}
-->
FONT, TD, BODY, P, DIV, INPUT, TEXTAREA, FORM 
{font-family: Verdana,Arial; 
font: normal 11px;}


</style>
</head>
<?
echo "<body background=themes/fusion-radio/images/back_neu2.gif marginwidth=0 marginheight=0 topmargin=0 leftmargin=0>
<a name=#top></a><div align=center>
  <center>
<table border=0 background=themes/fusion-radio/images/back_neu2.gif cellspacing=0 cellpadding=0 width=100%>
  <tr> 
    <td>
<div align=center>
  <center><table border=0 background=themes/fusion-radio/images/back_neu2.gif cellspacing=0 cellpadding=0 width=780>
  <tr> 
    <td width=10><img src=themes/fusion-radio/images/space.gif width=10 height=20></td>
    <td width=512 valign=top><br><br>
</td>
    <td  valign=top width=258> 
      <div align=center>
  <center><table border=0 cellspacing=0 cellpadding=0 width=100%>
         <tr> 
    <td>
<div align=center>
  <center><table border=0 background=themes/fusion-radio/images/bg_header.gif cellspacing=0 cellpadding=0 width=780>
  <tr> 
    <td width=10><img src=themes/fusion-radio/images/space.gif width=10 height=20></td>
    <td width=512 valign=top><br><br>
<table border=\"0\" cellpadding=\"0\" cellspacing=\"0\">
  <tr>
    <td>&nbsp;</td>
    <td>&nbsp;</td>
    <td>&nbsp;</td>
    <td>&nbsp;</td>
  </tr>
  <tr>
    <td>&nbsp;</td>
    <td>&nbsp;</td>
    <td>&nbsp;</td>
    <td>&nbsp;</td>
    <td>&nbsp;</td>
  </tr>
  <tr>
    <td>&nbsp;</td>
    <td>&nbsp;</td>
    <td>&nbsp;</td>
    <td>&nbsp;</td>
    <td>&nbsp;</td>
    <td>&nbsp;</td>
  </tr>
</table>
</td>
    <td  valign=top width=258> 
      <div align=center>
  <center><table border=0 cellspacing=0 cellpadding=0 width=100%>
        <tr> 
          <td align=right></td>
        </tr>
        <tr> 

        </tr>
        <tr> 

        </tr>
      </table>
     <br>
      &nbsp;&nbsp;&nbsp;&nbsp;<br><br>
<center></td>
  </tr>
  <tr> 
    <td width=10><img src=themes/fusion-radio/images/space.gif width=10 height=28></td>
    <td width=512 valign=bottom> 
      <table border=0 cellspacing=0 cellpadding=0>
        <tr> 
          <td width=72 height=18><img src=themes/fusion-radio/images/space.gif height=15 width=0><</td>
          <td width=407 height=18><img src=themes/fusion-radio/images/space.gif width=4 height=20> 
	 
	 
	 </td>
        </tr>
      </table>
    </td>
  </tr>
  <tr> 
    <td width=10 height=22><img src=themes/fusion-radio/images/space.gif width=10 height=75></td>
    <td width=512 valign=top height=22></td>
  </tr>

</table>
<table width=100% border=0 cellspacing=0 cellpadding=0>
   <TR>
    <TD width=8></TD>
    <TD width=136 valign=top>
      ";
      
  blocks(left);
      

 
 

echo "</TD>
    <TD width=16>&nbsp;&nbsp;</TD>
    <TD valign=top>
<!-- Block Begins -->
      <br><center>
      
      
</center>
<!-- Block Ends -->";     







     
  

}

function themefooter() {
 


  global $index;
    if ($index == 1) {
echo "<td background=themes/fusion-radio/images/rightline.gif width=17 valign=top>&nbsp; </td>
    <td width=136 valign=top>";
 blocks(right);

   }

    echo" <TD width=8></TD>
  </TR>
</TABLE>
    </td>
  </tr>
</table>";

?>
<center><br><table border="0" width="100%" background=themes/fusion-radio/images/back_neu2.gif cellspacing="0">
          <tr>
            <td width="100%">
              <table border="0" width="100%" cellspacing="0" cellpadding="0" background="themes/fusion-radio/images/back_neu2.gif">
                <td align=middle height=17><table><tr>
<td> <center>
<table border=0 cellpadding=0 cellspacing=0 width=100%>
  <tr>
    <td><br>
      <p align=center><font size=1>
      </font>      </font>                  <center>

<?php 
global $banners;
    if ($banners) {
	include("banners.php");
    }
echo "<br>";
global $nukeurl, $slogan;
echo "<a href=$nukeurl>$slogan</a>" 
?>
</center>
      <? echo "<font size=2><b><font color=#000000></a>
      </font></b>
      </font>&nbsp;&nbsp;
      <div align=center>
        <center>
        <table border=0 cellpadding=0 cellspacing=0>
          <tr>
            <td><b>You are the&nbsp;</b></td>
            <td>";
             include("compteur-image.php");
             echo "</td>
            <td><b>&nbsp;Visitor</b></td>
          </tr>
        </table>
        </center>
      </div>
<p align=center>"; ?>

<!--insert your Counter-->

<?PHP echo "</p>"; footmsg(); echo "</td>
  </tr>
</table></center></table></td>
    </tr>
      </table>
</td>
     </tr> 
  </table><br></center>
";

}

function themeindex ($aid, $informant, $datetime, $title, $counter, $topic, $thetext, $notes, $morelink, $topicname, $topicimage, $topictext) {
        global $tipath, $anonymous;
        ?>
        <TABLE width="100%" border="0" cellspacing="0" cellpadding="0" align="center">
        <TR>
          <TD height="8" width="8" background="themes/fusion-radio/images/table/top-left.gif"></TD>
          <TD background="themes/fusion-radio/images/table/top-center.gif" height="8"></TD>
          <TD width="8" height="8" background="themes/fusion-radio/images/table/top-right.gif"></TD>
        </TR>
        <TR>
          <TD background="themes/fusion-radio/images/table/middle-left.gif" width="8" height="16"></TD>
          <TD background="themes/fusion-radio/images/table/middle-center2.gif" height="16">
            &nbsp;&nbsp;&nbsp;&nbsp;<B><?php echo "$title"; ?></B></TD>
          <TD width="8" background="themes/fusion-radio/images/table/middle-right.gif" height="16"></TD>
        </TR>
        <TR>
          <TD background="themes/fusion-radio/images/table/tab-left.gif" width="8"></TD>
          <TD background="themes/fusion-radio/images/table/tab-center.gif" class=posted>
           <?php echo _POSTEDBY; ?> <?php formatAidHeader($aid); ?> <?php echo _ON." $datetime $timezone "."($counter "._READS.")"; ?>
          </TD>
                    <TD width="8" background="themes/fusion-radio/images/table/tab-right.gif"></TD>
        </TR>
        <TR>
          <TD background="themes/fusion-radio/images/table/tab-left.gif" width="8"></TD>
          <TD background="themes/fusion-radio/images/table/tab-center.gif">
            <a href="search.php?query=&topic=<?php echo"$topic"; ?>&author="><img src=<?php echo "$tipath$topicimage"; ?> border=0 Alt=<?php echo"\"$topictext\""; ?> align=right hspace=10 vspace=10></a>
            <?php FormatStory($thetext, $notes, $aid, $informant); ?>
            &nbsp;<BR>
          </TD>
          <TD width="8" background="themes/fusion-radio/images/table/tab-right.gif"></TD>
        </TR>
        <TR>
          <TD background="themes/fusion-radio/images/table/middle-left.gif" width="8" height="16"></TD>
          <TD background="themes/fusion-radio/images/table/middle-center3.gif" height="16" class=title nowrap>
            <img src="themes/NiTrOgEn/images/menu.gif" border=0>
            <?php echo "$morelink"; ?>
          </TD>
                    <TD width="8" background="themes/fusion-radio/images/table/middle-right.gif" height="16"></TD>
        </TR>
        <TR>
          <TD background="themes/fusion-radio/images/table/bottom-left.gif" width="8" height="8"></TD>
          <TD background="themes/fusion-radio/images/table/bottom-center.gif" height="8"></TD>
          <TD width="8" background="themes/fusion-radio/images/table/bottom-right.gif" height="8"></TD>
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
          <TD height="8" width="8" background="themes/fusion-radio/images/table/top-left.gif"></TD>
          <TD background="themes/fusion-radio/images/table/top-center.gif" height="8"></TD>
          <TD width="8" height="8" background="themes/fusion-radio/images/table/top-right.gif"></TD>
        </TR>
        <TR>
          <TD background="themes/fusion-radio/images/table/middle-left.gif" width="8" height="16"></TD>
          <TD background="themes/fusion-radio/images/table/middle-center2.gif" height="16" >
            &nbsp;&nbsp;&nbsp;&nbsp;<B><?php echo "$title"; ?></B></TD>
          <TD width="8" background="themes/fusion-radio/images/table/middle-right.gif" height="16"></TD>
        </TR>
        <TR>
          <TD background="themes/fusion-radio/images/table/tab-left.gif" width="8"></TD>
          <TD background="themes/fusion-radio/images/table/tab-center.gif" class=posted>
            <?php echo _POSTEDON." $datetime "._BY; ?> <?php formatAidHeader($aid); ?>
            <?php if ($admin) {
                    echo "&nbsp;&nbsp;[ <a href=admin.php?op=EditStory&sid=$sid>"._EDIT."</a> | <a href=admin.php?op=RemoveStory&sid=$sid>"._DELETE."</a> ]";
                      } ?>
            <BR>
            <?php echo _CONTRIBUTEDBY." "."<a href=\"user.php?op=userinfo&uname=$informant\">$informant</a>"; ?>
          </TD>
          <TD width="8" background="themes/fusion-radio/images/table/tab-right.gif"></TD>
        </TR>
        <TR>
          <TD background="themes/fusion-radio/images/table/tab-left.gif" width="8"></TD>
          <TD background="themes/fusion-radio/images/table/tab-center.gif">
            <a href="search.php?query=&topic=<?php echo"$topic"; ?>&author="><img src=<?php echo "$tipath$topicimage"; ?> border=0 Alt=<?php echo"\"$topictext\""; ?> align=right hspace=10 vspace=10></a>
            <?php FormatStory($thetext, $notes, $aid, $informant); ?>
            <BR><BR>
          </TD>
          <TD width="8" background="themes/fusion-radio/images/table/tab-right.gif"></TD>
        </TR>
        <TR>
          <TD background="themes/fusion-radio/images/table/bottom-left.gif" width="8" height="8"></TD>
          <TD background="themes/fusion-radio/images/table/bottom-center.gif" height="8"></TD>
          <TD width="8" background="themes/fusion-radio/images/table/bottom-right.gif" height="8"></TD>
        </TR>
        <TR>
          <TD height="8"></TD>
        </TR>
      </TABLE>
                <b><font color="#ffffff"> </font></b><?php
}

function themesidebox($title, $content) {
?> 
                <TABLE width="146" border="0" cellspacing="0" cellpadding="0">
                  <TR> 
                    <TD height="8" width="8" background="themes/fusion-radio/images/table/top-left.gif"></TD>
                    <TD background="themes/fusion-radio/images/table/top-center.gif" height="8" width="130"></TD>
                    <TD width="8" height="8" background="themes/fusion-radio/images/table/top-right.gif"></TD>
                  </TR>
                  <TR> 
                    <TD background="themes/fusion-radio/images/table/middle-left.gif" width="8" height="16"><font color="#FFFFFF"></font></TD>
                    <TD background="themes/fusion-radio/images/table/middle-center.gif" height="16" width="130" ><font color="#FFFFFF">&nbsp;<b> 
                      <?php echo"$title"; ?></b></font></TD>
                    <TD width="8" background="themes/fusion-radio/images/table/middle-right.gif" height="16"><font color="#FFFFFF"></font></TD>
                  </TR>
                  <TR> 
                    <TD background="themes/fusion-radio/images/table/tab-left.gif" width="8"></TD>
                    <TD background="themes/fusion-radio/images/table/tab-center.gif" width="130"><?php echo"$content"; ?></TD>
                    <TD width="8" background="themes/fusion-radio/images/table/tab-right.gif"></TD>
                  </TR>
                  <TR> 
                    <TD background="themes/fusion-radio/images/table/bottom-left.gif" width="8" height="8"></TD>
                    <TD background="themes/fusion-radio/images/table/bottom-center.gif" height="8" width="130"></TD>
                    <TD width="8" background="themes/fusion-radio/images/table/bottom-right.gif" height="8"></TD>
                  </TR>
                  <TR> 
                    <TD height="8"></TD>
                  </TR>
                </TABLE>

                <?php
}

?>
            