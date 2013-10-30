<?php
/* @var $this AccountsVoucherController */
/* @var $model AccountsVoucher */

$this->breadcrumbs=array(
	'Accounts Vouchers'=>array('index'),
	$model->id,
);

$this->menu=array(
	array('label'=>'List AccountsVoucher', 'url'=>array('index')),
	array('label'=>'Create AccountsVoucher', 'url'=>array('create')),
	array('label'=>'Update AccountsVoucher', 'url'=>array('update', 'id'=>$model->id)),
	array('label'=>'Delete AccountsVoucher', 'url'=>'#', 'linkOptions'=>array('submit'=>array('delete','id'=>$model->id),'confirm'=>'Are you sure you want to delete this item?')),
	array('label'=>'Manage AccountsVoucher', 'url'=>array('admin')),
);
?>

<h1>View AccountsVoucher #<?php echo $model->id; ?></h1>

<?php $this->widget('zii.widgets.CDetailView', array(
	'data'=>$model,
	'attributes'=>array(
		'id',
		'category',
		'date_time',
		'fare',
		'create_time',
		'modify_time',
		'status',
	),
)); ?>
