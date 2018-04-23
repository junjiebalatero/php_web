<?php

// Affichage des images type personelles

global $user, $cookie, $use_custom_whosonline;
    cookiedecode($user);
$username = $cookie[1];

// Pour affichage simple de la date en français
$tMois = array("Janvier", "Février", "Mars", "Avril", "Mai","Juin", "Juillet", "Août", "Septembre","Octobre", "Novembre", "Décembre"); 
$tJours=array( "Dimanche", "Lundi", "Mardi", "Mercredi", "Jeudi", "Vendredi", "Samedi"); 
// fin


// script seul message privée . 
echo"<table cellpadding=0 cellspacing=1 border=0 width=100% ><tr><b>";  
echo "<td class=\"ctnegro\" align=center>";

// Code for Messages
	$total_messages = mysql_num_rows(mysql_query("SELECT msg_id FROM ".$mpnTables['nuke_priv_msgs']." WHERE to_userid = '$cookie[0]'"));
	$new_messages = mysql_num_rows(mysql_query("SELECT msg_id FROM ".$mpnTables['nuke_priv_msgs']." WHERE to_userid = '$cookie[0]' AND read_msg='0'"));

	if ($username=="Anonymous") {
	// Date 
		echo "<font face=arial,verdana,helvetica size=2 color=blue>";
		echo $tJours[date("w")] ." ";
		echo date("j").(date("j") == 1 ? "er " : " ");
		echo $tMois[date("n")-1]." ".date("Y");
		echo "</font>";	
		// Fin Date
			echo "<b>&nbsp;Vous êtes un utilisateur Anonyme. <a href=user.php>Enregsitrez vous !</a>.</font>)</b>";
		}else{
			if($total_messages > 0) {
				if($new_messages > 0){

				// Date 
				echo "<font face=arial,verdana,helvetica size=2 color=blue>";
				echo $tJours[date("w")] ." ";
				echo date("j").(date("j") == 1 ? "er " : " ");
				echo $tMois[date("n")-1]." ".date("Y");
				echo "</font>";	
				// Fin Date
				echo " <font face=arial>&nbsp;bienvenue <B>$username</B> <a href=user.php><img src=imgicon/home.gif alt=votre_compte width=15 height=15 border=0></a> <a href=viewpmsg.php><img src=imgicon/mail.gif alt=Nouveau_message width=16 height=10 border=0></a> $new_messages ST <a href=replypmsg.php?send=1><img src=imgicon/mail_write.gif alt=Ecrire_un_message_privé width=16 height=15 border=0></a> <a href=# onClick=window.open('divers/chat.htm','chat','toolbar=0,location=0,directories=0,status=1,scrollbars=0,resizable=0,copyhistory=0,menuBar=0,width=650,height=600');return(false)><img src=imgicon/chat.gif alt=CHAT width=15 height=15 border=0></a> <a href=forum.php><img src=imgicon/forum.gif alt=Forum width=16 height=10 border=0></a> <a href=whosonline.php><img src=imgicon/whosonline.gif alt=Qui_est_on_line? width=12 height=15 border=0></a> <a href=user.php?op=logout><img src=imgicon/logout.gif alt=Logout width=11 height=10 border=0></a></font>";
			
					}else{ 
					// Date 
					echo "<font face=arial,verdana,helvetica size=2 color=blue>";
					echo $tJours[date("w")] ." ";
					echo date("j").(date("j") == 1 ? "er " : " ");
					echo $tMois[date("n")-1]." ".date("Y");
					echo "</font>";	
					// Fin Date
					echo " <font face=arial>&nbsp;bienvenue <B>$username</B> <a href=user.php><img src=imgicon/home.gif alt=votre_compte width=15 height=15 border=0></a> <a href=viewpmsg.php><img src=imgicon/mail_symbol.gif alt=Votre_boite_de_reception width=16 height=15 border=0></a> <a href=replypmsg.php?send=1><img src=imgicon/mail_write.gif alt=Ecrire_un_message_privé width=16 height=15 border=0></a> <a href=# onClick=window.open('divers/chat.htm','chat','toolbar=0,location=0,directories=0,status=1,scrollbars=0,resizable=0,copyhistory=0,menuBar=0,width=650,height=600');return(false)><img src=imgicon/chat.gif alt=CHAT width=15 height=15 border=0></a> <a href=forum.php><img src=imgicon/forum.gif alt=Forum width=16 height=10 border=0></a> <a href=whosonline.php><img src=imgicon/whosonline.gif alt=Qui_est_on_line? width=12 height=15 border=0></a> <a href=user.php?op=logout><img src=imgicon/logout.gif alt=Logout width=11 height=10 border=0></a></font>";
					}
			}else{
			// Date 
			echo "<font face=arial,verdana,helvetica size=2 color=blue>";
			echo $tJours[date("w")] ." ";
			echo date("j").(date("j") == 1 ? "er " : " ");
			echo $tMois[date("n")-1]." ".date("Y");
			echo "</font>";	
			// Fin Date
			echo " <font face=arial>&nbsp;bienvenue <B>$username</B> <a href=user.php><img src=imgicon/home.gif alt=votre_compte width=15 height=15 border=0></a> <a href=viewpmsg.php><img src=imgicon/mail_symbol.gif alt=Votre_boite_de_reception width=16 height=15 border=0></a> <a href=replypmsg.php?send=1><img src=imgicon/mail_write.gif alt=Ecrire_un_message_privé width=16 height=15 border=0></a> <a href=# onClick=window.open('divers/chat.htm','chat','toolbar=0,location=0,directories=0,status=1,scrollbars=0,resizable=0,copyhistory=0,menuBar=0,width=650,height=600');return(false)><img src=imgicon/chat.gif alt=CHAT width=15 height=15 border=0></a> <a href=forum.php><img src=imgicon/forum.gif alt=Forum width=16 height=10 border=0></a> <a href=whosonline.php><img src=imgicon/whosonline.gif alt=Qui_est_on_line? width=12 height=15 border=0></a> <a href=user.php?op=logout><img src=imgicon/logout.gif alt=Logout width=11 height=10 border=0></a></font>";
			}
		}

echo "</table>";
echo "</font>";

?>