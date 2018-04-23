<?php

//
// Turing Theme For PostNuke 0.6.1
//
// $Id: theme.php,v 1.14 2001/08/14 19:51:31 awd Exp $
//

/************************************************************/
/* Theme Colors Definition                                  */
/*                                                          */
/* Define colors for your web site. $bgcolor2 is generaly   */
/* used for the tables border as you can see on OpenTable() */
/* function, $bgcolor1 is for the table background and the  */
/* other two bgcolor variables follows the same criteria.   */
/* $texcolor1 and 2 are for tables internal texts           */
/************************************************************/

$bgcolor1 = "#333366";
$bgcolor2 = "#28224C";
$bgcolor3 = "#444466";
$bgcolor4 = "#444466";
$sepcolor = "#B6CCE1";
$textcolor1 = "#FFA000";
$textcolor2 = "#FFA000";

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
    echo "<table width=\"100%\" border=\"0\" cellspacing=\"1\" cellpadding=\"0\" bgcolor=\"$bgcolor2\"><tr><td>";
    echo "<table width=\"100%\" border=\"0\" cellspacing=\"1\" cellpadding=\"8\" bgcolor=\"$bgcolor1\"><tr><td>";
}

function OpenTable2() {
    global $bgcolor1, $bgcolor2;
    echo "<table border=\"0\" cellspacing=\"1\" cellpadding=\"0\" bgcolor=\"$bgcolor2\" align=\"center\"><tr><td>";
    echo "<table border=\"0\" cellspacing=\"1\" cellpadding=\"8\" bgcolor=\"$bgcolor1\"><tr><td>";
}

function CloseTable() {
    echo "</td></tr></table></td></tr></table>";
}

function CloseTable2() {
    echo "</td></tr></table></td></tr></table>";
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
        $notes = "<br><br><b>"._NOTE."</b> <i>$notes</i>";
    } else {
        $notes = "";
    }
    if ("$aid" == "$informant") {
        echo "<font size=\"2\" color=\"#FFBB00\">$thetext$notes</font>";
    } else {
        if($informant != "") {
            $boxstuff = "<a href=\"user.php?op=userinfo&amp;uname=$informant\">$informant</a> ";
        } else {
            $boxstuff = "$anonymous ";
        }
        $boxstuff .= ""._WRITES." <i>\"$thetext\"</i>$notes";
        echo "<font size=\"2\" color=\"#FFBB00\">$boxstuff</font>";
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
    global $bgcolor1, $bgcolor2, $bgcolor3, $bgcolor4, $sepcolor, $sitename, $slogan, $banners, $user, $cookie;
    cookiedecode($user);
    $username = $cookie[1];
    echo "
</head>
<body>

<!-- Turing Theme: Begin Header -->

<br>

<!-- Turing Theme: Begin Title Bar -->

<table cellpadding=\"0\" cellspacing=\"0\" width=\"99%\" border=\"0\" align=\"center\" bgcolor=\"$bgcolor1\">
<tr>
    <td bgcolor=\"$bgcolor1\">
        <img src=\"themes/Turing/images/corner-top-left.gif\" alt=\"\" align=\"left\" border=\"0\" hspace=\"0\">
    </td>
    <td bgcolor=\"$bgcolor1\" valign=\"top\">
        <img src=\"themes/Turing/images/corner-top-right.gif\" alt=\"\" align=\"right\" border=\"0\" hspace=\"0\">
    </td>
</tr>
<tr>
    <td align=\"left\">
        &nbsp;&nbsp;<a class=\"pn-logo\" href=\"index.php\">$sitename</a><br>
        &nbsp;&nbsp;<font class=\"pn-logo-small\">$slogan</font>
    </td>
    <td>";
    if ($banners) {
    include("banners.php");
    }
    echo "
    <br></td>
</tr>
<tr>
    <td align=\"right\" colspan=\"2\">
        <font class=\"pn-logo-small\">";
    echo formatTimestamp(GetUserTime(strftime("%Y-%m-%d %H:%M:%S", time())));
        echo "
        </font>
    </td>
</tr>
</table>

<table cellpadding=\"0\" cellspacing=\"0\" width=\"99%\" border=\"0\" align=\"center\" bgcolor=\"#B6CCE1\">
<tr>
    <td bgcolor=\"#B6CCE1\" colspan=\"4\"><img src=\"themes/Turing/images/pixel.gif\" alt=\"\" width=\"1\" height=\"1\" border=\"0\" hspace=\"0\"></td>
</tr>
<tr valign=\"middle\" bgcolor=\"#28224C\">
    <td width=\"15%\" nowrap><font size=\"2\" color=\"#ffbb00\"><b>";
    if ($username == "") {
        echo "&nbsp;&nbsp;<b>_RCREATEACCOUNT</b>";
    } else {
        echo "&nbsp;&nbsp;"._HELLO."<br>&nbsp;&nbsp;$username!";
    }
    echo "
        </b></font>
    </td>
    <td align=\"center\" height=\"20\">";

    include("themes/Turing/top_links.php");

    echo "
    </td>
    <td align=\"right\">
        <form method=\"POST\" action=\"search.php\">
            <font class=\"pn-normal\">"._SEARCH."&nbsp;
           <input class=\"pn-text\" NAME=\"query\" TYPE=\"text\" VALUE=\"\"></font>&nbsp;
        </form>
    </td>
</tr>
<tr>
    <td bgcolor=\"#B6CCE1\" colspan=\"4\"><img src=\"themes/Turing/images/pixel.gif\" alt=\"\" width=\"1\" height=\"1\" border=\"0\" hspace=\"0\"></td>
</tr>
</table>

<!-- Turing Theme: End Title Bar-->

<table width=\"99%\" cellpadding=\"0\" cellspacing=\"0\" border=\"0\" bgcolor=\"#333366\" align=\"center\">
<tr valign=\"top\">
    <td bgcolor=\"#333366\">
    <img src=\"themes/Turing/images/pixel.gif\" alt=\"\" width=\"1\" height=\"20\" border=\"0\">
    </td>
</tr>
</table>

<table width=\"99%\" cellpadding=\"0\" cellspacing=\"0\" border=\"0\" bgcolor=\"#333366\" align=\"center\">
<tr valign=\"top\">
    <td bgcolor=\"#333366\">
        <img src=\"themes/Turing/images/pixel.gif\" alt=\"\" width=\"10\" height=\"1\" border=\"0\">
    </td>
    <td bgcolor=\"#333366\" width=\"150\" valign=\"top\">";
    blocks(left);
    echo "
    </td>
    <td>
        <img src=\"themes/Turing/images/pixel.gif\" alt=\"\" width=\"15\" height=\"1\" border=\"0\">
    </td>
    <td width=\"100%\">

<!-- Turing Theme: End Header -->

";
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
	echo "
    </td>
    <td>
        <img src=\"themes/Turing/images/pixel.gif\" alt=\"\" width=\"15\" height=\"1\" border=\"0\">
    </td>
    <td valign=\"top\" width=\"150\">";
	blocks(right);
    }
    echo "
