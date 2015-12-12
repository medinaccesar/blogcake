<?php
// app/Controller/UsersController.php
App::uses('AppController', 'Controller');
class UsersController extends AppController {
	public function beforeFilter() {
		parent::beforeFilter();
		//$this->Auth->allow('add');
	}
	public function index() {
		$this->User->recursive = 0;
		$this->set('users', $this->paginate());
	}
	public function view($id = null) {
		$this->User->id = $id;
		if (!$this->User->exists()) {
			throw new NotFoundException(__('Usuario inválido'));
		}
		$this->set('user', $this->User->findById($id));
	}
	public function add() {
		if ($this->request->is('post')) {
			$this->User->create();
			if ($this->User->save($this->request->data)) {
				$this->Flash->success(__('Se ha guardado el usuario'));
				return $this->redirect(array('action' => 'index'));
			}
			$this->Flash->error(__('Inténtalo otra vez, posiblemente no ha sido guardado.'));
		}
	}

	public function edit($id = null) {
		$this->User->id = $id;
		if (!$this->User->exists()) {
			throw new NotFoundException(__('usuario inválido'));
		}
		if ($this->request->is('post') || $this->request->is('put')) {
			if ($this->User->save($this->request->data)) {
				$this->Flash->success(__('Se ha guardado el usuario'));
				return $this->redirect(array('action' => 'index'));
			}
			$this->Flash->error(__('Inténtalo otra vez, posiblemente no ha sido guardado.'));
		} else {
			$this->request->data = $this->User->findById($id);
			unset($this->request->data['User']['password']);
		}
	}
	public function delete($id = null) {
		// Prior to 2.5 use
		// $this->request->onlyAllow('post');
		$this->request->allowMethod('post');
		$this->User->id = $id;
		if (!$this->User->exists()) {
			throw new NotFoundException(__('usuario inválido'));
		}
		if ($this->User->delete()) {
			$this->Flash->success(__('Se ha borrado el usuario'));
			return $this->redirect(array('action' => 'index'));
		}
		$this->Flash->error(__('No pudo ser borrado el usuario'));
		return $this->redirect(array('action' => 'index'));
	}
}



?>
