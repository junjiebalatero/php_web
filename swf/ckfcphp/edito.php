<?php
/************************************************************************/
/* Petite bidouille pour le theme CKFCPHP de la version nuke 4.4x et 	*/
/* myphpnuke 1.8 fix 5 (par chriskad et vlionel)         		*/
/*			version 1.0 (et la derniere ;)			*/
/*									*/
/* Cette bidouille permet d'avoir un EDITO permanent au dessus des      */
/* articles dans le theme. pour modifié le contenu il suffit de         */
/* déplacer le fichier "txtedito.php" dans la racine des thèmes         */         
/* ensuite grâce à votre logiciel FTP préféré vous ne modifiez          */
/* que le contenu de ce fichier pour que le texte soit commun à         */
/* tous les thèmes pour lesquels vous aurez ajouté cet EDITO !!!        */
/*                                                                      */
/*                                                                      */
/* Ceci n'est pas un AddON et ne fait appel à aucune fonction 		*/
/* spécifique mis à part la traduction. C'est une bidouille et rien 	*/
/* de plus...En revanche elle ne devrait pas interférée avec les autres */
/* themes...								*/
/*									*/
/*									*/
/* Utilisez la commande -> 					        */
/*									*/
/*	if ($index == 1) {					        */	
/*	include ('themes/Aqua/edito.php');		                */
/*	}								*/
/*									*/
/* au dessus de -> if ($index == 1) { < 				*/
/* (utilisez la fonction recherche de votre editeur texte) 		*/
/* qui devrait se trouver en bas 					*/
/* du fichier header.php du theme ckfcphp                               */
/* Ensuite aller un peu plus bas dans le fichier puis insérez votre     */ 
/* "édito" comme vous le souhaitez. vous pouvez aussi ne plus           */
/* l'afficher  en rajoutant "//" sans les " devant la ligne que nous    */
/* venons de rajouter                                                   */
/* Vous pouvez aussi modifier l image bien evidemment                   */
/*                                                                      */
/************************************************************************/
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
    <td rowspan="3"  background="themes/ckfcphp/images/entete/pixG1.gif" width="21" height="123" border="0"></td>
    <td><img name="CH2G" src="themes/ckfcphp/images/entete/CH2G.gif" width="54" height="53" border="0"></td>
    <td background="themes/ckfcphp/images/entete/Pixhaut2.gif" width="605" height="53" border="0"></td>
    <td><img name="CH2D" src="themes/ckfcphp/images/entete/CH2D.gif" width="48" height="53" border="0"></td>
    <td rowspan="3" background="themes/ckfcphp/images/entete/PixD1.gif" width="25" height="123" border="0"></td>
    <td><img src="themes/ckfcphp/images/entete/spacer.gif" width="1" height="53" border="0"></td>
  </tr>
  <tr>
    <!-- row 3 -->
    <td background="themes/ckfcphp/images/entete/PixG2.gif" width="54" height="38" border="0" bgcolor="#b1c3d2"></td>
    <td bgcolor="#b1c3d2"> 
      <table width=100%>
        <tr>
          <td align=left>
            <div align="center"><b><font size=3 color=blue>EDITO 
              <? echo "$sitename\n";?>
              </font> </b> </div>
          </td>
        </tr>
        <tr> 
          <td align=left> 
            <?php 
		//<--Insertion du texte de l'edito-->
		echo " <img src=themes/ckforum/copyright.gif Alt=\"EDITO CKFORUM\" align=\"right\" border=\"0\">";
		include ('themes/txtedito.php');
		// fin du texte de l edito
	     ?>
          </td>
        </tr>
      </table>
    </td>
    <td background="themes/ckfcphp/images/entete/PixD2.gif" width="48" height="38" border="0"></td>
    <td><img src="themes/ckfcphp/images/entete/spacer.gif" width="1" height="38" border="0"></td>
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
 </table>
<br>
<?

