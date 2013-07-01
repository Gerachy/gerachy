<?php

class DefaultController extends Controller
{
	public function actionIndex()
	{
		
		$s = '啊啊不123_abcABC';
		preg_match_all('/[\x{4e00}-\x{9fa5}\x{3130}-\x{318F}\x{0800}-\x{4e00}\w]/u', $s, $v);
		$_length = mb_strlen($s,'utf8');	// 被检验的字符串长度
		$length = count($v[0]);				// 符合条件的字符数量
		 $_length == $length;
		// $this->render('index');
	}
}