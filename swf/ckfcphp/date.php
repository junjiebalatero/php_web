<?

// ****************************************** //
// * "date" theme ckfcphp Modifié par       * //
// * CKFORM et codephp                      * //
// * Fichier Bonton pour le haut du site    * //
// * le 08 05 01                            * //
// * Pour toutes questions venez sur        * //
// * ckforum.dyndns.org                     * //
// * ou www.codephp.net                     * //
// ****************************************** //

// Pour affichage simple de la date en français (traduction en français de la date courante
// Déclaration des variables $tMois et $ tJours
$tMois = array(""._JAN."", ""._FEB."", ""._MAR."", ""._APR."", ""._MAY."",""._JUN."", ""._JUL."", ""._AUG."", ""._SEP."",""._OCT."", ""._NOV."", ""._DEC.""); 
$tJours=array( "Dimanche", "Lundi", "Mardi", "Mercredi", "Jeudi", "Vendredi", "Samedi"); 
// fin


// Affichage de la date format francais en haut dans l'entete du theme
echo "<table cellSpacing=0 cellPadding=0 width=100% bgColor=#b1c3d2 border=0>
	<tr>
		<td>
			<div align=right>";
			echo "<font face=arial,verdana,helvetica size=1 color=blue>";
			echo date("j").(date("j") == 1 ? "er " : " ");
			echo $tMois[date("n")-1]." ".date("Y");
			echo "</font>";			
echo "			</div>
	    	</td>
	</tr>
	</table>
</font>";
// Fin Affichage de la date format francais 
?>