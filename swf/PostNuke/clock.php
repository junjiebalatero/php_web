<?php
/************************************************************************/
/* Post-Nuke: Content Management System                                 */
/* ====================================                                 */
/*                                                                      */
/* Copyright (c) 2001 by the Post Nuke development team                 */
/* http://www.postnuke.com                                              */
/************************************************************************/
/************************/
/* Modified version of: */
/************************************************************************/
/* PHP-NUKE: Web Portal System                                          */
/* ===========================                                          */
/*                                                                      */
/* Copyright (c) 2001 by Francisco Burzi (fbc@mandrakesoft.com)         */
/* http://phpnuke.org                                                   */
/*                                                                      */
/* This program is free software. You can redistribute it and/or modify */
/* it under the terms of the GNU General Public License as published by */
/* the Free Software Foundation; either version 2 of the License.       */
/************************************************************************/
/************************************************************************/
/* Filename:                                                            */
/* Original  Author: Dean Kennedy (dean@terrabyte.dc.com.au)            */
/* Version 1.0   23 October 2000                                        */
/* Purpose:                                                             */
/************************************************************************/
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
