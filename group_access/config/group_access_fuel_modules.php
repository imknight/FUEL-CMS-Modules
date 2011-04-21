<?php
// included in the main config/MY_fuel_modules.php

$config['modules']['manage_group_access'] = array(
		'module_name' => 'Groups Access',
		'module_uri' => 'manage/group_access',
		'model_name' => 'groups_model',
		'model_location' => 'group_access',
		'permission' => 'manage/group_access',
		'nav_selected' => 'manage/group_access',
		'instructions' => lang('module_instructions', 'group_access'),
	);

