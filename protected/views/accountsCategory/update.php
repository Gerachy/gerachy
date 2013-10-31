<?php
/* @var $this AccountsCategoryController */
/* @var $model AccountsCategory */

$this->breadcrumbs=array(
	'Accounts Categories'=>array('index'),
	$model->name=>array('view','id'=>$model->id),
	'Update',
);

$this->menu=array(
	array('label'=>'List AccountsCategory', 'url'=>array('index')),
	array('label'=>'Create AccountsCategory', 'url'=>array('create')),
	array('label'=>'View AccountsCategory', 'url'=>array('view', 'id'=>$model->id)),
	array('label'=>'Manage AccountsCategory', 'url'=>array('admin')),
);
?>

<h1>Update AccountsCategory <?php echo $model->id; ?></h1>

<?php echo $this->renderPartial('_form', array('model'=>$model)); ?>