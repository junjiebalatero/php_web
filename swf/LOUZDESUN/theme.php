<?php

$thename  = "LOUZDESUN";
$bgcolor1   = "#FFD000";
$bgcolor2   = "#999999";
$bgcolor3   = "#EFEFEF";
$bgcolor4   = "#FFFFFF";
$textcolor1 = "#FFFFFF";
$textcolor2 = "#000000";

function OpenTable() {
    global $bgcolor1, $bgcolor2;
    echo "<table width=\"100%\" border=\"0\" cellspacing=\"0\" cellpadding=\"0\" bgcolor=\"$bgcolor3\"><tr><td>\n";
    echo "<table width=\"100%\" border=\"0\" cellspacing=\"0\" cellpadding=\"0\" bgcolor=\"$bgcolor4\"><tr><td>\n";
}

function OpenTable2() {
    global $bgcolor1, $bgcolor2;
    echo "<center>";
    echo "<table border=\"0\" cellspacing=\"0\" cellpadding=\"0\" bgcolor=\"$bgcolor2\"><tr><td>\n";
    echo "<table border=\"0\" cellspacing=\"0\" cellpadding=\"0\" bgcolor=\"$bgcolor1\"><tr><td>\n";
}

function CloseTable() {
    echo "</td></tr></table></td></tr></table>\n";
}
function CloseTable2() {
    echo "</td></tr></table></td></tr></table>\n";
}

