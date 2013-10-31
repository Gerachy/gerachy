<a href="/gerachy/accountsCategory">账户分类</a>
<br>
<a href="/gerachy/accountsDetail">账户详情</a>
<br>
<br>

<a href="/gerachy/accountsVoucherCategory">凭据分类</a>
<br>
<a href="/gerachy/accountsVoucherDetail">凭据详情</a>
<br>

<?php
	echo '<br>基本账户';
	$sql = '
		SELECT SUM(debit)
		FROM `accounts_detail`
		WHERE `accounts` = 1';
	$command = Yii::app()->db->createCommand($sql);
	$a1d = $command->queryscalar();
	echo '<br>收入 : ' . $a1d;

	$sql = '
		SELECT SUM(credit)
		FROM `accounts_detail`
		WHERE `accounts` = 1';
	$command = Yii::app()->db->createCommand($sql);
	$a1c = $command->queryscalar();
	echo '<br>支出 : ' . $a1c;
	
	$a1t = $a1d - $a1c;
	echo '<br>总计 : ' . $a1t;

	echo '<br>';

	echo '<br>现金账户';
	$sql = '
		SELECT SUM(debit)
		FROM `accounts_detail`
		WHERE `accounts` = 4';
	$command = Yii::app()->db->createCommand($sql);
	$a3d = $command->queryscalar();
	echo '<br>收入 : ' . $a3d;

	$sql = '
		SELECT SUM(credit)
		FROM `accounts_detail`
		WHERE `accounts` = 4';
	$command = Yii::app()->db->createCommand($sql);
	$a3c = $command->queryscalar();
	echo '<br>支出 : ' . $a3c;

	$a3t = $a3d - $a3c;
	echo '<br>总计 : ' . $a3t;

	echo '<br><br>收支总计 : ' . ($a1t + $a3t);

	// $a = Accounts::model()->find();
	// var_dump($a);
?>