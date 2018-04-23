<?php

$thename = "CCS";
$bgcolor1 = "#ffffff";
$bgcolor2 = "#cccccc";
$bgcolor3 = "#ffffff";
$bgcolor4 = "#eeeeee";
$textcolor1 = "#ffffff";
$textcolor2 = "#000000";

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

function newonline() {
    global $user, $cookie;
    cookiedecode($user);
    $ip = getenv("REMOTE_ADDR");
    $username = $cookie[1];
    if (!isset($username)) {
        $username = "$ip";
        $guest = 1;
    }
    $past = time()-900;
    mysql_query("DELETE FROM nuke_session WHERE time < $past");
    $result = mysql_query("SELECT time FROM nuke_session WHERE username='$username'");
    $ctime = time();
    if ($row = mysql_fetch_array($result)) {
	mysql_query("UPDATE nuke_session SET username='$username', time='$ctime', host_addr='$ip', guest='$guest' WHERE username='$username'");
    } else {
	mysql_query("INSERT INTO nuke_session (username, time, host_addr, guest) VALUES ('$username', '$ctime', '$ip', '$guest')");
    }

    $result = mysql_query("SELECT username FROM nuke_session where guest=1");
    $guest_online_num = mysql_num_rows($result);
    $result = mysql_query("SELECT username FROM nuke_session where guest=0");
    $member_online_num = mysql_num_rows($result);
 $nombresdemiembros="";
 if ($member_online_num>0){
  while ($noms=mysql_fetch_array($result)){
   $nombresdemiembros.="<a href='user.php?op=userinfo&uname=".$noms['username']."'>".$noms['username']."</a><br>";
  }
 }
    $who_online_num = $guest_online_num + $member_online_num;
	echo "<b>Online:</b>&nbsp;&nbsp;Convidados: $guest_online_num &nbsp;&nbsp; Membros: $member_online_num <br> Membros Online: $nombresdemiembros";
	$result2 = mysql_query("select to_userid from nuke_priv_msgs where to_userid='$uid'");
	$numrow = mysql_num_rows($result2);
	$content .= "Você tem <a href=\"viewpmsg.php\"><b>$numrow</b></a> Mensagens Pessoais";

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

function themeheader() { ?>

<script language="JavaScript1.2">
function high(which2){
theobject=which2
highlighting=setInterval("highlightit(theobject)",50)
}
function low(which2){
clearInterval(highlighting)
which2.filters.alpha.opacity=20
}
function highlightit(cur2){
if (cur2.filters.alpha.opacity<100)
cur2.filters.alpha.opacity+=5
else if (window.highlighting)
clearInterval(highlighting)
}
</script>

<?
    echo "<body bgcolor=#FFFFFF leftMargin=0 topMargin=0>";
    echo "<!--Topo da página-->"
	."<table width=100% border=0 cellspacing=0 cellpadding=0 bgcolor=#88E4E0><tr><td><img src=themes/CCS/images/a1.jpg width=170 height=150><img src=themes/CCS/images/a2.jpg width=230 height=150><img src=themes/CCS/images/a3.jpg width=220 height=150><img src=themes/CCS/images/a4.jpg width=140 height=150 align=top></td></tr></table>"
	."<!--Fim Topo de página--><!--Início Tabela do Menu por ícones -->"; ?>
	<table width=100% border=0 cellspacing=0 cellpadding=0 bgcolor=#88E0D8><tr><td width=22% valign=top><img src=themes/CCS/images/b1.jpg width=169 height=39 align=top></td>
    <td width=76><div align=center><img src=themes/CCS/images/icone4.gif width=35 height=35 style="filter:alpha(opacity=40)" onMouseover="high(this)" onMouseout="low(this)"><br><a href=sections.php?op=listarticles&secid=3>Dragon Ball</a></div></td>
    <td width=76><div align=center><img src=themes/CCS/images/icone5.gif width=35 height=35 style="filter:alpha(opacity=40)" onMouseover="high(this)" onMouseout="low(this)"><br><a href=reviews.php>Reviews</a></div></td>
    <td width=76><div align=center><img src=themes/CCS/images/icone1.gif width=35 height=35 style="filter:alpha(opacity=40)" onMouseover="high(this)" onMouseout="low(this)"><br><a href=sections.php?op=listarticles&secid=2>Dicas</a></div></td>
    <td width=76><div align=center><img src=themes/CCS/images/icone10.gif width=35 height=35 style="filter:alpha(opacity=40)" onMouseover="high(this)" onMouseout="low(this)"><br><a href=sections.php?op=listarticles&secid=5>Entrevistas</a></div></td>
    <td width=76><div align=center><img src=themes/CCS/images/icone2.gif width=35 height=35 style="filter:alpha(opacity=40)" onMouseover="high(this)" onMouseout="low(this)"><br><a href=links.php>Links</a></div></td>
    <td width=76><div align=center><img src=themes/CCS/images/icone3.gif width=35 height=35 style="filter:alpha(opacity=40)" onMouseover="high(this)" onMouseout="low(this)"><br><a href=xx>Autores</a></div></td> <?

  	echo "</tr></table><!--Fim Tabela do Menu por ícones  -->";

	echo "<TABLE bgColor=#ffffff border=0 cellPadding=0 cellSpacing=0 width=100% hspace=0 vspace=0>";
	echo "<TBODY><TR><TD bgColor=#88e0d8 height=165 rowSpan=3 vAlign=top nowrap><!--Inicio Menu Principal -->";

    blocks(left);

	echo "</TD><TD vAlign=top width=100% align=center>"
	."<TABLE bgColor=#d0ccff border=0 cellPadding=0 cellSpacing=0 width=100%>"
	."<TBODY><TR><TD bgColor=#a8b0f0 width=6% bgcolor=#A8B0F0><img src=themes/CCS/images/quina1.gif width=36 height=36></td>"
	."<td width=94% class=online>";

echo newonline();


	echo "</TD></TR><TR><TD bgColor=#ffffff width=6%>&nbsp;</TD>"
	."<TD align=right bgColor=#ffffff width=94%>"
	."<IMG align=textTop border=0 height=27 hspace=0 src=themes/CCS/images/quina3.gif width=27 halign=right valign=top>"
	."</TD></TR></TBODY></TABLE>";

}

function themefooter() {
    global $index;



	echo "<br><TD bgColor=#a8b0f0 height=167 vAlign=top rowspan=3>"
	."<DIV align=center><!--Inico do Bloco Direito --> <BR>";

    if ($index == 1) {
	blocks(right);
	}

	echo "</DIV></TD></TR><TR><TD bgColor=#ffffff vAlign=bottom width=463>"
	."<IMG src=themes/CCS/images/quina2.gif align=bottom><!--Fim das notícias -->"
	."</TD></TR><TR><TD bgColor=#88e0d8 vAlign=top width=463>&nbsp;</TD>"
	."</TR></TBODY></TABLE><CENTER><FONT size=1>";

	include("banners.php"); 

	echo "<BR><BR></FONT></CENTER>";




}

function themeindex ($aid, $informant, $time, $title, $counter, $topic, $thetext, $notes, $morelink, $topicname, $topicimage, $topictext) {
    global $tipath, $anonymous;


	echo "<table width=95% border=0 cellspacing=0 cellpadding=0><tr>"
	."<td height=25 width=20><img src=themes/CCS/images/B-sup-esq.gif width=20 height=25 hspace=0></td>"
	."<td background=themes/CCS/images/B-meio.gif width=364><b><span class=titulo1> $title </span> </b></td>"
	."<td width=19 height=25 align=right><img src=themes/CCS/images/B-sup-dir.gif width=20 height=25></td>"
	."</tr><tr><td height=25 background=themes/CCS/images/B-lat-esq.gif align=left valign=top width=20>&nbsp;</td>"
	."<td bgcolor=#FFFFFF width=364><font size=2>"
	."<a href=\"search.php?query=&topic=$topic&author=\"><img src=\"$tipath$topicimage\" border=\"0\" Alt=\"$topictext\" align=\"right\" hspace=\"10\" vspace=\"10\"></a>";
    FormatStory($thetext, $notes, $aid, $informant);
	echo "</font></td><td height=25 background=themes/CCS/images/B-lat-dir.gif width=19 align=right bgcolor=#FFFFFF>"
	."<img src=themes/CCS/images/B-lat-dir.gif width=20 height=8></td>"
	."</tr><tr><td width=20 height=25 align=left valign=top>"
	."<img src=themes/CCS/images/B-inf-esq.gif width=20 height=25 hspace=0></td>"
	."<td bgcolor=#FFFFFF background=themes/CCS/images/B-meio.gif width=364>" 
	."<div align=right><font size=2>$morelink</font></div>"
	."</td><td width=19 height=25 align=right><img src=themes/CCS/images/B-inf-dir.gif width=20 height=25>"
	."</td></tr></table>"
	."<br>";
}

function themearticle ($aid, $informant, $datetime, $title, $thetext, $topic, $topicname, $topicimage, $topictext) {
    global $admin, $sid, $tipath;
    if ("$aid" == "$informant") {
	echo"
	<table border=0 cellpadding=0 cellspacing=0 align=center bgcolor=000000 width=100%><tr><td>
	<table border=0 cellpadding=3 cellspacing=1 width=100%><tr><td bgcolor=FFFFFF>
	<b>$title</b><br><font size=1>"._POSTEDON." $datetime <a href=\"search.php?query=&topic=$topic&author=\"><img src=\"$tipath$topicimage\" border=\"0\" Alt=\"$topictext\" align=\"right\" hspace=\"10\" vspace=\"10\"></a>";
	if ($admin) {
	    echo "&nbsp;&nbsp; $font2 [ <a href=admin.php?op=EditStory&sid=$sid>"._EDIT."</a> | <a href=admin.php?op=RemoveStory&sid=$sid>"._DELETE."</a> ]";
	}
	echo "
	<br>
	</td></tr><tr><td bgcolor=ffffff>
	$thetext 	
	</td></tr></table></td></tr></table><br>";
    } else {
	if($informant != "") $informant = "<a href=\"user.php?op=userinfo&uname=$informant\">$informant</a> ";
	else $boxstuff = "$anonymous ";
	$boxstuff .= ""._WRITES." <i>\"$thetext\"</i> $notes";
	echo "
	<table border=0 cellpadding=0 cellspacing=0 align=center bgcolor=000000 width=100%><tr><td>
	<table border=0 cellpadding=3 cellspacing=1 width=100%><tr><td bgcolor=FFFFFF>
	<b>$title</b><br><font size=2>"._CONTRIBUTEDBY." $informant "._ON." $datetime</font>";
	if ($admin) {
	    echo "&nbsp;&nbsp; $font2 [ <a href=admin.php?op=EditStory&sid=$sid>"._EDIT."</a> | <a href=admin.php?op=RemoveStory&sid=$sid>"._DELETE."</a> ]";
	}
	echo "
	<br>"._TOPIC.": <a href=search.php?query=&topic=$topic&author=>$topictext</a>
	</td></tr><tr><td bgcolor=ffffff>
	$thetext
	</td></tr></table></td></tr></table><br>";
    }
}

function themesidebox($title, $content) {
global $block_side; 
if($block_side == 'l') { // left side blocks 

	echo "<TABLE border=0 cellPadding=0 cellSpacing=0 hspace=0 vspace=0 align=center>"
	."<TBODY><TR><TD colspan=3><table width=75 border=0 cellspacing=0 cellpadding=0>"
	."<tr><td><table width=100% border=0 cellspacing=0 cellpadding=0><tr align=right>" 
	."<td colspan=3 height=25><img src=themes/CCS/images/B3-dir-sup.gif width=38 height=25>"
	."</td></tr><tr><td width=13 height=25>"
	."<img src=themes/CCS/images/B3-esq.gif width=13 height=25></td>"
	."<td background=themes/CCS/images/B3-meio.gif width=125 nowrap><div align=center><span class=titulo1>";

	echo "$title";
 
	echo "</span></div></td><td width=42 height=25>"
	."<img src=themes/CCS/images/B3-dir-inf.gif height=25 width=50></td></tr></table></td>"
	."</tr></table></TD></TR><TR><TD width=12>&nbsp;</TD><TD vAlign=top width=164>"
	."<FONT size=2>"; 

if (file_exists($content)) { 
    $fp = fopen ($content, "r"); 
    $content = fread($fp, filesize($content)); 
    fclose ($fp); 
    $content = "?>$content<?"; 
    echo eval($content); 
} else { 
    echo $content; 
} 


	echo "</FONT></TD><TD width=17 align=center>&nbsp;</TD></TR><TR><TD height=29 colspan=3>"
	."<table width=75 border=0 cellspacing=0 cellpadding=0><tr><td>"
	."<table width=100% border=0 cellspacing=0 cellpadding=0><tr><td colspan=3 height=25 align=left valign=bottom>"
	."<img src=themes/CCS/images/invB3dirsup.gif width=38 height=25></td></tr><tr>" 
	."<td width=50 height=25><img src=themes/CCS/images/invB3dirinf.gif width=50 height=25>"
	."</td><td background=themes/CCS/images/B3-meio.gif nowrap width=125>&nbsp;</td>"
	."<td width=17 height=25><img src=themes/CCS/images/invB3esq.gif width=13 height=25></td>"
	."</tr></table></td></tr></table></TD></TR></TBODY></TABLE> <br>";     

} 
else { 

	echo "<table border=0 cellpadding=0 cellspacing=0 hspace=0 vspace=0 align=center>"
	."<tbody><tr><td colspan=3><table width=75 border=0 cellspacing=0 cellpadding=0>"
	."<tr><td><table width=100% border=0 cellspacing=0 cellpadding=0><tr>"
	."<td colspan=3 align=right valign=bottom><div align=left>"
	."<img src=themes/CCS/images/invB1dir1.gif width=42 height=17></div></td></tr>"
	."<tr><td width=13 height=25><img src=themes/CCS/images/invB1dirinf.gif width=42 height=25></td>"
	."<td background=themes/CCS/images/B1-meio.gif nowrap width=125><span class=titulo1>";

echo "$title";


	echo "</span></td><td width=42 height=25><img src=themes/CCS/images/invB1esq.gif width=13 height=25></td>"
	."</tr></table></td></tr></table></td></tr><tr><td width=12>&nbsp;</td><td valign=top width=164>"
	."<font size=2>";


echo "$content";

	echo "</font></td><td width=17 align=center>&nbsp;</td></tr><tr><td height=29 colspan=3>"
	."<table width=100% border=0 cellspacing=0 cellpadding=0>"
	."<tr><td colspan=3><div align=right>"
	."<img src=themes/CCS/images/B1-dir-sup.gif width=42 height=17></div></td></tr>"
	."<tr><td width=13 height=25><img src=themes/CCS/images/B1-esq.gif width=13 height=25>"
	."</td><td background=themes/CCS/images/B1-meio.gif nowrap>&nbsp;</td>"
	."<td width=42 height=25><img src=themes/CCS/images/B1-dir-inf.gif width=42 height=25>"
	."</td></tr></table> </td>   </tr>    </tbody>  </table> <br>  ";
    
} 
} 



?>