<!-- Turing Theme: Begin Footer -->

    </td>
    <td bgcolor=\"#333366\">
        <img src=\"themes/Turing/images/pixel.gif\" alt=\"\" width=\"10\" height=\"1\" border=\"0\">
    </td>
</tr>
</table>

<table width=\"99%\" cellpadding=\"0\" cellspacing=\"0\" border=\"0\" bgcolor=\"#333366\" align=\"center\">
<tr align=\"center\">
    <td width=\"100%\" colspan=\"3\">";
    footmsg();
    echo "
    </td>
</tr>
<tr valign=\"bottom\">
    <td align=\"left\">
        <img src=\"themes/Turing/images/corner-bottom-left.gif\" alt=\"\" align=\"left\" border=\"0\" hspace=\"0\">
    </td>
    <td width=\"100%\">&nbsp;</td>
    <td>
    <img src=\"themes/Turing/images/corner-bottom-right.gif\" alt=\"\" align=\"right\" border=\"0\" hspace=\"0\">
    </td>
</tr>
</table>

<br>

<!-- Turing Theme: End Footer -->
";
}

/************************************************************/
/* Function themeindex()                                    */
/*                                                          */
/* This function format the stories on the Homepage         */
/************************************************************/

function themeindex ($aid, $informant, $time, $title, $counter, $topic, $thetext, $notes, $morelink, $topicname, $topicimage, $topictext) {
    global $anonymous, $tipath;
    echo "
    <table border=\"0\" cellpadding=\"1\" cellspacing=\"0\" bgcolor=\"#B6CCE1\" width=\"100%\">
    <tr><td>
    <table border=\"0\" cellpadding=\"0\" cellspacing=\"0\" bgcolor=\"#B6CCE1\" width=\"100%\">
    <tr><td>
    <table border=\"0\" cellpadding=\"5\" cellspacing=\"0\" bgcolor=\"#444490\" width=\"100%\">
    <tr><td align=\"left\">
        <font class=\"pn-storytitle\"><b>$title</b></font><br>
        <font class=\"pn-sub\">"._POSTEDBY." ";
    formatAidHeader($aid);
    echo " "._ON." $time $timezone ($counter "._READS.")<br></font>
    </td></tr></table>
    </td></tr></table>

    <table border=\"0\" cellpadding=\"5\" cellspacing=\"0\" bgcolor=\"#28224C\" width=\"100%\">
    <tr><td align=\"justify\">
        <b><a href=\"search.php?query=&amp;topic=$topic\"><img src=\"$tipath$topicimage\" border=\"0\" Alt=\"$topictext\" align=\"right\" hspace=\"10\" vspace=\"10\"></a></b>
        <font class=\"pn-normal\">";
    FormatStory($thetext, $notes, $aid, $informant);
    echo "
        </font>
    </td></tr></table>
    </td></tr></table>

    <table border=\"0\" cellpadding=\"0\" cellspacing=\"0\" bgcolor=\"#ffbb00\" width=\"100%\">
    <tr><td>
    <table border=\"0\" cellpadding=\"0\" cellspacing=\"0\" bgcolor=\"#333366\" width=\"100%\"><tr><td align=\"right\">
    <font color=\"#999999\" size=\"1\">$morelink</font>
    </td></tr></table>
    </td></tr></table>

    <br>
";
}

