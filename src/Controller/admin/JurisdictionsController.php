<?php
namespace App\Controller\Admin;

use App\Controller\Admin\AppController;

/**
 * Jurisdictions Controller
 *
 * @property \App\Model\Table\JurisdictionsTable $Jurisdictions
 *
 * @method \App\Model\Entity\Jurisdiction[]|\Cake\Datasource\ResultSetInterface paginate($object = null, array $settings = [])
 */
class JurisdictionsController extends AppController
{

    public $paginate = [
        'page' => 1,
        'limit' => 25,
        'maxLimit' => 150,
        /*        'fields' => [
          'id', 'name', 'description'
          ],
         */ 'sortWhitelist' => [
            'id', 'location'
        ]
    ];

    public function initialize() {
        parent::initialize();
        // Use the Bootstrap layout from the plugin.
        // $this->viewBuilder()->setLayout('admin');
    }
    /**
     * Index method
     *
     * @return \Cake\Http\Response|null
     */
    public function index()
    {
        $jurisdictions = $this->paginate($this->Jurisdictions);

        $this->set(compact('jurisdictions'));
    }

    /**
     * View method
     *
     * @param string|null $id Jurisdiction id.
     * @return \Cake\Http\Response|null
     * @throws \Cake\Datasource\Exception\RecordNotFoundException When record not found.
     */
    public function view($id = null)
    {
        $jurisdiction = $this->Jurisdictions->get($id, [
            'contain' => []
        ]);

        $this->set('jurisdiction', $jurisdiction);
    }

    /**
     * Add method
     *
     * @return \Cake\Http\Response|null Redirects on successful add, renders view otherwise.
     */
    public function add()
    {
        $jurisdiction = $this->Jurisdictions->newEntity();
        if ($this->request->is('post')) {
            $jurisdiction = $this->Jurisdictions->patchEntity($jurisdiction, $this->request->getData());
            if ($this->Jurisdictions->save($jurisdiction)) {
                $this->Flash->success(__('The jurisdiction has been saved.'));

                return $this->redirect(['action' => 'index']);
            }
            $this->Flash->error(__('The jurisdiction could not be saved. Please, try again.'));
        }
        $this->set(compact('jurisdiction'));
    }

    /**
     * Edit method
     *
     * @param string|null $id Jurisdiction id.
     * @return \Cake\Http\Response|null Redirects on successful edit, renders view otherwise.
     * @throws \Cake\Datasource\Exception\RecordNotFoundException When record not found.
     */
    public function edit($id = null)
    {
        $jurisdiction = $this->Jurisdictions->get($id, [
            'contain' => []
        ]);
        if ($this->request->is(['patch', 'post', 'put'])) {
            $jurisdiction = $this->Jurisdictions->patchEntity($jurisdiction, $this->request->getData());
            if ($this->Jurisdictions->save($jurisdiction)) {
                $this->Flash->success(__('The jurisdiction has been saved.'));

                return $this->redirect(['action' => 'index']);
            }
            $this->Flash->error(__('The jurisdiction could not be saved. Please, try again.'));
        }
        $this->set(compact('jurisdiction'));
    }

    /**
     * Delete method
     *
     * @param string|null $id Jurisdiction id.
     * @return \Cake\Http\Response|null Redirects to index.
     * @throws \Cake\Datasource\Exception\RecordNotFoundException When record not found.
     */
    public function delete($id = null)
    {
        $this->request->allowMethod(['post', 'delete']);
        $jurisdiction = $this->Jurisdictions->get($id);
        if ($this->Jurisdictions->delete($jurisdiction)) {
            $this->Flash->success(__('The jurisdiction has been deleted.'));
        } else {
            $this->Flash->error(__('The jurisdiction could not be deleted. Please, try again.'));
        }

        return $this->redirect(['action' => 'index']);
    }
}
