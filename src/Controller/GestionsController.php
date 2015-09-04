<?php

namespace App\Controller;

use Cake\I18n\Time;
use App\Controller\DepensesController;
use App\Model\Table\Depensestable;
use App\Controller\AppController;
use App\Model\Table\Gestionstable;

class GestionsController extends AppController{

	public function index(){
		
		$depenses = Depensestable::getDepenses();
		//$mois = Gestionstable::months($month);
		$total = Gestionstable::additionTotal();
		$this->set(compact('depenses'));
		//$this->set(compact('mois'));
		$this->set(compact('total'));
	}
}