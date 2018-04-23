<?php
/************************************************************************/
/* PHP-NUKE: Web Portal System                                          */
/* ===========================                                          */
/*                                                                      */
/* Copyright (c) 2001 by Francisco Burzi (fbc@mandrakesoft.com)         */
/* http://phpnuke.org                                                   */
/*                                                                      */
/* Theme"AstroGreenB" design by Astro Web Design & Jack Kozbial         */
/* Copyright (C) 2001 Jack Kozbial                                      */
/* jack@internetintl.com  Chicago,USA                                   */
/* http://www.internetintl.com                                          */
/*                                                                      */
/* This program is free software. You can redistribute it and/or modify */
/* it under the terms of the GNU General Public License as published by */
/* the Free Software Foundation; either version 2 of the License.       */
/************************************************************************/

function themesidebox($title, $content) {
// block ._LOGIN.
global $bgcolor1, $bgcolor2, $bgcolor3, $bgcolor4, $textcolor1;
If ($title == ""._LOGIN."") {
echo "<table width=\"150\" cellpadding=\"2\" cellspacing=\"0\"><tr valign=\"top\">
        <td>
            <table border=\"0\" CELLPADDING=\"4\" CELLSPACING=\"0\" width=\"100%\">
                <tr><td width=\"100%\"><IMG SRC=\"themes/AstroGreenB/images/black.gif\" WIDTH=\"100%\" HEIGHT=\"1\" BORDER=0 ALT=\"\"></td></tr>
                <tr valign=\"top\">
                    <td bgcolor=\"$bgcolor1\" width=\"150\">&nbsp;<img src=\"themes/AstroGreenB/images/themes.gif\" align=\"absmiddle\">&nbsp;<b>$title</b></td></tr>
                <tr><td width=\"100%\"><IMG SRC=\"themes/AstroGreenB/images/black.gif\" WIDTH=\"100%\" HEIGHT=\"1\" BORDER=0 ALT=\"\"></td></tr>
                <tr valign=\"top\">
                    <td bgcolor=\"$bgcolor1\" border=\"1\" bordercolor=\"$bgcolor1\" cellspacing=\"0\" cellpadding=\"4\">$content</table>
            </td>
        </tr>
    </table>";
}
   else {
       If ($title == ""._SURVEY."")
       {
       echo "<table width=\"150\" cellpadding=\"2\" cellspacing=\"0\"><tr valign=\"top\">
        <td>
            <table border=\"0\" CELLPADDING=\"4\" CELLSPACING=\"0\" width=\"100%\">
                <tr><td width=\"100%\"><IMG SRC=\"themes/AstroGreenB/images/black.gif\" WIDTH=\"100%\" HEIGHT=\"1\" BORDER=0 ALT=\"\"></td></tr>
                <tr valign=\"top\">
                    <td bgcolor=\"$bgcolor1\" width=\"150\">&nbsp;<img src=\"themes/AstroGreenB/images/logout.gif\" align=\"absmiddle\">&nbsp;<b>$title</b></td></tr>
                <tr><td width=\"100%\"><IMG SRC=\"themes/AstroGreenB/images/black.gif\" WIDTH=\"100%\" HEIGHT=\"1\" BORDER=0 ALT=\"\"></td></tr>
                <tr valign=\"top\">
                    <td background=themes/AstroGreenB/images/survey.gif>$content</table>
            </td>
        </tr>
    </table>";
	
       }

   else {                    // ALL OTHER BLOCKS
   
   echo "<table width=\"150\" border=\"0\" cellspacing=\"0\" cellpadding=\"2\">
  <tr> 
    <td> 
      <table background=\"themes/AstroGreenB/images/150_tab.gif\" width=\"150\" border=\"0\" cellspacing=\"0\" cellpadding=\"0\">
        <tr> 
          <td align=\"absmiddle\">&nbsp;<img src=\"themes/AstroGreenB/images/blocks_pic.gif\" align=\"absmiddle\">&nbsp;<font color=\"$textcolor1\"><b>$title</b></font></td>
        </tr>
      </table>
      <table width=\"100%\" border=\"1\" bordercolor=\"$bgcolor1\" cellspacing=\"0\" cellpadding=\"4\">
        <tr> 
          <td>$content</td>
        </tr>
      </table>
    </td>
  </tr>
</table>";

       }
} // LOGIN
} // SURVEY
?>