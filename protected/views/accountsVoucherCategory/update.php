<?php
/* @var $this AccountsVoucherCategoryController */
/* @var $model AccountsVoucherCategory */

$this->breadcrumbs=array(
	'Accounts Voucher Categories'=>array('index'),
	$model->name=>array('view','id'=>$model->id),
	'Update',
);

$this->menu=array(
	array('label'=>'List AccountsVoucherCategory', 'url'=>array('index')),
	array('label'=>'Create AccountsVoucherCategory', 'url'=>array('create')),
	array('label'=>'View AccountsVoucherCategory', 'url'=>array('view', 'id'=>$model->id)),
	array('label'=>'Manage AccountsVoucherCategory', 'url'=>array('admin')),
);
?>

<h1>Update AccountsVoucherCategory <?php echo $model->id; ?></h1>

<?php echo $this->renderPartial('_form', array('model'=>$model)); ?>