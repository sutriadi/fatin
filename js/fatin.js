//      fatin.js
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

$(document).ready(function() {

	var cacheAuthor = {},
			lastXhr;
	var cacheSubject = {},
			lastXhr;

	$( "#subject" ).autocomplete({
		minLength: 2,
		source: function( request, response ) {
			var term = request.term;
			if ( term in cacheSubject ) {
				response( cacheSubject[ term ] );
				return;
			}
			lastXhr = $.ajax({
				url: "lib/contents/advsearch_AJAX_response.php",
				type: "POST",
				data: "type=topic&inputSearchVal="+escape(term),
				success: function( data, status, xhr ) {
					var data = eval(data);
					cacheSubject[ term ] = data;
					if ( xhr === lastXhr ) {
						response( data );
					}
				},
			});
		},
	});

	$( "#author" ).autocomplete({
		minLength: 2,
		source: function( request, response ) {
			var term = request.term;
			if ( term in cacheAuthor ) {
				response( cacheAuthor[ term ] );
				return;
			}
			lastXhr = $.ajax({
				url: "lib/contents/advsearch_AJAX_response.php",
				type: "POST",
				data: "type=author&inputSearchVal="+escape(term),
				success: function( data, status, xhr ) {
					var data = eval(data);
					cacheAuthor[ term ] = data;
					if ( xhr === lastXhr ) {
						response( data );
					}
				},
			});
		},
	});
	
	$( "#fileviewer" ).dialog({
		autoOpen: false,
		modal: true,
		close: function(event, ui) {
			$( "#framehtml" ).attr('src', '');
		}
	});

});

function openHTMLpop(url, w, h, title) {
	$( "#framehtml" ).removeAttr('src');
	$( "#framehtml" ).attr('src', url);
	$( "#fileviewer" ).dialog( "option", "title", title );
	$( "#fileviewer" ).dialog( "option", "height", h+70 );
	$( "#fileviewer" ).dialog( "option", "width", w+40 );
	$( "#fileviewer" ).dialog( "open" );
	return false;
}
