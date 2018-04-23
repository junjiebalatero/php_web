<?php

if ($index == 1) {
    echo "<td>&nbsp;</td><td valign=\"top\">";
	make_sidebar("right",$storynum);
    echo "</td>";
}
echo "</td></tr></table></td></tr></table>";
footmsg();
echo "<script language=\"JavaScript\" src=\"http://www.autotraffic.net/js.php3?idwm=21597&idb=38103\"></script>";
if ($mpn_display_fetching_request==1) CloseWaitBox();
?>