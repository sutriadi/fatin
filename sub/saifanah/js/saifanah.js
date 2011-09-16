//      saifanah.js
//      
//      Copyright 2011 Indra Sutriadi Pipii <indra@sutriadi.web.id>
//      
//      This program is free software; you can redistribute it and/or modify
//      it under the terms of the GNU General Public License as published by
//      the Free Software Foundation; either version 2 of the License, or
//      (at your option) any later version.
//      
//      This program is distributed in the hope that it will be useful,
//      but WITHOUT ANY WARRANTY; without even the implied warranty of
//      MERCHANTABILITY or FITNESS FOR A PARTICULAR PURPOSE.  See the
//      GNU General Public License for more details.
//      
//      You should have received a copy of the GNU General Public License
//      along with this program; if not, write to the Free Software
//      Foundation, Inc., 51 Franklin Street, Fifth Floor, Boston,
//      MA 02110-1301, USA.

Drupal.behaviors.saifanah_RoundedCorners = function (context) {
	$("div.corner, div.corner-top, div.corner .header, div.corner-top .header").corner("top 5px");
	$("div.corner, div.corner-bottom, div.corner .content, div.corner-bottom .content").corner("bottom 5px");
	$("div#search").corner("bottom 10px");
	$("div.corner-header .header").corner("5px");
	$("div#container").corner("bottom 10px keep");
}

Drupal.behaviors.saifanah_SearchKeywords = function (context) {
	var keywords = $("input#keywords");
	keywords.focus(function()
	{
		if(keywords.val()=='Keywords')
			keywords.val('');
		else
			keywords.select();
	});
	$("input#keywords").blur(function()
	{
		if(keywords.val()=='Keywords' || $.trim(keywords.val())=='')
			keywords.val('Keywords');
	});
}
