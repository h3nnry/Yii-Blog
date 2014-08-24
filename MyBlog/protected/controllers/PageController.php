<?php

class PageController extends Controller
{
	public function actions()
	{
		return array(
			// captcha action renders the CAPTCHA image displayed on the contact page
			'captcha'=>array(
				'class'=>'CCaptchaAction',
				'backColor'=>0xFFFFFF,
			),
			// page action renders "static" pages stored under 'protected/views/site/pages'
			// They can be accessed via: index.php?r=site/page&view=FileName
			'page'=>array(
				'class'=>'CViewAction',
			),
		);
	}




	public function actionIndex($id)
	{
		$models = Page::model()->findAllByAttributes(array('category_id'=>$id));
		$category = Category::model()->findByPk($id);

		$this->render('index', array('models'=>$models,'category' =>$category));
		//print_r($models);
	}

	public function actionView($id)
	{

		$models = Page::model()->findByPk($id);
		$newComment = new Commentary;
		if(isset($_POST['Commentary']))
        {
            $newComment->attributes=$_POST['Commentary'];
            $newComment->page_id=$models->id;
            $settings = Settings::model()->findByPk(1);
            if($settings->defaultComment==0)
			{
				$newComment->status = 0;
			}
			else
			{
				$newComment->status = 1;
			}

            if($newComment->save())
            {            	                
                if($settings->defaultComment==0)
				{
					Yii::app()->user->setFlash('comment','Your comment will be published.');
				}
				else
				{
					Yii::app()->user->setFlash('comment','Your comment was published.');
				}
				$this->refresh();
			}
		
        }

        if(Yii::app()->user->isGuest)
        	$newComment->scenario = 'Guest';
		$this->render('view', array('models'=>$models, 'newComment'=>$newComment));		
	}
}