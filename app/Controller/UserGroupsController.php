<?php

class UserGroupsController extends AppController {

	public function beforeFilter() {
		parent::beforeFilter();
	}

	public function admin_index() {
		$this->UserGroup->recursive = 0;
		$this->set('userGroups', $this->paginate());
	}

	public function admin_view($id = null) {
		$this->UserGroup->id = $id;
		if(!$this->UserGroup->exists()) {
			throw new NotFoundException(__('Invalid user group'));
		}
		$this->UserGroup->recursive = 0;
		$this->set('userGroup', $this->UserGroup->read(null, $id));
	}

	public function admin_add() {
        if ($this->request->is('post')) {
            $this->UserGroup->create();
            if ($this->UserGroup->save($this->request->data)) {
                $this->Session->setFlash(__('The user group has been saved'));
                return $this->redirect(array('action' => 'index'));
            }
            $this->Session->setFlash(__('The user group could not be saved. Please, try again.'));
        }

        $this->render('/UserGroups/admin_form');
	}

	public function admin_edit($id = null) {
        $this->UserGroup->id = $id;
        if (!$this->UserGroup->exists()) {
            throw new NotFoundException(__('Invalid user group'));
        }
        if ($this->request->is('post') || $this->request->is('put')) {
            if ($this->UserGroup->save($this->request->data)) {
                $this->Session->setFlash(__('The user group has been saved'));
                return $this->redirect(array('action' => 'index'));
            }
            $this->Session->setFlash(__('The user group could not be saved. Please, try again.'));
        } else {
            $this->request->data = $this->UserGroup->read(null, $id);
        }

        $this->render('/UserGroups/admin_form');
	}

	public function admin_delete($id = null) {
        $this->request->onlyAllow('post');

        $this->UserGroup->id = $id;
        if (!$this->UserGroup->exists()) {
            throw new NotFoundException(__('Invalid user group'));
        }
        if ($this->UserGroup->delete()) {
            $this->Session->setFlash(__('User group deleted'));
            return $this->redirect(array('action' => 'index'));
        }
        $this->Session->setFlash(__('User group was not deleted'));
        return $this->redirect(array('action' => 'index'));
	}

}