<?php
/* @var $this AccountsCategoryController */
/* @var $model AccountsCategory */

$this->breadcrumbs=array(
	'Accounts Categories'=>array('index'),
	$model->name,
);

$this->menu=array(
	array('label'=>'List AccountsCategory', 'url'=>array('index')),
	array('label'=>'Create AccountsCategory', 'url'=>array('create')),
	array('label'=>'Update AccountsCategory', 'url'=>array('update', 'id'=>$model->id)),
	array('label'=>'Delete AccountsCategory', 'url'=>'#', 'linkOptions'=>array('submit'=>array('delete','id'=>$model->id),'confirm'=>'Are you sure you want to delete this item?')),
	array('label'=>'Manage AccountsCategory', 'url'=>array('admin')),
);
?>

<h1>View AccountsCategory #<?php echo $model->id; ?></h1>

<?php $this->widget('zii.widgets.CDetailView', array(
	'data'=>$model,
	'attributes'=>array(
		'id',
		'name',
		'create_time',
		'modify_time',
		'status',
	),
)); ?>
