<?php

class UserGroup extends AppModel {

	public $validate = array(
		'name' => array(
			'required' => array(
				'rule' => array('notEmpty'),
				'message' => 'A name is required'
			)
		)
	);

	public $hasMany = array(
		'UserRole' => array(
			'className' => 'UserRole',
			'foreignKey' => 'user_group_id'
		)
	);

}