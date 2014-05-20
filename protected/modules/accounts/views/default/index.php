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
	$a1d = Yii::app()->db->createCommand($sql)->queryscalar();
	echo '<br>收入 : ' . $a1d;

	$sql = '
		SELECT SUM(credit)
		FROM `accounts_detail`
		WHERE `accounts` = 1
			and `status` = 1';
	$a1c = Yii::app()->db->createCommand($sql)->queryscalar();
	echo '<br>支出 : ' . $a1c;
	
	$a1t = $a1d - $a1c;
	echo '<br>余额 : ' . $a1t . '<br>';



	$sql = '
		SELECT SUM(credit)
		FROM `accounts_detail`
		WHERE `credit_cat` = 2';
	$cash = Yii::app()->db->createCommand($sql)->queryscalar();
	echo '(备用金流量 : ' . $cash . ')<br>';



	echo '<br>备用金账户';
	$sql = '
		SELECT SUM(debit)
		FROM `accounts_detail`
		WHERE `accounts` = 3
			and `status` = 1';
	$a3d = Yii::app()->db->createCommand($sql)->queryscalar();
	$sql = '
		SELECT SUM(credit)
		FROM `accounts_detail`
		WHERE `accounts` = 3
			and `status` = 1';
	$a3c = Yii::app()->db->createCommand($sql)->queryscalar();
	$a3t = $a3d - $a3c;



	// echo '<br>现金账户';
	$sql = '
		SELECT SUM(debit)
		FROM `accounts_detail`
		WHERE `accounts` = 4
			and `status` = 1';
	$a4d = Yii::app()->db->createCommand($sql)->queryscalar();
	$sql = '
		SELECT SUM(credit)
		FROM `accounts_detail`
		WHERE `accounts` = 4
			and `status` = 1';
	$a4c = Yii::app()->db->createCommand($sql)->queryscalar();
	$a4t = $a4d - $a4c;
	
	echo '<br>收入 : ' . ($a3d + $a4d);
	echo '<br>支出 : ' . ($a3c + $a4c);
	echo '<br>余额 : ' . ($a3t + $a4t);
	echo ' <br>(现金：' . $a3t . ' / 银行卡： ' . $a4t . ')';
	
	echo '<br>';

	echo '<br>总计';
	echo '<br>收入 : ' . ($a1d + $a3d + $a3d - $cash);
	echo '<br>支出 : ' . ($a1c + $a3c + $a4c - $cash);
	echo '<br>余额 : ' . ($a1t + $a3t + $a4t);
?>