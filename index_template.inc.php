<?php
/*
 *      index_template.inc.php
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

if ( ! defined('INDEX_AUTH') || INDEX_AUTH != 1)
{
	die(__('can not access this file directly'));
}

$segment = explode("/", $sysconf['template']['css']);
unset($segment[count($segment)-1]);
$path = implode("/", $segment);
$css = $path . "/css";
$js = $path . "/js";
$img = $path . "/img";
$core = $path . "/core";
$sub = $path . "/sub";
$search = FALSE;
$page = FALSE;
$detail = FALSE;

$osys = (object) $sysconf;

if ( ! defined('MODPLUGINS_BASE_DIR'))
	define('MODPLUGINS_BASE_DIR', MODULES_BASE_DIR . 'plugins/');

require($path . '/php/function.php');
require(MODPLUGINS_BASE_DIR . 'func.php');

$page_title = set_pagetitle($page_title);
$lang = substr($osys->default_lang, 0, 2);
$head = '';
$styles = '';
$scripts = '';

$node = $main_content;

$left_node = '';
$right_node = '';
$header_node = '';
$top_node = '';
$bottom_node = '';
$footer_node = '';

$theme = variable_get('opac_theme');
$theme_settings = (object) variable_get('theme_' . $theme . '_settings', defconf_theme(), 'serial');
$theme_path = $sub . '/' . $theme;

$web_logo = $img . '/fatin-logo.png';
$web_title = $osys->library_name;
$web_subtitle = $osys->library_subname;
$web_footer = $osys->page_footer;

if (file_exists($theme_path . '/fatin.php'))
{
	require($theme_path . '/fatin.php');
}

if (isset($theme_settings->main_links) AND $theme_settings->main_links == 'on')
{
	require(MODPLUGINS_BASE_DIR . 's_menus/func.php');
	$main_links = variable_get('main_links', 'primary-links');
	$main_links_items = variable_get('main_links_items', 'top');
	
/*
	$main_links_array = set_parent_array($main_links, false, false, 0, 0, ($main_links_items == 'top' ? false : true), true, '');
*/
	$expand = $main_links_items == 'top' ? false : true;
	$main_links_items = menu_items_get($main_links);
	$web_main_links = menu_build_links($main_links_items, 0, $expand, 'main-links');
}

if (isset($theme_settings->search) AND $theme_settings->search == 'on')
{
	if (function_exists($theme . '_set_search'))
	{
		$web_search = call_user_func($theme . '_set_search');
	}
	else
		$web_search = set_search();
}

$engine_info = @drupal_parse_info_file($path . '/engine.info');
$styles = set_styles_array(isset($engine_info['stylesheets']) ? $engine_info['stylesheets'] : array(), $css);
$scripts = set_scripts_array(isset($engine_info['scripts']) ? $engine_info['scripts'] : array(), $js);

$theme_info = @drupal_parse_info_file($theme_path . '/tpl.info');
$clone = isset($theme_info['clone']) ? true : false;

if ($clone === true)
{
	$clone_path = $sub . '/' . $theme_info['clone'];
	$clone_info = @drupal_parse_info_file($clone_path . '/tpl.info');
	
	$styles = array_merge($styles, set_styles_array(isset($clone_info['stylesheets']) ? $clone_info['stylesheets'] : array(), $clone_path));
	$scripts = array_merge($scripts, set_scripts_array(isset($clone_info['scripts']) ? $clone_info['scripts'] : array(), $clone_path));
}

$styles = array_merge($styles, set_styles_array(isset($theme_info['stylesheets']) ? $theme_info['stylesheets'] : array(), $theme_path));
$scripts = array_merge($scripts, set_scripts_array(isset($theme_info['scripts']) ? $theme_info['scripts'] : array(), $theme_path));

$page_styles = set_pagestyles($styles);
$page_scripts = set_pagescripts($scripts);

$webicon = set_webicon(isset($theme_info['webicon']) ? $theme_info['webicon'] : $img . '/fatin.ico');
$page_metadata = set_pagemeta($metadata);

$info = $theme_info;
require(MODPLUGINS_BASE_DIR . 's_blocks/func.php');
$regions = block_all_list();
unset($regions['none']);

$enabled_region = array_keys($regions);
if (in_array('left', $enabled_region) AND in_array('right', $enabled_region))
	$layout_class = 'both';
else if (in_array('left', $enabled_region))
	$layout_class = 'left';
else if (in_array('right', $enabled_region))
	$layout_class = 'right';
else
	$layout_class = 'none';

$blocks = set_pageregions($regions);

if ( ! file_exists($theme_path . '/page.php'))
{
	if ($clone === true AND file_exists($clone_path . '/page.php'))
		@include($clone_path . '/page.php');
	else
		@include($core . '/base/page.php');
}
else
	@include($theme_path . '/page.php');
