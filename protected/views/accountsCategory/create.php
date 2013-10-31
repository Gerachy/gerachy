<?php
/* @var $this AccountsCategoryController */
/* @var $model AccountsCategory */

$this->breadcrumbs=array(
	'Accounts Categories'=>array('index'),
	'Create',
);

$this->menu=array(
	array('label'=>'List AccountsCategory', 'url'=>array('index')),
	array('label'=>'Manage AccountsCategory', 'url'=>array('admin')),
);
?>

<h1>Create AccountsCategory</h1>

<?php echo $this->renderPartial('_form', array('model'=>$model)); ?>