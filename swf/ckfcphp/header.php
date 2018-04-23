<?

/*
*************************************************************************
* Thèmes "CKFCPHP" créé par 
* CKFORUM (ckforu.dyndns.org) et CODEPHP (codephp.net)
* Ce thèmes est un peu large il est fortement conseillé de l'utiliser
* en 1024 x 768 il serait sage de le préciser sur votre site
* Il ne fonctionne pas non plus sur netscape version 4.x
* Mais cela ne saurait tardé certainement dans les prochaines version 
* si il rencontre le succès et puis nous contons sur vous pour le faire 
*"evoluer" ;) 
*************************************************************************
*/

?>

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
<body onload=init() bgcolor="#6D8FAB" link=000000 vlink=000000 topmargin=5 leftmargin=0 rightmargin=0 marginheight=5>
<?


global $admin, $user, $cookie, $use_custom_whosonline;
    cookiedecode($user);
$username = $cookie[1];
if ($mpn_display_fetching_request==1) OpenWaitBox();
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
   <td><img src="themes/ckfcphp/images/entete/spacer.gif" width="1" height="53" border="0"></td>
  </tr>
  <tr><!-- row 3 -->
   <td background="themes/ckfcphp/images/entete/PixG2.gif" width="54" height="38" border="0" bgcolor="#b1c3d2"></td>
    <td bgcolor="#b1c3d2"> 

      <table width=100%>
        <tr>
          <td width=50% align=left>
            <?

echo "
<a href=$nuke_url><img src=" . showlogo() . " Alt=\""._WELCOMETO." $sitename\" border=0  align=left></a>

";

?>
          </td>
          <td>
            <?include ("themes/ckfcphp/date.php");?>
          </td>
        </tr>
        <tr> 
          <td width=50% align=left> 
            <? echo"</b><font size=1>$slogan </font>";?>
          </td>
          <td> 
            <?include ("themes/ckfcphp/yourown.php");?>
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

make_sidebar("left",$storynum);
echo "<img src=images/pix.gif border=0 width=200 height=1></td><td width=100% valign=top>";


// Ci-dessous intégration de l'édito oou le clblock permanent
// pour un affichage au dessus de premier article 
// du site si vous ne le voulez pas 
// insérez "//" devant les trois lignes ci-dessous

if ($index == 1) {
include ("themes/ckfcphp/cblock.php");
}

// fin de l'intégration de l'édito


if ($index == 1) {


	if ($mpn_display_whatsnews == 1) {
		recentnews();
	}
	if ($mpn_display_recenttopics == 1){
		recenttopics();
	}
}
?>

