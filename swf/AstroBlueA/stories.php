<?php
/************************************************************************/
/* PHP-NUKE: Web Portal System                                          */
/* ===========================                                          */
/*                                                                      */
/* Copyright (c) 2001 by Francisco Burzi (fbc@mandrakesoft.com)         */
/* http://phpnuke.org                                                   */
/*                                                                      */
/* Theme"AstroBlueA" design by Astro Web Design & Jack Kozbial          */
/* Copyright (C) 2001 Jack Kozbial                                      */
/* jack@internetintl.com  Chicago,USA                                   */
/* http://www.internetintl.com                                          */
/*                                                                      */
/* This program is free software. You can redistribute it and/or modify */
/* it under the terms of the GNU General Public License as published by */
/* the Free Software Foundation; either version 2 of the License.       */
/************************************************************************/

function themeindex ($aid, $informant, $time, $title, $counter, $topic, $thetext, $notes, $morelink, $topicname, $topicimage, $topictext) {
    global $tipath, $anonymous, $bgcolor1, $bgcolor2, $bgcolor3, $bgcolor4;
	if ($informant == "") {
	$informant = $anonymous;
	}
    echo "<table align=\"center\" width=\"100%\" border=\"0\" cellspacing=\"0\" cellpadding=\"2\">
  <tr>
    <td><table width=\"100%\" border=\"0\" cellspacing=\"0\" cellpadding=\"0\"><tr> 
    <td height=\"18\" bgcolor=\"#0055AD\" width=\"100%\"><table width=\"100%\" bgcolor=\"#0055AD\" cellpadding=\"0\" cellspacing=\"0\" border=\"0\">
              <tr> 
                <td> 
                  <div align=\"left\"><img src=\"themes/AstroBlueA/images/left_tab.gif\" width=\"18\" height=\"18\"></div>
                </td>
                <td width=\"100%\"><img src=\"themes/AstroBlueA/images/art_pic.gif\" align=\"absmiddle\">&nbsp;&nbsp;<font color=\"#FFFF33\"><b>$title</b></font> 
                </td>
                <td> 
                  <div align=\"right\"><img src=\"themes/AstroBlueA/images/right_tab.gif\" width=\"18\" height=\"18\"></div>
                </td>
              </tr>
            </table>
          </td>
  </tr>
  <tr>
    <td height=\"18\" width=\"100%\" bgcolor=\"$bgcolor1\">
	&nbsp;"._POSTEDBY.":&nbsp;";
			 formatAidHeader($aid);
			 echo "&nbsp;::&nbsp;news - $informant&nbsp;"._ON." $time $timezone
	</td>
  </tr>
  <tr>
    <td width=\"100%\"><table width=\"100%\" border=\"1\" cellspacing=\"0\" cellpadding=\"10\" bordercolor=\"$bgcolor1\">
        <tr>
          <td><a href=\"search.php?query=&amp;topic=$topic\"><img src=\"$tipath$topicimage\" border=\"0\" Alt=\"$topictext\" align=\"left\" hspace=\"10\" vspace=\"10\"></a>";
            
		
			FormatStory($thetext, $notes, $aid, $informant);
	echo "</td>
        </tr>
      </table>
    
	</td>
  </tr>
  <tr>
    <td height=\"18\" width=\"100%\" bgcolor=\"$bgcolor1\">
	 &nbsp;("._READS.": $counter times) $morelink
	</td>
  </tr>
</table></td>
  </tr>
</table>";   
}

/************************************************************/
/* Function themeindex()                                    */
/*                                                          */
/* This function format the stories on the story page, when */
/* you click on that "Read More..." link in the home        */
/************************************************************/

function themearticle ($aid, $informant, $datetime, $title, $thetext, $topic, $topicname, $topicimage, $topictext) {
    global $admin, $sid, $tipath, $bgcolor1, $bgcolor2, $bgcolor3, $bgcolor4;
   echo "
        <table width=\"100%\"><tr><td>
        <table width=\"100%\" cellpadding=0 cellspacing=0>
        <tr><td width=\"100%\"><IMG SRC=\"themes/AstroBlueA/images/blue.gif\" WIDTH=\"100%\" HEIGHT=\"1\" BORDER=0 ALT=\"\"></td></tr>
        <tr bgcolor=\"$bgcolor1\">
            <td>
            <table width=\"100%\" border=\"0\" cellspacing=\"0\" cellpadding=\"2\">
              <tr>
                <td>&nbsp;<img src=\"themes/AstroBlueA/images/comments.gif\" align=\"absmiddle\">&nbsp;<b>$title</b><br>
            &nbsp;
            "._POSTEDBY.":&nbsp;$informant</td>
              </tr>
            </table>
            </td>
        </tr>
        <tr><td width=\"100%\"><IMG SRC=\"themes/AstroBlueA/images/blue.gif\" WIDTH=\"100%\" HEIGHT=\"1\" BORDER=0 ALT=\"\"></td></tr>
        <tr>
            <td>
            <table width=\"100%\" border=\"0\" cellspacing=\"0\" cellpadding=\"2\">
              <tr>
                <td>"; if ($admin) { echo "<br>
            <br>
             <table>
                 <tr>
                 <td align=\"center\">
                 &nbsp;&nbsp; [ <a href=\"admin.php?op=EditStory&amp;sid=$sid\">"._EDIT."</a> | <a href=\"admin.php?op=RemoveStory&amp;sid=$sid\">"._DELETE."</a> ]
                 </td>
                </tr>
            </table>
            <br><br>";
            }
            FormatStory($thetext, $notes, $aid, $informant);
            echo "</td>
              </tr>
            </table>
            
           </td>
        </tr>
        </table>
            </td>
        </tr>
        </table>";
}
?>