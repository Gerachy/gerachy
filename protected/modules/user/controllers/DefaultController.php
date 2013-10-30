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
			// 已登录用户禁止注册,登录,找回密码
			array('deny',
				'actions'=>array('signup', 'login', 'forgetpassword'),
				'users'=>array('@'),
			),
			// 登录用户允许其他任何操作
			array('allow',
                'users'=>array('@'),
            ),
			// 未登录用户允许注册,登录,找回密码
			array('allow',
				'actions'=>array('signup', 'login', 'forgetpassword'),
				'users'=>array('?'),
			),
			// 未登录用户禁止其他任何操作
            array('deny',
                'users'=>array('?'),
            ),
		);
    }

	/**
	 * 用户首页
	 */	
	public function actionIndex()
	{
		$this->pageTitle=Yii::app()->name . ' - My Info';

		$user = User::model()->findByPk(Yii::app()->user->id);
	
		$this->render('index',array(
			'user' => $user,
		));
	}

	/**
	 * 编辑用户信息
	 */	
	public function actionEdit()
	{
		$this->pageTitle=Yii::app()->name . ' - Edit My Info';

		$user = User::model()->findByPk(Yii::app()->user->id);
		$model=new SignUpForm(edit);
		
		if(isset($_POST['ajax']) && $_POST['ajax']==='edit-form')
		{
			echo CActiveForm::validate($model);
			Yii::app()->end();
		}
		
		$model=new SignUpForm;
		$this->render('edit',compact('user','model'));
	}

	/**
	 * 注册
	 */
	public function actionSignUp()
	{
		$this->pageTitle='SignUp';
		
		$model=new SignUpForm('signUp');

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

	/**
	 * 登录
	 */	
	public function actionLogin()
	{
		$this->pageTitle=Yii::app()->name . ' - Login';

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

	/**
	 * 注销
	 */		
	public function actionLogout()
	{
		Yii::app()->user->logout();
		$this->redirect(Yii::app()->homeUrl);
	}
	
	/**
	 * 找回密码
	 */		
	public function actionForgetPassword()
	{
		$this->pageTitle='Forget Password';

		$model=new ForgetPasswordForm;
		
		if(isset($_POST['ajax']) && $_POST['ajax']==='forgetpassword-form')
		{
			echo CActiveForm::validate($model);
			Yii::app()->end();
		}
		
		$this->render('forget_password',array('model'=>$model));
	}	
}