<?php

class OrdensController extends AppController{
    
    public $components = array('Session', 'RequestHandler');
    public $helpers = array('Html', 'Form', 'Time', 'Js');
    
    public $paginate = array(
            'limit' => 2,
            'order' => array(
                'Orden.id' => 'desc'
            )
        );

    public function index()
    {
        $this->Orden->recursive = 0;
        
        $this->paginate['Orden']['limit'] = 2;
        $this->paginate['Orden']['order'] = array('Orden.id' => 'desc');
        $this->set('ordens', $this->paginate());
    }
    
    public function add()
    {
        $this->loadModel('Pedido', 'RequestHandler');
        
        $orden_item = $this->Pedido->find('all', array('order' => 'Pedido.id ASC'));
        
        // debug($orden_item);
        
        if(count($orden_item) > 0)
        {
            $total_pedidos = $this->Pedido->find('all', array('fields' => array('SUM(Pedido.subtotal) as subtotal')));
            $mostrar_total_pedidos = $total_pedidos[0][0]['subtotal'];
            
            // Recuperando mesas del restaurante
            $mesas = $this->Orden->Mesa->find('list');
            
            $this->set(compact('orden_item', 'mostrar_total_pedidos', 'mesas'));
        }
        else
        {
            $this->Session->setFlash('Ninguna orden ha sido procesada', 'default', array('class' => 'alert alert-danger'));
            return $this->redirect(array('controller' => 'platillos', 'action' => 'index'));
        }
        
        if($this->request->is('post'))
        {
            $this->Orden->create();
            if($this->Orden->save($this->request->data))
            {
                $id_orden = $this->Orden->id;
                
                for($i = 0; $i < count($orden_item); $i++)
                {
                    $platillo_id = $orden_item[$i]['Pedido']['platillo_id'];
                    $cantidad = $orden_item[$i]['Pedido']['cantidad'];
                    $subtotal = $orden_item[$i]['Pedido']['subtotal'];
                    
                    $orden_items = array('platillo_id' => $platillo_id, 'orden_id' => $id_orden, 'cantidad' => $cantidad, 'subtotal' => $subtotal);
                    $this->Orden->OrdenItem->saveAll($orden_items);
                }
                
                //Eliminando el contenido de la tabla pedidos
                $this->Pedido->deleteAll(1, false);
                
                $this->Session->setFlash('La orden fue procesada con éxito', 'default', array('class' => 'alert alert-success'));
                return $this->redirect(array('controller' => 'platillos', 'action' => 'index'));
            }
            else
            {
                $this->Session->setFlash('La orden no pudo ser procesada.'. 'default', array('class' => 'alert alert-danger'));
            } 
        }
    }
    
}

?>