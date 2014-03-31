<a href="/gerachy/accountsCategory">账户分类</a>
<br>
1 : 基本账户（人民币）<br>
2 : 基本账户（美元）<br>
3 : 备用金(现金) <br>
4 : 现金账户 <br>
<br>
<a href="/gerachy/accountsDetail">账户详情</a>
<br>
支出类型	<br>
 1 : 工资<br>
 2 : 备用金<br>
 3 : 固定性经营支出<br>
 4 : 消耗性经营支出<br>
 5 : 业务招待<br>
 6 : 差旅费<br>
 11 : 商品成本<br>
<br>

常用公司
<br>
北京义傲思程贸易有限公司
<br>
济宁博克机械有限公司
<br>

<br>
<a href="/gerachy/accountsVoucherCategory">凭据分类</a>
<a href="/gerachy/accountsVoucherDetail">凭据详情</a>
<br>

<?php
	echo '<br>基本账户';
	$sql = '
		SELECT SUM(debit)
		FROM `accounts_detail`
		WHERE `accounts` = 1
			and `status` = 1';
	$command = Yii::app()->db->createCommand($sql);
	$a1d = $command->queryscalar();
	echo '<br>收入 : ' . $a1d;

	$sql = '
		SELECT SUM(credit)
		FROM `accounts_detail`
		WHERE `accounts` = 1
			and `status` = 1';
	$command = Yii::app()->db->createCommand($sql);
	$a1c = $command->queryscalar();
	echo '<br>支出 : ' . $a1c;
	
	$a1t = $a1d - $a1c;
	echo '<br>余额 : ' . $a1t;

	echo '<br>';

	echo '<br>现金账户';
	$sql = '
		SELECT SUM(debit)
		FROM `accounts_detail`
		WHERE `accounts` = 3
			and `status` = 1';
	$command = Yii::app()->db->createCommand($sql);
	$a3d = $command->queryscalar();
	echo '<br>收入 : ' . $a3d;

	$sql = '
		SELECT SUM(credit)
		FROM `accounts_detail`
		WHERE `accounts` = 3
			and `status` = 1';
	$command = Yii::app()->db->createCommand($sql);
	$a3c = $command->queryscalar();
	echo '<br>支出 : ' . $a3c;

	$a3t = $a3d - $a3c;
	echo '<br>余额 : ' . $a3t;


	echo '<br>';


	$sql = '
		SELECT SUM(credit)
		FROM `accounts_detail`
		WHERE `credit_cat` = 2';
	$command = Yii::app()->db->createCommand($sql);
	$cash = $command->queryscalar();
	echo '<br>备用金流量 : ' . $cash;


	echo '<br>';
	echo '<br>收入 : ' . ($a1d + $a3d - $cash);
	echo '<br>支出 : ' . ($a1c + $a3c - $cash);
	echo '<br>余额 : ' . ($a1t + $a3t);


	// $a = Accounts::model()->find();
	// var_dump($a);
?>