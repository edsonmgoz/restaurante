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
        $res_pedidos = $this->Pedido->find('all');
        
        if(count($res_pedidos) == 0)
        {
            $this->Session->setFlash('Aún no se realizaron pedidos', 'default', array('class' => 'alert alert-warning'));
            return $this->redirect(array('controller' => 'platillos', 'action' => 'index'));
        }
        
        
        $this->set('pedidos', $this->Pedido->find('all', array('orden' => 'Pedido.id ASC')));
        
        $total_pedidos = $this->Pedido->find('all', array('fields' => array('SUM(Pedido.subtotal) as subtotal')));
        $mostrar_total_pedidos = $total_pedidos[0][0]['subtotal'];
        
        $this->set('total_pedidos', $mostrar_total_pedidos);
    }
    
    public function itemupdate()
    {
        if($this->request->is('ajax'))
        {
            $id = $this->request->data['id'];
            
            $cantidad = isset($this->request->data['cantidad']) ? $this->request->data['cantidad'] : null;
            
            if($cantidad == 0)
            {
                $cantidad = 1;
            }
            
            $item = $this->Pedido->find('all', array('fields' => array('Pedido.id', 'Platillo.precio'), 'conditions' => array('Pedido.id' => $id)));
            
            $precio_item = $item[0]['Platillo']['precio'];
            
            $subtotal_item = $cantidad * $precio_item;
            
            $item_update = array('id' => $id, 'cantidad' => $cantidad, 'subtotal' => $subtotal_item);
            
            $this->Pedido->saveAll($item_update);
        }
        $total = $this->Pedido->find('all', array('fields' => array('SUM(Pedido.subtotal) as subtotal')));
        
        $mostrar_total = $total[0][0]['subtotal'];
        
        $pedido_update = $this->Pedido->find('all', array('fields' => array('Pedido.id', 'Pedido.subtotal'), 'conditions' => array('Pedido.id' => $id)));
        
        $mostrar_pedido = array('id' => $pedido_update[0]['Pedido']['id'], 'subtotal' => $pedido_update[0]['Pedido']['subtotal'], 'total' => $mostrar_total);
        
        echo json_encode(compact('mostrar_pedido'));
        
        $this->autoRender = false;
    }
    
}
?>