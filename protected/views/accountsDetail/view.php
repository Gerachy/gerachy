<?php
/* @var $this AccountsDetailController */
/* @var $model AccountsDetail */

$this->breadcrumbs=array(
	'Accounts Details'=>array('index'),
	$model->id,
);

$this->menu=array(
	array('label'=>'List AccountsDetail', 'url'=>array('index')),
	array('label'=>'Create AccountsDetail', 'url'=>array('create')),
	array('label'=>'Update AccountsDetail', 'url'=>array('update', 'id'=>$model->id)),
	array('label'=>'Delete AccountsDetail', 'url'=>'#', 'linkOptions'=>array('submit'=>array('delete','id'=>$model->id),'confirm'=>'Are you sure you want to delete this item?')),
	array('label'=>'Manage AccountsDetail', 'url'=>array('admin')),
);
?>

<h1>View AccountsDetail #<?php echo $model->id; ?></h1>

<?php $this->widget('zii.widgets.CDetailView', array(
	'data'=>$model,
	'attributes'=>array(
		'id',
		'accounts',
		'year',
		'month',
		'day',
		'voucher1',
		'voucher2',
		'voucher',
		'summary',
		'debit',
		'credit',
		'dac',
		'create_time',
		'modify_time',
		'status',
	),
)); ?>
