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
                 <TABLE  cellpadding=1 cellspacing=0 width=460 border=1 align=center bgcolor=$bgcolor3 height=\"16\" bordercolor=\"$bgcolor2\">
  <tr class=\"nav\">
    <td width=16% class=cellbox align=center style=cursor:hand onMouseOver=this.style.background='#FFFF33' onMouseOut=this.style.background='$bgcolor4' onClick=window.location.href='/'><a href=\"index.php\" alt=\""._HOMEPAGE."\"><b>"._HOMEPAGE."</b></a></td>
    <td width=16% class=cellbox align=center style=cursor:hand onMouseOver=this.style.background='#FFFF33' onMouseOut=this.style.background='$bgcolor4' onClick=window.location.href='topics.php'><a href=\"topics.php\" alt=\""._TOPICS."\"><b>"._TOPICS."</b></a></td>
    <td width=16% class=cellbox align=center style=cursor:hand onMouseOver=this.style.background='#FFFF33' onMouseOut=this.style.background='$bgcolor4' onClick=window.location.href='download.php'><a href=\"download.php\" alt=\""._DOWNLOADSINDB."\"><b>"._DOWNLOADS."</b></a></td>
    <td width=16% class=cellbox align=center style=cursor:hand onMouseOver=this.style.background='#FFFF33' onMouseOut=this.style.background='$bgcolor4' onClick=window.location.href='user.php'><a href=\"links.php\" alt=\""._LINKS."\"><b>"._LINKS."</b></a></td>
    <td width=16% class=cellbox align=center style=cursor:hand onMouseOver=this.style.background='#FFFF33' onMouseOut=this.style.background='$bgcolor4' onClick=window.location.href='submit.php'><a href=\"submit.php\" alt=\""._SUBMITNEWS."\"><b>"._SUBMIT."</b></a></td>
    <td width=16% class=cellbox align=center style=cursor:hand onMouseOver=this.style.background='#FFFF33' onMouseOut=this.style.background='$bgcolor4' onClick=window.location.href='top.php'><a href=\"top.php\" alt=\""._MOSTPOPULAR."\"><b>"._TOPRATED."</b></a></td>
  </tr>
</table></TD><TD width=\"24%\"> <form method=\"POST\" action=\"search.php\">
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
