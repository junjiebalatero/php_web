<?php
##############################################################
# Morefunc.php file from DGFR theme for PHP-Nuke 5
# # this file is called from Theme.php in DGFR Theme dir.
# http://duns-ground.fr.st
# duns1@free.fr
#
# you could directly include in mainfile.php
# following functions or use them separatly
# since they come from hack, forums, articles of Nuked Website
# and from me.
#
# Released under GPL
# Copyright Denis Villechalane 2001
# PHP-Nuke:
# http://phpnuke.org
# http://www.nukeaddon.com/
##############################################################

# display info server status on current URI
function infoURI() {
echo "<form action='$PHP_SELF' method='post'>";
echo "<textarea name='edit' cols='40' rows='5'></textarea>";
echo "<input type='Submit' name='send' value='Envoyer'>";
echo "</form>";
$cl= apache_lookup_uri($PHP_SELF);
foreach ($cl as $k=>$elem) {
   echo "$k => $elem<br>";
}
}

function disptime() {
$browser = getenv("HTTP_USER_AGENT");
 if (ereg("MSIE", "$browser")) {
?>
<font class="artitle" align="center">
<B>
<SCRIPT type="text/javascript" language="JavaScript">
<!--
  var thisday=new Date();
  var day=thisday.getDay();
  if (day == 0){document.write("Sunday");}
  if (day == 1){document.write("Monday");}
  if (day == 2){document.write("Tuesday");}
  if (day == 3){document.write("Wednesday");}
  if (day == 4){document.write("Thursday");}
  if (day == 5){document.write("Friday");}
  if (day == 6){document.write("Saturday");}
  document.write("  "+thisday.getDate()+" ");
  var day=thisday.getMonth();
  if (day == 0){document.write("January");}
  if (day == 1){document.write("February");}
  if (day == 2){document.write("March");}
  if (day == 3){document.write("April");}
  if (day == 4){document.write("May");}
  if (day == 5){document.write("June");}
  if (day == 6){document.write("July");}
  if (day == 7){document.write("August");}
  if (day == 8){document.write("September");}
  if (day == 9){document.write("October");}
  if (day == 10){document.write("November");}
  if (day == 11){document.write("December");}
// -->
</SCRIPT>
&nbsp;-&nbsp;</b></font><font class="artext" id="horloge"></font>
<?PHP
echo "&nbsp;:::&nbsp;";
}
}

function disptimefr() {
$browser = getenv("HTTP_USER_AGENT");
        if (ereg("MSIE", "$browser")) {
?>
<font class="artitle" align="center">
<B>
<SCRIPT type="text/javascript" language="JavaScript">
<!--
  var thisday=new Date();
  var day=thisday.getDay();
  if (day == 0){document.write("Dimanche");}
  if (day == 1){document.write("Lundi");}
  if (day == 2){document.write("Mardi");}
  if (day == 3){document.write("Mercredi");}
  if (day == 4){document.write("Jeudi");}
  if (day == 5){document.write("Vendredi");}
  if (day == 6){document.write("Samedi");}
  document.write("  "+thisday.getDate()+" ");
  var day=thisday.getMonth();
  if (day == 0){document.write("janvier");}
  if (day == 1){document.write("février");}
  if (day == 2){document.write("mars");}
  if (day == 3){document.write("avril");}
  if (day == 4){document.write("mai");}
  if (day == 5){document.write("juin");}
  if (day == 6){document.write("juillet");}
  if (day == 7){document.write("août");}
  if (day == 8){document.write("septembre");}
  if (day == 9){document.write("octobre");}
  if (day == 10){document.write("novembre");}
  if (day == 11){document.write("décembre");}
// -->
</SCRIPT>
&nbsp;&nbsp;</b></font><font class="artext" id="horloge"></font>
<?
}
}

