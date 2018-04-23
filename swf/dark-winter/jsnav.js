/////////////////////////////////////////////////////////////////////////////
// JS Nav Tools
// By:		Paul Gareau
// Email:	paul@xhawk.net
// Date:	8/16/2000
//
//  This program is free software; you can redistribute it and/or modify
//  it under the terms of the GNU General Public License as published by
//  the Free Software Foundation; either version 2 of the License, or
//  (at your option) any later version.
//
//  This program is distributed in the hope that it will be useful,
//  but WITHOUT ANY WARRANTY; without even the implied warranty of
//  MERCHANTABILITY or FITNESS FOR A PARTICULAR PURPOSE.  See the
//  GNU General Public License for more details.
//
//  You should have received a copy of the GNU General Public License
//  along with this program; if not, write to the Free Software
//  Foundation, Inc., 59 Temple Place, Suite 330, Boston, MA  02111-1307  USA
//
/////////////////////////////////////////////////////////////////////////////

/*********************************************************************/

// general site URL
var path			= ""

// tabs
var tab_font			= "tahoma, arial, helvetica"
var tab_width			= "200"
var up_arrow			= "^ "
var show_parent			= true
var show_sibs			= false
var tab_color			= "#999999"
var tab_font_color		= "#FFFFFF"
var open_tab_color		= "#1F87E0"
var open_tab_font_color		= "#FFFFFF"

// buttons
var button_font			= "tahoma, arial, helvetica"
var button_width		= ""
var button_color		= "#1F87E0"
var button_font_color		= "#3333CC"
var selected_button_color	= "#1F87E0"
var selected_button_font_color	= "#FFFFFF"

// links
var splitter			= ":"
var link_font			= "tahoma, arial, helvetica"
var splitter_color		= "#1F87E0"
var link_color			= "#888888"

// dropdown
var dropdown_font		= "lucida console, courier"
var dropdown_indent		= "&nbsp;"

/*********************************************************************/

//FORMAT: path to page, page name, parent page name

links = new Array
(
 new link(path+"index.php",			"Home",		""),
  new link(path+"user.php",		"Account",	""),
 new link(path+"topics.php",		"Topics",	""),
 new link(path+"download.php",		"Downloads",	""),
 new link(path+"submit.php",		"Submit a news",	""),
 new link(path+"links.php",		"Web Links",	"")
)

/*********************************************************************/
/*********************************************************************/
/*********************************************************************/

function link(path, name, parent)
{
 this.path = path
 this.name = name
 this.parent = parent
 this.props = new Array (path, name, parent)
}

/*********************************************************************/

//WARNING: do_dropdown does not work with netscape!

function do_dropdown(level)
{
 document.writeln ("<font face='" + dropdown_font + "' size=1>")
 document.writeln ("<form name='quick_nav'>")
 document.writeln ("<select name='list' size=1 style=\"font-family='" + dropdown_font + "'; font-size=11\"")
 document.writeln (" onChange=\"if(this.value){document.location=this.value}\">")
 document.writeln ("<option value='' selected>Quick Nav")
 document.writeln ("<option value=''>---------")

 var links_length = links.length;

 for(num=0; num<links_length; num++)
 {
  if((links[num].parent == level && level == "") || links[num].name == level)
  {
   document.writeln ("<option value='" + links[num].path + "'>" + links[num].name + " ")
   for(sub=0; sub<links_length; sub++)
   {
    if(links[sub].parent == links[num].name)
    {
     document.writeln ("<option value='" + links[sub].path + "'>" + dropdown_indent + links[sub].name + " ")
    }
   }
  }
 }
 document.writeln ("</select></form>")
}

/*********************************************************************/

function do_links(parent)
{
 var i=0

 var links_length = links.length;
 for(num=0; num<links.length; num++)
 {
  if(links[num].parent == parent)
  {
   if(i>0){
    document.writeln ("<font face='" + link_font + "' size=1 color='" + splitter_color + "'>" + splitter + "</font>") 
   }
   document.writeln ("<a href='" + links[num].path + "' title='" + links[num].name + "'>")
   document.writeln ("<font face='" + link_font + "' size=1 color='" + link_color + "'>" + links[num].name + "</font></a>")
   i++
  }
 }
}

/*********************************************************************/

function do_table()
{
 var links_length = links.length

 document.writeln ("<table border=1>")
 for (row=0; row<links_length; row++)
 {
  document.writeln ("<tr>")
  for (col=0; col<links[row].props.length; col++)
  {
   document.writeln ("<td><font size=1>")
   document.writeln (links[row].props[col])
   document.writeln ("&nbsp;</font></td>")
  }
  document.writeln ("</tr>")
 }
 document.writeln ("</table>")
}

