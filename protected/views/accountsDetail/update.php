<?php
/* @var $this AccountsDetailController */
/* @var $model AccountsDetail */

$this->breadcrumbs=array(
	'Accounts Details'=>array('index'),
	$model->id=>array('view','id'=>$model->id),
	'Update',
);

$this->menu=array(
	array('label'=>'List AccountsDetail', 'url'=>array('index')),
	array('label'=>'Create AccountsDetail', 'url'=>array('create')),
	array('label'=>'View AccountsDetail', 'url'=>array('view', 'id'=>$model->id)),
	array('label'=>'Manage AccountsDetail', 'url'=>array('admin')),
);
?>

<h1>Update AccountsDetail <?php echo $model->id; ?></h1>

<?php echo $this->renderPartial('_form', array('model'=>$model)); ?>