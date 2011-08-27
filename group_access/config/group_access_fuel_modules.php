<?php
// included in the main config/MY_fuel_modules.php

$config['modules']['group_access'] = array(
		'module_name' => 'Groups Access',
		'module_uri' => 'group_access',
		'model_name' => 'groups_model',
		'model_location' => 'group_access',
		'permission' => 'group_access',
		'nav_selected' => 'group_access',
		'instructions' => lang('module_instructions', 'group_access'),
	);

