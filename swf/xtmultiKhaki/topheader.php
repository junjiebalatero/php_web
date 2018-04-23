<?
echo   "<body leftmargin=\"0\" topmargin=\"0\">\n";
echo   "<table cellpadding=\"0\" cellspacing=\"0\" width=\"100%\" border=\"1\"><tr><td widht=\"25%\" align=\"left\" background=\"themes/xtmultiKhaki/images/tittel.gif\">\n"
      ."<font size=\"2\">\n";


     global $user, $cookie, $mpnTables;
        if (isset($user)) getusrinfo($user);

echo   "<b>"._HELLO." </b> ";

        if ($user) {
                cookiedecode($user);
                echo "<a href=\"user.php\">$cookie[1]</a> <font size=2>[ <a href=\"user.php?op=logout\">"._LOGOUT."</a> ]</font>";
        } else {
                echo "$anonymous <font size=2>[ <a href=\"user.php\">"._NEWUSER."</a> ]</font>";
        }


echo   "</td><td widht=\"50%\ align=\"center\" background=\"themes/xtmultiKhaki/images/tittel.gif\"><center><font size=\"2\"></font>\n";
echo   "<font size=\"2\">&nbsp;<strong><big>&middot;</big></strong>&nbsp;<a href=\"http://www.postnuke.com\" target=\"_blank\">PostNuke</a>&nbsp;<strong><big>&middot;</big></strong>&nbsp;"
      ."<a href=\"http://www.hotscripts.com/\" target=\"_blank\">Hot Scripts</a>&nbsp;<strong><big>&middot;</big></strong>&nbsp;"
      ."<a href=\"http://www.planetx.com\" target=\"_blank\">Planet X</a>&nbsp;<strong><big>&middot;</big></strong>&nbsp;"
      ."<a href=\"http://www.mywebaddons.com\" target=\"_blank\">myWebAddons</a>&nbsp;<strong><big>&middot;</big></strong>&nbsp;"
      ."<a href=\"http://www.php.net/manual/en/\" target=\"_blank\">PHPmanual</a>&nbsp;<strong><big>&middot;</big></strong>&nbsp;"
      ."<a href=\"http://www.sourceforge.net\" target=\"_blank\">Source Forge</a>&nbsp;<strong><big>&middot;</big></strong></center>";


echo   "</font></td><td widht=\"25%\ align=\"center\" background=\"themes/xtmultiKhaki/images/tittel.gif\">\n"
      ."<script type=\"text/javascript\">\n\n"
      ."<!--   // Array ofmonth Names\n"
      ."var monthNames = new Array( \"January\",\"February\",\"March\",\"April\",\"May\",\"June\",\"July\",\"August\",\"September\",\"October\",\"November\",\"December\");\n"
      ."var now = new Date();\n"
      ."thisYear = now.getYear();\n"
      ."if(thisYear < 1900) {thisYear += 1900}; // corrections if Y2K display problem\n"
      ."document.write(monthNames[now.getMonth()] + \" \" + now.getDate() + \", \" + thisYear);\n"
      ."// -->\n\n"
      ."</script></b></font>"
      ."</td></tr></table>\n";
?>
