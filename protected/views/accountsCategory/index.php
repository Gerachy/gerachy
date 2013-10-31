<?php
/* @var $this AccountsCategoryController */
/* @var $dataProvider CActiveDataProvider */

$this->breadcrumbs=array(
	'Accounts Categories',
);

$this->menu=array(
	array('label'=>'Create AccountsCategory', 'url'=>array('create')),
	array('label'=>'Manage AccountsCategory', 'url'=>array('admin')),
);
?>

<h1>Accounts Categories</h1>

<?php $this->widget('zii.widgets.CListView', array(
	'dataProvider'=>$dataProvider,
	'itemView'=>'_view',
)); ?>
