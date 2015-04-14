<?php
App::uses('AppController', 'Controller');
/**
 * CategoriaPlatillos Controller
 *
 * @property CategoriaPlatillo $CategoriaPlatillo
 * @property PaginatorComponent $Paginator
 */
class CategoriaPlatillosController extends AppController {

/**
 * Components
 *
 * @var array
 */
	public $components = array('Session', 'RequestHandler');


	public $paginate = array(
        'CategoriaPlatillo' => array(
        	'limit' => 5,
        	'order' => array('CategoriaPlatillo.id' => 'asc')
    	),
        'Platillo' => array(
        	'limit' => 3,
        	'recursive' => 0,
        	'order' => array('Platillo.id' => 'asc')
        )
    );

    // public $paginate = array(
    //     'limit' => 5,
    //     'order' => array(
    //         'CategoriaPlatillo.id' => 'asc'
    //     )
    // );


	public function isAuthorized($user)
	{
		if($user['role'] == 'user')
		{
			if(in_array($this->action, array('add', 'index', 'view', 'edit')))
			{
				return true;
			}
			else
			{
				if($this->Auth->user('id'))
				{
					$this->Session->setFlash('No puede acceder', 'default', array('class' => 'alert alert-danger'));
					$this->redirect($this->Auth->redirect());
				}
			}
		}
		
		return parent::isAuthorized($user);
	}


/**
 * index method
 *
 * @return void
 */
	public function index() {
		$this->CategoriaPlatillo->recursive = 0;

		$this->paginate['CategoriaPlatillo']['limit'] = 5;
		$this->paginate['CategoriaPlatillo']['order'] = array('CategoriaPlatillo.id' => 'asc');
		$this->set('categoriaPlatillos', $this->paginate('CategoriaPlatillo'));
	}

/**
 * view method
 *
 * @throws NotFoundException
 * @param string $id
 * @return void
 */
	public function view($id = null) {
		if (!$this->CategoriaPlatillo->exists($id)) {
			throw new NotFoundException(__('Invalid categoria platillo'));
		}
		$options = array('conditions' => array('CategoriaPlatillo.' . $this->CategoriaPlatillo->primaryKey => $id));

		$platilloList = $this->CategoriaPlatillo->find('first', $options);

		$platilloId = $platilloList['CategoriaPlatillo']['id'];

		$this->paginate['Platillo']['conditions'] = array('Platillo.categoria_platillo_id' => $platilloId);
		$this->paginate['Platillo']['fields'] = array('Platillo.id', 'Platillo.nombre', 'Platillo.precio', 'Platillo.foto', 'Platillo.foto_dir', 'Platillo.categoria_platillo_id');

		// Categoría Platillo
		$platilloCat = $platilloList['CategoriaPlatillo']['categoria'];

		$this->set('categoriaPlatillo', $this->paginate('Platillo'));
		$this->set('nombreCategoria', $platilloCat);
	}

/**
 * add method
 *
 * @return void
 */
	public function add() {
		if ($this->request->is('post')) {
			$this->CategoriaPlatillo->create();
			if ($this->CategoriaPlatillo->save($this->request->data)) {
				$this->Session->setFlash('The categoria platillo has been saved.', 'default', array('class' => 'alert alert-success'));
				return $this->redirect(array('action' => 'index'));
			} else {
				$this->Session->setFlash('The categoria platillo could not be saved. Please, try again.', 'default', array('class' => 'alert alert-danger'));
			}
		}
	}

/**
 * edit method
 *
 * @throws NotFoundException
 * @param string $id
 * @return void
 */
	public function edit($id = null) {
		if (!$this->CategoriaPlatillo->exists($id)) {
			throw new NotFoundException(__('Invalid categoria platillo'));
		}
		if ($this->request->is(array('post', 'put'))) {
			if ($this->CategoriaPlatillo->save($this->request->data)) {
				$this->Session->setFlash('The categoria platillo has been saved.', 'default', array('class' => 'alert alert-success'));
				return $this->redirect(array('action' => 'index'));
			} else {
				$this->Session->setFlash('The categoria platillo could not be saved. Please, try again.', 'default', array('class' => 'alert alert-danger'));
			}
		} else {
			$options = array('conditions' => array('CategoriaPlatillo.' . $this->CategoriaPlatillo->primaryKey => $id));
			$this->request->data = $this->CategoriaPlatillo->find('first', $options);
		}
	}

/**
 * delete method
 *
 * @throws NotFoundException
 * @param string $id
 * @return void
 */
	public function delete($id = null) {
		$this->CategoriaPlatillo->id = $id;
		if (!$this->CategoriaPlatillo->exists()) {
			throw new NotFoundException(__('Invalid categoria platillo'));
		}
		$this->request->allowMethod('post', 'delete');
		if ($this->CategoriaPlatillo->delete()) {
			$this->Session->setFlash('The categoria platillo has been deleted.', 'default', array('class' => 'alert alert-success'));
		} else {
			$this->Session->setFlash('The categoria platillo could not be deleted. Please, try again.', 'default', array('class' => 'alert alert-danger'));
		}
		return $this->redirect(array('action' => 'index'));
	}
}
