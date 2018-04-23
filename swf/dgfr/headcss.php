<?php
/************************************************************************/
/* Add-on for PHP-NUKE 5 or any html header php file                    */
/* ======================================================               */
/*  Designated for IE5                                                  */
/*  HTML Header & CSS Integration configuration file.                   */
/*  headcss.php                                                         */
/*                                                                      */
/* Copyright (c) 2001 by Denis Villechalane (duns1@free.fr)             */
/* Visite : http://duns-ground.fr.st and http://phpnuke.org             */
/*                                                                      */
/* This program is free software. You can redistribute it and/or modify */
/* it under the terms of the GNU General Public License as published by */
/* the Free Software Foundation; either version 2 of the License.       */
/************************************************************************/
    # default parameters for flash loading layer & rightclick menu with IE
    # main bgcolor & textcolor into vars.php
	$themeroot= "themes/dgfr/";
	$themedouble = 0;
	$bgcolor1 = "#7777AA";
	$bgcolor2 = "#9E9ECA";
	$bgcolor3 = "#9E9ECA";
	$bgcolor4 = "#ADAFDB";
	$bgcolor5 = "#444477";
	$bgcolor6 = "#7B7BA8";
	$textcolor1 = "#222244";
	$textcolor2 = "#EEEEFF";
	$textcolor3 = "#333355";
    $textcolor4 = "#9E9ECA";
	global $slogan;
	# LINKS
	  $alink =    "#222244";
	  $avlink =   "#222244";
	  $ahlink =   "#111133";
	  $sihlink =  "11.5px";
	  # back-ground highlight color
	  $bghlink =  "#BEBFEC";
	# HEADER LINKS
	 $a1link =    "#222244";
	 $a1vlink =   "#222244";
	 $a1hlink =   "#DFDFFE";
	 #font-size on hover link
	 $si1hlink =  "11.5px";
	 # back-ground highlight color
	 $bg1hlink =  "#ADAFDB";
	# FORM
	  $bgform =   "#9E9ECA";
	# BODY
	  # $bgbody = "#C9C9ED";
	  #$bgbody =  "themes/images/back1024.gif";
	  $bgbody =   "#7777AA";
	  # size of the text in index, article, indexdouble if no classes on it
	  $bfont =    "11.5px";
	  $bodycol =  "#DFDFFE";
	  $bfamily =  "Tahoma,Verdana,Arial,Helvetica,sans-serif";
	# body scrollbars
	  # scrollbar maincolor
	  $scobody =  "#ADAFDB";
	  # shade main color
	  $shibody =  "#7777AA";
	  # arrow color
	  $scabody =  "#333355";
	  # scrollbar shade color
	  $scshbody = "#555599";
	  # scrollbar light border color
	  $scbbody =  "#EEEEFF";
	  # scrollbar 3dl&d
	  $s3lbody =  "#CCCCEE";
	  $s3dbody =  "#9999BB";
	# TEXTBOX
	  $boxbg =    "#ADAFDB";
	  $boxbrd =   "#EEEEFF";
	  $boxfcol =  "#444477";
	  $boxfsize = "11.5px";
	 # CSS Textbox scrollbars
	  $scrface =  "#9E9ECA";
	  $scrshad =  "#111133";
	  $scrhigh =  "#CCCCFF";
	  $scr3dl =   "#DDDDFF";
	  $scr3dd =   "#111133";
	  $scrtrack = "#9E9ECA";
	  $scrarrow = "#333355";
	# CSS BUTTON
	  # note : as we have phpnuke we will have to make a search & replace to put class=button on the whole site.
	  $butcol =   "#111133";
	  $butbg =    "#ADAFDB";
	  $butbrd =   "#EEEEFF";
	# HTML Header $sitename is the PHP-Nuke default variable
	# declare it if you use this as standalone.
