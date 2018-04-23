<html>
<head>
<style>
A:link {TEXT-DECORATION: none COLOR: none}
A:visited {TEXT-DECORATION: none COLOR: none}
A:hover { color:#0000FF;text-decoration: underline overline }
p {  color: #000000; font: 10pt verdana}
td { color: #000000; font: 10pt verdana}
BODY { color: #000000; font: 8pt verdana}
input { color:#000000; font: 10pt verdana}
textarea { color:#000000; font: 8pt verdana}
</style>

<meta http-equiv="Content-Type" content="text/html;">
<meta name="description" content="FW4 DW4 HTML">
</head>
<body  bgcolor="#6D8FAB" link=000000 vlink=000000 topmargin=5 leftmargin=0 rightmargin=0 marginheight=5>


<?

$thename = "CKFCPHP"; // nom du thème
$lnkcolor = "0000FF"; // couleur Jaune
$bgcolor1 = "#B1C3D2"; // Couleur
$bgcolor2 = "#6D8FAB"; // Couleur bleu gris
$bgcolor3 = "#EEEEEE"; // Couleur gris clair
$bgcolor4 = "#DEDEDE"; // Couleur Grise
$textcolor1 = "#000000"; // Couleur noire
$textcolor2 = "#000000"; // Couleur noire
$hr = 1; # 1 to have horizonal rule in comments instead of table bgcolor

function OpenTable() {
global $bgcolor1, $bgcolor2;
    echo "<table width=\"100%\" border=\"0\" cellspacing=\"1\" cellpadding=\"0\" bgcolor=\"$bgcolor2\"><tr><td>\n";
    echo "<table width=\"100%\" border=\"0\" cellspacing=\"1\" cellpadding=\"8\" bgcolor=\"$bgcolor1\"><tr><td>\n";
}


function CloseTable() {
echo "</td></tr></table></td></tr></table>\n";
}

function OpenTable2() {
    global $bgcolor1, $bgcolor2;
    echo "<table border=\"0\" cellspacing=\"1\" cellpadding=\"0\" bgcolor=\"$bgcolor2\" align=\"center\"><tr><td>\n";
    echo "<table border=\"0\" cellspacing=\"1\" cellpadding=\"8\" bgcolor=\"$bgcolor1\"><tr><td>\n";
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
        echo "<font size=\"2\" color=\"#505050\">$thetext<br>$notes</font>\n";
    } else {
        if($informant != "") {
            $boxstuff = "<a href=\"user.php?op=userinfo&amp;uname=$informant\">$informant</a> ";
        } else {
            $boxstuff = "$anonymous ";
        }
        $boxstuff .= ""._WRITES." <i>\"$thetext\"</i> $notes\n";
        echo "<font size=\"2\" color=\"#505050\">$boxstuff</font>\n";
    }
}


function themeheader() {

global $slogan, $sitename, $banners, $admin, $user, $cookie, $use_custom_whosonline;
    cookiedecode($user);
$username = $cookie[1];

if ($banners) {
    include("banners.php");
}

?>
<table border="0" cellpadding="0" cellspacing="0" width="100%">
  <tr>
   <td><img src="themes/ckfcphp/images/entete/spacer.gif" width="21" height="1" border="0"></td>
   <td><img src="themes/ckfcphp/images/entete/spacer.gif" width="54" height="1" border="0"></td>
   <td><img src="themes/ckfcphp/images/entete/spacer.gif" width="100%" height="1" border="0"></td>
   <td><img src="themes/ckfcphp/images/entete/spacer.gif" width="48" height="1" border="0"></td>
   <td><img src="themes/ckfcphp/images/entete/spacer.gif" width="25" height="1" border="0"></td>
   <td><img src="themes/ckfcphp/images/entete/spacer.gif" width="1" height="1" border="0"></td>
  </tr>

  <tr><!-- row 1 -->
   <td><img name="CH1G" src="themes/ckfcphp/images/entete/CH1G.gif" width="21" height="20" border="0"></td>
   <td><img name="BDH1" src="themes/ckfcphp/images/entete/BDH1.gif" width="54" height="20" border="0"></td>
   <td background="themes/ckfcphp/images/entete/PixHaut1.gif" width="100%" height="20" border="0"></td>
   <td><img name="Hbarre1" src="themes/ckfcphp/images/entete/Hbarre1.gif" width="48" height="20" border="0"></td>

<td><img name="CH1D" src="themes/ckfcphp/images/entete/CH1D.gif" width="25" height="20" border="0"></td>
   <td><img src="themes/ckfcphp/images/entete/spacer.gif" width="1" height="20" border="0"></td>
  </tr>
  <tr><!-- row 2 -->
   <td rowspan="3"  background="themes/ckfcphp/images/entete/pixG1.gif" width="21" height="123" border="0"></td>
   <td><img name="CH2G" src="themes/ckfcphp/images/entete/CH2G.gif" width="54" height="53" border="0"></td>
   <td background="themes/ckfcphp/images/entete/Pixhaut2.gif" width="605" height="53" border="0"></td>
   <td><img name="CH2D" src="themes/ckfcphp/images/entete/CH2D.gif" width="48" height="53" border="0"></td>
   <td rowspan="3" background="themes/ckfcphp/images/entete/PixD1.gif" width="25" height="123" border="0"></td>
   <td><img src=themes/ckfcphp/images/entete/spacer.gif width="1" height="53" border="0"></td>
  </tr>
  <tr><!-- row 3 -->
   <td background="themes/ckfcphp/images/entete/PixG2.gif" width="54" height="38" border="0" bgcolor="#b1c3d2"></td>
    <td bgcolor="#b1c3d2">

      <table width=100%>
        <tr>
          <td width=50% align=left>
            <? echo "<a href=$nuke_url><img src=\"themes/ckfcphp/logock.gif\" border=0></a>";?>
          </td>
          <td>
            <?include ("themes/ckfcphp/date.php");?>
          </td>
        </tr>
        <tr>
          <td width=50% align=left>
            <? echo"</b><font size=1>$slogan </font>";?>
          </td>
          <td align=right width=100%>
<form action=search.php method=post>
    <font size=2><input type=text name=query width=20 size=20 length=20>
    </td>
    <td align=right>&nbsp;&nbsp;<input type=submit value="SEARCH"></td>
    </form>

          </td>
        </tr>
      </table>

</td>
   <td background="themes/ckfcphp/images/entete/PixD2.gif" width="48" height="38" border="0"></td>
   <td><img src="themes/ckfcphp/images/entete/spacer.gif" width="1" height="38" border="0"></td>
  </tr>
  <tr><!-- row 4 -->
   <td><img name="CB2G" src="themes/ckfcphp/images/entete/CB2G.gif" width="54" height="32" border="0"></td>
   <td background="themes/ckfcphp/images/entete/Pixbas1.gif" width="605" height="32" border="0"></td>
   <td><img name="CB2D" src="themes/ckfcphp/images/entete/CB2D.gif" width="48" height="32" border="0"></td>
   <td><img src="themes/ckfcphp/images/entete/spacer.gif" width="1" height="32" border="0"></td>
  </tr>
  <tr><!-- row 5 -->
   <td><img name="CB1G" src="themes/ckfcphp/images/entete/CB1G.gif" width="21" height="19" border="0"></td>
   <td colspan="3" background="themes/ckfcphp/images/entete/Pixbas2.gif" width="707" height="19" border="0"></td>
   <td><img name="CB1D" src="themes/ckfcphp/images/entete/CB1D.gif" width="25" height="19" border="0"></td>
   <td><img src="themes/ckfcphp/images/entete/spacer.gif" width="1" height="19" border="0"></td>
  </tr>
</table>

<?

/*
*********
* Ci-dessous intégrations des bouton en dessous de la première
* table de l'entete du theme
* si vous ne voulez pas de ces boutons
* insérez "//" devant les deux lignes ci-dessous
********* */

include ("themes/ckfcphp/bouton.php");
echo "<br>";

// Fin de l'intégration

?>

<?php
echo "<table border=0 cellspacing=0 cellpadding=0 width=100% align=center><tr>
<td valign=top width=100>";
blocks(left);
echo "<img src=images/pix.gif border=0 width=200 height=1></td><td width=100% valign=top>";


// Ci-dessous intégration de l'édito oou le clblock permanent
// pour un affichage au dessus de premier article
// du site si vous ne le voulez pas
// insérez "//" devant les trois lignes ci-dessous



// fin de l'intégration de l'édito




}





function themefooter() {

// Footer du theme CKFCPHP
global $index;
if ($index == 1) {
    echo "<td>&nbsp;</td><td valign=\"top\">";
blocks(right);
    echo "</td>";
}
echo "</td></tr></table></td></tr></table>";

// intégration des bas de pages correspondant
// aux préférences "bas de page 1,2,3 et 4 du module ADMIN

footmsg();

// Fin du Footer "préférence" module Admin

// insertion d'une bannière autres que celle de Nuke
// exepmle ci-dessous celle d'autotraffic
// Mais vous pouvez mettre une pub à la place ou autre !

//echo "<script language=\"JavaScript\" src=\"http://www.autotraffic.net/js.php3?idwm=21597&idb=38103\"></script>";

// fin d'affichage de la boite d'attente de chargement de la page

}


function themeindex ($aid, $informant, $time, $title, $counter, $topic, $thetext, $notes, $morelink, $topicname, $topicimage, $topictext) {
        global $tipath, $anonymous,$phpEx;
        if ("$aid" == "$informant") { ?>


<table border="0" cellpadding="0" cellspacing="0" width="100%">
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
      <?php echo"<font color=blue>$title</font>"; ?>
      </b><br>
      <?php echo ""._POSTEDBY." "; ?>
      <?php formatAidHeader($aid) ?>
      <?php echo ""._ON.""; ?>
      <?php echo"$time"; ?>
      <br>(
      <?php echo $counter; ?>
      <?php echo ""._READS.""; ?>
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
              <?php echo "<a href=\"search.php?query=&amp;topic=$topic\"><img src=\"$tipath$topicimage\" border=\"0\" Alt=\"$topictext\" align=\"right\" hspace=\"10\" vspace=\"10\"></a></B></font>
    <b>$title</b><br><br>
    FormatStory($thetext, $notes, $aid, $informant)";?>
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
      <?php echo"<p><img src=\"themes/Funkadelic/point.gif\" width=\"8\" height=\"8\" border=\"0\" align=\"middle\"> <font color=yellow>$morelink</font>"; ?>
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
</table><br>
<!--------------------------- Fin de la premiere table themeindex --------------------------->
<?php        } else {
                if($informant != "") $boxstuff = "<a href=\"user.php?op=userinfo&uname=$informant\">$informant</a> ";
                else $boxstuff = "$anonymous ";
                $boxstuff .= ""._WRITES." <i>\"$thetext\"</i> $notes";
?>

<table border="0" cellpadding="0" cellspacing="0" width="100%">
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
      <?php echo"<font color=blue>$title</font>"; ?>
      </b><br>
      <?php echo ""._POSTEDBY." "; ?>
      <?php formatAidHeader($aid) ?>
      <?php echo ""._ON.""; ?>
      <?php echo"$time"; ?>
      <br>(
      <?php echo $counter; ?>
      <?php echo ""._READS.""; ?>
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
             <?php echo "<a href=\"search.php?query=&amp;topic=$topic\"><img src=\"$tipath$topicimage\" border=\"0\" Alt=\"$topictext\" align=\"right\" hspace=\"10\" vspace=\"10\"></a></B></font>
    <b>$title</b><br><br>
    FormatStory($thetext, $notes, $aid, $informant)";?>
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
      <?php echo"<p><img src=\"themes/Funkadelic/point.gif\" width=\"8\" height=\"8\" border=\"0\" align=\"middle\"> <Font color=yellow>$morelink</font>"; ?>
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
<!---------------------------   fin de la deuxieme table themeindex   -------------------------->
</table><br>
<?php        }
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
    <td bgcolor="B1C3D2">
      <?
              echo "<FONT size=3 color=blue><b>$title</b><br></font><font size=1>"._POSTEDON." $datetime";
                if ($admin)
                        {
                        echo "&nbsp;&nbsp; $font2 [ <a href=admin.php?op=EditStory&sid=$sid>"._EDIT."</a> | <a href=admin.$phpExphp?op=RemoveStory&sid=$sid>"._DELETE."</a> ]";
                    }
              ?>
      </td>
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

  <?php echo "<a href=\"search.php?query=&amp;topic=$topic\"><img src=\"$tipath$topicimage\" border=\"0\" Alt=\"$topictext\" align=\"right\" hspace=\"10\" vspace=\"10\"></a></B></font>
    <b>$title</b><br><br>
    FormatStory($thetext, $notes, $aid, $informant)";

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
<!--------------------------- Fin de la premiere table themearticle --------------------------->

</table>
<?





        }



        else {
                if($informant != "") $informant = "<a href=\"user.php?op=userinfo&uname=$informant\">$informant</a> ";
                else $boxstuff = "$anonymous ";
                $boxstuff .= ""._WRITES." <i>\"$thetext\"</i> $notes";


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
    <td bgcolor="B1C3D2">
      <?
              echo "<FONT size=3 color=blue><b>$title</b><br><font size=2>"._CONTRIBUTEDBY." $informant "._ON." $datetime</font>";
                if ($admin)
                        {
                        echo "&nbsp;&nbsp; $font2 [ <a href=admin.php?op=EditStory&sid=$sid>"._EDIT."</a> | <a href=admin.php?op=RemoveStory&sid=$sid>"._DELETE."</a> ]";
                    }
              ?>
      </td>
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
      echo "<a href=\"search.php?query=&amp;topic=$topic\"><img src=\"$tipath$topicimage\" border=\"0\" Alt=\"$topictext\" align=\"right\" hspace=\"10\" vspace=\"10\"></a></B></font>
    <b>$title</b><br><br>
    FormatStory($thetext, $notes, $aid, $informant)";

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
<!--------------------------- Fin de la deuxieme table themeindex --------------------------->

</table>
<?


    }
}




function themesidebox($title, $content) {


?>
<table border="0" cellpadding="0" cellspacing="0" width="220">
  <!-- fwtable fwsrc="idebox.png" fwbase="idebox.gif" fwstyle="Dreamweaver" fwdocid = "742308039" fwnested="0" -->
  <tr>
    <!-- Shim row, height 1. -->
    <td width="38"><img src="themes/ckfcphp/images/idebox/spacer.gif" width="38" height="1" border="0"></td>
    <td width="158"><img src="themes/ckfcphp/images/idebox/spacer.gif" width="100%" height="1" border="0"></td>
    <td width="33"><img src="themes/ckfcphp/images/idebox/spacer.gif" width="34" height="1" border="0"></td>
    <td width="485"><img src="themes/ckfcphp/images/idebox/spacer.gif" width="1" height="1" border="0"></td>
  </tr>
  <tr>
    <!-- row 1 -->
    <td width="38"><img name="CHG" src="themes/ckfcphp/images/idebox/CHG.gif" width="38" height="43" border="0"></td>
    <td background="themes/ckfcphp/images/idebox/PixHaut.gif" width="100%" height="43" border="0"></td>
    <td width="1"><img name="CHD" src="themes/ckfcphp/images/idebox/CHD.gif" width="34" height="43" border="0"></td>
    <td width="1"><img src="themes/ckfcphp/images/idebox/spacer.gif" width="1" height="43" border="0"></td>
  </tr>
  <tr>
    <!-- row 2 -->
    <td rowspan="2" background="themes/ckfcphp/images/idebox/PixG.gif" width="38" border="0"></td>
    <td bgcolor="#6D8FAB"><center><font size=2 color=yellow><?php echo "$title"; ?></font></center></td>
    <td rowspan="2" background="themes/ckfcphp/images/idebox/PixD.gif" width="33" border="0"></td>
    <td width="485"><img src="themes/ckfcphp/images/idebox/spacer.gif" width="1" height="1" border="0"></td>
  </tr>
  <tr>
    <td valign="top" bgcolor="#b1c3d2"><font size=1 color=black><?php echo "<br>$content"; ?></font></td>
    <!-- row 3 -->
    <td width="485" height="23"><img src="themes/ckfcphp/images/idebox/spacer.gif" width="1" height="45" border="0"></td>
  </tr>
  <tr>
    <!-- row 4 -->
    <td width="38"><img name="CBG" src="themes/ckfcphp/images/idebox/CBG.gif" width="38" height="31" border="0"></td>
    <td background="themes/ckfcphp/images/idebox/PixB.gif" width="100%" height="31" border="0"></td>
    <td width="33"><img name="CBD" src="themes/ckfcphp/images/idebox/CBD.gif" width="34" height="31" border="0"></td>
    <td width="485"><img src="themes/ckfcphp/images/idebox/spacer.gif" width="1" height="31" border="0"></td>
  </tr>
<!--------------------------- Fin de la table idebox --------------------------->
</table><br>
<?php
}
function themecenterposts($title, $content) {
    global $textcolor1, $bgcolor1, $textcolor2, $bgcolor4;
    echo "<table  width=\"95%\" border=\"0\" cellspacing=\"0\" cellpadding=\"3\" align=center>"
        ."<tr><td  bgcolor=\"$bgcolor4\">"
        ."<b><font size=2 color=\"$textcolor2\">$title</font></b></td></tr>"
        ."<tr><td  bgcolor=\"$bgcolor1\">"
        ."$content"
        ."</td></tr></table><br>";
}




?>