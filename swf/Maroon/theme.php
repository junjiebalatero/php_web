<?php

/************************************************************/
/* Theme Defaults Definition                                  */
/*                                                          */
/* Control the header for your site. You need to define the */
/* BODY tag and in some part of the code call the blocks    */
/* function for left side with: block(left);                */
/************************************************************/

global $thename,$bgcolor1,$bgcolor2,$bgcolor3,$bgcolor4,$bgcolor5,$bgcolor6,$bgcolor7,$bgcolor8,$bgcolor9,$bgcolor10,$textcolor1,$textcolor2,$textcolor3,$textcolor4,$textcolor5,$textcolor6,$welcomeMessage;

$thename = "Maroon";

$bgcolor1 = "#EEEEDD";  # primary background color
$bgcolor2 = "#DDDDCD";  # Comments nav bar background color
$bgcolor3 = "#EEEEDD";  # block area background color
$bgcolor4 = "#FFFFFF";  # center block background color
$bgcolor5 = "#DDDDCC";  # left and right block background color
$bgcolor6 = "#FFFFFF";  # header and footer background color
$bgcolor7 = "#993300";  # Trim line that surrounds each block
$bgcolor8 = "#993300";  # Left and right block title area background color
$bgcolor9 = "#CCCCBB";  # Center block title area background color
$bgcolor10 = "#993300";  # header and footer block underline background color

$textcolor1 = "#000000"; # center block default title text color
$textcolor2 = "#FFFFFF"; # left and right block default title text color
$textcolor3 = "#303030"; # center block default text color
$textcolor4 = "#303030"; # lower center block default text color
$textcolor5 = "#000000"; # right and left block default text color
$textcolor6 = "#000000"; # header and footer default text color

/************************************************************/
/* Function OpenTable()                                     */
/*                                                          */
/*  Beginning of the Block formating for the header and     */
/*  footer of your site as well some others                 */
/************************************************************/

function OpenTable() {
    global $thename,$bgcolor1,$bgcolor2,$bgcolor3,$bgcolor4,$bgcolor5,$bgcolor6,$bgcolor7,$textcolor1,$textcolor2,$textcolor3,$textcolor4,$textcolor5,$textcolor6,$welcomeMessage;
    echo "<table border=0 cellspacing=0 cellpadding=1 width=100% bgcolor=$bgcolor7><tr><td>
          <table border=0 cellspacing=0 cellpadding=0 width=100% bgcolor=$bgcolor4><tr><td>";
}

/************************************************************/
/* Function CloseTable()                                    */
/*                                                          */
/*  Ending of the Block formating for the header and        */
/*  footer of your site as well some others                 */
/************************************************************/

function CloseTable() {
    global $thename,$bgcolor1,$bgcolor2,$bgcolor3,$bgcolor4,$bgcolor5,$bgcolor6,$bgcolor7,$bgcolor10,$textcolor1,$textcolor2,$textcolor3,$textcolor4,$textcolor5,$textcolor6,$welcomeMessage;
    echo "</td></tr>
          <tr bgcolor=$bgcolor10>
                <td bgcolor=$bgcolor10><font size=1>&nbsp;</font></td>
          </tr>
          </table>
        </td>
        </tr>
        </table>
        <br>\n\n\n";
}

/************************************************************/
/* Function OpenTable2()                                    */
/*                                                          */
/*  Beginning of the Block formating for the                */
/*  poll results and other blocks                           */
/************************************************************/
function OpenTable2() {
    global $thename,$bgcolor1,$bgcolor2,$bgcolor3,$bgcolor4,$bgcolor5,$bgcolor6,$bgcolor7,$textcolor1,$textcolor2,$textcolor3,$textcolor4,$textcolor5,$textcolor6,$welcomeMessage;
    echo "<table border=0 cellpadding=0 cellspacing=1 align=center bgcolor=$bgcolor7 width=100%><tr><td>
          <table border=0 cellspacing=0 cellpadding=3 width=100% bgcolor=$bgcolor4><tr><td>\n";
}

