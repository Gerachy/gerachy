<?php
/* @var $this AccountsDetailController */
/* @var $model AccountsDetail */
/* @var $form CActiveForm */
?>

<div class="form">

<?php $form=$this->beginWidget('CActiveForm', array(
	'id'=>'accounts-detail-form',
	'enableAjaxValidation'=>false,
)); ?>

	<p class="note">Fields with <span class="required">*</span> are required.</p>

	<?php echo $form->errorSummary($model); ?>

	<div class="row">
		<?php echo $form->labelEx($model,'accounts'); ?>
		<?php echo $form->textField($model,'accounts',array('size'=>10,'maxlength'=>10)); ?>
		<?php echo $form->error($model,'accounts'); ?>
	</div>

	<div class="row">
		<?php echo $form->labelEx($model,'year'); ?>
		<?php echo $form->textField($model,'year',array('size'=>4,'maxlength'=>4)); ?>
		<?php echo $form->error($model,'year'); ?>
	</div>

	<div class="row">
		<?php echo $form->labelEx($model,'month'); ?>
		<?php echo $form->textField($model,'month',array('size'=>2,'maxlength'=>2)); ?>
		<?php echo $form->error($model,'month'); ?>
	</div>

	<div class="row">
		<?php echo $form->labelEx($model,'day'); ?>
		<?php echo $form->textField($model,'day',array('size'=>2,'maxlength'=>2)); ?>
		<?php echo $form->error($model,'day'); ?>
	</div>

<!--
	<div class="row">
		<?php echo $form->labelEx($model,'voucher1'); ?>
		<?php echo $form->textField($model,'voucher1'); ?>
		<?php echo $form->error($model,'voucher1'); ?>
	</div>

	<div class="row">
		<?php echo $form->labelEx($model,'voucher2'); ?>
		<?php echo $form->textField($model,'voucher2'); ?>
		<?php echo $form->error($model,'voucher2'); ?>
	</div>
-->

	<div class="row">
		<?php echo $form->labelEx($model,'voucher'); ?>
		<?php echo $form->textField($model,'voucher'); ?>
		<?php echo $form->error($model,'voucher'); ?>
	</div>

	<div class="row">
		<?php echo $form->labelEx($model,'summary'); ?>
		<?php echo $form->textField($model,'summary',array('size'=>60,'maxlength'=>64)); ?>
		<?php echo $form->error($model,'summary'); ?>
	</div>

	<div class="row">
		<?php echo $form->labelEx($model,'debit'); ?>
		<?php echo $form->textField($model,'debit',array('size'=>12,'maxlength'=>12)); ?>
		<?php echo $form->error($model,'debit'); ?>
	</div>

	<div class="row">
		<?php echo $form->labelEx($model,'credit'); ?>
		<?php echo $form->textField($model,'credit',array('size'=>12,'maxlength'=>12)); ?>
		<?php echo $form->error($model,'credit'); ?>
	</div>

	<div class="row">
		<?php echo $form->labelEx($model,'credit_cat'); ?>
		<?php echo $form->textField($model,'credit_cat'); ?>
		<?php echo $form->error($model,'credit_cat'); ?>
	</div>

	<div class="row">
		<?php echo $form->labelEx($model,'desc'); ?>
		<?php echo $form->textField($model,'desc',array('size'=>60,'maxlength'=>255)); ?>
		<?php echo $form->error($model,'desc'); ?>
	</div>

	<div class="row buttons">
		<?php echo CHtml::submitButton($model->isNewRecord ? 'Create' : 'Save'); ?>
	</div>

<?php $this->endWidget(); ?>

</div><!-- form -->