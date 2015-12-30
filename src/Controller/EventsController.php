<?php
namespace App\Controller;

use App\Controller\AppController;
use Cake\Event\Event;
use Cake\ORM\TableRegistry;

/**
 * Events Controller
 *
 * @property \App\Model\Table\EventsTable $Events
 */
class EventsController extends AppController
{

    public function beforeFilter(Event $event) {
        parent::beforeFilter($event);
        $this->Auth->allow(['index', 'view']);
    }

    public function isAuthorized($user = null)
    {
        if (in_array($this->request->action, ['index', 'view', 'join', 'unjoin'])) {
            return true;
        }

        return parent::isAuthorized($user);
    }

    /**
     * Index method
     *
     * @return void
     */
    public function index()
    {
        $this->set('events', $this->Events->find('all', ['contain' => ['Users']]));
        $this->set('_serialize', ['events']);
    }

    /**
     * View method
     *
     * @param string|null $id Event id.
     * @return void
     * @throws \Cake\Network\Exception\NotFoundException When record not found.
     */
    public function view($id = null)
    {
        $event = $this->Events->get($id, [
            'contain' => ['Games', 'Users']
        ]);
        $this->set('event', $event);
        $this->set('_serialize', ['event']);
    }

    /**
     * Add method
     *
     * @return void Redirects on successful add, renders view otherwise.
     */
    public function add()
    {
        $event = $this->Events->newEntity();
        if ($this->request->is('post')) {
            $event = $this->Events->patchEntity($event, $this->request->data);
            if ($this->Events->save($event)) {
                $this->Flash->success(__('The event has been saved.'));
                return $this->redirect(['action' => 'index']);
            } else {
                $this->Flash->error(__('The event could not be saved. Please, try again.'));
            }
        }
        $this->set(compact('event'));
        $this->set('games', $this->Events->Games->find('list'));
        $this->set('_serialize', ['event']);
    }

    /**
     * Edit method
     *
     * @param string|null $id Event id.
     * @return void Redirects on successful edit, renders view otherwise.
     * @throws \Cake\Network\Exception\NotFoundException When record not found.
     */
    public function edit($id = null)
    {
        $event = $this->Events->get($id, [
            'contain' => ['Games']
        ]);
        if ($this->request->is(['patch', 'post', 'put'])) {
            $event = $this->Events->patchEntity($event, $this->request->data);
            if ($this->Events->save($event)) {
                $this->Flash->success(__('The event has been saved.'));
                return $this->redirect(['action' => 'index']);
            } else {
                $this->Flash->error(__('The event could not be saved. Please, try again.'));
            }
        }
        $this->set(compact('event'));
        $this->set('games', $this->Events->Games->find('list'));
        $this->set('_serialize', ['event']);
    }

    /**
     * Delete method
     *
     * @param string|null $id Event id.
     * @return \Cake\Network\Response|null Redirects to index.
     * @throws \Cake\Network\Exception\NotFoundException When record not found.
     */
    public function delete($id = null)
    {
        $this->request->allowMethod(['post', 'delete']);
        $event = $this->Events->get($id);
        if ($this->Events->delete($event)) {
            $this->Flash->success(__('The event has been deleted.'));
        } else {
            $this->Flash->error(__('The event could not be deleted. Please, try again.'));
        }
        return $this->redirect(['action' => 'index']);
    }

    public function join($id = null) {
        $this->request->allowMethod(['post', 'delete']);
        $event = $this->Events->get($id, ['contain' => ['Users']]);
        $user = TableRegistry::get('Users')->get($this->Auth->user('id'));
        $tmp = $event->users; // @see http://www.yiiframework.com/forum/index.php/topic/30830-indirect-modification-of-overloaded-property-modelrelation-has-no-effect/
        $tmp[] = $user;
        $event->users = $tmp;
        if ($this->Events->save($event)) {
            $this->Flash->success(__('Vous vous êtes inscrit à l\'événement.'));
        } else {
            $this->Flash->error(__('Un problème lors de l\'inscription. Veuillez réessayer.'));
        }
        return $this->redirect(['action' => 'view', $id]);
    }

    public function unjoin($id = null, $userid = null) {
        if($this->Auth->user('role') !== 'admin' || $userid === null) $userid = $this->Auth->user('id');
        $this->request->allowMethod(['post', 'delete']);
        $event = $this->Events->get($id, ['contain' => ['Users']]);
        $tmp = $event->users; // @see http://www.yiiframework.com/forum/index.php/topic/30830-indirect-modification-of-overloaded-property-modelrelation-has-no-effect/
        $test = false;
        if($tmp !== null) {
            foreach ($tmp as $k => $u) {
                if ($u['id'] == $userid) $test = $k;
            }
            if($test !== false) {
                unset($tmp[$test]);
                $event->users = $tmp;
                if ($this->Events->save($event)) {
                    $this->Flash->success(__('Vous vous êtes désinscrit de l\'événement.'));
                } else {
                    $this->Flash->error(__('Un problème lors de la désinscription. Veuillez réessayer.'));
                }
            } else {
                $this->Flash->error(__('Vous n\'êtes pas inscrit à cet événement.'));
            }
        } else {
            $this->Flash->error(__('Vous n\'êtes pas inscrit à cet événement.'));
        }
        return $this->redirect(['action' => 'view', $id]);
    }
}
