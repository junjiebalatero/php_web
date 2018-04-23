<?php

/************************************************************/
/* IMPORTANT NOTE FOR THEMES DEVELOPERS!                    */
/*                                                          */
/* When you start coding your theme, if you want to         */
/* distribute it, please double check it to fit the HTML    */
/* 4.01 Transitional Standard. You can use the W3 validator */
/* located at http://validator.w3.org                       */
/* If you don't know where to start with your theme, just   */
/* start modifying this theme, it's validate and is cool ;) */
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

$bgcolor1 = "#000000";
$bgcolor2 = "#000000";
$bgcolor3 = "#000000";
$bgcolor4 = "#000000";
$textcolor1 = "#000000";
$textcolor2 = "#000000";

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
    global $anonymous;
    if ($notes != "") {
	$notes = "<br><br><b>"._NOTE."</b> <i>$notes</i>\n";
    } else {
	$notes = "";
    }
    if ("$aid" == "$informant") {
	echo "<font size=\"2\" color=\"#505050\">$thetext$notes</font>\n";
    } else {
	if($informant != "") {
	    $boxstuff = "<a href=\"user.php?op=userinfo&amp;uname=$informant\">$informant</a> ";
	} else {
	    $boxstuff = "$anonymous ";
	}
	$boxstuff .= ""._WRITES." \"$thetext\"$notes\n";
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
    global $user, $banners, $sitename, $slogan, $cookie, $prefix;
    cookiedecode($user);
    $username = $cookie[1];
    if ($username == "") {
        $username = "Anonymous";
    }
echo "<script language=\"JavaScript\">\n"
	."<!--\n"
	."function MM_openBrWindow(theURL,winName,features) { //v2.0 \n"
  ."window.open(theURL,winName,features); \n"
	."}"
."//-->"
."</script>";

    echo "<body bgcolor=\"#000000\" text=\"#000000\" link=\"#363636\" vlink=\"#363636\" alink=\"#d5ae83\" leftmargin=\"1\" topmargin=\"1\">\n";
	
    if ($banners) {
	include("banners.php");
    }
  include ("themes/WebDesignHQ2/topheader.php");

echo "<table cellpadding=\"0\" cellspacing=\"0\" width=\"100%\" border=\"0\" align=\"center\"><tr><td align=\"center\">"
         ."<OBJECT classid=\"clsid:D27CDB6E-AE6D-11cf-96B8-444553540000\"
 codebase=\"http://download.macromedia.com/pub/shockwave/cabs/flash/swflash.cab#version=5,0,0,0\"
 WIDTH=100% HEIGHT=75>
 <PARAM NAME=movie VALUE=\"themes/WebDesignHQ2/sitename.swf?text=$sitename\"> 
 <PARAM NAME=quality VALUE=high>
 <PARAM NAME=bgcolor VALUE=#000000>
 <PARAM NAME=menu VALUE=false>
 <EMBED src=\"themes/WebDesignHQ2/sitename.swf?text=$sitename\" quality=high bgcolor=#000000  WIDTH=100% HEIGHT=75 TYPE=\"application/x-shockwave-flash\" PLUGINSPAGE=\"http://www.macromedia.com/shockwave/download/index.cgi?P1_Prod_Version=ShockwaveFlash\" menu=\"false\"></EMBED>
</OBJECT><br>
<OBJECT classid=\"clsid:D27CDB6E-AE6D-11cf-96B8-444553540000\"
 codebase=\"http://download.macromedia.com/pub/shockwave/cabs/flash/swflash.cab#version=5,0,0,0\"
 WIDTH=100% HEIGHT=40>
 <PARAM NAME=movie VALUE=\"themes/WebDesignHQ2/slogan.swf?text=$slogan\"> 
 <PARAM NAME=quality VALUE=high>
 <PARAM NAME=bgcolor VALUE=#000000>
 <PARAM NAME=menu VALUE=false>
 <EMBED src=\"themes/WebDesignHQ2/slogan.swf?text=$slogan\" quality=high bgcolor=#000000  WIDTH=100% HEIGHT=40 TYPE=\"application/x-shockwave-flash\" PLUGINSPAGE=\"http://www.macromedia.com/shockwave/download/index.cgi?P1_Prod_Version=ShockwaveFlash\" menu=\"false\"></EMBED>
</OBJECT></td></tr></table>";
echo "<table width=\"100%\" border=\"0\" cellspacing=\"0\" cellpadding=\"0\">"
  ."<tr>"
    ."<td width=\"2%\"><img src=\"themes/WebDesignHQ2/images/left_title.jpg\" width=\"30\" height=\"7\"></td>"
    ."<td width=\"95%\" background=\"themes/WebDesignHQ2/images/line_title.jpg\"><img src=\"themes/WebDesignHQ2/images/pixel.gif\" width=\"1\" height=\"1\"></td>"
    ."<td width=\"3%\"><img src=\"themes/WebDesignHQ2/images/right_title.jpg\" width=\"31\" height=\"7\"></td>"
  ."</tr>"
."</table>";

  

	  
	echo "<!-- FIN DEL TITULO -->\n"
	."<table width=\"100%\" cellpadding=\"0\" cellspacing=\"0\" border=\"0\" bgcolor=\"#000000\" align=\"center\"><tr valign=\"top\">\n"
	."<td bgcolor=\"#000000\"><img src=\"themes/WebDesignHQ2/images/pixel.gif\" width=\"1\" height=\"20\" border=\"0\" alt=\"\"></td></tr></table>\n"
	."<table width=\"100%\" cellpadding=\"0\" cellspacing=\"0\" border=\"0\" bgcolor=\"#000000\" align=\"center\"><tr valign=\"top\">\n"
	."<td bgcolor=\"#000000\"><img src=\"themes/WebDesignHQ2/images/pixel.gif\" width=\"5\" height=\"1\" border=\"0\" alt=\"\"></td>\n"
	."<td bgcolor=\"#000000\" width=\"150\" valign=\"top\">\n";
    blocks(left);
    echo "</td><td><img src=\"themes/WebDesignHQ2/images/pixel.gif\" width=\"10\" height=\"1\" border=\"0\" alt=\"\"></td><td width=\"100%\">\n";
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
	echo "</td><td><img src=\"themes/WebDesignHQ2/images/pixel.gif\" width=\"10\" height=\"1\" border=\"0\" alt=\"\"></td><td valign=\"top\" width=\"150\">\n";
	blocks(right);
    }
    echo "</td><td bgcolor=\"#000000\"><img src=\"themes/WebDesignHQ2/images/pixel.gif\" width=5 height=1 border=0 alt=\"\">\n"
	."</td></tr></table>\n";
        
     include ("themes/WebDesignHQ2/footer.php");
     echo "<BR>";      
        echo "<table width=\"99%\" cellpadding=\"0\" cellspacing=\"0\" border=\"0\" bgcolor=\"#000000\" align=\"center\"><tr align=\"center\">\n"
        ."<td width=\"100%\">\n";
    footmsg();
    echo "</td>\n"
        ."</tr></table><BR>\n";
}

