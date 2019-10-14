<?php
namespace App\Controller;

use App\Controller\AppController;

class AboutController extends AppController
{
    public function initialize()
    {
        parent::initialize();
        $this->Auth->allow(['index']);
    }

    /**
     * Index method
     *
     * @return \Cake\Http\Response|null
     */
    public function index()
    {

    }
}
