<?php


function themeindex ($aid, $informant, $time, $title, $counter, $topic, $thetext, $notes, $morelink, $topicname, $topicimage, $topictext) {
	global $tipath, $anonymous,$phpEx;
	if ("$aid" == "$informant") { ?>
<br>

<table border="0" cellpadding="0" cellspacing="0" width="100%">
  <!-- fwtable fwsrc="article.png" fwbase="article.gif" fwstyle="Dreamweaver" fwdocid = "742308039" fwnested="0" -->
  <tr>
<!-- Shim row, height 1. -->
   <td><img src="themes/ckfcphp/images/themeindx/spacer.gif" width="22" height="1" border="0"></td>
   <td><img src="themes/ckfcphp/images/themeindx/spacer.gif" width="58" height="1" border="0"></td>
   <td><img src="themes/ckfcphp/images/themeindx/spacer.gif" width="100%" height="1" border="0"></td>
   <td><img src="themes/ckfcphp/images/themeindx/spacer.gif" width="52" height="1" border="0"></td>
   <td><img src="themes/ckfcphp/images/themeindx/spacer.gif" width="26" height="1" border="0"></td>
   <td><img src="themes/ckfcphp/images/themeindx/spacer.gif" width="1" height="1" border="0"></td>
  </tr>

  <tr><!-- row 1 -->
   <td><img name="CH1G" src="themes/ckfcphp/images/themeindx/CH1G.gif" width="22" height="23" border="0"></td>
   <td><img name="BDH1" src="themes/ckfcphp/images/themeindx/BDH1.gif" width="58" height="23" border="0"></td>
   <td background="themes/ckfcphp/images/themeindx/PixHaut1.gif" width="597" height="23" border="0"></td>
   <td><img name="Hbarre1" src="themes/ckfcphp/images/themeindx/Hbarre1.gif" width="52" height="23" border="0"></td>
   <td><img name="CH1D" src="themes/ckfcphp/images/themeindx/CH1D.gif" width="26" height="23" border="0"></td>
   <td><img src="themes/ckfcphp/images/themeindx/spacer.gif" width="1" height="23" border="0"></td>
  </tr>
  <tr><!-- row 2 -->
   <td rowspan="7" background="themes/ckfcphp/images/themeindx/pixG1.gif" width="22" height="1" border="0"></td>
   <td><img name="CH2G" src="themes/ckfcphp/images/themeindx/CH2G.gif" width="58" height="53" border="0"></td>
   <td background="themes/ckfcphp/images/themeindx/Pixhaut2.gif" width="1" height="53" border="0"></td>
   <td><img name="CH2D" src="themes/ckfcphp/images/themeindx/CH2D.gif" width="52" height="53" border="0"></td>
   <td rowspan="7" background="themes/ckfcphp/images/themeindx/PixD1.gif" width="26" height="1" border="0"></td>
   <td><img src="themes/ckfcphp/images/themeindx/spacer.gif" width="1" height="1" border="0"></td>
  </tr>
  <tr><!-- row 3 -->
   <td background="themes/ckfcphp/images/themeindx/PixG2.gif" width="58" height="1" border="0"></td>
    <td bgcolor="B1C3D2"><b> 
      <?php echo"$title"; ?>
      </b><br>
      <?php echo translate("Posted by "); ?>
      <?php formatAidHeader($aid) ?>
      <?php echo translate("on"); ?>
      <?php echo"$time"; ?>
      <br>( 
      <?php echo $counter; ?>
      <?php echo translate("reads"); ?>
      )<b> </b></td>
   <td background="themes/ckfcphp/images/themeindx/PixD2.gif" width="52" height="38" border="0"></td>
   <td><img src="themes/ckfcphp/images/themeindx/spacer.gif" width="1" height="38" border="0"></td>
  </tr>
  <tr><!-- row 4 -->
   <td><img name="CB2G" src="themes/ckfcphp/images/themeindx/CB2G.gif" width="58" height="40" border="0"></td>
    <td background="themes/ckfcphp/images/themeindx/Pixbas1.gif" width="1" height="40" border="0"><font size=2> 
      </font></td>
   <td><img name="CB2D"a src="themes/ckfcphp/images/themeindx/CB2D.gif" width="52" height="40" border="0"></td>
   <td><img src="themes/ckfcphp/images/themeindx/spacer.gif" width="1" height="40" border="0"></td>
  </tr>
  <tr><!-- row 5 -->
   <td background="themes/ckfcphp/images/themeindx/2PixGC.gif" width="58" height="1" border="0"></td>
    <td valign="top" bgcolor="#B1C3D2"> <font size=2> </font>
      <table width="100%" border="0" cellspacing="0" cellpadding="0">
        <tr>
          <td><font size=2> 
            <?php echo "<a href=\"search.$phpEx?query=&topic=$topic"; ?>
            &author="> 
            <?php echo GetImgTag($tipath,$topicimage,$topictext,0,"right",34,-1,10,10); ?>
            <?php echo"$thetext<br><br>";?>
            </font></td>
        </tr>
      </table>
    </td>
   <td background="themes/ckfcphp/images/themeindx/2PixDc.gif" width="52" height="1" border="0"></td>
   <td><img src="themes/ckfcphp/images/themeindx/spacer.gif" width="1" height="1" border="0"></td>
  </tr>
  <tr><!-- row 6 -->
   <td><img name="n3CGH" src="themes/ckfcphp/images/themeindx/3CGH.gif" width="58" height="14" border="0"></td>
   <td background="themes/ckfcphp/images/themeindx/3PixHaut.gif" width="1" height="14" border="0"></td>
   <td><img name="n3CDH" src="themes/ckfcphp/images/themeindx/3CDH.gif" width="52" height="14" border="0"></td>
   <td><img src="themes/ckfcphp/images/themeindx/spacer.gif" width="1" height="14" border="0"></td>
  </tr>
  <tr><!-- row 7 -->
   <td background="themes/ckfcphp/images/themeindx/3PixG.gif" width="58" height="13" border="0"></td>
    <td bgcolor="#6D8FAB"> <font size=2>
      <?php echo"<p><img src=\"themes/Funkadelic/point.gif\" width=\"8\" height=\"8\" border=\"0\" align=\"middle\"> $morelink"; ?>
      </font></td>
   <td background="themes/ckfcphp/images/themeindx/3PixD.gif" width="52" height="13" border="0"></td>
   <td><img src="themes/ckfcphp/images/themeindx/spacer.gif" width="1" height="13" border="0"></td>
  </tr>
  <tr><!-- row 8 -->
   <td><img name="n3CGB" src="themes/ckfcphp/images/themeindx/3CGB.gif" width="58" height="14" border="0"></td>
   <td background="themes/ckfcphp/images/themeindx/3Pixbas.gif" width="100%" height="14" border="0"></td>
   <td><img name="n3CDB" src="themes/ckfcphp/images/themeindx/3CDB.gif" width="52" height="14" border="0"></td>
   <td><img src="themes/ckfcphp/images/themeindx/spacer.gif" width="1" height="14" border="0"></td>
  </tr>
  <tr><!-- row 9 -->
   <td><img name="CGB" src="themes/ckfcphp/images/themeindx/CGB.gif" width="22" height="25" border="0"></td>
   <td colspan="3" background="themes/ckfcphp/images/themeindx/PixBas.gif" width="1" height="25" border="0"></td>
   <td><img name="CDB" src="themes/ckfcphp/images/themeindx/CDB.gif" width="26" height="25" border="0"></td>
   <td><img src="themes/ckfcphp/images/themeindx/spacer.gif" width="1" height="25" border="0"></td>
  </tr>
<!--   This table was automatically created with Macromedia Fireworks 4.0   -->
<!--   http://www.macromedia.com   -->
</table>
<!--------------------------- STOP COPYING THE HTML HERE --------------------------->
<?php	} else {
		if($informant != "") $boxstuff = "<a href=\"user.$phpEx?op=userinfo&uname=$informant\">$informant</a> ";
		else $boxstuff = "$anonymous ";
		$boxstuff .= "".translate("writes")." <i>\"$thetext\"</i> $notes";
?>

<table border="0" cellpadding="0" cellspacing="0" width="100%">
  <!-- fwtable fwsrc="article.png" fwbase="article.gif" fwstyle="Dreamweaver" fwdocid = "742308039" fwnested="0" -->
  <tr>
<!-- Shim row, height 1. -->
   <td><img src="themes/ckfcphp/images/themeindx/spacer.gif" width="22" height="1" border="0"></td>
   <td><img src="themes/ckfcphp/images/themeindx/spacer.gif" width="58" height="1" border="0"></td>
   <td><img src="themes/ckfcphp/images/themeindx/spacer.gif" width="100%" height="1" border="0"></td>
   <td><img src="themes/ckfcphp/images/themeindx/spacer.gif" width="52" height="1" border="0"></td>
   <td><img src="themes/ckfcphp/images/themeindx/spacer.gif" width="26" height="1" border="0"></td>
   <td><img src="themes/ckfcphp/images/themeindx/spacer.gif" width="1" height="1" border="0"></td>
  </tr>

  <tr><!-- row 1 -->
   <td><img name="CH1G" src="themes/ckfcphp/images/themeindx/CH1G.gif" width="22" height="23" border="0"></td>
   <td><img name="BDH1" src="themes/ckfcphp/images/themeindx/BDH1.gif" width="58" height="23" border="0"></td>
   <td background="themes/ckfcphp/images/themeindx/PixHaut1.gif" width="597" height="23" border="0"></td>
   <td><img name="Hbarre1" src="themes/ckfcphp/images/themeindx/Hbarre1.gif" width="52" height="23" border="0"></td>
   <td><img name="CH1D" src="themes/ckfcphp/images/themeindx/CH1D.gif" width="26" height="23" border="0"></td>
   <td><img src="themes/ckfcphp/images/themeindx/spacer.gif" width="1" height="23" border="0"></td>
  </tr>
  <tr><!-- row 2 -->
   <td rowspan="7" background="themes/ckfcphp/images/themeindx/pixG1.gif" width="22" height="1" border="0"></td>
   <td><img name="CH2G" src="themes/ckfcphp/images/themeindx/CH2G.gif" width="58" height="53" border="0"></td>
   <td background="themes/ckfcphp/images/themeindx/Pixhaut2.gif" width="1" height="53" border="0"></td>
   <td><img name="CH2D" src="themes/ckfcphp/images/themeindx/CH2D.gif" width="52" height="53" border="0"></td>
   <td rowspan="7" background="themes/ckfcphp/images/themeindx/PixD1.gif" width="26" height="1" border="0"></td>
   <td><img src="themes/ckfcphp/images/themeindx/spacer.gif" width="1" height="1" border="0"></td>
  </tr>
  <tr><!-- row 3 -->
   <td background="themes/ckfcphp/images/themeindx/PixG2.gif" width="58" height="1" border="0"></td>
    <td bgcolor="B1C3D2"><b> 
      <?php echo"$title"; ?>
      </b><br>
      <?php echo translate("Posted by "); ?>
      <?php formatAidHeader($aid) ?>
      <?php echo translate("on"); ?>
      <?php echo"$time"; ?>
      <br>( 
      <?php echo $counter; ?>
      <?php echo translate("reads"); ?>
      )</td>
   <td background="themes/ckfcphp/images/themeindx/PixD2.gif" width="52" height="38" border="0"></td>
   <td><img src="themes/ckfcphp/images/themeindx/spacer.gif" width="1" height="38" border="0"></td>
  </tr>
  <tr><!-- row 4 -->
   <td><img name="CB2G" src="themes/ckfcphp/images/themeindx/CB2G.gif" width="58" height="40" border="0"></td>
    <td background="themes/ckfcphp/images/themeindx/Pixbas1.gif" width="1" height="40" border="0"><font size=2> 
      </font></td>
   <td><img name="CB2D"a src="themes/ckfcphp/images/themeindx/CB2D.gif" width="52" height="40" border="0"></td>
   <td><img src="themes/ckfcphp/images/themeindx/spacer.gif" width="1" height="40" border="0"></td>
  </tr>
  <tr><!-- row 5 -->
   <td background="themes/ckfcphp/images/themeindx/2PixGC.gif" width="58" height="1" border="0"></td>
    <td valign="top" bgcolor="#B1C3D2"> <font size=2> </font>
      <table width="100%" border="0" cellspacing="0" cellpadding="0">
        <tr>
          <td><font size=2> 
            <?php echo "<a href=\"search.$phpEx?query=&topic=$topic"; ?>
            &author="> 
            <?php echo GetImgTag($tipath,$topicimage,$topictext,0,"right",34,-1,10,10); ?>
            <?php echo"$boxstuff<br><br>";?>
            </font></td>
        </tr>
      </table>
    </td>
   <td background="themes/ckfcphp/images/themeindx/2PixDc.gif" width="52" height="1" border="0"></td>
   <td><img src="themes/ckfcphp/images/themeindx/spacer.gif" width="1" height="1" border="0"></td>
  </tr>
  <tr><!-- row 6 -->
   <td><img name="n3CGH" src="themes/ckfcphp/images/themeindx/3CGH.gif" width="58" height="14" border="0"></td>
   <td background="themes/ckfcphp/images/themeindx/3PixHaut.gif" width="1" height="14" border="0"></td>
   <td><img name="n3CDH" src="themes/ckfcphp/images/themeindx/3CDH.gif" width="52" height="14" border="0"></td>
   <td><img src="themes/ckfcphp/images/themeindx/spacer.gif" width="1" height="14" border="0"></td>
  </tr>
  <tr><!-- row 7 -->
   <td background="themes/ckfcphp/images/themeindx/3PixG.gif" width="58" height="13" border="0"></td>
    <td bgcolor="#6D8FAB"> <font size=2>
      <?php echo"<p><img src=\"themes/Funkadelic/point.gif\" width=\"8\" height=\"8\" border=\"0\" align=\"middle\"> $morelink"; ?>
      </font></td>
   <td background="themes/ckfcphp/images/themeindx/3PixD.gif" width="52" height="13" border="0"></td>
   <td><img src="themes/ckfcphp/images/themeindx/spacer.gif" width="1" height="13" border="0"></td>
  </tr>
  <tr><!-- row 8 -->
   <td><img name="n3CGB" src="themes/ckfcphp/images/themeindx/3CGB.gif" width="58" height="14" border="0"></td>
   <td background="themes/ckfcphp/images/themeindx/3Pixbas.gif" width="100%" height="14" border="0"></td>
   <td><img name="n3CDB" src="themes/ckfcphp/images/themeindx/3CDB.gif" width="52" height="14" border="0"></td>
   <td><img src="themes/ckfcphp/images/themeindx/spacer.gif" width="1" height="14" border="0"></td>
  </tr>
  <tr><!-- row 9 -->
    <td height="24"><img name="CGB" src="themes/ckfcphp/images/themeindx/CGB.gif" width="22" height="25" border="0"></td>
    <td colspan="3" background="themes/ckfcphp/images/themeindx/PixBas.gif" width="1" height="24" border="0"></td>
    <td height="24"><img name="CDB" src="themes/ckfcphp/images/themeindx/CDB.gif" width="26" height="25" border="0"></td>
    <td height="24"><img src="themes/ckfcphp/images/themeindx/spacer.gif" width="1" height="25" border="0"></td>
  </tr>
<!--   This table was automatically created with Macromedia Fireworks 4.0   -->
<!--   http://www.macromedia.com   -->
</table>
<?php	}
}


