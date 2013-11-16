<?php

class UserRole extends AppModel {

	public $validate = array(
		'name' => array(
			'required' => array(
				'rule' => array('notEmpty'),
				'message' => 'A name is required'
			)
		)
	);

	public $hasMany = array(
		'User' => array(
			'className' => 'User',
			'foreignKey' => 'user_role_id'
		)
	);

	public $belongsTo = array(
		'UserGroup' => array(
			'className' => 'UserGroup',
			'foreignKey' => 'user_group_id'
		)
	);

}