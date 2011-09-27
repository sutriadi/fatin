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

function set_styles_array($styles, $dir)
{
	$output = array();
	if (count($styles) > 0)
	{
		foreach ($styles as $media => $style)
		{
			if (is_array($style) AND count($style) > 0)
			{
				foreach ($style as $css_file)
				{
					$output[] = array(
						'media' => $media,
						'href' => $dir . '/' . $css_file
					);
				}
			}
		}
	}
	return $output;
}

function set_scripts_array($scripts, $dir)
{
	$output = array();
	if (count($scripts) > 0)
	{
		foreach ($scripts as $js_file)
		{
			$output[] = array(
				'src' => $dir . '/' . $js_file
			);
		}
	}
	return $output;
	
}

function set_pagestyles($styles)
{
	$output = array();
	if (count($styles) > 0)
	{
		foreach ($styles as $key => $val)
		{
			$output[$key] = sprintf('<link type="text/css" rel="stylesheet" media="%s" href="%s" />',
				$val['media'],
				$val['href']
			);
		}
	}
	$output[] = '';
	$output = implode("\n", $output);
	return $output;
}

function set_pagescripts($scripts)
{
	$output = array();
	if (count($scripts) > 0)
	{
		foreach ($scripts as $key => $val)
		{
			$output[$key] = sprintf('<script type="text/javascript" src="%s"></script>',
				$val['src']
			);
		}
	}
	$output[] = '';
	$output = implode("\n", $output);
	return $output;
}

function set_stringscripts($scripts)
{
	$output = array();
	if (count($scripts) > 0)
	{
		foreach ($scripts as $val)
		{
			$output[] = sprintf('<script type="text/javascript">%s</script>',
				$val
			);
		}
	}
	$output[] = '';
	$output = implode("\n", $output);
	return $output;
}

function set_search()
{
	$q = '';
	if (isset($_GET['keywords']))
		$q = trim($_GET['keywords']);
	$websearch = '<form action="index.php" accept-charset="UTF-8" method="get" id="search-theme-form">'
		. '<input maxlength="128" name="keywords" value="' . $q . '" size="30" class="form-search-text" type="text" />'
		. '<input name="search" value="' . __('Search') . '" class="form-search-input" type="submit" />'
		. '</form>';
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

function add_class_block($params)
{
	$classes = implode(' ',
		array_merge(
			array(
				'block',
				$params['block'],
				$params['delta']
			),
			$params['classes']
		)
	);
	return $classes;	
}

function render_block($params)
{
	$classes = add_class_block($params);
	$header = (isset($params['title']) AND ! empty($params['title'])) ?
		sprintf('<h3 class="header">%s</h3>', __($params['title'])) : '';
	$content = sprintf('<div class="content">%s</div>',
		(isset($params['content']) AND ! empty($params['content'])) ? $params['content'] : ''
	);
	$block = sprintf('<div class="%s">%s%s</div>',
		$classes,
		$header,
		$content
	);
	return $block;
}

function set_pageregions($blocks)
{
	global $theme;
	
	$regions = array();
	if (function_exists($theme . '_render_block'))
		$func_render_block = $theme . '_render_block';
	else
		$func_render_block = 'render_block';
	foreach ($blocks as $region => $region_items)
	{
		if (is_array($region_items) AND count($region_items) > 0)
		{
			$regions[$region] = array();
			foreach ($region_items as $params)
			{
				$func = 'block_' . $params['block'];
				$args = array('view', $params['delta']);
				$main_block = call_user_func($func, 'view', $params['delta']);
				$merged = array_merge($main_block[$params['delta']], $params);
				$regions[$region][] = render_block($merged);
			}
			$regions[$region] = implode("\n", $regions[$region]);
		}
	}
	return $regions;
}