/*********************************************************************/

function do_tabs(section, page)
{
 var children = false
 var level = ""
 var links_length = links.length

 //find the parent of the current section
 for( num=0; num<links_length; num++){
  if (links[num].name == section){ 
   level = links[num].parent
  }
 }

 //create tabs
 document.writeln ("<table border=0 cellpadding=0 cellspacing=0><tr>")

 for( num=0; num<links_length; num++)
 {
  if(links[num].name == level || links[num].parent == level)
  {
   if (links[num].name == section) { bgcolor = open_tab_color; fntcolor = open_tab_font_color; }
   else { bgcolor = tab_color; fntcolor = tab_font_color; }

   if(links[num].name == level && show_parent)
   {
    document.writeln ("<td bgcolor='" + bgcolor + "' align='center' width=" + tab_width + "><nobr>")
    document.write   ("<font face='" + tab_font + "' size=2 color='" + fntcolor + "'>" + up_arrow + "</font>")
    document.write   ("<font size=2>&nbsp;&nbsp;</font>")
    document.write   ("<a href='" + links[num].path + "' title='" + links[num].name + "'>")
    document.write   ("<font face='" + tab_font + "' size=2 color='" + fntcolor + "'>" + links[num].name + "</font></a>")
    document.write   ("<font size=2>&nbsp;&nbsp;</font>")
    document.writeln ("</nobr></td>")
    document.writeln ("<td width=2></td>")  
   }
   if(links[num].parent == level)
   {
    document.writeln ("<td bgcolor='" + bgcolor + "' align='center' width=" + tab_width + "><nobr>")
    document.write   ("<font size=2>&nbsp;&nbsp;</font>")
    document.write   ("<a href='" + links[num].path + "' title='" + links[num].name + "'>")
    document.write   ("<font face='" + tab_font + "' size=2 color='" + fntcolor + "'>" + links[num].name + "</font></a>")
    document.write   ("<font size=2>&nbsp;&nbsp;</font>")
    document.writeln ("</nobr></td>")
    document.writeln ("<td width=2></td>")
   }
  }
 }
 document.writeln ("</tr></table>")    

 //create buttons
 document.writeln ("<table border=0 cellpadding=0 cellspacing=0 width='100%'><tr><td bgcolor='" + open_tab_color + "'>")
 document.writeln ("<table border=0 cellpadding=0 cellspacing=2><tr>")

 for(num=0; num<links_length; num++)
 {
  if(links[num].parent == section && section != "")
  {
   if (page == links[num].name) { bgcolor = selected_button_color; fntcolor = selected_button_font_color; }   
   else { bgcolor = button_color; fntcolor = button_font_color; }
   document.writeln ("<td bgcolor='" + bgcolor + "' align='center' width=" + button_width + "><nobr>")
   document.write   ("<font size=2>&nbsp;&nbsp;</font>")
   document.write   ("<a href='" + links[num].path + "' title='" + links[num].name + "'>")
   document.write   ("<font face='" + button_font + "' size=2 color='" + fntcolor + "'>" + links[num].name + "</font></a>")
   document.write   ("<font size=2>&nbsp;&nbsp;</font>")
   document.writeln ("</nobr></td>")
   children = true
  }
 }
 if(! children) document.writeln ("<td></td>")
 document.writeln ("</tr></table>")
 document.writeln ("</td></tr></table>")
}

/*********************************************************************/

//dumb version
function do_tree(level)
{
 var links_length = links.length

 document.writeln ("<ul>")
 for(num=0; num<links_length; num++)
 {
  if((links[num].parent == level && level == "") || links[num].name == level)
  {
   document.writeln ("<li><a href='" + links[num].path + "'>" + links[num].name + "</a>")
   document.writeln ("<ul>")
  
   for(sub=0; sub<links_length; sub++)
   {
    if(links[sub].parent == links[num].name)
    {
     document.writeln ("<li><a href='" + links[sub].path + "'>" + links[sub].name + "</a>")
    }
   }
   document.writeln ("</ul>")
  }
 }
 document.writeln ("</ul>")
}

//recursive version - this doesnt work. not sure why...
function do_tree_r(level)
{
 var links_length = links.length

 for(num=0; num<links_length; num++)
 {
  if(links[num].parent == level)
  {
   document.write ("<li><a href='" + links[num].path + "'>" + name + "</a>")
   do_tree_r(links[num].name)
  }
 }
}


