<?php
$topbar = 1; // Set $topbar to 0 (zero) if you want to disable it.

if ($topbar == 1) {
?>
[
<a href="index.php"><?PHP echo ""._MAIN.""; ?></a>

|
<a href="topics.php"><?PHP echo ""._TOPICS.""; ?></a>

|
<a href="sections.php"><?PHP echo ""._SECTIONS.""; ?></a>

|
<a href="links.php"><?PHP echo ""._LINKS.""; ?></a>

|
<a href="download.php"><?PHP echo ""._DOWNLOAD.""; ?></a>

|
<a href="user.php"><?PHP echo ""._ACCOUNT.""; ?></a>

|
<a href="stats.php"><?PHP echo ""._STATS.""; ?></a>

|
<a href="top.php"><?PHP echo ""._TOP10.""; ?></a>

|
<a href="mailto:<?PHP global $adminmail; echo $adminmail; ?>"><?PHP echo ""._EMAIL.""; ?></a>
]
<?php
   }
?>