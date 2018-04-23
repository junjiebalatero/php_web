<?php
# Loading process and dynamic right click for DGFR Thematic v5
?>

<DIV ID="waitDiv" style="position:absolute;left:420px;top:180px;visibility:hidden">
<center><table cellpadding="6" cellspacing="0" border="1" bgcolor="#7777AA" bordercolor="#EEEEFF"><tr><td align="center">
<font color="#EEEEFF" face="Tahoma, Verdana, Arial, Helvetica, sans-serif" size="13px;"><b>Loading...</b></font><br>
<img src="themes/dgfr/images/nukeorange.gif" border="0" alt=""><br>
<font color="#ADAFDB" face="Tahoma, Verdana, Arial, Helvetica, sans-serif" size="2">Please Wait<br></font><font size=-2>&nbsp;Powered by DGFR Thematic v5&nbsp;</font>
</td></tr></table></center>
</DIV>
<SCRIPT>
<!--
var DHTML = (document.getElementById || document.all || document.layers);
function ap_getObj(name) { if (document.getElementById) { return document.getElementById(name).style; } else if (document.all) { return document.all[name].style;
} else if (document.layers) { return document.layers[name]; } } function ap_showWaitMessage(div,flag)  { if (!DHTML) return; var x = ap_getObj(div); x.visibility = (flag) ? 'visible':'hidden'
if(! document.getElementById) if(document.layers) x.left=280/2; return true; } ap_showWaitMessage('waitDiv', 1);
 //-->
</SCRIPT>

<?PHP
$browser = getenv("HTTP_USER_AGENT");
if (ereg("MSIE", "$browser")) {
?>

<DIV ID="contextMenu"
     ONMOUSEOUT="menu = this; this.tid = setTimeout('menu.style.visibility = \'hidden\'', 20);"
     ONMOUSEOVER="clearTimeout(this.tid);"
>
&nbsp;<br>
<A HREF="http://phpnuke.org"; CLASS="menu"
   ONMOUSEOVER="this.className = 'menuOn'"
   ONMOUSEOUT="this.className = 'menu';"
>
&nbsp;Go to PHP-Nuke
</A>
<BR>
<A HREF="http://nukeaddon.com"; CLASS="menu"
   ONMOUSEOVER="this.className = 'menuOn'"
   ONMOUSEOUT="this.className = 'menu';"
>
&nbsp;Go to NukeAddon
</A>
<BR>
<A HREF="http://www.boomtchak.net"; CLASS="menu"
   ONMOUSEOVER="this.className = 'menuOn'"
   ONMOUSEOUT="this.className = 'menu';"
>
&nbsp;Go to BoomTchak (Fr)
</A>
<BR>
<A HREF="http://www.kodred.fr.st"; CLASS="menu"
   ONMOUSEOVER="this.className = 'menuOn'"
   ONMOUSEOUT="this.className = 'menu';"
>
&nbsp;Go to KodRed (Fr)<br><br>
</A>
</DIV>
<?PHP
}
?>
