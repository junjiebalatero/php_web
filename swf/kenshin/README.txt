##################################################################
# Tema do Site Anime Point!
# http://animepoint.123fui.com.br
# 
# Webmaster: Paulo H. (phalkmin@ig.com.br)
# Webdesigner: Morpheus (guta@brfree.com.br)
# 
##################################################################



To use this theme, you NEED place the files "links.js" and "topnav.js" in the main directory (root) of PHP-Nuke. Otherwise, it won't work correctly.....  
  
  
To alter the menu, make the changes in links.js:  
  
aMenu1 = new Array (--> Order of the menu.  
"",  
35 ", 110 ",--> position of the Menu, in pixels, starting from the left margin. The first number specifies it is the horizontal position, and the second, the position vetical.  
"","",  
"","",  
"","",  
"Dicas","sections.php?op=listarticles&secid=2",0,
"Dragon Ball","sections.php?op=listarticles&secid=3",0,
"Entrevistas","sections.php?op=listarticles&secid=5",0,
"Eventos","sections.php?op=listarticles&secid=6",0,
"Karekano","sections.php?op=listarticles&secid=4",0,
"Ranma", "sections.php?op=listarticles&secid=1",0 --> Those are the links. The last cannot contain commas.  
  
In case you decide to use sub-menus, use a line as that:  
  
"Area 1_Menu 3", " http://www.<seu site>.com/area1_menu3.htm",1,  
  
It is later, add the links of the sub-menu:  
  
aMenu1_3 = new Array (  
" Sub Menu 1 ", " http://www.<seu site> .com/area1_menu3_submenu_1.htm",0,  
" Sub Menu 2 ", " http://www.<seu site> .com/area1_menu3_submenu_2.htm",0,  
" Sub Menu 3 ", " http://www.<seu site> .com/area1_menu3_submenu_3.htm",0,  
" Sub Menu 4 ", " http://www.<seu site> .com/area1_menu3_submenu_4.htm",0  
  
  
Observations:  
- the distance in pixels of the sub-menu in relation to the menu is defined below in the file menu.htm  
- never alter the name of the variable aMenu  
   
Variables of the file theme.php:   
In him code-source of theme.php is the color variables, it embroiders, sub-menu distance, source...:  
   
borWid = 2  
It indicates the menu will have a border of 2 pixels   
   
borSty = double "  
It indicates  the menu will have a border type double   
   
borCol = #00008B "  
It indicates  the color of the border   
   
separator = 1  
It indicates that there will be a line of 1 pixel of thickness separating the options of the menu  
   
separatorCol = #00008B "  
It indicates the color of the line that separates the options of the menu  
   
fntFam = sans-serif "  
It indicates the source used in the menu   
   
fntBold = false  
The source of letter of the menu is indicated it will be in boldface or not   
   
fntItal = false  
The source of letter of the menu is indicated it will be italizada or not    
   
fntSiz = 8  
It indicates the size of the source of the menu   
   
fntCol = #0000FF "  
It indicates the color of the source of the menu   
   
overFnt = #000080 "  
It indicates the color that the source will have when the mouse passes on her   
   
itemPad = 3  
It indicates the spacing of the cell in relation to the menu (3 pixels)  
   
backCol = #D3D3D3 "  
It indicates the color of fund of the menu  
   
overCol = #ADD8E6 "  
It indicates that color the menu will have when the mouse passes on him   
  
childOffset = 6  
It indicates the pixels no. between the menu and the superior part of the sub-menu (he/she sees the first image above)   
   
childOverlap = 60  
It indicates the pixels no. between the menu and the left border of the sub-menu (he/she sees the first image above)   
  
  
Some other variables and you may alter him and test in your browser. Good Luck!