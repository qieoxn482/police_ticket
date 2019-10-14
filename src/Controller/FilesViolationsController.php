<?php
namespace App\Controller;

use App\Controller\AppController;

/**
 * FilesViolations Controller
 *
 * @property \App\Model\Table\FilesViolationsTable $FilesViolations
 *
 * @method \App\Model\Entity\FilesViolation[]|\Cake\Datasource\ResultSetInterface paginate($object = null, array $settings = [])
 */
class FilesViolationsController extends AppController
{
    /**
     * Index method
     *
     * @return \Cake\Http\Response|null
     */
    public function index()
    {
        $this->paginate = [
            'contain' => ['Violations', 'Files']
        ];
        $filesViolations = $this->paginate($this->FilesViolations);

        $this->set(compact('filesViolations'));
    }

    /**
     * View method
     *
     * @param string|null $id Files Violation id.
     * @return \Cake\Http\Response|null
     * @throws \Cake\Datasource\Exception\RecordNotFoundException When record not found.
     */
    public function view($id = null)
    {
        $filesViolation = $this->FilesViolations->get($id, [
            'contain' => ['Violations', 'Files']
        ]);

        $this->set('filesViolation', $filesViolation);
    }

    /**
     * Add method
     *
     * @return \Cake\Http\Response|null Redirects on successful add, renders view otherwise.
     */
    public function add()
    {
        $filesViolation = $this->FilesViolations->newEntity();
        if ($this->request->is('post')) {
            $filesViolation = $this->FilesViolations->patchEntity($filesViolation, $this->request->getData());
            if ($this->FilesViolations->save($filesViolation)) {
                $this->Flash->success(__('The files violation has been saved.'));

                return $this->redirect(['action' => 'index']);
            }
            $this->Flash->error(__('The files violation could not be saved. Please, try again.'));
        }
        $violations = $this->FilesViolations->Violations->find('list', ['limit' => 200]);
        $files = $this->FilesViolations->Files->find('list', ['limit' => 200]);
        $this->set(compact('filesViolation', 'violations', 'files'));
    }

    /**
     * Edit method
     *
     * @param string|null $id Files Violation id.
     * @return \Cake\Http\Response|null Redirects on successful edit, renders view otherwise.
     * @throws \Cake\Datasource\Exception\RecordNotFoundException When record not found.
     */
    public function edit($id = null)
    {
        $filesViolation = $this->FilesViolations->get($id, [
            'contain' => []
        ]);
        if ($this->request->is(['patch', 'post', 'put'])) {
            $filesViolation = $this->FilesViolations->patchEntity($filesViolation, $this->request->getData());
            if ($this->FilesViolations->save($filesViolation)) {
                $this->Flash->success(__('The files violation has been saved.'));

                return $this->redirect(['action' => 'index']);
            }
            $this->Flash->error(__('The files violation could not be saved. Please, try again.'));
        }
        $violations = $this->FilesViolations->Violations->find('list', ['limit' => 200]);
        $files = $this->FilesViolations->Files->find('list', ['limit' => 200]);
        $this->set(compact('filesViolation', 'violations', 'files'));
    }

    /**
     * Delete method
     *
     * @param string|null $id Files Violation id.
     * @return \Cake\Http\Response|null Redirects to index.
     * @throws \Cake\Datasource\Exception\RecordNotFoundException When record not found.
     */
    public function delete($id = null)
    {
        $this->request->allowMethod(['post', 'delete']);
        $filesViolation = $this->FilesViolations->get($id);
        if ($this->FilesViolations->delete($filesViolation)) {
            $this->Flash->success(__('The files violation has been deleted.'));
        } else {
            $this->Flash->error(__('The files violation could not be deleted. Please, try again.'));
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
