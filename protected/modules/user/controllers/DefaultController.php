<?php

class DefaultController extends Controller
{
	public function actionIndex()
	{
		$user = User::model()->findByPk(Yii::app()->user->id);
	
		$this->render('index',array(
			'user' => $user,
		));
	}
}