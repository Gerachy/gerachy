<?php
/* @var $this AccountsVoucherCategoryController */
/* @var $model AccountsVoucherCategory */

$this->breadcrumbs=array(
	'Accounts Voucher Categories'=>array('index'),
	'Create',
);

$this->menu=array(
	array('label'=>'List AccountsVoucherCategory', 'url'=>array('index')),
	array('label'=>'Manage AccountsVoucherCategory', 'url'=>array('admin')),
);
?>

<h1>Create AccountsVoucherCategory</h1>

<?php echo $this->renderPartial('_form', array('model'=>$model)); ?>