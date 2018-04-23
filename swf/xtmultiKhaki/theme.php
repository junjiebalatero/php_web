
<?php
/****************************************************************/
/*	This theme LUNCH based on design idea of site		*/
/*			www.dinerminor.com                      */
/****************************************************************/


$thename = "xtmultiKhaki";
$lnkcolor = "#225588";
$bgcolor1 = "#F6F6EB";
$bgcolor2 = "#D8D8C4";
$bgcolor3 = "#B7B78B";
$textcolor1 = "#000000";
$textcolor2 = "#000000";
$hr = 1; # 1 to have horizonal rule in comments instead of table bgcolor

function OpenTable() {
    global $bgcolor1, $bgcolor2;
    echo "<table width=\"100%\" border=\"0\" cellspacing=\"1\" cellpadding=\"0\" bgcolor=\"$bgcolor2\"><tr><td>\n";
    echo "<table width=\"100%\" border=\"0\" cellspacing=\"1\" cellpadding=\"8\" bgcolor=\"$bgcolor1\"><tr><td>\n";
}

function OpenTable2() {
    global $bgcolor1, $bgcolor2;
    echo "<table border=\"0\" cellspacing=\"1\" cellpadding=\"0\" bgcolor=\"$bgcolor2\" align=\"center\"><tr><td>\n";
    echo "<table border=\"0\" cellspacing=\"1\" cellpadding=\"8\" bgcolor=\"$bgcolor1\"><tr><td>\n";
}

function CloseTable() {
    echo "</td></tr></table></td></tr></table>\n";
}

function CloseTable2() {
    echo "</td></tr></table></td></tr></table>\n";
}

function themeheader() {
include ("themes/xtmultiKhaki/topheader.php");
global $banners, $sitename, $slogan;
echo "<table border=1 cellpadding=0 cellspacing=0 width=100% align=center><tr><td>
<table border=1 cellspacing=0 cellpadding=10 width=100%><tr><td background=\"themes/xtmultiKhaki/images/tittel.gif\">
<span class=\"sitename\"><q>&nbsp;&nbsp;$sitename&nbsp;&nbsp;</q></span>
</td><td align=center background=\"themes/xtmultiKhaki/images/tittel.gif\">";

    if ($banners) {
	include("banners.php");
    }

    echo "</td>

<td align=right background=\"themes/xtmultiKhaki/images/tittel.gif\">
    <form action=search.php method=post>
    <font size=2>"._SEARCH."
    <input type=text name=query>&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
    </form>
</td></tr></table><table border=0 cellspacing=0 cellpadding=0 width=100%><tr><td  background=\"themes/xtmultiKhaki/images/tittel.gif\" span class=\"sitename\" valign=top width=100%>
 <span class=\"slogan\"><q>&nbsp;&nbsp;$slogan</q></span>
 </td></tr></table></td></tr><tr><td valign=top width=100%>
<table border=0 cellspacing=0 cellpadding=0 width=100%><tr><td valign=top width=90>";

blocks(left);

echo "<img src=images/pix.gif border=0 width=150 height=1></td><td>&nbsp;&nbsp;</td><td width=100% valign=top>";
}

function themefooter() {
global $index;
	if ($index == 1) {
    echo "</td><td>&nbsp;&nbsp;</td><td valign=\"top\">";
        blocks(right);
    echo "</td>";
}
echo "</td></tr></table></td></tr></table>";
include ("themes/xtmultiKhaki/mfooter.php");
echo   "<table cellpadding=\"8\" cellspacing=\"0\" width=\"100%\" border=\"1\"><tr><td widht=\"100%\" align=\"left\" background=\"themes/xtmultiKhaki/images/tittel.gif\">\n";
footmsg();
echo "</table>";
}