function themearticle ($aid, $informant, $datetime, $title, $thetext, $topic, $topicname, $topicimage, $topictext) {
	global $admin, $sid, $tipath,$phpEx;
	
	
	if ("$aid" == "$informant") {

?>
<table border="0" cellpadding="0" cellspacing="0" width="100%">
  <!-- fwtable fwsrc="article.png" fwbase="article.gif" fwstyle="Dreamweaver" fwdocid = "742308039" fwnested="0" -->
  <tr> 
    <!-- Shim row, height 1. -->
    <td><img src="themes/ckfcphp/images/themeindx/spacer.gif" width="22" height="1" border="0"></td>
    <td><img src="themes/ckfcphp/images/themeindx/spacer.gif" width="58" height="1" border="0"></td>
    <td><img src="themes/ckfcphp/images/themeindx/spacer.gif" width="100%" height="1" border="0"></td>
    <td><img src="themes/ckfcphp/images/themeindx/spacer.gif" width="52" height="1" border="0"></td>
    <td><img src="themes/ckfcphp/images/themeindx/spacer.gif" width="26" height="1" border="0"></td>
    <td><img src="themes/ckfcphp/images/themeindx/spacer.gif" width="1" height="1" border="0"></td>
  </tr>
  <tr>
    <!-- row 1 -->
    <td><img name="CH1G" src="themes/ckfcphp/images/themeindx/CH1G.gif" width="22" height="23" border="0"></td>
    <td><img name="BDH1" src="themes/ckfcphp/images/themeindx/BDH1.gif" width="58" height="23" border="0"></td>
    <td background="themes/ckfcphp/images/themeindx/PixHaut1.gif" width="597" height="23" border="0"></td>
    <td><img name="Hbarre1" src="themes/ckfcphp/images/themeindx/Hbarre1.gif" width="52" height="23" border="0"></td>
    <td><img name="CH1D" src="themes/ckfcphp/images/themeindx/CH1D.gif" width="26" height="23" border="0"></td>
    <td><img src="themes/ckfcphp/images/themeindx/spacer.gif" width="1" height="23" border="0"></td>
  </tr>
  <tr>
    <!-- row 2 -->
    <td rowspan="7" background="themes/ckfcphp/images/themeindx/pixG1.gif" width="22" height="1" border="0"></td>
    <td><img name="CH2G" src="themes/ckfcphp/images/themeindx/CH2G.gif" width="58" height="53" border="0"></td>
    <td background="themes/ckfcphp/images/themeindx/Pixhaut2.gif" width="1" height="53" border="0"></td>
    <td><img name="CH2D" src="themes/ckfcphp/images/themeindx/CH2D.gif" width="52" height="53" border="0"></td>
    <td rowspan="7" background="themes/ckfcphp/images/themeindx/PixD1.gif" width="26" height="1" border="0"></td>
    <td><img src="themes/ckfcphp/images/themeindx/spacer.gif" width="1" height="1" border="0"></td>
  </tr>
  <tr>
    <!-- row 3 -->
    <td background="themes/ckfcphp/images/themeindx/PixG2.gif" width="58" height="1" border="0"></td>
    <td bgcolor="B1C3D2"><b>
      <?
      	echo "<FONT size=3 color=blue><b>$title</b><br><font size=1>".translate("Posted on ")." $datetime";
		if ($admin)
			{
			echo "&nbsp;&nbsp; $font2 [ <a href=admin.$phpEx?op=EditStory&sid=$sid>".translate("Edit")."</a> | <a href=admin.$phpEx?op=RemoveStory&sid=$sid>".translate("Delete")."</a> ]";
    		}
      	?>
      </b></td>
    <td background="themes/ckfcphp/images/themeindx/PixD2.gif" width="52" height="38" border="0"></td>
    <td><img src="themes/ckfcphp/images/themeindx/spacer.gif" width="1" height="38" border="0"></td>
  </tr>
  <tr>
    <!-- row 4 -->
    <td><img name="CB2G" src="themes/ckfcphp/images/themeindx/CB2G.gif" width="58" height="40" border="0"></td>
    <td background="themes/ckfcphp/images/themeindx/Pixbas1.gif" width="1" height="40" border="0"><font size=2> 
      </font></td>
    <td><img name="CB2D"a src="themes/ckfcphp/images/themeindx/CB2D.gif" width="52" height="40" border="0"></td>
    <td><img src="themes/ckfcphp/images/themeindx/spacer.gif" width="1" height="40" border="0"></td>
  </tr>
  <tr>
    <!-- row 5 -->
    <td background="themes/ckfcphp/images/themeindx/2PixGC.gif" width="58" height="1" border="0"></td>
    <td valign="top" bgcolor="#B1C3D2"> <font size=2> </font> 
      <table width="100%" border="0" cellspacing="0" cellpadding="0">
        <tr> 
          <td><font size=2>
            <?
      echo "<FONT size=2><a href=search.$phpEx?query=&topic=$topic&author=>".GetImgTag($tipath,$topicimage,$topictext,1,"left",0,0,10,10)."</a>$thetext";

      ?>
            </font></td>
        </tr>
      </table>
    </td>
    <td background="themes/ckfcphp/images/themeindx/2PixDc.gif" width="52" height="1" border="0"></td>
    <td><img src="themes/ckfcphp/images/themeindx/spacer.gif" width="1" height="1" border="0"></td>
  </tr>
  <tr>
    <!-- row 6 -->
    <td><img name="n3CGH" src="themes/ckfcphp/images/themeindx/3CGH.gif" width="58" height="14" border="0"></td>
    <td background="themes/ckfcphp/images/themeindx/3PixHaut.gif" width="1" height="14" border="0"></td>
    <td><img name="n3CDH" src="themes/ckfcphp/images/themeindx/3CDH.gif" width="52" height="14" border="0"></td>
    <td><img src="themes/ckfcphp/images/themeindx/spacer.gif" width="1" height="14" border="0"></td>
  </tr>
  <tr>
    <!-- row 7 -->
    <td background="themes/ckfcphp/images/themeindx/3PixG.gif" width="58" height="13" border="0"></td>
    <td bgcolor="#6D8FAB"> <font size=2> </font></td>
    <td background="themes/ckfcphp/images/themeindx/3PixD.gif" width="52" height="13" border="0"></td>
    <td><img src="themes/ckfcphp/images/themeindx/spacer.gif" width="1" height="13" border="0"></td>
  </tr>
  <tr>
    <!-- row 8 -->
    <td><img name="n3CGB" src="themes/ckfcphp/images/themeindx/3CGB.gif" width="58" height="14" border="0"></td>
    <td background="themes/ckfcphp/images/themeindx/3Pixbas.gif" width="100%" height="14" border="0"></td>
    <td><img name="n3CDB" src="themes/ckfcphp/images/themeindx/3CDB.gif" width="52" height="14" border="0"></td>
    <td><img src="themes/ckfcphp/images/themeindx/spacer.gif" width="1" height="14" border="0"></td>
  </tr>
  <tr>
    <!-- row 9 -->
    <td height="24"><img name="CGB" src="themes/ckfcphp/images/themeindx/CGB.gif" width="22" height="25" border="0"></td>
    <td colspan="3" background="themes/ckfcphp/images/themeindx/PixBas.gif" width="1" height="24" border="0"></td>
    <td height="24"><img name="CDB" src="themes/ckfcphp/images/themeindx/CDB.gif" width="26" height="25" border="0"></td>
    <td height="24"><img src="themes/ckfcphp/images/themeindx/spacer.gif" width="1" height="25" border="0"></td>
  </tr>
  <!--   This table was automatically created with Macromedia Fireworks 4.0   -->
  <!--   http://www.macromedia.com   -->
</table>
<?





	} 
	
	
	
	else {
		if($informant != "") $informant = "<a href=\"user.$phpEx?op=userinfo&uname=$informant\">$informant</a> ";
		else $boxstuff = "$anonymous ";
		$boxstuff .= "".translate("writes")." <i>\"$thetext\"</i> $notes";


?>
<table border="0" cellpadding="0" cellspacing="0" width="100%">
  <!-- fwtable fwsrc="article.png" fwbase="article.gif" fwstyle="Dreamweaver" fwdocid = "742308039" fwnested="0" -->
  <tr> 
    <!-- Shim row, height 1. -->
    <td><img src="themes/ckfcphp/images/themeindx/spacer.gif" width="22" height="1" border="0"></td>
    <td><img src="themes/ckfcphp/images/themeindx/spacer.gif" width="58" height="1" border="0"></td>
    <td><img src="themes/ckfcphp/images/themeindx/spacer.gif" width="100%" height="1" border="0"></td>
    <td><img src="themes/ckfcphp/images/themeindx/spacer.gif" width="52" height="1" border="0"></td>
    <td><img src="themes/ckfcphp/images/themeindx/spacer.gif" width="26" height="1" border="0"></td>
    <td><img src="themes/ckfcphp/images/themeindx/spacer.gif" width="1" height="1" border="0"></td>
  </tr>
  <tr> 
    <!-- row 1 -->
    <td><img name="CH1G" src="themes/ckfcphp/images/themeindx/CH1G.gif" width="22" height="23" border="0"></td>
    <td><img name="BDH1" src="themes/ckfcphp/images/themeindx/BDH1.gif" width="58" height="23" border="0"></td>
    <td background="themes/ckfcphp/images/themeindx/PixHaut1.gif" width="597" height="23" border="0"></td>
    <td><img name="Hbarre1" src="themes/ckfcphp/images/themeindx/Hbarre1.gif" width="52" height="23" border="0"></td>
    <td><img name="CH1D" src="themes/ckfcphp/images/themeindx/CH1D.gif" width="26" height="23" border="0"></td>
    <td><img src="themes/ckfcphp/images/themeindx/spacer.gif" width="1" height="23" border="0"></td>
  </tr>
  <tr> 
    <!-- row 2 -->
    <td rowspan="7" background="themes/ckfcphp/images/themeindx/pixG1.gif" width="22" height="1" border="0"></td>
    <td><img name="CH2G" src="themes/ckfcphp/images/themeindx/CH2G.gif" width="58" height="53" border="0"></td>
    <td background="themes/ckfcphp/images/themeindx/Pixhaut2.gif" width="1" height="53" border="0"></td>
    <td><img name="CH2D" src="themes/ckfcphp/images/themeindx/CH2D.gif" width="52" height="53" border="0"></td>
    <td rowspan="7" background="themes/ckfcphp/images/themeindx/PixD1.gif" width="26" height="1" border="0"></td>
    <td><img src="themes/ckfcphp/images/themeindx/spacer.gif" width="1" height="1" border="0"></td>
  </tr>
  <tr> 
    <!-- row 3 -->
    <td background="themes/ckfcphp/images/themeindx/PixG2.gif" width="58" height="1" border="0"></td>
    <td bgcolor="B1C3D2"><b>
      <?
      	echo "<FONT size=3 color=blue><b>$title</b><br><font size=2>".translate("Contributed by ")." $informant ".translate("on")." $datetime</font>";
		if ($admin)
			{
			echo "&nbsp;&nbsp; $font2 [ <a href=admin.$phpEx?op=EditStory&sid=$sid>".translate("Edit")."</a> | <a href=admin.$phpEx?op=RemoveStory&sid=$sid>".translate("Delete")."</a> ]";
    		}
      	?>
      </b></td>
    <td background="themes/ckfcphp/images/themeindx/PixD2.gif" width="52" height="38" border="0"></td>
    <td><img src="themes/ckfcphp/images/themeindx/spacer.gif" width="1" height="38" border="0"></td>
  </tr>
  <tr> 
    <!-- row 4 -->
    <td><img name="CB2G" src="themes/ckfcphp/images/themeindx/CB2G.gif" width="58" height="40" border="0"></td>
    <td background="themes/ckfcphp/images/themeindx/Pixbas1.gif" width="1" height="40" border="0"><font size=2> 
      </font></td>
    <td><img name="CB2D"a src="themes/ckfcphp/images/themeindx/CB2D.gif" width="52" height="40" border="0"></td>
    <td><img src="themes/ckfcphp/images/themeindx/spacer.gif" width="1" height="40" border="0"></td>
  </tr>
  <tr> 
    <!-- row 5 -->
    <td background="themes/ckfcphp/images/themeindx/2PixGC.gif" width="58" height="1" border="0"></td>
    <td valign="top" bgcolor="#B1C3D2"> <font size=2> </font> 
      <table width="100%" border="0" cellspacing="0" cellpadding="0">
        <tr> 
          <td><font size=2>
            <?
      echo "<FONT size=2><a href=search.$phpEx?query=&topic=$topic&author=>".GetImgTag($tipath,$topicimage,$topictext,1,"left",0,0,10,10)."</a>$thetext";

      ?>
            </font></td>
        </tr>
      </table>
    </td>
    <td background="themes/ckfcphp/images/themeindx/2PixDc.gif" width="52" height="1" border="0"></td>
    <td><img src="themes/ckfcphp/images/themeindx/spacer.gif" width="1" height="1" border="0"></td>
  </tr>
  <tr> 
    <!-- row 6 -->
    <td><img name="n3CGH" src="themes/ckfcphp/images/themeindx/3CGH.gif" width="58" height="14" border="0"></td>
    <td background="themes/ckfcphp/images/themeindx/3PixHaut.gif" width="1" height="14" border="0"></td>
    <td><img name="n3CDH" src="themes/ckfcphp/images/themeindx/3CDH.gif" width="52" height="14" border="0"></td>
    <td><img src="themes/ckfcphp/images/themeindx/spacer.gif" width="1" height="14" border="0"></td>
  </tr>
  <tr> 
    <!-- row 7 -->
    <td background="themes/ckfcphp/images/themeindx/3PixG.gif" width="58" height="13" border="0"></td>
    <td bgcolor="#6D8FAB"> <font size=2> </font></td>
    <td background="themes/ckfcphp/images/themeindx/3PixD.gif" width="52" height="13" border="0"></td>
    <td><img src="themes/ckfcphp/images/themeindx/spacer.gif" width="1" height="13" border="0"></td>
  </tr>
  <tr> 
    <!-- row 8 -->
    <td><img name="n3CGB" src="themes/ckfcphp/images/themeindx/3CGB.gif" width="58" height="14" border="0"></td>
    <td background="themes/ckfcphp/images/themeindx/3Pixbas.gif" width="100%" height="14" border="0"></td>
    <td><img name="n3CDB" src="themes/ckfcphp/images/themeindx/3CDB.gif" width="52" height="14" border="0"></td>
    <td><img src="themes/ckfcphp/images/themeindx/spacer.gif" width="1" height="14" border="0"></td>
  </tr>
  <tr> 
    <!-- row 9 -->
    <td height="24"><img name="CGB" src="themes/ckfcphp/images/themeindx/CGB.gif" width="22" height="25" border="0"></td>
    <td colspan="3" background="themes/ckfcphp/images/themeindx/PixBas.gif" width="1" height="24" border="0"></td>
    <td height="24"><img name="CDB" src="themes/ckfcphp/images/themeindx/CDB.gif" width="26" height="25" border="0"></td>
    <td height="24"><img src="themes/ckfcphp/images/themeindx/spacer.gif" width="1" height="25" border="0"></td>
  </tr>
  <!--   This table was automatically created with Macromedia Fireworks 4.0   -->
  <!--   http://www.macromedia.com   -->
</table>
<?


    }
}




