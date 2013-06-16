<?php

class DefaultController extends Controller
{
	public function filters()
	{
		return array(
			'accessControl',
		);
	}

	public function accessRules()
    {
        return array(
			// 已登录用户禁止注册
			array('deny',
				'actions'=>array('signup'),
				'users'=>array('@'),
			),
			array('allow',
                'users'=>array('@'),
            ),
			// 未登录用户禁止登出
			array('allow',
				'actions'=>array('login', 'signup'),
				'users'=>array('?'),
			),
            array('deny',
                'users'=>array('?'),
            ),
		);
    }
	
	public function actionIndex()
	{
		$user = User::model()->findByPk(Yii::app()->user->id);
	
		$this->render('index',array(
			'user' => $user,
		));
	}
	
	public function actionEdit()
	{
		$user = User::model()->findByPk(Yii::app()->user->id);

		$model=new SignUpForm(edit);

		if(isset($_POST['ajax']) && $_POST['ajax']==='edit-form')
		{
			echo CActiveForm::validate($model);
			Yii::app()->end();
		}

		// if(isset($_POST['LoginForm']))
		// {
			// $model->attributes=$_POST['LoginForm'];
			// if($model->validate() && $model->login())
				// $this->redirect(Yii::app()->user->returnUrl);
		// }

		$model=new SignUpForm;
		$this->render('edit',compact('user','model'));
	}

	public function actionSignUp()
	{
		$model=new SignUpForm(signUp);

		if(isset($_POST['ajax']) && $_POST['ajax']==='signup-form')
		{
			echo CActiveForm::validate($model);
			Yii::app()->end();
		}
		
		if(isset($_POST['SignUpForm']))
		{
			$user = new User;
			$user->name = $_POST['SignUpForm']['username'];
			$user->attributes = $_POST['SignUpForm'];
			if($user->save())
			{
				// 卧槽,这么调用太偷懒了吧!
				$_POST['LoginForm'] = $_POST['SignUpForm'];
				$this->actionLogin();			
			}
			else
			{
				$this->redirect(Yii::app()->request->urlReferrer);			
			}
			
			exit;
		}
		
		$this->render('signup',array('model'=>$model));
	}

	public function actionLogin()
	{
		$model=new LoginForm;

		if(isset($_POST['ajax']) && $_POST['ajax']==='login-form')
		{
			echo CActiveForm::validate($model);
			Yii::app()->end();
		}

		if(isset($_POST['LoginForm']))
		{
			$model->attributes=$_POST['LoginForm'];
			if($model->validate() && $model->login())
				$this->redirect(Yii::app()->user->returnUrl);
		}

		$this->render('login',array('model'=>$model));
	}

	public function actionLogout()
	{
		Yii::app()->user->logout();
		$this->redirect(Yii::app()->homeUrl);
	}	
}