function FormatStory($thetext, $notes, $aid, $informant) {
    global $anonymous;
    if ($notes != "") {
        $notes = "<b>"._NOTE."</b> <i>$notes</i>\n";
    } else {
        $notes = "";
    }
    if ("$aid" == "$informant") {
        echo "<font size=\"2\">$thetext<br>$notes</font>\n";
    } else {
        if($informant != "") {
            $boxstuff = "<a href=\"user.php?op=userinfo&amp;uname=$informant\"> $informant</a> ";
        } else {
            $boxstuff = "$anonymous ";
        }
        $boxstuff .= ""._WRITES." <i>\"$thetext\"</i> $notes\n";
        echo "<font size=\"2\">$boxstuff</font>\n";
    }
}
function themeheader() {

// Insertion de la feuille de style
echo "<LINK rel=\"StyleSheet\" HREF=\"themes/LOUZDESUN/style/style.css\" TYPE=\"text/css\">";
 // insertion du banner
echo "<BODY text=#000000 vLink=#000000 aLink=#000000 link=#000000 bgColor=#EFEFEF leftMargin=0 topMargin=0 rightMargin=0 marginheight=0  onLoad=\"cacheOff()\">
<!-- DEBUT DU SCRIPT -->
<STYLE TYPE=\"text/css\"><!-- #cache {position:absolute; top:200px; z-index:10; visibility:hidden;}--></STYLE>
<DIV ID=\"cache\"><TABLE WIDTH=400 BGCOLOR=#000000 BORDER=0 CELLPADDING=0 CELLSPACING=0><TR><TD ALIGN=center VALIGN=middle><TABLE WIDTH=100% BGCOLOR=#FF9900 BORDER=0 CELLPADDING=0 CELLSPACING=0><TR><TD ALIGN=center VALIGN=left><FONT FACE=\"Verdana\" SIZE=5 COLOR=#000000><B><BR>Loading Site ...<BR><BR></B></FONT></TD></TR></TABLE></TD></TR></TABLE></DIV>

<SCRIPT LANGUAGE=\"JavaScript\">
var nava = (document.layers);
var dom = (document.getElementById);
var iex = (document.all);
if (nava) { cach = document.cache }
else if (dom) { cach = document.getElementById(\"cache\").style }
else if (iex) { cach = cache.style }
largeur = screen.width;
cach.left = Math.round((largeur/2)-200);
cach.visibility = \"visible\";

function cacheOff()
        {
        cach.visibility = \"hidden\";
        }
</SCRIPT>
<!-- FIN DU SCRIPT -->

<table   bgcolor=#fefefe>

    <tr>

      <div align=left>

      <td align=left>
        <table cellspacing=0 cellpadding=0  border=0 align=center height=20>

            <tr>
               <td  valign=bottom align=right><img src=themes/LOUZDESUN/images/angle_gauche.gif></td>
              <td valign=bottom  bgcolor=#ffffff>
                <table cellspacing=0 cellpadding=0 width=100% border=0>

                    <tr>
                      <td  bgcolor=#ffd000 height=11></td>
                    </tr>
                    <tr>
                      <td  bgcolor=#666666 height=2></td>
                    </tr>
                    <tr>
                      <td valign=center align=middle  bgcolor=#999999 height=22><img src=themes/LOUZDESUN/images/puce.gif border=0 width=9 height=9>
                        <font size=1><a href=index.php><font face=Verdana color=#ffffff sans-serif helvetica, arial>"._MAIN."</font></a>
                        <img src=themes/LOUZDESUN/images/puce.gif border=0 width=9 height=9>
                        <a href=links.php?op=AddLink><font face=Verdana, color=#ffffff sans-serif helvetica, arial>"._ADDLINK."</font></a>&nbsp;<img src=themes/LOUZDESUN/images/puce.gif border=0 width=9 height=9>
                        <a href=Download.php><font face=Verdana color=#ffffff sans-serif helvetica, arial>"._DOWNLOAD."</font></a><img src=themes/LOUZDESUN/images/puce.gif border=0 width=9 height=9>
                        <a href=links.php><font face=Verdana, color=#ffffff sans-serif helvetica, arial>"._LINKS."</font></a>
                        <img src=themes/LOUZDESUN/images/puce.gif border=0 width=9 height=9></font></td>
                    </tr>
                    <tr>
                      <td valign=center align=middle  bgcolor=#ffbd08 height=70>
                        <div align=center>
                          <center>
                                                    <table cellspacing=0 cellpadding=0  border=0>

                              <tr>
                                <td align=middle width=50% bgcolor=#ffbd08 height=20>
                                  <p><img src=themes/LOUZDESUN/images/logo.gif  height=53></p>
                                </td>
                              </tr>

                          </table>
                          </center>
                        </div>
                      </td>
                    </tr>

                </table>
              </td>
              <td valign=bottom align=left  bgcolor=#FFFFFF><img src=themes/LOUZDESUN/images/angle_droit.gif  height=105></td>
            </tr>

        </table>
      <CENTER></CENTER></center>
  </div>";
 // Insertion Du module de recherche de la page acceuil
       ?>

<div align="center">
  <center>
<TABLE cellSpacing=0 cellPadding=0 width=100% bgColor=#ffffff  height=65>
     <TR bgcolor=#FFFFFF>
                <TD height=25 valign=bottom><img src=themes/LOUZDESUN/images/rech.gif width=92 height=18></TD>
                <TD align=right height=25 valign=middle><a href=index.php><img
                        height=18 alt=HOME SWEET HOME
                        src=themes/LOUZDESUN/images/b-pub.gif width=75
                      border=0></a></TD>
                <TD height=25></TD>
              </TR>
    <td width="250" height="28" bgcolor=#EFEFEF>
   <form action=search.php method=post>
          <img hspace=1 src=themes/LOUZDESUN/images/loupe2_o.gif align=top border=0 width="19" height="20">
          <input type=text size=20 name=query >
          <INPUT TYPE=image hspace=1 src=themes/LOUZDESUN/images/go_francite.gif  >
          </td>
          </form>

          <td width="451" bgcolor=#EFEFEF>
    <form action="search.php" method=get><FONT size="1">
        <img border=0 src=themes/LOUZDESUN/images/sujet.gif width="90" height="11">  <?php $toplist = mysql_query("select topicid, topictext from nuke_topics order by topictext");
    echo "<SELECT NAME=\"topic\"onChange='submit()'>" ; ?> style="background-color: #FFFFFF"<?
    echo "<OPTION VALUE=\"\">"._ALLTOPICS."</option>\n";
    while(list($topicid, $topics) = mysql_fetch_row($toplist)) {
    if ($topicid==$topic) { $sel = "selected "; }
        echo "<option $sel value=\"$topicid\">$topics</option>\n";
    $sel = "";
    }
    echo "</SELECT></FONT></FORM>";?></td>

  </tr>
</table>

  </center>
  </div>
<? echo "<table border=0 cellspacing=0 cellpadding=0 width=100%><tr><td valign=top width=150 bgcolor=FFFFFF>";
        blocks(left);
echo "</td><td>&nbsp;</td><td width=100% valign=top>";
?>
<div align="center">

</div><? echo "<font face='Times New Roman'size=2>";


}

function themefooter() {
   global $index;
    if ($index == 1) {
    echo "</td><td>&nbsp;&nbsp;</td><td valign=\"top\" bgcolor=\"#FFFFFF\">";
 blocks(right);

   }
echo "</td><td></td></tr></table></td></tr></table> </td>
    </tr>
<br>";

echo "
  <table cellspacing=0 cellpadding=0 width=766 align=center bgcolor=#FEFEFE border=1 nowrap bordercolor=#ffd00 style=border-style: dotted; border-color: #000000; padding: 1>

    <tr>

      <td align=middle height=17><table><tr>
<td> <center>";
 footmsg();

  echo "</td>  </tr></table></center></table>
<br>";
///// Insertion du code pour l'animation d'affichage
//echo" <script language=\"javascript\"><!--    ap_showWaitMessage('waitDiv', 0); //--></script>";
/// Fin du scripts
}

function themeindex ($aid, $informant, $time, $title, $counter, $topic, $thetext, $notes, $morelink, $topicname, $topicimage, $topictext) {
    global $tipath, $anonymous;
    echo "<div align=center>
  <center>

<table cellSpacing=0 cellPadding=0 width=100% border=0>
  <tr>
    <td align=middle bgcolor=#FFD000><img alt hspace=0 src=themes/LOUZDESUN/images/gauche.gif align=left width=20 height=17><img alt hspace=0 src=themes/LOUZDESUN/images/droite.gif align=right width=20 height=17>
      <p align=left><font face='Verdana, Arial, Helvetica, sans-serif' color=#606438 size=2><b>
      &nbsp;&nbsp;&nbsp;$title</b></font></p>
    </td>
  </tr>
<tr bgColor=#ffffff>
    <td>
      <table cellSpacing=0 cellPadding=0 width=100% border=0>
        <tbody>
          <tr>
            <td width=105><a href=\"search.php?query=&topic=$topic\"><img src=\"$tipath$topicimage\" Alt=\"$topictext\" align=\"right\" border=\"0\"></td>
            <td vAlign=top>$thetext<br>$boxstuff<br></td>
          </tr>
        </tbody>
      </table>
    </td>
  </tr>
</table>
<table cellSpacing=0 cellPadding=0 width=100% bgColor=#666666>
  <tr>
    <td bgcolor=#d9d9d9><font size=1>$morelink";


    echo "
    </td>
  </tr>
</table>




  </center><br>
</div>";
}
function themeindex2 ($aid, $informant, $time, $title, $counter, $topic, $thetext, $notes, $morelink3, $topicname, $topicimage, $topictext) {
    global $tipath, $anonymous, $bgcolor1, $bgcolor2, $bgcolor3, $bgcolor4;
    echo "<table border=0 width=100%>
          <tr>
            <td width=90%><font color=#FF0000 size=1><b>NEW !&nbsp;<font color=#000000 size=2>$morelink3</font><br></b>&nbsp;&nbsp;&nbsp;"._SUBJECT."&nbsp;: </font><a href=search.php?query=&amp;topic=$topic>$topictext</a></td>
          </tr>
          <tr>
            <td width=10% bgcolor=\"$bgcolor1\"  height=1></td>
          </tr>
        </table>";

}

function themearticle ($aid, $informant, $datetime, $title, $thetext, $topic, $topicname, $topicimage, $topictext) {
    global $admin, $sid, $tipath;
    echo "<center>
    <table cellSpacing=0 cellPadding=0 width=100% border=0>
  <tr>
    <td align=middle bgcolor=#FFD000>
      <p align=left><img alt hspace=0 src=themes/LOUZDESUN/images/gauche.gif align=left width=6 height=17><img alt hspace=0 src=themes/LOUZDESUN/images/droite.gif align=right width=5 height=17>&nbsp;&nbsp;&nbsp;<font size=3  face=helevtica,arial><b>$title</b><br>
    </td>
  </tr>
<tr><td><br>"; if ($aid == $informant) {
        $boxstuff = "$thetext";
    } else {
        if($informant != "") {
            $boxstuff = "<a href=\"user.php?op=userinfo&uname=$informant\">$informant</a> ";
        } else {
            $boxstuff = "$anonymous ";
        }
        $boxstuff .= ""._WRITES." <i>\"$thetext\"</i> $notes";
    }
    echo "<font size=2 color=#686868 face=helevtica,arial><a href=\"search.php?query=&topic=$topic\"><img src=\"$tipath$topicimage\" Alt=\"$topictext\" align=\"right\" border=\"0\"></a> "
        ."$boxstuff";
   echo " </td>
  </tr>
</table><table cellSpacing=0 cellPadding=0 width=100% bgColor=#666666>
  <tr>
    <td bgcolor=#d9d9d9><font size=1>"._POSTEDON." $datetime<b>";
  if ($admin) {
        echo "&nbsp;&nbsp;[ <a href=\"admin.php?op=EditStory&sid=$sid\">"._EDIT."</a> | <a href=\"admin.php?op=RemoveStory&sid=$sid\">"._DELETE."</a> ]";
    }
    echo "<br>"._TOPIC.": <a href=\"search.php?query=&topic=$topic&author=\">$topictext</a><br></td>
  </tr>
</table>
";
}

// Blocks des cotés  CUSTOM CUSTOM CUSTOM CUSTOM CUSTOM CUSTOM CUSTOM CUSTOM CUSTOM CUSTOM CUSTOM CUSTOM
function themesidebox2($title, $content) {
// Declaration de block light remplacer dans mainfile.php la fonction thesidebox pat thmesidebox2 et ajouter l'image que vous voulez pour vos users
echo"<table border=0 width=100%>
  <tr>
    <td width=5%><img border=0 src=\"themes/LOUZDESUN/images/users.gif\" width=32 height=32></td>
    <td width=95%>$content</td>
  </tr>
</table>"
;
}
function themesidebox3($title, $content) {
// Declaration de block light remplacer dans mainfile.php la fonction thesidebox pat thmesidebox3 
echo"<table border=0 width=100%>
  <tr>
    <td width=5%><img border=0 src=\"themes/LOUZDESUN/images/bigstory.gif\" width=32 height=32></td>
    <td width=95%>$content</td>
  </tr>
</table>"
;
}
function themesidebox4($title, $content) {
// Declaration de block light remplacer dans mainfile.php la fonction themesidebox par thmesidebox4
echo "<table height=20 cellspacing=0 cellpadding=0 width=180 bgcolor=#ffffff border=0>
  <tbody>
    <tr>
      <td width=180 background=themes/LOUZDESUN/images/a-sommaire.gif height=20><font face=Arial color=#ff0000 size=1><b>&nbsp;&nbsp;&nbsp;<b>$title</b></b></font></td>
    </tr>
  </tbody>
</table>
<table cellspacing=0 cellpadding=0 width=180 border=0>
  <tbody>
    <tr>
      <td>
        <table cellspacing=0 cellpadding=0 width=180 border=0>
          <tbody>
            <tr>
              <td><img height=4 src=themes/LOUZDESUN/images/rubr_haus.gif width=180></td>
            </tr>
            <tr>
              <td bgcolor=#cccccc>$content</tr>
          </tbody>
        </table>
      </td>
    </tr>
    <tr>
      <td><img height=4 src=themes/LOUZDESUN/images/rubr_bas.gif width=180></td>
    </tr>
  </tbody>
</table>";
}
function themesidebox($title, $content) {
// Si le block est l'ephémérides
If ($title == ""._EPHEMERIDS."") {
echo " <b>$content</b><br>";
}
 else {
       If ($title == ""._SURVEY."")
       {
       echo "<table height=20 cellspacing=0 cellpadding=0 width=180 bgcolor=#ffffff border=0>
  <tbody>
    <tr>
      <td width=180 background=themes/LOUZDESUN/images/b-sommaire.gif height=20><font face=Arial color=#606438 ><b>&nbsp;&nbsp;&nbsp;<b>$title</b></b></font></td>
    </tr>
  </tbody>
</table>
<table cellspacing=0 cellpadding=0 width=180 border=0>
  <tbody>
    <tr>
      <td>
        <table cellspacing=0 cellpadding=0 width=180 border=0>
          <tbody>
            <tr>
              <td><img height=4 src=themes/LOUZDESUN/images/rubr_haus.gif width=180></td>
            </tr>
            <tr>
              <td  background=themes/LOUZDESUN/images/sondage.gif>$content</tr>
          </tbody>
        </table>
      </td>
    </tr>
    <tr>
      <td><img height=4 src=themes/LOUZDESUN/images/rubr_bas.gif width=180></td>
    </tr>
  </tbody>
</table>";
       }

   else {                    // OTHERS
   echo "<table height=20 cellspacing=0 cellpadding=0 width=180 bgcolor=#ffffff border=0>
  <tbody>
    <tr>
      <td width=180 background=themes/LOUZDESUN/images/b-sommaire.gif height=20><font face=Arial color=#606438 size=1><b>&nbsp;&nbsp;&nbsp;<b>$title</b></b></font></td>
    </tr>
  </tbody>
</table>
<table cellspacing=0 cellpadding=0 width=180 border=0>
  <tbody>
    <tr>
      <td>
        <table cellspacing=0 cellpadding=0 width=180 border=0>
          <tbody>
            <tr>
              <td><img height=4 src=themes/LOUZDESUN/images/rubr_haus.gif width=180></td>
            </tr>
            <tr>
              <td bgcolor=#cccccc>$content</tr>
          </tbody>
        </table>
      </td>
    </tr>
    <tr>
      <td><img height=4 src=themes/LOUZDESUN/images/rubr_bas.gif width=180></td>
    </tr>
  </tbody>
</table>";       }
} // ephemerides
} // SURVEY

 //             end of function
?>