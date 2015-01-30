<?php
class Pedido extends AppModel {
    
    public $belongsTo = array(
        'Platillo' => array(
            'className' => 'Platillo',
            'foreignKey' => 'platillo_id'
        )    
    );
}
?>