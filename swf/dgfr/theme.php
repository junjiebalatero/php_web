<?php

/************************************************************/
/* DGFR THEMATIC V5 - Postnuke v0.6 release                 */
/*                                                          */
/************************************************************/

/************************************************************/
/* Theme Colors Definition                                  */
/*                                                          */
/* Define colors for your web site. $bgcolor2 is generaly   */
/* used for the tables border as you can see on OpenTable() */
/* function, $bgcolor1 is for the table background and the  */
/* other two bgcolor variables follows the same criteria.   */
/* $texcolor1 and 2 are for tables internal texts           */
/************************************************************/
include ("themes/dgfr/morefunc.php");
# uncomment if not using  headcss.php
# echo "<link rel=stylesheet href=themes/dgfr/style/style.css>";
$thename = "DGFR Thematic v5";
$themeroot= "themes/dgfr/";
$themedouble=1;
$bgcolor1 = "#7777AA";
$bgcolor2 = "#9E9ECA";
$bgcolor3 = "#9E9ECA";
$bgcolor4 = "#ADAFDB";
$bgcolor5 = "#444477";
$bgcolor6 = "#7B7BA8";
$textcolor1 = "#222244";
$textcolor2 = "#EEEEFF";
$textcolor3 = "#333355";
$textcolor4 = "#9E9ECA";

$site_font="Tahoma, Verdana, Arial, Helvetica, sans-serif";

/************************************************************/
/* OpenTable Functions                                      */
/*                                                          */
/* Define the tables look&feel for you whole site. For this */
/* we have two options: OpenTable and OpenTable2 functions. */
/* Then we have CloseTable and CloseTable2 function to      */
/* properly close our tables. The difference is that        */
/* OpenTable has a 100% width and OpenTable2 has a width    */
/* according with the table content                         */
/************************************************************/

function OpenTable() {
    global $bgcolor1, $bgcolor2;
    echo "<table width=\"100%\" border=\"0\" cellspacing=\"1\" cellpadding=\"0\" bgcolor=\"$bgcolor2\"><tr><td>\n";
    echo "<table width=\"100%\" border=\"0\" cellspacing=\"1\" cellpadding=\"8\" bgcolor=\"$bgcolor1\"><tr><td>\n";
}

function CloseTable() {
    echo "</td></tr></table></td></tr></table>\n";
}

function OpenTable2() {
    global $bgcolor1, $bgcolor2;
    echo "<table border=\"0\" cellspacing=\"1\" cellpadding=\"0\" bgcolor=\"$bgcolor2\" align=\"center\"><tr><td>\n";
    echo "<table border=\"0\" cellspacing=\"1\" cellpadding=\"8\" bgcolor=\"$bgcolor1\"><tr><td>\n";
}

function CloseTable2() {
    echo "</td></tr></table></td></tr></table>\n";
}

/************************************************************/
/* FormatStory                                              */
/*                                                          */
/* Here we'll format the look of the stories in our site.   */
/* If you dig a little on the function you will notice that */
/* we set different stuff for anonymous, admin and users    */
/* when displaying the story.                               */
/************************************************************/

function FormatStory($thetext, $notes, $aid, $informant) {
    global $anonymous, $textcolor1;
    if ($notes != "") {
	$notes = "<br><br><b>"._NOTE."</b> <i>$notes</i>\n";
    } else {
	$notes = "";
    }
    if ("$aid" == "$informant") {
	echo "<font class=\"artext\">$thetext<br>$notes</font>\n";
    } else {
	if($informant != "") {
	    $boxstuff = "<a href=\"user.php?op=userinfo&amp;uname=$informant\">$informant</a> ";
	} else {
	    $boxstuff = "$anonymous ";
	}
	$boxstuff .= " : $thetext<br>$notes\n";
	echo "<font class=\"artext\">$boxstuff</font>\n";
    }
}

/************************************************************/
/* Function themeheader()                                   */
/*                                                          */
/* Control the header for your site. You need to define the */
/* BODY tag and in some part of the code call the blocks    */
/* function for left side with: blocks(left);               */
/************************************************************/

