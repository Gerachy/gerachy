<?php
/* @var $this AccountsVoucherController */
/* @var $model AccountsVoucher */

$this->breadcrumbs=array(
	'Accounts Vouchers'=>array('index'),
	'Create',
);

$this->menu=array(
	array('label'=>'List AccountsVoucher', 'url'=>array('index')),
	array('label'=>'Manage AccountsVoucher', 'url'=>array('admin')),
);
?>

<h1>Create AccountsVoucher</h1>

<?php echo $this->renderPartial('_form', array('model'=>$model)); ?>