/************************************************************/
/* Function themearticle()                                  */
/*                                                          */
/* This function format the stories on the story page, when */
/* you click on that "Read More..." link in the home        */
/************************************************************/

function themearticle ($aid, $informant, $datetime, $title, $thetext, $topic, $topicname, $topicimage, $topictext) {
    global $admin, $sid, $tipath;
    echo "
    <table border=\"0\" cellpadding=\"1\" cellspacing=\"0\" bgcolor=\"#B6CCE1\" width=\"100%\">
    <tr><td>
    <table border=\"0\" cellpadding=\"0\" cellspacing=\"0\" bgcolor=\"#B6CCE1\" width=\"100%\">
    <tr><td>
    <table border=\"0\" cellpadding=\"5\" cellspacing=\"0\" bgcolor=\"#444490\" width=\"100%\">
    <tr><td align=\"left\">
        <font class=\"pn-storytitle\"<b>$title</b></font><br>
        <font class=\"pn-sub\">"._POSTEDON." $datetime "._BY." ";
    formatAidHeader($aid);
    if (is_admin($admin)) {
        echo "<br>[ <a class=\"pn-sub\" href=\"admin.php?op=EditStory&amp;sid=$sid\">"._EDIT."</a> | <a class=\"pn-sub\" href=\"admin.php?op=RemoveStory&amp;sid=$sid\">"._DELETE."</a> ]";
    }
    echo "
    </td></tr></table>
    </td></tr></table>

    <table border=\"0\" cellpadding=\"5\" cellspacing=\"0\" bgcolor=\"#28224C\" width=\"100%\">
    <tr><td align=\"justify\">
        <font class=\"pn-sub\"><b><a class=\"pn-sub\" href=\"search.php?query=&amp;topic=$topic\"><img src=\"$tipath$topicimage\" border=\"0\" Alt=\"$topictext\" align=\"right\" hspace=\"10\" vspace=\"10\"></a></b></font>
    <font class=\"pn-normal\">";
    FormatStory($thetext, $notes, $aid, $informant);
    echo "
    </td></tr></table>
    </td></tr></table>

    <br>
";
}

/************************************************************/
/* Function themesidebox()                                  */
/*                                                          */
/* Control look of your blocks. Just simple.                */
/************************************************************/

function themesidebox($title, $content) {
    echo "
    <table border=\"0\" cellpadding=\"1\" cellspacing=\"0\" bgcolor=\"#B6CCE1\" width=\"150\">
    <tr><td>
    <table border=\"0\" cellpadding=\"2\" cellspacing=\"1\" bgcolor=\"#444490\" width=\"100%\">
    <tr><td align=\"center\">
        <font class=\"pn-title\"><b>$title</b></font>
    </td></tr>
    <tr valign=\"top\"><td bgcolor=\"#28224C\">
        <font class=\"pn-normal\">$content</font>
    </td></tr></table>
    </td></tr></table>

    <br>
";
}

?>