function identip() {
global $index, $cookie, $user, $username;
#   if ($index == 1) {
echo "&nbsp;&nbsp;";
# visitor identification
cookiedecode($user);
$ip = getenv("REMOTE_ADDR");
$username = $cookie[1];
if (!isset($username)) {
$username = "$ip";
$guest = 1;
}
if ($cookie[1] == "") {
echo "<b>Welcome IP $ip,";
echo " login or register&nbsp;<a href=\"user.php\">here...</a></b>";
} else {
echo "<b>Welcome <a href=\"user.php\">$cookie[1]</a>&nbsp;!</b>";
}
#}
}

function recenttopics() {
    global $prefix;
    $boxstuff = "";
    $boxtitle = "";
	$topnum = "3";
    $query="SELECT topic_id, topic_title, topic_time, topic_views, forum_id FROM $prefix"._forumtopics." ORDER BY topic_time desc LIMIT $topnum";
    $resultrt=mysql_query($query);
    $boxstuff .="<center><a href=\"modules.php?op=modload&name=Forum&file=index\">";
    $boxstuff .="<img src=\"themes/dgfr/images/minib1.gif\" border=0 valign=top>&nbsp;Last posts...</a><br>";
    while ($myarray=mysql_fetch_array($resultrt))
	{
	$boxstuff .= "&nbsp;";
	$boxstuff .= "<a href=\"modules.php?op=modload&name=Forum&file=viewtopic&topic=$myarray[topic_id]&forum=$myarray[forum_id]\">";

	$boxstuff .= "$myarray[topic_title]</a> (x$myarray[topic_views])";
	#echo "&nbsp;$myarray[topic_time]";
	$boxstuff .= "<br>";
	}
	 $boxstuff .= "</font></center>";

    themecenterposts($boxtitle, $boxstuff);
	mysql_free_result($resultrt);
}

function recentdown() {
    global $prefix, $sitename;

    $boxstuff = "";
    $boxtitle = "";
	$topdown = "3";
    $boxstuff .="<center><a href=\"download.php\">";
    $boxstuff .="<img src=\"themes/dgfr/images/minib1.gif\" border=0 valign=top>&nbsp;Last files available on $sitename...</a><br>";
	$resultld = mysql_query("select lid, cid, sid, title, date, hits from $prefix"._downloads_downloads." order by date DESC LIMIT $topdown");
	while ($myrowld = mysql_fetch_array($resultld)) {
	$boxstuff .= "&nbsp;<a href=\"modules.php?op=modload&name=Downloads&file=index&req=viewsdownload&sid=$myrowld[sid]\">$myrowld[title]</a> (x$myrowld[hits])<br>\n";
	#echo "&nbsp;$myrowld[date]<br>\n";
	}
	$boxstuff .= "</center>";
	$boxtitle = "";


    themecenterposts($boxtitle, $boxstuff);
    mysql_free_result($resultld);
}

function online1() {
global $prefix, $bgcolor4, $textcolor3;
$count = 0;
$query = "SELECT username, host_addr FROM $prefix"._session."";
$results = mysql_query ($query);
echo "<br><br>";
print ("<table border=1, align=center cellpadding=0 cellspacing=0 bgcolor=$bgcolor4 bordercolor=$textcolor3><tr><td>");
print ("<center><font size=1 color=>Site Visitors at this moment...</center>");
print ("<table border=0, align=center cellpadding=0 cellspacing=3 bgcolor=$bgcolor4 bordercolor=$textcolor3>");
print ("<tr bgcolor=$bgcolor4><td align=center>&nbsp;User(s)&nbsp;</td><td align=center>&nbsp;IP&nbsp;</td><td align=center>&nbsp;Host&nbsp;</td></tr>");
while (list($username, $host_addr) = mysql_fetch_row($results))
{print ("<tr><td align=center><font class=boxmain color=$textcolor3>$username</font></td><td bgcolor=$textcolor3 ><font size=1 align=center>$host_addr</td>");
$host = gethostbyaddr ($host_addr);
print ("<td align=center><font class=boxmain>$host</tr>");
$count ++;
}
mysql_close;
print ("</table><center><font class=artinfo>There are  $count user(s) online.</font></center>");
print ("</tr></td></table>");
echo "<br>";
}
?>
