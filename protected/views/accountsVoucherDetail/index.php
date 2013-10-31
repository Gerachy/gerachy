<?php
/* @var $this AccountsVoucherDetailController */
/* @var $dataProvider CActiveDataProvider */

$this->breadcrumbs=array(
	'Accounts Voucher Details',
);

$this->menu=array(
	array('label'=>'Create AccountsVoucherDetail', 'url'=>array('create')),
	array('label'=>'Manage AccountsVoucherDetail', 'url'=>array('admin')),
);
?>

<h1>Accounts Voucher Details</h1>

<?php $this->widget('zii.widgets.CListView', array(
	'dataProvider'=>$dataProvider,
	'itemView'=>'_view',
)); ?>
