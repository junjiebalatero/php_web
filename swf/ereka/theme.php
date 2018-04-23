<?php

$thename = "Psiborg.de";
$bgcolor1   = "#d9d9d9";
$bgcolor2   = "#999999";
$bgcolor3   = "#FFFFFF";
$bgcolor4   = "#FFFFFF";
$textcolor1 = "#FFFFFF";
$textcolor2 = "#000000";

function OpenTable() {
    global $bgcolor1, $bgcolor2;
    echo "<table width=\"100%\" border=\"0\" cellspacing=\"1\" cellpadding=\"0\" bgcolor=\"$bgcolor2\"><tr><td>\n";
    echo "<table width=\"100%\" border=\"0\" cellspacing=\"1\" cellpadding=\"8\" bgcolor=\"$bgcolor1\"><tr><td>\n";
}

function OpenTable2() {
    global $bgcolor1, $bgcolor2;
    echo "<center>";
    echo "<table border=\"0\" cellspacing=\"1\" cellpadding=\"0\" bgcolor=\"$bgcolor2\"><tr><td>\n";
    echo "<table border=\"0\" cellspacing=\"1\" cellpadding=\"8\" bgcolor=\"$bgcolor1\"><tr><td>\n";
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
echo "<LINK rel=\"StyleSheet\" HREF=\"themes/ereka/style/style.css\" TYPE=\"text/css\">";
  echo "<body  bgcolor=FFCC00 text=000000 topmargin=1 leftmargin=0 rightmargin=0 marginheight=3 <body link=#706C80 vlink=#706C80 alink=#706C80>
<br><table cellSpacing=0 cellPadding=0 width=98% align=center bgColor=#fefefe border=0>
  <tbody>
    <tr vAlign=top bgColor=#eeeeee>
      <td align=middle  bgColor=#ffffff><img height=16 alt hspace=0 src=themes/ereka/images/roundcorner-tl.gif width=17 align=left><img alt hspace=0 src=themes/ereka/images/roundcorner-tr.gif align=right width=17 height=17></td>
    </tr>
  </tbody>
</table>
<table cellSpacing=0 cellPadding=0 width=98% align=center bgColor=#fefefe border=0 nowrap>
  <tbody>
    <tr>
      <td align=middle height=17>";

echo "<center><table cellSpacing=0 cellPadding=0 width=97% border=0>
  <tr>
    <td>
<center><table cellSpacing=0 cellPadding=0 width=100% border=0 >
  <tr>
    <td><!-- Images entetes -->
      <div align=center>
<table cellSpacing=0 cellPadding=0 width=100% border=0>
  <tr>
    <td vAlign=bottom>";?>
<table border="0" width="491" height="13" cellspacing="0" cellpadding="0" bgColor=#e3c400>
  <tr>
    <td width="100%">
    <map name="FPMap0">
    <area href="contact.php" shape="rect" coords="111, 0, 165, 17">
    <area href="links.php?op=AddLink" shape="rect" coords="171, 0, 257, 17">
    <area href="outils.php" shape="rect" coords="262, 0, 343, 17">
    <area href="mwhois.php" shape="rect" coords="352, 0, 417, 17">
    <area href="Page.php?sondage=proposer" shape="rect" coords="422, 0, 487, 17"></map><img border="0" src="themes/ereka/images/cherche_o.gif" usemap="#FPMap0" width="491" height="18">
    </td>
  </tr>
</table>
<? echo "<table cellSpacing=0 cellPadding=0 width=100% bgColor=#e3c400 border=0>
        <tbody>
          <tr>
            <td>
              <table cellSpacing=0 cellPadding=0 width=100% bgColor=#f7e014 border=0>
                <tbody>
                  <tr>
                    <td><form action=search.php method=post><img hspace=1 src=themes/ereka/images/loupe2_o.gif align=top border=0 width=19 height=20>";?> <input type=text size 30 name=query style="background-color: #FFFFFF"><? echo "<INPUT TYPE=image hspace=2 src=themes/ereka/images/go_francite.gif align=absMiddle border=0 width=24 height=18><input type=radio CHECKED value=1 name=mode><img src=themes/ereka/images/webfrancophone.gif align=absMiddle border=0 width=90 height=11><input type=radio value=2 name=mode><img src=themes/ereka/images/toutleweb.gif align=absMiddle border=0 width=58 height=11></td></form>
                    <td align=right width=50>&nbsp;</td><td>";?><form action="search.php" method=get><FONT size="1"><BR><?php echo "<img border=0 src=themes/ereka/images/sujet.gif> ";?>
<!-- Topic Selection -->
    <?php $toplist = mysql_query("select topicid, topictext from topics order by topictext");
    echo "<SELECT NAME=\"topic\"onChange='submit()'>" ; ?> style="background-color: #FFFFFF"<?
    echo "<OPTION VALUE=\"\">"._ALLTOPICS."</option>\n";
    while(list($topicid, $topics) = mysql_fetch_row($toplist)) {
    if ($topicid==$topic) { $sel = "selected "; }
	echo "<option $sel value=\"$topicid\">$topics</option>\n";
    $sel = "";
    }
    echo "</SELECT></FONT></FORM></td>
                  </tr>
                </tbody>
              </table>
            </td>
          </tr>
        </tbody>
      </table>
    </td>
  </tr>
</table>
  <table border=0 width=100% bgcolor=#F8E018 cellspacing=0 cellpadding=0>
    <tr>
      <td width=100% align=center>
        <table border=0 width=100% cellspacing=0 cellpadding=0 bgcolor=#F8E010>
          <tr>
            <td width=11%>
              <p align=center>
 
            <a href=EnvMail.php?email=pop><img src=themes/ereka/images/bouton1.gif border=0 width=26 height=24><br>
              <font size=2 color=#606438> <b>MailBox</font></a></b>
            </td>
            <td width=11%>
              <p align=center>
 
            <a href=download.php><img src=themes/ereka/images/bouton2.gif border=0 width=26 height=24><br>
              <font size=2 color=#606438> <b>"._DOWNLOADS."</font></a></b>
            </td>
            <td width=11%>
              <p align=center>
 
            <a href=submit.php><img src=themes/ereka/images/bouton3.gif border=0 width=26 height=24><br>
              <font size=2 color=#606438> <b>"._SUBMITNEWS."</font></a></b>
            </td>
            <td width=11%>
              <p align=center>
 
            <a href=links.php><img src=themes/ereka/images/bouton4.gif border=0 width=26 height=24><br>
              <font size=2 color=#606438> <b>"._LINKS."</font></a></b>
            </td>
            <td width=11%>
              <p align=center>
 
            <a href=user.php><img src=themes/ereka/images/bouton5.gif border=0 width=26 height=24><br>
              <font size=2 color=#606438> <b>"._USERLOGIN."</font></a></b>
            </td>
            <td width=11%>
              <p align=center>
 
            <a href=memberslist.php><img src=themes/ereka/images/bouton6.gif border=0 width=26 height=24><br>
              <font size=2 color=#606438> <b>"._MEMBERSLIST."</font></a></b>
            <td width=11%>
              <p align=center>
 
            <a href=faq.php><img src=themes/ereka/images/bouton8.gif border=0 width=26 height=24><br>
              <font size=2 color=#606438><b>"._FAQ."</font></a></b>
            </td>
          </tr>
        </table>
      </td>
    </tr>
    <tr>
      <td width=100% align=center><b><font size=1>&nbsp; </font></b></td>
    </tr>
  </table>
</div>
    </td>
  </tr>
</table>
</td></tr><tr><td valign=top width=100% bgcolor=FFFFFF>
<table border=0 cellspacing=0 cellpadding=2 width=100%><tr><td valign=top width=150 bgcolor=FFFFFF>";
    blocks(left);
echo "</td><td>&nbsp;</td><td width=100% valign=top>";
?>
<div align="center">
  <center>

<table border="0" cellspacing="1" width="370">
  <tr>
      <td vAlign=top align=middle><a href=index.php><img border=0 src=themes/ereka/images/logo.gif alt=Psiborg.de></a></td>
  </tr>
</table>

  </center>
</div><? echo "<font face='Times New Roman'size=2>";


}