function themeheader() {
    global $user, $banners, $sitename, $slogan, $cookie, $prefix, $bgcolor2, $bgcolor1, $admin, $poll;
    cookiedecode($user);
    $username = $cookie[1];
    if ($username == "") {
        $username = "Anonymous";
    }
    # to filter netscape special spacer tag for good display of td background images
    $browser = getenv("HTTP_USER_AGENT");
    # Main single Header
    # change logo type with dgfrtransp.gif file use themes/dgfr/nuke/logotemplate.jpg to take original colors of theme
    echo "<body onload=\"affiche_heure()\" bgcolor=\"$bgcolor2\" link=\"#222244\" vlink=\"#222244\" alink=\"#555599\">\n"
	."\n<table cellspacing=\"2\" cellpadding=\"2\" width=\"100%\" border=\"0\" align=\"center\"><tbody>\n"
	."<tr><td><div align=\"left\"><a class=\"AL\" href=\"index.php\">\n"
	."<IMG src=\"themes/dgfr/images/logo/dgfrtransp.gif\" border=\"0\" name=\"top\" alt=\""._WELCOMETO." $sitename\"></a>\n"
	."</div></td><td><div align=\"left\">\n";
	 if ($banners) {
	    include("banners.php");
	   }
 	echo "</div></td></tr>\n"
	."</tbody></table>\n\n";

	echo "<TABLE cellSpacing=\"0\" cellPadding=\"0\" border=\"0\">\n<TBODY>\n<TR>\n"
	."<TD rowSpan=\"3\"><IMG alt=\"\" height=\"35\" src=\"themes/dgfr/images/navhead/navhead_l.gif\" width=\"23\"></TD>\n"
	."<TD height=\"8\" background=\"themes/dgfr/images/navhead/navhead_t.gif\" width=\"100%\">\n";
	if (ereg("Gecko", "$browser")) {echo "<spacer type=\"block\" width=\"100%\" height=\"8\">";}
	echo "</TD>\n"
	."<TD rowSpan=\"3\"><IMG alt=\"\" height=\"35\" src=\"themes/dgfr/images/navhead/navhead_r.gif\" width=\"23\"></TD>\n"
	."</TR>\n<TR>\n"
	."<TD bgcolor=\"#ADAFDB\" width=\"100%\" height=\"18\">"
	    ."<center><font class=\"artinfo\"><b>";
		echo "<BIG>·</BIG><a class=\"A1\" href=\"index.php\">:|Home|:</a><BIG>·</BIG>\n"
		."<BIG>·</BIG><a class=\"A1\" href=\"modules.php?op=modload&name=Web_Links&file=index\">:|Links|:</a><BIG>·</BIG>\n"
		."<BIG>·</BIG><a class=\"A1\" href=\"modules.php?op=modload&name=Downloads&file=index\">:|Downloads|:</a><BIG>·</BIG>\n"
		."<BIG>·</BIG><a class=\"A1\" href=\"modules.php?op=modload&name=Stats&file=index\">:|Stats|:</a><BIG>·</BIG>\n"
		."<BIG>·</BIG><a class=\"A1\" href=\"modules.php?op=modload&name=Top_List&file=index\">:|Top&nbsp;10|:</a><BIG>·</BIG>\n"
		."</b></font></center>"
	."</TD>\n"
	."</TR>\n<TR>\n"
	."<TD height=\"9\" background=\"themes/dgfr/images/navhead/navhead_b.gif\" width=\"100%\">\n";
	if (ereg("Gecko", "$browser")) {echo "<spacer type=\"block\" width=\"100%\" height=\"9\">";}
	echo "</TD>\n"
	."</TR>\n</TBODY>\n</TABLE>\n\n";
	if (is_admin($admin)) {
			  $res=mysql_query("select * from $prefix"._queue."");
			  $num = mysql_num_rows($res);
			  echo "<center><font class=\"artinfo\" size=\"-2\">";
			  echo "<a class=\"A1\"  href=\"admin.php?op=submissions\">Submit : $num</a>\n";
			  $res=mysql_query("select * from $prefix"._links_newlink."");
			  $num = mysql_num_rows($res);
			  echo "&nbsp;|&nbsp;<a class=\"A1\"  href=\"admin.php?op=links\">Weblinks : $num</a>\n";
			  echo "&nbsp;|&nbsp;<a class=\"A1\"  href=\"admin.php?op=downloads\">Download</a>\n";
			  echo "&nbsp;|&nbsp;<a class=\"A1\"  href=\"admin.php?op=BannersAdmin\">Banner</a>\n";
			  echo "&nbsp;|&nbsp;<a class=\"A1\"  href=\"admin.php?op=adminStory\">Add Article</a>\n";
			  echo "&nbsp;|&nbsp;<a class=\"A1\"  href=\"admin.php?op=Configure\">Prefs.</a>\n";
			  echo "&nbsp;|&nbsp;<a class=\"A1\"  href=\"admin.php\">Admin.</a>\n";
			  echo "&nbsp;|&nbsp;<a class=\"A1\"  href=\"admin.php?op=logout\">Log Out</a>\n";
			  echo "</font></center>";
		 } else {
		 echo "";
	 }
	 echo "<!-- start main -->\n\n"
	."<table width=\"99%\" cellpadding=\"0\" cellspacing=\"0\" border=\"0\" align=\"center\"><tr valign=\"top\">\n"
	."<td ><IMG alt=\"\" src=\"themes/dgfr/images/pixel.gif\" width=\"1\" height=\"5\" border=\"0\"></td></tr></table>\n"
	."<table width=\"99%\" cellpadding=\"0\" cellspacing=\"0\" border=\"0\" align=\"center\"><tr valign=\"top\">\n"
	."<td><IMG alt=\"\" src=\"themes/dgfr/images/pixel.gif\" width=\"5\" height=\"1\" border=\"0\"></td>\n"
	."<td width=\"150\" valign=\"top\">\n";
    blocks(left);
    echo "</td>\n\n<td><IMG alt=\"\" src=\"themes/dgfr/images/pixel.gif\" width=\"5\" height=\"1\" border=\"0\"></td>\n<td width=\"100%\">\n";

	# MAIN Center Block
	echo "<div align=\"center\"><img src=\"themes/dgfr/postnuke/logohead.jpg\" alt=\"\"></div>";
	echo "<table border=\"0\" cellspacing=\"0\" cellpadding=\"0\" width=\"98%\" align=\"center\">\n"
	."<tr>\n<td>&nbsp;&nbsp;</td>\n</tr>\n"
	."<tr valign=\"middle\" align=\"center\">\n<td><font class=\"artitle\">.:::";
	# display time (only IE) use disptimefr for french format
	disptime();
	# identify visitor
	identip();
	echo "&nbsp;:::.</font></td>\n</tr>\n<tr>\n"
	."<td background=\"themes/dgfr/images/line140x2.gif\" height=\"2\" width=\"100%\">";
	if (ereg("Gecko", "$browser")) {echo "<spacer type=\"block\" width=\"100%\" height=\"2\">";}
	echo "</td>\n"
	."</tr>\n</table>\n";
	# more msgs
	echo "<table border=\"0\" cellspacing=\"0\" cellpadding=\"2\" align=\"center\" width=\"95%\">\n"
	."<tr valign=\"top\">\n<td align=left>\n"
	."<br><font class=\"boxtitle\">"
	."<FORM action=\"search.php\" method=\"get\"><span class=\"artitle\">Search : </span><INPUT class=\"textbox\" size=\"10\" name=\"query\" maxlength=\"30\"></FORM>";
	echo "</font></td><td>\n";
	# display latest downloads
	recentdown();
	echo "</td><td>";
	# display latest posts from forums
	#recenttopics();
	echo "</td></tr>\n<tr>\n"
	."<td>&nbsp;</td>\n"
	."</tr>\n</table>\n\n";


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
    global $index, $banners, $admin;
    if ($index == 1) {
	echo "</td><td><IMG alt=\"\" src=\"themes/dgfr/images/pixel.gif\" width=\"5\" height=\"1\" border=\"0\"></td><td valign=\"top\" width=\"150\">\n";
	include ("themes/dgfr/topdown.php");
	blocks(right);
    }
    echo "</td><td><IMG alt=\"\" src=\"themes/dgfr/images/pixel.gif\" width=\"5\" height=\"1\" border=\"0\">\n"
	."</td></tr></table>\n";
 if ($admin) {
  online1();
 }
 echo"<br>\n<center>";
    $browser = getenv("HTTP_USER_AGENT");
    if (ereg("MSIE", "$browser")) {
    echo "You are using Microsoft Internet Explorer.<br>"
    ."Browser data : $browser"
    ."<br><a href=\"#top\">Back to top...</a><br>\n";
    }
    if (ereg("Gecko", "$browser")) {
	echo "You are using Netscape Navigator.<br>"
	."Browser data : $browser";
	}
	echo "</center>";
 # powered logo, if removed please include a link to my website on your website (or include it in mysqlfooter vars from admin prefs)
 echo "<center><a href=\"http://duns-ground.fr.st\"><IMG src=\"themes/dgfr/images/dgfrpow.gif\" border=\"0\" Alt=\"Enhanced Thematic Add-On for PHP-Nuke\" hspace=\"10\"></a></center>\n<br>\n";
 #include your audit marks here
 include ("themes/dgfr/marqueurs.php");
 marqueur();
 echo"\n<br>\n"
 ."<center>";
 # if you want to place banners at footer uncomment
 # if ($banners) {
 #   include("banners.php");
 #  }
 echo "</center>\n<br>\n<center>\n";
 footmsg();
 echo"\n</center>\n</td><td></td>\n</tr></table>\n\n";
?>
<SCRIPT language="javascript">
<!--
ap_showWaitMessage('waitDiv', 0);
//-->
</SCRIPT>
<?
}