/************************************************************/
/* Function CloseTable2()                                   */
/*                                                          */
/*  Ending of the Block formating for the                   */
/*  poll results and other blocks                           */
/************************************************************/
function CloseTable2() {
    global $thename,$bgcolor1,$bgcolor2,$bgcolor3,$bgcolor4,$bgcolor5,$bgcolor6,$bgcolor7,$textcolor1,$textcolor2,$textcolor3,$textcolor4,$textcolor5,$textcolor6,$welcomeMessage;
    echo "</td></tr></table>\n</td></tr></table>\n<br>\n\n\n";
}

/************************************************************/
/* Function FormatStory()                                   */
/*                                                          */
/*  Displays the news item text in the center blocks        */
/************************************************************/
function FormatStory($thetext, $notes, $aid, $informant) {
    global $thename,$bgcolor1,$bgcolor2,$bgcolor3,$bgcolor4,$bgcolor5,$bgcolor6,$bgcolor7,$textcolor1,$textcolor2,$textcolor3,$textcolor4,$textcolor5,$textcolor6,$welcomeMessage;
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
	$boxstuff .= ""._WRITES." \"$thetext\" $notes\n";
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
    global $thename,$bgcolor1,$bgcolor2,$bgcolor3,$bgcolor4,$bgcolor5,$bgcolor6,$bgcolor7,$textcolor1,$textcolor2,$textcolor3,$textcolor4,$textcolor5,$textcolor6,$welcomeMessage;
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

    echo "<table bgcolor=\"$bgcolor6\" border=\"0\" cellspacing=\"0\" cellpadding=\"3\" width=\"100%\">
          <tr>
                <td>
                        <a href=\"index.php\">
                        <img src=\"themes/$thename/images/logo.gif\" border=\"0\" alt=\""._WELCOMETO." $sitename\" align=\"left\"></a>
                </td>
                <TD align=right><form action=search.php method=post><font size=2 color=$textcolor6>
                        <input type=text name=query><input type=\"SUBMIT\" value=\""._SEARCH."\"></form>
                </td>
          </tr>
          </table>";

    CloseTable();
    echo "<table cellpadding=\"0\" cellspacing=\"0\" width=\"99%\" border=\"0\" align=\"center\" bgcolor=\"$bgcolor3\">\n"
	."<tr><td valign=\"top\">\n";
    blocks(left);
    echo "</td>\n<td><img src=\"themes/$thename/images/pixel.gif\" width=\"15\" height=\"1\" border=\"0\" alt=\"\"></td>\n<td width=\"100%\" valign=top>\n";
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
    global $thename,$bgcolor1,$bgcolor2,$bgcolor3,$bgcolor4,$bgcolor5,$bgcolor6,$bgcolor7,$textcolor1,$textcolor2,$textcolor3,$textcolor4,$textcolor5,$textcolor6,$welcomeMessage;
    global $index;
    if ($index == 1) {
	echo "</td>\n<td><img src=\"themes/$thename/images/pixel.gif\" width=\"15\" height=\"1\" border=\"0\" alt=\"\"></td><td valign=\"top\" width=\"150\">\n";
	blocks(right);
    }
    echo "</td></tr></table>\n";
    echo "<br>\n";
    OpenTable();
    echo "<table bgcolor=\"$bgcolor6\" border=\"0\" cellspacing=\"0\" cellpadding=\"3\" width=\"100%\">
          <tr><td><font color=\"$textcolor6\">";
    footmsg();
    echo "</font></td></tr></table>";
    CloseTable();
}

