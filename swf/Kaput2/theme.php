<?php

/************************************************************/
/* Theme Defaults Definition                                  */
/*                                                          */
/* Control the header for your site. You need to define the */
/* BODY tag and in some part of the code call the blocks    */
/* function for left side with: block(left);                */
/************************************************************/

global $thename,$bgcolor1,$bgcolor2,$bgcolor3,$bgcolor4,$bgcolor5,$textcolor1,$textcolor2,$textcolor3,$textcolor4,$textcolor5,$textcolor6,$welcomeMessage;

$thename = "Kaput2";
$bgcolor1 = "#FFFFFF";  # primary background color
$bgcolor2 = "#FFFFFF";  # header and footer background color
$bgcolor3 = "#FFFFFF";  # block area background color
$bgcolor4 = "#FFFFFF";  # center block background color
$bgcolor5 = "#7b91AC";  # left and right block background color
$textcolor1 = "#000000"; # center block default title text color
$textcolor2 = "#000000"; # left and right block default title text color
$textcolor3 = "#505050"; # upper center block default text color
$textcolor4 = "#999999"; # lower center block default text color
$textcolor5 = "#000000"; # right and left block default text color
$textcolor6 = "#000000"; # header and footer default text color
$welcomeMessage = "[Insert your message here]";

/************************************************************/
/* Function OpenTable()                                     */
/*                                                          */
/*  Beginning of the Block formating for the header and     */
/*  footer of your site                                     */
/************************************************************/

function OpenTable() {
    global $thename,$bgcolor1,$bgcolor2,$bgcolor3,$bgcolor4,$bgcolor5,$textcolor1,$textcolor2,$textcolor3,$textcolor4,$textcolor5,$textcolor6,$welcomeMessage;
    echo "<table border=\"0\" cellspacing=\"0\" cellpadding=\"0\" width=\"100%\">
    <tr>
        <td width=\"15\" height=\"15\"><img src=\"themes/$thename/images/up-left2.gif\" alt=\"\" border=\"0\"></td>
        <td background=\"themes/$thename/images/up2.gif\" align=\"center\" width=\"100%\" height=\"15\"><font size=1>&nbsp;</font></td>
        <td><img src=\"themes/$thename/images/up-right2.gif\" width=\"15\" height=\"15\" alt=\"\" border=\"0\"></td>
    </tr>
    <tr>
        <td background=\"themes/$thename/images/left2.gif\" width=\"15\"><font size=1>&nbsp;</font></td>
        <td bgcolor=\"$bgcolor2\" width=\"100%\">";
}

/************************************************************/
/* Function OpenTable2()                                    */
/*                                                          */
/*  Beginning of the Block formating for the poll results   */
/*  and other blocks                                        */
/************************************************************/
function OpenTable2() {
    global $thename,$bgcolor1,$bgcolor2,$bgcolor3,$bgcolor4,$bgcolor5,$textcolor1,$textcolor2,$textcolor3,$textcolor4,$textcolor5,$textcolor6,$welcomeMessage;
    echo "<table border=\"0\" cellspacing=\"0\" cellpadding=\"0\" align=\"center\"><tr>
    <td width=\"15\" height=\"15\"><img src=\"themes/$thename/images/up-left2.gif\" alt=\"\" border=\"0\"></td>
    <td background=\"themes/$thename/images/up2.gif\" align=\"center\" height=\"15\"><font size=1>&nbsp;</font></td>
    <td><img src=\"themes/$thename/images/up-right2.gif\" width=\"15\" height=\"15\" alt=\"\" border=\"0\"></td>
    </tr>
    <tr>
    <td background=\"themes/$thename/images/left2.gif\" width=\"15\"><font size=1>&nbsp;</font></td>
    <td bgcolor=\"ffffff\">";
}

/************************************************************/
/* Function CloseTable()                                    */
/*                                                          */
/*  Ending of the Block formating for the header and        */
/*  footer of your site                                     */
/************************************************************/

function CloseTable() {
    global $thename,$bgcolor1,$bgcolor2,$bgcolor3,$bgcolor4,$bgcolor5,$textcolor1,$textcolor2,$textcolor3,$textcolor4,$textcolor5,$textcolor6,$welcomeMessage;
    echo "</td>
        <td background=\"themes/$thename/images/right2.gif\"><font size=1>&nbsp;</font></td></tr>
    <tr>
        <td width=\"15\" height=\"15\"><img src=\"themes/$thename/images/down-left2.gif\" alt=\"\" border=\"0\"></td>
        <td background=\"themes/$thename/images/down2.gif\" align=\"center\" height=\"15\"><font size=1>&nbsp;</font></td>
        <td><img src=\"themes/$thename/images/down-right2.gif\" width=\"15\" height=\"15\" alt=\"\" border=\"0\"></td>
    </tr>
    </td></tr></table>
    <br>";
}

