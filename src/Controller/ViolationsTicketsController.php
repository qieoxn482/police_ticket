<?php
namespace App\Controller;

use App\Controller\AppController;

/**
 * ViolationsTickets Controller
 *
 * @property \App\Model\Table\ViolationsTicketsTable $ViolationsTickets
 *
 * @method \App\Model\Entity\ViolationsTicket[]|\Cake\Datasource\ResultSetInterface paginate($object = null, array $settings = [])
 */
class ViolationsTicketsController extends AppController
{
    /**
     * Index method
     *
     * @return \Cake\Http\Response|null
     */
    public function index()
    {
        $this->paginate = [
            'contain' => ['Tickets', 'Violations']
        ];
        $violationsTickets = $this->paginate($this->ViolationsTickets);

        $this->set(compact('violationsTickets'));
    }

    /**
     * View method
     *
     * @param string|null $id Violations Ticket id.
     * @return \Cake\Http\Response|null
     * @throws \Cake\Datasource\Exception\RecordNotFoundException When record not found.
     */
    public function view($id = null)
    {
        $violationsTicket = $this->ViolationsTickets->get($id, [
            'contain' => ['Tickets', 'Violations']
        ]);

        $this->set('violationsTicket', $violationsTicket);
    }

    /**
     * Add method
     *
     * @return \Cake\Http\Response|null Redirects on successful add, renders view otherwise.
     */
    public function add()
    {
        $violationsTicket = $this->ViolationsTickets->newEntity();
        if ($this->request->is('post')) {
            $violationsTicket = $this->ViolationsTickets->patchEntity($violationsTicket, $this->request->getData());
            if ($this->ViolationsTickets->save($violationsTicket)) {
                $this->Flash->success(__('The violations ticket has been saved.'));

                return $this->redirect(['action' => 'index']);
            }
            $this->Flash->error(__('The violations ticket could not be saved. Please, try again.'));
        }
        $tickets = $this->ViolationsTickets->Tickets->find('list', ['limit' => 200]);
        $violations = $this->ViolationsTickets->Violations->find('list', ['limit' => 200]);
        $this->set(compact('violationsTicket', 'tickets', 'violations'));
    }

    /**
     * Edit method
     *
     * @param string|null $id Violations Ticket id.
     * @return \Cake\Http\Response|null Redirects on successful edit, renders view otherwise.
     * @throws \Cake\Datasource\Exception\RecordNotFoundException When record not found.
     */
    public function edit($id = null)
    {
        $violationsTicket = $this->ViolationsTickets->get($id, [
            'contain' => []
        ]);
        if ($this->request->is(['patch', 'post', 'put'])) {
            $violationsTicket = $this->ViolationsTickets->patchEntity($violationsTicket, $this->request->getData());
            if ($this->ViolationsTickets->save($violationsTicket)) {
                $this->Flash->success(__('The violations ticket has been saved.'));

                return $this->redirect(['action' => 'index']);
            }
            $this->Flash->error(__('The violations ticket could not be saved. Please, try again.'));
        }
        $tickets = $this->ViolationsTickets->Tickets->find('list', ['limit' => 200]);
        $violations = $this->ViolationsTickets->Violations->find('list', ['limit' => 200]);
        $this->set(compact('violationsTicket', 'tickets', 'violations'));
    }

    /**
     * Delete method
     *
     * @param string|null $id Violations Ticket id.
     * @return \Cake\Http\Response|null Redirects to index.
     * @throws \Cake\Datasource\Exception\RecordNotFoundException When record not found.
     */
    public function delete($id = null)
    {
        $this->request->allowMethod(['post', 'delete']);
        $violationsTicket = $this->ViolationsTickets->get($id);
        if ($this->ViolationsTickets->delete($violationsTicket)) {
            $this->Flash->success(__('The violations ticket has been deleted.'));
        } else {
            $this->Flash->error(__('The violations ticket could not be deleted. Please, try again.'));
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
            if (in_array($action, ['index', 'view', 'add', 'edit', 'delete'])){
                return true;
            }
        }
        else {
            return false;
        }
    }
}
