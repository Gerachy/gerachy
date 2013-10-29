<h1>Forget Password</h1>

<?php if(Yii::app()->user->getFlash('ForgetPassword')){ ?>
	A email has send to your email-address
<?php }else{ ?>
	<div class="form">
	<?php $form=$this->beginWidget('CActiveForm', array(
		'id'=>'forgetpassword-form',
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
			<?php echo $form->hiddenField($model,'notice'); array('type'=>'hidden'); ?>	
			<?php echo $form->error($model,'notice'); ?>
		</div>
		
		<div class="row buttons">
			<?php echo CHtml::submitButton('Get My Password Back!!'); ?>
		</div>

	<?php $this->endWidget(); ?>
</div><!-- form -->
<?php } ?>