function themeindex ($aid, $informant, $time, $title, $counter, $topic, $thetext, $notes, $morelink, $topicname, $topicimage, $topictext) {
    global $tipath, $anonymous;
    echo "<table border=\"1\" cellpadding=\"0\" cellspacing=\"4\" align=\"center\" width=\"100%\" background=\"themes/xtmultiKhaki/images/tittel.gif\"><tr><td background=\"themes/xtmultiKhaki/images/tittel.gif\">"
        ."<table border=\"0\" cellpadding=\"10\" cellspacing=\"0\" width=\"100%\"><tr><td background=\"themes/xtmultiKhaki/images/tittel.gif\">"
        ."<span class=\"title\">$title</span><br>"
        ."<font size=\"1\">"
        .""._POSTEDBY."<b>";
        formatAidHeader($aid);
        echo "</b> "._ON." $time $timezone ($counter "._READS.")<br>";
    if ($aid == $informant) {
        $boxstuff = "$thetext";
    } else {
        if ($informant != "") {
            $boxstuff = "<a href=\"user.php?op=userinfo&uname=$informant\">$informant</a> ";
        } else {
            $boxstuff = "$anonymous ";
        }
        $boxstuff .= ""._WRITES." <i>\"$thetext\"</i> $notes";
    }
    echo "<b>"._TOPICS.":</b> <a href=\"search.php?query=&topic=$topic\">$topictext</a><br>"
        ."</td></tr><tr><td span class=\"themearticle\">"
        ."<a href=\"search.php?query=&topic=$topic\"><img src=\"$tipath$topicimage\" Alt=\"$topictext\" align=\"right\" border=\"0\"></a>"
        ."$boxstuff<br><br>"
        ."</td></tr><tr><td align=\"right\" background=\"themes/xtmultiKhaki/images/tittel.gif\">"
        ."<font size=2>$morelink"
        ."</td></tr></table></td></tr></table><br>";
}

/*****************************************************************/
/* Function themearticle() is to create the article page, shown  */
/* when you click on "comments" or "read more" link from home    */
/*****************************************************************/


function themearticle ($aid, $informant, $datetime, $title, $thetext, $topic, $topicname, $topicimage, $topictext) {
    global $admin, $sid, $tipath;
    echo "<table border=1 cellpadding=\"0\" cellspacing=4 align=center width=100% background=\"themes/xtmultiKhaki/images/tittel.gif\"><tr><td>"
        ."<table border=0 cellpadding=\"10\" cellspacing=0 width=100%><tr><td background=\"themes/xtmultiKhaki/images/tittel.gif\">"
        ."<b>$title</b><br><font size=1>"._POSTEDON." $datetime";
    if ($admin) {
        echo "&nbsp;&nbsp;[ <a href=\"admin.php?op=EditStory&sid=$sid\">"._EDIT."</a> | <a href=\"admin.php?op=RemoveStory&sid=$sid\">"._DELETE."</a> ]";
    }
    echo "<br>"._TOPIC.": <a href=\"search.php?query=&topic=$topic&author=\">$topictext</a>"
        ."</td></tr><tr><td span class=\"themearticle\">";
    if ($aid == $informant) {
        $boxstuff = "$thetext";
    } else {
        if($informant != "") {
            $boxstuff = "<a href=\"user.php?op=userinfo&uname=$informant\">$informant</a> ";
        } else {
            $boxstuff = "$anonymous ";
        }
        $boxstuff .= ""._WRITES." <i>\"$thetext\"</i> $notes";
    }
    echo "<a href=\"search.php?query=&topic=$topic\"><img src=\"$tipath$topicimage\" Alt=\"$topictext\" align=\"right\" border=\"0\"></a>"
        ."$boxstuff";
    echo "</td></tr></table></td></tr></table><br>";
}

/*****************************************************************/
/* Function themesidebox() is to create left and right boxes on  */
/* the site                                                      */
/*****************************************************************/

function themesidebox($title, $content) {
    echo "<table border=\"1\" cellspacing=\"4\" cellpadding=\"0\" width=\"180\" background=\"themes/xtmultiKhaki/images/tittel.gif\"><tr><td>"
        ."<table width=\"100%\" border=\"0\" cellspacing=\"0\" cellpadding=\"10\"><tr><td background=\"themes/xtmultiKhaki/images/tittel.gif\">"
        ."<font size=\"2\"><span class=\"title\"><center><marquee width=\"100%\" behavior=\"alternate\" loop=\"1\" align=\"middle\">$title</marquee></center></span></td></tr><tr><td span class=\"boxstuff\"><font size=\"2\">"
        ."$content"
        ."</td></tr></table></td></tr></table><br>";
}

function themecenterposts($title, $content) {
    echo "<table border=\"1\" cellpadding=\"0\" cellspacing=\"4\" align=\"center\" width=\"100%\" background=\"themes/xtmultiKhaki/images/tittel.gif\"><tr><td>"
        ."<table border=\"0\" cellpadding=\"5\" cellspacing=\"0\" width=\"100%\"><tr><td background=\"themes/xtmultiKhaki/images/tittel.gif\">"
        ."<b>$title</b>"
    ."<br>"
        ."</td></tr><tr><td background=\"themes/xtmultiKhaki/images/tittel.gif\">"
        ."$content"
        ."</td></tr><tr><td align=\"right\"  background=\"themes/xtmultiKhaki/images/tittel.gif\">"
        ."<font size=2>&nbsp;"
        ."</td></tr></table></td></tr></table><br>";

}
?>
