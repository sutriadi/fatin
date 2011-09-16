<?php
/*
 *      fatin.php
 *      
 *      Copyright 2011 Indra Sutriadi Pipii <indra@sutriadi.web.id>
 *      
 *      This program is free software; you can redistribute it and/or modify
 *      it under the terms of the GNU General Public License as published by
 *      the Free Software Foundation; either version 2 of the License, or
 *      (at your option) any later version.
 *      
 *      This program is distributed in the hope that it will be useful,
 *      but WITHOUT ANY WARRANTY; without even the implied warranty of
 *      MERCHANTABILITY or FITNESS FOR A PARTICULAR PURPOSE.  See the
 *      GNU General Public License for more details.
 *      
 *      You should have received a copy of the GNU General Public License
 *      along with this program; if not, write to the Free Software
 *      Foundation, Inc., 51 Franklin Street, Fifth Floor, Boston,
 *      MA 02110-1301, USA.
 */

function saifanah_set_search($keywords = '')
{
	$q = '';
	if (isset($_GET['keywords']))
		$q = trim($_GET['keywords']);
	$websearch = '<div id="search">'
		. '<form action="index.php" accept-charset="UTF-8" method="get" id="search-theme-form">'
		. '<input maxlength="128" id="keywords" name="keywords" value="' . $q . '" size="30" class="form-search-text" type="text" />'
		. '<input name="search" value="' . __('Go Search!') . '" class="form-search-input" type="submit" />'
		. '</form>'
		. '</div>';
	return $websearch;
}

function saifanah_format_block($block)
{
	
}
