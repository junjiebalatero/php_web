<?php

	# dgfr theme test for css integration in header.php added here

	# if default portal theme is already dgfr CSS select from headcss.php is used.
	if ($Default_Theme=="dgfr") $checkdgfr = 1;

	# if user selected theme is dgfr CSS select from headcss.php is also used.
	if(isset($user)) {
	 $user4 = base64_decode($user);
	 $cookie = explode(":", $user4);
	  if($cookie[9]=="") $cookie[9]=$Default_Theme;
	  if(isset($theme)) $cookie[9]=$theme;
	  # echo lines for debugging
	  # echo "defaut theme: $Default_Theme<br>";
	  # echo "user : $theme<br>";
	  $checkdgfr = 0;
	  $themed = "$cookie[9]";
      if ($themed == "dgfr") $checkdgfr=1;
	  # echo "$checkdgfr";
	  }


?>

