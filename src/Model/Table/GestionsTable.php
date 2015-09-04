<?php

namespace App\Model\Table;
use Cake\I18n\Time;
use Cake\ORM\TableRegistry;
use Cake\ORM\Table;

class Gestionstable extends Table{

	public function initialize(array $config){
		$this->addBehavior('Timestamp');
	}
	
	public static function additionTotal(){
		
		$depenses = TableRegistry::get('Depenses');
		$totalDepenses = $depenses->find('all');
		$total = 0;
		
		foreach ($totalDepenses as $depense) {
			$total +=$depense->somme; 
			
		}		
		return $total;
	}
	
	public static function months($month){

		$mois = array('1'=>'Janvier','2'=>'Fevrier','3'=>'Mars','4'=>'Avril',
				'5'=>'Mai','6'=>'Juin','7'=>'Juiller','8'=>'Aout',
				'9'=>'Septembre','10'=>'Octobre','11'=>'Novembre','12'=>'Decembre');
		return $mois;
				
	}
}