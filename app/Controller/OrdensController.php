<?php

class OrdensController extends AppController{
    
    public $components = array('Session', 'RequestHandler');
    public $helpers = array('Html', 'Form', 'Time');
    
    public function add()
    {
        $this->loadModel('Pedido', 'RequestHandler');
        
        $orden_item = $this->Pedido->find('all', array('order' => 'Pedido.id ASC'));
        
        debug($orden_item);
    }
    
}

?>