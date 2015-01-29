<?php
App::uses('AppModel', 'Model');
/**
 * CategoriaPlatillo Model
 *
 * @property Platillo $Platillo
 */
class CategoriaPlatillo extends AppModel {

/**
 * Display field
 *
 * @var string
 */
	public $displayField = 'categoria';

/**
 * Validation rules
 *
 * @var array
 */
	public $validate = array(
		'categoria' => array(
			'notEmpty' => array(
				'rule' => array('notEmpty'),
				//'message' => 'Your custom message here',
				//'allowEmpty' => false,
				//'required' => false,
				//'last' => false, // Stop validation after this rule
				//'on' => 'create', // Limit validation to 'create' or 'update' operations
			),
		),
	);

	//The Associations below have been created with all possible keys, those that are not needed can be removed

/**
 * hasMany associations
 *
 * @var array
 */
	public $hasMany = array(
		'Platillo' => array(
			'className' => 'Platillo',
			'foreignKey' => 'categoria_platillo_id',
			'dependent' => false,
			'conditions' => '',
			'fields' => '',
			'order' => '',
			'limit' => '',
			'offset' => '',
			'exclusive' => '',
			'finderQuery' => '',
			'counterQuery' => ''
		)
	);

}
