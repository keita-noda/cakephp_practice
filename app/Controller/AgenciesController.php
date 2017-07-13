<?php 

class AgenciesController extends AppController {
    public $helpers = array ('Html', 'Form');

    public function index() {

        $options = array(
            'conditions' => array(
                'deleted' => 0
            )
        );
        $agencies = $this->Agency->find('all', $options);
        $this->set('agencies', $agencies);

        $this->render('index');
    }

        public function add(){
            if ($this->request->is('post')){
                $this->Agency->create();
                if($this->Agency->save($this->request->data)) {
                    $this->Flash->success(__('Agency has been saved.'));
                    return $this->redirect(array('action' => 'index'));
                }
                $this->Flash->error(__('Unable to add agency.'));
            }
        }

        public function edit($id = null) {
            if (!$id) {
                throw new NotFoundException(__('Invalid post'));
            }

            $post = $this->Agency->findByid($id);
            if (!$post) {
                throw new NotFoundException(__('Invalid post'));
            }

            if ($this->request->is(array('post','put'))) {
                $this->Agency->id = $id;
                if ($this->Agency->save($this->request->data)) {
                    $this->Flash->success(__('Agency has been updated.'));
                    return $this->redirect(array('action' => 'index'));
                }
                $this->Flash->error(__('Unable to update agency.'));
            }

            if(!$this->request->data) {
                $this->Flash->error(__('Unable to update agency.'));
            }

            if(!$this->request->data) {
                $this->request->data = $post;
            }
        }

        public function delete(){
            $id = $this->request->pass[0];
            $this->Agency->id = $id;
            $this->Agency->savefield('deleted', 1);
            $msg = sprintf(
                '代理店 %s を削除しました。',
                $id
            );

            $this->Flash->set($msg);

            $this->redirect(array ('action'=>'index'));
            return;
        }
 }
