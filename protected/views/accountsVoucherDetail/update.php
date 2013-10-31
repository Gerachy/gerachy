<?php
/* @var $this AccountsVoucherDetailController */
/* @var $model AccountsVoucherDetail */

$this->breadcrumbs=array(
	'Accounts Voucher Details'=>array('index'),
	$model->id=>array('view','id'=>$model->id),
	'Update',
);

$this->menu=array(
	array('label'=>'List AccountsVoucherDetail', 'url'=>array('index')),
	array('label'=>'Create AccountsVoucherDetail', 'url'=>array('create')),
	array('label'=>'View AccountsVoucherDetail', 'url'=>array('view', 'id'=>$model->id)),
	array('label'=>'Manage AccountsVoucherDetail', 'url'=>array('admin')),
);
?>

<h1>Update AccountsVoucherDetail <?php echo $model->id; ?></h1>

<?php echo $this->renderPartial('_form', array('model'=>$model)); ?>