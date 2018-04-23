<?php
global $admin;
echo "

<body onload=init() bgcolor=#DDDDDD background=themes/anjara/gfx/fondo_principal.gif link=#000000 vlink=#000000 alink=#000000>

<LINK REL=STYLESHEET HREF=themes/anjara/css.css>
";
if ($banners) {
    include("banners.php");
}
global $sitename, $slogan;
echo "

<table border=0 cellpadding=0 cellspacing=0 width=760 height=30 align=center>
<tr>
<td colspan=4 height=1 bgcolor='#5C5C5C'><img src=themes/anjara/gfx/pix.gif height=1 width=1></td>
</tr>

<tr>
<td width='1' bgcolor='#5C5C5C'><img src=themes/anjara/gfx/pix.gif height=1 width=1></td>
<td width='401' class=ctnegro>&nbsp;"._WELCOMETO." $sitename , $slogan</td>
<td height='28' width='362' background='themes/anjara/gfx/fondo1.gif' valign='middle' align='right'>

	<table border='0' align=left>
	<form action=search.php method=post>
	<tr>
	<td align=right valign=middle class=ctnegro>&nbsp;"._SEARCH." </td>
	<td valign=middle><input type=text class=resalta1 style='border: solid 1px #000000; background : Silver' name=query ></td>
	</tr>
	</form>
	</table>
	
	<table border='0' align=left>
	<form action=\"search.php\" method=get>
	<tr>
	<td class=ctnegro valign='middle'>"._TOPICS."</td>
	<td class=ctnegro valign='middle'>";
    $toplist = mysql_query("select topicid, topictext from topics order by topictext");
    echo "<SELECT class=resalta1 style='border: solid 1px #000000; background : #FCF1E1' NAME=\"topic\"onChange='submit()'>" ;
    echo "<OPTION VALUE=\"\">"._ALLTOPICS."</option>\n";
    while(list($topicid, $topics) = mysql_fetch_row($toplist)) {
    if ($topicid==$topic) { $sel = "selected "; }
	echo "<option $sel value=\"$topicid\">$topics</option>\n";
    $sel = "";
    }
	echo "
	</td>
	</tr>
	</form>
	</table>



</td>
<td width=1 bgcolor=#5C5C5C><img src=themes/anjara/gfx/pix.gif height=1 width=1></td>
</tr>

<tr>
<td colspan=4 height=1 bgcolor=#5C5C5C><img src=themes/anjara/gfx/pix.gif height=1 width=1></td>
</tr>
</table>




<table border=0 cellpadding=0 cellspacing=0 width=760 align=center>
<tr>
<td valign=top width=237>

	    ";
		include ('themes/anjara/includes/anjaraloop.php');
		echo "		

</td>
<td valign=top width=523 align=right>

		<table border=0 cellpadding=0 cellspacing=0 width=523 height=72 align=center>
		<tr>		
		<td height=72 width=523 valign=top align=right class=ctblanco background=themes/anjara/gfx/fondo2.jpg>

<A HREF=http://kansas.valueclick.com/redirect?host=hs0215537&size=468x60&b=indexpage&v=0 TARGET=new>
<IMG SRC=http://kansas.valueclick.com/cycle?host=hs0215537&size=468x60&b=indexpage&noscript=1 border=0></A>

</td>
		<td height=72 width=1 bgcolor='#5C5C5C'><img src=themes/anjara/gfx/pix.gif height=1 width=1></td>
		</tr>
		</table>

	    ";
		include ('themes/anjara/includes/yourown.php');
		echo "
		";
		include ('themes/anjara/includes/navbar.php');
		echo "

</td>
</tr>
</table>
<br>
<table width=760 align=center cellpadding=0 cellspacing=0 border=0>
<tr>
<td valign=top>";

if (!$user) {
loginbox();
}

include ('themes/anjara/includes/section2.php');	// alternative section box, remove the line if you don't need it

// mainblock();
if ($admin) {
    adminblock();
}
leftblocks();
if ($Ephemerids==1) {
    ephemblock();
}
online();
recenttopics();
headlines();
echo "
</td><td>&nbsp;&nbsp;</td>
<td valign='top' width='100%'>
";
?>
