<?php

class MyController extends Controller
{
	public $defaultAction = "one";
	public function actionOne()
	{
		//$model = Page::model()->findAll(array('order'=>'title ASC'));
		$model=Page::model()->with('commentCount')->findAll();
		$dataProvider = new CActiveDataProvider('Page', array(
			'criteria' => array(
				'with'=>'commentCount',
				),
			'pagination'=>array(
                        'pageSize'=>2,)
			));
		//print_r($comments->commentCount);
		$this->render('index', array('dataProvider' => $dataProvider)); 
	}

	// Uncomment the following methods and override them if needed
	/*
	public function filters()
	{
		// return the filter configuration for this controller, e.g.:
		return array(
			'inlineFilterName',
			array(
				'class'=>'path.to.FilterClass',
				'propertyName'=>'propertyValue',
			),
		);
	}

	public function actions()
	{
		// return external action classes, e.g.:
		return array(
			'action1'=>'path.to.ActionClass',
			'action2'=>array(
				'class'=>'path.to.AnotherActionClass',
				'propertyName'=>'propertyValue',
			),
		);
	}
	*/
}