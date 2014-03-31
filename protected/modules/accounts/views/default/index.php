<a href="/gerachy/accountsCategory">账户分类</a>
<br><br>

<a href="/gerachy/accountsDetail">账户详情</a>
<span><a style="color: #223311" href="/gerachy/accountsDetail/create">添加账户详情</a></span>
<br><br>

<a href="/gerachy/accountsVoucherCategory">凭据分类</a>
<br><br>

<a href="/gerachy/accountsVoucherDetail">凭据详情</a>
<br><br>

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

	echo '<br>备用金账户';
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
	//echo '<br>备用金流量 : ' . $cash;
	//echo '<br>';

	echo '<br>现金账户';
	$sql = '
		SELECT SUM(debit)
		FROM `accounts_detail`
		WHERE `accounts` = 4
			and `status` = 1';
	$command = Yii::app()->db->createCommand($sql);
	$a3d = $command->queryscalar();
	echo '<br>收入 : ' . $a3d;

	$sql = '
		SELECT SUM(credit)
		FROM `accounts_detail`
		WHERE `accounts` = 4
			and `status` = 1';
	$command = Yii::app()->db->createCommand($sql);
	$a3c = $command->queryscalar();
	echo '<br>支出 : ' . $a3c;

	$a3t = $a3d - $a3c;
	echo '<br>余额 : ' . $a3t;
	
	echo '<br>';

	echo '<br>总计';
	echo '<br>收入 : ' . ($a1d + $a3d - $cash);
	echo '<br>支出 : ' . ($a1c + $a3c - $cash);
	echo '<br>余额 : ' . ($a1t + $a3t);


	// $a = Accounts::model()->find();
	// var_dump($a);
?>