/************************************************************/
/* Function themeindex()                                    */
/*                                                          */
/* This function format the stories on the Homepage         */
/************************************************************/
function themeindex ($aid, $informant, $time, $title, $counter, $topic, $thetext, $notes, $morelink, $topicname, $topicimage, $topictext) {
if (!$config_called) {if (!isset($config)) {if (!isset($config)) { include("config.php"); }}}
global $tipath, $anonymous;
$browser = getenv("HTTP_USER_AGENT");
# activate this to 1 for dgfr theme topic image use (not implemented yet)
$titletopic = 0;
# desactivate this if u want a pure unique title color (e.g. : low band width)
$cycletitle = 1;
if ($cycletitle == 1) {
   	mt_srand((double)microtime()*1000000);
    $rcolor = mt_rand(1, 4);
    if ($rcolor == 1) {
	$tpath = "themes/dgfr/images/artindex/9e9eca";
    } elseif ($rcolor == 2) {
	$tpath = "themes/dgfr/images/artindex/7f81bb";
    } elseif ($rcolor == 3) {
	$tpath = "themes/dgfr/images/artindex/adafdb";
    } elseif ($rcolor == 4) {
	$tpath = "themes/dgfr/images/artindex/bebfed";
    }
} else {
$tpath = "themes/dgfr/images/artindex";
}
echo "<TABLE CELLPADDING=\"0\" CELLSPACING=\"0\" BORDER=\"0\">\n<TR><td></td>\n"
."<!-- Head of each index articles -->\n"
."<TD><IMG alt=\"\" SRC=\"themes/dgfr/images/box2/space.gif\" WIDTH=\"100%\" HEIGHT=\"1\"></TD>"
."<td></td>\n</TR>\n<TR>\n"
."<TD ROWSPAN=\"3\"><IMG alt=\"\" SRC=\"$tpath/artbul3d.gif\" WIDTH=\"33\" HEIGHT=\"28\"></TD>\n"
."<TD background=\"$tpath/artheadtop.gif\" WIDTH=\"100%\" HEIGHT=\"4\">\n";
	if (ereg("Gecko", "$browser")) {echo "<spacer type=\"block\" width=\"100%\" height=\"4\">";}
	echo "</TD>\n";
if ($titletopic == 1) {
	echo "<TD ROWSPAN=\"3\">"
	."<IMG alt=\"\" SRC=\"themes/dgfr/images/ttitle/$topicimage\" WIDTH=\"138\" HEIGHT=\"28\">"
	."</TD>\n";
} else {
	echo "<TD ROWSPAN=\"3\">"
	."<IMG alt=\"\" SRC=\"$tpath/artheadrightNT.gif\" WIDTH=\"138\" HEIGHT=\"28\">"
   	."</TD>\n";
}
echo "</TR>\n<TR>\n"
."<TD background=\"$tpath/arthtitle.gif\" WIDTH=\"100%\" HEIGHT=\"20\" nowrap>\n"
."<font class=\"artitle\">$title</font>\n"
."<font class=artinfo>&nbsp;(x$counter)</font>\n"
."</TD></TR>\n<TR>\n"
."<TD background=\"$tpath/artheadbot.gif\" WIDTH=\"100%\" HEIGHT=\"4\">\n";
	if (ereg("Gecko", "$browser")) {echo "<spacer type=\"block\" width=\"100%\" height=\"4\">";}
	echo "</TD>\n"
."</TR>\n</TABLE>\n"
."<TABLE CELLPADDING=\"0\" CELLSPACING=\"0\" BORDER=\"0\" width=\"100%\">\n"
."<tr>\n<td background=\"$tpath/space.gif\" WIDTH=\"15\">&nbsp;</td>\n"
."<td><font class=\"artext\">";
if ($titletopic != 1) {
  echo "<a href=\"search.php?topic=$topic\"><IMG src=\"$tipath$topicimage\" Alt=\"$topictext\" border=\"0\" align=\"right\" vspace=\"4\" hspace=\"4\"></a>\n";
}
echo "&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;<font size=-2>"._POSTEDBY." ";
formatAidHeader($aid);
echo "&nbsp;"._ON." $time $timezone</font><br><br>\n";
FormatStory($thetext, $notes, $aid, $informant);
echo "</td><td background=\"$tpath/space.gif\" WIDTH=\"15\">&nbsp;</td>\n"
."</tr>\n<tr>\n<td background=\"$tpath/space.gif\" WIDTH=\"15\" HEIGHT=\"3\">&nbsp;</td>\n"
."<td><div align=\"right\"<font class=\"artinfo\">$morelink</font></div></td>\n"
."<td background=\"$tpath/space.gif\" WIDTH=\"15\" HEIGHT=\"3\">&nbsp;</td>\n"
."</tr>\n<TR>\n"
."<TD><IMG alt=\"\" SRC=\"themes/dgfr/images/box2/space.gif\" WIDTH=\"100%\" HEIGHT=\"12\"></TD>\n"
."</TR>\n</TABLE>\n";
}

