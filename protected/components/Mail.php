<?php

/**
 * Use 'application.extensions.mailer'
 */
class Mail extends CController
{
	/**
	 *	创建邮件的公共/默认部分
	 */
	public static function createMail()
	{
		$mailer = Yii::createComponent('application.extensions.mailer.EMailer');
		$mailer->Host = 'smtp.exmail.qq.com';
		$mailer->IsSMTP();
		$mailer->SMTPAuth  = 1;
		$mailer->FromName = Yii::app()->params->admin;		
		$mailer->From = Yii::app()->params->adminEmail;
		$mailer->Username = 'gerachy@qq.com';
		$mailer->Password = 'google';		
		$mailer->CharSet = 'UTF-8';
		return $mailer;
	}
	
	/**
	 *	发送忘记密码的邮件
	 */
	public static function forgetPassword($data)
	{
		$mailer = self::createMail();
		$mailer->AddAddress($data['address']);			
		$mailer->Subject = '新鲜出炉的密码来了';
		$mailer->Body = '您的新密码是:'.$data['password'];
		return $mailer->Send();
	}
	
	
}