echo "<!DOCTYPE HTML PUBLIC \"-//W3C//DTD HTML 4.01 Transitional//EN\">\n"
."<html>\n<head>\n"
."<title>$sitename</title>\n"
."<META HTTP-EQUIV=\"Content-Type\" CONTENT=\"text/html; charset="._CHARSET."\">\n"
."<META NAME=\"AUTHOR\" CONTENT=\"$sitename\">\n"
."<META NAME=\"COPYRIGHT\" CONTENT=\"Copyright (c) 2001 by $sitename\">\n"
."<META NAME=\"KEYWORDS\" CONTENT=\"News, news, New, New, Technology, technology, Headlines, headlines, Nuke, nuke, PHP-Nuke, phpnuke, php-nuke, Geek, geek, Geeks, geeks, Hacker, hacker, Hackers, hackers, Linux, linux, Windows, windows, Software, software, Download, download, Downloads, downloads, Free, FREE, free, Community, community, MP3, mp3, Forum, forum, Forums, forums, Bulletin, bulletin, Board, board, Boards, boards, PHP, php, Survey, survey, Kernel, kernel, Comment, comment, Comments, comments, Portal, portal, ODP, odp, Open, open, Open Source, OpenSource, Opensource, opensource, open source, Free Software, FreeSoftware, Freesoftware, free software, GNU, gnu, GPL, gpl, License, license, Unix, UNIX, *nix, unix, MySQL, mysql, SQL, sql, Database, DataBase, database, Mandrake, mandrake, Red Hat, RedHat, red hat, Slackware, slackware, SUSE, SuSE, suse, Debian, debian, Gnome, GNOME, gnome, Kde, KDE, kde, Enlightenment, enlightenment, Intercative, interactive, Programming, programming, Extreme, extreme, Game, game, Games, games, Web Site, web site, Weblog, WebLog, weblog, Guru, GURU, guru\">\n"
."<META NAME=\"DESCRIPTION\" CONTENT=\"$slogan\">\n"
."<META NAME=\"GENERATOR\" CONTENT=\"PHP-Nuke $Version_Num - http://phpnuke.org\">\n\n\n"
."<META NAME=\"REVISIT-AFTER\" CONTENT=\"7 days\">\n";
# automatic refresh every 8 mn (to show members and user_agent
# this should be deleted according this modify your stats heavily
# and should be considered as a bad way to boost your audience : default is disable
echo "<META HTTP-EQUIV=\"Refresh\" CONTENT=\"1040\">";
# this could be unquoted if you dont want to be scan through search motors
# echo "<META name=\"robots\" content=\"noindex,nofollow\">\n\n";
# IE5 shortcut icon for the site (.ico must be 256 colors)
echo "<LINK REL=\"SHORTCUT ICON\" HREF=\"http://$sitename/dgfrico.ico\">\n";

# Here starts the css integration
echo "\n<style type=\"text/css\" media=screen>\n"
."<!--\n"
."FONT, TD, BODY, P, DIV, INPUT, TEXTAREA, FORM, A, A1, BUTTON, TEXTBOX, ARTITLE, ARTINFO, ARTEXT, BOXTITLE, BOXMAIN {\n"
."font-family: $bfamily;\nfont-size: $bfont;\nfont-weight:normal;\n}\n"
."BODY {\nmargin:2px 2px 2px 2px;\nfont-size: $bfont;\nbackground-color: $bgbody; background-image : url(./themes/dgfr/images/bgtram5.gif);\ncolor: $bodycol;\n}\n"
.".textbox {\nborder: 1px solid $boxbrd;\nFONT-WEIGHT: bold;\nbackground-color: $boxbg;\ncolor: $boxfcol;\nfont-size: $boxfsize;\n}\n"
.".form {\nbackground-color: $bgform;\ncolor: $boxfcol;\nfont-size: $boxfsize;\n}\n"
.".button {\nfont-size:9.5px;\ncolor: $butcol;\nbackground-color: $butbg;\n}\n";
# for css tag properties only supported by MSIE
$browser = getenv("HTTP_USER_AGENT");
if (ereg("MSIE", "$browser")) {
echo "BODY {\nSCROLLBAR-FACE-COLOR: $scobody;\n"
."SCROLLBAR-HIGHLIGHT-COLOR:  $shibody;\n"
."SCROLLBAR-SHADOW-COLOR: $scshbody;\n"
."SCROLLBAR-ARROW-COLOR: $scabody;\n"
."SCROLLBAR-BASE-COLOR: $scbbody;\n"
."scrollbar-3d-light-color: $s3lbody;\n"
."scrollbar-dark-shadow-color: $s3dbody;\n}\n";
echo ".textbox {\n"
."text-align: left;\n"
."scrollbar-face-color: $scrface;\n"
."scrollbar-shadow-color: $scrshad;\n"
."scrollbar-highlight-color: $scrhigh;\n"
."scrollbar-3dlight-color: $scr3dl;\n"
."scrollbar-darkshadow-color: $scr3dd;\n"
."scrollbar-track-color: $scrtrack;\n"
."scrollbar-arrow-color: $scrarrow;\n}\n";
echo ".form {\nborder: 1px solid $boxbrd;\ntext-align: left;\n}\n";
echo ".button {\nborder-color: $butbrd;\nmargin-top:6pt;\nmargin-left: .5em;\n}\n";
echo "A:hover {\nPOSITION: relative;\nTOP: 1.4px;\n}\n";
echo "A1:hover {\nPOSITION: relative;\nTOP: 1.8px;\n}\n";
echo "AL:hover {\nPOSITION: relative;\nTOP: 4.9px;\n}\n";
} else {
echo "";
}
# common
echo "A:link {\nTEXT-DECORATION: none;\nCOLOR: $alink;\nfont-weight:bold;\nfont-size:$sihlink;\n}\n"
."A:visited {\nTEXT-DECORATION: none;\nCOLOR: $avlink;\nfont-weight:bold;\nfont-size:$sihlink;\n}\n"
."A:hover {\nFONT-WEIGHT: bold;\nfont-size: $sihlink;\nCOLOR: $ahlink;\nbackground-color: $bghlink;\nTEXT-DECORATION: none;\n}\n";
#HEADER LINKS
echo ".A1:link {\nTEXT-DECORATION: none;\nCOLOR: $a1link;\nfont-weight:bold;\nfont-size:12.5px;\n}\n"
.".A1:visited {\nTEXT-DECORATION: none;\nCOLOR: $a1vlink;\nfont-weight:bold;\nfont-size:12.5px;\n}\n"
.".A1:hover {\nFONT-WEIGHT: bold;\nfont-size: 12.5px;\nCOLOR: $a1hlink;\nBACKGROUND-color: $bg1hlink;\nTEXT-DECORATION: none;\n}\n";
# imgs links
echo ".AL:link {\nTEXT-DECORATION: none;\nCOLOR: $a1link;\n}\n"
.".AL:visited {\nTEXT-DECORATION: none;\nCOLOR: $a1vlink;\n}\n"
.".AL:hover {\nFONT-WEIGHT: bold;\nfont-size: 12.5px;\nCOLOR: $a1hlink;\nBACKGROUND:transparent;\nTEXT-DECORATION: none;\n}\n";