function themefooter() {
   global $index;
    if ($index == 1) {
    echo "</td><td>&nbsp;&nbsp;</td><td valign=\"top\" bgcolor=\"#FFFFFF\">";
 blocks(right);
 loginbox();
   }
echo "</td></tr></table></td></tr></table> </td>
    </tr>
    <tr>
      <td align=middle height=17><img alt hspace=0 src=themes/ereka/images/roundcorner-bl.gif align=left width=17 height=17><img alt hspace=0 src=themes/ereka/images/roundcorner-br.gif align=right width=17 height=17></td>
    </tr>
  </tbody>
</table>
<br>";

echo "<table cellSpacing=0 cellPadding=0 width=95% align=center bgColor=#fefefe border=0>
  <tbody>
    <tr vAlign=top bgColor=#eeeeee>
      <td align=middle  bgColor=#ffffff><img height=16 alt hspace=0 src=themes/ereka/images/roundcorner-tl.gif width=17 align=left><img alt hspace=0 src=themes/ereka/images/roundcorner-tr.gif align=right width=17 height=17></td>
    </tr>
  </tbody>
</table>
<table cellSpacing=0 cellPadding=0 width=95% align=center bgColor=#fefefe border=0 nowrap>
  <tbody>
    <tr>
      <td align=middle height=17><table><tr>
<td> <center>       <br>";
footmsg(); echo "</td>
  </tr>
</table></center></table></td>
    </tr>
<table cellSpacing=0 cellPadding=0 width=95% align=center bgColor=#fefefe border=0>
  <tbody>
    <tr vAlign=top bgColor=#eeeeee>
      <td align=middle  bgColor=#ffffff><img alt hspace=0 src=themes/ereka/images/roundcorner-bl.gif align=left width=17 height=17><img alt hspace=0 src=themes/ereka/images/roundcorner-br.gif align=right width=17 height=17></td>
    </tr>
  </tbody>
</table>  </tbody>
</table>
<br>";
}

