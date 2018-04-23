<?php

include ('themes/anjara/includes/brief.php'); 

echo "</td>";
 if ($index == 1) {
  echo "<td>&nbsp;&nbsp;</td><td valign=\"top\">";
  category();
  pollNewest();
  bigstory();
  if($cookie[8]) {
$getblock = mysql_query("select ublock from users where uid='$cookie[0]'");
$title = ""._MENUFOR." $cookie[1]";
list($ublock) = mysql_fetch_row($getblock);
   themesidebox($title, $ublock);
   }
   oldNews($storynum);
   rightblocks();
}
echo "</tr></table></td></tr></table>";
?>
<?php
echo "<br><table width=760 cellpadding=0 cellspacing=0 align=center border=0 bgcolor=#FCF1E1>";
echo "<tr><td colspan=3 bgcolor=#000000 height=1><img src=themes/anjara/gfx/pix.gif height=1 width=1></td></tr>";
echo "<tr><td bgcolor=#000000 width=1><img src=themes/anjara/gfx/pix.gif height=1 width=1></td><td align=center><br>";
footmsg();
echo "<br></td><td bgcolor=#000000 width=1><img src=themes/anjara/gfx/pix.gif height=1 width=1></td></tr>";
echo "<tr><td colspan=3 bgcolor=#000000 height=1><img src=themes/anjara/gfx/pix.gif height=1 width=1></td></tr></table>";
?>


<?php
// I had some troubles with the variables in the Home Page so you can use the footer just putting the text of that variables
// if anybody knows how to correct this please send me an email to webmaster@anjara.com
//
//                <table border="0" cellpadding="0" cellspacing="0" width="760" height="25" align="center">
//                <tr>
//                <td class="ctnegro">Anjara.com | <b>sugerencias</b> <a href='mailto:anjara@anjara.com'>anjara@anjara.com</a> | El centro electrónico de tu mundo, Marzo 2.001 &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;<font size=1>Site using <a class=resalta1 href='http://www.anjara.com'>Anjara</a> Theme.</font></td>
//                </tr>
//                </table>
?>                