# for theme objects boxmenu & index title bar
echo ".boxtitle {\nFONT-WEIGHT: bold;\nCOLOR: #444477;\nfont-size: 10px;\n}\n"
.".boxmain {\nFONT-WEIGHT: bold;\nCOLOR: #444477;\nfont-size: 9.5px;\n}\n"
.".artitle {\nFONT-WEIGHT: bold;\nCOLOR: #111133;\nfont-size:11.5px;\n}\n"
.".artinfo {\nFONT-WEIGHT: normal;\nCOLOR: $textcolor3;\nfont-size:9px;\n}\n"
.".artext {\nFONT-WEIGHT: bold;\nCOLOR: $textcolor3;\nfont-size:11px;\n}\n";
echo "-->\n</style>\n\n";


# loading process
    if(isset($user)) {
		$user2 = base64_decode($user);
		$cookie = explode(":", $user2);
		if($cookie[9]=="") $cookie[9]=$Default_Theme;
		if(isset($theme)) $cookie[9]=$theme;
		if(!$file=@opendir("themes/$cookie[9]")) {
	            # if(file_exists("themes/$Default_Theme/scroller.php")) include("themes/$Default_Theme/scroller.php");
	            if(file_exists("themes/$Default_Theme/requestheader.php")) require("themes/$Default_Theme/requestheader.php");
 	} else {
	            # if(file_exists("themes/$cookie[9]/scroller.php")) include("themes/$cookie[9]/scroller.php");
	            if(file_exists("themes/$cookie[9]/requestheader.php")) require("themes/$cookie[9]/requestheader.php");
		}
	    } else {
	        # if(file_exists("themes/$Default_Theme/scroller.php")) include("themes/$Default_Theme/scroller.php");
	        if(file_exists("themes/$Default_Theme/requestheader.php")) require("themes/$Default_Theme/requestheader.php");
    	}
# dhtml and javascript parts needed to be before body tag
$browser = getenv("HTTP_USER_AGENT");
if (ereg("MSIE", "$browser")) {
?>
<STYLE>
#contextMenu {
  position: absolute;
  visibility: hidden;
  width: 140px;
  background-color: #ADAFDB;
  layer-background-color: #7777AA;
  border: 2px outset white;
}

.A:Menu {
   color: #222244;
   text-decoration: none;
  cursor: default;
   width: 100%
  }

 .A:MenuOn {
   color: #222244;
   text-decoration: none;
   background-color: #ADAFDB;
  cursor: default;
   width: 100%
  }
</STYLE>

<SCRIPT>
var menu;
function showMenu (evt) {
  if (document.all) {
    document.all.contextMenu.style.pixelLeft = event.clientX;
    document.all.contextMenu.style.pixelTop = event.clientY;
    document.all.contextMenu.style.visibility = 'visible';
    return false;
  }
  else if (document.layers) {
    if (evt.which == 3) {
      document.contextMenu.left = evt.x;
      document.contextMenu.top = evt.y;
      document.contextMenu.onmouseout =
        function (evt) { this.visibility = 'hide'; };
      document.contextMenu.visibility = 'show';
      return false;
    }
  }
  return true;
}
if (document.all)
  document.oncontextmenu =showMenu;
if (document.layers) {
  document.captureEvents(Event.MOUSEDOWN);
  document.onmousedown = showMenu;
}
</SCRIPT>
<?PHP } ?>

<SCRIPT type="text/javascript" language="JavaScript">
<!-- Begin
function chatWindow() {
open("chat.php", "Chat", "height=500,width=550,toolbar=no,scrollbars=yes");}
//-->
</script>

<SCRIPT type="text/javascript" language="JavaScript">
<!--
function affiche_heure()
{
my_date= new Date();
hour=my_date.getHours();
if (hour<10)
{hour="0"+hour;}
minute=my_date.getMinutes();
if (minute<10)
{minute="0"+minute;}
second=my_date.getSeconds();
if (second<10)
{second="0"+second;}
horloge.innerHTML=" " + hour + "h" + minute + ":" + second;
setTimeout("affiche_heure()",1000);
}
//-->
</SCRIPT><?PHP


	 # $flashed==1;
	 # if ($flashed==1) {
	# include("themes/dgfr/swf/moveswf.php");
	# }

?>
