<?php
/* @var $this AccountsVoucherController */
/* @var $dataProvider CActiveDataProvider */

$this->breadcrumbs=array(
	'Accounts Vouchers',
);

$this->menu=array(
	array('label'=>'Create AccountsVoucher', 'url'=>array('create')),
	array('label'=>'Manage AccountsVoucher', 'url'=>array('admin')),
);
?>

<h1>Accounts Vouchers</h1>

<?php $this->widget('zii.widgets.CListView', array(
	'dataProvider'=>$dataProvider,
	'itemView'=>'_view',
)); ?>
