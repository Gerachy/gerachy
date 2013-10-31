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
	$sql = '
		SELECT 
			SUM(debit) - SUM(credit)
		FROM 
			`accounts_detail`
		WHERE
			`accounts` = 3
		';
	$command = Yii::app()->db->createCommand($sql);
	$a3 = $command->queryscalar();
	echo '<br>活动账户 总收支 : ' . $a3;

	$sql = '
		SELECT 
			SUM(debit) - SUM(credit)
		FROM 
			`accounts_detail`
		WHERE
			`accounts` = 4
		';
	$command = Yii::app()->db->createCommand($sql);
	$a4 = $command->queryscalar();
	echo '<br>现金账户 总收支 : ' . $a4;


	// $a = Accounts::model()->find();
	// var_dump($a);
?>