

<?php
require_once 'core/init.php';
if(Session::exists('home')){
echo '<p>' . Session::flash('home') . '</p>';
}
$user = new User();
if($user->isLoggedIn()){
?>
<!DOCTYPE html>
<html lang="en">
<head>
<title>Marjie Website</title>
<meta charset="utf-8">
<meta name="viewport" content="width=device-width, initial-scale=1">
<link rel="stylesheet" href="css/bootstrap.min.css">
<link rel="stylesheet" href="css/bootstrap-theme.css">
<script src="/js/jquery-1.10.2.min.js"></script>
<script src="/js/bootstrap.min.js"></script>
<link rel="stylesheet" href="css/bootstrap.min.css">
<link rel="stylesheet" href="css/bootstrap-theme.css">
<script src="/js/bootstrap.min.js" integrity="sha384-Tc5IQib027qvyjSMfHjOMaLkfuWVxZxUPnCJA7l2mCWNIpG9mGCD8wGNIcPD7Txa" crossorigin="anonymous"></script>
<div class="container-fluid">
<link rel="stylesheet" href="/css/bootstrap.min.css" integrity="sha384-BVYiiSIFeK1dGmJRAkycuHAHRg32OmUcww7on3RYdg4Va+PmSTsz/K68vbdEjh4u" crossorigin="anonymous">
<link rel="stylesheet" href="/css/bootstrap-theme.min.css" integrity="sha384-rHyoN1iRsVXV4nD0JutlnGaslCJuC7uwjduW9SVrLvRYooPp2bWYgmgJQIXwl/Sp" crossorigin="anonymous">

</head>
<body>
<nav class="navbar navbar-inverse">
<div class="container-fluid">
<!-- logo -->
<div class="navbar-header">
<button type="button" class="navbar-toggle" data-toggle="collapse" data-target="#mainNavBar">
<span class="icon-bar"></span>
<span class="icon-bar"></span>
<span class="icon-bar"></span>
</button>
<a href="https://wego.here.com/philippines/bacolod/street-square/poblacion-bacolod--loc-dmVyc2lvbj0xO3RpdGxlPVBvYmxhY2lvbitCYWNvbG9kO2xhdD04LjE5Mzc0O2xvbj0xMjQuMDIxMTM7Y291bnRyeT1QSEw7Y2F0ZWdvcnlJZD1wb3N0YWwtYXJlYTtzb3VyY2VTeXN0ZW09aW50ZXJuYWw?map=8.19374,124.02113,15,normal" class="navbar-brand">Marjie</a>			
</div>
<!-- Menu Item -->
<div class="collpase navbar-collapse" id="mainNavBar">
<ul class="nav navbar-nav">
<li class="active"><a href="index.php">Home</a></li>
<li><a href="#"></a></li>
<li><a href="index.php"></a></li>
<!-- drop down menu -->
<!-- <li class="dropdown">
<a href="#" class="dropdown-toggle" data-toggle="dropdown">Follow Me <span class="caret"></span></a>
<ul class="dropdown-menu">
<li><a href="https://twitter.com/marjie1765">twitter</a></li>
<li><a href="https://www.facebook.com/marjiebalatero">facebook</a></li>
<li><a href="https://www.instagram.com/junjiebalatero/">Instagram</a></li>   		 
<li><a href="https://www.linkedin.com/in/margarito-jr-balatero-2ab508145/">linkedin</a></li>  
</ul>         
</li> -->
</ul>
<!--fight align -->
<ul class="nav navbar-nav navbar-right">									
<li><a href="update.php">Update details</a></li>	
<li><a href="changepassword.php">Change password</a></li>	
<li><a href="logout.php">Logout</a></li>				
</ul>
</ul>
</div>		
</div>	
</nav>
</body>
</html>
<p>Hello <a href="#"><?php echo escape($user->data()->username); ?></a></p>
<style type="text/css">
body {
background-image: url("bg.png"); 
}
a {
color: #000000;
margin-right: 10px:  
}
#header {
margin-left: auto;
margin-right: auto;
color: #000000;
font-family:tahoma;
font-size:0.85em;
width: 650px;   
}
#searchEngine {
margin-left: auto;
margin-right: auto;  
width: 650px;   
}
#menu {
font-size: 10px;
border-bottom: 1px solid #000000;
margin-left: auto;
margin-right: auto;
width: 650px;
padding:10px;
color: #000000;
}
#content {
margin-left: auto;
margin-right: auto;
width: 650px;
padding:10px;
color: #000000;
}
</style>  
<body>

