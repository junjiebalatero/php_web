<?PHP
/************************************************************************/
/*  Center Block Add-on V0.2                                            */
/*  PHP-Nuke version 4.4.1                                              */
/************************************************************************/
/*                                                                      */
/*  Scott Harrison                                                      */
/*  Homepage: http://www.dirtsims.com                                   */
/*  Forum: http://www.dirtsims.com/forum.php                            */
/*                                                                      */
/*  This PHP-Nuke add-on will let you have a center block where you     */
/*  can post your Latest Headlines, Latest Downloads, New Links,        */
/*  Reviews, plus you can use any of your other blocks as well.         */
/*                                                                      */
/*  This add-on includes this file plus centerblock_install_01.txt. If  */
/*  you obtained this file without centerblock_install_01.txt you can   */
/*  get it at:                                                          */
/*                                                                      */
/*    ftp://www.dirtsims.com/phpnuke/centerblock_addon-02.zip           */
/*                                                                      */
/*  If you find installing from a text file difficult to understand     */
/*  what is code and what's direction then an HTML install can be       */
/*  found at:                                                           */
/*                                                                      */
/*    http://www.dirtsims.com/phpnuke/centerblock_install_02.html       */
/*                                                                      */
/*  Should you have any problems or questions, we have created a        */
/*  forum for just PHP-Nuke discussion at:                              */
/*    http://www.dirtsims.com/forum.php                                 */
/*  the PHP-Nuke forum from the list.                                   */
/*                                                                      */
/************************************************************************/
/* PHP-NUKE: Web Portal System                                          */
/* ===========================                                          */
/*                                                                      */
/* Copyright (c) 2001 by Francisco Burzi (fburzi@ncc.org.ve)            */
/* http://phpnuke.org                                                   */
/*                                                                      */
/* This program is free software. You can redistribute it and/or modify */
/* it under the terms of the GNU General Public License as published by */
/* the Free Software Foundation; either version 2 of the License.       */
/************************************************************************/

 function themecenterbox($title, $content) {
global $mpnTables,$bgcolor2; 
    echo "
    <table width=\"100%\" border=\"0\" cellspacing=\"4\" cellpadding=\"4\">
      <tr>
        <td><font size=\"2\"><b>$title</b><br>$content</font></td>
      </tr>
    </table>";
}
function listsectionsBOX2()
        {
global $mpnTables; 
        $result = mysql_query("select artid,secid, title,counter from ".$mpnTables['seccont']."
order by counter  DESC LIMIT 5");
        //echo "
       //     ";
        $title1 = "Dossiers les plus lus -";
         $title1 .= "<span class=\"ctnegro \"> - <a class=\"link11\" href=\"section.php\"><b>Tous les dossiers &#187;</b></a></span>";
        while (list($artid,$secid ,$headlinetitle , $counter) = mysql_fetch_row($result)) {
          if(strlen($headlinetitle) > 37) {
            $headlinetitle = substr($headlinetitle,0,37);
            $headlinetitle .= "...";
        }

                $content .= "<img src=\"images/bullet.gif\" width=\"11\" height=\"11\" alt=\"Submit News\" hspace=\"3\"><a class=\"ctnegro\"  href=sections.php?op=viewarticle&artid=$artid>$headlinetitle</a> ($counter)<br>";
       //  $count++;
          //  if ($count==2) {
          //      echo "  ";
           // }
           // echo "  ";
        }
       // mysql_free_result($result);
        
        themecenterbox($title1, $content);

}



function recentheadlines() { // get the 5 most recent headline stories
global $mpnTables;         
$query="SELECT sid, title, counter FROM ".$mpnTables['stories']." ORDER BY counter DESC LIMIT 5";
        $result=mysql_query($query);
        $title = "Articles les plus lus -";
         $title .= "<span class=\"ctnegro \"> - <a class=\"link11\" href=\"submit.php\"><b>Poster une info &#187;</b></a></span>";
        while (list($sid, $headlinetitle ,$counter) = mysql_fetch_row($result)) {
                if(strlen($headlinetitle) > 37) {
            $headlinetitle = substr($headlinetitle,0,37);
            $headlinetitle .= "...";
        }
                $content .= "<img src=\"images/bullet.gif\" width=\"11\" height=\"11\" alt=\"Poster une info\" hspace=\"3\"><a class=\"ctnegro\" href=\"article.php?sid=$sid\">$headlinetitle</a> ($counter)<br>";
        }
        themecenterbox($title, $content);
}

function recentdownloads() { // get the 5 most recent downloads
global $mpnTables;         
$query="SELECT dfilename, ddate, did,dcounter,dcategory 
 FROM ".$mpnTables['downloads']." ORDER BY ddate DESC LIMIT 5";
        $result=mysql_query($query);
        $title = "nouveaux Downloads";
        $title .= "<span class=\"ctnegro\"> - <a class=\"link11\" href=\"download.php\"><b>Acces download &#187;</b></a></span>";
        while (list($dfilename,$ddate,$ddid,$dcounter,$dcategory 
) = mysql_fetch_row($result)) {
                $content .= "<img src=\"images/bullet.gif\" width=\"11\" height=\"11\" alt=\"Acces download\" hspace=\"3\"><a class=\"ctnegro\" href=\"download.php?op=geninfo&did=$ddid\">$dfilename</a>- $dcategory 
  ($dcounter)<br>";
        }
        themecenterbox($title, $content);
}

function recentlinks() { // get the 5 most recent web links
global $mpnTables;         
$query="SELECT cid, sid, title FROM ".$mpnTables['links_links']."  ORDER BY date DESC LIMIT 5 ";
        $result=mysql_query($query);
        $title = "nouveaux liens";
        $title .= "<span class=\"ctnegro\"> - <a class=\"link11\" href=\"links.php?op=AddLink\"><b>Ajout</b></a> | <a class=\"link11\" href=\"links.php\"><b>tous les liens &#187;</b></a></span>";
        while ($array = mysql_fetch_array($result)) {
      if ($array[sid]==0) {
        $content .= "<img src=\"images/bullet.gif\" width=\"11\" height=\"11\" alt=\"Ajouter votre liens\" hspace=\"3\"><a class=\"ctnegro\" href=\"links.php?op=viewlink&cid=$array[cid]\">$array[title]</a> <br>";
      } else {
        $content .= "<img src=\"images/bullet.gif\" width=\"11\" height=\"11\" alt=\"Ajouter votre liens\" hspace=\"3\"><a class=\"ctnegro\" href=\"links.php?op=viewslink&sid=$array[sid]\">$array[title]</a> <br>";
      }
        }
        themecenterbox($title, $content);
}

function recentreviews() { // get the 5 most recent reviews
global $mpnTables;         
$query="SELECT id, title ,hits FROM ".$mpnTables['reviews']."  ORDER BY date DESC limit 5";
        $result=mysql_query($query);
        $title = "Nouveaux sites nuke";
        $title .= "<span class=\"ctnegro\"> - <a class=\"link11\" href=\"reviews.php?op=write_review\"><b>Submit</b></a> | <a class=\"ctnegro\" href=\"reviews.php\"><b>View All &#187;</b></a></span>";
        while (list($rid,$reviewtitle,$hits) = mysql_fetch_row($result)) {
                $content .= "<img src=\"images/bullet.gif\" width=\"11\" height=\"11\" alt=\"Latest Reviews\" hspace=\"3\"><a class=\"ctnegro\" href=\"reviews.php?op=showcontent&id=$rid\">$reviewtitle</a> ($hits)<br>";
        }
        themecenterbox($title, $content);
}




    echo "
<table align=\"center\" width=\"100%\" cellspacing=\"1\" cellpadding=\"3\" border=\"0\">

    <td align=\"right\"><b>";


       echo"
<table align=\"center\" bgcolor=\"#999999\" width=\"100%\" cellspacing=\"1\" cellpadding=\"2\" border=\"0\">
  <tr bgcolor=$bgcolor1 width=\"50%\" valign=\"top\">
    <td colspan=\"2\">";
        recentheadlines();
        listsectionsBOX2()  ;
//message(); // available as a seprate add-on

    echo "</td>
    <td colspan=\"2\" width=\"50%\">";
            recentdownloads();
            recentlinks();
    echo "</td>
  </tr>
  <tr class=\"text11\" align=\"center\" valign=\"middle\">

  </tr>
</table></td>
  </tr>
</table><br><br>";

?>