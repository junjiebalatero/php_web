<?

// Pour affichage simple de la date en français
$tMois = array("Janvier", "Février", "Mars", "Avril", "Mai","Juin", "Juillet", "Août", "Septembre","Octobre", "Novembre", "Décembre"); 
$tJours=array( "Dimanche", "Lundi", "Mardi", "Mercredi", "Jeudi", "Vendredi", "Samedi"); 
// fin


// Affichage de la date format francais 
echo "<table cellSpacing=0 cellPadding=0 width=100% bgColor=#b1c3d2 border=0>
	<tr>
		<td>
			<div align=right>";
			echo "<font face=arial,verdana,helvetica size=1 color=blue>";
			echo $tJours[date("w")] ." ";
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