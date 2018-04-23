<?php
$topbar = 1; // Set $topbar to 0 (zero) if you want to disable it.

if ($topbar == 1) {
?>
<table border="0" cellspacing="0" cellpadding="0">
  <tr>
    <td width="104" height="24" background="themes/DarkBlueCS1/images/box.gif">
      <p align="center">&nbsp;
<a href="index.php"><?PHP echo ""._MAIN.""; ?></a>

      </td>
    <td width="104" height="24" background="themes/DarkBlueCS1/images/box.gif">
      <p align="center">
<a href="sections.php"><?PHP echo ""._SECTIONS.""; ?></a>

    </td>
    <td width="104" height="24" background="themes/DarkBlueCS1/images/box.gif">
      <p align="center">
<a href="links.php"><?PHP echo ""._LINKS.""; ?></a>

    </td>
    <td width="104" height="24" background="themes/DarkBlueCS1/images/box.gif">
      <p align="center">
<a href="links.php?op=AddLink"><?PHP echo ""._ADDLINK.""; ?></a>
   
   </td>
    <td width="104" height="24" background="themes/DarkBlueCS1/images/box.gif">
      <p align="center">
<a href="user.php"><?PHP echo ""._ACCOUNT.""; ?></a>

    </td>
    <td width="104" height="24" background="themes/DarkBlueCS1/images/box.gif">
      <p align="center">
<a href="submit.php"><?PHP echo ""._SUBMITNEWS.""; ?></a>

      </td>
    <td width="104" height="24" background="themes/DarkBlueCS1/images/box.gif">
      <p align="center">
<a href="download.php"><?PHP echo ""._DOWNLOADS.""; ?></a>

    </td>
  </tr>
</table>
<?php
   }
?>