/************************************************************/
/* Function themeindex()                                    */
/*                                                          */
/* This function format the stories on the Homepage         */
/************************************************************/

function themeindex ($aid, $informant, $time, $title, $counter, $topic, $thetext, $notes, $morelink, $topicname, $topicimage, $topictext) {
    global $anonymous, $tipath;
    echo "<table border=\"0\" cellpadding=\"0\" cellspacing=\"0\" bgcolor=\"#000000\" width=\"100%\"><tr><td>\n"
	."<table border=\"0\" cellpadding=\"1\" cellspacing=\"0\" bgcolor=\"#000000\" width=\"100%\"><tr><td>\n"
	."<table border=\"0\" cellpadding=\"3\" cellspacing=\"0\" bgcolor=\"#000000\" width=\"100%\"><tr><td align=\"left\">\n"
	."<span class=\"title\">$title</span>\n"
	."</td></tr></table></td></tr>"
	."<tr><td>"
	."<table width=\"100%\" border=\"0\" cellspacing=\"0\" cellpadding=\"0\">"
  ."<tr>"
    ."<td width=\"2%\"><img src=\"themes/WebDesignHQ2/images/left_title.jpg\" width=\"30\" height=\"7\"></td>"
    ."<td width=\"95%\" background=\"themes/WebDesignHQ2/images/line_title.jpg\"><img src=\"themes/WebDesignHQ2/images/pixel.gif\" width=\"1\" height=\"1\"></td>"
    ."<td width=\"3%\"><img src=\"themes/WebDesignHQ2/images/right_title.jpg\" width=\"31\" height=\"7\"></td>"
  ."</tr>"
."</table>"
 	."</td></tr></table>\n"
	."<font color=\"#999999\"><b><a href=\"search.php?query=&amp;topic=$topic\"><img src=\"$tipath$topicimage\" border=\"0\" Alt=\"$topictext\" align=\"right\" hspace=\"10\" vspace=\"10\"></a></B></font>\n";
    FormatStory($thetext, $notes, $aid, $informant);
    echo "</td></tr></table>\n"
	."<table border=\"0\" cellpadding=\"1\" cellspacing=\"0\" bgcolor=\"#000000\" width=\"100%\"><tr><td>\n"
	."<table border=\"0\" cellpadding=\"3\" cellspacing=\"0\" bgcolor=\"#000000\" width=\"100%\"><tr><td align=\"center\">\n"
	."<font color=\"#999999\" size=\"1\">"._POSTEDBY." ";
    formatAidHeader($aid);
    echo " "._ON." $time $timezone ($counter "._READS.")<br></font>\n"
	."<font size=\"2\">$morelink</font>\n"
	."</td></tr></table></td></tr></table>\n"
	."<br><br>\n\n\n";
}

