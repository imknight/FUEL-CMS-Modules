<?php  if (!defined('BASEPATH')) exit('No direct script access allowed');

require_once(FUEL_PATH.'models/base_module_model.php');
require_once(MODULES_PATH.'/flash_news/config/flash_news_constants.php');

class Flash_news_categories_model extends Base_module_model {
	
	function __construct()
	{
		parent::__construct('module_flash_news_categories'); // table name
	}
	
}

?>