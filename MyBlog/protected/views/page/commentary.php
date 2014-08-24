<?php
/* @var $this CommentaryController */
/* @var $model Commentary */
/* @var $form CActiveForm */
?>

<div class="form">

<?php $form=$this->beginWidget('CActiveForm', array(
    'id'=>'commentary-form',
    // Please note: When you enable ajax validation, make sure the corresponding
    // controller action is handling ajax validation correctly.
    // There is a call to performAjaxValidation() commented in generated controller code.
    // See class documentation of CActiveForm for details on this.
    'enableAjaxValidation'=>false,
)); ?>

    <p class="note">Fields with <span class="required">*</span> are required.</p>

    <?php echo $form->errorSummary($model); ?>

    <div class="row">
        <?php echo $form->labelEx($model,'content'); ?>
        <?php echo $form->textArea($model,'content',array('rows'=>6, 'cols'=>50)); ?>
        <?php echo $form->error($model,'content'); ?>
    </div>
    <?php if(Yii::app()->user->isGuest): ?>
    <div class="row">
        <?php echo $form->labelEx($model,'guest'); ?>
        <?php echo $form->textField($model,'guest',array('size'=>20,'maxlength'=>20)); ?>
        <?php echo $form->error($model,'guest'); ?>
    </div>
    <?php endif;?>
    <?php if(CCaptcha::checkRequirements()): ?>
    <div class="row">
        <?php echo $form->labelEx($model,'verifyCode'); ?>
        <div>
        <?php $this->widget('CCaptcha'); ?>
        <?php echo $form->textField($model,'verifyCode'); ?>
        </div>
        <?php echo $form->error($model,'verifyCode'); ?>
    </div>
    <?php endif; ?>
    <div class="row buttons">
        <?php echo CHtml::submitButton('Comment'); ?>
    </div>

<?php $this->endWidget(); ?>

</div><!-- form -->
