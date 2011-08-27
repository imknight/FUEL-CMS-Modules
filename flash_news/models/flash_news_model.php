<?php  if (!defined('BASEPATH')) exit('No direct script access allowed');

require_once(FUEL_PATH.'models/base_module_model.php');
require_once(MODULES_PATH.'/flash_news/config/flash_news_constants.php');

class Flash_news_model extends Base_module_model {
	
	public $required = array('news');
	public $foreign_keys = array('cat_id' => array(FLASH_NEWS_FOLDER=>'flash_news_categories_model'));	
	
	function __construct()
	{
		parent::__construct('module_flash_news'); // table name
	}
	
	function list_items($limit = NULL, $offset = NULL, $col = 'id', $order = 'asc')
	{
		$this->db->select('module_flash_news.id,news,module_flash_news_categories.name as category,sticky,module_flash_news.active,module_flash_news.date_added', FALSE);
		$this->db->join('module_flash_news_categories','module_flash_news_categories.id=module_flash_news.cat_id','left');
		$data = parent::list_items($limit, $offset, $col, $order);
		return $data;
	}
	
	function form_fields($values = array())
	{
		$fields = parent::form_fields();
		$fields['cat_id']['label'] = 'Category';
		$fields['cat_id']['class'] = 'add_edit flash_news/category';
		return $fields;
	}

	function _common_query()
	{
		$this->db->select('module_flash_news.*,module_flash_news_categories.name as category');
		$this->db->join('module_flash_news_categories','module_flash_news_categories.id=module_flash_news.cat_id','left');
	}
	
    // save one to many permission in group_to_permissions table	
	function on_after_save($values)
	{

	}

}

?>