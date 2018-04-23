
<?
// Love generation with PHP (21-Apr-1998)
// Created by: D.K.S., 21-Apr-1998 
// Changed by: D.K.S., 21-Apr-1998 
// Modified for PhpNuke, 15-Jan-2001
// Use it for having a looping logo in the header, just change the pictures listed below with your own files
$anjara_list = array ("logoloop2.jpg", "logoloop3.jpg", "logoloop4.jpg");
// Place pictures in the "loop" directory
srand (mktime ());
$anjara_list_length = sizeof($anjara_list) + 0;
$anjara_index = (rand() % $anjara_list_length);
$anjara_gfx = $anjara_list[$anjara_index];
echo "<a href=$nuke_url><img src=themes/anjara/loop/$anjara_gfx Alt=\"".translate('Welcome to')." $sitename\" border=0 width=237 height=145></a>"
?>