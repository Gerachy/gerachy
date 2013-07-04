<?php

class DefaultController extends Controller
{
	public function actionIndex()
	{
		$id = 'id';
		$value = Yii::app()->cache->set($id,1000);
		$value = Yii::app()->cache->get($id);
		// $value =Yii::app()->db;
		var_dump($value);


		// $model = Test::model()->findAll();

		// for ($i=1; $i <= 90000; $i++) { 
		// 	$test = new Test;
		// 	$test->key = rand(1,999999999);
		// 	$test->value = rand(1,999999999);
		// 	$test->save();
		// 	unset($test);
		// }
		
// var_dump(Yii::app()->cache);


















		// $s = '啊啊不123_abcABC';
		// preg_match_all('/[\x{4e00}-\x{9fa5}\x{3130}-\x{318F}\x{0800}-\x{4e00}\w]/u', $s, $v);
		// $_length = mb_strlen($s,'utf8');	// 被检验的字符串长度
		// $length = count($v[0]);				// 符合条件的字符数量
		//  $_length == $length;

		var_dump(CDbConnection::getStats());	// db查询数和查询时间
	}
}