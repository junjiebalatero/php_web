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

$thename = "PhpNukeShop";
$bgcolor1 = "#d9dbd9";
$bgcolor2 = "#cfcfd1";
$bgcolor3 = "#eeeeef";
$bgcolor4 = "#d8d8d9";
$textcolor1 = "#ffffff";
$textcolor2 = "#ffffff";

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
     $boxstuff .= ""._WRITES." <i>\"$thetext\"</i>$notes\n";
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
    global $user, $banners, $sitename, $slogan, $cookie, $prefix, $thename;
    cookiedecode($user);
    $username = $cookie[1];
    if ($username == "") {
        $username = "Anonymous";
    }
    echo "<body background=\"themes/$thename/images/bg_b.jpg\" bgcolor=\"#0038a8\" text=\"#000000\" link=\"#363636\" vlink=\"#363636\" alink=\"#d5ae83\">\n"
     ."\n";
    if ($banners) {
     include("banners.php");
    }
    echo "<!-- ImageReady Slices (frame.jpg) -->
<TABLE WIDTH=100% BORDER=0 CELLPADDING=0 CELLSPACING=0>
     <TR>
          <TD>
               <IMG SRC=\"themes/$thename/images/frame_01.jpg\" WIDTH=31 HEIGHT=31></TD>
          <TD background=\"themes/$thename/images/frame_02.jpg\" WIDTH=100% HEIGHT=31></TD>
          <TD>
               <IMG SRC=\"themes/$thename/images/frame_03.jpg\" WIDTH=37 HEIGHT=31></TD>
     </TR>
     <TR>
          <TD background=\"themes/$thename/images/frame_04.jpg\" WIDTH=37 HEIGHT=\"\"></TD>
          <TD WIDTH=100% HEIGHT=\"\" BGCOLOR=#FFFFFF>
<!-- End ImageReady Slices -->\n";
     echo "<table cellpadding=\"0\" cellspacing=\"0\" width=\"99%\" border=\"0\" align=\"center\" bgcolor=\"#ffffff\">\n"
     ."<tr>\n"
     ."<td bgcolor=\"#ffffff\">\n"
     ."<OBJECT CLASSID=\"clsid:D27CDB6E-AE6D-11cf-96B8-444553540000\"
 CODEBASE=\"http://active.macromedia.com/flash2/cabs/swflash.cab#version=4,0,0,0\"
 ID=LOGO_DONE WIDTH=335 HEIGHT=81>
 <PARAM NAME=movie VALUE=\"themes/$thename/atomic_done3.swf\"> <PARAM NAME=quality VALUE=high> <PARAM NAME=wmode VALUE=transparent> <PARAM NAME=bgcolor VALUE=#FFFFFF> <EMBED SRC=\"themes/$thename/atomic_done3.swf\" QUALITY=high WMODE=transparent BGCOLOR=#FFFFFF  WIDTH=335 HEIGHT=81 TYPE=\"application/x-shockwave-flash\" PLUGINSPAGE=\"http://www.macromedia.com/shockwave/download/index.cgi?P1_Prod_Version=ShockwaveFlash\"></EMBED>
</OBJECT><br><OBJECT classid=\"clsid:D27CDB6E-AE6D-11cf-96B8-444553540000\"
 codebase=\"http://download.macromedia.com/pub/shockwave/cabs/flash/swflash.cab#version=5,0,0,0\"
 WIDTH=335 HEIGHT=20>
 <PARAM NAME=movie VALUE=\"themes/$thename/slogan.swf?text=$slogan\"> 
 <PARAM NAME=quality VALUE=high>
 <PARAM NAME=bgcolor VALUE=#ffffff>
 <PARAM NAME=menu VALUE=false>
 <EMBED src=\"themes/$thename/slogan.swf?text=$slogan\" quality=high bgcolor=#ffffff WIDTH=335 HEIGHT=20 TYPE=\"application/x-shockwave-flash\" PLUGINSPAGE=\"http://www.macromedia.com/shockwave/download/index.cgi?P1_Prod_Version=ShockwaveFlash\" menu=\"false\"></EMBED>