/************************************************************/
/* Function CloseTable2()                                   */
/*                                                          */
/*  Ending of the Block formating for the poll results   */
/*  and other blocks                                        */
/************************************************************/
function CloseTable2() {
    global $thename,$bgcolor1,$bgcolor2,$bgcolor3,$bgcolor4,$bgcolor5,$textcolor1,$textcolor2,$textcolor3,$textcolor4,$textcolor5,$textcolor6,$welcomeMessage;
    echo "</td>
        <td background=\"themes/$thename/images/right2.gif\"><font size=1>&nbsp;</font></td></tr>
    <tr>
        <td width=\"15\" height=\"15\"><img src=\"themes/$thename/images/down-left2.gif\" alt=\"\" border=\"0\"></td>
        <td background=\"themes/$thename/images/down2.gif\" align=\"center\" height=\"15\"><font size=1>&nbsp;</font></td>
        <td><img src=\"themes/$thename/images/down-right2.gif\" width=\"15\" height=\"15\" alt=\"\" border=\"0\"></td>
    </tr>
    </td></tr></table>
    <br>";
}

/************************************************************/
/* Function FormatStory()                                   */
/*                                                          */
/*  Displays the news item text in the center blocks        */
/************************************************************/
function FormatStory($thetext, $notes, $aid, $informant) {
    global $thename,$bgcolor1,$bgcolor2,$bgcolor3,$bgcolor4,$bgcolor5,$textcolor1,$textcolor2,$textcolor3,$textcolor4,$textcolor5,$textcolor6,$welcomeMessage;
    global $anonymous;
    if ($notes != "") {
	$notes = "<b>"._NOTE."</b> <i>$notes</i>\n";
    } else {
	$notes = "";
    }
    if ("$aid" == "$informant") {
	echo "<font size=\"2\" color=\"$textcolor3\">$thetext<br>$notes</font>\n";
    } else {
	if($informant != "") {
	    $boxstuff = "<a href=\"user.php?op=userinfo&amp;uname=$informant\">$informant</a> ";
	} else {
	    $boxstuff = "$anonymous ";
	}
	$boxstuff .= ""._WRITES." <i>\"$thetext\"</i> $notes\n";
	echo "<font size=\"2\" color=\"$textcolor3\">$boxstuff</font>\n";
    }
}

/************************************************************/
/* Function themeheader()                                   */
/*                                                          */
/* Control the header for your site. You need to define the */
/* BODY tag and in some part of the code call the blocks    */
/* function for left side with: blocks(left);                */
/************************************************************/

