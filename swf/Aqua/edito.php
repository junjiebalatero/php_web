<?php
/************************************************************************/
/* Petite bidouille pour le theme AQUA de la version nuke 4.4x et 	*/
/* myphpnuke 1.8 fix 5 (par chriskad de CKFORUM.FR.FM) 			*/
/*			version 1.0 (et la derniere ;)			*/
/*									*/
/* AVANT TOUT Recopier votre theme "AqUA" en AQUA			*/
/* Pour plus de sécurité !!! Mais pensez a changer le Chemin des images	*/
/* et des fichiers en iclude()									*/
/* Ceci n'est pas un AddON et ne fait appel à aucune fonction 		*/
/* spécifique mis à part la traduction. C'est une bidouille et rien 	*/
/* de plus...En revanche elle ne devrait pas interférée avec les autres */
/* theme...								*/
/*									*/
/*									*/
/* Utilisez la commande -> 					*/
/*									*/
/*	if ($index == 1) {					*/	
/*	include ('themes/Aqua/edito.php');		*/
/*	}								*/
/*									*/
/* au dessus de -> if ($index == 1) { < 				*/
/* (utilisez la fonction recherche de votre editeur texte) 		*/
/* qui devrait se trouver en bas 					*/
/* du fichier header.php du theme ereka que vous aurez renomé en ereka2	*/
/* Ensuite aller un peu plus bas dans le fichier puis insérez votre "édito"	*/
/* comme vous le souhaitez. Vous pouvez aussi modifier l image bien evidemment	*/
/* 										*/
/* Evidemment a chaque fois que vous voudrez mofifier votre "EDITO"	*/
/* Il faudra que re-modifier ce fichier...				*/
/************************************************************************/
?>
<table width="100%" border="0" cellspacing="0" cellpadding="0" align=center >
  <tr> 
    <td width="15" height="15" background="themes/Aqua/images/cadre/coinsupg.gif"><img src="themes/Aqua/images/cadre/space15_15.gif" width="15" height="15"></td>
    <td height="15" colspan="3" background="themes/Aqua/images/cadre/sup.gif"><img src="themes/Aqua/images/cadre/space15_15.gif" width="15" height="15"></td>
    <td width="15" height="15" background="themes/Aqua/images/cadre/coinsupd.gif"><img src="themes/Aqua/images/cadre/space15_15.gif" width="15" height="15"></td>
  </tr>
  <tr> 
    <td width="15" rowspan="4" background="themes/Aqua/images/cadre/g.gif"><img src="themes/Aqua/images/cadre/space15_15.gif" width="15" height="15"></td>
    <td height="15" width="15" background="themes/Aqua/images/cadre/carresupg.gif"><img src="themes/Aqua/images/cadre/space15_15.gif" width="15" height="15"></td>
    <td height="15" background="themes/Aqua/images/cadre/carresup.gif"><img src="themes/Aqua/images/cadre/space15_15.gif" width="15" height="15"></td>
    <td height="15" width="15" background="themes/Aqua/images/cadre/carresupd.gif"><img src="themes/Aqua/images/cadre/space15_15.gif" width="15" height="15"></td>
    <td width="15" rowspan="4" background="themes/Aqua/images/cadre/d.gif"><img src="themes/Aqua/images/cadre/space15_15.gif" width="15" height="15"></td>
  </tr>
  <tr> 
    <td background="themes/Aqua/images/cadre/carreg.gif"><img src="themes/Aqua/images/cadre/space15_15.gif" width="15" height="15"></td>
      
    <td background="themes/Aqua/images/cadre/carrefond.gif" align="left" width="100%" ><b>
<FONT size=3 color=blue>EDITO CKFORUM</font></b><br>
Envoy&eacute;/Supervis&eacute; par <b>ckforum</b> </td>
    <td width="15" background="themes/Aqua/images/cadre/carred.gif"><img src="themes/Aqua/images/cadre/space15_15.gif" width="15" height="15"></td>
  </tr>
  <tr> 
    <td height="15" width="15" background="themes/Aqua/images/cadre/carreinfg.gif"><img src="themes/Aqua/images/cadre/space15_15.gif" width="15" height="15"></td>
    <td height="15" background="themes/Aqua/images/cadre/carreinf.gif"><img src="themes/Aqua/images/cadre/space15_15.gif" width="15" height="15"></td>
    <td height="15" width="15" background="themes/Aqua/images/cadre/carreinfd.gif"><img src="themes/Aqua/images/cadre/space15_15.gif" width="15" height="15"></td>
  </tr>
  <tr> 
      
    <td colspan="3" background="themes/Aqua/images/cadre/fond.gif">&nbsp;

<?php 
//<--Insertion du texte de l'edito-->
echo " <img src=themes/ereka2/copyright.gif Alt=\"EDITO CKFORUM\" align=\"left\" border=\"1\">";
//include ('themes/txtedito.php');
// fin du texte de l edito
?>
</td>
  </tr>
  <tr> 
    <td width="15" height="15" background="themes/Aqua/images/cadre/coininfg.gif"><img src="themes/Aqua/images/cadre/space15_15.gif" width="15" height="15"></td>
    <td height="15" colspan="3" background="themes/Aqua/images/cadre/inf.gif"><img src="themes/Aqua/images/cadre/space15_15.gif" width="15" height="15"></td>
    <td width="15" height="15" background="themes/Aqua/images/cadre/coininfd.gif"><img src="themes/Aqua/images/cadre/space15_15.gif" width="15" height="15"></td>
  </tr>
</table><br>
<?