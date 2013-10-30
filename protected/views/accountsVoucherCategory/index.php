<?php
/* @var $this AccountsVoucherCategoryController */
/* @var $dataProvider CActiveDataProvider */

$this->breadcrumbs=array(
	'Accounts Voucher Categories',
);

$this->menu=array(
	array('label'=>'Create AccountsVoucherCategory', 'url'=>array('create')),
	array('label'=>'Manage AccountsVoucherCategory', 'url'=>array('admin')),
);
?>

<h1>Accounts Voucher Categories</h1>

<?php $this->widget('zii.widgets.CListView', array(
	'dataProvider'=>$dataProvider,
	'itemView'=>'_view',
)); ?>
