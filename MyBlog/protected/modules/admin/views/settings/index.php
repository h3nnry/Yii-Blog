<h1>Settings</h1>
<?php
/* @var $this CategoryController */
/* @var $model Category */
/* @var $form CActiveForm */
?>
<?php if(Yii::app()->user->hasFlash('settings')): ?>

<div class="flash-success">
	<?php echo Yii::app()->user->getFlash('settings'); ?>
</div>

<?php endif; ?>

<div class="form">

<?php $form=$this->beginWidget('CActiveForm', array(
	'id'=>'settings-form',
	'enableAjaxValidation'=>false,
)); ?>
	<?php echo $form->errorSummary($model); ?>

	<div class="row">
		<?php echo $form->labelEx($model,'defaultComment'); ?>
		<?php echo $form->checkBox($model,'defaultComment'); ?>
		<?php echo $form->error($model,'defaultComment'); ?>
	</div>

	<div class="row">
		<?php echo $form->labelEx($model,'defaultUser'); ?>
		<?php echo $form->checkBox($model,'defaultUser'); ?>
		<?php echo $form->error($model,'defaultUser'); ?>
	</div>

	<div class="row buttons">
		<?php echo CHtml::submitButton('Save'); ?>
	</div>

<?php $this->endWidget(); ?>

</div><!-- form -->