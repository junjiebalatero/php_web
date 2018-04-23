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

print "<TABLE border=0 cellPadding=0 cellSpacing=0 width=\"100%\" bgcolor=\"$bgcolor2\">
                <TBODY> 
                <TR> <TD width=\"3%\">
                  <IMG alt=Search border=0 height=34 src=\"themes/AstroBlueA/images/menu1.gif\" 
                  width=434 usemap=\"#MapM\">
				  <map name=\"MapM\"> 
  <area shape=\"rect\" coords=\"8,8,64,23\" href=\"index.php\" alt=\""._MYHOMEPAGE."\" title=\""._MYHOMEPAGE."\">
  <area shape=\"rect\" coords=\"69,9,125,22\" href=\"topics.php\" alt=\""._TOPICS."\" title=\""._TOPICS."\">
  <area shape=\"rect\" coords=\"128,9,183,22\" href=\"submit.php\" alt=\""._SUBMITNEWS."\" title=\""._SUBMITNEWS."\">
  <area shape=\"rect\" coords=\"189,9,248,21\" href=\"links.php\" alt=\""._LINKS."\" title=\""._LINKS."\">
  <area shape=\"rect\" coords=\"252,9,308,22\" href=\"top.php\" alt=\""._MOSTPOPULAR."\" title=\""._MOSTPOPULAR."\">
  <area shape=\"rect\" coords=\"312,7,367,22\" href=\"download.php\" alt=\""._DOWNLOADSINDB."\" title=\""._DOWNLOADSINDB."\">
  <area shape=\"rect\" coords=\"371,8,425,21\" href=\"search.php\" alt=\""._SEARCH."\" title=\""._SEARCH."\">
</map>
				  </TD>
                     <TD width=\"24%\"> <form method=\"POST\" action=\"search.php\">
                    <div align=right><input NAME=\"query\" TYPE=\"text\">&nbsp;&nbsp;<b>"._SEARCH."</b>
                        &nbsp;&nbsp;</div>
                    </form>
                  </TD>
                </TR>
                </TBODY> 
              </TABLE><IMG SRC=\"themes/AstroBlueA/images/blue.gif\" WIDTH=\"100%\" HEIGHT=\"1\" BORDER=0>";


function useronline() {
    global $user, $cookie, $prefix, $textcolor1;
	cookiedecode($user);
    $ip = getenv("REMOTE_ADDR");
    $username = $cookie[1];
    if (!isset($username)) {
        $username = "$ip";
        $guest = 1;
    }
    $past = time()-900;
    
    mysql_query("DELETE FROM $prefix"._session." WHERE time < $past");
    $result = mysql_query("SELECT time FROM $prefix"._session." WHERE username='$username'");
    $ctime = time();
    if ($row = mysql_fetch_array($result)) {
	mysql_query("UPDATE $prefix"._session." SET username='$username', time='$ctime', host_addr='$ip', guest='$guest' WHERE username='$username'");
    } else {
	mysql_query("INSERT INTO $prefix"._session." (username, time, host_addr, guest) VALUES ('$username', '$ctime', '$ip', '$guest')");
    }

    $result = mysql_query("SELECT username FROM $prefix"._session." where guest=1");
    $guest_online_num = mysql_num_rows($result);

    $result = mysql_query("SELECT username FROM $prefix"._session." where guest=0");
    $member_online_num = mysql_num_rows($result);

    $who_online_num = $guest_online_num + $member_online_num;
}


useronline();
     $numrows = mysql_num_rows(mysql_query("select uid from $prefix"._users.""));
     echo "<center>"._REGUSERS." <font color=\"#3333CC\"><b>$numrows</b></font>\n";
$result = mysql_query("select type, var, count from $prefix"._counter." order by type desc");
while(list($type, $var, $count) = mysql_fetch_row($result)) {
	if(($type == "total") && ($var == "hits")) {
		$total = $count;
    echo  ""._WERECEIVED." <font color=\"#3333CC\"><b>$total</b></font> "._PAGESVIEWS." Jun 2001.";
	}
}

function online1() {
global $prefix;
$count = 0;
$query = "SELECT username, host_addr FROM $prefix"._session."";
$results = mysql_query ($query);
while (list($username, $host_addr) = mysql_fetch_row($results))
{
$count ++;
}
mysql_close;
print ("  "._CURRENTLY."  <font color=\"#3333CC\"><b>$count</b></font> "._GUESTS." "._MEMBERS."</center>\n");
}

online1();
echo "
    </td>
  </tr>";

?>
