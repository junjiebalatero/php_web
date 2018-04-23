<?
global $user, $cookie, $use_custom_whosonline;
    cookiedecode($user);
$username = $cookie[1];


// script seul message privée . 
echo"
<table cellpadding=0 cellspacing=1 border=0 width=100% ><tr>
<b>";  
echo "<td align=right>";
// Code for Messages
	$total_messages = mysql_num_rows(mysql_query("SELECT msg_id FROM priv_msgs WHERE to_userid = '$cookie[0]'"));
	$new_messages = mysql_num_rows(mysql_query("SELECT msg_id FROM priv_msgs WHERE to_userid = '$cookie[0]' AND read_msg='0'"));
if ($username== "Anonymous") {
    echo "<b>(Vous êtes un utilisateur Anonyme. Enregsiterz <a href=user.php>vous !</a>.</font>)</b>";
}else{
	if($total_messages > 0) {
		if($new_messages > 0){
			echo " &nbsp;bienvenue <B>$username</B> <a href=user.php><img src=themes/anjara/imgicon/home.gif alt=To your personal page width=15 height=15 border=0></a> <a href=viewpmsg.php><img src=themes/default/mail.gif alt=New Messages width=16 height=10 border=0></a> $new_messages ST <a href=replypmsg.php?send=1><img src=themes/anjara/imgicon/mail_write.gif alt=Write a private message width=16 height=15 border=0></a> <a href=coming_soon.php><img src=themes/anjara/imgicon/chat.gif alt=The Chatroom width=15 height=15 border=0></a> <a href=index_forum.php><img src=themes/anjara/imgicon/forum.gif alt=Forum width=16 height=10 border=0></a> <a href=whosonline.php><img src=themes/anjara/imgicon/whosonline.gif alt=Whos online? width=12 height=15 border=0></a> <a href=user.php?op=logout><img src=themes/anjara/imgicon/logout.gif alt=Logout width=11 height=10 border=0></a>";
		}else{
			echo " &nbsp;bienvenue <B>$username</B> <a href=user.php><img src=themes/anjara/imgicon/home.gif alt=To your personal page width=15 height=15 border=0></a> <a href=viewpmsg.php><img src=themes/anjara/imgicon/mail_symbol.gif alt=Your In-Box width=16 height=15 border=0></a> <a href=replypmsg.php?send=1><img src=themes/anjara/imgicon/mail_write.gif alt=Write a private message width=16 height=15 border=0></a> <a href=coming_soon.php><img src=themes/anjara/imgicon/chat.gif alt=The Chatroom width=15 height=15 border=0></a> <a href=index_forum.php><img src=themes/anjara/imgicon/forum.gif alt=Forum width=16 height=10 border=0></a> <a href=whosonline.php><img src=themes/anjara/imgicon/whosonline.gif alt=Whos online? width=12 height=15 border=0></a> <a href=user.php?op=logout><img src=themes/anjara/imgicon/logout.gif alt=Logout width=11 height=10 border=0></a>";
		}
	}else{
		echo " &nbsp;bienvenue <B>$username</B> <a href=user.php><img src=themes/anjara/imgicon/home.gif alt=To your personal page width=15 height=15 border=0></a> <a href=viewpmsg.php><img src=themes/anjara/imgicon/mail_symbol.gif alt=In-Box width=16 height=15 border=0></a> <a href=replypmsg.php?send=1><img src=themes/anjara/imgicon/mail_write.gif alt=Write a private message width=16 height=15 border=0></a> <a href=coming_soon.php><img src=themes/anjara/imgicon/chat.gif alt=The Chatroom width=15 height=15 border=0></a> <a href=index_forum.php><img src=themes/anjara/imgicon/forum.gif alt=Forum width=16 height=10 border=0></a> <a href=whosonline.php><img src=themes/anjara/imgicon/whosonline.gif alt=Whos online? width=12 height=15 border=0></a> <a href=user.php?op=logout><img src=themes/anjara/imgicon/logout.gif alt=Logout width=11 height=10 border=0></a>";
	}
}
echo "</table>";