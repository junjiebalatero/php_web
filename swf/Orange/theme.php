<?php

  $thename = "Orange";
  $bgcolor1 = "#ffffff";
  $bgcolor2 = "#cccccc";
  $bgcolor3 = "#ffffff";
  $bgcolor4 = "#eeeeee";
  $textcolor1 = "#ffffff";
  $textcolor2 = "#000000";
?>

<?php  
  function OpenTable() 
  {
    global $bgcolor1, $bgcolor2;
?>
  <TABLE width="100%" cellpadding="3" cellspacing="0" class="orange">
    <TR>
      <TD>
<?php
  }
?>

<?php  
  function OpenTable2() 
  {
    global $bgcolor1, $bgcolor2;
?>
  <TABLE width="100%" cellpadding="3" cellspacing="0" class="orange">
    <TR>
      <TD>
<?php
  }
?>

<?php
  function CloseTable()
  {
?>
      </TD>
    </TR>
  </TABLE>
<?php  
  }
?>

<?php  
  function CloseTable2()
  {
?>
      </TD>
    </TR>
  </TABLE>
<?php
  }
?>
  
<?php
  function FormatStory($thetext, $notes, $aid, $informant)
  {
    global $anonymous;
    if($notes != "") {
      $notes = "<b>"._NOTE."</b> <i>$notes</i>\n";
    } else {
      $notes = "";
    }
      
    if("$aid" == "$informant") {
      echo "<font size=\"2\">$thetext<br>$notes</font>\n";
    } else {
      
      if($informant != "") {
        $boxstuff = "<a href=\"user.php?op=userinfo&amp;uname=$informant\">$informant</a> ";
      } else {
        $boxstuff = "$anonymous ";
      }
      
      $boxstuff .= ""._WRITES." <i>\"$thetext\"</i> $notes\n";
      echo "<font size=\"2\">$boxstuff</font>\n";
    }
  }
?>

<?php  
  function themeheader() 
  {
?>
    <BODY>
    <?php if($banners): ?>
    <BR>
    <?php include("banners.php"); ?>
    <BR>
    <?php endif; ?>
    <TABLE cellspacing="0" cellpadding="3" width="100%">
      <TR>
        <TD>
          <A href="index.php"><IMG src="themes/Orange/images/logo.gif" alt="<?php echo ""._WELCOMETO." "; global $sitename; echo $sitename; ?>" border="0"></A>
        </TD>
        <TD align="right">
          <FORM action="search.php" method="post">
            <?php echo ""._SEARCH.""; ?> <INPUT type="text" name="query">
          </FORM>
        </TD>
      </TR>
    </TABLE>
    <TABLE cellspacing="0" cellpadding="3" width="100%">
      <TR>
        <TD valign="top" width="150">
          <?php blocks(left); ?>
          <IMG src="images/pix.gif" border="0" width="150" height="1" alt="">
        </TD>
        <TD>&nbsp;&nbsp;</TD>
        <TD width="100%" valign="top">
<?php  
  }
?>

<?php  
  function themefooter()
  {
      global $index;
?>
        </TD>
        <?php if($index == 1): ?>
        <TD>&nbsp;&nbsp;</TD>
        <TD valign="top">
  	  <?php blocks(right); ?>
        </TD>
        <?php endif; ?>
      </TR>
    </TABLE>
    <?php footmsg(); ?>
<?php  
  }
?>

<?php  
  function themeindex ($aid, $informant, $time, $title, $counter, $topic, $thetext, $notes, $morelink, $topicname, $topicimage, $topictext)
  {
    global $tipath, $anonymous;
?>
    <TABLE cellpadding="3" cellspacing="0" width="100%" class="orange">
      <TR>
        <TD class="orange-head">
          <?php echo $title; ?><BR>
          <?php echo ""._POSTEDBY.""; ?>: <?php formatAidHeader($aid); ?> <?php echo ""._ON.""; ?> <?php echo $time." ".$timezone." (".$counter." )"; ?><BR>
          Topic: <A href="search.php?query=&amp;topic=<?php echo $topic; ?>&amp;author="><?php echo $topictext; ?></A><BR>
        </TD>
      </TR>
      <TR>
        <TD class="orange-main">
          <?php FormatStory($thetext, $notes, $aid, $informant); ?>
          <BR><BR>
        </TD>
      </TR>
      <TR>
        <TD align="right" class="orange-head">
          <?php echo $morelink; ?>
        </TD>
      </TR>
    </TABLE><BR>
<?php  
  }
?>

<?php  
  function themearticle ($aid, $informant, $datetime, $title, $thetext, $topic, $topicname, $topicimage, $topictext) 
  {
      global $admin, $sid, $tipath;
?>
      <?php if("$aid" == "$informant"): ?>
      <TABLE cellpadding="3" cellspacing="0" width="100%" class="orange">
        <TR>
          <TD class="orange-head">
  	    <?php echo $title; ?><BR>
  	    <?php echo ""._POSTEDON.""; ?> <?php echo $datetime; ?>
  	    <?php if($admin): ?>
  	    &nbsp;&nbsp; [ <A href="admin.php?op=EditStory&sid=<?php echo $sid; ?>"><?php echo ""._EDIT.""; ?></A> | <A href="admin.php?op=RemoveStory&sid=<?php echo $sid; ?>"><?php echo ""._DELETE.""; ?></A> ]
  	    <?php endif; ?>
            <BR><?php echo ""._TOPIC.""; ?>: <A href="search.php?query=&amp;topic=<?php echo $topic; ?>&author="><?php echo $topictext; ?></A>
          </TD>
        </TR>
        <TR>
          <TD class="orange-main">
  	    <?php echo $thetext; ?>
  	  </TD>
  	</TR>
      </TABLE><BR>
      <?php else: ?>
      <?php 
        if($informant != "") {
          $informant = "<A href=\"user.php?op=userinfo&amp;uname=$informant\">$informant</A> ";
  	} else {
  	  $boxstuff = "$anonymous ";
  	}
  	
  	$boxstuff.= "writes"." <i>\"$thetext\"</i> $notes";
      ?>
      <TABLE cellpadding="3" cellspacing="0" width="100%" class="orange">
        <TR>
          <TD class="orange-head">
  	    <?php echo $title; ?><BR>
  	    <?php echo ""._POSTEDBY.""; ?> <?php echo $informant; ?> <?php echo ""._ON.""; ?> <?php echo $datetime; ?>
  	    <?php if($admin): ?>
  	    &nbsp;&nbsp; [ <A href="admin.php?op=EditStory&sid=<?php echo $sid; ?>"><?php echo ""._EDIT.""; ?></A> | <A href="admin.php?op=RemoveStory&sid=<?php echo $sid; ?>"><?php echo ""._DELETE.""; ?></A> ]
  	    <?php endif; ?>
            <BR><?php echo ""._TOPIC.""; ?>: <A href="search.php?query=&topic=<?php echo $topic; ?>&author="><?php echo $topictext; ?></A>
          </TD>
        </TR>
        <TR>
          <TD class="orange-main">
            <?php echo $thetext; ?>
  	  </TD>
        </TR>
      </TABLE><BR>
      <?php endif; ?>
<?php  
  }
?>

<?php  
  function themesidebox($title, $content)
  {
?>
    <TABLE width="100%" cellspacing="0" cellpadding="3" class="orange">
      <TR>
        <TD class="orange-head"><?php echo $title; ?></TD>
      </TR>
      <TR>
        <TD class="orange-main"><?php echo $content; ?></TD>
      </TR>
    </TABLE><BR>
<?php
  }
?>