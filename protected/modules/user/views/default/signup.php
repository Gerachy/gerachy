<?php
$this->pageTitle='SignUp';
$this->breadcrumbs=array(
	'SignUp',
);
?>

<h1>SignUp</h1>

<div class="form">
<?php $form=$this->beginWidget('CActiveForm', array(
	'id'=>'signup-form',
	'enableAjaxValidation'=>true,
	'enableClientValidation'=>true,
	'clientOptions'=>array(
		'validateOnSubmit'=>true,
	),
)); ?>

	<p class="note">Fields with <span class="required">*</span> are required.</p>

	<div class="row">
		<?php echo $form->labelEx($model,'username'); ?>
		<?php echo $form->textField($model,'username'); ?>
		<?php echo $form->error($model,'username'); ?>
	</div>

	<div class="row">
		<?php echo $form->labelEx($model,'email'); ?>
		<?php echo $form->textField($model,'email',array('value'=>rand(999,9999).'@q.com')); ?>
		<?php echo $form->error($model,'email'); ?>
	</div>
	
	<div class="row">
		<?php echo $form->labelEx($model,'password'); ?>
		<?php echo $form->passwordField($model,'password'); ?>
		<?php echo $form->error($model,'password'); ?>
	</div>

	<div class="row">
		<?php echo $form->labelEx($model,'passwordRepeat'); ?>
		<?php echo $form->passwordField($model,'passwordRepeat'); ?>
		<?php echo $form->error($model,'passwordRepeat'); ?>
	</div>
	
	<div class="row rememberMe">
		<?php echo $form->checkBox($model,'rememberMe'); ?>
		<?php echo $form->label($model,'rememberMe'); ?>
		<?php echo $form->error($model,'rememberMe'); ?>
	</div>

	<div class="row buttons">
		<?php echo CHtml::submitButton('SignUp'); ?>
	</div>

<?php $this->endWidget(); ?>
</div><!-- form -->