/************************************************************/
/* Function themearticle()                                  */
/*                                                          */
/* Controls how an article appears when read.               */
/************************************************************/
function themearticle ($aid, $informant, $datetime, $title, $thetext, $topic, $topicname, $topicimage, $topictext) {
    global $thename,$bgcolor1,$bgcolor2,$bgcolor3,$bgcolor4,$bgcolor5,$bgcolor6,$bgcolor7,$textcolor1,$textcolor2,$textcolor3,$textcolor4,$textcolor5,$textcolor6,$welcomeMessage;
    global $admin, $sid, $tipath;
    Opentable2();
    echo "<font size=\"3\" color=\"$textcolor1\"><b>$title</b></font><br>\n"
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
/* Function themeindex()                                    */
/*                                                          */
/* Displays the center blocks                               */
/************************************************************/

function themeindex ($aid, $informant, $time, $title, $counter, $topic, $thetext, $notes, $morelink, $topicname, $topicimage, $topictext) {
    global $thename,$bgcolor1,$bgcolor2,$bgcolor3,$bgcolor4,$bgcolor5,$bgcolor6,$bgcolor7,$bgcolor9,$textcolor1,$textcolor2,$textcolor3,$textcolor4,$textcolor5,$textcolor6,$welcomeMessage;
    global $anonymous, $tipath;
    echo "<table border=0 cellpadding=0 cellspacing=0 align=center bgcolor=$bgcolor7 width=100%>
                <tr><td>
                        <table border=0 cellpadding=3 cellspacing=1 width=100%>
                        <tr><td bgcolor=$bgcolor9>
                                <font color=\"$textcolor1\" size=\"2\"><b>$title</b></font><br>
                                <font size=1 color=\"$textcolor1\">"._POSTEDBY." ";
                                formatAidHeader($aid);
                                echo " "._ON." $time $timezone ($counter "._READS.")<br>
                                </td>
                        </tr>
                        <tr>
                                <td bgcolor=$bgcolor4>
                                <a href=\"search.php?query=&amp;topic=$topic\"><img src=\"$tipath$topicimage\" border=\"0\" Alt=\"$topictext\" align=\"right\" hspace=\"10\" vspace=\"10\"></a>";
                                FormatStory($thetext, $notes, $aid, $informant);
                                echo "<br><br>
                                </td>
                        </tr>
                        <tr>
                                <td bgcolor=$bgcolor9 align=right><font size=2 color=\"$textcolor4\">$morelink</td>
                        </tr>
                        </table>
                </td></tr>
        </table>
        <br>\n\n\n";
}

/************************************************************/
/* Function themeidebox()                                   */
/*                                                          */
/* left and right block formating                           */
/************************************************************/

function themesidebox($title, $content) {
    global $thename,$bgcolor1,$bgcolor2,$bgcolor3,$bgcolor4,$bgcolor5,$bgcolor6,$bgcolor7,$bgcolor8,$textcolor1,$textcolor2,$textcolor3,$textcolor4,$textcolor5,$textcolor6,$welcomeMessage;
    echo "<table border=0 cellspacing=0 cellpadding=0 width=150 bgcolor=$bgcolor7>
          <tr>
                <td>
                <table width=100% border=0 cellspacing=1 cellpadding=3>
                <tr>
                        <td colspan=1 bgcolor=$bgcolor8 align=\"center\">
                        <font color=\"$textcolor2\" size=2><b>$title</b></font>
                        </td>
                </tr>
                <tr>
                        <td bgcolor=$bgcolor5><font size=2>
                                <font color=\"$textcolor5\">";

                                /**********************************************/
                                /* H E R E   I S   T H E   C O D E   T H A T  */
                                /* D O E S   T H E   I N C L U D E   P A G E  */
                                /* F O R   C U S T O M   B L O C K S          */
                                /*                                            */
                                /* - Instead of just echoing out the          */
                                /* the $content variable insert these lines.  */
                                /* - to remove it just replace everything with*/
                                /* "echo $content;"
                                /**********************************************/

                                if (file_exists($content)) {
                                        $fp = fopen ($content, "r");
                                        $content = fread($fp, filesize($content));
                                        fclose ($fp);
                                        $content = "?>$content<?";
                                        echo eval($content);
                                } else {
                                        echo $content;
                                }

                                /**********************************************/

                                echo "</font>
                        </td>
                </tr>
                </table>
                </td>
          </tr>
          </table><br>\n\n\n";
}

?>