<?php
/*
 *      func.php
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

function set_pagetitle($page_title)
{
	if (isset($_GET['search']) AND ! empty($_GET['search']))
	{
		if (isset($_GET['keywords']) AND ! empty($_GET['keywords']))
			$page_title = $_GET['keywords'] . ' - ' . __('Senayan Search Result');
		else if (isset($_GET['title']) AND !empty($_GET['title']))
			$page_title = __('Title') . ': ' . $_GET['title'] . ' - ' . __('Senayan Search Result');
	}
	return $page_title;
}

function set_prescripts($scripts)
{
	global $js;
	
	$output = '';
	if (count($scripts) > 0)
	{
		foreach ($scripts as $js_file)
		{
			$output .= '<script type="text/javascript" src="'. $js . '/' . $js_file .'"></script>'."\n";
		}
	}
	return $output;
}

function set_pagescripts($scripts)
{
	global $theme_path, $prescripts;
	
	$output = ( ! empty($prescripts)) ? $prescripts : '';
	if (count($scripts) > 0)
	{
		foreach ($scripts as $js_file)
		{
			$output .= '<script type="text/javascript" src="'. $theme_path . '/' . $js_file .'"></script>'."\n";
		}
	}
	return $output;
}

function set_prestyles($styles)
{
	global $css;
	
	$output = '';
	if (count($styles) > 0)
	{
		foreach ($styles as $media => $style)
		{
			if (is_array($style) AND count($style) > 0)
			{
				foreach ($style as $css_file)
				{
					$output .= '<link type="text/css" rel="stylesheet" media="'. $media .'" href="'. $css . '/' . $css_file .'" />'."\n";
				}
			}
		}
	}
	return $output;
}

function set_pagestyles($styles)
{
	global $theme_path, $prestyles;
	
	$output = ( ! empty($prestyles)) ? $prestyles : '';
	if (count($styles) > 0)
	{
		foreach ($styles as $media => $css)
		{
			if (is_array($css) AND count($css) > 0)
			{
				foreach ($css as $css_file)
				{
					$output .= '<link type="text/css" rel="stylesheet" media="'. $media .'" href="'. $theme_path . '/' . $css_file .'" />'."\n";
				}
			}
		}
	}
	return $output;
}

function set_search()
{
	$q = '';
	if (isset($_GET['keywords']))
		$q = trim($_GET['keywords']);
	$websearch = '<div id="search">'
		. '<form action="index.php" accept-charset="UTF-8" method="get" id="search-theme-form">'
		. '<input maxlength="128" name="keywords" value="' . $q . '" size="30" class="form-search-text" type="text" />'
		. '<input name="search" value="' . __('Search') . '" class="form-search-input" type="submit" />'
		. '</form>'
		. '</div>';
	return $websearch;
}

function format_block($block)
{
	
}

function set_block($blocks)
{
	foreach ($blocks as $b => $block)
	{
		
	}
}

function set_weblogo()
{
	
}

function set_webicon($icon)
{
	global $theme_path, $img;
	
	$webicon = '';
	if ( ! empty($icon))
	{
		if (file_exists($theme_path . '/' . $icon))
			$webicon .= '<link rel="shortcut icon" href="' . $theme_path . '/' . $icon . '" type="image/x-icon" />' . "\n";
		else
			$webicon .= '<link rel="shortcut icon" href="' . $icon . '" type="image/x-icon" />' . "\n";
	}
	return $webicon;
}

function set_pagemeta($meta)
{
	global $webicon;
	$metadata = $webicon . $meta;
	return $metadata;
}