</OBJECT></td>\n"
."<td bgcolor=\"#ffffff\" align=\"center\">\n"
     ."<center><form action=\"search.php\" method=\"post\"><font size=\"2\" color=\"#000000\"><b>"._SEARCH." </b>\n"
     ."<input type=\"text\" name=\"query\" size=\"14\"></font></form></center></td>\n"
     ."<td bgcolor=\"#ffffff\" align=\"center\">\n"
     ."<center><form action=\"search.php\" method=\"get\"><font size=\"2\"><b>"._TOPICS." </b>\n";
    $toplist = mysql_query("select topicid, topictext from $prefix"._topics." order by topictext");
    echo "<select name=\"topic\"onChange='submit()'>\n" 
     ."<option value=\"\">"._ALLTOPICS."</option>\n";
    while(list($topicid, $topics) = mysql_fetch_row($toplist)) {
    if ($topicid==$topic) { $sel = "selected "; }
     echo "<option $sel value=\"$topicid\">$topics</option>\n";
     $sel = "";
    }
    echo "</select></font></form></center></td>\n"
     ."</tr></table>\n"
     ."<table cellpadding=\"0\" cellspacing=\"0\" width=\"99%\" border=\"0\" align=\"center\" bgcolor=\"#fefefe\">\n"
     ."<tr>\n"
     ."<td bgcolor=\"#000000\" colspan=\"4\"><IMG src=\"themes/$thename/images/pixel.gif\" width=\"1\" height=1 alt=\"\" border=\"0\" hspace=\"0\"></td>\n"
     ."</tr>\n"
     ."<tr valign=\"middle\" bgcolor=\"#ffffff\">\n"
     ."<td width=\"15%\" nowrap><font size=\"2\" color=\"#363636\"><b>\n";
    if ($username == "Anonymous") {
     echo "&nbsp;&nbsp;<b><font color=\"#606460\"><a href=\"user.php\">Create</a></font> an account</b>\n";
    } else {
     echo "&nbsp;&nbsp;"._HELLO." $username!";
    }
    echo "</b></font></td>\n"
    ."<TD ALIGN=\"center\" HEIGHT=\"20\" WIDTH=\"70%\"><FONT SIZE=\"2\"><font color=\"#606460\"><B>\n"
        ."<IMG SRC=\"themes/$thename/images/BluescaleScheme.gif\" BORDER=\"0\" ALT=\"\">&nbsp;<A HREF=\"modules.php?op=modload&name=Contact&file=index\">Contact</A>\n"
        ."&nbsp;\n"
        ."<IMG SRC=\"themes/$thename/images/Flames.gif\" BORDER=\"0\" ALT=\"\">&nbsp;<A HREF=\"download.php\">".DOWNLOADS."</A>\n"
        ."&nbsp;\n"
        ."<IMG SRC=\"themes/$thename/images/DarkRedIcon.gif\" BORDER=\"0\" ALT=\"\">&nbsp;<A HREF=\"news_letter.php\">Newsletter</A>\n"
        ."</B></FONT>\n"
        ."</TD>\n"
        ."<td align=\"right\" width=\"15%\"><font color=\"#606460\"><font size=\"2\"><b>\n"
        ."<script type=\"text/javascript\">\n\n"
        ."<!--   // Array ofmonth Names\n"
        ."var monthNames = new Array( \"January\",\"February\",\"March\",\"April\",\"May\",\"June\",\"July\",\"August\",\"September\",\"October\",\"November\",\"December\");\n"
        ."var now = new Date();\n"
        ."thisYear = now.getYear();\n"
        ."if(thisYear < 1900) {thisYear += 1900}; // corrections if Y2K display problem\n"
        ."document.write(monthNames[now.getMonth()] + \" \" + now.getDate() + \", \" + thisYear);\n"
        ."// -->\n\n"
        ."</script></b></font></td>\n"
        ."<td>&nbsp;</td>\n"
        ."</tr>\n"
        ."</table>\n"
     ."<!-- FIN DEL TITULO -->\n"
."<table width=\"99%\" cellpadding=\"0\" cellspacing=\"0\" border=\"0\" bgcolor=\"#ffffff\" align=\"center\"><tr valign=\"top\">\n"
     ."<td bgcolor=\"#ffffff\"><img src=\"themes/$thename/images/pixel.gif\" width=\"1\" height=\"20\" border=\"0\" alt=\"\"></td></tr></table>\n"
     ."<table width=\"99%\" cellpadding=\"0\" cellspacing=\"0\" border=\"0\" bgcolor=\"#ffffff\" align=\"center\"><tr valign=\"top\">\n"
     ."<td bgcolor=\"#ffffff\"><img src=\"themes/$thename/images/pixel.gif\" width=\"10\" height=\"1\" border=\"0\" alt=\"\"></td>\n"
     ."<td bgcolor=\"#ffffff\" width=\"150\" valign=\"top\">\n";
    blocks(left);
    echo "</td><td><img src=\"themes/$thename/images/pixel.gif\" width=\"15\" height=\"1\" border=\"0\" alt=\"\"></td><td width=\"100%\">\n";
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
    global $index, $thename;
    if ($index == 1) {
     echo "</td><td><img src=\"themes/$thename/images/pixel.gif\" width=\"15\" height=\"1\" border=\"0\" alt=\"\"></td><td valign=\"top\" width=\"150\">\n";
     blocks(right);
    }
    echo "</td><td bgcolor=\"#ffffff\"><img src=\"themes/$thename/images/pixel.gif\" width=10 height=1 border=0 alt=\"\">\n"
     ."</td></tr></table>\n"