function themeheader() {
    global $thename,$bgcolor1,$bgcolor2,$bgcolor3,$bgcolor4,$bgcolor5,$textcolor1,$textcolor2,$textcolor3,$textcolor4,$textcolor5,$textcolor6,$welcomeMessage;
    global $user, $sitename;
    cookiedecode($user);
    $username = $cookie[1];
    if ($username == "") {
        $username = "Anonymous";
    }
    echo "<body bgcolor=\"$bgcolor1\" text=\"#000000\" link=\"#363636\" vlink=\"#363636\" alink=\"#d5ae83\">\n"
	."<br>\n";
    if ($banners) {
	include("banners.php");
    }
    OpenTable();

    /******************************/
    /* If you comment this echo statement and uncomment the statment below this one you can */
    /* replace the search with a the welcome statement defined above.  I liked this option  */
    /* better since the search and menu are in blocks of the portal.                        */
    /******************************/
    echo "<table border=\"0\" width=\"100%\"><tr><td rowspan=\"2\">"
	."<a href=\"index.php\"><img src=\"themes/$thename/images/logo.gif\" border=\"0\" alt=\""._WELCOMETO." $sitename\" align=\"left\"></a></td>"
	."<td align=right width=100%>"
        ."<form action=\"search.php\" method=\"post\">"
        ."<font size=\"2\" color=\"$textcolor6\"><b>"._SEARCH." </b>"
        ."<input type=\"text\" name=\"query\" size=\"14\"></font></form>"
        ."</td></tr><tr>"
        ."<td align=\"right\" valign=\"bottom\" width=\"100%\">"
        ."<font size=\"2\"><b>"
	."<A href=\"/\">Home</a>&nbsp;&middot;&nbsp;<A href=\"topics.php\">"._TOPICS."</a>&nbsp;&middot;&nbsp"
        ."<A href=\"download.php\">"._DOWNLOADS."</a>&nbsp;&middot;&nbsp;<A href=\"user.php\">"._USERLOGIN."</a>"
        ."&nbsp;&middot;&nbsp;<A href=\"forum.php\">"._FORUMS."</a>&nbsp;&middot;&nbsp;<A href=\"top.php\">"._TOP10."</a>"
        ."</b></font></td></tr></table>\n";

    /******************************/
    /* If you uncomment this echo statement and comment off the above you can replace the search */
    /* with a welcome statement.  I liked this option better since the search and menu are in    */
    /* blocks of the portal.                                                                     */
    /******************************/
    /*
    echo "<table border=\"0\" width=\"100%\"><tr><td>"
	."<a href=\"index.php\"><img src=\"themes/$thename/images/logo.gif\" border=\"0\" alt=\""._WELCOMETO." $sitename\" align=\"left\"></a></td>"
	."<td width=100%><font color=\"$textcolor6\">"
        .$welcomeMessage
        ."</font></td></tr></table>\n";
    */
    CloseTable();
    echo "<table cellpadding=\"0\" cellspacing=\"0\" width=\"99%\" border=\"0\" align=\"center\" bgcolor=\"$bgcolor3\">\n"
	."<tr><td valign=\"top\">\n";
    blocks(left);
    echo "</td><td><img src=\"themes/$thename/images/pixel.gif\" width=\"15\" height=\"1\" border=\"0\" alt=\"\"></td><td width=\"100%\" valign=top>\n";
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
    global $thename,$bgcolor1,$bgcolor2,$bgcolor3,$bgcolor4,$bgcolor5,$textcolor1,$textcolor2,$textcolor3,$textcolor4,$textcolor5,$textcolor6,$welcomeMessage;
    global $index;
    if ($index == 1) {
	echo "</td><td><img src=\"themes/$thename/images/pixel.gif\" width=\"15\" height=\"1\" border=\"0\" alt=\"\"></td><td valign=\"top\" width=\"150\">\n";
	blocks(right);
    }
    echo "</td></tr></table>\n";
}

/************************************************************/
/* Function themeindex()                                    */
/*                                                          */
/* Displays the center blocks                               */
/************************************************************/

function themeindex ($aid, $informant, $time, $title, $counter, $topic, $thetext, $notes, $morelink, $topicname, $topicimage, $topictext) {
    global $thename,$bgcolor1,$bgcolor2,$bgcolor3,$bgcolor4,$bgcolor5,$textcolor1,$textcolor2,$textcolor3,$textcolor4,$textcolor5,$textcolor6,$welcomeMessage;
    global $anonymous, $tipath;
    echo "<table border=\"0\" cellspacing=\"0\" cellpadding=\"0\" width=\"100%\">
    <tr>
        <td width=\"15\" height=\"15\"><img src=\"themes/$thename/images/up-left2.gif\" alt=\"\" border=\"0\"></td>
        <td background=\"themes/$thename/images/up2.gif\" align=\"center\" width=\"100%\" height=\"15\"><font size=1>&nbsp;</font></td>
        <td width=\"15\" height=\"15\"><img src=\"themes/$thename/images/up-right2.gif\" width=\"15\" height=\"15\" alt=\"\" border=\"0\"></td>
    </tr>
    <tr>
        <td background=\"themes/$thename/images/left2.gif\" width=\"15\"><font size=1>&nbsp;</font></td>
        <td bgcolor=\"$bgcolor4\" width=\"100%\">
                <font color=\"$textcolor4\"><b><a href=\"search.php?query=&amp;topic=$topic\"><img src=\"$tipath$topicimage\" border=\"0\" Alt=\"$topictext\" align=\"right\" hspace=\"10\" vspace=\"10\"></a></B></font>
                <font color=\"$textcolor1\"><b>$title</b></font><br><br>
                <font color=\"$textcolor3\">";
                FormatStory($thetext, $notes, $aid, $informant);
                echo "</font>
        </td>
        <td background=\"themes/$thename/images/right2.gif\"><font size=1>&nbsp;</font></td>
    </tr>
    <tr>
        <td width=\"15\" height=\"15\"><img src=\"themes/$thename/images/middle-left.gif\" alt=\"\" border=\"0\"></td>
        <td background=\"themes/$thename/images/middle.gif\" align=\"center\" height=\"15\"><font size=1>&nbsp;</font></td>
        <td><img src=\"themes/$thename/images/middle-right.gif\" width=\"15\" height=\"15\" alt=\"\" border=\"0\"></td>
    </tr>
    <tr>
        <td background=\"themes/$thename/images/left3.gif\" width=\"15\"><font size=1>&nbsp;</font></td>
        <td align=center bgcolor=\"$bgcolor4\">
                <font color=\"$textcolor4\" size=\"1\">"._POSTEDBY." ";
                        formatAidHeader($aid);
                        echo " "._ON." $time $timezone ($counter "._READS.")<br></font>
	        <font size=\"2\">$morelink</font>
        </td>
        <td background=\"themes/$thename/images/right3.gif\" width=\"15\"><font size=1>&nbsp;</font></td>
    </tr>
    <tr>
        <td width=\"15\" height=\"11\" valign=top><img src=\"themes/$thename/images/down-left3.gif\" alt=\"\" border=\"0\"></td>
        <td background=\"themes/$thename/images/down3.gif\" align=\"center\" height=\"11\" width=100%><font size=1>&nbsp;</font></td>
        <td width=\"15\" height=\"11\" valign=top><img src=\"themes/$thename/images/down-right3.gif\" alt=\"\" border=\"0\"></td>
    </tr>
    </table>
    <br>";
}

