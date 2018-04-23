<?PHP
# Top 10 download quick add-on for Post-nuke v0.6x
# Released as sidebox...

function topdown() {
global $prefix;
$contenttd .= "<table cellspacing=\"2\" cellpadding=\"2\" border=\"0\" width=\"100%\">";
$resulttd = mysql_query("select lid, cid, sid, title, hits from $prefix"._downloads_downloads." order by hits DESC LIMIT 0, 10");
while ($myrowtd = mysql_fetch_array($resulttd)) {
$contenttd .= "<tr><td bgcolor=\"$bgcolor2\"><font size=-2 color=\"#333355\"><a href=\"modules.php?op=modload&name=Downloads&file=index&req=viewsdownload&sid=$myrowtd[sid]\">$myrowtd[title]</a><br>Nb. hits : <span>$myrowtd[hits]</span></td></tr>\n";
}
$contenttd .= "</table>";
$boxtitletd = "Top 10 - Download";
themesidebox($boxtitletd, $contenttd);
mysql_free_result($resulttd);
}


topdown();
?>