<?php
namespace App\Controller;

use App\Controller\AppController;

/**
 * Groups Controller
 *
 * @property \App\Model\Table\GroupsTable $Groups
 *
 * @method \App\Model\Entity\Group[]|\Cake\Datasource\ResultSetInterface paginate($object = null, array $settings = [])
 */
class GroupsController extends AppController
{
    /**
     * Index method
     *
     * @return \Cake\Http\Response|null
     */
    public function index()
    {
        $this->paginate = [
            'contain' => ['Categories', 'Subcategories']
        ];
        $groups = $this->paginate($this->Groups);

        $this->set(compact('groups'));
    }

    /**
     * View method
     *
     * @param string|null $id Group id.
     * @return \Cake\Http\Response|null
     * @throws \Cake\Datasource\Exception\RecordNotFoundException When record not found.
     */
    public function view($id = null)
    {
        $group = $this->Groups->get($id, [
            'contain' => ['Categories', 'Subcategories']
        ]);

        $this->set('group', $group);
    }

    /**
     * Add method
     *
     * @return \Cake\Http\Response|null Redirects on successful add, renders view otherwise.
     */
    public function add()
    {
        $group = $this->Groups->newEntity();
        if ($this->request->is('post')) {
            $group = $this->Groups->patchEntity($group, $this->request->getData());
            if ($this->Groups->save($group)) {
                $this->Flash->success(__('The group has been saved.'));

                return $this->redirect(['action' => 'index']);
            }
            $this->Flash->error(__('The group could not be saved. Please, try again.'));
        }
       // Bâtir la liste des catégories
       $this->loadModel('Categories');
       $categories = $this->Categories->find('list', ['limit' => 200]);

       // Extraire le id de la première catégorie
       $categories = $categories->toArray();
       reset($categories);
       $category_id = key($categories);

       // Bâtir la liste des sous-catégories reliées à cette catégorie
       $subcategories = $this->Groups->Subcategories->find('list', [
           'conditions' => ['Subcategories.category_id' => $category_id],
       ]);
        $this->set(compact('group', 'categories', 'subcategories'));
    }

    /**
     * Edit method
     *
     * @param string|null $id Group id.
     * @return \Cake\Http\Response|null Redirects on successful edit, renders view otherwise.
     * @throws \Cake\Datasource\Exception\RecordNotFoundException When record not found.
     */
    public function edit($id = null)
    {
        $group = $this->Groups->get($id, [
            'contain' => []
        ]);
        if ($this->request->is(['patch', 'post', 'put'])) {
            $group = $this->Groups->patchEntity($group, $this->request->getData());
            if ($this->Groups->save($group)) {
                $this->Flash->success(__('The group has been saved.'));

                return $this->redirect(['action' => 'index']);
            }
            $this->Flash->error(__('The group could not be saved. Please, try again.'));
        }
        $categories = $this->Groups->Categories->find('list', ['limit' => 200]);
        $subcategories = $this->Groups->Subcategories->find('list', ['limit' => 200]);
        $this->set(compact('group', 'categories', 'subcategories'));
    }

    /**
     * Delete method
     *
     * @param string|null $id Group id.
     * @return \Cake\Http\Response|null Redirects to index.
     * @throws \Cake\Datasource\Exception\RecordNotFoundException When record not found.
     */
    public function delete($id = null)
    {
        $this->request->allowMethod(['post', 'delete']);
        $group = $this->Groups->get($id);
        if ($this->Groups->delete($group)) {
            $this->Flash->success(__('The group has been deleted.'));
        } else {
            $this->Flash->error(__('The group could not be deleted. Please, try again.'));
        }

        return $this->redirect(['action' => 'index']);
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
