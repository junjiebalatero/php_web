<?php

# More theme.php advanced functions
# Include : themeindexdouble,
# part dgfr v5 thematic by duns http://duns-ground.fr.st

function searchdgfr() {
global $prefix, $bgcolor1, $textcolor2;
         echo "<div aling=center valign=center>\n";
         echo "<form action=\"search.php\" method=\"post\">";
         echo "";
         $toplist = mysql_query("select topicid, topictext from $prefix".topics." order by topictext");
		 echo "<SELECT class=textbox class=textbox NAME=\"topic\" onChange='submit()'>" ;
		 echo "<OPTION VALUE=\"\">"._ALLTOPICS."    </option>\n";
		 while(list($topicid, $topics) = mysql_fetch_row($toplist)) {
		 if ($topicid==$topic) { $sel = "selected "; }
		 	echo "<option $sel value=\"$topicid\">$topics</option>\n";
		 	$sel = "";
		 }
         echo "</SELECT>";
         echo "<input class=\"textbox\" class=textbox class=textbox type=\"text\" name=\"query\" size=\"17\"></font>";
         echo "<input class=textbox type=\"hidden\" name=\"submit\" value=\"submit\"></form>";
        echo "</div>\n";
}

function toplinks() {
global $prefix, $bgcolor2;
# thanks to http://codephp.forez.com
$content6 .= "<table cellspacing=\"2\" cellpadding=\"2\" border=\"0\" width=\"100%\">";
$result12 = mysql_query("select lid, title, cid, hits from $prefix"._links_links." order by hits DESC LIMIT 0, 10");
while ($myrow12 = mysql_fetch_array($result12)) {
$content6 .= "<tr><td bgcolor=\"$bgcolor1\"><font size=-2 color=\"#333355\"><a href=\"links.php?op=viewlink&cid=$myrow12[cid]&orderby=hitsD\">$myrow12[title]</a><br>Nb. hits : <span>$myrow12[hits]</span></td></tr>\n";
}
$content6 .= "</table>";
$boxtitle6 = "Top 10 - Ressources";
themesidebox($boxtitle6, $content6);
}

function topdown() {
global $prefix;
$content7 .= "<table cellspacing=\"2\" cellpadding=\"2\" border=\"0\" width=\"100%\">";
$result13 = mysql_query("select did, dfilename, dcounter from $prefix"._downloads." order by dcounter DESC LIMIT 0, 10");
while ($myrow13 = mysql_fetch_array($result13)) {
$content7 .= "<tr><td bgcolor=\"$bgcolor2\"><font size=-2 color=\"#333355\"><a href=\"download.php?op=geninfo&did=$myrow13[did]\">$myrow13[dfilename]</a><br>Nb. hits : <span>$myrow13[dcounter]</span></td></tr>\n";
}
$content7 .= "</table>";
$boxtitle7 = "Top 10 - Download";
themesidebox($boxtitle7, $content7);
}

function themeindexdouble ($aid, $informant, $datetime, $title, $thetext, $topic, $topicname, $topicimage, $topictext, $style) {
	global $tipath, $anonymous, $bgcolor1, $bgcolor2, $bgcolor3,$bgcolor4;
	# affect 1 to titletopic for dgfr topics images theme
	$titletopic = 0;
	$style = $style % 2;
	    # palign is not used in this version
    	if ($style != 0) {
    	   echo "<tr><td valign=top width=50% align=center>";
    	   $palign="left";
    	} else {
    	   echo "<td valign=top width=50% align=center>";
    	   $palign="right";
    	}

	  echo "<table width=\"100%\" border=\"0\" cellspacing=\"0\" cellpadding=\"6\" bgcolor=\"$bgcolor4\" bordercolor=\"$bgcolor4\" valign=top align=\"center\">\n";
      # br is horizontal space between to storie box space
	  echo "<br><tr>";
	  echo "<td>\n";
	  # to debug
	  if ($titletopic) {
	  echo "<a href=\"search.php?query=&amp;topic=$topic&amp;author=\"><IMG align=right valign=bottom src=\"$tipath$topicimage\" border=0 Alt=\"$topictext\"></a>";
	  }
	  echo "<IMG alt=\"\" src=\"themes/dgfr/images/bullet1.gif\" align=left border=0 hspace=2>";
	  echo "<font class=artitle>$title</font>";
   	  # Storie header
	  echo "<br><font class=artinfo>&nbsp;";
	  formatAidHeader($aid);
	  echo "&nbsp;$datetime $timezone\n";
	  echo "&nbsp;(x$counter)";
      echo "</font>";
	  # echo "</td></tr>\n";
	  echo "<bR>";
	  echo "<IMG alt=\"\" src=\"themes/dgfr/images/line140x5.gif\" width=\"100%\" height=3 border=0 vspace=3>";

		if ("$aid" == "$informant") {
		   # here is the stories
		   echo "<tr><td>";
		   if ($titletopic != 1) {
		   echo "<a href=\"search.php?query=&topic=$topic&author=\"><IMG align=right valign=bottom src=\"$tipath$topicimage\" border=0 Alt=\"$topictext\"></a>";
		   }
		   echo "<font class=artext>$thetext</td></tr>";
	    } else {
			if ($informant != "") {
	    	     $boxstuff = "<b><a href=user.php?op=userinfo&uname=$informant>$informant</a> ";
			} else {
	    	   	 $boxstuff = "<b>$anonymous ";
		 	}
		 	# open storie box below
			echo "<tr><td><font class=artext>";
			$boxstuff .= ""._WRITES." \"$thetext\"</b>\n";
			# print the stories
		 	# for informant != from aid
			echo "$boxstuff\n";
    	    # close box
			echo "</font></td></tr>";
		 }
		 # storie footer
		 echo "<tr><td><font class=artinfo>$morelink</font></td>";
	     echo "</tr>";
	     echo "</font></td></tr></table>\n";


	 if ($style == 0) echo "</tr>";
	 # vert separator
	 else echo "<td width=5>&nbsp;&nbsp;</td>";

}

?>