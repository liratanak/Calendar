<?php

namespace Calendar\Controller;

use Zend\Mvc\Controller\AbstractActionController;
use Zend\View\Model\ViewModel;

class MainController extends AbstractActionController {

	public function indexAction() {
		return new ViewModel();
	}

}
