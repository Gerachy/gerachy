<?php
$this->breadcrumbs=array(
	$this->module->id,
);
?>

<?php
var_dump(Yii::app()->user->id);
var_dump(Yii::app()->user->name);
var_dump(Yii::app()->user->email);
var_dump($user->attributes);
?>