/************************************************************/
/* Function themearticle()                                  */
/*                                                          */
/* Controls how an article appears when read.               */
/************************************************************/
function themearticle ($aid, $informant, $datetime, $title, $thetext, $topic, $topicname, $topicimage, $topictext) {
    global $thename,$bgcolor1,$bgcolor2,$bgcolor3,$bgcolor4,$bgcolor5,$textcolor1,$textcolor2,$textcolor3,$textcolor4,$textcolor5,$textcolor6,$welcomeMessage;
    global $admin, $sid, $tipath;
    Opentable();
    echo "<font size=\"3\" color=\"#363636\"><b>$title</b></font><br>\n"
        ."<font size=\"2\">"._POSTEDON." $datetime by ";
    formatAidHeader($aid);
    if (is_admin($admin)) {
	echo "<br>[ <a href=\"admin.php?op=EditStory&amp;sid=$sid\">"._EDIT."</a> | <a href=\"admin.php?op=RemoveStory&amp;sid=$sid\">"._DELETE."</a> ]\n";
    }
    echo "<br><br>";
    echo "<a href=\"search.php?query=&amp;topic=$topic\"><img src=\"$tipath$topicimage\" border=\"0\" Alt=\"$topictext\" align=\"right\" hspace=\"10\" vspace=\"10\"></a>\n";
    FormatStory($thetext, $notes="", $aid, $informant);
    echo "<br>\n\n\n";
    CloseTable();
}

/************************************************************/
/* Function themeidebox()                                   */
/*                                                          */
/* left and right block formating                           */
/************************************************************/

function themesidebox($title, $content) {
    global $thename,$bgcolor1,$bgcolor2,$bgcolor3,$bgcolor4,$bgcolor5,$textcolor1,$textcolor2,$textcolor3,$textcolor4,$textcolor5,$textcolor6,$welcomeMessage;
    echo "<table border=0 cellspacing=0 cellpadding=0 width=150><tr>"
	."<td width=17 height=17><img src=themes/$thename/images/up-left.gif alt=\"\" border=0></td>"
        ."<td background=themes/$thename/images/up.gif align=center width=100% height=17><font size=1>&nbsp;</font></td>"
        ."<td width=17 height=17><img src=themes/$thename/images/up-right.gif width=17 height=17 alt=\"\" border=0></td></tr>"
        ."<tr>"
        ."<td background=themes/$thename/images/left.gif width=17><font size=1>&nbsp;</font></td>"
        ."<td bgcolor=\"$bgcolor5\" width=126><center><font color=\"$textcolor2\" size=2><b>$title</b></font></center><br><font color=\"$textcolor5\">$content</font></td>"
        ."<td background=themes/$thename/images/right.gif><font size=1>&nbsp;</font></td></tr>"
        ."<tr>"
        ."<td width=17 height=17><img src=themes/$thename/images/down-left.gif alt=\"\" border=0></td>"
        ."<td background=themes/$thename/images/down.gif align=center width=100% height=17><font size=1>&nbsp;</font></td>"
        ."<td width=17 height=17><img src=themes/$thename/images/down-right.gif width=17 height=17 alt=\"\" border=0></td></tr>"
        ."</td></tr></table>"
        ."<br>";
}

?>