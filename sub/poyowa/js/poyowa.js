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

Drupal.behaviors.poyowa_RoundedCorners = function (context) {
	$("div.corner, div.corner-top, div.corner .header, div.corner-top .header").corner("top 5px");
	$("div.corner, div.corner-bottom, div.corner .content, div.corner-bottom .content").corner("bottom 5px");
	$("div#search").corner("bottom 10px");
	$("div.corner-header .header").corner("5px");
	$("div#container").corner("bottom 10px keep");
}

Drupal.behaviors.poyowa_SearchKeywords = function (context) {
	var keywords = $("form#search-feature-theme-form input#search-feature-keywords");
	keywords.focus(function()
	{
		if(keywords.val()=='keywords')
			keywords.val('');
		else
			keywords.select();
	});
	keywords.blur(function()
	{
		if(keywords.val()=='keywords' || $.trim(keywords.val())=='')
			keywords.val('keywords');
	});
}

Drupal.behaviors.poyowa_jqueryUI = function (context) {
	$("#search-feature-theme-form input#search-feature-keywords").addClass("text ui-widget-content ui-corner-all");
	$("#search-feature-theme-form input:submit").button().addClass("text");
	$(".block.ui-form input[type=submit]").button();
	$(".block.ui-form input#keywords").addClass("text ui-widget-content ui-corner-all");
	$(".block.ui-form input[type=text], .block.ui-form input[type=password]").addClass("ui-widget-content ui-corner-all");
	$(".block.ui-form select").addClass("ui-widget-content ui-corner-all");
	$("#main-node #info-node").addClass("ui-state-highlight ui-corner-all");
	$("div.errorBox").addClass("ui-state-error ui-corner-all");
	//~ $("div.item input.biblioCheck").button();
}
