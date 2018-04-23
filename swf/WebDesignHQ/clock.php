<?php

// melbdate.php3
// rename file extension from .txt to .php3

// Script copyright (C) 2000 Dean Kennedy (dean@terrabyte.dc.com.au)
// Version 1.0   23 October 2000
// Free to use, modify and copy so long as you leave my name in comments

// Distributed under the terms of the GNU General Public License (GPL).
// Because it is licensed free of charge, there is NO WARRANTY, it is
// provided AS IS. The author can not be held liable for any damage that
// might arise from the use of this software. Use it at your own risk.
// http://www.gnu.org/copyleft/gpl.html

// To adjust the format of the date, see the list of variables at the
// official PHP site (php.net): http://www.php.net/manual/function.date.php
//
// If your local time is *behind* the server time, then change the "+" to
// a "-" in the $melbdate line
// 
// Keep in mind that you'll have to update the $hourdiff variable within the
// script when your *local* daylight saving time/standard time changes, if
// it is a different setting to the server daylight saving/standard time

// Variable for hours

$hourdiff = "0"; // hours difference between server time and local time

// If you don't know how many hours, then "uncomment" the three lines
// below by deleting "// " to see what the server time is (remember to
// put the comments "// " back when you've finished checking:

// $serverdate = date("l, d F Y h:i a");
// print ("$serverdate");
// print (" &nbsp; <p>");

// Nothing needs to be changed below here unless you want to change
// the format of the date (see above for URL of options) or your local
// time is behind the server time

$timeadjust = ($hourdiff * 60 * 60);

$melbdate = date("l, d F Y h:i a",time() + $timeadjust);

print ("$melbdate");

?>
