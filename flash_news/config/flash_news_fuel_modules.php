<?php
// included in the main config/MY_fuel_modules.php

$config['modules']['flash_news_news'] = array(
		'module_name' => 'Flash News',
		'module_uri' => 'flash_news/news',
		'model_name' => 'flash_news_model',
		'model_location' => 'flash_news',
		'permission' => 'flash_news/news',
		'nav_selected' => 'flash_news/news',
		'instructions' => lang('module_instructions_flash_news', 'flash_news'),
	);
	
$config['modules']['flash_news_category'] = array(
		'module_name' => 'Flash News Category',
		'module_uri' => 'flash_news/category',
		'model_name' => 'flash_news_categories_model',
		'model_location' => 'flash_news',
		'permission' => 'flash_news/category',
		'instructions' => lang('module_instructions_flash_news_category', 'flash_news'),
	);

