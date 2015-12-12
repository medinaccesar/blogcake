<?php
class PostsController extends AppController {
	

	public $helpers = array('Html', 'Form', 'Flash');
	public $components = array('Flash');

	//autorización
	public function isAuthorized($user) {
		// todos los usuarios registrados pueden añadir artículos
		if ($this->action === 'add') {
			return true;
		}
		// El propietario de un artículo puede editarlo y borrarlo
		if (in_array($this->action, array('edit', 'delete'))) {
			$postId = (int) $this->request->params['pass'][0];
			if ($this->Post->isOwnedBy($postId, $user['id'])) {
				return true;
			}
		}
		return parent::isAuthorized($user);
	}



	function index() {
		$this->set('posts', $this->Post->find('all'));
	}

	public function view($id = null) {
		$this->set('post', $this->Post->findById($id));
	}

	public function add() {
		if ($this->request->is('post')) {
			//autorización
			$this->request->data['Post']['user_id'] = $this->Auth->user('id');

			if ($this->Post->save($this->request->data)) {
				$this->Flash->success('Guardado correctamente');
				$this->redirect(array('action' => 'index'));
			}
		}
	}
	public function edit($id = null) {
		if (!$id) {
			throw new NotFoundException(__('Artículo inválido'));
		}
		$post = $this->Post->findById($id);

		if (!$post) {
			throw new NotFoundException(__('Artículo inválido'));
		}

		if ($this->request->is(array('post', 'put'))) {
			$this->Post->id = $id;
			if ($this->Post->save($this->request->data)) {
				$this->Flash->success(__('El artículo ha sido actualizado'));
				return $this->redirect(array('action' => 'index'));
			}
			$this->Flash->error(__('No ha sido posible actualizar el artículo.'));
		}

		if (!$this->request->data) {
			$this->request->data = $post;
			
		}
	}
	function delete($id) {
		if (!$this->request->is('post')) {
			throw new MethodNotAllowedException();
		}
		if ($this->Post->delete($id)) {
			$this->Flash->success('Se ha borrado el artículo con id: ' . $id . '.');
			$this->redirect(array('action' => 'index'));
		}
	}




}
?>