<?php
<table width='400' border='0' cellpadding='0' cellspacing='0'><tr><td>
// Include in which a search box is shown within top ten lists
// If you dont like it just uncomment the line 3 in /themes/anjara/footer.php
// Text Variables to set up
$brieftext = "Search aquanuke database"; # write here the text to display
$searching = "Power Search"; # text for the search link

echo "
      <br>
      <table width='100%' border='0' cellpadding='0' cellspacing='0'>
      <tr>
      <td valign='top' align='right'>
          <table height='22'width='100%' bgcolor='#007F9B' border='0' cellpadding='0' cellspacing='0'>
          <tr>
          <td valign='middle'><img src='themes/anjara/gfx/corner.gif'></td>
          <td background='themes/anjara/gfx/cornerwall.gif' class='ctblanco' width='100%'>&nbsp;<B>$brieftext</B>&nbsp;</td>
          <td valign='middle'><img src='themes/anjara/gfx/corner2.gif'></td>
          </tr>
          </table>
      </td>
      </tr>
      </table>

      <table width='100%' bgcolor='#5C5C5C' cellpadding='0' cellspacing='0'>
      <tr>
      <td width='100%' height='1' bgcolor='#000000' colspan='4'><img src='themes/anjara/gfx/pix.gif' height='1'></td>
      </tr>
      <tr>
      <td width='1' height='100%' bgcolor='#000000'><img src='themes/anjara/gfx/pix.gif' height='1'></td>
      <td align=center class=ctblanco width=50%>
          	  <table border='0'>
              <form action=search.php method=post>
              <tr>
              <td align=right valign=middle class=ctblanco>&nbsp;".translate("Search")." </td>
              <td valign=middle><input type=text class=resalta1 style='border: solid 1px #000000; background : Silver' name=query ></td>
              <td><input type=image src=themes/anjara/gfx/tip.gif border=0></td>
              </form>
              </tr>
              </table>
      </td>
      <td class=ctblanco width=50%> >>>&nbsp;&nbsp;<a class='resalta1' style='color: #FCF1E1' href=search.php>$searching</a></td>
      <td width='1' height='100%' bgcolor='#000000'><img src='themes/anjara/gfx/pix.gif' height='1'></td>
      </tr>
      <tr>
      <td width='100%' height='1' bgcolor='#000000' colspan='4'><img src='themes/anjara/gfx/pix.gif' height='1'></td>
      </tr>
      </table>";

if ($index == 0) {

echo "
      <table border=0 cellpadding=0 cellspacing=0 width=100% bgcolor=#FCF1E1 align=left>
      <tr>
      <td width='1' height='100%' bgcolor='#000000'><img src='themes/anjara/gfx/pix.gif' height='1'></td>
     ";

// 10 most read stories
$lista = mysql_query("select sid, title, time, counter from stories order by counter DESC limit 0,$top");
echo "
      <td valign=top align=left class=ctnegro>
      <b><br>&nbsp;&nbsp;&nbsp;&nbsp;$top ".translate("most read stories")."</b><br>";
$lugar=1;
while(list($sid, $title, $time, $counter) = mysql_fetch_row($lista)) {
    if($counter>0) {
        echo "<br>&nbsp;&nbsp;&nbsp;&nbsp;- $lugar: <a href=article.php?sid=$sid>$title</a> - (".translate("read:")." $counter ".translate("times").")";
        $lugar++;
    }
}
mysql_free_result($lista);
echo "<br><br></td>";

// 10 most commented articles
$result = mysql_query("select sid, title, comments from stories order by comments DESC limit 0,$top");
echo "
      <td valign=top align=left class=ctnegro>
      <b><br>&nbsp;&nbsp;$top ".translate("most commented stories")."</b><br>";
$lugar=1;
while(list($sid, $title, $comments) = mysql_fetch_row($result)) {
    if($comments>0) {
        echo "<br>&nbsp;&nbsp;- $lugar: <a href=article.php?sid=$sid>$title</a> - (".translate("comments:")." $comments)";
        $lugar++;
    }
}
mysql_free_result($result);
echo "
<br><br></td>
<td width='1' height='100%' bgcolor='#000000'><img src='themes/anjara/gfx/pix.gif' height='1'></td>
</tr>
<tr>
<td colspan='4' width='100%' height='1' bgcolor='#000000'><img src='themes/anjara/gfx/pix.gif' height='1'></td>
</tr>
</table>";
}

?>
