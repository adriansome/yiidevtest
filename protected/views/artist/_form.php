<?php
/* @var $this ArtistController */
/* @var $model Artist */
/* @var $form CActiveForm */
?>

<div class="form">

<?php $form=$this->beginWidget('CActiveForm', array(
	'id'=>'artist-form',
	// Please note: When you enable ajax validation, make sure the corresponding
	// controller action is handling ajax validation correctly.
	// There is a call to performAjaxValidation() commented in generated controller code.
	// See class documentation of CActiveForm for details on this.
	'enableAjaxValidation'=>false,
)); ?>

	<p class="note">Fields with <span class="required">*</span> are required.</p>

	<?php echo $form->errorSummary($model); ?>

	<div class="row">
		<?php echo $form->labelEx($model,'Name'); ?>
		<?php echo $form->textField($model,'Name',array('size'=>60,'maxlength'=>120)); ?>
		<?php echo $form->error($model,'Name'); ?>
	</div>

	<div class="row">
		<?php echo $form->labelEx($model,'bio'); ?>
		<?php echo $form->textArea($model,'bio',array('rows'=>6, 'cols'=>50)); ?>
		<?php echo $form->error($model,'bio'); ?>
	</div>

	<div class="row">
		<?php echo $form->labelEx($model,'ArtistArtUrl'); ?>
		<?php echo $form->textField($model,'ArtistArtUrl',array('size'=>60,'maxlength'=>1000)); ?>
		<?php echo $form->error($model,'ArtistArtUrl'); ?>
	</div>

	<div class="row">
		<?php echo $form->labelEx($model,'mbid'); ?>
		<?php echo $form->textField($model,'mbid',array('size'=>50,'maxlength'=>50)); ?>
		<?php echo $form->error($model,'mbid'); ?>
	</div>

	<div class="row buttons">
		<?php echo CHtml::submitButton($model->isNewRecord ? 'Create' : 'Save'); ?>
	</div>

<?php $this->endWidget(); ?>

</div><!-- form -->