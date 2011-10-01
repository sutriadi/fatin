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

function poyowa_set_search($keywords = '')
{
	$q = 'keywords';
	if (isset($_GET['keywords']))
		$q = trim($_GET['keywords']);
	$websearch = '<form action="' . SENAYAN_WEB_ROOT_DIR . '" accept-charset="UTF-8" method="get" id="search-feature-theme-form"> '
		. '<input maxlength="128" id="search-feature-keywords" name="keywords" value="' . $q . '" size="30" type="text" /> '
		. '<input name="search" id="search-feature-submit" value="' . __('Search!') . '" type="submit" /> '
		. '</form>';
	return $websearch;
}

function poyowa_format_block($block)
{
	
}
