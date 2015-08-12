<?php
namespace App\Controller;

use Cake\Event\EventManager;

use App\Controller\AppController;

/**
 * Job Controller
 *
 * @property \App\Model\Table\JobTable $Job
 */
class JobController extends AppController
{

	
	/**
     * Index method
     *
     * @return void
     */
    public function index()
    {
          //fetch the user id. fetch the jobs associated with the logged in user id
      //  $userid = $this->Auth->user('userid');
        //get the connection
       // $jobs = $this->Job->findAll("select * from job where userid = :userid', ['userid' => $userid]");
        //$options['fields'] = array('userid');
      // $jobs = $this->Job->find()->where(['userid'=>$userid]);
       // $connection = ConnectionManager::get('default');
        //execute the query
//         $results = $connection
//         ->execute('SELECT * FROM job WHERE userid = :userid', ['userid' => $userid])
//         ->fetchAll('assoc');
    	$this->paginate = [
    	'conditions' => [
    	'job.userid' => $this->Auth->user('userid'),
    	]
    	];
    	$this->set('job', $this->paginate($this->Job));
    	//$this->set('job',$this->paginate($jobs));
        $this->set('_serialize', ['job']);
    }

    /**
     * View method
     *
     * @param string|null $id Job id.
     * @return void
     * @throws \Cake\Network\Exception\NotFoundException When record not found.
     */
    public function view($id = null)
    {
        $job = $this->Job->get($id, [
            'contain' => []
        ]);
        $this->set('job', $job);
        $this->set('_serialize', ['job']);
    }

    /**
     * Add method
     *
     * @return void Redirects on successful add, renders view otherwise.
     */
    public function add()
    {
        $job = $this->Job->newEntity();
        if ($this->request->is('post')) {
            $job = $this->Job->patchEntity($job, $this->request->data);
            $job->userid = $this->Auth->user('userid');
//             EventManager::instance()->on('Model.beforeSave','beforeSave'
//             );
            if ($this->Job->save($job)) {
                $this->Flash->success(__('The job has been saved.'));
                return $this->redirect(['action' => 'index']);
            } else {
                $this->Flash->error(__('The job could not be saved. Please, try again.'));
            }
        }
        $this->set(compact('job'));
        $this->set('_serialize', ['job']);
    }
    
//     public function beforeSave($event){
//     	$job = $this->Job->get('id');
//     	$job->u
//     	return true;
//     }

    /**
     * Edit method
     *
     * @param string|null $id Job id.
     * @return void Redirects on successful edit, renders view otherwise.
     * @throws \Cake\Network\Exception\NotFoundException When record not found.
     */
    public function edit($id = null)
    {
        $job = $this->Job->get($id, [
            'contain' => []
        ]);
        if ($this->request->is(['patch', 'post', 'put'])) {
            $job = $this->Job->patchEntity($job, $this->request->data);
            $job->userid = $this->Auth->user('userid');
            if ($this->Job->save($job)) {
                $this->Flash->success(__('The job has been saved.'));
                return $this->redirect(['action' => 'index']);
            } else {
                $this->Flash->error(__('The job could not be saved. Please, try again.'));
            }
        }
        $this->set(compact('job'));
        $this->set('_serialize', ['job']);
    }

    /**
     * Delete method
     *
     * @param string|null $id Job id.
     * @return void Redirects to index.
     * @throws \Cake\Network\Exception\NotFoundException When record not found.
     */
    public function delete($id = null)
    {
        $this->request->allowMethod(['post', 'delete']);
        $job = $this->Job->get($id);
        if ($this->Job->delete($job)) {
            $this->Flash->success(__('The job has been deleted.'));
        } else {
            $this->Flash->error(__('The job could not be deleted. Please, try again.'));
        }
        return $this->redirect(['action' => 'index']);
    }
    
    public function isAuthorized($user)
    {
    	$action = $this->request->params['action'];
    	// The add and index actions are always allowed.
    	if (in_array($action, ['index', 'add',])) {
    		return true;
    	}
    	if (empty($this->request->params['pass'][0])) {
    		return false;
    	}
    	// Check that the bookmark belongs to the current user.
    	$id = $this->request->params['pass'][0];
    	$Job = $this->Job->get($id);
    	if ($Job->userid == $user['userid']) {
    		return true;
    	}
    	return parent::isAuthorized($user);
    }
}
