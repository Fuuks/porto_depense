<?php


namespace App\Controller;

use Cake\I18n\Time;
use App\Controller\AppController;
use App\Model\Table\Depensestable;


class DepensesController extends AppController{

	public function index(){
		
		$depenses = $this->Depenses->find('all');	
		
		$total = DepensesTable::additionTotalForMonth();
		
		$time = Time::now();
		
		$time = $time->month;
		$mois = $this->Depenses->translateMonth($time);
		//$time = $time->nice('Europe/Paris', 'fr-FR');		
		$this->set(compact('depenses'));
		$this->set('total',$total);
		$this->set('mois',$mois);
		
		//Seuil
		$seuil = DepensesTable::estEnSeuil(1, $total);
	
		
		$enSeuil = $seuil['enSeuil'];
		
		if($enSeuil){
			$diff = $seuil['diff'];
		}
			
		$montant = $seuil['seuil'];
		
		
		$this->set('seuil',$montant);
		
		
		if($enSeuil){
			$this->Flash->error(__('Vous avez depasse votre seuil de '.$diff.' euros'));
		}
		
		
	}
	
	public function add(){

		$depense = $this->Depenses->newEntity();
		if($this->request->is('post')){
			
			$depense = $this->Depenses->patchEntity($depense,$this->request->data);
			$depense->creation = new Time(); 
			
			if($this->Depenses->save($depense)){
				$this->Flash->success(__('depense ajoutee'));
				return $this->redirect(['action' =>'index']);
			}
			$this->Flash->error(__('pas d\'ajout erreur'));
		}
		
		$this->set('depense',$depense);
	}
	
	public function view($id = null){
		$depense = $this->Depenses->get($id);
		$this->set(compact('depense'));
		
	}
	
	public function edit($id = null){
		
		$depense = $this->Depenses->get($id);
		
		if($this->request->is(['post','put'])){
			$this->Depenses->patchEntity($depense,$this->request->data);
			
			if($this->Depenses->save($depense)){
				$this->Flash->success(__('Depense modifie'));
				return $this->redirect(['action' => 'index']);
			}
			
		}
		
		$this->set('depense',$depense);
	}
	public function delete($id){
		$depense = $this->Depenses->get($id);
		
		if($this->Depenses->delete($depense)){
			$this->Flash->success(__('depense supprime'));
			return $this->redirect(['action' => 'index']);
		}
	}
	
	
}