/************************************************************/
/* Function themeindex()                                    */
/*                                                          */
/* This function format the stories on the story page, when */
/* you click on that "Read More..." link in the home        */
/************************************************************/

function themearticle ($aid, $informant, $datetime, $title, $thetext, $topic, $topicname, $topicimage, $topictext) {
    global $admin, $sid, $tipath;
    echo "<table border=\"0\" cellpadding=\"0\" cellspacing=\"0\" bgcolor=\"#000000\" width=\"100%\"><tr><td>\n"
        ."<table border=\"0\" cellpadding=\"1\" cellspacing=\"0\" bgcolor=\"#000000\" width=\"100%\"><tr><td>\n"
        ."<table border=\"0\" cellpadding=\"3\" cellspacing=\"0\" bgcolor=\"#000000\" width=\"100%\"><tr><td align=\"left\">\n"
     ."<span class=\"title\">$title</span><BR>\n"
        ."<font size=\"2\">"._POSTEDON." $datetime "._BY." ";
    formatAidHeader($aid);
    if (is_admin($admin)) {
	echo "<br>[ <a href=\"admin.php?op=EditStory&amp;sid=$sid\">"._EDIT."</a> | <a href=\"admin.php?op=RemoveStory&amp;sid=$sid\">"._DELETE."</a> ]\n";
    }
    echo "</td></tr></table></td></tr>"
	."<tr><td>"
	."<table width=\"100%\" border=\"0\" cellspacing=\"0\" cellpadding=\"0\">"
  ."<tr>"
    ."<td width=\"2%\"><img src=\"themes/WebDesignHQ2/images/left_title.jpg\" width=\"30\" height=\"7\"></td>"
    ."<td width=\"95%\" background=\"themes/WebDesignHQ2/images/line_title.jpg\"><img src=\"themes/WebDesignHQ2/images/pixel.gif\" width=\"1\" height=\"1\"></td>"
    ."<td width=\"3%\"><img src=\"themes/WebDesignHQ2/images/right_title.jpg\" width=\"31\" height=\"7\"></td>"
  ."</tr>"
."</table>"
 	."</td></tr></table>\n";
    echo "<a href=\"search.php?query=&amp;topic=$topic\"><img src=\"$tipath$topicimage\" border=\"0\" Alt=\"$topictext\" align=\"right\" hspace=\"10\" vspace=\"10\"></a>\n";
    FormatStory($thetext, $notes="", $aid, $informant);
    echo "</td></tr></table><br>\n\n\n";
}

/************************************************************/
/* Function themesidebox()                                  */
/*                                                          */
/* Control look of your blocks. Just simple.                */
/************************************************************/

function themesidebox($title, $content) {
    echo "<table border=\"0\" cellpadding=\"1\" cellspacing=\"0\" bgcolor=\"#000000\" width=\"150\"><tr><td>\n"
	."<table border=\"0\" cellpadding=\"3\" cellspacing=\"0\" bgcolor=\"#000000\" width=\"100%\"><tr><td align=left>\n"
	."<span class=\"title\"><OBJECT classid=\"clsid:D27CDB6E-AE6D-11cf-96B8-444553540000\"
 codebase=\"http://download.macromedia.com/pub/shockwave/cabs/flash/swflash.cab#version=5,0,0,0\"
 WIDTH=150 HEIGHT=30>
 <PARAM NAME=movie VALUE=\"themes/WebDesignHQ2/title.swf?text=$title\"> 
 <PARAM NAME=quality VALUE=high>
 <PARAM NAME=bgcolor VALUE=#000000>
 <PARAM NAME=menu VALUE=false>
 <EMBED src=\"themes/WebDesignHQ2/title.swf?text=$title\" quality=high bgcolor=#000000  WIDTH=150 HEIGHT=30 TYPE=\"application/x-shockwave-flash\" PLUGINSPAGE=\"http://www.macromedia.com/shockwave/download/index.cgi?P1_Prod_Version=ShockwaveFlash\" menu=\"false\"></EMBED>
</OBJECT></span>\n"
	."</td></tr></table></td></tr></table>\n"
	."<table border=\"0\" cellpadding=\"0\" cellspacing=\"0\" bgcolor=\"#000000\" width=\"150\">\n"
	."<tr valign=\"top\"><td bgcolor=\"#000000\">\n"
	."<img src=\"themes/WebDesignHQ2/images/blok_header.jpg\" border=\"0\" alt=\"0\">"
	."</td></tr></table>\n"
	."<table border=\"0\" cellpadding=\"0\" cellspacing=\"0\" bgcolor=\"#000000\" width=\"150\">\n"
	."<tr valign=\"top\"><td bgcolor=\"#000000\">\n"
	."$content\n"
	."</td></tr></table>\n"
	."<br>\n\n\n";
}

    

?>