<div id="menu">
	<h5>
	<a href="index.php">Home |</a>
	<a href="index.php?p=waterRates">List of Contact No. |</a>   
	<a href="index.php?p=priceLists">Cherrystore Price List |</a>  
	<a href="index.php?p=chat">Chat Me |</a>
	<a href="index.php?p=about">About Me |</a> 
	<a href="index.php?p=contactus">Contact Me |</a>  
	</h5>
</div>

<div id="content">
<?php
$pages_dir = 'pages'; 
if (!empty($_GET['p'])) {   
$pages = scandir($pages_dir, 0);
unset($pages[0], $pages[1]);    
$p = $_GET['p'];    
if (in_array($p.'.inc.php', $pages)) {
include($pages_dir.'/'.$p.'.inc.php');      
} else {
echo 'Sorry, page not found.';
}   
} else {
include($pages_dir.'/home.inc.php');
}
?>
</div>
</body>
</html>

<?php
if($user->hasPermission('admin')){
echo '<p>You are an Administrator!</p>';
}
} else {
echo '
<!DOCTYPE html>
<html lang="en">
<head>
<title>Marjie Website</title>
<meta charset="utf-8">
<meta name="viewport" content="width=device-width, initial-scale=1">
<link rel="stylesheet" href="/css/bootstrap.min.css">
<script src="/js/jquery-1.10.2.min.js"></script>
<script src="/js/bootstrap.min.js"></script>
</head>
<style type="text/css">
body {
background-image: url("bg.png"); 

}
</style>
<body>
<nav class="navbar navbar-inverse">
<div class="container-fluid">
<!-- logo -->
<div class="navbar-header">
<button type="button" class="navbar-toggle" data-toggle="collapse" data-target="#mainNavBar">
<span class="icon-bar"></span>
<span class="icon-bar"></span>
<span class="icon-bar"></span>
</button>
<a href="https://wego.here.com/philippines/bacolod/street-square/poblacion-bacolod--loc-dmVyc2lvbj0xO3RpdGxlPVBvYmxhY2lvbitCYWNvbG9kO2xhdD04LjE5Mzc0O2xvbj0xMjQuMDIxMTM7Y291bnRyeT1QSEw7Y2F0ZWdvcnlJZD1wb3N0YWwtYXJlYTtzb3VyY2VTeXN0ZW09aW50ZXJuYWw?map=8.19374,124.02113,15,normal" class="navbar-brand">Marjie</a>     
</div>
<!-- Menu Item -->
<div class="collpase navbar-collapse" id="mainNavBar">
<ul class="nav navbar-nav">
<li class="active"><a href="#">Home</a></li>
<li><a href="http://junjie.ddns.net:4200/">About</a></li>
<li><a href="#">Contact</a></li>
<!-- drop down menu -->
<li class="dropdown">
<a href="#" class="dropdown-toggle" data-toggle="dropdown">Follow Me <span class="caret"></span></a>
<ul class="dropdown-menu">
<li><a href="https://twitter.com/marjie1765">twitter</a></li>
<li><a href="https://www.facebook.com/marjiebalatero">facebook</a></li>
<li><a href="https://www.instagram.com/junjie15511765/">Instagram</a></li>   		 
<li><a href="https://www.linkedin.com/in/margarito-jr-balatero-2ab508145/">linkedin</a></li>  
</ul>         
</li>
</ul>
<!--right align -->
<ul class="nav navbar-nav navbar-right">
<li><a href="register.php">Register</a></li>  
<li><a href="login.php">Login</a></li>          
</ul>
</ul>
</div>    
</div>  
</nav>
</html>
', '<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<title>balatero.com</title>
<link href="balatero.css" rel="stylesheet" type="text/css" />
<script src="/Scripts/swfobject_modified.js" type="text/javascript"></script>
</head>
<body>
<center>
<div id="wrapper">
<object classid="clsid:D27CDB6E-AE6D-11cf-96B8-444553540000" width="200" height="100" id="FlashID" title="logo">
<param name="movie" value="balaterowrite.swf" />
<param name="quality" value="high" />
<param name="wmode" value="opaque" />
<param name="swfversion" value="6.0.65.0" />
<!-- This param tag prompts users with Flash Player 6.0 r65 and higher to download the latest version of Flash Player. Delete it if you don’t want users to see the prompt. -->
<param name="expressinstall" value="/Scripts/expressInstall.swf" />
<!-- Next object tag is for non-IE browsers. So hide it from IE using IECC. -->
<!--[if !IE]>-->
<object type="application/x-shockwave-flash" data="balaterowrite.swf" width="400" height="150">
<!--<![endif]-->
<param name="quality" value="high" />
<param name="wmode" value="opaque" />
<param name="swfversion" value="6.0.65.0" />
<param name="expressinstall" value="/Scripts/expressInstall.swf" />
<!-- The browser displays the following alternative content for users with Flash Player 6.0 and older. -->
<div>
<h4>Content on this page requires a newer version of Adobe Flash Player.</h4>
<p><a href="http://www.adobe.com/go/getflashplayer"><img src="http://www.adobe.com/images/shared/download_buttons/get_flash_player.gif" alt="Get Adobe Flash player" width="112" height="33" /></a></p>
</div>
<!--[if !IE]>-->
</object>
<!--<![endif]-->
</object>
</div>
</center>
<script type="text/javascript">
swfobject.registerObject("FlashID");
</script>
</body>','<br>

<style type="text/css">
img {
display:block;
float:left;
margin:10px;
}
</style>
<center>
<svg version="1.0" xmlns="http://www.w3.org/2000/svg"
 width="462.000000pt" height="535.000000pt" viewBox="0 0 462.000000 535.000000"
 preserveAspectRatio="xMidYMid meet">
<metadata>
Created by potrace 1.15, written by Peter Selinger 2001-2017
</metadata>
<g transform="translate(0.000000,535.000000) scale(0.100000,-0.100000)"
fill="#000000" stroke="none">
<path d="M2050 5145 c-113 -21 -244 -62 -329 -102 -94 -45 -134 -47 -436 -18
-115 11 -239 20 -275 20 l-65 0 -1 -65 c0 -36 -3 -74 -7 -85 -6 -17 -14 -125
-42 -525 -7 -100 -49 -290 -98 -445 -19 -60 -42 -146 -52 -190 -9 -44 -30
-127 -47 -184 -29 -100 -32 -143 -13 -206 4 -16 -2 -24 -32 -40 -58 -31 -88
-98 -88 -200 1 -169 8 -282 21 -330 8 -27 21 -81 30 -120 8 -38 37 -136 64
-217 27 -81 52 -164 55 -185 12 -73 15 -80 40 -91 14 -7 44 -12 65 -12 45 0
42 7 60 -140 26 -214 64 -374 149 -613 17 -49 31 -97 31 -108 0 -29 -33 -45
-253 -124 -112 -40 -224 -83 -248 -95 -75 -39 -181 -115 -254 -183 -66 -62
-75 -67 -185 -101 -63 -20 -121 -36 -127 -36 -10 0 -13 -82 -13 -375 l0 -375
2311 0 2310 0 -3 392 -3 392 -33 10 c-26 7 -36 5 -52 -9 -16 -14 -22 -15 -35
-5 -11 9 -22 9 -46 1 -27 -9 -30 -9 -19 4 6 8 20 17 31 20 38 12 18 23 -38 21
-48 -2 -57 -5 -55 -19 1 -9 -8 -23 -22 -32 -14 -9 -26 -28 -28 -43 -2 -21 -9
-28 -31 -30 -22 -3 -27 -8 -27 -32 0 -111 -83 -262 -115 -210 -3 5 -1 48 6 95
8 65 8 89 -1 100 -9 11 -6 17 14 30 18 12 26 26 26 46 0 29 8 36 64 53 14 5
16 9 6 20 -9 12 -7 17 10 26 17 9 19 14 10 25 -6 8 -9 23 -5 35 4 14 2 20 -8
20 -27 0 -75 -21 -81 -36 -3 -8 -15 -14 -26 -14 -15 0 -26 -11 -36 -36 -11
-27 -18 -34 -27 -25 -15 15 -27 14 -27 -4 0 -8 -6 -15 -13 -15 -13 0 -37 60
-37 94 0 9 -4 16 -10 16 -5 0 -10 -25 -10 -55 0 -36 4 -55 12 -55 9 0 9 -3 0
-12 -7 -7 -12 -44 -12 -98 0 -70 5 -94 25 -135 13 -27 25 -60 25 -72 0 -12 7
-28 15 -36 8 -8 12 -17 9 -20 -3 -3 0 -15 6 -27 6 -12 9 -33 6 -46 -5 -18 -12
-23 -36 -21 -17 1 -30 5 -30 8 0 4 -8 9 -19 12 -12 3 -21 18 -25 42 -4 21 -16
49 -27 64 -14 19 -21 52 -27 131 -10 120 -33 183 -70 188 -19 3 -22 9 -22 51
0 26 -4 51 -9 56 -5 6 -14 28 -21 50 -7 22 -25 64 -41 92 -16 29 -29 63 -29
76 0 13 -11 39 -25 58 -14 19 -33 45 -42 58 -25 34 -48 54 -121 109 l-63 47 5
55 c3 30 2 87 -2 125 l-7 70 -31 -85 c-18 -47 -44 -123 -59 -170 -15 -47 -31
-91 -37 -97 -14 -17 -47 -16 -54 1 -3 7 -22 21 -43 31 -32 14 -43 15 -62 5
-19 -11 -24 -10 -35 5 -12 16 -14 16 -43 -1 -29 -17 -30 -17 -69 10 -54 37
-60 56 -52 157 5 64 12 96 29 123 21 33 22 42 12 79 -6 23 -10 63 -8 88 2 43
-2 50 -51 103 -49 54 -57 73 -53 122 2 28 -193 235 -236 250 -19 7 -35 8 -41
2 -15 -15 36 -184 85 -288 25 -52 73 -136 105 -187 58 -89 60 -93 47 -122 -18
-40 -37 -46 -68 -23 -32 22 -108 45 -122 36 -6 -3 -17 -22 -25 -40 l-14 -34
-188 6 c-103 3 -211 10 -240 15 -50 8 -126 50 -136 75 -2 7 17 24 44 38 51 28
82 28 125 0 11 -7 36 -15 55 -16 l35 -3 0 44 c1 36 6 48 30 67 17 13 46 29 67
34 47 13 133 71 133 90 0 18 -64 38 -124 39 -24 1 -73 6 -109 12 -59 11 -69
16 -133 76 -51 48 -72 76 -80 106 -15 55 -2 147 29 216 19 42 27 81 32 156 7
96 45 254 100 407 12 36 20 83 20 125 0 60 -3 73 -28 103 -16 19 -31 43 -35
52 -3 10 -18 20 -32 23 -14 3 -37 8 -52 11 -16 3 -54 35 -95 79 -56 60 -77 75
-115 84 -53 14 -255 116 -308 157 -97 74 -53 120 111 115 50 -1 110 3 133 9
l42 11 -6 44 c-6 39 -5 45 20 61 23 15 26 22 20 48 -4 17 -11 67 -15 111 -10
105 -22 148 -54 190 -14 18 -26 37 -26 42 0 5 -10 13 -22 18 -13 6 -31 26 -41
45 -19 35 -19 35 8 93 21 46 31 57 50 57 13 0 32 11 43 25 11 14 24 25 29 25
5 0 19 22 32 49 12 27 32 55 44 63 44 28 126 41 216 34 47 -3 136 -1 196 5
167 16 422 18 480 4 28 -7 69 -13 91 -14 78 -2 174 -60 318 -193 100 -93 128
-141 170 -293 44 -165 66 -305 54 -355 -5 -25 -9 -58 -8 -75 0 -16 1 -41 0
-55 -8 -129 2 -265 27 -380 26 -118 27 -139 27 -375 0 -186 -5 -279 -18 -365
-39 -261 6 -289 98 -60 29 73 37 109 42 183 8 122 19 157 49 157 13 0 28 7 33
16 5 8 19 21 31 27 14 8 30 33 42 66 17 50 17 56 3 72 -12 14 -13 21 -3 37 9
15 10 31 1 73 -7 30 -17 233 -23 459 l-10 405 -31 90 c-16 50 -54 143 -84 207
-30 64 -54 120 -54 125 0 20 -149 200 -190 230 -25 18 -50 38 -57 43 -6 5 -14
40 -17 77 -4 37 -10 84 -14 103 l-7 35 -85 8 c-68 7 -97 15 -145 41 -108 60
-119 65 -241 116 -168 69 -291 108 -398 125 -113 18 -354 18 -456 0z m-213
-2235 c-7 -56 6 -70 62 -70 66 0 77 -21 34 -63 -66 -62 -170 -75 -263 -31 -46
22 -53 27 -39 37 8 7 18 20 22 30 3 9 16 17 27 17 38 0 77 28 110 80 41 64 54
64 47 0z m159 -203 c-3 -13 -22 -50 -41 -83 -20 -32 -45 -90 -56 -129 -30
-103 -39 -123 -80 -195 -96 -168 -177 -246 -275 -266 l-54 -11 -22 36 c-65
104 -80 152 -81 251 0 52 3 110 8 129 6 26 4 37 -8 45 -8 7 -25 29 -36 50 -35
61 -10 128 41 111 13 -4 88 -11 168 -15 80 -5 160 -11 178 -15 23 -5 38 -3 50
7 56 49 157 108 184 108 27 0 29 -3 24 -23z m599 -1232 c105 -19 113 -22 194
-97 95 -86 99 -96 102 -231 3 -130 -3 -146 -73 -197 -23 -17 -53 -49 -66 -71
-24 -41 -24 -41 -5 -67 11 -14 31 -34 45 -45 24 -18 27 -18 56 -3 17 9 42 16
56 16 14 0 37 5 51 12 29 13 30 12 38 -22 6 -22 0 -28 -49 -55 -31 -17 -60
-40 -65 -52 -10 -27 -27 -29 -55 -8 -10 8 -31 15 -46 15 -16 0 -28 2 -28 4 0
18 15 36 31 36 28 0 22 11 -26 50 -24 19 -49 49 -55 66 -6 17 -21 36 -34 42
-21 9 -29 7 -58 -22 -27 -27 -38 -32 -52 -24 -10 5 -56 12 -103 14 -75 4 -89
8 -121 34 -37 29 -48 34 -197 85 -44 16 -90 32 -103 36 -24 9 -45 50 -36 72 2
7 30 26 62 42 52 26 68 28 197 33 136 4 143 6 235 44 52 22 103 49 113 61 18
20 18 22 1 34 -10 7 -34 18 -54 23 -19 5 -53 19 -75 31 -43 23 -188 59 -240
59 -17 0 -46 11 -64 24 -33 25 -33 25 -10 30 13 3 60 8 104 11 44 3 107 12
140 19 82 18 90 18 190 1z m842 -345 c7 -8 10 -23 7 -33 -7 -23 35 -128 58
-145 16 -11 18 -30 17 -140 l0 -127 -30 -23 c-36 -29 -96 -34 -114 -9 -7 10
-15 71 -19 149 -4 73 -11 153 -15 178 -4 30 -2 59 7 87 12 37 12 45 -2 65 -14
20 -14 23 0 39 15 17 18 17 47 -4 18 -12 37 -29 44 -37z m-167 -272 c28 -47
25 -84 -16 -195 -33 -88 -44 -105 -101 -162 -47 -45 -67 -60 -73 -51 -8 12
-24 11 -62 -5 -10 -4 -18 -3 -18 1 0 7 76 116 118 169 5 6 21 32 37 59 15 26
34 50 41 53 18 7 18 33 1 33 -14 0 -42 -36 -66 -82 -8 -15 -25 -32 -40 -38
-14 -6 -43 -26 -64 -45 -61 -56 -74 -42 -19 23 77 92 189 195 206 189 10 -4
16 6 21 39 3 24 8 44 11 44 2 0 13 -15 24 -32z"/>
<path d="M2830 3274 c-19 -2 -77 -7 -129 -10 -89 -6 -96 -8 -125 -38 -48 -48
-76 -58 -103 -34 -28 26 -39 18 -46 -31 -3 -22 -15 -54 -27 -71 -20 -29 -21
-36 -11 -71 7 -24 41 -72 85 -122 40 -45 86 -101 102 -123 137 -195 146 -202
307 -250 78 -23 95 -8 43 38 -56 49 -63 66 -31 78 39 15 27 39 -28 60 -104 40
-101 60 9 60 93 0 110 6 167 57 35 31 40 33 55 20 10 -9 31 -19 47 -23 17 -3
52 -16 78 -27 l48 -20 27 26 26 27 -44 37 c-73 64 -122 92 -194 114 -79 24
-109 43 -126 78 -10 23 -7 29 45 77 43 39 56 57 53 75 -6 45 -128 84 -228 73z"/>
</g>
</svg>
</center>
';
}
?>
</div>


