<?php

/************************************************************/
/* Theme Colors Definition                                  */
/*                                                          */
/* Control the header for your site. You need to define the */
/* BODY tag and in some part of the code call the blocks    */
/* function for left side with: blocks(left);               */
/************************************************************/

$thename = "NukeTest";
$bgcolor1 = "#FFFFFF";
$bgcolor2 = "#fe9732";
$bgcolor3 = "#ffffff";
$bgcolor4 = "#fe9732";
$textcolor1 = "#ffffff";
$textcolor2 = "#ffffff";

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

function FormatStory($thetext, $notes, $aid, $informant) {
    global $anonymous;
    if ($notes != "") {
	$notes = "<br><b>"._NOTE."</b> $notes\n";
    } else {
	$notes = "";
    }
    if ("$aid" == "$informant") {
	echo "<font size=\"2\" color=\"#505050\">$thetext<br>$notes</font>\n";
    } else {
	if($informant != "") {
	    $boxstuff = "<a href=\"user.php?op=userinfo&amp;uname=$informant\">$informant</a> ";
	} else {
	    $boxstuff = "$anonymous ";
	}
	$boxstuff .= ""._WRITES." \"$thetext\" $notes\n";
	echo "<font size=\"2\" color=\"#505050\">$boxstuff</font>\n";
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
    global $user, $banners, $sitename, $slogan, $cookie;
    cookiedecode($user);
    $username = $cookie[1];
    if ($username == "") {
        $username = "Anonymous";
    }
    echo "<body bgcolor=\"#FFFFFF\" text=\"#000000\" link=\"#363636\" vlink=\"#363636\" alink=\"#d5ae83\" >\n";
	
    if ($banners) {
	include("banners.php");
    }
    echo  "<table cellpadding=\"0\" cellspacing=\"0\" width=\"99%\" border=\"0\" align=\"center\" bgcolor=\"#ffffff\">\n"
	."<tr>\n"
	."<td bgcolor=\"#ffffff\">\n"
	."<a href=\"index.php\"><img src=\"themes/NukeTest/images/logo.gif\" align=\"left\" alt=\""._WELCOMETO." $sitename\" border=\"0\"></a></td>\n"
	."<td bgcolor=\"#FFFFFF\" align=\"right\" valign=\"bottom\">\n"
	."<form action=\"links.php?op=search&amp;query=\" method=\"post\">"
	."<table cellpadding=\"0\" cellspacing=\"0\" border = \"0\"><tr><td align=\"right\">"
."<span  class=\"common_text_black\">"._SEARCH."&nbsp;"._LINKS."</span> \n"
	."&nbsp;&nbsp;<input type=\"text\" name=\"query\" size=\"20\" class=\"textfield\">&nbsp;&nbsp;\n"
."</td><td>\n"
."<input type=\"image\" border=\"0\" name=\"imageField\" src=\"themes/NukeTest/images/search.gif\" >"
."</td></tr><tr><td colspan=\"2\" align=\"right\">"	
."<a href=\"links.php?op=AddLink\" class=\"arial_hover_normal\">"._ADDLINK."</a><br>";
	$result=mysql_query("select * from nuke_links_links");
    $numrows = mysql_num_rows($result);
    $result=mysql_query("select * from nuke_links_categories");
    $catnum1 = mysql_num_rows($result);
    $result=mysql_query("select * from nuke_links_subcategories");
    $catnum2 = mysql_num_rows($result);
    $catnum = $catnum1+$catnum2;
    echo "<font size=\"2\">"._THEREARE." <b>$numrows</b> "._LINKS." "._AND." <b>$catnum</b> "._CATEGORIES." "._INDB."</font>";

echo "</td></tr></table>";
 echo "</form></td>\n"
	."</tr></table>\n";

echo "<table width=\"100%\" border=\"0\" cellspacing=\"0\" cellpadding=\"0\">\n"
  ."<tr>\n" 
   ." <td width=\"2%\" height=\"12\"><img src=\"../../images/pix.gif\" width=\"1\" height=\"1\"> \n"
    ."</td>\n"
    ."<td width=\"98%\" height=\"12\"><img src=\"../../images/pix.gif\" width=\"1\" height=\"1\"> \n"
    ."<table width=\"30%\" border=\"0\" cellspacing=\"0\" cellpadding=\"0\" height=\"12\">\n"
       ."<tr>\n" 
          ."<td width=\"23%\"><a href=\"index.php\"><img src=\"themes/NukeTest/images/home.gif\" width=\"44\" height=\"14\" border=\"0\"></a></td>\n"
          ."<td width=\"23%\"><a href=\"topics.php\"><img src=\"themes/NukeTest/images/topics.gif\" width=\"51\" height=\"14\" border=\"0\"></a></td>\n"
          ."<td width=\"16%\"><a href=\"search.php?query=&topic=10\"><img src=\"themes/NukeTest/images/php_nuke.gif\" width=\"68\" height=\"14\" border=\"0\"></a></td>\n"
          ."<td width=\"38%\"><a href=\"search.php?query=&topic=31\"><img src=\"themes/NukeTest/images/modules.gif\" width=\"58\" height=\"14\" border=\"0\"></a></td>\n"
          ."<td width=\"0%\"><a href=\"search.php?query=&topic=29\"><img src=\"themes/NukeTest/images//themes.gif\" width=\"58\" height=\"14\" border=\"0\"></a></td>\n"
          ."<td width=\"0%\"><a href=\"search.php?query=&topic=30\"><img src=\"themes/NukeTest/images/add_on.gif\" width=\"58\" height=\"14\" border=\"0\"></a></td>\n"
        ."</tr>\n"
      ."</table>\n"
    ."</td>\n"
  ."</tr>\n"
  ."<tr> \n"
    ."<td colspan=\"2\" height=\"13\">\n" 
      ."<table width=\"100%\" border=\"0\" cellspacing=\"0\" cellpadding=\"0\">\n"
        ."<tr> \n"
          ."<td width=\"1%\"><img src=\"themes/NukeTest/images/header_left.jpg\" width=\"14\" height=\"18\"></td>\n"
          ."<td width=\"98%\" background=\"themes/NukeTest/images/header_line.jpg\"> \n"
            ."<table width=\"100%\" border=\"0\" cellspacing=\"0\" cellpadding=\"0\">\n"
              ."<tr>\n"
                ."<td width=\"64%\" height=\"18\">\n"
                                ."<img src=\"themes/NukeTest/images/circle-w.gif\" width=\"8\" height=\"7\">&nbsp;<a href=\"submit.php\" class=\"arial_hover_underline\">"._SUBMITNEWS."</a>\n"
				."<img src=\"themes/NukeTest/images/circle-w.gif\" width=\"8\" height=\"7\">&nbsp;<a href=\"reviews.php\" class=\"arial_hover_underline\">"._REVIEWS."</a>\n"
				."<img src=\"themes/NukeTest/images/circle-w.gif\" width=\"8\" height=\"7\">&nbsp;<a href=\"download.php\" class=\"arial_hover_underline\">"._DOWNLOADS."</a>\n"
				."<img src=\"themes/NukeTest/images/circle-w.gif\" width=\"8\" height=\"7\">&nbsp;<a href=\"user.php\" class=\"arial_hover_underline\">";
	        if ($user) {echo ""._OPTIONS."";}
                      else {echo ""._LOGIN."";}
                            echo "</a>\n"
				."<img src=\"themes/NukeTest/images/circle-w.gif\" width=\"8\" height=\"7\">&nbsp;<a href=\"top.php\" class=\"arial_hover_underline\">"._TOP10."</a>\n"
				."<img src=\"themes/NukeTest/images/circle-w.gif\" width=\"8\" height=\"7\"></td>\n";
                				
				echo "<td width=\"19%\" height=\"18\" align=\"center\"><img src=\"themes/NukeTest/images/circle-w.gif\" width=\"8\" height=\"7\">\n";
				 if ($username == "Anonymous") {
	echo "<a href=\"user.php\" class=\"arial_hover_underline\">"._USERLOGIN."</a>\n";
    } else {
	echo "<span class=\"common_text_white\">"._HELLO." $username!</span>";
    }
		    echo "</td>\n";
                    echo "<td width=\"17%\" height=\"18\" align=\"right\"><img src=\"themes/NukeTest/images/circle-w.gif\" width=\"8\" height=\"7\"><span class=\"common_text_white\" >\n"
			."<script type=\"text/javascript\">\n\n"
        		."<!--   // Array ofmonth Names\n"
                        ."var monthNames = new Array( \""._JAN."\",\""._FEB."\",\""._MAR."\",\""._APR."\",\""._MAY."\",\""._JUN."\",\""._JUL."\",\""._AUG."\",\""._SEP."\",\""._OCT."\",\""._NOV."\",\""._DEC."\");\n"
        		."var now = new Date();\n"
       		 	."thisYear = now.getYear();\n"
      			."if(thisYear < 1900) {thisYear += 1900}; // corrections if Y2K display problem\n"
      			."document.write(monthNames[now.getMonth()] + \" \" + now.getDate() + \", \" + thisYear);\n"
      			."// -->\n\n"
      			."</script>\n";
	
		echo "</span></td>\n"
              ."</tr>\n"
            ."</table>\n"
          ."</td>\n"
          ."<td width=\"1%\"><img src=\"themes/NukeTest/images/header_right.jpg\" width=\"11\" height=\"18\"></td>\n"
        ."</tr>\n"
      ."</table>\n"
    ."</td>\n"
  ."</tr>\n"
."</table>\n";


	echo "<!-- FIN DEL TITULO -->\n"
	."<table width=\"99%\" cellpadding=\"0\" cellspacing=\"0\" border=\"0\" bgcolor=\"#ffffff\" align=\"center\" height=\"5\"><TR></TD></td><img src=\"themes/NukeTest/images/pixel.gif\" width=\"10\" height=\"1\" border=\"0\" alt=\"\"></tr></table>\n"
	."<table width=\"99%\" cellpadding=\"0\" cellspacing=\"0\" border=\"0\" bgcolor=\"#ffffff\" align=\"center\"><tr valign=\"top\">\n"
	."<td bgcolor=\"#ffffff\"><img src=\"themes/NukeTest/images/pixel.gif\" width=\"10\" height=\"1\" border=\"0\" alt=\"\"></td>\n"
	."<td bgcolor=\"#FFFFFF\" width=\"150\" valign=\"top\">\n";
    blocks(left);
    echo "</td><td><img src=\"themes/NukeTest/images/pixel.gif\" width=\"15\" height=\"1\" border=\"0\" alt=\"\"></td><td width=\"100%\">\n";
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
    if ($index == 1) {
	echo "</td><td><img src=\"themes/NukeNews/images/pixel.gif\" width=\"15\" height=\"1\" border=\"0\" alt=\"\"></td><td valign=\"top\" width=\"150\">\n";
	blocks(right);
    }
    echo "</td><td bgcolor=\"#ffffff\"><img src=\"themes/NukeNews/images/pixel.gif\" width=10 height=1 border=0 alt=\"\">\n"
	."</td></tr></table>\n"
             ."<br>"
        ."<table width=\"99%\" cellpadding=\"0\" cellspacing=\"0\" border=\"0\" bgcolor=\"#ffffff\" align=\"center\">\n"
         ."<tr align=\"center\">\n"
        ."<td width=\"100%\" colspan=\"3\">\n";
    footmsg();
    echo "</td>\n"
        ."</tr>\n"
        ."</table>\n";
}

/************************************************************/
/* Function themeheader()                                   */
/*                                                          */
/* Control the header for your site. You need to define the */
/* BODY tag and in some part of the code call the blocks    */
/* function for left side with: blocks(left);               */
/************************************************************/


function themeindex ($aid, $informant, $time, $title, $counter, $topic, $thetext, $notes, $morelink, $topicname, $topicimage, $topictext) {
    global $anonymous, $tipath;     
     	echo "<table border=\"0\" width=\"100%\" cellpadding=\"0\" cellspacing=\"1\" bgcolor=\"#FFFFFF\"><tr><td>\n"
	."<table width=\"100%\" border=\"0\" cellspacing=\"1\" cellpadding=\"1\" bgcolor=\"#ffffff\">\n"
	."<tr><td align=\"left\">\n"
	."<font color=\"#999999\" size=\"1\">"._POSTEDBY." ";
   	 formatAidHeader($aid);
    	echo " "._ON." $time $timezone ($counter "._READS.")<br></font>\n"
	."</td></tr>\n"
	."<tr><td bgcolor=\"#ffffff\" align=left>\n"
	."<div class=\"common_text_blue\">".$title."&nbsp;</div>\n"
	."</td></tr></table>\n"
	."</td></tr><tr><td bgcolor=\"#FFFFFF\"><table width=\"98%\" align=center cellpadding=\"3\"><tr>\n"
."<td width=\"100\" align=\"left\" valign=\"top\"><a href=\"search.php?query=&amp;topic=$topic\"><img src=\"$tipath$topicimage\" border=\"0\" Alt=\"$topictext\" align=\"right\" hspace=\"10\" vspace=\"10\"></a></td>\n"
."<td>\n";
    FormatStory($thetext, $notes, $aid, $informant);
	echo "<div align=\"right\"><font size=\"2\">$morelink</font></div>\n";
 	echo "</td></tr></table></td></td></table>\n"
	."<br>\n\n\n"; 
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
        ."<table border=\"0\" cellpadding=\"3\" cellspacing=\"0\" bgcolor=\"#ffc875\" width=\"100%\"><tr><td align=\"left\">\n"
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
/* Function themeheader()                                   */
/*                                                          */
/* Control the header for your site. You need to define the */
/* BODY tag and in some part of the code call the blocks    */
/* function for left side with: blocks(left);               */
/************************************************************/

function themesidebox($title, $content) {
    echo "<table border=\"0\" cellpadding=\"0\" cellspacing=\"1\" bgcolor=\"#0F63AB\" width=\"150\"><tr><td>\n"
	."<table border=\"0\" cellpadding=\"1\" cellspacing=\"1\" bgcolor=\"#ffffff\" width=\"100%\"><tr><td align=center bgcolor=\"#0F63AB\">\n"
	."<div class=\"common_text_white\"> ".$title." </div>\n"
	."</td></tr></table></td></tr>\n"
	."<tr valign=\"top\"><td bgcolor=\"#FFC875\">\n"
	."<table border=\"0\" cellpadding=\"0\" cellspacing=\"0\" width=\"95%\" align=\"right\"><tr><td>$content</td></tr></table>\n"
	."</td></tr></table>\n"
	."<br>\n\n\n";
}

?>