<?php
# Loading process and dynamic right click for DGFR Thematic v5
# default for $flashload & rightclick is enable is enabled
$flashload = 1;
$rightclk = 1;
if ($flashload == "0") {
?>
<DIV ID="waitDiv" style="position:absolute;left:420px;top:165px;visibility:hidden">
<center>
<table cellpadding="6" cellspacing="0" border="1" bgcolor="#7777AA" bordercolor="#EEEEFF"><tr><td align="center">
<font color="#EEEEFF" face="Tahoma, Verdana, Arial, Helvetica, sans-serif" size="13px;"><b>Loading...</b></font><br>
<img src="themes/dgfr/images/nukeorange.gif" border="0" alt=""><br>
<font color="#ADAFDB" face="Tahoma, Verdana, Arial, Helvetica, sans-serif" size="2">Please Wait<br></font><font size=-2>&nbsp;Powered by DGFR Thematic v5&nbsp;</font>
</td></tr></table></center>
</DIV>
<?PHP
} else {
?>
<DIV ID="waitDiv" style="position:absolute;left:0px;top:165px;visibility:hidden">
<center>
<br><br>
<table width="100%" border="0" cellspacing="0" cellpadding="5">
  <tr><td><img src="themes/dgfr/images/pixel.gif" height="150"></td>
  <td>
  <br>&nbsp;
  <br>&nbsp;
  <OBJECT id=rollload codeBase=http://active.macromedia.com/flash2/cabs/swflash.cab#version=4,0,0,0 classid=clsid:D27CDB6E-AE6D-11cf-96B8-444553540000 width=250 height=45>
  <param name="SCALE" value="exactfit">
  <PARAM NAME="movie" VALUE="themes/dgfr/images/flash/rollload.swf">
  <PARAM NAME="quality" VALUE="autohigh">
  <PARAM NAME="wmode" VALUE="transparent">
  <PARAM NAME="bgcolor" VALUE="#7777AA">
  <EMBED src="themes/dgfr/images/flash/rollload.swf" quality=autohigh bgcolor=#7777AA wmode=transparent WIDTH=250 HEIGHT=45 ALIGN=top TYPE="application/x-shockwave-flash"PLUGINSPAGE="http://www.macromedia.com/shockwave/download/index.cgi?P1_Prod_Version=ShockwaveFlash"></EMBED>
  </OBJECT>
  </td>
  <td>&nbsp;</td>
  </tr></table>
</center>
</DIV>
<?PHP
}
?>
<SCRIPT>
<!--
var DHTML = (document.getElementById || document.all || document.layers);
function ap_getObj(name) { if (document.getElementById) { return document.getElementById(name).style; } else if (document.all) { return document.all[name].style;
} else if (document.layers) { return document.layers[name]; } } function ap_showWaitMessage(div,flag)  { if (!DHTML) return; var x = ap_getObj(div); x.visibility = (flag) ? 'visible':'hidden'
if(! document.getElementById) if(document.layers) x.left=280/2; return true; } ap_showWaitMessage('waitDiv', 1);
 //-->
</SCRIPT>

<?PHP
if ($rightclk =="1") {
$browser = getenv("HTTP_USER_AGENT");
if (ereg("MSIE", "$browser")) {
?>

<DIV ID="contextMenu"
     ONMOUSEOUT="menu = this; this.tid = setTimeout('menu.style.visibility = \'hidden\'', 20);"
     ONMOUSEOVER="clearTimeout(this.tid);"
>
&nbsp;<br>
<A HREF="http://duns-ground.fr.st"; CLASS="menu"
   ONMOUSEOVER="this.className = 'menuOn'"
   ONMOUSEOUT="this.className = 'menu';"
>
&nbsp;Go to DuNs-GrOuNd
</A>
&nbsp;<br>
<A HREF="http://postnuke.com"; CLASS="menu"
   ONMOUSEOVER="this.className = 'menuOn'"
   ONMOUSEOUT="this.className = 'menu';"
>
&nbsp;Go to Post-Nuke
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
}
?>