."<!-- begin End ImageReady Slices -->         
          </TD>
          <TD background=\"themes/$thename/images/frame_06.jpg\" WIDTH=37 HEIGHT=\"\"></TD>
     </TR>
     <TR>
          <TD>
               <IMG SRC=\"themes/$thename/images/frame_07.jpg\" WIDTH=31 HEIGHT=36></TD>
          <TD background=\"themes/$thename/images/frame_08.jpg\" WIDTH=100% HEIGHT=36></TD>
          <TD>
               <IMG SRC=\"themes/$thename/images/frame_09.jpg\" WIDTH=37 HEIGHT=36></TD>
     </TR>
</TABLE>
<!-- End ImageReady Slices -->\n";

    footmsg();


}

/************************************************************/
/* Function themeindex()                                    */
/*                                                          */
/* This function format the stories on the Homepage         */
/************************************************************/

function themeindex ($aid, $informant, $time, $title, $counter, $topic, $thetext, $notes, $morelink, $topicname, $topicimage, $topictext) {
    global $anonymous, $tipath, $thename;
    echo "<table border=\"0\" cellpadding=\"0\" cellspacing=\"0\" bgcolor=\"#ffffff\" width=\"100%\"><tr><td>\n"
     ."<table border=\"0\" cellpadding=\"1\" cellspacing=\"0\" bgcolor=\"#000000\" width=\"100%\"><tr><td>\n"
     ."<table border=\"0\" cellpadding=\"3\" cellspacing=\"0\" bgcolor=\"#d8d8d9\" width=\"100%\"><tr><td align=\"left\">\n"
     ."<font size=\"3\" color=\"#000000\"><b>$title</b></font>\n"
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
/* Function themearticle()                                   */
/*                                                          */
/* This function format the stories on the story page, when */
/* you click on that "Read More..." link in the home        */
/************************************************************/

function themearticle ($aid, $informant, $datetime, $title, $thetext, $topic, $topicname, $topicimage, $topictext) {
    global $admin, $sid, $tipath, $thename;
    echo "<table border=\"0\" cellpadding=\"0\" cellspacing=\"0\" bgcolor=\"#ffffff\" width=\"100%\"><tr><td>\n"
        ."<table border=\"0\" cellpadding=\"1\" cellspacing=\"0\" bgcolor=\"#000000\" width=\"100%\"><tr><td>\n"
        ."<table border=\"0\" cellpadding=\"3\" cellspacing=\"0\" bgcolor=\"#d8d8d9\" width=\"100%\"><tr><td align=\"left\">\n"
        ."<font size=\"3\" color=\"#000000\"><b>$title</b></font><br>\n"
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
/************************************************************/

function themesidebox($title, $content) {
global $thename;
    echo "<table border=\"0\" cellpadding=\"1\" cellspacing=\"0\" bgcolor=\"#ffffff\" width=\"150\"><tr><td>\n"
     ."<table border=\"0\" cellpadding=\"3\" cellspacing=\"0\" bgcolor=\"#ffffff\" width=\"100%\"><tr><td align=left>\n"
     ."<font size=\"2\" color=\"#ffffff\"><b><OBJECT classid=\"clsid:D27CDB6E-AE6D-11cf-96B8-444553540000\"
 codebase=\"http://download.macromedia.com/pub/shockwave/cabs/flash/swflash.cab#version=5,0,0,0\"
 WIDTH=150 HEIGHT=30>
 <PARAM NAME=movie VALUE=\"themes/$thename/title.swf?text=$title\"> 
 <PARAM NAME=quality VALUE=high>
 <PARAM NAME=bgcolor VALUE=#ffffff>
 <PARAM NAME=menu VALUE=false>
 <EMBED src=\"themes/$thename/title.swf?text=$title\" quality=high bgcolor=#ffffff  WIDTH=150 HEIGHT=30 TYPE=\"application/x-shockwave-flash\" PLUGINSPAGE=\"http://www.macromedia.com/shockwave/download/index.cgi?P1_Prod_Version=ShockwaveFlash\" menu=\"false\"></EMBED>
</OBJECT></b></font>\n"
     ."</td></tr></table></td></tr></table>\n"
     ."<table border=\"0\" cellpadding=\"0\" cellspacing=\"0\" bgcolor=\"#ffffff\" width=\"150\">\n"
     ."<tr valign=\"top\"><td>"; 
if (file_exists($content)) { 
$fp = fopen ($content, "r"); 
$content = fread($fp, filesize($content)); 
fclose ($fp); 
$content = "?>$content<?"; 
echo eval($content); 
} else { 
echo $content; 
} 
echo "</td></tr></table>\n"
     ."<br>\n\n\n";
}

?>