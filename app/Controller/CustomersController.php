<?php 

//Git実験中→→コミット済み→ブランチ学習中→ブランチができた→コンフリクト
class CustomersController extends AppController{
    public $helpers = array('Html','Form');
    public $paginate = array(
        'limit'=>10,

        );

    public function beforeFilter() {

        $line_type = array(
            '1' => 'Type-A',
            '2' => 'Type-D'
            );
        $this->set('line_type', $line_type);

        $contract_type = array(
            '1' => 'データのみ3GB',
            '2' => 'データのみ6GB',
            '3' => 'データのみ10GB',
            '4' => 'SMS付き3GB',
            '5' => 'SMS付き6GB',
            '6' => 'SMS付き10GB',
            '7' => '音声通話プラン3GB',
            '8' => '音声通話プラン6GB',
            '9' => '音声通話プラン10GB'
            );
        $this->set('contract_type', $contract_type);

        $status = array(
            '1' => '契約中',
            '2' => '解約済み'
            );
        $this->set('status', $status);

        $this->loadmodel('Agency');
        $test = $this->Agency->find('all', array(
            'conditions'=>array(
                'deleted' => 0)
            ));

        foreach($test as $tests => $value)
            {$agency[$value['Agency']['id']] = $value['Agency']['agency_name'];}
        $this->set('agency', $agency);

    }

    public function index() {

        if ($this->request->is('post')) {
            $name=$this->request->data['Customer']['name'];
            $contract_type=$this->request->data['Customer']['contract_type'];
            $agency=$this->request->data['Customer']['agency'];
            $status=$this->request->data['Customer']['status'];
            $this->paginate = array(
                'conditions'=>array(
                    'name like'=>'%'.$name.'%',
                    'contract_type' => $contract_type,
                    'agency_id' => $agency,
                    'status' => $status,
                    'deleted' => 0)
                );
            $this->set('customers', $this->paginate());
        } else {
        $this->paginate = array(
            'conditions'=>array(
                'deleted' => 0
            )
        );
        $this->set('customers', $this->paginate());
        }

        $this->render('index');
    }

    public function add(){
        if ($this->request->is('post')){
            $this->Customer->create();
            if($this->Customer->save($this->request->data)) {
                $this->Flash->success(__('Customer has been saved.'));
                return $this->redirect(array('action' => 'index'));
            }
            $this->Flash->error(__('Unable to add customer.'));
        }
    }

    public function edit($id = null){
            if (!$id) {
                throw new NotFoundException(__('Invalid post'));
            }

            $post = $this->Customer->findById($id);
            if (!$post) {
                throw new NotFoundException(__('Invalid post'));
            }

        if ($this->request->is(array('post','put'))) {
            $this->Customer->id = $id;
            if ($this->Customer->save($this->request->data)) {
                $this->Flash->success(__('Customer has been updated.'));
                return $this->redirect(array('action' => 'index'));
            }
            $this->Flash->error(__('Unable to update customer.'));
        }

        if(!$this->request->data) {
            $this->request->data = $post;
        }
    }


}