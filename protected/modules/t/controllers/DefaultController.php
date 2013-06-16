<?php

class DefaultController extends Controller
{
	public function actionIndex()
	{
		echo 123;
		$user = User::model()->findByPk(Yii::app()->user->id);
		var_dump(mail::forgetPassword(28));
		
// $message = 'Hello World!';
// $mailer = Yii::createComponent('application.extensions.mailer.EMailer');
// $mailer->Host = 'smtp.exmail.qq.com';
// $mailer->IsSMTP();
// $mailer->SMTPAuth  = 1;
// $mailer->From = 'gerachy@qq.com';
// $mailer->Username = 'gerachy@qq.com';
// $mailer->Password = 'google';
// $mailer->AddReplyTo('gerachy@qq.com');
// $mailer->AddAddress('gerachy@qq.com');
// $mailer->FromName = 'Gerachy';
// $mailer->CharSet = 'UTF-8';
// $mailer->Subject = 'I\'m Title' . time();
// $mailer->Body = $message;
// $mailer->Send();		
		
		
		
		
		
		
		// $this->render('index');
	}
}