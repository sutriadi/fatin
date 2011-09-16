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

require($path . '/php/function.php');
require(MODULES_BASE_DIR . 'plugins/func.php');

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

$theme = 'saifanah';
$theme_path = $sub . '/' . $theme;

$web_logo = $img . '/fatin-logo.png';
$web_title = $osys->library_name;
$web_subtitle = $osys->library_subname;
$web_footer = $osys->page_footer;

if (file_exists($theme_path . '/fatin.php'))
{
	require($theme_path . '/fatin.php');
}

if (function_exists($theme . '_set_search'))
{
	$web_search = call_user_func($theme . '_set_search');
}
else
	$web_search = set_search();

$engine_info = drupal_parse_info_file($path . '/engine.info');
$prestyles = set_prestyles(isset($engine_info['stylesheets']) ? $engine_info['stylesheets'] : array());
$prescripts = set_prescripts(isset($engine_info['scripts']) ? $engine_info['scripts'] : array());

$theme_info = drupal_parse_info_file($path . sprintf('/sub/%s/tpl.info', $theme));
$page_styles = set_pagestyles(isset($theme_info['stylesheets']) ? $theme_info['stylesheets'] : array());
$page_scripts = set_pagescripts(isset($theme_info['scripts']) ? $theme_info['scripts'] : array());
$webicon = set_webicon(isset($theme_info['webicon']) ? $theme_info['webicon'] : $img . '/fatin.ico');
$page_metadata = set_pagemeta($metadata);

if ( ! file_exists($theme_path . '/page.php'))
	include($core . '/base/page.php');
else
	include($theme_path . '/page.php');
