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
			// 未登录用户禁止其他任何操作
            array('deny',
                'users'=>array('?'),
            ),
		);
    }

	public function actionIndex()
	{
$sql = '
	SELECT 
		SUM(debit) - SUM(credit)
	FROM 
		`accounts_detail`
	WHERE
		1 OR `accounts` = 3
	';
$command = Yii::app()->db->createCommand($sql);
$a = $command->queryscalar();
var_dump($a);
exit;


		$this->render('index');
	}
}