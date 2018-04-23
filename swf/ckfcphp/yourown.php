<?

// ****************************************** //
// * "iconeperso" theme ckfcphp Modifié par * //
// * CKFORM et codephp                      * //
// * Fichier icones personnelles dans le    * //
// * haut du themedans le haut du site      * //
// * le 08 05 01                            * //
// * Pour toutes questions venez sur        * //
// * ckforum.dyndns.org                     * //
// * ou www.codephp.net                     * //
// ****************************************** //


global $admin, $user, $cookie, $use_custom_whosonline;
    cookiedecode($user);
$username = $cookie[1];
if ($username == "") {
        $username = "Anonymous";
}


// script seul message privée . 
echo"
<table cellpadding=0 cellspacing=1 border=0 width=100% ><tr>
<b>";  
echo "<td class=\"ctnegro\" align=right>";
// Code for Messages
	$total_messages = mysql_num_rows(mysql_query("SELECT msg_id FROM ".$mpnTables['priv_msgs']." WHERE to_userid = '$cookie[0]'"));
	$new_messages = mysql_num_rows(mysql_query("SELECT msg_id FROM ".$mpnTables['priv_msgs']." WHERE to_userid = '$cookie[0]' AND read_msg='0'"));
if ($username== "Anonymous") {
    echo "<b>(Vous êtes un utilisateur Anonyme. Enregsiterz <a href=user.php>vous !</a>.</font>)</b>";
}else{
	if($total_messages > 0) {
		if($new_messages > 0){
			echo " &nbsp;bienvenue <B>$username</B> <a href=user.php><img src=imgicon/home.gif alt=votre_compte width=15 height=15 border=0></a> <a href=viewpmsg.php><img src=imgicon/mail.gif alt=Nouveau_message width=16 height=10 border=0></a> $new_messages ST <a href=replypmsg.php?send=1><img src=imgicon/mail_write.gif alt=Ecrire_un_message_privé width=16 height=15 border=0></a> <a href=# onClick=window.open('divers/chat.htm','chat','toolbar=0,location=0,directories=0,status=1,scrollbars=0,resizable=0,copyhistory=0,menuBar=0,width=650,height=600');return(false)><img src=imgicon/chat.gif alt=CHAT width=15 height=15 border=0></a> <a href=forum.php><img src=imgicon/forum.gif alt=Forum width=16 height=10 border=0></a> <a href=whosonline.php><img src=imgicon/whosonline.gif alt=Qui_est_on_line? width=12 height=15 border=0></a> <a href=user.php?op=logout><img src=imgicon/logout.gif alt=Logout width=11 height=10 border=0></a>";
		}else{
			echo " &nbsp;bienvenue <B>$username</B> <a href=user.php><img src=imgicon/home.gif alt=votre_compte width=15 height=15 border=0></a> <a href=viewpmsg.php><img src=imgicon/mail_symbol.gif alt=Votre_boite_de_reception width=16 height=15 border=0></a> <a href=replypmsg.php?send=1><img src=imgicon/mail_write.gif alt=Ecrire_un_message_privé width=16 height=15 border=0></a> <a href=# onClick=window.open('divers/chat.htm','chat','toolbar=0,location=0,directories=0,status=1,scrollbars=0,resizable=0,copyhistory=0,menuBar=0,width=650,height=600');return(false)><img src=imgicon/chat.gif alt=CHAT width=15 height=15 border=0></a> <a href=forum.php><img src=imgicon/forum.gif alt=Forum width=16 height=10 border=0></a> <a href=whosonline.php><img src=imgicon/whosonline.gif alt=Qui_est_on_line? width=12 height=15 border=0></a> <a href=user.php?op=logout><img src=imgicon/logout.gif alt=Logout width=11 height=10 border=0></a>";
		}
	}else{
			echo " &nbsp;bienvenue <B>$username</B> <a href=user.php><img src=imgicon/home.gif alt=votre_compte width=15 height=15 border=0></a> <a href=viewpmsg.php><img src=imgicon/mail_symbol.gif alt=Votre_boite_de_reception width=16 height=15 border=0></a> <a href=replypmsg.php?send=1><img src=imgicon/mail_write.gif alt=Ecrire_un_message_privé width=16 height=15 border=0></a> <a href=# onClick=window.open('divers/chat.htm','chat','toolbar=0,location=0,directories=0,status=1,scrollbars=0,resizable=0,copyhistory=0,menuBar=0,width=650,height=600');return(false)><img src=imgicon/chat.gif alt=CHAT width=15 height=15 border=0></a> <a href=forum.php><img src=imgicon/forum.gif alt=Forum width=16 height=10 border=0></a> <a href=whosonline.php><img src=imgicon/whosonline.gif alt=Qui_est_on_line? width=12 height=15 border=0></a> <a href=user.php?op=logout><img src=imgicon/logout.gif alt=Logout width=11 height=10 border=0></a>";
	}
}
echo "</table>";