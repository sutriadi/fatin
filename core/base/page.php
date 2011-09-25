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

	<div id="container">
		
		<div id="header">
			<div class="block block-test">
				Header
			</div>
			<div id="logo">
				<a href="index.php" title="<?php echo __('Home'); ?>"><img src="<?php echo $web_logo;?>" /></a>
			</div>
			<div id="web-name-wrapper">
				<span id="web-title"><a href="index.php" title="<?php echo __('Home'); ?>"><?php echo $web_title;?></a></span>
				<span id="web-subtitle"><?php echo $web_subtitle;?></span>
			</div>
			<?php echo isset($web_search) ? sprintf('<div id="search">%s</div>', $web_search) : '';?>
			<?php echo isset($web_main_links) ? sprintf('<div id="main-links">%s</div>', $web_main_links) : '';?>
		</div>
		
		<div id="main">
		
			<div id="leftbar">
				<div class="block-test">
					Left
				</div>
				
				<div class="block icons i-lang">
					<h3 class="header"><?php echo __('Language');?></h3>
					<div class="content">
						Block Content Left
					</div>
				</div>

				<div class="block dark icons i-srch">
					<h3 class="header">Search</h3>
					<div class="content">
						Block Content Left
					</div>
				</div>

				<div class="block">
					<div class="content">
						Block Content Left
					</div>
				</div>

				<div class="block dark">
					<div class="content">
						Block Content Left
					</div>
				</div>

			</div>

				<div id="nodebar">
					
					<div id="top-node">
						<div class="block-test">
							Top Node
						</div>
					</div>
					
					<div id="main-node">
						<?php echo $node;?>
					</div>
					
					<div id="bottom-node">
						<div class="block-test">
							Bottom Node
						</div>
					</div>
					
				</div>
			
			<div id="rightbar">
				<div class="block-test">
					Right
				</div>
				<div class="block icons i-info">
					<h3 class="header">Block Header</h3>
					<div class="content">
						Block Content Right
					</div>
				</div>

				<div class="block dark">
					<h3 class="header">Block Header</h3>
					<div class="content">
						Block Content Left
					</div>
				</div>

			</div>
		
		</div>
		
		<div id="footer">
			<div class="block-test">
				Footer
			</div>
			<div id="web-footer-wrapper">
				<span id="web-footer"><?php echo $web_footer;?></span>
				<span><strong>Fatin Core Template</strong> by <a href="http://sutriadi.web.id/" target="_blank">Indra Sutriadi Pipii</a></span>
			</div>
		</div>
		
	</div>

</body>
</html>
