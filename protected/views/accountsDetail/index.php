<?php
/* @var $this AccountsDetailController */
/* @var $dataProvider CActiveDataProvider */

$this->breadcrumbs=array(
	'Accounts Details',
);

$this->menu=array(
	array('label'=>'Create AccountsDetail', 'url'=>array('create')),
	array('label'=>'Manage AccountsDetail', 'url'=>array('admin')),
);
?>

<h1>Accounts Details</h1>

<?php $this->widget('zii.widgets.CListView', array(
	'dataProvider'=>$dataProvider,
	'itemView'=>'_view',
)); ?>
