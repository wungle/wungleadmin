<?php

class UserRolesController extends AppController {

	public function beforeFilter() {
		parent::beforeFilter();
	}

	public function admin_index() {
		$this->UserRole->recursive = 0;
		$this->set('userRoles', $this->paginate());
	}

	public function admin_view($id = null) {
		$this->UserRole->id = $id;
		if(!$this->UserRole->exists()) {
			throw new NotFoundException(__('Invalid user role'));
		}
		$this->UserRole->recursive = 0;
		$this->set('userRole', $this->UserRole->read(null, $id));
	}

	public function admin_add() {
        if ($this->request->is('post')) {
            $this->UserRole->create();
            if ($this->UserRole->save($this->request->data)) {
                $this->Session->setFlash(__('The user role has been saved'));
                return $this->redirect(array('action' => 'index'));
            }
            $this->Session->setFlash(__('The user role could not be saved. Please, try again.'));
        }

        $this->render('/UserRoles/admin_form');
	}

	public function admin_edit($id = null) {
        $this->UserRole->id = $id;
        if (!$this->UserRole->exists()) {
            throw new NotFoundException(__('Invalid user role'));
        }
        if ($this->request->is('post') || $this->request->is('put')) {
            if ($this->UserRole->save($this->request->data)) {
                $this->Session->setFlash(__('The user role has been saved'));
                return $this->redirect(array('action' => 'index'));
            }
            $this->Session->setFlash(__('The user role could not be saved. Please, try again.'));
        } else {
            $this->request->data = $this->UserRole->read(null, $id);
        }

        $this->render('/UserRoles/admin_form');
	}

	public function admin_delete($id = null) {
        $this->request->onlyAllow('post');

        $this->UserRole->id = $id;
        if (!$this->UserRole->exists()) {
            throw new NotFoundException(__('Invalid user role'));
        }
        if ($this->UserRole->delete()) {
            $this->Session->setFlash(__('User role deleted'));
            return $this->redirect(array('action' => 'index'));
        }
        $this->Session->setFlash(__('User role was not deleted'));
        return $this->redirect(array('action' => 'index'));
	}

}