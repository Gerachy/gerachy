<?php

class IndexController extends CController
{
	public function actionA()
	{
		var_dump(Yii::app()->session);
		Yii::app()->session->add('id',114);
		var_dump(Yii::app()->session->get('id'));
	}

	public function actionB()
	{

		$id = 'id';
		$value = Yii::app()->cache->get($id);
		var_dump($value);
	}

	public function actionIndex()
	{

$redis = new Kredis;
var_dump($redis);

$a = $redis->mset(array('a'=>11312,'b'=>4342));
var_dump($a);

$b = $redis->get('b');
var_dump($b);




exit;

		var_dump(CDbConnection::getStats());	// db查询数和查询时间
	}
}