function themeindex ($aid, $informant, $time, $title, $counter, $topic, $thetext, $notes, $morelink, $topicname, $topicimage, $topictext) {
    global $tipath, $anonymous;
    echo "<div align=center>
  <center>

<table cellSpacing=1 cellPadding=0 width=100% border=0>
  <tr>
    <td align=middle bgcolor=#FFA400><img alt hspace=0 src=themes/ereka/images/gauche.gif align=left width=6 height=17><img alt hspace=0 src=themes/ereka/images/droite.gif align=right width=5 height=17>
      <p align=left><font face='Verdana, Arial, Helvetica, sans-serif' color=#FFFFFF size=4><b>
      &nbsp;&nbsp;&nbsp;$title</b></font></p>
    </td>
  </tr>
<tr bgColor=#ffffff>
    <td>
      <table cellSpacing=5 cellPadding=0 width=100% border=0>
        <tbody>
          <tr>
            <td width=105><a href=\"search.php?query=&topic=$topic\"><img src=\"$tipath$topicimage\" Alt=\"$topictext\" align=\"right\" border=\"0\"></td>
            <td vAlign=top>$thetext<br>$boxstuff<br>$morelink</td>
          </tr>
        </tbody>
      </table>
    </td>
  </tr>
</table>
<table cellSpacing=0 cellPadding=0 width=100% bgColor=#666666>
  <tr>
    <td bgcolor=#d9d9d9><font size=1>"._POSTEDBY."<b>";
	formatAidHeader($aid);
	echo "</b> "._ON." $time $timezone ( Lu $counter fois )<br>";
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
    echo "<b>"._TOPIC.":</b> <a href=\"search.php?query=&topic=$topic\">$topictext</a><br></td>
  </tr>
</table>




  </center><br>
</div>";
}


function themearticle ($aid, $informant, $datetime, $title, $thetext, $topic, $topicname, $topicimage, $topictext) {
    global $admin, $sid, $tipath;
    echo "<center>
    <table cellSpacing=1 cellPadding=0 width=100% border=0>
  <tr>
    <td align=middle bgcolor=#FFA400>
      <p align=left><img alt hspace=0 src=themes/ereka/images/gauche.gif align=left width=6 height=17><img alt hspace=0 src=themes/ereka/images/droite.gif align=right width=5 height=17>&nbsp;&nbsp;&nbsp;<font size=4 color=#ffffff face=helevtica,arial><b>$title</b><br>
    </td>
  </tr>
<tr><td><br>"; if ($aid == $informant) {
	$boxstuff = "$thetext";
    } else {
	if($informant != "") {
	    $boxstuff = "<a href=\"user.php?op=userinfo&uname=$informant\">$informant</a> ";
	} else {
	    $boxstuff = "$anonymous ";
	}
	$boxstuff .= ""._WRITES." <i>\"$thetext\"</i> $notes";
    }
    echo "<font size=2 color=#686868 face=helevtica,arial><a href=\"search.php?query=&topic=$topic\"><img src=\"$tipath$topicimage\" Alt=\"$topictext\" align=\"right\" border=\"0\"></a> "
	."$boxstuff"; 
   echo " </td>
  </tr>
</table><table cellSpacing=0 cellPadding=0 width=100% bgColor=#666666>
  <tr>
    <td bgcolor=#d9d9d9><font size=1>"._POSTEDON." $datetime<b>";
  if ($admin) {
        echo "&nbsp;&nbsp;[ <a href=\"admin.php?op=EditStory&sid=$sid\">"._EDIT."</a> | <a href=\"admin.php?op=RemoveStory&sid=$sid\">"._DELETE."</a> ]";
    }
    echo "<br>"._TOPIC.": <a href=\"search.php?query=&topic=$topic&author=\">$topictext</a><br></td>
  </tr>
</table>
";   
}


function themesidebox($title, $content) {
    echo "<table cellSpacing=0 cellPadding=0 width=140 height=22 border=0 bgcolor=#ffffff>
  <tr>
    <td background=themes/ereka/images/rubr_tit_recher.gif width=140 height=22><font face='Comic Sans MS' color=#fffff> &nbsp;&nbsp;<b>$title</b></font></td>
  </tr></table><table cellSpacing=0 cellPadding=0 width=140 border=0>
 <tr>
    <td>
      <table cellSpacing=0 cellPadding=0 width=140 border=0>
        <tbody>
          <tr>    <td background=themes/ereka/images/rubr_haus.gif width=140 height=4> </td>
            </tr><tr><td bgcolor=#d9d9d9>$content</td>
          </tr>
        </tbody>
      </table>
    </td>
  </tr>
  <tr>
    <td><img src=themes/ereka/images/rubr_bas.gif width=140 height=4></td>
  </tr>
</table>
<br>";
}

?>