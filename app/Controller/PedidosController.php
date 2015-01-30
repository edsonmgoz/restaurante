<?php
class PedidosController extends AppController {
    public $components = array('Session', 'RequestHandler');
    public $helpers = array('Html', 'Form', 'Time');
    
    public function add()
    {
        if($this->request->is('ajax'))
        {
            $id = $this->request->data['id'];
            $cantidad = $this->request->data['cantidad'];
            
            $platillo = $this->Pedido->Platillo->find('all', array('fields' => array('Platillo.precio'), 'conditions' => array('Platillo.id' => $id)));
            
            $precio = $platillo[0]['Platillo']['precio'];
            
            $subtotal = $cantidad * $precio;
            
            $pedido = array( 'platillo_id' => $id, 'cantidad' => $cantidad, 'subtotal' => $subtotal );
            
            $existe_pedido = $this->Pedido->find( 'all', array('fields' => array('Pedido.platillo_id'), 'conditions' => array('Pedido.platillo_id' => $id)));
            
            if(count($existe_pedido) == 0)
            {
                $this->Pedido->save($pedido);
            }
        
        }
        
        $this->autoRender = false;
    }
    
    public function view()
    {
        $this->set('pedidos', $this->Pedido->find('all', array('orden' => 'Pedido.id ASC')));   
    }
    
}
?>