function themesidebox($title, $content) {


?>
<table border="0" cellpadding="0" cellspacing="0" width="250">
  <!-- fwtable fwsrc="entete.png" fwbase="entete.gif" fwstyle="Dreamweaver" fwdocid = "742308039" fwnested="0" -->
  <tr> 
    <!-- Shim row, height 1. -->
    <td><img src="themes/ckfcphp/images/entete/spacer.gif" width="21" height="1" border="0"></td>
    <td><img src="themes/ckfcphp/images/entete/spacer.gif" width="54" height="1" border="0"></td>
    <td><img src="themes/ckfcphp/images/entete/spacer.gif" width="100%" height="1" border="0"></td>
    <td><img src="themes/ckfcphp/images/entete/spacer.gif" width="48" height="1" border="0"></td>
    <td><img src="themes/ckfcphp/images/entete/spacer.gif" width="25" height="1" border="0"></td>
    <td><img src="themes/ckfcphp/images/entete/spacer.gif" width="1" height="1" border="0"></td>
  </tr>
  <tr>
    <!-- row 1 -->
    <td><img name="CH1G" src="themes/ckfcphp/images/entete/CH1G.gif" width="21" height="20" border="0"></td>
    <td><img name="BDH1" src="themes/ckfcphp/images/entete/BDH1.gif" width="54" height="20" border="0"></td>
    <td background="themes/ckfcphp/images/entete/PixHaut1.gif" width="100%" height="20" border="0"></td>
    <td><img name="Hbarre1" src="themes/ckfcphp/images/entete/Hbarre1.gif" width="48" height="20" border="0"></td>
    <td><img name="CH1D" src="themes/ckfcphp/images/entete/CH1D.gif" width="25" height="20" border="0"></td>
    <td><img src="themes/ckfcphp/images/entete/spacer.gif" width="1" height="20" border="0"></td>
  </tr>
  <tr>
    <!-- row 2 -->
    <td rowspan="4" background="themes/ckfcphp/images/entete/pixG1.gif" width="21" height="123" border="0"></td>
    <td><img name="CH2G" src="themes/ckfcphp/images/entete/CH2G.gif" width="54" height="53" border="0"></td>
    <td background="themes/ckfcphp/images/entete/Pixhaut2.gif" width="605" height="53" border="0"><b> 
      </b></td>
    <td><img name="CH2D" src="themes/ckfcphp/images/entete/CH2D.gif" width="48" height="53" border="0"></td>
    <td rowspan="4" background="themes/ckfcphp/images/entete/PixD1.gif" width="25" height="123" border="0"></td>
    <td><img src="themes/ckfcphp/images/entete/spacer.gif" width="1" height="53" border="0"></td>
  </tr>
  <tr>
    <!-- row 3 -->
    <td background="themes/ckfcphp/images/entete/PixG2.gif" width="54" height="38" border="0" bgcolor="#b1c3d2" rowspan="2"></td>
    <td bgcolor="#6D8FAB"><b><font size=1 color=yellow> <? echo "$title"; ?></font> 
      
      <font size=1 color=black> </font> </b> </td>
    <td background="themes/ckfcphp/images/entete/PixD2.gif" width="48" height="38" border="0" rowspan="2"></td>
    <td rowspan="2"><img src="themes/ckfcphp/images/entete/spacer.gif" width="1" height="38" border="0"></td>
  </tr>
  <tr>
    <td bgcolor="#b1c3d2"><b><font size=1 color=black>
      <? echo "$content"; ?>
      </font></b></td>
  </tr>
  <tr>
    <!-- row 4 -->
    <td><img name="CB2G" src="themes/ckfcphp/images/entete/CB2G.gif" width="54" height="32" border="0"></td>
    <td background="themes/ckfcphp/images/entete/Pixbas1.gif" width="605" height="32" border="0"></td>
    <td><img name="CB2D" src="themes/ckfcphp/images/entete/CB2D.gif" width="48" height="32" border="0"></td>
    <td><img src="themes/ckfcphp/images/entete/spacer.gif" width="1" height="32" border="0"></td>
  </tr>
  <tr>
    <!-- row 5 -->
    <td><img name="CB1G" src="themes/ckfcphp/images/entete/CB1G.gif" width="21" height="19" border="0"></td>
    <td colspan="3" background="themes/ckfcphp/images/entete/Pixbas2.gif" width="707" height="19" border="0"></td>
    <td><img name="CB1D" src="themes/ckfcphp/images/entete/CB1D.gif" width="25" height="19" border="0"></td>
    <td><img src="themes/ckfcphp/images/entete/spacer.gif" width="1" height="19" border="0"></td>
  </tr>
  <!--   This table was automatically created with Macromedia Fireworks 4.0   -->
  <!--   http://www.macromedia.com   -->
</table>

<?php
}

?>
