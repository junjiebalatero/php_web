<?php
// Alternative Section Box , remove the include in header.php if you don't need it
function listsectionsBOX()

        {
        $result = mysql_query("select secid, secname, image from sections order by secname");
        echo "
            ";
        $count = 0;
        while (list($secid, $secname, $image) = mysql_fetch_row($result)) {
            if ($count==2) {
                echo "&nbsp;";
                $count = 0;
            }
            echo "<li><a class=resalta1 href=sections.php?op=listarticles&secid=$secid>$secname</a>";
            $count++;
            if ($count==2) {
                echo "  ";
            }
            echo "  ";
        }
        mysql_free_result($result);
        echo "  ";
}

?>


        <table width="160" border="0" cellpadding="0" cellspacing="0" valign="top">
        <tr>
        <td width="21" height="22"><img src="themes/anjara/gfx/leftcorner.gif"></td>
        <td height="22" class="ctnegro" background="themes/anjara/gfx/tdpaper.gif">&nbsp;<B><?php echo "".translate("Sections").""; ?></B></td>
        <td width="5" height="22"><img src="themes/anjara/gfx/rightcorner.gif"></td>
        </tr>
        </table>

        <br>

        <table width="100%" border="0" cellpadding="0" cellspacing="0">
        <tr>
                <td class="ctnegro">
<?php
// include your own links here mixed with the sections made with phpnuke
?>
                              <ul>
                        <li><a class=resalta1 href="index.php">Home Page</a></li>
                        <li><a class=resalta1 href="forum.php">Forums</a></li>
                        <li><a class=resalta1 href="download.php">Downloads</a></li>
                        <li><a class=resalta1 href="reviews.php">Reviews</a></li>
                
                        

<li><a class=resalta1 href=user.php>Your Account</a></li>
<li><a class=resalta1 href=opendir.php>Web Directory</a></li>
<li><a class=resalta1 href=MyHeadlinesAdmin.php>Headlines</a></li><br>

<br><b>Other Options</b><br>


<li><a class=resalta1 href="links.php?op=viewlink&cid=1">Shopping Directory</a></li>
<li><a class=resalta1 href="links.php?op=viewslink&sid=1">Buy Books</a></li>
<li><a class=resalta1 href="links.php?op=viewslink&sid=3">Buy Music</a></li>
<li><a class=resalta1 href="links.php?op=viewslink&sid=8">Buy Gifts</a></li>
<li><a class=resalta1 href="links.php?op=viewslink&sid=5">Buy DVD</a></li>
<li><a class=resalta1 href="amazonbook.php">Top Sellers</a></li>
<li><a class=resalta1 href="links.php?op=viewlink&cid=2">Freestuff</a></li><br>

<br><b>Special Sections</b><br>
<? listsectionsBOX(); ?>
<li><a class=resalta1 href="mp3.php">MP3 Server</a></li><br>

<br><b>Gamers</b><br>
<li><a class=resalta1 href="quake2.php">Quake2</a></li>
<li><a class=resalta1 href="kingpin.php">Kingpin</a></li>

                        </ul>
                </td>
        </tr>
        </table>
