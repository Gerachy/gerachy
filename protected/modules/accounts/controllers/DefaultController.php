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



		$this->render('index');
	}
}