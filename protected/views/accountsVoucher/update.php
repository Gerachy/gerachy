<?php
/* @var $this AccountsVoucherController */
/* @var $model AccountsVoucher */

$this->breadcrumbs=array(
	'Accounts Vouchers'=>array('index'),
	$model->id=>array('view','id'=>$model->id),
	'Update',
);

$this->menu=array(
	array('label'=>'List AccountsVoucher', 'url'=>array('index')),
	array('label'=>'Create AccountsVoucher', 'url'=>array('create')),
	array('label'=>'View AccountsVoucher', 'url'=>array('view', 'id'=>$model->id)),
	array('label'=>'Manage AccountsVoucher', 'url'=>array('admin')),
);
?>

<h1>Update AccountsVoucher <?php echo $model->id; ?></h1>

<?php echo $this->renderPartial('_form', array('model'=>$model)); ?>