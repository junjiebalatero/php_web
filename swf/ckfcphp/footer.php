<?php

// Footer du theme CKFCPHP

if ($index == 1) {
    echo "<td>&nbsp;</td><td valign=\"top\">";
	make_sidebar("right",$storynum);
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
if ($mpn_display_fetching_request==1) CloseWaitBox();
?>