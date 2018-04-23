<?php
/************************************************************************/
/* PHP-NUKE: Web Portal System                                          */
/* ===========================                                          */
/*                                                                      */
/* Copyright (c) 2001 by Francisco Burzi (fbc@mandrakesoft.com)         */
/* http://phpnuke.org                                                   */
/*                                                                      */
/* Theme"AstroGreenA" design by Astro Web Design & Jack Kozbial         */
/* Copyright (C) 2001 Jack Kozbial                                      */
/* jack@internetintl.com  Chicago,USA                                   */
/* http://www.internetintl.com                                          */
/*                                                                      */
/* This program is free software. You can redistribute it and/or modify */
/* it under the terms of the GNU General Public License as published by */
/* the Free Software Foundation; either version 2 of the License.       */
/************************************************************************/
print "<tr><td width=\"100%\"><IMG SRC=\"themes/AstroGreenA/images/black.gif\" WIDTH=\"100%\" HEIGHT=\"1\" BORDER=0 ></td></tr>
<tr bgcolor=\"$bgcolor2\">
    <td align=\"center\" valign=\"middle\" colspan=\"2\">";
	
	if ($username == "Anonymous") {
	echo "<b><font color=\"#005500\">$slogan</font>&nbsp;&nbsp;::&nbsp;&nbsp;"._YOUAREANON."&nbsp;&nbsp;::";
    } else {
	echo "<b>"._HELLO."&nbsp;<font color=\"#FFFF33\">$username!</font>&nbsp;<img src=\"themes/AstroGreenA/images/smiley.gif\" align=\"absmiddle\">&nbsp;"._USERACCOUNT."&nbsp;<a href = \"user.php\">"._CONFIGURE."&nbsp;<img src=\"themes/AstroGreenA/images/account.gif\" BORDER=\"0\" ALT=\""._USERACCOUNT."\" align=\"absmiddle\"></a>
	&nbsp;"._ASREG6."&nbsp;<a href=\"user.php?op=chgtheme\">"._CONFIGURE."<img src=\"themes/AstroGreenA/images/themes.gif\" BORDER=\"0\" ALT=\""._ASREG6."\" align=\"absmiddle\"></a>&nbsp;&nbsp;<img src=\"themes/AstroGreenA/images/logout.gif\" BORDER=\"0\" ALT=\""._LOGOUTEXIT."\" align=\"absmiddle\">&nbsp;<a href=\"user.php?op=logout\">"._LOGOUTEXIT."</a>&nbsp;&nbsp;";
    }
	
//// Java Date
print "&nbsp;&nbsp;"._DATE.": <font color=\"#005500\"><script type=\"text/javascript\">
        var monthNames = new Array( \"January\",\"February\",\"March\",\"April\",\"May\",\"June\",\"July\",\"August\",\"September\",\"October\",\"November\",\"December\")
        var now = new Date()
        thisYear = now.getYear()
        if(thisYear < 1900) {thisYear += 1900}
        document.write(monthNames[now.getMonth()] + \" \" + now.getDate() + \", \" + thisYear)
        </script></font></b></td></tr>
		<tr><td width=\"100%\"><IMG SRC=\"themes/AstroGreenA/images/black.gif\" WIDTH=\"100%\" HEIGHT=\"1\" BORDER=0 ALT=\"\"></td></tr>
</table>";
?>