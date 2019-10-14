<?php
namespace App\Controller;

use App\Controller\AppController;

/**
 * Tickets Controller
 *
 * @property \App\Model\Table\TicketsTable $Tickets
 *
 * @method \App\Model\Entity\Ticket[]|\Cake\Datasource\ResultSetInterface paginate($object = null, array $settings = [])
 */
class TicketsController extends AppController
{
    /**
     * Index method
     *
     * @return \Cake\Http\Response|null
     */
    public function index()
    {
        $tickets = $this->paginate($this->Tickets);

        $this->set(compact('tickets'));
    }

    /**
     * View method
     *
     * @param string|null $id Ticket id.
     * @return \Cake\Http\Response|null
     * @throws \Cake\Datasource\Exception\RecordNotFoundException When record not found.
     */
    public function view($id = null)
    {
        $ticket = $this->Tickets->get($id, [
            'contain' => ['Violations']
        ]);

        $this->set('ticket', $ticket);
    }

    /**
     * Add method
     *
     * @return \Cake\Http\Response|null Redirects on successful add, renders view otherwise.
     */
    public function add()
    {
        $ticket = $this->Tickets->newEntity();
        if ($this->request->is('post')) {
            $ticket = $this->Tickets->patchEntity($ticket, $this->request->getData());
            if ($this->Tickets->save($ticket)) {
                $this->Flash->success(__('The ticket has been saved.'));

                return $this->redirect(['action' => 'index']);
            }
            $this->Flash->error(__('The ticket could not be saved. Please, try again.'));
        }
        $violations = $this->Tickets->Violations->find('list', ['limit' => 200]);
        $this->set(compact('ticket', 'violations'));
    }

    /**
     * Edit method
     *
     * @param string|null $id Ticket id.
     * @return \Cake\Http\Response|null Redirects on successful edit, renders view otherwise.
     * @throws \Cake\Datasource\Exception\RecordNotFoundException When record not found.
     */
    public function edit($id = null)
    {
        $ticket = $this->Tickets->get($id, [
            'contain' => ['Violations']
        ]);
        if ($this->request->is(['patch', 'post', 'put'])) {
            $ticket = $this->Tickets->patchEntity($ticket, $this->request->getData());
            if ($this->Tickets->save($ticket)) {
                $this->Flash->success(__('The ticket has been saved.'));

                return $this->redirect(['action' => 'index']);
            }
            $this->Flash->error(__('The ticket could not be saved. Please, try again.'));
        }
        $violations = $this->Tickets->Violations->find('list', ['limit' => 200]);
        $this->set(compact('ticket', 'violations'));
    }

    /**
     * Delete method
     *
     * @param string|null $id Ticket id.
     * @return \Cake\Http\Response|null Redirects to index.
     * @throws \Cake\Datasource\Exception\RecordNotFoundException When record not found.
     */
    public function delete($id = null)
    {
        $this->request->allowMethod(['post', 'delete']);
        $ticket = $this->Tickets->get($id);
        if ($this->Tickets->delete($ticket)) {
            $this->Flash->success(__('The ticket has been deleted.'));
        } else {
            $this->Flash->error(__('The ticket could not be deleted. Please, try again.'));
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
