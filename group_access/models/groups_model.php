<?php  if (!defined('BASEPATH')) exit('No direct script access allowed');

require_once(FUEL_PATH.'models/base_module_model.php');
require_once(MODULES_PATH.'/group_access/config/group_access_constants.php');

class Groups_model extends Base_module_model {
	
	public $required = array('name','description');
	
	function __construct()
	{
		parent::__construct('module_groups'); // table name
	}
	
	function form_fields($values = array())
	{
		$fields = parent::form_fields();
		$this->load->module_model(FUEL_FOLDER, 'permissions_model');
		$this->load->module_model(FUEL_FOLDER, 'users_model');
		$this->load->module_model(GROUP_ACCESS_FOLDER, 'group_to_users_model');
		$this->load->module_model(GROUP_ACCESS_FOLDER, 'group_to_permissions_model');
		
		$permission_list = $this->permissions_model->options_list('id','name',array('active'=>'yes'));
		$user_list = $this->users_model->options_list('id','name',array('active'=>'yes','super_admin'=>'no'));
		
		$permissions=(!empty($values['id'])) ? array_keys($this->group_to_permissions_model->find_all_array_assoc('permission_id', array('group_id' => $values['id']))) : array();
		$user=(!empty($values['id'])) ?array_keys($this->group_to_users_model->find_all_array_assoc('user_id', array('group_id' => $values['id']))) : array();
		
		$fields['permissions'] = array('label' => 'Permission', 'type' => 'array', 'options' => $permission_list, 'value' => $permissions, 'mode' => 'multi');
		$fields['users'] = array('label' => 'Users', 'type' => 'array', 'options' => $user_list, 'value' => $user, 'mode' => 'multi');

		return $fields;
	}

    // save one to many permission in group_to_permissions table	
	function on_after_save($values)
	{
		$permissions = (!empty($this->normalized_save_data['permissions'])) ? $this->normalized_save_data['permissions'] : array();
		$users = (!empty($this->normalized_save_data['users'])) ? $this->normalized_save_data['users'] : array();
		
		$group_id=$values['id'];
		$this->save_related(array(GROUP_ACCESS_FOLDER=>'group_to_permissions_model'), array('group_id' => $values['id']), array('permission_id' => $permissions));
		$this->save_related(array(GROUP_ACCESS_FOLDER=>'group_to_users_model'), array('group_id' => $values['id']), array('user_id' => $users));
		
		if (!empty($users)){
			$this->load->module_model(FUEL_FOLDER, 'user_to_permissions_model');
			foreach($users as $user){
				$this->user_to_permissions_model->delete(array('user_id' => $user));
					foreach ($permissions as $permission){
						$perm_values['permission_id'] = $permission;
						$perm_values['user_id'] = $user;
						$this->user_to_permissions_model->save($perm_values);
					}
			}
		}
	}
	
	// cleanup permission from group_to_permissions table
    function on_after_delete($where)
    {
		$this->delete_related(array(GROUP_ACCESS_FOLDER=>'group_to_permissions_model'), 'group_id', $where);
		$this->delete_related(array(GROUP_ACCESS_FOLDER=>'group_to_users_model'), 'group_id', $where);
    }
}

class Group_model extends Data_record {
	
}
?>