/************************************************************/
/* Function themearticle()                                  */
/*                                                          */
/* This function format the stories on the story page, when */
/* you click on that "Read More..." link in the home        */
/************************************************************/

function themearticle($aid, $informant, $datetime, $title, $thetext, $topic, $topicname, $topicimage, $topictext) {
    global $admin, $sid, $tipath, $textcolor2;
    # activate this to 1 for dgfr theme topic image use
	# displaying the text and topic. If you're using default phpnuke topic images set titletopic to 0
	$titletopic = 0;
	?>
	<TABLE CELLPADDING="0" CELLSPACING="0" BORDER="0">
        <TR>
            <TD ROWSPAN="2"><IMG alt="" SRC="themes/dgfr/images/art/atopleft.gif" WIDTH="8" HEIGHT="51"></TD>
            <TD ROWSPAN="2"><IMG alt="" SRC="themes/dgfr/images/art/abul.gif" WIDTH="27" HEIGHT="51"></TD>
            <TD ROWSPAN="2"><IMG alt="" SRC="themes/dgfr/images/art/avertslice.gif" WIDTH="2" HEIGHT="51"></TD>
            <TD background="themes/dgfr/images/art/atitle.gif" WIDTH="100%" HEIGHT="25" valign=bottom>
			<font class="artitle">
			<?PHP
			echo "$title";
			if (is_admin($admin)) {
				echo "[ <a href=\"admin.php?op=EditStory&amp;sid=$sid\">"._EDIT."</a> | <a href=\"admin.php?op=RemoveStory&amp;sid=$sid\">"._DELETE."</a> ]\n";
    		}

			?>
			</font>
			</TD>
            <TD ROWSPAN="2" background="themes/dgfr/images/art/atopic.gif" WIDTH="91" HEIGHT="51">
			<?PHP
			if ($titletopic == 1) {
			 echo "<a href=search.php?topic=$topic><IMG src=$tipath$topicimage Alt=\"$topictext\" border=0 align=right></a>\n";
			}
			?>
			</TD>
            <TD ROWSPAN="2"><IMG alt="" SRC="themes/dgfr/images/art/atopright.gif" WIDTH="10" HEIGHT="51"></TD>
        </TR>
        <TR>
            <TD background="themes/dgfr/images/art/ainf.gif" WIDTH="100%" HEIGHT="26" valign=top><font class=artinfo>
			<?PHP #Displaying informant data
			echo "<font size=-2>"._POSTEDBY." ";
        	formatAidHeader($aid);
        	echo "&nbsp;"._ON." $datetime</font>\n";
        	if ($informant != "") {
           	  echo ""._BY." <a href=user.php?op=userinfo&uname=$informant>$informant</a>\n";
        	} else {
	       	  echo ""._BY." $anonymous</font>\n";
        	}
			# echo "&nbsp;|&nbsp; $counter()";
			?>
			</TD>
        </TR>

    </TABLE>
	<TABLE CELLPADDING="0" CELLSPACING="0" BORDER="0">
		<TR>
            <TD WIDTH="6" HEIGHT="100%" BORDER="0">&nbsp;</TD>
            <TD>
			<font class=\"artext\">
			<?PHP # displaying the text and topic. If you are using default phpnuke topic images set titletopic to 0

			if ($titletopic != 1) {
			echo "<a href=search.php?topic=$topic><IMG src=$tipath$topicimage Alt=\"$topictext\" border=0 align=right vspace=8 hspace=8></a>\n<br>";
			}

			FormatStory($thetext, $notes="", $aid, $informant);
			?>
			</font>
			</TD>
            <TD WIDTH="6" HEIGHT="100%" BORDER="0">&nbsp;</TD>
        </TR>
	</table>

	<?
}


