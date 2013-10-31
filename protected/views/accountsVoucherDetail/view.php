<?php
/* @var $this AccountsVoucherDetailController */
/* @var $model AccountsVoucherDetail */

$this->breadcrumbs=array(
	'Accounts Voucher Details'=>array('index'),
	$model->id,
);

$this->menu=array(
	array('label'=>'List AccountsVoucherDetail', 'url'=>array('index')),
	array('label'=>'Create AccountsVoucherDetail', 'url'=>array('create')),
	array('label'=>'Update AccountsVoucherDetail', 'url'=>array('update', 'id'=>$model->id)),
	array('label'=>'Delete AccountsVoucherDetail', 'url'=>'#', 'linkOptions'=>array('submit'=>array('delete','id'=>$model->id),'confirm'=>'Are you sure you want to delete this item?')),
	array('label'=>'Manage AccountsVoucherDetail', 'url'=>array('admin')),
);
?>

<h1>View AccountsVoucherDetail #<?php echo $model->id; ?></h1>

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
