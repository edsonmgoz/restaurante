<?php

class OrdenItem extends AppModel {
    
	public $belongsTo = array(
		'Orden' => array(
			'className' => 'Orden',
			'foreignKey' => 'orden_id',
			'conditions' => '',
			'fields' => '',
			'order' => ''
		),
		'Platillo' => array(
			'className' => 'Platillo',
			'foreignKey' => 'platillo_id',
			'conditions' => '',
			'fields' => '',
			'order' => ''
		),
	);    
    
}

?>