<?php 
//link the controller to the nav link

$flash_news_controllers = array('category','news');

foreach($flash_news_controllers as $c)
{
	$route[FUEL_ROUTE.'flash_news/'.$c] = FUEL_FOLDER.'/module';
	$route[FUEL_ROUTE.'flash_news/'.$c.'/(.*)'] = FUEL_FOLDER.'/module/$1';
}

$route[FUEL_ROUTE.'flash_news/dashboard'] = FLASH_NEWS_FOLDER.'/dashboard';

