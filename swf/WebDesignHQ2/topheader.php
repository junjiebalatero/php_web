<?
echo "<table cellpadding=\"0\" cellspacing=\"0\" width=\"100%\" border=\"0\"><tr><td widht=\"15%\" align=\"left\">\n"
    ."<font size=\"2\">\n";	
    if ($username == "Anonymous") {
	echo "\n";
    } else {
	echo "";
    }
     echo "</td><td width=\"70%\" align=\"center\"><font size=\"2\">\n";
   
     echo "</font></td><td widht=\"15%\" align=\"center\">\n"
  ."<script type=\"text/javascript\">\n\n"
        ."<!--   // Array ofmonth Names\n"
        ."var monthNames = new Array( \""._JAN."\",\""._FEB."\",\""._MAR."\",\""._APR."\",\""._MAY."\",\""._JUN."\",\""._JUL."\",\""._AUG."\",\""._SEP."\",\""._OCT."\",\""._NOV."\",\""._DEC."\");\n"
        ."var now = new Date();\n"
        ."thisYear = now.getYear();\n"
        ."if(thisYear < 1900) {thisYear += 1900}; // corrections if Y2K display problem\n"
        ."document.write(monthNames[now.getMonth()] + \" \" + now.getDate() + \", \" + thisYear);\n"
        ."// -->\n\n"
        ."</script></b></font>"

     ."</td></tr></table>\n";
echo "<table width=\"100%\" border=\"0\" cellspacing=\"0\" cellpadding=\"0\">"
  ."<tr>"
    ."<td width=\"2%\"><img src=\"themes/WebDesignHQ2/images/left_title.jpg\" width=\"30\" height=\"7\"></td>"
    ."<td width=\"95%\" background=\"themes/WebDesignHQ2/images/line_title.jpg\"><img src=\"pixel.gif\" width=\"1\" height=\"1\"></td>"
    ."<td width=\"3%\"><img src=\"themes/WebDesignHQ2/images/right_title.jpg\" width=\"31\" height=\"7\"></td>"
  ."</tr>"
."</table>";

?>

