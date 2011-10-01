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

var visitorCounterForm = $('#visitorCounterForm');

// AJAX counter error handler
visitorCounterForm.ajaxError( function() {
	alert('Error inserting counter data to database!');
	$(this).enableForm().find('input[type=text]').val('');
	$('#memberID').focus();
});

// AJAX counter complete handler
visitorCounterForm.ajaxComplete( function() {
	$(this).enableForm().find('input[type=text]').val('');
	var memberImage = $('#memberImage');
	if (memberImage) {
		// update visitor photo
		var imageSRC = memberImage.attr('src'); memberImage.remove();
		$('#visitorCounterPhoto')[0].src = imageSRC;
	}
	$('#memberID').focus();
});

// register event
visitorCounterForm.submit(function(evt) {
	evt.preventDefault();
	// check member ID or name
	if ($.trim($('#memberID').val()) == '') {
		$('#counterInfo').html('Please fill your member ID or name');
		return false;
	}
	var theForm = $(this);
	var formAction = theForm.attr('action');
	var formData = theForm.serialize();
	formData += '&counter=true';
	// block the form
	theForm.disableForm();
	$('#counterInfo').css({'display': 'block'}).html('PLEASE WAIT...');
	// create AJAX request for submitting form
	$.ajax(
		{ url: formAction,
			type: 'POST',
			async: false,
			data: formData,
			cache: false,
			success: function(respond) {
				$('#counterInfo').html(respond);
			}
		});
});

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

    // give focus to first field
    $('#memberID').focus();

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
