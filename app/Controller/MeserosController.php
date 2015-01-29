<?php
App::uses('AppController', 'Controller');
/**
 * Meseros Controller
 *
 * @property Mesero $Mesero
 * @property PaginatorComponent $Paginator
 */
class MeserosController extends AppController {

/**
 * Components
 *
 * @var array
 */
	public $components = array('Session', 'RequestHandler');
	public $helpers = array('Html', 'Form', 'Time', 'Js');

    public $paginate = array(
        'limit' => 3,
        'order' => array(
            'Mesero.id' => 'asc'
        )
    );

/**
 * index method
 *
 * @return void
 */
	public function index() {

		$this->Mesero->recursive = 0;

		$this->paginate['Mesero']['limit'] = 3;
		//$this->paginate['Mesero']['conditions'] = array('Mesero.dni' => "34343");
		$this->paginate['Mesero']['order'] = array('Mesero.id' => 'asc');
 		//$this->Paginator->settings = $this->paginate;
		$this->set('meseros', $this->paginate());
	}

/**
 * view method
 *
 * @throws NotFoundException
 * @param string $id
 * @return void
 */
	public function view($id = null) {
		if (!$this->Mesero->exists($id)) {
			throw new NotFoundException(__('Invalid mesero'));
		}
		$options = array('conditions' => array('Mesero.' . $this->Mesero->primaryKey => $id));
		$this->set('mesero', $this->Mesero->find('first', $options));
	}

/**
 * add method
 *
 * @return void
 */
	public function add() {
		if ($this->request->is('post')) {
			$this->Mesero->create();
			if ($this->Mesero->save($this->request->data)) {
				$this->Session->setFlash('The mesero has been saved.', 'default', array('class' => 'alert alert-success'));
				return $this->redirect(array('action' => 'index'));
			} else {
				$this->Session->setFlash('The mesero could not be saved. Please, try again.', 'default', array('class' => 'alert alert-danger'));
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
		if (!$this->Mesero->exists($id)) {
			throw new NotFoundException(__('Invalid mesero'));
		}
		if ($this->request->is(array('post', 'put'))) {
			if ($this->Mesero->save($this->request->data)) {
				$this->Session->setFlash('The mesero has been saved.', 'default', array('class' => 'alert alert-success'));
				return $this->redirect(array('action' => 'index'));
			} else {
				$this->Session->setFlash('The mesero could not be saved. Please, try again.', 'default', array('class' => 'alert alert-danger'));
			}
		} else {
			$options = array('conditions' => array('Mesero.' . $this->Mesero->primaryKey => $id));
			$this->request->data = $this->Mesero->find('first', $options);
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
		$this->Mesero->id = $id;
		if (!$this->Mesero->exists()) {
			throw new NotFoundException(__('Invalid mesero'));
		}
		$this->request->allowMethod('post', 'delete');
		if ($this->Mesero->delete()) {
			$this->Session->setFlash('The mesero has been deleted.', 'default', array('class' => 'alert alert-success'));
		} else {
			$this->Session->setFlash('The mesero could not be deleted. Please, try again.', 'default', array('class' => 'alert alert-danger'));
		}
		return $this->redirect(array('action' => 'index'));
	}
}
