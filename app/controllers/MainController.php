<?php 

namespace app\controllers;
use wfm\Controller;
use RedBeanPHP\R;

/** @property Main $model */

class MainController extends Controller
{
	public function indexAction()
	{
		$names = $this->model->get_names();
		$oneName = R::getRow( 'SELECT * FROM name WHERE id = 2');
		$this->setMeta('mainPage', 'description', 'page_1');
		//$this->set(['test' => 'TEST_1']);
		$test = 'TEST_1';
		$this->set(compact('names', 'test'));
	}
}