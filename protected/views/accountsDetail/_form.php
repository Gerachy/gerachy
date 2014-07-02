<?php
/* @var $this AccountsDetailController */
/* @var $model AccountsDetail */
/* @var $form CActiveForm */
?>

<style>
.row {float: left; width: 100%}
label {display: block; width: 75px; float: left; margin-right: 10px;}
.option {float: left; width: 100%}
.option span {display: block; float: left; margin: 0px 10px 5px 0px; padding: 2px 5px; background-color: #657; color: #FFF}
</style>

<div class="form">

<?php $form=$this->beginWidget('CActiveForm', array(
	'id'=>'accounts-detail-form',
	'enableAjaxValidation'=>false,
)); ?>

	<p class="note">Fields with <span class="required">*</span> are required.</p>

	<?php echo $form->errorSummary($model); ?>

	<div class="row">
		<?php echo $form->labelEx($model,'accounts'); ?>
		<?php echo $form->textField($model,'accounts',array('size'=>4,'maxlength'=>10)); ?>
		<?php echo $form->error($model,'accounts'); ?>
		<div class="option">
			<!-- <span value="1" class="accounts">基本账户（人民币）</span> -->
			<!-- <span value="2" class="accounts">基本账户（美元）</span>	 -->
			<span value="3" class="accounts">备用金</span>					
			<span value="4" class="accounts">银行卡</span>
		</div>		
		<script>
			$(".accounts").on("click",function(){$("#AccountsDetail_accounts").attr("value",$(this).attr("value"))});
		</script>			
	</div>

	<div class="row">
		<?php echo $form->labelEx($model,'year'); ?>
		<?php echo $form->textField($model,'year',array('size'=>4,'maxlength'=>4)); ?>
		<?php echo $form->error($model,'year'); ?>
	</div>

	<div class="row">
		<?php echo $form->labelEx($model,'month'); ?>
		<?php echo $form->textField($model,'month',array('size'=>4,'maxlength'=>2)); ?>
		<?php echo $form->error($model,'month'); ?>
	</div>

	<div class="row">
		<?php echo $form->labelEx($model,'day'); ?>
		<?php echo $form->textField($model,'day',array('size'=>4,'maxlength'=>2)); ?>
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
		<?php echo $form->textField($model,'voucher',array('size'=>20,'maxlength'=>20)); ?>
		<?php echo $form->error($model,'voucher'); ?>
		<div class="option">
			<span class="voucher">BK<?php echo date('Ymd'); ?></span>
			<span class="voucher">YBHT<?php echo date('Y'); ?> 附件No.</span>
		</div>
		<script>
			$(".voucher").on("click",function(){$("#AccountsDetail_voucher").attr("value",($(this).text()))});
		</script>		
	</div>

	<div class="row">
		<?php echo $form->labelEx($model,'summary'); ?>
		<?php echo $form->textField($model,'summary',array('size'=>20,'maxlength'=>64)); ?>
		<?php echo $form->error($model,'summary'); ?>
		<div class="option">
			<span class="summary">交易收入</span>
			<span class="summary">交易支出</span>	
			<span class="summary">发放工资</span>
			<span class="summary">收入工资</span>
			<span class="summary">支出备用金</span>
			<span class="summary">收入备用金</span>
			<span class="summary">缴税</span>						
			<br><br>
			<span class="summary">银行服务费</span>					
			<span class="summary">银行结息</span>
			<span class="summary">招待费</span>
			<span class="summary">差旅费</span>


		</div>		
		<script>
			$(".summary").on("click",function(){$("#AccountsDetail_summary").attr("value",$(this).text())});
		</script>			
	</div>

	<div class="row">
		<?php echo $form->labelEx($model,'debit'); ?>
		<?php echo $form->textField($model,'debit',array('size'=>20,'maxlength'=>12)); ?>
		<?php echo $form->error($model,'debit'); ?>
	</div>

	<div class="row">
		<?php echo $form->labelEx($model,'credit'); ?>
		<?php echo $form->textField($model,'credit',array('size'=>20,'maxlength'=>12)); ?>
		<?php echo $form->error($model,'credit'); ?>
	</div>

	<div class="row">
		<?php echo $form->labelEx($model,'credit_cat'); ?>
		<?php echo $form->textField($model,'credit_cat'); ?>
		<?php echo $form->error($model,'credit_cat'); ?>
		<div class="option">
			<span value="11" class="credit_cat">11 : 商品成本</span>			
			<span value="1" class="credit_cat">1 : 工资</span>
			<span value="2" class="credit_cat">2 : 备用金</span>
			<span value="11" class="credit_cat">12 : 实时缴税</span>			
			<br><br>
			<span value="3" class="credit_cat">3 : 固定性经营支出</span>
			<span value="4" class="credit_cat">4 : 消耗性经营支出</span>
			<span value="5" class="credit_cat">5 : 招待费</span>
			<span value="6" class="credit_cat">6 : 差旅费</span>
			<span value="1000" class="credit_cat">1000 : 其他</span>
		</div>		
		<script>
			$(".credit_cat").on("click",function(){$("#AccountsDetail_credit_cat").attr("value",$(this).attr("value"))});
		</script>
	</div>

	<div class="row">
		<?php echo $form->labelEx($model,'desc'); ?>
		<?php echo $form->textField($model,'desc',array('size'=>50,'maxlength'=>255)); ?>
		<?php echo $form->error($model,'desc'); ?>
		<div class="option">
			<span class="desc">济宁博克机械有限公司</span>			
			<span class="desc">北京义傲思程贸易有限公司</span>
			<span class="desc">马千里<?php echo date("Y/m"); ?></span>
			<span class="desc">王晓光<?php echo date("Y/m"); ?></span>
			<span class="desc">薛雪</span>
			<span class="desc">DST</span>			
		</div>		
		<script>
			$(".desc").on("click",function(){$("#AccountsDetail_desc").attr("value",$(this).text())});
		</script>		
	</div>

	<div class="row buttons">
		<?php echo CHtml::submitButton($model->isNewRecord ? 'Create' : 'Save'); ?>
	</div>

<?php $this->endWidget(); ?>

</div><!-- form -->