<?php

namespace App\Controller;
use Cake\ORM\TableRegistry;
use Cake\Auth\DefaultPasswordHasher;
use Cake\Event\Event;
use App\Controller\AppController;

class UsersController extends AppController{

	
	public function beforeFilter(Event $event)
	{
		parent::beforeFilter($event);
		// Permet aux utilisateurs de s'enregistrer et de se déconnecter.
		$this->Auth->allow(['add', 'logout']);
	}

	
	
	public function edit_seuil($id){
		
		$user = $this->Users->get($id);
		$seuil = $user->seuil;
		if($this->request->is(['add','put'])){
			$user = $this->Users->patchEntity($user,$this->request->data);
			if ($this->Users->save($user)){
				$this->Flash->success(__('Modification reussie !'));
				return $this->redirect(['action'=>'edit_seuil',$id]);
			}
			$this->Flash->error(__('Modification impossible'));
		}
		
		
		$this->set('montant',$seuil);
		$this->set('user',$user);
	}
	
	public function view($id){
		$user = $this->Users->get($id);
		$this->set(compact('user'));
	}
	
	public function edit($id = null){
		$user = $this->Users->get($id);
		
		if( $this->request->is(['add','put'])){
			$user = $this->Users->patchEntity($user,$this->request->data);
			
			if($this->Users->save($user)){
				$this->Flash->success(__('Modification reussie !'));
				return $this->redirect(['action'=>'index']);
			}
			$this->Flash->error(__('Modification impossible'));
		}
		
		$this->set('user',$user);
		
	}
	
	public function add(){
		$user = $this->Users->newEntity();
		if ($this->request->is('post')){
			$user = $this->Users->patchEntity($user,$this->request->data);
			//hashage du mot de passe
			$hasher = new DefaultPasswordHasher();
			$user->password =  $hasher->hash($this->request->data('password'));
			if($this->Users->save($user)){
				$this->Flash->success(__(' Vous etes inscrit'));
				return $this->redirect(['controller'=>'Depenses','action' => 'index']);
			}
			$this->Flash->error(__(' Inscription impossible'));
		}
		$this->set('user',$user);
	}
	
	
	public function login()
	{
		if ($this->request->is('post')) {
			$user = $this->Auth->identify();
			if ($user) {
				$this->Auth->setUser($user);
				//$this->Cookie->write($id,$user->id);
				return $this->redirect($this->Auth->redirectUrl());
			}
			$this->Flash->error(__("Nom d'utilisateur ou mot de passe incorrect, essayez à nouveau."));
		}
	}
	
	public function logout()
	{
		
		return $this->redirect($this->Auth->logout());
	}
}