/************************************************************/
/* Function themesidebox()                                  */
/*                                                          */
/* Control look of your blocks. Just simple.                */
/************************************************************/

function themesidebox($title, $content) {
$browser = getenv("HTTP_USER_AGENT");
echo"\n\n<!-- Crossed coded Sbox -->\n";
echo"<TABLE cellSpacing=0 cellPadding=0 border=0 width=\"148\">\n"
."<TBODY><TR><TD colSpan=2 rowSpan=2><IMG alt=\"\" height=\"23\" src=\"themes/dgfr/images/boxl/boxmenulight_bull.gif\" width=\"19\"></TD>\n"
."<TD background=\"themes/dgfr/images/boxl/boxmenulight_top.gif\" height=\"3\" width=\"120\">";
	if (ereg("Gecko", "$browser")) {echo "<spacer type=\"block\" width=\"120\" height=\"3\">";}
echo "</TD>\n"
."<TD rowSpan=2><IMG alt=\"\" height=\"23\" src=\"themes/dgfr/images/boxl/boxmenulight_r.gif\" width=\"9\"></TD></TR>\n"
."<TR><TD background=\"themes/dgfr/images/boxl/boxmenulight_title.gif\" height=\"20\" width=\"120\"><font class=boxtitle>$title</font></TD></TR>\n"
."<TR><TD background=\"themes/dgfr/images/boxl/boxmenulight_ml.gif\">";
	if (ereg("Gecko", "$browser")) {echo "<spacer type=\"block\" width=\"1\" height=\"100%\">";}
echo "</TD>\n"
."<TD colSpan=2 bgcolor=\"#ADAFDB\" valign=\"top\" width=\"130\"><font class=boxmain><br>";
# for nukeaddon 5.xx (and when you want to include block.php files
# exemple : path/yourblock.php  as content in admin creation block
# include path/yourblock.php as new block
if (file_exists($content)) {
	$fp = fopen ($content, "r");
	$content = fread($fp, filesize($content));
	fclose ($fp);
	$content = "?><font class=\"boxmain\">$content</font><?";
	echo eval($content);
} else {
	echo $content;
}
# end of modification for nukeaddon 5x
echo "<br></font></TD>\n"
."<TD background=\"themes/dgfr/images/boxl/boxmenulight_mr.gif\">";
	if (ereg("Gecko", "$browser")) {echo "<spacer type=\"block\" width=\"1\" height=\"100%\">";}
echo "</TD></TR>\n"
."<TR><TD colSpan=4><IMG alt=\"\" height=\"12\" src=\"themes/dgfr/images/boxl/boxmenulight_bot.gif\" width=\"148\"></TD></TR>\n"
."<TR><TD><IMG alt=\"\" height=\"1\" src=\"themes/dgfr/images/boxl/space.gif\" width=\"7\"></TD>\n"
."<TD><IMG alt=\"\" height=\"1\" src=\"themes/dgfr/images/boxl/space.gif\" width=\"12\"></TD>\n"
."<TD><IMG alt=\"\" height=\"1\" src=\"themes/dgfr/images/boxl/space.gif\" width=\"120\"></TD>\n"
."<TD><IMG alt=\"\" height=\"1\" src=\"themes/dgfr/images/boxl/space.gif\" width=\"9\"></TD></TR></TBODY></TABLE><br>\n\n";




}

/************************************************************/
/* added non-standard functions (Nuke addon compliant)      */
/************************************************************/
function themecenterposts($title, $content) {
    echo "<table width=\"100%\" border=\"0\" cellspacing=\"0\" cellpadding=\"0\">"
	."<tr>\n<td>"
    ."<b><font class=\"artitle\">$title</font></b></td>\n</tr>\n"
    ."<tr>\n<td>"
    ."<font class=\"boxmain\">\n";
    if (file_exists($content)) {
		$fp = fopen ($content, "r");
		$content = fread($fp, filesize($content));
		fclose ($fp);
		$content = "?><font class=\"boxmain\">$content</font><?";
		echo eval($content);
	} else {
		echo $content;
	}
	echo "\n</font>"
    ."</td>\n</tr>\n</table>\n<br>\n\n";
}

global $navnews;
if ($navnews) {
include ("theme/dgfr/themadv.php");
}

?>