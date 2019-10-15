<?php
namespace App\Controller;

use App\Controller\AppController;

/**
 * Violations Controller
 *
 * @property \App\Model\Table\ViolationsTable $Violations
 *
 * @method \App\Model\Entity\Violation[]|\Cake\Datasource\ResultSetInterface paginate($object = null, array $settings = [])
 */
class ViolationsController extends AppController
{
    /**
     * Index method
     *
     * @return \Cake\Http\Response|null
     */
    public function index()
    {
        $this->paginate = [
            'contain' => ['Users']
        ];
        $violations = $this->paginate($this->Violations);

        $this->set(compact('violations'));
    }

    /**
     * View method
     *
     * @param string|null $id Violation id.
     * @return \Cake\Http\Response|null
     * @throws \Cake\Datasource\Exception\RecordNotFoundException When record not found.
     */
    public function view($id = null){
        //$violation = $this->Violations
        //    ->contain('Users')
        //    ->contain('Tickets')
        //    ->contain('Files')
         //   ->firstOrFail();
        $violation = $this->Violations->get($id, [
            'contain' => ['Users', 'Tickets', 'Files']
        ]);

        $this->set('violation', $violation);
    }

    /**
     * Add method
     *
     * @return \Cake\Http\Response|null Redirects on successful add, renders view otherwise.
     */
    public function add()
    {
        $violation = $this->Violations->newEntity();
        if ($this->request->is('post')) {
            $violation = $this->Violations->patchEntity($violation, $this->request->getData());
            if ($this->Violations->save($violation)) {
                $this->Flash->success(__('The violation has been saved.'));

                return $this->redirect(['action' => 'index']);
            }
            $this->Flash->error(__('The violation could not be saved. Please, try again.'));
        }
        $users = $this->Violations->Users->find('list', ['limit' => 200]);
        $tickets = $this->Violations->Tickets->find('list', ['limit' => 200]);
        $this->set(compact('violation', 'users', 'tickets'));
    }

    /**
     * Edit method
     *
     * @param string|null $id Violation id.
     * @return \Cake\Http\Response|null Redirects on successful edit, renders view otherwise.
     * @throws \Cake\Datasource\Exception\RecordNotFoundException When record not found.
     */
    public function edit($id = null)
    {
        $violation = $this->Violations->get($id, [
            'contain' => ['Tickets']
        ]);
        if ($this->request->is(['patch', 'post', 'put'])) {
            $violation = $this->Violations->patchEntity($violation, $this->request->getData());
            if ($this->Violations->save($violation)) {
                $this->Flash->success(__('The violation has been saved.'));

                return $this->redirect(['action' => 'index']);
            }
            $this->Flash->error(__('The violation could not be saved. Please, try again.'));
        }
        $users = $this->Violations->Users->find('list', ['limit' => 200]);
        $tickets = $this->Violations->Tickets->find('list', ['limit' => 200]);
        $this->set(compact('violation', 'users', 'tickets'));
    }

    /**
     * Delete method
     *
     * @param string|null $id Violation id.
     * @return \Cake\Http\Response|null Redirects to index.
     * @throws \Cake\Datasource\Exception\RecordNotFoundException When record not found.
     */
    public function delete($id = null)
    {
        $this->request->allowMethod(['post', 'delete']);
        $violation = $this->Violations->get($id);
        if ($this->Violations->delete($violation)) {
            $this->Flash->success(__('The violation has been deleted.'));
        } else {
            $this->Flash->error(__('The violation could not be deleted. Please, try again.'));
        }

        return $this->redirect(['action' => 'index']);
    }

    public function initialize()
    {
        parent::initialize();
        $this->Auth->allow(['logout']);
    }

    public function isAuthorized($user)
    {
        $action = $this->request->getParam('action');
        $param = $this->request->getParam('pass.0');

        #admin
        if($user['role_id'] === 1){
            if (in_array($action, ['index', 'view','add','edit','delete'])){
                return true;
            }
        }

        #chief
        elseif ($user['role_id'] === 3){
            if (in_array($action, ['index', 'view','add','edit','delete'])){
                return true;
            }
        }
        #officer
        elseif ($user['role_id'] === 2){
            if (in_array($action, ['index', 'view'])){
                return true;
            }
        }
        else {
            return false;
        }
    }


}
