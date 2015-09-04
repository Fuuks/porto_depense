<?php

namespace App\Model\Table;
use Cake\I18n\Time;
use App\Model\Table\UsersTable;
use Cake\ORM\TableRegistry;
use Cake\ORM\Table;

class Depensestable extends Table{

	var $total;
	
	public function initialize(array $config){
		$this->addBehavior('Timestamp');
	}
	
	public static function getDepenses(){
		$depenses = TableRegistry::get('Depenses');
		$depenses = $depenses->find('all');
		
		return $depenses;
	}
	public static function additionTotalForMonth(){
		
		$depenses = TableRegistry::get('Depenses');
		$totalDepenses = $depenses->find('all');
		$time = Time::now(); //jour
		$total = 0;
		
		foreach ($totalDepenses as $depense) {
			
			//si le mois du produit de la date dajout correspond au mois courant
			//on incremente la somme du produit
			if($depense->creation->month == $time->month){
				$total +=$depense->somme; 
			}
		}
		
		return $total;
	}
	
	public static function estEnSeuil($id,$total){
		
		$users = TableRegistry::get('Users');
		$users = $users->find('all');

		$tab = array();
		foreach ($users as $user) {
			
			if ($user['id'] == $id ){
				
				if($total > $user['seuil']){
					
					$diff_seuil = $total - $user['seuil'];
					
					return $tab = array(
							"enSeuil" =>true,
							"diff" => $diff_seuil,
							"seuil" => $user['seuil']
					);
					
				}else{
					return $tab = array(
							"enSeuil" =>false,
							"seuil" => $user['seuil']
					);
				}
					
			}
				
		}
		
		
	}
	
	public function translateMonth($month){
		
		switch ($month) {
			case 1:
				return "Janvier";
			case 2:
				return "Février";
			case 3:
				return "Mars";
			case 4:
				return "Avril";
			case 5:
				return "Mai";
			case 6:
				return "Juin";
			case 7:
				return "Juillet";
			case 8:
				return "Aout";
			case 9:
				return "Septembre";
			case 10:
				return "Octobre";
			case 11:
				return "Novembre";
			case 12:
				return "Decembre";
		}
	}
}