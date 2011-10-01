<?php

if ( ! defined('INDEX_AUTH') || INDEX_AUTH != 1)
{
	die(__('can not access this file directly'));
}

?>
<!--
        Fatin Core Template
        
        Copyright 2011 Indra Sutriadi Pipii <indra@sutriadi.web.id>
        
        This program is free software; you can redistribute it and/or modify
        it under the terms of the GNU General Public License as published by
        the Free Software Foundation; either version 2 of the License, or
        (at your option) any later version.
        
        This program is distributed in the hope that it will be useful,
        but WITHOUT ANY WARRANTY; without even the implied warranty of
        MERCHANTABILITY or FITNESS FOR A PARTICULAR PURPOSE.  See the
        GNU General Public License for more details.
        
        You should have received a copy of the GNU General Public License
        along with this program; if not, write to the Free Software
        Foundation, Inc., 51 Franklin Street, Fifth Floor, Boston,
        MA 02110-1301, USA.
-->
<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Strict//EN"
  "http://www.w3.org/TR/xhtml1/DTD/xhtml1-strict.dtd">
<html xmlns="http://www.w3.org/1999/xhtml" xml:lang="<?php echo $lang;?>" lang="<?php echo $lang;?>">
<head>
	<title><?php echo $page_title;?></title>
	<meta http-equiv="content-type" content="text/html;charset=utf-8" />
	<meta name="generator" content="Geany 0.18" />
	<?php echo $page_styles;?>
	<?php echo $page_scripts;?>
	<?php echo $page_metadata;?>
</head>
<body>

	<div id="container" class="<?php echo $layout_class; ?>">
		
		<div id="header">
			<?php if (isset($regions['header'])):?><?php echo $blocks['header'];?><?php endif;?>
			<?php if (isset($web_logo)):?><div id="logo">
				<a href="index.php" title="<?php echo __('Home'); ?>"><img src="<?php echo $web_logo;?>" /></a>
			</div><?php endif;?>
			<div id="web-name-wrapper">
				<?php if (isset($web_title)):?><span id="web-title"><a href="index.php" title="<?php echo __('Home'); ?>"><?php echo $web_title;?></a></span><?php endif;?>
				<?php if (isset($web_subtitle)):?><span id="web-subtitle"><?php echo $web_subtitle;?></span><?php endif;?>
			</div>
			<?php echo isset($web_search) ? sprintf('<div id="search">%s</div>', $web_search) : '';?>
			<?php echo isset($web_main_links) ? sprintf('<div id="main-links">%s</div>', $web_main_links) : '';?>
		</div>
		
		<div id="main">
		
			<?php if (isset($regions['left'])):?><div id="leftbar">
				<?php echo $blocks['left'];?>
			</div><?php endif;?>

				<div id="nodebar">
					
					<?php if (isset($regions['top-node'])):?><div id="top-node">
						<?php echo $blocks['top-node'];?>
					</div><?php endif;?>
					
					<div id="main-node">
						<?php echo (isset($node_info)) ? $node_info : '';?>
						<?php echo $node;?>
					</div>
					
					<?php if (isset($regions['bottom-node'])):?><div id="bottom-node">
						<?php echo $blocks['bottom-node'];?>
					</div><?php endif;?>
					
				</div>
			
			<?php if (isset($regions['right'])):?><div id="rightbar">
				<?php echo $blocks['right'];?>
			</div><?php endif;?>
		
		</div>
		
		<div id="footer">
			
			<?php if (isset($regions['footer'])):?><?php echo $blocks['footer'];?><?php endif;?>
			<div id="web-footer-wrapper">
				<span id="web-footer"><?php echo $web_footer;?></span>
				<span><strong>Fatin base theme</strong> by <a href="http://sutriadi.web.id/" target="_blank">Indra Sutriadi Pipii</a></span>
			</div>
		</div>
		
	</div>

	<?php if ($detail === TRUE):?><div id="fileviewer">
			<iframe id="framehtml" src=""></iframe>
	</div><?php endif;?>

</body>
</html>
