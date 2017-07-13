<?php 

class UsersController extends AppController{
    public $helpers = array('Html','Form');

    public function beforeFilter() {

        $role = array(
            'admin' => 'admin',
            'general' => 'general'
            );
        $this->set('role', $role);
    }

    public function index() {

        $options = array(
            'conditions' => array(
                'deleted' => 0
            )
        );
        $users = $this->User->find('all',$options);
        $this->set('users', $users);

        $this->render('index');
    }

    public function add(){
        if ($this->request->is('post')){
            $this->User->create();
            if($this->User->save($this->request->data)) {
                $this->Flash->success(__('Your user has been saved.'));
                return $this->redirect(array('action' => 'index'));
            }
            $this->Flash->error(__('Unable to add your user.'));
        }
    }

    public function edit($id = null) {
        if (!$id) {
            throw new NotFoundException(__('Invalid post'));
        }

        $post = $this->User->findById($id);
        if (!$post) {
            throw new NotFoundException(__('Invalid post'));
    }

        if ($this->request->is(array('post','put'))) {
            $this->User->id = $id;
            if ($this->User->save($this->request->data)) {
                $this->Flash->success(__('Your user has been updated.'));
                return $this->redirect(array('action' => 'index'));
            }
            $this->Flash->error(__('Unable to update your user.'));
        }

        if(!$this->request->data) {
            $this->request->data = $post;
        }
    }

    public function delete(){
        $id = $this->request->pass[0];
        $this->User->id = $id;
        $this->User->saveField('deleted', 1);
        $msg = sprintf(
            'ユーザー %s を削除しました。',
            $id
        );

        $this->Flash->set($msg);

        $this->redirect(array ('action'=>'index'));
        return;
    }

}