<?php
/* @var $this AccountsDetailController */
/* @var $model AccountsDetail */

$this->breadcrumbs=array(
	'Accounts Details'=>array('index'),
	'Create',
);

$this->menu=array(
	array('label'=>'List AccountsDetail', 'url'=>array('index')),
	array('label'=>'Manage AccountsDetail', 'url'=>array('admin')),
);
?>

<h1>Create AccountsDetail</h1>

<?php echo $this->renderPartial('_form', array('model'=>$model)); ?>