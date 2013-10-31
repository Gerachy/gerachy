<?php
/* @var $this AccountsVoucherDetailController */
/* @var $model AccountsVoucherDetail */

$this->breadcrumbs=array(
	'Accounts Voucher Details'=>array('index'),
	'Create',
);

$this->menu=array(
	array('label'=>'List AccountsVoucherDetail', 'url'=>array('index')),
	array('label'=>'Manage AccountsVoucherDetail', 'url'=>array('admin')),
);
?>

<h1>Create AccountsVoucherDetail</h1>

<?php echo $this->renderPartial('_form', array('model'=>$model)); ?>